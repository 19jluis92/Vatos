<?php
	//Get Query from URL
	$ctrl = $_GET['ctrl'] ? $_GET['ctrl'] : ;
	switch($_GET['ctrl'])
{
	case 'vehicle':
			//Load controller file
			require('controllers/VehicleCtrl.php');
			//Create controller and execute it
			$ctrl = new vehicleCtrl();
			break;
	default:
		$ctrl = 
}

//Execute controller
$ctrl->run();	
?>
