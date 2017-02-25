
<?php $page=strtolower($_GET['page']); ?>

<?php switch($page): 

	case 'quest_definition': ?>
    
    <div class="col-sm-8">
	  	<div class="form-group">
			<label for="cu_name" class="col-sm-4 control-label">Definition Name Soal</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="cu_definition_name" name="cu[definition_name]" value="<?PHP echo $definition_name; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="cu_name" class="col-sm-4 control-label">Jumlah Benar</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="cu_correct_ammount" name="cu[correct_amount]" value="<?PHP echo $correct_amount; ?>">	
			</div>
		</div>
		<div class="form-group">
			<label for="cu_name" class="col-sm-4 control-label">Jumlah Salah</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="cu_wrong_amount" name="cu[wrong_amount]" value="<?PHP echo $wrong_amount; ?>">	
			</div>
		</div>
		<div class="form-group">
			<label for="cu_name" class="col-sm-4 control-label">Tidak Dikerjakan</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="cu_unworked" name="cu[unworked]" value="<?PHP echo $unworked; ?>">	
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
	
	<?PHP case 'tryout_kind': ?>
    <div class="col-sm-8">
	  	<div class="form-group">
				<label for="cu_name" class="col-sm-4 control-label">Jenis Tryout</label>
				<div class="col-sm-6">
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

	<?php case 'tryout': ?>
		<div class="col-sm-8">
    	<div class="form-group">
				<label for="txtName" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="cu_title" name="cu[title]" value="<?PHP echo $txtTitle; ?>">
				</div>
		</div>
    	<div class="form-group">
				<label for="ddCat" class="col-sm-3 control-label">Jenis Tryout</label>
				<div class="col-sm-6">
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_qm_tryout_kind_id" name="cu[elearn_qm_tryout_kind_id]">
						<?PHP
							
							foreach($dataCat as $key)
							{
								$selected="";
								($data->elearn_qm_tryout_kind_id==$key->id)? $selected="selected" : $selected="";  
								echo "<option value=$key->id $selected>$key->name</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
		</div>
		<div class="form-group">
			<label for="ddQuestCat" class="col-sm-3 control-label">Mata Pelajaran</label>
			<div class="col-sm-6">
				<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_md_study_id" name="cu[elearn_md_study_id]">
					<?PHP
						echo "<option>PILIH</option>";
						foreach($dataStudy as $key)
						{
							$selected="";
							($data->elearn_md_study_id==$key->id)? $selected="selected" : $selected="";  
							echo "<option value=$key->id $selected>$key->name</option>";
						}
						echo "</select>";
					?>
				</select>
			</div>
		</div>
	    <div class="form-group">
			<label for="ddDefSoal" class="col-sm-3 control-label">Definition Soal</label>
			<div class="col-sm-6">
				<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_qm_quest_definition_id" name="cu[elearn_qm_quest_definition_id]">
					<?PHP
						echo "<option>PILIH</option>";
						foreach($dataDefinition as $key)
						{
							$selected="";
							($data->elearn_qm_quest_definition_id==$key->id)? $selected="selected" : $selected="";  
							echo "<option value=$key->id $selected>$key->definition_name</option>";
						}
						echo "</select>";
					?>
				</select>
			</div>
		</div>
	    <div class="form-group">
				<label for="txtName" class="col-sm-3 control-label">Nilai Kelulusan</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" id="cu_min_value" name="cu[min_value]" value="<?PHP echo $min_value; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="txtName" class="col-sm-3 control-label">Lama Pengerjaan</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" placeholder="Menit" id="cu_time" name="cu[time]" value="<?PHP echo $time; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="date_start" class="col-sm-3 control-label">Tanggal Aktif Terbit</label>
				<div class="col-sm-4">	
					<i class="fa fa-calendar"></i>					
					<input type="text" class="form-control cols DtPicker" id="cu_date_start" name="cu[date_start]" value="<?PHP echo $date_start; ?>">
				</div>
				<label class="col-sm-1 control-label">s/d</label>
				<div class="col-sm-4">	
					<i class="fa fa-calendar"></i>					
					<input type="text" class="form-control cols DtPicker" id="cu_date_end" name="cu[date_end]" value="<?PHP echo $date_end; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="rbPublish" class="col-sm-3 control-label">Publish</label>
				<div class="col-sm-6">
					<input type="radio" name="cu[publish]" class="minimal-red" value="no" <?php echo ($publish=='no' or $_GET['action']=='add')?'checked':'' ?>> Tidak
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[publish]" class="minimal-red" value="yes" <?php echo ($publish=='yes')?'checked':'' ?>> Ya 
				</div>
			</div>
			<div class="form-group">
				<label for="rbRemedial" class="col-sm-3 control-label">Remedial</label>
				<div class="col-sm-4">
					<input type="radio" id="RbRemedial" name="RbRemedial" class="minimal-red RbRemedial" value="0" <?php echo ($remedial=='0' or $_GET['action']=='add')?'checked':'' ?>> Tidak 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" id="RbRemedial" name="RbRemedial" class="minimal-red RbRemedial" value="1" <?php echo ($remedial!='0')?'checked':'' ?>> Mengulang :
				</div>
				<div class="col-sm-3">
					<input type="number" class="col-sm-1 form-control" id="cu_remedial" name="cu[remedial]" value="<?PHP echo $remedial; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="type_quest" class="col-sm-3 control-label">Tipe Soal</label>
				<div class="col-sm-6">
					<input type="radio" name="cu[type_quest]" class="minimal-red" value="reguler" <?php echo ($type_quest=='reguler' or $_GET['action']=='add')?'checked':'' ?>> Tidak Acak
					&nbsp;
					<input type="radio" name="cu[type_quest]" class="minimal-red" value="random" <?php echo ($type_quest=='random')?'checked':'' ?>> Acak 
				</div>
			</div>
			<div class="form-group">
				<label for="amount_quest" class="col-sm-3 control-label">Jumlah Terbit Soal</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" id="cu-amount_quest" name="cu[amount_quest]" value="<?PHP echo $amount_quest; ?>">
				</div>
			</div>
			<div class="form-group">
			  <textarea class="form-control" rows="3" id="cu_attention" placeholder="Pesan dan Saran..." name="cu[attention]"><?PHP echo $attention; ?></textarea>
			</div>
			<div class="box-footer with-border">
				<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Simpan">
				</div>
			</div>
		</div>
	<?php break; ?>

	<?php case 'quest': ?>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="cu_elearn_md_study_id" class="col-sm-4 control-label">Mata Pelajaran</label>
				<div class="col-sm-6">
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
				<label for="radio" class="col-sm-4 control-label">Level</label>
				<div class="col-sm-6">
					<input type="radio" name="cu[level]" class="minimal-red" value="hard" <?php echo ($level=='hard')?'checked':'' ?>> Hard
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[level]" class="minimal-red" value="medium" <?php echo ($level=='medium')?'checked':'' ?>> Medium
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[level]" class="minimal-red" value="easy" <?php echo ($level=='easy')?'checked':'' ?>> Easy
				</div>
			</div>
		</div>
		<div class="col-sm-6">
		</div>
		<div class="col-sm-6">
	    <div class="form-group">
				<label for="radio" class="col-sm-4 control-label">Kunci Jawaban</label>
				<div class="col-sm-6">
					<input type="radio" name="cu[answer]" class="minimal-red" value="A" <?php echo ($answer=='A')?'checked':'' ?>> A 
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[answer]" class="minimal-red" value="B" <?php echo ($answer=='B')?'checked':'' ?>> B
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[answer]" class="minimal-red" value="C" <?php echo ($answer=='C')?'checked':'' ?>> C
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[answer]" class="minimal-red" value="D" <?php echo ($answer=='D')?'checked':'' ?>> D
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="cu[answer]" class="minimal-red" value="E" <?php echo ($answer=='E')?'checked':'' ?>> E
				</div>
			</div>
			<div class="form-group">
				<label for="fupload" class="col-sm-4 control-label">Gambar</label>
				<div class="col-sm-6">
					<input type="file" id="fupload" name="fupload">
				</div>
			</div>
		</div>
		<div class="col-sm-10">
		</div>
		<div class="col-sm-1">
			<div class="form-group">
				<div class="box-footer with-border">
					<label class="col-sm-2 control-label"></label>
					<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Simpan">
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<!--<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>-->
			
			 <script>
			
		     // $('#cu_elearn_md_study_id').select2();
			   // $(function () {
				 // CKEDITOR.replace('cu_question');
				 // CKEDITOR.replace('cu_choice_a');
				 // CKEDITOR.replace('cu_choice_b');
				 // CKEDITOR.replace('cu_choice_c');
				 // CKEDITOR.replace('cu_choice_d');
				 // CKEDITOR.replace('cu_choice_e');
				 // CKEDITOR.replace('cu_explanation');
				// $(".textarea").wysihtml5();
				// $(".textarea").wysihtml5({
			
			// "events": {
			// "load": function() 
			// {
			    // console.log("Loaded!");
			    // var $iframe = $(this.composer.iframe);
			    // var $body = $(this.composer.element);
			       // $body.css({
			        // 'min-height': 0,
					// 'line-height': '20px',
			        // 'overflow': 'hidden',
			       // });
					// var scrollHeightInit = $body[0].scrollHeight;
					// console.log("scrollHeightInit", scrollHeightInit);
					// var bodyHeightInit = $body.height();
					// console.log("bodyHeightInit", bodyHeightInit);
					// var heightInit = Math.min(scrollHeightInit, bodyHeightInit);
					// $iframe.height(heightInit);
			 // }
			   // }
			// });
			   // });
			 </script>
			
			<div class="form-group">
			  <h4 class="box-title"><b>Pertanyaan :</b></h4>
			<div class="row-md-4">
			  	<textarea class="myTextEditor" rows="3" id="cu_question" name="cu[question]"><?PHP echo $question; ?></textarea>
			</div>
			</div>
			<div class="form-group">
			  <h4 class="box-title"><b>Pilihan A :</b></h4>
			  <textarea class="myTextEditor" rows="2" id="cu_choice_a" name="cu[choice_a]"><?PHP echo $choice_a; ?></textarea>
			</div>
			<div class="form-group">
			  <h4 class="box-title"><b>Pilihan B :</b></h4>
			  <textarea class="myTextEditor" rows="2" id="cu_choice_b" name="cu[choice_b]"><?PHP echo $choice_b; ?></textarea>
			</div>
			<div class="form-group">
			  <h4 class="box-title"><b>Pilihan C :</b></h4>
			  <textarea class="myTextEditor" rows="2" id="cu_choice_c" name="cu[choice_c]"><?PHP echo $choice_c; ?></textarea>
			</div>
			<div class="form-group">
			  <h4 class="box-title"><b>Pilihan D :</b></h4>
			  <textarea class="myTextEditor" rows="2" id="cu_choice_d" name="cu[choice_d]"><?PHP echo $choice_d; ?></textarea>
			</div>
			<div class="form-group">
			  <h4 class="box-title"><b>Pilihan E :</b></h4>
			  <textarea class="myTextEditor" rows="2" id="cu_choice_e" name="cu[choice_e]"><?PHP echo $choice_e; ?></textarea>
			</div>
			<div class="form-group">
			  <h4 class="box-title"><b>Pembahasan :</b></h4>
			  <textarea class="myTextEditor" rows="3" id="cu_explanation" name="cu[explanation]"><?PHP echo $explanation; ?></textarea>
			</div>
			<div class="box-footer with-border">
			</div>
		</div>
	<?php break; ?>

	<?php case 'quest_backup': ?>
		<div class="col-sm-8">
			<div class="form-group">
				<label for="date_start" class="col-sm-3 control-label">Periode Created</label>
				<div class="col-sm-4">	
					<i class="fa fa-calendar"></i>					
					<input type="text" class="form-control cols DtPicker" id="cu_date_start" name="cu[date_start]" value="<?PHP echo $date_start; ?>">
				</div>
				<label class="col-sm-1 control-label">s/d</label>
				<div class="col-sm-4">	
					<i class="fa fa-calendar"></i>					
					<input type="text" class="form-control cols DtPicker" id="cu_date_end" name="cu[date_end]" value="<?PHP echo $date_end; ?>">
				</div>
			</div>
			<div class="box-footer with-border">
				<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Backup">
				</div>
			</div>
		</div>
	<?php break; ?>

	<?php case 'manage': ?>
		<div class="col-sm-12">
			<?php if($_GET['action']=='edit'){ ?>
		    <div class="form-group">
					<label for="cu_name" class="col-sm-1 control-label">Kode</label>
					<div class="col-sm-4">
						<input type="hidden" id="code" name="code" value="<?php echo $code; ?>"> 
						<input type="text" readonly="true" class="form-control" id="cu_code" name="cu[code]" value="<?PHP echo $code; ?>">
					</div>
				</div>
			<?php }?>
	    <div class="form-group">
				<label for="cu_elearn_qm_tryout_id" class="col-sm-1 control-label">Judul</label>
				<div class="col-sm-4">
					<input type="hidden" id="elearn_qm_tryout_id" name="elearn_qm_tryout_id" value="<?php echo $elearn_qm_tryout_id; ?>"> 
					<select class="form-control select2" style="width: 100%;height:100%; " id="cu_elearn_qm_tryout_id" name="cu[elearn_qm_tryout_id]">
						<?PHP
							foreach($dataTryout as $key)
							{
								$selected="";
								($data->elearn_qm_tryout_id==$key->id)? $selected="selected" :$selected="";  
								echo "<option amountquest=$key->amount_quest value=$key->id $selected>$key->title</option>";
							}
							echo "</select>";
						?>
					</select>
				</div>
			</div>
	    <div class="form-group">
				<label for="ddQuestCat" class="col-sm-1 control-label">Sekolah</label>
				<div class="col-sm-11">
		    	<table class="table table-bordered table-striped  table-hover">
	  				<tr>
				    	<?php
				    		$noSchool=1;
								foreach($dataSchool as $key)
								{?>

										<!-- for get checked class sub  -->
										<?php 
											$checked="";
											$vals = array_values($dataSchoolArray);
											$fields = array_keys($dataSchoolArray);
											$i = 0;
											foreach ($fields as $col){
												$vals2 = array_values($vals[$i]);
												$fields2 = array_keys($vals[$i]);

												if ($key->id==$vals2[4]){
													$checked="checked='true'";
												}

												$i++;
											}
										?>

			    					<td>
											<label class="checkbox-inline class_sub">
											<input type="checkbox" id="school" name="school[]" value="<?php echo $key->id?>" <?php echo $checked ?> >
											<?php echo $key->name ?>
											</label>
										</td>
										<?php if ($noSchool%8==0){ echo "</tr><tr>";} ?>		
							<?php
								$noSchool = $noSchool +1;
							 }?>
					</table>
				</div>
			</div>

			<div class=" box-header box-footer with-border">
				<div class="form-group">
					<div class="col-sm-12 rows-sm-2">
						<label class="col-sm-2 control-label">PILIH SOAL :</label>
						<label class="col-sm-9 control-label"></label>
						<input  type="submit" id="save" name="save" class="btn btn-primary" Value="Publish">
					</div>
				</div>
			</div>
			<div class="form-group">
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<table class="table table-bordered table-striped  table-hover">
					<!-- <table id="dataTable" class="table table-bordered table-striped  table-hover datatables" style='font-size:12px;'> -->
				  	<thead>
							<tr>
							<th class="col-md-1">No</th>
						    <th class="col-md-3"></th>
						    <th class="col-md-8">Soal</th>
							<th class="col-md-0"> Pilih</th>
							</tr>
						</thead>
						<tbody>
							<?PHP
								$numbers = 1;
								foreach ($dataQuest as $key) 
								{ 
							?>
							<tr>
								<td><?PHP echo $numbers; ?></td>
						    <td>
						    	<table class="table table-bordered table-striped">
						    		<tr>
						    			<td class="col-sm-5">Mata Pelajaran</td>
						    			<td class="col-sm-0">:</td>
						    			<td class="col-sm-8"><?PHP echo $key->study; ?></td>
						    		</tr>
						    		<tr>
						    			<td>Level</td>
						    			<td>:</td>
						    			<td><?PHP echo $key->level; ?></td>
						    		</tr>
						    		<tr>
						    			<td>Jawaban</td>
						    			<td>:</td>
						    			<td><?PHP echo $key->answer; ?></td>
						    		</tr>
						    	</table>
						    </td>
						    <td>
						    	<table class="table table-bordered table-striped  table-hover">
						    		<tr>
						    			<td class="col-sm-2">Pertanyaan</td>
						    			<td class="col-sm-0">:</td>
						    			<td class="col-sm-12"><?PHP echo $key->question; ?></td>
						    		</tr>
						  		</table>
						    	<table class="table table-bordered table-striped  table-hover">
						    		<tr>
						    			<td class="col-sm-2">A</td>
						    			<td class="col-sm-0">:</td>
						    			<td class="col-sm-12"><?PHP echo $key->choice_a; ?></td>
						    		</tr>
										<tr>
						    			<td>B</td>
						    			<td>:</td>
						    			<td><?PHP echo $key->choice_b; ?></td>
						    		</tr>
						    		<tr>
						    			<td>C</td>
						    			<td>:</td>
						    			<td><?PHP echo $key->choice_c; ?></td>
						    		</tr>
						    		<tr>
						    			<td>D</td>
						    			<td>:</td>
						    			<td><?PHP echo $key->choice_d; ?></td>
						    		</tr>
						    		<tr>
						    			<td>E</td>
						    			<td>:</td>
						    			<td><?PHP echo $key->choice_e; ?></td>
						    		</tr>
						    	</table>
						    	<table class="table table-bordered table-striped  table-hover">
						    		<tr>
						    			<td class="col-sm-2">Pembahasan</td>
						    			<td class="col-sm-0">:</td>
						    			<td class="col-sm-12"><?PHP echo $key->explanation; ?></td>
						    		</tr>
						  		</table>
						    </td>

								<!-- for get checked question sub  -->
								<?php 
									$checked="";
									$vals = array_values($dataQuestArray);
									$fields = array_keys($dataQuestArray);
									$i = 0;
									foreach ($fields as $col){
										$vals2 = array_values($vals[$i]);
										$fields2 = array_keys($vals[$i]);

										if ($key->id==$vals2[4]){
											$checked="checked='true'";
										}

										$i++;
									}
								?>

								<td class="center"><input type="checkbox" id="quest" name="quest[]" value="<?php echo $key->id?>" <?php echo $checked ?>></td>
							</tr>
							<?PHP 
								$numbers++; 
								}
							?>
						</tbody>	  
				  </table>
				</div>
			</div>
		</div>

	<?php break; ?>

<?php 
		default:
			echo"Not Form";
	endswitch; ?>

