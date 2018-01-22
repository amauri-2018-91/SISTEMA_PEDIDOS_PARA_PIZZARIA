<?php
require_once 'psl-config.php';   // As functions.php is not included


     $mysqli = new mysqli(HOST,USER, PASSWORD, DATABASE);
	 
// Change character set to utf8
mysqli_set_charset($mysqli,"utf8");

