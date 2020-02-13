<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}

require_once('php/utility/utility_functions.php');

$mail_sent = false;
print_r($_POST);
$newsletter_type = $_POST['newsletter_type'];

if($newsletter_type == 'custom'){
    $emails = $_POST['email'];
    if(empty($emails))
        return;
    foreach($emails as $email)
        $emails[] = sanitize("email", $email);
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
// foreach($emails as $email){

//     $to      = $email;
//     $subject = 'BoatSharing - Newsletter!';
//     $message = $message;
//     $headers = array(
//         'From' => "BoatSharing",
//         'Reply-To' => "no-replay@boatsharing.it",
//         'X-Mailer' => 'PHP/' . phpversion()
//     );

//     if(mail($to, $subject, $message, $headers) && !$mail_sent)
//         $mail_sent = true;
// }
echo $mail_sent;
exit;
?>