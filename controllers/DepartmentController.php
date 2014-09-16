<?php
require('controllers/Controller.php');
class DepartmentsController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/DepartmentsModel.php');
		$this->model = new DepartmentsModel();
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
	*Show all the departments of the database
	*@return null nothing returned but view loaded
	*/
	private function list()
	{
		
		//get all the departments
		$result = $this->model->list();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Department/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the department details with the given post parameters 
	*@param id the department id
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
			require('views/Department/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a department with the given post parameters 
	*@param name the department name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idLocation = $this->validateText($_POST['idLocation']);
		$result = $this->model->create($name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Department/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a department with the given post parameters 
	*@param id the department name (post)
	*@param name the department name  (post)
	*@param idLocation the location of the department (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name = $this->validateText($_POST['name']);
		$idLocation = $this->validateText($_POST['idLocation']);
		$result = $this->model->update($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Department/Updated.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a department with the given post parameters 
	*@param id the department name (post)
	*@return null nothing returned but view loaded
	*/
	private function delete()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->create($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Department/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
