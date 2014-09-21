<?php
require('models/Model.php');
Class CarTypesModel extends Model{
	private $id;
	private $name;

	/**
	*method for list all cartypes
	* @return array array of cartypes 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a CarTypes array)
		return true;
	}

	/**
	*method for show  cartype details
	*@param string $id existing cartype id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new cartype (required on vehicles) 
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
	*method for edit a cartype  
	*@param int $id (existing cartype id)
	*@param string $name (cartype name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$this->name = $name;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new cartype (required on vehicles) 
	*@param int $id (existing cartype id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
