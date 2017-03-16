<?PHP
	ob_start();
	require_once 'mssql/config.php';
	require_once 'helper/datetime.php';
	require_once 'helper/Encryption.php';

	if (isset($_GET['pages']))
	{
		if ($_GET['pages']=='login')
		{	
			require_once"views/account/login.php";		
		}
		
		if ($_GET['pages']=='register')
		{	
			require_once"views/account/register.php";	
		}
		
		if ($_GET['pages']=='profile')
		{	
			require_once "model/Auth/login_model.php"; 
			require_once"views/account/profile.php";	
		}
		
		if ($_GET['pages']=='dashboard')
		{	
			require_once"model/QuestionsManagement/qm_model.php"; 
			require_once"model/Participant/pc_model.php"; 
			require_once"views/account/welcome.php";
			require_once"views/Quiz/view_tryout.php";
		}

		if ($_GET['pages']=='studytryout')
		{	
			
			require_once"model/QuestionsManagement/qm_model.php"; 
			require_once"views/Quiz/view_study_tryout.php";
		}

		if ($_GET['pages']=='tryout')
		{	
			
			require_once"model/QuestionsManagement/qm_model.php"; 
			require_once"views/Quiz/tryout_box_child.php";
		}

		if ($_GET['pages']=='tryout_box_child')
		{	
			require_once"model/QuestionsManagement/qm_model.php"; 
			require_once"views/Quiz/tryout_box_child.php";
		}
		
		if ($_GET['pages']=='logout')
		{	
			//echo "<script>alert('A');</script>";
			require_once'model/Auth/logout.php';
		}
		
	}else {
	
		require_once"views/account/login.php";	
	}



?>