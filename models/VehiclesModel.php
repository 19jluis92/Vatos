<?php
require('models/Model.php');
Class VehiclesModel extends Model{
	private $vin;
	private $model;
	private $color;
	private $year;
	private $type;
	private $conditions;
	private $plates;

	/**
	*method to list all vehicles
	* @return array of vehicles
	*/

	function list()
	{
		//Retrieve list of vehicles
		return true;
	}

	/**
	* method to show a single car
	* @param int $id
	* @return bool transaction result
	**/
	function details($id)
	{
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
		$this->vin 		  = $vin;
		$this->model 	  = $model;
		$this->color 	  = $color;
		$this->year 	  = $year;
		$this->type  	  = $type;
		$this->conditions = $conditions;
		$this->plates 	  = $plates;

		return true;
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
		$this->vin 		  = $vin;
		$this->model 	  = $model;
		$this->color 	  = $color;
		$this->year 	  = $year;
		$this->type  	  = $type;
		$this->conditions = $conditions;
		$this->plates 	  = $plates;

		return true;
	}

	/**
	* Delete a Car given it's id
	* @param int $id
	* @return bool transaction result
	*/
	function delete($id)
	{
		return true;
	}
}
?>
