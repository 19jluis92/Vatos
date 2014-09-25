<?php 
class Controller{

	function __construct(){

	}
/**
	* @param string $data
	* @return string $data
	* Validate a string to be a number and clean it
	*/
	protected function validateNumber($data)
	{
		if(!isset($data))
			return 0;
		return $data;
	}

	/**
	* @param string $data
	* @return string $data
	* Validate a string to be a number and clean it
	*/
	protected function validateBool($data)
	{
		if(!isset($data))
			return 0;
		return ($data == true  || $data == false) ? $data : false;
	}

	/**
	* @param string $data
	* @return string $data
	* Validate a string to be a float and clean it
	*/
	protected function validateFloat($data)
	{
		if(!isset($data))
			return 0;
		return $data;
	}


	/**
	* @param string $data
	* @return string $data
	* Validate a string to be a number and clean it
	*/
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		if(!isset($data))
			return '01/01/1900';
    	$d = DateTime::createFromFormat($format, $date);
    	if( $d && $d->format($format) == $date)
    		return $date;
    	else
    		return '01/01/1900';
	}



	/**
	* @param string $data
	* @return string $data
	* Validate a string to be text and clean it
	*/
	protected function validateText($data)
	{
		if(!isset($data))
			return '';
		return htmlspecialchars($data);
	}
	/**
	* @param string $data
	* @return string $data
	* Validate a string to be text and clean it
	*/
	protected function validateEmail($data)
	{
		if(!isset($data))
			return false;
		$regex = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/'; 
		// Run the preg_match() function on regex against the email address
		if (preg_match($regex, $data))
		{
	 		 return true;
		}
		else 
		{ 
			return false;
		} 
		
	}
	/**
	* @param string $data
	* @return string $data
	* Validate a string to be text and clean it
	*/
	protected function validateUserName($data)
	{
		if(!isset($data))
			return false;
		$regex = '/^[a-z\d_]{4,15}$/i ';
		if (preg_match($rege, $dat))
		 {
			return true;
		}

		return false;

	}
	/*¨*
	*Contraseñas que contengan al menos una letra mayúscula.
	Contraseñas que contengan al menos una letra minúscula.
	Contraseñas que contengan al menos un número o caracter especial.
	Contraseñas cuya longitud sea como mínimo 8 caracteres.
	Contraseñas cuya longitud máxima no debe ser arbitrariamente limitada.
	*
	*/
	protected function validatePassword($data)
	{
		if(!isset($data))
			return false;
		$regex='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$';
		if(preg_match($regex, $data))
		{
			return true;
		}
		return false;

	}
}

?>
