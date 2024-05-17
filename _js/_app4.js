(function(angular) {//alert("angular activadoo");
	'use strict';

	/*  EVENTO PARA INICIAR CONTROLADOR DE UN  FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */
	angular.module('app8', ['app8.ControllerTab8','datatables']);
	angular.module('app8.ControllerTab8', []).controller('ControllerTab8', function($scope,$http) {
		
		//alert("angular");
		/*  EVENTO PARA INICIAR EL FUNCIONAMIENTO DE UN BOTON */
		/*$scope.searchdict = function(){
								
			var fechaInicial = $('#fechaI').val();
			var fechafinal = $('#fechaF').val();
			if (fechaInicial == "" || fechafinal == "") {
				// DEBES CREAR ESA ALERTA X FA
				//$("#id01").css('display','block');
				$("#tblseg").css('display','none');
				console.log("error");

			}else{
			
				var var1 = $scope.fech1 ;
				var var2 = $scope.fech2 ;						
				$http.post('../../acceso2', {
					data: {access: 75, var1 : var1,var2 : var2}
				}).success(function(response){
					if (response == "000") {
						console.log('sin dictamenes registrados'); 
						$('#sinRegistro').css('display','block');
						
					}else{
						console.log(response); 
					$("#tblseg").css('display','block');
					$scope.myTabl1ec = response;
					}
                /*if( response == "0000"){
                  $("#tblseg").css('display','none');
                  console.log("sin registros");
                }else{
                  //mostramos los datos de la tabla
                console.log(response);
								$("#tblseg").css('display','block');
                $scope.lista_a = response;
                }*/
			/*	}).error(function(response){
					console.log(response);					
				});
							
			}
								
		};*/
		
		//$scope.dictamenesAllPendientes = function(){ 

			$http.post('../../acceso2', {
					data: {access: 45}
				}).success(function(response){
					
					if (response == "000") {
						console.log('sin dictamenes registrados'); 
						$('#sinRegistro').css('display','block');
						$("#tblseg").css('display','none');

						
					}else{
						console.log(response); 
					$("#tblseg").css('display','block');
					$scope.myTabl1ec = response;
					}
					
             
				}).error(function(response){
					console.log(response);					
				});


		//};

	});

		
	})(angular);
	
	
	
	
	
	//se puede usar este metodo para capturar un valor del tabla
function selection44(){
	var dato = "";	 
	 //para seleccionar una opcion
	    $('#myTabl2 tbody').on( 'click', 'tr', function () {	        	        		          	            
	            dato = $(this).find("td:eq(0)").text();
	            var cx = dato.trim();
//aqui va ruta de datos generales   
	            location.href = "../SeguimientoXinmb/"+dato.trim();
//aqui va ruta de datos generales
	            	        
	    } );
}

function selection2(){
	var dato = "";	 
	 //para seleccionar una opcion
	    $('#myTabl2 tbody').on( 'click', 'tr', function () {	        	        		          
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            var cx = dato.trim();	            
	            location.href = "../SeguimientoDictamenC/"+dato.trim();
	            //$(this).removeClass('selected');	        
	    } );
}

$(document).ready(function () {	
	
	$("#killer").click(function(){		
		$.post("../../acceso",{acceess:102},function(z){
			//alert(z);
			if( z == "23000" ){
				alert(" usuario activo ");
			}else{
				
				location.href=z;				
			}			
		});
		
		
		
  });
});







function tablaInmuebles(t){

	var dato = "";	
	var cx = "";  
	var c = "";
	var c2 = "";
	var c3 = "";
	var tipo =t; 
	 $('#tablaxinmueble').html("");  
	  z="";  
	 //para seleccionar una opcion
	    $('#myTabl2 tbody').on( 'click', 'tr', function () {	
	    		cx="";          	        		          
	           $('#tablaxinmueble').html("");  
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();	            
	            $('#folioInmueble').val(cx);
	            z=""; 
	        $.post("../../acceso",{acceess:10,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");  
	        	cx=""; 
	        	c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='text-align: center; color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";
		
			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../SeguimientoDictamenC/"+valuee.aniodictaminar+"?"+valuee.cve_catastral+"?"+valuee.folio_dictamen+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../SeguimientoDictamenC/"+valuee.aniodictaminar+"?"+valuee.cve_catastral+"?"+valuee.folio_dictamen+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

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
