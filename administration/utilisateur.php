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
if(isset($_GET['idUserSupp'])){

    
    $delete = mysqli_query($con,"DELETE from users where idUser=".$_GET['idUserSupp']." ");
    if($delete){
        header('location:'.$_SERVER['PHP_SELF']);
    }else{
        echo "<script>alert('Utilisateur supprimer avec success !');</script>";

    }

}


?>


<div class="page-container">	
        <div class="left-content">
            <div class="mother-grid-inner">
                 <?php include 'header.php';?>
                 <div class="inner-block">
                    <div class="blank">
                        <h2>Liste Utilisateurs</h2>
                        <div class="blankpage-main">
                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Nom </th>
                                    <th>Prénom </th>
                                    <th>Email </th>
                                    <th>Supprimer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                $getAllUser = mysqli_query($con,"SELECT * from users order by idUser desc ");
                                                $nbU = 0;
                                                while ($resultU=mysqli_fetch_assoc($getAllUser)) {
                                                    $nbU++;
                                                    echo "<tr>
                                                        <td>".$nbU."</td>
                                                        <td>".$resultU['nomUser']."</td>
                                                        <td>".$resultU['prenomUser']."</td>
                                                        <td>".$resultU['emailUser']."</td>
                                                        <td><a href='?idUserSupp=".$resultU['idUser']."'>Supprimer</a></td>
                                                    
                                                    </tr>";
                                                }
                                            
                                            ?>
                                    </tbody>
                                    </table>
                                    </div>            


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