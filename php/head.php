<?php
    function the_head($title, $css_includes, $js_includes = []){
        ?>
            <!DOCTYPE html>
            <html lang="it">
                <head>
                    <title>BoatSharing - <?php echo $title; ?></title>
                    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
                    <link rel="stylesheet" href="css/fontawesome/all.min.css" >
                    <link rel="stylesheet" href="css/general-style.css">
                    <?php
                        foreach($css_includes as $css){
                            echo '<link rel="stylesheet" href="css/'.$css.'.css">';
                        }
                    ?>
                    <script src="js/jquery/jquery-3.4.1.min.js"></script>
                    
                    <?php
                        foreach($js_includes as $js){
                            echo '<script src="js/jquery/'.$js.'.js"></script>';
                        }
                    ?>
                </head>
        <?php
    }
?>