<?php
include_once "user.php";
class customer extends user
{
  private float $amountpaid;
  private string $registerdate;
  public function __construct(
    string $CIN,
    string $email,
    string $password,
    string $contactnumber,
    string $fullname,
    string $address
  ) {
    $this->CIN = $this->setCIN($CIN);
    $this->email = $this->setemail($email);
    $this->password = $this->setpassword($password);
    $this->contactnumber = $this->setcontactnumber($contactnumber);
    $this->fullname = $this->setfullname($fullname);
    $this->address = $this->setaddress($address);
    $this->registerdate = date("Y/m/d");
  }
  public function getregisterdate()
  {
    return $this->registerdate;
  }
}

?>
