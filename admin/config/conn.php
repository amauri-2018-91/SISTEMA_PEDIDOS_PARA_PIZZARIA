<?php



header('Content-type: text/html; charset=ISO-8859-1'); //padrao brasil --acentua e ÇÇ


// Informações para conexão DEFINIT

$host = '';
$usuario = '';
$senha = '';
$banco = '';
$dsn = "mysql:host={$host};port=;dbname={$banco}";





try 
{
    // Conectando
    $pdo = new PDO($dsn, $usuario, $senha);
	
} 
catch (PDOException $e) 
{
    // Se ocorrer algum erro na conexão
    die($e->getMessage());
}









	
	
