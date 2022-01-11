<?php
require_once('../model/connection.php');
class Database {
  protected $con;
  private $pdo;

  public function __construct() {
    $this->con = new Connection();
    $this->pdo = $this->con->getConnection();
   
  }

  protected function insertDB($sql, $values){
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($values);
  }

  protected function deleteDB($sql, $id){
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$id]);
  }

  protected function findAllDB($sql)
  {
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  
}


?>