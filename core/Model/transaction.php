<?php
class transaction
{
  private string $transactionID;
  private string $cartID;
  private string $status;

  public function __construct(int $transactionID, int $cartID)
  {
    $this->transactionID = $transactionID;
    $this->cartID = $cartID;
    $this->status = "Pending Payment";
  }
  public function settransactionID(int $transactionID)
  {
    $this->transactionID = $transactionID;
  }
  public function setcartID(string $cartID)
  {
    $this->cartID = $cartID;
  }
  public function setstatus(string $status)
  {
    $this->status = $status;
  }
  public function gettransactionID()
  {
    return $this->transactionID;
  }
  public function getcartID()
  {
    return $this->cartID;
  }
  public function getstatus()
  {
    return $this->status;
  }
}

?>
