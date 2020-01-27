<?php
    function the_navbar($active){
        ?>
            <div id="navbar" class="col-md-2 h-100 position-absolute p-0">
                <a href="show_profile.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "profile") echo "nav-item-active"; ?> nav-item-inactive">
                        <i class="fas fa-user"></i> Profilo
                    </div>
                </a>

                <a href="about_us.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "about_us") echo "nav-item-active"; ?> nav-item-inactive">
                        Chi Siamo
                    </div>
                </a>
                <a href="about_us.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "about_us") echo "nav-item-active"; ?> nav-item-inactive">
                        Chi Siamo
                    </div>
                </a>
                <a href="about_us.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "about_us") echo "nav-item-active"; ?> nav-item-inactive">
                        Chi Siamo
                    </div>
                </a>
                <a href="about_us.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "about_us") echo "nav-item-active"; ?> nav-item-inactive">
                        Chi Siamo
                    </div>
                </a>
                <a href="about_us.php">
                    <div class="col-md-12 nav-list-item-container no-gutters <?php if($active == "about_us") echo "nav-item-active"; ?> nav-item-inactive">
                        Chi Siamo
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