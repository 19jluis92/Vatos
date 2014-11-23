<?php  
	class Inspection{
		public $id;
		public $idService;
		public $mileage;
		public $fuel;
		public $inspectionDate;
		public $type;

		function __construct( $idService, $mileage, $fuel, $inspectionDate, $type,$id=0)
		{
			$this->id=$id;
			$this->idService = $idService;
			$this->mileage = $mileage;
			$this->fuel = $fuel;
			$this->inspectionDate = $inspectionDate;
			$this->type = $type;
		}

	}
?>