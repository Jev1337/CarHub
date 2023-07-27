<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\complaint.php";
class complaintC
{
  public function addComplaint($complaint)
  {
    $sql =
      "INSERT INTO complaints VALUES ('',:title,:description,:isPending,:isRejected,:CIN)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "title" => $complaint->gettitle(),
        "description" => $complaint->getdescription(),
        "isPending" => $complaint->getisPending(),
        "isRejected" => $complaint->getisRejected(),
        "CIN" => $complaint->getCIN(),
      ]);
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function ExistAllUser()
  {
    $sql = "SELECT * from complaints";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount() > 0;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function ExistAllUserPending()
  {
    $sql =
      "SELECT * from complaints WHERE isPending = '1' AND isRejected = '0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount() > 0;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function ExistSingleUser(string $CIN)
  {
    $sql = "SELECT * from complaints where CIN = '$CIN'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount() > 0;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function listSingleUserComplaints(string $CIN, string $search = '', string $by ='')
  {
    if ($search == '' && $by =='')
      $sql = "SELECT * from complaints where CIN = '$CIN'";
    else
      if($by == '1')
        $sql = "SELECT * from complaints where CIN = '$CIN' AND Title LIKE '%$search%'";
      else if ($by == '2')
        $sql = "SELECT * from complaints where CIN = '$CIN' AND Description LIKE '%$search%'";
      else if ($by == '3' && is_numeric($search))
        $sql = "SELECT * from complaints where CIN = '$CIN' AND ID = $search";
      else
        $sql = "SELECT * from complaints where 0=1";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function listAllUserAwaitingComplaints()
  {
    $sql = "SELECT * from complaints where isPending = '1'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function listAllUserComplaints()
  {
    $sql = "SELECT * from complaints";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function declineComplaint(string $id)
  {
    $sql = "UPDATE complaints SET isPending = '0', isRejected = '1' WHERE ID='$id'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function acceptComplaint(string $id)
  {
    $sql = "UPDATE complaints SET isPending = '0' WHERE ID='$id'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function pendComplaint(string $id)
  {
    $sql = "UPDATE complaints SET isPending = '1', isRejected = '0' WHERE ID='$id'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function countPend()
  {
    $sql = "SELECT * from complaints where isPending = '1'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function countAccepted()
  {
    $sql = "SELECT * from complaints where isPending = '0' AND isRejected = '0'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
  public function countRejected()
  {
    $sql = "SELECT * from complaints where isPending = '0' AND isRejected = '1'";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
}
?>
