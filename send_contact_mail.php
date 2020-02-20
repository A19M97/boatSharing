<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}

require_once('php/utility/utility_functions.php');

$email = sanitize('email', $_POST['email']);
$name = sanitize('text', $_POST['name']);
$message = sanitize('text', $_POST['message']);

$mail_sent = false;

if(empty($email) || empty($name) || empty($message)){
    echo $mail_sent;
    return;
}
if(!is_email($email)){
    echo $mail_sent;
    return;
}

$con = get_db_connection();
$admin_emails = get_admin_emails($con);
mysqli_close($con);

if(empty($admin_emails)){
    echo $mail_sent;
    return;
}

foreach($admin_emails as $admin_email){

    $to      = $admin_email;
    $subject = 'BoatSharing - '.$name." ti ha contattato!";
    $message = $message;
    $headers = array(
        'From' => $email,
        'Reply-To' => $email,
        'X-Mailer' => 'PHP/' . phpversion()
    );

    if(mail($to, $subject, $message,  implode("\r\n", $headers)) && !$mail_sent)
        $mail_sent = true;
}
echo $mail_sent;
exit;
?>