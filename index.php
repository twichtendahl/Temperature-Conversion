<?php

// ********************************** //
//                                    //
//     index.php                      //
//     Main application page          //
//     with interactive form          //
//     that converts temper-          //
//     atures between three           //
//     major measurement sy-          //
//     stems.                         //
//                                    //
//     Ian Bryan                      //
//     Ruth Mansoor                   //
//     Travis Wichtendahl             //
//                                    //
//     ITC250 SP16 Bill Newman        //
//                                    //
// ********************************** //

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temperature Conversion</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <h1>Temperature Conversion App</h1>
  <p>Using the form below, you can convert a temperature from one unit (Fahrenheit, Celcius, or Kelvin) to another.</p>
  <?php
    /* Form handler determines whether form was sent.
       If so, processes form by validating data then
       converting temperature.
       If not, show form. */
    
    if(isset($_POST['Submit'])){//data submitted, show data
        echo $_POST['FirstName'];
    }else{//show form
        echo '<form action="index.php" method="post">
        <!-- User enters a temperature and unit of measurement -->
        <label for="temperature_start">Temperature:</label>
        <input id="temperature_start" name="temperature_start" type="text" />
        <select id="unit_start" name="unit_start">
            <option value="fahrenheit">&deg;F</option>
            <option value="celcius">&deg;C</option>
            <option value="kelvin">&deg;K</option>
        </select>

        <!-- User designates a desired unit of measurement -->
        <label for="unit_end">Desired Units: </label>
        <select id="unit_end" name="unit_end">
            <option value="fahrenheit">Fahrenheit</option>
            <option value="celcius">Celcius</option>
            <option value="kelvin">Kelvin</option>
        </select>

        <!-- Submit temperature conversion form -->
        <input type="submit" id="submit" name="submit" value="Convert">  
    </form>';
    }
    ?>    
</body>
</html>