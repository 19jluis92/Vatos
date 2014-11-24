<?php
	class Employee{
		public $id;
		public $name;
		public $lastName;
		public $nss;
		public $address;
		public $phone;
		public $cellPhone;
		public $idCity;
		public $idUser;
		public $idCarWorkShop;

		function __construct($name,$lastName,$nss,$address,$phone,$cellPhone,$idCity,$idUser,$idCarWorkShop,$id = 0)
		{
			$this->id=$id;
			$this->name = $name;
			$this->lastName = $lastName;
			$this->nss = $nss;
			$this->address = $address;
			$this->phone = $phone;
			$this->cellPhone = $cellPhone;
			$this->idCity = $idCity;
			$this->idUser = $idUser;
			$this->idCarWorkShop = $idCarWorkShop;
		}


	}
?>