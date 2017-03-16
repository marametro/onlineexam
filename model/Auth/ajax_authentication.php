<?PHP
	require_once '../../mssql/config.php';
	require_once '../../model/Auth/login_model.php';
	require_once '../../helper/Encryption.php';
	session_start();
	
	$loginModel =new LoginModel(); 
	
	$action = $_POST['action'];
	
	if ($action =="register")
	{
		$datapost = array('fullname' => $_POST['txtFullname'], 'username' => $_POST['txtUsername'],
						  'isactive'=> 1);	
		 $register = $auth->register($_POST['txtEmail'],$_POST['txtPassword'],
									 $_POST['txtRepeatPassword'],$datapost,'',TRUE);
		echo $register['message'];
	}
	
	if ($action =="login")
	{	
		$password = Encryption::encrypt($_POST['password']);
		$rows = $loginModel->get_num_row($_POST['username'],$password);
		echo $rows;
		if ($rows > 0) {
			$data = $loginModel->login($_POST['username'],$password);
			
			$_SESSION['login'] = TRUE;
			$_SESSION['nis']=$data->nis;
			$_SESSION['username']=$data->username;
			$_SESSION['fullname']=$data->name;
			$_SESSION['elearn_md_school_id']=$data->elearn_md_school_id;
			$_SESSION['elearn_md_class_id']=$data->elearn_md_class_id;
			$_SESSION['elearn_md_participant_from_id']=$data->elearn_md_participant_from_id;

		}
		
	}
	
?>