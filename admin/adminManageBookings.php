<!-- Include php files -->
<?php 
        session_start();
        include '../header.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
    <h1 class = "text-center p-3 m-3 text-info">Parking Grid's List of Bookings</h1>   
    <div class="card-body">
            <div class="table-responsive text-info m-1 p-1">
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
                    include '../dbConfig.php';  
                    $sr_no = 0;
                    $query = mysqli_query($mysqli,"SELECT * FROM `date_check`");    
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
        <input type="reset" class="btn btn-info bg-info btn-block btn-lg text-light" id= "back" name="back" value="Go back to Dashboard page" 
      onclick = "redirectToAdminDashboardPage()">
</body>
</html> 

<?php 
    include "../footer.php";
?>