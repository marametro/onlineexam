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
			$_SESSION['username']=$data->username;
			$_SESSION['fullname']=$data->name;
		
		}
		//echo $login;
		/*$_SESSION['login'] = TRUE;
		$uid = $db->query("SELECT id,email FROM elearn_account WHERE email = '$_POST[txtEmail]';", PDO::FETCH_ASSOC)->fetch()['id'];
		$hash = $db->query("SELECT hash FROM sessions WHERE uid = {$uid};", PDO::FETCH_ASSOC)->fetch()['hash'];
		$id = $auth->getSessionUID($hash);
		$data = $auth->getUser($id);
		$_SESSION['uid']=$id;
		$_SESSION['fullname']=$data['fullname'];
		$_SESSION['email']=$data['email'];*/
		//echo $login['error'];
	}
	
?>