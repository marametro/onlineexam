<?PHP
	require_once '../../mssql/config.php';
	require_once '../../model/UserManagement/um_model.php';
	require_once'../../helper/thumb.php';
	require_once'../../helper/Encryption.php';

	$Encryption = new Encryption();

	$model =new UmModel(); 
	$page = $_POST['page'];
	$action = $_POST['action'];
	$userid = $_POST['userid'];
	
	if ($action =='delete') 
	{
		$id = $_POST['id'];
		$datapost = array(
									'isdeleted' => 1,
									'updateby' => $userid,
									'updatedate' => date("Y-m-d H:i:s")
								);
		$data = $model->delete($page,$datapost,$id);
		echo'ok';
	} else if ($action =='add_feature') {
		$id = $_POST['id'];
		$data = false;

		$key = array(
									'elearn_um_role_id' => $_POST['role'],
									'modul_name' => $_POST['modul'],
									'menu_name' => $_POST['feature']
								);
		$data = $model->check_data($page,$key);
		
		$_POST['modul'] = isset($_POST['modul']) ? $_POST['modul'] : '';
		if ($_POST['modul']=='Select'){
			echo 'Please select modul';
		} else if ($data == true)
		{
			echo'isexist';
		}else {
			$datapost = array(
												'elearn_um_role_id' => $_POST['role'],
												'modul_name' => $_POST['modul'],
												'modul_alias' => $_POST['modul_a'],
												'menu_name' => $_POST['feature'],
												'menu_alias' => $_POST['feature_a'],
												'createby' => $userid,
												'createdate' => date('Y-m-d H:i:s') 
											);
			$result = $model->create($page,$datapost);
		}

	} else {

		if($page=='role_permission'){
			$id = $_POST['ddRole'];
		}else{
			$id = $_POST['id'];
		}
		$data = false;

		switch($page)  
		{
			case 'user':
				$key = array('username' => $_POST['cu']['username']);
			break;
			case 'role_permission':
				
			break;
			default:
				$key = array('name' => $_POST['cu']['name']);
		}
		
		if ($page!='role_permission')
		{
			$data = $model->check_data($page,$key);
		}

		if ($id == '') 
		{
			if ($data == true)
			{
				echo'isexist';
			}else {
					
					$_POST['cu']['createdate'] = date("Y-m-d H:i:s");
					switch($page)  
					{
						case 'user':
							$_POST['cu']['password'] = $_POST['cu']['username'];
							$lokasi_file    = $_FILES['fupload']['tmp_name'];
							$tipe_file      = $_FILES['fupload']['type'];
							$nama_file      = $_FILES['fupload']['name'];
							$nama_file_unik = (string)($model->getLastID($page)+1)."_".$nama_file; 
							$_POST['cu']['date_birthday'] = date('Y-m-d',strtotime($_POST['cu']['date_birthday']));
							if (empty($lokasi_file)==false) 
							{
								FotoUpload($nama_file_unik,$page);
								$_POST['cu']['photo_url'] = $nama_file_unik;
							}
						break;
					}
				$result = $model->create($page,$_POST['cu']);
				echo'ok';
			}
		} else {
			
			$id = $_POST['id'];
			$data = false;

			switch($page)  
			{
				case 'user':
					
				break;
				case 'role_permission':
					
				break;
				default:
					if ($_POST['name']!=$_POST['cu']['name']){
						$key = array('name' => $_POST['cu']['name']);
						$data = $model->check_data($page,$key);
					}
			}

			if ($data == true)
			{
				echo'isexist';				
			}else {
				$_POST['cu']['updatedate'] = date("Y-m-d H:i:s");
				switch($page)  
				{
					case 'user':
						$lokasi_file    = $_FILES['fupload']['tmp_name'];
						$tipe_file      = $_FILES['fupload']['type'];
						$nama_file      = $_FILES['fupload']['name'];
						$nama_file_unik = ((string)($id))."_".$nama_file;
						$_POST['cu']['date_birthday'] = date('Y-m-d',strtotime($_POST['cu']['date_birthday']));
						if (empty($lokasi_file)==false) 
						{
							FotoUpload($nama_file_unik,$page);
							$_POST['cu']['photo_url'] = $nama_file_unik;
						}
					break;
					case 'role_permission':
						$markPerm=array();
						$colsPerm=array_keys($_POST['permission']);
						foreach ($colsPerm as $colPerm) {
			      	$mark=array();				
			      	$cols=array_keys($_POST['permission'][$colPerm]);
			      	$seq = 1;
			      	foreach ($cols as $col) {
			      		if ($seq == 1){
			      			$mark[]="`".$col."`='".$colPerm."'";		      			
			      		}else{
			      			$mark[]="`".$col."`=1";		      			
			      		}
			      		
			      		$seq = $seq + 1;
				      }
			      	$im=implode(', ', $mark);
			      	$result = $model->update3($page,$_POST['ddRole'],$colPerm,$im);
			      }
					break;
				}	
				$result = $model->update($page,$_POST['cu'],$id);
				echo'updateok';
			}

		}
	}
	
?>