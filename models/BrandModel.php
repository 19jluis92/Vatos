<?php
require('database/Brand.php');
require('models/Model.php');
Class BrandModel extends Model{
	private $id;
	private $name;

	function __construct(){
		parent::__construct();

	}
	/**
	*method for list all states
	* @return array array of states 
	*/
	function all()
	{
		$elements = array(['id' => 1 ,'name' => 'ford'  ],['id' => 2 ,'name' => 'ibiza'  ],['id' => 3 ,'name' => 'volvo'  ],['id' => 4 ,'name' => 'shadow'  ],['id' => 5 ,'name' => 'camaro'  ],['id' => 6 ,'name' => 'pointer'  ] );
		//get all elements (set the $elements variable with a states array)
		return $elements;
	}

	/**
	*method for show state details
	*@param string $id existing state id
	* @return bool transaction result
	*/
	function details($id)
	{
		if($result = $this->db->details('Brand' , $id,NULL))
			{
			$brand = new Brand($result['name']);
			/*opcionales son de prueba*/
			var_dump($brand);
			return $brand;
		}
		else{
			echo $result;
			return NULL;
		}
		//delete element using the given $id
		return true;
	}

	/**
	*method for create new state (required on vehicles) 
	*@param string $name
	* @return bool transaction result
	*/
	function create($name)
	{
		$brand = new Brand($name);
		if($result = $this->db->insert("Brand" , $brand,NULL))
			{
			/*opcionales son de prueba*/
			var_dump($brand);
			var_dump($result);
			return true;
		}
		else{
			echo $result;
			
			return false;
		}
	}

	/**
	*method for edit a state  
	*@param int $id (existing state id)
	*@param string $name (state name) 
	* @return bool transaction result
	*/
	function edit($id,$name)
	{
		$brand = new Brand($name);
		$brand->id = $id;
		if($result = $this->db->update("Brand" , $brand,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
	}

	/**
	*method for create new state (required on vehicles) 
	*@param int $id (existing state id)
	* @return bool transaction result
	*/
	function delete($id)
	{
		if($result = $this->db->delete("Brand" , $id,NULL))
			return true;
		else{
			echo $result;
			return false;
		}
		//delete element using the given $id
		return true;
	}
}
?>
