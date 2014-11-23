<?php 
class Controller
{
	protected $smarty;
	function __construct()
	{


		// *nix style (note capital 'S')
		//require_once('../libs/Smarty.class.php');
		require '/libs/Smarty.class.php';
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/views/');
		$this->smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/views_c/');
		$this->smarty->setConfigDir($_SERVER['DOCUMENT_ROOT'].'/configs/');
		$this->smarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/cache/');
		//** un-comment the following line to show the debug console
		$this->smarty->debugging = false;
		$this->smarty->caching = false;
		$this->smarty->cache_lifetime = 0;
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
			return $data;
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
		if (preg_match($regex, $data))
		{
			return $data;
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

	protected function LoggedIn()
	{
		return isset($_SESSION['user'])?$_SESSION['user']:null;
	}

	protected function validatePermissions($controller , $view)
	{
		/* valida los permisos de acuerdo a la base de datos*/
		if(isset($controller) &&  isset($view) ){
			if($controller !== '' && $view !== '')
			{
			//validar si tiene permisos en la base de datos
				return true;
			}
			else 
				return false;
		}
		else 
			return false;
		
	}



	function validateSession()
	{
		
		$result = (!empty($_SESSION['uid'])) ?  true : false;
		
		
		return $result;
	}
	function logout()
	{
		
		session_destroy(); 
		
		header('location: index.php'); 
	}

	/*HELPERS*/
	protected function toAssociativeArray($array, $key='id' , $value='name')
	{
		$result = [];
		foreach ($array as &$valor) {
			$result[$valor[$key]] = $valor[$value]; 
		}
		return $result;
	}

	protected function parcheAlCageDeChelis($array, $key='id' , $value='Name'){
		$result = [];
		foreach ($array as &$valor) {
			$result[$valor[$key]] = $valor[$value]; 
		}
		return $result;
	}

	protected function massiveInsertion()
	{
		$data = array();
		if (($handle = fopen("./test.csv", "r")) !== FALSE)
		{
		    while(($row = fgetcsv($handle, 1000, ",")) !== FALSE)
		    {
		        $data[] = $row;
		    }
		}
		return $data;
	}

}

?>
