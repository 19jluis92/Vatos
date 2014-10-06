<?php
require ('database/Pieces.php');
require('models/Model.php');
Class PiecesModel extends Model{
	private $id;
	private $name;


	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all Pieces
	* @return array array of Pieces 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Pieces array)
		return $this->db->all('Piece');
	}

	/**
	*method for show  Color details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Piece' , $id,NULL))
		{
			$Pieces = new Pieces($result['name']);
			return $Pieces;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new Color (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name)
	{
		$Pieces = new Pieces($name);
		if($result = $this->db->insert("Piece" , $Pieces,NULL))
		{
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a Color  
	*@param int $id (existing piece id)
	*@param string $name (piece name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$Pieces = new Pieces($name);
		$Pieces->id = $id;
		if($result = $this->db->update("Piece" , $Pieces,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new Color (required on vehicles) 
	*@param int $id (existing piece id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Piece" , $id,NULL))
			return true;
		else
		{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}
}
?>
