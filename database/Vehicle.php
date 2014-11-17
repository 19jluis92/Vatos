<?php  
	class Vehicle{
		public $id;
		public $vin;
		public $idModel;
		public $idColor;
		public $year;
		public $idCarType;
		public $characteristics;
		public $plates;

		function __construct($vin, $model, $color, $year, $type, $conditions, $plates,$id=0)
		{
			$this->id=$id;
			$this->vin = $vin;
			$this->idModel = $model;
			$this->idColor = $color;
			$this->year = $year;
			$this->idCarType = $type;
			$this->characteristics = $conditions;
			$this->plates = $plates;
		}

	}
?>