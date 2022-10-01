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
<?php 
//session_start();
if(isset($_SESSION["role"])){
    
    $role = $_POST['role'];
    //$_SESSION['role'] = $_POST['role'];
    //header("Location: login.php?role=$role");
    
}
            include "header.php";    
?>


<!-- PHP registration's insert query -->

<?php
        include_once("dbConfig.php");
        $fnameError = $lnameError = $cardDetailsError = $motherNameError = $petNameError = $birthPlaceError = $emailErr = $passwordErr = $strong_password_Err = $phoneErr = "";
        if (isset($_POST['register'])) {
            $fname  =   $_POST['firstName'];
            $lname  =   $_POST['lastName'];
            $gender =   $_POST['gender'];
            $card   =   $_POST['cardDetail'];
            $email  =   $_POST['email'];
            $phone  =   $_POST['phone'];
            $password   =   $_POST['password'];
            $c_password =   $_POST['cnf-password'];
            $mother_name = $_POST['motherName'];
            $pet_name = $_POST['petName'];
            $birth_place = $_POST['birthPlace'];

            $email_result = mysqli_query($mysqli, "select email from registration where email ='$email'");
          
            $user_matched = mysqli_num_rows($email_result);
            
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if($fname == ""){
                $fnameError = '<p style = "color:red">Please Enter First Name</p>';
            }
            
            if($lname == ""){
                $lnameError = '<p style = "color:red">Please Enter Last Name</p>';
            }
            
            if($card == ""){
                $cardDetailsError = '<p style = "color:red">Please Enter First Name</p>';
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

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = '<p style = "color:red">Invalid Email Format</p>';
                //$emailErr = "Invalid Email Format";
            }
            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $strong_password_Err = '<p style = "color:red"> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
                //$strong_password_Err = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }
            $pattern = '/^\d+(\.\d{2})?$/';
            if(!preg_match('/^[0-9]{10}+$/', $phone)){
                $phoneErr = '<p style = "color:red">Contact Number must be of 10 Digit</p>';
                //$phoneErr = "Contact Number must be of 10 Digit";
            }
            if($password != $c_password)
            {
                $passwordErr = '<p style = "color:red">Password and Confirm Password are Different!!</p>';
                //$passwordErr = "Password and Confirm Password are Different!!";
            }
            if(!$emailErr && !$strong_password_Err && !$phoneErr && !$passwordErr && !$birthPlaceError && !$petNameError && !$motherNameError && !$cardDetailsError && !$lnameError && !$fnameError)
            {
                if ($user_matched > 0) 
                {
                        echo '<script>alert("User already exists with this email id")</script>';
                } else {
                    $result   = mysqli_query($mysqli,
                     "INSERT INTO `registration`
                     ( `fname`, `lname`, `gender`, `card`, `email`, `phone`, `password`, `user_role`, `motherName`, `petName`, `birthPlace`) 
                        VALUES ('$fname','$lname','$gender','$card','$email','$phone','$password','2', '$mother_name', '$pet_name', '$birth_place')");
    
                    if ($result) {
                        echo 
                        "<script>
                            alert('User Registered successfully.')
                        window.location.href = 'login.php?role=customer';
                        </script>";
                    } else {
                        echo '<script>alert("Registration error. Please try again!!")</script>';
                    }
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
        <form action="" method="post"  name="registration_form" autocomplete="off">
        <div class="avatar bg-info"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title text-info">Register to Park Grid Account</h4>

        <div class="form-group">
            <label for="SignUp" class = "mb-3"> Sign Up for a free account?</label>
            <input type="text" class="form-control mb-3" name="firstName" id="firstName" placeholder="First name*">
        <div class="error-msg"><?php echo $fnameError; ?></div>

        </div>

        <div class="form-group">
            <input type="text" class="form-control mb-3" name="lastName" id="lastName" placeholder="Last Name*">
        <div class="error-msg"><?php echo $lnameError; ?></div>

        </div>

        <div class="form-group">
            <label> Select Gender :  &nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="radio" type="radio" id="male" name="gender" value="Male">
            <label class="radio" for="male">Male</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <input class="radio" type="radio" id="female" name="gender" value="Female">
            <label class="radio" for="female">Female</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="radio" type="radio" id="undefined" name="gender" value="Undefined" checked>
            <label class="radio" for="undefined">Undefined</label>
            <span id="genderError"></span>
        </div>

        <div class="form-group">
        <input type="number" class="form-control mb-3" name="cardDetail" placeholder="Card Details" id="cardDetails"
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
        maxlength="16" data-rule-maxlength="16">
    
        <div class="error-msg"><?php echo $cardDetailsError; ?></div>
        </div>

        <div class="form-group">
        <input type="text" class="form-control mb-3" name="email" id="email" placeholder="Email*" >
        <div class="error-msg"><?php echo $emailErr; ?></div>
        <span id="emailError"></span>
        </div>

        <div class="form-group">
            <input type="number" name="phone" class="form-control" id="contactNumber" placeholder="Contact No."  
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
            maxlength="10" data-rule-maxlength="10">
            <div class="error-msg"><?php echo $phoneErr; ?></div>
            <span id="phoneError"></span>
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

        <label for="SignUp" class = "mb-3"> Security Questions !!</label>
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
        
        <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" name="register" value="Registration">
        <input type="reset" class="btn btn-info bg-info btn-block btn-lg text-light" name="login" value="Login" onclick = "redirectToLoginPage()"><br>
      
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