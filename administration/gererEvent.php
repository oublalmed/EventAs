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
if(isset($_POST['saveEventBtnMod'])){
    $idEventToMod = $_POST['idEventToMod'];
    $titreEventMod = $_POST['titreEventMod'];
    $descriptionEventMod = $_POST['descriptionEventMod'];
    $adresseEventMod = $_POST['adresseEventMod'];
    $prixticketEventMod = $_POST['prixticketEventMod'];
    $nbPersonneEventMod = $_POST['nbPersonneEventMod'];
    $CategorieTypeMod = $_POST['CategorieTypeMod'];
    $dateDebutEventMod = $_POST['dateDebutEventMod'];
    $dateFinEventMod = $_POST['dateFinEventMod'];
    $qup = "UPDATE evenements set  titreEvent='".$titreEventMod."',  descriptionEvent='".$descriptionEventMod."',
     adresseEvent='".$adresseEventMod."',   prixticketEvent='".$prixticketEventMod."',  nbPersonneEvent='".$nbPersonneEventMod."', 
     CategorieType='".$CategorieTypeMod."' ,   dateDebutEvent='".$dateDebutEventMod."' ,  dateFinEvent='".$dateFinEventMod."' 
     where idEvent='".$idEventToMod."' ";
     $updateEvent = mysqli_query($con,$qup);
     if($updateEvent){
        header("location".$_SERVER['PHP_SELF']);
     }else{
        echo "<script>alert('error Modifier Evenement');</script>";

     }
}


if(isset($_GET['idEventSup'])){
    $idEventSup=$_GET['idEventSup'];
    $deletEvent = mysqli_query($con,"DELETE from evenements where idEvent=".$idEventSup." ");
    if($deletEvent){
        header("location:gererEvent.php");
     }else{
        echo "<script>alert('error Modifier Evenement');</script>";

     }
}


?>
    <div class="page-container">	
        <div class="left-content">
            <div class="mother-grid-inner">
                 <?php include 'header.php';?>
			<div class="login-block">
    <br><br>
                    <div class="row">
                            
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Date Début</th>
                                    <th>Date Fin</th>
                                    <th>Nb Personne</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $getAllEvents = mysqli_query($con,"SELECT * from evenements order by idEvent desc ");
                                            
                                            while($resultEvent=mysqli_fetch_assoc($getAllEvents)){
                                                
                                                echo '<tr>
                                                <td><img src="'.$resultEvent["newimagePath"].'" width="80" height="80"></td>
                                                <td>'.$resultEvent['titreEvent'].'</td>
                                                <td>'.$resultEvent['dateDebutEvent'].'</td>
                                                <td>'.$resultEvent['dateFinEvent'].'</td>
                                                <td>'.$resultEvent['nbPersonneEvent'].'</td>
                                                <td><a href="?idEventMod='.$resultEvent['idEvent'].'">Modifier</a></td>
                                                <td><a href="?idEventSup='.$resultEvent['idEvent'].'">Supprimer</a></td>
                                                </tr>';
                                            }

                                        ?>
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?php 
                                if(isset($_GET['idEventMod'])){
                                $idEventMod = $_GET['idEventMod'];
                                $getEventById = mysqli_query($con,"SELECT * FROM evenements where idEvent=".$idEventMod." ");
                                $resultEvent = mysqli_fetch_assoc($getEventById);

                            ?>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                    <input type="text" name="idEventToMod" value="<?php echo $resultEvent['idEvent']; ?>">
                                <div class="form-group">
                                <label for="titreEventMod">Titre d'evenement</label>
                                <input type="text" value="<?php echo $resultEvent['titreEvent']; ?>" class="form-control" id="titreEventMod" name="titreEventMod" placeholder="Titre d'evenement" required>
                                </div>
                                <div class="form-group">
                                <label for="descriptionEventMod">Description d'evenement</label>
                                <textarea class="form-control" id="descriptionEventMod" name="descriptionEventMod" rows="3" required><?php echo $resultEvent["descriptionEvent"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                <label for="adresseEventMod">Adresse d'evenement</label>
                                <textarea class="form-control" id="adresseEventMod" name="adresseEventMod" rows="3" required><?php echo $resultEvent["adresseEvent"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                <label for="prixticketEventMod">Prix Ticket d'evenement</label>
                                <input type="number" value="<?php echo $resultEvent['prixticketEvent']; ?>" class="form-control" id="prixticketEventMod" name="prixticketEventMod" placeholder="Prix Ticket d'evenement" required>
                                </div>
                                <div class="form-group">
                                <label for="nbPersonneEventMod">Nombre de Personne à reservé</label>
                                <input type="number" value="<?php echo $resultEvent['nbPersonneEvent']; ?>" class="form-control" id="nbPersonneEventMod" name="nbPersonneEventMod" placeholder="Nombre de Personne à reservé" required>
                                </div>
                                <div class="form-group">
                                    <label for="CategorieTypeMod">Catégorie d'evenement</label>
                                    <select class="form-control" id="CategorieTypeMod" name="CategorieTypeMod" requiredd>
                                    <option value="null" disabled selected>Choisir Catégorie</option>
                                        <?php
                                            $getallCat = mysqli_query($con,"SELECT * FROM categories order by idCategorie desc");
                                            while($resultCat = mysqli_fetch_assoc($getallCat)){
                                                ?>
                                                <option <?php if($resultCat["idCategorie"] == $resultEvent["CategorieType"] ) echo "selected"; ?> value="<?php echo $resultCat["idCategorie"]; ?>"><?php echo $resultCat["nomCategorie"]; ?></option>';
                                            <?php
                                            }
                                        ?>

                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="dateDebutEventMod">Date Début Evenement</label>
                                    <input type="date" value="<?php echo $resultEvent["dateDebutEvent"]; ?>" class="form-control-file" name="dateDebutEventMod" id="dateDebutEventMod" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="dateFinEventMod">Date Fin Evenement</label>
                                    <input type="date" value="<?php echo $resultEvent["dateFinEvent"]; ?>" class="form-control-file" name="dateFinEventMod" id="dateFinEventMod" required>
                                    </div>
                                    
                                    <input type="submit" name="saveEventBtnMod" value="Modifer Evenement">
                                     

                                </form>


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