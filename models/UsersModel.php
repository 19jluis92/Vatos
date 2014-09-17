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
}

?>