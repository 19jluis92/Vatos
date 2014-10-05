<?php  
	class CarModel{
		public $id;
		public $name;
		public $idBrand;

		function __construct($name, $idBrand)
		{
			$this->id=0;
			$this->name = $name;
			$this->idBrand = $idBrand;
		}

	}
?>