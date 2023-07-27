<?php
include_once "token.php";
include_once "userC.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\admin.php";
class adminC extends userC
{
  public function ExistsAsAdmin(string $CIN)
  {
    $sql = "SELECT * from administrativestaff where CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function retrieveAdmin(string $CIN): administrativestaff
  {
    $sql = "SELECT * from user,administrativestaff where administrativestaff.CIN = user.CIN AND user.CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      $admin = new administrativestaff(
        $res["CIN"],
        $res["Email"],
        $res["Password"],
        $res["ContactNumber"],
        $res["FullName"],
        $res["Address"],
        $res["Salary"],
        $res["Qualification"]
      );
      return $admin;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function EmailExistsAdmin(string $email)
  {
    $sql = "SELECT * from administrativestaff,user where user.email= '$email' AND administrativestaff.CIN = user.CIN";
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
