<?php
include_once "token.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\Car.php";
class CarC
{
  public function CreateCar($Car)
  {
    $sql = "INSERT INTO car 
        VALUES (:CarPlate, :CIN,:ModelName,:ModelID,:Address,:Price,:isNew,:SaleorRent,:opt1,:opt2,:opt3,:opt4)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "CarPlate" => $Car->getCarPlate(),
        "CIN" => $Car->getCIN(),
        "ModelName" => $Car->getModelName(),
        "ModelID" => $Car->getModelID(),
        "Address" => $Car->getAddress(),
        "Price" => $Car->getPrice(),
        "isNew" => $Car->getisNew(),
        "SaleorRent" => $Car->getSaleorRent(),
        "opt1" => $Car->getopt1(),
        "opt2" => $Car->getopt2(),
        "opt3" => $Car->getopt3(),
        "opt4" => $Car->getopt4(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function listCars()
  {
    $sql = "SELECT * FROM car";
    $db = config::getConnexion();
    try {
      $list = $db->query($sql);
      return $list;
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  function UpdateCar($car, $CarPlate)
  {
    try {
      $db = config::getConnexion();
      $query = $db->prepare(
        'UPDATE car SET 
                    CIN = :CIN, 
                    ModelName = :ModelName, 
                    ModelID = :ModelID, 
                    Address = :Address,
                    Price = :Price,
                    isNew = :isNew,
                    SaleorRent = :SaleorRent,
                    opt1 = :opt1,
                    opt2 = :opt2,
                    opt3 = :opt3,
                    opt4 = :opt4
                WHERE CarPlate= :CarPlate'
      );
      $query->execute([
        "CarPlate" => $CarPlate,
        "CIN" => $car->getCIN(),
        "ModelName" => $car->getModelName(),
        "ModelID" => $car->getModelID(),
        "Address" => $car->getAddress(),
        "Price" => $car->getPrice(),
        "isNew" => $car->getisNew(),
        "SaleorRent" => $car->getSaleorRent(),
        "opt1" => $car->getopt1(),
        "opt2" => $car->getopt2(),
        "opt3" => $car->getopt3(),
        "opt4" => $car->getopt4(),
      ]);
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }

  function DeleteCar($CarPlate)
  {
    $sql = "DELETE FROM car WHERE CarPlate = :CarPlate";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(":CarPlate", $CarPlate);

    try {
      $req->execute();
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  function SearchModel($ModelID)
  {
    $CarC = new CarC();

    if (isset($_GET["ModelID"]) && !empty($_GET["ModelID"])) {
      $CarC->CreateCar($car);
    } else {
      return null;
    }
  }

  public function checkModelExist($ModelID)
  {
    $sql = "SELECT * from model where ModelID = '$ModelID'";
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

  public function ExistsAsCustomer(string $CIN)
  {
    $sql = "SELECT * from customer where CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function checkUserCar($CIN)
  {
    $sql = "SELECT * from car where CIN = '$CIN'";
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
  public function findCar($CarPlate)
  {
    $sql = "SELECT * FROM car WHERE CarPlate = :CarPlate";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "CarPlate" => $CarPlate,
      ]);
      $service = $query->fetch();
      return $service;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function Exists($customer)
  {
    $sql =
      "SELECT * from user where CIN = :cin OR email= :email OR contactnumber=:contactnumber";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "cin" => $customer->getCIN(),
        "email" => $customer->getemail(),
        "contactnumber" => $customer->getcontactnumber(),
      ]);
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function retrieveCustomer(string $CIN): customer
  {
    $sql = "SELECT * from user,customer where customer.CIN = user.CIN AND user.CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $res = $query->fetch();
      $customer = new customer(
        $res["CIN"],
        $res["Email"],
        $res["Password"],
        $res["ContactNumber"],
        $res["FullName"],
        $res["Address"],
        $res["RegisterDate"]
      );
      return $customer;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function EmailExistsCustomer(string $email)
  {
    $sql = "SELECT * from customer,user where user.email= '$email' AND customer.CIN = user.CIN";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function Verify(string $passwordFromPost, string $email)
  {
    $sql = "SELECT password,CIN from user where email= '$email'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $hashedPasswordFromDB = $query->fetch();
      if (
        password_verify($passwordFromPost, $hashedPasswordFromDB["password"])
      ) {
        $token = new token();
        $token->remember_me($hashedPasswordFromDB["CIN"]);
      }
      return password_verify(
        $passwordFromPost,
        $hashedPasswordFromDB["password"]
      );
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function allCars()
  {
    $sql = "SELECT * FROM car";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $car = $query->fetch();
      $res = [];
      for ($x = 0; $car; $x++) {
        $res[$x] = $car;
        $car = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      die("Error:" . $e->getMessage());
    }
  }

  public function CarBySearch($search)
  {
    $sql = "SELECT * FROM car WHERE ModelName LIKE '%" . $search . "%'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      $car = $query->fetch();
      $res = [];
      for ($x = 0; $car; $x++) {
        $res[$x] = $car;
        $car = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
