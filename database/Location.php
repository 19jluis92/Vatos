<?php  
	class Location{
		public $id;
		public $name;
		public $idCarWorkShop;

		function __construct($name, $idCarWorkShop,$id = 0)
		{
			$this->id = $id;
			$this->name = $name;
			$this->idCarWorkShop = $idCarWorkShop;
		}

	}
?>