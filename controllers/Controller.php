<?php 
class Controller{
/**
	* @param string $data
	* @return string $data
	* Validate a string to be a number and clean it
	*/
	protected function validateNumber($data)
	{
		return $data;
	}
	/**
	* @param string $data
	* @return string $data
	* Validate a string to be text and clean it
	*/
	protected function validateText($data)
	{
		return $data;
	}
	/**
	* @param string $data
	* @return string $data
	* Validate a string to be text and clean it
	*/
	protected function validateEmail($data)
	{
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
	protected function validaPassword($data)
	{
		$regex='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$';
		if(preg_match($regex, $data))
		{
			return true;
		}
		return false;

	}
}

?>