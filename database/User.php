<?php

	class User{
		public $id;
		public $email;
		public $password;

		function __construct($email,$password,$idRole,$id=0)
		{
			$this->id = $id;
			$this->email = $email;
			$this->password = $password;
			$this->idRole = $idRole;
		}
	}

?>