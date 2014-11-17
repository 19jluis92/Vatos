<?php
require('controllers/Controller.php');
class WorkShopPhoneController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/WorkShopPhoneModel.php');
		$this->model = new WorkShopPhoneModel();
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
		
		//get all the WorkShopPhone
		$result = $this->model->all();
		$this->smarty->assign('workshopphone',$result);
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/workshopphone/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Show the WorkShopPhone details with the given post parameters 
	*@param int id the WorkShopPhone id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$workshopphone = $this->model->details($id);	
		//Insert Succesfull
		if($workshopphone != null)
		{
			//Load view
			$this->smarty->assign('workshopphone',$workshopphone);
			$this->smarty->display('./views/WorkShopPhone/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a WorkShopPhone with the given post parameters 
	*@param string  name the WorkShopPhone name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{
			//Validate Variables
			$name = $this->validateText($_POST['name']);
			$lada = $this->validateText($_POST['lada']);
			$area = $this->validateText($_POST['area']);
			$number = $this->validateNumber($_POST['number']);
			$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
			$result = $this->model->create($name, $lada, $area, $number, $idCarWorkShop);	
			//Insert Succesfull
			if($result)
			{
				//Load view
				unset($postError);
				var_dump($result);
				header("Location: index.php?controller=workshopphone&view=details&id=$result->id");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->smarty->display('./views/workshopphone/add.tpl');
		}
	}

	/**
	*Update a WorkShopPhone with the given post parameters 
	*@param int id the WorkShopPhone name (post)
	*@param string name the WorkShopPhone name  (post)
	*@param int idLocation the location of the WorkShopPhone (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT')
		{
			//Validate Variables
			$name = $this->validateText($_POST['name']);
			$lada = $this->validateText($_POST['lada']);
			$area = $this->validateNumber($_POST['area']);
			$number = $this->validateNumber($_POST['number']);
			$idCarWorkShop = $this->validateText($_POST['idCarWorkShop']);
			$result = $this->model->edit($name, $lada, $area, $number, $idCarWorkShop);	
			//Insert Succesfull
			if($result)
			{
				//Load view
				unset($postError);
				header("Location: index.php?controller=workshopphone");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$workshopphone = $this->model->details($id);
		//select Succesfull
			if($workshopphone != NULL)
			{
			//Load view
				$this->smarty->assign('workshopphone',$workshopphone);
				$this->smarty->display('./views/WorkShopPhone/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}

	}

		/**
	*Delete a WorkShopPhone with the given post parameters 
	*@param id the WorkShopPhone name (post)
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
			header("Location: index.php?controller=workshopphone&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
