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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <style>
<?php 
include "css/style.css";
include "css/style_front.css";
//   include "css/Css_front.css";
  include "css/bootstrap.css";
 
?>

</style>
</head>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
  <script src = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->

  <?php 
      include 'header.php';
  ?>

<body class="">
    <div>
        <div class="container">
            <br>
            <h1 >Welcome to ParkingGrid</h1>
            <h3>Your hassle free Parking solution</h3>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <img src="images/home1.jpg" alt="" class="home-images rounded">
                    <p class="home-image-text">Portable Access</p>
                </div>
                <div class="col-sm-4">
                    <img src="images/home2.jpg" alt="" class="home-images rounded">
                    <p class="home-image-text">24/7 Service</p>
                </div>
                <div class="col-sm-4">
                    <img src="images/home3.jpg" alt="" class="home-images rounded">
                    <p class="home-image-text">CCtv Secured</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container home-margin">
        <div class=" d-flex justify-content-center">
            
            <button type="button" class="btn btn-info bg-info btn-block btn-lg text-light" style="padding-left: 4%;
        padding-right: 4%;" onclick = "location.href='selectRole.php'">Login</button>
        
            <div class="spacing"></div>
            <button type="button" class="btn btn-info bg-info btn-block btn-lg text-light" style="padding-left: 4%;
        padding-right: 4%;" onclick = "location.href='selectRole.php'">Register</button>
        
        </div>
    </div>
    <div class="container home-margin1">
        <pre class="texting">ParkingGrid  is  one  of  the  largest  parking  management  companies,
operating  approximately  4  parking  facilities
with  Highly  secured  Environment.

We  provide  monthly  Plans  as  well  as  on  per  hour  plans.
        </pre>
        
    </div>
    <div class="container p2">
      <marquee class="moving" style= "color:red">*  Bookings  are  not  Refundable.</marquee>
    </div>
   
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
  <script src = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <?php 
    include 'footer.php';
?> 
</body>

</html>
