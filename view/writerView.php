<?php $title = "Tableau de bord";?>
<?php ob_start();?>

  <!-- TinyMCE -->
  <script type="text/javascript" src="tinyMCE/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
  tinyMCE.init({
    selector: 'textarea',
    language: 'fr_FR',
    theme: "modern",
    menubar: "tools",
    height: "300",
    statusbar: false,
  });
  </script>
  <form action="index.php?action=createChapter" method="post">
    <input class="text-center mt-5 w-100" type="text" name="title" placeholder="Titre" id="chaptitle" value="<?=(isset($change)?$change['title']:"")?>" />
    <textarea name="content"><?=(isset($change)?$change['chapter_text']:"")?></textarea>
    <input id="publier" type="submit" class="btn btn-primary w-100 mx-auto rounded-0" name="Publier" value="publier">
    </form>
  <?php $content = ob_get_clean();?>
  <?php require('view/template.php');?>
