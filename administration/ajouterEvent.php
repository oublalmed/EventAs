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
if(isset($_POST['saveEventBtn'])){

    $titreEvent = $_POST['titreEvent'];
    $descriptionEvent = $_POST['descriptionEvent'];
    $adresseEvent = $_POST['adresseEvent'];
    $prixticketEvent = $_POST['prixticketEvent'];
    $nbPersonneEvent = $_POST['nbPersonneEvent'];
    $CategorieType = $_POST['CategorieType'];
    $dateDebutEvent = $_POST['dateDebutEvent'];
    $dateFinEvent = $_POST['dateFinEvent'];
    $imageName = $_FILES['imageEvent']['name'];
    $imageTmp = $_FILES['imageEvent']['tmp_name'];

   $newimagePath = 'imagesEvents/'.$imageName;

    if(move_uploaded_file($imageTmp,$newimagePath)){
            $q = "INSERT INTO evenements values('','".$titreEvent."','".$descriptionEvent."','".$adresseEvent."','".$prixticketEvent."','".$nbPersonneEvent."','".$dateDebutEvent."','".$dateFinEvent."','".$newimagePath."','".$CategorieType."') ";

            $insertIntoEvent = mysqli_query($con,$q);
            if($insertIntoEvent){
                header("location".$_SERVER['PHP_SELF']);
            }else{
                echo "<script>alert('error ajouter evenement au base donne');</script>";
                
            }

    }else{
        echo '<script>alert("probleme ajouter image");</script>';
    }

}

?>
    <div class="page-container">	
        <div class="left-content">
            <div class="mother-grid-inner">
                 <?php include 'header.php';?>
			<div class="login-block">

                    <div class="row">

                    <div class="col-md-12">
                        <br><br>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="titreEvent">Titre d'evenement</label>
                                <input type="text" class="form-control" id="titreEvent" name="titreEvent" placeholder="Titre d'evenement" required>
                                </div>
                                <div class="form-group">
                                <label for="descriptionEvent">Description d'evenement</label>
                                <textarea class="form-control" id="descriptionEvent" name="descriptionEvent" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                <label for="adresseEvent">Adresse d'evenement</label>
                                <textarea class="form-control" id="adresseEvent" name="adresseEvent" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                <label for="prixticketEvent">Prix Ticket d'evenement</label>
                                <input type="number" class="form-control" id="prixticketEvent" name="prixticketEvent" placeholder="Prix Ticket d'evenement" required>
                                </div>
                                <div class="form-group">
                                <label for="nbPersonneEvent">Nombre de Personne à reservé</label>
                                <input type="number" class="form-control" id="nbPersonneEvent" name="nbPersonneEvent" placeholder="Nombre de Personne à reservé" required>
                                </div>
                                    
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="CategorieType">Catégorie d'evenement</label>
                                    <select class="form-control" id="CategorieType" name="CategorieType" requiredd>
                                    <option value="null" disabled selected>Choisir Catégorie</option>
                                        <?php
                                            $getallCat = mysqli_query($con,"SELECT * FROM categories order by idCategorie desc");
                                            while($resultCat = mysqli_fetch_assoc($getallCat)){
                                                echo '<option value="'.$resultCat["idCategorie"].'">'.$resultCat["nomCategorie"].'</option>';
                                            }
                                        ?>

                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="imageEvent">Image Evenement</label>
                                    <input type="file" class="form-control-file" name="imageEvent" id="imageEvent" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="dateDebutEvent">Date Début Evenement</label>
                                    <input type="date" class="form-control-file" name="dateDebutEvent" id="dateDebutEvent" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="dateFinEvent">Date Fin Evenement</label>
                                    <input type="date" class="form-control-file" name="dateFinEvent" id="dateFinEvent" required>
                                    </div>
                                    
                                    <input type="submit" name="saveEventBtn" value="Enregistrer Evenement">
                                    
                            </div>
                        </form>

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