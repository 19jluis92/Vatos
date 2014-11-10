<?php 
require('controllers/Controller.php'); 
class UsersController extends Controller{
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		require('models/UsersModel.php');
		$this->model = new UsersModel();
	}
	
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':case 'list':
			if($this->validateSession())			//Validate User and permissions
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
			default:
			break;
		}
	}
	private function create()
	{
		
		//Validate Variables
		
		$email   = $this->validateEmail($_POST['email']);
		$password = $this->validateText($_POST['password']);
		$result = $this->model->create($email, $password);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			
			require('views/User/Created.php');
		}
		else
		{
			require('views/Error.html');
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
			require('views/User/Deleted.php');
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
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);
		
		if(isset($result))
		{
			//Load view
			require('views/User/Details.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Update user
	* @param email
	* @param password
	* @return null, view rendered
	*/
	private function edit(){
		$id = $this->validateText($_POST['id']);
		$email = $this->validateText($_POST['email']);
		$password = $this->validateText($_POST['password']);
		$result = $this->model->edit($id,$email,$password);
	}
	/**
	* Show all users in database
	* @return null, view rendered
	*/
	private function all(){
		$result = $this->model->index();

		if(isset($result))
		{
			//Load view
			
			require('views/User/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	public function authenticationForUser($name,$pass){
		$result = $this->model->authentication($name,$pass);
		return $result;
	}

}
?>