<?php
session_start();
$host = "localhost";
$username = "root";
$pass = "";
$dbname = "eventas";

$con = mysqli_connect($host,$username,$pass,$dbname)or die("error connexion Base Donne");



?>