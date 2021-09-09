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
if(isset($_POST['SaveCat'])){
    $nomCat = $_POST['NomCat'];
    $insertCat = mysqli_query($con,"INSERT INTO categories values('','".$nomCat."') ");
    if($insertCat){
        header("location".$_SERVER['PHP_SELF']);
    }else{
        echo "<script>alert('error ajouter Catégorie');</script>";
    }
}

if(isset($_POST['SaveCatMod'])){
    $idcatTomod = $_POST['idCatToMod'];
    $nomCatMod = $_POST['NomCatMod'];
    $updateCat = mysqli_query($con,"UPDATE categories set nomCategorie='".$nomCatMod."' where idCategorie='".$idcatTomod."' ");
    if($updateCat){
        header("location".$_SERVER['PHP_SELF']);
    }else{
        echo "<script>alert('error Modifier Catégorie');</script>";
    }

}


if(isset($_GET['idcatSup'])){
    $idcatSup = $_GET['idcatSup'];
    $deleteCat = mysqli_query($con,"DELETE from categories where idCategorie='".$idcatSup."' ");
    if($deleteCat){
        header("location".$_SERVER['PHP_SELF']);
    }else{
        echo "<script>alert('error Supprimer Catégorie');</script>";
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
                        <h4 align="center">Ajouter Catégorie</h4>
                            <br>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="col-md-6">
                                <input type="text" name="NomCat" placeholder="Catégorie ..." required="">
                                </div>
                                <div class="col-md-4">
                                <input type="submit" name="SaveCat" value="Enregistrer Categorie">
                                </div>
                            </form>
    
                        </div>
                            <br>
                            
                        <div class="col-md-6">
                        <h4 align="center">Gérer Catégorie</h4>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Nom Categorie</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $getallCat = mysqli_query($con,"SELECT * from categories order by idCategorie desc ");
                                            $nbCat = 0;
                                            while($resuultCat=mysqli_fetch_assoc($getallCat)){
                                                $nbCat++;
                                                echo '<tr>
                                                <td>'.$nbCat.'</td>
                                                <td>'.$resuultCat['nomCategorie'].'</td>
                                                <td><a href="?idcatMod='.$resuultCat['idCategorie'].'">Modifier</a></td>
                                                <td><a href="?idcatSup='.$resuultCat['idCategorie'].'">Supprimer</a></td>
                                                </tr>';
                                            }

                                        ?>
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <?php
                            if(isset($_GET['idcatMod'])){
                                $idcatTomod = $_GET['idcatMod'];
                                $getCatById = mysqli_query($con,"SELECT * from categories where idCategorie=".$idcatTomod." ");
                                $resulCat = mysqli_fetch_assoc($getCatById);
                            ?>
                                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="col-md-12">
                                    <input type="hidden" name="idCatToMod" value="<?php echo $idcatTomod; ?>">
                                <input type="text" name="NomCatMod" placeholder="Catégorie ..." required="" value="<?php echo $resulCat['nomCategorie']; ?>">
                                <input type="submit" name="SaveCatMod" value="Modifier">

                            </div>
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