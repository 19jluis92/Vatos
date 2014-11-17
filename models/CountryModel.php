<?php
require_once('database/Country.php');
require_once('models/Model.php');
Class CountryModel extends Model{
	private $id;
	private $name;

	function __construct(){
		parent::__construct();
		
	}
	/**
	*method for list all countries
	* @return array array of countries 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a countries array)
		return $this->db->all('country');
	}

	/**
	*method for show country details
	*@param string $id existing country id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('country' , $id,NULL))
			{
			$Country = new Country($result['name']);
			/*opcionales son de prueba*/
			var_dump($Country);
			return $Country;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new country (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name)
	{
		$country = new Country($name);
		if($result = $this->db->insert('country', $country,NULL))
			{
			/*opcionales son de prueba*/
			var_dump($country);
			var_dump($result);
			return true;
		}
		else{
			echo $result;			
			return false;
		}
	}

	/**
	*method for edit a country  
	*@param int $id (existing country id)
	*@param string $name (country name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$Country = new Country($name);
		$Country->id = $id;
		if($result = $this->db->update('country', $Country,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new country (required on vehicles) 
	*@param int $id (existing country id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete('country', $id,NULL))
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
