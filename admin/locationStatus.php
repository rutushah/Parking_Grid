<?php

include '../dbConfig.php';  


$id = $_GET['location_id'];

$location_status = $_GET['location_status']; 
$floor_status = $location_status;

$q = "update location set location_status=$location_status where location_id=$id";
$floors = "UPDATE `floors` SET `floor_status`='$floor_status' WHERE location_id = '$id'";

// $q = "UPDATE register SET status=1 WHERE where id=1";

mysqli_query($mysqli, $q);
mysqli_query($mysqli,$floors);

header('location:adminManageLocation.php')

?>