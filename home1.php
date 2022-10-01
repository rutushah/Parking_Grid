<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="js/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
<?php 
  include "css/style.css";
  include "css/Css.css";
  include "css/bootstrap.css";
 
?>
html{
  position: relative;
  min-height: 100%;
}

body{
    background-color: rgb(247, 251, 252);
    /* Margin bottom by footer height */
    margin-bottom: 100px;
}
</style>
</head>
<?php include "front-end/header.php"; ?>
<body class="">
<h1 >Welcome to ParkingGrid</h1>
 
 <br>
    <div id="demo" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
     <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
     </ul>
     <!-- The slideshow -->
     <div class="carousel-inner">
        <div class="carousel-item active">
           <img src="images/h1.jpg" alt="Nainital" width="1100" height="500">
        </div>
        <div class="carousel-item">
           <img src="images/h2.jpg" alt="Nainital" width="1100" height="500">
        </div>
        <div class="carousel-item">
           <img src="images/h3.jpg" alt="Nainital" width="1100" height="500">
        </div>
     </div>
     <!-- Left and right controls -->
     <a class="carousel-control-prev" href="#demo" data-slide="prev">
     <span class="carousel-control-prev-icon"></span>
     </a>
     <a class="carousel-control-next" href="#demo" data-slide="next">
     <span class="carousel-control-next-icon"></span>
     </a>
  </div>
 <br>
  <div class="container">
  <h2> Select your parking location </h2>     
  <br>
  <div class="row justify-content-center">
   <div class="col-sm-6 locationimg"><a href="location.php"><img class="rounded" src="images/location1.jpg" alt="location1"><p>Loction 1</p></a></div>
   
   <div class="col-sm-6 locationimg"><a href="location.php"><img class=" rounded" src="images/location2.jpg" alt="location2"><p>Loction 2</p></a></div>
  </div>
  <br><br><br>
  <div class="row justify-content-center">
   <div class="col-sm-6 locationimg"><a href="location.php"><img class=" rounded" src="images/location3.jpg" alt="location3"><p>Loction 3</p></a></div>
   <div class="col-sm-6 locationimg"><a href="location.php"><img class=" rounded" src="images/location4.jpg" alt="location4"><p>Loction 4</p></a></div>
  </div>
  <br>
  <br><br>
 </div>
 
</body>

</html>
