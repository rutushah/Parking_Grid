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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="..css/style.css">
    <!-- <link rel="stylesheet" href="..css/admin.css"> -->

    <link rel="stylesheet" href="..css/bootstrap.css">
</head>

<!-- Include css into php -->
    <style>
        <?php 
            include "../css/admin.css"
        ?>
    </style>

<!-- Include js files into php -->
    <script>
        <?php
            include "../js/main.js";
        ?>
    </script>


<body>
    <h1 class = "text-center p-5 m-5 text-info">
        Welcome <?php echo $fname; ?> to Parking Grid's Admin Dashboard
    </h1>

    <h2 class = "text-center p-1 m-1 text-info">
        Please select from the available options.
    </h2>

    <div class="card p-5 m-5">
        <div class="card-body d-flex justify-content-center">
            <button class = "btn btn-info col-md-3 m-3 card-button" onclick = "redirectToManageUsers()"> Manage User's </button>
            <button class = "btn btn-info col-md-3 m-3 card-button" onclick = "redirectToManageBooking()"> Manage Booking </button>
            <button class = "btn btn-info col-md-3 m-3 card-button" onclick = "redirectToManageLocation()"> Manage Locations </button>
        </div>
    </div>

</body>
</html>

<?php 
    include "../footer.php";
?>