<?php

session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

$resultat = isset($_GET['resultat']) ? $_GET['resultat'] : null;

$resultcat = get_categorie_recherche($resultat);

$resultplat = get_plat_recherche($resultat);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Page recherche</title>
</head>

<body>



    <div class="container my-5">
        <div class="row w-100 g-3 justify-content-center">
            <span class="text-center fs-3 fw-bold">RESULTATS PAR CATEGORIE</span>
            <?php if (!empty($resultcat)) {
                foreach ($resultcat as $oneresultat) : ?>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div class="plat1 position-relative z-2">
                                <?= $oneresultat['libelle'] ?>
                            </div>
                        </div>
                        <img src="src/img/category/<?= $oneresultat['image'] ?>" alt="<?= $oneresultat['libelle'] ?> " class="img2">
                    </div>
            <?php endforeach;
            } else {
                echo '<p class="text-center fs-4">Pas de catégories</p>';
            }
            ?>

        </div>
    </div>
    </div>
    <div class="container my-5">
        <div class="row w-100 g-3 justify-content-center">
            <span class="text-center fs-3 fw-bold">RESULTATS PAR PLAT</span>
            <?php if (!empty($resultplat)) {

            foreach ($resultplat as $tworesultat) : ?>
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <div class="plat1 position-relative z-2">
                            <?= $tworesultat['libelle'] ?>
                        </div>
                    </div>
                    <img src="src/img/food/<?= $tworesultat['image'] ?>" alt="<?= $tworesultat['libelle'] ?> " class="img2">
                </div>
            <?php endforeach;
        } else {
                echo '<p class="text-center fs-4 text-warning">Pas de plats</p>';
            }
            ?>
        </div>
</body>