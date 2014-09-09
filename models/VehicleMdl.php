<?php
Class VehicleMdl
{
	private $vin;
	private $brand;
	private $type;
	private $model;
	

	/**
	* @param int $vin
	* @param string $brand
	* @param string $type
	* @param int $model
	*/
	function create($vin, $brand, $type, $model)
	{
		$this->vin   = $vin;
		$this->brand = $brand;
		$this->type  = $type;
		$this->model = $model;
		
		return true;
	}
}
?>
