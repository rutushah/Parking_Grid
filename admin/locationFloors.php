<!-- Include php files -->
<?php 
    ob_start();
        session_start();
        include '../header.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Floors</title>
</head>
<!-- Include css into php -->
<style>
        <?php 
            include "../css/admin.css";
            include "../css/bootstrap.css";
        ?>
    </style>

<!-- Include js files into php -->
    <script>
        <?php
            include "../js/main.js";
        ?>
    </script>
<body>
<?php
include '../dbConfig.php';  
include '../dbConfig.php';  

$id = $_GET['location'];
?>

<h1 class = "text-center p-3 m-3 text-info">Parking Grid's All Available floors for Location <?php echo $id; ?> </h1>   

<h2>Select the following checkboxes which you want to display to the users.</h2>

<?php
    //  $user_id = 0;
    $floor = $unchecked_floor = ""; 
     $query = mysqli_query($mysqli,"SELECT * FROM `floors` WHERE location_id = $id;");   
     if(isset($_POST['submit']))
     {
        $floor = $_POST['floors']; 
        while($data = mysqli_fetch_assoc($query))
        {
            $all_floor = $data['name'];
            foreach($floor as $floor_name)
            {
                $query1 = "UPDATE `floors` SET `floor_status`='0' WHERE `location_id`=$id AND name = '$floor_name'";
                $query_result = mysqli_query($mysqli, $query1) or die( mysqli_error($mysqli));
               
                if($all_floor != $floor_name)
                {
                    $query2 = "UPDATE `floors` SET `floor_status`='1' WHERE `location_id`=$id AND name = '$all_floor'";
                     $query_result = mysqli_query($mysqli, $query2) or die( mysqli_error($mysqli));
                }
            }
        } 
        header('location:adminManageLocation.php');       
    }     
        //  $user_id++;
      // echo $row['name'];
?>

<div class="location_floor_form">
<form action="" method="post" name = "location_floor_form">
    <div class="form-group">
        <?php
    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)):;
            ?>   
        <input class="form-check-input" type="checkbox" id="<?php echo $row['name'];?>" name="floors[]" value="<?php echo $row['name'];?>" 
        <?php echo $row['floor_status'] == '0' ? 'checked' : '';?> > 
        <label class="form-check-label"><?php echo $row['name'];?></label><br>
        <?php
        endwhile;
        ?>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" id= "block" name="submit" value="Submit">
    </div>
    </form>
    </div>

</body>   

<input type="reset" class="btn btn-info bg-info btn-block btn-lg text-light" id= "back" name="back" value="Go back to Dashboard page" 
      onclick = "redirectToAdminDashboardPage()">
</html>

<?php 
    include "../footer.php";
?>