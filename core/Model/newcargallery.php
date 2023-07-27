<?php
include_once "Gallery.php";

class newcargallery extends Gallery
{
  private string $ModelID;

  public function __construct(
    string $GalleryID,
    string $URLVideo,
    string $URLImage,
    string $ModelID
  ) {
    $this->Gallery = $this->setGallery($GalleryID);
    $this->URLVideo = $this->setURLVideo($URLVideo);
    $this->URLImage = $this->setURLImage($URLImage);
    $this->ModelID = $this->setModelid($ModelID);
  }
  public function setModelID(string $ModelID)
  {
    $this->ModelID = $ModelID;
  }
  public function getModelID()
  {
    return $this->ModelID;
  }
}

?>
