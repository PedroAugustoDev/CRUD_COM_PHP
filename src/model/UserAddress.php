<?php

 # no getter and setter

class UserAddress {
  public int $id;
  public function __construct(
    public string $pk,
    public string $OAddress,
    public string $Ocity,
    public string $Ostate,
    public string $Odistrict,
    public int $Onumber, 
    public string $Ocomplement,
  ) {}
}

?>