<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\usedcargallery.php";
class usedcargallery
{
  function modifieradherent($Gallery, $GalleryID)
  {
    try {
      $db = config::getConnexion();
      $query = $db->prepare(
        'UPDATE Gallery SET 
						URLVideo= :URLVideo, 
						URLImage= :URLImage, 
					WHERE GalleryID= :GalleryID'
      );
      $query->execute([
        "URLVideo" => $usedcargallery->getURLVideo(),
        "URLImage" => $usedcargallery->getURLImage(),
      ]);
      echo $query->rowCount();
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
}

?>
