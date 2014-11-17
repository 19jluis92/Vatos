<?php
require_once('database/Client.php');
require_once('models/Model.php');
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