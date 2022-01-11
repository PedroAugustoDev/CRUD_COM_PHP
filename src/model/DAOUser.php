<?php
include_once('../model/database.php');
class DAOUser extends Database
{

  public function insert(User $user)
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
    $user_list = [];
    foreach($this->findAllDB($sql) as $user ){
      $newUser = new User($user[1], $user[2], $user[3], $user[4], $user[5], $user[6]);
      $newUser->setId($user[0]);
      array_push($user_list, $newUser);
    }
    return $user_list;
  }

  //demosntar a classe user para um array
  private function userToArray( $user ){
    $arrayobj = new ArrayObject($user);
    $arr = [];
    foreach( $arrayobj as $value) array_push($arr, $value);
    return $arr;
  }
}

?>