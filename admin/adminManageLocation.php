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
    <title>Manage Locations</title>
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
<h1 class = "text-center p-3 m-3 text-info">Parking Grid's All Available Locations</h1>   
    <div class="card-body">
            <div class="table-responsive text-info m-1 p-1">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">User Id</th>
                <th scope="col">Location Name</th>
                <th scope="col">Status</th>
                <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../dbConfig.php';  
                    $user_id = 0;
                    $query = mysqli_query($mysqli,"SELECT * FROM `location`");    
                    while($row = mysqli_fetch_array($query)){
                        $user_id++;
                ?> 
                <tr>
                    <td><?php echo $user_id;?></td>
                    <td><?php echo $row['location_name'];?></td>
                    <td>
                    <div class="form-group row">
                           
                           <div class="">
                               <?php 
                               if($row['location_status'] == 1){ ?>
                                   <a href="locationStatus.php?location_id=<?php echo $row['location_id'] ?>&location_status=0"><button class="btn btn-success" id="block">Unblock</button></a>
                               <?php }else{ ?>
                                   <a href="locationStatus.php?location_id=<?php echo $row['location_id'] ?>&location_status=1"><button class="btn btn-danger" id = "block">Block</button></a>
                               <?php }
                               ?>
                           </div>
                        </div>
                    </td>
                    <td>
                        <?php 
                            if($row['location_status'] ==1){
                        ?>
                        <a href="locationFloors.php?location=<?php echo $row['location_id'] ?>" rel="noopener noreferrer"><button class="btn btn-success" id="viewEnabled" disabled>View</button></a>
                        <?php }else{ ?>
                        <a href="locationFloors.php?location=<?php echo $row['location_id'] ?>"  rel="noopener noreferrer"><button class="btn btn-success" id = "viewEnabled">View</button></a>
                        <?php }
                               ?>
                    </td>
                    
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