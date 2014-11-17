<?php
require('controllers/Controller.php');
class CarModelController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
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
		
		//get all the CarModel
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			$this->smarty->assign('carModels',$result);
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/CarModel/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Show the CarModel details with the given post parameters 
	*@param int id the CarModel id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		$id = $this->validateNumber($_GET['id']);
		$carModel = $this->model->details($id);
		//select Succesfull
		if($carModel != NULL)
		{
			//Load view
			$this->smarty->assign('carModel',$carModel);
			$this->smarty->display('./views/CarModel/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a CarModel with the given post parameters 
	*@param string  name the CarModel name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$name = $this->validateText($_POST['name']);
			$idBrand = $this->validateText($_POST['idBrand']);
			$result = $this->model->create($name, $idBrand);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=CarModel&view=details&id=$result->id");
				//$this->all();
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}

		} 
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$this->loadProperties();
			$this->smarty->assign('brands',$this->toAssociativeArray($this->brands->all()));
			$this->smarty->display('./views/CarModel/add.tpl');
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
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$id = $this->validateText($_GET['id']);
		$idBrand = $this->validateText($_POST['idBrand']);
		$result = $this->model->edit($id,$name, $idBrand);	
		//Insert Succesfull
			$result = $this->model->edit($id,$name,$idBrand);	
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=CarModel");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$carModel = $this->model->details($id);
		//select Succesfull
			if($carModel != NULL)
			{
			//Load view
				$this->loadProperties();
				$this->smarty->assign('brands',$this->toAssociativeArray($this->brands->all()));
				$this->smarty->assign('carModel',$carModel);
				$this->smarty->display('./views/CarModel/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

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
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=CarModel&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

	private function loadProperties(){
		require('models/BrandModel.php');
		$this->brands = new BrandModel();
	}

}

?>
