<?php
require_once('database/Role.php');
require_once('models/Model.php');
Class RolesModel extends Model{
	private $tableName = 'role';
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
		$elements = $this->db->all($this->tableName);
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
		if($result = $this->db->details($this->tableName, $id,NULL))
		{
			$role = new Role($result['name'],$result['id']);
			return $role;
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
		$role = new Role($name);
		if($result = $this->db->insert($tableName , $role,NULL))
		{
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
		$role = new Role($name,$id);
		$role->id = $id;
		if($result = $this->db->update($tableName , $role,NULL))
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
		if($result = $this->db->delete($tableName , $id,NULL))
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
