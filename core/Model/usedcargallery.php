<?php
require "Gallery.php";

class usedcargallery extends Gallery
{
  public string $CarPlate;
  public function __construct(
    string $GalleryID,
    string $URLVideo,
    string $URLImage,
    string $CarPlate
  ) {
    $this->Gallery = $this->setGallery($GalleryID);
    $this->URLVideo = $this->setURLVideo($URLVideo);
    $this->URLImage = $this->setURLImage($URLImage);
    $this->CarPlate = $this->setCarPlate($CarPlate);
  }
  public function setCarPlate(string $CarPlate)
  {
    $this->CarPlate = null;
  }
  public function getCarPlate()
  {
    return $this->CarPlate;
  }
}

?>
