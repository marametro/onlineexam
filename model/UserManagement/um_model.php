<?PHP

class UmModel {

	private $db  = null;
	
	//This Contructor , execution when this class in calling 
	public function __construct()
	{
		$this->db = new Database();
	}
	
	/* Region Question Management */
	public function getAll($tbl)
	{
		switch($tbl){
			case 'user':
				$query = "select 
										b.name role, a.username create_by, a.*  
									from elearn_um_".$tbl." a
									inner join elearn_um_role b on a.elearn_um_role_id = b.id
									WHERE a.isdeleted=0 order by a.username asc";
			break;

			case 'role':
				$where="";
				if ($_SESSION['role_name']=='Admin'){
					$where = " and a.id != 1 ";
				}

				$query = " SELECT b.username create_by, a.* FROM elearn_um_".$tbl." a 
									inner join elearn_um_user b on a.createby = b.id
									WHERE a.isdeleted=0 ". $where ." order by a.name asc ";
			break;

			case 'role_permission':
				$where = isset($_GET['role_id']) ? ($_GET['role_id']!="0" ? " and b.id='".$_GET['role_id']."' " : "") : "";
				$query =" select b.name role, a.* from elearn_um_".$tbl." a
							  inner join elearn_um_role b on a.elearn_um_role_id = b.id where a.isdeleted=0 
							  ".$where." order by b.name, a.modul_alias asc ";
			break;

			case 'modul':
				$query = " select distinct modul_name, modul_alias from elearn_um_role_permission ";
			break;

			case 'feature':
				$query = isset($_GET['modul_id']) ? " select distinct menu_name, menu_alias from elearn_um_role_permission where modul_name='".$_GET['modul_id']."'" : "select distinct menu_name, menu_alias from elearn_um_role_permission where id=000000";
			break;

			default:
				$query = " SELECT b.username create_by, a.* FROM elearn_um_".$tbl." a 
									inner join elearn_um_user b on a.createby = b.id
									WHERE a.isdeleted=0 order by a.name asc ";

		}

		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getFilter($tbl,$field1=NULL,$value1=NULL,$field2=NULL,$value2=NULL,$field3=NULL,$value3=NULL,$field4=NULL,$value4=NULL,$field5=NULL,$value5=NULL)
	{
		$where="";

		if ($field1!=NULL and $value1!=NULL){
			$where = $where." and ".$field1." = '".$value1."' ";
		}
		if ($field2!=NULL and $value2!=NULL){
			$where = $where." and ".$field2." = '".$value2."' ";
		}
		if ($field3!=NULL and $value3!=NULL){
			$where = $where." and ".$field3." = '".$value3."' ";
		}
		if ($field4!=NULL and $value4!=NULL){
			$where = $where." and ".$field4." = '".$value4."' ";
		}
		if ($field5!=NULL and $value5!=NULL){
			$where = $where." and ".$field5." = '".$value5."' ";
		}

		$query = "SELECT * FROM elearn_um_".$tbl." WHERE isdeleted=0 ".$where;
		$result = $this->db->getDataArray($query);
		return $result;
	}

	public function getFilterDT($tbl,$field1=NULL,$value1=NULL,$field2=NULL,$value2=NULL,$field3=NULL,$value3=NULL,$field4=NULL,$value4=NULL,$field5=NULL,$value5=NULL)
	{
		$where="";

		if ($field1!=NULL and $value1!=NULL){
			$where = $where." and ".$field1." = '".$value1."' ";
		}
		if ($field2!=NULL and $value2!=NULL){
			$where = $where." and ".$field2." = '".$value2."' ";
		}
		if ($field3!=NULL and $value3!=NULL){
			$where = $where." and ".$field3." = '".$value3."' ";
		}
		if ($field4!=NULL and $value4!=NULL){
			$where = $where." and ".$field4." = '".$value4."' ";
		}
		if ($field5!=NULL and $value5!=NULL){
			$where = $where." and ".$field5." = '".$value5."' ";
		}

		$query = "SELECT * FROM elearn_um_".$tbl." WHERE isdeleted=0 ".$where;
		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getToArray($query)
	{
		$result = $this->db->getDataArray($query);
		return $result;
	}

	public function getToDataTable($query)
	{
		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getByID($tbl,$id)
	{
		$query = "SELECT * FROM elearn_um_".$tbl." WHERE id='$id'";
		$result = $this->db->get_single_row($query);
		return $result;
	}

	public function getLastID($tbl)
	{
		$query = "SELECT id FROM elearn_um_".$tbl." ORDER BY id DESC LIMIT 1";
		$result = $this->db->get_single_row($query);
		$result = $result->id;
		return $result;
	}
	
	public function getCode($tbl)
	{
		$query = "SELECT id FROM elearn_um_".$tbl." ORDER BY id DESC LIMIT 1";
		$result = $this->db->get_single_row($query);
		$seq = (int)($result->id)+1;

		if (strlen($seq)==1){
			$no = "000".$seq;
		}else if (strlen($seq)==2){
			$no = "00".$seq;
		}else if (strlen($seq)==3){
			$no = "0".$seq;
		}else{
			$no = $seq;
		}

		switch($tbl){
			case 'role':
				$result = 'MS'.$no;
			break;
		}

		return $result;
	}

	public function create($tbl,$data)
	{
		$result = $this->db->insert("elearn_um_".$tbl,$data);
		return $result;
	}
	
	public function update($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_um_'.$tbl,$data,'id',$id);
		return $result;
	}

	public function update3($tbl,$role_id,$menu,$setData)
	{
		$query1 = " update elearn_um_role_permission 
								set `menu`=0,`add`=0,`edit`=0,`delete`=0 
								where elearn_um_role_id ='".$role_id."' and menu_name='".$menu."'";
		$result1 = $this->db->ExecuteQuery($query1);

		$query2 = " update elearn_um_role_permission
							 set ".$setData."
							 where
							 elearn_um_role_id ='".$role_id."' and menu_name='".$menu."'
							";
		$result2 = $this->db->ExecuteQuery($query2);
		return $result2;
	}
	
	public function delete($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_um_'.$tbl,$data,'id',$id);
		return $result;
	}

	public function deletePermanent($tbl,$where,$id)
	{
		$result = $this->db->delete('elearn_um_'.$tbl,$where,$id);
		return $result;
	}
		
	public  function check_data($tbl,$data)
	{
		$result = false;
		$result = $this->db->check_exist("elearn_um_".$tbl,$data);
		if ($result == TRUE) {
			return TRUE;
		}
		return false;
	}
	
	/* End Region Data Master */	
	
}

?>