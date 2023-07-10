<?php
session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

$plats = get_plat_all();
?>


<h3>TOUS LES PLATS</h3>
<div class="img1"></div>
<br>

<div class="container">
    <div class="row mb-5">
        <?php foreach ($plats as $plat) { ?>
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <a class="plat1 position-relative z-2" href="commande.php?id=<?= $plat['id'] ?>">
                        <?= $plat['libelle'] ?>
                    </a>
                </div>
                <img class="img2" src="src/img/food/<?= $plat['image'] ?>" alt="Categorie <?= $plat['libelle'] ?>">
                <div class="mt-5"><?= $plat['description'] ?></div>
                <div><?= $plat['prix'] ?>€</div>

            </div>
        <?php } ?>
    </div>
</div>

<?php

include_once "Template/footer.php";

?>