<?php

// TODO: change credentials in the db/mysql_credentials.php file
require_once('db/mysql_credentials.php');

// Open DBMS Server connection

// Get values from $_POST, but do it IN A SECURE WAY
$email = null; // replace null with $_POST and sanitization
$first_name = null; // replace null with $_POST and sanitization
$last_name = null; // replace null with $_POST and sanitization
$password = null; // replace null with $_POST and sanitization
$password_confirm = null; // replace null with $_POST and sanitization

// Get additional values from $_POST, but do it IN A SECURE WAY
// If you have additional values, change functions params accordingly

function insert_user($email, $first_name, $last_name, $password, $password_confirm, $db_connection) {
    // TODO: check if passwords match
    
    // TODO: registration logic here
    
    // Return if the registration was successful
    return false;
}

// Get user from login
$successful = insert_user($email, $first_name, $last_name, $password, $password_confirm, $con);

if ($successful) {
    // Success message
    echo "$email registered successfully!";
} else {
    // Error message
    echo "There was an error in the registration process.";
}
