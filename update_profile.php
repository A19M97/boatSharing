<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}
require_once('db/mysql_credentials.php');
require_once('php/utility/utility_functions.php');

$email = $_SESSION['email']; 

if(isset($_POST['firstname']) && isset($_POST['lastname'])){
    $first_name = $_POST['firstname']; 
    $last_name = $_POST['lastname'];
}else{
    $response = array(
        'code'      => 1,
        'message'   => 'Si è verficato un errore.'
    );
    echo json_encode($response);
    exit;
}
 
$new_email = $_POST['new_email'];

$con = get_db_connection();
if(empty($new_email) || !is_email($new_email))
        $new_email = $email;

$error_code = update_user($email, $first_name, $last_name, $new_email, $con);

mysqli_close($con);

if ($error_code == 0) { //no error
    $_SESSION['name'] = $first_name;
    $_SESSION['surname'] = $last_name;
    $_SESSION['email'] = $new_email;
    $response = array(
        'code'      => $error_code,
        'message'   => 'Ok.'
    );
    echo json_encode($response);   
}else if($error_code == 1062){ //duplicate key
    $response = array(
        'code'      => $error_code,
        'message'   => 'L\'E-mail è già utilizzata.'
    );
    echo json_encode($response);
}else{
    // Error message
    $response = array(
        'code'      => $error_code,
        'message'   => 'Si è verficato un errore.'
    );
    echo json_encode($response);
}
exit();