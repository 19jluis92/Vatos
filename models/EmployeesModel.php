<?php

/**
* 
*/
require('models/Model.php'); 
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
		require("database_config.inc");
		$this->db_driver = new mysqli($host,$user,$pass,$db);
		if($this->db_driver->connect_error){
			die('error de conexión a la base de datos');
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
	* @param string $idUser
	* @param string $idCarWorkShop
	*/
	function create($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop)
	{
		$this->name=$name;
		$this->lastName=$lastName;
		$this->nss=$nss;
		$this->address = $address;
		$this->phone = $phone;
		$this->cellPhone=$cellPhone;
		$this->idCity = $idCity;
		$this->idUser = $idUser;
		$this->idCarWorkShop = $idCarWorkShop;
		return true;
		
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
		//Find element using the given $id
		$this->name=$name;
		$this->lastName=$lastName;
		$this->nss=$nss;
		$this->address = $address;
		$this->phone = $phone;
		$this->cellPhone=$cellPhone;
		$this->idCity = $idCity;
		$this->idUser = $idUser;
		$this->idCarWorkShop = $idCarWorkShop;
		//update the element
		return true;
		
	}

	function delete($id){
		return true;
	}

	function all(){
		return true;
	}

	function details($id){
		return true;
	}
}
?>