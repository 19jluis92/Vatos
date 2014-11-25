<?php
require_once('models/Model.php');
require_once('database/ClientVehicle.php');
Class ClientVehiclesModel extends Model
{
  private $id;
  private $idClient;

  function __construct(){
    parent::__construct();
  }

  function all(){
    return $this->db->all('clientvehicle');
  }
  /**
  *method for create new ClientVehicle (required on vehicles) 
  *@param string $name
  * @return bool transaction result
  */
  function create($idClient,$id)
  {
    $ClientVehicle = new ClientVehicle($id, $idClient);
    if($result = $this->db->insert('clientvehicle' , $ClientVehicle,NULL))
    {
      return $result;
    }
    else
    {
      return false;
    }
  }

  function clientVehicles()
  {
    
  }
}
?>
