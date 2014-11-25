<?php
require_once('controllers/Controller.php');
class ServicesController extends Controller {
	private $model;
	private $employees;


	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require_once('models/ServicesModel.php');
		$this->model = new ServicesModel();
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

			case 'createInventary':
				$this->createInventary();
			break;
			default:
			break;
		}
	}



	/**
	*Show all the services of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the services
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			$this->smarty->assign('services',$result);
				//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Service/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Show the service details with the given post parameters 
	*@param id the service id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$service = $this->model->details($id);	
		//select Succesfull
		if($service != NULL)
		{
			//Load view
			$this->smarty->assign('service',$service);
			$this->smarty->display('./views/Service/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Create a service with the given post parameters 
	*@param string $startDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param int $idEmployee (POST)
	*@param int $idCarWorkShop (POST)
	*@param int $idVehicle (POST)
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{

		//Validate Variables
			$startDate = $this->validateDate($_POST['startDate']);
			$endDate = $this->validateDate($_POST['endDate']);
			$idEmployee = $this->validateNumber($_POST['idEmployee']);
			$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
			$idVehicle = $this->validateNumber($_POST['idVehicle']);
			$result = $this->model->create($startDate, $endDate , $idEmployee , $idCarWorkShop , $idVehicle);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				
				//$this->all();
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
			$this->smarty->assign('services',$this->toAssociativeArray($this->services->all()));
			$this->smarty->assign('vehicles',$this->toAssociativeArray($this->vehicles->all(),'id','vin'));
			$this->smarty->assign('employees',$this->toAssociativeArray($this->employees->all()));
			$this->smarty->display('./views/Service/add.tpl');
		}
	}
	private function loadProperties(){
		
		require_once('models/EmployeesModel.php');
		$this->employees = new EmployeesModel();
		require_once('models/CarWorkShopModel.php');
		$this->services = new CarWorkShopModel();
		require_once('models/VehiclesModel.php');
		$this->vehicles = new VehiclesModel();
	}

	private function createInventary()
	{
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){

		//Validate Variables
			$now = new DateTime();
			$startDate = $now->format('Y-m-d H:i:s');
			$endDate = $this->validateDate($_POST['endDate']);
			$idCarWorkShop = $this->validateNumber($_POST['idvehicleService']);
			$idVehicle = $this->validateNumber($_POST['idVehicle']);
			$idEmp=  $this->LoggedIn();
			require_once('models/EmployeesModel.php');
			$this->employees = new EmployeesModel();
			$idEmp=$this->employees->getByColumn($idEmp->id,'idUser');
			if(count($idEmp) == 0){
				header('HTTP/1.1 500 Internal Server Error');
			}
			$idEmployee = $idEmp[0]['id'];
			
			//var_dump($idCarWorkShop);
			$result = $this->model->create($startDate, $endDate , $idEmployee , $idCarWorkShop , $idVehicle);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				echo json_encode($result);
				//$this->all();
			}
			else
			{
				$postError = true;
				header('HTTP/1.1 500 Internal Server Error');
			}

		} 
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
		
		}
	}

	/**
	*Update a service with the given post parameters 
	*@param int $id  the existing service id
	*@param string $startDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss) (POST)
	*@param int $idEmployee (POST)
	*@param int $idCarWorkShop (POST)
	*@param int $idVehicle (POST)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {

		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$now = new DateTime();
		$startDate = $now->format('Y-m-d H:i:s');
		$endDate = $this->validateDate($_POST['endDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$idVehicle = $this->validateNumber($_POST['idVehicle']);
		$result = $this->model->edit($id, $startDate, $endDate , $idEmployee , $idCarWorkShop , $idVehicle);	
		//Insert Succesfull
		if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Service");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$service = $this->model->details($id);
		//select Succesfull
			if($service != NULL)
			{
			//Load view
				$this->smarty->assign('service',$service);
				$this->smarty->display('./views/Service/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

	/**
	*Delete a service with the given post parameters 
	*@param int id the service name (POST)
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
			header("Location: index.php?controller=Service&deleted=true");
		}
		else
		{
				$this->smarty->display('./views/error.tpl');
		}
	}
}

?>
