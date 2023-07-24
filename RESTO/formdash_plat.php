<?php
session_start();

if (!isset($_SESSION['nom_prenom'], $_SESSION['email'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit;
  }

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

//Recup id plat
//Isset vérifie si id est définie  si c le cas, il attribut sa valeur à la variable "$plat"/ sinon $plat_id est définie 
//sur "null"/ 

// if/else raccourci
$plat_id = isset($_GET['plat_id']) ? $_GET['plat_id'] : null;

// Initialize $categorie as an empty array to avoid undefined variable notice
$plat = [];

//si on récupère un id du plat
if ($plat_id) {
    $plat = get_plat_id($plat_id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    // Récupérer les données du formulaire ici et effectuer les modifications nécessaires
    // ...
    // Puis redirigez l'utilisateur vers la page dashboard_plat.php

    // header("Location: dashboard_plat.php");
    // exit;
}
?>

<div class="img1"></div>
<div class="col-12">
    <div class="d-flex justify-content-center">
        <div class="w-50 w-md-50">
            <div>
                <h2 class="formulaire-text-text-center">Plat</h2>
            </div>
            <div class="container commandes-form justify-content-center p-3">
                <div class="row">
                    <?php if ($plat && isset($plat['id'])) : ?>
                        <!-- Le formulaire sera affiché uniquement si les données du plat sont disponibles -->
                        <div class="fondplat shadow col-12">
                            <form action="script_dash_update_plat.php" id="formulaire" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $plat['id']; ?>">
                                <div>
                                    <input name="libelle" type="text" class="form-control my-2" placeholder="libelle" required value="<?= $plat['libelle'] ?>">
                                </div>
                                <div>
                                    <input type="text" name="description" value="<?= $plat['description'] ?>" class="form-control w-100">
                                </div>
                                <div>
                                    <img class="imgDash w-25" src="src/img/food/<?= $plat['image'] ?>" alt="Categorie <?= $plat['libelle'] ?>">
                                </div>
                                <div class="custom-file my-2">
                                    <input type="file" class="custom-file-input" name="image">
                                    <input type="number" name="prix" value="<?= $plat['prix']; ?>">
                                    <label class="custom-file-label"></label>
                                </div>
                                <div>
                                    <input name="active" type="text" class="form-control my-2" placeholder="Active" required value="<?= $plat['active'] ?>">
                                </div>
                                <input class="btn btn-dark my-2 w-100" type="submit" name="modifier" value="Modifier">
                            </form>
                        </div>
                    <?php else : ?>
                        <!-- Affichez un message ou redirigez l'utilisateur vers une page d'erreur si les données du plat ne sont pas disponibles -->
                        <p>Erreur : Plat introuvable.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "Template/footer.php";
