<?php
require('controllers/Controller.php');

/**
* 
*/
class EmployeeController extends Controller
{
	private $model;
	function __construct()
	{
		require('models/EmployeeModel.php');
		$this->model = new EmployeeModel();
	}

	function run()
	{
		switch($_GET['view'])
		{
			case 'index':
			$this->index();
			break;
			case 'details':
						//Validate User and permissions
						$this->details();
						break;
			case 'create':
						//Validate User and permissions
						$this->create();		
						break;
			case 'edit':
						//Validate User and permissions
						$this->edit();
						break;
			case 'delete':
						//Validate User and permissions
						$this->delete();
						break;
				default:
						break;

		}
	}

	/**
	* Show all in database
	* @return null, view rendered
	*/
	private function index()
	{
		//Get all 
		$result = $this->model->index();
		if($result)
		{
			//Load view
			require('views/Employee/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}	
	/**
	* Show details of car given it's Id
	* @param id
	* @return null, view rendered
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);
		if($result)
		{
			//Load view
			require('views/Employee/Details.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $city
	* @param string $carWorkShop
	*/
	private function create()
	{
		//validateNumberte Variables
		$name   		 = $this->validateText($_POST['name']);
		$lastName 		 = $this->validateText($_POST['lastName']);
		$nss		 = $this->validateText($_POST['nss']);
		$address		 = $this->validateText($_POST['address']);
		$phone  		 = $this->validateText($_POST['phone']);
		$cellPhone  = $this->validateText($_POST['cellPhone']);
		
		$result = $this->model->create($name,$lastName,$nss,$address,$phone,$cellPhone);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			require('views/Employee/Created.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Update with the given post parameters
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $city
	* @param string $carWorkShop
	* @return null, view rendered
	*/
	private function edit()
	{
		//Validate Variables
		$name   		 = $this->validateText($_POST['name']);
		$lastName 		 = $this->validateText($_POST['lastName']);
		$nss		 = $this->validateText($_POST['nss']);
		$address		 = $this->validateText($_POST['address']);
		$phone  		 = $this->validateText($_POST['phone']);
		$cellPhone  = $this->validateText($_POST['cellPhone']);
		
		$result = $this->model->edit($name,$lastName,$nss,$address,$phone,$cellPhone);
		if($result)
		{
			//Load view
			require('views/Employee/Edited.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	* Delete  given the Id
	* @param $VIN
	* @return null, view rendered
	*/
	private function delete()
	{
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Employee/Deleted.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}

}

?>