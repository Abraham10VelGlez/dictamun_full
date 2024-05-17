(function(angular) {
	//alert("angular");
	angular.module('Appcahsview', ['Appcahsview.AppcahsviewControllerTab','datatables']);
	angular.module('Appcahsview.AppcahsviewControllerTab', []).controller('AppcahsviewControllerTab', function($scope,$http) {	
	

		  			$http.post('../../acceso2', {
						data: {access: 65}
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
						console.log('Error');
					});
		  		
	

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


function buscarDicta(){
	//Validar que se encuentre algun registro insertado para hacer la busqueda
	
}