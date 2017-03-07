<?PHP 
	$QmModel =  new QmModel();
	$data =  $QmModel->getAllTryoutKind();
?>
<?PHP 
foreach ($data as $key) 
{ 
	$encryptid = Encryption::encrypt($key->id);
	$encryptdeleted = Encryption::encrypt($key->createdate);


?>
<div class="col-md-4 col-sm-6 col-xs-12">
<div class="info-box">
<span class="info-box-icon bg-green"></span>
<div class="info-box-content">
	<span class="info-box-text"><center><?PHP echo $key->name; ?></center></span>
	<span class="info-box-number"><center></center></span>
	<div class="progress">
		<div class="progress-bar" style="width: 100%"></div>
	</div>
	<span class="progress-description">
		<?PHP echo "<a href='tryout+$encryptid-$encryptdeleted' class='btn btn-block btn-info btn-xs'>
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