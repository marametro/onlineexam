<?php $page=strtolower($_GET['page']); ?>

<?php switch($page): 
	
	case 'school': ?>
    <div class="form-group">
			<label for="cu_name" class="col-sm-4 control-label">Sekolah</label>
			<div class="col-sm-6">
				<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
				<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
			</div>
		</div>
	<?php break; ?>


	<?PHP case 'class': ?>
    <div class="form-group">
			<label for="cu_name" class="col-sm-4 control-label">Kelas</label>
			<div class="col-sm-6">
				<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
				<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
			</div>
		</div>
	<?php break; ?>

	<?php case 'class_sub': ?>
			<div class="form-group">
				<label for="cu_elearn_md_class_id" class="col-sm-4 control-label">Kelas</label>
				<div class="col-sm-6">
					<input type="hidden" id="elearn_md_class_id" name="elearn_md_class_id" value="<?php echo $class_id; ?>"> 
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_class_id" name="cu[elearn_md_class_id]">
						<?PHP
							foreach($dataClass as $key)
							{
								$selected="";
								($data->elearn_md_class_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="cu_elearn_md_major_id" class="col-sm-4 control-label">Jurusan</label>
				<div class="col-sm-6">
					<input type="hidden" id="elearn_md_major_id" name="elearn_md_major_id" value="<?php echo $major_id; ?>"> 
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_major_id" name="cu[elearn_md_major_id]">
						<?PHP
							echo "<option>Select</option>";
							foreach($dataMajor as $key)
							{
								$selected="";
								($data->elearn_md_major_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			</div>
	    <div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Sub Kelas</label>
				<div class="col-sm-6">
					<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
					<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
				</div>
			</div>
	<?php break; ?>

	<?php case 'major': ?>
	    <div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Jurusan</label>
				<div class="col-sm-6">
					<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
					<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
				</div>
			</div>
	<?php break; ?>

	<?php case 'study': ?>
	    <div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Mata Pelajaran</label>
				<div class="col-sm-6">
					<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
					<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
				</div>
			</div>
	<?php break; ?>


	<?php case 'sub_study': ?>
		<div class="form-group">
				<label for="cu_elearn_md_class_id" class="col-sm-4 control-label">Matapelajaran</label>
				<div class="col-sm-6">
					<input type="hidden" id="elearn_md_study_id" name="elearn_md_study_id" value="<?php echo $study_id; ?>"> 
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_study_id" name="cu[elearn_md_study_id]">
						<?PHP
							foreach($dataStudy as $key)
							{
								$selected="";
								($data->elearn_md_study_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			</div>
	    <div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Sub Mata Pelajaran</label>
				<div class="col-sm-6">
					<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
					<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
				</div>
			</div>
	<?php break; ?>


<?php 
		default:
			echo"Not Form";
	endswitch; ?>

