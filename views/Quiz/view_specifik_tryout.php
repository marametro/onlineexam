<section style="padding: 0px 15px 0;">
	<h3>
		<small>
		<ol class="breadcrumb">
			<li><a href="#"><i></i> DATA TRYOUT YANG DI UJIKAN</a></li>
			<li class="active">DATA MATA PELAJARAN</li>
	  	</ol>
	  	</small>
	</h3>  
</section>
<div class="row">
<div class="col-xs-12">	
<?PHP 
	$id = $_GET['id'];
	$decryptid = Encryption::decrypt($id);

	$QmModel =  new QmModel();
	$data =  $QmModel->getInformationSpecifikTryoutById($decryptid);

	$dataClassFollow =  $QmModel->getInformationSpecifikClassFollowTryout($decryptid);
	
?>
<div class="col-md-12">
	<div class="box box-primary">
	<div class="box-header with-border">
		
	</div>
	<div class="tutorial_list box-body">
		<div class="product-info col-md-6">
			<div>
				<table class="table table-bordered table-striped table-hover datatables">
					<tr>
						<td>Judul</td><td width="10px;"></td><td> <?php echo $data->title; ?></td>
					</tr>
					<tr>
						<td>Mata Pelajaran</td><td width="10px;"></td><td><?PHP echo $data->Study; ?></td>
					</tr>
					<tr>
						<td>Minimum Nilai</td><td width="10px;"></td><td><span class="label label-warning"><?PHP echo $data->min_value; ?> </span></td>
					</tr>
					<tr>
						<td>Lama Pengerjaan</td><td width="10px;"></td><td><span class="label label-warning"><?PHP echo $data->time; ?> Menit </span></td>
					</tr>
					<tr>
						<td>Jumlah Soal</td><td width="10px;"></td><td><?PHP echo $data->amount_quest; ?></td>
					</tr>
					<tr>
						<td>Remedial</td><td width="10px;"></td><td><?PHP echo $data->remedial; ?></td>
					</tr>
					<tr>
						<td>Periode Pengerjaan</td><td width="10px;"></td><td>
						<?PHP echo Helper::format_indo($data->date_start); ?> sd
						<?PHP echo Helper::format_indo($data->date_end); ?></td>
					</tr>
					<tr>
						<td>Kelas Yang Mengikuti</td>
						<td width="10px;"></td>
						<td>
						<?PHP 
							foreach ($dataClassFollow as $keys) 
							{ 
								echo "$keys->classname". ' ';
							}
						?>
						</td>
					</tr>
					<tr>
						<td>Status</td><td width="10px;"></td>
						<td>
						<?PHP if ($data->publish =='yes') 
							echo 'Publish';
							else 
							echo 'Pending'; ?>
						</td>
					</tr>
					<tr>
						<td>Kesan Dan Saran</td><td width="10px;"></td><td><?PHP echo $data->attention; ?></td>
					</tr>
				</table>
			</div>	
		</div>
		<div class="product-info col-md-6">
			<div>
				<table class="table table-bordered table-striped table-hover datatables">
					<tr>
						<td><b>Petunjuk Pengerjaan</b></td>
					</tr>
					<tr><td>Sebelum mengerjakan ujian online, baca dengan cermat petunjuk berikut:</td></tr>
					<tr>
						<td>
   							1. Berdoalah terlebih dahulu sebelum mengerjakan ujian!
						</td>
					</tr>
					<tr>
						<td>
   							2.Gunakan nomor soal di sebelah kanan atau tombol di bawah soal untuk pindah ke lain soal!
						</td>
					</tr>
					<tr>
						<td>
   							3. Nomor berwarna merah berarti belum dikerjakan, nomor berwarna kuning berarti ragu-ragu, dan tombol berwarna hijau berarti telah dikerjakan.
						</td>
					</tr>
					<tr>
						<td>
   							4. Jawaban yang dipilih akan berubah berwarna hijau. Jawaban dapat diganti dengan mengklik pilihan lain.
						</td>
					</tr>
					<tr>
						<td>
   							5. Kerjakan soal yang paling mudah terlebih dahulu.
						</td>
					</tr>
					<tr>
						<td>
   							6. Selesaikan semua soal sebelum waktu habis! Jika waktu habis, maka soal otomatis tidak dapat dikerjakan lagi.
						</td>
					</tr>
					<tr>
						<td>
   							7.  Klik tombol Selesai pada nomor terakhir untuk mengakhiri ujian. Pastikan telah mengklik tombol ini sebelum logout. Jika meninggalkan komputer seblum klik tombol ini, maka nilai tidak akan diproses..
						</td>
					</tr>
					<tr>
						<td>
   							8.  Klik tombol Selesai pada nomor terakhir untuk mengakhiri ujian. Pastikan telah mengklik tombol ini sebelum logout. Jika meninggalkan komputer seblum klik tombol ini, maka nilai tidak akan diproses..
						</td>
					</tr>
					<tr>
						<td>
   							9. Konsultasikan dengan pengawas/proktor jika ada kendala teknis saat mengerjakan ujian, atau ada soal yang tidak dipahami.
						</td>
					</tr>
				</table>
			</div>	
		</div>
		<div><br/></div>
		<div class="product-info col-md-7">
			<form onsubmit="return show_ujian(<?= $_GET['ujian']; ?>)" class="form">
			<div>
				<input type="checkbox" id="agreement" name="agreement" required /> Saya telah membaca dan memahami petunjuk mengerjakan dengan cermat 
			</div>
			<div>
			<br/>			
			 <button type="submit" class="btn btn-info btn-xs left"> <i class="glyphicon glyphicon-log-in"></i> Mulai Mengerjakan </button>			
			</div>
			</form>
		</div>
	</div>

</div>
</div>
</div>
</div>
