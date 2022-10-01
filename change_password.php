<?php 
  ob_start(); 
  session_start();
  include "dbConfig.php";
  include "header.php";    
  if(isset($_SESSION['email_id'])){
    $email = $_SESSION['email_id'];
  }
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
        
        $passwordErr = $strong_password_Err = "";
        if (isset($_POST['recover_password'])) 
        {
            $password   =   $_POST['password'];
            $c_password =   $_POST['cnf-password'];
           
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $strong_password_Err = '<p style = "color:red"> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
            }
            if($password != $c_password)
            {
                $passwordErr = '<p style = "color:red">Password and Confirm Password are Different!!</p>';
            }

            if(!$strong_password_Err && !$passwordErr)
            {
                $result   = mysqli_query($mysqli,"UPDATE registration SET password = '$password' WHERE email = '$email'");
                echo "<script>window.location.href = 'login.php?role=customer';</script>";    
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
        <form action="" method="post"  name="change_password" autocomplete="off">
        <div class="avatar bg-info"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title text-info">Recover Password!!</h4>

        <div class="form-group">  
            <label class="form-control"><?php echo $email; ?></label>
        </div>

        <div class="form-group">
            <input type="Password" name="password" class="form-control" id="password" placeholder="Password">
            <div class="error-msg"><?php echo $strong_password_Err; ?></div>
            <span id="passwordError"></span>
        </div>

        <div class="form-group">
            <input type="Password" name="cnf-password" id="confirmPassword"  class="form-control" placeholder="Confirm Password" >
            <div class="error-msg"><?php echo $passwordErr; ?></div>
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