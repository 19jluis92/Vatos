<?php
require('controllers/Controller.php');
class SeveritiesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/SeveritiesModel.php');
		$this->model = new SeveritiesModel();
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
	*Show all the severities of the database
	*@return null nothing returned but view loaded
	*/
	private function list()
	{
		
		//get all the severities
		$result = $this->model->list();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Severity/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the severity details with the given post parameters 
	*@param id the severity id
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
			require('views/Severity/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a severity with the given post parameters 
	*@param name the severity name by post
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
			require('views/Severity/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Edit a severity with the given post parameters 
	*@param name the severity name
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
			require('views/Severity/Updated.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a severity with the given post parameters 
	*@param name the severity name
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
			require('views/Severity/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
