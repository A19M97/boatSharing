<?php
    function the_header($title){
        echo "
        <!DOCTYPE html>
        <html lang=\"it\">
            <head>
                <title>BoatSharing - $title</title>
                <link rel=\"stylesheet\" href=\"/boatSharing/css/general-style.css\">
                <link rel=\"stylesheet\" href=\"/boatSharing/css/bootstrap/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"/boatSharing/css/homepage-style.css\">
                <script src=\"/boatSharing/js/bootstrap/bootstrap.min.js\"></script>
            </head>";
    }
?>