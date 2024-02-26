<?php

session_start();

//database configration
$servername = "localhost";
$database = "digi_farm";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_query($conn, "SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");
