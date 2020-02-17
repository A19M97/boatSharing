<?php
require_once('db/mysql_credentials.php');
require_once('php/utility/utility_functions.php');

$con = get_db_connection();

$chars = $_GET['chars'];

// Search on database
$results = search($chars, $con);

if ($results) {
    echo json_encode($results);
} else {
    // No matches found
    echo "no_results";
}


