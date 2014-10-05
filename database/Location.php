<?php  
	class Location{
		public $id;
		public $name;
		public $idCarWorkShop;

		function __construct($name, $idCarWorkShop)
		{
			$this->id=0;
			$this->name = $name;
			$this->idCarWorkShop = $idCarWorkShop;
		}

	}
?>