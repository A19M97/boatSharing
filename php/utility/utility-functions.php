<?php
function encryptPassword($pass){
    return $pass;
}

function login($email, $pass, $db_connection) {
    $stmt = mysqli_prepare($db_connection, "SELECT * FROM users WHERE username = ? AND password = ?");
    if(!$stmt) 
        return null;

    $pass = encryptPassword($pass);
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $id, $email, $pass );

    /* fetch value */
    if(!mysqli_stmt_fetch($stmt))
        $id = null;

    /* close statement */
    mysqli_stmt_close($stmt);

    return $id;
}
?>