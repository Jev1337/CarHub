

<?php 
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\config.php";
class userC
{
  public function countUser()
  {
    $sql = "SELECT * from customer";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function DeleteUser(string $CIN)
  {
    $sql = "DELETE FROM user where CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function updateUser($user)
  {
    $sql = "UPDATE user 
        SET email = :email, contactnumber=:contactnumber,fullname=:fullname,address=:address WHERE cin=:cin";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $user->getCIN(),
        "email" => $user->getemail(),
        "contactnumber" => $user->getcontactnumber(),
        "fullname" => $user->getfullname(),
        "address" => $user->getaddress(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function updateUserPW($user)
  {
    $sql = "UPDATE user 
        SET password=:password WHERE cin=:cin";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $user->getCIN(),
        "password" => $user->getpassword(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function Exists($user)
  {
    $sql =
      "SELECT * from user where CIN = :cin OR email= :email OR contactnumber=:contactnumber";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $user->getCIN(),
        "email" => $user->getemail(),
        "contactnumber" => $user->getcontactnumber(),
      ]);
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function ExistsUpdt($user)
  {
    $sql =
      "SELECT * from user where CIN<>:cin AND (email= :email OR contactnumber=:contactnumber)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $user->getCIN(),
        "email" => $user->getemail(),
        "contactnumber" => $user->getcontactnumber(),
      ]);
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function ExistsEmail(string $email)
  {
    $sql = "SELECT * from user where email = '$email'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function ResetExistsUsingCIN(string $CIN)
  {
    $sql = "SELECT * from passwordreset where CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getCINfromAUTH(string $token)
  {
    $sql = "SELECT CIN from passwordreset where authcode = '$token'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetch()["CIN"];
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getCINfromEMAIL(string $email)
  {
    $sql = "SELECT CIN from user where email = '$email'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetch()["CIN"];
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function getNAMEfromEMAIL(string $email)
  {
    $sql = "SELECT FULLNAME from user where email = '$email'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetch()["FULLNAME"];
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function getEMAILfromTOKEN(string $token)
  {
    $sql = "SELECT email from user U, passwordreset P where P.CIN = U.CIN AND authcode = '$token'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetch()["email"];
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function random_str(
    int $length = 64,
    string $keyspace = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
  ): string {
    if ($length < 1) {
      throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, "8bit") - 1;
    for ($i = 0; $i < $length; ++$i) {
      $pieces[] = $keyspace[random_int(0, $max)];
    }
    return implode("", $pieces);
  }


  public function CheckResetExistance(string $CIN)
  {
    $sql = "SELECT * FROM passwordreset WHERE CIN='$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function CheckReset(string $token)
  {
    $sql = "SELECT * FROM passwordreset WHERE authcode='$token' AND ExpiryDate >= CURDATE()";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }


  public function DeleteReset(string $CIN)
  {
    $sql = "DELETE FROM passwordreset WHERE CIN='$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function setForgotPasswordAuthCode(string $CIN)
  {
    $str = $this->random_str(128);
    $date = date("Y-m-d", time() + 86400);
    $sql = "INSERT INTO passwordreset VALUES ('$CIN', '$str', '$date')";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $str;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }



  public function ExistsCIN(string $cin)
  {
    $sql = "SELECT * from user where CIN = '$cin'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function Verify(string $passwordFromPost, string $email)
  {
    $sql = "SELECT password,CIN from user where email= '$email'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $hashedPasswordFromDB = $query->fetch();
      if (
        password_verify($passwordFromPost, $hashedPasswordFromDB["password"])
      ) {
        $token = new token();
        $token->remember_me($hashedPasswordFromDB["CIN"]);
      }
      return password_verify(
        $passwordFromPost,
        $hashedPasswordFromDB["password"]
      );
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
}

?>
