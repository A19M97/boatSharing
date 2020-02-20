<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}

require_once('php/utility/utility_functions.php');

$mail_sent = false;
$newsletter_type = $_POST['newsletter_type'];

if($newsletter_type == 'custom'){
    $email = $_POST['email'];
    if(empty($email))
        return;

    $email = explode(",", $email);
    
    $email = array_unique($email);

    array_pop($email);
    
    foreach($email as $_email)
        $emails[] = sanitize("email", $_email);
}else{
    $con = get_db_connection();
    $emails = get_all_user_emails($con);
    mysqli_close($con); 
}
$message = sanitize('text', $_POST['message']);

if(empty($message)){
    echo $mail_sent;
    return;
}

foreach($emails as $email){

    $to      = $email;
    $subject = 'BoatSharing - Newsletter!';
    $message = $message;
    $headers = array(
        'From' => "newsletter@boatsharing.it",
        'Reply-To' => "no-replay@boatsharing.it",
        'X-Mailer' => 'PHP/' . phpversion(),
        'X-MSMail-Priority' => 'High'
    );
    if(mail($to, $subject, $message, $headers) && !$mail_sent)
        $mail_sent = true;
}

echo $mail_sent;
exit;
?>