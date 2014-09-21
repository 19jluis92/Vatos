<?php
require('models/Model.php');
Class BumpsModel extends Model{
	private $id;
	private $idInspection;
	private $idSeverity;
	private $idPiece;

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
		return true;
	}

	/**
	*method for show  bump details
	*@param string $id existing bump id
	* @return bool transaction result
	*/
	function details($id)
	{
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
		$this->idPiece = $idPiece;
		$this->idSeverity = $idSeverity;
		$this->idInspection = $idInspection;
		//save element and get complete item (with $id)
		return $this;
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
		//find the element using the given $id , false if not found
		$this->idPiece = $idPiece;
		$this->idSeverity = $idSeverity;
		$this->idInspection = $idInspection;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new bump (required on vehicles) 
	*@param int $id (existing bump id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
