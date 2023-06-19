<?php
// on importe le contenu du fichier "db.php"

include ('DAO.php');

// on clôt la requête en BDD
include_once "Template/header.php";
?>



<form action="categorie.php" method="GET">
    <input type="text" name="recherche" placeholder="Recherche..." />
    <input type="submit" value="Search" />
</form>



<div class="img1"></div>

<h3>CATEGORIES</h3>
<?php
//Pour appeler la requête
$categories = categorie_populaire();

if (!empty($categories)) {
    foreach ($categories as $categorie):
        ?>
        <div>
            <img  src="src/img/category/<?= $categorie['image'] ?>" alt="Categorie <?= $categorie['libelle'] ?>" class="img2">
        </div>


        <?php
    endforeach;
}
?>





<br><br><br><br><br><br><br><br><br><br>

<?php
include_once "Template/footer.php";
?>