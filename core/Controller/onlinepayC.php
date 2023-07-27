<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\config.php";
class onlinepayC
{
  public function checkTransactionExist(string $transactionid)
  {
    $sql = "SELECT * from transaction where transactionid = '$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount() > 0;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function checkCardExists(string $transactionid)
  {
    $sql = "SELECT * from onlinepay where transactionid = '$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  
  public function getTransactionID(string $cin)
  {
    $sql = "SELECT O.TransactionID FROM (SELECT DISTINCT CT.CARTID as CARTID FROM cart as CT,car as CR WHERE CR.carplate = CT.carplate AND CR.CIN = '$cin') as R, transaction as T, onlinepay as O WHERE R.CARTID = T.CartID AND O.TransactionID = T.TransactionID";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      return $res["TransactionID"];
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function addCard($card)
  {
    $sql = "INSERT INTO OnlinePay
        VALUES (:transactionid, :PayPalTransactionID,:PayPalUserID)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "transactionid" => $card->gettransactionid(),
        "PayPalTransactionID" => $card->getPayPalTransactionID(),
        "PayPalUserID" => $card->getPayPalUserID()
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function retrievePayPalTransactionID($transactionid)
  {
    $sql = "SELECT PayPalTransactionID from onlinepay where transactionid = '$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      return $res['PayPalTransactionID'];
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function retrievePayPalUserID($transactionid)
  {
    $sql = "SELECT PayPalUserID from onlinepay where transactionid = '$transactionid'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      return $res['PayPalUserID'];
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
