// JavaScript Document

 google.maps.event.addDomListener(window, 'load' , intilize );var latcliente = '', longcliente ='';  //INICIO nulo
var Notcadastro = true; function intilize(){var autocomplete = new google.maps.places.Autocomplete(document.getElementById('endereco'));
 google.maps.event.addDomListener(autocomplete, 'place_changed' , function () { var place = autocomplete.getPlace();var location = "<b>Endereço</b>:  "  +place.formatted_address + "<br/>";latcliente = place.geometry.location.lat(),longcliente = place.geometry.location.lng();Object.defineProperty(window, "", {
value: "-00.000000000000000000"});Object.defineProperty(window, "longpizza", {value: "-00.000000000000000000000"});distance(); function distance(lat1, lon1, lat2, lon2, unit) {
	    var radlat1 = Math.PI * lat1/180
        var radlat2 = Math.PI * lat2/180
        var radlon1 = Math.PI * lon1/180
        var radlon2 = Math.PI * lon2/180
        var theta = lon1-lon2
        var radtheta = Math.PI * theta/180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist)
        dist = dist * 180/Math.PI
        dist = dist * 60 * 1.1515
        if (unit=="K") { dist = dist * 1.609344 }
        if (unit=="N") { dist = dist * 0.8684 }
        return dist
		}var distance = distance(latpizz, longpizza, latcliente, longcliente, 'K');console.log(Math.round(distance*1000)/1000);  //displays 343.548
if(distance > 2.200 || latcliente == '' || latcliente == null || longcliente == '' || longcliente == null ){  Notcadastro = true;distancianaoatendida();
atualiz_coord_info();}else{Notcadastro = false;atualiz_coord_info();
} }); };
	 
	 
	 
	 
	 
	 
	 
	 
	 





  
	 
	 
	 
	 
	 