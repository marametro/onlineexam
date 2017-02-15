<script src="../views/QuestionsManagement/form.js"></script>

<section style="padding: 0px 15px 0;">
	<h3>
		<small><ol class="breadcrumb">
		<li><a href="#"><i></i>Manajemen Ujian</a></li>
		<li class="active">Form Data <?php echo $title; ?></li>
	  </ol></small>
	</h3>  
</section>
<div class="col-xs-12">	
<div class="box">
	<div class="box-body">
	 <div class="box-header with-border">
		<a href='?page=<?php echo $_GET['page']; ?>&mod=qm&action=list' class="btn btn-warning btn-sm pull-right">
			Kembali Halaman Sebelumnya
		</a>
        <h4 class="box-title">Form Data <?php echo $title; ?></h4>
      </div>
	<div id="info" class="box-header"></div>
	<form  id="myfrm" method="POST" class="form-horizontal" enctype="multipart/form-data">
		<input type="hidden" id="page" name="page" value="<?php echo $_GET['page']; ?>"> 
		<input type="hidden" id="<?php echo $id!='' ? 'cu_updateby' : 'cu_createby' ; ?>" name="cu[<?php echo $id!='' ? 'updateby' : 'createby' ; ?>]" value="<?php echo $_SESSION['iduser']; ?>"> 
		<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['iduser']; ?>"> 
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>"> 
		<input type="hidden" id="action" name="action" value="<?php echo $_GET['action'];?>"> 
		<img class="center-block" id="loading-image-add" src="../images/loading.gif" style="display:none;"/>
	  	<?php include "form_data.php"; ?>
	</form>
	</div>
	</div>
</div>
