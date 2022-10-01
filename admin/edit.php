<?php
      include '../dbConfig.php';
      $editId=$_GET['edit'];  
        if (isset($_POST['editProfile'])) {
                    $first_name = $_POST['firstName'];
                    $last_name = $_POST['lastName'];
                    //$card = $_POST['cardNumber'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $editProfile = "UPDATE `registration` SET `fname`='$first_name',`lname`='$last_name',`email`='$email',`phone`='$phone' WHERE  id = '$editId'";
                }

                if(mysqli_query($mysqli, $editProfile))
                {
                    echo " 
                    <script> 
                        alert('Profile Edited Successfully');
                        window.location.href = '../logout.php';
                    </script>
                    ";
                }
                else
                {
                    // echo "<br> Error : " . $query . "<br>" . mysqli_error($con);
                    echo "
                    
                    <script> 
                        alert('Unable to edit Profile! Please Try Again!!');
                        window.location.href = 'editProfile.php';
                    </script>
                    ";
                }
            
?>

