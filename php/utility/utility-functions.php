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
    mysqli_stmt_bind_result($stmt, $email, $name, $surname, $pass, $role );

    /* fetch value */
    if(!mysqli_stmt_fetch($stmt))
        $id = null;

    /* close statement */
    mysqli_stmt_close($stmt);

    return $id;
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
    return mysqli_stmt_execute($stmt);

}
?>