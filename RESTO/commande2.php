<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

// Recup id plat
$plat_id = isset($_GET['id']) ? $_GET['id'] : null;

//Autre manière d'écrire le code (=code recup id plat)
// if(isset($_GET['id'])){
//     $plat_id = $_GET['id'];
// }else{
//     $plat_id=null;
// }

// recup données plat
$plat = null;
if ($plat_id) {
    $plat = get_plat_id($plat_id);
    //var_dump($plat);
}
?>

<div class="container commandes-form justify-content-center p-3">
    <div class="row">
        <div class="col-12">
            <?php if ($plat) : ?>
                <div class="fondplat shadow">
                    <div class="row">
                        <div class="col-3 platpresentation">
                            <img src="src/img/food/<?= $plat['image'] ?>" alt="<? $plat['libelle'] ?>" class="tailleimg">
                        </div>
                        <div class="col-9 detailsplat">
                            <h2 class="titreplat"><?= $plat['libelle'] ?></h2>
                            <p class="descriptionplat"><?= $plat['description'] ?></p>
                            <p class="prixplat">Prix: <?= $plat['prix'] ?>€</p>
                            <div class="command text-end">
                                <label for="qte">Quantité</label>
                                <input class="cpte" type="number" name="quantite" placeholder="" min="1" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        
        <!-- <div class="commander">
            <div id="premierTrait"></div>
            <h2>Commander</h2>
            <div class="nameprenom ">
                <input class="nameprenom w-100" placeholder="Nom et prénom">
            </div>
            <div class="mailtel1">
                <input class="mailtel2 w-100 mb-4" placeholder="E-mail">
                <div class="telephone">
                    <input class="tel w-100" placeholder="Téléphone">
                </div>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <div class="adr w-100">
                    <textarea class="form-control" placeholder="Votre adresse" rows="4"></textarea>
                </div>
            </div>
            <div class="text-center">
                <button class="btnenvoyer">Envoyer</button>
                <div id="deuxiemeTrait"></div>
                <div id="copyrightEtIcons">
                    <div id="copyright">
                        <span>© Sylvie(); 2023</span>
                        

                    </div>
                </div>
            </div>
        </div> -->




        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="w-100 w-md-50">
                    <div>
                        <h2 class="text-center">Commander</h2>
                    </div>
                    <form action="#" method="post">
                        <div><input name="nom_prenom" type="text" class="form-control my-2" placeholder="Nom et prénom" required></div>
                        <div><input name="email" type="email" class="form-control my-2" placeholder="Adresse e-mail" required></div>
                        <div><input name="telephone" type="text" class="form-control my-2" placeholder="Numéro de téléphone" required></div>
                        <div><textarea name="adresse" class="form-control my-2" placeholder="Votre adresse" rows="5" required></textarea></div>

                        <div><a href="index.php"><input class="btn btn-dark my-2 w-100" type="submit" value="Envoyer"></div>
                        <!--<a href="index.php" class="btn btn-info">Retour</a>-->

                    </form>
                    <hr class="text-dark">
                    <div class="text-center">
                        <span class="text-primary">© Sylvie(); 2023</span>

                        <ul class="d-flex flex-row">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube" id="yy"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>