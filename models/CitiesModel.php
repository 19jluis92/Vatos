<?php
require('models/Model.php');
Class CitiesModel extends Model{
	private $id;
	private $name;
	private $idState;
	/**
	*method for list all cities
	* @return array array of cities 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a City array)
		return true;
	}

	/**
	*method for show  city details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new city (required on vehicles) 
	*@param string $name
	*@param int $idState
	* @return bool transaction result
	*/
	function create($name)
	{
		$this->name = $name;
		$this->idState = $idState;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a city  
	*@param int $id (existing color id)
	*@param string $name (color name) 
	*@param int $idState
	* @return bool transaction result
	*/
	function edit($id,$name,$idState)
	{
		$this->name = $name;
		$this->idState = $idState;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new city (required on vehicles) 
	*@param int $id (existing color id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
