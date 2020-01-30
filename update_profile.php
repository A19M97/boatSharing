<?php
session_start();
require_once('db/mysql_credentials.php');
require_once('php/utility/utility_functions.php');

$email = $_SESSION['email']; 

$first_name = $_POST['first_name']; 
$last_name = $_POST['last_name']; 

$con = get_db_connection();

// Get user from login
$error_code = update_user($email, $first_name, $last_name, $con);

if ($error_code == 0) { //no error
    $_SESSION['name'] = $first_name;
    $_SESSION['surname'] = $last_name;
    header("Location: show_profile.php");
    exit();
} else {
    // Error message
    echo "There was an error in the update process.";
}
