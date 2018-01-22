


<?php

require_once('../includes/functions.php'); //SESSAO INICIO


require_once('../includes/db_connect.php');  //INSERT PEDIDO no DB








 header("Content-Type: text/html; charset=utf-8", true);  //padrao brasil --acentua e ÇÇ____IMPORTANTE deve ter este HEADER BEM HERE



//functions.PHP
sec_session_start(); // Our custom secure way of starting a PHP session.












			
			function gr(){
			
			
			
			
			
	if(isset($_SESSION['SBCScart']['produto'])) {
		
		
		
		

		
			
    $jsonCart['count'] = count($_SESSION['SBCScart']['produto']); //CONTAR 
	
	//QUANTOS ITENS TU TENS NA SESSAO carrinho__*** PARA LISTAR no MENU
    //$jsonCart['totalcarrinho'] = 0; //__*** PARA LISTAR no MENU
 
 
 
 
			foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg):

				         //$itemsub = $itempeggg['subtotal']/100;///100__para PADRAO-MOEDA-BR

                   $itemsub = $itempeggg['subtotal'];////VAI FORMATAR NO JAVADSCRIPT MOEDA

                            

// AQUI VAI SER USADO em FRONT END___AJAX Atualizar cart___NAO E SESSAO
						$jsonCart['dados'][] = array(   //UTF-8 == P trabalhar c/ os acentos__Ç tmb__IMPORTANTE__MAS AQUI NAO VAI PORQUE ja foi CODIFICADO la em baixo quando VERIFICA se TEM ou NAO PRODUTO IGUAL____senao teria que ter==== utf8_encode($itemmm['item']

						'itemname' => ($itempeggg['item']), 
						 'qtd' => ($itempeggg['quantity']),
                         //'subtotal' => ("R$ ".number_format($itemsub,2,',','.')),//padrao_MOEDA-BR
						 'unitprice' => ($itempeggg['unitprice']),
						 'subtotal' => ($itemsub),///VAI FORMATAR NO JAVADSCRIPT MOEDA
						 
						 
                          'id' => ($itempeggg['id'])
						  
						  
						 );
						
  
  
 // print_r($_SESSION);   //TESTES
 //print_r($_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO']);  //testes

			
			                    endforeach;
			
		
		
		
						                     //UTF-8 == P trabalhar c/ os acentos__Ç tmb__IMPORTANTE
                                        // $itemtot = utf8_encode(($_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'])/100); ///100__para PADRAO-MOEDA-BR
                         // $jsonCart['valortotal'] = utf8_encode(number_format($itemtot,2,',','.')); //padrao_MOEDA-BR	
						  		
								 $itemtot = utf8_encode(($_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'])); ///VAI FORMATAR NO JAVADSCRIPT MOEDA
                          $jsonCart['valortotal'] = ($itemtot); // VAI FORMATAR NO JAVADSCRIPT MOEDA	
						  		
								
								
								
								
								
								
								//print_r($jsonCart);//testes
								
	
	 
	 
	 
	         //____EXEM utf-8___e__json_encode----pesquise more
			 
			//echo mb_convert_encoding($jsonCart, "UTF-8", "Windows-1252");
            //echo json_encode($jsonCart, JSON_UNESCAPED_UNICODE);
			//_____________
			


     // print_r($jsonCart);//tetsess
     //print_r($_SESSION);//tetsess
     // json_encode($_SESSION);//tetsess



			
 // return json_encode($jsonCart);
	 echo json_encode($jsonCart);   // AQUI RETORNA 
	 
	 
			
			
			}   // FIM____EXISTE $_SESSION['SBCScart']['produto']____abaixo sera usado para quando FECHAR PEDIDO...
				
				
				
	 
	}

//********************************************************************************************************  END FUNCTION gr()














              function VVVVV(){

			  $VALORFINAL; //taaaaaaaaaaaaaaaaaaaaaalvez reverrrrr global E INSEGURA
			 
			  }




















//tratar o post com proprio filtro PHP___ao INVES de___echo $_POST['produto'];
//aqui so aceita string
//a _____acao____tem haver do carrinho.JS----- q deve ter uma acao
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
//___________

//___________________________________________________________

switch($acao){
	
	
	
	//*************************************************************** CASE 'ADD' ******************************************************
	//________________quando acao for ALGUMA COISA
	case 'add':   //add que eu defini la HTML
	
// Incluindo arquivo de conexão
require_once('../config/conn.php');






       // echo "CHEGUEI PHP"; //testes
		//exit; //teastes
       
	   
	   
    $SECUNDVALOR; // guarda info e aguarda --DO WHILE
    $SECUND_NOMEPROD; // guarda info e aguarda --DO WHILE
    $preserver_PRIMER_nome; // SE PRESCISAR
     //
    $qtd; //QUANTIDADE___ai depois qtd vira SBCSquantity e segue igual pizza inteira
    $valor; // primer valor
    $NOMEPROD;  //primer nome


	   
	   
	   
	    $PIZAA_MEIO_MEIO;
	   
	   





    if (!empty($_POST['nomeprodmetprim']) && !empty($_POST['nomeprodsec'])) {

	

    $ARRAY_piz_MET = array(  //---------------------------------

/*
    $idpmet = $_POST['idpmet'],
	$price= $_POST['price'],
	$nomeprodmet = $_POST['nomeprodmet'],
	$qual= $_POST['qual'],
	$idpmetprim= $_POST['idpmetprim'],
	$priceprim= $_POST['priceprim'],
	$nomeprodmetprim= $_POST['nomeprodmetprim'],
	$qualprim= $_POST['qualprim'],
	$quantity= $_POST['quantity'],
	*/
	
	
	
	
	
	$idpmetprim = (filter_input(INPUT_POST, 'idpmetprim', FILTER_SANITIZE_STRING)), //
    $priceprim = (filter_input(INPUT_POST, 'priceprim', FILTER_SANITIZE_STRING)), // 
    $nomeprodmetprim = (utf8_decode(filter_input(INPUT_POST,  'nomeprodmetprim', FILTER_SANITIZE_STRING))),// IMPORTANTE  ===  utf8_decode  ==  ajax o PADRAO é utf-8 -- ÇÀÌÈ
    $qualprim = filter_input(INPUT_POST, 'qualprim', FILTER_SANITIZE_STRING),
	  //
	//
	//
	
    $idpmet = (filter_input(INPUT_POST, 'idprodsec', FILTER_SANITIZE_STRING)), //
    $price = (filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)), // 
    $nomeprodmet =  (utf8_decode(filter_input(INPUT_POST, 'nomeprodsec', FILTER_SANITIZE_STRING))), // IMPORTANTE  ===  utf8_decode  ==  ajax o PADRAO é utf-8 -- ÇÀÌÈ

    $qual = filter_input(INPUT_POST, 'qualsec', FILTER_SANITIZE_STRING),
  
	//
	//
	//QUANTIDADE___parametro IGUAL PIZZA INTEIRA___NAO MUDA
	$QUANTIDADE = (filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT)) // 
	//
	//
	//
	//
	
	              ); //FIMMM array__piz Mei --------------------------




			  		
   // print_r($ARRAY_piz_MET)."___________________&&&&&&&&";










//##################### VERIFY TABLE

  $tbl ='';
  $count_JAPEG = 1;
  
  
  
			if($count_JAPEG == 1){ //PEGAR SO QUANDO passa PRIMEIRA VEZ___o DO WHILE
			$QUALMETADE_veri = $qual;  //PRIMEI verif tipo metade
            $NOMEpiz_VER = $nomeprodmet;  //PRIMEI verif nome piz metade
            $idVER = $idpmet;  //PRIMEI verif id piz metade
			}
			
  
  

   do{  //DO___WHILE
	   
	       //  echo " ===   passou um /  ";

	   
	   
	   
    switch($QUALMETADE_veri)//------------------------
    {       
			//meio-meio so em pizaa doce e salgada
			
			 case 'pizza':
            $tbl = 'pizzas';
			
            break;
			
	      case 'pizza':
            $tbl = 'pizzas';
            break;
    }//FIM SWITCH table--------------------------


//echo "TABLE==   == ".$tbl."_____________________";

  
   
//###################################


$VALOR_ver=''; //VALOR Q SERA CONFIRMED BD
$NOME_ver='';  // NOME Q SERA CONFIRM







 // Using prepared statements means that SQL INJECTION is NOT possible. 
    if ($verifyomeprod = $pdo->prepare("SELECT id, nome, valor 
        FROM ".$tbl."
       WHERE nome = ?
        LIMIT 1")) {              //______________________1___________________if mysqli prepare________________________________________________________
			
        $verifyomeprod->bindValue(1, $NOMEpiz_VER);  // Bind "$email" to parameter.
		
		$verifyomeprod->execute();
     
 
 
 

      // SE EXISTE PELO MENOS UMA CONSULTA COM (NOME=$NOMEPROD)
		if($verifyomeprod->rowCount() == 1) : //__________1° obstac


		//echo " ===   NAOOOO Nome foi Alterado - Suspeita Fraude /  ";

		 //retorna as tabelas do UNICO ELEMENTO 
        $results = $verifyomeprod->fetch(PDO::FETCH_ASSOC);
		
		
		// echo " ===   passou dois /  ";
		 
		 
		
		//#############################################################
		//############################################################
		//realmente OK pode PEGAR  itens CORRESPONDENTES ao NOME buscado
		
				//USE TRIM PARA RETIRAR ESPACOS inicio e final SENAO DA ERRO

		if( (trim($results['nome'])) == (trim($NOMEpiz_VER)) && (trim($results['id'])) == (trim($idVER)) ): //############## VERIFY ok
		
		//  echo "VALLL  ==  ".$results['valor']."____PROD BD__".$results['nome'];
		
        	$VALOR_ver = $results['valor']; //VALOR CONFIRMED BD
			$NOME_ver = $results['nome']; //NOME CONFIRMED BD
					
				$VALOR_ver = (trim($VALOR_ver));	//USE TRIM PARA RETIRAR ESPACOS inicio e final SENAO DA ERRO
				$NOME_ver = (trim($NOME_ver));
					
					
					
		//echo "___VALOR PROD COINCIDE COM NOME ACHADO no BD__corretissimo -==  ".$results['valor']."  --/  ";
		
		else:
        //################################################  FIM VERIFY ok

        exit(); //ABORTAR DE LER ESTE SCRIPT___ENCERRA RESTO DO SCRIPT SEM LE

endif;
        //######  SAIR - nao faca nada verify dont ok




			   
			   else:  //______________NAO ok _________1° obstac
			   
			   
      exit(); //ABORTAR DE LER ESTE SCRIPT___ENCERRA RESTO DO SCRIPT SEM LE
     // echo " ===   NAOOOO Nome foi Alterado - Suspeita Fraude /  ";

			   
			      
			endif;	 //####################################################################################################### FIM VERIFY - inf legitimas
	 
	 
				
				} //FIM VERIFY






       if($count_JAPEG == (int)1){//_________________



               // echo " ===   IF__JAPEG == um /  ";
    $tbl;
  
  $QUALMETADE_veri = $qualprim;  //para MUDAR SECUND verif tipo metade
  $NOMEpiz_VER = $nomeprodmetprim;  //para MUDAR SECUND verif nome piz metade
  $idVER = $idpmetprim;  //para MUDAR SECUND verif id piz metade
      
  //
  //
  //	
    $SECUNDVALOR = $VALOR_ver; // guarda info e aguarda --DO WHILE
    $SECUND_NOMEPROD = $NOME_ver; // guarda info e aguarda --DO WHILE


  
  
	   }elseif($count_JAPEG == (int)2){ //___###
		    //VAI TER QUE SER ESSES___QUANDO OBTER DUAS PARTES__AI FICA NORMAL la em baixo SESSOES
 
               //  echo " ===   IF__JAPEG == dois /  ";

 
    $qtd = $QUANTIDADE; //QUANTIDADE___ai depois qtd vira SBCSquantity e segue igual pizza inteira
	
    $valor = $VALOR_ver; // 
    $NOMEPROD = $NOME_ver; //quando passar pela segunda vez sera outro valor


		   
		   
	   }//__________________
	   
	   
	   
	   
	   
      $tbl = '';
     $count_JAPEG += 1;
	 
	 
	               //  echo " ===   FINALZINHO  /  ";


 }while($count_JAPEG < 3 || $count_JAPEG != 3);//FIIM ___(DO_WHILE)_____VERIFICAR se JA pegou primeira metade
 
 
 
 
 
   




//echo 'Conexão bem sucedida';
//mysql_close($verifyomeprod);  //FECHA CONEXAO___BANCO DADOS

   /* free results */
   //$stmt->free_result();

   /* close statement */
 //  $stmt->close();
//}

/* close connection */

			 
			 
			 
			 
			 //########################################################################
			 
			 
   //  echo "SEC_VALOR -> ". $SECUNDVALOR."_____"; // guarda info e aguarda --DO WHILE
    // echo "SEC_NOME -> ".$SECUND_NOMEPROD."_____"; // guarda info e aguarda --DO WHILE
     //
    // echo "QUANTIDADE_T -> ".$qtd."_____"; //QUANTIDADE___ai depois qtd vira SBCSquantity e segue igual pizza inteira
    // echo "PRIMER_VALOR -> ".$valor."_____"; // primer valor
    // echo "PRIMER_NOME -> ".$NOMEPROD."_____";  //primer nome


    if($valor >= $SECUNDVALOR){ //DEFINE MAIOR VALOR do MAIOR SABOR
		
		$valor = $valor;
	}else{
		$valor = $SECUNDVALOR;
		
	}
     //
	 //
	 //
	 //
	 //
	 // echo "VALOR   MAIOR  SABORR  ___ ".$valor."__________";  //primer nome



          $PIZAA_MEIO_MEIO = true;


                  if($NOMEPROD == $SECUND_NOMEPROD){
					  
					  $NOMEPROD = $NOMEPROD;  //SE A PESSOA COMPRAR DUAS METADES DO MSM SABOR == 1 de UM SABOR
					  
				  }else{    
				  
				  
           $preserver_PRIMER_nome = $NOMEPROD;
		   
		   
		   
          $NOMEPROD = "MEIA ".$NOMEPROD." MEIA ".$SECUND_NOMEPROD;  //DEFINE NOME meia tal meia tal
		  $NOMEPROD__order_INVERTIDO = "MEIA ".$SECUND_NOMEPROD." MEIA ".$NOMEPROD;  //DEFINE NOME meia tal meia tal
		          (trim($NOMEPROD__order_INVERTIDO)); //ESTE TEM Q SER AQUI DENTRO

				  }
				  
				  (trim($NOMEPROD)); //trim ==  RETIRAR ESPAÇOS INICIO___eno___FIM da string
		  
		  
//#######################

	



		


	} // SE NAOO TIVER VAZIO POST com nomes PIZZAS MEIO MEIO

























	if (!empty($_POST['item']) || empty($_POST['price']) || empty($_POST['quantity'])) {
	
	
	          $PIZAA_MEIO_MEIO = false;


	
	//PRIMEIRO PEGAR DO CARRINHO.JS____depois aqui

	//DECODIFICA
	//$produto = (filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING));  //produto e do___parametro __ carrinho.JS
	//$produtonorm =  (filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING));
	//$idsess = md5($produto); //posso NAO CODIFICAR ou CODIFICAR DE OUTRO METODO
    
	
	$qtd = (utf8_decode(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT))); //quantidade e do___parametro __ carrinho.JS
    $valor = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING); // STRING POR CAUSA QUE LA NO HTML MANDOU EM BASE64
    $NOMEPROD = (utf8_decode(filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING)));  // IMPORTANTE  ===  utf8_decode  ==  ajax o PADRAO é utf-8 -- ÇÀÌÈ
    $idpr = filter_input(INPUT_POST, 'idpr', FILTER_SANITIZE_STRING); //

    $QualCon = filter_input(INPUT_POST, 'qul', FILTER_SANITIZE_STRING);




          //echo "dentro";
		  
		  		//  echo "NOME VINDo AJAX == ".$NOMEPROD; //testes

		 // echo "NOME VINDo AJAX == ".$NOMEPROD; //testes
		  
		//  exit();//testes
		  
		  
		  
		  
		  switch($QualCon)//------------------------  // ver TABLE == PODE COLOCAR QUALQ PRODUTO HERE DESDE Q SEJA INTEIRO
    {
      
			
		 case 'esfihoes':
            $tbl = 'esfihoes';
            break;
			
	      case 'esfihoes':
            $tbl = 'esfihoes';
            break;
			
			case 'porcoes':
            $tbl = 'porcoes';
            break; 
			
			 case 'pizza':   //la da table BD
            $tbl = 'pizzas';
			
            break;
			
	      case 'pizza':
            $tbl = 'pizzas';
            break;
			
			
			 case 'bebidas':
			    $tbl = 'bebidas';
			 break;
			 
			 
    }//FIM SWITCH table--------------------------



		// Using prepared statements means that SQL INJECTION is NOT possible. 
    if ($verifyomeprod = $pdo->prepare("SELECT id, nome, valor 
        FROM ".$tbl."
       WHERE nome = ?
        LIMIT 1"))   { //______________________1____________INICIO_______if mysqli prepare________________________________________________________
			
       
	   
	   
	   $verifyomeprod->bindValue(1, $NOMEPROD);  // Bind "$email" to parameter.
	   $verifyomeprod->execute();
     
      // SE EXISTE PELO MENOS UMA CONSULTA COM (NOME=$NOMEPROD)
		if($verifyomeprod->rowCount() == 1) : //__________1° obstac


		//echo " ===   NAOOOO Nome foi Alterado - Suspeita Fraude /  ";

		 //retorna as tabelas do UNICO ELEMENTO 
        $results = $verifyomeprod->fetch(PDO::FETCH_ASSOC);
		
		
		// echo " ===   passou dois /  ";
		 
		 
		
		//#############################################################
		//############################################################
		//realmente OK pode PEGAR  itens CORRESPONDENTES ao NOME buscado
		
		//USE TRIM PARA RETIRAR ESPACOS inicio e final SENAO DA ERRO
		if( (trim($results['nome'])) == (trim($NOMEPROD)) && (trim($results['id'])) == (trim($idpr)) ): //############## VERIFY ok
		
		//  echo "VALLL  ==  ".$results['valor']."____PROD BD__".$results['nome'];
		
        	$valor = $results['valor']; //VALOR CONFIRMED BD
			$NOMEPROD = ($results['nome']); //NOME CONFIRMED BD
					
		    $NOMEPROD = (trim($NOMEPROD)); // RETIRAR ESPAÇOS INICIO___eno___FIM da string
              $valor = (trim($valor));
					
					
		//echo "___VALOR PROD COINCIDE COM NOME ACHADO no BD__corretissimo -==  ".$results['valor']."  --/  ";
		
		else:
        //################################################  FIM VERIFY ok

        exit(); //ABORTAR DE LER ESTE SCRIPT___ENCERRA RESTO DO SCRIPT SEM LE

endif;
        //######  SAIR - nao faca nada verify dont ok




			   
			   else:  //______________NAO ok _________1° obstac
			   
			   
      exit(); //ABORTAR DE LER ESTE SCRIPT___ENCERRA RESTO DO SCRIPT SEM LE
     // echo " ===   NAOOOO Nome foi Alterado - Suspeita Fraude /  ";

			   
			      
			endif;	 //####################################################################################################### FIM VERIFY - inf legitimas
	 
	 
				
				}   // FIIMMM $verifyomeprod = $pdo->prepare..... 
                   //####################################################################################################### FIM VERIFY - inf legitimas
	 
	 
	}//FIIMMMMMMMMMMMMMMMMMMMMMMM PIZZA INTEIRA___VERIFI__DEFIN__
	 
	 
	
	
	
	
	
	
	
	
	
	
	
	
	//888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888888
	
	
	
/////////////////////////////////////
// Session start
/////////////////////////////////////

//session_start();   // NAO PRECISAR SE INICIAR___SESSAO sec_session_start(); 

/////////////////////////////////////
// Currency symbol, you can change it
/////////////////////////////////////



$currency = "R$"; //simbolo

	if($qtd <= 10){   //EX se for MENOR IGUAL 10 pizzas
	
	

	//echo "-----leuum----";


	/////////////////////////////////////
	//ADICIONAR ITEM NO CART
	/////////////////////////////////////
	
	
	//if (empty($_POST['item']) || empty($_POST['price']) || empty($_POST['quantity'])) 
	if (empty($_POST['quantity']  )) 

	{ 
	
			//echo "empty----1--<br>";

	} else {


    $SBCSquantity = $qtd; //quantidade e do___parametro __ carrinho.JS
    $SBCSprice = $valor; // STRING POR CAUSA QUE LA NO HTML MANDOU EM BASE64
    $SBCSitem = $NOMEPROD;


   //$SBCSitem = utf8_encode($SBCSitem);
           // echo "SBC ItEm === ".$SBCSitem; //testes


//echo "-----leudois----";







		# tome valores
		//$SBCSprice = $_POST['price'];
		//$SBCSitem = $_POST['item'];
		//$SBCSquantity = $_POST['quantity'];
		
		$SBCSsubtotal = $SBCSprice * $SBCSquantity;  //testessss  ACRESCENTEI ESTE
		
		$SBCSexist = false;
		$SBCScount = 0;
		
		//echo "nao vazio -<br>";
		
		
		
		   

		
		
		
		// If SESSION GERADA?
		if(!empty($_SESSION['SBCScart']['produto']))
		{
			

			
			
			
			
			
			
			
/*
			
			
if($PIZAA_MEIO_MEIO == true)  { //#################### VER MEIO a MEIO
 
 } else {    //________################ VERIF PRODUTOS INTEIROS
 */








          // OLHE PARA O ITEM
			foreach(($_SESSION['SBCScart']['produto']) as $SBCSproduct)
			{
				
                 					//echo "iTEEMMM   ===  ".$SBCSitem."______"; //TESTES


				// SIM NOS ACHAMOS  -- COMPARAR
				// __utf8 DECODE PORQUE VEM EM UTF-8 DO AJAX_____AI TRANSFORMAMOS EM TEXTO NORMAL P COMPARAR
				//O SBCITEM___JA E NORMALIZADO___DERIVADO DO $nomeprod____DECODIFICADO LOGO LA EM CIMAO QUANDO CHEGOU__## NAO FAZER NADA NELE AQUI
				if($SBCSitem == utf8_decode($SBCSproduct['item'])) {
					
		
					$SBCSexist = true;
					//	echo "simmm achamos o item";
				

					break;
					
					

					
					
				}
				//$IDENTIF_PROD++;
			
			
			
			
			
			
            
			 } //##########  FIMMMMMM foreach($_SESSION['SBCScart']['produto'] as $SBCSproduct)
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
		//Se encontramos mesmo item
		if($SBCSexist) //SE ALGUM PRODUTO JA EXISTE
		{
		
		
		//IMPORTANTE___AQUI QUANDO PROD JA TIVERIGUAL === ENTAO SOMENTE APÓS $SBCITEM TER REALIZADO A COMPARAÇÃO ACIMA___E *** ANTES DA SESSAO __DEVEMOS
		//...CODIFICA-LO EM __UTF-8___PARA RECEBER ACENTUAÇAO_çÀÉ
	  $SBCSitem = utf8_encode($SBCSitem);
             // echo "SBC ItEm === ".$SBCSitem; //testes
		
		
		
			// ATUALIZAR  QUANTIDADE
			$_SESSION['SBCScart']['produto'][$SBCSitem]['quantity'] += $SBCSquantity;
		    $_SESSION['SBCScart']['produto'][$SBCSitem]['subtotal'] += $SBCSsubtotal; //testessss  ACRESCENTEI ESTE




					 //	echo "-----leutres----";	
							//	echo "encontramos mesmo item<BR>";
							


			
		} else {
					

		    $SBCSuniquid = rand();//aleatoriooooo ID UNICA

         
        //IMPORTANTE___AQUI QUANDO NAO TIVER PROD IGGUALLL ==  *** ANTES DA SESSAO __DEVEMOS
		//...CODIFICA-LO EM __UTF-8___PARA RECEBER ACENTUAÇAO_çÀÉ
        $SBCSitem = utf8_encode($SBCSitem);
           // echo "SBC ItEm === ".$SBCSitem; //testes
 
 
 
 
			// If we do not found, INSERIR NOVO
			$SBCSmycartrow = array(
				'item' => $SBCSitem,
				'unitprice' => $SBCSprice,
				'quantity' => $SBCSquantity,
				'id' => $SBCSuniquid,
				'subtotal' => $SBCSsubtotal //testessss  ACRESCENTEI ESTE

			);
			
			

						 //$IDENTIF_PROD = $SBCSuniquid;


			
			// SE SESSAO NAO EXISTE, CRIAR NOVA
			if (!isset($_SESSION['SBCScart']))
				$_SESSION['SBCScart'] = array();
				
				
								//		echo "sessao naoo eXISTEE CRIANDO NOVA  <BR>";
				
			
			// ADD ITEM NO CART
			$_SESSION['SBCScart']['produto'][$SBCSitem] = $SBCSmycartrow;
			


		}
		
		
	}












	/////////////////////////////////////
	// DELETE cart
	/////////////////////////////////////
	if(isset($_POST["clear"])) 
	{ 
		session_unset();
		session_destroy(); 
	}









	/////////////////////////////////////
	// REMOVE ITEM DO CART (ATUALIZANDO quantity PARA 0)
	/////////////////////////////////////
	if(isset($_POST["remove"])) 
	{ 
	
	//  echo "REMOOOOOOOOOVERRRR_DENTRO";
	  
	 // $_SESSION['SBCScart']['produto'][$_POST["remove"]]['quantity'] = 0;
	}
	
            
            
			
			
		
            
          



			/////////////////////////////////////
			// SE CART  is empty
			/////////////////////////////////////
			if (!isset($_SESSION['SBCScart']['produto']) || (count($_SESSION['SBCScart']['produto']) == 0)) { 
			
            
            									//	echo "CART ESTA VAZIIIO  <BR>";

            
            
           // echo "-----leuquatro----";
            
            
            
            
			/////////////////////////////////////
			// If CART NAO ESTIVER empty ---- SE EXISTE PELO MENOS 1 PRODUTO
			/////////////////////////////////////	
			} else {
			
			
			
			
			
			
			

			
			
			
			
		
			
			
			
			
			VVVVV(); //function do inicio VALOR FINAL
			
			$ARRAYGERAL = array(); //FORA MESMO
            //###################################################### PARA VALOR TOTAL___DADOS GERAIS___ESTA DENTRO SE EXISTIR PELO MENOS UM PRODUTO
			if (isset($_SESSION['SBCScart']['DADOSGERAIS'])){ //################## SE JA EXISTE SESSAO___DADOSGERAIS
			
			  $VALORFINAL = 0;//ok---pra limpar
								  
                         foreach ($_SESSION['SBCScart']['produto'] as $itemID => $itemPEGARSUBS) {//_______pega TODOS SUBTOTais DE produtos E SOMA
                                               $VALORFINAL += $itemPEGARSUBS['subtotal'];
											   
											   
											 
											  
                                            }//Fim FOREACH__________________________________________________



//echo "-----leucinco----";



                               $ARRAYGERAL = array(//________________
				                    'valorfinal' => $VALORFINAL,
									'NUMPEDIDO' => $NUMPEDIDO

			                   );//__________________________________


						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $VALORFINAL;



             //  echo '-------------AGORA EXISTE TOTTAL';
			
			
			}else{//__________se NAO EXISTE____CRIE #####################################
				
				              // echo '-------------NAO EXISTE TOTTAL------------------- CRIARRRRRRRRRR TOTTALLLL----';

                $VALORFINAL = $SBCSsubtotal;
				
							    $NUMPEDIDO= rand();//aleatoriooooo ID UNICA  5 NUM

			  
			  						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $SBCSsubtotal;
                                    						            $_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO'] = $NUMPEDIDO;

			  //echo "-----leuses----";
			  
			  
				$ARRAYGERAL = array(//_______________
				'valorfinal' => $SBCSsubtotal,
				'NUMPEDIDO' => $NUMPEDIDO

			);//____________________________________
			
				
			}//####################################################################### FIIIMMMM DO __PARA VALOR TOTAL___DADOS GERAIS
			
			

			
			
			
			
			gr();
			
			//echo "-----leusete----";
			
			
			
			

						/////////////////////////////////////
						// LISTANDO CART ITENS
						/////////////////////////////////////
						
						// We store order detail in HTML
						//$OrderDetail = 
						
						
						
						// Equal total to 0
						$total = 0;
						// For finding session elements line number
						$linenumber = 0;
						
						
						

						
						
						// LACO CORRENDO PARA ARRAY----CART 
						foreach($_SESSION['SBCScart']['produto'] as $SBCSitem) 
						{
							
												//	echo "ESTOU LAÇO CART   <BR>";
												


							// SE NAO LISTA COM QUANTIDADE 0 ZERO
							if($SBCSitem['quantity']!=0) {
								
					//	echo "NAOOOO LISTA COM QUANT ZERO  <BR>";

								
							// For calculating total values with decimals
							$pricedecimal = str_replace(",",".",$SBCSitem['unitprice']); 
							$qtydecimal = str_replace(",",".",$SBCSitem['quantity']); 

							$pricedecimal = (float)$pricedecimal; 
							$qtydecimal = (float)$qtydecimal; 

							$totaldecimal = $pricedecimal*$qtydecimal;								
								
							// We store order detail in HTML
							//$OrderDetail .= "<tr><td>".$SBCSitem['item']."</td><td>".$SBCSitem['unitprice']." ".$currency."</td><td>".$SBCSitem['quantity']."</td><td>".$totaldecimal." ".$currency."</td></tr>";
							
							// Write cart to screen
						
							
							// Total
							$total += $totaldecimal;
							
							//echo $total."---- total"; //testes
							
							}//fim quantidade DIFER ZERO
							$linenumber++;
				   } // FIM FOREACH SBCSCART
      
	  
	  //###############################################
	  
	  
	  
    } //FIMM CART NAO ESTIVER empty___(S_POST  $_POST___$_POST) no inicio
    
	
	//######################################################################################################################################
	


	  // print_r($_SESSION['SBCScart']);//testess
     //print_r($_SESSION);//testess





       //  echo passsardata(); //AGORA VA PRA ESSA FUNCAO PARA CRIAR ARRAY PRA____LISTAR PRA ENVIAR PRA O CARRINHO.JS__SE PRECISAR
	  
	  
	  
	
	}else{
		echo "QUANTIDADE_nao_trabalhada";
	}




	

	break;
		//*************************************************************** FIMMMM____CASE 'ADD' ******************************************************

	
	
	
	
	
	
	
	
//_________________________LA DO carrinho.JS
case 'criagetCARRINHO':
	//echo getCART(); //funcao do array()
	echo gr(); //funcao do array()

	break;//___________________________________
			//**************************************** FIMMMM____CASE 'criagetCARRINHO' ******************************************************

	
	
	
	
	
	
	
	
	
	
	
	
	//_________________________LA DO carrinho.JS
case utf8_encode('DELETARITEM'):

    // echo "DELETARRRR"; //testes


    //pode ser defin como ID se preferir da no mesmo
	
	//aqui e com SE FOSSE === $_POST['id']
	
	// MAS ASSIM E MAIS SEGURO___TA FILTRANDO
	$key = filter_input(INPUT_POST, 'itemname', FILTER_SANITIZE_STRING);  //produto e do___parametro __ carrinho.JS 
	
	
	 //UTF-8 == P trabalhar c/ os acentos__Ç tmb__IMPORTANTE
     //utf8_encode
						
						
						
	$key = (trim($key));
	
	
	
	//echo "KEY ** ==".$key."---___/"; //TESTES
	
	
	
			
			//echo ($_SESSION['SBCScart']['produto'][$key]['unitprice'])." ______/";
			
	
		//print_r($_SESSION);

	
	//$SUBTOretirar = $_SESSION['SBCScart']['produto'][$key]['subtotal'];
	//echo "SUBBB".$SUBTOretirar;
	
	
	
	
	//print_r($_SESSION);//testes
	
	
	//SE EXISTE KEY == SIGNIF Q EXISTE o PRODUTO entao
	if(isset($_SESSION['SBCScart']['produto'][$key])):
	      
		  
      unset($_SESSION['SBCScart']['produto'][$key]); //EXCLUI apenas o INDICE KEY
		 // unset($_SESSION['carrinho']); //EXCLUI TODA SESSAO
		  
		  
		  
		// $_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] -= $_SESSION['SBCScart']['produto']['calabresaMOIDA']['subtotal'];
		  
		  
		  
		 // gr();
		  
		 // echo "FOOIIIIIIIIIIIIIIIIIIIII-------deletadooooooi ";
		   
 // echo "SUBT  == ".$_SESSION['SBCScart']['produto'][$key]['subtotal'];
		  
		  
	//echo json_encode($SUBTOretirar);
	
	antes();
	
	
	
	
	
	//echo json_encode('OK'); //IRA PROVOCAR a retirada no carrinho.JS
		 
		  
		  
	endif;//_________________________________
	 
	
	
	
	
	
	
	
	
	
	
	
break;
		//***************************************************************FIMMM CASE 'DELETAR_ITEM' ******************************************************

	
	case ('CANCELAR_COMPRA'):
	
	
	              unset($_SESSION['SBCScart']);  //DESTRUIR APENAS TODOS PRODUTOS_____POIS admin_FICARA LOGADO ENQUANTo PIZZA ABERTA
                  unset($jsonCart); //DELETA all JSONCART____que é um ARRAY
				  
				  
				  
		  //____________________________________________
		  
		
		  
		  
		  
		        //sleep(1);
		                      
							     // return json_encode para arquivo JAVASCRIPT ($jsonCart);
                                 echo json_encode('OK_DESISTIU_do_PEDIDO');
		  
	
	
	
	
	
	
	
	break;
			//***************************************************************FIMMM CASE 'CANCELAR_COMPRA' ******************************************************

	
	
	
	
	
	
	
	//********************************************************************************************************
	//********************************************************************************************************
	
	case ('FECHOU_COMANDA'):
	
	
	    // TRESTES SABER A PAGINA___o sec_session_start FUNCTION UTILIZA ISTO___AQUI E P TESTES
		//echo $pagina = end(explode("/", $_SERVER['PHP_SELF']))."                ";  //PEGAR NOME PAGE ATUAL ---end pega o ultimo elemento do caminho EX (pasta/ COCA.php)____ai pega COCA.php


               //exit;


	
	
	// myses = the last session gerada before to PAGAMENTO $$
	if(isset($_SESSION['adm']['logado']) && isset($_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO']) ){
		
	
	//faça alguma coisa
	//echo "SIm EXISTE NUM PEDIDO  que  é ___".$_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO']."<br><br><br>";  //TESTES
	
	






	
	
	$id_do_pedido =  $_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO'];

	
    $total = $_SESSION['SBCScart']['DADOSGERAIS']['valorfinal']; 
	  
    date_default_timezone_set('America/Sao_Paulo');
	//$data_e_hora = array();
   $data_e_hora = date('Y-m-d h:i:sa');	
	
   // echo " DATA e HORA    ".$data_e_hora;  // testes
	
	  
	   $nome_sob_cliente = "---"; 
	   
	   $tel_de_cont = "---";
	   
	    $endereco = "---BALCÃO---"; 
		
		$proximo = "---"; 
	
	  $cep = "---"; //11
	
	$ORIGEM = "Balcão";
	
	
	
	
	//exit;
	
	
	
	//-------------------------------------------------


 foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg){ 
 
    // ### IMPORTANTE: NOTE O . ANTES DO = ----  ISSO SERVE PARA CONCATENAR RESULTADOS QUE FOREACH VAI LENDO TIPO ['ITEM'][DOG] + ['ITEM'][CAT]... AI FICA DOGCAT
	
	$produto .= "@".$itempeggg['item']."#";
	$valorUNITARIO .= "@".$itempeggg['unitprice']."#";
    $quant .= "@".$itempeggg['quantity']."#";
	$subtotal .= "@".$itempeggg['subtotal']."#";

    // O (.) ANTES DO (=) É importante PARA CONCATENAR

	//echo " ".$produto; //testes

 }  // FIM FOREACH-------
 
 
  // echo " FORA =  ".$produto; //testes

 
//------------------------------------------- nao usado ex:


 //---------------- nao usado ex:
 
   // $insert_query_VALUES = "('$id_do_pedido' , '".$itempeggg['item']."', '".$itempeggg['quantity']."', '".$itempeggg['subtotal']."', '$total', '$data_e_hora', '$nome_sob_cliente', '$tel_de_cont', '$endereco', '$proximo', '$cep' )";        
//---------------------------------

 
 //mysqli_query($mysqli, $insert_query_KEY.$insert_query_VALUES);

/*
if(!mysql_query($mysqli)){
    die('Error: ' . mysql_error());
}else{
    echo "record added";
}
*/

//-----------------------------------------

	
	//########################  BD INSERT
	
	$insert_stmt = $mysqli->prepare;
	
	
	$insert_stmt = ("INSERT INTO pedidos( id_do_pedido, itens, valor_UNITARIO, quant_sub, subtotal, total, data_e_hora, nome_sob_cliente, tel_de_cont, endereco, proximo, cep, origem) VALUES ( '$id_do_pedido', '$produto' , '$valorUNITARIO', '$quant', '$subtotal', '$total', '".$data_e_hora."', '$nome_sob_cliente', '$tel_de_cont', '$endereco', '$proximo', '$cep', '$ORIGEM' )") ;
//or die(mysqli_error($insert_stmt));

		   
		  $EXEC =  mysqli_query($mysqli, $insert_stmt);
		   
		   
	$mysqli->close();
		   
		    //echo "___  FOI INSERIDO NO BD =========";  //TESTES
	       //  exit; //TESTES
		  
		  
		  
		  
		  
		  		  unset($_SESSION['SBCScart']);  //DESTRUIR APENAS ESTA_____POIS admin_FICARA LOGADO ENQUANTo PIZZA ABERTA
                  unset($jsonCart); //DELETA all JSONCART____que é um ARRAY
				  
				  
				  
		  //____________________________________________
		  
		
		  
		  
		  
		        //sleep(1);
		                      
							     // return json_encode para arquivo JAVASCRIPT ($jsonCart);
                                 echo json_encode('OK_FECHOU_PEDIDO');
		  
							
		  
		 //_____________________________________________
	    //NESTE CASO NAO PRECISA IR PARA ____FUNCTION ANTES()____PORQUE LÁ E PARA APENAS QUANTID-----VALOR----COMO AQUI VAMOS EXCLUIR TUDO NAO PRECISA DELA









		  
			//______abaixo so EXEMPLO::
		  
// Unset all session values 
//$_SESSION = array();
 
 
 /*
// get session parameters 
$params = session_get_cookie_params();
 
 
 
// Delete the actual cookie. 
setcookie(session_name(),
        '', time() - 180, //42000 seg no tutorial 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 */
 
 
// Destroy session 
//session_destroy();

//usuario deve ser redirecionado para outra PAGINA
//header('Location: cu.php');


//DEFINITIVO
//header('Location: CLIENTEDESLOGADO.php');

    //exit();
		  
		  
		  
	
	
}else{   //nao EXISTE NUMERO___PEDIDO
	
	


}
	
	
	
	break;
			//***************************************************************FIMMM CASE 'FECHOU__COMANDA' ******************************************************

	
	
	
	
	
	
	
	
	
	
	
	//___________abaixo quando acao NAO FOR NADA
	default:
	break;
	
}
//__________________________________________________________________






















	






function antes(){
	
	//echo "antes"; //testes
	
	        
				VVVVV(); //function do inicio VALOR FINAL

			
			$ARRAYGERAL = array(); //FORA MESMO
            //###################################################### PARA VALOR TOTAL___DADOS GERAIS___ESTA DENTRO SE EXISTIR PELO MENOS UM PRODUTO
			if (isset($_SESSION['SBCScart']['DADOSGERAIS'])){ //################## SE JA EXISTE SESSAO___DADOSGERAIS
			
			  $VALORFINAL = 0;//ok---pra limpar
								  
                         foreach ($_SESSION['SBCScart']['produto'] as $itemID => $itemPEGARSUBS) {//_______pega TODOS SUBTOTais DE produtos E SOMA
                                               $VALORFINAL += $itemPEGARSUBS['subtotal'];
											   
											   
											 
											  
                                            }//Fim FOREACH__________________________________________________



//echo "-----leucinco----";



                               $ARRAYGERAL = array(//________________
				                    'valorfinal' => $VALORFINAL,

			                   );//__________________________________


						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $VALORFINAL;



             //  echo '-------------AGORA EXISTE TOTTAL';
			
			
			}else{//__________se NAO EXISTE____CRIE #####################################
				
				              // echo '-------------NAO EXISTE TOTTAL------------------- CRIARRRRRRRRRR TOTTALLLL----';

                $VALORFINAL = $SBCSsubtotal;
			  
			  						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $SBCSsubtotal;

			 // echo "-----leuses----";
			  
			  
				$ARRAYGERAL = array(//_______________
				'valorfinal' => $SBCSsubtotal,

			);//____________________________________
			
				
			}//####################################################################### FIIIMMMM DO __PARA VALOR TOTAL___DADOS GERAIS
			
			

			
			
			
		
			
			
			
 	//depois q criada a SESSAO carrinho---comeca a contar
    $jsonCart['count'] = count($_SESSION['SBCScart']['produto']); //CONTAR 
	
	//QUANTOS ITENS TU TENS NA SESSAO carrinho__*** PARA LISTAR no MENU
    //$jsonCart['totalcarrinho'] = 0; //__*** PARA LISTAR no MENU
 
 
 
 
			foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg):

			
					

// AQUI VAI SER USADO em FRONT END___AJAX Atualizar cart___NAO E SESSAO
						$jsonCart['dados'][] = array(   //UTF-8 == P trabalhar c/ os acentos__Ç tmb__IMPORTANTE__MAS AQUI NAO VAI PORQUE ja foi CODIFICADO la em CIIMMAAA quando VERIFICA se TEM ou NAO PRODUTO IGUAL____senao teria que ter ==== utf8_encode($itemmm['item']

						'itemname' => ($itempeggg['item']), 
					    'unitprice' => ($itempeggg['unitprice']),
						 'qtd' => ($itempeggg['quantity']),
                         'subtotal' => ("R$ ".number_format($itemsub,2,',','.')),//padrao_MOEDA-BR
                          'id' => ($itempeggg['id'])
						  
						 );
						
  
  

								
			
			                    endforeach;
			
			//echo "GRRerEXCLUIitem---";
			//print_r($_SESSION);
						
						
						
						
			$jsonCart['valortotal'] = ($_SESSION['SBCScart']['DADOSGERAIS']['valorfinal']);
			

			
			
				 // return json_encode para arquivo JAVASCRIPT ($jsonCart);

					echo json_encode('OK');


			
	}





