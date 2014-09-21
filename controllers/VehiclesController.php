<?php
require('controllers/Controller.php');
class VehiclesController extends Controller {
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		require('models/VehiclesModel.php');
		$this->model = new VehiclesModel();
	}
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($_GET['view'])
		{
			case 'index':
			case 'list':
						//Validate User and permissions
						echo 'got here';
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
}

?>
