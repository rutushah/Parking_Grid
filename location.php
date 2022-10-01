<?php 
  ob_start(); 
  session_start();
  include "dbConfig.php";
  include "header.php";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Location</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
       
      <style>
      <?php 
        include "css/style_front.css";
        include "css/style.css";
        include "css/bootstrap.css";        
      ?>
      </style>
      </head>

      <script>
        <?php
          include "js/main.js";
          include "js/bootstrap.js";
        ?>
      </script>
      <?php 
      $location_id = $_GET['location'];
      if (isset($_POST['back'])) {
        header("Location: dashboard.php");
      }
      if (isset($_POST['next'])) {
        $_SESSION['vehicle'] = $_POST['vehicle'];
        $_SESSION['ownerName'] = $_POST['ownerName'];
        $_SESSION['plateNumber'] = $_POST['plateNumber'];
        $_SESSION['location'] = $location_id;
        header("Location: selectSlot.php?locations=$location_id");
      }
      ?>
<body>   
    <?php 
      $query = mysqli_query($mysqli, "SELECT * FROM `registration` WHERE id = '$user_id'");
      while($row = mysqli_fetch_array($query)){            
    ?>

  
      <h1 class = "modal-title text-info m-3 p-3">Your hassle free parking solution</h1>
      <h2 class = "modal-title text-info m-2 p-2">Parking Location <?php echo $location_id; ?> selected</h2>
      <h3 class = "modal-title text-info m-1 p-1">Please fill/select the details</h3>
    
      <form  method="post" name="location_form" class="location_form" autocomplete="off"  onSubmit="return checkValidationForLocationPage()">
        <!-- <div class="card">    Start of card div  -->
          <div class="form-group">
            <select class="form-select" name="vehicle" id="vehicle" aria-label="Default select example">
              <option value = "Select the Vehicle Type">Select the Vehicle Type</option>
              <option value="SUV">SUV</option>
              <option value="MUV">MUV</option>
              <option value="Sedan">Sedan</option>
              <option value="HatchBook">HatchBook</option>
            </select>
            <small id = "v1"></small>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id ="ownerName" name="ownerName"  value = "<?php echo $row['fname'];?>">
          <small id="v2"></small>
          </div>

        <div class="form-group">
            <input type="text" class="form-control" id ="plateNumber" name="plateNumber" placeholder="Enter number Plate">
            <small id = "v3"></small>
        </div>
        <input type="reset" class="btn btn-info bg-info btn-block btn-lg text-light" id= "back" name="back" value="Back" 
      onclick = "redirectToCustomerDashboardPage()">
        <button type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" id= "next" name="next" value="Next">Next</button>
        

        </div>
        <!-- End of card div -->
       
      </form>

     

      <?php 
    include 'footer.php';
  
?> 


  <?php
        }?>
    </body>
  
</html>