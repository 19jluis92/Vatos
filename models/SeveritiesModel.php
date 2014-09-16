<?php
require('models/Model.php');
Class SeveritiesModel extends Model{
	private $id;
	private $name;

	/**
	*method for list all severitys
	* @return array array of severitys 
	*/
	function list()
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for show  Severity details
	*@param string $severity
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new Severity (required on vehicles) 
	*@param string $severity
	* @return bool transaction result
	*/
	function create($name)
	{
		$this->name = $name;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a Severity  
	*@param int $id (existing severity id)
	*@param string $name (severity name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$this->name = $name;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new Severity (required on vehicles) 
	*@param int $id (existing severity id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
