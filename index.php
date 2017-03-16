<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ujian Online</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="asset/plugins/iCheck/square/blue.css">
	<!-- jQuery 2.2.3 -->
	<script src="asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="asset/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="asset/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="asset/dist/js/demo.js"></script>
	<script src="asset/plugins/iCheck/icheck.min.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav login-page"">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
		<div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          </ul>
        </div>
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>UJIAN ONLINE</b></a>
        </div>
      </div>
    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
    <!-- Main content -->  	
		<?php 
			require_once "controller/routefront.php"; 
		?>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2016 <a href="http://bimbel-alqolam.id">Ujian Online</a>.</strong> All rights
      reserved.
    </div>
  </footer>
</div>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
