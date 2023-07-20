<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

//Recup id plat
//Isset vérifie si id est définie  si c le cas, il attribut sa valeur à la variable "$plat"/ sinon $plat_id est définie 
//sur "null"/ 

// if/else raccourci
$categorie_id = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;

// Initialize $categorie as an empty array to avoid undefined variable notice
$categorie = [];

//si on récupère un id du plat
if ($categorie_id) {
    $categorie = get_categorie_id($categorie_id);
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
                    <form action="formdash.php" id="formulaire" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $categorie['id'] ?>">
    <div><input name="libelle" type="text" class="form-control my-2" placeholder="libelle" required value="<?= isset($categorie['libelle']) ? $categorie['libelle'] : '' ?>"></div>
    <!-- Champ pour sélectionner une nouvelle image -->
    <div class="custom-file my-2">
        <input type="file" class="custom-file-input" name="image">
        <label class="custom-file-label"></label>
    </div>
    <div><input name="active" type="text" class="form-control my-2" placeholder="Active" required value="<?= isset($categorie['active']) ? $categorie['active'] : '' ?>"></div>
    
    <input class="btn btn-dark my-2 w-100" type="submit" name="modifier" value="Modifier">
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "Template/footer.php";
