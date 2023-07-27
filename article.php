<?php
class article
{
  private string $Title;
  private string $Description;
  private $ExpiryDate;
  private $CIN;
  private $Views;

  public function __construct(
    string $Title,
    string $Description,
    $ExpiryDate,
    $CIN,
    $Views
  ) {
    $this->Title = $Title;
    $this->CIN = $CIN;
    $this->Description = $Description;
    $this->ExpiryDate = $ExpiryDate;
    $this->Views = $Views;
  }
  
  public function getTittle(){
    return $this->Title;
  }
  public function getDescription(){
    return $this->Description;
  }
  public function getExpiryDate(){
    return $this->ExpiryDate;
  }
  public function getCIN(){
    return $this->CIN;
  }
  public function getViews(){
    return $this->Views;
  }

  public function setTitle($Title){
    $this->Title = $Title;
  }
  public function setCIN($CIN){
    $this->CIN = $CIN;
  }
  public function setDescription($Description){
    $this->Description = $Description;
  }
  public function setExpiryDate($ExpiryDate){
    $this->ExpiryDate = $ExpiryDate;
  }
  public function setViews($Views){
    $this->Views = $Views;
  }
}
