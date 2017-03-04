<script src="../views/QuestionsManagement/list.js"></script>
<section style="padding: 0px 15px 0;">
	<h3>
		<small><ol class="breadcrumb">
		<li><a href="#"><i></i>Manajemen Ujian</a></li>
		<li class="active">Data <?php echo $title; ?></li>
	  </ol></small>
	</h3>  
</section>
<div class="col-xs-12">
<div id="info"></div>
<div class="box">
	<div class="box-header">
		<h3>
			<?php $bottom_add = ($_GET['page']!="quest_backup" ? "Tambah Data" : "Backup Soal" ) ?>
			<?PHP echo $_SESSION['permission']['elearn_qm_'.$_GET['page']]['add'] ? 
				"
				<a  href='?page=".$_GET['page']."&mod=qm&action=add' class='btn btn-success btn-sm'>
				$bottom_add
				</a>
				" : ""; ?>
		</h3>

		<?PHP
			if ($_GET['page']=="quest" or $_GET['page']=="quest_backup")
			{
				if ($_SESSION['role_id']==1 or $_SESSION['role_id']==2)
				{
					echo "<div class='box-header box-footer with-border'>
							<label for='ddrole' class='col-sm-1 control-label'>Guru</label>
							<div class='col-sm-3'>
							<select onchange='SelectTeacher(this)' class='form-control select2' style='width: 100%;height:100%;' id='teacher_id' name='teacher_id'>
					";			
					echo "<option value='0'>Select All</option>";
						foreach($dataTeacher as $key)
						{
							($_GET['teacher_id']==$key->id)? $selected="selected" :$selected="";
							echo "<option value=$key->id $selected>$key->fullname</option>";
						}
					echo"</select>";
					echo"</select>
						</div>";
							  echo"<label for='ddrole' class='col-sm-1 control-label'>Mata Pelajaran</label>
										<div class='col-sm-3'>
									<select onchange='SelectStudy(this)' class='form-control select2' style='width: 100%;height:100%;' id='study_id' name='study_id'>
								";			
								echo "<option value='0'>Select All</option>";
										foreach($dataStudySum as $key)
										{
											($_GET['study_id']==$key->id)? $selected="selected" :$selected="";
											echo "<option value=$key->id $selected>$key->name   ($key->jum_soal)</option>";
										}
								echo "</select>";
								echo "</select>
									</div>";
			  	}

							  echo "
										<label for='ddrole' class='col-sm-1 control-label'>Level</label>
										<div class='col-sm-3'>
											<select onchange='SelectLevel(this)' class='form-control select2' style='width: 100%;height:100%;' id='level_id' name='level_id'>
								";			
											($_GET['level_id']=='hard')? $SelHard="selected" : $SelHard="";
											($_GET['level_id']=='medium')? $SelMedium="selected" : $SelMedium="";
											($_GET['level_id']=='easy')? $SelEasy="selected" : $SelEasy="";
											echo "
													<option value='0'>Select All</option>
													<option value='hard' $SelHard>Hard</option>
													<option value='medium' $SelMedium>Medium</option>
													<option value='easy' $SelEasy>Easy</option>
											";
											echo "</select>";
								echo "
											</select>
										</div>
							  ";

							"</div>
					  ";
	
			 }
		?>
	</div>
	<div class="box-body">
		<input type="hidden" id="page" name="page" value="<?php echo $_GET['page']; ?>"> 
		<input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['iduser']; ?>"> 
	  <?php switch($_GET['page']):
	  			case 'quest': ?>
	  				<table class="table table-bordered table-striped table-hover datatables">
					  	
					  	<?php include "list_data.php"; ?>
					  
					  </table>
		<?php break; ?>

	  <?php default: ?>
					  <table id="dataTable" class="table table-bordered table-striped  table-hover datatables" <?php if (strtolower($_GET['page'])=='quest'){ echo "style='font-size:12px;'";} ?>>
					  	
					  	<?php include "list_data.php"; ?>
					  
					  </table>
		<?php endswitch; ?>

	</div>
</div>
</div>