<?php
require('controllers/Controller.php');
class PiecesController extends Controller {
	private $model;
	

	/**
	*Default constructor , include and create the model
	*/
	function __construct()
	{
		require('models/PiecesModel.php');
		$this->model = new PiecesModel();
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
	*Show all the pieces of the database
	*@return null nothing returned but view loaded
	*/
	private function all()
	{
		
		//get all the pieces
		$result = $this->model->all();	
		//Query Succesfull
		if($result)
		{
			//Load view
			require('views/Piece/Index.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	*Show the piece details with the given post parameters 
	*@param id the piece id
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
			require('views/Piece/Details.php');
		}
		else
		{
			require('views/Error.html');
		}
	}
	/**
	*Create a piece with the given post parameters 
	*@param name the piece name by post
	*@return null nothing returned but view loaded
	*/
	private function create()
	{
		//Validate Variables
		$name = $this->validateText($_POST['name']);
		$result = $this->model->create($name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Piece/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Update a piece with the given post parameters 
	*@param name the piece name
	*@return null nothing returned but view loaded
	*/
	private function edit()
	{
		//Validate Variables
		$id = $this->validateNumber($_POST['id']);
		$name = $this->validateText($_POST['name']);
		$result = $this->model->edit($id,$name);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			require('views/Piece/Edited.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

	/**
	*Delete a piece with the given post parameters 
	*@param name the piece name
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
			require('views/Piece/Deleted.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
