<?php
class comments
{
  private string $Title;
  private $CIN;
  private $Content;

  public function __construct(
    string $Title,
    $CIN,
    $Content
  ) {
    $this->Title = $Title;
    $this->CIN = $CIN;
    $this->Content = $Content;
  }
  
  public function getTittle(){
    return $this->Title;
  }
  public function getCIN(){
    return $this->CIN;
  }
  public function getContent(){
    return $this->Content;
  }

  public function setTitle($Title){
    $this->Title = $Title;
  }
  public function setCIN($CIN){
    $this->CIN = $CIN;
  }
  public function setContent($Content){
    $this->Content = $Content;
  }
}
