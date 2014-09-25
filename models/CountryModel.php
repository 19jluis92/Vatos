<?php
require('models/Model.php');
Class CountryModel extends Model{
	private $id;
	private $name;

	private $db_driver;

	function __construct(){
		parent::__construct();
		require("database_config.inc");
		$this->db_driver = new mysqli($host,$user,$pass,$db);
		if($this->db_driver->connect_error){
			die('error de conexión a la base de datos');
		}
	}
	/**
	*method for list all countries
	* @return array array of countries 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a countries array)
		return true;
	}

	/**
	*method for show country details
	*@param string $id existing country id
	* @return bool transaction result
	*/
	function details($id)
	{
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
		$this->name = $this->db_driver->escape_string($name);
		$result = $this->db_driver->query("INSERT INTO country (name) values('$this->name')");
		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return false;
		}
		//save element and get complete item (with $id)
		return true;
	}

	/**
	*method for edit a country  
	*@param int $id (existing country id)
	*@param string $name (country name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$this->name = $name;
		//update element using the given $id
		return true;
	}

	/**
	*method for create new country (required on vehicles) 
	*@param int $id (existing country id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		//delete element using the given $id
		return true;
	}
}
?>
