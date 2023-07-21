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

function get_categorie_all()
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $requete = "SELECT *
    FROM categorie";

    $temp = $db->prepare($requete);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}

function get_plat_id($plat_id)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $requete = "SELECT plat.*
    FROM plat
    JOIN categorie ON plat.id_categorie = categorie.id
    WHERE plat.id = :plat_id";
    $temp = $db->prepare($requete);
    $temp->bindValue(':plat_id', $plat_id, PDO::PARAM_INT);
    $temp->execute();

    return $temp->fetch(PDO::FETCH_ASSOC);
}



function get_plat_all()
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $requete = "SELECT *
    FROM plat";

    $temp = $db->prepare($requete);
    $temp->execute();

    return $temp->fetchAll(PDO::FETCH_ASSOC);
}


function insert_commande($id_plat, $quantite, $total, $etat, $nom_client, $telephone_client, $email_client, $adresse_client)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $sql = "INSERT INTO commande (id_plat, quantite, total, date_commande, etat, nom_client, telephone_client, email_client, adresse_client) VALUES (:id_plat, :quantite, :total, NOW(), :etat, :nom_client, :telephone_client, :email_client, :adresse_client)";
    $requete = $db->prepare($sql);
    $requete->bindValue(":id_plat", $id_plat);
    $requete->bindValue(":quantite", $quantite);
    $requete->bindValue(":total", $total);
    $requete->bindValue(":etat", $etat);
    $requete->bindValue(":nom_client", $nom_client);
    $requete->bindValue(":telephone_client", $telephone_client);
    $requete->bindValue(":email_client", $email_client);
    $requete->bindValue(":adresse_client", $adresse_client);
    $requete->execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}


function login_users($identifiant)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $sql = "SELECT *
            FROM utilisateur
            WHERE email = :identifiant";

    $requete = $db->prepare($sql);
    $requete->bindValue(":identifiant", $identifiant);
    $requete->execute();

    $user = $requete->fetch(PDO::FETCH_ASSOC);

    return $user;
}


function get_categorie_recherche($resultat)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $requete = $db->prepare("SELECT *
            FROM categorie
            WHERE libelle like :resultat ;");

    $requete->bindValue(":resultat", "%$resultat%");
    $requete->execute();

    $resultatcat = $requete->fetchAll();

    return $resultatcat;
}


function get_plat_recherche($resultat)
{
    $database = new Database();
    $db = $database->ConnexionBase();
    $requete = $db->prepare("SELECT *
            FROM plat
            WHERE libelle like :resultat ;");

    //  BindValue (lier, assigner une valeur)Dans ce cas précis, ":resultat" est le nom du paramètre dans la requête et "%$resultat%" est la valeur à laquelle le paramètre sera lié. 
    $requete->bindValue(":resultat", "%$resultat%");
    $requete->execute();

    $resultatplat = $requete->fetchAll(PDO::FETCH_ASSOC);

    return $resultatplat;
}

// dashbord//////////
function insertdash_categorie($id, $libelle, $image, $active)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $sql = "INSERT INTO categorie (id, libelle, image, active) VALUES (:id, :libelle, :image, :active)";
    $requete = $db->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->bindValue(":libelle", $libelle);
    $requete->bindValue(":image", $image);
    $requete->bindValue(":active", $active);
    $requete->execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}


function updatedash_categorie($id, $libelle, $image, $active)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $sql = "UPDATE categorie SET libelle = :libelle, image = :image, active = :active
            WHERE id = :id";
    $requete = $db->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->bindValue(":libelle", $libelle);
    $requete->bindValue(":image", $image);
    $requete->bindValue(":active", $active);
    $requete->execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}


function deletedash_categorie($id, $libelle, $image, $active)
{
    $database = new Database();
    $db = $database->ConnexionBase();

    $sql = "DELETE categorie (id, libelle, image, active) VALUES (:id, :libelle, :image, :active)
            WHERE categorie = 1";
    $requete = $db->prepare($sql);
    //bindValue pour connecter les variable php à leur paramètre sql
    $requete->bindValue(":id", $id);
    $requete->bindValue(":libelle", $libelle);
    $requete->bindValue(":image", $image);
    $requete->bindValue(":active", $active);
    $requete->execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function get_categorie_id($id)
{
    $database = new Database();
    $db = $database->ConnexionBase();
    $sql = "SELECT * FROM `categorie` WHERE id=:id";
    $requete = $db->prepare($sql);
    $requete->bindValue(":id", $id);
    $requete->execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}
