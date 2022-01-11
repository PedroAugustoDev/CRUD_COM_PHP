<?php 
  header('Content-Type: application/json; charset=utf-8');
  require_once("../model/DAOUser.php");
  include('../model/user.php');

  $age = ($_POST['Oage'] != '' ? $_POST['Oage'] : null);
  $name = ($_POST['Oname'] != '' ? $_POST['Oname'] : null);
  $mail = ($_POST['Oemail'] != '' ? $_POST['Oemail'] : null);
  $phone = ($_POST['Ophone'] != '' ? $_POST['Ophone'] : null);
  $doc = ($_POST['Odocument'] != '' ? $_POST['Odocument'] : null);
  $date = ($_POST['Obirth_day'] != '' ? $_POST['Obirth_day'] : null);

  $str_params = [$age, $name, $mail, $phone, $doc, $date];

  function validate(array $vars)
  { 
    foreach( $vars as $data )
      if(empty($data) || $data == null || trim(strlen($data)) == 1) return false;
    
    if(!validateMail($vars[2])) return false; //validar email
    if(strlen($vars[4]) <= 10) return false; //validar cpf por tamanho
    return true;
  }

  function validateMail(string $mail){
    return filter_var($mail, FILTER_VALIDATE_EMAIL);
  }

  if(validate($str_params)){
    $var = new DAOUser();
    $user = new User($age, $name, $mail, $phone, $doc, $date);
    $var->insert($user);
  }

  header('location: ../view/index.php');

?>