





<meta charset="utf-8"> <!-- ESTE E O PADRAO PRA o BRASIl é ÇÇ -- nãu usar utf-8 -->
   


<!--  background-color:blue;  -->
<ul class = "" id="CART_ALL" style="position:relative; top:50%; min-height:10%; max-height:30%">
 
<li>
<div style="position:relative; min-height:30%; width:100% ; top:0%; left:0%">

<table class="table"> <thead style="background-color:brown; font-size:16px; color:#FFF"> <tr><th>PRODUTO</th><th>Valor Unid.</th><th>Quant</th><th>Valor Subtotal</th><th>EXCLUIR</th>
</tr></thead><tbody style=" background-color:orange; font-weight:800" id="tbody"></tbody> <tfoot style="font-weight:800"><tr class="LINHATOTAL" style="background-color:#FFCAF2; vertical-align:central"><td class="CANCELAR" colspan="1"><button type="button"  class="CANCELARPEDIDO btn btn-danger">CANCELAR PEDIDO</button></td>  <td style="font-size:36px; height:100px" colspan="3" id="TOTALCART"></td>
<td class="" colspan="1"><button type="button"  class="FECHARPEDIDO btn btn-success">FECHAR PEDIDO</button></td> </tr>


<tr class="LINHASTROCO" > <td colspan="5"> <input type="number" onKeyPress="return(currencyFormat(this,',','.',event))" id="VAIPAGAR" class="VAIPAGAR"  placeholder="Valor à ser pago" style="height:35px; color:#000; background-color:#FDFAC1;font-weight:600; font-size:21px; font-family:'Lucida Console', Monaco, monospace" /> </td></tr>


<tr class="LINHASTROCO"> <td colspan="5"> <button type="button"  id="CALCULARTROCO" class="CALCULARTROCO btn btn-success">CALCULAR...</button> </td></tr>


<tr class="LINHASTROCO"> <td colspan="5"> <input type="text" disabled="disabled" id="TROCO" class="TROCO" style="height:35px; color:#000; background-color:#CF6;font-weight:600; font-size:21px; font-family:'Arial Black', Gadget, sans-serif" /> </td></tr>

 </tfoot></table>
 
 
 

 </div>  
 </li>
 </ul>
      
      <script>
	  
	  //#################################  fORMATAR   MOEDA ENQUANTO DIGITA______ATE 999 REAIS
	  //##################################
	  
	  //   DEIXAR ESTE FORMATAR MOEDA____QUE É PARA ____ENQUANTO DIGITAR VALOR_____QUE CLIENTE IRA PAGAR
      
      function currencyFormat(fld, milSep, decSep, e) {
		  
		  
		  
		  

var sep = 0;

var key = '';

var i = j = 0;

var len = len2 = 0;

var strCheck = '0123456789';

var aux = aux2 = '';

var whichCode = (window.Event) ? e.which : e.keyCode;

if (whichCode == 13) return true; // Enter

key = String.fromCharCode(whichCode); // Get key value from key code

if (strCheck.indexOf(key) == -1) return false; // Not a valid key

len = fld.value.length;

for(i = 0; i < len; i++)

if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;

aux = '';

for(; i < len; i++)

if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);

aux += key;

len = aux.length;

if (len == 0) fld.value = '';

if (len == 1) fld.value = '0'+ decSep + '0' + aux;

if (len == 2) fld.value = '0'+ decSep + aux;

if (len > 2) {

aux2 = '';

for (j = 0, i = len - 3; i >= 0; i--) {

if (j == 3) {

aux2 += milSep;

j = 0;

}

aux2 += aux.charAt(i);

j++;

}

fld.value = '';

len2 = aux2.length;

for (i = len2 - 1; i >= 0; i--)

fld.value += aux2.charAt(i);

fld.value += decSep + aux.substr(len - 2, len);

}

return false;

}
      
	  
	  
	    
	  //#################################
	  //##################################
                      </script>
       
                      
                      
                      
                      
                      
        
        