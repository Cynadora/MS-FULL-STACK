<?php
session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>
<h3>PLATS PAR CATEGORIE</h3>
<div class="img1"></div>

<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page <= 0 || !ctype_digit($page)) {
        $page = 1;
    }
} else {
    $page = 1;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id <= 0 || !ctype_digit($id)) {
        $id = 1;
    }
} else {
    $id = 1;
}


$limit = 6;
$offset = ($page - 1) * $limit;



$plats = plat_par_categorie($offset, $limit, $id);

?>
<div class="container">
    <div class="row w-100 mb-5">
        <?php
        /* Vérifie si la variable '$categories' n'est pas vide Si la variable n'est pas vide, le  code à l'intérieur des accolades sera exécuté */
        if (!empty($plats)) {
            foreach ($plats as $plat) :
        ?>
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <a class="plat1 position-relative z-2" href="commande.php?id=<?= $plat['id'] ?>">
                            <?= $plat['libelle'] ?>
                        </a>
                    </div>
                    <img src="src/img/food/<?= $plat['image'] ?>" alt="Categorie <?= $plat['libelle'] ?> <?= $plat['description'] ?> <?= $plat['prix'] ?> " class="img2">

                </div>
            <?php endforeach; ?>
        <?php
        }
        ?>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <a class="btn-nav col-6 button" href="?page=<?= $page - 1 ?>">Précédent</a>
        <a class="btn-nav col-6 button" href="?page=<?= $page + 1 ?>">Suivant</a>
    </div>
</div>

<?php
include_once "Template/footer.php";

?>