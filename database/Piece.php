<?php  
	class Piece{
		public $id;
		public $name;

		function __construct($name,$id=0)
		{
			$this->id=$id;
			$this->name = $name;
		}

	}
?>

