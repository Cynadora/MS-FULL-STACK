<?php
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = (isset($_POST['username']) && $_POST['username'] != "") ? $_POST['username'] : null;
    $password = (isset($_POST['password']) && $_POST['password'] != "") ? $_POST['password'] : null;

    // Vérification de connexion 
    if ($username === "admin" && $password === "password") {
        // Connexion réussie, redirection
        header("Location: index.php");
        exit;
    } else {
        // Identifiants incorrects, Message d'erreur
        $message = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
    <div class="container" style="margin-top: 30px;">

        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">


                    <!-- Les données du formulaire seront envoyées via la méthode POST / Le formulaire sera envoyé à la même page (url actuelle) lorsqu'il sera soumis -->
                    <form id="login-form" method="post" action="" role="form"></form>
                        <legend>Connexion</legend>



                        <!-- vérifie si la variable $message existe / si la variable $message existe un message d'erreur apparaît -->
                        <?php if (isset($message)) { ?>
                            <p class="alert alert-danger text-center">
                                <?php echo $message; ?>
                            </p>
                        <?php } ?>

                        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="w-100 w-md-50">
                    <div>
                        <h2 class="text-center">Login</h2>
                    </div>

                    
                        <div><input name="nom_prenom" type="text" class="form-control my-2" placeholder="Nom d'utilisateur" required></div>
                        <div><input name="password" type="password" class="form-control my-2" placeholder="Mot de passe" required></div>
                        <div><input name="" type="submit" class="form-control my-2" placeholder="Connexion" required></div>
                        

                        <div><input class="btn btn-dark my-2 w-100" type="submit" value="Envoyer"></div>
                        <div><input class="btn btn-dark my-2 w-100" type="submit" value="Retour"></div>
                    </form>
                </div>
            </div>
        </div>

                       
                            <!-- <a href="index.php" class="btn btn-success">Retour</a> -->

                        </div>
                
                </div>
            </div>
        </div>
    </div>
</body>

</html>