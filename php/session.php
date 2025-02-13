<?php
session_start();
$logged_in = $_SESSION['logged_in'] ?? false;

$username = 'user';
$password = 'password';

function login(){
    session_regenerate_id(true);
    $_SESSION['logged_in'] = true;
}

function logout(){
    $_SESSION = [];

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
    session_destroy();
}
function require_login($logged_in){
    if(!$logged_in){
        header('Location: /login.php');
        exit;
    }
}
?>