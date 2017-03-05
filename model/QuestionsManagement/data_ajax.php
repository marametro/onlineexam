<?PHP
	require_once '../../mssql/config.php';
	
	
	$cu_elearn_md_study_id = $_GET['cu_elearn_md_study_id_quest'];

	if($cu_elearn_md_study_id)
	{
		
		$query="SELECT * FROM elearn_md_sub_study WHERE elearn_md_study_id='$cu_elearn_md_study_id' ";
		$result = $db->getDataTable($query);
		
		foreach( $result as $row )
		{
			echo "<option value=$row->id>$row->name</option>";
		}	
	}
	
		
	

?>