<?php
require('controllers/Controller.php');
class InspectionsController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/InspectionsModel.php');
		$this->model = new InspectionsModel();
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
	*Show all the inspections of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the inspections
		$result = $this->model->all();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Inspection/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the inspection details with the given post parameters 
	*@param id the inspection id
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
			require('views/Inspection/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a inspection with the given post parameters 
	*@param int idService 
	*@param float mileage 
	*@param float fuel 
	*@param string inspectionDate datetime value inspection date 
	*@param bool type 
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$idService = $this->validateNumber($_POST['idService']);
		$mileage = $this->validateFloat($_POST['mileage']);
		$fuel = $this->validateFloat($_POST['fuel']);
		$inspectionDate = $this->validateDate($_POST['inspectionDate']);
		$type = $this->validateBool($_POST['type']);
		$result = $this->model->create($idService , $mileage , $fuel , $inspectionDate , $type);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Inspection/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a inspection with the given post parameters 
	*@param int $id (post)
	*@param int $idService  (post)
	*@param float $mileage  (post)
	*@param float $fuel  (post)
	*@param string $inspectionDate (post) datetime value inspection date 
	*@param  bool $type  (post)
	*@return null $nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$idService = $this->validateNumber($_POST['idService']);
		$mileage = $this->validateFloat($_POST['mileage']);
		$fuel = $this->validateFloat($_POST['fuel']);
		$inspectionDate = $this->validateDate($_POST['inspectionDate']);
		$type = $this->validateBool($_POST['type']);
		$result = $this->model->edit($id,$idService,$mileage,$fuel,$inspectionDate,$type);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Inspection/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a inspection with the given post parameters 
	*@param int $id the inspection id
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
			require('views/Inspection/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
