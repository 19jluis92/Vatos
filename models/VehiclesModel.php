<?php
require('database/Vehicle.php');
require('models/Model.php');
Class VehiclesModel extends Model{
	private $vin;
	private $model;
	private $color;
	private $year;
	private $type;
	private $conditions;
	private $plates;

	function __construct(){
		parent::__construct();

	}
	/**
	*method to list all vehicles
	* @return array of vehicles
	*/

	function all()
	{
		//Retrieve list of vehicles
		return $this->db->all('Vehicle');
	}



	/**
	* method to show a single car
	* @param int $id
	* @return bool transaction result
	**/
	function details($id)
	{
		if($result = $this->db->details('vehicle', $id,NULL))
		{
			$vehicle = new vehicle($result['name']);
			return $vehicle;
		}
		else{
			echo $result;
			return NULL;
		}
		return true;
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
	function create($vin, $model, $color, $year , $type, $conditions, $plates)
	{
		$vehicle = new Vehicle($vin, $model, $color, $year , $type, $conditions, $plates);
		if($result = $this->db->insert("Vehicle", $vehicle, NULL))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	* Edit a vehicle given the id
	* @param string $vin
	* @param int $model
	* @param int $color
	* @param int $year
	* @param int $type
	* @param string $conditions
	* @param int $plates
	*/
	function edit($vin, $model, $color, $year , $type, $conditions, $plates)
	{
		$vehicle = new Vehicle($vin, $model, $color, $year , $type, $conditions, $plates);
		if($result = $this->db->update("Vehicle", $vehicle, NULL))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	* Delete a Car given it's id
	* @param int $id
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Vehicle" , $id,NULL))
		{
			return true;
		}
		else{
			echo $result;
			return false;
		}
	}
}
?>
