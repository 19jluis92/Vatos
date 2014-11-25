<?php 
class db{

	private  $db_driver;

	function __construct(){
		require("database_config.inc");
		$this->db_driver = new mysqli($host,$user,$pass,$db);
		$this->db_driver->set_charset("utf8");
		if($this->db_driver->connect_error){
			die('error de conexión a la base de datos');
		}	

	}

	public static function open()
	{
		
	}

	public function Test()
	{
		if($this->db_driver->connect_error){
			return false;
		}
		return true;
	}

	public function query($table,$predicate = ''){
		if ($predicate == '') 
			$result = $this->db_driver->query("SELECT * FROM $table");	
		else
			$result = $this->db_driver->query("SELECT * FROM $table WHERE $predicate");
		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return [];
		}
		else{
			$list =[];
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$list[] = $row;
			}
			return $list;
		}
	}

	public function all($table)
	{
		$result = $this->db_driver->query("SELECT * FROM $table");

		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return NULL;
		}
		else{
			$list =[];
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$list[] = $row;
			}
			return $list;
		}
	}

	public function details($table , $id, $predicate)
	{
		$id = $this->db_driver->escape_string($id);
		if($id != NULL){
			$result = $this->db_driver->query("SELECT * FROM $table WHERE id  = $id");
			if(!empty($this->db_driver->error)){
				echo  $this->db_driver->error;
				return false;
			}
			else{
				if($this->db_driver->affected_rows > 0){
					$model_array = mysqli_fetch_array($result);
					return $model_array;
				}

				else{
					echo "element not found";
					return NULL;
				}
			}
		}
	}


	public function insert($table,$data,$predicate){
		/*foreach($data as $key => $value) {

			list($dummy, $newkey) = explode('_', $key);
			$new_arr[$newkey] = $value;

		}*/
		$keys = implode(',', array_keys(get_object_vars($data)));
		//$this->name = $this->db_driver->escape_string($name);
		$values = implode("','", array_values(get_object_vars($data)));
		//var_dump($values);
		$result = $this->db_driver->query("INSERT INTO $table ($keys) values('$values')");
		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return false;
		}
		else{
			$data->id = $this->db_driver->insert_id;
			return $data;
		}
	}

	public function update($table,$data,$predicate){
		$keys = implode(',', array_keys(get_object_vars($data)));
		$values='';
		foreach($data as $key => $value) {
			$values.="$key = '";
			$values.=$this->db_driver->escape_string($value);
			$values.= "',";
		}
		$values = rtrim($values, ",");
		//$values = implode("','", array_values(get_object_vars($data)));
		$result = $this->db_driver->query("UPDATE $table SET $values where id = $data->id");
		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return false;
		}
		else{
			return true;
		}
	}

	public function delete($table , $id, $predicate)
	{
		$id = $this->db_driver->escape_string($id);
		if($id != NULL){
			$result = $this->db_driver->query("DELETE FROM  $table WHERE  id = $id");
			if(!empty($this->db_driver->error)){
				echo  $this->db_driver->error;
				return false;
			}
			else{
				var_dump($result);
				if($this->db_driver->affected_rows > 0)
					return true;
				else{
					echo "element not found";
					return false;
				}
			}
		}
		if($predicate != NULL){
			$result = $this->db_driver->query("DELETE FROM  $table WHERE $predicate");
			if(!empty($this->db_driver->error)){
				echo  $this->db_driver->error;
				return false;
			}
			else{
				return true;
			}
		}
		else return false;

	}

	public function GetUserByName($table , $name,$pass)
	{

		$name = $this->db_driver->escape_string($name);
		$pass = $this->db_driver->escape_string($pass);
		
		if($name != NULL){
			$result = $this->db_driver->query("SELECT * FROM $table WHERE email = '$name' and password = '$pass' ");
			if(!empty($this->db_driver->error)){
				echo  $this->db_driver->error;
				return false;
			}
			else{
				if($this->db_driver->affected_rows > 0){
					$model_array = mysqli_fetch_array($result);
					return $model_array;
				}

				else{
					echo "element not found";
					return NULL;
				}
			}
		}
	}

	public function getUserPassword($email)
	{
		$email = $this->db_driver->escape_string($email);
		if ($email != NULL)
		{
			$result = $this->db_driver->query("SELECT `password` FROM `user` WHERE email = '$email' ");
			$model_array = mysqli_fetch_array($result);
		}
		return $model_array;
	}

	public function GetByColum($table , $name,$column)
	{
		$name = $this->db_driver->escape_string($name);
		$column = $this->db_driver->escape_string($column);
		if($name != NULL){
			$result = $this->db_driver->query("SELECT * FROM $table WHERE $column = '$name'");
			if(!empty($this->db_driver->error)){
				echo  $this->db_driver->error;
				return false;
			}
			else{
				$list =[];
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$list[] = $row;
				}
				return $list;
			}
		}
	}
	
} ?>

