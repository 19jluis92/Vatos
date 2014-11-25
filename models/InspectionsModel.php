<?php
require_once('database/Inspection.php');
require_once('models/Model.php');
Class InspectionsModel extends Model{
	private $id;
	private $idService;
	private $mileage;
	private $fuel;
	private $inspectionDate;
	private $type;


	function __construct(){
		parent::__construct();
	}
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
		return $this->db->all('inspection');
	}

	/**
	*method for show  inspection details
	*@param int $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('inspection', $id,NULL))
		{
			$Inspections = new Inspection($result['idService'],$result['mileage'],$result['fuel'],$result['inspectionDate'],$result['type'],$result['id']);
			return $Inspections;
		}
		else{
			echo $result;
			return NULL;
		}
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
		$Inspections =  new Inspection($idService, $mileage, $fuel, $inspectionDate, $type);
		if($result = $this->db->insert('inspection', $Inspections,NULL))
		{
			return $result;
		}
		else{
			echo $result;
			
			return false;
		}
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
	function edit($id,$idService , $mileage , $fuel , $inspectionDate, $type)
	{
		$Inspections =  new Inspection($idService, $mileage, $fuel, $inspectionDate, $type,$id);
		if($result = $this->db->update('inspection' , $Inspections,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new inspection (required on vehicles) 
	*@param int $id (existing inspection id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete('inspection' , $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
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

	function GetByColum($table,$id,$colum){
		if($result = $this->db->GetByColum('inspection', $id,$colum))
		{
			$Inspections = new Inspection($result[0]['idService'],$result[0]['mileage'],$result[0]['fuel'],$result[0]['inspectionDate'],$result[0]['type'],$result[0]['id']);
			return $Inspections;
		}
		else{
			
			return NULL;
		}
		//delete element using the given $id
		return true;
	}
}
?>
