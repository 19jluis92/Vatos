<?php
require('database/CarType.php')
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
		return true;
	}

	/**
	*method for show  cartype details
	*@param string $id existing cartype id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('CarType', $id,NULL))
			{
			$Model = new CarType($result['name']);
			/*opcionales son de prueba*/
			var_dump($Model);
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
		$brand = new CarType($name);
		if($result = $this->db->insert("CarType", $CarType,NULL))
		{
			return true;
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
		$CarType = new CarType($name);
		if($result = $this->db->update("CarType", $CarType,NULL))
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
		if($result = $this->db->delete("CarType" , $id,NULL))
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
