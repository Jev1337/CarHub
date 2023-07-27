<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\galleryvideo.php";

class galleryvideoC{

	public function gallerryvideo($galleryimage){
        $sql = "INSERT INTO gallery 
        VALUES (:GalleryID, :Nom,:description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryimage->getGalleryID(),
                'Nom' => $galleryimage->getNom(),
                'description' => $galleryimage->getdescG(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
		$sql = "INSERT INTO galleryvideo
        VALUES (:GalleryID,:URLVideo,:ModelID,:duree)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryimage->getGalleryID(),
				'URLVideo' => $galleryimage->getURLVideo(),
                'ModelID' => $galleryimage->getModelID(),
                'duree' => $galleryimage->getduree(),
				
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function deletevideo($GalleryID){
        $sql="DELETE FROM galleryvideo WHERE GalleryID=:GalleryID";
        try{
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':GalleryID', $GalleryID);
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
        $sql="DELETE FROM gallery WHERE GalleryID=:GalleryID";
        try{
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':GalleryID', $GalleryID);
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }
    public function modifiervideo ($galleryvideo){
        $sql = "UPDATE gallery SET nom= :nom, description= :description WHERE GalleryID= :GalleryID";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryvideo->getGalleryID(),
                'nom' => $galleryvideo->getNom(),
                'description' => $galleryvideo->getdescG(),

            ]);
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $sql = "UPDATE galleryvideo SET URLVideo= :URLVideo,ModelID= :ModelID, duree= :duree WHERE GalleryID= :GalleryID";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryvideo->getGalleryID(),
                'URLVideo' => $galleryvideo->getURLVideo(),
                'ModelID' => $galleryvideo->getModelID(),
                'duree' => $galleryvideo->getduree(),
                

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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

    function affichervideobyid($GalleryID){
        $sql="SELECT * FROM galleryvideo as gv,gallery as g WHERE gv.GalleryID = g.GalleryID AND gv.GalleryID = $GalleryID ";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $gallery = $query->fetch();
            
            return $gallery;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
        
    }
    
    public function allVideoss($search)
    {
        $sql =
        "SELECT *  FROM galleryvideo as gi,gallery as g  WHERE  gi.GalleryID = g.GalleryID AND nom LIKE '%" .
        $search .
        "%'";
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

    public function allVideosPages($start, $rows, $search)
    {
        $sql =
        "SELECT *  FROM galleryvideo as gi,gallery as g  WHERE  gi.GalleryID = g.GalleryID AND nom LIKE '%" .
        $search .
        "%' LIMIT $start , $rows";
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

    public function allmodels()
    {
        $sql =
        "SELECT *  FROM model";
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
}

    ?>