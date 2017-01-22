<?PHP 
	$QmModel =  new QmModel();
	$total =  $QmModel->getAllTryout();
?>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box bg-green">
	<span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
	<div class="info-box-content">
		<span class="info-box-text"><center>Tryout</center></span>
		<span class="info-box-number">
			<center><?PHP echo $total; ?></center>
		</span>
	<div class="progress">
	<div class="progress-bar" style="width: 100%"></div>
	</div>
	<a href="tryoutboxchild" class="btn btn-block btn-info btn-xs"">
        Click Info Lebih Lanjut <i class="small-box-footer "></i>
	</a>
	</div>
	</div>
</div>