<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\article.php";
include_once "token.php";

class articleC
{
  public function addActicle($article)
  {
    $sql = "INSERT INTO article 
        VALUES (:Title, :Description,:ExpiryDate,:CIN,:Views)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $article->getTittle(),
        "Description" => $article->getDescription(),
        "ExpiryDate" => $article->getExpiryDate(),
        "CIN" => $article->getCIN(),
        "Views" => $article->getViews(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function updateArticle($article)
  {
    $sql =
      "UPDATE article SET Description=:Description,ExpiryDate=:ExpiryDate, Views=:Views WHERE Title = :Title";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $article->getTittle(),
        "Description" => $article->getDescription(),
        "ExpiryDate" => $article->getExpiryDate(),
        "Views" => $article->getViews(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function deleteArticle($Title)
  {
    $sql = "DELETE FROM article WHERE Title = :Title";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $Title,
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allArticles()
  {
    $sql = "SELECT * FROM article";
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

  public function findArticlesByTitle($Title)
  {
    $sql = "SELECT * FROM article WHERE Title LIKE '%".$Title."%'";
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

  public function findArticle($Title)
  {
    $sql = "SELECT * FROM article WHERE Title = :Title";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $Title,
      ]);
      $service = $query->fetch();

      return $service;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
