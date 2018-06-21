<?php
require 'controller/controller.php';
session_start();
(isset($_POST['logout'])?session_destroy():"");
try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
      listPosts();
    } elseif ($_GET['action'] == 'post') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        post();
      } else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    } elseif ($_GET['action'] == 'addComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
          addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        } else {
          throw new Exception('Tous les champs ne sont pas remplis !');
        }
      } else {
        throw new Exception('Aucun identifiant de billet envoyé');
      }
    }elseif ($_GET['action'] == 'signaler'){
      if (isset($_GET['id']) && ($_GET['id'] > 0) && isset($_GET['postId']) && ($_GET['postId'] > 0)) {

        signaler($_GET['id'],$_GET['postId']);
      }
    } elseif ($_GET['action'] == 'login') {
      login();
    }elseif ($_GET['action'] == 'loging') {
      loging($_POST['email'],$_POST['password']);
      /****************** DEBUT DE LA PARTIE ADMIN ********/
    }elseif(isset($_SESSION['id']) && $_SESSION['id']> 0){
      if($_GET['action'] == 'newChapter'){
        newChapter();
        /************ Création d'un chapitre (espace admin) ******/
      }elseif($_GET['action'] == 'createChapter'){
        createChapter($_POST['title'], $_POST['content']);
        /********** Supprime un chapitre (espace admin) ********/
      } elseif($_GET['action'] == 'deleteChapter'){
        deleteChapter($_GET['id']);
      }elseif ($_GET['action'] == 'admin'){
        goAdmin();
        /************ Modifier un chapitre (espace admin)***********/
      }elseif($_GET['action'] == 'changeChapter'){
      changeChapter($_GET['id']);

        /************ Supprime un commentaire signalé (espace admin)*****/
      }elseif($_GET['action'] == 'deleteComment'){
        deleteComment($_GET['id']);
      }
    }else {
      header('Location: index.php');
    }
  }else{
    listChapters();
  }
} catch (Exception $e) {
  echo 'Erreur : ' . $e->getMessage();
}
