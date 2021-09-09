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
<style>

</style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
    <div class="loader"></div>
    </div>
    <!-- /Preloader -->
<?php include 'header.php'; ?>

    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
          
            <?php
                $getEventsSlider= mysqli_query($con,"SELECT * from evenements e,categories c where e.CategorieType=c.idCategorie order by idEvent desc limit 3");
                while ($resE =mysqli_fetch_assoc($getEventsSlider)) {
                ?>



<div class="single-welcome-slide bg-img bg-overlay jarallax" style="background-image: url(administration/<?php echo $resE['newimagePath']; ?>);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text-two text-center">
                                    <h5 data-animation="fadeInUp" data-delay="100ms"><?php echo $resE['titreEvent']; ?></h5>
                                    <h2 data-animation="fadeInUp" data-delay="300ms"><?php echo $resE['nomCategorie']; ?></h2>
                                    <!-- Event Meta -->
                                    <div class="event-meta" data-animation="fadeInUp" data-delay="500ms">
                                        <a class="event-date" href="#"><i class="zmdi zmdi-alarm-check"></i> <?php echo $resE['dateDebutEvent']; ?></a>
                                        <a class="event-author" href="#"> à</a>
                                        <a class="event-author" href="#"><i class="zmdi zmdi-alarm-check"></i> <?php echo $resE['dateDebutEvent']; ?></a>
                                    </div>
                                    <div class="hero-btn-group" data-animation="fadeInUp" data-delay="700ms">
                                        <a href="detailEvent.php?idEvent=<?php echo $resE['idEvent']; ?>" class="btn confer-btn m-2">View more <i class="zmdi zmdi-long-arrow-right"></i></a>
                                        <a href="reserver.php?idEvent=<?php echo $resE['idEvent']; ?>" class="btn confer-btn m-2">Get Tickets <i class="zmdi zmdi-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?>
            <!-- Single Slide -->
          


        </div>

        <!-- Scroll Icon -->
        <div class="icon-scroll" id="scrollDown"></div>
    </section>
    <!-- Welcome Area End -->

   <!-- Our Schedule Area Start -->
    <section class="our-schedule-area section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Heading -->
                <div class="col-12">
                    <div class="section-heading-2 text-center wow fadeInUp" data-wow-delay="300ms">
                        <p>[ EVENTAS ]</p>
                        <h4>Evenements Récents </h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <!-- Tab Content -->
                    <div class="tab-content" id="conferScheduleTabContent">
                        <div class="tab-pane fade show active" id="step-one" role="tabpanel" aria-labelledby="monday-tab">
                            <!-- Single Tab Content -->
                            <div class="single-tab-content">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Single Schedule Area -->

                                        <?php

                                            $geteventrecent = mysqli_query($con,"SELECT * from evenements order by idEvent desc limit 5 ");
                                            while ($resultE=mysqli_fetch_assoc($geteventrecent)) {
                                                    echo '<div class="single-schedule-area d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="300ms">
                                                    <!-- Single Schedule Thumb and Info -->
                                                    <div class="single-schedule-tumb-info d-flex align-items-center">
                                                        <!-- Single Schedule Thumb -->
                                                        <div class="single-schedule-tumb">
                                                            <img src="administration/'.$resultE["newimagePath"].'" alt="" width="120" height="120">
                                                        </div>
                                                        <!-- Single Schedule Info -->
                                                        <div class="single-schedule-info">
                                                            <h6>'.$resultE["titreEvent"].'</h6>
                                                            <p>Par <span>EVENTAS</span> / Marrakech</p>
                                                        </div>
                                                    </div>
                                                    <!-- Single Schedule Info -->
                                                    <div class="schedule-time-place">
                                                        <p><i class="zmdi zmdi-time"></i> '.$resultE["dateDebutEvent"].' à '.$resultE["dateFinEvent"].'</p>
                                                        <p><i class="zmdi zmdi-map"></i> '.$resultE["adresseEvent"].'</p>
                                                    </div>
                                                    <!-- Schedule Btn -->
                                                    <a href="detailEvent.php?idEvent='.$resultE["idEvent"].'" class="btn confer-btn">View More <i class="zmdi zmdi-long-arrow-right"></i></a>
                                                </div> ';
                                            }


                                        ?>

                                        

                                    </div>

                                    <!-- More Schedule Btn -->
                                    <div class="col-12">
                                        <div class="more-schedule-btn text-center mt-50 wow fadeInUp" data-wow-delay="300ms">
                                            <a href="events.php" class="btn confer-gb-btn">LISTE DES EVENEMENTS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Schedule Area End -->



    <?php include 'footer.php' ?>
</body>
</html>