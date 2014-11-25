<?php 
require_once('controllers/Controller.php');
require_once('mail.php');
class UsersController extends Controller{
	private $model;
	private $roles;

	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		parent::__construct();
		require_once('models/UsersModel.php');
		$this->model = new UsersModel();
	}
	
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':case 'list':
			if(true)			//Validate User and permissions
			{$this->all();}
			else{
				echo'sin session';
			}

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
			case 'ajax':

			echo json_encode($this->model->all());
			break;
			case 'massInsert':
			$this->massInsert();
			break;
			default:
			break;
		}
	}
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			//Validate Variables
			$email   = $this->validateEmail($_POST['email']);
			$password = $this->validateText($_POST['password']);
			$idRole = $this->validateNumber($_POST['idRole']);
			$result = $this->model->create($email, $password,$idRole);
			//Insert Succesful
			if($result)
			{
				//Load view
				$message = 'Bienvenido Vato';
				$mail = new Mail($email, $message);
				$mail->send_mail();
				require('views/User/Created.php');
			}
			else
			{
				require('views/Error.html');
			}


		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$this->loadProperties();
			$this->smarty->assign('roles',$this->toAssociativeArray($this->roles->all()));
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->smarty->display('./views/User/add.tpl');
		}
		
	}

	private function createUserByClient($email,$password,$idRole)
	{
			
			$result = $this->model->create($email, $password,$idRole);
			//Insert Succesful
			if($result)
			{
				//Load view
				$message = 'Bienvenido Vato su usuario:'.$email.'su password:'.$password.' ';
				$mail = new Mail($email, $message);
				$mail->send_mail();
				return true;
				
			}
			else
			{
				return false;
			}
	}
	/**
	*@param $id
	*@param return null
	**/
	private function delete(){
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->delete($id);
		if($result)
		{
			header("Location: index.php?controller=user&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}
	/**
	* Show details of car given it's Id
	* @param id
	* @return null, view rendered
	*/
	private function details(){
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->details($id);
		
		if(isset($result))
		{
			//Load view
			//Load view
			$this->smarty->assign('user',$result);
			$this->smarty->display('./views/User/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}
	/**
	* Update user
	* @param email
	* @param password
	* @return null, view rendered
	*/
	private function edit(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT')
		{
			$id = $this->validateText($_GET['id']);
			$email = $this->validateText($_POST['email']);
			$password = $this->validateText($_POST['password']);
			$result = $this->model->edit($id,$email,$password);
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=user");
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
				$this->loadProperties();
				$this->smarty->assign('roles',$this->toAssociativeArray($this->roles->all()));
				$this->smarty->assign('user',$user);
				$this->smarty->display('./views/User/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}
	/**
	* Show all users in database
	* @return null, view rendered
	*/
	private function all(){
		$result = $this->model->all();

		if(isset($result))
		{
			//Load view
			
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->assign('users',$result);
			$this->smarty->display('./views/User/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	public function authenticationForUser($name,$pass){
		$result = $this->model->authentication($name,$pass);
		return $result;
	}

	private function massInsert()
	{
		$dataArray = $this->massiveInsertion();
		
		for($i = 0; $i < count($dataArray); $i++)
		{
			/*Perdon por esto de aqui :(, lo arreglare despues*/
				$email = $this->validateText($dataArray[$i][0]);
				$password = $this->validateNumber($dataArray[$i][1]);
				$result = $this->model->create($email, $password);
			}
			$this->all();
		}

		private function loadProperties(){
			require_once('models/RolesModel.php');
			$this->roles = new RolesModel();
		}


	}
	?>