<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\galleryimage.php";
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\Gallery.php";

class galleryC
{
  public function newcargallery($newcargallery)
  {
    $sql = "INSERT INTO gallery 
        VALUES (:GalleryID, :URLVideo,:URLImage)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "GalleryID" => $newcargallery->getGalleryID(),
        "URLVideo" => $newcargallery->getURLVideo(),
        "URLImage" => $newcargallery->getURLImage(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function modifierGallery($Gallery)
  {
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    $sql =
      "UPDATE gallery SET URLVideo= :URLVideo, URLImage= :URLImage WHERE GalleryID= :GalleryID";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "GalleryID" => $Gallery->getGalleryID(),
        "URLVideo" => $Gallery->getURLVideo(),
        "URLImage" => $Gallery->getURLImage(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function supprimeradherent($GalleryID)
  {
    $sql = "DELETE FROM gallery WHERE GalleryID=:GalleryID";
    try {
      $db = config::getConnexion();
      $req = $db->prepare($sql);
      $req->bindValue(":GalleryID", $GalleryID);
      $req->execute();
    } catch (Exception $e) {
      die("Erreur:" . $e->getMeesage());
    }
  }
  function afficheradherents()
  {
    $sql = "SELECT * FROM gallery";
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
            echo 'Error: ' . $e->getMessage();
        }
    }
    function afficherimage(){
      $sql="SELECT * FROM galleryimage as gi,gallery as g WHERE gi.GalleryID = g.GalleryID";
      $db = config::getConnexion();
      try{
          $query = $db->prepare($sql);
          $query->execute();
          $gallery = $query->fetch();
          $galleries = [];    
          for($x=0;$gallery;$x++)
          {
              $galleries[$x] = $gallery;
              $gallery = $query->fetch();  
          }
          return $galleries;
      }
      catch(Exception $e){
          die('Erreur:'. $e->getMeesage());
      }
      
  }
  function affichervideo(){
    $sql="SELECT * FROM galleryvideo as gi,gallery as g WHERE gi.GalleryID = g.GalleryID";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute();
        $gallery = $query->fetch();
        $galleries = [];
        for($x=0;$gallery;$x++)
        {
            $galleries[$x] = $gallery;
            $gallery = $query->fetch();  
        }
        return $galleries;
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMeesage());
    }
    
}
}

?>
