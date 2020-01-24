<?php
    function the_header($title, $includes){
        ?>
        <!DOCTYPE html>
        <html lang="it">
            <head>
                <title>BoatSharing - <?php echo $title; ?></title>
                <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
                <link rel="stylesheet" href="css/fontawesome/all.min.css" >
                <link rel="stylesheet" href="css/general-style.css">
                <?php
                    foreach($includes as $css){
                        echo '<link rel="stylesheet" href="css/'.$css.'.css">';
                    }
                ?>
                <script src="/boatSharing/js/jquery/jquery-3.4.1.min.js"></script>
                <script src="/boatSharing/js/jquery/homepage.js"></script>
            </head>
        <?php
    }
?>