<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}

require_once('db/mysql_credentials.php');

require_once('php/head.php');
require_once('php/header.php');
require_once('php/navbar.php');
require_once('php/footer.php');


require_once("php/upload_profile_image.php");


the_head("Newsletter", ["newsletter-style"], ["newsletter", "search"]);
?>
<div class="container-fluid p-0">
    <div class="row h-100 w-100 m-0">
<?php
    the_header_for_logged();
    the_navbar("newsletter");

?>
    <div class="col-md-10 offset-md-2 content-for-logged">
        <div class="col-lg-6 offset-lg-3 pt-4 pb-4 mt-3 profile-img-conatiner text-center info-container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <span class="primary-font logged-title">Newsletter</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <span>A chi vuoi inviare la newsletter?</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <select name="newsletter-type" id="newsletter-type">
                        <option value="all">Tutti</option>
                        <option value="custom">Personalizzato</option>
                    </select>
                </div>
            </div>
            <div id="select-emails-row" class="row mt-3">
                <div class="col-lg-12">
                    <!-- <input type="email" name="email" id="email" multiple> -->
                    <form action="search.php" method="GET" autocomplete="off">
                        <label for="search">Cerca...</label>
                        <input type="text" name="search" class="w-100 text-center info-input search" placeholder="Separa le E-mail con una virgola.">
                        <!-- <input type="submit" value="Submit"> -->
                    </form>
                </div>
                <div id="result-search-container" class="col-lg-12 position-absolute">
                    <div id="results" class="col-lg-12 border-search p-0">
                        <!-- <div class="email-container no-gutters pointer">andrea@ciao.it</div> -->
                    </div>
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
                    <div id="send-newsletter-loader" class="lds-dual-ring"></div>
                    <input type="button" name="send_newsletter" id="send-newsletter" class="send-message-button" value="Invia">
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
