

<?php

require_once ('this_start_Session.php');


		// inclua a classe
//require_once ("includes/PassHash.php");





header('Content-type: text/html; charset=utf-8', true); //padrao brasil --acentua e ÇÇ




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
sec_session_start(); //start____NO THIS.start_sESSION.PHP


?>








 <div  class="container">
 <?php
 
	
	
	
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

//echo $tempoAtual - $_SESSION['ultimoClick']."  -----   olha hora REGIST  <br>";

}//-----------------------------------------------------------------------------------------------------------------FIM----2

}else{//--------------------ELSE 1

$_SESSION['ultimoClick'] = time();
//echo $_SESSION['ultimoClick']."     =====ultimo clique dois <br>";

}//------------------------------------------------------------------------------FIM 1------------------------------------------------------------------


//########################################################################################################## FIM CONTROLE TEMPO SESSAO INATIVA
	

	
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


	/*
	
	
}  //-----------------------------------------------------------------------------------

*/









//############################################################ PROTEGED content register.page___________SESSAO VIGIAR
if (isset($_SESSION['ultimoClick'])){  



require_once ('../includes/register.inc.php'); //CHAMAR QUANDO TIVER SESSAO___


?>

</div><!-- fim DESTE CONTAINER BOOTSTRAP  -->
<html lang="pt-br"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"> <title> Se cadastre </title> <link href="../css/bootstrap.min.css" rel="stylesheet">
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
</script> </head><body> <?php
		
        if (!empty($error_msg)) { ?>
                <div class="container">
                 <h3 style="background-color:#FFC; color:#F00"> <?php echo $error_msg; ?> </h3>
                </div>
       <?php  }    ?> <div id="myModal" class="modal fade"><div class="modal-dialog"><div class="modal-content"> <div class="modal-body" id="MENSAERRO">
 <button type="button" class="close" data-dismiss="modal">&times;</button></div><div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-primary">Entendi</button></div></div></div></div><div class="container"> <h1>Cadastre-se</h1><div class="row"><div class="col-xs-12"> <div style="background-color: pink;"> <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form" role="form">
<fieldset> <style>  .legendtitulos{font-weight:800; color:#364865; background-color:#C96; }   .form_subtitulos{font-weight:800; color:#364865; background-color:#FCF; } .enfaseinfo{ font-weight:700; text-decoration:underline}  </style> <legend class="legendtitulos" >Endere&ccedil;o</legend>
<br><span class="enfaseinfo">Aten&ccedil;&atilde;o: o endere&ccedil;o digitado aqui ser&aacute; o mesmo da entrega </span> <br><span class="enfaseinfo">Aten&ccedil;&atilde;o: os campos com ** são obrigatórios</span><br><br><br><label class="form_subtitulos" for="endereco">Endere&ccedil;o: **</label><br><input name="endereco" class="form-control" id="endereco" size="50" maxlength="50" placeholder="Digite e clique no seu endereço" autocomplete="off"/> <br>
<div class="row"><div class="col-xs-6"><label class="form_subtitulos" for="cep">CEP: **</label>    <input name="cep" class="form-control" id="cep" size maxlength="9" placeholder="Ex: 08473-420 " autocomplete="off" /><label class="form_subtitulos" for="num">N&deg;: **</label>    <input name="num" class="form-control" id="num" size maxlength="6" placeholder="Ex: 45 " autocomplete="off" /></div><div class="col-xs-6"><label class="form_subtitulos" for="compl">Complemento:</label>    <input name="compl" class="form-control" id="compl" size="30" maxlength="30" placeholder="Ex: casa B / ap 3 - bloco 12" autocomplete="off" />
</div></div><br><label class="form_subtitulos" for="infoprox">Fica pr&oacute;ximo &agrave;:</label>  <input name="infoprox" class="form-control" id="infoprox" size="40" maxlength="40" placeholder="Ex: Perto do Posto UBS" autocomplete="off" /> </fieldset><br><br><fieldset><legend class="legendtitulos">Dados Pessoais</legend>
<label class="form_subtitulos" for="username">Nome: **</label>  <input name="username" class="form-control" id="username" size="20" maxlength="20" placeholder="Ex: Luciana -- Máx: 20 letras " autocomplete="off" /> <br><li>O nome e sobrenome do usu&aacute;rio devem conter <span class="enfaseinfo">apenas letras</span></li>
<br><label class="form_subtitulos" for="usernamesobre">Sobrenome: **</label>  <input name="usernamesobre" class="form-control" id="usernamesobre" size="20" maxlength="20" placeholder="Ex: Oliveira -- Máx: 20 letras " autocomplete="off" /> <br><br><p>Digite seu <span class="enfaseinfo">CPF </span>Somente com n&uacute;meros ou (n&uacute;meros com pontos e h&iacute;fen)</p><label class="form_subtitulos" for="cpf">Seu CPF: **</label>  <input name="cpf" class="form-control" id="cpf" size="11" maxlength="14" placeholder="cpf" autocomplete="off" /> <br><label class="form_subtitulos" for="confc">Confirme Seu CPF: **</label>  <input name="confc" class="form-control" id="confc" size="11" maxlength="14" placeholder="confirmar cpf" autocomplete="off" /> <br>
<br><label class="form_subtitulos" for="email">Seu email: **</label>  <input name="email" class="form-control" id="email" size="40" maxlength="40" placeholder="email" autocomplete="off" /> <br><br><label class="form_subtitulos" for="password">Escolha sua senha: **</label>  <input name="password" class="form-control" id="password" size="12" maxlength="12" placeholder="Sua senha" autocomplete="off" /> <br>
 <li style="background-color:#C96"><div style="background-color:#CF0; font-weight:600"> As senhas devem conter:</div><ul><li>Pelo menos <span class="enfaseinfo">uma letra mai&uacute;scula</span> ( A..Z )</li> <li>Pelo menos  <span class="enfaseinfo">uma letra min&uacute;scula </span>(a..z)</li><li>Pelo menos  <span class="enfaseinfo">dois n&uacute;meros </span>( 0..9 )</li> <li>Pelo menos  <span class="enfaseinfo">dois caracteres especiais </span> <div style="background-color:#0FF; min-width:5%"><span style="background-color:#CF0; font-weight:600">Exemplos caracteres especiais: </span> &nbsp; &nbsp; &nbsp; ! @ # $ % * () _ + ^ &  </div></li></ul></li><label class="form_subtitulos" for="confirmpwd">Confirme a senha: **</label>  <input name="confirmpwd" class="form-control" id="confirmpwd" size="12" maxlength="12" placeholder="Confirme a senha" autocomplete="off" /> <br><label class="form_subtitulos" for="tel">Tel ou Cel: **</label>    <input name="tel" class="form-control" id="tel" maxlength="15" placeholder="EX: (11) 98888-7777 " autocomplete="off" /> </fieldset> <span id="info_anote_senha" style="background-color:#FF3; font-weight:900; text-transform:uppercase" >Aten&ccedil;&atilde;o: Antes de confirmar seu cadastro Anote sua senha e guarde, voc&ecirc; sempre precisar&aacute; dela para comprar nossas pizzas, esfihas e outros </span> <br> <div class="row"><div class="col-xs-4 text-center"> <input id="anotei" type="button" class="btn bg-info center-block" value="OK, ja anotei minha senha"  onclick="return LIBERAR_button_submit();"/></div> <br><br><div class="col-xs-6 text-xs-center"><input id="MECADASTRAR" class="btn bg-success center-block" type="button"  value="Me cadastre" onClick="return regformhash(this.form, this.form.endereco,this.form.cep, this.form.num, this.form.compl,this.form.infoprox,this.form.username,this.form.usernamesobre,this.form.cpf, this.form.confc, this.form.email,this.form.password,this.form.confirmpwd, this.form.tel, getlat,   getlong,Notcadastro);" /> </div> <br><br>    
                              <div class="col-xs-6 text-xs-center"><a href="../index.php"> <input id="VOLTAR" type="button" class="btn btn-deep-purple center-block" value="RETORNAR À PÁGINA PRINCIPAL" /></a> </div></div><br><br><br><br><br><br><br></form></div></div></div></div><script charset="utf-8" type="text/JavaScript" src="../js/forms.js"></script> <script src="../js/jquery-3.1.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script><script src="https://maps.googleapis.com/maps/api/js?v=3.exp
&signed in=true&key=______SUA___CHAVE______&libraries=places"></script><script src="registermapa.js"></script>
<script  charset="utf-8" type="text/javascript" src="Form_enquanto_digitar.js"></script>
<?php } // FIM DENTRO DA SES --- IMPORTANTE ?>
     
     
     
     
     
     
     
     
     
     

        
        
        
    </body>
</html>