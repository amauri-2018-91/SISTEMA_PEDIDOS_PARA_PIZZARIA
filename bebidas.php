<?php
require_once('includes/db_connect.php');
require_once('includes/functions.php');
 
 
 
 header('Content-type: text/html; charset=utf-8'); //padrao brasil --acentua e ÇÇ

 
 
 //__________________________________________CODE do banco dados PRODUTOS
 
 
// Incluindo arquivo de conexão
require_once('config/conn.php');





// Selecionando fotos
$stmtbebidas = $pdo->query("SELECT * FROM bebidas ORDER BY nome ASC ");


 //_______________________________________________________________________
 
 
 
 
 
 
 
 
 
 //                                          CONTROLE TEMPPO DE SESSAO INATIVA
 // DEVE SE COLOCADO ANTES DE INICIAR START
 //###################################### TEMPO DE VIDA SESSAO
                                        // EXPIRACAO CACHE
										// RECOL LIXO NA PASTA DIREORIO-------- SAIBA MAIS EM PHP.INI
       
	   
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
 
sec_session_start(); //start____NO FUNCTION.PHP





?>
<html lang="pt-br">
  <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><title>Pizzaria Ana Paula</title><link href="css/bootstrap.min.css" rel="stylesheet"> <script type="text/JavaScript" src="js/sha512.js"></script><script type="text/JavaScript" src="js/forms.js"></script> 
  <!-- ABAIXO PRECISA SER COMENTADO NAVEGADORES ANTIGOS 
        BOOSTRAP 3 -->
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--><link rel="stylesheet" href="css/editar_imagem.css">
   <link rel="stylesheet" href="css/ESTILO_FONT_SIZE.css">
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
</script></head><body> <script src="js/jquery-3.1.0.min.js"></script><script src="js/bootstrap.min.js"></script>
<?php

//----------------------------------------------------
//---------------------------------------------------------------
//----------------------------
//======================================================== TESTES ABAIXO,,,,,,,PODE TIRAR DEPOIS
//---------------------------------------------------------------------
//============================================================================
?>

 <div  class="container">
 
 <?php

		?></div><!-- fim DESTE CONTAINER BOOTSTRAP  -->
        
        <?php
		  
//---------------------------------------------------- TESTES ACIMA PODE RETIRAR DEPOIS
//---------------------------------------------------------------
//----------------------------
//========================================================
//---------------------------------------------------------------------
//============================================================================


?>




 <div  class="container">
 <?php
 //###############################################################################       SE LOGIN FOR TRUE_______TODO CONTEUDO do USUARIO PRIVILEGIADO AQUI DENTRO
		
 
if (login_check($mysqli) == true) { //-------------------------------------------------
    $logged = 'in';
	//######################################################################################################################
 
 //                                          CONTROLE TEMPPO DE SESSAO INATIVA ------ COLOCAR SO AQUI DENTRO --- QUANDO login_check 

// Verifica se $_SESSION['ultimoClick'] esta setada e não esta vazia.
// Caso esteja, ele verifica o tempo que o usuario levou entre um clique e outro.
// Caso não, ele seta a sessão e dá o valor do tempo time() atual.

if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) { //-------------------------------------------1---------------------------



$tempoAtual = time();


// Faz uma condição entre o tempo do ultimo click e o tempo atual.
// Caso dê maior que 60 segundos, redireciona para a pagina desejada.
// Caso não de maior, apenas atualiza o valor do ultimo clique para o valor atual.

if ( ($tempoAtual - $_SESSION['ultimoClick']) > '900' ) {//------------------------------------------2---------------






unset($_SESSION['ultimoClick']);






$_SESSION = array();
session_destroy();
header("Location:includes/logout.php");




exit(); //------------------------------------ENTAO FIM---------desloguei usuario






}else{//-----------------------------------------------------ELSE-----------2--------------------------------------

$_SESSION['ultimoClick'] = time();
//echo $_SESSION['ultimoClick']."     =====ultimo clique um <br>";

//echo $tempoAtual - $_SESSION['ultimoClick']."  -----   olha hora <br>";

}//-----------------------------------------------------------------------------------------------------------------FIM----2

}else{//--------------------ELSE 1

$_SESSION['ultimoClick'] = time();
//echo $_SESSION['ultimoClick']."     =====ultimo clique dois <br>";

}//------------------------------------------------------------------------------FIM 1------------------------------------------------------------------


//########################################################################################################## FIM CONTROLE TEMPO SESSAO INATIVA
	

} else {
    $logged = 'out';
	
	
	
	
	
	
	
//######################################################################################################################
 
 //                     CONTROLE TEMPPO DE SESSAO INATIVA ------ SE NAO PODER USAR____CRON___NO SERVIDOR_____PENSE NESSE BEM-BOLADO ABAIXO



//########################################################################################################## FIM CONTROLE TEMPO SESSAO INATIVA

	
}  //-----------------------------------------------------------------------------------
?>

</div><!-- fim DESTE CONTAINER BOOTSTRAP  -->





 
<?php if (login_check($mysqli) == true) { //-----------------------------------------------------------------------------------################################################################################################################################################################################################################################################################################################################################################################################################################
?> <?php require_once 'partes/MENU_TOPO_FIXO_LOGADO.php';?><div class="container prdquetem"> <div class="row"><div class="col-xs-12 itensdapagina" >
 <h2 class="oquetemnapagina" >Nesta P&aacute;gina:</h2><h3 class="prodquetem" > Bebidas </h3></div></div></div><br><?php $numeral_bebidas = 1;?><br><h1 class="tipoprduto_h1" > Nossas Bebidas  </h1> <br> <?php while ($fotobebidas = $stmtbebidas->fetchObject()):  ?> <br/><div class="container produtos" ><div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"> <div class="thumbnail" >
 <div class="numeral" >  <?php echo $numeral_bebidas++;  ?></div><img src="imagem.php?id=<?php echo $fotobebidas->id ?>" /><div class="caption" ><strong>Bebida:</strong> <?php echo $fotobebidas->nome ?> <br/> <strong>ML:</strong> <?php echo $fotobebidas->ml ?> <br><strong>Preço:</strong><strong class="preco"> <?php $valor = $fotobebidas->valor/100; echo "R$ ".number_format($valor,2,',','.');//pad-BR  ?></strong>  </div></div></div> </div></div><div class="container dosbotoes"><div class="row rowbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2"> <button type="submit" name="<?php echo $fotobebidas->id ?>" id="comprarinteira" class="btn btn-default btn-xs center-block bu" > Comprar  <?php echo $fotobebidas->nome ?> </button><input type="hidden" id="<?php  echo  $fotobebidas->id."idprod" ?>"  name="idprod"   value="<?php  echo (base64_encode($fotobebidas->id)) ?>"/><input type="hidden" id="<?php  echo  $fotobebidas->id."valorprod" ?>" name="valorprod" value="<?php echo (base64_encode($fotobebidas->valor)) ?>"/><input type="hidden" id="<?php  echo  $fotobebidas->id."nomeprod" ?>" name="nomeprod" value="<?php echo ($fotobebidas->nome) ?>"/>
<input type="hidden" id="<?php  echo  $fotobebidas->id."type" ?>"  name="qul"   value="<?php  echo (base64_encode('bebidas')) ?>"/><br>         
<input type="number" id="<?php echo $fotobebidas->id.'qtdprod'?>" name='qtd' value='1' class="qtdprodint center-block" min="1"  max="200" /><label for="qtd" class="text-center center-block TEXTQUANT_int" >Quantidade</label></div></div><button type="button"  id="addquant" class="btn btn-info center-block BU_ADD_CSS RETWHEN_MET <?php echo $fotobebidas->id.'addquant'?>" />ADICIONE +1</button><br><button type="button" id="decrequant" class="btn btn-warning center-block BU_DEC_CSS RETWHEN_MET <?php echo $fotobebidas->id.'decrequant'?>" />RETIRAR 1</button> <script>$(document).ready(function(e) { $( "<?php echo ".".$fotobebidas->id.'addquant'?>" ).click(function (){ if(selecao == 1){ var CLASSQUANTIDADE = "<?php echo  $fotobebidas->id.'qtdprod' ?>"; document.getElementById(CLASSQUANTIDADE).value++;
} });$( "<?php echo ".".$fotobebidas->id.'decrequant'?>" ).click(function (){ if(selecao == 1){ var CLASSQUANTIDADE = "<?php echo  $fotobebidas->id.'qtdprod' ?>";
document.getElementById(CLASSQUANTIDADE).value--;if( document.getElementById(CLASSQUANTIDADE).value < 1 )
  { document.getElementById(CLASSQUANTIDADE).value = 1;  }} }); });</script>  
</div> <?php endwhile;?><?php require_once 'partes/FOOTER.php';?>	<?php
} else {  //--------------------------
################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################ 
	?> <?php  // require_once 'partes/FOOTER.php'; 
	
	
	unset($_SESSION['ultimoClick']);






$_SESSION = array();
session_destroy();
header("Location:includes/logout.php");




exit(); //------------------------------------ENTAO FIM---------desloguei usuario
	
	
	
	} //--------------------------########################################## FIM______AREA
//-----------------------------------------------------------------------------------------------------------------------








?>	

    

<br>
<br>

    </body>
</html>