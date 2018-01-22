// JavaScript Document

	var i = null;  // COMECA NULL_____SE CONFIRMAR Q TEM DADOS DO JSON abaixo___ai [0]__[1]__[2]...
	 window.onload = setInterval("OBTERBD()", 180000); //10.000 dez mil milisegundos == 10 segundos------180000 == 3 min
	
		
  
$(document).ready(function(){
	
	OBTERBD();
	
	

		
}); //FIM READY FUNCTION ---------------------------------------------------
//--------------------------------------------------------------------------


		
		
		
		
	function OBTERBD(){
		
		//alert('CUYY');
		
		
	$.ajax({
		dataType: 'json',
		type:'POST',		//Definimos o método HTTP usado
		url: "getDados.php",//Definindo o arquivo onde serão buscados os dados
		
		success: function(data){
			
			//alert(dados);
			
				getCART_FORMAT(data);

			
		},
		
		complete: function(data){
		
					//console.log("COMPLETE ==  "+data); //testes
		
		},
		
		error: function(data){
			
			//console.log("ERRORR ==  "+data);//testes
			
		}
		
	
	});
		
		
		
		}
		
	
			
			
		//-------------------------
		//-------------------------
		
		








//##################################################################
//###################################################################
//###################################################################

function getCART_FORMAT(data){
	
var pedido = $("#PEDIDO_ALL");

//-------------------------------------------- ADD
if(data.count != 0 ){

		$('#TABLE_PED_AQUI').empty();  // DEVE ESVAZIAR TABLE SEMPRE ANTES DO LAÇO DO...WHILE....PARA QUANDO ATUALIZAR
		 ord = 0;  // i ESTA FORA desta FUNCTION____PRA DAR ID AO BOTOES

	do{                //DO ____WHILE

				var HORA_do_PED = data[ord].data_e_hora.substr(11, 8); // ZERO È O PRIMEIRO ___SE TEM UM UNICO ITEM____E ZERO array
                var HORA_do_PED = HORA_do_PED.substr(0,(HORA_do_PED.length - 3)); //RETIRAR ___SEGUNDOS DA HORA DO PEDIDO
				

	var stringITENS = data[ord].itens,
     strx_ITENS = stringITENS.split('#@');// separamos só os que TIVER 2 SIMBOLOS #@ na seque___ISTO P NAO SOBRAR ARRAY__veja obrigado_pela...php

    array_DIVIDIDA_ITENS  = [];
	
	
	for(var a=0; strx_ITENS.length > a; a++ ){ //percorrer este para limpar
				strx_ITENS[a] = strx_ITENS[a].replace(/[#@]/g,''); //agora sim o q sobrou retirar # ou @
			}


array_DIVIDIDA_ITENS = array_DIVIDIDA_ITENS.concat(strx_ITENS);

var stringVALORunit = data[ord].valor_UNITARIO,
    strx_VALOR_UNIT   = stringVALORunit.split('#@');// separamos só os que TIVER 2 SIMBOLOS #@ na seque___ISTO P NAO SOBRAR ARRAY__veja obrigado_pela...php
	
    array_DIVIDIDA_VAL_UNIT  = [];

	for(var b=0; strx_VALOR_UNIT.length > b; b++ ){ //percorrer este para limpar
				strx_VALOR_UNIT[b] = strx_VALOR_UNIT[b].replace(/[#@]/g,''); //agora sim o q sobrou retirar # ou @
				
			}
	
array_DIVIDIDA_VAL_UNIT = array_DIVIDIDA_VAL_UNIT.concat(strx_VALOR_UNIT);










var string_SUB_QUANT = data[ord].quant_sub,
    strx_SUB_QUANT   = string_SUB_QUANT.split('#@');  // separamos só os que TIVER 2 SIMBOLOS #@ na seque___ISTO P NAO SOBRAR ARRAY__veja obrigado_pela...php
    array_SUB_QUA  = [];

			for(var c=0; strx_SUB_QUANT.length > c; c++ ){ //percorrer este para limpar
				strx_SUB_QUANT[c] = strx_SUB_QUANT[c].replace(/[#@]/g,''); //agora sim o q sobrou retirar # ou @
				
			}

array_SUB_QUA = array_SUB_QUA.concat(strx_SUB_QUANT);





var string_subTOTAL = data[ord].subtotal,
    strx_sub_TOTA   = string_subTOTAL.split('#@');// separamos só os que TIVER 2 SIMBOLOS #@ na seque___ISTO P NAO SOBRAR ARRAY__veja obrigado_pela...php
    array_SUBTOTAL  = [];

	for(var d=0; strx_sub_TOTA.length > d; d++ ){ //percorrer este para limpar
				strx_sub_TOTA[d] = strx_sub_TOTA[d].replace(/[#@]/g,''); //agora sim o q sobrou retirar # ou @
				
			}

			
array_SUBTOTAL = array_SUBTOTAL.concat(strx_sub_TOTA);







					array_DIVIDIDOS  = [];  //EESTE  E FORA MSM
					
				for( var i_ITENS=0, i_sub=0, i_sub_TOTAL=0, i_VAL_UNIT=0 ;    array_DIVIDIDA_ITENS.length > i_ITENS   ;      i_ITENS++, i_sub++, i_sub_TOTAL++, i_VAL_UNIT++, PASSSARR = false){
			      


					
			//DEIXA FINAL SEM </tr> LINHA MESMO____VAI FECHAR LAS no APPEND
			
		 array_DIVIDIDOS += '<tr><th>'+array_DIVIDIDA_ITENS[i_ITENS]+'</th><th>R$ '+(formatReal(array_DIVIDIDA_VAL_UNIT[i_VAL_UNIT]))+'</th><th>'+array_SUB_QUA[i_sub]+'</th><th>R$ '+(formatReal(array_SUBTOTAL[i_sub_TOTAL]))+'</th>    '

					if(array_DIVIDIDA_ITENS.length > i_ITENS + 1 ){
						PASSSARR = true;
					}

				   } //FIM____laço   FOR____________
					   
				 
				 
				 
				 
				 if(PASSSARR == false){ //________________________________________PODE LER ABAIXO
				$('#TABLE_PED_AQUI').append('<table class="TABLE"><thead> <tr style="background-color:brown"> <th>Itens</th><th>Valor Unid.</th><th>Quant</th><th>Valor Subtotal</th><th class="COLUNATOTAL">Total</th><th>Hora Pedido</th><th>outros</th></tr></thead> <tbody id="corpotable">'+array_DIVIDIDOS+'<td class="COLUNATOTAL_QUADRADO">R$ '+( formatReal(data[ord].total))+'</td><td class="HORAPED">'+HORA_do_PED+'</td> <td class="ORIGEMPED">'+data[ord].origem+'</td> </tbody><tfoot><tr class="LINHACLIENTE"><th>'+data[ord].nome_sob_cliente+'</th><th>'+data[ord].tel_de_cont+'</th><th colspan="3">'+data[ord].endereco+'</th><td>'+data[ord].proximo+'</td> <td class="" colspan="1"> <button type="button" data-id="'+i+'" id="'+i+'IDMARCAR" class="clasMARCAR btn btn-success" >JA FEITO</button></td> </tr> <tr class="TITLECLIEFOOT"> <th>Cliente</th><th>TEl</th> <th colspan="3">ENDEREÇO</th><th>REFERENCIA</th><th>outros</th> </tr></tfoot></table>'  );
									




//CSS____________________________
$('.TABLE').css({"width" : "85%" , "margin-bottom" : "75px" , "margin-top" : "75px" , "background-color" : "orange" , 'font-size' : '17px'});
$('.TABLE > thead').css({"background-color" : "brown" , 'color' : '#FFF'});
$('.TABLE > tbody').css({"background-color" : "orange" , 'font-weight' : '800' , "color":"black" });
$('.TABLE > tfoot').css({'font-weight': '800'});
$('.LINHACLIENTE').css({'background-color' : "#FCD9FF" , 'vertical-align' : 'central',  'color':'#039' , 'font-family':'Tahoma, Geneva, sans-serif'  });
$('.TITLECLIEFOOT').css({'background-color' : 'brown' , 'color' :'#FFF'});

$('.HORAPED').css({"background-color" : "#CCC" , 'color' : "#006" , 'font-size' : '19px' , "vertical-align" : "middle" });




if(data[ord].origem == "Entrega"){
	
$('.ORIGEMPED').css({"background-color" : "#755C59" , 'color' : "#FFF" , 'font-size' : '22px' , "vertical-align" : "middle" });
//$('.ORIGEMPED').html("Entrega");

}

if(data[ord].origem == "Balcão"){
	
$('.ORIGEMPED').css({"background-color" : "#755C59" , 'color' : "#FFF" , 'font-size' : '22px' , "vertical-align" : "middle" });
//$('.ORIGEMPED').html("Balcão");

}


$('.TABLE').css({"border" : "none" ,  "border-collapse" : "collapse"});
$('.TABLE > td, th').css({"border" : "1px solid #000"});
$('.TABLE > td:first-child, th:first-child').css({"border-left" : "none"});


$('.TABLE > tbody, thead, tfoot, td, th').css({"text-align" : "center"});

$('.COLUNATOTAL').css({"background-color" : "#360"});
$('.COLUNATOTAL_QUADRADO').css({"background-color" : "#DAFAC5" , "text-align" : "center" , "font-size" : "34px" });




//______________________________________

				
		ord++;  //ADD___LER PROX ITEM
		
		i_ITENS=0, i_sub=0, i_sub_TOTAL=0; // DEFAULT P COMECAR D NOVO___se AINDA TIVER MAIS 
							   
							   
							   
							   
				} //___________________________________________________IF PASSSAR__________TRUE
				
				
				
				

		}while( data.length > ord );












//########################################################
//########################################################   SOMAR TOTAL VALOR DO DIA e ITENS

//var quant = document.getElementsByName("valor[]");
var QUANTPEDIDOS = [];
//function somarValores(){
var TOTAL_DE_HOJE = 0;

 
for (var i=0; i<data.length; i++){
  
   		QUANTPEDIDOS[i] = parseInt(data[i].total);      
        TOTAL_DE_HOJE += parseInt(QUANTPEDIDOS[i]);
		
		
 }  



$("#RODAPE_PED_DE_HOJE").html("Soma Total do Caixa: R$  "+(formatReal(TOTAL_DE_HOJE)+"    ///   TOTAL DE PEDIDOS DE HOJE até AGORA: "+QUANTPEDIDOS.length ));
$('#RODAPE_PED_DE_HOJE').css({"position" : "relative" , "width" : "100%", "height" : "5%", "left" : "0%", "top" : "90%", "background-color" :"orange", "color" : "black", "font-weight" : "700" , "font-size" : "20px" });
$(".QUANT_PEDIDOS_DE_HOJE").html("N PEDIDOS: "+ QUANTPEDIDOS.length);
$('.QUANT_PEDIDOS_DE_HOJE').css({"position" : "relative" , "width" : "20%", "height" : "80%", "left" : "28%", "top" : "0%", "background-color" :"orange", "color" : "black", "font-weight" : "700" , "font-size" : "20px" });


		 }else{    //if(data.count IGUAL à 0 )...._____________________


 } 
 //---------------------------------------- fim if data.count


}
//-------------------- FIM FUNCTION
//------------------------------------------------------------
//------------------------------------------------------------




//#############################  FORMATAR MOEDA
//#############################

//var test = 'R$ 1.700,90';

function getMoney( str )
{
        return parseInt( str.replace(/[\D]+/g,'') );
}
function formatReal( int )
{
        var tmp = int+'';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

        return tmp;
}

//##############################################################
















	
	
	
	