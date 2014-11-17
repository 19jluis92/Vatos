<?php  
	class Inspection{
		public $id;
		public $idService;
		public $mileage;
		public $fuel;
		public $inspectionDate;
		public $type;

		function __construct($name, $idService, $mileage, $fuel, $inspectionDate, $type,$id=0)
		{
			$this->id=$id;
			$this->name = $name;
			$this->idService = $idService;
			$this->mileage = $mileage;
			$this->fuel = $fuel;
			$this->inspectionDate = $inspectionDate;
			$this->type = $type;
		}

	}
?>