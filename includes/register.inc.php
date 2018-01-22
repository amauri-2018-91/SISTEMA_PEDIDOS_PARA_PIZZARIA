<?php

header('Content-type: text/html; charset=utf-8'); //padrao brasil --acentua e ÇÇ


//############################################################################################################################################################################################### SE ESTA SCRIPT TA SENDO CHAMADO APOS A CRIAR SESSAO LA NO REGISTER.PHP____ENTAO AQUI ESTA DENTRO DA ____SESSAO ___JÁ



include_once 'db_connect.php';
include_once 'psl-config.php';



// inclua a classe
require ("PassHash.php"); //########################################  DEIXAR DESATIVADO SOMENTE SE USAR SESSION NO REGISTER__POIS JA TA SENDO CHAM EM OTHER




$error_msg = "";
 
  
  

 
 
 
 
 //OBRIGATORIOS
 
if (isset($_POST['endereco'], $_POST['cep'], $_POST['num'], $_POST['username'], $_POST['usernamesobre'],  $_POST['email'], $_POST['cpf'], $_POST['confc'], $_POST['password'], $_POST['confirmpwd'],  $_POST['tel'], $_POST['latcriadaclie'], $_POST['longcriadaclie'], $_POST['Notcadcriad'] ))  {
	
	
	
	
	
	
  
  
  
	
    // Sanitize (limpeza) and validate the data passed in
	
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
	
	     $CEP = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);




    $num = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_NUMBER_INT);
	    
		
			$compl = filter_input(INPUT_POST, 'compl', FILTER_SANITIZE_STRING);

        $infoprox = filter_input(INPUT_POST, 'infoprox', FILTER_SANITIZE_STRING);
		
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	    $sobrenome = filter_input(INPUT_POST, 'usernamesobre', FILTER_SANITIZE_STRING);
		
		
     $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	 $confc = filter_input(INPUT_POST, 'confc', FILTER_SANITIZE_STRING);
	
	
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	    $confirmpwd = filter_input(INPUT_POST, 'confirmpwd', FILTER_SANITIZE_STRING);
	
	
	
		     $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);

	
	//--------------localiz___NAO PRECISA REGEX
	
	$latituclient = filter_input(INPUT_POST, 'latcriadaclie', FILTER_SANITIZE_STRING); //string porque tem num negativos (-) e traço 777 -9000
	$longitclient = filter_input(INPUT_POST, 'longcriadaclie', FILTER_SANITIZE_STRING);
    $NaoFazercadastro = filter_input(INPUT_POST, 'Notcadcriad', FILTER_SANITIZE_STRING); //bool false true
	
	
	//---------------------------------------------
	
	
	
	  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	
   /*
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
	
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
		
        $error_msg .= '<p class="error">Seu Endereço de e-mail não é válido</p>';
    }
	*/
	
	
	
	
   
   
   
   
   
   
   
   
   
   
   //#######################################
   //################ EXPRESSOES REGULARES_____VERIFY === JAVASCRIPT
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ \.\-\,]+$/', $endereco)) {
    
	//echo "ENDER OK";  //TESTES
	
} else {

		// echo "ENDER FALSE";  //TESTES

}






 // Checar se a string segue o padrao
if (preg_match('/^[0-9]{5}-[0-9]{3}$/', $CEP)) {
    
	//echo "ENDER OK";  //TESTES
	
} else {

		// echo "ENDER FALSE";  //TESTES

}






   
   
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9.]+$/', $num)) {
	//echo "numero OK"; //TESTES
	
	
} else {

		// echo "numero FALSE"; //TESTES

}
   
   
   
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ \.\-\ ]+$/', $compl)) {
	//echo "compl OK";  //TESTES
	
	
} else {

		//echo "compl FALSE";  //TESTES

}
   
   
   
   
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $infoprox)) {
	//echo "info prox  OK";  //TESTES

} else {

		// echo "info prox  FALSE";  //TESTES

}






 // Checar se a string segue o padrao
if (preg_match('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/', $username)) {
	// echo "username OK"; //TESTES
	
	
} else {

	//	echo "username  FALSE";  //TESTES

}





 // Checar se a string segue o padrao
if (preg_match('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/', $sobrenome)) {
	//echo "sobrenome OK";  //TESTES
	
	
} else {

		//echo "sobrenome  FALSE";  //TESTES

}






 // Checar se a string segue o padrao
if (preg_match('/^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/', $cpf)) {
	//echo "__cpf OK";  //TESTES
	
	
} else {

		//echo "__cpf  FALSE";  //TESTES

}



 // Checar se a string segue o padrao
if (preg_match('/^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/', $confc)) {
	//echo "__cpf__confirm OK";  //TESTES
	
} else {

		//echo "__cpf_ confirm  FALSE";//TESTES

}






 // Checar se a string segue o padrao
if (preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $email)) {
	// echo "_email_ OK";  //TESTES
	
} else {

		//echo "__email_  FALSE"; //TESTES

}









 // Checar se a string segue o padrao
if (preg_match('/(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/', $password)) {
	//echo "_PASSWORD_ OK";  //TESTES
	
	
} else {

		//echo "_PASSWORD_  FALSE";//TESTES

}








 // Checar se a string 
if (preg_match('/(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/', $confirmpwd)) {
    // A string eh 
	//echo "_PASSWORD_CONF_ OK";  //TESTES
	
	
} else {
    // A string nao eh valida
	
		//echo "__PASSWORD_CONF_ FALSE"; //TESTES

}





 // Checar se a string segue o padrao
if (preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/', $tel)) {
	//echo "_PASSWORD_CONF_ OK";  //TESTES
	
	
} else {

		//echo "__PASSWORD_CONF_ FALSE"; //TESTES

}



//############################ FIM VERIFY EXPRESSOES ---REGEX








	//echo $endereco."_____________".$num."_________________".$compl."_____________".$infoprox."_________________".$username."_____________".$sobrenome."_________________".$cpf."_________________".$confc."_____________".$email."_________________".$password."_________________".$confirmpwd."_____________".$latituclient."_________________".$longitclient."_________________".$NaoFazercadastro;
	
	
	
	
	
	//####################################                      #################################

 //TESTADO SESSAO EXISTE
if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) { //-------------------------------------------1---------------------------



//echo "cheggg antes"; //TESTES

//---------------------------------------------------------------------------------------------------------------

if($NaoFazercadastro === true){
	
	 //echo "<h1> reproved </h1>";//TESTES
     //exit();
	
}else{



	//echo "<h1> APROVADO </h1>";  //TESTES








   
   
   
   
   /*  SE JA VIER em sha 512 do client-server exemplo --- mas vamos fazer sha aqui no php
   //________________________________________________________________________________
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
   */
	
	
	
	/*
	  if (strlen($c) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid CPF configuration.</p>';
    }
	//______________________________________________________________________________
	*/
	
	
	
	
	
	
	
	
	
	//echo $endereco."_____________".$num."_________________".$compl."_____________".$infoprox."_________________".$username."_____________".$sobrenome."_________________".$cpf."_________________".$confc."_____________".$email."_________________".$password."_________________".$confirmpwd."_____________".$latituclient."_________________".$longitclient."_________________".$NaoFazercadastro;
	
	
	
	
	//exit(); //TESTESSSSSSSS
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
    
	//check EXIST email
	
	
	
	

	
	 //AQUI____PRA COLO BD_----retira pontos e Hífen____

 
 	$cpf  = preg_replace("/[^0-9\/x\X\s]/", "", $cpf); // DEIXAR LETRAS   XX -- xx ---e NUMBERS ONLY



    


	
	
		
		//##########################################################################################
			//#################### prepare busca_____para COMPARAR hashs____USANDO this
		
			                            //  $cv = '1';   //SE FOR COMPARAR EXE prepare bind
		                               // $passw = 'as'; //SE FOR COMPARAR EXE prepare bind

			$sql = "SELECT c FROM members"; //query
			$stmt = $mysqli->prepare($sql); //contra injection SQL -- prepare
  
  
  if($stmt){  //procede ?
	  
	      $stmt->execute();
		  
                                        // bind variables to prepared statement --- SE FOR COMPARAR PRA ACHAR
                                        //  $stmt->bind_result($cv, $passw);

                                         // echo "___BIND____";

$stmt->bind_result($trouxec );  //trazer resultados e colocar em forma de VARIAVEL___sequencia primeiro select QUERy e a prime var,,,




while ($stmt->fetch()) { //busca todos correspondentes
  
  
  
  //AQUI ta DENTRO DO WHILE ainda
  
  //if ($hash->hash==crypt($password, $hash->hash)) {   ----------------------------
    if (PassHash::check_password( $cpf, $trouxec)) {    //ja tem 
		  
		  	  //return "YES";
            
			   $jatemc = true;
		       $error_msg .= '<p class="error">Um usuário com este CPF já existe ! </p>'; //IMPORTANTE ERRO MSG E Q ESBARRA


	     break; //pararr VERIFICAÇAO se JA ACHOU

        //exit();
	         // echo "___JA TEM ESTA CPF";  //testes
	

	
  }else {  //______________________________________  ainda nao tem
	  
	  
	  
	  
	       // return "CUUUUU";
            $jatemc = false;
			


     // echo "____AINDA NAO TEM -- hash nao confered !"; //testes
	  
	  
     }  ///FIM PASS VERIFY                           --------------------------------
	 



}  //FIM WHILE

            // close statement 
            $stmt->close();
	
  }  //FIM STMT
  
	
	//############################################   EM USOOOO
	//####################################################################################
		

		
		
		

		
		
		
		
		
		
		
		
		
		
		
			// check existing username
    $prep_stmt = "SELECT id FROM members WHERE endereco = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $endereco);
        $stmt->execute();
        $stmt->store_result();
		         

		  $stmt->close();
	}
		
		
		
		
		
		
		
		
				// check existing username
    $prep_stmt = "SELECT id FROM members WHERE cep = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $CEP);
        $stmt->execute();
        $stmt->store_result();
		         

		  $stmt->close();
	}
	
	
	
	
		
		
				// check existing username
    $prep_stmt = "SELECT id FROM members WHERE num = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $num);
        $stmt->execute();
        $stmt->store_result();
		          		        

		  $stmt->close();
	}
		
		
		
		
					// check existing username
    $prep_stmt = "SELECT id FROM members WHERE compl = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $compl);
        $stmt->execute();
        $stmt->store_result();
		         		        

		  $stmt->close();
	}
	
	
	
	
	
				// check existing username
    $prep_stmt = "SELECT id FROM members WHERE proximo = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $infoprox);
        $stmt->execute();
        $stmt->store_result();
		           		          

		  $stmt->close();
	}
	
	
		
	
		
					// check existing username
    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
		               		   

		  $stmt->close();
	}
	
	
	
	
	
	
	
					// check existing username
    $prep_stmt = "SELECT id FROM members WHERE sobrenome = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $sobrenome);
        $stmt->execute();
        $stmt->store_result();
		            		           		         

		 
		  $stmt->close();
	}
	
	
	
	
	
	
	
			// check existing email
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
		         

		  $stmt->close();
	}
	
	
	
	
			// check existing username
    $prep_stmt = "SELECT id FROM members WHERE telcontato = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $tel);
        $stmt->execute();
        $stmt->store_result();
		         

		  $stmt->close();
	}
		
		
		
		

	
	
	
		
 

    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
 

 
   if (empty($error_msg)) {   //__________________________________________________________________________________________________________________________


 
        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        
		
		//------------------------------------------------------------
		// DEPRECIADO_____CRIPTO so CRU ___ ALGORITMO $y DEPRECIADO
		//$password = password_hash($password, PASSWORD_BCRYPT);
 		//$c = password_hash($c, PASSWORD_BCRYPT);
//-----------------------------------------------------------------------
 
 
             $cpf = PassHash:: hash($cpf);   // ASSIM TMB TA CERTO
			 $password = PassHash:: hash($password);



        //------------------------------------------------------------- bd insert
 
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members(username, email, password, c, endereco, num, compl, proximo, sobrenome, cep, telcontato) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ? )")) {
            $insert_stmt->bind_param('sssssssssss', $username, $email, $password, $cpf, $endereco, $num , $compl, $infoprox, $sobrenome, $CEP, $tel ); //9
           
		   
		   
		    // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
			     //echo " ERRO NO INSERT";

			  
            }
			
        }            //_____________________FIIMM IF INSERT_Stmt
		
		
       header('Location: register_success.php');
	   			     //echo " SUCEEESS AO  INSERT";

	   
     
	 //---------------------------------------------------------FFIMMMMMM  ---- bd insert
	
	

}	//IF SEM ERROS
	
}//______FIM_____IF____NAO FAZER CADASTRO
	
	
	}//______FIM_____IF____EXISTE SESSAO

  
  
} //FIM___________IF POSTS POSTS POSTS POSTS








?>