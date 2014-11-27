<?php
require_once('controllers/Controller.php');

/**
* 
*/
class InventaryController extends Controller
{
	private $model;
	private $Client;
	private	$Vehicle;
	private	$Service;
	private	$CarWorkShop;
	private	$Inspection;
	private	$relocation;
	private	$Employees;
	function __construct()
	{
		parent::__construct();
		
	}

	function run(){
	 	//$this->validatePersmission(["user","admin","superadmin"]);
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':
			$this->all();
			break;
			case 'details':
						//Validate User and permissions
			$this->view();
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

			case 'serviceEdit':
			$this->serviceEdit();
			break;

			case 'editInspection':
			$this->inspectionEdit();
			break;

			case 'editRelocation':
			$this->ubicationEdit();
			break;

			default:
			break;

		}
	}
	public function all(){
		$this->loadProperties();
		$this->Service = new ServicesModel();
		$result = $this->Service->all();
		$this->loadProperties();
    foreach ($result as &$inventary)
    {
	   
			$CarWorkShopName = $this->CarWorkShop->details($inventary['idCarWorkShop']);
			$inventary['idCarWorkShop'] = $CarWorkShopName->name;
			$vehicleVIN = $this->Vehicle->details($inventary['idVehicle']);
			$inventary['idVehicle'] = $vehicleVIN->vin;
			$employeeName = $this->Employees->details($inventary['idEmployee']);
			$inventary['idEmployee'] = $employeeName->name;		
    }
		//Query Succesfull
		if(isset($result))
		{
			$this->smarty->assign('services',$result);
				//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Inventary/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}		

	}

	public function edit(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT')
		{
			
			$result = true;
			if($result)
			{

				//Load view
				unset($postError);
				header("Location: index.php?controller=Home&view=index");
				
			}
			else
			{
				//Ohh well... :(
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError))
		{
			$id = $this->validateNumber($_GET['id']);
			$this->loadProperties();
			$service = $this->Service->details($id);
			$inspections = $this->Inspection->get('inspection',[['','idService','=',$service->id]]);
			$relocations = $this->relocation->get('relocation',[['','idService','=',$service->id]]);
			$vehicle = $this->Vehicle->details($service->idVehicle);
			$client = $this->Client->getClientByVehicle($service->idVehicle);
			//select Succesfull
			if(isset($service))
			{
				$this->smarty->assign('service',$service);
				$this->smarty->assign('vehicle',$vehicle);
				$this->smarty->assign('client',$client);
				$this->smarty->assign('relocations',$relocations);
				$this->smarty->assign('inspections',$inspections);
				$this->smarty->display('./views/Inventary/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

	public function view(){
		$id = $this->validateNumber($_GET['id']);
		$this->loadProperties();
		$service = $this->Service->details($id);
		$inspections = $this->Inspection->get('inspection',[['','idService','=',$service->id]]);
		$relocations = $this->relocation->get('relocation',[['','idService','=',$service->id]]);
		$vehicle = $this->Vehicle->details($service->idVehicle);
		$client = $this->Client->getClientByVehicle($service->idVehicle);
			//select Succesfull
		if(isset($service))
		{
			$this->smarty->assign('service',$service);
			$this->smarty->assign('vehicle',$vehicle);
			$this->smarty->assign('client',$client);
			$this->smarty->assign('relocations',$relocations);
			$this->smarty->assign('inspections',$inspections);
			$this->smarty->display('./views/Inventary/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

	public function delete(){
		
	}

	public function create(){

		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			$result=false;	
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Home&view=index");
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
			$this->smarty->assign('clients',$this->Client->all());	
			$this->smarty->display('./views/Inventary/add.tpl');
		}
	}	

	private function loadProperties(){
		require_once('models/ClientModel.php');
		$this->Client= new ClientModel();
		require_once('models/VehiclesModel.php');
		$this->Vehicle = new VehiclesModel();
		require_once('models/ServicesModel.php');
		$this->Service = new ServicesModel();
		require_once('models/CarWorkShopModel.php');
		$this->CarWorkShop = new CarWorkShopModel();
		require_once('models/InspectionsModel.php');
		$this->Inspection = new InspectionsModel();
		require_once('models/RelocationsModel.php');
		$this->relocation = new RelocationsModel();
		require_once('models/EmployeesModel.php');
		$this->Employees = new EmployeesModel();
	}

	public function serviceEdit(){
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {

		//Validate Variables
			$id = $this->validateNumber($_GET['id']);
			$startDate = $this->validateDate($_POST['startDate']);
			$endDate = $this->validateDate($_POST['endDate']);
			$idEmp=  $this->LoggedIn();
			$idEmp=$this->Employees->getByColumn($idEmp->id,'idUser');
			$idEmployee = $idEmp[0]['id'];
			$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
			$idVehicle = $this->validateNumber($_POST['idVehicleService']);

			$result = $this->Service->edit($id, $startDate, $endDate , $idEmployee , $idCarWorkShop , $idVehicle);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);				
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			
			$serviceok = $this->Service->details($id);
		//select Succesfull
			if($serviceok != NULL)
			{
			//Load view

				$this->smarty->assign('Vehicle',$this->toAssociativeArray($this->Vehicle->all(),'id','vin'));
				$this->smarty->assign('CarWorkShop',$this->toAssociativeArray($this->CarWorkShop->all()));
				//$this->$serviceok->idEmployee = $this->LoggedIn();
				//var_dump($service);
				$this->smarty->assign('service',$serviceok);
				$this->smarty->display('./views/Inventary/serviceEdit.tpl');
			}
			else
			{
				$this->smarty->display('./views/Inventary/serviceCreate.tpl');
			}

		}
	}

	public function inspectionEdit(){
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
			$id = $this->validateNumber($_POST['id']);
			$idService = $this->validateNumber($_POST['idService']);
			$mileage = $this->validateFloat($_POST['mileage']);
			$fuel = $this->validateFloat($_POST['fuel']);
			$inspectionDate = $this->validateDate($_POST['inspectionDate'],'d/m/Y H:i:s');
			//echo $inspectionDate ." --  ".$_POST['inspectionDate'] ;
			$type = $this->validateBool($_POST['type']);
			$result = $this->Inspection->edit($id,$idService,$mileage,$fuel,$inspectionDate,$type);	
		//Insert Succesfull
			if($result)
			{
				echo json_encode($result);
				//unset($postError);
				
			}
			else
			{
				header('HTTP/1.1 500 Internal Server Error');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			if(isset($id))
				$inspection = $this->Inspection->GetByColum('inspection',$id,'id');

		//select Succesfull
			if($inspection != NULL)
			{
			//Load view
				$this->smarty->assign('inspection',$inspection);
				$this->smarty->display('./views/Inventary/inspectionEdit.tpl');
			}
			else
			{
				$this->smarty->display('./views/Inventary/inspectionCreate.tpl');
			}

			

		}
	}

	function ubicationEdit(){
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
			$id = $this->validateNumber($_POST['id']);
			$relocationDate = $this->validateDate($_POST['relocationDate'],'d/m/Y H:i:s');
			$idEmp=  $this->LoggedIn();
			
			$idEmp=$this->Employees->getByColumn($idEmp->id,'idUser');
			
			$idEmployee = $idEmp[0]['id'];
			$reason = $this->validateText($_POST['reason']);
			$idDepartment = $this->validateNumber($_POST['idDepartment']);
			$idService = $this->validateNumber($_POST['idService']);
			$result = $this->relocation->edit($id,$relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
		//Insert Succesfull
			if($result)
			{
				echo json_encode($result);	
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$relocation = $this->relocation->GetByColum('relocation',$id,'id');
		//select Succesfull
			if($relocation != NULL)
			{
			//Load view
				require('models/DepartmentsModel.php');
				$departments = new DepartmentsModel();
				$this->smarty->assign('departments',$this->toAssociativeArray($departments->all()));
				$this->smarty->assign('relocation',$relocation);
				$this->smarty->display('./views/Inventary/ubicationEdit.tpl');
			}
			else
			{

				header('HTTP/1.1 500 Internal Server Error');
				//$this->smarty->display('./views/error.tpl');
			}

		}
	}
}