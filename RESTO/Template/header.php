<?php
// Si (la variable de session 'nom_prenom' et 'email' sont définies) on exécute le code à l'intérieur de la condition
if (isset($_SESSION['nom_prenom'], $_SESSION['email'])) {
  $connecte = true;
} else {
  $connecte = false;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">


  <title>Entête</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar couleurnav">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav w-75 align-items-center justify-content-around">
          <li class="nav-item">
            <a class="navbar-brand"></a>
            <img class="logo1" src="src/img/the_district_brand/logo_transparent.png" alt="Logo" title="thedistrict">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categorie.php">Catégorie</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="plats.php">Plats</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php
          // Vérifie si l'utilisateur est connecté
          if ($connecte) {
          ?>
            <!-- Bouton admin/////////////////////////////// -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dashboard
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dashboard.php">Gestion Catégories</a></li>
                <li><a class="dropdown-item" href="dashboard_plat.php">Gestion Plats</a></li>
              </ul>
            </li>
          <?php
          }
          ?>

          <?php
          if ($connecte) {
          ?>
            <!-- Afficher les liens et informations pour l'utilisateur connecté -->
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Se déconnecter</a>
            </li>
            <li class="nav-item">
              <span>Bonjour <?= $_SESSION['nom_prenom'] ?></span>
            </li>
          <?php
          } else {
          ?>
            <!-- Afficher le lien pour l'utilisateur non connecté -->
            <li class="nav-item">
              <a class="nav-link" href="login.php">Se connecter</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</body>

</html>