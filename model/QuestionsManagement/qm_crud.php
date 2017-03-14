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
			case 'quest_definition':
			break;
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
						case 'quest_definition':
							$datapost = array('definition_name' => $_POST['cu']['definition_name'],
							'correct_amount' => $_POST['cu']['correct_amount'],
							'wrong_amount' => $_POST['cu']['wrong_amount'],	
							'unworked' => $_POST['cu']['unworked'],	
							'createby' => $_POST['userid'],
							'createdate' => date("Y-m-d H:i:s")
							);	
							$result = $model->create($page,$datapost);
						break;
						case 'tryout_kind':
							$lokasi_file    = $_FILES['fupload']['tmp_name'];
							$tipe_file      = $_FILES['fupload']['type'];
							$nama_file      = $_FILES['fupload']['name'];
							$nama_file_unik = (string)($model->getLastID($page)+1)."_".$nama_file; 
							if (empty($lokasi_file)==false) 
							{
								FotoUpload($nama_file_unik,$page);
								$_POST['cu']['icons'] = $nama_file_unik;
							}
							$result = $model->create($page,$_POST['cu']);
						break;
						
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
						
						case 'manage':
							$_POST['cu']['code'] = $model->getCode($page);
							$result = $model->create($page,$_POST['cu']);
							$parentID = $model->getLastID($page);


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

						case 'tryout':			
							$_POST['cu']['date_start'] = date('Y-m-d',strtotime($_POST['cu']['date_start']));
							$_POST['cu']['date_end'] = date('Y-m-d',strtotime($_POST['cu']['date_end']));					
							$result = $model->create($page,$_POST['cu']);
							$parentID = $model->getLastID($page);

							if(!empty($_POST['school'])) 
							{

								echo "$count";
								$vals = array_values($_POST['school']);
								$fields = array_keys($_POST['school']);
								$i = 0;
								foreach ($fields as $col){
										$dataSchool = array(
											'elearn_qm_tryout_id' => $parentID,
											'elearn_md_school_id' => $vals[$i]
										);
										$result = $model->create("tryout_school",$dataSchool);
										$i++;
								}
							}

							$vals = array_values($_POST['class']);
							$fields = array_keys($_POST['class']);
							$i = 0;
							foreach ($fields as $col){
									$dataClass = array(
										'elearn_qm_tryout_id' => $parentID,
										'elearn_md_class_id' => $vals[$i]
									);
									$result = $model->create("tryout_class",$dataClass);
									$i++;
							}

						break;						
					}

					switch($page)  
					{
						
						case 'quest':
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
				case 'quest_definition':
				break;
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

					case 'quest_definition':
						$datapost = array('definition_name' => $_POST['cu']['definition_name'],
						'correct_amount' => $_POST['cu']['correct_amount'],
						'wrong_amount' => $_POST['cu']['wrong_amount'],	
						'unworked' => $_POST['cu']['unworked'],	
						'createby' => $_POST['userid'],
						'createdate' => date("Y-m-d H:i:s")
						);
				
						$result = $model->update($page,$datapost,$id);
					break;
					case 'tryout_kind':
						$lokasi_file    = $_FILES['fupload']['tmp_name'];
						$tipe_file      = $_FILES['fupload']['type'];
						$nama_file      = $_FILES['fupload']['name'];
						$nama_file_unik = ((string)($id))."_".$nama_file;  
						if (empty($lokasi_file)==false) 
						{
							FotoUpload($nama_file_unik,$page);
							$_POST['cu']['icons'] = $nama_file_unik;
						}
					break;
					
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


						$result = $model->deletePermanent("tryout_school","elearn_qm_tryout_id",$id);
						$vals = array_values($_POST['school']);
						$fields = array_keys($_POST['school']);
						$i = 0;
						foreach ($fields as $col){
							$data = array(
								'elearn_qm_tryout_id' => $id,
								'elearn_md_school_id' => $vals[$i]
							);
							$result = $model->create("tryout_school",$data);
							$i++;
						}

						$result = $model->deletePermanent("tryout_class","elearn_qm_tryout_id",$id);
						$vals = array_values($_POST['class']);
						$fields = array_keys($_POST['class']);
						$i = 0;
						foreach ($fields as $col){
							$data = array(
								'elearn_qm_tryout_id' => $id,
								'elearn_md_class_id' => $vals[$i]
							);
							$result = $model->create("tryout_class",$data);
							$i++;
						}

					break;
					case 'manage':
						

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