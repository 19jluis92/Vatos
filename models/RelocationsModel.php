<?php
require('models/Model.php');
Class RelocationsModel extends Model{
	private $id;
	private $name;
	private $relocationDate;
	private $idEmployee;
	private $reason;
	private $idDepartment;
	private $idService;

	/**
	*Navigation properties
	*/
	private $employee;
	private $department;
	private $service;

	/**
	*method for list all relocations
	* @return array array of relocations 
	*/
	function list()
	{
		//get all elements (set the $elements variable with a Relocations array)
		return $elements;
	}

	/**
	*method for show  Relocation details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new Relocation (required on vehicles) 
	*@param string $relocationDate
	*@param int $idEmployee
	*@param string $reason
	*@param int $idDepartment
	*@param int $idService
	* @return bool transaction result
	*/
	function create($relocationDate,$idEmployee,$reason,$idDepartment,$idService)
	{
		$this->relocationDate = $relocationDate;
		$this->idEmployee = $idEmployee;
		$this->reason = $reason;
		$this->idDepartment = $idDepartment;
		$this->idService = $idService;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a Relocation  
	*@param int $id (existing relocation id)
	*@param string $relocationDate
	*@param int $idEmployee
	*@param string $reason
	*@param int $idDepartment
	*@param int $idService
	*@return bool transaction result
	*/
	function edit($id,$relocationDate,$idEmployee,$reason,$idDepartment,$idService)
	{
		//find element by $id 
		$this->relocationDate = $relocationDate;
		$this->idEmployee = $idEmployee;
		$this->reason = $reason;
		$this->idDepartment = $idDepartment;
		$this->idService = $idService;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new Relocation (required on vehicles) 
	*@param int $id (existing relocation id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
