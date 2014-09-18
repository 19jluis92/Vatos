<?php
require('controllers/Controller.php');
class RelocationsController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/RelocationsModel.php');
		$this->model = new RelocationsModel();
	}

	/**
	*Execute Actions based on the action selected from user in Query Args
	*@return null
	*/
	function run()
	{
		switch($_GET['view'])
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
	*Show all the relocations of the database
	*@return null nothing returned but view loaded
	*/
	private function list()
	{
		
		//get all the relocations
		$result = $this->model->list();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Relocation/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the relocation details with the given post parameters 
	*@param id the relocation id
	*@return null nothing returned but view loaded
	*/
	private function details()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);	
		//show Succesfull
		if($result)
		{
			//Load view
			require('views/Relocation/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Create a relocation with the given post parameters 
	*@param  string $relocationDate (POST)
	*@param  int idEmployee  (POST)
	*@param  string $reason  (POST)
	*@param  int $idDepartment (POST)
	*@param  int $idService  (POST)
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$relocationDate = $this->validateDate($_POST['relocationDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$reason = $this->validateText($_POST['reason']);
		$idDepartment = $this->validateNumber($_POST['idDepartment']);
		$idService = $this->validateNumber($_POST['idService']);
		$result = $this->model->create($relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Relocation/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a relocation with the given post parameters 
	*@param  int $id (POST)
	*@param  string $relocationDate (POST)
	*@param  int idEmployee  (POST)
	*@param  string $reason  (POST)
	*@param  int $idDepartment (POST)
	*@param  int $idService  (POST)
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$relocationDate = $this->validateDate($_POST['relocationDate']);
		$idEmployee = $this->validateNumber($_POST['idEmployee']);
		$reason = $this->validateText($_POST['reason']);
		$idDepartment = $this->validateNumber($_POST['idDepartment']);
		$idService = $this->validateNumber($_POST['idService']);
		$result = $this->model->update($id,$relocationDate,$idEmployee,$reason,$idDepartment,$idService);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Relocation/Updated.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a relocation with the given post parameters 
	*@param int $id the relocation id (POST)
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
			require('views/Relocation/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
