<?php
session_start();

include('DAO.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $identifiant = $_POST['username'];
    $motDePasse = $_POST['password'];

    $user = login_users($identifiant);
    if ($user) {
        $_SESSION['nom_prenom'] = $user['nom_prenom'];
        $_SESSION['email'] = $user['email'];
        if (password_verify($motDePasse, $user['password'])) {
            header("location: index.php");
            exit();
        } else {
            $_SESSION['errorMessage'] = "Mauvais mot de passe ou mauvais email";
            header("location: login.php");
            exit();
        }
    } else {
        $_SESSION['errorMessage'] = "Mauvais mot de passe ou mauvais email";
        header("location: login.php");
        exit();
    }
} else {
    header("login.php");
    exit();
}
