<?php
// on importe le contenu du fichier "db.php"
include('db.php');

function categorie_populaire()
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $requeteCategories = "
SELECT categorie.libelle,categorie.image
FROM categorie
JOIN plat ON plat.id=plat.id_categorie
JOIN commande ON plat.id=commande.id_plat
GROUP BY categorie.libelle 
ORDER BY SUM(`quantite`),categorie.id DESC LIMIT 6
";

    $temp = $db->prepare($requeteCategories);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}

function plats_plus_vendus()
{
    $database = new Database();
    $db = $database->ConnexionBase();

    // Requête pour obtenir les plats les plus vendus
    $requetePlats = "
    SELECT plat.libelle, plat.image
    FROM plat
    JOIN commande ON plat.id = commande.id_plat
    GROUP BY plat.id
    ORDER BY COUNT(commande.id_plat) 
    DESC  LIMIT 1";
                           

    $temp = $db->prepare($requetePlats);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}