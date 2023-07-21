<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
// if/else raccourci/Récupération des résultats
//Si categorie_id est définie en utilisant la méthode GET si oui elle est assignée à la variable $categorie_id/ sinon la variable est définie comme null
// $categorie_id = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;


// Appel de la fonction
$categories = get_categorie_all();

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST['modifier'])) {
    $categorie_id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $image = $_POST['image'];
    $active = $_POST['active'];
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
    <table class="table table-bordered fs-2 text-center ">
        <thead>
            <tr>
                <th class="bg-dark text-light">ID</th>
                <th class="bg-dark text-light">Libellé</th>
                <th class="bg-dark text-light">Image</th>
                <th class="bg-dark text-light">Active</th>
                <th class="bg-dark text-light">Action</th>
            </tr>
        </thead>

        <?php
        foreach ($categories as $uneCategorie) {
        ?>

            <tr>
                <form action="formdash.php" id="formulaire" method="POST" enctype="multipart/form-data">

                    <td class="bg-info fs-4 "><?php echo $uneCategorie['id']; ?></td>
                    <td class="bg-info fs-4"><?php echo $uneCategorie['libelle']; ?></td>
                    <td class="bg-info fs-4">
                        <img src='src/img/category/<?= $uneCategorie['image'] ?>' alt='<?= $uneCategorie['image'] ?>' class="img-cat-dashboard" />
                       
                    </td>
                    
                    <td class="bg-info fs-4"><?php echo $uneCategorie['active']; ?></td>
                    <td class="bg-info fs-4">

                        <a href="formdash.php?categorie_id=<?= $uneCategorie['id'] ?>" class="btn btn-dark my-2 w-100">Modifier</a>
                        <a href="formdash.php" class="btn btn-dark my-2 w-100">Supprimer</a>

                </form>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>