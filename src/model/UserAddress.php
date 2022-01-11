<?php

 # no getter and setter

class UserAddress
{
  public int $id;
  public function __construct(
    public string $OAddress,
    public int $Onumber,
    public string $Ocomplement,
    public string $Odistrict,
    public string $Ocity,
    public string $Ostate
  ) {}
}

?>