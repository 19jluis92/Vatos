<?php
require('database/WorkShopPhone.php');
require('models/Model.php');
Class WorkShopPhoneModel extends Model{
	private $id;
	private $lada;
	private $area;
	private $number;
	private $idCarWorkShop;

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
		return $this->db->all('WorkShopPhone');
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('WorkShopPhone', $id,NULL))
		{
			$WorkShopPhone = new WorkShopPhone($result['name']);
			/*opcionales son de prueba*/
			var_dump($WorkShopPhone);
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
	*@param string $lada
	* @return bool transaction result
	*/
	function create($lada, $country, $area, $number, $carWorkShop)
	{
		$WorkShopPhone = new WorkShopPhone($lada, $country, $addres, $number,$carWorkShop);
		if($result = $this->db->insert("WorkShopPhone", $WorkShopPhone,NULL))
		{
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $lada (state lada) 
	* @return bool transaction result
	*/
	function edit($lada, $country, $area, $number, $carWorkShop)
	{
		$WorkShopPhone = new WorkShopPhone($lada, $country, $addres, $number,$carWorkShop);
		if($result = $this->db->update("WorkShopPhone", $WorkShopPhone,NULL))
		{
			return true;
		}
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
		
		if($result = $this->db->delete("WorkShopPhone" , $id,NULL))
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
