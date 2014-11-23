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
		$result = $this->loggedIn();
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

}

?>
