<?php
require('models/Model.php');
Class CarModel extends Model{
	private $id;
	private $name;
	private $idBrand;

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
		return $this->db->all('Model');
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Model' , $id,NULL))
		{
			$CarModel = new CarModel($result['name']);
			return $CarModel;
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
	function create($name, $idBrand)
	{
		$CarModel = new CarModel($name,$idBrand);
		if($result = $this->db->insert("Model" , $CarModel,NULL))
		{
			return true;
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
	function edit($id, $name, $idBrand)
	{
		$CarModel = new CarModel($name,$idBrand);
		$CarModel->id = $id;
		if($result = $this->db->update("Model", $CarModel,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		return true;
	}

	/**
	*method for create new state (required on vehicles) 
	*@param int $id (existing state id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Model" , $id,NULL))
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
