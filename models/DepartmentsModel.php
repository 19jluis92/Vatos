<?php
require('models/Model.php');
Class DepartmentsModel extends Model{
	private $id;
	private $name;
	private $idLocation;
	/**
	*Navigation properties
	*/
	private $location;

	/**
	*method for list all departments
	* @return array array of departments 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Departments array)
		return true;
	}

	/**
	*method for show  department details
	*@param string $id existing department id
	* @return bool transaction result
	*/
	function details($id)
	{
		//load the element using the given $id
		return true;
	}

	/**
	*method for create new department
	*@param string $name
	*@param string $idLocation
	* @return bool transaction result
	*/
	function create($name,$idLocation)
	{
		$this->name = $name;
		$this->idLocation = $idLocation;
		//save element and get complete item
		return true;
	}

	/**
	*method for edit a department  
	*@param int $id (existing department id)
	*@param string $name (department name) 
	*@param string $idLocation
	* @return bool transaction result
	*/
	function edit($id,$name,$idLocation)
	{
		//find element using the given $id
		$this->name = $name;
		$this->idLocation = $idLocation;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new department (required on vehicles) 
	*@param int $id (existing department id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
