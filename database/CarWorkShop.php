<?php  
	class CarWorkShop{
		public $id;
		public $name;
		public $address;
		public $idCity;

		function __construct($name, $address, $idCity,$id=0)
		{
			$this->id = $id;
			$this->name = $name;
			$this->address = $address;
			$this->idCity = $idCity;
		}

	}
?>