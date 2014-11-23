<?php
require('controllers/Controller.php');

/**
* 
*/
class InventaryController extends Controller
{
	private $model;
	function __construct()
	{
		parent::__construct();
		
	}

	 function run(){
	 	$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':
			            $this->all();
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

			case 'inpectionEdit':
				$this->inspectionEdit();
				break;

			case 'ubicationEdit':
				$this->ubicationEdit();
				break;

			default:
						break;

		}
	 }
	public function all(){

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
			//$id = $this->validateNumber($_GET['id']);
			#$client = $this->model->details($id);

			//select Succesfull
			if(true)
			{
				#var_dump($client);
				//$this->smarty->assign('id',$id);
				$this->smarty->display('./views/Inventary/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

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
			//$this->smarty->assign('Clients',$this->toAssociativeArray($this->Client->all()));	
			$this->smarty->display('./views/Inventary/add.tpl');
		}
	}	

	private function loadProperties(){
		require('models/VehiclesModel.php');
		$this->Vehicle = new VehiclesModel();
		require('models/ServicesModel.php');
		$this->Service = new ServicesModel();
		require('models/CarWorkShopModel.php');
		$this->CarWorkShop = new CarWorkShopModel();
		require('models/InspectionsModel.php');
		$this->Inspection = new InspectionsModel();
		require('models/RelocationsModel.php');
		$this->relocation = new RelocationsModel();
		
	}

	public function serviceEdit(){
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {

		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$startDate = $this->validateDate($_POST['startDate']);
		$endDate = $this->validateDate($_POST['endDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$idVehicle = $this->validateNumber($_POST['idVehicle']);

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
			$service = $this->Service->details($id);
		//select Succesfull
			if($service != NULL)
			{
			//Load view

				$this->smarty->assign('Vehicle',$this->toAssociativeArray($this->Vehicle->all(),'id','vin'));
				$this->smarty->assign('CarWorkShop',$this->toAssociativeArray($this->CarWorkShop->all()));
				$this->smarty->assign('service',$service);
				$this->smarty->display('./views/Inventary/serviceEdit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
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
			$inspectionDate = $this->validateDate($_POST['inspectionDate']);
			$type = $this->validateBool($_POST['type']);
			$result = $this->Inspection->edit($id,$idService,$mileage,$fuel,$inspectionDate,$type);	
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
			$inspection = $this->Inspection->GetByColum('inspection',$id,'idService');

		//select Succesfull
			if($inspection != NULL)
			{
			//Load view

				$this->smarty->assign('inspection',$inspection);
				$this->smarty->display('./views/Inventary/inspectionEdit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

	function ubicationEdit(){
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$relocationDate = $this->validateDate($_POST['relocationDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$reason = $this->validateText($_POST['reason']);
		$idDepartment = $this->validateNumber($_POST['idDepartment']);
		$idService = $this->validateNumber($_POST['idService']);
		$result = $this->relocation->edit($id,$relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
		//Insert Succesfull
		if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Relocation");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$user = $this->relocation->GetByColum('relocation',$id,'idService');
		//select Succesfull
			if($user != NULL)
			{
			//Load view
				$this->smarty->assign('user',$user);
				$this->smarty->display('./views/Inventary/ubicationEdit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}
}