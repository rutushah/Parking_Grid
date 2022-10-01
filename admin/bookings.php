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
    <h1 class = "text-center p-3 m-3 text-info">Parking Grid's List of Registered Users</h1>   
    <div class="card-body">
            <div class="table-responsive text-info m-1 p-1">
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">User Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Card No</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No</th>
                <th scope="col">Delete</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../dbConfig.php';  
                    $user_id = 0;
                    $query = mysqli_query($mysqli,"SELECT * FROM `registration`");    
                    while($row = mysqli_fetch_array($query)){
                        $user_id++;
                ?> 
                <tr>
                    <td><?php echo $user_id;?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['card'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td>
                        <a class = "btn btn-danger" href="deleteUser.php?del=<?php echo $row['id'] ?>">
                            <i class='fas fa-trash'></i>
                        </a>
                    </td> <!--btn btn-danger is a bootstrap button to show danger-->  
                    <!-- <td><a class = "btn btn-danger"><i class='fas fa-ban'></i></a></td> btn btn-danger is a bootstrap button to show danger   -->
                    
                    <td>
                    <div class="form-group row">
                           
                           <div class="col-md-4">
                               <?php 
                               if($row['status'] == 1){ ?>
                                   <a href="status.php?id=<?php echo $row['id'] ?>&status=0"><button class="btn btn-success">Unblock</button></a>
                               <?php }else{ ?>
                                   <a href="status.php?id=<?php echo $row['id'] ?>&status=1"><button class="btn btn-danger">Block</button></a>
                               <?php }
                               ?>
                           </div>
                        </div>
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