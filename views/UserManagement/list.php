<script src="../views/UserManagement/list.js"></script>

<section style="padding: 0px 15px 0;">
	<h3>
		<small><ol class="breadcrumb">
		<li><a href="#"><i></i>Manajemen Pengguna</a></li>
		<li class="active">Data <?php echo $title; ?></li>
	  </ol></small>
	</h3>  
</section>
<div class="col-xs-12">
<div id="info"></div>
<div class="box">
	<div class="box-header">
		<h3>

			<?PHP 
				$role_id = ($_GET['page']=="role_permission" ? "&role_id=".(isset($_GET['role_id']) ? $_GET['role_id'] : "1") : "");
				$title_add = ($_GET['page']=="role_permission" ? "Atur Permission" : " Tambah Data");

				echo $_SESSION['permission']['elearn_um_'.$_GET['page']]['add'] ? 
				"
				<a  href='?page=".$_GET['page']."&mod=um&action=add$role_id' class='btn btn-success btn-sm'>
				$title_add	
				</a>
				" : ""; ?>
		</h3>
	</div>

	<?PHP
		if ($_GET['page']=="role_permission"){
			echo "
				<div class='box-header box-footer with-border'>
					<label for='ddrole' class='col-sm-1 control-label'>Role</label>
					<div class='col-sm-4'>
						<select onchange='SelectRole(this)' class='form-control select2' style='width: 100%;height:100%;' id='ddRole' name='ddRole'>
			";			
						echo "<option value='0'>Select All</option>";
						foreach($dataRole as $key)
						{
							($_GET['role_id']==$key->id)? $selected="selected" :$selected="";
							echo "<option value=$key->id $selected>$key->name</option>";
						}
						echo "</select>";
			echo "
						</select>
					</div>
				</div>
		  ";	
		 }
	?>

	<div class="box-body">
		<input type="hidden" id="page" name="page" value="<?php echo $_GET['page']; ?>"> 
		<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['iduser']; ?>"> 
	  <table id="dataTable" class="table table-bordered table-striped table-hover" <?php if (strtolower($_GET['page'])=='quest'){ echo "style='font-size:12px;'";} ?>>
	  	
	  	<?php include "list_data.php"; ?>
	  
	  </table>
	</div>
</div>
</div>
