<?php  
	class Relocation{
		public $id;
		public $name;
		public $relocationDate;
		public $idEmployee;
		public $reason;
		public $idDepartment;
		public $idService;

		function __construct($name, $relocationDate, $idEmployee, $reason, $idDepartment, $idService)
		{
			$this->id=0;
			$this->name = $name;
			$this->relocationDate = $relocationDate;
			$this->idEmployee = $idEmployee;
			$this->reason = $reason;
			$this->idDepartment = $idDepartment;
			$this->idService = $idService;
		}

	}
?>