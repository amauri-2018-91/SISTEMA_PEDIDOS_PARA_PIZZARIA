<?php
require_once 'psl-config.php';   // As functions.php is not included


//$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE); //old conexion before charset UTF-8

//$mysqli = new PDO("mysql:host=servidor;dbname=banco_de_dados", 'usuario', 'senha');







	 /*
$dsn = "mysql:host=localhost;dbname=;charset=utf8";



$opcoes = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
);
$pdo = new PDO($dsn, $usuario, $senha, $opcoes);

*/





     $mysqli = new mysqli(HOST,USER, PASSWORD, DATABASE);
	 
// Change character set to utf8
mysqli_set_charset($mysqli,"utf8");


        // $mysqli->set_charset('utf8');
		 
		 
		 
	





/*
try 
{
    // Conectando
    $mysqli  = new  PDO("mysql:host=$host;dbname=$banco;", $usuario, $senha );
} 


catch (PDOException $e) 
{
    // Se ocorrer algum erro na conexão
    die($e->getMessage());
	echo "erro con";
}*/