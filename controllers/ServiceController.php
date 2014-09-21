<?php
require('controllers/Controller.php');
class ServicesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/ServicesModel.php');
		$this->model = new ServicesModel();
	}

	/**
	*Execute Actions based on the action selected from user in Query Args
	*@return null
	*/
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':case 'list':
						//Validate User and permissions
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
	*Show all the services of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the services
		$result = $this->model->all();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Service/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the service details with the given post parameters 
	*@param id the service id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Service/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a service with the given post parameters 
	*@param string $startDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param int $idEmployee (POST)
	*@param int $idCarWorkShop (POST)
	*@param int $idVehicle (POST)
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$startDate = $this->validateDate($_POST['startDate']);
		$endDate = $this->validateDate($_POST['endDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$idVehicle = $this->validateNumber($_POST['idVehicle']);
		$result = $this->model->create($startDate, $endDate , $idEmployee , $idCarWorkShop , $idVehicle);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Service/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a service with the given post parameters 
	*@param int $id  the existing service id
	*@param string $startDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param int $idEmployee (POST)
	*@param int $idCarWorkShop (POST)
	*@param int $idVehicle (POST)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$startDate = $this->validateDate($_POST['startDate']);
		$endDate = $this->validateDate($_POST['endDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$idVehicle = $this->validateNumber($_POST['idVehicle']);
		$result = $this->model->edit($id, $startDate, $endDate , $idEmployee , $idCarWorkShop , $idVehicle);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Service/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a service with the given post parameters 
	*@param int id the service name (POST)
	*@return null nothing returned but view loaded
	*/
	private function delete()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Service/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
