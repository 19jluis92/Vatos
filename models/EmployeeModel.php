<?php

/**
* 
*/
require('models/Model.php'); 
class EmployeeModel  extends Model
{
	private $name;
	private $lastName;
	private $nss;
	private $address;
	private $phone;
	private $cellPhone;
	private $city;
	private $carWorkShop;
	/**
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $city
	* @param string $carWorkShop
	*/
	function create($name,$lastName,$nss,$address,$phone,$cellPhone)
	{
		$this->name=$name;
		$this->lastName=$lastName;
		$this->nss=$nss;
		$this->address = $address;
		$this->phone = $phone;
		$this->cellPhone=$cellPhone;

		return true;
		
	}
	/**
	* @param string $name
	* @param string $lastName
	* @param string $nss
	* @param string $address
	* @param string $phone
	* @param string $cellPhone
	* @param string $city
	* @param string $carWorkShop
	*/
	function edit($name,$lastName,$nss,$address,$phone,$cellPhone)
	{
		$this->name=$name;
		$this->lastName=$lastName;
		$this->nss=$nss;
		$this->address = $address;
		$this->phone = $phone;
		$this->cellPhone=$cellPhone;

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