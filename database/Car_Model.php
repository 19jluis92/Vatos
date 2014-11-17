<?php  
	class Car_Model{
		public $id;
		public $name;
		public $idBrand;

		function __construct($name, $idBrand,$id=0)
		{
			$this->id=$id;
			$this->name = $name;
			$this->idBrand = $idBrand;
		}

	}
?>