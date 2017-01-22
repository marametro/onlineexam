<?PHP
	require_once '../../mssql/config.php';
	require_once '../../model/QuestionsManagement/qm_model.php';
	require_once'../../helper/thumb.php';
	require_once'../../helper/Encryption.php';

	$model =new QmModel(); 
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
		$data = false;

		switch($page)  
		{
			case 'tryout':
			break;
			case 'quest':
			break;
			case 'quest_backup':
			break;
			case 'manage':
				$key = array(
											'elearn_qm_tryout_id' => $_POST['cu']['elearn_qm_tryout_id'],
											'code' => $model->getCode($page)
										);
				$data = $model->check_data($page,$key);
			break;
			default:
				$key = array('name' => $_POST['cu']['name']);
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
						case 'quest':
							$lokasi_file    = $_FILES['fupload']['tmp_name'];
							$tipe_file      = $_FILES['fupload']['type'];
							$nama_file      = $_FILES['fupload']['name'];
							$nama_file_unik = (string)($model->getLastID($page)+1)."_".$nama_file; 
							if (empty($lokasi_file)==false) 
							{
								FotoUpload($nama_file_unik,$page);
								$_POST['cu']['photo_url'] = $nama_file_unik;
							}
						break;
						case 'quest_backup':
							$date_start = date('Y-m-d',strtotime($_POST['cu']['date_start']));
							$date_end = date('Y-m-d',strtotime($_POST['cu']['date_end']));
							$result = $model->executeNonQuery("call elearn_qm_quest_backup('".$date_start."','".$date_end."') ");
						break;
						case 'tryout':
							$_POST['cu']['date_start'] = date('Y-m-d',strtotime($_POST['cu']['date_start']));
							$_POST['cu']['date_end'] = date('Y-m-d',strtotime($_POST['cu']['date_end']));
						break;
						case 'manage':
							$_POST['cu']['code'] = $model->getCode($page);
							$result = $model->create($page,$_POST['cu']);
							$parentID = $model->getLastID($page);

							$vals = array_values($_POST['school']);
							$fields = array_keys($_POST['school']);
							$i = 0;
							foreach ($fields as $col){
								$dataSchool = array(
									'elearn_qm_manage_id' => $parentID,
									'elearn_md_school_id' => $vals[$i]
								);
								$result = $model->create("manage_school",$dataSchool);
								$i++;
							}

							$vals = array_values($_POST['quest']);
							$fields = array_keys($_POST['quest']);
							$i = 0;
							foreach ($fields as $col){
								$dataQuest = array(
									'elearn_qm_manage_id' => $parentID,
									'elearn_qm_quest_id' => $vals[$i]
								);
								$result = $model->create("manage_quest",$dataQuest);
								$i++;
							}

						break;
					}

					switch($page)  
					{
						
						case 'tryout_kind':
						case 'quest':
						case 'tryout':
							$result = $model->create($page,$_POST['cu']);
						break;
					}
				
				echo'ok';
			}
		} else {
			
			$id = $_POST['id'];
			$data = false;

			switch($page)  
			{
				case 'tryout':
				break;
				case 'quest':
				break;
				case 'manage':
					if ($_POST['elearn_qm_tryout_id']!=$_POST['cu']['elearn_qm_tryout_id']
							or $_POST['code']!=$_POST['cu']['code']){
								$key = array(
															'elearn_qm_tryout_id' => $_POST['cu']['elearn_qm_tryout_id'],
															'code' => $model->getCode($page)
														);
								$data = $model->check_data($page,$key);
					}
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
					case 'quest':
						$lokasi_file    = $_FILES['fupload']['tmp_name'];
						$tipe_file      = $_FILES['fupload']['type'];
						$nama_file      = $_FILES['fupload']['name'];
						$nama_file_unik = ((string)($id))."_".$nama_file;  
						if (empty($lokasi_file)==false) 
						{
							FotoUpload($nama_file_unik,$page);
							$_POST['cu']['photo_url'] = $nama_file_unik;
						}
					break;
					case 'tryout':
						$_POST['cu']['date_start'] = date('Y-m-d',strtotime($_POST['cu']['date_start']));
						$_POST['cu']['date_end'] = date('Y-m-d',strtotime($_POST['cu']['date_end']));
					break;
					case 'manage':
						$result = $model->deletePermanent("manage_school","elearn_qm_manage_id",$id);
						$vals = array_values($_POST['school']);
						$fields = array_keys($_POST['school']);
						$i = 0;
						foreach ($fields as $col){
							$dataSubClass = array(
								'elearn_qm_manage_id' => $id,
								'elearn_md_school_id' => $vals[$i]
							);
							$result = $model->create("manage_school",$dataSubClass);
							$i++;
						}

						$result = $model->deletePermanent("manage_quest","elearn_qm_manage_id",$id);
						$vals = array_values($_POST['quest']);
						$fields = array_keys($_POST['quest']);
						$i = 0;
						foreach ($fields as $col){
							$dataQuest = array(
								'elearn_qm_manage_id' => $id,
								'elearn_qm_quest_id' => $vals[$i]
							);
							$result = $model->create("manage_quest",$dataQuest);
							$i++;
						}
					break;
				}	

				$result = $model->update($page,$_POST['cu'],$id);
				echo'updateok';

			}



		}
	}
	
?>