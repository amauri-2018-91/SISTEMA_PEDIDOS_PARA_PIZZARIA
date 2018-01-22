<?php



header('Content-type: text/html; charset=utf-8', true); //padrao para brasil --acentua e ÇÇ

require_once('includes/db_connect.php');
require_once('includes/functions.php');
 
 

 //__________________________________________CODE do banco dados PRODUTOS
// Incluindo arquivo de conexão
require_once('config/conn.php');




// Selecionando fotos
$stmt = $pdo->query("SELECT * FROM pizzas WHERE tipogosto='Salgado'  ORDER BY nome ASC ");
$stmtdoce = $pdo->query("SELECT * FROM pizzas  WHERE tipogosto='Doce' ORDER BY nome ASC ");

$stmtesfihoes = $pdo->query("SELECT * FROM esfihoes WHERE tipogosto='Salgado' ORDER BY nome ASC ");
$stmtesfihoesdoce = $pdo->query("SELECT * FROM esfihoes WHERE tipogosto='Doce' ORDER BY nome ASC ");

 $stmtporcoes = $pdo->query("SELECT * FROM porcoes ORDER BY nome ASC ");

 //_______________________________________________________________________
 
 
 
 
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
 
sec_session_start(); //start____NO FUNCTION.PHP



?>
<html lang="pt-br">
  <head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Pizzaria Ana Paula</title> <link href="css/bootstrap.min.css" rel="stylesheet">
       <!-- ABAIXO PRECISA SER COMENTADO NAVEGADORES ANTIGOS 
        BOOSTRAP 3 -->
     
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/editar_imagem.css"><link rel="stylesheet" href="css/ESTILO_FONT_SIZE.css">
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
</script></head>
 <body> <script src="js/jquery-3.1.0.min.js"></script><script src="js/bootstrap.min.js"></script>

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
	
	//_____________
	
	
	
	
	
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

}//-----------------------------------------------------------------------------------------------------------------FIM----2

}else{//--------------------ELSE 1

$_SESSION['ultimoClick'] = time();

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
<?php
        if (login_check($mysqli) == true) { //-----------------------------------------------------------------------------------################################################################################################################################################################################################################################################################################################################################################################################################################
		
			?>		
<?php 


//print_r($_SESSION);  //testes

require_once 'partes/MENU_TOPO_FIXO_LOGADO.php'; 

?>






 
 
     <!-- set up the modal to start hidden and fade in and out -->
<div id="myModal" class="modal fade">
   
   <div class="modal-dialog">
     <div class="modal-content">
     
     
     
      <!-- dialog body --      MENSAGENS -->
      <div class="modal-body" id="NAO_ATENDEMOS_NO_HORARIO">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      
      
      
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-primary">Entendi</button></div>
    </div>
  </div>
</div>














 
 <?php

 ?>





            <div class="container INCAA"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center INC"><img id="imginicioAAAAA" src="imagens/Foto_Inicio.jpg" class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"></div></div></div><br>


            <div class="container">
        <h1 style="font-size: 22px" class="facaseupedido_h1" >FONES: ????-???? / ????-???? / ????-???? / ????-???? / Whats: ????-????</h1><
    </div>
<br><a class="botaoh1" href="ENDERECOS/ENDERECO_PIZZARIA.php" > <h1> Veja Onde Estamos <span class="glyphicon glyphicon-map-marker"></span></h1></a><br>
<div class="container bandeiras" ><h1 class="facaseupedido_h1"> Pe&ccedil;a sempre com anteced&ecirc;ncia de 1 hora </h1><h2 class="rapidopratico" >É Rápido e Prático</h2>
<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 quadband"><h3 class="cartoestipo">Cart&otilde;es de Cr&eacute;dito</h3><img id="CARTCRED" class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"><h3 class="cartoestipo" >D&eacute;bito em Conta</h3><img id="CARTDEB" class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"></div></div></div><br><div class="container prdquetem"><div class="row"><div class="col-xs-12 itensdapagina" >
 <h2 class="oquetemnapagina" >Nesta P&aacute;gina:</h2><h3 class="prodquetem"> Pizzas </h3><h3 class="prodquetem" > Esfih&otilde;es </h3><h3 class="prodquetem" > Por&ccedil;&otilde;es </h3>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
</div></div></div><br> <?php $numeral_pizzas = 1; $numeral_pizzas_doces = 1;$numeral_esfihoes = 1;$numeral_esfihoes_doces = 1;$numeral_porcoes = 1;
 ?><br><h1 class="tipoprduto_h1" > Nossas Pizzas  </h1><br><?php while ($foto = $stmt->fetchObject()):  ?> <br/>
        
<div class="container produtos"><div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info">
<div class="thumbnail"><div class="numeral"><?php echo (int)$numeral_pizzas++;?> </div><img src="imagem.php?id=<?php echo $foto->id ?>" /><div class="caption" >
<strong>Nome:</strong> <?php echo $foto->nome ?> <br/><strong>Ingredientes:</strong> <?php echo $foto->ingredientes."<br>"; ?>
 <strong>Preço:</strong><strong class="preco"> <?php $valor = $foto->valor/100; echo "R$ ".number_format($valor,2,',','.');//pad-BR  ?></strong> </div></div></div></div></div><div class="container dosbotoes"><div class="row" >
 <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2 colunaicone_pizza" ><img class="img-responsive "src="imagens/vetor__pizza/pizza_completa_icone.png" width="100" height="100" /></div><div class="col-xs-6 col-sm-6 col-md-4 col-lg-4  colunaicone_pizza" >
<img class="img-responsive" src="imagens/vetor__pizza/pizza_metade_icone.png" width="100" height="100"  /></div></div><div class="row rowbotoes" >
<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2 ">
<button type="submit" name="<?php echo $foto->id ?>" id="comprarinteira" class="btn btn-default btn-xs center-block bu" > Comprar pizza inteira <?php echo $foto->nome ?> </button><input type="hidden" id="<?php  echo  $foto->id."idprod" ?>"  name="idprod"   value="<?php  echo  (base64_encode($foto->id)) ?>"/>
<input type="hidden" id="<?php  echo  $foto->id."valorprod" ?>" name="valorprod" value="<?php echo (base64_encode($foto->valor)) ?>"/>
<input type="hidden" id="<?php  echo  $foto->id."nomeprod" ?>" name="nomeprod" value="<?php echo ($foto->nome) ?>"/><input type="hidden" id="<?php  echo  $foto->id."type" ?>"  name="qul"   value="<?php  echo (base64_encode('pi')) ?>"/><br><input type="number" id="<?php echo $foto->id.'qtdprod'?>" name='qtd' value='1' class="qtdprodint center-block" min="1"  max="200" /> <label for="qtd" class="text-center center-block TEXTQUANT_int" >Quantidade</label>
</div><div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" >
   <button type="submit" name="<?php echo $foto->id ?>" id="comprarmetade" class="btn btn-default btn-xs center-block selpizzmeia" > Selecionar meia <?php echo $foto->nome ?>  </button> </br><input type="hidden" id="<?php  echo  $foto->id."idprodmet" ?>"  name="idprodmet"   value="<?php  echo (base64_encode($foto->id)) ?>"/><input type="hidden" id="<?php  echo  $foto->id."valorprodmet" ?>" name="valorprodmet" value="<?php echo (base64_encode($foto->valor)) ?>"/><input type="hidden" id="<?php  echo  $foto->id."nomeprodmet" ?>" name="nomeprodmet" value="<?php echo ($foto->nome) ?>"/>
<input type="hidden" id="<?php  echo  $foto->id."typemet" ?>"  name="qul"   value="<?php  echo (base64_encode('pi')) ?>"/><input type="number" id="<?php echo $foto->id."qtdprodmet"?>" name='qtd' class="qtdprodmet" value='1' min="1"  max="200" /><label class="TEXTQUANT_met">Quantidade</label> </div>
 </div> <button type="button"  id="addquant" class="btn btn-info center-block BU_ADD_CSS <?php echo $foto->id.'addquant'?>" />ADICIONE +1</button><br>
<button type="button" id="decrequant" class="btn btn-warning center-block BU_DEC_CSS <?php echo $foto->id.'decrequant'?>" />RETIRAR 1</button>
<script>$(document).ready(function(e) {
 $( "<?php echo ".".$foto->id.'addquant'?>" ).click(function (){
if(selecao == 1){var CLASSQUANTIDADE = "<?php echo  $foto->id.'qtdprod' ?>";}else if(selecao == 2 || selecao == 3){ var CLASSQUANTIDADE = "<?php echo  $foto->id.'qtdprodmet' ?>";}document.getElementById(CLASSQUANTIDADE).value++;}); $( "<?php echo ".".$foto->id.'decrequant'?>" ).click(function (){
 if(selecao == 1){var CLASSQUANTIDADE = "<?php echo  $foto->id.'qtdprod' ?>"; }else if(selecao == 2 || selecao == 3){ var CLASSQUANTIDADE = "<?php echo  $foto->id.'qtdprodmet' ?>";} document.getElementById(CLASSQUANTIDADE).value--;if( document.getElementById(CLASSQUANTIDADE).value < 1 )
     {
       document.getElementById(CLASSQUANTIDADE).value = 1;  //MINIMO____RESTRINGIR__NUMBER NEGATIVO
     }
 }); }); 
</script></div><?php  // } // ____________________FIM___IF___SALGADO
  endwhile; //_______________________________________________________________________________________________________________
 ?><br><h1 class="tipoprduto_h1" > Pizzas Doces  </h1> <br> <?php 
//_________________________________________________________________________________________________________________
while ($fotodoce = $stmtdoce->fetchObject()):  ?><br/><div class="container produtos" ><div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"><div class="thumbnail" ><div class="numeral" ><?php echo $numeral_pizzas_doces++;  ?> 
</div><img src="imagem.php?id=<?php echo $fotodoce->id ?>" /><div class="caption" ><?php ?><strong>Nome:</strong> <?php echo $fotodoce->nome ?> <br/>
<strong>Ingredientes:</strong> <?php echo $fotodoce->ingredientes."<br>"; ?><strong>Preço:</strong> <strong class="preco"> <?php $valor = $fotodoce->valor/100; echo "R$ ".number_format($valor,2,',','.');//pad-BR  ?></strong> </div> </div> </div> </div> </div> <div class="container dosbotoes" ><div class="row" > <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2 colunaicone_pizza" >
  <img class="img-responsive "src="imagens/vetor__pizza/pizza_completa_icone.png" width="100" height="100" /> </div> <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4  colunaicone_pizza" ><img class="img-responsive" src="imagens/vetor__pizza/pizza_metade_icone.png" width="100" height="100"  />
 </div> </div> <div class="row rowbotoes" ><div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 col-md-offset-2 col-lg-offset-2"> <button type="submit" name="<?php echo $fotodoce->id ?>" id="comprarinteira" class="btn btn-default btn-xs center-block bu" > Comprar pizza inteira <?php echo $fotodoce->nome ?> </button>
<input type="hidden" id="<?php  echo  $fotodoce->id."idprod" ?>"  name="idprod"   value="<?php  echo (base64_encode($fotodoce->id)) ?>"/><input type="hidden" id="<?php  echo  $fotodoce->id."valorprod" ?>" name="valorprod" value="<?php echo (base64_encode($fotodoce->valor)) ?>"/><input type="hidden" id="<?php  echo  $fotodoce->id."nomeprod" ?>" name="nomeprod" value="<?php echo ($fotodoce->nome) ?>"/><input type="hidden" id="<?php  echo  $fotodoce->id."type" ?>"  name="qul"   value="<?php  echo(base64_encode('pizdoc')) ?>"/>
<br>         
<input type="number" id="<?php echo $fotodoce->id.'qtdprod'?>" name='qtd' value='1' class="qtdprodint center-block" min="1"  max="200" /> <label for="qtd" class="text-center center-block TEXTQUANT_int" >Quantidade</label> </div><div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" >
 <button type="submit" name="<?php echo $fotodoce->id ?>" id="comprarmetade" class="btn btn-default btn-xs center-block selpizzmeia" > Selecionar meia <?php echo $fotodoce->nome ?>  </button> </br><input type="hidden" id="<?php  echo  $fotodoce->id."idprodmet" ?>"  name="idprodmet"   value="<?php  echo (base64_encode($fotodoce->id)) ?>"/><input type="hidden" id="<?php  echo  $fotodoce->id."valorprodmet" ?>" name="valorprodmet" value="<?php echo (base64_encode($fotodoce->valor)) ?>"/><input type="hidden" id="<?php  echo  $fotodoce->id."nomeprodmet" ?>" name="nomeprodmet" value="<?php echo ($fotodoce->nome) ?>"/>
<input type="hidden" id="<?php  echo  $fotodoce->id."typemet" ?>"  name="qul"   value="<?php  echo (base64_encode('pizdoc')) ?>"/>
 <input type="number" id="<?php echo $fotodoce->id."qtdprodmet"?>" name='qtd' class="qtdprodmet" value='1' min="1"  max="200" />
<label class="TEXTQUANT_met">Quantidade</label></div></div> 
<button type="button"  id="addquant" class="btn btn-info center-block BU_ADD_CSS <?php echo $fotodoce->id.'addquant'?>" />ADICIONE +1</button><br><button type="button" id="decrequant" class="btn btn-warning center-block BU_DEC_CSS <?php echo $fotodoce->id.'decrequant'?>" />RETIRAR 1</button><script>$(document).ready(function(e) { $( "<?php echo ".".$fotodoce->id.'addquant'?>" ).click(function (){if(selecao == 1){var CLASSQUANTIDADE = "<?php echo  $fotodoce->id.'qtdprod' ?>";
}else if(selecao == 2 || selecao == 3){ var CLASSQUANTIDADE = "<?php echo  $fotodoce->id.'qtdprodmet' ?>";}
document.getElementById(CLASSQUANTIDADE).value++; });
            $( "<?php echo ".".$fotodoce->id.'decrequant'?>" ).click(function (){if(selecao == 1){var CLASSQUANTIDADE = "<?php echo  $fotodoce->id.'qtdprod' ?>"; }else if(selecao == 2 || selecao == 3){
			   var CLASSQUANTIDADE = "<?php echo  $fotodoce->id.'qtdprodmet' ?>";
		}document.getElementById(CLASSQUANTIDADE).value--; if( document.getElementById(CLASSQUANTIDADE).value < 1 ) {document.getElementById(CLASSQUANTIDADE).value = 1; }});
		 });</script></div> <?php    // } // ____________________FIM___IF___SALGADO
endwhile; //_______________________________________________________________________________________________________________
 ?><br><h1 class="tipoprduto_h1" > Nossas Esfihas </h1><br>
 <?php while ($fotoesfihoes = $stmtesfihoes->fetchObject()):  ?><br/>
<?php  // if($fotodoce->tipogosto == 'Doce') { //____só seleciona este tipo ?><div class="container produtos" >
<div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info">
 <div class="thumbnail" ><div class="numeral"><?php echo $numeral_esfihoes++;  ?></div> <img src="imagem.php?id=<?php echo $fotoesfihoes->id ?>" /><div class="caption" ><strong>Nome:</strong> <?php echo $fotoesfihoes->nome ?> <br/> <strong>Ingredientes:</strong> <?php echo $fotoesfihoes->ingredientes."<br>"; ?><strong>Preço:</strong><strong class="preco"> <?php $valor = $fotoesfihoes->valor/100; echo "R$ ".number_format($valor,2,',','.');//pad-BR  ?></strong></div> </div></div></div></div><div class="container dosbotoes" ><div class="row rowbotoes" >
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2"><button type="submit" name="<?php echo $fotoesfihoes->id ?>" id="comprarinteira" class="btn btn-default btn-xs center-block bu" > Comprar esfiha de <?php echo $fotoesfihoes->nome ?> </button>
<input type="hidden" id="<?php  echo  $fotoesfihoes->id."idprod" ?>"  name="idprod"   value="<?php  echo (base64_encode($fotoesfihoes->id)) ?>"/>
<input type="hidden" id="<?php  echo  $fotoesfihoes->id."valorprod" ?>" name="valorprod" value="<?php echo (base64_encode($fotoesfihoes->valor)) ?>"/><input type="hidden" id="<?php  echo  $fotoesfihoes->id."nomeprod" ?>" name="nomeprod" value="<?php echo ($fotoesfihoes->nome) ?>"/>
<input type="hidden" id="<?php  echo  $fotoesfihoes->id."type" ?>"  name="qul"   value="<?php  echo (base64_encode('hesfi')) ?>"/>
<br><input type="number" id="<?php echo $fotoesfihoes->id.'qtdprod'?>" name='qtd' value='1' class="qtdprodint center-block" min="1"  max="200" /><label for="qtd" class="text-center center-block TEXTQUANT_int" >Quantidade</label></div> </div> <button type="button"  id="addquant" class="btn btn-info center-block BU_ADD_CSS RETWHEN_MET <?php echo $fotoesfihoes->id.'addquant'?>" />ADICIONE +1</button><br> <button type="button" id="decrequant" class="btn btn-warning center-block BU_DEC_CSS RETWHEN_MET <?php echo $fotoesfihoes->id.'decrequant'?>" />RETIRAR 1</button> <script>$(document).ready(function(e) {  $( "<?php echo ".".$fotoesfihoes->id.'addquant'?>" ).click(function (){ if(selecao == 1){ var CLASSQUANTIDADE = "<?php echo  $fotoesfihoes->id.'qtdprod' ?>"; document.getElementById(CLASSQUANTIDADE).value++;} });$( "<?php echo ".".$fotoesfihoes->id.'decrequant'?>" ).click(function (){if(selecao == 1){var CLASSQUANTIDADE = "<?php echo  $fotoesfihoes->id.'qtdprod' ?>";document.getElementById(CLASSQUANTIDADE).value--;if( document.getElementById(CLASSQUANTIDADE).value < 1 ){
 document.getElementById(CLASSQUANTIDADE).value = 1;}} });}); </script></div><?php  endwhile; ?> <br>        
<h1 class="tipoprduto_h1" > Esfihas Doces </h1> <br> <?php 
while ($fotoesfihoesdoces = $stmtesfihoesdoce->fetchObject()):  ?><br/>
<div class="container produtos" > <div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"> <div class="thumbnail" > <div class="numeral" ><?php echo $numeral_esfihoes_doces++; ?></div><img src="imagem.php?id=<?php echo $fotoesfihoesdoces->id ?>" />
 <div class="caption" > <strong>Nome:</strong> <?php echo $fotoesfihoesdoces->nome ?> <br/> <strong>Ingredientes:</strong> <?php echo $fotoesfihoesdoces->ingredientes."<br>"; ?>  <strong>Preço:</strong><strong class="preco"> <?php $valor = $fotoesfihoesdoces->valor/100; echo "R$ ".number_format($valor,2,',','.');//pad-BR ?>  </strong>
</div></div></div></div></div><div class="container dosbotoes" ><div class="row rowbotoes" > <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2"><button type="submit" name="<?php echo $fotoesfihoesdoces->id ?>" id="comprarinteira" class="btn btn-default btn-xs center-block bu" > Comprar esfiha de <?php echo $fotoesfihoesdoces->nome ?> </button><input type="hidden" id="<?php  echo  $fotoesfihoesdoces->id."idprod" ?>"  name="idprod"   value="<?php  echo (base64_encode($fotoesfihoesdoces->id)) ?>"/><input type="hidden" id="<?php  echo  $fotoesfihoesdoces->id."valorprod" ?>" name="valorprod" value="<?php echo (base64_encode($fotoesfihoesdoces->valor)) ?>"/><input type="hidden" id="<?php  echo  $fotoesfihoesdoces->id."nomeprod" ?>" name="nomeprod" value="<?php echo ($fotoesfihoesdoces->nome) ?>"/><input type="hidden" id="<?php  echo $fotoesfihoesdoces->id."type" ?>"  name="qul"   value="<?php  echo (base64_encode('hesfidoc')) ?>"/>
<br>         
<input type="number" id="<?php echo $fotoesfihoesdoces->id.'qtdprod'?>" name='qtd' value='1' class="qtdprodint center-block" min="1"  max="200" /><label for="qtd" class="text-center center-block TEXTQUANT_int" >Quantidade</label> </div></div> <button type="button"  id="addquant" class="btn btn-info center-block BU_ADD_CSS RETWHEN_MET <?php echo $fotoesfihoesdoces->id.'addquant'?>" />ADICIONE +1</button><br> <button type="button" id="decrequant" class="btn btn-warning center-block BU_DEC_CSS RETWHEN_MET <?php echo $fotoesfihoesdoces->id.'decrequant'?>" />RETIRAR 1</button> <script>$(document).ready(function(e) {$( "<?php echo ".".$fotoesfihoesdoces->id.'addquant'?>" ).click(function (){if(selecao == 1){ var CLASSQUANTIDADE = "<?php echo  $fotoesfihoesdoces->id.'qtdprod' ?>";document.getElementById(CLASSQUANTIDADE).value++;} });$( "<?php echo ".".$fotoesfihoesdoces->id.'decrequant'?>" ).click(function (){if(selecao == 1){
var CLASSQUANTIDADE = "<?php echo  $fotoesfihoesdoces->id.'qtdprod' ?>";document.getElementById(CLASSQUANTIDADE).value--;if( document.getElementById(CLASSQUANTIDADE).value < 1 ){ document.getElementById(CLASSQUANTIDADE).value = 1;  
     }} }); });</script></div>  <?php    		
 endwhile; ?> <!-- <br><h1 class="tipoprduto_h1" > Nossas Porções  </h1><br> <?php // while ($fotoporcoes = $stmtporcoes->fetchObject()):  ?>
<?php ?> <br/><div class="container produtos" > <div  class="row truta dosbotoes"> <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"> <div class="thumbnail" ><div class="numeral" > 
<?php //echo $numeral_porcoes++;  ?> </div> <img src="imagem.php?id=<?php //echo $fotoporcoes->id ?>" />
<div class="caption" ><strong>Nome:</strong> <?php //echo $fotoporcoes->nome ?> <br/><strong>Acompanha:</strong> <?php //echo $fotoporcoes->acompanha."<br>"; ?>
 <strong>Preço:</strong><strong class="preco"> <?php //$valor = $fotoporcoes->valor/100; echo "R$ ".number_format($valor,2,',','.');//pad-BR ?> </strong>  </div> 
 </div></div> </div></div> <div class="container dosbotoes" ><div class="row rowbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2"><button type="submit" name="<?php //echo $fotoporcoes->id ?>" id="comprarinteira" class="btn btn-default btn-xs center-block bu" > Comprar por&ccedil;&atilde;o de  <?php //echo $fotoporcoes->nome ?> </button>
<input type="hidden" id="<?php  //echo  $fotoporcoes->id."idprod" ?>"  name="idprod"   value="<?php // echo (base64_encode($fotoporcoes->id)) ?>"/><input type="hidden" id="<?php  //echo  $fotoporcoes->id."valorprod" ?>" name="valorprod" value="<?php // echo (base64_encode($fotoporcoes->valor)) ?>"/><input type="hidden" id="<?php  //echo  $fotoporcoes->id."nomeprod" ?>" name="nomeprod" value="<?php //echo ($fotoporcoes->nome) ?>"/>
<input type="hidden" id="<?php  //echo  $fotoporcoes->id."type" ?>"  name="qul"   value="<?php  //echo (base64_encode('porc')) ?>"/>
<br>         
<input type="number" id="<?php //echo $fotoporcoes->id.'qtdprod'?>" name='qtd' value='1' class="qtdprodint center-block" min="1"  max="200" /> <label for="qtd" class="text-center center-block TEXTQUANT_int" >Quantidade</label></div></div> 
 <button type="button"  id="addquant" class="btn btn-info center-block BU_ADD_CSS RETWHEN_MET <?php //echo $fotoporcoes->id.'addquant'?>" />ADICIONE +1</button><br>
 <button type="button" id="decrequant" class="btn btn-warning center-block BU_DEC_CSS RETWHEN_MET <?php //echo $fotoporcoes->id.'decrequant'?>" />RETIRAR 1</button>
  <script>$(document).ready(function(e) {  $( "<?php //echo ".".$fotoporcoes->id.'addquant'?>" ).click(function (){if(selecao == 1){
var CLASSQUANTIDADE = "<?php //echo  $fotoporcoes->id.'qtdprod' ?>";document.getElementById(CLASSQUANTIDADE).value++;}
});$( "<?php //echo ".".$fotoporcoes->id.'decrequant'?>" ).click(function (){if(selecao == 1){ var CLASSQUANTIDADE = "<?php //echo  $fotoporcoes->id.'qtdprod' ?>";
 document.getElementById(CLASSQUANTIDADE).value--;if( document.getElementById(CLASSQUANTIDADE).value < 1 )
  {  document.getElementById(CLASSQUANTIDADE).value = 1; }} });
		 }); </script></div> --> <?php //endwhile;?>
<?php require_once 'partes/FOOTER.php';?><?php
} else {  //--------------------------
		################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################ 
require_once ('partes/DESLOGADO_MENU_TOPO_FIXO.php');
?>

<!--  ORIGINAL Q TAVA 
<div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"><img id="imginicio"   class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"></div></div></div><br>

-->




<div class="container INCAA"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center INC"><img id="imginicioAAAAA" src="imagens/Foto_Inicio.jpg" class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"></div></div></div><br>


                 <div class="container" >
            <h1 style="font-size: 22px" class="facaseupedido_h1" >FONES: ????-???? / ????-???? / ????-???? / ????-???? / Whats: ????-????</h1><
            </div>


<a class="botaoh1" href="ENDERECOS/ENDERECO_PIZZARIA.php" > <h1> Veja Onde Estamos <span class="glyphicon glyphicon-map-marker"></span></h1> </a><br>

<div class="container bandeiras" ><h1 class="facaseupedido_h1" > Se Cadastre e Fa&ccedil;a seu Pedido</h1><h2 class="rapidopratico" >É Rápido e Prático</h2><div class="row"> <div class="col-xs-12 quadband" ><h3 class="cartoestipo">Cart&otilde;es de Cr&eacute;dito</h3> <img id="CARTCRED" class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"> <h3 class="cartoestipo" >D&eacute;bito em Conta</h3> <img id="CARTDEB" class="img-responsive img-rounded" alt="Imagem com Canto Arrendodado"> </div> </div></div><br><div class="container prdquetem"><div class="row"><div class="col-xs-12 itensdapagina" > <h2 class="oquetemnapagina" >Nesta P&aacute;gina:</h2><h3 class="prodquetem" > Pizzas </h3> <h3 class="prodquetem" > Esfih&otilde;es </h3><h3 class="prodquetem" > Por&ccedil;&otilde;es </h3>
 </div> </div> </div><br><?php $numeral_pizzas = 1;$numeral_pizzas_doces = 1;$numeral_esfihoes = 1;$numeral_esfihoes_doces = 1; $numeral_porcoes = 1;?>
    <br><h1 class="tipoprduto_h1" > Nossas Pizzas  </h1> <br>
 <?php while ($foto = $stmt->fetchObject()):  ?><br/><?php   //if($foto->tipogosto == 'Salgado') { //____só seleciona este tipo ?>
<div class="container produtos_DESL" ><div  class="row truta dosbotoes"> <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"><div class="thumbnail" > <div class="numeral" ><?php echo $numeral_pizzas++;  ?></div><img src="imagem.php?id=<?php echo $foto->id ?>" /><div class="caption" ><strong>Nome:</strong> <?php echo $foto->nome ?> <br/><strong>Ingredientes:</strong> <?php echo $foto->ingredientes."<br>"; ?> <strong>Preço:</strong> <strong class="preco"> <?php $valor = $foto->valor/100;  echo "R$ ".number_format($valor,2,',','.');//pad-BR ?> </strong></div></div></div></div></div> <?php  endwhile; ?><br><h1 class="tipoprduto_h1" > Pizzas Doces  </h1> <br> <?php while ($fotodoce = $stmtdoce->fetchObject()):  ?>  <br/>
<div class="container produtos_DESL" ><div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"><div class="thumbnail" ><div class="numeral" ><?php echo $numeral_pizzas_doces++; ?></div><img src="imagem.php?id=<?php echo $fotodoce->id ?>" />
<div class="caption" > <strong>Nome:</strong> <?php echo $fotodoce->nome ?> <br/><strong>Ingredientes:</strong> <?php echo $fotodoce->ingredientes."<br>"; ?>
<strong>Preço:</strong> <strong class="preco"><?php $valor = $fotodoce->valor/100; 
echo "R$ ".number_format($valor,2,',','.');//pad-BR  ?> </strong> </div></div></div></div></div> 
<?php  endwhile; ?><br><h1 class="tipoprduto_h1" > Nossas Esfihas  </h1><br><?php while ($fotoesfihoes = $stmtesfihoes->fetchObject()):  ?> <br/>
<div class="container produtos_DESL" ><div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"> <div class="thumbnail" ><div class="numeral"  ><?php echo $numeral_esfihoes++;  ?></div><img src="imagem.php?id=<?php echo $fotoesfihoes->id ?>" />
<div class="caption" >  <strong>Nome:</strong> <?php echo $fotoesfihoes->nome ?> <br/> <strong>Ingredientes:</strong> <?php echo $fotoesfihoes->ingredientes."<br>"; ?> <strong>Preço:</strong><strong class="preco"><?php $valor = $fotoesfihoes->valor/100; 
echo "R$ ".number_format($valor,2,',','.');//pad-BR ?></strong></div> <!--FIM  class caption-->
</div></div></div></div> <?php endwhile; ?> <br><h1 class="tipoprduto_h1" > Esfihas Doces </h1> <br> <?php while ($fotoesfihoesdoces = $stmtesfihoesdoce->fetchObject()):  ?> <br/><div class="container produtos_DESL" ><div  class="row truta dosbotoes"><div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info"><div class="thumbnail" > <div class="numeral" >  <?php echo $numeral_esfihoes_doces++;  ?> </div>
<img src="imagem.php?id=<?php echo $fotoesfihoesdoces->id ?>" /><div class="caption" ><strong>Nome:</strong> <?php echo $fotoesfihoesdoces->nome ?> <br/> <strong>Ingredientes:</strong> <?php echo $fotoesfihoesdoces->ingredientes."<br>"; ?><strong>Preço:</strong><strong class="preco"> <?php $valor = $fotoesfihoesdoces->valor/100; 
echo "R$ ".number_format($valor,2,',','.');//pad-BR ?>  
 </strong></div> </div> </div> </div></div> <?php endwhile; ?> <!-- <br><h1 class="tipoprduto_h1" > Nossas Porções </h1><br>
<?php //while ($fotoporcoes = $stmtporcoes->fetchObject()):  ?>
<br/><div class="container produtos_DESL" > <div  class="row truta dosbotoes">
 <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 coluna_info">
 <div class="thumbnail" ><div class="numeral" ><?php //echo $numeral_porcoes++;  ?></div><img src="imagem.php?id=<?php //echo $fotoporcoes->id ?>" /> <div class="caption" ><strong>Nome:</strong> <?php //echo $fotoporcoes->nome ?> <br/> <strong>Acompanha:</strong> <?php //echo $fotoporcoes->acompanha."<br>"; ?><strong>Preço:</strong><strong class="preco"> <?php //$valor = $fotoporcoes->valor/100; 
//echo "R$ ".number_format($valor,2,',','.');//pad-BR ?> </strong> </div> 
 </div> </div> </div> </div>  --><?php //endwhile; ?>
<?php require_once 'partes/FOOTER.php'; } //--------------------------########################################## FIM______AREA___
	//-----------------------------------------------------------------------------------------------------------------------
		?>	


<br><br><br><br>
</body>
</html>