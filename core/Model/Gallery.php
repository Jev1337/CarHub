<?php
class Gallery
{
  private string $GalleryID;
    private string $Nom;
    private string $descG;

    public function __construct(string $GalleryID,string $Nom,string $descG){
        $this->GalleryID = $GalleryID;    
        $this->Nom = $Nom;
        $this->descG = $descG;
    }

    public function setGalleryID(string $GalleryID){
        $this->GalleryID = $GalleryID;
    }
    public function setNom(string $Nom){
        $this->Nom = $Nom;
    }
    public function setdescG(string $descG){
        $this->descG = $descG;
    }
    public function getGalleryID(){
        return $this->GalleryID;
    }
    public function getNom(){
        return $this->Nom;
    }
    public function getdescG(){
        return $this->descG;
    }
  
}

?>
