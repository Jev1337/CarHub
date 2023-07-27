<?php
include_once "token.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\service.php";

class serviceC
{
  public function addService($service)
  {
    $sql = "INSERT INTO service 
       VALUES (:IDServ,:PriceServ,:DescServ, :DurationServ)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "IDServ" => $service->getid(),
        "PriceServ" => $service->getPriceServ(),
        "DescServ" => $service->getDescServ(),
        "DurationServ" => $service->getDurationServ(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function updateService($service)
  {
    $sql =
      "UPDATE service SET PriceServ=:PriceServ,DescServ=:DescServ, DurationServ=:DurationServ WHERE IDServ = :IDServ";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "IDServ" => $service->getid(),
        "PriceServ" => $service->getPriceServ(),
        "DescServ" => $service->getDescServ(),
        "DurationServ" => $service->getDurationServ(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function deleteService($IDServ)
  {
    $sql = "DELETE FROM service WHERE IDServ = :IDServ";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "IDServ" => $IDServ,
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allPlateUser(string $cin)
  {
    $sql = "SELECT carplate FROM car WHERE cin='$cin'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allPlateForSale()
  {
    $sql = "SELECT * FROM car WHERE SaleorRent=1";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allPlateForRent()
  {
    $sql = "SELECT carplate FROM car WHERE SaleorRent=0";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allService()
  {
    $sql = "SELECT * FROM service";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $service = $query->fetch();
      $res = [];
      for ($x = 0; $service; $x++) {
        $res[$x] = $service;
        $service = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function ServiceBySearch($search)
  {
    $sql = "SELECT * FROM service WHERE DescServ LIKE '%" . $search . "%'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $service = $query->fetch();
      $res = [];
      for ($x = 0; $service; $x++) {
        $res[$x] = $service;
        $service = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allServicePages($start, $rows, $search, $order, $orderBy)
  {
    if ($order) {
      $sql =
        "SELECT * FROM service WHERE DescServ LIKE '%" .
        $search .
        "%' ORDER BY $order $orderBy LIMIT $start , $rows";
    } else {
      $sql =
        "SELECT * FROM service WHERE DescServ LIKE '%" .
        $search .
        "%' LIMIT $start , $rows";
    }
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $service = $query->fetch();
      $res = [];
      for ($x = 0; $service; $x++) {
        $res[$x] = $service;
        $service = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function findService($IDServ)
  {
    $sql = "SELECT * FROM service WHERE IDServ = :IDServ";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "IDServ" => $IDServ,
      ]);
      $service = $query->fetch();

      return $service;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
