<?php
require_once('database/Severity.php');
require_once('models/Model.php');
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
		return $this->db->all('severity');
	}

	/**
	*method for show  Severity details
	*@param string $severity
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('severity', $id,NULL))
		{
			$Severity = new Severity($result['name'],$result['id']);
			var_dump($Severity->id);
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
		if($result = $this->db->insert('severity' , $Severity,NULL))
		{
			return $result;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a Severity  
	*@param int $id (existin severity id)
	*@param string $name (severity name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$Severity = new Severity($name);
		$Severity->id = $id;
		if($result = $this->db->update('severity' , $Severity,NULL))
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
		if($result = $this->db->delete('severity' , $id,NULL))
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
