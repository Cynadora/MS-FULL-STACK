<?php
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>

<h3>COMMANDE</h3>

<br><br><br>
<!--Image + texte + bouton haut de la page-->

<div class="container frame">

    <img class="image" src="src/img/food/hamburger.jpg" alt="Image">
    <div class="text">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, labore!</p>

        <div class="command">
            <input class="cpte" type="number" name="quantite" placeholder="Nombre de plats" min="1">
            <button class="qte">Quantité</button>
        </div>


    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($plats as $plat) { ?>
            <div class="col-md-6">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <img class="w-100" src="assets/img/<?= $plat["image"] ?>"><br><br>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <span class="fw-bold">Libelle: </span>
                        <?= $plat["libelle"] . '<br>' ?>

                        <span class="fw-bold">Image: </span>
                        <?= $plat["image"] . '<br>' ?>
                        <span class="fw-bold">Description: </span>
                        <?= $plat["description"] . '<br>' ?>

                        <span class="fw-bold">Prix: </span>
                        <?= $plat["prix"] . '<br>' ?>

                        <br><br><br><br>
                        <div>


                            <?= $categorie['libelle'] ?>

                            <img src="src/img/category/<?= $categorie['image'] ?>" alt="Categorie <?= $categorie['libelle'] ?>" class="img2">



                            <a href="commande.php?id=<?= $page["page_id"] ?>" class="btn btn-warning">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<hr>

<hr>
<br><br>

<section>
    <div id="premierTrait"></div>
    <h2>Commander</h2>
    <form>
        <input class="cde" placeholder="Nom et prénom">
        <input class="cde" placeholder="E-mail">
        <input class="cde" placeholder="Téléphone">
        <textarea class="txta" placeholder="Votre adresse"></textarea>
        <button class="btn">Envoyer</button>
    </form>
    <div id="deuxiemeTrait"></div>
    <div id="copyrightEtIcons">
        <div id="copyright">
            <span>© Sylvie(); 2023</span>
        </div>
    </div>
</section>