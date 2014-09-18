<?php
require('models/Model.php');
Class WorkShopPhoneModel extends Model{
	private $id;
	private $lada;
	private $area;
	private $number;
	private $idCarWorkShop;

	/**
	*Navigation properties
	*/
	private $carWorkShop;
	/**
	*method for list all states
	* @return array array of states 
	*/
	function list()
	{
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
		$this->lada = $lada;
		$this->country = $country;
		$this->area = $addres;
		$this->number = $number;
		$this->idCarWorkShop = $carWorkShop;
		//save element and get complete item (with $id)
		return $this;
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $lada (state lada) 
	* @return bool transaction result
	*/
	function edit($lada, $country, $area, $number, $carWorkShop)
	{
		$this->lada = $lada;
		$this->country = $country
		$this->area = $addres;
		$this->number = $number;
		$this->idCarWorkShop = $carWorkShop;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new state (required on vehicles) 
	*@param int $id (existing state id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
