<?php  
	class Department{
		public $id;
		public $name;
		public $idLocation;

		function __construct($name, $idLocation,$id=0)
		{
			$this->id=$id;
			$this->name = $name;
			$this->idLocation = $idLocation;
		}

	}
?>