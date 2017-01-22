<?PHP

require_once('../model/UserManagement/um_model.php' );
		
class UmController 
{
	private $Model  = null;
	
	public function __construct()
	{
		$this->Model = new UmModel();
	}

	public function DList($tbl)
	{
		switch($tbl){
			case 'role' :
				$title = 'Role';
			break;

			case 'user':
				$title = 'User';
			break;

			case 'role_permission':
				$title = 'Permission';
				
				$dataRole =  $this->Model->getAll('role');
			break;
		}

		$data = $this->Model->getAll($tbl);
		include '../views/UserManagement/list.php';
	}
	
	public function DAddEdit($tbl,$param,$paramID)
	{
		$action = $param;
		if ($paramID != '')
		$data = $this->Model->getByID($tbl,$paramID);
		$id 		= (isset($data->id)) ? $data->id : '';
		$dataAll =  $this->Model->getAll($tbl);
		
		switch($tbl){
			case 'role' :
				$title = 'Role';
				$name = (isset($data->name)) ? $data->name : '';
			break;

			case 'user':
				$title = 'User';
				$username = (isset($data->username)) ? $data->username : '';
				$fullname = (isset($data->fullname)) ? $data->fullname : '';
				$email_address = (isset($data->email_address)) ? $data->email_address : '';
				$contact_number = (isset($data->contact_number)) ? $data->contact_number : '';
				$gender = (isset($data->gender)) ? $data->gender : '';
				$address = (isset($data->address)) ? $data->address : '';
				$date_birthday = (isset($data->date_birthday)) ? $data->date_birthday : '';
				$dataRole =  $this->Model->getAll('role');
			break;

			case 'role_permission' :
				$title = 'Role';
				$dataRole =  $this->Model->getAll('role');
				$dataRolePermission =  $this->Model->getAll($tbl);
				$dataModul =  $this->Model->getAll('modul');
				$dataFeature =  $this->Model->getAll('feature');
				// $name = (isset($data->name)) ? $data->name : '';
			break;
		}

		include '../views/UserManagement/form.php';
	}
	
	
}


?>