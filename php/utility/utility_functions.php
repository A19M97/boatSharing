<?php
function encryptPassword($pass){
    return hash('sha256', $pass);
}

function login($email, $pass, $db_connection) {
    $stmt = mysqli_prepare($db_connection, "SELECT * FROM users WHERE email = ? AND pass = ?");
    if(!$stmt) 
        return null;

    $pass = encryptPassword($pass);

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* error code: 0 no error*/
    if(mysqli_stmt_errno($stmt) != 0)
        return null;

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $email, $name, $surname, $pass, $image, $role );

    /* fetch value */
    if(!mysqli_stmt_fetch($stmt))
        $user = null;
    else{
        $user = [
            'email'     => $email,
            'name'      => $name,
            'surname'   => $surname,
            'image'     => $image,
            'role'      => $role
        ];
    }

    /* close statement */
    mysqli_stmt_close($stmt);

    return $user;
}

function insert_user($email, $first_name, $last_name, $password, $password_confirm, $db_connection) {
    $stmt = mysqli_prepare($db_connection, "INSERT INTO users VALUES(?, ?, ?, ?, ?, ?)");
    
    if(!$stmt) 
        return null;

    $password = encryptPassword($password);
    $role = "user";
    $image = null;
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ssssss", $email, $first_name, $last_name, $password, $image, $role);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* return error code: 0 no error, 1062 email already used */
    $error_code = mysqli_stmt_errno($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);

    return $error_code;

}


function insert_image($user_email, $image, $db_connection) {
    
    $stmt = mysqli_prepare($db_connection, "UPDATE users SET image = ? WHERE email = ?");
    if(!$stmt) 
        return null;
        
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ss", $image, $user_email);

    /* execute query */
    mysqli_stmt_execute($stmt);

    
    /* return error code: 0 no error */
    $error_code = mysqli_stmt_errno($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);

    return $error_code;

}

function update_user($email, $first_name, $last_name, $new_email, $db_connection) {

    $stmt = mysqli_prepare($db_connection, "UPDATE users SET email = ?, name = ?, surname = ? WHERE email = ?");
    if(!$stmt) 
        return null;
        
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ssss", $new_email, $first_name, $last_name, $email);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* return error code: 0 no error */
    $error_code = mysqli_stmt_errno($stmt);

    /* close statement */
    mysqli_stmt_close($stmt);

    return $error_code;
}

function get_db_connection(){
    require_once('db/mysql_credentials.php');
    global $mysql_host;
    global $mysql_user;
    global $mysql_pass;
    global $mysql_db;

    $con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $con;
}

function sanitize($type, $text){
    switch($type){
        case 'email':
            return filter_var($text, FILTER_SANITIZE_EMAIL);
        case 'text':
            return filter_var($text, FILTER_SANITIZE_STRING);
        default:
            return filter_var($text);
    }
}

function get_admin_emails($db_connection){
    
    $query = "SELECT email FROM users WHERE role='admin'";
    $result = mysqli_query($db_connection, $query) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db_connection), E_USER_ERROR);
    $new_array = [];
    while( $row = mysqli_fetch_assoc( $result)){
        $new_array[] = $row['email']; 
    }
    return $new_array;

}

function get_all_user_emails($db_connection){
    
    $query = "SELECT email FROM users WHERE role='user'";
    $result = mysqli_query($db_connection, $query) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db_connection), E_USER_ERROR);
    $new_array = [];
    while( $row = mysqli_fetch_assoc( $result)){
        $new_array[] = $row['email']; 
    }
    return $new_array;

}

function is_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_admin(){
    return $_SESSION['role'] == 'admin';
}

function is_valid_pass($pass){
    return strlen(trim($pass)) > 7;
}

function get_boats($db_connection){
    
    $query = "SELECT * FROM boats";
    $result = mysqli_query($db_connection, $query) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db_connection), E_USER_ERROR);
    $new_array = [];
    while( $row = mysqli_fetch_assoc( $result)){
        $new_array[] = $row; 
    }
    return $new_array;

}

function get_harbors($db_connection){
    
    $query = "SELECT * FROM harbors";
    $result = mysqli_query($db_connection, $query) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($db_connection), E_USER_ERROR);
    $new_array = [];
    while( $row = mysqli_fetch_assoc( $result)){
        $new_array[] = $row; 
    }
    return $new_array;

}

function search($chars, $db_connection) {

    $stmt = mysqli_prepare($db_connection, "SELECT email FROM users WHERE email LIKE ?");
    if(!$stmt) 
        return array();
    
        
    $chars .= "%";
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $chars);

    /* execute query */
    mysqli_stmt_execute($stmt);
    
    $new_array = [];

    /* error code: 0 no error*/
    if(mysqli_stmt_errno($stmt) != 0)
        return $new_array;

    $res = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($res)){
        $new_array[] = $row['email']; 
    }

    /* close statement */
    mysqli_stmt_close($stmt);

    return $new_array;
   
}
?>