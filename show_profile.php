<?php
session_start();
require_once('php/utility/session_functions.php');
if(!is_logged_in())
    header("location: login.php");

// TODO: change credentials in the db/mysql_credentials.php file
require_once('db/mysql_credentials.php');

require_once('php/head.php');
require_once('php/header.php');
require_once('php/navbar.php');
require_once('php/footer.php');


require_once("php/upload_profile_image.php");


// Get profile data from database (check current session)

the_head("Profilo", ["showprofile-style"], ["show_profile"]);
?>
<div class="container-fluid p-0">
    <div class="row h-100 w-100 m-0">
<?php
    the_header_for_logged();
    the_navbar("profile");

    if(isset($_SESSION['image']))
        $image = $_SESSION['image'];
    else 
        $image = "images/anonymous.png"
?>
    <div class="col-md-10 offset-md-2 content-for-logged">
        <div class="col-md-4 pt-4 pb-4 mt-3 profile-img-conatiner text-center info-container">
            <div class="row m-3">
                <div class="col-md-12">
                    <figure id="profile-img-figure">
                        <img src="<?php echo $image; ?>" class="profile-img" />
                        <figcaption id="profile-img-figcaption"><i class="fas fa-edit pointer"></i></figcaption>
                    </figure>
                </div>
            </div>
            <div class="row m-3">
                <div id="profile-image-selector" class="col-md-12 mt-3">
                    <form method="post" action="" enctype='multipart/form-data'>
                        <input name="file" id="filer_input" type="file" class="Neon-input-choose-btn blue"> 
                        <input type="submit" value="Salva" name="but_upload" class="blue"> 
                    </form>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-md-12">
                    <span class="text-info text-info-uppercase"><?php echo $_SESSION['name']; ?></span>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-md-12">
                    <span class="text-info text-info-uppercase"><?php echo $_SESSION['surname']; ?></span>
                </div>
            </div>
            <div class="row m-3">
                <div class="col-md-12">
                    <span class="text-info"><?php echo $_SESSION['email']; ?></span>
                </div>
            </div>
        </div>
        
       
    </div>
<?php
    the_footer_for_logged();
?>
    </div>
</div>
<?php
