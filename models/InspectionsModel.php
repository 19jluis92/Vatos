<?php
require('models/Model.php');
Class InspectionsModel extends Model{
	private $id;
	private $idService;
	private $mileage;
	private $fuel;
	private $inspectionDate;
	private $type;

	/**
	*Navigation properties
	*/
	private $service;
	private $bumps;
	/**
	*method for list all inspections
	* @return array array of inspections 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Inspections array)
		return true;
	}

	/**
	*method for show  inspection details
	*@param int $id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new inspection (required on vehicles) 
	*@param int $idService 
	*@param float $mileage 
	*@param float $fuel 
	*@param string $inspectionDate datetime value inspection date 
	*@param bool $type 
	* @return bool transaction result
	*/
	function create($idService , $mileage , $fuel , $inspectionDate, $type)
	{
		$this->idService = $idService;
		$this->mileage = $mileage;
		$this->fuel = $fuel;
		$this->inspectionDate = $inspectionDate;
		$this->type = $type;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a inspection  
	*@param int $id (existing inspection id)
	*@param int $idService 
	*@param float $mileage 
	*@param float $fuel 
	*@param string $inspectionDate datetime value inspection date 
	*@param bool $type 
	* @return bool transaction result
	*/
	function edit($id, $mileage , $fuel , $inspectionDate, $type)
	{
		//find the element usen the given id
		$this->idService = $idService;
		$this->mileage = $mileage;
		$this->fuel = $fuel;
		$this->inspectionDate = $inspectionDate;
		$this->type = $type;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new inspection (required on vehicles) 
	*@param int $id (existing inspection id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
	/**
	*method for create new inspection (required on vehicles) 
	*@param int $id (existing inspection id)
	* @return bool transaction result
	*/
	function loadBumps($id)
	{
		//load the bumps on de $bump object
		return $bumps;
	}

}
?>
