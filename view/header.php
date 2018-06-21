<!DOCTYPE html>


<header class="container-fluid bg-dark">
  <div class="row" id="header">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <p id="auteur">Jean Forteroche
        <?php if (isset($_SESSION['id']) && $_SESSION['id']> 0): ?>
          <a class="btnConnexion mx-5" href="index.php?action=admin">Administration</a>
        <?php else: ?>
          <a class="btnConnexion mx-5" href="index.php?action=login">Connexion</a>
        <?php endif; ?>
        <a class="btnConnexion mx-5" href="index.php">Accueil</a>
        <div class="col-12 d-flex">
          <p id="titre">Billet simple pour l'Alaska</p>
          <?php if (isset($_SESSION['id']) && $_SESSION['id']> 0): ?>
          <form class="" action="index.php" method="post">
            <button type="submit" name="logout" id="admdeconnect"class="btn btn-danger " >Déconnexion</button>
          </form>
            <?php endif; ?>
        </div>

      </p>
    </div>

  </div>
</header>
