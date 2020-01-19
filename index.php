<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__."/boatSharing/php/header.php");
    require_once(__ROOT__."/boatSharing/php/footer.php");
    require_once(__ROOT__."/boatSharing/php/navbar.php");
    the_header("Homepage");
    ?>
    <body>
        <div class="container-fluid homepage-container">
            <div class="row">
                <div id="hp-login-button" class="col-md-12 text-right align-middle">
                    <a href="/boatSharing/login" class="align-middle hp-a-login">Login</a>
                </div>
            </div>      
            <div class="row">
                <div class="col-md-4 offset-md-4 text-center">
                    <h1 id="hp-main-title" class="primary-color">BoatSharing</h1>
                    <h2 id="hp-subtitle" class="secondary-color">Una barca a portata di mano</h1>
                </div>
            </div>
        </div>
    </body>
    <?php
    the_footer();
?>