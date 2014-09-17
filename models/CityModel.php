<?php 
 require('models/Model.php');
/**
* 
*/
class CityModel extends Model
{
	private $city;
	private $state;
	private $cityCol;
	
	/**
	* @param string $city
	* @param string $state
	* @param string $cityCol
	*/
	function create($city, $state, $cityCol)
	{
		$this->city = $city;
		$this->state = $state;
		$this->cityCol = $cityCol;

		return true;
		
	}
}
 ?>