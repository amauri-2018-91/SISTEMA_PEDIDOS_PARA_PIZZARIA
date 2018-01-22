
 var selecao = 1; 
	
	
	
	
$(document).ready(function()
{/***@desc- retrasa el evento keyup*@param fn - function*@param ms - milisegundos que queremos retrasar*/$.fn.delayPasteKeyUp = function(fn, ms)
{ var timer = 0;$(this).on("keyup paste", function(){clearTimeout(timer);timer = setTimeout(fn, ms);}); };$("#INTEIRO").prop('checked', true); 
$('#autdois').hide(); $(".container > .row > #divinteiro").css("background-color","#F93"); $(".container > .row > #divmeia").css("background-color","#999"); 


$("#INTEIRO, #MEIA").click(function () {if ($("#INTEIRO").is(":checked")) {selecao = 1;  $(".container > .row > #divinteiro").css("background-color","#F93"); 
$(".container > .row > #divmeia").css("background-color","#999");  }else if ($("#MEIA").is(":checked")) {selecao = 2; $(".container > .row > #divinteiro").css("background-color","#999"); $(".container > .row > #divmeia").css("background-color","#F93");
 }});  
 
 $("#divinteiro").click(function(aa) {
	 
	 
	 $("#INTEIRO").prop('checked', true);$("#MEIA").prop('checked', false); selecao = 1;  $(".container > .row > #divinteiro").css("background-color","#F93"); $(".container > .row > #divmeia").css("background-color","#999");  }); 
	 
	 $("#divmeia").click(function(bb) {
 $("#INTEIRO").prop('checked', false);$("#MEIA").prop('checked', true); selecao = 2; $(".container > .row > #divinteiro").css("background-color","#999"); $(".container > .row > #divmeia").css("background-color","#F93"); });
  //$(document).delegate("INTEIROdiv, MEIAdiv", "click", function() {
		
$("input[name=autocomplete]").delayPasteKeyUp(function() {
	 
		$.ajax({type: "POST",url: "http://www.pizzariaanapaula.com.br/admin/app/instancias/autocomplete.php",data: "autocomplete="+$("input[name=autocomplete]").val()+"&selecao="+selecao,contentType: "application/x-www-form-urlencoded;charset=utf-8",


success: function(data) {if(data){var json = JSON.parse(data),html = '<div class="list-group">';if(json.res == 'full'){
for(datos in json.data){html+='<a id="escolheu" href="#" onclick="info('+json.data[datos].id+',\''+json.data[datos].nome+'\','+json.data[datos].valor+',\''+json.data[datos].prod+'\')" class="list-group-item">'; html+='<h4 class="list-group-item-heading">' + json.data[datos].nome+'          R$ '+formatReal(json.data[datos].valor)+'</h4></a>';

 }}else{html+='<a id="escolheu" href="#" class="list-group-item">';html+='<h4 class="list-group-item-heading">Sem resultados para a busca '+$("input[name=autocomplete]").val()+'</h4>';html+='</a>';}html+='</div>';$("#busqueda").html("").append(html);} } });}, 500);




$(".LINHATOTAL > td > button").hide(); // INICIAR SEM APARECER BOTAO FECHARPEDIDO____e___CANCELARCOMPRA
document.getElementById("VAIPAGAR").disabled = true;
document.getElementById("CALCULARTROCO").disabled = true;
document.getElementById("TROCO").disabled = true;/*  --- */





$('#CLOSEDLIST').on('click', function(){
	

	   					$("input[name=autocomplete]").val(''); //retirar digitos apos concluir
							$(".list-group").hide();   //retirar LISTA ABAIXO busca q Tinha aberto
						

		$("#escolheu").removeClass("active");
		$(this).addClass("active");
});









//FECHAR COMANDA______________________

		//FECHAR PEDIDO
		$(document).on('click', '.FECHARPEDIDO', function(e){

			//REQUISICAO____pegar o ID:key == clicado
			$.post('pasta_carrinho/carrinho.php', {acao: 'FECHOU_COMANDA', }, function(retorno_FECHARPEDI){ 
			
			if(retorno_FECHARPEDI == 'OK_FECHOU_PEDIDO'){
				//funcao logo abaixo
             getCART_FORMATADO(0); // passar value zero	
			 	
				OBTERBD(); // ATUALIZAR EXIB DOS  PEDIDOS    no script  ajax.js   como este tmb esta no index consegue acessar a function no ajax.js
				
	     
					
			}
			
			}, "json"); // NO FORMATO JSON
			return false;
		});
		
	
		
		
		
		
		
		
		
		
		$(document).on('click', '.CANCELARPEDIDO', function(e){

			//REQUISICAO____pegar o ID:key == clicado
			$.post('pasta_carrinho/carrinho.php', {acao: 'CANCELAR_COMPRA', }, function(retorno_EXCLUI_COMPRA){ 
			
			if(retorno_EXCLUI_COMPRA == 'OK_DESISTIU_do_PEDIDO'){

			 getCART_FORMATADO(0);// passar value zero	

			}
			
			}, "json"); // NO FORMATO JSON
			return false;
		});
		
	
		
		
		
			
		
		
		
		
		
$(document).on("click" , ".CALCULARTROCO",  function(a){
				 CALCULAR__o__TROCO();
});



		







$(document).on("click", "#escolheu", function(){

   $('html, body').animate({
scrollTop: 200
}, 700);



  
	$("input[name=autocomplete]").val(''); $(".list-group").hide();
	$("#escolheu").removeClass("active");$(this).addClass("active");
	
	})








documento = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);var BOTAOPagar = $("#botaopagar");
BOTAOPagar.text("carrinho Vazio");$("#CART_ALL").on('click', '#REMOVER_ITEM', function(e){var key = $(this).attr('data-id');





$.post('pasta_carrinho/carrinho.php', {acao: 'DELETARITEM', itemname:key},

 function(retorno){
	 
	 if(retorno == 'OK'){
		 
		 
		 
document.getElementById("TROCO").value = "";
document.getElementById("VAIPAGAR").value = "";
		 
GET_ITENS();}}, "json");


return false;});








function GET_ITENS(){
	
	$.post('pasta_carrinho/carrinho.php', {acao: 'criagetCARRINHO'}, getCART_FORMATADO, "json");
}GET_ITENS(); });




function getCART_FORMATADO(data){var carrinho = $("#CART_ALL"); var tbody = carrinho.find("tbody");var TOTALCARRINHO = carrinho.find("#TOTALCART");var CANCELARCOMPRA = carrinho.find('.CANCELARPEDIDO');
var FECHARPEDIDO = carrinho.find(".FECHARPEDIDO");var tr = '';

  $("#qtdprod").val("1");
	  $('input[name= "qtd"]').value='1';
	  
	  
	  
if(data.count !== 0 && data.count > 0){

	$.each(data.dados, function(i, val){

		tr += '<tr>'; tr += '<td>'+data.dados[i].itemname+'</td>'; tr += '<td>R$ '+( formatReal(data.dados[i].unitprice))+'</td>'; tr += '<td>'+data.dados[i].qtd+'</td>';
tr += '<td>R$ '+( formatReal(data.dados[i].subtotal))+'</td>'; tr += '<td> <a href="#" id="REMOVER_ITEM" data-id="'+data.dados[i].itemname+' "  class="tiny secondary button"> <span class="center">EXCLUIR</span></a></td>';tr += '</tr>'; });

PASS_valor_TOTAL = (data.valortotal);




$(".LINHATOTAL > td > button").show(); TOTALCARRINHO.show(); TOTALCARRINHO.text("Total R$: "+( formatReal(data.valortotal)));

document.getElementById("VAIPAGAR").disabled = false;
document.getElementById("CALCULARTROCO").disabled = false;
document.getElementById("TROCO").disabled = false;/*  --- */

}else{  

document.getElementById("TROCO").value = "";
document.getElementById("VAIPAGAR").value = "";
document.getElementById("VAIPAGAR").disabled = true;
document.getElementById("CALCULARTROCO").disabled = true;
document.getElementById("TROCO").disabled = true;/*  --- */

			  
$(".LINHATOTAL > td > button").hide(); TOTALCARRINHO.show(); TOTALCARRINHO.text("");

} 



tbody.empty().append(tr);}var idprodutomet_primer;var nomeprodutomet_primer;var valorprodutomet_primer;var qulmet_primer; var status  = $('#status');function info(id,nome,valor,prod){var inputqtde = $('input[name= "qtd"]'); var quantidade = document.getElementById("qtdprod");var idprod = id;


























if(selecao == 1){
	
	$.ajax({url:'pasta_carrinho/carrinho.php',type:'post',
data:'&idpr='+id+'&item='+nome+'&price='+valor+'&quantity='+quantidade.value+'&qul='+prod+'&acao=add', dataType:"json", contentType: "application/x-www-form-urlencoded;charset=utf-8", 

beforeSend: function(jqXHR){
	jqXHR.overrideMimeType('application/x-www-form-urlencoded; charset=utf-8');},
	
 success: function(data){
	 
	 if(data == 'QUANTIDADE_nao_trabalhada'){ 
                			 

	 
	 
	 }else{
		 
		 
document.getElementById("TROCO").value = "";
document.getElementById("VAIPAGAR").value = "";
		 	//data.overrideMimeType('application/x-www-form-urlencoded; charset=utf-8');

		 getCART_FORMATADO(data);  }},
 
 
 
  complete: function(data){
	 
 } ,
 
 error: function(data){


   }
 
 
 
 
 }); }
 
 
 
 
 
 
 if(selecao == 2){idprodutomet_primer = id;nomeprodutomet_primer = nome;valorprodutomet_primer = valor;qulmet_primer = prod; } idprodutomet_primer = idprodutomet_primer;nomeprodutomet_primer = nomeprodutomet_primer;valorprodutomet_primer = valorprodutomet_primer;qulmet_primer = qulmet_primer; 









if(selecao === 2){selecao = 3;return false;}

 if(selecao == 3){

 $.ajax({ url:'pasta_carrinho/carrinho.php',type:'post',
data:'&idpmetprim='+idprodutomet_primer+'&nomeprodmetprim='+nomeprodutomet_primer+'&priceprim='+valorprodutomet_primer+'&qualprim='+qulmet_primer+'&quantity='+quantidade.value+'&idprodsec='+id+'&nomeprodsec='+nome+'&price='+valor+'&qualsec='+prod+'&acao=add',dataType:"json", contentType: "application/x-www-form-urlencoded;charset=utf-8",

 beforeSend: function(jqXHR){
jqXHR.overrideMimeType('application/x-www-form-urlencoded; charset=utf-8');},




 success: function(data){ 
 
 selecao = 1; //inteira volta padrao
 
 
 
 
document.getElementById("TROCO").value = "";
document.getElementById("VAIPAGAR").value = "";
 
 
                                  $('input[name= "qtd"]').value='1';
                			   $("#qtdprod").val("1");

				
			   
			   $(".container > .row > #divinteiro").css("background-color","#F93");  //ativo
               $(".container > .row > #divmeia").css("background-color","#999"); //desativado
			   
			   		$("#INTEIRO").prop("checked", true);

			   
 
  getCART_FORMATADO(data);},complete: function(data){ inputqtde.val("1");  
 } }); }} 
 





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

























/*
var int = getMoney( test );
//alert( int );


console.log( formatReal( 139 ) );
console.log( formatReal( 19990020 ) );
console.log( formatReal( 12006 ) );
console.log( formatReal( 111090 ) );
console.log( formatReal( 1111 ) );
console.log( formatReal( 120090 ) );
console.log( formatReal( int ) );
*/

//##############################################################




//##############################################################


           function  CALCULAR__o__TROCO(){
			   
			   
			   var VAIPAGAR_tirou_VIRGULAS = $("#VAIPAGAR").val();
			   				 //console.log(VAIPAGAR_tirou_VIRGULAS);
							 
               VAIPAGAR_tirou_VIRGULAS = VAIPAGAR_tirou_VIRGULAS.replace(/\D/g, ""); // RETIRAR FORMATACAO DA VIRGULAS Q VEM LA DO TABLE.PHP___SO NUMERO
			   
			   
				 
				 //console.log(VAIPAGAR_tirou_VIRGULAS);
				 
				 
				 
			   
			   

			if( document.querySelector(".VAIPAGAR").value !==  null ){
				 

				 QUALTROCODEVODAR = VAIPAGAR_tirou_VIRGULAS - PASS_valor_TOTAL;
				 
				// alert(QUALTROCODEVODAR);
				 document.querySelector(".TROCO").value = ("TROCO R$  "+(formatReal(QUALTROCODEVODAR)));
				 				// alert(QUALTROCODEVODAR);

			
			}else{
				
				 document.querySelector(".TROCO").value  = 'error';

			}
			
					
			


}


//##############################################################
//##############################################################
//##############################################################




















