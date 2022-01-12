<?php
include_once('../model/database.php');
include_once('../model/DAOAddress.php');
include('../model/UserAddress.php');

class DAOAddress extends Database
{

  public function insert(UserAddress $adress)
  {
    if( $adress != null ){
      $arrayobj = new ArrayObject($adress);
      $numparams = "";
      for ($i = 0; $i < $arrayobj->count(); $i++) $numparams .= ",?";
      $numparams = substr($numparams, 1);
      $sql = "INSERT INTO user_address VALUES (DEFAULT, $numparams)";
      $this->insertDB($sql, $this->userToArray($adress));
    }
  }

  public function findAll()
  {
    $sql = "SELECT * FROM user_address";
    $adressList = [];
    foreach($this->findAllDB($sql) as $date ){
      $newAddress = new UserAddress($date[1], $date[2], $date[3], $date[4], $date[5], $date[6],$date[7]);
      $newAddress->id = $date[0];
      array_push($adressList, $newAddress);
    }
    return $adressList;
  }

 
  private function userToArray( $address ){
    $arrayobj = new ArrayObject($address);
    $arr = [];
    foreach( $arrayobj as $value) array_push($arr, $value);
    return $arr;
  }
}

?>