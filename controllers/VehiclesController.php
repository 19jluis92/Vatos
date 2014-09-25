<?php
require('controllers/Controller.php');
class VehiclesController extends Controller {
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		require('models/VehiclesModel.php');
		$this->model = new VehiclesModel();
	}
	
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($_GET['view'])
		{
			case 'index':
			case 'list':
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
	* Show all vehicles in database
	* @return null, view rendered
	*/
	private function all()
	{
		//Get all the Vehicles
		$result = $this->model->all();
		if(isset($result))
		{
			//Load view
			require('views/Vehicle/Index.php');
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
			require('views/Vehicle/Details.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Create new Vehicle
	* @param string $vin
	* @param int $model
	* @param int $color
	* @param int $year
	* @param int $type
	* @param string $conditions
	* @param int $plates
	*/
	private function create()
	{
		//Validate Variables
		$vin   		 = $this->validateText($_POST['vin']);
		$model 		 = $this->validateNumber($_POST['model']);
		$color		 = $this->validateNumber($_POST['color']);
		$year		 = $this->validateNumber($_POST['year']);
		$type  		 = $this->validateNumber($_POST['type']);
		$conditions  = $this->validateText($_POST['conditions']);
		$plates	     = $this->validateNumber($_POST['plates']);
		
		$result = $this->model->create($vin, $model, $color, $year , $type, $conditions, $plates);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			require('views/Vehicle/Created.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Update Vehicle with the given post parameters
	* @param string $vin
	* @param int $model
	* @param int $color
	* @param int $year
	* @param int $type
	* @param string $conditions
	* @param int $plates
	* @return null, view rendered
	*/
	private function edit()
	{
		//Validate Variables
		$vin   		 = $this->validateText($_POST['vin']);
		$model 		 = $this->validateNumber($_POST['model']);
		$color		 = $this->validateNumber($_POST['color']);
		$year		 = $this->validateNumber($_POST['year']);
		$type  		 = $this->validateNumber($_POST['type']);
		$conditions  = $this->validateText($_POST['conditions']);
		$plates	     = $this->validateNumber($_POST['plates']);

		$result = $this->model->edit($vin, $model, $color, $year , $type, $conditions, $plates);
		if($result)
		{
			//Load view
			require('views/Vehicle/Edited.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Delete Vehicle given the Id
	* @param $VIN
	* @return null, view rendered
	*/
	private function delete()
	{
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->create($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Vehicle/Deleted.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}

}

?>
