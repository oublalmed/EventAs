<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

session_start();


$host = "localhost";
$username = "root";
$pass = "";
$dbname = "gestionevent";

$con = mysqli_connect($host,$username,$pass,$dbname)or die("error connexion Base Donne");



?>