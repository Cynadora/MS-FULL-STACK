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
ORDER BY SUM(`quantite`),categorie.id DESC LIMIT 6";


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
    DESC  LIMIT 3";


    $temp = $db->prepare($requetePlats);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}


function categorie_active($offset, $limit)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $requeteCategories = "
SELECT categorie.id, categorie.libelle, categorie.image, categorie.active
FROM categorie
WHERE active = 'YES'
LIMIT :offset, :limit";

    $temp = $db->prepare($requeteCategories);
    $temp->bindValue(':limit', $limit, PDO::PARAM_INT);
    $temp->bindValue(':offset', $offset, PDO::PARAM_INT);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}


function plat_par_categorie($offset, $limit, $id)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    // Requête pour obtenir les plats par categorie
    $requetePlats = "
    SELECT plat.libelle, plat.image, plat.description, plat.prix, plat.id
    FROM plat
    JOIN categorie ON plat.id_categorie = categorie.id
    WHERE plat.id_categorie = :id
    LIMIT :offset, :limit";
    $temp = $db->prepare($requetePlats);
    $temp->bindValue(':limit', $limit, PDO::PARAM_INT);
    $temp->bindValue(':offset', $offset, PDO::PARAM_INT);
    $temp->bindValue(':id', $id, PDO::PARAM_INT);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}





//function passer_commande()
//{
    //$database = new Database();
    //$db = $database->ConnexionBase();

    // Requête pour obtenir les plats 
    //$requetePlats = "
    //SELECT plat.libelle, plat.image, plat.description, plat.prix
    //FROM plat
    //LIMIT 6";


    //$temp = $db->prepare($requetePlats);
    //$temp->execute();

    //return $temp->fetchAll(PDO::FETCH_ASSOC);

   // Appel de la fonction pour récupérer les plats à afficher
    //$temp = get_plats(); 
//}