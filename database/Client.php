<?php
	class Client{
	public $id;
	public $name;
	public $lastName;
	public $rfc;
	public $clientCol;
	public $clientCol1;

		function __construct($name,$lastName,$rfc,$clientCol,$clientCol1)
	{
		$this->name = $name;
		$this->lastName = $lastName;
		$this->rfc = $rfc;
		$this->clientCol = $clientCol;
		$this->clientCol1 = $clientCol1;
		$this->id=0;


	}

}


?>

