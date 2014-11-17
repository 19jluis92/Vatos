<?php
require_once('database/Client.php');
require_once('models/Model.php');
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
	}
	
	/**
	* @param string $name
	* @param string $lastName
	* @param string $rfc
	* @param string $clientCol
	* @param string $clientCol1
	*/
	function create($name,$lastName,$rfc,$clientCol,$clientCol1,$number,$lada,$area)
	{
	$client = new Client($name,$lastName,$rfc,$clientCol,$clientCol1);
		if($result = $this->db->insert('client' , $client,NULL))
		{
		
			/*opcionales son de prueba*/
			var_dump($result);
			return true;
		}
		else{
			
			
			return false;
		}

	}
	function edit($id,$name,$lastName,$rfc,$clientCol,$clientCol1)
	{
	$client = new Client($name,$lastName,$rfc,$clientCol,$clientCol1);
		$client->id = $id;
		if($result = $this->db->update('client' , $client,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}
	function delete($id)
	{
		if($result = $this->db->delete('client' , $id,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}

	function index()
	{
		$elements = $this->db->all('client');
		//get all elements (set the $elements variable with a states array)
		return $elements;
	}

	function details($id)
	{
		if($result = $this->db->details('client' , $id,NULL))
			{
			$client = new Client($result['name'],$result['lastName'],$result['rfc'],$result['clientCol'],$result['clientCol1']);
			/*opcionales son de prueba*/
			var_dump($client);
			return $client;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}
}
?>