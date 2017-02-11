<?PHP

require_once('../model/UserManagement/um_model.php' );
require_once('../model/QuestionsManagement/qm_model.php' );
require_once('../model/MasterData/md_model.php' );
		
class QmController 
{
	private $Model  = null;
	private $ModelMD  = null;
	private $ModelUM  = null;
	
	public function __construct()
	{
		$this->Model = new QmModel();
		$this->ModelMD = new MdModel();
		$this->ModelUM = new UmModel();
	}

	public function DList($tbl)
	{
		switch($tbl){

			case 'quest_definition' :
				$title = 'Definition Soal';
			break;

			case 'tryout_kind' :
				$title = 'Jenis Tryout';
			break;

			case 'tryout' :
				$title = 'Tryout';
			break;

			case 'quest':
			case 'quest_backup':
				$title = 'Soal';
				$dataTeacher =  $this->ModelUM->getFilterDT('user','elearn_um_role_id','3');
				$dataStudySum =  $this->Model->getAll('study_sum');
			break;

			// case 'quest_backup':
			// 	$title = 'Backup Soal';
			// 	$dataTeacher =  $this->ModelUM->getFilterDT('user','elearn_um_role_id','3');
			// 	$dataStudySum =  $this->Model->getAll('study_sum');
			// break;

			case 'manage':
				$title = 'Manajemen Soal';
			break;
		}

		$data = $this->Model->getAll($tbl);
		include '../views/QuestionsManagement/list.php';
	}
	
	public function DAddEdit($tbl,$param,$paramID)
	{
		$action = $param;
		if ($paramID != '')
		$data = $this->Model->getByID($tbl,$paramID);
		$id 		= (isset($data->id)) ? $data->id : '';
		$dataAll =  $this->Model->getAll($tbl);
		
		switch($tbl){
			
			case 'quest_definition' :
				$title = 'Definition Soal';
				$definition_name = (isset($data->definition_name)) ? $data->definition_name : '';
				$correct_amount = (isset($data->correct_amount)) ? $data->correct_amount : '';
				$wrong_amount = (isset($data->wrong_amount)) ? $data->wrong_amount : '';
				$unworked = (isset($data->unworked)) ? $data->unworked : '';
				
			break;

			case 'tryout_kind' :
				$title = 'Jenis Tryout';
				$name = (isset($data->name)) ? $data->name : '';
			break;

			case 'tryout' :
				$title = 'Tryout';
				$txtTitle = (isset($data->title)) ? $data->title : '';
				$study = (isset($data->elearn_md_study_id)) ? $data->elearn_md_study_id : '';
				$min_value = (isset($data->min_value)) ? $data->min_value : '';
				$time = (isset($data->time)) ? $data->time : '';
				$date_start = (isset($data->date_start)) ? date('d-m-Y',strtotime($data->date_start)) : '';
				$date_end = (isset($data->date_end)) ? date('d-m-Y',strtotime($data->date_end)) : '';
				$publish = (isset($data->publish)) ? $data->publish : '';
				$remedial = (isset($data->remedial)) ? $data->remedial : '0';
				$type_quest = (isset($data->type_quest)) ? $data->type_quest : '';
				$amount_quest = (isset($data->amount_quest)) ? $data->amount_quest : '';
				$attention = (isset($data->attention)) ? $data->attention : '';
				$dataCat =  $this->Model->getAll('tryout_kind');
				$dataStudy =  $this->ModelMD->getAll('study');
			break;

			case 'quest':
				$title = 'Soal';
				$question = (isset($data->question)) ? $data->question : '';
				$choice_a = (isset($data->choice_a)) ? $data->choice_a : '';
				$choice_b = (isset($data->choice_b)) ? $data->choice_b : '';
				$choice_c = (isset($data->choice_c)) ? $data->choice_c : '';
				$choice_d = (isset($data->choice_d)) ? $data->choice_d : '';
				$choice_e = (isset($data->choice_e)) ? $data->choice_e : '';
				$explanation = (isset($data->explanation)) ? $data->explanation : '';
				$level = (isset($data->level)) ? $data->level : 'hard';
				$answer = (isset($data->answer)) ? $data->answer : 'A';
				// $dataStudy =  $this->Model->getAll('study_sum');
				$dataStudy =  $this->ModelMD->getAll('study');
				
				$dataCreatedby =  $this->Model->getAll('study_sum');
				$photo_url = (isset($data->photo_url)) ? $data->photo_url : '';
			break;

			case 'quest_backup' :
				$title = 'Backup Soal';
				$date_start = (isset($data->date_start)) ? date('d-m-Y',strtotime($data->date_start)) : '';
				$date_end = (isset($data->date_end)) ? date('d-m-Y',strtotime($data->date_end)) : '';
			break;

			case 'manage':
				$title = 'Manajemen Soal';
				$name = (isset($data->name)) ? $data->name : '';
				$code = (isset($data->code)) ? $data->code : '';
				$elearn_qm_tryout_id = (isset($data->elearn_qm_tryout_id)) ? $data->elearn_qm_tryout_id : '';
				$dataTryout =  $this->Model->getAll('tryout');
				$dataSchool =  $this->ModelMD->getAll('school');
				$dataQuest =  $this->Model->getAll('quest');
				$dataSchoolArray = (isset($data->id)) ? $this->Model->getFilter("manage_school","elearn_qm_manage_id",$id) : $this->Model->getFilter("manage_school","elearn_qm_manage_id","NULL");
				$dataQuestArray = (isset($data->id)) ? $this->Model->getFilter("manage_quest","elearn_qm_manage_id",$id) : $this->Model->getFilter("manage_quest","elearn_qm_manage_id","NULL");

				$dataTeacher =  $this->ModelUM->getFilterDT('user','elearn_um_role_id','3');
				$dataStudySum =  $this->Model->getAll('study_sum');
				
				// $dataClassSub =  $this->ModelMD->getAll('class_sub');
				// $dataClassSub =  $this->ModelMD->getAll('class_sub');
				// $dataClassSubArray = (isset($data->id)) ? $this->Model->getFilter("manage_class","elearn_qm_manage_id",$id) : $this->Model->getFilter("manage_class","elearn_qm_manage_id","NULL");
			break;
		}

		include '../views/QuestionsManagement/form.php';
	}
	
	
}


?>