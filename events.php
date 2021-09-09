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
                        <h2 class="page-title">EVENEMENTS [ EVENTAS ]</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/EventAS/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Evenements</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

 <!-- Our Blog Area Start -->
 <div class="our-blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <select name="CategorieFiltre" class="form-control mb-30" onchange="location = this.value;">
                                        <option value='null' disabled selected>Choisir Categorie </option>
                                        <option value='events.php'>TOUS </option>
                                        <optgroup label="Liste Categorie">
                                        <?php
                                            $getAllCat= mysqli_query($con,"SELECT * from categories order by idCategorie desc ");
                                            while ($resCat = mysqli_fetch_assoc($getAllCat)) {
                                                ?>
                                                <option value="events.php?idCatFil=<?php echo $resCat['idCategorie']; ?>" ><?php echo $resCat['nomCategorie']; ?></option>
                                            
                                          <?php  }
                                        ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                    
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Single Blog Area -->
                

                <?php

                        if(isset($_GET['idCatFil'])){
                            $idCatFil = $_GET['idCatFil'];
                            $getFiltredEvent=mysqli_query($con,"SELECT * from evenements where CategorieType='".$idCatFil."' order by idEvent desc ");

                            while ($resFiltr=mysqli_fetch_assoc($getFiltredEvent)){
                                    echo '<div class="col-12 col-md-6 col-xl-4">
                                    <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms">
                                        <!-- Single blog Thumb -->
                                        <div class="single-blog-thumb">
                                            <img src="administration/'.$resFiltr['newimagePath'].'" style="height: 220px;width: 100%;" alt="">
                                        </div>
                                        <div class="single-blog-text text-center">
                                            <a class="blog-title" href="detailEvent.php?idEvent='.$resFiltr['idEvent'].'">'.$resFiltr['titreEvent'].'</a>
                                            <div class="post-meta">
                                                <a class="post-date" href="#"><i class="zmdi zmdi-alarm-check"></i> '.$resFiltr['dateDebutEvent'].'</a>
                                                <a class="post-author" href="#">à</a>
                                                <a class="post-date" href="#"><i class="zmdi zmdi-alarm-check"></i> '.$resFiltr['dateFinEvent'].'</a>
                                            </div>
                                            <p>'.substr($resFiltr['descriptionEvent'],0,20).'....</p>
                                        </div>
                                        <div class="blog-btn">
                                            <a href="detailEvent.php?idEvent='.$resFiltr['idEvent'].'"><i class="zmdi zmdi-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>';
                            }




                        }else{  

                            $getFiltredEvent=mysqli_query($con,"SELECT * from evenements order by idEvent desc ");

                            while ($resFiltr=mysqli_fetch_assoc($getFiltredEvent)){
                                    echo '<div class="col-12 col-md-6 col-xl-4">
                                    <div class="single-blog-area style-2 wow fadeInUp" data-wow-delay="300ms">
                                        <!-- Single blog Thumb -->
                                        <div class="single-blog-thumb">
                                            <img src="administration/'.$resFiltr['newimagePath'].'" style="height: 220px;width: 100%;" alt="">
                                        </div>
                                        <div class="single-blog-text text-center">
                                            <a class="blog-title" href="detailEvent.php?idEvent='.$resFiltr['idEvent'].'">'.$resFiltr['titreEvent'].'</a>
                                            <div class="post-meta">
                                                <a class="post-date" href="#"><i class="zmdi zmdi-alarm-check"></i> '.$resFiltr['dateDebutEvent'].'</a>
                                                <a class="post-author" href="#">à</a>
                                                <a class="post-date" href="#"><i class="zmdi zmdi-alarm-check"></i> '.$resFiltr['dateFinEvent'].'</a>
                                            </div>
                                            <p>'.substr($resFiltr['descriptionEvent'],0,20).'....</p>
                                        </div>
                                        <div class="blog-btn">
                                            <a href="detailEvent.php?idEvent='.$resFiltr['idEvent'].'"><i class="zmdi zmdi-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>';
                            }



                        }

                ?>
                

                
                
                



            </div>
        </div>
 </div>
    


<?php include 'footer.php' ?>
</body>
</html>