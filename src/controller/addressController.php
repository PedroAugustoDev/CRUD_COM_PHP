<?php 
  include('../model/UserAddress.php');
  header('Cache-Control: no-cache, must-revalidate'); 
  header('Content-Type: application/json; charset=utf-8');
  $aDados = json_decode($_GET['body'], true); 

  $address = ($aDados['address'] != '' ? $aDados['address'] : null);
  $num = ($aDados['number'] != '' ? $aDados['number'] : null);
  $comp = ($aDados['complemento'] != '' ? $aDados['complemento'] : null);
  $dis = ($aDados['distrito'] != '' ? $aDados['distrito'] : null);
  $est = ($aDados['estado'] != '' ? $aDados['estado'] : null);
  $city = ($aDados['cidade'] != '' ? $aDados['cidade'] : null);
  $fk_user = ($_GET['id'] != '' ? $_GET['id'] : null);
  

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
    $address = new UserAddress($address, $num, $comp, $dis, $city, $est);

  }
  


?>