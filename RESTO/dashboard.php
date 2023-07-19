<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
// if/else raccourci/Récupération des résultats
//Si categorie_id est définie dans l'url en utilisant la méthode GET si oui elle est assignée à la variable $categorie_id/ sinon la variable est définie comme null
// $categorie_id = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;


// Appel de la fonction
$categories = get_categorie_all();

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST['modifier'])) {
    $categorie_id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $image = $_POST['image'];
    $active = isset($_POST['active']);
    /// Appel de la fonction (en écrivant son nom) pour obtenir les catégories/récupère les catégories à afficher/
    updatedash_categorie($id, $libelle, $image, $active);
}

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['supprimer'])) {
    $categorie_id = $_POST['id'];

    deletedash_categorie($id, $libelle, $image, $active);
}
?>

<h1>Gestion Catégories</h1>
<div class="tableoverflow">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Image</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>

        <?php
        foreach ($categories as $uneCategorie) {
        ?>
            <tr>
                <td class="bg-info"><?php echo $uneCategorie['id']; ?></td>
                <td class="bg-info"><?php echo $uneCategorie['libelle']; ?></td>
                <td class="bg-info"><img src='src/img/category/<?= $uneCategorie['image'] ?>' alt='<?= $uneCategorie['image'] ?>' class="img-cat-dashboard" /></td>
                <td class="bg-info"><?php echo $uneCategorie['active']; ?></td>
                <td class="bg-info">

                    <form action="formdash.php" id="formulaire" method="POST" enctype="multipart/form-data">
                        <div><input class="btn btn-dark my-2 w-100" type="submit" name="modifier" value="Modifier"></div>
                        <div><input class="btn btn-dark my-2 w-100" type="su" name="supprimer" value="Supprimer"></div>

                    </form>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>