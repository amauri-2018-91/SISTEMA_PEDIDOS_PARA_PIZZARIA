<?php
require_once('includes/db_connect.php');
require_once('includes/functions.php');
 
 
 header("Content-Type: text/html; charset=utf-8", true);  //padrao brasil --acentua e ÇÇ

 
 
 


 //include_once('app/PEDIDOS_DB.php'); //ADDDDD ESTE______TESTE MOSTRAR PEDIDOS   DEZEM 2016

 // include_once('app/TELA_PEDIDOS.php'); //ADDDDD ESTE______TESTE MOSTRAR PEDIDOS   DEZEM 2016



/*
$class = "PEDIDOS_DB";

function __autoload($class)
        {
   
        require_once("app/".$class.".class.php");
    
        }
*/






 
 
 //                                          CONTROLE TEMPPO DE SESSAO INATIVA
 // DEVE SE COLOCADO ANTES DE INICIAR START
 //###################################### TEMPO DE VIDA SESSAO
                                        // EXPIRACAO CACHE
										// RECOL LIXO NA PASTA DIREORIO------SAIBA MAIS EM PHP.INI
   
define('TEMPOEX', 60*60*9); //tempo de expiração da sessão em minutos* SEGUNDOS______60 x 60 === 1 HORA x 9  === (___9 nove horas) 


//todas as páginas que quiser um lifetime para a sessão
ini_set('session.gc_probability', 100);
ini_set('session.gc_maxlifetime', TEMPOEX);
ini_set('session.cookie_lifetime', TEMPOEX);
ini_set('session.cache_expire', TEMPOEX);


//echo ini_get("session.gc_maxlifetime"); //testes

//$$$$$$$$#####################################################################

 
 
 
// echo $_SERVER['REMOTE_ADDR'];//TESTE GET ID PC
 

 
 
 //ISTO ANTES DO START IRA ----- LIMPAR O CACHE----QUANDO CLIENTE FECHAR O NAVEGADOR-----ASSIM EL TERA Q FAZER LOGIN NOVAMENTE-----SEGURO
   session_set_cookie_params(0);
 //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
 
 
 
 
 
 
 
 //_________________________________________________________________________________________
 
 
//***************** AQUI NAO CHAMA  ___FUNCTION____sec_session_start()  ____PORQUE NAO DAVA TEMPO DE LER ISTO LA E ESCRIPT JA DAVA COMO DESLOGADO 
//********** GARANTIDO PARA NAO CORRE RISCO DE DA DESLOGADO________FAZER O sec_session_start AQUI MESMO...



//sec_session_start(); //start____NO FUNCTION.PHP





	
	 ini_set('session.name','???????');  //padrao nome no SERVIDOR

   $session_name = '???????';   // Set a custom session name
    $secure = false;  //DEFIN DEVE SER TRUE
    // This stops JavaScript being able to access the session id.
    $httponly = true; //DEFIN DEVE SER TRUE
	
	
	
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) { //________________________________________
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }//_____________________________________________________________________________________________
	

	
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
	
	
	//INICIAR
    session_start();            // Start the PHP session 
	
	
	 session_regenerate_id(TRUE);    // regenerated the session, delete the old one. 
	 
	 

//_________________________________________________________________________________________________________________________
//_________________________________________________________________________________________________________________________









?>






 <?php
 //###############################################################################       SE LOGIN FOR TRUE_______TODO CONTEUDO do USUARIO PRIVILEGIADO AQUI DENTRO
	
	
 /*
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

if ( ($tempoAtual - $_SESSION['ultimoClick']) > '6666666' ) {//------------------------------------------2---------------






unset($_SESSION['ultimoClick']);






$_SESSION = array();
session_destroy();
header("Location:includes/logout.php");




exit(); //------------------------------------ENTAO FIM---------desloguei usuario






}else{//-----------------------------------------------------ELSE-----------2--------------------------------------

$_SESSION['ultimoClick'] = time();
echo $_SESSION['ultimoClick']."     =====ultimo clique um <br>";

echo $tempoAtual - $_SESSION['ultimoClick']."  -----   olha hora <br>";

}//-----------------------------------------------------------------------------------------------------------------FIM----2

}else{//--------------------ELSE 1

$_SESSION['ultimoClick'] = time();
echo $_SESSION['ultimoClick']."     =====ultimo clique dois <br>";

}//------------------------------------------------------------------------------FIM 1------------------------------------------------------------------


//########################################################################################################## FIM CONTROLE TEMPO SESSAO INATIVA
	
	
	
	
	
	
	
	
	
	
	
	
} else {
    $logged = 'out';
	
	
	
	
	*/
	
	
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


        //     }  //-----------------------------------------------------------------------------------
?>





 
    
 
<?php
        


        if (login_check($mysqli) == true) { 
		
		
		//-----------------------------------------------------------------------------------################################################################################################################################################################################################################################################################################################################################################################################################################
			
			
			?>
            
            
            
<html lang="pt-br">
  <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- ABAIXO PRECISA SER COMENTADO NAVEGADORES ANTIGOS BOOSTRAP 3 -->
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/editar_imagem.css">
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
</script>

    
    </head><body><script src="js/jquery-3.1.0.min.js"></script><script src="js/bootstrap.min.js"></script>
    
    

<script contentType:"application/x-javascript; charset=utf-8"
type="text/javascript" charset="utf-8" src="statics/js/functions.js"></script> 
    					   	 <script src="ajax.js"></script>  
                             
                             
    
    
    <?php
			
			
			

 require_once ('partes/ADMIN_MENU_TOPO_FIXO_LOGADO.php');
    
  ?>
  

            <title>Pizzaria Ana Paula</title>
    
<!--     -->


<script charset="utf-8" type="text/javascript">$(document).ready(function(e) {$( "#addquant" ).click(function (){document.getElementById("qtdprod").value++;}); $( "#decrequant" ).click(function (){document.getElementById("qtdprod").value--;if( document.getElementById("qtdprod").value < 1 ){ document.getElementById("qtdprod").value = 1; }
});
		
  // alert( $(window).height());   // returns height of browser viewport
 // alert( $(document).height()); // returns height of HTML document
 //alert( $(window).width());   // returns width of browser viewport
// alert( $(document).width()); // returns width of HTML document

 }); </script><br><br><br><br><br>
 
 
 
 
 
 <style>
     input[name="modo"] {
	 height:26px;width:26px;vertical-align:central;}
	 body{min-height:150%;background-color:#F7DBEF;}
</style>



<div class="container" style="background-color:#E2E0C0; position:relative; top:30%; min-height:20%; width:100%; ">





<div class="row" >

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  colunaicone_pizza" ><img class="img-responsive "src="../imagens/vetor__pizza/pizza_completa_icone.png" width="100" height="100" /></div>
 <div class="col-xs-12 col-sm-3  col-md-3 col-lg-3" class="INTEIROdiv" id="divinteiro" style="text-align:center; font-size:18px; font-weight:700; vertical-align:central">
<input type="radio" name="modo" id="INTEIRO" value="prodINTEIRO"> PRODUTOS INTEIROS </div>

 <div class="col-xs-12 col-sm-3  col-md-3 col-lg-3 MEIA colunaicone_pizza" >
 <img class="img-responsive" src="../imagens/vetor__pizza/pizza_metade_icone.png" width="100" height="100"  />  </div>
 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 "  class="MEIAdiv" id="divmeia" style="text-align:center; font-size:18px; font-weight:700; vertical-align:central"><input type="radio" name="modo" id="MEIA" value="meia"> Pizza MEIA MEIA </div>
 
 </div> <br><br> 
  
  
 
 
 <style> #addquant, #decrequant{font-weight:800; font-size:17px;text-align:center;}</style>
 
 
 
 
 
 <div class="row" >
 
 <div class="col-xs-12 col-sm-2  col-md-2 col-lg-2 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 "><button type="button"  id="addquant" class="btn btn-info" />ADICIONE +1</button></div> 
 <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  col-sm-offset-1" >  <input type="number" id="qtdprod" name='qtd' value='1'  min="1"  max="200" style="height:40px; color:#000; background-color:#FC0;font-weight:800; font-size:35px; text-align:center" /> </div> 
 <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  col-sm-offset-1" ><button type="button"  id="decrequant" class="btn btn-warning" />RETIRAR 1</button> </div> 
 
 </div> <br><br>
 



 
 <div class="row">
 
  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  col-sm-offset-1 col-md-offset-1 col-lg-offset-1" id="buscador"><input type="search" name="autocomplete" id="aut" class="form-control" placeholder="Digite aqui o Produto" style="height:40px; color:#000; background-color:#FDFAC1;font-weight:800; font-size:27px; font-family:'Lucida Console', Monaco, monospace" /> </div> 
  <!-- button fora da DIv mesm___mas dentro da row -->
  <button type="button" id="CLOSEDLIST"> X </button>
  </div> 
 
 
 <style>
 #CLOSEDLIST{
	 background-color:#F00; color:#FFF;
 }
 
 
 </style>
 
 
 
 
 
 
 
 
 
 
 
 
 
 <div class="row" >
 <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8  col-sm-offset-1 col-md-offset-1 col-lg-offset-1" id="busqueda"> </div>
 </div>   <br><br>
 
 
 
 
 <style>
 
 .row > #busqueda {
	 border:4px thin #333; color:#000;
 }
 
 
.list-group-item :nth-child(2n) { background-color:#CCC; fcolor:#000; font-size:22px; font-weight:500; }
.list-group-item :nth-child(2n+1) { background-color:#FFF; color:#000; font-size:22px; font-weight:500; }

 
 
 
 
 
 
 </style>
 
 
 
 
 
 
 
  <!--background-color:yellow;  -->
  <!--background-color:pink;  -->

 <div class="row" style="position:relative;  width:100%; left:0%; margin-bottom:25px; display:table">
  <div style="position:relative" class="col-xs-12 col-sm-8 col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1" >   <?PHP require_once ('partes/TABLE.php'); 
  
  
   ?> </div> 
 </div> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <h1 style="position:relative; background-color:#333; left:-10%; font-size:24px; font-weight:900; color:orange; margin-bottom:25px" > PEDIDOS DE HOJE </h1>
 
 
 
 
 
 
 
 
 
 
 
 <!--background-color:yellow;  -->
 
 <div class="row" style="position:relative;  left:0%; width:100%; margin-bottom:85px; display:table; text-align:center">
 
  <!--background-color:pink;  -->

  <div style="position:relative; width:100%; text-align:center" class="col-xs-12 col-sm-12 col-lg-12 col-md-12" id="TABLE_PED_AQUI" >   
  
  
  
 
  </div> <!-- FIM COL  -->

  </div> <!-- FIM ROW  -->

 
 
 
 
 
 
  <h1 id="RODAPE_PED_DE_HOJE"></h1>
 
  <br><br><br><br><br><br><br>
 
 
 

  
  
  
  
  <?PHP //  require_once ('partes/TABLE__PEDIDOS.php');  
  		 //require_once ('app/instancias/REQUISI_PEDIDOS.php');
		 
		 
		 
		 		//print_r($_SESSION);  //testes

  ?> 
  
  

 
 
 
 
 
 
 
 
 
 
 
 </div> <!-- FIM CONTAINER  -->












      
    </body>
</html>   





<?php






			
        } else {  //--------------------------
		################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################
		
	    ?>
        
        
        
<html lang="pt-br">
  <head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- ABAIXO PRECISA SER COMENTADO NAVEGADORES ANTIGOS BOOSTRAP 3 -->
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/editar_imagem.css">
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
</script>

    
    </head><body><script src="js/jquery-3.1.0.min.js"></script><script src="js/bootstrap.min.js"></script>
    
    
    
    
    <?php  
	
	
	
$info = new UserInfo;  // no FUNCTION.PHP______OBTER ENDER IP
//echo $ip = $info->getIp();  //teste IP__ECHO
$ipver = $info->getIp();


//echo '<h1>'.$_SERVER['REMOTE_ADDR'].'<h1>';





  // if($ipver == '????????????'){   //colocar ip piz
	
	require_once ('partes/DESLOGADO_MENU_TOPO_FIXO_ADMIN.php');  
	
  // }
   
	 ?>
    
    
    
    
    
    
    
    
         <title>Login Funcion&aacute;rios</title>
         
         
         
         
         <div class="container">
         
         
         <div class="row" style="position:relative">
         
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         
         
         
         
         
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 imgrodape" style="position:relative; left:30%; top:70%">
         
         
         
         
         
         
   <img id="" src="image/wallpaperfx-3d-bluefx-desktop-monitor.ico" class="img-responsive text-center">
                 
                 
                 
                 
                 
                     </div>
                         </div> <!--- FIM ROW  -->
                      
                       </div><!--- FIM CONTAINER  -->
                       
                       
                       
         
    </body>
</html>             
    
 <?php   
                      
 } //--------------------------########################################## FIM______AREA
				
				
			//-----------------------------------------------------------------------------------------------------------------------
?>      


         



