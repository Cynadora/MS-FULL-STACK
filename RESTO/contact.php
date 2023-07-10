<?php
// on importe le contenu du fichier "DAO.php"
include('DAO.php');
include_once "Template/header.php";
?>

<div class="img1"></div>

<?php
// Recup id plat
$plat_id = isset($_GET['id']) ? $_GET['id'] : null;

// recup données plat
$plat = null;
if ($plat_id) {
    $plat = get_plat_id($plat_id);
    //var_dump($plat);
}
?>


<div class="col-12">
    <div class="d-flex justify-content-center">
        <div class="w-50 w-md-50">
            <div>
                <h2 class="text-center">Contact</h2>
            </div>

      

 <div class="container commandes-form justify-content-center p-3">
    <div class="row">
        <div class="fondplat shadow col-12">


            <form action="script_contact.php" id="formulaire" method="post" enctype="multipart/form-data">
    
                <div><input name="nom" type="text" class="form-control my-2" placeholder="Nom" required></div>
                <div><input name="prenom" type="text" class="form-control my-2" placeholder="prénom" required></div>
                <div><input name="email" type="email" class="form-control my-2" placeholder="Adresse e-mail" required></div>
                <div><input name="telephone" type="text" class="form-control my-2" placeholder="Numéro de téléphone" required></div>
                <div><textarea name="demande" class="form-control my-2" placeholder="Votre demande" rows="5" required></textarea></div>

                <div><button class="btn btn-dark my-2 w-100" type="submit">Envoyer</button></div>

                

            </form>
            <hr class="text-dark">
            <div class="text-left">
                <span class="text-white">© Sylvie(); 2023</span>

                <br><br>

                <ul class="d-flex flex-row">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube" id="yy"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>

            </div>
        </div>
    </div>
</div>