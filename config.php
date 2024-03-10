<?php
session_start();

// Database configuration
$servername = "localhost";
$database = "digi_farm";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_query($conn, "SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");

// Handle page title without login
$pageTitle = "";
if (!isset($_SESSION['email'])) {
    if (isset($_GET['p'])) {
        if ($_GET['p'] == "register") {
            $pageTitle = "Register";
        }
    } else {
        $pageTitle = "Login";
    }
} else {
    if ($_GET['p'] == "farm") {
        $pageTitle = "Farm";
    } else if ($_GET['p'] == "crop") {
        $pageTitle = "Crop";
    } else if ($_GET['p'] == "costEstimation") {
        $pageTitle = "Cost Estimation";
    } else {
        $pageTitle = "Dashboard";
    }
}
?>
