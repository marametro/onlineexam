<?PHP

require_once('../model/Participant/pc_model.php' );
require_once('../model/MasterData/md_model.php' );
		
class PcController 
{
	private $Model  = null;
	
	public function __construct()
	{
		$this->Model = new PcModel();
		$this->ModelMD = new MdModel();
	}

	public function DList($tbl)
	{
		switch($tbl){
			case 'participant' :
				$title = 'Peserta';
			break;
		}

		$data = $this->Model->getAll($tbl);
		include '../views/Participant/list.php';
	}
	
	public function DAddEdit($tbl,$param,$paramID)
	{
		$action = $param;
		if ($paramID != '')
		$data = $this->Model->getByID($tbl,$paramID);
		$id 		= (isset($data->id)) ? $data->id : '';
		$dataAll =  $this->Model->getAll($tbl);
		

		switch($tbl){
			case 'participant' :
				$title = 'Peserta';
				$nis = (isset($data->nis)) ? $data->nis : '';
				$name = (isset($data->name)) ? $data->name : '';
				$fullname = (isset($data->fullname)) ? $data->fullname : '';
				$place_birthday = (isset($data->place_birthday)) ? $data->place_birthday : '';
				$date_birthday = (isset($data->date_birthday)) ? date('d-m-Y',strtotime($data->date_birthday)) : '';
				$address = (isset($data->address)) ? $data->address : '';
				$gender = (isset($data->gender)) ? $data->gender : '';
				$contact_number = (isset($data->contact_number)) ? $data->contact_number : '';
				$email_address = (isset($data->email_address)) ? $data->email_address : '';
				$elearn_md_school_id =  $this->ModelMD->getAll('school');
				$elearn_md_class_id =  $this->ModelMD->getAll('class');
				$username = (isset($data->username)) ? $data->username : '';
				$password = (isset($data->password)) ? $data->password : '';
				$elearn_md_participant_from_id = $this->ModelMD->getAll('participant_from');

			break;
		}

		include '../views/Participant/form.php';
	}
	
	
}


?>