<?php
    function the_navbar($active){
        ?>
            <div id="navbar" class="col-md-2 h-100 position-absolute">
                <a href="index.php">
                    <div class="col-md-12 nav-list-item-container no-gutters nav-item-inactive">
                    <i class="fas fa-home"></i> Homepage
                    </div>
                </a>
                <a href="show_profile.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "profile") echo "nav-item-active"; ?> nav-item-inactive">
                        <i class="fas fa-user"></i> Profilo
                    </div>
                </a>

                <a href="about_us.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "about_us") echo "nav-item-active"; ?> nav-item-inactive">
                        <i class="fas fa-users"></i> Chi Siamo
                    </div>
                </a>

                <a href="boats.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "boats") echo "nav-item-active"; ?> nav-item-inactive">
                    <i class="fas fa-ship"></i> Barche
                    </div>
                </a>

                <a href="harbors.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "harbors") echo "nav-item-active"; ?> nav-item-inactive">
                    <i class="fas fa-map-marked"></i> Porti
                    </div>
                </a>
            
                <a href="logout.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "logout") echo "nav-item-active"; ?> nav-item-inactive">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </div>
                </a>
            </div>
        <?php
    }
?>