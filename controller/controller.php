<?php
// Chargement des classes
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/UserManager.php';
function listChapters()
{
  $postManager = new PostManager(); // Création d'un objet
  $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
  require('view/listChaptersView.php');
}
function post()
{
  $postManager = new PostManager();
  $commentManager = new CommentManager();
  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);
  require('view/postView.php');
}
//fonction de connexion
function login()
{
  if (isset($_POST['email']) && isset($_POST['password'])) {
    //Aller chercher les commentaires signalés
    $commentManager = new CommentManager();
    $comments = $commentManager->getReportComments();
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    header('Location: index.php?action=admin');'view/adminView.php';
  } else {
    require('view/loginView.php');
  }
}
// Fonction ajouter un chapitre
function newChapter()
{
  require('view/writerView.php') ;
}
function createChapter($title, $chapter_text){
  $createChapter = new PostManager();
  $createChapter->createchapter($title, $chapter_text);
  header('Location: index.php?action=admin');
}
// Fonction qui ajoute un commentaire
function addComment($postId, $author, $comment)
{
  $commentManager = new CommentManager();
  $affectedLines = $commentManager->postComment($postId, $author, $comment);
  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  } else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}
// Fonction Signaler un commentaire
function signaler($commentId, $postId)
{
  $signalComments = new CommentManager();
  $affectedLines = $signalComments->signalComments($commentId);
  if ($affectedLines === false) {
    throw new Exception('Impossible de signaler le commentaire');
  } else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}
function loging($mail,$password)
{
  $usermanager = new UserManager();
  $resultat = $usermanager->selectuser($mail);
  echo($resultat['password']);
  // Comparaison du pass envoyé via le formulaire avec la base
  $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
  if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
  } else {
    if ($isPasswordCorrect) {
      session_start();
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['username'] = $resultat['username'];
      header('Location: index.php?action=admin');
    } else {
      echo 'Mauvais identifiant ou mot de passe !';
    }
  }
}
function deleteChapter($id){
  if (isset($id) && is_numeric($id)){
    $postManager = new PostManager();
    $postManager->deletePost($id);
    header('Location: index.php?action=admin');
  }
}
function goAdmin(){
  $commentManager = new CommentManager();
  $comments = $commentManager->getReportComments();
  $postManager = new PostManager();
  $posts = $postManager->getPosts();
  require('view/adminView.php');
}
function deleteComment($id){
  if (isset($id) && is_numeric($id)){
    $deleteComment = new CommentManager();
    $deleteComment->deleteComment($id);
    header('Location: index.php?action=admin');
  }
}
function changeChapter($id){
  $changeChapter =  new PostManager();
  $change = $changeChapter->getPost($id);
  require('view/writerView.php');
}
function chapterModif(){

}
