<?php
session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>



<div class="img1">

    <form action="recherche.php" method="GET" class="search-form">
        <input type="text" name="resultat" placeholder="Recherche..." />
        <input type="submit" value="Search" />
    </form>
</div>

<h3 class="animate__animated animate__backInRight">CATEGORIES</h3>
<div class="container">

    <div class="row g-3">
        <?php
        $categories = categorie_populaire();

        /* Vérifie si la variable '$categories' n'est pas vide Si la variable n'est pas vide, le  code à l'intérieur des accolades sera exécuté */

        if (!empty($categories)) {
            foreach ($categories as $categorie) :
        ?>
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <button class="plat1 position-relative z-2">
                            <?= $categorie['libelle'] ?>
                        </button>
                    </div>
                    <img src="src/img/category/<?= $categorie['image'] ?>" alt="Categorie <?= $categorie['libelle'] ?>" class="img2">
                </div>



        <?php endforeach;
        }

        ?>
        <br>
        <h3 class="animate__animated animate__backInRight">LES PLATS EN VOGUE</h3>

        <div class="row g-3">
            <?php
            $plats = plats_plus_vendus();

            if (!empty($plats)) {
                foreach ($plats as $plat) :
            ?>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">


                            <button class="plat1 position-relative z-2">

                                <?= $plat['libelle'] ?>
                            </button>
                        </div>
                        <img src="src/img/food/<?= $plat['image'] ?>" alt="plat <?= $plat['libelle'] ?>" class="img3">
                    </div>
            <?php endforeach;
            }
            ?>
        </div>
    </div>
</div>




<?php
include_once "Template/footer.php";
?>