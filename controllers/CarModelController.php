<?php
require('controllers/Controller.php');
class CarModelController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/CarModel.php');
		$this->model = new CarModel();
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
	*Show all the Countries of the database
	*@return null nothing returned but view loaded
	*/
	private function list()
	{
		
		//get all the CarModel
		$result = $this->model->list();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/CarModel/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the CarModel details with the given post parameters 
	*@param int id the CarModel id
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
			require('views/CarModel/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a CarModel with the given post parameters 
	*@param string  name the CarModel name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idBrand = $this->validateText($_POST['idBrand']);
		$result = $this->model->create($name, $idBrand);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/CarModel/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a CarModel with the given post parameters 
	*@param int id the CarModel name (post)
	*@param string name the CarModel name  (post)
	*@param int idCarModel the CarModel of the CarModel (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idBrand = $this->validateText($_POST['idBrand']);
		$result = $this->model->update($name, $idBrand);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/CarModel/Updated.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a CarModel with the given post parameters 
	*@param id the CarModel name (post)
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
			require('views/CarModel/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
