<?PHP 
	$QmModel =  new QmModel();
	$data =  $QmModel->getAllTryoutKind();
?>
<?PHP 
foreach ($data as $key) 
{ 
	$encryptid = Encryption::encrypt($key->id);
	$encryptcreatedate = Encryption::encrypt($key->createdate);
	$icons = $key->icons ? $key->icons : '';

?>
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="info-box">
<?PHP if ($icons !="") { ?>
	<span class="info-box-icon bg-green"><img src="Pictures/icons/small_<?php echo $icons; ?>" class="img-circle" with="100px" height="80px"></span>
<?PHP }else { ?>
<span class="info-box-icon bg-green"></span>
<?PHP } ?>

<div class="info-box-content">
	<span class="info-box-text"><center><?PHP echo $key->name; ?></center></span>
	<span class="info-box-number"><center></center></span>
	<div class="progress">
		<div class="progress-bar" style="width: 100%"></div>
	</div>
	<span class="progress-description">
		<?PHP echo "<a href='studytryout+$encryptid-$encryptcreatedate' class='btn btn-block btn-info btn-xs'>
	        Click Info Lebih Lanjut <i class='small-box-footer'></i>
		</a>";
		?>
	</span>
</div>
</div>
</div>
<?PHP 
}
 ?>