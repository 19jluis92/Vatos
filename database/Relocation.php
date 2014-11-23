<?php  
	class Relocation{
		public $id;
		public $relocationDate;
		public $idEmployee;
		public $reason;
		public $idDepartment;
		public $idService;

		function __construct($relocationDate, $idEmployee, $reason, $idDepartment, $idService,$id=0)
		{
			$this->id=$id;
			$this->relocationDate = $relocationDate;
			$this->idEmployee = $idEmployee;
			$this->reason = $reason;
			$this->idDepartment = $idDepartment;
			$this->idService = $idService;
		}

	}
?>