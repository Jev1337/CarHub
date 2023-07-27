<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\config.php";
class transactionC
{

  public function countOnlineTransaction()
  {
    $sql = "SELECT * FROM transaction T, onlinepay O WHERE O.transactionID = T.transactionID";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function countPendingTransaction()
  {
    $sql = "SELECT * FROM transaction WHERE Status LIKE 'Pending'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }


  public function getOnlineTransaction()
  {
    $sql = "SELECT T.* FROM transaction T, onlinepay O WHERE O.transactionID = T.transactionID";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function countOfflineTransaction()
  {
    $sql = "SELECT * FROM transaction t1 WHERE NOT EXISTS(SELECT NULL FROM onlinepay t2 WHERE t2.TransactionID = t1.TransactionID)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function getOfflineTransaction()
  {
    $sql = "SELECT t1.* FROM transaction t1 WHERE NOT EXISTS(SELECT NULL FROM onlinepay t2 WHERE t2.TransactionID = t1.TransactionID)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function getCINFromTransaction($transactionid){
    $sql = "SELECT DISTINCT CIN from transaction T, cart C, Car CR WHERE CR.carplate = C.carplate AND C.cartID = T.cartID AND transactionID= '$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetch()['CIN'];
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

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
  public function transactUser($transaction)
  {
    $sql = "INSERT INTO transaction (cartid, status)
        VALUES (:cartid, :status)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cartid" => $transaction->getcartid(),
        "status" => $transaction->getstatus(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function retrieveTransactionID(string $cartid)
  {
    $sql = "SELECT transactionid FROM transaction WHERE cartid='$cartid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      return $res["transactionid"];
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function paidTransaction(string $transactionid)
  {
    $sql = "UPDATE transaction SET status='Paid' WHERE transactionID='$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
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

  public function deleteTransaction(string $transactionid)
  {
    $sql = "DELETE FROM transaction WHERE transactionID='$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function showTransaction()
  {
    $sql = "SELECT * FROM transaction";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function TransactionExist(string $cartid)
  {
    $sql = "SELECT * FROM transaction WHERE cartid='$cartid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
