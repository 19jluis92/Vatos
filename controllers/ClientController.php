<?php
require('controllers/Controller.php');
class ClientController extends Controller{
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
	* Show all client in database
	* @return null, view rendered
	*/
	private function all()
	{
		$result = $this->model->all();
		$this->smarty->assign('clients',$result);
		if(isset($result))
		{
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
		$client = $this->model->details($id);
		if($client != NULL)
		{
			//Load view
			//Load view
			$this->smarty->assign('client',$client);
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
	* @return null, view rendered
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT')
		{
			echo 'here';
			//Validate Variables
			$id = $this->validateNumber($_GET['id']);
			$name  = $this->validateText($_POST['name']);
			$lastName = $this->validateNumber($_POST['lastName']);
			$rfc = $this->validateNumber($_POST['rfc']);
			$email = $this->validateEmail($_POST['email']);
			$address = $this->validateEmail($_POST['address']);

			$result = $this->model->edit($id,$name,$lastName,$rfc,$email, $address);
			if($result)
			{
				//Load view
				unset($postError);
				header("Location: index.php?controller=Client");
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
			$client = $this->model->details($id);

			//select Succesfull
			if($client != NULL)
			{
				var_dump($client);
				$this->smarty->assign('client',$client);
				$this->smarty->display('./views/Client/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}
	/**
	* Delete  given the Id
	* @param $id
	* @return null, view rendered
	*/
	private function delete()
	{
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=Client&deleted=true");
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}

}	

?>