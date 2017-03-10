<?php $page=strtolower($_GET['page']); ?>

<?php switch($page): 
	
	case 'participant': ?>
    <div class="col-sm-6">
	    <?php if ($id != '') {?>
		  	<div class="form-group">
					<label for="cu_nis" class="col-sm-4 control-label">NIS</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="cu_nis" name="cu[nis]" value="<?PHP echo $nis; ?>" readonly="readonly">
					</div>
				</div>
			<?php }?>
			<input type="hidden" name="cu[api_key]" value="<?php echo $id; ?>"> 
			<div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="cu_username" name="cu[username]" value="<?PHP echo $username; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_place_birthday" class="col-sm-4 control-label">Tempat Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="cu_place_birthday" name="cu[place_birthday]" value="<?PHP echo $place_birthday; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_date_birthday" class="col-sm-4 control-label">Tanggal Lahir</label>
					<div class="col-sm-6">	
						<i class="fa fa-calendar"></i>					
						<input type="text" class="form-control cols DtPicker" id="cu_date_birthday" name="cu[date_birthday]" value="<?PHP echo $date_birthday; ?>">
					</div>
		 	</div>
		 	<div class="form-group">
				<label for="radio" class="col-sm-4 control-label">Jenis Kelamin</label>
				<div class="col-sm-6">
					<input type="radio" name="cu[gender]" class="minimal-red" value="L" <?php echo ($gender=='L')?'checked':'' ?>> Laki-laki
					<input type="radio" name="cu[gender]" class="minimal-red" value="W" <?php echo ($gender=='W')?'checked':'' ?>> Wanita
				</div>
			</div>
			<div class="form-group">
				<label for="cu_address" class="col-sm-4 control-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_address" name="cu[address]"  value="<?PHP echo $address; ?>">
				</div>
			</div>
			<div class="box-footer with-border">
				<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Simpan">
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="cu_contact_number" class="col-sm-4 control-label">No Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_contact_number" name="cu[contact_number]" value="<?PHP echo $contact_number; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_email_address" class="col-sm-4 control-label">E-Mail</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_email_address" name="cu[email_address]" value="<?PHP echo $email_address; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_photo_url" class="col-sm-4 control-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" id="cu_photo_url" name="fupload">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_elearn_md_school_id" class="col-sm-4 control-label">Dari Sekolah</label>
				<div class="col-sm-6">
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_school_id" name="cu[elearn_md_school_id]">
						<?PHP
							foreach($elearn_md_school_id as $key)
							{
								$selected="";
								($data->elearn_md_school_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="cu_elearn_md_school_id" class="col-sm-4 control-label">Kelas</label>
				<div class="col-sm-6">
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_class_id" name="cu[elearn_md_class_id]">
						<?PHP
							foreach($elearn_md_class_id as $key)
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
				<label for="cu_elearn_md_participant_from_id" class="col-sm-4 control-label">Siswa Dari</label>
				<div class="col-sm-6">
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_participant_from_id" name="cu[elearn_md_participant_from_id]">						
					<?PHP
							foreach($elearn_md_participant_from_id as $key)
							{
								$selected="";
								($data->elearn_md_participant_from_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>

					</select>
				</div>
			</div>
		</div>
	<?php break; ?>

<?php 
		default:
			echo"Not Form";
	endswitch; ?>

