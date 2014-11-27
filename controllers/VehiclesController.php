<?php
require('controllers/Controller.php');
class VehiclesController extends Controller {
	private $model;
	/**
	* Execute Actions based on the action selected from user in Query Args
	*/
	function __construct()
	{
		parent::__construct();
		require('models/VehiclesModel.php');
		$this->model = new VehiclesModel();
		require('models/ClientVehiclesModel.php');
		$this->clientVehicle = new ClientVehiclesModel();
	}
	
	function run()
	{
		$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':
			case 'list':
						//Validate User and permissions
			$this->all();
			case 'clientvehicles':
						//Validate User and permissions
						$this->allClientVehicles();
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

			case 'ajaxById':

					echo json_encode($this->model->getVehicleByClient($_GET['id']));
					break;
			case 'massInsert':
				$this->massInsert();
				break;
			default:
			break;
		}
	}

	/**
	* Show all vehicles in database
	* @return null, view rendered
	*/
	private function all()
	{
		//Get all the Vehicles
		$result = $this->model->all();
		$this->loadProperties();
		foreach($result as &$vehicle)
		{
 			$modelName = $this->models->details($vehicle['idModel']);
 			$vehicle['idModel'] = $modelName->name;
 			$colorName = $this->colors->details($vehicle['idColor']);
 			$vehicle['idColor'] = $colorName->name;
 			$carTypeName = $this->carTypes->details($vehicle['idCarType']);
 			$vehicle['idCarType'] = $carTypeName->name;
		}

		$this->smarty->assign('vehicles',$result);
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Vehicle/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}

	private function allClientVehicles()
	{
		//Get all the Vehicles
		$result = $this->clientVehicle->all();
		$this->smarty->assign('clientVehicles',$result);
		
		if(isset($result))
		{
			//Load view
			if(isset($_GET['deleted']) && $_GET['deleted']==true) 			
				$this->smarty->assign('deleted',true);
			$this->smarty->display('./views/Clientvehicle/index.tpl');
		}
		else
		{
			//Ohh well... :(
			$this->smarty->display('./views/error.tpl');
		}
	}
	/**
	* Show details of car given it's Id
	* @param id
	* @return null, view rendered
	*/
	private function details()
	{
		$id = $this->validateNumber($_GET['id']);
		$vehicle = $this->model->details($id);
		
		$this->loadProperties();
		$modelName = $this->models->details($vehicle->idModel);
		$vehicle->idModel = $modelName->name;
		//select Succesfull
		if($vehicle != NULL)
		{
			//Load view
			//$this->smarty->assign('modelName',$modelName);
			$this->smarty->assign('vehicle',$vehicle);
			$this->smarty->display('./views/Vehicle/view.tpl');
		}
		else
		{
			$this->smarty->display('./views/error.tpl');
		}	
	}
	/**
	* Create new Vehicle
	* @param string $vin
	* @param int $model
	* @param int $color
	* @param int $year
	* @param int $type
	* @param string $conditions
	* @param int $plates
	*/
	private function create()
	{
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST' )
		{
			//Validate Variables
			$vin   		 = $this->validateText($_POST['vin']);
			$model 		 = $this->validateNumber($_POST['model']);
			$color		 = $this->validateNumber($_POST['color']);
			$year		 = $this->validateNumber($_POST['year']);
			$type  		 = $this->validateNumber($_POST['type']);
			$conditions  = $this->validateText($_POST['conditions']);
			$plates	     = $this->validateNumber($_POST['plates']);
			$idClient	= $this->validateNumber($_POST['idClient']);
*
			$result = $this->model->create($vin, $model, $color, $year , $type, $conditions, $plates);
			$clientVehicleResult = $this->clientVehicle->create($result->id,$idClient);
			//Insert Succesful
			if($result && $clientVehicleResult)
			{
				header("Location: index.php?controller=vehicle&view=index");
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError))
		{
			$this->loadProperties();
			$this->smarty->assign('colors',$this->toAssociativeArray($this->colors->all()));
			$this->smarty->assign('clients',$this->toAssociativeArray($this->clients->all(),'id','Name'));
			$this->smarty->assign('carTypes',$this->toAssociativeArray($this->carTypes->all()));
			$this->smarty->assign('models',$this->toAssociativeArray($this->models->all()));
			$this->smarty->display('./views/Vehicle/add.tpl');
		}
	}
	/**
	* Update Vehicle with the given post parameters
	* @param string $vin
	* @param int $model
	* @param int $color
	* @param int $year
	* @param int $type
	* @param string $conditions
	* @param int $plates
	* @return null, view rendered
	*/
	private function edit()
	{
		//Validate Variables
		if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') 
		{
			$id = $this->validateNumber($_GET['id']);
			$vin   		 = $this->validateText($_POST['vin']);
			$model 		 = $this->validateNumber($_POST['model']);
			$color		 = $this->validateNumber($_POST['color']);
			$year		 = $this->validateNumber($_POST['year']);
			$type  		 = $this->validateNumber($_POST['type']);
			$conditions  = $this->validateText($_POST['conditions']);
			$plates	     = $this->validateNumber($_POST['plates']);

			$result = $this->model->edit($id, $vin, $model, $color, $year , $type, $conditions, $plates);
			if($result)
			{
				//Load view
				unset($postError);
				header("Location: index.php?controller=vehicle");
			}
			else
			{
				//Ohh well... :(
				$postError = true;
				$this->smarty->assign('error','no se pudo :(');
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			$id = $this->validateNumber($_GET['id']);
			$vehicle = $this->model->details($id);
			//select Succesfull
			if($vehicle != NULL)
			{
				$this->loadProperties();
				$this->smarty->assign('colors',$this->toAssociativeArray($this->colors->all()));
				$this->smarty->assign('carTypes',$this->toAssociativeArray($this->carTypes->all()));
				$this->smarty->assign('models',$this->toAssociativeArray($this->models->all()));
				$this->smarty->assign('vehicle',$vehicle);
				$this->smarty->display('./views/vehicle/edit.tpl');
			}
			else
			{
				$this->smarty->display('./views/error.tpl');
			}

		}
	}
	/**
	* Delete Vehicle given the Id
	* @param $VIN
	* @return null, view rendered
	*/
	private function delete()
	{
		$id = $this->validateNumber($_GET['id']);
		$result = $this->model->delete($id);	
		//Insert Succesfull
		if($result)
		{
			//Load view
			header("Location: index.php?controller=vehicle&deleted=true");
		}
		else
		{
			//Ohh well... :(
			require('views/Error.html');
		}	
	}


	private function loadProperties()
	{
		require('models/ColorsModel.php');
		require('models/CarModel.php');
		require('models/CarTypesModel.php');
		require('models/ClientModel.php');
		$this->colors = new ColorsModel();
		$this->models = new CarModel();
		$this->carTypes = new CarTypesModel();
		$this->clients = new ClientModel();
		
	}

	private function massInsert()
	{
		$dataArray = $this->massiveInsertion();		
		for($i = 0; $i < count($dataArray); $i++)
		{
			/*Perdon por esto de aqui :(, lo arreglare despues*/
			$vin   		 = $this->validateText($dataArray[$i][0]);
			$model 		 = $this->validateNumber($dataArray[$i][1]);
			$color		 = $this->validateNumber($dataArray[$i][2]);
			$year		 = $this->validateNumber($dataArray[$i][3]);
			$type  		 = $this->validateNumber($dataArray[$i][4]);
			$conditions  = $this->validateText($dataArray[$i][5]);
			$plates	     = $this->validateNumber($dataArray[$i][6]);
			$result = $this->model->create($vin, $model, $color, $year , $type, $conditions, $plates);
		}
		$this->all();
	}
	/*Helpers*/
	public function getModelName($modelId)
	{
		$modelData = $this->model->details('model',$modelId);
		var_dump($modelData);
	}

}

?>
