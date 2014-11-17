<?php
require ('database/Piece.php');
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
		return $this->db->all('piece');
	}

	/**
	*method for show  Color details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('piece' , $id,NULL))
		{
			$Pieces = new Piece($result['name'],$result['id']);
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
		$Pieces = new Piece($name);
		if($result = $this->db->insert('piece' , $Pieces,NULL))
		{
			return $result;
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
		$Pieces = new Piece($name,$id);
		if($result = $this->db->update('piece' , $Pieces,NULL))
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
		if($result = $this->db->delete('piece' , $id,NULL))
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
