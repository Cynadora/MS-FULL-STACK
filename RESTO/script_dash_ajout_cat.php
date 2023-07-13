<?php
// Démarrer la session
session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";


// Vérifie si la méthode de la requête est POST avant l'éxécution des instructions
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données :

    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $libelle = (isset($_POST['libelle']) && $_POST['libelle'] != "") ? $_POST['libelle'] : Null;
    $image = (isset($_POST['image']) && $_POST['image'] != "") ? $_POST['image'] : Null;
    $active = (isset($_POST['active']) && $_POST['active'] != "") ? $_POST['active'] : Null;


    try {
        
        $requete = $db->prepare("INSERT INTO categorie (libelle, image, active) VALUES (:libelle, :image, :active)");

        $requete->bindValue(":libelle", $libelle);
        $requete->bindValue(":image", $image);
        $requete->bindValue(":active", $active);
        $requete->execute();
        echo "<p>                        !</p>";


        //code susceptible de générer une exception/  
    } catch (Exception $e) {
        //Message d'erreur avec le détail de l'erreur   
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        //On termine le script en utilisant la fonction "die()" pour arrêter l'exécution 
        die("Fin du script (script_dash_ajout_cat.php)");
    }

    /////////// Si OK: redirection vers la page disc_detail.php/ ou redirection vers la page des disques
    header("Location: index.php");
    exit;
}

?>
