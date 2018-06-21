<?php $title = "Chapitre";?>
<?php ob_start();
?>
<p><a href="index.php">Retour à la liste des billets</a></p>
<div class="news mx-auto text-center">
  <h3>
    <?=($post['title']);?>
    <em>le <?=$post['creation_date_fr'];?></em>
  </h3>
  <p>
    <?=($post['chapter_text']);
    ?>
  </p>
</div>
<!-- Formulaire d'envois des commentaires -->
<h2 class="text-center text-white">Commentaires</h2>
<?php
while ($comment = $comments->fetch()):
  ?>
  <div class="card  mb-5">
    <div class="card-header text-center bg-info">
      <strong><?=htmlspecialchars($comment['author']);?></strong>
    </div>
    <div class="card-body text-center bg-light">
      <p class="text-center"><?=nl2br(htmlspecialchars($comment['comment_text']));?></p>
    </div>
    <div class="card-footer text-muted d-flex justify-content-around">
      <p class="mb-0"><?=$comment['comment_date_fr'];?></p>
      <a href="index.php?action=signaler&id=<?=$comment['id'];?>&postId=<?=$post['id'];?>" class="btn btn-primary" id="btnSignal">Signaler</a>
    </div>
  </div>
  <?php
endwhile;
?>
<form class="mb-0" action="index.php?action=addComment&amp;id=<?=$post['id']?> "method="post">
  <div class="form-group">
    <label for="author"></label>
    <input type="text" class="form-control" id="author" name="author" placeholder="Auteur">
  </div>
  <div class="form-group">
    <label for="comment"></label>
    <textarea class="form-control" id="comment" name="comment" placeholder="Votre commentaire"></textarea>
  </div>
  <div class="form-group">
    <input class="btn btn-primary" id="envoyer" type="submit" />
  </div>
</form>
<?php $content = ob_get_clean();?>
<?php require './view/template.php';?>
