<?php
require_once('database/Service.php');
require_once ('models/Model.php');
Class ServicesModel extends Model{
	private $id;
	private $startDate;
	private $endDate;
	private $idEmployee;
	private $idCarWorkShop;
	private $idVehicle;


	function __construct(){
		parent::__construct();
	}
	/**
	* Navigation Properties 
	*/
	private $employee;
	private $carWorkShop;
	private $vehicle;

	/**
	*method for list all services
	* @return array array of services 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Services array)
		return $this->db->all('service');
	}

	/**
	*method for show  service details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('service', $id,NULL))
		{
			$Services = new Service($result['startDate'],$result['endDate'],$result['idEmployee'],$result['idCarWorkShop'],$result['idVehicle'],$result['ic']);
			return $Services;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new service 
	*@param string $startDate (dd/MM/yyyy hh:mm:ss)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss)
	*@param int $idEmployee
	*@param int $idCarWorkShop
	*@param int $idVehicle
	* @return bool transaction result
	*/
	function create($startDate,$endDate,$idEmployee,$idCarWorkShop,$idVehicle)
	{
		$Services = new Service($startDate, $endDate, $idEmployee, $idCarWorkShop, $idVehicle);
		if($result = $this->db->insert('service', $Services,NULL))
		{
			return $result;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a service  
	*@param int $id the existing service id
	*@param string $startDate (dd/MM/yyyy hh:mm:ss)
	*@param string $endDate (dd/MM/yyyy hh:mm:ss)
	*@param int $idEmployee
	*@param int $idCarWorkShop
	*@param int $idVehicle
	* @return bool transaction result
	*/
	function edit($id,$startDate,$endDate,$idEmployee,$idCarWorkShop,$idVehicle)
	{
		$Services = new Service($startDate, $endDate, $idEmployee, $idCarWorkShop, $idVehicle);
		$Services->id = $id;
		if($result = $this->db->update('service', $Services,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new service
	*@param int $id (existing service id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete('service' , $id,NULL))
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
