<?php
require('models/Model.php');
Class AccountModel extends Model{

	function __construct(){
		parent::__construct();
		require("database_config.inc");
		$this->db_driver = new mysqli($host,$user,$pass,$db);
		if($this->db_driver->connect_error){
			die('error de conexión a la base de datos');
		}
	}	
}
?>
