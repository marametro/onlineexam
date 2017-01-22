<?PHP

class MdModel {

	private $db  = null;
	
	//This Contructor , execution when this class in calling 
	public function __construct()
	{
		$this->db = new Database();
	}
	
	/* Region Data Master */
	public function getAll($tbl)
	{
		switch($tbl){
			case 'class_sub':
				$query = "select 
										d.username create_by, a.*, b.name class, c.name major 
									from elearn_md_".$tbl." a
									inner join elearn_md_class b on a.elearn_md_class_id = b.id
									left join elearn_md_major c on a.elearn_md_major_id = c.id
									inner join elearn_um_user d on a.createby = d.id
									WHERE a.isdeleted=0 
									order by b.name, c.name, a.name asc ";
			break;

			default:
				$query = " SELECT b.username create_by, a.* FROM elearn_md_".$tbl." a 
										inner join elearn_um_user b on a.createby = b.id
										WHERE a.isdeleted=0 order by a.name asc ";

		}

		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getFilter($tbl,$field1,$value1,$field2=NULL,$value2=NULL,$field3=NULL,$value3=NULL,$field4=NULL,$value4=NULL,$field5=NULL,$value5=NULL)
	{
		$where="";

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

		$query = "SELECT * FROM elearn_md_".$tbl." WHERE isdeleted=0 and ".$field1." = '".$value1."' ".$where;
		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getByID($tbl,$id)
	{
		$query = "SELECT * FROM elearn_md_".$tbl." WHERE id='$id'";
		$result = $this->db->get_single_row($query);
		return $result;
	}
	
	public function getCode($tbl)
	{
		$query = "SELECT * FROM elearn_md_".$tbl." ORDER BY id DESC LIMIT 1";
		$result = $this->db->get_single_row($query);

		switch($tbl){
			case 'participant':
				$seq = (int)(substr($result->nik,3,5))+1;
			break;
			default:
				$seq = (int)($result->id)+1;			
		}

		if (strlen($seq)==1){
			$no = "0000".$seq;
		}else if (strlen($seq)==2){
			$no = "000".$seq;
		}else if (strlen($seq)==3){
			$no = "00".$seq;
		}else if (strlen($seq)==4){
			$no = "0".$seq;
		}else{
			$no = $seq;
		}

		switch($tbl){
			case 'participant':
				$result = 'NIK'.$no;
			break;
		}

		return $result;
	}

	public function create($tbl,$data)
	{
		$result = $this->db->insert("elearn_md_".$tbl,$data);
		return $result;
	}
	
	public function update($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_md_'.$tbl,$data,'id',$id);
		return $result;
	}
	
	public function delete($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_md_'.$tbl,$data,'id',$id);
		return $result;
	}
		
	public  function check_data($tbl,$data)
	{
		$result = false;
		$result = $this->db->check_exist("elearn_md_".$tbl,$data);
		if ($result == TRUE) {
			return TRUE;
		}
		return false;
	}
	
	/* End Region Data Master */	
	
}

?>