<?php  
	class Bump{
		public $id;
		public $idInspection;
		public $idSeverity;
		public $idPiece;

		function __construct($idInspection, $idSeverity, $idPiece)
		{
			$this->id=0;
			$this->idInspection = $idInspection;
			$this->idSeverity = $idSeverity;
			$this->idPiece = $idPiece;
		}

	}
?>