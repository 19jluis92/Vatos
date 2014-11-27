<?php
require('controllers/Controller.php');
require('mail.php');
class CarWorkShopController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
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
					//$this->validateSession() ? $this->create() : require('views/Error.html') ;
			$this->create();
			break;
			case 'edit':
					//Validate User and permissions
					//$this->validateSession() ? $this->edit() : require('views/Error.html') ;

			$this->edit();
			break;
			case 'ajax':

				echo json_encode($this->model->all());
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
		$this->loadProperties();
		foreach ($result as &$city)
		{
			$cityName = $this->cities->details($city['idCity']);
			$city['idCity'] = $cityName->name;
		}

		$this->smarty->assign('carworkshops',$result);
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/CarWorkShop/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
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
		$id = $this->validateNumber($_GET['id']);
		$carworkshop = $this->model->details($id);

		//Insert Succesfull
		if($carworkshop)
		{
			//Load view
			$this->smarty->assign('carworkshop',$carworkshop);
			$this->smarty->display('./views/CarWorkShop/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a CarWorkShop with the given post parameters 
	*@param string  name the CarWorkShop name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{

		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{
			//Validate Variables
			$name = $this->validateText($_POST['name']);
			$address = $this->validateText($_POST['address']);
			$idCity = $this->validateNumber($_POST['idCity']);
			$result = $this->model->create($name, $address,$idCity);	
	      //Insert Succesful
			if($result)
			{
	         unset($postError);
				header("Location: index.php?controller=carworkshop&view=details&id=$result->id");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError))
		{
			$this->loadProperties();
			$this->smarty->assign('cities',$this->toAssociativeArray($this->cities->all()));
			$this->smarty->display('./views/CarWorkShop/add.tpl');
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
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT')
		{
			//Validate Variables
			$id = $this->validateText($_GET['id']);
			$name = $this->validateText($_POST['name']);
			$address = $this->validateText($_POST['address']);
			$idCity = $this->validateNumber($_POST['idCity']);
			$result = $this->model->edit($id,$name, $address,$idCity);	
			//Insert Succesfull
			if($result)
			{
				//Load view
				unset($postError);
				header("Location: index.php?controller=carworkshop");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError))
		{
			$id = $this->validateNumber($_GET['id']);
			$carworkshop = $this->model->details($id);
		//select Succesfull
			if($carworkshop != NULL)
			{
				//Load view
				$this->loadProperties();
			$this->smarty->assign('cities',$this->toAssociativeArray($this->cities->all()));
				$this->smarty->assign('carworkshop',$carworkshop);
				$this->smarty->display('./views/carworkshop/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

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
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		$result ? header("Location: index.php?controller=carworkshop") : $this->smarty->display('./views/error.tpl') ;
	}

	private function loadProperties()
	{
		require('models/CitiesModel.php');
		$this->cities = new CitiesModel();
	}
}

?>
