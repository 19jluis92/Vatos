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
			require('controllers/ClientController.php');
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
	case 'city':
			//Load controller file
			require('controllers/CitiesController.php');
			//Create controller and execute it
			$controller = new CitiesController();
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
	//Erick's		
	case 'vehicle':
			//Load controller file
			require('controllers/VehiclesController.php');
			//Create controller and execute it
			$controller = new VehiclesController();
			break;
	case 'country':
			//Load controller file
			require('controllers/CountryController.php');
			//Create controller and execute it
			$controller = new CountryController ();
			break;
	case 'state':
			//Load controller file
			require('controllers/StateController.php');
			//Create controller and execute it
			$controller = new StateController ();
			break;
	case 'carworkshop':
			//Load controller file
			require('controllers/CarWorkShopController.php');
			//Create controller and execute it
			$controller = new CarWorkShopController ();
			break;
	case 'workshopphone':
			//Load controller file
			require('controllers/WorkShopPhoneController.php');
			//Create controller and execute it
			$controller = new WorkShopPhoneController ();
			break;
	case 'location':
			//Load controller file
			require('controllers/LocationController.php');
			//Create controller and execute it
			$controller = new LocationController ();
			break;
	case 'carmodel':
			//Load controller file
			require('controllers/CarModelController.php');
			//Create controller and execute it
			$controller = new CarModelController ();
			break;
	case 'brand':
			//Load controller file
			require('controllers/BrandController.php');
			//Create controller and execute it
			$controller = new BrandController ();
			break;
	default:
		require('controllers/HomeController.php');
		$controller = new HomeController ();
}

//Execute controller
$controller->run();	
?>