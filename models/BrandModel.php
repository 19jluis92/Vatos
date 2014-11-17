<?php
require_once('database/Brand.php');
require_once('models/Model.php');
Class BrandModel extends Model{
	private $id;
	private $name;

	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all states
	* @return array array of states 
	*/
	function all()
	{
		$elements = $this->db->all('brand');
		//get all elements (set the $elements variable with a states array)
		return $elements;
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('brand', $id,NULL))
			{
			$brand = new Brand($result['name'],$result['id']);
			return $brand;
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
	function create($name)
	{
		$brand = new Brand($name);
		if($result = $this->db->insert("brand" , $brand,NULL))
			{
			/*opcionales son de prueba*/
			return $result;
		}
		else{
			echo 'Error'. $result;
			
			return false;
		}
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$brand = new Brand($name,$id);
		$brand->id = $id;
		if($result = $this->db->update("brand" , $brand,NULL))
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
		if($result = $this->db->delete("brand" , $id,NULL))
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
