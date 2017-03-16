<?PHP
include "../mssql/config.php";
require_once'../helper/Encryption.php';
require_once('../model/UserManagement/um_model.php' );

$model =new UmModel();
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
	
	$datauser=array('username'=> $_POST['username'],
					'password'=>  $_POST['password']);

	$sql="SELECT a.id, a.username, a.password, a.fullname, a.photo_url, a.elearn_um_role_id, b.name role_name 
		  FROM elearn_um_user a
		  inner join  elearn_um_role b on a.elearn_um_role_id = b.id
		  WHERE a.isdeleted='0' and a.username='$datauser[username]'"; 		
	
	
	$data = $db->get_single_row($sql);

	$decrypt = Encryption::decrypt($data->password);
	$dataHaveDecript ="";
	if ($decrypt ==  $_POST['password']) {
		$dataHaveDecript = array('username' => $data->username,
								 'password'=>  $data->password);
	}else {
		return;
	}

	
	$IsExist=$db->check_exist('elearn_um_user',$dataHaveDecript);
	
	
	if ($IsExist==true) 
	{
		$_SESSION['login'] = TRUE;
		$_SESSION['iduser']=$data->id;
		$_SESSION['username']=$data->username;
		$_SESSION['fullname']=$data->fullname;
		$_SESSION['image']=$data->photo_url;
		$_SESSION['role_id']=$data->elearn_um_role_id;
		$_SESSION['role_name']=$data->role_name;

		$sql2=" select 
					c.id user_id, c.username, c.fullname, a.elearn_um_role_id role_id, b.name role, a.* 
				from elearn_um_role_permission a
				inner join elearn_um_role b on a.elearn_um_role_id = b.id
				inner join elearn_um_user c on b.id = c.elearn_um_role_id
				where a.isdeleted=0 and c.id = '$data->id' and a.elearn_um_role_id='$data->elearn_um_role_id' ";
		$permissionDataTable = $model->getToDataTable($sql2);

		$permission = array();
		$permission_details = array();

		foreach($permissionDataTable as $key)
		{
			$permission_details['menu'] = $key->menu;
			$permission_details['add'] = $key->add;
			$permission_details['edit'] = $key->edit;
			$permission_details['delete'] = $key->delete;
			
			$permission[$key->menu_name] = $permission_details;	
		}
				
		$_SESSION['permission']=$permission;					
		// print_r($_SESSION['permission']);
		// echo $_SESSION['permission']['elearn_md_class_sub']['add'];
		echo $data->username;
	}  
}
