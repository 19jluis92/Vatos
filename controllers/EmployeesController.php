<?php
require('controllers/Controller.php');

/**
* 
*/
class EmployeesController extends Controller
{
	private $model;
	function __construct()
	{
		require('models/EmployeesModel.php');
		$this->model = new EmployeesModel();
	}

	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':
			            $this->all();
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
	private function all()
	{
		//Get all 
		$result = $this->model->all();
		if(isset($result))
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
	* @param string $idCity
	* @param string $idUser
	* @param string $idCarWorkShop
	*/
	private function create()
	{
		//validateNumberte Variables
		$name = $this->validateText($_POST['name']);
		$lastName = $this->validateText($_POST['lastName']);
		$nss =  $this->validateText($_POST['nss']);
		$address = $this->validateText($_POST['address']);
		$phone = $this->validateText($_POST['phone']);
		$cellPhone = $this->validateText($_POST['cellPhone']);
		$idCity = $this->validateNumber($_POST['idCity']);
		$idUser = $this->validateNumber($_POST['idUser']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$result = $this->model->create($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop);
		
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
	* @param int $id
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param int $idCity
	* @param int $idCarWorkShop
	* @param int $idUser
	* @return null, view rendered
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name = $this->validateText($_POST['name']);
		$lastName = $this->validateText($_POST['lastName']);
		$nss =  $this->validateText($_POST['nss']);
		$address = $this->validateText($_POST['address']);
		$phone = $this->validateText($_POST['phone']);
		$cellPhone = $this->validateText($_POST['cellPhone']);
		$idCity = $this->validateNumber($_POST['idCity']);
		$idUser = $this->validateNumber($_POST['idUser']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$result = $this->model->edit($id,$name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop);
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
	* @param $id
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