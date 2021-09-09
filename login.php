<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EVENTAS</title>
    <link rel="icon" href="./img/core-img/favicon.png">

<!-- Stylesheet -->
<link rel="stylesheet" href="style.css">
<?php include 'connexion.php'; ?>
</head>
<body>

<?php
if(!isset($_SESSION['idUser'])){

    
?>

    <!-- Preloader -->
    <div id="preloader">
    <div class="loader"></div>
    </div>
    <!-- /Preloader -->
<?php include 'header.php'; ?>


<?php
if(isset($_POST['sinscrireBtn'])){
    $NomUser = $_POST['NomUser'];
    $PrenomUser = $_POST['PrenomUser'];
    $EmailUser = $_POST['EmailUser'];
    $PasseUser = $_POST['PasseUser'];

    $existEmail = mysqli_query($con,"SELECT * from users where emailUser='".$EmailUser."' ");
    $nbrows = mysqli_num_rows($existEmail);
    if($nbrows < 1){
        // makaynch had email 
        $insertUser = mysqli_query($con,"INSERT into users values('','".$NomUser."','".$PrenomUser."','".$EmailUser."','".$PasseUser."') ");
        if($insertUser){
            $getEmailCURRENT = mysqli_query($con,"SELECT * from users where emailUser='".$EmailUser."' ");
            $resultU = mysqli_fetch_assoc($getEmailCURRENT);
            $_SESSION['idUser'] = $resultU['idUser'];
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }else{
            echo '<script>alert("probleme inscription !");</script>';
        }
    }else{
        // kayn had email
        echo '<script>alert("Email déja utiliser !");</script>';
    }
}


if(isset($_POST['loginBtn'])){
    $emailLogin = $_POST['emailLogin'];
    $passLogin = $_POST['passLogin'];
    $getEmail = mysqli_query($con,"SELECT * FROM users where emailUser='".$emailLogin."' and passUser='".$passLogin."' ");
    $nbrows = mysqli_num_rows($getEmail);
    $resultU=mysqli_fetch_assoc($getEmail);

    if($nbrows < 1){
        echo '<script>alert("email ou mot de passe incorrect !");</script>';
    }else{
        $_SESSION['idUser']= $resultU['idUser'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }




}


?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/core-img/logobg.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">Connecter-Vous [ EVENTAS ]</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/EventAS/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Connecter-Vous</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    
    <!-- Contact Us Area Start -->
    <section class="contact--us-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Contact Us Thumb -->
                <!-- Contact Form -->
                <div class="col-5 col-lg-5" align="center">
                    <div class="contact_from_area mb-100 clearfix">
                        <!-- Contact Heading -->
                        <div class="contact-heading">
                            <h4>S'inscrire</h4>
                            <p>Créer un nouveau compte sur EVENTAS</p>
                        </div>
                        <div class="contact_form">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="contact_input_area">
                                    <div class="row">
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="NomUser"  placeholder="Votre Nom" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="PrenomUser"  placeholder="Votre Prénom " required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control mb-30" name="EmailUser" placeholder="adresse email" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control mb-30" name="PasseUser"  placeholder="Mot de passe">
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn confer-btn" name="sinscrireBtn">S'inscrire <i class="zmdi zmdi-long-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <div class="col-2"></div>
                <div class="col-5 col-lg-5" align="center">
                    <div class="contact_from_area mb-100 clearfix">
                        <!-- Contact Heading -->
                        <div class="contact-heading">
                            <h4>CONNECTER-VOUS</h4>
                            <p>Pour reserver un evenement il faut se connecter d'abord</p>
                        </div>
                        <div class="contact_form">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="contact_input_area">
                                    <div class="row">
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="emailLogin" placeholder="adresse Email" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control mb-30" name="passLogin" placeholder="Mot de Passe" required>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn confer-btn" name="loginBtn">Se connecter <i class="zmdi zmdi-long-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us Area End -->



<?php include 'footer.php' ?>
<?php    
}else{
    header('location:/Eventas/');
}
?>

</body>
</html>