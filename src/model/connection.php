<?php
  class Connection {
    private $SERVER_NAME = "127.0.0.1";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DATABASE_NAME = "teste_php";
    private $connection;

    public function __construct() {
      try {
        $pdo = new PDO("mysql:host=$this->SERVER_NAME;dbname=$this->DATABASE_NAME;", $this->USERNAME, $this->PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection = $pdo;
      } catch (\Throwable $th) {
        echo "erro ao conectar com o banco de dados...";
      }
  
    } 

    public function getConnection()
    {
      return $this->connection;
    }
  }

?>
