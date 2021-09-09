<?php
$host = "localhost";
$username = "root";
$pass = "";
$dbname = "gestionevent";

$con = mysqli_connect($host,$username,$pass,$dbname)or die("error connexion Base Donne");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);



if(isset($_POST['sendMail'])){



    $idContact = $_POST['idContact'];
    $idUser = $_POST['idUser'];
    $getMessage = mysqli_query($con,"SELECT * from contact where idContact=".$idContact."  ");
    $resultCt = mysqli_fetch_assoc($getMessage);
    $getUser = mysqli_query($con,"SELECT * from users where idUser=".$idUser."  ");
    $resultU = mysqli_fetch_assoc($getUser);
    $emailContact = $resultU['emailUser'];
    $nomContact = $resultU['nomUser'].' '.$resultU['prenomUser'];
    $mysujet = $_POST['sujet'];
    $myMessage= $_POST['message'];
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'asmabayad1998@gmail.com';                     // SMTP username
        $mail->Password   = 'asmafati';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('asmabayad1998@gmail.com', 'EVENTAS');
        $mail->addAddress($emailContact, $nomContact);     // Add a recipient
        $mail->addReplyTo('asmabayad1998@gmail.com', 'INFO EVENTAS');    //repondre a 
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $mysujet;
        $mail->Body    = '<h3>Répondre a votre message </h3><br>
                        <li><strong>Date : </strong> '.$resultCt["dateEnvoie"].'</li>
                        <li><strong>Sujet : </strong> '.$resultCt["sujetContact"].'</li>
                        <li><strong>Message : </strong> '.$resultCt["messageContact"].'</li>

                        </ul><br/>
                        <h2>Réponse de EVENTAS</h2>
                        <br>
                        <ul>
                        <li><strong>Sujet : </strong> '.$mysujet.'</li>
                        <li><strong>Message : </strong> '.$myMessage.'</li>
                        </ul>
                        ';


        $mail->send();
        echo '<script>alert("Message Envoyer"); window.location.href="contact.php";</script>';
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }







}


?>