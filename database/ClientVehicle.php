<?php
  class ClientVehicle
  {
    public $idClient;
    public $idVehicle;
    
  function __construct($idClient, $idVehicle)
  {
    $this->idClient = $idClient;
    $this->idVehicle = $idVehicle;
  }
}
?>