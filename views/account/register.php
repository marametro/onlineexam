
<div class="register-box">
  <div class="register-logo">
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">FORM PENDAFTARAN</p>
    <form action="" method="post">
		<img class="center-block" id="loading-image-add" src="images/loading.gif" style="display:none;"/>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Nama Lengkap" id="txtFullname" name="txtFullname">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="email" class="form-control" placeholder="Username" id="txtUsername" name="txtUsername">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="email" class="form-control" placeholder="Email" id="txtEmail" name="txtEmail">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" placeholder="kata Sandi" id="txtPassword" name="txtPassword">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" placeholder="Ulangi Kata Sandi" id="txtRepeatPassword" name="txtRepeatPassword">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<div class="row">
		<div class="col-xs-8">
			<div class="checkbox icheck">
				<button type="submit" class="btn btn-primary  btn-flat" id="btnregister" name="btnregister">Daftar</button>
			</div>
		</div>
		</div>
		<div class="col-xs-4">
		</div>
    </form>
    <div class="social-auth-links text-center">
      <p>- ATAU -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Daftar Menggunakan
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Daftar Menggunakan
        Google+</a>
    </div>
    <a href="login" class="text-center">Sudah Daftar</a>
  </div>
</div>
<script type="text/javascript"> 
	$('#btnregister').click(function(event) 
	{		
		event.preventDefault();
		var txtFullname = $('#txtFullname').val();
		if(txtFullname == "") 
		{
			alert('Nama Lengkap Tidak Boleh Kosong');
			return;
		}
		
		var txtUsername = $('#txtUsername').val();
		if(txtUsername == "") 
		{
			alert('Username Tidak Boleh Kosong');
			return;
		}
		
		var txtEmail = $('#txtEmail').val();
		if(txtEmail == "") 
		{
			alert('Email Tidak Boleh Kosong');
			return;
		}
		
		var txtPassword = $('#txtPassword').val();
		if(txtPassword == "") 
		{
			alert('kata sandi tidak Boleh Kosong');
			return;
		}
		
		var txtRepeatPassword = $('#txtRepeatPassword').val();
		if(txtRepeatPassword == "") 
		{
			alert('Ulangi kata sandi Tidak Boleh Kosong');
			return;
		}
		
		var action = 'register';
		var datas="txtFullname="+txtFullname+"&txtUsername="+txtUsername+"&txtEmail="+txtEmail+"&txtPassword="+txtPassword+
				  "&txtRepeatPassword="+txtRepeatPassword+"&action="+action;
		$.ajax({
		   type: "POST",
		   url: "Auth/ajax_authentication.php",
		   data: datas,
		beforeSend: function() {
		  $("#loading-image-add").show();
		},
		}).done(function( data ) {
			$("#loading-image-add").hide();
			alert(data);
			if (data ==="Account created. Activation email sent to email.") {
				window.location.href = "login";
			}
		});
	});	 
</script>

