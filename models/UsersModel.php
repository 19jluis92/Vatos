<?php  
require_once('database/User.php');
require_once('models/Model.php'); 
class UsersModel extends Model{
	private $id;
	private $email;
	private $password;

	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all Users
	* @return array array of Users 
	*/	
	function all(){
		//get all elements (set the $elements variable with a states array)
		return $this->db->all('user');
	}
	/**
	*method for show  User details
	*@param string User
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('user', $id,NULL))
		{
			$user = new User($result['email'], $result['password'],$result['id']);
			return $user;
		}
		else
		{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}
	/**
	* @param string $email
	* @param string $password
	*/
	function create($email, $password)
	{	
		global $db;
		$user = new User($email, $password);
		if($result = $db->insert('user', $user,NULL))
		{
			return $result;
		}
		else
		{
			return false;
		}
	}
/**
	* Edit a vehicle given the id
	* @param string $email
	* @param string $password
	*/
	function edit($id,$email,$password)
	{		
		$user = new User($email,$password);
		$user->id = $id;
		if($result = $this->db->update('user' , $user,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}
/**
	* Delete  given it's id
	* @param int $id
	* @return bool transaction result
	*/
	function delete($id){
		if($result = $this->db->delete('user', $id,NULL))
			return true;
		else
		{
			return false;
		}
		//delete element using the given $id
		return true;

	}



	function authentication($name,$pass){
		var_dump($name);
		var_dump($pass);
		if($result = $this->db->GetUserByName('user' , $name,$pass))
			{
			$user = new User($result['email'],$result['password']);
			/*opcionales son de prueba*/
			//var_dump($user);
			return $user;
		}
		else{
			
			return null;
		}
		
		return null;
	}

}

?>