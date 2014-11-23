<?php
require_once('database/Relocation.php');
require_once('models/Model.php');
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
		return $this->db->all('relocation');
	}

	/**
	*method for show  Relocation details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('relocation', $id,NULL))
		{
			$Relocation = new Relocation($result['relocationDate'],$result['idEmployee'],$result['reason'],$result['idDepartment'],$result['idService']);
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
		if($result = $this->db->insert('relocation' , $Relocation,NULL))
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
		if($result = $this->db->update('relocation', $Relocation,NULL))
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
		if($result = $this->db->delete('relocation' , $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}

	function GetByColum($tabla,$id,$colum){
		if($result = $this->db->GetByColum($tabla,$id,$colum))
		{
			var_dump($result);
			$Relocation = new Relocation($result[0]['relocationDate'],$result[0]['idEmployee'],$result[0]['reason'],$result[0]['idDepartment'],$result[0]['idService']);
			return $Relocation;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}
}
?>
