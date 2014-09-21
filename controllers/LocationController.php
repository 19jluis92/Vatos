<?php
require('controllers/Controller.php');
class LocationController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/LocationModel.php');
		$this->model = new LocationModel();
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
	*Show all the Countries of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the Location
		$result = $this->model->all();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Location/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the Location details with the given post parameters 
	*@param int id the Location id
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
			require('views/Location/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a Location with the given post parameters 
	*@param string  name the Location name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
		$result = $this->model->create($name, $idCarWorkShop);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Location/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a Location with the given post parameters 
	*@param int id the Location name (post)
	*@param string name the Location name  (post)
	*@param int idLocation the location of the Location (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
		$result = $this->model->edit($name, $idCarWorkShop);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Location/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a Location with the given post parameters 
	*@param id the Location name (post)
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
			require('views/Location/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
