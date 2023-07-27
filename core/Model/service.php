<?php
class service
{
  private int $IDServ;
  private float $PriceServ;
  private string $DescServ;
  private $DurationServ;

  public function __construct(
    int $IDServ,
    float $PriceServ,
    string $DescServ,
    string $DurationServ
  ) {
    $this->IDServ = $IDServ;
    $this->PriceServ = $PriceServ;
    $this->DescServ = $DescServ;
    $this->DurationServ = $DurationServ;
  }

  public function setid(string $IDServ)
  {
    $this->IDServ = $IDServ;
  }
  public function setPriceService(string $PriceServ)
  {
    $this->PriceServ = $PriceServ;
  }
  public function setDescServ(string $DescServ)
  {
    $this->DescServ = $DescServ;
  }
  public function setDurationServ(string $DurationServ)
  {
    $this->DurationServ = $DurationServ;
  }

  public function getid()
  {
    return $this->IDServ;
  }
  public function getPriceServ()
  {
    return $this->PriceServ;
  }
  public function getDescServ()
  {
    return $this->DescServ;
  }
  public function getDurationServ()
  {
    return $this->DurationServ;
  }
}

?>
