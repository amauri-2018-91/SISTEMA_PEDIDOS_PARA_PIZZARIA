<?php


header('Content-type: text/html; charset=utf-8', true); //padrao para brasil --acentua e ÇÇ

require_once('includes/db_connect.php');
require_once('includes/functions.php');

?>







<?php

	//faça alguma coisa
	//echo "SIm EXISTE NUM PEDIDO  que  é ___".$_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO']."<br><br><br>";  //TESTES
	



	  //################################
	  //#############################
	  //##############################   INICIO VERIFICAO DIA DA SEMANA E HORA
	  
	  

      //_________________________________     VERIFICAR   DATA     HORA    ----
	  
	   date_default_timezone_set('America/Sao_Paulo');  // AGORA TUDO ABAIXO É CONSIDERADO______HORA DE ___SÃO PAULO___BR

   $hora_START = ( date('12:03:00') );  //PODE DELETAR LIMPAR PEDIDOS ENTRE...
   $hora_deletar__ate = ( date('14:00:00') );  //ATE...
   $now = date('H:i:s');	  // H = hora 24 horas

   

if ( ($hora_START <= $now) && ($now <= $hora_deletar__ate)  ) {

//########################  BD DELETAR  PEDIDOS  CRON___
	
	$DELETAR_stmt = $mysqli->prepare;
	$DELETAR_stmt = "TRUNCATE TABLE pedidos" ;  // TRUNCAT PARA DELETAR TODOS DADOS DESTA TABLE
//or die(mysqli_error($insert_stmt));

		   
		  $EXEC =  mysqli_query($mysqli, $DELETAR_stmt);
		   $mysqli->close();
	  
	//########################  FIMMM  BD DELETAR  PEDIDOS  CRON___

	
}else{
	
	 	 
	 exit(); //sair nao fazer nada____nao DELETAR NADA
	 
	
}

	
	
?>



       
       

    