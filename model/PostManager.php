<?php
require_once 'model/Manager.php';

class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this->dbConnect();
    $req = $db->query("SELECT id, title, chapter_text, DATE_FORMAT(chapter_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM chapters ORDER BY chapter_date DESC ");
    return $req;
  }
  public function getPost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("SELECT id, title, chapter_text, DATE_FORMAT(chapter_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM chapters WHERE id = ?");
    $req->execute(array($postId));
    $post = $req->fetch();
    return $post;
  }
  public function deletePost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM chapters  WHERE id = ?');
    $req->execute(array($postId));
  }
  public function createchapter($title, $chapter_text)
  {
    $db = $this->dbconnect();
    $req = $db->prepare('INSERT INTO chapters(title, chapter_text, chapter_date)VALUES(:title, :chapter_text, NOW())');
    $req->execute(array(
      'title' => $title,
      'chapter_text' => $chapter_text

    ));
  }
  /************ Modifier un chapitre ***********/
  public function changeChapter($id)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE chapters SET title = title, chapter_text = chapter_text WHERE id = ?');
    $req->execute(array(
      'title' => $title,
      'chapter_text' => $chapter_text

    ));
  }
}
