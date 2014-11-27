<?php
require_once('controllers/Controller.php');
class InspectionsController extends Controller {
	private $model;
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require_once('models/InspectionsModel.php');
		$this->model = new InspectionsModel();
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
				json_encode($this->createInventary());
				break;

			default:
			break;
		}
	}



	/**
	*Show all the inspections of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the inspections
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			$this->smarty->assign('inspections',$result);
				//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Inspection/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Show the inspection details with the given post parameters 
	*@param id the inspection id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$inspection = $this->model->details($id);	
		//select Succesfull
		if($inspection != NULL)
		{
			//Load view
			$this->smarty->assign('inspection',$inspection);
			$this->smarty->display('./views/Inspection/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Create a inspection with the given post parameters 
	*@param int idService 
	*@param float mileage 
	*@param float fuel 
	*@param string inspectionDate datetime value inspection date 
	*@param bool type 
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$idService = $this->validateNumber($_POST['idService']);
			$mileage = $this->validateFloat($_POST['mileage']);
			$fuel = $this->validateFloat($_POST['fuel']);
			$inspectionDate = $this->validateDate($_POST['inspectionDate']);
			$type = $this->validateBool($_POST['type']);
			$result = $this->model->create($idService , $mileage , $fuel , $inspectionDate , $type);
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Inspection");
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
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->loadProperties();
			$this->smarty->assign('services',$this->toAssociativeArray($this->services->all(),'id','id'));
			$this->smarty->display('./views/Inspection/add.tpl');
		}
	}


/**
	*Create a inspection with the given post parameters 
	*@param int idService 
	*@param float mileage 
	*@param float fuel 
	*@param string inspectionDate datetime value inspection date 
	*@param bool type 
	*@return null nothing returned but view loaded
	*/
	private function createAjax()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$idService = $this->validateNumber($_POST['idService']);
			$mileage = $this->validateFloat($_POST['mileage']);
			$fuel = $this->validateFloat($_POST['fuel']);
			$inspectionDate = $this->validateDate($_POST['inspectionDate'],'d/m/Y H:i:s');
			$type = $this->validateNumber($_POST['type']);
			$result = $this->model->create($idService , $mileage , $fuel , $inspectionDate , $type);
			if($result)
			{
				echo json_encode($result);
				//$this->all();
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}

		} 
		
	}

		private function createInventary()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$idService = $this->validateNumber($_POST['idService']);
			$mileage = $this->validateFloat($_POST['mileage']);
			$fuel = $this->validateFloat($_POST['fuel']);
			$inspectionDate = $this->validateDate($_POST['inspectionDate']);
			$type = $this->validateBool($_POST['type']);
			$result = $this->model->create($idService , $mileage , $fuel , $inspectionDate , $type);	
			if($result)
			{
				echo json_encode($result);
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}

		} 
		
	}
	/**
	*Update a inspection with the given post parameters 
	*@param int $id (post)
	*@param int $idService  (post)
	*@param float $mileage  (post)
	*@param float $fuel  (post)
	*@param string $inspectionDate (post) datetime value inspection date 
	*@param  bool $type  (post)
	*@return null $nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
			$id = $this->validateNumber($_POST['id']);
			$idService = $this->validateNumber($_POST['idService']);
			$mileage = $this->validateFloat($_POST['mileage']);
			$fuel = $this->validateFloat($_POST['fuel']);
			$inspectionDate = $this->validateDate($_POST['inspectionDate']);
			$type = $this->validateBool($_POST['type']);
			$result = $this->model->edit($id,$idService,$mileage,$fuel,$inspectionDate,$type);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Inspection");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$inspection = $this->model->details($id);
		//select Succesfull
			if($inspection != NULL)
			{
			//Load view
				$this->smarty->assign('inspection',$inspection);
				$this->smarty->display('./views/Inspection/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

	/**
	*Delete a inspection with the given post parameters 
	*@param int $id the inspection id
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
			header("Location: index.php?controller=Inspection&deleted=true");
		}
		else
		{
				$this->smarty->display('./views/error.tpl');
		}
	}

	private function loadProperties()
	{
		require_once('models/ServicesModel.php');
		$this->services = new ServicesModel();
	}
}

?>
