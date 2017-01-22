<?PHP
	
	require_once'../mssql/config.php';
	
	$page=strtolower($_GET['page']);

	switch($page)  
	{
	
		case 'home':
			require_once"../views/account/welcome.php";
		break;
	
		case 'role':
		case 'user':
		case 'role_permission':
			include_once'UserManagement/um_controller.php';
			$Controller =  new UmController();
			if ($_GET['action']=='list'){
				$Controller->DList($page);
			}
			else if($_GET['action']=='add'){
				$Controller->DAddEdit($page,'add','');	
			}else if ($_GET['action']=='edit'){
				$Controller->DAddEdit($page,'add',$_GET['id']);	
			}
		break;

		case 'class':
		case 'class_sub':
		case 'major':
		case 'study':		
			include_once'MasterData/md_controller.php';
			$Controller =  new MdController();
			if ($_GET['action']=='list'){
				$Controller->DList($page);
			}
			else if($_GET['action']=='add'){
				$Controller->DAddEdit($page,'add','');	
			}else if ($_GET['action']=='edit'){
				$Controller->DAddEdit($page,'add',$_GET['id']);	
			}
		break;

		case 'tryout_kind':
		case 'tryout':
		case 'quest':
		case 'manage':
		case 'quest_backup':
			include_once'QuestionsManagement/qm_controller.php';
			$Controller =  new QmController();
			if ($_GET['action']=='list'){
				$Controller->DList($page);
			}
			else if($_GET['action']=='add'){
				$Controller->DAddEdit($page,'add','');	
			}else if ($_GET['action']=='edit'){
				$Controller->DAddEdit($page,'add',$_GET['id']);	
			}
		break;

		case 'participant':
			include_once'Participant/pc_controller.php';
			$Controller =  new PcController();
			if ($_GET['action']=='list'){
				$Controller->DList($page);
			}
			else if($_GET['action']=='add'){
				$Controller->DAddEdit($page,'add','');	
			}else if ($_GET['action']=='edit'){
				$Controller->DAddEdit($page,'add',$_GET['id']);	
			}
		break;
		
		case 'logout':
			$_SESSION = array();
			session_destroy();
			header("location:login.php");
			exit();
		break;
		
		default:
		require_once"../views/account/welcome.php";
		
	}
	
	


?>