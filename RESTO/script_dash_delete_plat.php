<?php
// Démarrer la session
session_start();

if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0)
   // Si l'ID n'est pas défini ou invalide, redirection vers la page index.php
   header("Location: index.php");
   exit;
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";

try {
    // Construction de la requête DELETE sans injection SQL :
    $requete = $db->prepare("DELETE FROM plat WHERE id = ?");
    // on ajoute l'ID du disque passé dans l'url en paramètre et on exécute: 
    $requete->execute(array($_GET["id"]));
        // on clôt la requête en BDD
    $requete->closeCursor();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    die("Fin du script (script_dash_delete_plat.php)");
}

// Si la suppression est effectuée avec succès, redirection vers la page index.php
header("Location: index.php");
exit;
?>