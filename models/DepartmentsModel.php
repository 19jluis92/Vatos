<?php
require_once('database/Department.php');
require_once('models/Model.php');
Class DepartmentsModel extends Model{
	private $id;
	private $name;
	private $idLocation;

	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all departments
	* @return array array of departments 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Departments array)
		return $this->db->all('department');
	}

	/**
	*method for show  department details
	*@param string $id existing department id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('department' , $id,NULL))
		{
			$Department = new Department($result['name'],$result['idLocation'],$result['id']);
			return $Department;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new department
	*@param string $name
	*@param string $idLocation
	* @return bool transaction result
	*/
	function create($name,$idLocation)
	{
		$Department = new Department($name, $idLocation);
		if($result = $this->db->insert('department', $Department,NULL))
		{
			return $result;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a department  
	*@param int $id (existing department id)
	*@param string $name (department name) 
	*@param string $idLocation
	* @return bool transaction result
	*/
	function edit($id,$name,$idLocation)
	{
		$Department = new Department($name, $idLocation,$id);
		$Department->id = $id;
		if($result = $this->db->update('department' , $Department,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new department (required on vehicles) 
	*@param int $id (existing department id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete('department', $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}

	function GetByColumn($id,$column){
		if($result = $this->db->GetByColum('department',$id,$column))
		{
			//var_dump($result);
			//$Inspections =   new Service($result['startDate'],$result['endDate'],$result['idEmployee'],$result['idCarWorkShop'],$result['idVehicle'],$result['id']);
			return $result;
		}
		else{
			
			return NULL;
		}
		//delete element using the given $id
		return true;
	}
}
?>
