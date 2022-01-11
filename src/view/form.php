<?php 
  header('Content-Type: application/json; charset=utf-8');
  require_once("../model/DAOUser.php");
  $var = new DAOUser();
  $arr_param = new ArrayObject($_POST);
  $var->insert($arr_param);

  header('location: ./index.php');

?>