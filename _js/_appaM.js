(function(angular) {


	angular.module('Appadmdtmview', ['Appadmdtmview.AppadmdtmviewControllerTab','datatables']); 
	angular.module('Appadmdtmview.AppadmdtmviewControllerTab',
	 []).controller('AppadmdtmviewControllerTab', function($scope,$http) {
		
		$http.post('../../acceso2', {
			data: {access: 80}
		}).success(function(response){					
				
			$scope.empList_dtm  = response ;		
			
			//console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});

	$scope.pathvector = { 
		vector: []
	};
		
		/*  CAPTURADOR  */	
	$scope.vector = {
		folio: '',
		selec: '',
		opt: '',
	};


		
	});
	
	
	
	})(angular);



function tablaInmuebles(tip){

	var dato = "";	
	var cx = "";  
	var c = "";
	var c2 = "";
	var c3 = "";
	 $('#tablaxinmueble').html("");  
	  z="";  
	 //para seleccionar una opcion
	    $('#table_dtm tbody').on( 'click', 'tr', function () {	
	    		cx="";          	        		          
	           $('#tablaxinmueble').html("");  
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();	            
	            $('#folioInmueble').val(cx);
	            z=""; 
	        $.post("../../acceso",{acceess:11,cx:cx,tip:tip},function(z){
	        	$('#tablaxinmueble').html("");  
	        	cx=""; c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black; text-align: center;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";
		
			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../SeguimientoMunicipio/"+valuee.aniodictaminar+"?"+valuee.cve_catastral+"?"+valuee.folio_dictamen+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../SeguimientoMunicipio/"+valuee.aniodictaminar+"?"+valuee.cve_catastral+"?"+valuee.folio_dictamen+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

			 	}
			 }); 

			 c3 = "</tr></tbody></table>";
			 $('#tablaxinmueble').append(c+c2+c3);
			 z=""; 
			 					
		});  	  
	        cx=""; 
		$('#tablaxinmueble').html(""); 
		 z="";                   
	    } );

	     cx=""; 
		$('#tablaxinmueble').html("");  
		 z="";   

}