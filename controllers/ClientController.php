<?php
require('controllers/controller.php');
class ClientController extends Controller
{
	private $model;
	
	function __construct()
	{
		parent::__construct();
		require('models/ClientModel.php');
		$this->model = new ClientModel();
	}

	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':
			            $this->index();
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
	* Show all client in database
	* @return null, view rendered
	*/
	private function index()
	{
		$result = $this->model->index();
		if(isset($result))
		{
			$this->smarty->assign('clients',$result);
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->display('./views/Client/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}

	}
	/**
	* Show details of car given it's Id
	* @param id
	* @return null, view rendered
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->details($id);
		
		if(isset($result))
		{
			//Load view
			//Load view
			$this->smarty->assign('user',$result);
			$this->smarty->display('./views/Client/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	* Create new client
	* @param string $name
	* @param string $lastName
	* @param string $rfc
	* @param string $email
	* @param string $address
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{
			//Validate Variables
			$name= $this->validateText($_POST['name']);
			$lastName= $this->validateNumber($_POST['lastName']);
			$rfc= $this->validateNumber($_POST['rfc']);
			$email=$this->validateEmail($_POST['email']);
			$address=$this->validateNumber($_POST['address']);
			$result = $this->model->create($name,$lastName,$rfc, $email, $address);
		//Insert Succesful
		if($result)
		{
			//Load view
			unset($postError);
			header("Location: index.php?controller=client&view=details&id=$result->id");
			
		}
		else
		{
			//Ohh well... :(
			$postError = true;
			$this->smarty->assign('error',$result);
		}

		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			
			$this->smarty->display('./views/Client/add.tpl');
		}
		
	}
	/**
	* Update  with the given post parameters
	* @param string $name
	* @param string $lastName
	* @param string $rfc
	* @param string $clientCol
	* @param string $clientCol1
	* @param string $number
	* @param string $lada
	* @param string $area
	* @return null, view rendered
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name   		 = $this->validateText($_POST['name']);
		$lastName 		 = $this->validateNumber($_POST['lastName']);
		$rfc		 = $this->validateNumber($_POST['rfc']);
		$clientCol		 = $this->validateNumber($_POST['clientCol']);
		$clientCol1  		 = $this->validateNumber($_POST['clientCol1']);
		$number  = $this->validateText($_POST['number']);
		$lada	     = $this->validateNumber($_POST['lada']);
		$area    = $this->validateNumber($_POST['area']);

		$result = $this->model->edit($id,$name,$lastName,$rfc,$clientCol,$clientCol1);
		if($result)
		{
			//Load view
			require('views/Client/Edited.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Delete  given the Id
	* @param $id
	* @return null, view rendered
	*/
	private function delete()
	{
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Client/Deleted.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}

}	

?>