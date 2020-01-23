<?php
require_once('php/header.php');
require_once('php/footer.php');
if(isset($_POST['email']) && isset($_POST['pass'])){
    require_once('db/mysql_credentials.php');
    require_once('php/utility/utility-functions.php');
    

    // Add session control, header, ...

    // Open DBMS Server connection
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
the_header("Login", ["login-style"]);
?>

<body>
    <div class="container-fluid homepage-container h-100 mh-100">
        <div id="login-form-container" class="row h-100">
            <a href="index.php" id="login-undo-button" class="align-middle align-self-start col-md-12 text-left login-undo-a position-absolute">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div  class="col-md-6 offset-md-3 text-center align-self-center">
                <form action="login.php" method="POST">
                    <div class="col-md-12">
                        <input type="email" name="email" class="w-100">
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="pass" class="w-100">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Submit" class="w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
the_footer();
