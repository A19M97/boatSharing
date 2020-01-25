<?php
session_start();
require_once('php/header.php');
require_once('php/footer.php');
if(isset($_POST['sign-in'])){
    if(isset($_POST['email']) && isset($_POST['pass'])){
        require_once('php/utility/utility-functions.php');
        require_once('php/utility/session-functions.php');
        
        // Open DBMS Server connection
        $con = get_db_connection();

        $email = $_POST['email']; 
        $pass = $_POST['pass']; 

        // Get user from login
        $user = login($email, $pass, $con);

        if (!$user) {
            $error = "Credenziali errate, riprova!";
        } else {
            update_session_by_user($user);
            header("location: show_profile.php");
        }
    }
}
the_header("Login", ["login-style"]);
?>

<body>
    <div class="container-fluid h-100 mh-100">
        <div id="login-page-container" class="row h-100">
            <a href="index.php" id="login-undo-button" class="align-middle align-self-start col-md-12 text-left login-undo-a position-absolute">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div  id="login-form-container" class="col-md-4 offset-md-4 text-center align-self-center">
                <div class="col-md-12">
                    <h1 class="primary-font primary-color">ACCEDI</h1>
                </div>
                <form action="login.php" method="POST">
                    <div class="col-md-12 login-input-div">
                        <input type="email" name="email" class="w-100 login-input" placeholder="E-mail">
                    </div>
                    <div class="col-md-12 login-input-div">
                        <input type="password" name="pass" class="w-100 login-input" placeholder="Password">
                    </div>
                    <?php
                        if(isset($error))
                            echo '
                                <div class="col-md-12 login-input-div">
                                    <div class="alert alert-danger login-alert-error" role="alert">
                                        '.$error.'
                                    </div>
                                </div>
                            ';
                    ?>
                    <div class="col-md-12 login-input-div">
                        <input type="submit" name="sign-in" value="Accedi" class="w-100 login-input background-secondary-color">
                    </div>
                    <div class="col-md-12 login-input-div">
                        <div class="col-md-5 text-center float-left">
                            <a href="password_recovery.php" class="primary-font secondary-color">Password dimenticata?</a>
                        </div>
                        <div class="col-md-2 text-center float-left">
                            <span class="primary-font secondary-color">|</span>
                        </div>
                        <div class="col-md-5 text-center float-left">
                            <a href="registration.php" class="primary-font secondary-color">Non sei registrato?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
the_footer();
