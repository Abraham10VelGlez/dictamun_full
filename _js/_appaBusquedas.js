(function(angular) {
	
	// tabla de busqueda
	angular.module('apptblsearchj', ['apptblsearchj.apptblsearchjControllerTab1','datatables']); 
	angular.module('apptblsearchj.apptblsearchjControllerTab1',
	 []).controller('apptblsearchjControllerTab1', function($scope,$http) {
		
		$scope.buscarDictaj = function(){
			var o = $("#opt").val();
			console.log("enviar parametros");
			

			switch (o) {
				case "1": //FECHAS
					
			$http.post('../../acceso2', {
			data: {access: 67,
			a:$scope.fechaI,
			b:$scope.fechaF,
			c:$scope.an			
			}

		}).success(function(response){					
				if( response == 0){					
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#alertb").css("display","none");
					$("#result").css('display','block');
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
				break;
				case "2"://municipio
					if( $scope.municcz == "" || $scope.municcz ==" "){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
							$http.post('../../acceso2', {
			data: {access: 68,d:$scope.municcz			
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
						
					}
							
				break;
				case "3": //RFC 
					if( $scope.rfsear == "" || $scope.rfsear ==" "){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 69,			
			e:$scope.rfsear			
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');					
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "4": //REVISOR
					if( $scope.rvs == "" || $scope.rvs ==" " || $scope.rvs =="_"){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 70,			
			f:$scope.rvs		
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');					
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "5": //folio
					if( $scope.nod == "" || $scope.nod ==" "){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 71,
			g:$scope.nod			
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');					
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "6":// etapa de dictamen
					if( $scope.stt == "" || $scope.stt ==" "){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 72,			
			h:$scope.stt			
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{					
					$("#alertb").css("display","none");
					$("#result").css('display','block');
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "7"://especialista
					if( $scope.espx == "" || $scope.espx ==" "){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 73,			
			i:$scope.espx
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');					
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "8"://nombre del contribuyente.
					if( $scope.nomco == "" || $scope.nomco ==" "){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 74,
			j:$scope.nomco,
			k:$scope.nomco2,
			l:$scope.nomco3
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');					
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "23"://Clave catastral . 
					if( $scope.clv == "" || $scope.clv ==""){
						$("#in").html("");
						$("#in").html("Verificar los campos");
					}else{
								$http.post('../../acceso2', {
			data: {access: 79,
			j:$scope.clv
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
					$("#result").css('display','none');
					$("#alertb").css("display","block");
				}else{
					$("#result").css('display','block');					
					$("#alertb").css("display","none");
					$scope.tbldictsearx  ="";
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			$("#result").css('display','none');
			$("#alertb").css("display","block");
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
			
				default:
					break;
			}
		
		}
		
	});

	})(angular);
	//AQUI PUEDE IR FUNCIONES CON AJAX Y QUERY

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

  //combo municipios
  $.post("../../acceso",{acceess:67},function(zx){
           //console.log(zx);
           $(zx).each(function(key,valuee){			
			$('#municcz').append("<option value='"+ valuee.d_mnpio +"' selected>" + valuee.d_mnpio + "</option>" );
			
		});
		$('#municcz').append("<option value='_' selected disabled='disabled'>Seleccione Municipio</option>" );
				
	  });

	//combo revisores
  $.post("../../acceso",{acceess:74},function(d){
           //console.log(d);
           $(d).each(function(key,valuee){			
			$('#rvs').append("<option value='"+ valuee.id_union +"' selected>" + valuee.nombre+' '+valuee.ap_paterno+' '+valuee.ap_materno + "</option>" );
			
		});
		$('#rvs').append("<option value='_' selected disabled='disabled'>Seleccione Revisor</option>" );
				
	  });
	  // combo especilistas
	  $.post("../../acceso",{acceess:75},function(e){
           //console.log(e);
           $(e).each(function(key,valuee){			
			$('#espx').append("<option value='"+ valuee.id_union +"' selected>" + valuee.nombre+' '+valuee.ap_paterno+' '+valuee.ap_materno + "</option>" );
			
		}); 
		$('#espx').append("<option value='_' selected disabled='disabled'>Seleccione Especialista</option>" );
				
	  });
	  
	  /*inicio BUSQUEDAS 8OPCIONES */
	  $("#searchf").click(function(){
		//limpiamos campos
		$("#fechaI").val("");
$("#fechaF").val("");
$("#an").val("");
		//abrimos menu
$("#alertb").css("display","none");
		  $("#infof").html("Por rango de fechas o año a dictaminar");
		  $("#opt").val("");
		  $("#opt").val("1");
		   $("#a2").css('display','none');
		   $("#a3").css('display','none');
		   $("#a4").css('display','none');
		   $("#a5").css('display','none');
		   $("#a6").css('display','none');
		   $("#a7").css('display','none');
		   $("#a8").css('display','none');
		   $("#a23").css('display','none');
		  $("#a1").css('display','block');
		  $("#bavg").css('display','block');
		  $("#in").html("");
$("#result").css('display','none');
	  });
	  	  $("#searchcc").click(function(){
		//limpiamos campos
		$("#nomco").val("");
$("#nomco2").val("");
$("#nomco3").val("");
//abrimos menu
$("#alertb").css("display","none");
				$("#infof").html("Por nombre del contribuyente");
				$("#opt").val("");
				$("#opt").val("8");								
				$("#a2").css('display','none');
		   $("#a3").css('display','none');
		   $("#a4").css('display','none');
		   $("#a5").css('display','none');
		   $("#a6").css('display','none');
		   $("#a7").css('display','block');
		   $("#a8").css('display','none');
		   $("#a1").css('display','none');
		   $("#a23").css('display','none');
		   $("#bavg").css('display','block');
		   $("#in").html("");
$("#result").css('display','none');
	  });
	  	  $("#searchrvs").click(function(){
		//limpiamos campos
		$("#rvs").val("_");
//abrimos menu
		$("#alertb").css("display","none");
				$("#infof").html("Por revisor");
				$("#opt").val("");
				$("#opt").val("4");
				$("#a2").css('display','none');
		   $("#a3").css('display','none');
		   $("#a4").css('display','none');
		   $("#a1").css('display','none');
		   $("#a5").css('display','block');
		   $("#a6").css('display','none');
		   $("#a7").css('display','none');
		   $("#a8").css('display','none');
		   $("#a23").css('display','none');
				
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });
	  	  $("#searchstts").click(function(){
		//limpiamos campos
		$("#stt").val("_");
//abrimos menu
		$("#alertb").css("display","none");
				$("#infof").html("Por estatus de dictamen");
				$("#opt").val("");
				$("#opt").val("6");
				$("#a2").css('display','none');
		   $("#a3").css('display','none');
		   $("#a4").css('display','none');
		   $("#a5").css('display','none');
		   $("#a1").css('display','none');
		   $("#a7").css('display','none');
		   $("#a8").css('display','none');
		   $("#a23").css('display','none');
				$("#a6").css('display','block');
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });

	  	  	  $("#searchepx").click(function(){
		//limpiamos campos
		$("#espx").val("_");
//abrimos menu
		$("#alertb").css("display","none");
					  $("#infof").html("Por especialista");
				$("#opt").val("");
				$("#opt").val("7");
				$("#a2").css('display','none');
		   $("#a3").css('display','none');		   
		   $("#a5").css('display','none');
		   $("#a6").css('display','none');
		   $("#a1").css('display','none');
		   $("#a8").css('display','none');
		   $("#a7").css('display','none');
		   $("#a23").css('display','none');				
				$("#a4").css('display','block');
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });
	  	  	  $("#searchnodc").click(function(){
		//limpiamos campos
		$("#nod").val("");
//abrimos menu
		$("#alertb").css("display","none");
			    $("#infof").html("Por no. de dictamen");
				$("#opt").val("");
				$("#opt").val("5");
				$("#a2").css('display','none');
		   $("#a7").css('display','none');
		   $("#a4").css('display','none');
		   $("#a1").css('display','none');
		   $("#a6").css('display','none');
		   $("#a5").css('display','none');
		   $("#a8").css('display','none');
		   $("#a23").css('display','none');
				$("#a3").css('display','block');
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });
	  	  	  $("#searchmun").click(function(){
		//limpiamos campos
		$("#municcz").val("");
//abrimos menu
		$("#alertb").css("display","none");
				$("#infof").html("Por Municipio");
				$("#opt").val("");
				$("#opt").val("2");
				$("#a1").css('display','none');
		   $("#a3").css('display','none');
		   $("#a4").css('display','none');
		   $("#a5").css('display','none');
		   $("#a6").css('display','none');
		   $("#a7").css('display','none');
		   $("#a8").css('display','none');
		   $("#a23").css('display','none');
				$("#a2").css('display','block');
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });
	  	  	  $("#searchrfc").click(function(){
		//limpiamos campos
		$("#rfsear").val("");
//abrimos menu
		$("#alertb").css("display","none");
				$("#infof").html("Por RFC");
				$("#opt").val("");
				$("#opt").val("3");
				$("#a2").css('display','none');
		   $("#a1").css('display','none');
		   $("#a4").css('display','none');
		   $("#a5").css('display','none');
		   $("#a6").css('display','none');
		   $("#a7").css('display','none');
		   $("#a3").css('display','none');
		   $("#a23").css('display','none');
		   $("#a8").css('display','block');
				
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });


	  	  	  $("#searchclv").click(function(){
		//limpiamos campos
		$("#rfsear").val("");
//abrimos menu
		$("#alertb").css("display","none");
				$("#infof").html("Por Clave Catastral");
				$("#opt").val("");
				$("#opt").val("23");
				$("#a2").css('display','none');
		   $("#a1").css('display','none');
		   $("#a4").css('display','none');
		   $("#a5").css('display','none');
		   $("#a6").css('display','none');
		   $("#a7").css('display','none');
		   $("#a3").css('display','none');
		   $("#a8").css('display','none');
		   $("#a23").css('display','block');
				
				$("#bavg").css('display','block');
				$("#in").html("");
				$("#result").css('display','none');

	  });

	  /*fin BUSQUEDAS 8OPCIONES */
	  
	  
	  

});


function tablaInmuebles(t){

	var dato = "";	
	var cx = "";  
	var c = "";
	var c2 = "";
	var c3 = "";
	var tipo =t; 


	if (tipo == 1) {

		 $('#tablaxinmueble').html("");  
	  z="";  
	 //para seleccionar una opcion
	    $('#example tbody').on( 'click', 'tr', function () {	
	    		cx="";          	        		          
	           $('#tablaxinmueble').html("");  
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();	            
	            $('#folioInmueble').val(cx);
	            z="";  
	        $.post("../../acceso",{acceess:14,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");  
	        	cx=""; 
	        	c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='text-align: center; color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Revisor</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";
		
			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../AdminSeguimientoJ/"+valuee.aniodictamen+"?"+valuee.cve_catastral+"?"+valuee.folio_dictamen+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.revisor+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../AdminSeguimientoJ/"+valuee.aniodictamen+"?"+valuee.cve_catastral+"?"+valuee.folio_dictamen+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.revisor+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

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
	
}