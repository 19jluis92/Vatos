<?php
require('controllers/Controller.php');
class CountryController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		parent::__construct();
		require('models/CountryModel.php');
		$this->model = new CountryModel();
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
		
		//get all the Country
		$result = $this->model->all();
		//Query Succesfull
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			
			$this->smarty->assign('countries',$result);
			$this->smarty->display('./views/Country/index.tpl');
		}
		else
		{
			//Ohh well... :(
				$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Show the Country details with the given post parameters 
	*@param int id the Country id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		$country = $this->model->details($id);	
		//Insert Succesfull
		if($country != NULL)
		{
			//Load view
			$this->smarty->assign('country',$country);
			$this->smarty->display('./views/Country/view.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	/**
	*Create a Country with the given post parameters 
	*@param string  name the Country name by post
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
			//Load view
			unset($postError);
				header("Location: index.php?controller=Country");
			
		}
		else
		{
			require('views/Error.html');
		}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			if(isset($name))
				$this->smarty->assign('name',$name);
			$this->smarty->display('./views/Country/add.tpl');
		}
	}

	/**
	*Update a Country with the given post parameters 
	*@param int id the Country name (post)
	*@param string name the Country name  (post)
	*@param int idLocation the location of the Country (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT')
		{
			//Validate Variables
			$id = $this->validateNumber($_GET['id']);
			$name = $this->validateText($_POST['name']);
			$result = $this->model->edit($id,$name);
			//Insert Succesfull
			if($result)
				{
					unset($postError);
					header("Location: index.php?controller=Country");
				}
				else
				{
					$postError = true;
					$this->smarty->assign('error','no se pudo :(');
				}
			}
			if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError))
			{
				$id = $this->validateNumber($_GET['id']);
				$country = $this->model->details($id);
			//select Succesfull
				if($country != NULL)
				{
				//Load view
					$this->smarty->assign('country',$country);
					$this->smarty->display('./views/Country/edit.tpl');
				}
				else
				{
					$this->smarty->display('./views/error.tpl');
				}

			}
	}

		/**
	*Delete a Country with the given post parameters 
	*@param id the Country name (post)
	*@return null nothing returned but view loaded
	*/
	private function delete()
	{
		//Validate Variables
		$id = $this->validateNumber($_GET['id']);
		echo $id;
		$result = $this->model->delete($id);
		//Insert Succesfull
		if($result)
		{
			header("Location: index.php?controller=Country&deleted=true");
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
