<?php
session_start();

// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>
<div class="img1"></div>
<h3>CATEGORIE ACTIVE</h3>
<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    //Si la valeur de 'page' est <=0 ou si ce n'est pas un nombre entier   
    if ($page <= 0 || !ctype_digit($page)) {
        //Alors la valeur de '$page' est définie à 1      
        $page = 1;
    }
} else {
    $page = 1;
}

$limit = 6;
$offset = ($page - 1) * $limit;


// Appel de la fonction (en écrivant son nom) pour obtenir les catégories active/récupère les catégories active à afficher/
$categories = categorie_active($offset, $limit);

?>
<div class="container">
    <div class="row w-100 mb-5">
        <?php

        // On vérifie si la variable '$categories' n'est pas vide (contient des éléments). Si '$categories' n'est pas vide, cela signifie qu'il y a des catégories à afficher.
        // Si la variable '$categories' n'est pas vide, alors le code à l'intérieur du bloc 'if' sera exécuté.

        if (!empty($categories)) {

            // 'foreach' parcourt chaque élément de la variable '$categories'. 
            // Pour chaque élément, la valeur de cet élément est assignée à la variable '$uneCategorie', et le code à l'intérieur du bloc 'foreach' est exécuté.       
            foreach ($categories as $uneCategorie) :
        ?>
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <a class="plat1 position-relative z-2" href="platcat.php?id=<?= $uneCategorie['id'] ?>">
                            <?= $uneCategorie['libelle'] ?>
                        </a>
                    </div>
                    <img src="src/img/category/<?= $uneCategorie['image'] ?>" alt="Categorie <?= $uneCategorie['libelle'] ?> 
                    <?= $uneCategorie['active'] ?>" class="img2">
                </div>
            <?php endforeach; ?>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <a class="btn-nav col-6 button" href="?page=<?= $page - 1 ?>">Précédent</a>
        <a class="btn-nav col-6 button" href="?page=<?= $page + 1 ?>">Suivant</a>
    </div>
</div>

<?php
        }
        include_once "Template/footer.php";
?>