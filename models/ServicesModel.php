<?php
require('models/Model.php');
Class ServicesModel extends Model{
	private $id;
	private $startDate;
	private $endDate;
	private $idEmployee;
	private $idCarWorkShop;
	private $idVehicle;

	/**
	* Navigation Properties 
	*/
	private $employee;
	private $carWorkShop;
	private $vehicle;

	/**
	*method for list all services
	* @return array array of services 
	*/
	function list()
	{
		//get all elements (set the $elements variable with a Services array)
		return $elements;
	}

	/**
	*method for show  service details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new service 
	*@param string $startDate (dd/MM/yyyy hh:mm:ss)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss)
	*@param int $idEmployee
	*@param int $idCarWorkShop
	*@param int $idVehicle
	* @return bool transaction result
	*/
	function create($startDate,$endDate,$idEmployee,$idCarWorkShop,$idVehicle)
	{
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->idEmployee = $idEmployee;
		$this->idCarWorkShop = $idCarWorkShop;
		$this->idVehicle = $idVehicle;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a service  
	*@param int $id the existing service id
	*@param string $startDate (dd/MM/yyyy hh:mm:ss)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss)
	*@param int $idEmployee
	*@param int $idCarWorkShop
	*@param int $idVehicle
	* @return bool transaction result
	*/
	function edit($id,$startDate,$endDate,$idEmployee,$idCarWorkShop,$idVehicle)
	{
		//find the existing element or return false
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->idEmployee = $idEmployee;
		$this->idCarWorkShop = $idCarWorkShop;
		$this->idVehicle = $idVehicle;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new service
	*@param int $id (existing service id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
