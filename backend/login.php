<?php
	ob_start();
	session_start();
	if(isset($_SESSION['username'])!="")
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Anda Sudah Login, Tidak Perlu Melakukan Login Kembali !!");'; 
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elearning Al Qolam</title>
<link href="../asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="../asset/style.css" type="text/css" />
<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/js/jquery.ui.shake.js"></script>
<script>
	$(document).ready(function() 
	{
		$('#btn-login').click(function()
		{
			var username=$("#username").val();
			var password=$("#password").val();
			if (username == '') 
			{
				alert('Enter Your Username ');
				return false;
			}
			if (password =='')
			{
				alert('Enter Your Password');
				return false;
			}

			var dataString = 'username='+username+'&password='+password;
			if($.trim(username).length> 0 && $.trim(password).length> 0)
			{
				$.ajax({
					type: "POST",
					url: "getajaxlogin.php",
					data: dataString,
					cache: false,
					beforeSend: function(){ $("#btn-login").val('Connecting...');},
					success: function(data){
						if(data)
						{
							$("body").load("index.php").hide().fadeIn(1500).delay(6000);
							window.location.href = "index.php?page=home";
						}
						else
						{
							$('#box').shake();
							$("#btn-login").val('Login')
							$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
						}
					}
				});
			}
			return false;
		});
	});
</script>
</head>
<body>
<div class="signin-form">
	<div class="container">
	   <div id="box">
		<form class="form-signin" method="post" id="login-form">
			<h2 class="form-signin-heading">User Login</h2><hr />
			<div class="form-group">
				<input type="email" class="form-control" placeholder="Username" name="username"  id="username" />
				<span id="check-e"></span>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="password" id="password"  />
			</div>
			<hr />
			<div class="form-group">
				<input type="submit" class="btn btn-default"  name="btn-login"  id="btn-login" value="Log In" /> 
			</div>  
			<span class='msg'></span> 
			<div id="error">
			</div>	
		</form>
      </div>
    </div>
</div>
</body>
</html>

