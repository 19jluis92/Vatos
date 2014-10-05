<?php  
	class WorkShopPhone{
		public $id;
		public $lada;
		public $area;
		public $number;
		public $idCarWorkShop;

		function __construct($name, $lada, $area, $number, $idCarWorkShop)
		{
			$this->id=0;
			$this->lada = $lada;
			$this->area = $area;
			$this->number = $number;
			$this->idCarWorkShop = $idCarWorkShop;
		}

	}
?>