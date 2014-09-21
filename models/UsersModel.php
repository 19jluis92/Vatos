<?php  
require('models/Model.php'); 
class UsersModel extends Model{
	private $email;
	private $password;


	/**
	* @param string $email
	* @param string $password
	*/
	function create($email, $password)
	{
		$this->email   = $email;
		$this->password = $password;
		return true;
	}
/**
	* Edit a vehicle given the id
	* @param string $email
	* @param string $password
	*/
	function edit($email,$password){
		$this->email   = $email;
		$this->password = $password;
		return true;
	}
/**
	* Delete  given it's id
	* @param int $id
	* @return bool transaction result
	*/
	function delete($id){
		return true;

	}

	function index(){
		return true;
	}

	function details(){
		return true;
	}

}

?>