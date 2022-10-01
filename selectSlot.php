<?php 
  ob_start(); 
  session_start();
  include "dbConfig.php";
  include "header.php";    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select Slot Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="js/bootstrap.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    

    <script>
         $(function() {
            $( "#datepicker" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1],
               minDate: 0,
               date_format: "yyyymmdd",
               onSelect: function(date){            
                     var date1 = $('#datepicker').datepicker('getDate');           
                     var date = new Date( Date.parse( date1 ) ); 
                     date.setDate( date.getDate());        
                     var newDate = date.toDateString(); 
                     newDate = new Date( Date.parse( newDate ) );                      
                     $('#datepicker2').datepicker("option","minDate",newDate);            
                     $("#datepicker2").prop( "disabled", false );
                     $("#datepicker2").val("");
               }
            });
            $( "#datepicker2" ).datepicker({
               changeMonth:true,
               changeYear:true,
               numberOfMonths:[1,1],
               date_format: "yyyymmdd"
            });
         });
   
      </script>
    <style>
        <?php 
        include "css/style.css";
        include "css/Css.css";
        include "css/bootstrap.css";
        ?>
        html{
            position: relative;
            min-height: 100%;
        }

        body{
            background-color: rgb(247, 251, 252);
            margin-bottom: 100px;
        }
        .radio-toolbar {
            margin: 0px 370px;
        }

        .radio-toolbar input[type="radio"] 
        {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: #ddd;
            padding: 10px 20px;
            font-family: sans-serif, Arial;
            font-size: 16px;
            border: 2px solid #444;
            border-radius: 4px;
        }

        .radio-toolbar label.disable{
            background-color: #ff0000;
        }

        .radio-toolbar label:hover {
        background-color: #dfd;
        }

        .radio-toolbar input[type="radio"]:focus + label {
            border: 2px dashed #444;
        }

        .radio-toolbar input[type="radio"]:checked + label {
            background-color: #bfb;
            border-color: #4c4;
        }

        .wrapper {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 50px;
            grid-auto-rows: 50px;
        }

        .select_slot_title{
            text-decoration: underline;
        }
    </style>
</head>

   
     <?php
    require_once("dbConfig.php");
    $from_date = $to_date = $time = $floor_selected = $k = $total_days = "";
    $reserved_floors = array();
    $reserved_spots = array();
    $associativeArray = array();

    $location_id = $_GET['locations']; 
    $vehicle = $_SESSION['vehicle'];
    $plateNumber = $_SESSION['plateNumber'];
   
   
    $sql = "SELECT * FROM floors where location_id = $location_id AND floor_status = 0";
    $all_floors = mysqli_query($mysqli,$sql);
   
    if(isset($_POST['search']))      
    { 
        $datesArrays = [];
        $from_date = $_POST["from_date"];
        $to_date = $_POST["to_date"];
        $time = $_POST["time"];
        $floor_selected = $_POST["floor"];
        //echo "Selected Floor".$floor_selected;
                             
        $startingDates = strtotime($from_date);
        $endingDates = strtotime($to_date);
        //die();
        for ($currentDate = $startingDates; $currentDate <= $endingDates; $currentDate += (86400)) {
            $date = date('Y-m-d', $currentDate);
            $datesArrays[] = $date;
        }

        $get_dates   = mysqli_query($mysqli, "Select * from date_check");
        $date_matched_array = mysqli_num_rows($get_dates);
        
        $count=0;
        
        while($all_dates = mysqli_fetch_array($get_dates))
        {
           $from_dates = $all_dates['from_date'];
           $last_dates = $all_dates['to_date'];
           $timing = $all_dates['timing'];
           $floors = $all_dates['floors'];
           //echo "from db". $floors;
           $spot = $all_dates['spot'];
                                         
           $datesArray = [];
           
           $startingDate = strtotime($from_dates);
           $endingDate = strtotime($last_dates);
                                                  
           for ($currentDate = $startingDate; $currentDate <= $endingDate; $currentDate += (86400)) 
           {
              $date = date('Y-m-d', $currentDate);
              $datesArray[] = $date;
           }
           
           $result1 = array_intersect($datesArrays, $datesArray);
           
           if(count($result1) > 0 && ($timing == $time || "fullday") && $floor_selected == $floors)
           {
                $count++;
                $reserved_floors[] = $floors;
                $reserved_spots[] = $spot;
                $associativeArray[$floors] = $spot;
                //print_r($reserved_floors);
                //print_r($reserved_spots);
           }
           
        }
       // die();
    }
	?>
    <!-- <script type="text/javascript">
        function setValue()
        {
            var from_date1 = document.getElementById('datepicker').value;
            var to_date1 = document.getElementById('datepicker2').value;
            var time1 = document.getElementById('time');
            var time1_val = time1.options[time1.selectedIndex].value;
            var floors1 = document.getElementById('floors');
            var floors1_val = floors1.options[floors1.selectedIndex].value;
            $('#from').val(from_date1);
            $('#to').val(to_date1);
            $('#timess').val(time1_val);
            $('#floorss').val(floors1_val);
        }
        </script> -->
        <script>
         $(document).ready(function(){
            $('#from').val("<?php echo $from_date ?>");
            $('#to').val("<?php echo $to_date ?>");
            $('#timess').val("<?php echo $time ?>");
            $('#floorss').val("<?php echo $floor_selected ?>");

           
         });
    </script>
    <?php
    
    $from = $to = $timess = $floorss = $spotss = $fromDates = $toDates = $cost = $total_cost = $date_from = $date_to = "";
    
    if (isset($_POST['book'])) 
    {
            $from = $_POST['from'];
            $to = $_POST['to'];
            $timess = $_POST['timess'];
            $floorss = $_POST['floorss'];
            $fromDates = date("Y-m-d", strtotime($from));
            $toDates = date("Y-m-d", strtotime($to));
            $date_from = strtotime($from);
            $date_to = strtotime($to);
            $datediff = $date_to - $date_from;
            $total_days = round($datediff / (60 * 60 * 24)) + 1;
            echo $total_days;
            if($timess == "morning")
            {
                $cost = 5;
            }else if($timess == "afternoon"){
                $cost = 10;
            }else if($timess == "evening"){
                $cost = 15;
            }else if($timess == "night"){
                $cost = 20;
            }else{
                $cost = 35;
            }
            $total_cost = $total_days * $cost;
            $spotss = $_POST['spot'];
        
       
        //  $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot, vehicle_type, plat_number, total_cost) VALUES('$fromDates', '$toDates', '$timess', '$floorss', '$spotss', '$vehicle', '$plateNumber', '$total_cost')");
        
        // if($result)
        // {
            $_SESSION['fromDates'] = $fromDates;
            $_SESSION['to_date'] = $toDates;
            $_SESSION['timing'] = $timess;
            $_SESSION['floors'] = $floorss;
            $_SESSION['spot'] = $spotss;
            $_SESSION['vehicle_type'] = $vehicle;
            $_SESSION['plat_number'] = $plateNumber;
            $_SESSION['total_cost'] = $total_cost;
            header("Location: confirm.php?locations=$location_id");
        // }
    }
   ?>
<body>

<div class="loc">
    <form method="post" action="" name="registration_form" id="registration_form">
        <div class="locationdiv">
            <h1 class = "modal-title text-info m-3 p-3">Your hassle free parking solution</h1>
            <h2 class = "modal-title text-info m-2 p-2">Parking Location <?php echo $location_id; ?> selected</h2>
            <h3 class = "modal-title text-info m-1 p-1">Please fill/select the details</h3>
        </div>
        
        <div class="locationdrop">
            <h5>Start Date: <input type="text"  id="datepicker" autocomplete="off" name='from_date' size='9' value="<?php if(isset($_POST['search'])){ echo $from_date; }?>" required> </h5>
            <br>
            <h5>End  Date: <input type="text" id="datepicker2" autocomplete="off" name='to_date' size='9' value="<?php if(isset($_POST['search'])){ echo $to_date; }?>" required> </h5>
            <br>
            <select name="time" id="time" required class="selectclass rounded" required>
                <option value="0" class="active">-- Select Time --</option>
                <option value="morning" <?php if(isset($_POST['search'])){ if( $time == "morning"){ echo "selected";} }?>>Morning - $5</option>
                <option value="afternoon" <?php if(isset($_POST['search'])){ if( $time == "afternoon"){ echo "selected";} }?>>Afternoon - $10</option>
                <option value="evening" <?php if(isset($_POST['search'])){ if( $time == "evening"){ echo "selected";} }?>>Evening - $15</option>
                <option value="night" <?php if(isset($_POST['search'])){ if( $time == "night"){ echo "selected";} }?>>Night - $20</option>
                <option value="fullday" <?php if(isset($_POST['search'])){ if( $time == "fullday"){ echo "selected";} }?>>Fullday - $35</option>
            </select>
            <br>
            <br>
            <div class="form-group ">
                <select id="floors" name="floor" class="floor selectclass rounded" required>
                    <option value="0" class="active">-- Select Floor --</option>
                        <?php
                            while ($floor = mysqli_fetch_array(
                                    $all_floors,MYSQLI_ASSOC)):;
                        ?>
                            <option value="<?php echo $floor["id"];
                            ?>" <?php if(isset($_POST['search'])){ if( $floor_selected == $floor["id"]){ echo "selected";} }?>>
                                <?php echo $floor["name"];
                                ?>
                    </option>
                        <?php
                            endwhile;
                        ?>
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="container loctionnextbutton">
            <button id="search" class="btn btn-info bg-info btn-block btn-lg text-light" style="padding-left: 3.5%;
            padding-right: 3%;" name="search">submit</button><br>
        </div>
    </form>
    
    <form action="" method="post" name="book_form" id="book_form" >
        <input type="hidden" id="from" name="from">
        <input type="hidden" id="to" name="to">
        <input type="hidden" id="timess" name="timess">
        <input type="hidden" id="floorss" name="floorss">
        <br><br>
        <h3 class="select_slot_title">Available Spots</h3>
        <br><br>
        <div class="main_container">
        <div class="radio-toolbar">
        <div class="wrapper" id="select_slot">
            <?php

            for($j = 1; $j<=20; $j++)
            {
            ?> 
                    <?php
                    if (in_array($j, $reserved_spots)) 
                    {
                        ?>
                        <input type="radio" id="<?php echo $j; ?> disable_radio" class="spot disabled radio_label" name="spot" value="<?php echo $j; ?>"/>
                        <label id="disable_radio" class="disable disabled radio_label" for="<?php echo $j; ?>"><?php echo $j; ?></label>
                        
                        <script>
                            $(document).ready(function() {
                                document.getElementById("disable_radio").disabled = true;
                            });
                        </script>
                        <?php
                    }
                    else{
                    ?>
                        <input type="radio" id="<?php echo $j; ?>" class="spot" name="spot" value="<?php echo $j; ?>"/>
                        <label for="<?php echo $j; ?>"><?php echo $j; ?></label>
                    <?php
                    }
                    ?>
            <?php
            }
            ?>
        </div>
        </div>
        <br>
        <div class="container loctionnextbutton">   
            <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light book" style="padding-left: 3.5%;
            padding-right: 3%;"name="book" value="Book"><br>
        </div>
        </div>
    </form>
        </div>
        <script> 
        $(document).ready(function() {
            if (!$('#from').val()) {
                $(".main_container *").prop('disabled', true);
                $(".radio_label").css("opacity", "0.1");
            }
            else{
                $(".main_container *").prop('disabled', false);
                $(':input[type="submit"]').prop('disabled', true);
            }

           
            
            $(':input[type=radio]').change(function() {
                $(':input[type="submit"]').prop('disabled', false);
            });
        });
   </script>
</body>
</html>