<?php
require('controllers/Controller.php');
class LocationController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
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
		if(isset($result))
		{
			//Load view
			
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->assign('locations',$result);
			$this->smarty->display('./views/Location/index.tpl');
		}
		else
		{
			//Ohh well... :(
				$this->smarty->display('./views/error.tpl');
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
		if(isset($result))
		{
			//Load view
			//Load view
			$this->smarty->assign('user',$result);
			$this->smarty->display('./views/Location/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a Location with the given post parameters 
	*@param string  name the Location name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
		$result = $this->model->create($name, $idCarWorkShop);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=location");
		}
		else
		{
			$postError = true;
			$this->smarty->assign('error','no se pudo :(');
		}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->loadProperties();
			$this->smarty->assign('carWorkShops',$this->toAssociativeArray($this->carWorkShops->all()));
			$this->smarty->display('./views/Location/add.tpl');
		}
		
	}

	private function loadProperties()
	{
		require('models/CarWorkShopModel.php');
		$this->carWorkShops = new CarWorkShopModel();
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
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {

		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
		$result = $this->model->edit($name, $idCarWorkShop);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			unset($postError);
				header("Location: index.php?controller=Location");
		}
		else
		{
			require('views/Error.html');
		}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$user = $this->model->details($id);
		//select Succesfull
			if($user != NULL)
			{
			//Load view
				$this->smarty->assign('user',$user);
				$this->smarty->display('./views/Location/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

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
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			header("Location: index.php?controller=Location&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
