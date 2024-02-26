<?php

require('config/config.php');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, 'digi_farm');

echo '<script>
        alert("done");
      </script>';

// Check connection
if($link === false) {
    echo '<script>console.log("ERROR: Could not connect. ' . mysqli_connect_error() . '");</script>';

    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {

    if(isset($_POST["submit"])) {

    }
}
