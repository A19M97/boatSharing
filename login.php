<?php
if(isset($_POST['email']) && isset($_POST['pass'])){
    require_once('db/mysql_credentials.php');
    require_once('php/utility/utility-functions.php');

    // Add session control, header, ...

    $con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

    $email = $_POST['email']; 
    $pass = $_POST['pass']; 

    // Get user from login
    $user = login($email, $pass, $con);

    if ($user) {
        // Welcome message
        echo "Welcome $user!";
    } else {
        // Error message
        echo "Wrong email or password";
    }
}
?>
<form action="login.php" method="POST">
    <input type="email" name="email">
    <input type="password" name="pass">
    <input type="submit" value="Submit">
</form>
