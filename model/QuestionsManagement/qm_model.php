<?PHP

class QmModel {

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
			case 'tryout':
				$query = "select 
										d.username create_by, b.name study, c.name cat, a.*  
									from elearn_qm_".$tbl." a
									left join elearn_md_study b on a.elearn_md_study_id = b.id
									inner join elearn_qm_tryout_kind c on a.elearn_qm_tryout_kind_id = c.id
									inner join elearn_um_user d on a.createby = d.id
									WHERE a.isdeleted=0 
									order by c.name, b.name, a.title asc ";
			break;
			case 'quest':
				$where="";

				if (isset($_GET['teacher_id'])==true && $_GET['teacher_id'] !=0){
					$where = $where." and a.createby = '".$_GET['teacher_id']."' ";
				}

				if (isset($_GET['study_id'])==true && $_GET['study_id'] !=0){
					$where = $where." and a.elearn_md_study_id = '".$_GET['study_id']."' ";
				}

				if (isset($_GET['level_id'])==true && $_GET['level_id'] != '0'){
					$where = $where." and a.`level` = '".$_GET['level_id']."' ";
				}

				if ($_SESSION['role_id']==1 or $_SESSION['role_id']==2){
					$query = "select 
											b.name study, a.*  
										from elearn_qm_".$tbl." a
										inner join elearn_md_study b on a.elearn_md_study_id = b.id
										WHERE a.isdeleted=0 ".$where;
				}else{
					$query = "select 
											b.name study, a.*  
										from elearn_qm_".$tbl." a
										inner join elearn_md_study b on a.elearn_md_study_id = b.id
										WHERE a.isdeleted=0 and  a.createby = '".$_SESSION['iduser']."'".$where;
				}				
			break;

			case 'quest_backup':
				$where="";

				if (isset($_GET['teacher_id'])==true && $_GET['teacher_id'] !=0){
					$where = $where." and a.createby = '".$_GET['teacher_id']."' ";
				}

				if (isset($_GET['study_id'])==true && $_GET['study_id'] !=0){
					$where = $where." and a.elearn_md_study_id = '".$_GET['study_id']."' ";
				}

				if (isset($_GET['level_id'])==true && $_GET['level_id'] != '0'){
					$where = $where." and a.`level` = '".$_GET['level_id']."' ";
				}

				$query = "select 
										b.name study, c.fullname, a.*  
									from elearn_qm_".$tbl." a
									inner join elearn_md_study b on a.elearn_md_study_id = b.id
									inner join elearn_um_user c on a.createby = c.id
									WHERE a.isdeleted in (0,1) ".$where;				
			break;

			case 'manage':
				$query = "select 
										c.username create_by, a.*, b.title title_exam 
									from elearn_qm_".$tbl." a
									inner join elearn_qm_tryout b on a.elearn_qm_tryout_id = b.id
									inner join elearn_um_user c on a.createby = c.id
									WHERE a.isdeleted=0 ";
			break;
			case 'manage_school':
				$query = "
									select b.name, a.id from 
										elearn_qm_".$tbl." a
										inner join elearn_md_school b on a.elearn_md_school_id = b.id
									where a.isdeleted='0' and a.elearn_qm_manage_id='1' ";
			break;
			case 'study_sum':
				if ($_SESSION['role_id']==1 or $_SESSION['role_id']==2){
					$query = " select a.id, a.name, count(b.id) jum_soal from elearn_md_study a
										left join elearn_qm_quest b on a.id = b.elearn_md_study_id ". 
										" WHERE b.isdeleted=0 group by a.name ";
				}else{
					$query = " select a.id, a.name, count(b.id) jum_soal from elearn_md_study a
										left join elearn_qm_quest b on a.id = b.elearn_md_study_id ". 
										" WHERE b.isdeleted=0 and b.createby = '".$_SESSION['iduser']."' group by a.name ";
				}
				
			break;

			default:
				$query = " SELECT b.username create_by, a.* FROM elearn_qm_".$tbl." a 
										inner join elearn_um_user b on a.createby = b.id
										WHERE a.isdeleted=0 order by a.name asc ";

		}

		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getManage($tbl,$field,$value)
	{
		$query = "select b.name, a.id from 
								elearn_qm_".$tbl." a
								inner join elearn_md_school b on a.elearn_md_school_id = b.id
							where a.isdeleted='0' and a.".$field." = '".$value."' ";
		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getManageQuest($tbl,$field,$value)
	{
		$query = "select 
								b.explanation pembahasan, a.* 
							from elearn_qm_".$tbl." a
							inner join elearn_qm_quest b on a.elearn_qm_quest_id = b.id
							where a.isdeleted=0 and a.".$field." = '".$value."' ";
		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getByIDTryout($tbl,$id)
	{
		$query = "select 
								b.name kind, c.name study, a.* 
							from elearn_qm_".$tbl." a
							inner join elearn_qm_tryout_kind b on a.elearn_qm_tryout_kind_id = b.id
							inner join elearn_md_study c on a.elearn_md_study_id = c.id 
							WHERE a.id='$id' ";
		$result = $this->db->get_single_row($query);
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

		$query = "SELECT * FROM elearn_qm_".$tbl." WHERE isdeleted=0 ".$where;
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

		$query = "SELECT * FROM elearn_qm_".$tbl." WHERE isdeleted=0 ".$where;
		$result = $this->db->getDataTable($query);
		return $result;
	}

	public function getByID($tbl,$id)
	{
		$query = "SELECT * FROM elearn_qm_".$tbl." WHERE id='$id'";
		$result = $this->db->get_single_row($query);
		return $result;
	}

	public function getLastID($tbl)
	{
		$query = "SELECT id FROM elearn_qm_".$tbl." ORDER BY id DESC LIMIT 1";
		$result = $this->db->get_single_row($query);
		$result = $result->id;
		return $result;
	}
	
	public function getCode($tbl)
	{
		$query = "SELECT id FROM elearn_qm_".$tbl." ORDER BY id DESC LIMIT 1";
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
			case 'manage':
				$result = 'MS'.$no;
			break;
		}

		return $result;
	}

	public function create($tbl,$data)
	{
		$result = $this->db->insert("elearn_qm_".$tbl,$data);
		return $result;
	}
	
	public function update($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_qm_'.$tbl,$data,'id',$id);
		return $result;
	}
	
	public function delete($tbl,$data,$id)
	{
		$result = $this->db->update('elearn_qm_'.$tbl,$data,'id',$id);
		return $result;
	}

	public function deletePermanent($tbl,$where,$id)
	{
		$result = $this->db->delete('elearn_qm_'.$tbl,$where,$id);
		return $result;
	}
		
	public  function check_data($tbl,$data)
	{
		$result = false;
		$result = $this->db->check_exist("elearn_qm_".$tbl,$data);
		if ($result == TRUE) {
			return TRUE;
		}
		return false;
	}

	public function executeNonQuery($query)
	{
		$result = $this->db->executeNonQuery($query);
		return $result;
	}
	
	/* End Region Data Master */	
	
	
	
	/* Region Front Eend Mara*/
	
	public function getAllTryout()
	{
		$query="SELECT COUNT(id) as total FROM elearn_qm_tryout WHERE isdeleted='0' AND elearn_md_study_id !='0'";
		$result = $this->db->get_num_row($query);
		return $result;
	}
	
	public function getAllTryoutGroupByStudy()
	{
		$query="SELECT * FROM elearn_qm_tryout WHERE elearn_md_study_id !='0' GROUP BY elearn_md_study_id";
		$result = $this->db->getDataTable($query);
		return $result;
	}
	
	
	public function getAllTryoutByStudyID($id)
	{
		$query="SELECT * FROM elearn_qm_tryout WHERE elearn_md_study_id ='$id' ORDER BY id DESC LIMIT 10";
		$result = $this->db->getDataTable($query);
		return $result;
	}
	
	
	public function getAllStudyByID($id)
	{
		$query="SELECT * FROM elearn_md_study WHERE id='$id'";
		$result = $this->db->get_single_row($query);
		return $result;
	}
	

	public function getAllQuiz()
	{
		$query="SELECT COUNT(id) as total FROM elearn_qm_tryout WHERE isdeleted='0' 
				AND elearn_qm_tryout_kind_id='3'";
		$result = $this->db->get_num_row($query);
		return $result;
	}
	
	/* End Region  */
	
}

?>