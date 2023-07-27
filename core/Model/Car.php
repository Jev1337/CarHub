<?php
class car
{
  private string $CarPlate;
  private string $CIN;
  private string $ModelName;
  private int $ModelID;
  private string $Address;
  private float $Price;
  private int $isNew;
  private int $SaleorRent;
  private string $opt1;
  private string $opt2;
  private string $opt3;
  private string $opt4;

  public function __construct(
    string $CarPlate,
    string $CIN,
    string $ModelName,
    int $ModelID,
    string $Address,
    float $Price,
    int $isNew,
    int $SaleorRent,
    string $opt1,
    string $opt2,
    string $opt3,
    string $opt4
  ) {
    $this->CarPlate = $CarPlate;
    $this->CIN = $CIN;
    $this->ModelName = $ModelName;
    $this->ModelID = $ModelID;
    $this->Address = $Address;
    $this->Price = $Price;
    $this->isNew = $isNew;
    $this->SaleorRent = $SaleorRent;
    $this->opt1 = $opt1;
    $this->opt2 = $opt2;
    $this->opt3 = $opt3;
    $this->opt4 = $opt4;
  }

  public function setCarPlate(string $CarPlate)
  {
    $this->CarPlate = $CarPlate;
  }
  public function getCarPlate()
  {
    return $this->CarPlate;
  }

  public function setCIN(string $CIN)
  {
    $this->CIN = $CIN;
  }
  public function getCIN()
  {
    return $this->CIN;
  }

  public function setModelName(string $ModelName)
  {
    $this->ModelName = $ModelName;
  }
  public function getModelName()
  {
    return $this->ModelName;
  }

  public function setModelID(int $ModelID)
  {
    $this->ModelID = $ModelID;
  }
  public function getModelID()
  {
    return $this->ModelID;
  }

  public function setAddress(string $Address)
  {
    $this->Address = $Address;
  }
  public function getAddress()
  {
    return $this->Address;
  }

  public function setPrice(float $Price)
  {
    $this->Price = $Price;
  }
  public function getPrice()
  {
    return $this->Price;
  }

  public function setisNew(int $isNew)
  {
    $this->isNew = $isNew;
  }
  public function getisNew()
  {
    return $this->isNew;
  }

  public function setSaleorRent(int $SaleorRent)
  {
    $this->SaleorRent = $SaleorRent;
  }
  public function getSaleorRent()
  {
    return $this->SaleorRent;
  }

  public function setopt1(string $opt1)
  {
    $this->opt1 = $opt1;
  }
  public function getopt1()
  {
    return $this->opt1;
  }

  public function setopt2(string $opt2)
  {
    $this->opt2 = $opt2;
  }
  public function getopt2()
  {
    return $this->opt2;
  }

  public function setopt3(string $opt3)
  {
    $this->opt3 = $opt3;
  }
  public function getopt3()
  {
    return $this->opt3;
  }

  public function setopt4(string $opt4)
  {
    $this->opt4 = $opt4;
  }
  public function getopt4()
  {
    return $this->opt4;
  }
}

?>
