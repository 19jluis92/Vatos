<?php  
	class CarWorkShop{
		public $id;
		public $name;
		public $address;
		public $idCity;

		function __construct($name, $address, $idCity)
		{
			$this->name = $name;
			$this->address = $address;
			$this->idCity = $idCity;
		}

	}
?>