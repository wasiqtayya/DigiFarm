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

    if ($_GET['action'] == 'addfarm') {
        echo json_encode(addFarm());
    }

    if ($_GET['action'] == 'deleteform') {
        echo json_encode(deleteForm());
    }

    if ($_GET['action'] == 'updatefarm') {
        echo json_encode(updateFarm());
    }

    

    
}

function signup()
{
    require_once("config.php");

    try {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $hashed_password = md5($password);

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

        $password = md5($password);

        $log_in = "SELECT * FROM user WHERE email='$email'";
        $log_in_rs = mysqli_query($conn, $log_in);

        if(mysqli_num_rows($log_in_rs) > 0) {
            $row = mysqli_fetch_assoc($log_in_rs);
            $hashed_password = $row['password'];

            if($password == $hashed_password) {
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

function addFarm()
{
    require_once("config.php");

    try {
        $farmName = $_POST["farmName"];
        $villageName = $_POST["villageName"];
        $landArea = $_POST["landArea"];
        $possessionType = $_POST["possessionType"];
        $coordinates = $_POST["coordinates"];
        $opportunityCost = isset($_POST["opportunityCost"]) ? $_POST["opportunityCost"] : null;
        $rentalCost = isset($_POST["rentalCost"]) ? $_POST["rentalCost"] : null;
        list($latitude, $longitude) = explode(',', $coordinates);

        $log_in = "SELECT id FROM user WHERE email='{$_SESSION['email']}'";
        $log_in_rs = mysqli_query($conn, $log_in);

        if(mysqli_num_rows($log_in_rs) > 0) {
            $row = mysqli_fetch_assoc($log_in_rs);
            $userId = $row['id'];

            $enabled = 0;
            $date = date('Y-m-d H:i:s');

            $insert_query = "INSERT INTO farm (user_id, farm_name, village_no, farm_area, possession_type_id, enabled, created_at, latitude, longitude) VALUES ($userId, '$farmName', '$villageName', $landArea, $possessionType, $enabled, '$date', '$latitude', '$longitude')";
            $insert_result = mysqli_query($conn, $insert_query);

            if($insert_result) {
                $farmId = mysqli_insert_id($conn);

                if ($possessionType == '1') {
                    $insert_cost_query = "INSERT INTO possession_cost (farm_id, possession_cost, enabled, created_at) VALUES ($farmId, $opportunityCost, $enabled, '$date')";
                } elseif ($possessionType == '2') {
                    $insert_cost_query = "INSERT INTO possession_cost (farm_id, possession_cost, enabled, created_at) VALUES ($farmId, $rentalCost, $enabled, '$date')";
                }

                if(mysqli_query($conn, $insert_cost_query)) {
                    return array('success' => true, 'message' => 'Farm added successfully!');
                } else {
                    return array('success' => false, 'message' => 'Failed to add farm!');
                }
            } else {
                return array('success' => false, 'message' => 'Failed to add farm!');
            }

        } else {
            return array('success' => false, 'message' => 'User not found!');
        }
    } catch (Exception $e) {
        return array('success' => false, 'message' => 'An error occurred: ' . $e->getMessage());
    }
}
function deleteForm()
{
    require_once("config.php");
    try {
        $id = $_POST['id']; 

        $update_query = "UPDATE farm SET enabled = '1' WHERE id='$id'";
        $update_result = mysqli_query($conn, $update_query);

        if($update_result) {
            return array('success' => true, 'message' => 'Farm deleted successfully!');
        } else {
            return array('success' => false, 'message' => 'Failed to delete record!');
        }
    } catch (Exception $e) {
        return array('success' => false, 'message' => 'An error occurred: ' . $e->getMessage());
    }
}

function updateFarm()
{
    require_once("config.php");

    try {
        $farmId = $_POST['id']; 
        $farmName = $_POST["farmName"];
        $villageName = $_POST["villageName"];
        $landArea = $_POST["landArea"];
        $possessionType = $_POST["possessionType"];
        $coordinates = $_POST["coordinates"];
        $opportunityCost = isset($_POST["opportunityCost"]) ? $_POST["opportunityCost"] : null;
        $rentalCost = isset($_POST["rentalCost"]) ? $_POST["rentalCost"] : null;
        list($latitude, $longitude) = explode(',', $coordinates);

        $date = date('Y-m-d H:i:s');

        $update_query = "UPDATE farm SET farm_name='$farmName', village_no='$villageName', farm_area=$landArea, possession_type_id=$possessionType, latitude='$latitude', longitude='$longitude' WHERE id=$farmId";
        $update_result = mysqli_query($conn, $update_query);
    
        if($update_result) {

            if ($possessionType == '1') {
                $insert_cost_query = "UPDATE possession_cost SET possession_cost = '$opportunityCost',created_at='$date' WHERE id=$farmId";
            } elseif ($possessionType == '2') {
                $insert_cost_query = "UPDATE possession_cost SET possession_cost = '$rentalCost',created_at='$date' WHERE id=$farmId";

            }

            if(mysqli_query($conn, $insert_cost_query)) {
                return array('success' => true, 'message' => 'Farm updated successfully!');
            } else {
                return array('success' => false, 'message' => 'Failed to update farm!');
            }
        } else {
            return array('success' => false, 'message' => 'Failed to update farm!');
        }
    } catch (Exception $e) {
        return array('success' => false, 'message' => 'An error occurred: ' . $e->getMessage());
    }
}

?>


