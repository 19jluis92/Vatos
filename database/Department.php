<?php  
	class Department{
		public $id;
		public $name;
		public $idLocation;

		function __construct($name, $idLocation)
		{
			$this->id=0;
			$this->name = $name;
			$this->idLocation = $idLocation
		}

	}
?>