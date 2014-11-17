<?php  
	class Service{
		public $id;
		public $startDate;
		public $endDate;
		public $idEmployee;
		public $idCarWorkShop;
		public $idVehicle;

		function __construct($startDate, $endDate, $idEmployee, $idCarWorkShop, $idVehicle,$id=0)
		{
			$this->id=$id;
			$this->startDate = $startDate;
			$this->endDate = $endDate;
			$this->idEmployee = $idEmployee;
			$this->idCarWorkShop = $idCarWorkShop;
			$this->idVehicle = $idVehicle;
		}

	}
?>