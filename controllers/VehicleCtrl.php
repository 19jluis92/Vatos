<?php

class VehicleCtrl
{
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	__construct()
	{
		require('models/VehicleMdl.php');
		$this->model = new VehicleMdl();
	}
	function run()
	{
		switch($_GET['act'])
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
		$vin   = $this->valdiateNumber($_POST['vin']);
		$brand = $this->valdiateText($_POST['brand']);
		$type  = $this->valdiateNumber($_POST['type']);
		$model = $this->valdiateNumber($_POST['model']);
		
		$result = $this->model->create($vin, $brand, $type, $model);
		
		//Insert Succesful
		if($result)
		{
			//Load view
			require('views/VehicleInserted');
		}
		else
		{
			require('views/Error.html');
		}
	}
	/**
	* @param string $data
	* @return string $data
	* Validate a string to be a number and clean it
	*/
	private function validaNumber($data)
	{
	}
	/**
	* @param string $data
	* @return string $data
	* Validate a string to be text and clean it
	*/
	private function validaText($data)
	{
	}

}

?>
