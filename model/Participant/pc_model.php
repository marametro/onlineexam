<?PHP

class PcModel {

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
			case 'participant':
				$query = " SELECT c.username create_by, b.name school, a.* FROM elearn_pc_".$tbl." a 
										inner join elearn_md_school b on a.elearn_md_school_id = b.id
										inner join elearn_um_user c on a.createby = c.id
										WHERE a.isdeleted=0 order by a.nis asc ";
			break;
			default:
				$query = " SELECT b.username create_by, a.* FROM elearn_pc_".$tbl." a 
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

		$query = "SELECT * FROM elearn_pc_".$tbl." WHERE isdeleted=0 ".$where;
		$result = $this->db->getDataArray($query);
		return $result;
	}

	public function getByID($tbl,$id)
	{
		$query = "SELECT * FROM elearn_pc_".$tbl." WHERE id='$id'";
		$result = $this->db->get_single_row($query);
		return $result;
	}

	public function getLastID($tbl)
	{
		$query = "SELECT id FROM elearn_pc_".$tbl." ORDER BY id DESC LIMIT 1";
		$result = $this->db->get_single_row($query);
		$result = $result->id;
		return $result;
	}
	
	public function getCode($tbl)
	{
		$query = "SELECT nis FROM elearn_pc_".$tbl." ORDER BY id DESC LIMIT 1";
		$result = $this->db->get_single_row($query);
		$seq = (int)(substr($result->nis,3,5))+1;

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
		$result = $this->db->insert("elearn_pc_".$tbl,$data);
		return $result;
	}
	
	public function update($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_pc_'.$tbl,$data,'id',$id);
		return $result;
	}
	
	public function delete($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_pc_'.$tbl,$data,'id',$id);
		return $result;
	}

	public function deletePermanent($tbl,$where,$id)
	{
		$result = $this->db->delete('elearn_pc_'.$tbl,$where,$id);
		return $result;
	}
		
	public  function check_data($tbl,$data)
	{
		$result = false;
		$result = $this->db->check_exist("elearn_pc_".$tbl,$data);
		if ($result == TRUE) {
			return TRUE;
		}
		return false;
	}
	
	/* End Region Data Master */	
	
	/* Region Front Eend Mara*/
	
	public function getAllParticipant()
	{
		$query="SELECT COUNT(id) as total FROM elearn_pc_participant WHERE isdeleted='0'";
		$result = $this->db->get_num_row($query);
		return $result;
	}
	

	
	/* End Region  */
	
	
	
}

?>