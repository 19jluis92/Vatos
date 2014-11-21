<?php
require('controllers/Controller.php');
class CitiesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/CitiesModel.php');
		$this->model = new CitiesModel();
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

			case 'ajax':

				echo json_encode($this->model->all());
			break;
			default:
			break;
		}
	}



	/**
	*Show all the cities of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the cities
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			require('views/City/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the city details with the given post parameters 
	*@param id the city id
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
			require('views/City/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a city with the given post parameters 
	*@param name the city name (POST)
	*@param idState the state id (POST)
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idState = $this->validateNumber($_POST['idState']);
		$result = $this->model->create($name,$idState);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/City/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a city with the given post parameters 
	*@param id the city id (POST)
	*@param name the city name (POST)
	*@param idState the state id (POST)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name = $this->validateText($_POST['name']);
		$idState = $this->validateNumber($_POST['idState']);
		$result = $this->model->edit($id,$name,$idState);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/City/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a city with the given post parameters 
	*@param name the city name
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
			require('views/City/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
