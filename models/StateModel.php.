<?php
require('database/State.php');
require('models/Model.php');
Class StateModel extends Model{
	private $id;
	private $name;
	private $idCountry;

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
		if($result = $this->db->details('State' , $id,NULL))
			{
			$State = new State($result['name']);
			/*opcionales son de prueba*/
			var_dump($State);
			return $State;
		}
		else{
			echo $result;
			return NULL;
		}
	}

	/**
	*method for create new state (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name, $country)
	{
		$State = new State($name, $idCountry);
		if($result = $this->db->insert("Country" , $country,NULL))
			{
			/*opcionales son de prueba*/
			var_dump($country);
			var_dump($result);
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
	function edit($name, $idCountry)
	{
		$State = new State($name, $idCountry);
		if($result = $this->db->update("State" , $State,NULL))
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
		if($result = $this->db->delete("State" , $id,NULL))
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
