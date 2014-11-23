<?php 
require('controllers/Controller.php');
require('mail.php');
class UsersController extends Controller{
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		parent::__construct();
		require('models/UsersModel.php');
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
			$result = $this->model->create($email, $password);
			
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
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->smarty->display('./views/User/add.tpl');
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
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {

		$id = $this->validateText($_POST['id']);
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
			//Load view
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
		$model = $this->validateText($_GET['model']);
		echo $model;
		/*Work on this shit*/
		$dataArray = $this->massiveInsertion();
		
		for($i = 0; $i < count($dataArray); $i++)
		{ 
			$email = $this->validateText($dataArray[$i][0]);
			$password = $this->validateNumber($dataArray[$i][1]);
			$result = $this->model->create($email, $password);
		}
		$this->all();
	}
}
?>