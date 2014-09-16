<?php
require('models/Model.php');
Class ColorsModel extends Model{
	private $id;
	private $name;

	/**
	*method for list all colors
	* @return array array of colors 
	*/
	function list()
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for show  Color details
	*@param string $color
	* @return bool transaction result
	*/
	function details($id)
	{
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new Color (required on vehicles) 
	*@param string $color
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
	*@param int $id (existing color id)
	*@param string $name (color name) 
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
