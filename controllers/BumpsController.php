<?php
require('controllers/Controller.php');
class BumpsController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/BumpsModel.php');
		$this->model = new BumpsModel();
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
			$this->list();	
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
	*Show all the bumps of the database
	*@return null nothing returned but view loaded
	*/
	private function list()
	{
		
		//get all the bumps
		$result = $this->model->list();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Bump/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the bump details with the given post parameters 
	*@param id the bump id
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
			require('views/Bump/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a bump with the given post parameters 
	*@param name the bump name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$idPiece = $this->validateNumber($_POST['idPiece']);
		$idSeverity = $this->validateNumber($_POST['idSeverity']);
		$idInspection = $this->validateNumber($_POST['idInspection']);	
		$result = $this->model->create($idPiece , $idSeverity, $idInspection);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Bump/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a bump with the given post parameters 
	*@param name the bump name
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$idPiece = $this->validateNumber($_POST['idPiece']);
		$idSeverity = $this->validateNumber($_POST['idSeverity']);
		$idInspection = $this->validateNumber($_POST['idInspection']);
		$result = $this->model->update($id,$idPiece , $idSeverity, $idInspection);	
		//Update Succesfull
		if($result)
		{
			//Load view
			require('views/Bump/Updated.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

		/**
	*Delete a bump with the given post parameters 
	*@param name the bump name
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
			require('views/Bump/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
