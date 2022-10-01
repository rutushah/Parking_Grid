<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    


      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>   
    <style>
<?php 
  include "css/style.css";
  include "css/Css.css";
  include "css/bootstrap.css";
  include "js/bootstrap.js";
  include "js/bootstrap.min.js";
 
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
<div class="loc">
<div class="locationdiv">
    <h1>Your hassle free Parking solution</h1>
    <br><br>
    <h3>Parking Location 1 selected</h3>
    <br>
    <br>
    <h4>Please fill/select the details:</h4>
    <br><br>
    </div>
    
    <div class="locationdrop">
 <select class="selectclass rounded bg-info " >
 
 <option value="select type" class="active">--Type Of Vehichle--</option>
 <option value="2344-4568-8523-7896" >SUV</option>
   <option value="2344-4568-8523-7896" >MUV</option>
  <option value="2344-4568-8523-7896" >Sedan</option>
   <option value="2344-4568-8523-7896" >HatchBack</option>
   <option value="2344-4568-8523-7896" >Others</option>
 
</select>
  <br><br>
  <input class="bg-info rounded" type="text" value="Owner Name">
  <br><br>
  <input class="bg-info rounded" type="text" value="plate Number">

  
</div>
<br>

<br>
<div class="container loctionnextbutton">
        <div class=" d-flex  justify-content-center">
        <div class="spacing"></div>
            <button type="button" class="btn btn-info bg-info btn-block btn-lg text-light" style="padding-left: 3.5%;
        padding-right: 3%;" onclick = "window.open('login.php')">Next</button>
        <div class="spacing"></div>
        <button type="button" class="btn btn-info bg-info btn-block btn-lg text-light" style="padding-left: 3.5%;
        padding-right: 3%;" onclick = "window.open('login.php')">Back</button>
        
        
            
        </div>
    </div>
</div>


</body>
</html>
<?php 
    include 'front-end/footer.php';
?>