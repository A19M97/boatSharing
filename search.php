<?php
session_start();
require_once('php/utility/session_functions.php');
require_once('php/utility/utility_functions.php');
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location: index.php');
    exit;
}
if(!is_logged_in() || !is_admin()){
    header("location: login.php");
    exit;
}
require_once('db/mysql_credentials.php');
require_once('php/utility/utility_functions.php');

if(isset($_GET['chars']))
    $chars = $_GET['chars'];
else
    $chars = '';

$con = get_db_connection();
// Search on database
$results = search($chars, $con);

mysqli_close($con);

if ($results) {
    echo json_encode($results);
} else {
    // No matches found
    echo "no_results";
}


