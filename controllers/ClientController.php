<?php
require('controllers/controller.php');

/**
* 
*/
class ClientController extends Controller
{
	private $model;
	
	function __construct()
	{
		require('models/ClientModel.php');
		$this->model = new ClientModel();
	}

	function run()
	{
		switch($_GET['view'])
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
	* Show all client in database
	* @return null, view rendered
	*/
	private function index()
	{
		$result = $this->model->index();
		if($result)
		{
			//Load view
			require('views/Client/Index.php');
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
		$id = $this->validateNumber($_POST['id']);
		$result = $this->model->details($id);
		if($result)
		{
			//Load view
			require('views/Client/Details.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}

	/**
	* Create new client
	* @param string $name
	* @param string $lastName
	* @param string $rfc
	* @param string $clientCol
	* @param string $clientCol1
	* @param string $number
	* @param string $lada
	* @param string $area
	*/
	private function create()
	{
		//Validate Variables
		$name   		 = $this->validateText($_POST['name']);
		$lastName 		 = $this->validateNumber($_POST['lastName']);
		$rfc		 = $this->validateNumber($_POST['rfc']);
		$clientCol		 = $this->validateNumber($_POST['clientCol']);
		$clientCol1  		 = $this->validateNumber($_POST['clientCol1']);
		$number  = $this->validateText($_POST['number']);
		$lada	     = $this->validateNumber($_POST['lada']);
		$area    = $this->validateNumber($_POST['area']);

		$result = $this->model->create($name,$lastName,$rfc,$clientCol,$clientCol1);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			require('views/Client/Created.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}
	}
	/**
	* Update  with the given post parameters
	* @param string $name
	* @param string $lastName
	* @param string $rfc
	* @param string $clientCol
	* @param string $clientCol1
	* @param string $number
	* @param string $lada
	* @param string $area
	* @return null, view rendered
	*/
	private function edit()
	{
		//Validate Variables
		$name   		 = $this->validateText($_POST['name']);
		$lastName 		 = $this->validateNumber($_POST['lastName']);
		$rfc		 = $this->validateNumber($_POST['rfc']);
		$clientCol		 = $this->validateNumber($_POST['clientCol']);
		$clientCol1  		 = $this->validateNumber($_POST['clientCol1']);
		$number  = $this->validateText($_POST['number']);
		$lada	     = $this->validateNumber($_POST['lada']);
		$area    = $this->validateNumber($_POST['area']);

		$result = $this->model->edit($name,$lastName,$rfc,$clientCol,$clientCol1);
		if($result)
		{
			//Load view
			require('views/Client/Edited.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
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
			require('views/Client/Deleted.php');
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}

}	

?>