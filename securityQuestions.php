<?php 
  ob_start(); 
  session_start();
  include "dbConfig.php";
  include "header.php";    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <!-- Including css in php using style tag -->
    <Style> 
        <?php
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

<!-- PHP registration's insert query -->

<?php
        $motherNameError = $emailErr = $petNameError = $birthPlaceError = "";
        if (isset($_POST['recover_password'])) {
            $mother_name  =   $_POST['motherName'];
            $pet_name  =   $_POST['petName'];
            $birth_place =   $_POST['birthPlace'];
            $email  =   $_POST['email'];

            $email_result = mysqli_query($mysqli, "select email from registration where email ='$email'");
          
            $user_matched = mysqli_num_rows($email_result);

            $result = "SELECT * FROM `registration` WHERE email = '$email' AND (motherName = '$mother_name' AND petName = '$pet_name' AND birthPlace = '$birth_place') AND status = 0";
            $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));
            $data_matched = mysqli_num_rows($query_result);
           
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = '<p style = "color:red">Invalid Email Format</p>';
            }
            if($mother_name == ""){
                $motherNameError = '<p style = "color:red">Please Enter Mother Name</p>';
            }

            if($pet_name == ""){
                $petNameError = '<p style = "color:red">Please Enter Pet Name</p>';
            }

            if($birth_place == ""){
                $birthPlaceError = '<p style = "color:red">Please Enter Birth Place</p>';
            }
            
            if(!$emailErr && !$motherNameError && !$petNameError && !$birthPlaceError)
            {
                if ($user_matched <= 0) 
                {
                    echo '<script>alert("Email Id Not Registered!! Click on Sign up..")</script>';
                } 
                else if($data_matched > 0){
                    $_SESSION['email_id'] = $_POST['email'];
                    header("location: change_password.php");
                }
                else{
                    echo '<script>alert("Please Enter Correct Information!!")</script>';
                }    
            }
        }    
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>

<body>
    <div class="login-form">
        <form action="" method="post"  name="securityQuestions_form" autocomplete="off">
        <div class="avatar bg-info"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title text-info">Recover Password!!</h4>

        <div class="form-group">
            <input type="text" class="form-control mb-3" name="email" id="email" placeholder="Email*" >
            <div class="error-msg"><?php echo $emailErr; ?></div>
            <span id="emailError"></span>
        </div>
            
        <div class="form-group">
            <input type="text" class="form-control mb-3" name="motherName" id="motherName" placeholder="Mother Name*">
            <div class="error-msg"><?php echo $motherNameError; ?></div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control mb-3" name="petName" id="petName" placeholder="Pet Name*">
            <div class="error-msg"><?php echo $petNameError; ?></div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control mb-3" name="birthPlace" id="birthPlace" placeholder="Birth Place*">
            <div class="error-msg"><?php echo $birthPlaceError; ?></div>
        </div>

        <input type="reset" class="btn btn-info bg-info btn-block btn-lg text-light" name="login" value="Login" onclick = "redirectToLoginPage()">
        <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" name="recover_password" value="Recover Password">
        </form>
    </div>

    <script>
        <?php
            include "js/main.js";
        ?>
    </script>
</body>
</html>
<?php 
    include 'footer.php';
?>