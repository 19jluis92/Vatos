<?php
require('database/CarWorkShop.php');
require('models/Model.php');
Class CarWorkShopModel extends Model{
	private $id;
	private $name;
	private $address;
	private $idCity;

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
		return $this->db->all('carworkshop');
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('carworkshop', $id,NULL))
			{
			$CarWorkShop = new CarWorkShop($result['name']);
			/*opcionales son de prueba*/
			var_dump($CarWorkShop);
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
	function create($name, $country, $address, $city)
	{
		$CarWorkShop = new CarWorkShop($name, $country, $addres, $city);
		if($result = $this->db->insert('carworkshop', $CarWorkShop,NULL))
			{
			/*opcionales son de prueba*/
			var_dump($CarWorkShop);
			var_dump($result);
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
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($name, $country, $address, $city)
	{
		$CarWorkShop = new CarWorkShop($name, $country, $addres, $city);
		if($result = $this->db->update('carworkshop', $CarWorkShop,NULL))
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
		if($result = $this->db->delete('carworkshop', $id,NULL))
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
