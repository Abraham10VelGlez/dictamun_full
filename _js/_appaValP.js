(function(angular) {
	
		angular.module('Appcahsview2', ['Appcahsview2.Appcahsview2ControllerTab','datatables']);
	angular.module('Appcahsview2.Appcahsview2ControllerTab', []).controller('Appcahsview2ControllerTab', function($scope,$http) {	
	

		  			$http.post('../../acceso2', {
						data: {access: 77}
					}).success(function(response){			
						//resultado							
									if( response == "0000"){
										console.log(response);
										console.log('Error');	
									}else{
										console.log(response);
										$scope.empList_P = response;
									}
									
					}).error(function(){			
						console.log('Errorll');
					});
		  			
		  			
		  			$scope.pathvector = { 
		  					vector: []
		  				};
		  					
		  					
		  				$scope.vector = {
		  					folio: '',
		  					selec: ''
		  					
		  				};
		  				
		  			$scope.btnvalidarP = function(){
		  				//var modal = document.getElementById('id03');
						//modal.style.display = "block";
						$("#aaa").css('display','none');
//alert("asdasdasd");
		  				$("input[type=checkbox]:checked").each(function(){
		  		//cada elemento seleccionado
		  		console.log('folios completos'); //foliosCom
		  		$ttt=$(this).parent().parent().find('td').eq(0).html(); 
	
		  		console.log($(this).parent().parent().find('td').eq(0).html());	
		  		$scope.pathvector.vector.push({
		  				folio: $(this).parent().parent().find('td').eq(0).html(),
		  				selec: 1,
		  				clave: $(this).parent().parent().find('td').eq(1).html()		  				
		  			});		
		  	});
		  				console.log('cevtor.....');
		  	console.log($scope.pathvector);

		  	if ($scope.pathvector.vector.length == 0) {
		  		console.log('sin datos seleccionados'); 

		  		$("#sinDatos").css('display','block');

		  	}else{
		  	$http({
		  	               method: 'POST',
		  	               url: '../../acceso9',
		  	               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		  	               data: { v:$scope.pathvector },
		  	           }).then(function(response) {
		  	  $scope.gists = response.data;
		  	   //console.log(response);
		  	   console.log(response.data);
		  	//$scope.pathvector.vector = [];
		  	$t = response.data;
		  	$("#sinDatos").css('display','none');
		  	$("#ee").val(response.data);
		  	$("#btnVP").css('display','none'); 
		  	$("#validarPagos").css('display','block'); 


		  	})
		  	.catch(function(response) {
		  		//$scope.pathvector.vector = [];
		  	  console.error('Gists error', response.status, response.data);
		  	})
		  	.finally(function() {
		  		//$scope.pathvector.vector = [];
		  	  console.log("finally finished gists");
		  	});

		  }
		  	////else

		  			};
		  			
		  			
		  			
		  			
		  			
		  			$scope.docc2 = function(){
		  				/*if(  $("#ee").val() == "0" || $("#ee").val() == null){
		  					var modal = document.getElementById('id03');
							modal.style.display = "none"; 
							$("#aaa").css('display','block');
							
		  				}else{
		  					$("#aaa").css('display','none');
		  					location.href="../../ordenPago.php?num=" + $("#ee").val();
		  					
		  				} */
		  					
		  				var todo = $("#ee").val(); 
		  				$("#foliosT").val(todo); 
		  				
					    var modal2 = document.getElementById('id04');
							modal2.style.display = "block";

		  				//var modal = document.getElementById('id03');
						//	modal.style.display = "none";

						var res = todo.split("|");
						var a = res[0];
						var fCompletos = "";


						var d = $scope.pathvector.vector;
						console.log('+++++++++++++++++++++');
						console.log($scope.pathvector.vector);

						angular.forEach($scope.pathvector.vector, function(inmueble, value) {
							$("#taFolios").append(inmueble.folio + '<tr><td><input type="text" name="f'+inmueble.folio+'" id="f'+inmueble.folio+'" value="'+inmueble.folio+'" style="border: 0;" readonly></td><td><input type="text" name="ff'+inmueble.folio+'" id="ff'+inmueble.folio+'" value="'+inmueble.clave+'"></td></tr>');
        	
      	});
/*
    $.each( d, function( key, value ) {
  var a = key + 1;
  
  
  $("#taFolios").append('<tr><td><input type="text" name="f'+value.folio+'" id="f'+value.folio+'" value="'+value.folio+'" style="border: 0;" readonly></td><td><input type="text" name="ff'+value.folio+'" id="ff'+value.folio+'"></td></tr>');
});*/
						/*var tabl= '<thead><tr><td style="text-align: center;">DICTAMEN</td><td style="text-align: center;">AGREGAR FOLIO</td></tr></thead><tbody>';

						for (var i = 0; i < a; i++) {
							var f = res[i+1];

							tabl += '<tr><td><input type="text" name="f'+i+'" id="f'+i+'" value="'+f+'" style="border: 0;" readonly></td><td><input type="text" name="ff'+i+'" id="ff'+i+'"></td></tr>';
						}
					
					tabl += '</tbody>'; 
							$("#taFolios").html(tabl); */
		  			
		  			} 


		  				$scope.docc3 = function(){
		  					
		  				console.log('func 3'); 
		  				
		 	  				$("#aaa").css('display','none');
		 	  			

		$http({
		  	               method: 'POST',
		  	               url: '../../acceso10',
		  	               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		  	               data: { v:$scope.pathvector },
		  	               processData:false,
		  	               type: 'html',
		  	           }).then(function(response) {
		  	           	//console.log(response); 
		  	           	console.log(response.data); 
		  	           if ( response.data == 0 ) {
		  	          // var modal3 = document.getElementById('id04');
						//	modal3.style.display = "none";

							//var modal4 = document.getElementById('id05');
							//modal4.style.display = "block";

		  	           }else if(response.data > 0){
		  	           	location.reload();
		  	           }
		  	           	

		  	//  location.href=response.data;


		  	})
		  	.catch(function(response) {
		  		//$scope.pathvector.vector = [];
		  	  console.error('Gists error', response.status, response.data);
		  	})
		  	.finally(function() {
		  		//$scope.pathvector.vector = [];
		  	  console.log("finally finished gists");
		  	});



		  					
		  			
		  			} 

		  			$scope.docc4 = function(){
		  				console.log("Funcion 4"); 

		  				if(  $("#ee").val() == "0" || $("#ee").val() == null){
		  					var modal = document.getElementById('id03');
							modal.style.display = "none";
							$("#aaa").css('display','block');
							
		  				}else{
		  					$("#aaa").css('display','none');
		  					var foliOfic = $("#foliosOficio").val();
		  					var num = $("#ee").val();
		  					var soloNum = num.split("|");
		  					var soloNum2 = soloNum[0];
		  					var todoOficio = soloNum2+"-"+foliOfic;
		  					//console.log(todoOficio);

		  					location.href="../../oficiOrdenPagos.php?num=" +   todoOficio; 
		  					
		  				}

		  							
		  			}
	

	});


	// tabla de busqueda
	angular.module('apptblsearchj', ['apptblsearchj.apptblsearchjControllerTab1','datatables']); 
	angular.module('apptblsearchj.apptblsearchjControllerTab1',
	 []).controller('apptblsearchjControllerTab1', function($scope,$http) {
		/*
		$http.post('../../acceso2', {
			data: {access: 61}
		}).success(function(response){					
				
			$scope.empList_usu  = response ;		
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});*/
		
		$scope.buscarDictaj = function(){
			var o = $("#opt").val();
			console.log("enviar parametros");
			$("#result").css('display','block');

			switch (o) {
				case "1":
					
			$http.post('../../acceso2', {
			data: {access: 67,
			a:$scope.fechaI,
			b:$scope.fechaF,
			c:$scope.an			
			}

		}).success(function(response){					
				if( response == 0){
					console.log("hubo un error de variable");
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
				break;
				case "2":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
						
					}
							
				break;
				case "3":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "4":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "5":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "6":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "7":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "8":
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
				}else{
					$scope.tbldictsearx  = response ;

				}
					
			
			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});
	}
				break;
				case "23":
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
			/*
			var a = $scope.fechaI;
			var b = $scope.fechaF;
			var c = $scope.an;

			var d = $scope.municcz;

			var e = $scope.rfsear;

			var f = $scope.rvs;

			var g = $scope.nod;

			var h = $scope.stt;

			var i = $scope.espx;

			var j = $scope.nomco;
			var k = $scope.nomco2;
			var l = $scope.nomco3;
*/
		}
		
	});


	
	})(angular);
/*
$scope.btnasg = function(){

			$("input[type=checkbox]:checked").each(function(){
	//cada elemento seleccionado
	console.log($(this).parent().parent().find('td').eq(1).html());	
	$scope.pathvector.vector.push({
			folio: $(this).parent().parent().find('td').eq(0).html(),
			selec: 1,
			opt: $scope.Rvigcm
		});		
});
console.log($scope.pathvector);
$http({
               method: 'POST',
               url: '../../acceso4',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: { v:$scope.pathvector },
           }).then(function(response) {
  $scope.gists = response.data;
   //console.log(response);
   console.log(response.data);
$scope.pathvector.vector = [];

})
.catch(function(response) {
  console.error('Gists error', response.status, response.data);
})
.finally(function() {
  console.log("finally finished gists");
});


		}
	*/
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
		$('#municcz').append("<option value='_' selected>Seleccione Municipio</option>" );
				
	  });

	//combo revisores
  $.post("../../acceso",{acceess:74},function(d){
           //console.log(d);
           $(d).each(function(key,valuee){			
			$('#rvs').append("<option value='"+ valuee.id_union +"' selected>" + valuee.nombre+' '+valuee.ap_paterno+' '+valuee.ap_materno + "</option>" );
			
		});
		$('#rvs').append("<option value='_' selected>Seleccione Revisor</option>" );
				
	  });
	  // combo especilistas
	  $.post("../../acceso",{acceess:75},function(e){
           //console.log(e);
           $(e).each(function(key,valuee){			
			$('#espx').append("<option value='"+ valuee.id_union +"' selected>" + valuee.nombre+' '+valuee.ap_paterno+' '+valuee.ap_materno + "</option>" );
			
		});
		$('#espx').append("<option value='_' selected>Seleccione Especialista</option>" );
				
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


function tablaInmueblesP(t){

//alert(t); 

	var dato = "";	
	var cx = "";  
	var c = "";
	var c2 = "";
	var c3 = "";
	var tipo=t; 
	 
	 // z="";  
	  if (tipo == 7) {   

	  	  $('#table_cashs tbody').on( 'click', 'tr', function () {	 
	    		cx="";          	        		          
	           
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	           // console.log(cx); 	            
	            $('#folioInmueble').val(cx);
	            //z=""; 
	        $.post("../../acceso",{acceess:7,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");  
	        	cx=""; c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black; '><thead><tr><th style='display: none;'>folio</th><th style='display: none;'>claveCatastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Revisor</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Seleccionar</th></tr></thead><tbody>";
		
			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td style='display: none;'>"+valuee.acuse+"</td><td style='display: none;'>"+valuee.cclave+"</td><td><a href='../AdminSeguimientoJ/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.nombre_especialista+"</td><td>"+valuee.valor_catastral+"</td><td><input type='checkbox'></td></tr>"+c2; 

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td style='display: none;'>"+valuee.acuse+"</td><td style='display: none;'>"+valuee.cclave+"</td><td><a href='../AdminSeguimientoJ/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.nombre_especialista+"</td><td>"+valuee.valor_catastral+"</td><td><input type='checkbox'></td></tr>"+c2; 

			 	}
			 }); 

			 c3 = "</tr></tbody></table>";
			 $('#tablaxinmueble').append(c+c2+c3);
			 z=""; 
			 					
		});  	
	                       
	    } );

	  }


}