<?php
	class Client{
	public $id;
	public $name;
	public $lastName;
	public $rfc;
	public $email;
	public $address;

	function __construct($name,$lastName,$rfc,$email,$address, $id=0)
	{
		$this->name = $name;
		$this->lastName = $lastName;
		$this->rfc = $rfc;
		$this->email = $email;
		$this->address = $address;
		$this->id = $id;
	}
}
?>

