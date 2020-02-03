<?php
session_start();
require_once('../php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}

require_once('../php/utility/utility_functions.php');
$email = sanitize('email', $_POST['email']);
$message = sanitize('text', $_POST['message']);

$to      = 'euj25556@eveav.com';
$subject = 'the subject';
$message = 'hello';
$headers = array(
    'From' => 'webmaster@example.com',
    'Reply-To' => 'webmaster@example.com',
    'X-Mailer' => 'PHP/' . phpversion()
);

mail($to, $subject, $message, $headers);

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';



// $mail = new PHPMailer;
// $mail->setFrom('from@example.com', 'Your Name');
// $mail->addAddress('myfriend@example.net');
// $mail->Subject  = 'First PHPMailer Message';
// $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
// if(!$mail->send()) {
//   echo 'Message was not sent.';
//   echo 'Mailer error: ' . $mail->ErrorInfo;
// } else {
//   echo 'Message has been sent.';
// }


?>