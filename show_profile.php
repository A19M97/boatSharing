<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in())
    header("location: login.php");

// TODO: change credentials in the db/mysql_credentials.php file
require_once('db/mysql_credentials.php');

require_once('php/head.php');
require_once('php/header.php');
require_once('php/navbar.php');
require_once('php/footer.php');

// Open DBMS Server connection


// Get profile data from database (check current session)
// TODO: format it however you like in this page that shows profile data
the_head("Profilo", ["showprofile-style"]);
?>
<div class="container-fluid p-0">
    <div class="row h-100 w-100 m-0">
<?php
    the_header_for_logged();
    the_navbar("profile");
    the_footer_for_logged();
?>
    </div>
</div>
<?php
