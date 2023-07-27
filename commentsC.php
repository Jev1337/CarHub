<?php
include_once "C:\\xampp\\htdocs\\project2223_2a15-ninjahub\\core\\Model\\comments.php";
include_once "token.php";

class commentsC
{
  public function addComment($comments)
  {
    $sql = "INSERT INTO comments 
        VALUES (:Title,:CIN,:Content)";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $comments->getTittle(),
        "CIN" => $comments->getCIN(),
        "Content" => $comments->getContent(),
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function updateComment($Title,$CIN,$Content,$NewContent)
  {
    $sql =
      "UPDATE comments SET Content=:NewContent WHERE Title = :Title AND CIN = :CIN AND Content = :Content";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $Title,
        "CIN" => $CIN,
        "Content" => $Content,
        "NewContent" => $NewContent,
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function deleteComment($Title,$CIN,$Content)
  {
    $sql = "DELETE FROM comments WHERE Title = :Title AND CIN = :CIN AND Content = :Content";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $Title,
        "CIN" => $CIN,
        "Content" => $Content,
      ]);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function allArticle()
  {
    $sql = "SELECT * FROM article";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function findComments($Title)
  {
    $sql = "SELECT * FROM comments WHERE Title = :Title";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute([
        "Title" => $Title,
      ]);
      $comment = $query->fetch();
      $res = [];
      for ($x = 0; $comment; $x++) {
        $res[$x] = $comment;
        $comment = $query->fetch();
      }
      return $res;
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function allArticlesCommented()
  {
    $sql = "SELECT DISTINCT Title FROM comments";
    $db = config::getConnexion();
    try {
      $query = $db->prepare($sql);
      $query->execute();
      return $query->rowCount();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
