<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in())
    header("location: login.php");

require_once('db/mysql_credentials.php');
require_once('php/utility/utility_functions.php');

require_once('php/head.php');
require_once('php/header.php');
require_once('php/navbar.php');
require_once('php/footer.php');


the_head("Porti", ["boats-style"]);
?>
<div class="container-fluid p-0">
    <div class="row h-100 w-100 m-0">
<?php
    the_header_for_logged();
    the_navbar("harbors");

?>
    <div class="col-md-10 offset-md-2 content-for-logged boats-container">
        <div class="col-lg-12 pt-4 pb-4 mt-3 profile-img-conatiner text-center info-container ">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <span class="primary-font logged-title">I nostri porti</span>
                </div>
            </div>
            <div class="row mt-5">
                <?php 
                    $con = get_db_connection();
                    $harbors = get_harbors($con);
                    mysqli_close($con);
                    foreach($harbors as $harbor){
                        ?>
                        
                        <div class="col-lg-4 float-left text-center">
                            <div class="card mx-auto " >
                            <!-- Image -->
                                <img class="card-img-top boat-images" src="data:image/jpeg;base64,<?php echo base64_encode( $harbor['image'] );?>" alt="Harbor's image">
                            <!-- Text Content -->
                                <div class="card-body">
                                    <p class="card-text"><?php echo $harbor['town']; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                    }
                ?>
            </div>  
        </div>
    </div>
<?php
    the_footer_for_logged();
?>
    </div>
</div>