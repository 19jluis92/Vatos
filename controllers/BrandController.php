<?php
require('controllers/Controller.php');
class BrandController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/BrandModel.php');
		$this->model = new BrandModel();
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
			case 'index':case 'all':case 'list':
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
		
		//get all the Brand
		if(true || $this->LoggedIn() && $this->validatePermissions("brand","list") ){
			$result = $this->model->all();
			$this->smarty->assign('brands',$result);
		//Query Succesfull
			if(isset($result))
			{
			//Load view
				if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
					$this->smarty->assign('deleted',true);
				$this->smarty->display('./views/Brand/index.tpl');
			}
			else
			{
			//Ohh well... :(
				$this->smarty->display('./views/error.tpl');
			}	
		}
		else
		{
			$this->smarty->display('./views/permissions.tpl');
		}
		
	}

	/**
	*Show the Brand details with the given post parameters 
	*@param int id the Brand id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validation not implemented yet 
		if(true || ($this->LoggedIn() && $this->validatePermissions("brand","detais")) ){

			$id = $this->validateNumber($_GET['id']);
			$brand = $this->model->details($id);
		//select Succesfull
			if($brand != NULL)
			{
			//Load view
				$this->smarty->assign('brand',$brand);
				$this->smarty->display('./views/Brand/view.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}	
		}
		else{
			$this->smarty->display('./views/permissions.tpl');
		}
	}

	/**
	*Create a Brand with the given post parameters 
	*@param string  name the Brand name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			//Validate Variables
			$name = $this->validateText($_POST['name']);
			$result = $this->model->create($name);	
			//Insert Succesfull
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Brand&view=details&id=$result->id");
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
			$this->smarty->display('./views/Brand/add.tpl');
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
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
			$name = $this->validateText($_POST['name']);
			$id = $this->validateText($_GET['id']);
			$result = $this->model->edit($id,$name);	
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Brand");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$brand = $this->model->details($id);
		//select Succesfull
			if($brand != NULL)
			{
			//Load view
				$this->smarty->assign('brand',$brand);
				$this->smarty->display('./views/Brand/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

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
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=Brand&deleted=true");
		}
		else
		{
				$this->smarty->display('./views/error.tpl');
		}
	}

}

?>
