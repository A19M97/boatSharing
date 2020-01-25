<?php
session_start();
require_once('php/utility/session-functions.php');
if(!is_logged_in())
    header("location: login.php");

// TODO: change credentials in the db/mysql_credentials.php file
require_once('db/mysql_credentials.php');

// Open DBMS Server connection
echo $_SESSION['email'];

// Get profile data from database (check current session)
// TODO: format it however you like in this page that shows profile data
