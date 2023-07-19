<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

//Recup id plat
//Isset vérifie si id est définie et vérifie si "id" est présent dans l'url si c le cas, il attribut sa valeur à la variable "$plat"/ sinon $plat_id est définie 
//sur "null"/ 

// if/else raccourci
$categorie_id = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;

// s'il n'y a pas de plat
$categorie_id = null;
//si on récupère un id du plat
if ($categorie_id) {

    $plat = get_categorie_all($plat_id);
    //var_dump($plat);
}
?>

<div class="img1"></div>

<div class="col-12">
    <div class="d-flex justify-content-center">
        <div class="w-50 w-md-50">
            <div>
                <h2 class="formulaire-text-text-center">Catégorie</h2>
            </div>

            <div class="container commandes-form justify-content-center p-3">
                <div class="row">
                    <div class="fondplat shadow col-12">

                        <form action="script_dash_update_cat.php" id="formulaire" method="post" enctype="multipart/form-data">

                            <div><input name="libelle" type="text" class="form-control my-2" placeholder="libelle" required value="<?php echo isset($categorie) ? $categorie['libelle'] : ''; ?>"></div>

                            <!-- Afficher l'image actuelle de la catégorie s'il y en a une -->
                            <?php if (isset($categorie) && !empty($categorie['image'])) : ?>
                                <img class="img w-25" src="assets/img/<?php echo $categorie['image']; ?>" alt="image" title="image">
                            <?php endif; ?>

                            <!-- Champ pour sélectionner une nouvelle image -->
                            <div class="custom-file my-2">
                                <input type="file" class="custom-file-input" name="picture">
                                <label class="custom-file-label"></label>
                            </div>

                            <div><input name="active" type="text" class="form-control my-2" placeholder="Active" required value="<?php echo isset($categorie) ? $categorie['active'] : ''; ?>"></div>

                            <div><input class="btn btn-dark my-2 w-50" type="submit" value="Modifier"></div>
                            <a href="script_dash_delete_cat.php" class="btn btn-dark my-2 w-50">Supprimer</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once "Template/footer.php";
