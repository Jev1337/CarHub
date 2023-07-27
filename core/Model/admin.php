<?php
include_once "user.php";
class administrativestaff extends user
{
  private float $salary;
  private string $qualification;
  private string $hiredate;
  public function __construct(
    string $CIN,
    string $email,
    string $password,
    string $contactnumber,
    string $fullname,
    string $address,
    string $salary,
    string $qualification
  ) {
    $this->CIN = $this->setCIN($CIN);
    $this->email = $this->setemail($email);
    $this->password = $this->setpassword($password);
    $this->contactnumber = $this->setcontactnumber($contactnumber);
    $this->fullname = $this->setfullname($fullname);
    $this->address = $this->setaddress($address);
    $this->qualification = $qualification;
    $this->salary = $salary;
    $this->hiredate = date("Y/m/d");
  }
}

?>
