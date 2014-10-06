<?php
require('controllers/Controller.php');
class CountryController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/CountryModel.php');
		$this->model = new CountryModel();
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
		
		//get all the Country

		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			require('views/Country/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the Country details with the given post parameters 
	*@param int id the Country id
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
			require('views/Country/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a Country with the given post parameters 
	*@param string  name the Country name by post
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
			require('views/Country/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a Country with the given post parameters 
	*@param int id the Country name (post)
	*@param string name the Country name  (post)
	*@param int idLocation the location of the Country (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$result = $this->model->edit($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Country/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a Country with the given post parameters 
	*@param id the Country name (post)
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
			require('views/Country/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
