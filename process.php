<?php

header('Content-Type: application/json');

if(isset($_GET['action'])) {
    if ($_GET['action'] == 'signup') {
        echo json_encode(signup());
    }

    if ($_GET['action'] == 'signin') {
        echo json_encode(signin());
    }

    if ($_GET['action'] == 'logout') {
        echo json_encode(logout());
    }

}

function signup()
{
    require_once("config.php");

    try {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $log_in = "SELECT * FROM user WHERE email='$email'";
        $log_in_rs = mysqli_query($conn, $log_in);

        if(mysqli_num_rows($log_in_rs) > 0) {
            return array('success' => false, 'message' => 'Email is already taken!');
        }

        $enabled = 0;
        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO user(name, email, password, enabled, created_at) VALUES ('$name', '$email', '$hashed_password', $enabled, '$date')";

        if(mysqli_query($conn, $query)) {
            return array('success' => true, 'message' => 'User is registered successfully!');
        } else {
            return array('success' => false, 'message' => 'Error occurred while registering user: ' . mysqli_error($conn));
        }
    } catch (Exception $e) {
        return array('success' => false, 'message' => 'An error occurred: ' . $e->getMessage());
    }
}

function signin()
{
    require_once("config.php");

    try {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $log_in = "SELECT * FROM user WHERE email='$email'";
        $log_in_rs = mysqli_query($conn, $log_in);

        if(mysqli_num_rows($log_in_rs) > 0) {
            $row = mysqli_fetch_assoc($log_in_rs);
            $hashed_password = $row['password'];

            if(password_verify($password, $hashed_password)) {
                $_SESSION['email'] = $email;
                return array('success' => true, 'message' => 'User is logged in successfully!');
            } else {
                return array('success' => false, 'message' => 'Incorrect password!');
            }
        } else {
            return array('success' => false, 'message' => 'User not found!');
        }
    } catch (Exception $e) {
        return array('success' => false, 'message' => 'An error occurred: ' . $e->getMessage());
    }
}

function logout()
{
    require_once("config.php");
    $response = array();

    try {

        session_destroy();


        if(session_status() === PHP_SESSION_NONE) {

            $response['success'] = true;
            $response['message'] = 'Logout successful.';
        } else {

            $response['success'] = false;
            $response['message'] = 'Unable to destroy session.';
        }
    } catch (Exception $e) {

        $response['success'] = false;
        $response['message'] = 'An error occurred during logout: ' . $e->getMessage();
    }

    return $response;
}
