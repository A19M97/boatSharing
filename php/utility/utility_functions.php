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
    
    $stmt = mysqli_prepare($db_connection, "INSERT INTO users VALUES(?, ?, ?, ?, ?)");
    if(!$stmt) 
        return null;

    $password = encryptPassword($password);
    $role = "user";

    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "sssss", $email, $first_name, $last_name, $password, $role);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* return error code: 0 no error, 1062 email already used */
    return mysqli_stmt_errno($stmt);

}


function insert_image($user_email, $image, $db_connection) {
    
    $stmt = mysqli_prepare($db_connection, "UPDATE users SET image = ? WHERE email = ?");
    if(!$stmt) 
        return null;
        
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ss", $image, $user_email);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* return error code: 0 no error*/
    return mysqli_stmt_errno($stmt);

}

function update_user($email, $first_name, $last_name, $db_connection) {

    $stmt = mysqli_prepare($db_connection, "UPDATE users SET name = ?, surname = ? WHERE email = ?");
    if(!$stmt) 
        return null;
        
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $email);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* return error code: 0 no error*/
    return mysqli_stmt_errno($stmt);
}

function get_db_connection(){
    require_once('db/mysql_credentials.php');
    global $mysql_host;
    global $mysql_user;
    global $mysql_pass;
    global $mysql_db;
    return mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
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
    $result = mysqli_query($db_connection, $query);
    $new_array = [];
    while( $row = mysqli_fetch_assoc( $result)){
        $new_array[] = $row['email']; 
    }
    return $new_array;

}

function is_email($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
?>