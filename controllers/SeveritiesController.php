<?php
require('controllers/Controller.php');
class SeveritiesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/SeveritiesModel.php');
		$this->model = new SeveritiesModel();
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
	*Show all the severities of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the severities
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			$this->smarty->assign('severities',$result);
				//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Severity/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Show the severity details with the given post parameters 
	*@param id the severity id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$severity = $this->model->details($id);	
		//select Succesfull
		if($severity != NULL)
		{
			//Load view
			$this->smarty->assign('severity',$severity);
			$this->smarty->display('./views/Severity/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Create a severity with the given post parameters 
	*@param name the severity name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$name = $this->validateText($_POST['name']);
			$result = $this->model->create($name);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Severity&view=details&id=$result->id");
				//$this->all();
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}

		} 
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->smarty->display('./views/Severity/add.tpl');
		}
	}

	/**
	*Edit a severity with the given post parameters 
	*@param name the severity name
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {

		//Validate Variables
			$id = $this->validateNumber($_GET['id']);
			$name = $this->validateText($_POST['name']);
			$result = $this->model->edit($id,$name);	
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Severity");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$severity = $this->model->details($id);
		//select Succesfull
			if($severity != NULL)
			{
			//Load view
				$this->smarty->assign('severity',$severity);
				$this->smarty->display('./views/Severity/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

	/**
	*Delete a severity with the given post parameters 
	*@param name the severity name
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
			header("Location: index.php?controller=Severity&deleted=true");
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

}

?>
