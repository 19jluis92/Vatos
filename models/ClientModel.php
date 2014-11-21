<?php
require_once('database/Client.php');
require_once('models/Model.php');
/**
* 
*/
class ClientModel extends Model
{
	private $id;
	private $name;
	private $lastName;
	private $rfc;
	private $email;
	private $address;
	
	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all bumps
	* @return array array of bumps 
	*/
	function all()
	{
		//Get all elements (set the $elements variable with a states array)
		return $this->db->all('client');
	}

	function details($id)
	{
		if($result = $this->db->details('client' , $id,NULL))
		{	
			$client = new Client($result['Name'],$result['LastName'],$result['RFC'],$result['email'],$result['address'], $result['id']);
			return $client;
		}
		else
		{
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	* @param string $name
	* @param string $lastName
	* @param string $rfc
	* @param string $email
	* @param string $address
	*/
	function create($name,$lastName,$rfc,$email,$address)
	{
		$client = new Client($name,$lastName,$rfc,$email,$address);
		if($result = $this->db->insert('client' , $client,NULL))
		{
			return $result;
		}
		else
		{
			return false;
		}

	}

	function edit($id,$name,$lastName,$rfc,$email,$address)
	{
		$client = new Client($name,$lastName,$rfc,$email,$address, $id);
		if($result = $this->db->update('client' , $client,NULL))
		{
			return $client;
		}
		else
		{
			return false;
		}
	}

	function delete($id)
	{
		if($result = $this->db->delete('client' , $id,NULL))
		{
			return true;
		}
		else
		{
			echo $result;
			return false;
		}
	}
}
?>