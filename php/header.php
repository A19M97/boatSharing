<?php
    function the_header($title){
        echo "
        <!DOCTYPE html>
        <html lang=\"it\">
            <head>
                <title>BoatSharing - $title</title>
                <link rel=\"stylesheet\" href=\"/boatSharing/css/bootstrap/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"/boatSharing/css/fontawesome/all.min.css\" >
                <link rel=\"stylesheet\" href=\"/boatSharing/css/general-style.css\">
                <link rel=\"stylesheet\" href=\"/boatSharing/css/homepage-style.css\">
                <script src=\"/boatSharing/js/jquery/jquery-3.4.1.min.js\"></script>
                <script src=\"/boatSharing/js/jquery/homepage.js\"></script>
            </head>";
    }
?>