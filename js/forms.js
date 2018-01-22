
var distnaoatend = false;var latcriadaclie = document.createElement("input");var longcriadaclie = document.createElement("input");var Notcadcriad = document.createElement("input"); function distancianaoatendida_jadis(){var TOTALERROS = $("#MENSAERRO");var parag = ''; distnaoatend = true;parag += '<h1> Desculpe: A pizzaria não faz entrega neste endereço </h1> '; parag += '<h1> Por isso não será possível prosseguir com seu cadastro</h1> ';parag += '<h1> Em caso de dúvidas entre em contato (11) ???? - ???? / ???? - ???? </h1> ';parag += '<h1> Possui outro endereço mais próximo ?? Atualize a página e tente novamente </h1> ';
TOTALERROS.empty().append(parag);$("#myModal").on("show", function() {$("#myModal a.btn").on("click", function(e) {
 $("#myModal").modal('hide'); });}); $("#myModal").on("hide", function() { $("#myModal a.btn").off("click");});$("#myModal").on("hidden", function() {  
 $("#myModal").remove(); }); $("#myModal").modal({"backdrop"  : "static","keyboard"  : true,"show" : true });return false;} function distancianaoatendida(){
var TOTALERROS = $("#MENSAERRO");var parag = '';distnaoatend = true;parag += '<h1> Desculpe: A pizzaria não faz entrega neste endereço </h1> ';parag += '<h1> Por isso não será possível prosseguir com seu cadastro</h1> ';parag += '<h1> Em caso de dúvidas entre em contato (11) ???? - ???? / ???? - ???? </h1> ';
parag += '<h1> Possui outro endereço mais próximo ?? Atualize a página e tente novamente </h1> ';TOTALERROS.empty().append(parag); $("#myModal").on("show", function() { $("#myModal a.btn").on("click", function(e) {$("#myModal").modal('hide');     
 }); }); $("#myModal").on("hide", function() { $("#myModal a.btn").off("click"); }); $("#myModal").on("hidden", function() { $("#myModal").remove();}); $("#myModal").modal({"backdrop"  : "static", "keyboard"  : true, "show": true});return false;}function mostrarerro(){$("#myModal").on("show", function() {$("#myModal a.btn").on("click", function(e) { $("#myModal").modal('hide');});}); $("#myModal").on("hide", function() {$("#myModal a.btn").off("click");});
$("#myModal").on("hidden", function() { $("#myModal").remove();}); $("#myModal").modal({"backdrop"  : "static","keyboard"  : true,"show":true                     
 });return false;} var form_ir = false;function regformhash(form, endereco, cep, num, compl, infoprox, username, usernamesobre, cpf, confc,  email, password, confirmpwd, tel,getlat, getlong, Notcadastro) { var TOTALERROS = $("#MENSAERRO");var parag = '';var erros = 0;if(distnaoatend === true){distancianaoatendida();return false;
} var camposobrigatoriosvazio = false; if (endereco.value == ''|| cep.value == ''||  num.value == '' ||username.value == ''|| usernamesobre.value == ''|| email.value == ''|| cpf.value == ''|| confc.value == ''||password.value == ''||confirmpwd.value == ''|| tel.value == '' || getlat == ''||getlong ==  ''||Notcadastro == true ) { parag += '<li> Erro: Há campos obrigatórios vazio </li> '; TOTALERROS.empty().append(parag);mostrarerro();erros++;camposobrigatoriosvazio = true; }if(camposobrigatoriosvazio === false && distnaoatend === false){var regex = /^[0-9a-z\u00C0-\u00ff A-Z \.\-\, ]+$/gi;if (!regex.test(endereco.value) ) { parag += '<li> Erro: Verifique o endereço </li> ';erros++; }var regex = /^[0-9]{5}-[0-9]{3}$/;if (!regex.test(cep.value) ) { parag += '<li> Erro: Verifique o CEP </li> ';erros++; }var regex = /^[0-9.]+$/; if (!regex.test(num.value) ) { parag += '<li> Erro: de digitação no campo Número da residência </li> '; erros++;  
} if(compl.value.length > 0) { var regex = /^[0-9a-z\u00C0-\u00ff A-Z \.\-\ ]+$/; if (!regex.test(compl.value) ){parag += '<li> Erro: de digitação no campo Complemento da residência </li> '; erros++;}}if(infoprox.value.length > 0) { var regex = /^[0-9a-z\u00C0-\u00ff A-Z]+$/;  if (!regex.test(infoprox.value) ) { parag += '<li> Erro: de digitação no campo próximo à: </li> ';erros++; } }var regex = /^[a-z\u00C0-\u00ff\A-Z]+$/; if (!regex.test(username.value) ) { parag += '<li> Erro: de digitação no campo nome usuário </li> '; erros++; } var regex = /^[a-z\u00C0-\u00ff\A-Z]+$/;if (!regex.test(usernamesobre.value) ) {  parag += '<li> Erro: de digitação no campo sobrenome do usuário </li> ';erros++;  
}if(cpf.value.length === 0 || cpf.value.length < 10){parag += '<li> Erro: falta digitos no campo cpf </li> '; erros++;  
} var regex = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{3}.[0-9]{3}.[0-9]{3}-x{1})|([0-9]{11}))$/; if (!regex.test(cpf.value) ) {parag += '<li> Erro: de digitação no campo cpf do usuário </li> '; erros++; } if (cpf.value != confc.value) { parag += '<li> Erro: ao verificar cpf - confirme cpf </li> ';
 erros++; } if(email.value.length > 0 ){ var regex =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; if (!regex.test(email.value) ) {  
} }if(password.value.length === 0 ){parag += '<li> Erro: senha não foi definida </li> ';erros++;}else if(password.value.length < 8 || password.value.length > 12 ){
 parag += '<li> Erro: escolha uma senha entre 8 e 12 caracteres </li> ';erros++; }else{ } var regex = /(?=^.{8,12}$)(?=(?:.*?\d){2})(?=.*[a-z])(?=.*[A-Z])(?=(?:.*?[!@#$%*()_+^&}{:;?.]){2})(?!.*\s)[0-9a-zA-Z!@#$%*()_+^&]*$/ ; if (!regex.test(password.value) ) {  
parag += '<li> Erro: de digitação no campo senha do usuário </li> ';erros++; }if (password.value != confirmpwd.value) { parag += '<li> Erro: ao verificar senha - confirme a senha </li> '; erros++; }var regex = /^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/;if (!regex.test(tel.value) ) { parag += '<li> Erro: Verifique o n° telefone/celular digitado </li> ';erros++; }var regex = /^[0-9.,\-\ ]+$/;if (!regex.test(getlat) ) { parag += '<li> Erro: endereço inválido </li> '; erros++;  }else{ } var regex = /^[0-9.,\-\ ]+$/; if (!regex.test(getlong)  ) { parag += '<li> Erro: endereço inválido </li> '; erros++;} if (Notcadastro == true) {  parag += '<li> Erro: endereço inválido </li> ';erros++;}if(erros != 0 ){ parag += "<li> Erros:"+erros+" </li> "; TOTALERROS.empty().append(parag);mostrarerro();}else if(erros === 0 ){ form_ir = form; form_ir.appendChild(latcriadaclie);latcriadaclie.name = "latcriadaclie";latcriadaclie.type = "hidden";latcriadaclie.value = getlat;form_ir.appendChild(longcriadaclie); longcriadaclie.name = "longcriadaclie"; longcriadaclie.type = "hidden";longcriadaclie.value = getlong;form_ir.appendChild(Notcadcriad);Notcadcriad.name = "Notcadcriad";Notcadcriad.type = "hidden"; Notcadcriad.value = Notcadastro;phptatudook(); }}} 
function phptatudook(){form_ir.submit();return true;}





 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


