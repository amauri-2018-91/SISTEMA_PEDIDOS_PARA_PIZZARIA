<?php


header('Content-type: text/html; charset=utf-8', true); //padrao brasil --acentua e ÇÇ

//############################################################################################################################################################################################### SE ESTA SCRIPT TA SENDO CHAMADO APOS A CRIAR SESSAO LA NO REGISTER.PHP____ENTAO AQUI ESTA DENTRO DA ____SESSAO ___JÁ

include_once 'db_connect.php';
include_once 'psl-config.php';



// inclua a classe
require ("PassHash.php"); //########################################  DEIXAR DESATIVADO SOMENTE SE USAR SESSION NO REGISTER__POIS JA TA SENDO CHAM EM OTHER
$error_msg = "";
 
  





 //OBRIGATORIOS
 
if (isset($_POST['endereco'], $_POST['num'], $_POST['username'], $_POST['usernamesobre'],  $_POST['cpf'], $_POST['confc'], $_POST['password'], $_POST['confirmpwd'],  $_POST['latcriadaclie'], $_POST['longcriadaclie'], $_POST['Notcadcriad'] ))  {

    // Sanitize (limpeza) and validate the data passed in
	
	$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $num = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_NUMBER_INT);
	    
		
			$compl = filter_input(INPUT_POST, 'compl', FILTER_SANITIZE_STRING);

        $infoprox = filter_input(INPUT_POST, 'infoprox', FILTER_SANITIZE_STRING);
		
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	    $sobrenome = filter_input(INPUT_POST, 'usernamesobre', FILTER_SANITIZE_STRING);
		
		
     $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	 $confc = filter_input(INPUT_POST, 'confc', FILTER_SANITIZE_STRING);
	
	
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	    $confirmpwd = filter_input(INPUT_POST, 'confirmpwd', FILTER_SANITIZE_STRING);
	
	
	
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
   
   
   // Checar se a string segue o padrao de uma placa de carro
if (preg_match('/^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ \.\-\,]+$/', $endereco)) {

} else {

}
   
   
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9.]+$/', $num)) {

	
} else {

}
   
   
   
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ \.\-\ ]+$/', $compl)) {

} else {

}
   
   
   
   
   
   
   // Checar se a string segue o padrao
if (preg_match('/^[0-9-A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $infoprox)) {

} else {

}






 // Checar se a string segue o padrao
if (preg_match('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/', $username)) {

} else {

}





 // Checar se a string segue o padrao
if (preg_match('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+$/', $sobrenome)) {

} else {

}






 // Checar se a string segue o padrao
if (preg_match('/^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/', $cpf)) {

	
} else {
    // A string nao eh uma

}



 // Checar se a string segue o padrao
if (preg_match('/^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/', $confc)) {

} else {

}






 // Checar se a string segue o padrao
if (preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/', $email)) {

} else {


}









 // Checar se a string segue o padrao
if (preg_match('/(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/', $password)) {

} else {


}








 // Checar se a string segue o padrao
if (preg_match('/(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/', $confirmpwd)) {

	
} else {

}


//############################ FIM VERIFY EXPRESSOES ---REGEX











	//echo $endereco."_____________".$num."_________________".$compl."_____________".$infoprox."_________________".$username."_____________".$sobrenome."_________________".$cpf."_________________".$confc."_____________".$email."_________________".$password."_________________".$confirmpwd."_____________".$latituclient."_________________".$longitclient."_________________".$NaoFazercadastro;
	//###################################                      #################################

 //TESTADO SESSAO EXISTE
if ( isset($_SESSION['ultimoClick']) AND !empty($_SESSION['ultimoClick']) ) { //-------------------------------------------1---------------------------


//---------------------------------------------------------------------------------------------------------------

if($NaoFazercadastro === true){

	
}else{

 	$cpf  = preg_replace("/[^0-9\/x\X\s]/", "", $cpf); // DEIXAR LETRAS   XX -- xx ---e NUMBERS ONLY

		
		//-------------------------------------------------------------
		//-------------------------------------------------------------
		//-------------------------------------------------------------

		//##########################################################################################
			//#################### prepare busca_____para COMPARAR hashs____USANDO this
		


			$sql = "SELECT c FROM members"; //query
			$stmt = $mysqli->prepare($sql); //contra injection SQL -- prepare
  
  
  if($stmt){  //procede ?
	  
	      $stmt->execute();
		  


$stmt->bind_result($trouxec );  //trazer resultados e colocar em forma de VARIAVEL___sequencia primeiro select QUERy e a prime var,,,

while ($stmt->fetch()) { //busca todos correspondentes
  
  
  
  //AQUI ta DENTRO DO WHILE ainda
  
  //if ($hash->hash==crypt($password, $hash->hash)) {   ----------------------------
    if (PassHash::check_password( $cpf, $trouxec)) {    //ja tem 
		  
		  	  //return "YES";
			   $jatemc = true;
		       $error_msg .= '<p class="error">Um usuário com este CPF já existe ! </p>'; //IMPORTANTE ERRO MSG E Q ESBARRA

	     break; //pararr VERIFICAÇAO se JA ACHOU

  }else {  //______________________________________  ainda nao tem

            $jatemc = false;

     }  ///FIM PASS VERIFY                           --------------------------------

}  //FIM WHILE

            // close statement 
            $stmt->close();
	
  }  //FIM STMT
  
	
	//############################################   EM USOOOO
	//####################################################################################


//__________________________________________________________________VERIF if existe___implem ++ sec____MAS SEM MODO PREPARE___inseguro um pouco
		

		//_____________________
		//---------------------

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
	
	

	

    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

   //$error_msg .= '<p class="error">Database error Line 39</p>';   //PARA TESTE ____ERROR___ESBARRAR___INSERT BD ********************

 
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
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members(username, email, password, c, endereco, num, compl, proximo, sobrenome) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ? )")) {
            $insert_stmt->bind_param('sssssssss', $username, $email, $password, $cpf, $endereco, $num , $compl, $infoprox, $sobrenome ); //9
           
		   
		   
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