<?php  
require('models/Model.php'); 
class UsersModel extends Model{
	private $email;
	private $password;

	function __construct(){
		parent::__construct();
		require("database_config.inc");
		$this->db_driver = new mysqli($host,$user,$pass,$db);
		if($this->db_driver->connect_error){
			die('error de conexión a la base de datos');
		}
	}
	/**
	* @param string $email
	* @param string $password
	*/
	function create($email, $password)
	{
echo 'mama';
		$this->email   = $this->db_driver->escape_string( $email);
		$this->password = $this->db_driver->escape_string( $password);
		$result = $this->db_driver->query("INSERT INTO user (email,password) values('$this->email','$this->password')");
		if(!empty($this->db_driver->error)){
			echo $this->db_driver->error;
			return false;
		}
		// save element
		return true;
	}
/**
	* Edit a vehicle given the id
	* @param string $email
	* @param string $password
	*/
	function edit($email,$password){

		$this->email   = $this->db_driver->escape_string( $email);
		$this->password = $this->db_driver->escape_string( $password);
		$result = $this->db_driver->query("UPDATE  user SET email='$this->email',password='$this->password' WHERE idUser ='1'");
		if(!empty($this->db_driver->error)){
			echo $this->db_driver->error;
			return false;
		}
		// save element
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

	function details($id){

		$result = $this->db_driver->query("SELECT * FROM user where idUser='$id'");
		
		if(!empty($this->db_driver->error)){
			echo $this->db_driver->error;
			return false;
		}
		// save element
		return $result;
	}

}

?>