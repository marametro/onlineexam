<?PHP

require_once('../model/MasterData/md_model.php' );
require_once('../model/QuestionsManagement/qm_model.php' );
		
class MdController 
{
	private $Model  = null;
	
	public function __construct()
	{
		$this->Model = new MdModel();
		$this->ModelQM = new QmModel();
	}

	public function DList($tbl)
	{
		switch($tbl){
			case 'class' :
				$title = 'Kelas';
			break;

			case 'class_sub':
				$title = 'Sub Kelas';
			break;

			case 'major':
				$title = 'Jurusan';
			break;

			case 'study':
				$title = 'Mata Pelajaran';
			break;

			case 'participant':
				$title = 'Peserta';
			break;
		}

		$data = $this->Model->getAll($tbl);
		include '../views/MasterData/list.php';
	}
	
	public function DAddEdit($tbl,$param,$paramID)
	{
		$action = $param;
		if ($paramID != '')
		$data = $this->Model->getByID($tbl,$paramID);
		$id 		= (isset($data->id)) ? $data->id : '';
		$dataAll =  $this->Model->getAll($tbl);

		switch($tbl){
			case 'class' :
				$title = 'Kelas';
				$name = (isset($data->name)) ? $data->name : '';
			break;

			case 'class_sub':
				$title = 'Sub Kelas';
				$dataClass =  $this->Model->getAll('class');
				$dataMajor =  $this->Model->getAll('major');
				$name = (isset($data->name)) ? $data->name : '';
				$class_id = (isset($data->elearn_md_class_id)) ? $data->elearn_md_class_id : '';
				$major_id = (isset($data->elearn_md_major_id)) ? $data->elearn_md_major_id : '';
			break;

			case 'major':
				$title = 'Jurusan';
				$name = (isset($data->name)) ? $data->name : '';
			break;

			case 'study':
				$title = 'Mata Pelajaran';
				$name = (isset($data->name)) ? $data->name : '';
			break;

			case 'participant':
				$title = 'Peserta';
				$nik = (isset($data->nik)) ? $data->nik : '';
				$name = (isset($data->name)) ? $data->name : '';
				$dataTitleExam =  $this->ModelQM->getAll('title_exam');
			break;
		}

		include '../views/MasterData/form.php';
	}
	
	
}


?>