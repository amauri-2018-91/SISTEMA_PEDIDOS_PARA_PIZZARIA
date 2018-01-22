


<?php

require_once('../includes/functions.php'); //SESSAO INICIO


//functions.PHP
sec_session_start(); // Our custom secure way of starting a PHP session.












			
			function gr(){
			
			
			
			
	if(isset($_SESSION['SBCScart']['produto'])) {

 	//depois q criada a SESSAO carrinho---comeca a contar
    $jsonCart['count'] = count($_SESSION['SBCScart']['produto']); //CONTAR 

 
 //*********############ ****** OBS:   Aqui não precisa USAR UTF-8 para acentos____q nem o script carrinho.PHP - admin
 
 
 
 
 
			foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg):

			
			
			           $itemsub = $itempeggg['subtotal']/100;///100__para PADRAO-MOEDA-BR
			
			
			
						$jsonCart['dados'][] = array(
						
						'itemname' => $itempeggg['item'], // AQUI VAI SER USADO FRONT END___AJAX RETORNO efeitos___NAO E SESSAO
						 'qtd' => $itempeggg['quantity'],
                         'subtotal' => "R$ ".number_format($itemsub,2,',','.'),//padrao_MOEDA-BR
                          'id' => $itempeggg['id']
						  
						 );
						
  
  

			
			                    endforeach;
			

											   $itemtot = ($_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'])/100; ///100__para PADRAO-MOEDA-BR

			$jsonCart['valortotal'] = number_format($itemtot,2,',','.'); //padrao_MOEDA-BR
			
	 // return json_encode($jsonCart);
	  echo json_encode($jsonCart);
			

				
			}
			

	}





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







	  
	  
	  //################################
	  //#############################
	  //##############################   INICIO VERIFICAO DIA DA SEMANA E HORA
	  
	  

      //_________________________________     VERIFICAR   DATA     HORA    ----
	  
	   date_default_timezone_set('America/Sao_Paulo');  // AGORA TUDO ABAIXO É CONSIDERADO______HORA DE ___SÃO PAULO___BR
	   
     //$data_e_hora = array();
   $data_e_hora = date('Y-m-d H:i:sa');	  // H = hora 24 horas
   
   //-------------------------------------
   
   
   
   
             // Array com os dias da semana
              $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');

             // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
             $data = date('Y-m-d');

             // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
             $diasemana_numero = date('w', strtotime($data));

            // Exibe o dia da semana com o Array
            // echo $diasemana[$diasemana_numero];
   
   
   
   
   
   
   
   
   $hora_START = ( date('18:00:00') );
   
   $hora_FINAL_DO_DIA_SEMANA = ( date('23:50:00') );  //DIAS DA SEMANA___ATE...
   $hora_FINAL_DO_DIA_SEXTA_SABADO = ( date('00:50:00') );  // SEXTA E SABADO___ATE...



   $now = date('H:i:s');	  // H = hora 24 horas
   

   
   
   //################## ____  A_____ INICIOO __DIA D SEMANA verify hora e dia


if($diasemana[$diasemana_numero] == 'Domingo' || $diasemana[$diasemana_numero] == 'Segunda' || $diasemana[$diasemana_numero] == 'Terça' || $diasemana[$diasemana_numero] == 'Quarta' || $diasemana[$diasemana_numero] == 'Quinta' ){




if ( ($hora_START <= $now) && ($now <= $hora_FINAL_DO_DIA_SEMANA)  ) {
	
	  // echo 'Está entre o HORARIO ATENDIDO';
	  
	
	
}else{
	
	// echo 'NAOOOOO ATENDEMOS   NESSE HORário';
	 
	 echo json_encode("HORARIO_nao_ATENDIDO");
	 
	 exit();
	 
	
}
     
}
//##################  FIM ___DIA D SEMANA verify hora e dia
	













 //##################  ____ B ______ INICIOO __ SEXTA E SÁBADO __ verify hora e dia


if($diasemana[$diasemana_numero] == 'Sexta' || $diasemana[$diasemana_numero] == 'Sabado' ){




if ( ($hora_START <= $now) && ($now <= $hora_FINAL_DO_DIA_SEXTA_SABADO)  ) {
	
	   //echo 'Está entre o HORARIO ATENDIDO';
	  
	
	
}else{
	
	// echo 'NAOOOOO ATENDEMOS   NESSE HORário';
	 
	 echo json_encode("HORARIO_nao_ATENDIDO");
	 
	 exit();
	 
	
}
      
}
//##################  FIM__  sexta E sÁBADO  ____verify hora e dia
	





	  
	  
	  //################################
	  //#############################
	  //##############################   FIM VERIFICAO DIA DA SEMANA E HORA
	  
	  
	  
	  
	  
	  
	  
	   
	   
	   
	   
    $SECUNDVALOR; // guarda info e aguarda --DO WHILE
    $SECUND_NOMEPROD; // guarda info e aguarda --DO WHILE
    $preserver_PRIMER_nome; // SE PRESCISAR
     //
    $qtd; //QUANTIDADE___ai depois qtd vira SBCSquantity e segue igual pizza inteira
    $valor; // primer valor
    $NOMEPROD;  //primer nome


	   
	   
	   
	    $PIZAA_MEIO_MEIO;
	   
	   





    if (!empty($_POST['nomeprodmet']) && !empty($_POST['nomeprodmetprim'])) {

	

    $ARRAY_piz_MET = array(  //---------------------------------


	
    $idpmet = base64_decode(filter_input(INPUT_POST, 'idpmet', FILTER_SANITIZE_STRING)), //
    $price = base64_decode(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)), // 
    $nomeprodmet = filter_input(INPUT_POST, 'nomeprodmet', FILTER_SANITIZE_STRING),
    $qual = filter_input(INPUT_POST, 'qual', FILTER_SANITIZE_STRING),
    //
	//
	//
	$idpmetprim = base64_decode(filter_input(INPUT_POST, 'idpmetprim', FILTER_SANITIZE_STRING)), //
    $priceprim = base64_decode(filter_input(INPUT_POST, 'priceprim', FILTER_SANITIZE_STRING)), // 
    $nomeprodmetprim = filter_input(INPUT_POST, 'nomeprodmetprim', FILTER_SANITIZE_STRING),
    $qualprim = filter_input(INPUT_POST, 'qualprim', FILTER_SANITIZE_STRING),
	//
	//
	//QUANTIDADE___parametro IGUAL PIZZA INTEIRA___NAO MUDA
	$QUANTIDADE = (filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT)) // 
	//
	//
	//
	//
	
	              ); //FIMMM array__piz Mei --------------------------






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
			
			 case 'cGk=':
            $tbl = 'pizzas';
			
            break;
			
	      case 'cGl6ZG9j':
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

		 //retorna as tabelas do UNICO ELEMENTO 
        $results = $verifyomeprod->fetch(PDO::FETCH_ASSOC);

		
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
 

			 
			 //########################################################################

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
		  
		  
//###################

	} // SE NAOO TIVER VAZIO POST com nomes PIZZAS MEIO MEIO

























	if (!empty($_POST['item']) || empty($_POST['price']) || empty($_POST['quantity'])) {
	
	
	          $PIZAA_MEIO_MEIO = false;


	
	//PRIMEIRO PEGAR DO CARRINHO.JS____depois aqui

	//DECODIFICA
	//$produto = (filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING));  //produto e do___parametro __ carrinho.JS
	//$produtonorm =  (filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING));
	//$idsess = md5($produto); //posso NAO CODIFICAR ou CODIFICAR DE OUTRO METODO
    
	
	$qtd = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT); //quantidade e do___parametro __ carrinho.JS
    $valor = (base64_decode(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING))); // STRING POR CAUSA QUE LA NO HTML MANDOU EM BASE64
    $NOMEPROD = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
    $idpr = (base64_decode(filter_input(INPUT_POST, 'idpr', FILTER_SANITIZE_STRING))); //

    $QualCon = filter_input(INPUT_POST, 'qul', FILTER_SANITIZE_STRING);



		  switch($QualCon)//------------------------  // ver TABLE == PODE COLOCAR QUALQ PRODUTO HERE DESDE Q SEJA INTEIRO
    {
      
			
		 case 'aGVzZmk=':
            $tbl = 'esfihoes';
            break;
			
	      case 'aGVzZmlkb2M=':
            $tbl = 'esfihoes';
            break;
			
			case 'cG9yYw==':
            $tbl = 'porcoes';
            break; 
			
			 case 'cGk=':
            $tbl = 'pizzas';
			
            break;
			
	      case 'cGl6ZG9j':
            $tbl = 'pizzas';
            break;
			
			
			 case 'YmViaWRhcw==':
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
			$NOMEPROD = $results['nome']; //NOME CONFIRMED BD
					
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


	/////////////////////////////////////
	//ADICIONAR ITEM NO CART
	/////////////////////////////////////
	
	
	//if (empty($_POST['item']) || empty($_POST['price']) || empty($_POST['quantity'])) 
	if (empty($_POST['quantity']  )) 

	{ 
	

	} else {


    $SBCSquantity = $qtd; //quantidade e do___parametro __ carrinho.JS
    $SBCSprice = $valor; // STRING POR CAUSA QUE LA NO HTML MANDOU EM BASE64
    $SBCSitem = $NOMEPROD;



		
		$SBCSsubtotal = $SBCSprice * $SBCSquantity;  //testessss  ACRESCENTEI ESTE
		
		$SBCSexist = false;
		$SBCScount = 0;
		

		// If SESSION GERADA?
		if(!empty($_SESSION['SBCScart']['produto']))
		{
			










          // OLHE PARA O ITEM
			foreach(($_SESSION['SBCScart']['produto']) as $SBCSproduct)
			{
				



				// SIM NOS ACHAMOS
				if($SBCSitem == $SBCSproduct['item']) {

					$SBCSexist = true;

					break;
				}
				//$IDENTIF_PROD++;
			
			
			
			
			
			
            
			 } //##########  FIMMMMMM foreach($_SESSION['SBCScart']['produto'] as $SBCSproduct)
			
			
			
			
			
			
			
			
			
		}
		
		

		//Se encontramos mesmo item
		if($SBCSexist) //SE ALGUM PRODUTO JA EXISTE
		{
		
			// ATUALIZAR  QUANTIDADE
			$_SESSION['SBCScart']['produto'][$SBCSitem]['quantity'] += $SBCSquantity;
			
			            
			$_SESSION['SBCScart']['produto'][$SBCSitem]['subtotal'] += $SBCSsubtotal; //testessss  ACRESCENTEI ESTE

			
		} else {
					

		    $SBCSuniquid = rand();//aleatoriooooo ID UNICA


			// If we do not found, INSERIR NOVO
			$SBCSmycartrow = array(
				'item' => $SBCSitem,
				'unitprice' => $SBCSprice,
				'quantity' => $SBCSquantity,
				'id' => $SBCSuniquid,
				'subtotal' => $SBCSsubtotal //testessss  ACRESCENTEI ESTE

			);
			

			
			// SE SESSAO NAO EXISTE, CRIAR NOVA
			if (!isset($_SESSION['SBCScart']))
				$_SESSION['SBCScart'] = array();

			
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

	}
	
            
            
			
			
			
            
          



			/////////////////////////////////////
			// SE CART  is empty
			/////////////////////////////////////
			if (!isset($_SESSION['SBCScart']['produto']) || (count($_SESSION['SBCScart']['produto']) == 0)) { 
			

            
			/////////////////////////////////////
			// If CART NAO ESTIVER empty ---- SE EXISTE PELO MENOS 1 PRODUTO
			/////////////////////////////////////	
			} else {
			
			

			
			
			VVVVV(); //function do inicio VALOR FINAL
			
			$ARRAYGERAL = array(); //FORA MESMO
            //###################################################### PARA VALOR TOTAL___DADOS GERAIS___ESTA DENTRO SE EXISTIR PELO MENOS UM PRODUTO
			if (isset($_SESSION['SBCScart']['DADOSGERAIS'])){ //################## SE JA EXISTE SESSAO___DADOSGERAIS
			
			  $VALORFINAL = 0;//ok---pra limpar
			  $NUMPEDIDO;
			  
			  	  
                         foreach ($_SESSION['SBCScart']['produto'] as $itemID => $itemPEGARSUBS) {//_______pega TODOS SUBTOTais DE produtos E SOMA
                                               $VALORFINAL += $itemPEGARSUBS['subtotal'];
											   
											   
											 
											  
                                            }//Fim FOREACH__________________________________________________




                               $ARRAYGERAL = array(//________________
				                    'valorfinal' => $VALORFINAL,
				                    'NUMPEDIDO' => $NUMPEDIDO
			                   );//__________________________________


						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $VALORFINAL;

			
			}else{//__________se NAO EXISTE____CRIE #####################################
				

                $VALORFINAL = $SBCSsubtotal;
			    $NUMPEDIDO= rand();//aleatoriooooo ID UNICA  5 NUM
			   
			  						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $SBCSsubtotal;
						            $_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO'] = $NUMPEDIDO;

			  
				$ARRAYGERAL = array(//_______________
				'valorfinal' => $SBCSsubtotal,
				'NUMPEDIDO' => $NUMPEDIDO

			);//____________________________________
			
				
			}//####################################################################### FIIIMMMM DO __PARA VALOR TOTAL___DADOS GERAIS
			
			

			
			
			
			
			gr();

			

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



							// SE NAO LISTA COM QUANTIDADE 0 ZERO
							if($SBCSitem['quantity']!=0) {

								
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

							}//fim quantidade DIFER ZERO
							$linenumber++;
				   } // FIM FOREACH SBCSCART
      
	  
	  //###############################################
	  
	  
	  
    } //FIMM CART NAO ESTIVER empty___(S_POST  $_POST___$_POST) no inicio
    
	
	//######################################################################################################################################

	  
	
	}else{
		echo "QUANTIDADE_nao_trabalhada";
	}




	

	break;
		//*************************************************************** FIMMMM____CASE 'ADD' ******************************************************

	
	
	
	
	
	
	
	
//_________________________LA DO carrinho.JS
case 'criagetCARRINHO':


	echo gr(); //funcao do array()

	break;//___________________________________
			//**************************************** FIMMMM____CASE 'criagetCARRINHO' ******************************************************

	
	
	
	
	
	
	
	
	
	
	
	
	//_________________________LA DO carrinho.JS
case 'DELETARITEM':

    //pode ser defin como ID se preferir da no mesmo
	//aqui e com SE FOSSE === $_POST['id']
	// MAS ASSIM E MAIS SEGURO___TA FILTRANDO


	$key = filter_input(INPUT_POST, 'itemname', FILTER_SANITIZE_STRING);  //produto e do___parametro __ carrinho.JS
	$key = (trim($key));

	
	//SE EXISTE KEY == SIGNIF Q EXISTE o PRODUTO entao
	if(isset($_SESSION['SBCScart']['produto'][$key])):
	      
		  
      unset($_SESSION['SBCScart']['produto'][$key]); //EXCLUI apenas o INDICE KEY
	
	antes();
		  
	endif;//_________________________________
	 
	
	
	
	
	
	
	
	
	
break;
		//***************************************************************FIMMM CASE 'DELETAR_ITEM' ******************************************************






	
	case ("VERIFI_before_bebidas") :
	
		
	if(!empty($_SESSION['SBCScart']['produto'])) {
			echo json_encode("existe_produto");

		}else{  //NAO EXISTE PRODUTO AINDA____p ESBARRAR de IR P PAGINAS DE BEBIDAS
			echo json_encode("carrinho_vazio");
			

		}	
		
	
	
	
	break;
//*******************************************FIMMM CASE 'VERIFI__before_DE_GO_bebidas' ******************************************************

	
	
	
	
	
    case ("VERIFI_before_CIELO") :

	
		
		if(!empty($_SESSION['SBCScart']['produto'])) {
			echo json_encode("existe_produto");
			
		}else{  //NAO EXISTE PRODUTO AINDA____p ESBARRAR de IR P PAGINA CIELO
			echo json_encode("carrinho_vazio");
		}	
		
	
	break;
//*******************************************FIMMM CASE 'VERIFI__before_DE_GO_CIELO' ******************************************************

	
	

	//___________abaixo quando acao NAO FOR NADA
	default:
	break;
	
}
//__________________________________________________________________













function antes(){
	
	
	        
				VVVVV(); //function do inicio VALOR FINAL

			
			$ARRAYGERAL = array(); //FORA MESMO
            //###################################################### PARA VALOR TOTAL___DADOS GERAIS___ESTA DENTRO SE EXISTIR PELO MENOS UM PRODUTO
			if (isset($_SESSION['SBCScart']['DADOSGERAIS'])){ //################## SE JA EXISTE SESSAO___DADOSGERAIS
			
			  $VALORFINAL = 0;//ok---pra limpar
								  
                         foreach ($_SESSION['SBCScart']['produto'] as $itemID => $itemPEGARSUBS) {//_______pega TODOS SUBTOTais DE produtos E SOMA
                                               $VALORFINAL += $itemPEGARSUBS['subtotal'];
											   
											   
											 
											  
                                            }//Fim FOREACH__________________________________________________

                               $ARRAYGERAL = array(//________________
				                    'valorfinal' => $VALORFINAL,
				                    //NAO PRECISA COLOCAR NUMPEDIDO HERE POIS JA FOI GERADO LA EM CIMA

			                   );//__________________________________


						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $VALORFINAL;

			
			}else{//__________se NAO EXISTE____CRIE #####################################
				

                $VALORFINAL = $SBCSsubtotal;
			  
			  						$_SESSION['SBCScart']['DADOSGERAIS']['valorfinal'] = $SBCSsubtotal;

			  
				$ARRAYGERAL = array(//_______________
				'valorfinal' => $SBCSsubtotal,
								                    //NAO PRECISA COLOCAR NUMPEDIDO HERE POIS JA FOI GERADO EM CIMA


			);//____________________________________
			
				
			}//####################################################################### FIIIMMMM DO __PARA VALOR TOTAL___DADOS GERAIS
			
			

			
			
			
		
			
			
			
 	//depois q criada a SESSAO carrinho---comeca a contar
    $jsonCart['count'] = count($_SESSION['SBCScart']['produto']); //CONTAR 
	
	//QUANTOS ITENS TU TENS NA SESSAO carrinho__*** PARA LISTAR no MENU
    //$jsonCart['totalcarrinho'] = 0; //__*** PARA LISTAR no MENU
 
 
 
 
			foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg):

			
						$jsonCart['dados'][] = array(
						
						'itemname' => $itempeggg['item'], // AQUI VAI SER USADO FRONT END___AJAX RETORNO efeitos___NAO E SESSAO
						 'qtd' => $itempeggg['quantity'],
                         'subtotal' => $itempeggg['subtotal'],
                          'id' => $itempeggg['id']
						  
						 );
						
  
  

			
			                    endforeach;

			$jsonCart['valortotal'] = ($_SESSION['SBCScart']['DADOSGERAIS']['valorfinal']);

					echo json_encode('OK');


			
	}





