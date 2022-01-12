<?php 
  include_once('../model/DAOAddress.php');
  header('Cache-Control: no-cache, must-revalidate'); 
  header('Content-Type: application/json; charset=utf-8');

  $address = ($_POST['address'] != '' ? $_POST['address'] : null);
  $num = ($_POST['number'] != '' ? $_POST['number'] : null);
  $comp = ($_POST['complemento'] != '' ? $_POST['complemento'] : null);
  $dis = ($_POST['distrito'] != '' ? $_POST['distrito'] : null);
  $est = ($_POST['estado'] != '' ? $_POST['estado'] : null);
  $city = ($_POST['cidade'] != '' ? $_POST['cidade'] : null);
  $fk_user = ($_POST['fk_id'] != '' ? $_POST['fk_id'] : null);

  
  $dates = [$address, $num, $comp, $dis, $est];
  function validate(array $arrayInfos )
  {
    foreach($arrayInfos as $value){
      if(empty(trim($value)) || strlen($value) <= 1 || $value == null) {
        echo "inválidos";
        return false;
      }
    }
    return true;
  }

  if(validate($dates)){
    $address = new UserAddress($fk_user, $address, $city, $est, $dis, $num, $comp );
    $var = new DAOAddress();
    $var->insert($address);
    header('location: ../view/index.php');
  } else echo "Ocorreu um erro";

?>