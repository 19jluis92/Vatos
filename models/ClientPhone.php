<?php
require('database/Client.php');
require('models/Model.php');
/**
* 
*/
class ClientPhone extends Model
{
	private $number;
	private $lada;
	private $area;
	
	
	function __construct(){
		parent::__construct();
	}

}