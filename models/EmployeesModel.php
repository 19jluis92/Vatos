<?php

/**
* 
*/
require_once('database/Employee.php');
require_once('models/Model.php'); 
class EmployeesModel  extends Model
{
	private $name;
	private $lastName;
	private $nss;
	private $address;
	private $phone;
	private $cellPhone;
	private $idCity;
	private $idUser;
	private $idCarWorkShop;

	/** navigation Properties
	*/
	private $user;
	private $city;
	private $carWorkShop;

	function __construct(){
		parent::__construct();
	}


	/**
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $idCity
	* @param string $idUser
	* @param string $idCarWorkShop
	*/
	function create($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop)
	{
		global $db;
		$employee = new Employee($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop);
		if($result = $db->insert('employee' , $employee,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		
	}
	/**
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $idCity
	* @param string $idCarWorkShop
	*/
	function edit($id,$name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop)
	{
		$employee = new Employee($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop);
		$employee->id = $id;
		if($result = $this->db->update('employee' , $employee,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		
	}

	function delete($id){
		if($result = $this->db->delete('employee' , $id,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}

	function all(){
		$elements = $this->db->all('employee');
		//get all elements (set the $elements variable with a states array)
		return $elements;
	}

	function details($id){
		if($result = $this->db->details('employee' , $id,NULL))
			{
			$employee = new Employee($result['id'],$result['name'],$result['lastName'],$result['nss'],$result['address'],$result['phone'],$result['cellphone'],$result['idCity'],$result['idUser'],$result['idCarWorkShop']);
			/*opcionales son de prueba*/
			var_dump($employee);
			return $employee;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	function getByColumn($id,$column){
		return $this->db->GetByColum('employee',$id,$column);
	}
}
?>