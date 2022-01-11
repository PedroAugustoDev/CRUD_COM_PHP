<?php

class User
{
  private int $id;

  public function __construct(
    public int $Old,
    public string $Oname,
    public string $Oemail,
    public string $Ophone,
    public string $Odocument,
    public string $Obirth_day
  ) {
    
  }

  public function getOld()
  {
    return $this->Old;
  }

  public function setOld($Old)
  {
    $this->Old = $Old;

    return $this;
  }

  public function getOname()
  {
    return $this->Oname;
  }
  public function setOname($Oname)
  {
    $this->Oname = $Oname;

    return $this;
  }

  public function getOemail()
  {
    return $this->Oemail;
  }

  public function setOemail($Oemail)
  {
    $this->Oemail = $Oemail;

    return $this;
  }

  public function getOphone()
  {
    return $this->Ophone;
  }


  public function setOphone($Ophone)
  {
    $this->Ophone = $Ophone;

    return $this;
  }

  public function getOdocument()
  {
    return $this->Odocument;
  }

  function setOdocument($Odocument)
  {
    $this->Odocument = $Odocument;
  }

  public function getObirth_day()
  {
    return $this->Obirth_day;
  }

  public function setObirth_day($Obirth_day)
  {
    $this->Obirth_day = $Obirth_day;
  }

  public function getId()
  {
    return $this->id;
  }

}
