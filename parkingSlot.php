<!doctype html>
<?php
session_start();
//ob_start();
?>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>Parking Slot</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
         .button{
            height: 50px;
            width: 50px;
            background-color: black; 
            color: white;
         }
         .donate-now {
  list-style-type: none;
  margin: 25px 0 0 0;
  padding: 0;
}

.donate-now li {
  float: left;
  margin: 0 5px 0 0;
  width: 100px;
  height: 40px;
  position: relative;
}

.donate-now label,
.donate-now input {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.donate-now input[type="radio"] {
  opacity: 0.01;
  z-index: 100;
}

.donate-now input[type="radio"]:checked+label,
.Checked+label {
  background: yellow;
}

.donate-now label {
  padding: 5px;
  border: 1px solid #CCC;
  cursor: pointer;
  z-index: 90;
}

.donate-now label:hover {
  background: #DDD;
}
.wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 80px;
  grid-auto-rows: 100px;
}
      </style>
   </head>
   <?php
      require_once("dbConfig.php");
      $sql = "SELECT * FROM floors";
      $all_floors = mysqli_query($mysqli,$sql);
      ?>
   
     <?php
   
      $from_date = $to_date = $time = $floor_selected = $k = "";
      $reserved_floors = array();
      $reserved_spots = array();
      $associativeArray = array();

    if(isset($_POST['search']))      
    { 
         $datesArrays = [];
         $from_date = $_POST["from_date"];
         $to_date = $_POST["to_date"];
         $time = $_POST["time"];
         $floor_selected = $_POST["floor"];
                              
         $startingDates = strtotime($from_date);
         $endingDates = strtotime($to_date);
         
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
           
           if(count($result1) > 0 && $timing == $time && $floor_selected == $floors)
           {
                $count++;
                $reserved_floors[] = $floors;
                $reserved_spots[] = $spot;
                $associativeArray[$floors] = $spot;
           }
        }
    }
	?>
    <script>
         $(document).ready(function(){
            $('#from').val("<?php echo $from_date ?>");
            $('#to').val("<?php echo $to_date ?>");
            $('#timess').val("<?php echo $time ?>");
            $('#floorss').val("<?php echo $floor_selected ?>");

           
         });
    </script>

    <?php
      
    if (isset($_POST['book'])) 
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $timess = $_POST['timess'];
        $floorss = $_POST['floorss'];
        $spotss = $_POST['spot'];
        $fromDates = date("Y-m-d", strtotime($from));
        $toDates = date("Y-m-d", strtotime($to));
        if($timess == "fullday")
        {
         $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot) VALUES('$fromDates', '$toDates', 'morning', '$floorss', '$spotss')");
         $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot) VALUES('$fromDates', '$toDates', 'afternoon', '$floorss', '$spotss')");
         $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot) VALUES('$fromDates', '$toDates', 'evening', '$floorss', '$spotss')");
         $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot) VALUES('$fromDates', '$toDates', 'night', '$floorss', '$spotss')");
        }else{
         $result   = mysqli_query($mysqli, "INSERT INTO date_check(from_date, to_date, timing, floors, spot) VALUES('$fromDates', '$toDates', '$timess', '$floorss', '$spotss')");
        }
        
        if($result)
        {
            echo '<script>alert("Date Enter successfully.")</script>';
        }
    }
   ?>
   <body>
        <form method="post" action="" name="registration_form" id="registration_form">

            <p>Start Date: <input type="text"  id="datepicker" autocomplete="off" name='from_date' size='9' value="<?php if(isset($_POST['search'])){ echo $from_date; }?>" required/> </p>
            <p>End Date: <input type="text" id="datepicker2" autocomplete="off" name='to_date' size='9' value="<?php if(isset($_POST['search'])){ echo $to_date; }?>" required/> </p>
            
            <select name="time" id="time" required>
                  <option value="0">-- Select Time --</option>
                  <option value="morning" <?php if(isset($_POST['search'])){ if( $time == "morning"){ echo "selected";} }?>>morning</option>
                  <option value="afternoon" <?php if(isset($_POST['search'])){ if( $time == "afternoon"){ echo "selected";} }?>>afternoon</option>
                  <option value="evening" <?php if(isset($_POST['search'])){ if( $time == "evening"){ echo "selected";} }?>>evening</option>
                  <option value="night" <?php if(isset($_POST['search'])){ if( $time == "night"){ echo "selected";} }?>>night</option>
                  <option value="fullday" <?php if(isset($_POST['search'])){ if( $time == "fullday"){ echo "selected";} }?>>fullday</option>
            </select>
            <br><br>
            <div class="form-group">
                <select id="floors" name="floor" class="floor form-control browser-default custom-select" required>
                    <option value="0">-- Select Floor --</option>
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
            
            <input type="submit" id="search" class="search btn btn-primary btn-block btn-lg" name="search" value="submit"  onSubmit="return submitform();"><br>
                    
        </form>
         <br><br>
        <form action="" method="post" name="book_form" id="book_form">
             <input type="hidden" id="from" name="from">
            <input type="hidden" id="to" name="to">
            <input type="hidden" id="timess" name="timess">
            <input type="hidden" id="floorss" name="floorss">
            <div class="wrapper">
            <?php

            for($j = 1; $j<=20; $j++)
            {
            ?>
                <ul class="donate-now">
                    <li>
                    <?php
                    if (in_array($j, $reserved_spots)) 
                    {
                        ?>
                        <input type="radio" id="<?php echo $j; ?>" class="spot disable" name="spot" value="<?php echo $j; ?>" disabled/>
                        <label for="<?php echo $j; ?>"><?php echo $j; ?></label>
                        <?php
                    }
                    else{
                    ?>
                        <input type="radio" id="<?php echo $j; ?>" class="spot" name="spot" value="<?php echo $j; ?>"/>
                        <label for="<?php echo $j; ?>"><?php echo $j; ?></label>
                    <?php
                    }
                    ?>
                    </li>
                </ul>
            <?php
            }
            ?>
            </div>
            <input type="submit" class="btn btn-primary btn-block btn-lg" name="book" value="Book"><br>
        </form>
   <script> 

      
        // $(".spot").prop("disabled", true);

            /*$("#datepicker").on('change', function(){
               $("#datepicker2").prop( "disabled", false );
            });*/
      /*$( document ).ready(function() {
         $("#datepicker2").prop( "disabled", true );
         $("#time").prop("disabled", true);
         $("#floors").prop("disabled", true);
            $("#datepicker2").on("change", function(){
               $("#time").prop("disabled", false);
            });

            $("#time").on("change", function(){
               $("#floors").prop("disabled", false);
            });

             $("search").on("submit", function(){
               $("#datepicker2").prop( "disabled", false );
               $("#time").prop("disabled", false);
               $("#floors").prop("disabled", false);
            });
      });*/ 
   </script>
   </body>
</html>