<?php
require_once 'model/Manager.php';
class CommentManager extends Manager
{
  public function getComments($postId)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, comment_text, comment_date,id_Chapters,author, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr FROM comments WHERE id_Chapters = ? ORDER BY comment_date DESC limit 5');
    $comments->execute(array($postId));

    return $comments;
  }

  public function postComment($postId, $author, $comment)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare('INSERT INTO comments(id_chapters, author, comment_text, comment_date ) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
  }

  public function signalComments($commentId)
  {
    $db = $this->dbConnect();
    $comment = $db->prepare('UPDATE comments SET signal_comment= signal_comment + 1 WHERE id = ?');
    $comment->execute(array($commentId));
  }

  public function getReportComments(){

    $db = $this->dbConnect();
    $reportComments = $db->prepare('SELECT id,signal_comment, author, comment_text FROM comments WHERE signal_comment > 0');
    $reportComments->execute();

    return $reportComments;
  }

  /******* Supprimer un commentaire signalé  *************/
  public function deleteComment($id){

    $db = $this->dbConnect();
    $deleteComment = $db->prepare('DELETE  FROM comments WHERE id = ?');
    $deleteComment->execute(array($id));
  }

}
