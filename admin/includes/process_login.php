<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
header('Content-type: text/html; charset=utf-8', true); //padrao brasil --acentua e ÇÇ
sec_session_start(); // Our custom secure way of starting a PHP session.
 
 
 
 
 
 
if (isset($_POST['password'], $_POST['c'])) {
	
    $c = $_POST['c'];
    $password = $_POST['password']; // The hashed password.

 
    if (login($c, $password, $mysqli) == true) {
        // Login success 
       header('Location: ../index-ADMIN.php');

	   
    } else {

        header('Location: ../index-ADMIN.php?error=1');

    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
	
}

