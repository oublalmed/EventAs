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

  $getNbUser= mysqli_query($con,"SELECT * from users ");
  $nbUser = mysqli_num_rows($getNbUser);
  
  $getNbEvent= mysqli_query($con,"SELECT * from evenements ");
  $nbEvent = mysqli_num_rows($getNbEvent);
  
  $getNbCategories= mysqli_query($con,"SELECT * from categories ");
  $nbCat = mysqli_num_rows($getNbCategories);
  
  $getNbContact= mysqli_query($con,"SELECT * from contact ");
  $nbContact = mysqli_num_rows($getNbContact);

  $getNbResrvation= mysqli_query($con,"SELECT * from reservation ");
  $nbRes = mysqli_num_rows($getNbResrvation);

?>

    <div class="page-container">	
        <div class="left-content">
            <div class="mother-grid-inner">
                 <?php include 'header.php';?>


                 <div class="inner-block">
                 <h2>[ EVENTAS ] les statistiques da'pplication</h2>
  <br>
<!--market updates updates-->
          <div class="market-updates">
            
          <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1">
              <div class="col-md-8 market-update-left">
                <h3><?php echo $nbUser; ?></h3>
                <h4>Utilisateurs</h4>
              </div>
              <div class="col-md-4 market-update-right">
                <i class="fa fa-file-text-o"> </i>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2">
              <div class="col-md-8 market-update-left">
              <h3><?php echo $nbRes; ?></h3>
              <h4>Reservation</h4>
              </div>
              <div class="col-md-4 market-update-right">
                <i class="fa fa-eye"> </i>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-3">
              <div class="col-md-8 market-update-left">
                <h3><?php echo $nbContact; ?></h3>
                <h4>Message Contact</h4>
              </div>
              <div class="col-md-4 market-update-right">
                <i class="fa fa-envelope-o"> </i>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
            <div class="clearfix"> </div>
            <br>
            <div class="col-md-4 market-update-gd">
              <div class="market-update-block clr-block-4">
              <div class="col-md-8 market-update-left">
                <h3><?php echo $nbEvent; ?></h3>
                <h4>Evenements</h4>
              </div>
              <div class="col-md-4 market-update-right">
                <i class="fa fa-eye"> </i>
              </div>
              <div class="clearfix"> </div>
            </div>
            </div>
            <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1">
              <div class="col-md-8 market-update-left">
                <h3><?php echo $nbCat; ?></h3>
                <h4>Catégories</h4>
              </div>
              <div class="col-md-4 market-update-right">
                <i class="fa fa-file-text-o"> </i>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
            <div class="clearfix"> </div>
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