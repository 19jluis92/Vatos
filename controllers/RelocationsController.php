<?php
require('controllers/Controller.php');
class RelocationsController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/RelocationsModel.php');
		$this->model = new RelocationsModel();
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
			case 'createAjax':
						//Validate User and permissions
			$this->createAjax();		
			break;
			case 'edit':
						//Validate User and permissions
			$this->edit();		
			break;
			case 'delete':
						//Validate User and permissions
			$this->delete();		
			break;

			case 'createInventary':
			$this->createInventary();
			break;

			default:
			break;
		}
	}



	/**
	*Show all the relocations of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the relocations
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->assign('users',$result);
			$this->smarty->display('./views/Relocation/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Show the relocation details with the given post parameters 
	*@param id the relocation id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);	
		//show Succesfull
		if(isset($result))
		{
			//Load view
			//Load view
			$this->smarty->assign('user',$result);
			$this->smarty->display('./views/Relocation/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}
	/**
	*Create a relocation with the given post parameters 
	*@param  string $relocationDate (POST)
	*@param  int idEmployee  (POST)
	*@param  string $reason  (POST)
	*@param  int $idDepartment (POST)
	*@param  int $idService  (POST)
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			//Validate Variables
			$relocationDate = $this->validateDate($_POST['relocationDate']);
			$idEmployee = $this->validateNumber($_POST['idEmployee']);
			$reason = $this->validateText($_POST['reason']);
			$idDepartment = $this->validateNumber($_POST['idDepartment']);
			$idService = $this->validateNumber($_POST['idService']);
			$result = $this->model->create($relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
		//Insert Succesfull
			if($result)
			{
			//Load view
				unset($postError);
				header("Location: index.php?controller=Relocation");

			}
			else
			{
				require('views/Error.html');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->loadProperties();
			$this->smarty->assign('Employees',$this->toAssociativeArray($this->Employees->all()));
			$this->smarty->assign('services',$this->toAssociativeArray($this->services->all(),'id','id'));
			$this->smarty->assign('departments',$this->toAssociativeArray($this->departments->all()));
			$this->smarty->display('./views/Relocation/add.tpl');
		}
		
	}

	/**
	*Create a relocation with the given post parameters 
	*@param  string $relocationDate (POST)
	*@param  int idEmployee  (POST)
	*@param  string $reason  (POST)
	*@param  int $idDepartment (POST)
	*@param  int $idService  (POST)
	*@return null nothing returned but view loaded
	*/
	private function createAjax()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			//Validate Variables
			$relocationDate = $this->validateDate($_POST['relocationDate'],'d/m/Y H:i:s');
			$idEmp=  $this->LoggedIn();
			require_once('models/EmployeesModel.php');
			$this->employees = new EmployeesModel();
			$idEmp=$this->employees->getByColumn($idEmp->id,'idUser');
			if(count($idEmp) == 0){
				header('HTTP/1.1 500 Internal Server Error');
			}
			$idEmployee = $idEmp[0]['id'];
			$reason = $this->validateText($_POST['reason']);
			$idDepartment = $this->validateNumber($_POST['idDepartment']);
			$idService = $this->validateNumber($_POST['idService']);
			$result = $this->model->create($relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
		//Insert Succesfull
			if($result)
			{
			//Load view
				echo json_encode($result);

			}
			else
			{
				header('HTTP/1.1 500 Internal Server Error');
			}

		}

	}

	/**
	*Update a relocation with the given post parameters 
	*@param  int $id (POST)
	*@param  string $relocationDate (POST)
	*@param  int idEmployee  (POST)
	*@param  string $reason  (POST)
	*@param  int $idDepartment (POST)
	*@param  int $idService  (POST)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
			$id = $this->validateNumber($_POST['id']);
			$relocationDate = $this->validateDate($_POST['relocationDate']);
			$idEmployee = $this->validateNumber($_POST['idEmployee']);
			$reason = $this->validateText($_POST['reason']);
			$idDepartment = $this->validateNumber($_POST['idDepartment']);
			$idService = $this->validateNumber($_POST['idService']);
			$result = $this->model->edit($id,$relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
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
			$user = $this->model->details($id);
		//select Succesfull
			if($user != NULL)
			{
			//Load view
				$this->smarty->assign('user',$user);
				$this->smarty->display('./views/Relocation/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

	/**
	*Delete a relocation with the given post parameters 
	*@param int $id the relocation id (POST)
	*@return null nothing returned but view loaded
	*/
	private function delete()
	{
		//Validate Variables
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			header("Location: index.php?controller=Relocation&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

	private function loadProperties()
	{
		require('models/EmployeesModel.php');
		$this->Employees = new EmployeesModel();
		require('models/ServicesModel.php');
		$this->services = new ServicesModel();
		require('models/DepartmentsModel.php');
		$this->departments = new DepartmentsModel();
	}
	
	private function createInventary()
	{
		$this->loadProperties();
		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{
			//Validate Variables
			$relocationDate = $this->validateDate($_POST['relocationDate']);
			$idEmp=  $this->LoggedIn();

			$idEmp=$this->Employees->getByColumn($idEmp->id,'idUser');

			$idEmployee = $idEmp[0]['id'];
			
			$reason = $this->validateText($_POST['reason']);
			$idDepartment = $this->validateNumber($_POST['idDepartment']);
			$idService = $this->validateNumber($_POST['idService']);
			$result = $this->model->create($relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
			//Insert Succesfull
			if($result)
			{
				//Load view
			}
			else
			{
				require('views/Error.html');
			}
		}

	}

}

?>
