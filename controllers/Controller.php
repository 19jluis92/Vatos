<?php 
class Controller
{
	protected $smarty;
	function __construct()
	{


		// *nix style (note capital 'S')
		//require_once('../libs/Smarty.class.php');
		require '/libs/Smarty.class.php';
		require_once('database/User.php');
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/views/');
		$this->smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/views_c/');
		$this->smarty->setConfigDir($_SERVER['DOCUMENT_ROOT'].'/configs/');
		$this->smarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/cache/');
		//** un-comment the following line to show the debug console
		$this->smarty->debugging = false;
		$this->smarty->caching = false;
		$this->smarty->cache_lifetime = 0;
		if($user = $this->LoggedIn()){
			$actualRole = $this->getActualRoleName($user);
			$actualRole = $actualRole == null ? '':$actualRole;
			$this->smarty->assign('role',$actualRole);
		}

	}

	/**
	* @param array/string $roles
	* @return string $data
	* Validate perrmission by rolename
	*/
	protected function validatePersmission($roles)
	{
		$user = $this->LoggedIn();
		if($user != null){
			switch (gettype($roles)) {
				case 'string':
				if($roles == 'all')
					return;
				else{
					if($this->userInRole($user,$roles))
						return;
				}
				break;
				case 'array':
				foreach ($roles as $key => $value) {
					if($this->userInRole($user,$value))
						return;	
				}
				break;
				default:
				
				break;
			}
		}
		header('location: index.php'); 
	}
	

	/**
	* @param User $user
	* @param string $role
	* @return string $data
	* Validate perrmission by rolename
	*/
	protected function getActualRoleName($user)
	{
		require_once('models/RolesModel.php');
		$roles = new RolesModel();
		if(isset($_SESSION['actualRole']))
			return $_SESSION['actualRole'];
		$result = $roles->get('role',[['','id','=',$user->idRole]]);
		if(count($result) > 0)
			$_SESSION['actualRole'] = $result[0]['name']; 
		return $_SESSION['actualRole'];
		return null;
	}

	/**
	* @param User $user
	* @param string $role
	* @return string $data
	* Validate perrmission by rolename
	*/
	protected function userInRole($user, $role)
	{
		require_once('models/RolesModel.php');
		$roles = new RolesModel();
		$result = $roles->get('role',[['','name','=',$role]]);
		if(count($result) > 0)
			return $user->idRole == $result[0]['id']; 
		return false;
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
	function validateDate($date, $format = 'Y-m-d')
	{
    	$d = DateTime::createFromFormat($format, $date);
    	if ($d && $d->format($format) == $date)
    	{
    		return $date;
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
		require_once('database/User.php');
		$logged_user = isset($_SESSION['user'])?$_SESSION['user']:null;

		if($logged_user === null){
			$logged_user = isset($_COOKIE['user'])?json_decode($_COOKIE['user']):null;
		}
		return $logged_user;
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
		foreach ($array as &$valor)
		{
			$result[$valor[$key]] = $valor[$value]; 
		}
		return $result;
	}

	protected function massiveInsertion()
	{
		$data = array();
		if($_FILES['csv']['error'] == 0)
		{
			while(($row = fgetcsv($handle, 1000, ",")) !== FALSE)
			{
				$data[] = $row;
			}
		    //$name = $_FILES['csv']['name'];
			$tmp = explode('.', $_FILES['csv']['name']);
			$ext = strtolower(end($tmp));
			$type = $_FILES['csv']['type'];
			$tmpName = $_FILES['csv']['tmp_name'];
	    // check the file is a csv
			if($ext === 'csv')
			{
				$file = $_FILES['csv']['tmp_name']; 
				$handle = fopen($file,"r");

				if (($handle = fopen($file, "r")) !== FALSE)
				{
					while(($row = fgetcsv($handle, 1000, ",")) !== FALSE)
					{
						$data[] = $row;
					}
				}
				return $data;
			}
		}
	}
}
?>
