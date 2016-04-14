$(function () {
    
    // Define jquery object variables
    var $temperatureStart = $('#temperature_start');
    var $unitStart = $('#unit_start');
    var $unitEnd = $('#unit_end');
    var $submit = $('#submit');
    
    
});

$('#submit').on('click', function (e) {
    // Boolean represents whether preceding tests show valid user data
    var isValid = true;
    
    // Make sure temperature field is not empty, then test for numeric data
    var $temperatureStart = $('#temperature_start');
    if ($temperatureStart.val() === "") {
        isValid = false;
        $('#temperature_alert').text("This entry is required.");
    } else if (!$.isNumeric($temperatureStart.val())) {
        isValid = false;
        $('#temperature_alert').text("This entry must be a number.");
    }
    
    // Function to compare unit fields
    function expandUnits(unitShort) {
        var unitLong = '';
        
        switch (unitShort) {
        case '&deg;F':
            unitLong = 'Fahrenheit';
            break;
        case '&deg;C':
            unitLong = 'Celsius';
            break;
        case '&deg;K':
            unitLong = 'Kelvin';
            break;
        default:
            unitLong = '';
        }
        
        return unitLong;
    }
    
    // Make sure the destination units are not the same as the starting units
    var $unitStart = $('#unit_start');
    var $unitEnd = $('#unit_end');
    if ($unitEnd.val() === expandUnits($unitStart.val())) { // Units are the same, don't send data
        isValid = false;
        $('#unit_alert').text("Beginning and ending units must be different.");
    }
    
    if (!isValid) { // User data is not valid; prevent data being sent
        e.preventDefault();
    }
});
