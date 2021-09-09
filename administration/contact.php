<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration </title>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>

</head>
<body>

<?php
include 'connexion.php';
if(isset($_SESSION['idAdmin'])){

?>


<?php
if(isset($_GET['idcontactSupp'])){
    $idcontactSupp = $_GET['idcontactSupp'];
    $deleteContact = mysqli_query($con,"DELETE from contact where idContact=".$idcontactSupp." ");
    if($deleteContact){
        header('location:contact.php');
    }else{
        echo "<script>alert('Problème supprimer contact !');</script>";
    }


}


?>


<div class="page-container">	
        <div class="left-content">
            <div class="mother-grid-inner">
                 <?php include 'header.php';?>
                 <div class="inner-block">
                    <div class="blank">
                        <h2>Liste Messages Contact</h2>
                        <div class="blankpage-main col-md-8">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Email </th>
                                    <th>Date Envoi </th>
                                    <th>Sujet </th>
                                    <th>Message</th>
                                    <th>Répondre</th>
                                    <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $getallcontactdata = mysqli_query($con,"SELECT * from contact c, users u where c.idUser=u.idUser  order by c.idContact desc ");
                                                $nbU = 0;
                                                while ($resultData=mysqli_fetch_assoc($getallcontactdata)) {
                                                    $nbU++;
                                                    echo "<tr>
                                                        <td>".$nbU."</td>
                                                        <td>".$resultData['emailUser']."</td>
                                                        <td>".$resultData['dateEnvoie']."</td>
                                                        <td>".$resultData['sujetContact']."</td>
                                                        <td>".$resultData['messageContact']."</td>
                                                        <td><a href='?idcontactRep=".$resultData['idContact']."&idUser=".$resultData['idUser']."'>Répondre</a></td>
                                                        <td><a href='?idcontactSupp=".$resultData['idContact']."'>Supprimer</a></td>
                                                    
                                                    </tr>";
                                                }
                                            
                                            ?>
                                    </tbody>
                                    </table>
                                    </div>            


                        </div>
                        <div class="col-md-4">
                        <?php
                                if(isset($_GET['idcontactRep']) && isset($_GET['idUser'])){ 
                                    $idContact = $_GET['idcontactRep'];
                                    $idUser = $_GET['idUser'];
                                ?>
                                <div class="login-block">
                                    <form method="post" action="sendMail.php" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="sujet">Sujet </label>
                                    <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Sujet de Réponse" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="message">Description d'evenement</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Message  de réponse" required></textarea>
                                    </div>
                                    <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
                                    <input type="hidden" name="idContact" value="<?php echo $idContact; ?>">
                                    <input type="submit" name="sendMail" value="Envoyer La réponse">

                                </form>
                                </div>    
                                
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        
    </div>


<?php include 'sidebar.php';?>







<?php
}else{
                            header('location:/Eventas/administration/login.php');
                            echo "<script>console.log('makaynach session ');</script>";


}

?>


    <script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
</body>
</html>