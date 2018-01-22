<?php
// Incluindo arquivo de conexão
require_once('config/conn.php');




$id_esfihoes = (int) $_GET['id_esfihoes'];

// Selecionando fotos
$stmtesfihoes = $pdo_esfih->prepare('SELECT * FROM esfihoes WHERE id_esfihoes = :id_esfihoes');
$stmtesfihoes->bindParam(':id_esfihoes', $id_esfihoes, PDO::PARAM_INT);




// Se executado
if ($stmtesfihoes->execute())
{
    // Alocando foto
    $fotoesfihoes = $stmtesfihoes->fetchObject();
    
    // Se existir
    if ($fotoesfihoes != null)
    {
		
	
		
        // Definindo tipo do retorno
        header('Content-Type: '. $fotoesfihoes->tipo_foto);
        
		

        // Retornando conteudo
        echo $fotoesfihoes->conteudo;
    }
}



// ________________________________ ESTE ABAIXO PRA OUTRA TABELA____TMB DEVE TER____SENAO IMAGEM NAO APARECE___ESFIHOES

$id = (int) $_GET['id_esfihoes'];

// Selecionando fotos
$stmt = $pdo->prepare('SELECT * FROM esfihoes WHERE id_esfihoes = :id_esfihoes');
$stmt->bindParam(':id_esfihoes', $id, PDO::PARAM_INT);




// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto!= null)
    {
		
	
		
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo_foto);
        
		

        // Retornando conteudo
        echo $foto->conteudo;
    }
}















// ________________________________ ESTE ABAIXO PRA OUTRA TABELA____TMB DEVE TER____SENAO IMAGEM NAO APARECE____PORCOES

$id_porcoes = (int) $_GET['id_porcoes'];

// Selecionando fotos
$stmtporcoes = $pdo->prepare('SELECT * FROM esfihoes WHERE id_porcoes = :id_porcoes');
$stmtporcoes->bindParam(':id_porcoes', $id_porcoes, PDO::PARAM_INT);




// Se executado
if ($stmtporcoes->execute())
{
    // Alocando foto
    $fotoporcoes = $stmtporcoes->fetchObject();
    
    // Se existir
    if ($fotoporcoes != null)
    {
		
	
		
        // Definindo tipo do retorno
        header('Content-Type: '. $fotoporcoes->tipo_foto);
        
		

        // Retornando conteudo
        echo $fotoporcoes->conteudo;
    }
}





