<?php 
ob_start(); 
session_start();
include "dbConfig.php";
include "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


   
<style>
<?php 
   include "css/style.css";
   include "css/bootstrap.css"; 
   include "css/dashboard.css";       
?>
</style>
</head>

<script>
<?php
   // include "js/main.js";
   //include "js/bootstrap.js";                                            
?>
</script>

<?php
include 'dbConfig.php';
//if status = 1 then block location
$sql = "SELECT * FROM location where location_status = 0";
$all_location = mysqli_query($mysqli,$sql);
?>

<body>  

<!-- Carousel slideshow -->
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active" data-bs-interval="10000">
   <img src="images/oratory.jpg" class="d-block w-100" alt="...">
</div>
<div class="carousel-item" data-bs-interval="2000">
   <img src="images/jeanDrapu.jpg" class="d-block w-100" alt="...">
</div>
<div class="carousel-item">
   <img src="images/oldPort.jpg" class="d-block w-100" alt="...">
</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>

<!-- Available locations for parking -->
<div class="locationContainer">
<h2 class="locationh1"> Select your parking location </h2>    

<div class="row">
<div class="col-3"></div>
<div class="col-6 wrappera">
<?php
   while ($location = mysqli_fetch_array(
                           $all_location,MYSQLI_ASSOC)):;
                           $location_id = $location["location_id"];
      ?>
         
         <div class="col-6 locations">
            <a class="loctionimga" href="location.php?location=<?php echo $location_id;?>">
               <img class="rounded loctionimg1" src="<?php echo $location["location_image"]?>" alt="<?php echo $location["location_name"]?>">
               <p class="locationp1"><?php echo $location["location_name"]?></p>
            </a>
         </div>
         
         
      <?php
   endwhile;?>
   </div>
   <div class="col-3"></div>
   </div>
   
</div>
<div class="footerspace"></div>
<?php 
include "footer.php";
?>
</body>

</html>
