<?php
require_once('php/utility/session_functions.php');
if(!is_logged_in()){
    header("location: login.php");
    exit;
}
if(isset($_POST['but_upload'])){
    $name = $_FILES['file']['name'];

    // Select file type
    $imageFileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png");
    
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
    
        require_once("php/utility/utility_functions.php");
        $con = get_db_connection();

        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

        // Insert record
        if(insert_image($_SESSION['email'], $image, $con) != 0 )
            echo "C'è stato un errore, riprova.";
        else
            $_SESSION['image'] = $image;
        
        mysqli_close($con);
    }
}

?>