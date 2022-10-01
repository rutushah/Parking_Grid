<?php

    include '../dbConfig.php';  
    error_reporting(0); // to avoid displaying of warning
    $delete_id=$_GET['del'];  
    $deleteQuery = "DELETE FROM `registration` WHERE id = '$delete_id'";
    $data = mysqli_query($mysqli,$deleteQuery);

    if($data){
        echo "
        <script> 
        alert('Record Deleted Successfully')
        window.location.href = 'adminManageUsers.php';
        </script>
        ";

    }else {
        echo "
        <script> 
        alert('Failed to Delete Record')
        window.location.href = 'adminManageUsers.php';
        </script>
        ";
    }
?>