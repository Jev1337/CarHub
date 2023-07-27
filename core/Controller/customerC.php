<?php
include_once "token.php";
include_once "userC.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\customer.php";
class customerC extends userC
{
  public function registerCustomer($customer)
  {
    $sql = "INSERT INTO user 
        VALUES (:cin, :email,:password, :contactnumber,:fullname,:address)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $customer->getCIN(),
        "email" => $customer->getemail(),
        "password" => $customer->getpassword(),
        "contactnumber" => $customer->getcontactnumber(),
        "fullname" => $customer->getfullname(),
        "address" => $customer->getaddress(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
    $sql = "INSERT INTO customer 
        VALUES (:cin, :amountPaid, :RegisterDate)";
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $customer->getCIN(),
        "amountPaid" => 0,
        "RegisterDate" => $customer->getregisterdate(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function ExistsAsCustomer(string $CIN)
  {
    $sql = "SELECT * from customer where CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function retrieveCustomer(string $CIN): customer
  {
    $sql = "SELECT * from user,customer where customer.CIN = user.CIN AND user.CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      $customer = new customer(
        $res["CIN"],
        $res["Email"],
        $res["Password"],
        $res["ContactNumber"],
        $res["FullName"],
        $res["Address"],
        $res["RegisterDate"]
      );
      return $customer;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function EmailExistsCustomer(string $email)
  {
    $sql = "SELECT * from customer,user where user.email= '$email' AND customer.CIN = user.CIN";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
}

?>
