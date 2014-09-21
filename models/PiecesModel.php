<?php
require('models/Model.php');
Class PiecesModel extends Model{
	private $id;
	private $name;

	/**
	*method for list all pieces
	* @return array array of pieces 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Pieces array)
		return true;
	}

	/**
	*method for show  Color details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new Color (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name)
	{
		$this->name = $name;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a Color  
	*@param int $id (existing piece id)
	*@param string $name (piece name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$this->name = $name;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new Color (required on vehicles) 
	*@param int $id (existing piece id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
