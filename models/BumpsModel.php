<?php
require ('database/Bumps.php');
require('models/Model.php');
Class BumpsModel extends Model{
	private $id;
	private $idInspection;
	private $idSeverity;
	private $idPiece;


	function __construct(){
		parent::__construct();
	}

	/**
	*Navigation properties
	*/
	private $inspection;
	private $severity;
	private $piece;

	/**
	*method for list all bumps
	* @return array array of bumps 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Bumps array)
		return $this->db->all('bump');
	}

	/**
	*method for show  bump details
	*@param string $id existing bump id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('bump', $id,NULL))
		{
			$Bumps = new Bumps($result['name']);
			return $Bump;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new bump (required on vehicles) 
	*@param int $idPiece Correspond to the piece id
	*@param int $idSeverity Correspond to the severity id
	*@param int $idInspection Correspond to the inspection id
	* @return bool transaction result
	*/
	function create($idPiece, $idSeverity , $idInspection)
	{
		$Bumps = new Bumps($idPiece, $idSeverity, $idInspection);
		if($result = $this->db->insert("bump", $Bump,NULL))
		{
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a bump finding the element using the given $id , false if not found  
	*@param int $id (existing bump id)
	*@param int $idPiece Correspond to the piece id
	*@param int $idSeverity Correspond to the severity id
	*@param int $idInspection Correspond to the inspection id
	* @return bool transaction result
	*/
	function edit($id,$idPiece, $idSeverity , $idInspection)
	{
		$Bumps = new Bumps($idPiece, $idSeverity, $idInspection);
		$Bumps->id = $id;
		if($result = $this->db->update("bump" , $Bumps,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new bump (required on vehicles) 
	*@param int $id (existing bump id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("bump" , $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
	}
}
?>
