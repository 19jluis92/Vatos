<?php  
require('database/User.php');
require('models/Model.php'); 
class UsersModel extends Model{
	private $email;
	private $password;

	function __construct(){
		parent::__construct();
	}
	/**
	* @param string $email
	* @param string $password
	*/
	function create($email, $password)
	{
		global $db;
		$user = new User($email,$password);
		if($result = $db->insert("User" , $user,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}
/**
	* Edit a vehicle given the id
	* @param string $email
	* @param string $password
	*/
	function edit($id,$email,$password){

		
		$user = new User($email,$password);
		$user->id = $id;
		if($result = $this->db->update("User" , $user,NULL))
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
		if($result = $this->db->delete("User" , $id,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;

	}

	function index(){
		$elements = $this->db->all('User');
		//get all elements (set the $elements variable with a states array)
		return $elements;
	}

	function details($id){

		
		if($result = $this->db->details('User' , $id,NULL))
			{
			$user = new User($result['email'],$result['password']);
			/*opcionales son de prueba*/
			//var_dump($user);
			return $user;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	function authentication($name,$pass){
		if($result = $this->db->GetUserByName('User' , $name,$pass))
			{
			$user = new User($result['email'],$result['password']);
			/*opcionales son de prueba*/
			//var_dump($user);
			return $user;
		}
		else{
			
			return null;
		}
		//delete element using the given $id
		return null;
	}

}

?>