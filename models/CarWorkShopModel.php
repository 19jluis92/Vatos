<?php
require('models/Model.php');
Class CarWorkShopModel extends Model{
	private $id;
	private $name;
	private $address;
	private $idCity;

	/**
	*Navigation properties
	*/
	private $city;
	/**
	*method for list all states
	* @return array array of states 
	*/
	function list()
	{
		//get all elements (set the $elements variable with a states array)
		return $elements;
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
	function create($name, $country, $address, $city)
	{
		$this->name = $name;
		$this->country = $country;
		$this->address = $addres;
		$this->idCity = $city;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($name, $country, $address, $city)
	{
		$this->name = $name;
		$this->country = $country;
		$this->address = $addres;
		$this->idCity = $city;
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
