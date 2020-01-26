<?php
    session_start();
    require_once('php/head.php');
    require_once('php/footer.php');
    /**
     * $message: associative array. 
     * [is_error]       -> bool
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
                require_once('php/utility/utility_functions.php');

                // Open DBMS Server connection
                $con = get_db_connection();

                $email = $_POST['email']; 
                $first_name = $_POST['firstname'];
                $last_name = $_POST['lastname']; 
                $password = $_POST['pass']; 
                $password_confirm = $_POST['confirm']; 

                // Get user from login
                $db_response = insert_user($email, $first_name, $last_name, $password, $password_confirm, $con);

                switch($db_response){
                    case 0:
                        /* Registration OK. */
                        require_once('php/utility/session_functions.php');
                        $user = [
                            'email'     => $email,
                            'name'      => $first_name,
                            'surname'   => $last_name,
                            'role'      => "user"
                        ];
                        update_session_by_user($user);
                        header("location: show_profile.php");
                        // $message['is_error'] = false;
                        // $message['description'] = "Registrazione effettuata con successo.";
                        break;
                    case 1062:
                        $message['is_error'] = true;
                        $message['description'] = "E-mail già in uso. <a href=\"login.php\" id=\"sign-in-now-link\">Accedi ora.</a>";
                        break;
                    default:
                        $message['is_error'] = true;
                        $message['description'] = "C'è stato un errore nel processo di registrazione. Si prega di riprovare.";
                }
            }
        }else{
            $message['is_error'] = true;
            $message['description'] = "Tutti i campi sono obbligatori.";
        }
    }
    the_head("Registrati", ["registration-style"]);
?>
<body>
    <div class="container-fluid  h-100 mh-100">
        <div id="registration-page-container" class="row h-100">
            <a href="login.php" id="registration-undo-button" class="align-middle align-self-start col-md-12 text-left registration-undo-a position-absolute">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div  id="registration-form-container" class="col-md-4 offset-md-4 text-center align-self-center">
                <div class="col-md-12">
                    <h1 class="primary-font primary-color">REGISTRATI</h1>
                </div>
                <form action="registration.php" method="POST">
                    <div class="col-md-12 registration-input-div">
                        <input type="text" name="firstname" <?php if(isset($_POST['firstname'])) echo 'value="'.$_POST['firstname'].'"'; ?> class="w-100 registration-input" placeholder="Nome">
                    </div>
                    <div class="col-md-12 registration-input-div">
                        <input type="text" name="lastname" <?php if(isset($_POST['firstname'])) echo 'value="'.$_POST['lastname'].'"'; ?> class="w-100 registration-input" placeholder="Cognome">
                    </div>
                    <div class="col-md-12 registration-input-div">
                        <input type="email" name="email" <?php if(isset($_POST['firstname'])) echo 'value="'.$_POST['email'].'"'; ?> class="w-100 registration-input" placeholder="E-mail">
                    </div>
                    <div class="col-md-12 registration-input-div">
                        <input type="password" name="pass" class="w-100 registration-input" placeholder="Password">
                    </div>
                    <div class="col-md-12 registration-input-div">
                        <input type="password" name="confirm" class="w-100 registration-input" placeholder="Conferma Password">
                    </div>
                    <?php
                        if(isset($message))
                            if($message['is_error'])
                                echo '
                                    <div class="col-md-12 registration-input-div">
                                        <div class="alert alert-danger registration-alert-error" role="alert">
                                            '.$message['description'].'
                                        </div>
                                    </div>
                                ';
                    ?>
                    <div class="col-md-12 registration-input-div">
                        <input type="submit" name="sign-up" value="Registrati" class="w-100 registration-input background-secondary-color">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
    the_footer();
?>

