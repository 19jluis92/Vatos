<?php
	//Get Query from URL
	$path = $_GET['controller'] ? $_GET['controller'] : 'home' ;
	switch($_GET['controller'])
{
	case 'vehicle':
			//Load controller file
			require('controllers/VehiclesController.php');
			//Create controller and execute it
			$controller = new VehiclesController();
			break;
	case 'user':
			//Load controller file
			require('controllers/UsersController.php');
			//Create controller and execute it
			$controller = new UsersController();
			break;
	case 'home':
			//Load controller file
			require('controllers/home.php');
			//Create controller and execute it
			$controller = new HomeController();
			break;
	default:
		$ctrl = 'home';
		require('controllers/Home.php');


}

//Execute controller
$controller->run();	
?>