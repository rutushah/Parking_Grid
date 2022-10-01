
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calender Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
  <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <style>

</style>
</Head>

<body>

<br>
<p>Start Date: <input type="text"  id="datepicker" autocomplete="off" name='from_date' size='9' value="" /> </p>
<p>End Date: <input type="text" id="datepicker2" autocomplete="off" name='to_date' size='9' value="" /> </p>

<script>
    $(function() {
       $( "#datepicker, #datepicker2" ).datepicker({
          changeMonth:true,
          changeYear:true,
          numberOfMonths:[1,1],
          minDate: 0,
          date_format: "yyyymmdd"
       });
    });
</script>


</body>
</html>