<?php
require('controllers/Controller.php');
class CarWorkShopController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/CarWorkShopModel.php');
		$this->model = new CarWorkShopModel();
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
		
		//get all the CarWorkShop
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			require('views/CarWorkShop/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the CarWorkShop details with the given post parameters 
	*@param int id the CarWorkShop id
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
			require('views/CarWorkShop/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a CarWorkShop with the given post parameters 
	*@param string  name the CarWorkShop name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$address = $this->validateText($_POST['address']);
		$idCity = $this->validateNumber($_POST['idCity']);
		$result = $this->model->create($name, $address, $idCity);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/CarWorkShop/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a CarWorkShop with the given post parameters 
	*@param int id the CarWorkShop name (post)
	*@param string name the CarWorkShop name  (post)
	*@param int idLocation the location of the CarWorkShop (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$address = $this->validateText($_POST['address']);
		$idCity = $this->validateNumber($_POST['idCity']);
		$result = $this->model->edit($name, $address,$idCity);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/CarWorkShop/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a CarWorkShop with the given post parameters 
	*@param id the CarWorkShop name (post)
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
			require('views/CarWorkShop/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
