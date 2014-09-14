<?php  
require('models/Model.php'); 
class UsersModel extends Model{
	public $name;
	public $lastName;
	public $roleId;
	public $address;
	public $phone;
	public $result;

	/**
	* @param string $name
	* @param string $lastName
	* @param string $address
	* @param string $roleId
	* @param string $phone
	*/
	function create($names, $lastName, $address,$roleId, $phone)
	{
		$this->names   = $names;
		$this->lastName = $lastName;
		$this->address  = $address;
		$this->roleId = $roleId;
		$this->phone = $phone;
		return true;
	}
}

?>