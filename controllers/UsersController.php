<?php 
require('controllers/Controller.php'); 
class UsersController extends Controller{
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		require('models/UsersModel.php');
		$this->model = new UsersModel();
	}
	function run()
	{
		switch($_GET['view'])
		{
			case 'create':
			//Validate User and permissions
				$this->create();		
			break;
			default:
			break;
		}
	}
	private function create()
	{
		//Validate Variables
		$names   = $this->validateText($_POST['name']);
		$lastName = $this->validateText($_POST['lastName']);
		$roleId  = $this->validateNumber($_POST['roleId']);
		$address = $this->validateText($_POST['address']);
		$phone = $this->validateNumber($_POST['phone']);
		$result = $this->model->create($names, $lastName, $address, $roleId, $phone);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			require('views/User/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}
}
?>