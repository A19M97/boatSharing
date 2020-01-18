<?php

// TODO: change credentials in the db/mysql_credentials.php file
require_once('db/mysql_credentials.php');

// Add session control, header, ...
// Open DBMS Server connection

// Get credentials from $_POST['email'] and $_POST['pass']
// but do it IN A SECURE WAY
$email = null; // replace null with $_POST and sanitization
$pass = null; // replace null with $_POST and sanitization

function login($email, $pass, $db_connection) {
    // TODO: login logic here
    
    // Return logged user
    return null;
}

// Get user from login
$user = login($email, $pass, $con);

if ($user) {
    // Welcome message
    echo "Welcome $user!";
} else {
    // Error message
    echo "Wrong email or password";
}
