<?php
require_once('models/Model.php');
require_once('database/City.php');
Class CitiesModel extends Model{
	private $id;
	private $name;
	private $idState;
	/**
	*method for list all cities
	* @return array array of cities 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a City array)
		return $this->db->all('city');
	}

	/**
	*method for show  city details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('city', $id,NULL))
		{
			$Model = new City($result['name'],$result['idState'],$result['id']);
			return $Model;
		}
		else
		{
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new city (required on vehicles) 
	*@param string $name
	*@param int $idState
	* @return bool transaction result
	*/
	function create($name,$idState)
	{
		$city = new City($name,$idState);
		if($result = $this->db->insert('city' , $city,NULL))
		{
			return $result;
		}
		else{
			echo $result;
			
			return false;
		}
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a city  
	*@param int $id (existing color id)
	*@param string $name (color name) 
	*@param int $idState
	* @return bool transaction result
	*/
	function edit($id,$name,$idState)
	{
		$city = new City($name,$idState);
		$city->id = $id;
		if($result = $this->db->update('city' , $city,NULL))
			return $result;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new city (required on vehicles) 
	*@param int $id (existing color id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete('city' , $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
	}
}
?>
