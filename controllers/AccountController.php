<?php
require('controllers/Controller.php');
class AccountController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
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
	private function login()
	{
		
		//get all the Brand
		$user = (isset($_POST['user'])?$_POST['user']:'');
		$user = $this->validateText($user);
		$_SESSION['user'] = $user;
		//Query Succesfull
		if(isset($user))
		{
			//Load view
			require('views/Account/session.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the Brand details with the given post parameters 
	*@param int id the Brand id
	*@return null nothing returned but view loaded
	*/
	private function logout()
	{
		session_unset();
		session_destroy();
		setcookie(session_name(),time()-3600);

		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Home/Index.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a Brand with the given post parameters 
	*@param string  name the Brand name by post
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
