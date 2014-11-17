<?php
require('controllers/Controller.php');
class StateController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/StateModel.php');
		$this->model = new StateModel();
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
	*Show all the Countries of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the State
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->assign('users',$result);
			$this->smarty->display('./views/State/index.tpl');
		}
		else
		{
			//Ohh well... :(
				$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Show the State details with the given post parameters 
	*@param int id the State id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);	
		//Insert Succesfull
		if(isset($result))
		{
			//Load view
			//Load view
			$this->smarty->assign('user',$result);
			$this->smarty->display('./views/State/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a State with the given post parameters 
	*@param string  name the State name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idCountry = $this->validateNumber($_POST['idCountry']);
		$result = $this->model->create($name, $idCountry);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			unset($postError);
			header("Location: index.php?controller=State");
			
		}
		else
		{
			require('views/Error.html');
		}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->smarty->display('./views/State/add.tpl');
		}
		
	}

	/**
	*Update a State with the given post parameters 
	*@param int id the State name (post)
	*@param string name the State name  (post)
	*@param int idLocation the location of the State (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
				//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idState = $this->validateNumber($_POST['idState']);
		$result = $this->model->edit($name,$idState);	
		//Insert Succesfull
		if($result)
			{
				unset($postError);
				header("Location: index.php?controller=State");
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
				$this->smarty->display('./views/State/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

		/**
	*Delete a State with the given post parameters 
	*@param id the State name (post)
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
			header("Location: index.php?controller=State&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
