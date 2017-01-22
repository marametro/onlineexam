<?php
	ob_start();
	session_start();
	if(empty($_SESSION['username']))
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Anda Harus Login Terlebih Dahulu !!");'; 
		echo 'window.location.href = "login.php";';
		echo '</script>';
	}
	
?>

