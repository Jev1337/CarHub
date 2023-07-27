<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\galleryimage.php";

class galleryimageC{
	public function gallerryimage($galleryimage){
        $sql = "INSERT INTO gallery 
        VALUES (:GalleryID, :Nom,:descG)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryimage->getGalleryID(),
                'Nom' => $galleryimage->getNom(),
                'descG' => $galleryimage->getdescG(),
            ]);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
		$sql = "INSERT INTO galleryimage 
        VALUES (:GalleryID,:URLImage,:ModelID,:dimension)";
        $db = config::getConnexion();
        try {
            echo '<script>alert("'.$galleryimage->getModelID().'")</script>';
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryimage->getGalleryID(),
				'dimension' => $galleryimage->getdimension(),
				'URLImage' => $galleryimage->getURLImage(),
				'ModelID' => $galleryimage->getModelID(),
            ]);
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function deleteimage($GalleryID){
        $sql="DELETE FROM galleryimage WHERE GalleryID=:GalleryID";
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
    public function modifierimage ($galleryimage){
        $sql = "UPDATE gallery SET nom= :nom, description= :description WHERE GalleryID= :GalleryID";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryimage->getGalleryID(),
                'nom' => $galleryimage->getNom(),
                'description' => $galleryimage->getdescG(),

            ]);
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        $sql = "UPDATE galleryimage SET  URLImage= :URLImage,dimension= :dimension,ModelID= :ModelID WHERE GalleryID= :GalleryID";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'GalleryID' => $galleryimage->getGalleryID(),
                'URLImage' => $galleryimage->getURLImage(),
                'dimension' => $galleryimage->getdimension(),
                'ModelID' => $galleryimage->getModelID(),

            ]);
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
    function afficherimagebyid($GalleryID){
        $sql="SELECT * FROM galleryimage as gi,gallery as g WHERE gi.GalleryID = g.GalleryID AND gi.GalleryID = $GalleryID ";
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
    public function allImagesPages($start, $rows, $search)
    {
        $sql =
        "SELECT *  FROM galleryimage as gi,gallery as g  WHERE  gi.GalleryID = g.GalleryID AND nom LIKE '%" .
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

    public function allImages($search)
    {
        $sql =
        "SELECT *  FROM galleryimage as gi,gallery as g  WHERE  gi.GalleryID = g.GalleryID AND nom LIKE '%" .
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