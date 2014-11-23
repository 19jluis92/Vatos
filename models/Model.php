<?php
class Model {
	protected $db;

	function __construct()
	{
		global $db;
		$this->db = $db;
	}
	/**
	*
	*
	* [["", id","=","1"],["and","name","<>","test"]]
	*/
	public function get($table, $conditions){
		$predicate = "";
		foreach ($conditions as $key => $value) {
			$predicate = $predicate.$value[0]." ".$value[1]." ".$value[2]." '".$value[3]."'"; 
		}
		if($result = $this->db->query($table , $predicate))
		{
			return $result;
			
		}		
		return null;
	}

}
?>