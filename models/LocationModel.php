<?php
require('database/Location.php');
require('models/Model.php');
Class LocationModel extends Model{
	private $id;
	private $name;
	private $idCarWorkShop;

	function __construct(){
		parent::__construct();
	}
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
		if($result = $this->db->details('Location' , $id,NULL))
		{
			$Location = new Location($result['name']);
			return $Location;
		}
		else{
			echo $result;
			return NULL;
		}
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
		$Location = new Location($name, $carWorkShop);
		if($result = $this->db->insert("Location", $Location,NULL))
		{
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($name, $carWorkShop)
	{
		$Location = new Location($name, $carWorkShop);
		if($result = $this->db->update("Location", $Location,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new state (required on vehicles) 
	*@param int $id (existing state id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Location", $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}
}
?>
