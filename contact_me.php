<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in())
    header("location: login.php");

require_once('db/mysql_credentials.php');

require_once('php/head.php');
require_once('php/header.php');
require_once('php/navbar.php');
require_once('php/footer.php');


require_once("php/upload_profile_image.php");


// Get profile data from database (check current session)

the_head("Profilo", ["contactme-style"], ["contact_me"]);
?>
<div class="container-fluid p-0">
    <div class="row h-100 w-100 m-0">
<?php
    the_header_for_logged();
    the_navbar("contact_me");

?>
    <div class="col-md-10 offset-md-2 content-for-logged">
        <div class="col-lg-6 offset-lg-3 pt-4 pb-4 mt-3 profile-img-conatiner text-center info-container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <span class="primary-font contact-me-title">Hai bisogno di aiuto?</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <input type="email" name="email" id="email" class="w-100 text-center info-input" placeholder="La tua E-mail">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <input type="text" name="name" id="name" class="w-100 text-center info-input" placeholder="Il tuo Nome">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <textarea name="message" id="message" class="w-100 text-center info-input" placeholder="Messaggio..." cols="50"></textarea>
                </div>
            </div>
            <div class="row mt-3 success-message">
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        E-Mail inviata con successo!
                    </div>
                </div>
            </div>
            <div class="row mt-3 failure-message">
                <div class="col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        C'è stato un errore, riprova!
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-8 offset-lg-2">
                    <div id="send-message-loader" class="lds-dual-ring"></div>
                    <input type="button" name="send_message" id="send-message" class="send-message-button" value="Invia">
                </div>
            </div>
        </div>
    </div>
<?php
    the_footer_for_logged();
?>
    </div>
</div>
<?php
