// JavaScript Document


var map;
function initMap() {
	
	
	
	
	
	
	
	
	
	
	documento = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
 if(documento == 'ENDERECO_desenvolvedor.php'){
	 
	            // descomentar abaixo___por coordenadas___se for usar
	 		 	//var myLatLng = new google.maps.LatLng(-??.???????????,-??.??????????????????);

	 
	  }
	  
	  else if(documento == 'ENDERECO_PIZZARIA.php'){

     // descomentar abaixo___por coordenadas___se for usar
     //var myLatLng = new google.maps.LatLng(-??.?????????????????,-??.??????????????????????);

 } 
	
	
	
	
	
	
	
	

  map = new google.maps.Map(document.getElementById('mapa'), {
    center: {lat: -'??.???????????', lng: -'??.???????????'},
    zoom: 16,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	
  });
  
  
  
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'PIZZARIA ANA PAULA!'
  });
  
  
  
  
}




   







