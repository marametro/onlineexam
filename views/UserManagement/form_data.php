<?php $page=strtolower($_GET['page']); ?>

<?php switch($page): 
	
	case 'role': ?>
    <div class="col-sm-8">
    	<div class="form-group">
				<label for="cu_name" class="col-sm-3 control-label">Role</label>
				<div class="col-sm-8">
					<input type="hidden" id="name" name="name" value="<?php echo $name; ?>"> 
					<input type="text" class="form-control" id="cu_name" name="cu[name]" value="<?PHP echo $name; ?>">
				</div>
			</div>
			<div class="box-footer with-border">
				<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Simpan">
				</div>
			</div>
		</div>
	<?php break; ?>

	<?php case 'user': ?>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="cu_username" class="col-sm-4 control-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="cu_username" name="cu[username]" value="<?PHP echo $username; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_fullname" class="col-sm-4 control-label">Nama User</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_fullname" name="cu[fullname]" value="<?PHP echo $fullname; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_email_address" class="col-sm-4 control-label">E-Mail</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_email_address" name="cu[email_address]" value="<?PHP echo $email_address; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cu_contact_number" class="col-sm-4 control-label">No Telepon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_contact_number" name="cu[contact_number]" value="<?PHP echo $contact_number; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="radio" class="col-sm-4 control-label">Jenis Kelamin</label>
				<div class="col-sm-6">
					<input type="radio" name="cu[gender]" class="minimal-red" value="L" <?php echo ($gender=='L')?'checked':'' ?>> Laki-laki
					<input type="radio" name="cu[gender]" class="minimal-red" value="W" <?php echo ($gender=='W')?'checked':'' ?>> Wanita
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
				<label for="cu_address" class="col-sm-3 control-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  id="cu_address" name="cu[address]"  value="<?PHP echo $address; ?>">
				</div>
			</div>
			 <div class="form-group">
				<label for="cu_date_birthday" class="col-sm-3 control-label">Tanggal Lahir:</label>
					<div class="col-sm-6">	
						<i class="fa fa-calendar"></i>					
						<input type="text" class="form-control cols DtPicker" id="cu_date_birthday" name="cu[date_birthday]" value="<?PHP echo $date_birthday; ?>">
					</div>
			 </div>
			<div class="form-group">
				<label for="fupload" class="col-sm-3 control-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" id="fupload" name="fupload">
				</div>
			</div>
			<?php 
				$disabledSelect = "";
				if($_SESSION['role_name']=='IT Administrator' or $_SESSION['role_name']=='Admin'){ 
				}else{
					$disabledSelect = "disabled='disabled'";					
				}
			?>
			<div class="form-group">
				<label for="cu_elearn_um_role_id" class="col-sm-3 control-label">Role</label>
				<div class="col-sm-6">
					<select class="form-control select2" <?php echo $disabledSelect ?> style="width: 100%;height:100%; " id="cu_elearn_um_role_id" name="cu[elearn_um_role_id]">
						<?PHP
							foreach($dataRole as $key)
							{
								$selected="";
								($data->elearn_um_role_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			</div>
			<div class="box-footer with-border">
			</div>
		</div>
	<?php break; ?>

	<?php case 'role_permission': ?>
		<div class="col-sm-12">
			<div class="box-header with-border">
				<div class="form-group">
					<label for="txtUsername" class="col-sm-1 control-label">Role</label>
					<div class="col-sm-4">
						<select onchange='SelectRole(this)' class="form-control select2" style="width: 100%;height:100%; " id="ddRole" name="ddRole">
							<?PHP
								foreach($dataRole as $key)
								{
									($_GET['role_id']==$key->id)? $selected="selected" :$selected="";
									echo "<option value=$key->id $selected>$key->name</option>";
								}
								echo "</select>";
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="box-header with-border">
				<div class="form-group">
					<label for="txtUsername" class="col-sm-1 control-label">Modul</label>
					<div class="col-sm-3">
						<select onchange='SelectModul(this)' class="form-control select2" style="width: 100%;height:100%; " id="ddModul" name="ddModul">
							<?PHP
								echo "<option>Select</option>";
								foreach($dataModul as $key)
								{
									($_GET['modul_id']==$key->modul_name)? $selected="selected" :$selected="";
									echo "<option value='$key->modul_name' modul_a='$key->modul_alias' $selected>$key->modul_alias</option>";
								}
								echo "</select>";
							?>
						</select>
					</div>
					<label for="txtUsername" class="col-sm-1 control-label">Feature</label>
					<div class="col-sm-3">
						<select class="form-control select2" style="width: 100%;height:100%; " id="ddFeature" name="ddFeature">
							<?PHP
								foreach($dataFeature as $key)
								{
									// ($_GET['role_id']==$key->id)? $selected="selected" :$selected="";
									echo "<option value='$key->menu_name' menu_a='$key->menu_alias' $selected>$key->menu_alias</option>";
								}
								echo "</select>";
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<label class="col-sm-1 control-label"></label>
						<input onclick="AddFeature(this)" type="button" id="add" name="add" class="btn btn-primary" Value="Add Feature">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
				<table id="dataTable" class="table table-bordered table-striped  table-hover datatables">
			  	<thead>
						<tr>
							<th>No</th>
					    <th>Modul</th>
							<th>Feature</th>
							<th>menu</th>
							<th>add</th>
							<th>edit</th>
							<th>delete</th>
						</tr>
					</thead>
					<tbody>
						<?PHP
							$numbers = 1;
							foreach ($dataRolePermission as $key) 
							{ 
						?>
						<tr>
					    <td><?PHP echo $numbers; ?></td>
							<td><?PHP echo $key->modul_alias; ?></td>
							<td><?PHP echo $key->menu_alias; ?></td>
							<td>
								<input type="hidden" name="permission[<?php echo $key->menu_name?>][menu_name]" value="<?php echo $key->menu_name; ?>">
								<input type="checkbox" name="permission[<?php echo $key->menu_name?>][menu]" <?php echo ($key->menu ? 'checked="true"' : '') ?> >
							</td>
							<td><input type="checkbox" name="permission[<?php echo $key->menu_name?>][add]" <?php echo ($key->add ? 'checked="true"' : '') ?> ></td>
							<td><input type="checkbox" name="permission[<?php echo $key->menu_name?>][edit]" <?php echo ($key->edit ? 'checked="true"' : '') ?> ></td>
							<td><input type="checkbox" name="permission[<?php echo $key->menu_name?>][delete]" <?php echo ($key->delete ? 'checked="true"' : '') ?> ></td>
						</tr>
						<?PHP 
							$numbers++; 
							}
						?>
					</tbody>	  
			  </table>
				</div>
			</div>
			<div class="box-footer with-border">
				<div class="form-group">
					<label class="col-sm-1 control-label"></label>
					<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Simpan">
				</div>
			</div>
		</div>
	<?php break; ?>

<?php 
		default:
			echo"Not Form";
	endswitch; ?>

