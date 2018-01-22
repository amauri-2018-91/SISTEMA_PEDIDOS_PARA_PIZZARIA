


<?php


 header("Content-Type: text/html; charset=utf-8", true);  //padrao brasil --acentua e ÇÇ

	$conn = new PDO(
    'mysql:host=??????????;dbname=???????;charset=utf8', "", ""
);

//GROUP BI ID === PARA TRAZER UNICO ___ SE TIVER ID DUPLICADO___EXIBIR SÓ UM DO TIPO
// ORDER BY === porque o GROUP ID trazia em ordem do id____eu quero em ORDEM DE QUEM VAI COMPRANDO PRIMEIRO aparece PRIMEIRO

$CONSULTA = $conn->prepare("SELECT id_do_pedido, itens, valor_UNITARIO, quant_sub, subtotal, total, data_e_hora, nome_sob_cliente, tel_de_cont, endereco, proximo, cep  FROM pedidos GROUP BY id_do_pedido ORDER BY data_e_hora ASC");

$CONSULTA->execute();

    $vetor = array();    $ITENS = array();    
	$cont = 0;
	
	
	
	
    while($row = $CONSULTA->fetch(PDO::FETCH_ASSOC)){  //-----------------------------------------------------------

	$vetor[] =  $row;

		
   }  //FIM WHILE___________________________________________________________________________________________________
   
   
   
   
   	$CONSULTA->close();
	    echo json_encode($vetor);


	
	

?>















