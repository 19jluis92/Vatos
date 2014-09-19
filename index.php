<?php
	//Get Query from URL
	$path = isset($_GET['controller']) ? $_GET['controller'] : 'home' ;
	switch($path)
{
	case 'employee':
			//Load controller
			require('controllers/EmployeeController.php');
			$controller = new EmployeeController();
		break;
	case 'client':
			//Load Controller
			require('controller/ClientController.php');
			$controller = new ClientController();
			break;
	case 'bump':
			//Load controller file
			require('controllers/BumpsController.php');
			//Create controller and execute it
			$controller = new BumpsController();
			break;
	case 'cartype':
			//Load controller file
			require('controllers/CarTypesController.php');
			//Create controller and execute it
			$controller = new CarTypesController();
			break;
	case 'color':
			//Load controller file
			require('controllers/ColorsController.php');
			//Create controller and execute it
			$controller = new ColorsController();
			break;
	case 'department':
			//Load controller file
			require('controllers/DepartmentsController.php');
			//Create controller and execute it
			$controller = new VehiclesController();
			break;
	case 'home':
			//Load controller file
			require('controllers/HomeController.php');
			//Create controller and execute it
			$controller = new HomeController();
			break;
	case 'inspection':
			//Load controller file
			require('controllers/InspectionsController.php');
			//Create controller and execute it
			$controller = new InspectionController();
			break;
	case 'relocation':
			//Load controller file
			require('controllers/RelocationsController.php');
			//Create controller and execute it
			$controller = new RelocationsController();
			break;
	case 'service':
			//Load controller file
			require('controllers/ServicesController.php');
			//Create controller and execute it
			$controller = new ServicesController();
			break;
	case 'severity':
			//Load controller file
			require('controllers/SeveritiesController.php');
			//Create controller and execute it
			$controller = new SeveritiesController();
			break;
	case 'user':
			//Load controller file
			require('controllers/UsersController.php');
			//Create controller and execute it
			$controller = new UsersController();
			break;
	case 'vehicle':
			//Load controller file
			require('controllers/VehiclesController.php');
			//Create controller and execute it
			$controller = new VehiclesController();
			break;
	default:
		$ctrl = 'home';
		require('controllers/Home.php');


}

//Execute controller
$controller->run();	
?>