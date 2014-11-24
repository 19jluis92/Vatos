<?php
require('controllers/Controller.php');

/**
* 
*/
class EmployeesController extends Controller
{
	private $model;
	function __construct()
	{
		parent::__construct();
		require('models/EmployeesModel.php');
		$this->model = new EmployeesModel();
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
	* Show all in database
	* @return null, view rendered
	*/
	private function all()
	{
		//Get all 
		$result = $this->model->all();
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->assign('users',$result);
			$this->smarty->display('./views/Employee/index.tpl');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
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
			$user = $this->model->details($id);
		//select Succesfull
		if($user != NULL)
			{
			//Load view
				$this->loadProperties();
				$this->smarty->assign('City',$this->toAssociativeArray($this->City->all()));
				$this->smarty->assign('Users',$this->toAssociativeArray($this->Users->all()));
				$this->smarty->assign('CarWorkShop',$this->toAssociativeArray($this->CarWorkShop->all()));
				$this->smarty->assign('user',$user);
			$this->smarty->display('./views/Employee/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}
	/**
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $idCity
	* @param string $idUser
	* @param string $idCarWorkShop
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			//validateNumberte Variables
		$name = $this->validateText($_POST['name']);
		$lastName = $this->validateText($_POST['lastName']);
		$nss =  $this->validateText($_POST['nss']);
		$address = $this->validateText($_POST['address']);
		$phone = $this->validateText($_POST['phone']);
		$cellPhone = $this->validateText($_POST['cellPhone']);
		$idCity = $this->validateNumber($_POST['idCity']);
		$idUser = $this->validateNumber($_POST['idUser']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$result = $this->model->create($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop);
		
		//Insert Succesful
		if($result)
		{
			//Load view
				header("Location: index.php?controller=employee");
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError))
		{
			$this->loadProperties();
			$this->smarty->assign('City',$this->toAssociativeArray($this->City->all()));
			$this->smarty->assign('Users',$this->toAssociativeArray($this->Users->all(),'id','email'));
			$this->smarty->assign('CarWorkShop',$this->toAssociativeArray($this->CarWorkShop->all()));
			$this->smarty->display('./views/Employee/add.tpl');
		}
	}
	/**
	* Update with the given post parameters
	* @param int $id
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param int $idCity
	* @param int $idCarWorkShop
	* @param int $idUser
	* @return null, view rendered
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$name = $this->validateText($_POST['name']);
		$lastName = $this->validateText($_POST['lastName']);
		$nss =  $this->validateText($_POST['nss']);
		$address = $this->validateText($_POST['address']);
		$phone = $this->validateText($_POST['phone']);
		$cellPhone = $this->validateText($_POST['cellPhone']);
		$idCity = $this->validateNumber($_POST['idCity']);
		$idUser = $this->validateNumber($_POST['idUser']);
		$idCarWorkShop = $this->validateNumber($_POST['idCarWorkShop']);
		$result = $this->model->edit($id,$name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop);
		var_dump($result);
		if($result)
		{
			//Load view
			unset($postError);
				header("Location: index.php?controller=employee");
		}
		else
		{
			//Ohh well... :(
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
				$this->loadProperties();
				$this->smarty->assign('City',$this->toAssociativeArray($this->City->all()));
				$this->smarty->assign('Users',$this->toAssociativeArray($this->Users->all()));
				$this->smarty->assign('CarWorkShop',$this->toAssociativeArray($this->CarWorkShop->all()));
				$this->smarty->assign('user',$user);
				$this->smarty->display('./views/Employee/edit.tpl');
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
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=employee&deleted=true");
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}
private function loadProperties(){
		require('models/CitiesModel.php');
		$this->City = new CitiesModel();
		require('models/UsersModel.php');
		$this->Users = new UsersModel();
		require('models/CarWorkShopModel.php');
		$this->CarWorkShop = new CarWorkShopModel();
		
		
	}
}

?>