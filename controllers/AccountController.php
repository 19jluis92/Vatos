<?php
require_once('controllers/Controller.php');
class AccountController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/AccountModel.php');
		$this->model = new AccountModel();
	}

	/**
	*Execute Actions based on the action selected from user in Query Args
	*@return null
	*/
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'login';
		switch($view)
		{
			case 'login':
						//Validate User and permissions
			$this->login();	
			break;
			case 'logout':
						//Validate User and permissions
			$this->logout();		
			break;
			case 'profile':
			$this->validatePersmission("all");
						//Validate User and permissions
			$this->details();		
			break;
			default:
			break;
		}
	}



	/**
	*Show all the Countries of the database
	*@return null nothing returned but view loaded
	*/
	public function login(){
		$email = $this->validateEmail($_POST['name']);
		$password = $this->validateText($_POST['password']);
		if($this->validateUser($email, $password))
		{
			echo json_encode($_SESSION['user']);
			return;
		}
		echo json_encode(null);
	}

	private function validateUser($name,$pass){
		
		if(isset($name) && isset($pass) )
		{

			require('models/UsersModel.php');
			$model = new UsersModel();
			$user=$model->find($name,$pass);
			if($user != null)
			{
				$_SESSION['uid'] = $user->id; 
				$_SESSION['user'] = $user;
				setcookie("user", json_encode($user));
				return true;
			}

			return false;
		}
		
		
		
	}


	/**
	*Show the Brand details with the given post parameters 
	*@param int id the Brand id
	*@return null nothing returned but view loaded
	*/
	public function logout()
	{
		session_unset();
		session_destroy();
		setcookie(session_name(),time()-3600);
		header("Location: index.php");

	}

	/**
	*
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		session_start();
		if (isset($_SESSION['user'])) {
			require('views/Account/LoggedIn.php');
		}
		else{
			echo "usuario no logueado";
		}

	}

	/**
	*Update a Brand with the given post parameters 
	*@param int id the Brand name (post)
	*@param string name the Brand name  (post)
	*@param int idLocation the location of the Brand (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$result = $this->model->edit($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Brand/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a Brand with the given post parameters 
	*@param id the Brand name (post)
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
			require('views/Brand/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
