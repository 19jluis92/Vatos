<?php
require('models/Model.php');
Class BrandModel extends Model{
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
	*method for list all states
	* @return array array of states 
	*/
	function all()
	{
		$elements = array(['id' => 1 ,'name' => 'ford'  ],['id' => 2 ,'name' => 'ibiza'  ],['id' => 3 ,'name' => 'volvo'  ],['id' => 4 ,'name' => 'shadow'  ],['id' => 5 ,'name' => 'camaro'  ],['id' => 6 ,'name' => 'pointer'  ] );
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
	*@param string $name
	* @return bool transaction result
	*/
	function create($name)
	{
		$this->name = $this->db_driver->escape_string($name);
		$result = $this->db_driver->query("INSERT INTO brand (name) values('$this->name')");
		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return false;
		}
		//save element and get complete item (with $id)
		return true;
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$this->name = $name;
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
