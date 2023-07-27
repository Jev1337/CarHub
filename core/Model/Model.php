<?php
class model
{
  private $ModelID;
  private string $Manufacturer;
  private int $HP;
  private int $kW;
  private float $Acceleration;
  private float $MaxSpeed;
  private float $InGearAccel;
  private float $Flex5Gear;
  private string $EngineLayout;
  private int $NumberOfCyl;
  private float $Displacement;
  private float $FuelConsumptUrb;
  private float $FuelConsumptNonUrb;
  private float $FuelConsumptComb;
  private float $CO2Emissions;
  private float $BodyLength;
  private float $BodyWidth;
  private float $BodyHeight;
  private float $UnladenWeightDin;
  private float $UnladenWeightEU;
  private float $DragCoefficientCd;
  private string $Overview;
  private string $TechSpecs;
  private string $TypeCar;

  public function __construct(
    $ModelID,
    string $Manufacturer,
    int $HP,
    int $kW,
    float $Acceleration,
    float $MaxSpeed,
    float $InGearAccel,
    float $Flex5Gear,
    string $EngineLayout,
    int $NumberOfCyl,
    float $Displacement,
    float $FuelConsumptUrb,
    float $FuelConsumptNonUrb,
    float $FuelConsumptComb,
    float $CO2Emissions,
    float $BodyLength,
    float $BodyWidth,
    float $BodyHeight,
    float $UnladenWeightDin,
    float $UnladenWeightEU,
    float $DragCoefficientCd,
    string $Overview,
    string $TechSpecs,
    string $TypeCar
  ) {
    $this->ModelID = $ModelID;
    $this->Manufacturer = $Manufacturer;
    $this->HP = $HP;
    $this->kW = $kW;
    $this->Acceleration = $Acceleration;
    $this->MaxSpeed = $MaxSpeed;
    $this->InGearAccel = $InGearAccel;
    $this->Flex5Gear = $Flex5Gear;
    $this->EngineLayout = $EngineLayout;
    $this->NumberOfCyl = $NumberOfCyl;
    $this->Displacement = $Displacement;
    $this->FuelConsumptUrb = $FuelConsumptUrb;
    $this->FuelConsumptNonUrb = $FuelConsumptNonUrb;
    $this->FuelConsumptComb = $FuelConsumptComb;
    $this->CO2Emissions = $CO2Emissions;
    $this->BodyLength = $BodyLength;
    $this->BodyWidth = $BodyWidth;
    $this->BodyHeight = $BodyHeight;
    $this->UnladenWeightDin = $UnladenWeightDin;
    $this->UnladenWeightEU = $UnladenWeightEU;
    $this->DragCoefficientCd = $DragCoefficientCd;
    $this->Overview = $Overview;
    $this->TechSpecs = $TechSpecs;
    $this->TypeCar = $TypeCar;
  }

  public function setModelID(int $ModelID)
  {
    $this->ModelID = $ModelID;
  }
  public function getModelID()
  {
    return $this->ModelID;
  }

  public function setManufacteurer(string $Manufacturer)
  {
    $this->Manufacturer = $Manufacturer;
  }
  public function getManufacturer()
  {
    return $this->Manufacturer;
  }

  public function setHP(int $HP)
  {
    $this->HP = $HP;
  }
  public function getHP()
  {
    return $this->HP;
  }

  public function setkW(int $kW)
  {
    $this->kW = $kW;
  }
  public function getkW()
  {
    return $this->kW;
  }

  public function setAcceleration(float $Acceleration)
  {
    $this->Acceleration = $Acceleration;
  }
  public function getAcceleration()
  {
    return $this->Acceleration;
  }

  public function setMaxSpeed(float $MaxSpeed)
  {
    $this->MaxSpeed = $MaxSpeed;
  }
  public function getMaxSpeed()
  {
    return $this->MaxSpeed;
  }

  public function setInGearAccel(float $InGearAccel)
  {
    $this->InGearAccel = $InGearAccel;
  }
  public function getInGearAccel()
  {
    return $this->InGearAccel;
  }

  public function setFlex5Gear(float $Flex5Gear)
  {
    $this->Flex5Gear = $Flex5Gear;
  }
  public function getFlex5Gear()
  {
    return $this->Flex5Gear;
  }

  public function setEngineLayout(string $EngineLayout)
  {
    $this->EngineLayout = $EngineLayout;
  }
  public function getEngineLayout()
  {
    return $this->EngineLayout;
  }

  public function setNumberOfCyl(int $NumberOfCyl)
  {
    $this->NumberOfCyl = $NumberOfCyl;
  }
  public function getNumberOfCyl()
  {
    return $this->NumberOfCyl;
  }

  public function setDisplacement(float $Displacement)
  {
    $this->opt2 = $Displacement;
  }
  public function getDisplacement()
  {
    return $this->Displacement;
  }

  public function setFuelConsumptUrb(float $FuelConsumptUrb)
  {
    $this->FuelConsumptUrb = $FuelConsumptUrb;
  }
  public function getFuelConsumptUrb()
  {
    return $this->FuelConsumptUrb;
  }

  public function setFuelConsumptNonUrb(float $FuelConsumptNonUrb)
  {
    $this->FuelConsumptNonUrb = $FuelConsumptNonUrb;
  }
  public function getFuelConsumptNonUrb()
  {
    return $this->FuelConsumptNonUrb;
  }

  public function setFuelConsumptComb(float $FuelConsumptComb)
  {
    $this->FuelConsumptComb = $FuelConsumptComb;
  }
  public function getFuelConsumptComb()
  {
    return $this->FuelConsumptComb;
  }

  public function setCO2Emissions(float $CO2Emissions)
  {
    $this->CO2Emissions = $CO2Emissions;
  }
  public function getCO2Emissions()
  {
    return $this->CO2Emissions;
  }

  public function setBodyLength(float $BodyLength)
  {
    $this->BodyLength = $BodyLength;
  }
  public function getBodyLength()
  {
    return $this->BodyLength;
  }

  public function setBodyWidth(float $BodyWidth)
  {
    $this->BodyWidth = $BodyWidth;
  }
  public function getBodyWidth()
  {
    return $this->BodyWidth;
  }

  public function setBodyHeight(float $BodyHeight)
  {
    $this->BodyHeight = $BodyHeight;
  }
  public function getBodyHeight()
  {
    return $this->BodyHeight;
  }

  public function setUnladenWeightDin(float $UnladenWeightDin)
  {
    $this->UnladenWeightDin = $UnladenWeightDin;
  }
  public function getUnladenWeightDin()
  {
    return $this->UnladenWeightDin;
  }

  public function setUnladenWeightEU(float $UnladenWeightEU)
  {
    $this->UnladenWeightEU = $UnladenWeightEU;
  }
  public function getUnladenWeightEU()
  {
    return $this->UnladenWeightEU;
  }

  public function setDragCoefficientCd(float $DragCoefficientCd)
  {
    $this->DragCoefficientCd = $DragCoefficientCd;
  }
  public function getDragCoefficientCd()
  {
    return $this->DragCoefficientCd;
  }

  public function setOverview(string $Overview)
  {
    $this->Overview = $Overview;
  }
  public function getOverview()
  {
    return $this->Overview;
  }

  public function setTechSpecs(string $TechSpecs)
  {
    $this->TechSpecs = $TechSpecs;
  }
  public function getTechSpecs()
  {
    return $this->TechSpecs;
  }

  public function setTypeCar(string $TypeCar)
  {
    $this->TypeCar = $TypeCar;
  }
  public function getTypeCar()
  {
    return $this->TypeCar;
  }
}

?>
