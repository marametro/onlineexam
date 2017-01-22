<?PHP 
	$PcModel =  new PcModel();
	$total =  $PcModel->getAllParticipant();
?>
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="info-box">
	<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
	<div class="info-box-content">
		<span class="info-box-text"><center>Members</center></span>
		<span class="info-box-number">
			<center><?PHP echo $total; ?></center>
		</span>
	
	<div class="progress">
		<div class="progress" style="width: 100%"></div>
	</div>
	
		<a href="#" class="btn btn-block btn-info btn-xs"">
	Click Info Lebih Lanjut <i class="small-box-footer"></i>
	</a>
	</div>
</div>
</div>