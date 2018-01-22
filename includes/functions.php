<?php
require_once 'psl-config.php';

require_once 'PassHash.php';

 
 header('Content-type: text/html; charset=utf-8', true); //padrao brasil --acentua e ÇÇ














function sec_session_start() {

 



	
	//########## PRIMER DEVE DEFINIR OS PARAMETROS --- ANTES DE INICIAR   session_start();
	//      NUNCA DEFINA 1 TRUE PARA INICIAR AUTOMATICO ---NO ---PHP.INI--------------PORQUE  PRIMEIRO DEVE DEFINIR PARAMETROS 
	
	//VEJA EXEMPLO ABAIXO
	
	
	 ini_set('session.name','sess');  //padrao nome no SERVIDOR

   $session_name = 'sess';   // Set a custom session name
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
	
	
	
	//--------------------------------------------------------------------------
	$pagina = end(explode("/", $_SERVER['PHP_SELF']));  //PEGAR NOME PAGE ATUAL ---end pega o ultimo elemento do caminho EX (pasta/ COCA.php)____ai pega COCA.php
	
	
	if($pagina === 'obrigado_pela_compra.php'){
		
		    session_regenerate_id(false);    //FALSE___ AQUI NESTA PAGE DA ERRO_______DEIXA REGENERATE como FALSE___pois VEIO REDIRECIONADO DA BUY PAGAMENTO 

	}else{ //PARA TODAS AS OUTRAS PAGINAS... TRUE
	
	    session_regenerate_id(true);    // regenerated the session, delete the old one. 

	}
	//--------------------------------
	
	
	
	
}    //________________________________________________________________FIM_____________________FUNCTION_____sec_session_start
















function login($c, $password, $mysqli) { //__________________________LOGIN____________LOGIN__________________LOGIN_______________________________
   
   
   





 // Checar se a string segue o padrao
if (preg_match('/^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/', $c)) {
	//echo "__cpf OK";  //TESTES
	
	
} else {

		//echo "__cpf  FALSE";  //TESTES

}






 // Checar se a string segue o padrao
if (preg_match('/(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/', $password)) {
	//echo "_PASSWORD_ OK";  //TESTES
	
	
} else {

		//echo "_PASSWORD_  FALSE";//TESTES

}











 	$cpf  = preg_replace("/[^0-9\/x\X\s]/", "", $c); // DEIXAR LETRAS   XX -- xx ---e NUMBERS ONLY





     //print_r($_SESSION);



			

	
		
		//##########################################################################################
			//#################### prepare busca_____para COMPARAR hashs____USANDO this
		
			                            //  $cv = '1';   //SE FOR COMPARAR EXE prepare bind
		                               // $passw = 'as'; //SE FOR COMPARAR EXE prepare bind

			$sql = "SELECT c, password, username, sobrenome, endereco, cep, num, compl, proximo,  email, telcontato FROM members"; //query
			$stmt = $mysqli->prepare($sql); //contra injection SQL -- prepare
  
  
  if($stmt){  //procede ?
	  
	      $stmt->execute();
		  
                                        // bind variables to prepared statement --- SE FOR COMPARAR PRA ACHAR
                                        //  $stmt->bind_result($cv, $passw);

                                         // echo "___BIND____";

$stmt->bind_result($trouxec, $trouxepass, $trouxename, $trouxesobreno, $trouxeender, $CEP, $num, $compl, $ficaproximo, $email, $tel_ou_cel );  //trazer resultados e colocar em forma de VARIAVEL___sequencia primeiro select QUERy e a prime var,,,




while ($stmt->fetch()) { //busca todos correspondentes
  
  
  
  
  
  
  
  //AQUI ta DENTRO DO WHILE ainda
  
  //if ($hash->hash==crypt($password, $hash->hash)) {   ----------------------------
    if (PassHash::check_password( $cpf, $trouxec)) {    //ja tem 
		  
		  	  //return "YES";
            

		       //echo 'CONFERIDO C___'; //IMPORTANTE ERRO MSG E Q ESBARRA
				
               
					
					
	           //break; //pararr VERIFICAÇAO se JA ACHOU

                 //exit();
	             // echo "___JA TEM ESTA CPF";  //testes
	 
       
	   
	   
	   
	    
	 //if ($hash->hash==crypt($password, $hash->hash)) {   ----------------------------
    if (PassHash::check_password( $password, $trouxepass)) {    //ja tem 
		  
		  	  //return "YES";
            
			  
		        // echo 'CONFERIDO PASS'; //IMPORTANTE ERRO MSG E Q ESBARRA
 
 
 
 
 
 
 
 
 //__________________________________________________________
	//_________________________________________________________
	 if($cpf !== '????????????'){      // SOMENTE__VAI ENTRARse nao FOR ESTE CLIENTE___PIZZARIA NO BD*************
	
	
	
 
					
	
	
	// Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
					
					
					
					
                    // XSS protection as we might print this value
					
					
					//preg_replace = PARA EXPRESSOES REGULARES--regras
                    $user= preg_replace("/[^0-9]+/", "", $trouxename);
				    $usersobreno = preg_replace("/[^0-9]+/", "", $trouxesobreno );

					
					
                   // $_SESSION['logado'] = $user_id;
			        //$_SESSION['username'] = $username;
					

						 //$IDENTIF_PROD = $SBCSuniquid;





					 				$_SESSION['clie'] = array(); //cria info cli




					// echo "____USER ===".$trouxename;
					
                    $_SESSION['clie']['logado'] = hash('sha512', $trouxename.$trouxeender.$password.$user_browser);  //PRINCIPAL session
                    // Login successful.
					
					
					
					// store current timestamp in session 
$_SESSION['creation_time'] = time(); //aqui naao dentro de cli
				
                //   return true; // AQUI POSSIBILITA VAI PRA OUTRA PAG PROTEGGG
					


												 $_SESSION['clie']['nomeuser'] = $trouxename;
												 $_SESSION['clie']['sobrenouser'] = $trouxesobreno;









                   
                     //----------- explode adrees
                     $array = explode('-', $trouxeender);
                                //echo "ender   ".$array[0];
                          						
										
											 $_SESSION['clie']['endereco'] =$array[0];
												
												 $_SESSION['clie']['cep'] =$CEP;
												
												
												 //print_r($_SESSION['clie']);//testes
												
												
												 $array = explode(',', $array[1]);
												 
												 $_SESSION['clie']['bairro'] =$array[0];
												 
												 $_SESSION['clie']['cidade'] =$array[1];

												 //----
												 
												 $_SESSION['clie']['num'] =$num;
												 $_SESSION['clie']['compl'] =$compl;

												 

												 //echo "bairro   ".$array[0];
												// echo "cidade   ".$array[1];
												// exit;//testes
                                   //------------
								   
								   
								   
								   			     $_SESSION['clie']['email'] =$email;
                                                 $_SESSION['clie']['tel/cel'] =$tel_ou_cel;

								   
								   
								      $_SESSION['clie']['ficaproximo'] = $ficaproximo;
								   

			 	 } //  FIM VERFICAR______IF_____cpf_diferente DE PIZZARIA______________________________************************
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
		




}  ////________________________________________________________________________________________________FIM DA FUNCTION_______LOGIN____________
















/*

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
 
 //TEST+++++++++  ____15____ TENTATIVAS BLOQUEIA_____mudar pra menas depois
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 15) {
            return true;
        } else {
            return false;
        }
    }
}


*/
















function login_check($mysqli) {
	



    // Check if all session variables are set 
	
	
    if (isset($_SESSION['clie']['logado'] , //ver se EXISTE SESSOES //______________________1_____________________________________________________________
                     
						
						
							
// store current timestamp in session 
$_SESSION['creation_time']
						
						))       {
							
							return true;
							
						}else{
							
							
							return false;
							
							
    }  //fim EXISTE SESSOES //______________________1_____________________________________________________________FIM_____1____
							
							
																			//   echo "__## login___checka___REALMMM exisr___";

    	


   
 
 
 
 
 
 exit;
 

	
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























