<?php
require('controllers/Controller.php');
class CarTypesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/CarTypesModel.php');
		$this->model = new CarTypesModel();
	}

	/**
	*Execute Actions based on the action selected from user in Query Args
	*@return null
	*/
	function run()
	{
		switch($_GET['view'])
		{
			case 'index':case 'list':
						//Validate User and permissions
			$this->list();	
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
	*Show all the cartypes of the database
	*@return null nothing returned but view loaded
	*/
	private function list()
	{
		
		//get all the cartypes
		$result = $this->model->list();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/CarType/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the cartype details with the given post parameters 
	*@param id the cartype id
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
			require('views/CarType/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a cartype with the given post parameters 
	*@param name the cartype name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$result = $this->model->create($name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/CarType/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a cartype with the given post parameters 
	*@param name the cartype name
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name = $this->validateText($_POST['name']);
		$result = $this->model->update($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/CarType/Updated.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a cartype with the given post parameters 
	*@param name the cartype name
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
			require('views/CarType/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
