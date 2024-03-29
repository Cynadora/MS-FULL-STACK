<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

//Recup id plat
//Isset vérifie si id est définie si c le cas, il attribue sa valeur à la variable "$plat"/ sinon $plat_id est définie 
//sur "null"/ 

// if/else raccourci/Récupération des données
//Isset vérifie si id est définie et si c le cas, il attribue sa valeur à la variable "$plat"/ sinon $plat_id est définie 
//sur "null"/
 $plat_id = isset($_GET['id']) ? $_GET['id'] : null;

// //Récupération l'id du plat
// if (isset($_GET['id'])) {
// //get id  le met dans plat id
//     $plat_id = $_GET['id'];
// } else {
//     //si on ne récupère pas l'id il met l'id à null/ 
//     $plat_id = null;
// }

// s'il n'y a pas de plat
$plat = null;
//si on récupère un id du plat
if ($plat_id) {
   /// Appel de la fonction (en écrivant son nom) pour obtenir id des plats/récupère les plats à afficher/ 
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
                            <img src="src/img/food/<?= $plat['image'] ?>" alt="<?= $plat['libelle'] ?>" class="tailleimg">
                        </div>
                        <div class="col-9 detailsplat">
                            <h2 class="titreplat"><?= $plat['libelle'] ?></h2>
                            <p class="descriptionplat"><?= $plat['description'] ?></p>
                            <p class="prixplat">Prix: <?= $plat['prix'] ?>€</p>
                            <div class="command text-end">
                                <label for="qte">Quantité</label>
                                <input class="cpte" type="number" name="quantite" min="1" value="1" form="formulaire">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>


        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="w-100 w-md-50">
                    <div>
                        <h2 class="text-center">Commander</h2>
                    </div>

                    <form action="script_commande.php" id="formulaire" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_plat" value="<?= $plat['id'] ?>">
                        <input type="hidden" name="prix" value="<?= $plat['prix'] ?>">
                        <div><input name="nom_prenom" type="text" class="form-control my-2" placeholder="Nom et prénom" required></div>
                        <div><input name="email" type="email" class="form-control my-2" placeholder="Adresse e-mail" required></div>
                        <div><input name="telephone" type="text" class="form-control my-2" placeholder="Numéro de téléphone" required></div>
                        <div><textarea name="adresse" class="form-control my-2" placeholder="Votre adresse" rows="5" required></textarea></div>

                        <div><input class="btn btn-dark my-2 w-100" type="submit" value="Envoyer"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php

include_once "Template/footer.php";

?>