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

if(isset($_GET['idEvent']) && isset($_SESSION['idUser'])){

    $idEvent = $_GET['idEvent'];
    $idUser = $_SESSION['idUser'];
    $myDate = date('d-m-Y | H:i');
    $getalldata = mysqli_query($con,"SELECT * from evenements e, users u, categories c 
        where e.idEvent='".$idEvent."' and u.idUser='".$idUser."' and e.CategorieType=c.idCategorie ");
    $resultD = mysqli_fetch_assoc($getalldata);

?>

    <!-- Preloader -->
    <div id="preloader">
    <div class="loader"></div>
    </div>
    <!-- /Preloader -->
<?php include 'header.php'; ?>



<?php
if(isset($_POST['BtnreservationBtn'])){

    $idUserToReserve = $_POST['idUserToReserve'];
    $idEventToReserve = $_POST['idEventToReserve'];
    $ticketName = $_FILES['ticketupload']['name'];
    $ticketTmp = $_FILES['ticketupload']['tmp_name'];
    $newpathTicket = 'ticketFiles/'.$ticketName;
    $dateReserve = date('d-m-Y | H:i');
    if(move_uploaded_file($ticketTmp,'administration/'.$newpathTicket)){

        $insertIntoRes = mysqli_query($con,"INSERT into reservation values('','".$idUserToReserve."','".$idEventToReserve."'
        ,'".$newpathTicket."','".$dateReserve."') ");
        if($insertIntoRes){
            $getThisEvent = mysqli_query($con,"SELECT * FROM evenements where idEvent =".$idEventToReserve." ");
            $resultE = mysqli_fetch_assoc($getThisEvent);
            $nbPersonne = $resultE['nbPersonneEvent'];
            $restNb = intval($nbPersonne) - 1;

            $updateevent = mysqli_query($con,"UPDATE evenements set nbPersonneEvent=".$restNb." where idEvent =".$idEventToReserve." ");

            echo "<script>alert('Merci Pour Votre Reservation et Bienvenue !');</script>";
            header('location:/eventas/');
        }else{
            echo "<script>alert('Problème de reservation !');</script>";
        }

    }else{
        echo "<script>alert('Problème d\'ajouter ticket !');</script>";        
    }

}

?>

    <!-- Breadcrumb Area Start -->

    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">PRENEZ VOTRE TICKET [ EVENTAS ]</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/EventAS/">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Reservation</li>
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
                   <div class="col-md-5">
                        <div id="ticketPrint" class="single-ticket-pricing-table style-2 text-center mb-100 wow fadeInUp active" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                            <h6 class="ticket-plan"><?php echo $resultD['titreEvent']; ?></h6>
                            <!-- Ticket Icon -->
                            <div class="ticket-icon">
                                <img src="administration/<?php echo $resultD['newimagePath']; ?>" alt="">
                            </div>
                            <h2 class="ticket-price"><span>MAD</span><?php echo $resultD['prixticketEvent']; ?></h2>
                            <!-- Ticket Pricing Table Details -->
                            <hr>
                            <div class="ticket-pricing-table-details">
                                <p><i class="zmdi zmdi-alarm-check"></i> <strong><?php echo $resultD['dateDebutEvent']."  à  ".$resultD['dateFinEvent']; ?></strong></p>
                                <p><strong>Adresse : </strong> <?php echo $resultD['adresseEvent']; ?></p>
                                <p><strong>Catégorie D'evenement : </strong> <?php echo $resultD['nomCategorie']; ?></p>
                            </div>
                            <hr>
                            <div class="ticket-pricing-table-details">
                            <p><i class="zmdi zmdi-account"></i> Nom & Prénom : <strong><?php echo $resultD['nomUser']."  ".$resultD['prenomUser']; ?></strong></p>
                            <p><i class="zmdi zmdi-email"></i> Adresse Email : <strong><?php echo $resultD['emailUser']; ?></strong></p>
                            </div>
                        </div>
                        <a href="#" class="btn confer-btn w-100 mb-30" onclick="saveaspdf();">Enregistrer Ticket <i class="zmdi zmdi-long-arrow-right"></i></a>
                   </div>
                   <div class="col-md-1"></div>
                   <div class="col-md-4">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <label for="ticketupload">Envoyer Nous votre Ticket </label>
                            <input type="file" name="ticketupload" id="ticketupload">
                            <input type="hidden" name="idUserToReserve" value="<?php echo $resultD['idUser']; ?>">
                            <input type="hidden" name="idEventToReserve" value="<?php echo $resultD['idEvent']; ?>"><br>
                            <br><button type="submit" class="btn confer-btn" name="BtnreservationBtn">Reserver Votre Place <i class="zmdi zmdi-long-arrow-right"></i></button>                                                    
                        </form>
                   </div>
            </div>
        
        </div>
 </div>
    


<?php include 'footer.php' ?>


<script type="text/javascript" src="js/pdfjs.bundle.js"></script>

<script type="text/javascript">
    
    function saveaspdf() {  

        var idSession = <?php echo $_SESSION['idUser']; ?>;
        var idEvent = <?php echo $_GET['idEvent']; ?>;
        var date = '<?php echo $myDate; ?>';
        var element = document.getElementById('ticketPrint');
        var opt = {
        margin:       [0.8,0.8,0.2,0.8],
        filename:     'User_'+idSession+'Evenement_'+idEvent+'Date_'+date+'ticketPrint.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 1 },
        jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        // New Promise-based usage:
        var returned = html2pdf().set(opt).from(element).save();
    }

   
</script>



<?php   
}else{
    //echo "makaynch session makayn id event";
    header('location:login.php');
}
?>
</body>
</html>