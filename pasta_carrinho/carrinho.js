// JavaScript Document
var selecao;  //ESTE DEVE SER FORA do READY msm___para INDEX BUTT GET
$(document).ready(function(e) { 


documento = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);


	  $("#botaopagar").click(function(){ 
	  
	  
	  
	  
	   if(documento == 'index.php?error=1'){

	  $.ajax({
  type: "POST",
  url: "pasta_carrinho/carrinho.php",
  data: "acao=VERIFI_before_bebidas",
  dataType:"json",
  
  success: function(possomudarpag){

	  if(possomudarpag =='carrinho_vazio'){
		  alert("SELECIONE ALGUM PRODUTO ANTES");
	  }else{
		  
		  window.location.href = 'bebidas.php';
	  }
	  
	  
	  
      }
	  
	  
	  });
	  
		
		}  else if(documento == 'bebidas.php'){
		  
		  $.ajax({
  type: "POST",
  url: "pasta_carrinho/carrinho.php",
  data: "acao=VERIFI_before_CIELO",
  dataType:"json",
  
  success: function(possomudarpag){
	  
	  
	  if(possomudarpag =='carrinho_vazio'){
		  
		  alert("SELECIONE ALGUM PRODUTO ANTES");
	  }else{
		  
		  
		  		  window.location.href = '/CIELO---SSL/REQUISICAO_CIELO.php';

	  }
	  
	  
	  
      }
	  
	  
	  });
		}
	  
	  
	  
 
 
		});
		
		








 var BOTAOPagar = $("#botaopagar"); BOTAOPagar.text("Carrinho Vazio");function DEFAULT_MET(){
selecao = 1;quantbotaoMET.hide();TEXTQUANT_MET.hide();quantbotaoINT.show();TEXTQUANT_INT.show();BUTT_ONLY_INT.show();}
var idprodutomet_primer;var nomeprodutomet_primer;var valorprodutomet_primer;var qulmet_primer;var quantbotaoINT = $(".qtdprodint");
 var TEXTQUANT_INT = $(".TEXTQUANT_int"); var quantbotaoMET = $(".qtdprodmet");var TEXTQUANT_MET = $(".TEXTQUANT_met");var BUTT_ONLY_INT = $(".RETWHEN_MET"); 
 quantbotaoMET.hide();TEXTQUANT_MET.hide(); quantbotaoINT.show(); TEXTQUANT_INT.show(); BUTT_ONLY_INT.show();selecao = 1;
$("button.selpizzmeia").click(function(){selecao++;if(selecao == 2){var pegarHIDDENDESTEmeia = this.name; 
idprodutomet_primer = $("#"+pegarHIDDENDESTEmeia+"idprodmet").val();
nomeprodutomet_primer = $("#"+pegarHIDDENDESTEmeia+"nomeprodmet").val();valorprodutomet_primer = $("#"+pegarHIDDENDESTEmeia+"valorprodmet").val();qulmet_primer = $("#"+pegarHIDDENDESTEmeia+"typemet").val();quantbotaoMET.show();TEXTQUANT_MET.show();quantbotaoINT.hide();TEXTQUANT_INT.hide();BUTT_ONLY_INT.hide();
 }
 
 
 
 if(selecao ==3){var pegarHIDDENDESTEmeia = this.name; var idprodutomet_secund = $("#"+pegarHIDDENDESTEmeia+"idprodmet").val();var nomeprodutomet_secund = $("#"+pegarHIDDENDESTEmeia+"nomeprodmet").val();var valorprodutomet_secund = $("#"+pegarHIDDENDESTEmeia+"valorprodmet").val();
var qulmet_secund = $("#"+pegarHIDDENDESTEmeia+"typemet").val(); var qtde = $("#"+pegarHIDDENDESTEmeia+"qtdprodmet").val(); var inputqtde = $('input[name= "qtd"]');var status  = $('#status');$.ajax({url:'pasta_carrinho/carrinho.php',type:'post',data:'&idpmet='+idprodutomet_secund+'&nomeprodmet='+nomeprodutomet_secund+'&price='+valorprodutomet_secund+'&qual='+qulmet_secund+'&idpmetprim='+idprodutomet_primer+'&nomeprodmetprim='+nomeprodutomet_primer+'&priceprim='+valorprodutomet_primer+'&qualprim='+qulmet_primer+'&quantity='+qtde+'&acao=add', dataType:"json", contentType: "application/x-www-form-urlencoded;charset=utf-8",
beforeSend: function(jqXHR){	jqXHR.overrideMimeType('application/x-www-form-urlencoded; charset=utf-8');},


success: function(data){
	
	
	
	if(data == 'QUANTIDADE_nao_trabalhada'){
		
		
		 alert("Não foi possível fazer a compra na quantidade desejada");inputqtde.val("1"); status.html('<div id=status> Nao temos a quantidade informada </div>').show('slow'); 
		 

		 }else if(data == 'HORARIO_nao_ATENDIDO'){
			 
			 
			 inputqtde.val("1");
			 
					 
		  var NAO_ATENDEMOS_NO_HORARIO = $("#NAO_ATENDEMOS_NO_HORARIO");
	      var parag = ''; //INICIA COMO VAZIO
		
 parag += '<h1> Desculpe: o horário que se pode realizar os pedidos é de DOMINGO à SEGUNDA das 18:00 hrs ás 23:50 hrs e nas SEXTAS E SÁBADOS das 18:00 hrs ás 00:50 hrs </h1> ';

            NAO_ATENDEMOS_NO_HORARIO.empty().append(parag);

  $("#myModal").on("show", function() {    //fio até o botão OK para fechar o modal quando mostrado
        $("#myModal a.btn").on("click", function(e) {
            console.log("button pressed");   // apenas como um exemplo ...
            $("#myModal").modal('hide');     // descartar o diálogo

        });
    });
	

	
    $("#myModal").on("hide", function() {    // remova os ouvintes de eventos quando o diálogo é fechada
        $("#myModal a.btn").off("click");
    });
    
	
	
    $("#myModal").on("hidden", function() {  // remover os elementos reais do DOM quando totalmente escondida
        $("#myModal").remove();
    });
    
	
	
	
    $("#myModal").modal({                    // conectar -se a funcionalidade modal efectiva e mostrar a caixa de diálogo
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // garantir o modal é mostrado imediatamente
    });
	
	
	
 
		 }else{
	
	
	alert("Produto adicionado");inputqtde.val("1"); DEFAULT_MET();getCART_FORMATADO(data);
	
	 }
		 
		 
		 
		 
	
	
	 }, 
	
	
	
	complete: function(data){inputqtde.val("1"); DEFAULT_MET(); } }); } });
	
	
	
	
	
	
	
	
	
	
	
	 $("button.bu").click(function(){ 





if(selecao == 1){var pegarHIDDENDESTE = this.name;var idproduto = $("#"+pegarHIDDENDESTE+"idprod").val();var nomeproduto = $("#"+pegarHIDDENDESTE+"nomeprod").val();var valorproduto = $("#"+pegarHIDDENDESTE+"valorprod").val();var qtde = $("#"+pegarHIDDENDESTE+"qtdprod").val(); var qul = $("#"+pegarHIDDENDESTE+"type").val();var inputqtde = $('input[name= "qtd"]'); var status  = $('#status');$.ajax({ url:'pasta_carrinho/carrinho.php',type:'post',data:'&idpr='+idproduto+'&item='+nomeproduto+'&price='+valorproduto+'&quantity='+qtde+'&qul='+qul+'&acao=add',dataType:"json", contentType: "application/x-www-form-urlencoded;charset=utf-8",
beforeSend: function(jqXHR){ status.hide('slow'); 	jqXHR.overrideMimeType('application/x-www-form-urlencoded; charset=utf-8');},



success: function(data){
	
	
	
	
	if(data == 'QUANTIDADE_nao_trabalhada'){
		
		
		 alert("Não foi possível fazer a compra na quantidade desejada");inputqtde.val("1"); status.html('<div id=status> Nao temos a quantidade informada </div>').show('slow'); 
		 
		 }else if(data == 'HORARIO_nao_ATENDIDO'){
			 
			 
			 inputqtde.val("1");
			 
			 
			 
			 
			 
			 
			 
			 
		  var NAO_ATENDEMOS_NO_HORARIO = $("#NAO_ATENDEMOS_NO_HORARIO");
	      var parag = ''; //INICIA COMO VAZIO
		
 parag += '<h1> Desculpe: o horário que se pode realizar os pedidos é de DOMINGO à SEGUNDA das 18:00 hrs ás 23:50 hrs e nas SEXTAS E SÁBADOS das 18:00 hrs ás 00:50 hrs </h1> ';

            NAO_ATENDEMOS_NO_HORARIO.empty().append(parag);

  $("#myModal").on("show", function() {    //fio até o botão OK para fechar o modal quando mostrado
        $("#myModal a.btn").on("click", function(e) {
            console.log("button pressed");   // apenas como um exemplo ...
            $("#myModal").modal('hide');     // descartar o diálogo

        });
    });
	

	
    $("#myModal").on("hide", function() {    // remova os ouvintes de eventos quando o diálogo é fechada
        $("#myModal a.btn").off("click");
    });
    
	
	
    $("#myModal").on("hidden", function() {  // remover os elementos reais do DOM quando totalmente escondida
        $("#myModal").remove();
    });
    
	
	
	
    $("#myModal").modal({                    // conectar -se a funcionalidade modal efectiva e mostrar a caixa de diálogo
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // garantir o modal é mostrado imediatamente
    });
	
	
	
	
	
	
	
	
			 
			 
			 
			 
			 
		 }else{
			 
			 alert("Produto adicionado");getCART_FORMATADO(data); } },
			 
			 
			 
			 
			 
			 
			 
			  complete: function(data){inputqtde.val("1"); }}); }}); $("#CART_ALL").on('click', '#REMOVER_ITEM', function(e){var key = $(this).attr('data-id');$.post('pasta_carrinho/carrinho.php', {acao: 'DELETARITEM', itemname:key}, function(retorno){ if(retorno == 'OK'){GET_ITENS();}}, "json");return false;});function GET_ITENS(){$.post('pasta_carrinho/carrinho.php', {acao: 'criagetCARRINHO'}, getCART_FORMATADO, "json");}GET_ITENS();function getCART_FORMATADO(data){var carrinho = $("#CART_ALL"); var tbody = carrinho.find("tbody"); var TOTALCARRINHO = carrinho.find("#TOTALCART");var tr = ''; if(data.count != 0 ){$.each(data.dados, function(i, val){tr += '<tr>'; tr += '<td>'+data.dados[i].itemname+'</td>';tr += '<td>'+data.dados[i].qtd+'</td>';tr += '<td>'+data.dados[i].subtotal+'</td>'; tr += '<td> <a href="#" id="REMOVER_ITEM" data-id="'+data.dados[i].itemname+' "  class="tiny secondary button"> <span class="center">EXCLUIR</span></a></td>';tr += '</tr>'; });}else{ tr += '<td colspan="4">Nenhum produto na lista</td>';} TOTALCARRINHO.text("Total R$: "+data.valortotal);if(documento=="index.php?error=1") {  if(data.valortotal == 0){ BOTAOPagar.text("Carrinho Vazio");}else if(data.valortotal > 0 && data.valortotal <= 99999 ){BOTAOPagar.text("R$"+data.valortotal+">Sel.Bebidas");}else{BOTAOPagar.text("Sel.Bebidas");} } 
if(documento=="bebidas.php") { if(data.valortotal == 0){ BOTAOPagar.text("Carrinho Vazio");}else if(data.valortotal != 0 && data.valortotal <= 99999 ){
BOTAOPagar.text("PAGAR R$ "+data.valortotal);}else{BOTAOPagar.text("PAGAR R$");}} tbody.empty().append(tr);	} 
}); //FIM READY FUNCTION






