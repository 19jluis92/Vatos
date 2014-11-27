<?php
require('controllers/Controller.php');
class DepartmentsController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/DepartmentsModel.php');
		$this->model = new DepartmentsModel();
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
			case 'getByLocation':

				$this->getByLocation();
			break;
			case 'ajax':

				echo json_encode($this->model->all());
			break;
			
			default:
			break;
		}
	}

	/**
	*Show all the Locations by carworkshop
	*@return null nothing returned but view loaded
	*/
	private function getByLocation()
	{
		$id = $this->validateNumber($_GET['id']);
		$json = html_entity_decode(json_encode($this->model->GetByColumn($id,"idLocation")));
		echo $json;
	}


	/**
	*Show all the departments of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the departments
		$result = $this->model->all();	
		//Query Succesfull
		if(isset($result))
		{
			$this->smarty->assign('departments',$result);
				//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Department/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}	
	}

	/**
	*Show the department details with the given post parameters 
	*@param int id the department id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		$id = $this->validateNumber($_GET['id']);
		$department = $this->model->details($id);	
		//select Succesfull
		if($department != NULL)
		{
			//Load view
			$this->smarty->assign('department',$department);
			$this->smarty->display('./views/Department/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a department with the given post parameters 
	*@param string  name the department name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
		//Validate Variables
			$name = $this->validateText($_POST['name']);
			$idLocation = $this->validateNumber($_POST['idLocation']);
			$result = $this->model->create($name,$idLocation);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Department&view=details&id=$result->id");
				//$this->all();
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
			$this->loadProperties();
			$this->smarty->assign('locations',$this->toAssociativeArray($this->locations->all()));
			$this->smarty->display('./views/Department/add.tpl');
		}
	}

	/**
	*Update a department with the given post parameters 
	*@param int id the department name (post)
	*@param string name the department name  (post)
	*@param int idLocation the location of the department (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
		//Validate Variables
			$id = $this->validateNumber($_GET['id']);
			$name = $this->validateText($_POST['name']);
			$idLocation = $this->validateNumber($_POST['idLocation']);
			$result = $this->model->edit($id,$name,$idLocation);	
		//Insert Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Department");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$department = $this->model->details($id);
		//select Succesfull
			if($department != NULL)
			{
				//Load view
				$this->loadProperties();
			$this->smarty->assign('locations',$this->toAssociativeArray($this->locations->all()));
				$this->smarty->assign('department',$department);
				$this->smarty->display('./views/Department/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}

		/**
	*Delete a department with the given post parameters 
	*@param id the department name (post)
	*@return null nothing returned but view loaded
	*/
	private function delete()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=Department&deleted=true");
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}
	}

	private function loadProperties()
	{
		require('models/LocationModel.php');
		$this->locations = new LocationModel();

	}

}

?>
