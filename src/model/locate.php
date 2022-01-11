<?php

  $address = ($_POST['address'] != '' ? $_POST['address'] : null);
  $num = ($_POST['number'] != '' ? $_POST['number'] : null);
  $comp = ($_POST['complemento'] != '' ? $_POST['complemento'] : null);
  $dis = ($_POST['distrito'] != '' ? $_POST['distrito'] : null);
  $est = ($_POST['estado'] != '' ? $_POST['estado'] : null);
  $fk_user = ($_POST['id'] != '' ? $_POST['id'] : null);
  

  $dates = [$address, $num, $com, $dis, $est];
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
    echo "dados válidos";
  }



?>