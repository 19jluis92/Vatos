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

	function index()
	{
		return true;
	}

	function details($id)
	{
		return true;
	}
}
?>