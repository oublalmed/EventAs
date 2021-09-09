<?php
session_start();


if(isset($_SESSION['idUser'])){
        session_destroy();
    header('location:/Eventas/');

}else{
    header('location:/Eventas/');
}


?>