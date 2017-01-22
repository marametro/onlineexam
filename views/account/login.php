<div class="login-box">
	<div class="login-logo">
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Login User</p>
		<form action="" method="post">
		<img class="center-block" id="loading-image-add" src="images/loading.gif" style="display:none;"/>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" id="txtusername" name="txtusername" placeholder="Username">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" placeholder="Password" id="txtPassword" name="txtPassword">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
			<div class="col-xs-4">
			<button type="submit" class="btn btn-primary btn-block btn-flat" id="btnLogin" name="btnLogin">Masuk</button>
			</div>
		</div>
		</form>
		<div class="social-auth-links text-center">
			<p>- ATAU-</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat">
			<i class="fa fa-facebook"></i> Masuk Dengan
			Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat">
			<i class="fa fa-google-plus"></i> Masuk Dengan
			Google+</a>
		</div>
		<a href="#">Lupa Password</a><br>
		<a href="register" class="text-center">Belum Mempunyai Account</a>
	</div>
</div>

<script type="text/javascript"> 
	$('#btnLogin').click(function(event) 
	{		
		event.preventDefault();
		var txtusername = $('#txtusername').val();
		if(txtusername == "") 
		{
			alert('Username Tidak Boleh Kosong');
			return;
		}
		
		var txtPassword = $('#txtPassword').val();
		if(txtPassword == "") 
		{
			alert('kata sandi tidak Boleh Kosong');
			return;
		}
		
		var action = 'login';
		var datas="username="+txtusername+"&password="+txtPassword+"&action="+action;
		$.ajax({
			type: "POST",
			 url: "model/Auth/ajax_authentication.php",
			//url: "http://localhost:7777/onlineexam/api/v1/participantlogin",
			data: datas,
			beforeSend: function() {
				$("#loading-image-add").show();
			},
			}).done(function( data ) {
			$("#loading-image-add").hide();
			
			if (data > 0){				
				alert('Login Berhasil');
				window.location.href = "dashboard";
			}else {
				alert('Username Atau Password Salah');
			}
		});
	});	 
</script>
