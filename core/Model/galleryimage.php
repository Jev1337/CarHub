<?php
include_once 'Gallery.php';

class galleryimage extends Gallery{
    
    private string $URLImage;
    private string $dimension;
    private string $ModelID;

    public function __construct(string $GalleryID,string $Nom,string $descG,string $URLImage,string $dimension,string $ModelID){
        $this->setGalleryID($GalleryID);    
        $this->setNom($Nom);
        $this->setdescG($descG);
        $this->setURLImage($URLImage);
        $this->setdimension($dimension);
        $this->setModelid($ModelID);

    }
    public function setURLImage(string $URLImage){
        $this->URLImage = $URLImage;
    }
    public function getURLImage(){
        return $this->URLImage;
    }
        public function setdimension(string $dimension){
            $this->dimension = $dimension;
        }
        public function getdimension(){
            return $this->dimension;
        }
    public function setModelID(string $ModelID){
        $this->ModelID = $ModelID;
    }
    public function getModelID(){
        return $this->ModelID;
    }
}

?>