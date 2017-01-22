<?PHP 
	$LoginModel =new LoginModel(); 
	$data = $LoginModel->getProfile($_SESSION['username']);
?>
<div class="row">
	<div class="col-md-3">
	  <div class="box box-primary">
		<div class="box-body box-profile">
		  <img class="profile-user-img img-responsive img-circle" src="asset/dist/img/user4-128x128.jpg" alt="User profile picture">
		  <h3 class="profile-username text-center"><?PHP echo $data->name; ?></h3>
		  <p class="text-muted text-center">Software Engineer</p>
		</div>
	  </div>
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Tentang Saya</h3>
		</div>
		<div class="box-body">
		  <strong><i class="fa fa-book margin-r-4"></i> Asal Sekolah</strong>
		  <p class="text-muted">
			Computer Science from the University of Tennessee at Knoxville
		  </p>
		  <hr>
		  <strong><i class="fa fa-map-marker margin-r-4"></i> Location</strong>
		  <p class="text-muted">Metro Lampung</p>
		</div>
	  </div>
	</div>
	<div class="col-md-9">
	  <div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li><a href="#datadiri" data-toggle="tab">IDENTITAS</a></li>
			<li><a href="#education" data-toggle="tab">PENDIDIKAN</a></li>
		</ul>
		<div class="tab-content">
		  <div class="tab-pane" id="datadiri">
			<form class="form-horizontal">
			  <div class="form-group">
				<label for="inputName" class="col-sm-2 control-label">Nama Lengkap</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?PHP echo $data->name; ?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputEmail" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?PHP echo $data->email_address; ?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="txtHp" class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<input type="radio" name="rbsex" class="minimal-red" value="L"<?php echo ($data->gender=='L')?'checked':'' ?>> Laki-laki
					<input type="radio" name="rbsex" class="minimal-red" value="W"<?php echo ($data->gender=='W')?'checked':'' ?>> Wanita
				</div>
			  </div>
			  <div class="form-group">
				<label for="txtHp" class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-3">
					<select class="form-control select2" style="width: 100%;height:100%; " id="ddreligion" name="ddreligion">
						<?PHP
							foreach($datareligion as $key)
							{
								$selected="";
								($data['religion_id']==$key->id)? $selected="selected" :$selected="";  
								echo "<option value=$key->id $selected>$key->religion_name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			  </div>
			  <div class="form-group">
				<label for="txtHp" class="col-sm-2 control-label">Handphone</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="txtHp" placeholder="Handphone" value="<?PHP echo $data->contact_number; ?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputSkills" class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="txtAddress" placeholder="Alamat" value="<?PHP echo $data->address; ?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputExperience" class="col-sm-2 control-label">Tentang Saya</label>

				<div class="col-sm-10">
				  <textarea class="form-control" id="txtAboutMe" placeholder="Tentang Saya"><?PHP echo $data->about_me; ?></textarea>
				</div>
			  </div>			  
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-danger">Update</button>
				</div>
			  </div>
			</form>
		  </div>
		  <div class="tab-pane" id="education">
			<form class="form-horizontal">
			  <div class="form-group">
				<label for="inputName" class="col-sm-1 control-label">TK</label>
				<div class="col-sm-2">
				  <input type="text" class="form-control" id="txtYearsTkFrom" placeholder="Dari Tahun">
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Sampai Tahun">
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Asal Sekolah">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputName" class="col-sm-1 control-label">SD</label>
				<div class="col-sm-2">
				  <input type="text" class="form-control" id="txtYearsTkFrom" placeholder="Dari Tahun">
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Sampai Tahun">
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Asal Sekolah">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputName" class="col-sm-1 control-label">SLTP</label>
				<div class="col-sm-2">
				  <input type="text" class="form-control" id="txtYearsTkFrom" placeholder="Dari Tahun">
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Sampai Tahun">
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Asal Sekolah">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputName" class="col-sm-1 control-label">SMA</label>
				<div class="col-sm-2">
				  <input type="text" class="form-control" id="txtYearsTkFrom" placeholder="Dari Tahun">
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Sampai Tahun">
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="txtYearsTkTo" placeholder="Asal Sekolah">
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
				  <button type="submit" class="btn btn-danger">Update</button>
				</div>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </div>