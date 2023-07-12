<?php
session_start();
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>
<div class="container login-fond">

    <!-- <div class="col-sm-6 col-sm-offset-3"> -->
    <!-- <div class="panel panel-default"> -->
    <!-- <div class="panel-body"> -->

    <div class="col-12">
        <div class="d-flex justify-content-center">
            <div class="w-50 w-md-50">
                <div>
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="container commandes-form1 justify-content-center p-3">
                    <div class="row">
                        <div class="fond-connexion col-12">
                            <!-- Les données du formulaire seront envoyées via la méthode POST / Le formulaire sera envoyé à la même page (url actuelle) lorsqu'il sera soumis -->
                            <form id="login-form" method="post" action="script_login.php" role="form">
                                <legend class="text-white">S'identifier</legend>
                                <!-- vérifie si la variable $message existe / si la variable $message existe un message d'erreur apparaît -->
                                <?php if (isset($message)) { ?>
                                    <p class="alert alert-danger text-center">
                                        <?php echo $message; ?>
                                    </p>
                                <?php } ?>


                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" name="username" placeholder="Entrer votre nom" required class="form-control" />
                                </div>
                                <br>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" name="password" placeholder="Entrer votre mot de passe" required class="form-control" />
                                </div>
                                <br>
                                <!-- <div class="form-group"> -->
                                <!-- <input type="submit" name="submit" value="Connexion" class="btn btn-warning btn-block" /> -->

                                <div><input class="btn btn-dark my-2 w-100" type="submit" value="Connexion"></div>
                                <div><input class="btn btn-dark my-2 w-100" type="submit" value="Retour"></div>

                                <!-- <a href="index.php" class="btn btn-success">Retour</a> -->

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <?php include_once "Template/footer.php"; ?>