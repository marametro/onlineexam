<section style="padding: 0px 15px 0;">
	<h3>
		<small><ol class="breadcrumb">
		<li><a href="#"><i></i> DATA TRYOUT YANG DI UJIKAN</a></li>
		<li class="active">DATA MATA PELAJARAN</li>
	  </ol></small>
	</h3>  
</section>
<div class="row">
<div class="col-xs-12">	
<?PHP 
	$QmModel =  new QmModel();
	$data =  $QmModel->getAllTryoutGroupByStudy();
	
	foreach ($data as $key) 
	{ 
		$datastudy = $QmModel->getAllStudyByID($key->elearn_md_study_id);
		$datatryout = $QmModel->getAllTryoutByStudyID($key->elearn_md_study_id);
		
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
				<span>
					Status :	
				</span>
			</a>
			<?PHP 
				if ($keys->publish =='yes') 
				echo 'Publish';
				else 
				echo 'Pending';
		   ?>
		</div>
		<div>
			<a href="#" class="title">
				Periode Pengerjaan :
			</a>
			<?PHP echo Helper::format_indo($keys->date_start); ?> sd
			<?PHP echo Helper::format_indo($keys->date_end); ?>
		</div>
		<a href="#" class="btn btn-info btn-xs">
			Click Info Lebih Lanjut <i class="small-box-footer "></i>
		</a>
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
