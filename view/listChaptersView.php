<?php $title = "Jean Forteroche";?>
<?php ob_start();?>
<!--<img class="alaska" src="../blog2/img/alaska.jpg" />-->
<h1> Chapitres </h1>
<?php while ($data = $posts->fetch()): ?>
  <div class="card" id="news">
    <div class="card-header bg-info">
      <h3>
        <?=htmlspecialchars($data['title']);?>
        <em>le <?=$data['creation_date_fr'];?></em>
      </h3>
    </div>
    <div class="card-body">
      <p>
        <?=substr(strip_tags($data['chapter_text']), 0, 300);?>
        <br />
        <em><a href="index.php?action=post&id=<?=$data['id']?>">Lire le chapitre</a></em>
      </p>
    </div>
  </div>
</div>
<?php endwhile;?>
<?php
$posts->closeCursor();
?>
<?php $content = ob_get_clean();?>
<?php require('./view/template.php');?>
