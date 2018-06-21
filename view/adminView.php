
<?php $title = "Tableau de bord";?>
<?php ob_start();?>
<div class="card" id="titleCard"><h2>Bienvenue sur votre tableau de bord</h2></div>
<div class="btn-toolbar justify-content-center mt-5 mb-2" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mx-auto " role="group" aria-label="Third group">
    <button type="button" class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Commentaires</button>
  </div>
  <div class="btn-group mx-auto" role="group" aria-label="Third group">
    <button type="button" class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Mes Chapitres</button>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-6">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
        <h5 id="redText">Commentaires signalés :</h5>
        <?php
        while ($comment = $comments->fetch()):
          ?>
          <div class="card  mb-5">
            <div class="card-header text-center bg-info">
              <strong><?=htmlspecialchars($comment['author']);?></strong>
              <a href="index.php?action=deleteComment&id=<?=$comment['id'];?>"><i class="fas fa-trash-alt"></i></a>
            </div>
            <div class="card-body text-center bg-light">
              <p class="text-center"><?=nl2br(htmlspecialchars($comment['comment_text']));?></p>
              <p class="text-center"><?=nl2br(htmlspecialchars($comment['signal_comment']));?></p>
            </div>
          </div>
          <?php
        endwhile;
        ?>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <ul>
          <?php
          while ($post = $posts->fetch()):
            ?>
            <li>
              <a href="index.php?action=post&id=<?=$post['id'];?>" class="bg-primary text-white"><?=$post['title'];?></a>
              <span><a href="index.php?action=changeChapter&id=<?=$post['id'];?>"><i class="fas fa-pencil-alt"></i><a href="index.php?action=deleteChapter&id=<?=$post['id'];?>"><i class="fas fa-trash-alt" id="trashAdmin"></i></a></span>
            </li>
            <?php
          endwhile;
          ?>
          <li><a href="index.php?action=newChapter" class="bg-primary text-white">Nouveau Chapitre</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>
