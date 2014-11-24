<?php
require_once('database/Location.php');
require_once('models/Model.php');
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
		return $this->db->all('location');
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('location' , $id,NULL))
		{
			$Location = new Location($result['name'],$result['idCarWorkShop'],$result['id']);
			return $Location;
		}
		else
		{
			return false;
		}
	}

	/**
	*method for create new state (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name, $carWorkShop)
	{
		$Location = new Location($name, $carWorkShop);
		if($result = $this->db->insert('location', $Location,NULL))
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($id,$name, $carWorkShop)
	{
		$Location = new Location($name, $carWorkShop,$id);
		if($result = $this->db->update('location', $Location,NULL))
		{			
			return $result;
		}
		else
		{
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
		if($result = $this->db->delete('location', $id,NULL))
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
