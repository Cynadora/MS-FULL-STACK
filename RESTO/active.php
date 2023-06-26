<?php
include('db.php');

function get_active_categories() {
    // Connexion à la base de données
    $db = connexionBase();
//Sélectionne uniquement les catégories où la colonne active est yes (ce qui signifie qu'elles sont actives(présentes))
    // Requête pour obtenir les catégories actives/Le nbre max de catégories affichées est limité à 6

    $requeteCategories = $db->query("SELECT *
                                    FROM categorie
                                    WHERE active = YES
                                    LIMIT 6");

    // Récupération des catégories actives
    $categories = $requeteCategories->fetchAll(PDO::FETCH_OBJ);

    // Fermeture de la requête
    $requeteCategories->closeCursor();

    // Retourne les catégories
    return $categories;
}

// Appel de la fonction pour obtenir les catégories actives/récupère les catégories actives à afficher
$categories = get_active_categories();
?>

<!-- Affichage des éléments sur la page -->
<!DOCTYPE html>
<html>
<head>
    <title>Page catégorie</title>
</head>
<body>
    <h2>Catégories actives</h2>
    <!--Boucle foreach/Affichage des catégories       -->
    <ul>
        <?php foreach ($categories as $categorie): ?>
            <li><?php echo $categorie->libelle; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
