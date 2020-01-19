<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__."/boatSharing/php/header.php");
    require_once(__ROOT__."/boatSharing/php/footer.php");
    require_once(__ROOT__."/boatSharing/php/navbar.php");
    the_header("Homepage");
    echo "<body>";
    echo "<div class=\"container-fluid\">";
    //the_navbar();
    echo "</div>";
    echo "</body>";
    the_footer();
?>