<?php



header('Content-type: text/html; charset=utf-8',true); //padrao brasil --acentua e ÇÇ


// Informações para conexão DEFINIT

DEFINE('DB_HOST', ';port=');
DEFINE('DB_NAME', '');

DEFINE('DB_USER', '');
DEFINE('DB_PASS', '');



/*


// Informações para conexão local

DEFINE('DB_HOST', 'localhost;port=');
DEFINE('DB_NAME', '');

DEFINE('DB_USER', '');
DEFINE('DB_PASS', '');

*/





try 
{
    // Conectando
   // $pdo = new PDO($dsn, $usuario, $senha);
	
	

       $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);





	
} 
catch (PDOException $e) 
{
    // Se ocorrer algum erro na conexão
    die($e->getMessage());
}









	
	
