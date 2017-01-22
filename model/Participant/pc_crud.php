<?PHP
	require_once '../../mssql/config.php';
	require_once '../../model/Participant/pc_model.php';
	require_once'../../helper/thumb.php';
	require_once'../../helper/Encryption.php';

	$model =new PcModel(); 
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
	}else {

		$id = $_POST['id'];	
		switch($page)  
		{
			case 'participant':
				
				$key = array(
											'nis' => $model->getCode($page),
											'name' => $_POST['cu']['name']
											
										);
			break;
			default:
				$key = array('name' => $_POST['cu']['name']);
		}
		$data = $model->check_data($page,$key);

		if ($id == '') 
		{
			if ($data > '0')
			{
				echo'isexist';
			}else {
				
					$_POST['cu']['createdate'] = date("Y-m-d H:i:s");
					switch($page)  
					{
						case 'participant':
							$_POST['cu']['nis'] = $model->getCode($page);
							$_POST['cu']['password'] = Encryption::encrypt($_POST['cu']['username']);//$_POST['cu']['username'];
							$_POST['cu']['date_birthday'] = date('Y-m-d',strtotime($_POST['cu']['date_birthday']));
							$lokasi_file    = $_FILES['fupload']['tmp_name'];
							$tipe_file      = $_FILES['fupload']['type'];
							$nama_file      = $_FILES['fupload']['name'];
							$nama_file_unik = $_POST['cu']['nis']."_".$nama_file;
							if (empty($lokasi_file)==false) 
							{
								FotoUpload($nama_file_unik,$page);
								$_POST['cu']['photo_url'] = $nama_file_unik;
							}
							$_POST['cu']['api_key'] = generateApiKey();
						break;
					}
				$result = $model->create($page,$_POST['cu']);
				echo'ok';
			}
		} else {
			
			$id = $_POST['id'];
			$_POST['cu']['updatedate'] = date("Y-m-d H:i:s");
			switch($page)  
			{
				case 'participant':
					//$_POST['cu']['password'] = $_POST['cu']['username'];
					$_POST['cu']['password'] = Encryption::encrypt($_POST['cu']['username']);//$_POST['cu']['username'];
					$_POST['cu']['date_birthday'] = date('Y-m-d',strtotime($_POST['cu']['date_birthday']));
					$lokasi_file    = $_FILES['fupload']['tmp_name'];
					$tipe_file      = $_FILES['fupload']['type'];
					$nama_file      = $_FILES['fupload']['name'];
					$nama_file_unik = $_POST['cu']['nis']."_".$nama_file; 
					if (empty($lokasi_file)==false) 
					{
						FotoUpload($nama_file_unik,$page);
						$_POST['cu']['photo_url'] = $nama_file_unik;
					}
					$_POST['cu']['api_key'] = generateApiKey();
				break;
			}	

			$result = $model->update($page,$_POST['cu'],$id);
			echo'updateok';
		}
	}
	
	function generateApiKey(){
        return md5(uniqid(rand(), true));
    }
	
?>