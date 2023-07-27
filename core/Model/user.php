<?php
class user
{
  private string $CIN;
  private string $email;
  private string $password;
  private string $contactnumber;
  private string $fullname;
  private string $address;

  public function setCIN(string $CIN)
  {
    $this->CIN = $CIN;
  }
  public function setemail(string $email)
  {
    $this->email = $email;
  }
  public function setpassword(string $password)
  {
    $this->password = $password;
  }
  public function setcontactnumber(string $contactnumber)
  {
    $this->contactnumber = $contactnumber;
  }
  public function setfullname(string $fullname)
  {
    $this->fullname = $fullname;
  }
  public function setaddress(string $address)
  {
    $this->address = $address;
  }
  public function getCIN()
  {
    return $this->CIN;
  }
  public function getemail()
  {
    return $this->email;
  }
  public function getpassword()
  {
    return $this->password;
  }
  public function getcontactnumber()
  {
    return $this->contactnumber;
  }
  public function getfullname()
  {
    return $this->fullname;
  }
  public function getaddress()
  {
    return $this->address;
  }
}

?>
