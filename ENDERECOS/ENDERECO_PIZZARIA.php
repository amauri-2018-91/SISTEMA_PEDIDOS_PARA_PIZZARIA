




<?php


header('Content-type: text/html; charset=utf-8', true); //padrao para brasil --acentua e ÇÇ






require_once('../includes/db_connect.php');
require_once('../includes/functions.php');
 
 




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
header("Location:../includes/logout.php");




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
/*

if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) { //-------------------------------------------1---------------------------

unset($_SESSION['ultimoClick']);



$_SESSION = array();
session_destroy();
header("Location:includes/logout.php");


exit(); //------------------------------------ENTAO FIM---------desloguei usuario

}*/


//########################################################################################################## FIM CONTROLE TEMPO SESSAO INATIVA
}  //-----------------------------------------------------------------------------------
?>

</div><!-- fim DESTE CONTAINER BOOTSTRAP  -->




















<html lang="pt-br"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"> <title> Onde Estamos </title> <link href="../css/bootstrap.min.css" rel="stylesheet">
     <!-- ABAIXO PRECISA SER COMENTADO NAVEGADORES ANTIGOS 
      BOOSTRAP 3 -->
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     
   <!--  <link rel="stylesheet" href="css/         .css">-->
   
   
   <link rel="stylesheet" href="../css/editar_imagem.css"><link rel="stylesheet" href="../css/ESTILO_FONT_SIZE.css">
   
   
   
   
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
</script> 




<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #mapa {
        height: 60%;
      }
    </style>




</head>










 
    <body>
    
    





<div class="container"><div class="row">



<?php
if (login_check($mysqli) == true) { //-------------------------------------------------   ?>


<div class="col-xs-12 imgrodape text-center">
<a href="../index.php?error=1" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voltar p&aacute;gina </a>
</div></div></div><br><br>


<?php  }else{  ?>



<div class="col-xs-12 imgrodape text-center">
<a href="../index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voltar p&aacute;gina </a>
</div></div></div><br><br>


<?php  }   ?>








<h1 class="tipoprduto_h1" > Pizzaria Ana Paula Endereço:  </h1>


    
    
     <div id="mapa"></div>
     
     
    
<div class="container rodape"><div class="row"><div class="col-xs-12 col"> <p id="pizzariaanapaula">Pizzaria Ana Paula: </p><p id="telefones">FONES: ????-???? / ????-???? / ????-???? / ????-???? / Whats: ????-????  </p> <h1 class="tipoprduto_h1" >AV. ????????, NUM - ???????? - ???????????????? <span class="glyphicon glyphicon-map-marker"></span>  </h1>
  <p class="abrimosde"> De Domingo &agrave; Quinta das 18h &aacute;s 00h / De sexta e S&aacute;bado das 18h &aacute;s 01h</p> <a class="botaoh1" href="ENDERECO_desenvolvedor.php" > <h1>Site Desenvolvido Por Amauri Lima <span class="glyphicon glyphicon-map-marker"></span>  </h1> </a>
</div></div></div>









        
               <script src="../js/jquery-3.1.0.min.js"></script>

        
        <script src="mapa.js"></script>

 
 
       

<script src="../js/bootstrap.min.js"></script>
               <!-- Arquivo de inicialização do mapa -->



 <!-- Maps API Javascript -->
       <script src="https://maps.googleapis.com/maps/api/js?v=3.exp
&signed in=true&key=__SUA___CHAVE___&callback=initMap"></script>
 
        
        


        
    </body>
</html>