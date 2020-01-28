<?php

function update_session_by_user($user){
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['surname'] = $user['surname'];
    $_SESSION['image'] = $user['image'];
    $_SESSION['role'] = $user['role'];
}

function is_logged_in(){
    return (isset($_SESSION['loggedin']) && $_SESSION['loggedin']);
}

?>