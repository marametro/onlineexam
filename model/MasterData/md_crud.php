<?PHP
	require_once '../../mssql/config.php';
	require_once '../../model/MasterData/md_model.php';

	$model =new MdModel(); 
	$page = $_POST['page'];
	$action = $_POST['action'];
	
	if ($action =='delete') 
	{
		$id = $_POST['id'];
		$datapost = array(
									'isdeleted' => 1,
									'updateby' => $_POST['userid'],
									'updatedate' => date("Y-m-d H:i:s")
								);
		$data = $model->delete($page,$datapost,$id);
		echo'ok';
	}else {

		$id = $_POST['id'];
		$data = false;
		
		switch($page)  
		{
			case 'class_sub':
				$key = array(
					'elearn_md_class_id' => $_POST['cu']['elearn_md_class_id'],
					'elearn_md_major_id' => $_POST['cu']['elearn_md_major_id'],
					'name' => $_POST['cu']['name']
					);
			break;
			default:
				$key = array('name' => $_POST['cu']['name']);
		}
		$data = $model->check_data($page,$key);

		if ($id == '') 
		{
			if ($data == true)
			{
				echo'isexist';
			}else {
				
					$_POST['cu']['createdate'] = date("Y-m-d H:i:s");
					switch($page)  
					{
						case 'participant':
							
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
				case 'class_sub':
					if ($_POST['elearn_md_class_id']!=$_POST['cu']['elearn_md_class_id']
							or $_POST['elearn_md_major_id']!=$_POST['cu']['elearn_md_major_id']
							or $_POST['name']!=$_POST['cu']['name']){								
								$key = array(
									'elearn_md_class_id' => $_POST['cu']['elearn_md_class_id'],
									'elearn_md_major_id' => $_POST['cu']['elearn_md_major_id'],
									'name' => $_POST['cu']['name']
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
					case 'participant':

					break;
				}	
				$result = $model->update($page,$_POST['cu'],$id);
				echo'updateok';
			}

		}
	}
	
?>