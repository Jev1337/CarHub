<?php
include_once "token.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\cart.php";

class cartC
{
  //check if cartid and idserv exists already or not
  public function existComboCartServ(int $cartid, int $idserv)
  {
    $sql = "SELECT * FROM cart WHERE cartid='$cartid' AND idserv='$idserv'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  //make user pay the cart
  public function paidCart(string $cartid)
  {
    $sql = "UPDATE cart SET isPaid='1', datepaid=CURDATE() WHERE cartid='$cartid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  //check if user has active carts from cin
  public function checkCartExistPerUser(string $cin)
  {
    $sql = "SELECT DISTINCT CT.CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin' AND isPaid='0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  //check if user has active or inactive carts from cin
  public function checkCartExistPerUserALL(string $cin)
  {
    $sql = "SELECT DISTINCT CT.CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function ActiveCartsCount(string $cin)
  {
    $sql = "SELECT CT.CARTID as CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin' AND isPaid='1'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function InActiveCartsCount(string $cin)
  {
    $sql = "SELECT CT.CARTID as CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin' AND isPaid='1'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  //get cartid from cin
  public function seekCartID(string $cin)
  {
    $sql = "SELECT DISTINCT CT.CARTID as CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin' AND isPaid='0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      return $res["CARTID"];
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  //get cart ID of active and all inactive carts using cin
  public function seekALLCartID(string $cin)
  {
    $sql = "SELECT DISTINCT CT.CARTID as CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  //check if cartid exists or not
  public function checkCartExist(int $cartid)
  {
    $sql = "SELECT * from cart where cartid = '$cartid' AND isPaid='0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      if ($query->rowCount() > 0) {
        return 1;
      } else {
        return 0;
      }
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  //-TEMP
  public function ServExistCart(int $idserv, $cartid)
  {
    $sql = "SELECT * from cart where cartid = '$cartid' AND isPaid='0' AND idserv <> '$idserv'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  //gets specific carts using specific cartid and serviceid
  public function ServRemExistCart(int $idserv, $cartid)
  {
    $sql = "SELECT * from cart where cartid = '$cartid' AND isPaid='0' AND idserv = '$idserv'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  //inserts cart as new cart()
  public function createCart($cart, int $isIDNULL)
  {
    if ($isIDNULL) {
      $sql = "INSERT INTO cart (idserv, carplate)
            VALUES (:idserv, :carplate)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "idserv" => $cart->getidserv(),
          "carplate" => $cart->getcarplate(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    } else {
      $sql = "INSERT INTO cart (cartid, idserv, carplate)
            VALUES (:cartid, :idserv, :carplate)";
      $db = config::getConnexion();
      try {
        $query = $db->prepare($sql);
        $query->execute([
          "cartid" => $cart->getcartid(),
          "idserv" => $cart->getidserv(),
          "carplate" => $cart->getcarplate(),
        ]);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
  //get active cart
  public function listCart($cartid)
  {
    $sql = "SELECT C.IDServ,DescServ,PriceServ,DurationServ from cart as C, service as S WHERE C.IDServ = S.IDServ AND cartid = '$cartid' AND isPaid=0";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();

      return $query;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  //delete item from active cart
  public function RemoveFromCart(int $idserv, int $cartid)
  {
    $sql = "DELETE FROM cart where idserv = '$idserv' AND cartid = '$cartid' AND isPaid='0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  //delete all items from active cart
  public function RemvoveActiveCart(int $cartid)
  {
    $sql = "DELETE FROM cart where cartid = '$cartid' AND isPaid='0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  //get cart list using cartid
  public function listALLCart($cartid)
  {
    $sql = "SELECT DescServ,PriceServ,DurationServ,isPaid,C.CarPlate from cart as C, service as S WHERE C.IDServ = S.IDServ AND cartid = '$cartid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function countServ($IDServ)
  {
    $sql = "SELECT * from cart  WHERE  IDServ = '$IDServ'";
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
