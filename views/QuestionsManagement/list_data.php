
<?php $page=strtolower($_GET['page']); ?>

<!-- Header -->
<thead>
	<tr>
		<th class="col-sm-0">N0</th>

		<?php switch($page): 
			case 'quest_definition': ?>
			    <th class="col-sm-4">Definition Name</th>
				<th class="col-sm-2">Jumlah Benar</th>
				<th class="col-sm-2">Jumlah Salah</th>
				<th class="col-sm-2">Tidak Dikerjakan</th>
			<?php break; ?>

			<?PHP case 'tryout_kind': ?>
			    <th>Jenis Try Out</th>
			    <th>Icons</th>
		    	<th>Create Date</th>
			<?php break; ?>

			<?php case 'tryout': ?>
			    <th>Judul</th>
			    <th>Jenis Tryout</th>
			    <th>Mata Pelajaran</th>
			    <th>Nilai Min. Kelulusan</th>
			    <th>Create By</th>
		    	<th>Create Date</th>
			<?php break; ?>

			<?php case 'quest': ?>
			<?php case 'quest_backup': ?>
			    <th class="col-xs-4"></th>
			    <th class="col-xs-8">SOAL</th>
			    <?php if ($page=='quest_backup'){ ?>
				    <th class="center">Create By</th>
				    <th class="center">Is Deleted</th>
			    <?php } ?>
			<?php break; ?>

			<?php case 'manage': ?>
			    <th>Kode Manajemen Soal</th>
			    <th>Judul</th>
			    <th>Create By</th>
		    	<th>Create Date</th>
		    	<th class="center">Cetak</th>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>
		
		<?php if($page!="quest_backup"){ ?>
			<th>Aksi</th>
		<?php } ?>
		
	</tr>
</thead>

<!-- Data -->
<tbody>
	<?PHP
		$numbers = 1;
		foreach ($data as $key) 
		{ 
	?>
	<tr>
		
		<?php switch($page): 
			
			case 'quest_definition': ?>
				<td><?PHP echo $numbers; ?></td>
			    <td><?PHP echo $key->definition_name; ?></td>
				<td><?PHP echo $key->correct_amount; ?></td>
				<td><?PHP echo $key->wrong_amount; ?></td>
				<td><?PHP echo $key->unworked; ?></td>
			<?php break; ?>
			
			<?PHP case 'tryout_kind': 
				$icons = $key->icons ? $key->icons : '';
			?>

					<td><?PHP echo $numbers; ?></td>
				    <td><?PHP echo $key->name; ?></td>
				    <td><img src="../Pictures/icons/small_<?php echo $icons; ?>" class="img-circle" with="100px" height="80px"></td>
					<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>

			<?php case 'tryout': ?>
					<td><?PHP echo $numbers; ?></td>
				    <td><?PHP echo $key->title; ?></td>
				    <td><?PHP echo $key->cat; ?></td>
				    <td><?PHP echo $key->study; ?></td>
				    <td><?PHP echo $key->min_value; ?></td>
				    <td><?PHP echo $key->create_by; ?></td>
					<td><?PHP echo $key->createdate; ?></td>
			<?php break; ?>
			<?php case 'quest': ?>
			<?php case 'quest_backup': ?>
				<td class="col-sm-0"><?PHP echo $numbers; ?></td>
			    <td>
			    	<table class="table table-bordered table-striped  table-hover datatables">
			    		<tr>
			    			<td>Mata Pelajaran</td>
			    			<td>:</td>
			    			<td><?PHP echo $key->study; ?></td>
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
			    		<tr>			
			    			<td colspan="3">
								<?PHP if  ($key->photo_url != '') { ?>
								<img height="50%" width="100%" src="../Pictures/<?php echo $page.'/'.$key->photo_url; ?>" class="img" alt="Soal Image">
								<?PHP }else { ?>
								<img height="50%" width="100%" src="" class="img" alt="Pertanyaan Image">
								<?PHP } ?>
							</td>
			    		</tr>
			    	</table>
			    </td>
			    <td>
			    	<table class="table table-bordered table-striped table-hover datatables">
			    		<tr>
							<td class="col-sm-2">Pertanyaan</td>
			    		</tr>
			    		<tr>
			    			<td class="col-sm-10"><?PHP echo $key->question; ?></td>
			    		</tr>
		    		</table>
		    		<table class="table table-bordered table-striped table-hover datatables">
		    			<tr>
			    			<td colspan="3">Pilihan Jawaban</td>
			    		</tr>
			    		<tr>
			    			<td class="col-sm-2">A</td>
			    			<td class="col-sm-0">:</td>
			    			<td class="col-sm-10"><?PHP echo $key->choice_a; ?></td>
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
			    			<td >:</td>
			    			<td><?PHP echo $key->choice_e; ?></td>
			    		</tr>
			    	</table>
			    	<table class="table table-bordered table-striped table-hover datatables">
			    		<tr>
			    			<td class="col-sm-2">Pembahasan</td>
			    			<td class="col-sm-0">:</td>
			    			<td class="col-sm-10"><?PHP echo $key->explanation; ?></td>
			    		</tr>
		    		</table>
			    </td>
			    <?php if ($page=='quest_backup'){ ?>				    
						<td class="center">
							<?PHP echo $key->fullname; ?><br>
							<?PHP echo $key->createdate; ?><br><br>
						</td>
						<td class="center"><input disabled="disabled" type="checkbox" <?php echo ($key->isdeleted ? 'checked="true"' : '') ?> ></td>
			    <?php } ?>
			<?php break; ?>

			<?php case 'manage': ?>
					<?php 
						require_once('../model/QuestionsManagement/qm_model.php' );
						$model = new QmModel();
						$manage_school = $model->getManage('manage_school','elearn_qm_manage_id', $key->id);
						$tryout = $model->getByIDTryout('tryout',$key->elearn_qm_tryout_id);
					?>
					<td><?PHP echo $numbers; ?></td>
			    <td title=" <?PHP echo "\nKode : ".$key->code; ?>
			    						<?PHP echo "\nSekolah : "; ?>
										  <?PHP 
												$numbers = 1; 
												foreach ($manage_school as $field) { 
													echo "\n       ".$numbers.". "; 
													echo $field->name; 
													$numbers++; 
												}
										  ?>
			    					  <?PHP echo "\n\nJudul : ".$tryout->title; ?>
			    					  <?PHP echo "\nJenis : ".$tryout->kind; ?>
			    					  <?PHP echo "\nMata Pelajaran : ".$tryout->study; ?>
			    					  <?PHP echo "\nNilai Kelulusan : ".$tryout->min_value; ?>
			    					  <?PHP echo "\nLama Pengerjaan : ".$tryout->time; ?>
			    					  <?PHP echo "\nTanggal Aktif Terbit : ".(date('d-m-Y',strtotime($tryout->date_start)))." s/d ".(date('d-m-Y',strtotime($tryout->date_end))); ?>
			    					  <?PHP echo "\nPublish : ".($tryout->publish=='yes' ? 'Ya' : 'Tidak'); ?>
			    					  <?PHP echo "\nRemedial : ".$tryout->remedial; ?>
			    					  <?PHP echo "\nTipe Soal : ".($tryout->type_quest=='reguler' ? 'Tidak Acak' : 'Acak'); ?>
			    					  <?PHP echo "\nJumlah Terbit Soal : ".$tryout->amount_quest; ?>
			    					  <?PHP echo "\nPesan dan Saran : ".$tryout->attention; ?>
			    					">
		    		<?PHP echo $key->code; ?>
		    	</td>
			    <td><?PHP echo $key->title_exam; ?></td>
			    <td><?PHP echo $key->create_by; ?></td>
					<td><?PHP echo $key->createdate; ?></td>
					<td class="center"><a  href='../views/QuestionsManagement/report.php?id=<?php echo $key->id; ?>' target="_blank"><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a></td>
			<?php break; ?>

		<?php 
				default:
					echo"Not List";
			endswitch; ?>

		<?php if($page!="quest_backup"){ ?>
			<td>
				<?PHP echo $_SESSION['permission']['elearn_qm_'.$_GET['page']]['edit'] ? 
					"
					<a  href='?page=$page&action=edit&id=$key->id'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
					" : ""; ?> <!-- edit -->
				
				<?PHP 
					if ($_SESSION['permission']['elearn_qm_'.$_GET['page']]['delete']==true){
					echo '
					<a title="Delete" href="#"  onclick="deletedata(\''.$key->id.'\',\''.$title.'\',\''.
					(
						$page=="quest" ? $key->study : 
						(
							$page=="tryout" ? $key->title : 
							(
								$page=="manage" ? $key->code : $key->id
							)	//manage
						) //title_exam
					) //quest
					.'\')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
					';
					} else{ ''; }				
				?>	<!-- delete -->
			</td>
		<?php } ?>

	</tr>
	<?PHP 
		$numbers++; 
		}
	?>
</tbody>
