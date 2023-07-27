<?php
class onlinepay
{
  private string $transactionID;
  private string $PayPalTransactionID;
  private string $PayPalUserID;


  public function __construct(
    string $transactionID,
    string $PayPalTransactionID,
    string $PayPalUserID,
  ) {
    $this->transactionID = $transactionID;
    $this->PayPalTransactionID = $PayPalTransactionID;
    $this->PayPalUserID = $PayPalUserID;
  }
  public function settransactionID(int $transactionID)
  {
    $this->transactionID = $transactionID;
  }
  public function setPayPalTransactionID(string $PayPalTransactionID)
  {
    $this->PayPalTransactionID = $PayPalTransactionID;
  }
  public function setPayPalUserID(string $PayPalUserID)
  {
    $this->PayPalUserID = $PayPalUserID;
  }


  public function gettransactionID()
  {
    return $this->transactionID;
  }
  public function getPayPalTransactionID()
  {
    return $this->PayPalTransactionID;
  }
  public function getPayPalUserID()
  {
    return $this->PayPalUserID;
  }

}

?>
