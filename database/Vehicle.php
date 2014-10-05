<?php  
	class Vehicle{
		public $id;
		public $vin;
		public $model;
		public $color;
		public $year;
		public $type;
		public $conditions;
		public $plates;

		function __construct($vin, $model, $color, $year, $type, $conditions, $plates)
		{
			$this->id=0;
			$this->vin = $vin;
			$this->model = $model;
			$this->color = $color;
			$this->year = $year;
			$this->type = $type;
			$this->conditions = $conditions;
			$this->plates = $plates;
		}

	}
?>