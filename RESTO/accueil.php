<?php
include('db.php');

function get_popular_categories() {
    // Connexion à la base de données
    $db = connexionBase();

    // Requête pour obtenir les catégories les plus populaires
    $requeteCategories = $db->query("SELECT categorie.libelle, COUNT(plat.id) AS total_plats
                                    FROM categorie
                                    JOIN plat ON plat.id_categorie = categorie.id
                                    GROUP BY categorie.id
                                    ORDER BY total_plats DESC
                                    LIMIT 6");

    // Récupération des catégories les plus populaires
    $categories = $requeteCategories->fetchAll(PDO::FETCH_OBJ);

    // Fermeture de la requête
    $requeteCategories->closeCursor();

    // Retourne les catégories
    return $categories;
}

function get_best_selling_plats() {
    // Connexion à la base de données
    $db = connexionBase();

    // Requête pour obtenir les plats les plus vendus
    $requetePlats = $db->query("SELECT plat.*
                               FROM plat
                               JOIN commande ON plat.id = commande.id_plat
                               GROUP BY plat.id
                               ORDER BY COUNT(commande.id_plat) DESC
                               LIMIT 6");

    // Récupération des plats les plus vendus
    $plats = $requetePlats->fetchAll(PDO::FETCH_OBJ);

    // Fermeture de la requête
    $requetePlats->closeCursor();

    // Retourne les plats
    return $plats;
}

// Appel des fonctions pour obtenir les catégories et les plats
//Récupére les catégories les + populaires et les plats les + vendus
$categories = get_popular_categories();
$plats = get_best_selling_plats();
?>

<!-- Affichage des éléments sur la page -->
<!DOCTYPE html>
<html>
<head>
    <title>Page accueil</title>
</head>
<body>
    <!-- Barre de recherche //////Formulaire de recherche présent avec un champ texte et un bouton
L'action du formulaire est dirigée vers la page////////////////// 'recherche.php////////////'-->

    <form action="plats.php" method="GET">
        <input type="text" name="query" placeholder="Rechercher un plat...">
        <button type="submit">Rechercher</button>
    </form>

    <!-- Catégories les plus populaires -->
    <h2>Catégories les plus populaires</h2>
    <!--Résultat affichés à l'aide de boucles 'foreach'-->
    <ul>
    <!--Utilisation de foreach ("pour chaque") pour parcourir un tableau de chaînes de caractères.-->
        <?php foreach ($categories as $categorie): ?>
            <!--Libellé de la catégorie est affiché avec echo-->
            <li><?php echo $categorie->libelle; ?></li>
        <?php endforeach; ?>
    </ul>
<!--Résultat stockés dans les variables '$categories' et '$plat'
 Plats les plus vendus -->
    <h2>Plats les plus vendus</h2>
    <ul>
        <?php foreach ($plats as $plat): ?>
            <li><?php echo $plat->nom; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
