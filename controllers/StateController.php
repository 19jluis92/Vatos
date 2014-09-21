<?php
require('controllers/Controller.php');
class StateController extends Controller {
	private $model;
	
	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/StateModel.php');
		$this->model = new StateModel();
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
		
		//get all the State
		$result = $this->model->all();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/State/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the State details with the given post parameters 
	*@param int id the State id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/State/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a State with the given post parameters 
	*@param string  name the State name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idState = $this->validateNumber($_POST['idState']);
		$result = $this->model->create($name, $idState);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/State/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a State with the given post parameters 
	*@param int id the State name (post)
	*@param string name the State name  (post)
	*@param int idLocation the location of the State (post)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$idState = $this->validateNumber($_POST['idState']);
		$result = $this->model->edit($name,$idState);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/State/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a State with the given post parameters 
	*@param id the State name (post)
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
			require('views/State/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
