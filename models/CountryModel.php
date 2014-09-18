<?php
require('models/Model.php');
Class CountryModel extends Model{
	private $id;
	private $name;

	/**
	*method for list all countries
	* @return array array of countries 
	*/
	function list()
	{
		//get all elements (set the $elements variable with a countries array)
		return $elements;
	}

	/**
	*method for show country details
	*@param string $id existing country id
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new country (required on vehicles) 
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
	*method for edit a country  
	*@param int $id (existing country id)
	*@param string $name (country name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$this->name = $name;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new country (required on vehicles) 
	*@param int $id (existing country id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
