<?php
require('controllers/Controller.php');
class HomeController extends Controller {
	private $model;

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
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
			case 'index':
			$this->index();	
			break;
			case 'login':
			$this->autenticate();
			break;
			case 'dashboard':
			{
				$userRole=  $this->LoggedIn();
				$opc = (int)$userRole->idRole;
				
				switch ($opc) {
					case 1:
						$this->EmployeeView();
						break;

					case 2:

						$this->ClientView();
						break;
					
					case 3:
						$this->EmployeeView();
						break;
					default:
						$this->index();	
						break;
				}
			}
			break;

			case 'employee':
			$this->EmployeeView();
			break;

			default:
			$this->index();	
			break;
		}
	}



	/**
	*Show all the colors of the database
	*@return null nothing returned but view loaded
	*/
	private function index()
	{
		$result = $this->LoggedIn();
		$this->smarty->assign('result',$result);
		$this->smarty->display('./views/home/index.tpl');
	}

	/**
	*Show the color details with the given post parameters 
	*@param id the color id
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
			require('views/Color/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a color with the given post parameters 
	*@param name the color name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$result = $this->model->create($name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Color/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a color with the given post parameters 
	*@param name the color name
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name = $this->validateText($_POST['name']);
		$result = $this->model->edit($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Color/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a color with the given post parameters 
	*@param name the color name
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
			require('views/Color/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}


	public function authenticationHome(){

		$id = $this->validateEmail($_POST['name']);
		$name = $this->validateText($_POST['password']);
		$result = $this->model->edit($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Color/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
		
		if(!empty( $_POST['name']) && !empty($_POST['password']) )
		{
			if( $_POST['password']!="******")
			{
				$result=$this->createSession($_POST['name'],$_POST['password']);
			//var_dump($result);



				if(is_bool($result))
				{
					$this->login=$_SESSION['name'];

				}
				$this->smarty->assign('result',$result);
				return $result;
			}
			if(!empty( $_POST['name']) &&$_POST['password']=="******")

				$this->LogoutHome();	
		}
	}

	public function LogoutHome(){
		$this->logout();
		//$this->result=true;
		
	}

	public function ClientView()
	{
		$this->LoadProperties();
		$user=  $this->LoggedIn();
		
		$Clients=$this->Client->GetByColum($user->email,'email');
		$cliente=$this->Client->details($Clients[0]['id']);
		$this->smarty->assign('client',$cliente);
		//var_dump($cliente);
		if(!isset($carros))
			$carros=array();

		$carros=$this->Vehicle->getVehicleByClient($cliente->id);
		
		if(isset($carros))
		{

		$this->smarty->assign('vehicles',$carros);
		$servicios= array();

		foreach ($carros as $variable) {
			# code...
			
			$array=$this->Services->GetByColum($variable[0]['id'],'idVehicle');
			if(isset($array))$servicios=array_merge($array, $servicios);
			
		}
		}
		if(isset($servicios))
			$this->smarty->assign('services',$servicios);
		

	$this->smarty->display('./views/_Layouts/dashboardclient.tpl');

	}

	public function EmployeeView()
	{
		$this->LoadProperties();
		
		
		$cosas = array();
		
		$cosas = $this->Services->GetByColum('0000-00-00 00:00:00','endDate');
		$cosas2 = $this->Services->GetByColum('','endDate');
		if(!is_array($cosas2))
			$cosas2=array();
		if(!is_array($cosas))
			$cosas=array();

		$cosas3=array_merge($cosas, $cosas2);
	
		
			
				$this->smarty->assign('Users',$this->toAssociativeArray($this->Employee->all()));
				$this->smarty->assign('CarWorkShop',$this->toAssociativeArray($this->CarWorkShop->all()));
			$this->smarty->assign('services',$cosas3);
			
			$this->smarty->display('./views/_Layouts/dashboardAdmin.tpl');
	}

	public function LoadProperties(){
		require('models/ClientModel.php');
		$this->Client = new ClientModel();
		require('models/VehiclesModel.php');
		$this->Vehicle = new VehiclesModel();
		require('models/ServicesModel.php');
		$this->Services = new ServicesModel();
		require('models/CarWorkShopModel.php');
		$this->CarWorkShop = new CarWorkShopModel();
		require('models/EmployeesModel.php');
		$this->Employee = new EmployeesModel();
	}

}

?>
