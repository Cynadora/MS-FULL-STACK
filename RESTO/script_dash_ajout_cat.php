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

// En cas d'erreur, on renvoie vers le formulaire
if ($libelle == Null || $image == Null || $active == Null) {
    header("Location: formdash.php?id=" . $id);
    exit;
}

    // Gestion de l'upload de l'image
    $filename = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowedExtensions = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    
        //Récupère les infos du fichier téléchargé dans les variables '$filename', '$filetype' et '$filesize'
        //$filename contient le nom du fichier tel qu'il était lorsqu'il a été téléchargé   
        $filename = $_FILES["image"]["name"];
        //$filetype contient le type MIME du fichier téléchargé/
        $filetype = $_FILES["image"]["type"];
        //$filesize contient la taille du fichier en octets
        $filesize = $_FILES["image"]["size"];
    
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowedExtensions)) {
            die("Erreur : Veuillez sélectionner un format de fichier valide.");
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Erreur: La taille du fichier dépasse la limite autorisée.");
        }

        if (in_array($filetype, $allowedExtensions)) {
            $image = $filename;
            $targetPath = "./assets/img/" . $filename;
            if (file_exists($targetPath)) {
                echo $filename . " Ce fichier existe déjà.";
            } else {
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);
                echo "Bravo votre fichier a été téléchargé avec succès.";
            }
        } else {
            echo "Erreur: Problème lors du téléchargement du fichier. Veuillez réessayer.";
        }
    } else {
        echo "Erreur: " . $_FILES["image"]["error"];
    }
    
    try {
     //Préparer la requête  
     
     $requete = $db->prepare("INSERT INTO categorie (id, libelle, image, active) VALUES (:id, :libelle, :image, :active)");
        $requete = $db->prepare();
//bindValue pour connecter les variable php à leur paramètre sql
        $requete->bindValue(":id", $id);  
        $requete->bindValue(":libelle", $libelle);
        $requete->bindValue(":image", $image);
        $requete->bindValue(":active", $active);
     //Exécution de la requête     
        $requete->execute();
        echo "<p>L'ajout a bien été effectué !</p>";


        //code susceptible de générer une exception/  
    } catch (Exception $e) {
        //Message d'erreur avec le détail de l'erreur 
        echo "Erreur : " . $e->getMessage() . "<br>";
        /////////////echo "Erreur : " . $e->errorInfo()[2] . "<br>";
        //On termine le script en utilisant la fonction "die()" pour arrêter l'exécution 
        die("Fin du script (script_dash_ajout_cat.php)");
    }

    /////////// Si OK: redirection vers la page index.php/ ou redirection vers la page des disques
    header("Location: index.php");
    exit;
}

?>
