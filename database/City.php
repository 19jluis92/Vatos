<?php  
	class City
	{
		public $id;
		public $name;
		public $idState;

		function __construct($name,$idState,$id = 0)
		{
			$this->id = $id;
			$this->name = $name;
			$this->idState = $idState;
		}

	}
?>

