<?php
require "Gallery.php";

class galleryvideo extends Gallery{
    
    private string $URLVideo;
    private string $duree;
    private string $ModelID;

    public function __construct(string $GalleryID,string $Nom,string $descG,string $URLVideo,string $duree,string $ModelID){
        $this->setGalleryID($GalleryID);    
        $this->setNom($Nom);
        $this->setdescG($descG);
        $this->setURLVideo($URLVideo);
        $this->setduree($duree);
        $this->setModelid($ModelID);

    }
    public function setURLVideo(string $URLVideo){
        $this->URLVideo = $URLVideo;
    }
    public function getURLVideo(){
        return $this->URLVideo;
    }
        public function setduree(string $duree){
            $this->duree = $duree;
        }
        public function getduree(){
            return $this->duree;
        }
    public function setModelID(string $ModelID){
        $this->ModelID = $ModelID;
    }
    public function getModelID(){
        return $this->ModelID;
    }
}

?>