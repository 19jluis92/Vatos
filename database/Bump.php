<?php  
	class Bump{
		public $id;
		public $idInspection;
		public $idSeverity;
		public $idPiece;

		/**
			*method for show state details
			*@param string $id existing state id
			* @return bool transaction result
		*/
		function __construct($idInspection, $idSeverity, $idPiece,$id=0)
		{
			$this->id=0;
			$this->idInspection = $idInspection;
			$this->idSeverity = $idSeverity;
			$this->idPiece = $idPiece;
		}

	}
?>