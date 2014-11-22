<?php  
	class State{
		public $id;
		public $name;
		public $idCountry;

		function __construct($name, $idCountry, $id = 0)
		{
			$this->id = $id;
			$this->name = $name;
			$this->idCountry = $idCountry;
		}

	}
?>