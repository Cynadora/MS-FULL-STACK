<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

// recup données form
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$demande=$_POST['demande'];

//Message
$mess = "Nom: $nom <br>";
$mess .= "Prénom: $prenom <br>";
$mess .= "email: $email <br>";
$mess .= "telephone: $telephone <br>";
$mess .= "demande: $demande <br>";

//config phpmailer
$mail = new PHPMailer(true);
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->SMTPAuth = false;
$mail->Port = 1025; 

//Mail expéditeur
$mail->setFrom($email, 'The District Contact');
//Mail destinataire
$mail->addAddress("thedistrict@example.com"); 

//body mail
$mail->isHTML(true);
$mail->Subject = 'Message de contact';
$mail->Body = "$mess";

//envoi
if ($mail){
    try {
        $mail->send();
        header("location: contact.php");
        } catch (Exception $e) {
        echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
        }
    }
