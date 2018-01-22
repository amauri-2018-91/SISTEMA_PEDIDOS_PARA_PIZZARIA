
<?php

class UserInfo
{
 public function getIp()
 {
 
 if ( !empty($_SERVER['REMOTE_ADDR']) )
 {
 $ip = $_SERVER['REMOTE_ADDR'];
 }
 elseif( !empty($_SERVER['HTTP_CLIENT_IP']) )
 {
 $ip = $_SERVER['HTTP_CLIENT_IP'];
 }
 elseif ( !empty($_SERVER['HTTP_X_FORWARDED_FOR']) )
 {
 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 elseif ( !empty($_SERVER['HTTP_X_FORWARDED']) )
 {
 $ip = $_SERVER['HTTP_X_FORWARDED'];
 }
 elseif ( !empty($_SERVER['HTTP_FORWARDED']) )
 {
 $ip = $_SERVER['HTTP_FORWARDED'];
 }
 elseif ( !empty($_SERVER['HTTP_X_COMING_FROM']) )
 {
 $ip = $_SERVER['HTTP_X_COMING_FROM'];
 }
 elseif ( !empty($_SERVER['HTTP_COMING_FROM']) )
 {
 $ip = $_SERVER['HTTP_COMING_FROM'];
 }
 else
 {
 $ip = NULL;
 }
 return $ip;
 }
}

 ?>





<?php
require_once 'psl-config.php';
require_once 'PassHash.php';

header('Content-type: text/html; charset=utf-8', true); //padrao para brasil --acentua e ÇÇ

function sec_session_start() {

	
	//########## PRIMER DEVE DEFINIR OS PARAMETROS --- ANTES DE INICIAR   session_start();
	//      NUNCA DEFINA 1 TRUE PARA INICIAR AUTOMATICO ---NO ---PHP.INI--------------PORQUE  PRIMEIRO DEVE DEFINIR PARAMETROS 
	
	//VEJA EXEMPLO ABAIXO
	
	 

	
	 ini_set('session.name','???????____DEFENI__AQUI??????');  //padrao nome no server

   $session_name = 'sess';   // Set a custom session name
    $secure = false;  //DEFIN DEVE SER TRUE
    // This stops JavaScript being able to access the session id.
    $httponly = true; //DEFIN DEVE SER TRUE
	

    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) { //________________________________________
        header("Location: ../?????.php?__VC_DEFENI_=Could not initiate a safe session (ini_set)");
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


	
}    //________________________________________________________________FIM_____________________FUNCTION_____sec_session_start


















function login($c, $password, $mysqli) { //__________________________LOGIN____________LOGIN__________________LOGIN_______________________________
   
   
   
$info = new UserInfo;  // no FUNCTION.PHP______OBTER ENDER IP
//echo $ip = $info->getIp();  //teste IP__ECHO
$ip = $info->getIp();





 //ipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipip

 // Checar se a string segue o padrao
if (preg_match('/^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/', $c)) {
	//echo "__cpf OK";  //TESTES
	
	
} else {
    // A string nao eh uma
	
		//echo "__cpf  FALSE";  //TESTES

}






 // Checar se a string segue o padrao
if (preg_match('/(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/', $password)) {

	//echo "_PASSWORD_ OK";  //TESTES
	
	
} else {

		//echo "_PASSWORD_  FALSE";//TESTES

}

	//******************************************************



 	$cpf  = preg_replace("/[^0-9\/x\X\s]/", "", $c); // DEIXAR LETRAS   XX -- xx ---e NUMBERS ONLY



	
		
		//##########################################################################################
			//#################### prepare busca_____para COMPARAR hashs____USANDO this


			$sql = "SELECT c, password, username, endereco FROM members"; //query
			$stmt = $mysqli->prepare($sql); //contra injection SQL -- prepare
  
  
  if($stmt){  //procede ?
	  
	      $stmt->execute();

$stmt->bind_result($trouxec, $trouxepass, $trouxename, $trouxeender );  //trazer resultados e colocar em forma de VARIAVEL___sequencia primeiro select QUERy e a prime var,,,



while ($stmt->fetch()) { //busca todos correspondentes

  //AQUI ta DENTRO DO WHILE ainda
  
  //if ($hash->hash==crypt($password, $hash->hash)) {   ----------------------------
    if (PassHash::check_password( $cpf, $trouxec)) {    //ja tem 
		  

	 //if ($hash->hash==crypt($password, $hash->hash)) {   ----------------------------
    if (PassHash::check_password( $password, $trouxepass)) {    //ja tem 
		  

	//__________________________________________________________
	//_________________________________________________________
	 if($cpf == '__???__DEFENIA__AQUI___CPF___TESTE____?????'){      // ALEM DE ENTRAR____SOMENTE___NESTE___IP____SO VAI ENTRAR COMO ESTE CLIENTE___PIZZARIAANAPAULA NO BD*************

	// Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
					
					
                    // XSS protection as we might print this value
					//preg_replace = PARA EXPRESSOES REGULARES--regras
                    $user= preg_replace("/[^0-9]+/", "", $trouxename);
					

						$_SESSION['adm'] = array(); //cria info adm
                        $_SESSION['adm']['logado']  = hash('sha512', $trouxename.$trouxeender.$password.$user_browser);  //PRINCIPAL session
                    // Login successful.
					



	 } //  FIM VERFICAR______IF_____cpf_______________________________************************
        //_____________________________________________________________
		//_____________________________________________________________



					
	     break; //pararr VERIFICAÇAO se JA ACHOU
              //exit();
	         // echo "___JA TEM ESTA CPF";  //testes

  }else {  //______________________________________  ainda nao tem
           //echo "____- PASS nao EXISTE !"; //testes

     }  ///FIM PASS VERIFY                           --------------------------------
	
  }else {  //______________________________________  ainda nao tem
     // echo "____- c nao EXISTE !"; //testes

     }  ///FIM PASS VERIFY                           --------------------------------


}  //FIM WHILE

            // close statement 
            $stmt->close();
	
  }  //FIM STMT
	//############################################   EM USOOOO
	//####################################################################################


 // } //  FIM VERIFICA IP
   //ipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipip


}  ////________________________________________________________________________________________________FIM DA FUNCTION_______LOGIN____________






function login_check($mysqli) {
	
	 //ipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipipip

$info = new UserInfo;  // no FUNCTION.PHP______OBTER ENDER IP
$ip = $info->getIp();

	
	
    if (isset($_SESSION['adm']['logado']// ) &&  //, //ver se EXISTE SESSOES //______________________1_____________________________________________________________

						
						) ) /*&& $ip == '???????????' )  */     {       //colocar ip pizzaria
							

							return true;
							
						}else{
							
							
							return false;
							
							
    }  //fim EXISTE SESSOES //______________________1_____________________________________________________________FIM_____1____
							
							
																			//   echo "__## login___checka___REALMMM exisr___";


 exit;
 

		
  //  }  //fim EXISTE SESSOES //______________________1_____________________________________________________________FIM_____1____

	
}











function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}























