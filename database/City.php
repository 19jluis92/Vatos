<?php  
	class City{
		public $id;
		public $name;
		public $idState;
		function __construct($name,$idState)
		{
			$this->id=0;
			$this->name = $name;
			$this->idState = $idState;
		}

	}
?>

