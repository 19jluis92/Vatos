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
		switch($_GET['view'])
		{
			case 'create':
						//Validate User and permissions
						$this->create();		
						break;
				default:
						break;
		}
	}
	private function create()
	{
		//Validate Variables
		$vin   		 = $this->validateText($_POST['vin']);
		$conditions  = $this->validateText($_POST['conditions']);
		$brand 		 = $this->validateText($_POST['brand']);
		$type  		 = $this->validateNumber($_POST['type']);
		$model 		 = $this->validateNumber($_POST['model']);
		$color		 = $this->validateText($_POST['color']);
		$inventoryId = $this->validateNumber($_POST['inventoryId']);
		
		$result = $this->model->create($vin, $conditions, $brand, $type, $model, $color, $inventoryId);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			require('views/Vehicle/Created.php');
		}
		else
		{
			require('views/Error.html');
		}
	}

}

?>
