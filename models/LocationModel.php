<?php
require('models/Model.php');
Class LocationModel extends Model{
	private $id;
	private $name;
	private $idCarWorkShop;

	/**
	*Navigation properties
	*/
	private $carWorkShop;
	/**
	*method for list all states
	* @return array array of states 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a states array)
		return true;
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new state (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name, $carWorkShop)
	{
		$this->name = $name;
		$this->idCarWorkShop = $carWorkShop;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($name, $carWorkShop)
	{
		$this->name = $name;
		$this->idCarWorkShop = $carWorkShop;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new state (required on vehicles) 
	*@param int $id (existing state id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
