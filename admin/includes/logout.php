<?php
require_once 'functions.php';
sec_session_start();
 
 
 
// Unset all session values 
$_SESSION = array();
 
 
 
// get session parameters 
$params = session_get_cookie_params();
 
 
 
// Delete the actual cookie. 
setcookie(session_name(),
        '', time() - 180, //42000 seg no tutorial 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Destroy session 
session_destroy();

//usuario deve ser redirecionado para outra PAGINA
header('Location: ../index-ADMIN.php');
    exit();
