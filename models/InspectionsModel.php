<?php
require ('database/Inspections.php');
require('models/Model.php');
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
		return $this->db->all('Inspection');
	}

	/**
	*method for show  inspection details
	*@param int $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Inspection', $id,NULL))
		{
			$Inspections = new Inspections($result['name']);
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
		$Inspections =  new Inspections($idService, $mileage, $fuel, $inspectionDate, $type);
		if($result = $this->db->insert("Inspection", $Inspections,NULL))
		{
			return true;
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
	function edit($id, $mileage , $fuel , $inspectionDate, $type)
	{
		$Inspections =  new Inspections($idService, $mileage, $fuel, $inspectionDate, $type);
		$Inspections->id = $id;
		if($result = $this->db->update("Inspection" , $Inspections,NULL))
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
		if($result = $this->db->delete("Inspection" , $id,NULL))
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

}
?>
