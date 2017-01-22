<?php

	require_once '../../mssql/config.php';
	require_once"../../model/QuestionsManagement/qm_model.php"; 
	require_once '../../helper/datetime.php';

if(isset($_POST["id"]) && !empty($_POST["id"])){

	$QmModel =  new QmModel();
	$rows =  $QmModel->getCountTotalTryoutGroupByStudy($_POST['id']);
	$showLimit = 1;
	
	$rowCount =  $QmModel->getCountTryoutCompareID($_POST['id'],$showLimit);

	
if($rowCount > 0){ 
	$data = $QmModel->getTryoutCompare($_POST['id'],$showLimit);
	
	foreach ($data as $key) 
	{ 
		$id = $key->id; 
	?>
		<ul class="products-list product-list-in-box">
		<li class="item">
		<div class="product-img">
			<img src="asset/dist/img/default-50x50.gif" alt="Product Image">
		</div>
		<div class="product-info">
		<span class="label label-warning pull-right">Waktu <?PHP echo $key->time; ?> Menit</span>
		<div>
			<a href="#" class="title">
				Judul :
			</a>
			<span><?PHP echo $key->title; ?></span>
		</div>
		<div>
			<a href="#" class="title">
				<span>
					Status :	
				</span>
			</a>
			<?PHP 
				if ($key->publish =='yes') 
				echo 'Publish';
				else 
				echo 'Pending';
		   ?>
		</div>
		<div>
			<a href="#" class="title">
				Periode Pengerjaan :
			</a>
			<?PHP echo Helper::format_indo($key->date_start); ?> sd
			<?PHP echo Helper::format_indo($key->date_end); ?>
		</div>
		<a href="#" class="btn btn-info btn-xs">
			Click Info Lebih Lanjut <i class="small-box-footer "></i>
		</a>
		<div class="box-footer text-center">
			</div>
		</div>
		</li>
	</ul>
		
	<?PHP
	}
	
	if($rows >= $showLimit){
	
	?>
		<div class="show_more_main box-footer text-center" id="show_more_main<?php echo $id; ?>">
		<span id="<?php echo $id; ?>" class="show_more" title="Load more posts">Show more</span>
		
		</div>
	<?PHP
	}
	}
}	


