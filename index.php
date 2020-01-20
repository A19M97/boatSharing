<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__."/boatSharing/php/header.php");
    require_once(__ROOT__."/boatSharing/php/footer.php");
    require_once(__ROOT__."/boatSharing/php/navbar.php");
    the_header("Homepage");
    ?>
    <body>
        <div class="container-fluid homepage-container h-100">
            <div class="row h-100">
                <a href="/boatSharing/login" id="hp-login-button" class="align-middle align-self-start hp-a-login col-md-12 text-right align-middle">
                    Login 
                    <i class="fas fa-sign-in-alt"></i>
                </a>
                <div id="hp-main-title-container"class="col-md-6 offset-md-3 text-center align-self-middle">
                    <h1 id="hp-main-title" class="primary-color primary-font"><span class="secondary-color">B</span>oat<span class="secondary-color">S</span>haring</h1>
                    <h2 id="hp-subtitle" class="secondary-color primary-font">Una barca a portata di mano</h1>
                </div>
                <div class="col-md-6 offset-md-3 text-center align-self-end">
                    <i class="fas fa-chevron-down fa-3x primary-color"></i>
                </div>
            </div>
        </div>
    </body>
    <?php
    the_footer();
?>