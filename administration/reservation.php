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

<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
        <?php include 'header.php';?>
                <div class="inner-block">
                <div class="portlet-grid-page">  
                <h2>Portlets</h2>	

                    <?php
                        $getAllRES = mysqli_query($con,"SELECT * from reservation r, users u ,categories c, evenements e where 
                        r.idUserRes=u.idUser and r.idEventRes=e.idEvent and e.CategorieType=c.idCategorie order by idRes desc");
                        while($resultRes=mysqli_fetch_assoc($getAllRES)){
                        ?>  

                        <div class="portlet-grid panel-primary"> 
                        <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $resultRes['dateRes']; ?></h3>
                        </div> 
                        <div class="panel-body" style="height:250px">
                        <ul>
                            <li>Nom :  <strong> <?php echo $resultRes['nomUser']." ".$resultRes['prenomUser']; ?> </strong></li>
                            <li>email :  <strong> <?php echo $resultRes['emailUser']; ?> </strong></li>
                            <li>categorie Evenement :  <strong> <?php echo $resultRes['nomCategorie']; ?> </strong></li>
                            <li>Titre Evenement :  <strong> <?php echo $resultRes['titreEvent']; ?> </strong></li>
                            <li>Ticket PDF :  <strong> <?php echo "<a href='".$resultRes['ticketFileRes']."' target='_blank'>Ticket PDF</a>"; ?> </strong></li>
                        </ul>

                        </div>
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