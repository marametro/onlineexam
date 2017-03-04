<script src="../views/MasterData/list.js"></script>

<section style="padding: 0px 15px 0;">
	<h3>
		<small><ol class="breadcrumb">
		<li><a href="#"><i></i>Manajemen Data Master</a></li>
		<li class="active">Data <?php echo $title; ?></li>
	  </ol></small>
	</h3>  
</section>
<div class="col-xs-12">
<div id="info"></div>
<div class="box">
	<div class="box-header">
		<h3>
			<?PHP echo $_SESSION['permission']['elearn_md_'.$_GET['page']]['add'] ? 
				"
				<a  href='?page=".$_GET['page']."&mod=md&action=add' class='btn btn-success btn-sm'>
				Tambah Data
				</a>
				" : ""; ?>
		</h3>
	</div>
	<div class="box-body">
		<input type="hidden" id="page" name="page" value="<?php echo $_GET['page']; ?>"> 
		<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['iduser']; ?>"> 
	  <table id="dataTable" class="table table-bordered table-striped datatables">
	  		<?php include "list_data.php"; ?>
	  </table>
	</div>
</div>
</div>
