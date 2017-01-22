<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bimbingan Belajar Alqolam Metro Ujian Online</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	  <link rel="stylesheet" href="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
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
			<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="asset//dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?PHP echo $_SESSION['fullname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?PHP echo $_SESSION['fullname']; ?>
                  <small>Member since Nov. 2016</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
        </div>
        <div class="navbar-header">
          <a href="dashboard" class="navbar-brand"><b>UJIAN ONLINE BIMBINGAN BELAJAR AL QOLAM METRO</b></a>
        </div>
      </div>
    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
    <!-- Main content -->  	
		<section class="content">
    <?php 	
		require_once "controller/routefront.php"; 
	?>
    </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">UJIAN ONLINE BIMBINGAN BELAJAR ALQOLAM METRO</a>.</strong> All rights
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
