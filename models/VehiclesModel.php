<?php
require('models/Model.php');
Class VehiclesModel extends Model{
	private $vin;
	private $conditions;
	private $brand;
	private $type;
	private $model;
	private $color;
	private $inventoryId;

	/**
	* @param int $vin
	* @param string $conditions
	* @param string $brand
	* @param string $type
	* @param int $model
	* @param string $color
	* @param int $inventoryId
	*/
	function create($vin, $conditions, $brand, $type, $model, $color, $inventoryId)
	{
		$this->vin   = $vin;
		$this->conditions = $conditions;
		$this->brand = $brand;
		$this->type  = $type;
		$this->model = $model;
		$this->color = $color;
		$this->inventoryId = $inventoryId;
		
		return true;
	}
}

?>
