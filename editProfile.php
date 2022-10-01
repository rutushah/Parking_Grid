<!-- Include php files -->
<?php 
        session_start();
        include 'header.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

</head>



<!-- Include css into php -->
<style>
        <?php 
            include "css/admin.css";
            include "css/bootstrap.css";
        ?>
    </style>

<!-- Include js files into php -->
    <script>
        <?php
            include "/js/main.js";
        ?>
    </script>

<body>

        
<h2 class = "font-weight-bold mt-5 text-center" id="editProfile" >
 Edit Your Profile Here
</h2>

<div class="container mt-2 mb-4 mt-5">
    <div class="row justify-content-md-center">
        <div class="col-sm-6 border border-primary shadow rounded pt-2">
            <div class="col-sm-12">

            <?php 
                    include 'dbConfig.php';
                    $query = mysqli_query($mysqli, "SELECT * FROM `registration` WHERE id = '$user_id'");
                    while($row = mysqli_fetch_array($query)){            
            ?>

                <form method="post" id="editForm"  action = "edit.php?edit=<?php echo $user_id ?>" onSubmit="return validation();">

                <div class="form-group">
                  <label class="font-weight-bold">First Name </label>
                  <input type="text" name="firstName" id="firstName" class="form-control" value = "<?php echo $row['fname'];?>">
                </div>

                <div class="form-group">
                  <label class="font-weight-bold">Last Name </label>
                  <input type="text" name="lastName" id="lastName" class="form-control" value = "<?php echo $row['lname'];?>">
                </div>

                <div class="form-group">
                  <label class="font-weight-bold">Card Number </label>
                  <input type="number" name="cardNumber" id="cardNumber"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                   this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                  class="form-control" maxlength="16" data-rule-maxlength="16" value = "<?php echo $row['card'];?>">
                </div>


                <div class="form-group">
                  <label class="font-weight-bold">Email</label>
                  <div class="input-group">
                    <input type="email" name="email" id="email" class="form-control" value = "<?php echo $row['email'];?>">
                      <div class="input-group-append"><button type="button" class="btn btn-primary" onClick="return emailCheck();"><i class="fa fa-envelope"></i></button></div>
                  </div>
                </div> 
  
                <div class="form-group">
                  <label class="font-weight-bold">Phone Number</label>
                  <input type="number" name="phone" id="phone" class="form-control" 
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                   this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                  maxlength="10" data-rule-maxlength="10" value = "<?php echo $row['phone'];?>">
                </div>

                <div class="form-group">
                  <input type="submit" name="editProfile" value="Edit Profile" class="btn btn-info col-sm-12">
                </div>
          
            </form>
        </div>
      </div>
    </div>
  </div>
<?php
                    }?>


</body>
</html>

<?php 
  include "footer.php";
?>