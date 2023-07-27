<?php
class cart
{
  private string $cartid;
  private string $idserv;
  private string $carplate;
  private string $datepaid;
  private int $ispaid;

  public function __construct($cartid, string $idserv, string $carplate)
  {
    $this->cartid = $cartid;
    $this->idserv = $idserv;
    $this->carplate = $carplate;
    $this->datepaid = "0000-00-00";
    $this->ispaid = 0;
  }

  public function setcartid(string $cartid)
  {
    $this->cartid = $cartid;
  }
  public function setidserv(string $idserv)
  {
    $this->idserv = $idserv;
  }
  public function setcarplate(string $carplate)
  {
    $this->carplate = $carplate;
  }
  public function setdatepaid(string $datepaid)
  {
    $this->datepaid = $datepaid;
  }
  public function setispaid(string $ispaid)
  {
    $this->ispaid = $ispaid;
  }

  public function getcartid()
  {
    return $this->cartid;
  }
  public function getidserv()
  {
    return $this->idserv;
  }
  public function getcarplate()
  {
    return $this->carplate;
  }
  public function getdatepaid()
  {
    return $this->datepaid;
  }
  public function getispaid()
  {
    return $this->ispaid;
  }
}

?>
