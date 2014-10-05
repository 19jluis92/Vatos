<?php 
class db{

	private  $db_driver;

	function __construct(){
		require("database_config.inc");
		$this->db_driver = new mysqli($host,$user,$pass,$db);
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

	public function query($query){

	}

	public function insert($table,$data,$predicate){
		/*foreach($data as $key => $value) {

			list($dummy, $newkey) = explode('_', $key);
			$new_arr[$newkey] = $value;

		}*/
		$keys = implode(',', array_keys(get_object_vars($data)));
		//$this->name = $this->db_driver->escape_string($name);
		$values = implode("','", array_values(get_object_vars($data)));
		var_dump($values);
		$result = $this->db_driver->query("INSERT INTO $table ($keys) values('$values')");
		if(!empty($this->db_driver->error)){
			echo  $this->db_driver->error;
			return false;
		}
		else{

		var_dump($result);	
		}
		
		return true;

	}
	
} ?>

