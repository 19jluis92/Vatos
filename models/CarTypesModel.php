<?php
require('database/CarType.php');
require('models/Model.php');
Class CarTypesModel extends Model{
	private $id;
	private $name;

	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all cartypes
	* @return array array of cartypes 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a CarTypes array)
		return $this->db->all('cartype');
	}

	/**
	*method for show  cartype details
	*@param string $id existing cartype id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('cartype', $id,NULL))
			{
			$Model = new CarType($result['name'],$result['id']);
			return $Model;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new cartype (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name)
	{
		$CarType = new CarType($name);
		if($result = $this->db->insert('cartype', $CarType,NULL))
		{
			return $result;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a cartype  
	*@param int $id (existing cartype id)
	*@param string $name (cartype name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$CarType = new CarType($name,$id);
		if($result = $this->db->update('cartype', $CarType,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new cartype (required on vehicles) 
	*@param int $id (existing cartype id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete('cartype' , $id,NULL))
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
