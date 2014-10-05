<?php  
	class Service{
		public $id;
		public $startDate;
		public $endDate;
		public $idEmployee;
		public $idCarWorkShop;
		public $idVehicle;

		function __construct($name, $startDate, $endDate, $idEmployee, $idCarWorkShop, $idVehicle)
		{
			$this->id=0;
			$this->name = $name;
			$this->startDate = $startDate;
			$this->endDate = $endDate;
			$this->idEmployee = $idEmployee;
			$this->idCarWorkShop = $idCarWorkShop;
			$this->idVehicle = $idVehicle;
		}

	}
?>