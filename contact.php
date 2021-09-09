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
if(isset($_SESSION['idUser'])){
    $idUser = $_SESSION['idUser'];
    $getUser = mysqli_query($con,"SELECT * from users where idUser=".$idUser." ");
    $resultU = mysqli_fetch_assoc($getUser);
    $nomUser= $resultU['nomUser'];
    $prenomUser= $resultU['prenomUser'];
    $emailUser= $resultU['emailUser'];



?>
    <!-- Preloader -->
    <div id="preloader">
    <div class="loader"></div>
    </div>
    <!-- /Preloader -->
<?php include 'header.php'; ?>

<?php
if(isset($_POST['sendMsgCt'])){
    $idUser = $_SESSION['idUser'];
    $sujetCt = $_POST['sujetCt'];
    $messageCt = $_POST['messageCt'];
    $date = date('d-m-Y H:i:s');
    $insertIntoContact = mysqli_query($con,"INSERT into contact values('',".$idUser.",'".$date."','".$sujetCt."','".$messageCt."') ");
    if($insertIntoContact){
        header('location:/eventas/');
    }else{
        echo '<script>alert("Problème d\'envoyer le message !");</script>';        
    }
}


?>

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/core-img/logobg.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">Contact [ EVENTAS ]</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/EventAS/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                <div class="col-12 col-lg-6">
                    <div class="contact-us-thumb mb-100">
                        <img src="img/bg-img/44.jpg" alt="">
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-12 col-lg-6">
                    <div class="contact_from_area mb-100 clearfix">
                        <!-- Contact Heading -->
                        <div class="contact-heading">
                            <h4>Contacter Nous</h4>
                            <p>envoyer nous votre message</p>
                        </div>
                        <div class="contact_form">
                            <form action="#" method="post">
                                <div class="contact_input_area">
                                    <div class="row">
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="nomUserCt" id="name" placeholder="Votre Nom" required value="<?php echo $nomUser; ?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="prenomUserCt" id="name-2" placeholder="Votre Prénom" required value="<?php echo $prenomUser; ?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control mb-30" name="emailUserCt" id="email" placeholder="E-mail" required value="<?php echo $emailUser; ?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="sujetCt" id="subject" placeholder="Votre Sujet" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea  class="form-control mb-30" id="message" name="messageCt" cols="30" rows="6" placeholder="Message" required></textarea>
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn confer-btn" name="sendMsgCt">Envoyer Message <i class="zmdi zmdi-long-arrow-right"></i></button>
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

    <div class="map-area">
        <img src="img/map.png" width="100%" alt="">    
    </div>

    <!-- Contact Info Area -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact--info-area bg-boxshadow">
                    <div class="row">
                        <!-- Single Contact Info -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="single-contact--info text-center">
                                <!-- Contact Info Icon -->
                                <div class="contact--info-icon">
                                    <img src="img/core-img/icon-5.png" alt="">
                                </div>
                                <h5>JNANE AFYA , MARRAKECH</h5>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="single-contact--info text-center">
                                <!-- Contact Info Icon -->
                                <div class="contact--info-icon">
                                    <img src="img/core-img/icon-6.png" alt="">
                                </div>
                                <h5>06 66 66 66 66</h5>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="single-contact--info text-center">
                                <!-- Contact Info Icon -->
                                <div class="contact--info-icon">
                                    <img src="img/core-img/icon-7.png" alt="">
                                </div>
                                <h5>eventas@gmail.com</h5>
                            </div>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="single-contact--info text-center">
                                <!-- Contact Info Icon -->
                                <div class="contact--info-icon">
                                    <img src="img/core-img/icon-8.png" alt="">
                                </div>
                                <h5>www.eventas.com</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



<?php include 'footer.php' ?>

<?php
}else{
    header('location:login.php');
}
?>
</body>
</html>