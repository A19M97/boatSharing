<?php
require_once('php/header.php');
require_once('php/footer.php');
/**
 * $message: associative array. 
 * [is_error]   -> bool
 * [description]    -> String
 */
$message['is_error'] = false;
$message['description'] = "";

if(isset($_POST['sign-up'])){
    
    if(isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['pass']) && isset($_POST['confirm'])){

        if($_POST['pass'] != $_POST['confirm']){
            $message['is_error'] = true;
            $message['description'] = "Le password devono coincidere.";
        }else{
            require_once('php/utility/utility-functions.php');

            // Open DBMS Server connection
            $con = get_db_connection();

            // Get values from $_POST, but do it IN A SECURE WAY
            $email = $_POST['email']; // replace null with $_POST and sanitization
            $first_name = $_POST['firstname'];// replace null with $_POST and sanitization
            $last_name = $_POST['lastname']; // replace null with $_POST and sanitization
            $password = $_POST['pass']; // replace null with $_POST and sanitization
            $password_confirm = $_POST['confirm']; // replace null with $_POST and sanitization

            // Get user from login
            $successful = insert_user($email, $first_name, $last_name, $password, $password_confirm, $con);

            if ($successful) {
                $message['is_error'] = false;
                $message['description'] = "Registrazione effettuata con successo.";
            } else {
                $message['is_error'] = true;
                $message['description'] = "C'è stato un errore nel processo di registrazione. Si prega di riprovare";
            }
        }
    }else{
        $message['is_error'] = true;
        $message['description'] = "Tutti i campi sono obbligatori.";
    }
}
print_r($message);
?>

<form action="registration.php" method="POST">
    <label for="firstname">First name</label>
    <input type="text" name="firstname">
    
    <label for="lastname">Last name</label>
    <input type="text" name="lastname">

    <label for="email">E-mail</label>
    <input type="email" name="email">

    <label for="pass">Password</label>
    <input type="password" name="pass">

    <label for="confirm">Confirm Password</label>
    <input type="password" name="confirm">

    <!-- TODO: Add additional fields here -->

    <input type="submit" value="Submit" name="sign-up">
</form>

