<?php
require('database/Relocation.php');
require('models/Model.php');
Class RelocationsModel extends Model{
	private $id;
	private $name;
	private $relocationDate;
	private $idEmployee;
	private $reason;
	private $idDepartment;
	private $idService;

	function __construct(){
		parent::__construct();
	}
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
	function all()
	{
		//get all elements (set the $elements variable with a Relocations array)
		return true;
	}

	/**
	*method for show  Relocation details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Relocation', $id,NULL))
		{
			$Relocation = new Relocation($result['name']);
			return $Relocation;
		}
		else{
			echo $result;
			return NULL;
		}
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
		$Relocation = new Relocation($relocationDate, $idEmployee, $reason, $idDepartment, $idService);
		if($result = $this->db->insert("Relocation" , $Relocation,NULL))
		{
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
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
		$Relocation = new Relocation($relocationDate, $idEmployee, $reason, $idDepartment, $idService);
		$Relocation->id = $id;
		if($result = $this->db->update("Relocation", $Relocation,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new Relocation (required on vehicles) 
	*@param int $id (existing relocation id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Relocation" , $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}
}
?>
