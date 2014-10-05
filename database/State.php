<?php  
	class State{
		public $id;
		public $name;
		public $idCountry;

		function __construct($name, $idCountry)
		{
			$this->id=0;
			$this->name = $name;
			$this->idCountry = $idCountry;
		}

	}
?>