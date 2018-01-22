<?php


header('Content-type: text/html; charset=utf-8', true); //padrao para brasil --acentua e ÇÇ

require_once('includes/db_connect.php');
require_once('includes/functions.php');


 //                                          CONTROLE TEMPPO DE SESSAO INATIVA
 // DEVE SE COLOCADO ANTES DE INICIAR START
 //###################################### TEMPO DE VIDA SESSAO
                                        // EXPIRACAO CACHE
										// RECOL LIXO NA PASTA DIREORIO------SAIBA MAIS EM PHP.INI
       
	   
define('TEMPOEX', 15*60); /*tempo de expiração da sessão em minutos* SEGUNDOS */

//todas as páginas que quiser um lifetime para a sessão
ini_set('session.gc_probability', 100);
ini_set('session.gc_maxlifetime', TEMPOEX);
ini_set('session.cookie_lifetime', TEMPOEX);
ini_set('session.cache_expire', TEMPOEX);

//$$$$$$$$#####################################################################

 
 

 
 //ISTO ANTES DO START IRA ----- LIMPAR O CACHE----QUANDO CLIENTE FECHAR O NAVEGADOR-----ASSIM EL TERA Q FAZER LOGIN NOVAMENTE-----SEGURO
 session_set_cookie_params(0);
 //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
 //sec();

 sec_session_start(); //___ CHAMAR FUNCTION sec_session_start in FUNCTION.PHP

 
?>



 <div  class="container">


</div><!-- fim DESTE CONTAINER BOOTSTRAP  -->


<html lang="pt-br">
  <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Obrigado Pela Compra </title>
         <link href="css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="css/editar_imagem.css">
     <link rel="stylesheet" href="css/ESTILO_FONT_SIZE.css">
        <!-- ABAIXO PRECISA SER COMENTADO NAVEGADORES ANTIGOS 
        BOOSTRAP 3 -->
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <!--  <link rel="stylesheet" href="css/         .css">-->
    <!--
    Internet Explorer 10 no Windows 8 e Windows Phone 8
O Internet Explorer 10 não diferenciar largura do dispositivo de largura janela e, portanto, não se aplica corretamente as consultas de mídia em CSS de Bootstrap. Normalmente, você tinha acabado de adicionar um fragmento rápida de CSS para corrigir isso:-->
    <script>
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(
        document.createTextNode(
            "@-ms-viewport{width:auto!important}"
        )
    );
    document.getElementsByTagName("head")[0].
        appendChild(msViewportStyle);
}
</script></head><body style="background-color:#C7F991"><script src="js/jquery-3.1.0.min.js"></script><script src="js/bootstrap.min.js"></script>






<div class="container"><h1 class="tipoprduto_h1" > Sua compra foi efetuada com sucesso, por favor aguarde a entrega </h1>
</div><div class="container"><div class="row"><div class="col-xs-12 imgrodape">
 <img id="" src="imagens/pizza_catupiry.jpg"  class="img-responsive" alt="Imagem pizzacatupiry" >
                     </div>
 <div class="col-xs-12 imgrodape text-center">
                 <p style="background-color:#F99; font-weight:700; color:#60C; font-size:24px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif"> Obrigado </p> </div> <div class="col-xs-12 imgrodape text-center">
<a href="includes/logout-SOLICITADO.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Se Deslogue e volte para p&aacute;gina principal</a>
</div></div></div><br><br><br><br><br>


<?php

	// myses = the last session gerada before to PAGAMENTO $$
	if(isset($_SESSION['clie']['myses']) && isset($_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO']) ){
		
	
	//faça alguma coisa
	//echo "SIm EXISTE NUM PEDIDO  que  é ___".$_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO']."<br><br><br>";  //TESTES

	$id_do_pedido = $_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO'];
    $total = $_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'];
    date_default_timezone_set('America/Sao_Paulo');
	//$data_e_hora = array();
    $data_e_hora = date('Y-m-d h:i:sa');
	   $nome_sob_cliente = $_SESSION['clie']['nomeuser']." ".$_SESSION['clie']['sobrenouser'] ;
	   $tel_de_cont = $_SESSION['clie']['tel/cel'] ;
	    $endereco = $_SESSION['clie']['endereco']." - ". $_SESSION['clie']['num']." - ". $_SESSION['clie']['compl']." - ". $_SESSION['clie']['bairro']." - ".$_SESSION['clie']['cidade'];
		$proximo = $_SESSION['clie']['ficaproximo'];
	  $cep = $_SESSION['clie']['cep']; //11
	  $ORIGEM = 'Entrega'; 

	

	//-------------------------------------------------


 foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg){ 
 
    // ### IMPORTANTE: NOTE O . ANTES DO = ----  ISSO SERVE PARA CONCATENAR RESULTADOS QUE FOREACH VAI LENDO TIPO ['ITEM'][DOG] + ['ITEM'][CAT]... AI FICA DOGCAT
	$produto .= "@".$itempeggg['item']."#";
	$valorUNITARIO .= "@".$itempeggg['unitprice']."#";
    $quant .= "@".$itempeggg['quantity']."#";
	$subtotal .= "@".$itempeggg['subtotal']."#";
    // O (.) ANTES DO (=) É importante PARA CONCATENAR

 }  // FIM FOREACH-------

//-----------------------------------------




	//########################  BD INSERT
	
	$insert_stmt = $mysqli->prepare;
	$insert_stmt = ("INSERT INTO pedidos( id_do_pedido, itens, valor_UNITARIO, quant_sub, subtotal, total, data_e_hora, nome_sob_cliente, tel_de_cont, endereco, proximo, cep, origem ) VALUES ( '$id_do_pedido', '$produto' , '$valorUNITARIO' , '$quant', '$subtotal', '$total', '".$data_e_hora."', '$nome_sob_cliente', '$tel_de_cont', '$endereco', '$proximo', '$cep' , '$ORIGEM'  )") ;
//or die(mysqli_error($insert_stmt));

		  $EXEC =  mysqli_query($mysqli, $insert_stmt);
	$mysqli->close();

		 
// Unset all session values 
$_SESSION = array();
 

// Destroy session 
session_destroy();

	
	//--------------------------------------------------------
	//============================================================================================================
	
	//--------------------============================---------------------=====================------------------------=============---------------============
	//--------------------------------------------------------------------------
	
	
	
	
}else{   //nao EXISTE SESSAO

	    header('Location: index.php');

}



?>

</body>
 </html>
       
       
       
       

    