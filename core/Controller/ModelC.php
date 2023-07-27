<?php
include_once "token.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\Model.php";
class ModelC
{
  //Inserts a model as a model()
  public function CreateModel($Model)
  {
    $sql = "INSERT INTO model 
        VALUES (:ModelID, :Manufacturer,:HP,:kW,:Acceleration,:MaxSpeed,:InGearAccel,:Flex5Gear,:EngineLayout,:NumberOfCyl,:Displacement,:FuelConsumptUrb,:FuelConsumptNonUrb,:FuelConsumptComb,:CO2Emissions,:BodyLength,:BodyWidth,:BodyHeight,:UnladenWeightDin,:UnladenWeightEU,:DragCoefficientCd,:Overview,:TechSpecs,:TypeCar)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "ModelID" => $Model->getModelID(),
        "Manufacturer" => $Model->getManufacturer(),
        "HP" => $Model->getHP(),
        "kW" => $Model->getkW(),
        "Acceleration" => $Model->getAcceleration(),
        "MaxSpeed" => $Model->getMaxSpeed(),
        "InGearAccel" => $Model->getInGearAccel(),
        "Flex5Gear" => $Model->getFlex5Gear(),
        "EngineLayout" => $Model->getEngineLayout(),
        "NumberOfCyl" => $Model->getNumberOfCyl(),
        "Displacement" => $Model->getDisplacement(),
        "FuelConsumptUrb" => $Model->getFuelConsumptUrb(),
        "FuelConsumptNonUrb" => $Model->getFuelConsumptNonUrb(),
        "FuelConsumptComb" => $Model->getFuelConsumptComb(),
        "CO2Emissions" => $Model->getCO2Emissions(),
        "BodyLength" => $Model->getBodyLength(),
        "BodyWidth" => $Model->getBodyWidth(),
        "BodyHeight" => $Model->getBodyHeight(),
        "UnladenWeightDin" => $Model->getUnladenWeightDin(),
        "UnladenWeightEU" => $Model->getUnladenWeightEU(),
        "DragCoefficientCd" => $Model->getDragCoefficientCd(),
        "Overview" => $Model->getOverview(),
        "TechSpecs" => $Model->getTechSpecs(),
        "TypeCar" => $Model->getTypeCar(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function listModels()
  {
    $sql = "SELECT * FROM model";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $model = $query->fetch();
      $res = [];
      for ($x = 0; $model; $x++) {
        $res[$x] = $model;
        $model = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  public function findModel($ModelID)
  {
    $sql = "SELECT * FROM model WHERE ModelID = :ModelID";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "ModelID" => $ModelID,
      ]);
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  public function getModel($ModelID)
  {
    $sql = "SELECT * FROM model WHERE ModelID = :ModelID";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "ModelID" => $ModelID,
      ]);
      return $query->fetch();
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  public function getModelFromModelName($Manufacturer)
  {
    $sql = "SELECT * FROM model WHERE Manufacturer = :Manufacturer";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Manufacturer" => $Manufacturer,
      ]);
      return $query->fetch();
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  function UpdateModel($model)
  {
    try {
      $db = config::getConnexion();
      $query = $db->prepare(
        'UPDATE model SET 
                    Manufacturer = :Manufacturer, 
                    HP = :HP, 
                    kW = :kW,
                    Acceleration = :Acceleration,
                    MaxSpeed = :MaxSpeed,
                    InGearAccel = :InGearAccel,
                    Flex5Gear = :Flex5Gear,
                    EngineLayout = :EngineLayout,
                    NumberOfCyl = :NumberOfCyl,
                    Displacement = :Displacement,
                    FuelConsumptUrb = :FuelConsumptUrb,
                    FuelConsumptNonUrb = :FuelConsumptNonUrb,
                    FuelConsumptComb = :FuelConsumptComb,
                    CO2Emissions = :CO2Emissions,
                    BodyLength = :BodyLength,
                    BodyWidth = :BodyWidth,
                    BodyHeight = :BodyHeight,
                    UnladenWeightDin = :UnladenWeightDin,
                    UnladenWeightEU = :UnladenWeightEU,
                    DragCoefficientCd = :DragCoefficientCd,
                    Overview = :Overview,
                    TechSpecs = :TechSpecs,
                    TypeCar = :TypeCar
                WHERE ModelID= :ModelID'
      );
      $query->execute([
        "ModelID" => $model->getModelID(),
        "Manufacturer" => $model->getManufacturer(),
        "HP" => $model->getHP(),
        "kW" => $model->getkW(),
        "Acceleration" => $model->getAcceleration(),
        "MaxSpeed" => $model->getMaxSpeed(),
        "InGearAccel" => $model->getInGearAccel(),
        "Flex5Gear" => $model->getFlex5Gear(),
        "EngineLayout" => $model->getEngineLayout(),
        "NumberOfCyl" => $model->getNumberOfCyl(),
        "Displacement" => $model->getDisplacement(),
        "FuelConsumptUrb" => $model->getFuelConsumptUrb(),
        "FuelConsumptNonUrb" => $model->getFuelConsumptNonUrb(),
        "FuelConsumptComb" => $model->getFuelConsumptComb(),
        "CO2Emissions" => $model->getCO2Emissions(),
        "BodyLength" => $model->getBodyLength(),
        "BodyWidth" => $model->getBodyWidth(),
        "BodyHeight" => $model->getBodyHeight(),
        "UnladenWeightDin" => $model->getUnladenWeightDin(),
        "UnladenWeightEU" => $model->getUnladenWeightEU(),
        "DragCoefficientCd" => $model->getDragCoefficientCd(),
        "Overview" => $model->getOverview(),
        "TechSpecs" => $model->getTechSpecs(),
        "TypeCar" => $model->getTypeCar(),
      ]);
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  function DeleteModel($ModelID)
  {
    $sql = "DELETE FROM model WHERE ModelID = :ModelID";
    $db = config::getConnexion();
    try {
      $req = $db->prepare($sql);
      $req->bindValue(":ModelID", $ModelID);
      $req->execute();
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }
}

?>
