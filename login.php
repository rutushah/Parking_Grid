<?php
session_start();

include_once("dbConfig.php");
// echo $role = $_SESSION['role'];
// die();
$user_selected_role = "";
$sql = "SELECT * FROM `user_role`";
$all_user_role = mysqli_query($mysqli,$sql);
if(isset($_SESSION["role"])){
    $user_selected_role = $_SESSION["role"];
}
?>
<?php include "header.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
<?php 
  include "css/style.css";
  include "css/bootstrap.css";
?>
</style>
</head>

<body>
<div class="login-form"> 
    <?php
    // echo $role;
    //die(); 
    ?>  

    <form action="" method="post" name="login_form" autocomplete="off" onsubmit = "return checkBlankFieldValidationsForLogin()">
		<div class="avatar bg-info"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title text-info">Login to Park Grid Account</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="email" id="email" placeholder="Username">
            <span id= "email-error"></span>
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span id = "password-error"></span>
        </div>

        <div class="form-group clearfix">
            <a href="securityQuestions.php" class="forgot-link text-info"><u>Forgot Password?</u></a>
        </div> 

        <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" id= "login" name="login" value="Login">
    </form>	

    <script>
    <?php
      include "js/main.js";
      include "js/bootstrap.js";
    ?>
    </script>

<?php
        $role = $email = $password = $id = "";
        if (isset($_POST['login'])) {
           $role =  $_GET["role"]; 
            $email    = $_POST['email'];
            $password = $_POST['password'];
                $get_user_role_id = "select user_role_id from user_role where user_role = '$role' ";
                $user_role_result = mysqli_query($mysqli, $get_user_role_id) or die( mysqli_error($mysqli));
                $role_row = mysqli_fetch_row($user_role_result);
                $selected_user_role = $role_row[0];
                $result = "SELECT * FROM `registration` WHERE user_role = '$selected_user_role' AND (email = '$email' AND password = '$password') AND status = 0";
                        
                $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));
                $user_matched = mysqli_num_rows($query_result);
                $Row = mysqli_fetch_row($query_result);

                $compare_email = mysqli_query($mysqli, "select email from registration where email = '$email'");
                $email_record = mysqli_num_rows($compare_email);
        
                $query_result = mysqli_query($mysqli, $result) or die ( mysqli_error($mysqli));
                if($email_record <= 0)
                {
                    echo '<script>alert("Email Id Not Registered!! Click on Sign up..")</script>';
                }
                else if($user_matched > 0){
                    $id = $Row[0];
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    if($role == "customer"){
                        echo "
                        <script> 
                            alert('Customer logged in successfully!!!')
                            window.location.href = 'dashboard.php'
                        </script>
                            ";
                    }if($role == "admin"){
                        echo "
                        <script> 
                            alert('Admin logged in successfully!!!')
                            window.location.href = 'admin/adminDashboard.php'
                        </script>
                            ";
                    }
                }else{
                    echo '<script>alert("You cannot login !! Please Contact to the Administrative Department...")</script>';
                }    
            }
    ?>

        <?php
               if($user_selected_role == "customer" ){
        echo "
         <div class='text-center small create_account'>Don't have an account? 
         <a href='register.php?role=customer'><b><u class = 'text-info'>Sign up</u></b></a>
         </div>
         ";
       }   
        ?>
    
</div>
<?php 
    include 'footer.php';
?> 
</body>

</html>


