<?php
require('models/Model.php');
/**
* 
*/
class ClientModel extends Model
{
	private $name;
	private $lastName;
	private $rfc;
	private $clientCol;
	private $clientCol1;
	private $number;
	private $lada;
	private $area;
	
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
	* @param string $rfc
	* @param string $clientCol
	* @param string $clientCol1
	*/
	function create($name,$lastName,$rfc,$clientCol,$clientCol1)
	{
	$this->name= $name;
	$this->lastName = $lastName;
	$this->rfc = $rfc;
	$this->clientCol = $clientCol;
	$this->clientCol1 = $clientCol1;

	return true;

	}
	function edit($name,$lastName,$rfc,$clientCol,$clientCol1)
	{
	$this->name= $name;
	$this->lastName = $lastName;
	$this->rfc = $rfc;
	$this->clientCol = $clientCol;
	$this->clientCol1 = $clientCol1;

	return true;
	}
	function delete($id)
	{
		return true;
	}

	function all()
	{
		return true;
	}

	function details($id)
	{
		return true;
	}
}
?>