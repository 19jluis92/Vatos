<?php
require('controllers/Controller.php');
class WorkShopPhoneController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/WorkShopPhoneModel.php');
		$this->model = new WorkShopPhoneModel();
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
		
		//get all the WorkShopPhone
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			require('views/WorkShopPhone/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the WorkShopPhone details with the given post parameters 
	*@param int id the WorkShopPhone id
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
			require('views/WorkShopPhone/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a WorkShopPhone with the given post parameters 
	*@param string  name the WorkShopPhone name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$lada = $this->validateText($_POST['lada']);
		$area = $this->validateText($_POST['area']);
		$number = $this->validateNumber($_POST['number']);
		$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
		$result = $this->model->create($name, $lada, $area, $number, $idCarWorkShop);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/WorkShopPhone/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a WorkShopPhone with the given post parameters 
	*@param int id the WorkShopPhone name (post)
	*@param string name the WorkShopPhone name  (post)
	*@param int idLocation the location of the WorkShopPhone (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$lada = $this->validateText($_POST['lada']);
		$area = $this->validateNumber($_POST['area']);
		$number = $this->validateNumber($_POST['number']);
		$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
		$result = $this->model->edit($name, $lada, $area, $number, $idCarWorkShop);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/WorkShopPhone/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a WorkShopPhone with the given post parameters 
	*@param id the WorkShopPhone name (post)
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
			require('views/WorkShopPhone/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
