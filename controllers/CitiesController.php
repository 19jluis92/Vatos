<?php
require('controllers/Controller.php');
class CitiesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/CitiesModel.php');
		$this->model = new CitiesModel();
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

			case 'ajax':

				echo json_encode($this->model->all());
			break;
			default:
			break;
		}
	}



	/**
	*Show all the cities of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the cities
		$result = $this->model->all();
		$this->loadProperties();
		foreach($result as &$city)
		{
 			$modelName = $this->states->details($city['idState']);
 			$city['idState'] = $modelName->name;
		}

		$this->smarty->assign('cities',$result);
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/City/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Show the city details with the given post parameters 
	*@param id the city id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$city = $this->model->details($id);
		//Insert Succesfull
		if($city != NULL)
		{
			//Load view
			$this->smarty->assign('city',$city);
			$this->smarty->display('./views/City/view.tpl');
		}
		else
		{
			require('views/Error.html');
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a city with the given post parameters 
	*@param name the city name (POST)
	*@param idState the state id (POST)
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{	
			echo "string";
			//Validate Variables
			$name = $this->validateText($_POST['name']);
			$idState = $this->validateNumber($_POST['idState']);
			$result = $this->model->create($name,$idState);
			//Insert Succesfull
			if($result)
			{
				//Load view
				header("Location: index.php?controller=city&view=index");
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
			$this->smarty->assign('states',$this->parcheAlCageDeChelis($this->states->all()));
			$this->smarty->display('./views/City/add.tpl');
		}
	}

	/**
	*Update a city with the given post parameters 
	*@param id the city id (POST)
	*@param name the city name (POST)
	*@param idState the state id (POST)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') 
		{
			//Validate Variables
			$id = $this->validateNumber($_GET['id']);
			$name = $this->validateText($_POST['name']);
			echo $name;
			$idState = $this->validateNumber($_POST['idState']);
			echo $idState;
			$result = $this->model->edit($id,$name,$idState);	

			//Insert Succesfull
			if($result)
			{
				//Load view
				unset($postError);
				header("Location: index.php?controller=city");
			}
			else
			{
				require('views/Error.html');
				//$postError = true;
				//$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$city = $this->model->details($id);
			//select Succesfull
			if($city != NULL)
			{
				$this->loadProperties();
				$this->smarty->assign('states',$this->parcheAlCageDeChelis($this->states->all()));
				$this->smarty->assign('city',$city);
				$this->smarty->display('./views/City/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}

	}
     
	/**
	*Delete a city with the given post parameters 
	*@param name the city name
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
			header("Location: index.php?controller=city&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

	private function loadProperties(){
		require('models/StateModel.php');
		$this->states = new StateModel();
	}

}

?>
