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
	$elearnqmtryoutkindid = $_GET['id'];
	$decryptid = Encryption::decrypt($elearnqmtryoutkindid);

	$QmModel =  new QmModel();
	$data =  $QmModel->getTryoutByIdTryoutKind('0',$decryptid,'yes');

	foreach ($data as $key) 
	{ 
		$datastudy = $QmModel->getStudyByID($key->elearn_md_study_id);
		$datatryout = $QmModel->getTryoutByStudyIdAndTryoutKindId($key->elearn_md_study_id,$key->elearn_qm_tryout_kind_id,'0');
				

?>
<div class="col-md-6">
	<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"><?PHP echo $datastudy->name; ?></h3>
	</div>
	<div class="tutorial_list box-body">
	<?PHP 
	foreach ($datatryout as $keys) 
	{ 
	
	$id = $keys->id;
	$encryptid = Encryption::encrypt($keys->id);
	$encryptcreatedate = Encryption::encrypt($keys->createdate);
	?>
	<ul class="products-list product-list-in-box">
		<li class="item">
		<div class="product-img">
			<img src="asset/dist/img/default-50x50.gif" alt="Product Image">
		</div>
		<div class="product-info">
		<span class="label label-warning pull-right">Waktu <?PHP echo $keys->time; ?> Menit</span>
		<div>
			<a href="#" class="title">
				Judul :
			</a>
			<span><?PHP echo $keys->title; ?></span>
		</div>
		<div>
			<a href="#" class="title">
				Periode Pengerjaan :
			</a>
			<?PHP echo Helper::format_indo($keys->date_start); ?> sd
			<?PHP echo Helper::format_indo($keys->date_end); ?>
		</div>
		<?PHP 
			echo "<a href='specifiktryout+$encryptid-$encryptcreatedate' class='btn btn-info btn-xs'>
	        Click Info Lebih Lanjut <i class='small-box-footer'></i>
		</a>";
		?>
		<div class="box-footer text-center">
			</div>
		</div>
		</li>
	</ul>
	<?PHP } ?>
	
	
	</div>
	</div>
	
</div>
<?php } ?>
</div>
</div>
