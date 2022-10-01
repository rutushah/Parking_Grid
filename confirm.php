<?php 
  ob_start(); 
  session_start();
  include "dbConfig.php";
  include "header.php";    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirmation Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="js/bootstrap.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
    

    <style>
      <?php 
        include "css/style.css";
        include "css/bootstrap.css";
      ?>
    </style>
</head>
   
    <?php 
      $location_id = $_GET['locations']; 
      $fromDates = $_SESSION['fromDates'];
      $toDates = $_SESSION['to_date'];
      $timess = $_SESSION['timing'];
      $floorss = $_SESSION['floors'];
      $spotss = $_SESSION['spot'];
      $vehicle = $_SESSION['vehicle_type'];
      $plateNumber = $_SESSION['plat_number'];
      $total_cost = $_SESSION['total_cost'];
      $querys = mysqli_query($mysqli, "SELECT * FROM `registration` WHERE id = '$user_id'");
      $data_rows = mysqli_fetch_row($querys);
      $user_card_number = $data_rows[4];
      $card_number = "";
      if (isset($_POST['confirmation'])) 
      {
        $card_number = $_POST['cardNumber'];
        if($user_card_number == $card_number)
        {
          $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot, vehicle_type, plat_number, total_cost, location_id, user_id) VALUES('$fromDates', '$toDates', '$timess', '$floorss', '$spotss', '$vehicle', '$plateNumber', '$total_cost', '$location_id', '$user_id')");
          header("Location: dashboard.php");
        }
        else{
          echo '<script>alert("Your Card Number is Wrong!!")</script>';
        }
        
      }
      if (isset($_POST['back'])) 
      {
        header("Location: dashboard.php");
      }
    ?>
<body>
<?php 
      $query = mysqli_query($mysqli, "SELECT * FROM `registration` WHERE id = '$user_id'");
      while($row = mysqli_fetch_array($query)){            
    ?>
    <h1 class = "text-info">Thank You for Booking With Parkingrid!!</h1>

    <form  method="post" action="" name="location_form" class="location_form" autocomplete="off">
    <h4 class = "text-info m-3 p-3">Please Confirm the Details:</h4>
      
          <div class="form-group">
            <span>Name : </span>
            <label class="form-control"><?php echo $row['fname']; ?></label>
          </div>

          <div class="form-group">
            <span>Date From : </span>
            <label class="form-control"><?php echo $fromDates ?></label>
          </div>

          <div class="form-group">
            <span>Date To : </span>
            <label class="form-control"><?php echo $toDates; ?></label>
          </div>
  
          <div class="form-group">
          <span>Plat Number : </span>
            <label class="form-control"><?php echo $plateNumber; ?></label>
          </div>
  
          <div class="form-group">
            <span>Card Number : </span>
            <input type="text" class="form-control" id ="Card Number" name="cardNumber" placeholder="Enter Card Number">
            <small id = "v3">*Enter Card Number that you gave at the time of Registration..</small>
          </div>

          <div class="form-group">
            <span>Price : </span>    
            <label class="form-control"><?php echo $total_cost; ?></label>
          </div>

          <div class="form-group">
            <span>Location : </span>    
            <label class="form-control">Location <?php echo $location_id; ?></label>
          </div>
   
          <div class="form-group">
          <button id="back" class="btn btn-info bg-info btn-block btn-lg text-light" name="back" style="padding-left: 3.5%;
              padding-right: 3%;">Back</button>
            <button id="confirmation" class="btn btn-info bg-info btn-block btn-lg text-light" name="confirmation" style="padding-left: 3.5%;
              padding-right: 3%;">Confirm</button>
            <p class="confirmtext">Your ticket/bill will be emailed to your registered email.</p>
          
          </div>
</form>
<?php
        }?>
</body>
</html>