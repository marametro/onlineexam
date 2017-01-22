<?PHP 
	$QmModel =  new QmModel();
	$total =  $QmModel->getAllQuiz();
?>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-red">
<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

<div class="info-box-content">
<span class="info-box-text"><center>Quiz</center></span>
<span class="info-box-number"><center><?PHP echo $total; ?></center></span>

<div class="progress">
<div class="progress-bar" style="width: 100%"></div>
</div>
<span class="progress-description">
<a href="#" class="btn btn-block btn-info btn-xs"">
        Click Info Lebih Lanjut <i class="small-box-footer "></i>
	</a>
</span>
</div>
</div>
</div>