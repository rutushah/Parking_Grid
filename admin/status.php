<?php

include '../dbConfig.php';  


$id = $_GET['id'];

$status = $_GET['status']; 

$q = "update registration set status=$status where id=$id";

// $q = "UPDATE register SET status=1 WHERE where id=1";

mysqli_query($mysqli, $q);

header('location:adminManageUsers.php')

?>