<?php
// Incluindo arquivo de conexão
require_once('config/conn.php');



/*pizzas */
$id = (int) $_GET['id'];

// Selecionando fotos
$stmt = $pdo->prepare('SELECT * FROM pizzas WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);




// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {

        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo_foto);
        // Retornando conteudo
        echo $foto->conteudo;
    }
}










/*esfihoes */

/*______________________OBS AQUI TEM Q TER OUTRA CON DA OUTRA TABELA____AQUI PODE SER AS VARIAV IGUAIS____SO NAO PODE SER IGUAL O ID___LA NO MYSL DE UMA TBLA A OUTRA */

$id = (int) $_GET['id'];

// Selecionando fotos
$stmt = $pdo->prepare('SELECT * FROM esfihoes WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);




// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {
		
	
		
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo_foto);
        
		

        // Retornando conteudo
        echo $foto->conteudo;
    }
}









/*porcoes */


/*______________________OBS AQUI TEM Q TER OUTRA CON DA OUTRA TABELA____AQUI PODE SER AS VARIAV IGUAIS____SO NAO PODE SER IGUAL O ID___LA NO MYSL DE UMA TBLA A OUTRA */

$id = (int) $_GET['id'];

// Selecionando fotos   //PREPARE=== protege de INJECTION SQL
$stmt = $pdo->prepare('SELECT * FROM porcoes WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);




// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {
		
	
		
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo_foto);
        
		

        // Retornando conteudo
        echo $foto->conteudo;
    }
}













/*Bebidas */


/*______________________OBS AQUI TEM Q TER OUTRA CON DA OUTRA TABELA____AQUI PODE SER AS VARIAV IGUAIS____SO NAO PODE SER IGUAL O ID___LA NO MYSL DE UMA TBLA A OUTRA */

$id = (int) $_GET['id'];

// Selecionando fotos
$stmt = $pdo->prepare('SELECT * FROM bebidas WHERE id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);




// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {
		
	
		
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo_foto);
        
		

        // Retornando conteudo
        echo $foto->conteudo;
    }
}


