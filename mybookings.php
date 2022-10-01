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
    <title>My Bookings</title>
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
            include "css/style.css"
        ?>
    </style>

<!-- Include js files into php -->
    <script>
        <?php
            include "/js/main.js";
        ?>
    </script>

<body>
    <h1 class = "text-center p-3 m-3 text-info">My Bookings</h1>   

    <div class="card-body container">
            <div class="table-responsive text-info m-1">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Place</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Car No.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'dbConfig.php';  
                    $sr_no = 0;
                    $query = mysqli_query($mysqli, "SELECT * FROM `date_check` WHERE user_id = '$user_id'");   
                    while($row = mysqli_fetch_array($query)){
                        $sr_no++;
                ?> 
                <tr>
                    <td><?php echo $sr_no;?></td>
                    <td><?php echo "<b> Location </b> :  " . $row['location_id'] . "<b> Floor </b> :  " . $row['floors'] . " <b> Spot </b> :  " . $row['spot'] ;?></td>
                    <td><?php echo "<b> From </b> :  " . $row['from_date'] . "<b> To </b> : " . $row['to_date'];?></td>
                    <td><?php echo $row['timing'];?></td>
                    <td><?php echo $row['plat_number'];?></td>
                </tr>
                <?php  } ?>
            </tbody>
            </table>
            </div>
        </div> 
</body>
</html>

<?php 
  include "footer.php";
?>