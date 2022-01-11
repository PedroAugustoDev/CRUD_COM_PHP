<?php
include_once('../model/database.php');
class DAOUser extends Database
{

  public function insert($user)
  {
    if( $user != null ){
      $arrayobj = new ArrayObject($user);
      $numparams = "";
      for ($i = 0; $i < $arrayobj->count(); $i++) $numparams .= ",?";
      $numparams = substr($numparams, 1);
      $sql = "INSERT INTO user VALUES (DEFAULT, $numparams)";
      $this->insertDB($sql, $this->userToArray($user));
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM USER WHERE ID = ? ";
    $this->deleteDB($sql, $id);
  }

  public function findAll()
  {
    $sql = "SELECT * FROM user";
    return $this->findAllDB($sql);
  }

  private function userToArray( $user ){
    $arrayobj = new ArrayObject($user);
    $arr = [];
    foreach( $arrayobj as $value) array_push($arr, $value);
    return $arr;
  }
}




?>