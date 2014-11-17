<?php
require('controllers/Controller.php');
class BumpsController extends Controller {
	private $model;
	private $pieces;
	private $severities;
	private $inspections;

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/BumpsModel.php');
		$this->model = new BumpsModel();
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
	*Show all the bumps of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the bumps
		$result = $this->model->all();	
		$this->smarty->assign('bumps',$result);
		//Query Succesfull
		if(isset($result))
		{
			//Load view
				//require('views/Bump/index.php');
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Bump/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Show the bump details with the given post parameters 
	*@param id the bump id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		
		$id = $this->validateNumber($_GET['id']);
		$bump = $this->model->details($id);
		//select Succesfull
		if($bump != NULL)
		{
			//Load view
			$this->smarty->assign('bump',$bump);
			$this->smarty->display('./views/Bump/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Create a bump with the given post parameters 
	*@param name the bump name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$idPiece = $this->validateNumber($_POST['idPiece']);
			$idSeverity = $this->validateNumber($_POST['idSeverity']);
			$idInspection = $this->validateNumber($_POST['idInspection']);	
			$result = $this->model->create($idPiece , $idSeverity, $idInspection);	
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Bump&view=details&id=$result->id");
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
			$this->smarty->assign('pieces',$this->toAssociativeArray($this->pieces->all()));
			$this->smarty->assign('severities',$this->toAssociativeArray($this->severities->all()));
			$this->smarty->assign('inspections',$this->toAssociativeArray($this->inspections->all()));
			$this->smarty->display('./views/Bump/add.tpl');
		}
	}

	/**
	*Update a bump with the given post parameters 
	*@param name the bump name
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
			$id = $this->validateNumber($_GET['id']);
			$idPiece = $this->validateNumber($_POST['idPiece']);
			$idSeverity = $this->validateNumber($_POST['idSeverity']);
			$idInspection = $this->validateNumber($_POST['idInspection']);
			$result = $this->model->edit($id,$idPiece , $idSeverity, $idInspection);	
		//Update Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Bump");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$this->loadProperties();
			$id = $this->validateNumber($_GET['id']);
			$bump = $this->model->details($id);
		//select Succesfull
			if($bump != NULL)
			{

				$this->smarty->assign('pieces',$this->toAssociativeArray($this->pieces->all()));
				$this->smarty->assign('severities',$this->toAssociativeArray($this->severities->all()));
				$this->smarty->assign('inspections',$this->toAssociativeArray($this->inspections->all()));
				$this->smarty->display('./views/Bump/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

		/**
	*Delete a bump with the given post parameters 
	*@param name the bump name
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
			header("Location: index.php?controller=Bump&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}


	private function loadProperties(){
		require('models/InspectionsModel.php');
		$this->inspections = new InspectionsModel();
		require('models/PiecesModel.php');
		$this->pieces = new PiecesModel();
		require('models/SeveritiesModel.php');
		$this->severities = new SeveritiesModel();
	}

}

?>
