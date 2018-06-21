<?php $title = "Connexion";?>

<?php ob_start();?>


<form action="index.php?action=loging" method="post">
  <div class="form-group">
    <label for="email">Adresse E-mail:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Mot de passe:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php $content = ob_get_clean();?>
<?php require './view/template.php';?>
