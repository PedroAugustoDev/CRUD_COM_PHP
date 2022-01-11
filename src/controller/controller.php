<?php 
  header('Content-Type: application/json; charset=utf-8');
  $METHOD = $_SERVER['REQUEST_METHOD'];

  require_once("../model/DAOUser.php");
  $var = new DAOUser();
  $arr_param = new ArrayObject($_POST);


  if($METHOD == "DELETE"){
   $id = $_GET['id'];
   $var->delete($id);
  } else if($METHOD == "UPDATE"){

  } else if($METHOD == "GET"){
    header("location: ../view/index.php");
  }
  else header("location: ../view/index.php");

?>