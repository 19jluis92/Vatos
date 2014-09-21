<?php
require('models/Model.php');
Class StateModel extends Model{
	private $id;
	private $name;
	private $idCountry;

	/**
	*Navigation properties
	*/
	private $country;
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
	function create($name, $country)
	{
		$this->name = $name;
		$this->country = $country;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($id,$name, $country)
	{
		$this->name = $name;
		$this->country = $country;
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
