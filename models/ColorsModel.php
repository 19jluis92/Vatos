<?php
require ('database/Color.php');
require('models/Model.php');
Class ColorsModel extends Model{
	private $id;
	private $name;


	function __construct(){
		parent::__construct();
	}
	/**
	*method for list all colors
	* @return array array of colors 
	*/
	function all()
	{
		//get all elements (set the $elements variable with a Colors array)
		return true;
	}

	/**
	*method for show  Color details
	*@param string $id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Color' , $id,NULL))
		{
			$Color = new Color($result['name']);
			return $Color;
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
		$Color = new Color($name);
		if($result = $this->db->insert("Color" , $Color,NULL))
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
	*@param int $id (existing color id)
	*@param string $name (color name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$Color = new Color($name);
		$Color->id = $id;
		if($result = $this->db->update("Color" , $Color,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new Color (required on vehicles) 
	*@param int $id (existing color id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Color" , $id,NULL))
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
