<?php
require ('database/Severity.php');
require('models/Model.php');
Class SeveritiesModel extends Model{
	private $id;
	private $name;

	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all severitys
	* @return array array of severitys 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Severities array)
		return true;
	}

	/**
	*method for show  Severity details
	*@param string $severity
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Severity', $id,NULL))
		{
			$Severity = new Severity($result['name']);
			return $Severity;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new Severity (required on vehicles) 
	*@param string $severity
	* @return bool transaction result
	*/
	function create($name)
	{
		$Severity = new Severity($name);
		if($result = $this->db->insert("Severity" , $Severity,NULL))
		{
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a Severity  
	*@param int $id (existing severity id)
	*@param string $name (severity name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$Severity = new Severity($name);
		$Severity->id = $id;
		if($result = $this->db->update("Severity" , $Severity,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new Severity (required on vehicles) 
	*@param int $id (existing severity id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Severity" , $id,NULL))
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
