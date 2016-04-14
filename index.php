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
  <p>Using the form below, you can convert a temperature from one unit (Fahrenheit, Celsius, or Kelvin) to another.</p>
  <?php
    /* Form handler determines whether form was sent.
       If so, processes form by validating data then
       converting temperature.
       If not, show form. */
    
    if(isset($_POST['submit'])){//data submitted, process and show data
        
    /*****************************  FUNCTIONS  *****************************/
        
        /* ================================================================ *
         * Selects a conversion formula based on units passed as arguments, *
         * then undergoes conversion and returns converted temperature.     *
         * First argument is temperature to be converted, second arg is an  *
         * ordered pair of text - (start unit, end unit).                   *
         * ================================================================ */
        
        function convert_temperature($temperature, $units) {

            // Initialize return variable
            $converted = 0;

            switch($units) {
            case array('fahrenheit','celsius'):
                $converted = fahrenheit_to_celsius($temperature);
                break;
            case array('fahrenheit','kelvin'):
                $converted = fahrenheit_to_kelvin($temperature);
                break;
            case array('celsius','fahrenheit'):
                $converted = celsius_to_fahrenheit($temperature);
                break;
            case array('celsius','kelvin'):
                $converted = celsius_to_kelvin($temperature);
                break;
            case array('kelvin','fahrenheit'):
                $converted = kelvin_to_fahrenheit($temperature);
                break;
            case array('kelvin','celsius'):
                $converted = kelvin_to_celsius($temperature);
                break;
            default:
                $converted;   	 
            }

            return $converted;
        }
        
        
        /* ========================================================= *
         * List of individual formulae for specific unit conversions *
         * ========================================================= */
        
        // Fahrenheit to Celsius
        function fahrenheit_to_celsius($temperature_start)
        {
            $celsius = 5/9 * $temperature_start - 160/9;
            return $celsius;
        }
        
        // Fahrenheit to Kelvin
        function fahrenheit_to_kelvin($temperature_start)
        {
            $kelvin = 5/9 * $temperature_start + 45967/180;
            return $kelvin;
        }

        // Celsius to Fahrenheit
        function celsius_to_fahrenheit($temperature_start)
        {
            $fahrenheit = 9/5 * $temperature_start + 32;
            return $fahrenheit;
        }
        
        // Celsius to Kelvin
        function celsius_to_kelvin($temperature_start)
        {
            $kelvin = $temperature_start + 5463/20;
            return $kelvin;
        }
        
        // Kelvin to Fahrenheit
        function kelvin_to_fahrenheit($temperature_start)
        {
            $fahrenheit = 9/5 * $temperature_start - 1379/3;
            return $fahrenheit;
        }
        
        // Kelvin to Celsius
        function kelvin_to_celsius($temperature_start)
        {
            $celsius = $temperature_start - 5463/20;
            return $celsius;
        }
    
    /************************  PROGRAM FLOW  *************************/
        
        /* ====================================== *
         *         Capture data from form         *
         * ====================================== */
        
        $temperature = $_POST['temperature_start'];
        $unit_start = $_POST['unit_start'];
        $unit_end = $_POST['unit_end'];

        $units = [$unit_start, $unit_end];
        
        // Convert temperature to desired units
        $convertedTemperature = convert_temperature($temperature, $units);
        
        // Display converted temperature
        echo "<p>Your converted temperature is {$convertedTemperature} {$unit_end}</p>";
        
        
        
    }else{//show form
        echo '<form action="index.php" method="post">
        <!-- User enters a temperature and unit of measurement -->
        <label for="temperature_start">Temperature:</label>
        <input id="temperature_start" name="temperature_start" type="text" /><span id="temperature_alert"></span>
        <select id="unit_start" name="unit_start">
            <option value="fahrenheit">&deg;F</option>
            <option value="celsius">&deg;C</option>
            <option value="kelvin">&deg;K</option>
        </select>

        <!-- User designates a desired unit of measurement -->
        <label for="unit_end">Desired Units: </label>
        <select id="unit_end" name="unit_end"><span id="unit_alert"></span>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
        </select>

        <!-- Submit temperature conversion form -->
        <input type="submit" id="submit" name="submit" value="Convert">  
    </form>';
    }
    ?>
    
    <!-- ******************* VALIDATION SCRIPTS ******************* -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="validation.js" type="text/javascript"></script>
</body>
</html>