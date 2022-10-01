<?php
session_start();

include "dbConfig.php";
// $sql = "SELECT * FROM `user_role`";
// $all_user_role = mysqli_query($mysqli,$sql);
if (isset($_POST['next'])) {
    
    $role = $_POST['role'];
    $_SESSION['role'] = $_POST['role'];
    header("Location: login.php?role=$role");
    
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Select Role</title>
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

<?php include "header.php"; ?>

<body>

<div class="login-form">
<form action="" method="post" name="login_form" autocomplete="off">
<h4 class="modal-title text-info">Select the User Role</h4>
    <div class="form-group" id="role">
        <label><input type="radio" class="form-switch" name="role" value="admin" data-id="admin" > Admin</label>
        <label><input type="radio" class="form-switch" name="role" value="customer" data-id="customer"> Customer</label>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" 
        id= "next" name="next" value="Next" onclick = "selectRole()">
    </div>
</form>
</div>    
</div>
<?php 
    include 'footer.php';
?> 
</body>

<script> 
    <?php 
        include 'js/main.js';
    ?>
</script>

</html>



