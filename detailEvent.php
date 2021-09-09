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
if(isset($_GET['idEvent'])){
$getEventDetail = mysqli_query($con,"SELECT * from evenements e,categories c where e.CategorieType=c.idCategorie and e.idEvent=".$_GET['idEvent']." ");
$resultEV = mysqli_fetch_assoc($getEventDetail);





?>   


    <!-- Preloader -->
    <div id="preloader">
    <div class="loader"></div>
    </div>
    <!-- /Preloader -->
<?php include 'header.php'; ?>



    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/core-img/logobg.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">[ EVENTAS ] , <?php echo $resultEV['titreEvent']; ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/EventAS/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $resultEV['titreEvent']; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    






    <section class="confer-blog-details-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Post Details Area -->
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="pr-lg-4 mb-100">
                        <!-- Post Content -->
                        <div class="post-details-content">

                            <!-- Post Thumbnail -->
                            <div class="post-blog-thumbnail mb-30">
                                <img src="administration/<?php echo $resultEV['newimagePath'] ?>" alt="" width="1200" height="250">
                            </div>

                            <!-- Post Title -->
                            <h4 class="post-title"><?php echo $resultEV['titreEvent']; ?></h4>

                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a class="post-date" href="#"><i class="zmdi zmdi-alarm-check"></i> <?php echo $resultEV['dateDebutEvent']; ?></a>
                                <a class="post-date" href="#"><strong>à</strong></a>
                                <a class="post-date" href="#"><i class="zmdi zmdi-alarm-check"></i> <?php echo $resultEV['dateFinEvent']; ?></a>
                                <a class="post-author" href="#"><i class="zmdi zmdi-favorite-account"></i>  <?php echo "<strong>".$resultEV['nbPersonneEvent']."</strong> Place Reste"; ?></a>
                            
                            </div>

                            <p><strong>Catégorie : </strong><?php echo $resultEV['nomCategorie']; ?></p>
                            <p><strong>Description : </strong><?php echo $resultEV['descriptionEvent']; ?></p>
                            <p><strong>adresse  : </strong><?php echo $resultEV['adresseEvent']; ?></p>
                        </div>

                       
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="confer-sidebar-area mb-100">

                        

                        <!-- Single Widget Area -->
                        <div class="single-widget-area">
                                <div class="single-ticket-pricing-table style-2 text-center mb-100 wow fadeInUp active" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                <h6 class="ticket-plan"> réserver Ticket</h6>
                                <!-- Ticket Icon -->
                                <div class="ticket-icon">
                                    <img src="img/core-img/p1.png" alt="">
                                </div>
                                <h2 class="ticket-price"><span>MAD</span><?php echo $resultEV['prixticketEvent']; ?></h2>
                                <a href="reserver.php?idEvent=<?php echo $resultEV['idEvent']; ?>" class="btn confer-btn w-100 mb-30">Réserver Place <i class="zmdi zmdi-long-arrow-right"></i></a>
                                <!-- Ticket Pricing Table Details -->
                                <div class="ticket-pricing-table-details">
                                    <p><i class="zmdi zmdi-check"></i> <strong><?php echo $resultEV['dateDebutEvent']; ?></strong></p>
                                    <p>à </p>
                                    <p><i class="zmdi zmdi-check"></i> <strong><?php echo $resultEV['dateFinEvent']; ?></strong></p>
                                    <p><i class="zmdi zmdi-check"></i> <strong><?php echo $resultEV['nbPersonneEvent']; ?></strong> Places</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


















<?php include 'footer.php' ?>

<?php
}else{
    header('location:/Eventas/');
}
?>
</body>
</html>