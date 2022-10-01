<?php 
  //session_start();
  include 'dbConfig.php';
  $sql = "SELECT * FROM `user_role`";
  $all_user_role = mysqli_query($mysqli,$sql);
  $user_role = $user_id_set = "";
  if(isset($_SESSION["role"])){
    $user_role = 1;
    $roles = $_SESSION['role'];
      if(isset($_SESSION['id']))
      {  
        $user_id_set = 1;
        $user_id = $_SESSION['id'];

          $query = "SELECT * FROM `registration` WHERE id = '$user_id'";
  //echo $query;
  $run=mysqli_query($mysqli,$query);
  //echo $run=mysqli_query($mysqli,$query);
  
  $result = mysqli_fetch_row($run); 
  //echo $result = mysqli_fetch_row($run);
  $fname = $result[1];
  
  $resultType = $result[8];
  //echo $resultType = $result[8];

  //die();
      
          
      }
      
  }else{
    $user_role = 0;
    //header("Location: selectRole.php");
  }
?>


<style>
<?php 
  include "css/style.css";
  include "css/bootstrap.css";
?>
</style>

<script>
  <?php
    include "js/bootstrap.min.js";
    include "js/jquery.min.js";
    include "js/bootstrap/bootstrap.bundle.min.js";
  ?>
</script>


<nav class="navbar navbar-expand-lg navbar-light bg-info p-4">
  <div class="container-fluid">
  <?php
    if($user_id_set == 1){
      if($resultType==1){
        ?>
        <a class="navbar-brand" href="#">
        <img src="../images/logo.png" class="rounded-circle text-light" alt="ParkGridLogo" width="65" height="66"> </img>
        </a>
        <?php
      }
      if($resultType ==2){
        ?>
        <a class="navbar-brand" href="#">
  <img src="images/logo.png" class="rounded-circle text-light" alt="ParkGridLogo" width="65" height="66"> </img>
  </a> 
        <?php
      }
    }else{
      ?>
      <a class="navbar-brand" href="#">
  <img src="images/logo.png" class="rounded-circle text-light" alt="ParkGridLogo" width="65" height="66"> </img>
  </a>
   <?php }
    ?>
  <!-- <a class="navbar-brand" href="home.php">
  <img src="images/logo.png" class="rounded-circle text-light" alt="ParkGridLogo" width="65" height="66"> </img>
  </a> -->
  <!-- <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon bg-light"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

 
   <ul class="navbar-nav mr-auto mx-auto">

    <?php 
  if($user_id_set == 1)
  {
    if($resultType==1){ ?>
    
      <li class="nav-item active mx-auto">
        <a class="nav-link col px-md-5" href="adminDashboard.php">Home</a>
      </li>
        <li>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome <?php echo $fname; ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item text-dark" href="editProfile.php">Edit Profile</a></li>
            <li><a class="dropdown-item text-dark" href="../logout.php">Sign Out</a></li>
          </ul>
        </div>
      </li>
     <?php }
     
     if($resultType ==2){ ?>
      
      <li class="nav-item active mx-auto">
        <a class="nav-link col px-md-5" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item active mx-auto">
        <a class="nav-link col px-md-5" href="aboutUs.php">About Us</a>
      </li>
      <li>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome <?php echo $fname; ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item text-dark" href="mybookings.php">My Bookings</a></li>
            <li><a class="dropdown-item text-dark" href="editProfile.php">Edit Profile</a></li>
            <li><a class="dropdown-item text-dark" href="logout.php">Sign Out</a></li>
          </ul>
        </div>
      </li>
     <?php }
  }
 
     else{ ?>
       <li class="nav-item active mx-auto">
        <a class="nav-link col px-md-5" href="home.php">Home</a>
      </li>
      <li class="nav-item mx-auto">
        <a class="nav-link col px-md-5" href="selectRole.php">About us</a>
      </li>
      <li class="nav-item mx-auto">
        <a class="nav-link col px-md-5" href="selectRole.php">Contact us</a>
      </li> -->
     <?php }?>
      </ul>
    </div>
  </div>
</nav>


