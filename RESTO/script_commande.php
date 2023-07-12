<?php
session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>


<div class="img1"></div>



<?php
// Vérifie si la méthode de la requête est POST avant l'éxécution des instructions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données :  
    $id_plat = (isset($_POST['id_plat']) && $_POST['id_plat'] != "") ? $_POST['id_plat'] : Null;
    $quantite = (isset($_POST['quantite']) && $_POST['quantite'] != "") ? $_POST['quantite'] : Null;
    $prix = (isset($_POST['prix']) && $_POST['prix'] != "") ? $_POST['prix'] : Null;
    $total = $prix * $quantite;
    $etat = "En préparation";
    $nom_client = (isset($_POST['nom_prenom']) && $_POST['nom_prenom'] != "") ? $_POST['nom_prenom'] : Null;
    $email_client = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
    $telephone_client = (isset($_POST['telephone']) && $_POST['telephone'] != "") ? $_POST['telephone'] : Null;
    $adresse_client = (isset($_POST['adresse']) && $_POST['adresse'] != "") ? $_POST['adresse'] : Null;

    try {
        insert_commande($id_plat, $quantite, $total, $etat, $nom_client, $telephone_client, $email_client, $adresse_client);
        echo "<p>La commande a bien été effectué !</p>";

        //code susceptible de générer une exception/  
    } catch (Exception $e) {
        //Message d'erreur avec le détail de l'erreur   
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        //On termine le script en utilisant la fonction "die()" pour arrêter l'exécution 
        die("Fin du script (script_commande.php)");
    }
}

// Si OK: redirection vers la page commande.php/ 

exit;
  
?>

<?php
        include_once "Template/commande.php";

?>