<?php
	class User
	{
		public $id;
		public $email;
		public $password;

		function __construct($email, $password,$id = 0)
		{
			echo "string";
			$this->id = $id;
			$this->email = $email;
			$this->password = $password;
		}
	}
?>