


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
echo $_SESSION['ultimoClick']."     =====ultimo clique um <br>";

echo $tempoAtual - $_SESSION['ultimoClick']."  -----   olha hora <br>";

}//-----------------------------------------------------------------------------------------------------------------FIM----2

}else{//--------------------ELSE 1

$_SESSION['ultimoClick'] = time();
echo $_SESSION['ultimoClick']."     =====ultimo clique dois <br>";

}//------------------------------------------------------------------------------FIM 1------------------------------------------------------------------


//########################################################################################################## FIM CONTROLE TEMPO SESSAO INATIVA
	

} else {
	
	
	
    $logged = 'out';    //
	
	
	
	
	
	
	
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























<?php
 


 if (login_check($mysqli) == true) { //-----------------------------------------------------------------------------------################################################################################################################################################################################################################################################################################################################################################################################################################
		
		
		//print_r($_SESSION); //testes
   //exit; //testes
	
	
	


$curl = curl_init();

//curl_setopt($curl, CURLOPT_HTTPHEADER, array('MerchantId: ????????????????????????????????????????????'));  //IDENTIFI UNICO da LOJA
//curl_close($curl);



curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'MerchantId: ????????????????????????????????????????????',
    'Content-Type: application/json'
));




?>






<?php
$order = new stdClass();
$order->OrderNumber = $_SESSION['SBCScart']['DADOSGERAIS']['NUMPEDIDO'];  //enviado por mim -- num PEDIDO
$order->SoftDescriptor = '';

$order->Cart = new stdClass();
$order->Cart->Discount = new stdClass();
$order->Cart->Discount->Type = 'Percent';
$order->Cart->Discount->Value = 0;










//########## CART COMPRAS

//$order->Cart->Items = array();
//$order->Cart->Items[0] = new stdClass();


//print_r(array_keys($_SESSION['SBCScart']['produto']))."____________________________printr";
		

	
	
	
 	//depois q criada a SESSAO carrinho---comeca a contar
    $quantosprodutos = count($_SESSION['SBCScart']['produto']); //CONTAR 
	//echo "QUANTOS PRODUTOS  ==  ".$quantosprodutos."    ///";
	
	
	
	
	//echo "POSICAO INDICE == ".array_search("14 bis",array_keys($_SESSION['SBCScart']['produto'] ) )."___  ////  ";

	
	
	
	
	$order->Cart->Items = array();

	$indexprodutos = 0;
	
	
	
	
	
	
		//$ita = array();

	//$item = array();

	foreach($_SESSION['SBCScart']['produto'] as $item => $itempeggg):
//echo $item;


   // echo "<br>".$key . ":" . $item. "<br>";
	
		
     
	$produto[] = $itempeggg['item'];
	$unitprice[] = $itempeggg['unitprice'];
	$quant[] = $itempeggg['quantity'];
	
	
   //    print_r($item."  --  ".$unitprice."  --  ".$quant."   ////");
	
	endforeach;	

//echo "  go  ".$produto[$indexprodutos]."  ----  ".$quant[$indexprodutos]."  ----  ".$unitprice[$indexprodutos]."  // --  ";

//exit; //testes

	
											
do{


      //exit;
 if(!isset($order->Cart->Items[$indexprodutos])){
	 
$order->Cart->Items[$indexprodutos] = new stdClass();

$order->Cart->Items[$indexprodutos]->Name =  $produto[$indexprodutos];
$order->Cart->Items[$indexprodutos]->Description = '';
$order->Cart->Items[$indexprodutos]->UnitPrice = $unitprice[$indexprodutos];
$order->Cart->Items[$indexprodutos]->Quantity = $quant[$indexprodutos];
$order->Cart->Items[$indexprodutos]->Type = 'Asset'; //Material Físico  
//$order->Cart->Items[$indexprodutos]->Sku = 'sku backoofc cielo';
$order->Cart->Items[$indexprodutos]->Weight = 0 ;//peso gr

//echo "index prod == ".$indexprodutos."____     ///";
 }
 
 




     $indexprodutos++;

     }while($indexprodutos < $quantosprodutos);




//exit; //testes

                  
								
	  
	  
	  
	  
 /* Aplicando a biblioteca PagSeguro 
        list($order, $cart) = $this->model_payment_pagseguro->getCart();
        $produtos = array();
		
        foreach ($cart as $item) {
            $produtos[] = array(
                'id'         => $item['product_id'],
                'descricao'  => $item['name'],
                'quantidade' => $item['quantity'],
                'valor'      => $item['total'] / $item['quantity'],
                'frete'      => 0,
            );
        }
*/













//######### INFO sobre a ENTREGA
$CEP  = preg_replace("/[^0-9]/", "", $_SESSION['clie']['cep']); // DEIXAR NUMBERS ONLY no CEP POSTAL P CIELO


$order->Shipping = new stdClass();
$order->Shipping->Type = 'WithoutShippingPickUp'; //sem frete ---ret  na store
$order->Shipping->SourceZipCode =  $CEP;          //CEP de origem do carrinho de compras.
$order->Shipping->TargetZipCode =  $CEP;  //CEP do endereço de entrega do comprador.



$order->Shipping->Address = new stdClass();
$order->Shipping->Address->Street =  $_SESSION['clie']['endereco'];
$order->Shipping->Address->Number =  $_SESSION['clie']['num'];
$order->Shipping->Address->Complement =  $_SESSION['clie']['compl'];
$order->Shipping->Address->District =  $_SESSION['clie']['bairro'];
$order->Shipping->Address->City =  $_SESSION['clie']['cidade'];
$order->Shipping->Address->State = 'SP';



$order->Shipping->Services = array();
$order->Shipping->Services[0] = new stdClass();
$order->Shipping->Services[0]->Name = 'Servico de entrega';
$order->Shipping->Services[0]->Price = 0;  //preço entreg
$order->Shipping->Services[0]->DeadLine = 1; //prazo de entrega em dias




//##### INF sobre PAGAMENT

$order->Payment = new stdClass();
$order->Payment->BoletoDiscount = 0;
$order->Payment->DebitDiscount = 0; // desconto




//info SOBRE CLIENTES

$TEL_OU_CEL_only_numbers  = preg_replace("/[^0-9]/", "", $_SESSION['clie']['tel/cel']); // DEIXAR NUMBERS ONLY  P CIELO



$order->Customer = new stdClass();
//todos itens here sao CONDICIONAIS

//$order->Customer->Identity = '???????????'; //cpf ou cnpj
//$order->Customer->FullName = 'Fulano Comprador da Silva';
$order->Customer->Email =  $_SESSION['clie']['email'];
$order->Customer->Phone =  $TEL_OU_CEL_only_numbers;




//INFO SOBRE INFO CONFIGURAVEIS do PEDIDO

$order->Options = new stdClass();
$order->Options->AntifraudEnabled = false;

//$order->Options->ReturnUrl = "http://www.pizzariaanapaula.com.br/CIELO---SSL/EX_URL_NOTIFICACAO_CIELO.php"; //ESTE SO ESTA NO MANUAL EM____JSON test

//$order->Options->ReturnUrl = "http://www.pizzariaanapaula.com.br/CIELO---SSL/URL-CIELO-RETORNO-HTML.html"; //ESTE SO ESTA NO MANUAL EM____JSON test






$order->Settings = new stdClass(); //add ESTA CLASS___manual cielo
$order->Settings->checkoutUrl = 'https://cieloecommerce.cielo.com.br/transacional/order/index?id={id}'; //add este
$order->Settings->Profile = 'CheckoutCielo';
$order->Settings->integrationType = 'Post';









//$curl = curl_init(); //INICIAR CURL______abrir CURL






//curl_setopt($curl, CURLOPT_HTTPHEADER, array('MerchantId: ????????????????????????????????????????????'));  //IDENTIFI UNICO da LOJA



// CURLOPT_CONNECTTIMEOUT 
// o tempo em segundos de espera para obter uma conexão 
//curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5); 

// CURLOPT_TIMEOUT 
// o tempo máximo em segundos de espera para a execução da requisição (curl_exec) 
curl_setopt($curl, CURLOPT_TIMEOUT, 30); 

//curl_setopt($curl, CURLOPT_SSLVERSION, 4);  //uns dizem q cielo mudou do 3 para o 4
//curl_setopt($curl, CURLOPT_SSLVERSION, 1); //uns dizem q cielo usa este



curl_setopt($curl, CURLOPT_URL, 'https://cieloecommerce.cielo.com.br/api/public/v1/orders');  //ENVIAR DO CART para lá
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($order));

//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); //adicionei ESTE

curl_setopt($curl, CURLOPT_HTTPHEADER, array(

   'MerchantId: ????????????????????????????????????????????',
    'Content-Type: application/json'
));










$response = curl_exec($curl); //igual itens ACIMA CURL

//echo curl_error($curl); //testes
//curl_close($curl); //FECHAR curl

//print_r($curl);

     //print_r($response); //testes      
	 //  exit; //testes



//IMPORTANTE
$jsonparaphp = json_decode($response); //TRANSFORMAR DADOS___JSON EM VARIAVEL PHP_____ai da pra pegar atraves de EX:____ $jsonparaphp->Payment->DebitDiscount;
//echo $jsonparaphp->settings->checkoutUrl;


//echo "----------------------------------------";

 // print_r($jsonparaphp);//testes
  
         // print_r($jsonparaphp);//testes
		 
		 
		 //print_r($_SESSION); //testes
             //   exit; //testes




        
        curl_close($curl);







        if ($response) //CASO DER CERTO
        {
               // return $response;
				//$json = json_decode($response); //ENVIAR__CURL
				
				
				//############# AQUI ENVIA PARA PAG PAG CIELO ----https://cieloecommerce.cielo.com.br/api/public/v1/orders.....ID GERADO
				
				// echo $jsonparaphp->settings->checkoutUrl; //testes
				
				
				//print_r($jsonparaphp); //testes
				
				

				
				
				
				
				$_SESSION['clie']['myses'] = session_id();  // GET SESSION_ID____para use POSTERIOMENTE
				
				
				
				
				
			      header ("location:".$jsonparaphp->settings->checkoutUrl); //COLOQUEI PARA REDIRECIONAR CLIENTE PARA___CIELO

        }
        else
        {
                //return curl_error($curl);
        }










		
		} else {  //--------------------------
		################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################################ 


//echo "---------deslogado   ";

 //require_once '../partes/FOOTER.php';
 
  } //--------------------------########################################## FIM______AREA___
	//-----------------------------------------------------------------------------------------------------------------------
		












         













