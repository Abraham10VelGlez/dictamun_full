(function(angular) {


	angular.module('Appadmdtmview', ['Appadmdtmview.AppadmdtmviewControllerTab','datatables']); 
	angular.module('Appadmdtmview.AppadmdtmviewControllerTab',
	 []).controller('AppadmdtmviewControllerTab', function($scope,$http) {
		
		$http.post('../../acceso2', {
			data: {access: 83}
		}).success(function(response){					
				
			$scope.empList_dtm  = response ;		
			
			console.log(response);
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



function tablaInmueblesP(t){

		var dato = "";
		var dato2 = "";	
		var cx = "";  
		var c = "";
		var c2 = "";
		var c3 = "";
		var tipo=t; 
		var folioxxxx;

		  if (tipo == 7) {  
			  $('#folioInmueble').val('');
			  $('#folioInmueble1').val('');
		  	  $('#table_dtm tbody').on( 'click', 'tr', function () {	 
		    		cx="";
		            dato = $(this).find("td:eq(0)").text();
		            dato2 = $(this).find("td:eq(1)").text();
		            cx = dato.trim();
		            foliocompuesto = dato2.trim();
		           // console.log(cx); 	            
		            $('#folioInmueble').val(cx);
		            $('#folioInmueble1').val(foliocompuesto);
		            //z="";
		            folioxxxx = '';
		            folioxxxx = $('#folioInmueble').val();
		        $.post("../../acceso",{acceess:7779,cx:folioxxxx,tipo:tipo},function(z){
		        	$('#tablaxinmueble').html("");  
		        	cx=""; c = "", c2="", c3="";

	  c= "<table class='table table-striped table-responsive-sm' style='color: black; '><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";
			
				 $(z).each(function(key,valuee){

					 if (valuee.tipod == 1) {
						 c2= "<tr><td><a href='../SeguimientoDireccionesF/"+ folioxxxx + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + '1' + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

							 	}else if(valuee.tipod == 2){

				 c2= "<tr><td><a href='../SeguimientoDireccionesF/"+ folioxxxx + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + '2' + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

							 	}
				 });
				 
				 
				 

				 c3 = "</tr></tbody></table>";
				 $('#tablaxinmueble').append(c+c2+c3);
				 z=""; 
				 					
			});  	
		                       
		    } );

		  }


	}

