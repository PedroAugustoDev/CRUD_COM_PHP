<?php 

  header('Content-Type: application/json; charset=utf-8');
  $METHOD = $_SERVER['REQUEST_METHOD'];
  require_once("../model/DAOUser.php");

  //implementação de um controller apenas para 
  //o método delete
  //sem a implementção do método POST aqui pois 
  //os dados a serem persistidos serão tradados no arquivo form.php
  if($METHOD == "DELETE"){
    $var = new DAOUser();
    $id = $_GET['id'];
    $var->delete($id);
  } else header("location: ../view/index.php");


?>