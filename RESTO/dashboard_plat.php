<?php
session_start();


if (!isset($_SESSION['nom_prenom'], $_SESSION['email'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit;
  }

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
// if/else raccourci/Récupération des résultats
//Si categorie_id est définie en utilisant la méthode GET si oui elle est assignée à la variable $categorie_id/ sinon la variable est définie comme null
// $categorie_id = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;


// Appel de la fonction
$plats = get_plat_all();

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST['modifier'])) {
    $categorie_id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $image = $_POST['image'];
    $active = $_POST['active'];
    $prix=$_POST['prix'];
    $description=$_POST['description'];

    /// Appel de la fonction (en écrivant son nom) pour obtenir les catégories/récupère les catégories à afficher/
    updatedash_plat($id, $libelle, $image, $active, $description, $prix);
}

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['supprimer'])) {
    $categorie_id = $_POST['id'];
    ////////////////////////////////////////////////////////////////

    deletedash_plat($id, $libelle, $image, $active);
}
?>

<h1>GESTION DES PLATS</h1>
<div class="tableoverflow">

    <table class="table table-bordered fs-2 text-center ">
        <thead>
            <tr>
                <th class="bg-dark text-light">ID</th>
                <th class="bg-dark text-light">Libellé</th>
                <th class="bg-dark text-light">Description</th>
                <th class="bg-dark text-light">Prix</th>
                <th class="bg-dark text-light">Image</th>
                <th class="bg-dark text-light">Catégorie</th>
                <th class="bg-dark text-light">Active</th>
                <th class="bg-dark text-light">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($plats as $unPlat) {
            ?>
                <tr>
                    <form action="formdash_plat.php?plat_id=<?= $unPlat['id'] ?>" id="formulaire" method="POST" enctype="multipart/form-data">

                        <td class="bg-info fs-4 "><?php echo $unPlat['id']; ?></td>
                        <td class="bg-info fs-4"><?php echo $unPlat['libelle']; ?></td>
                        <td class="bg-info fs-4"><?php echo $unPlat['description']; ?></td>
                        <td class="bg-info fs-4"><?php echo $unPlat['prix']; ?>€</td>
                        <td class="bg-info fs-4">
                            <img src='src/img/food/<?= $unPlat['image'] ?>' alt='<?= $unPlat['image'] ?>' class="img-cat-dashboard" />
                        </td>
                        <td class="bg-info fs-4"><?php echo $unPlat['catLibelle']; ?></td>
                        <td class="bg-info fs-4"><?php echo $unPlat['active']; ?></td>
                        <td class="bg-info fs-4">
                            <input class="btn btn-dark my-2 w-100" type="submit" name="modifier" value="Modifier">
                            <a href="script_dash_delete_plat.php" class="btn btn-dark my-2 w-100">Supprimer</a>
                        </td>
                    </form>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>