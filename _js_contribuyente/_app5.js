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
				$("#tblseg2").css('display','none');
				//console.log("error");

			}else{

				var var1 = $scope.fech1 ;
				var var2 = $scope.fech2 ;
				$http.post('../../acceso2', {
					data: {access: 76, var1 : var1,var2 : var2}
				}).success(function(response){

               if (response == "000") {
						//console.log('sin dictamenes registrados');
						$('#sinRegistro').css('display','block');

					}else{
							$("#tblseg").css('display','block');
					$scope.myTabl1ec = response;
					$("#titulo1").css('display','block');

					}


				}).error(function(response){
					//console.log(response);
				});

				//****para dictamenes validados****

					$http.post('../../acceso2', {
					data: {access: 46, var1 : var1,var2 : var2}
				}).success(function(res){

               if (res == "000") {
						//console.log('sin dictamenes validados');
						$("#tblseg2").css('display','none');
						$('#sinRegistro2').css('display','block');

					}else{
							$("#tblseg2").css('display','block');
					$scope.myTabl1ec2 = res;
					$("#titulo2").css('display','block');
					//console.log('dictamenes validados');

					}

				}).error(function(res){
					//console.log(res);
				});

			}

		};*/

		//$scope.dictamenesAllProcesoValidado = function(){


			$http.post('../../acceso2', {
				data: {access: 44}
			}).success(function(response){

				 if (response == "000") {
						//console.log('sin dictamenes registrados');
						//$("#tblseg").css('display','none');
						$('#sinRegistro').css('display','block');
						$('#titulo').css('display','block');

					}else{
						$("#tblseg").css('display','block');
				$scope.myTabl1ec = response;
				$("#titulo1").css('display','block');

				}


			}).error(function(response){
				//console.log(response);
			});

			//*para dictamenes validados*

				$http.post('../../acceso2', {
				data: {access: 43}
			}).success(function(res){

				 if (res == "000") {
						//console.log('sin dictamenes validados');
						$("#tblseg2").css('display','none');
						$('#sinRegistro2').css('display','block');
						$('#titulo2').css('display','block');

					}else{
						$("#tblseg2").css('display','block');
				$scope.myTabl1ec2 = res;
				$("#titulo2").css('display','block');
				//console.log('dictamenes validados');

				}

			}).error(function(res){
				//console.log(res);
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
	var tipo = t ;

	if (tipo == 1) {     //dictamenes en proceso

		//para seleccionar una opcion
	    $('#myTabl2 tbody').on( 'click', 'tr', function () {
	    	$('#tablaxinmueble').html("");
	        dato = $(this).find("td:eq(0)").text();
	        cx = dato.trim();
	        $('#folioInmueble').val(cx);
	        /*$('#tablaxinmueble').append(c);
	        $('#tablaxinmueble').append(c2);
	        $('#tablaxinmueble').append(c3);*/

	        $.post("../../acceso",{acceess:10,cx:cx,tipo:tipo},function(z){
	        	//console.log(z);
	        	$('#tablaxinmueble').html("");
	        	c = "", c2="", c3="";

c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			$(z).each(function(key,valuee){

			if (valuee.tipod == 1) {
c2= "<tr><td>"+valuee.cve_catastral+"</td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			}else if(valuee.tipod == 2){

c2= "<tr><td>"+valuee.cve_catastral+"</td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			}
			});

c3 = "</tr></tbody></table>";
			$('#tablaxinmueble').append(c+c2+c3);

		});
		 $('#tablaxinmueble').html("");
	    });

	}else if (t == 2) {   //dictamenes validados

		//para seleccionar una opcion
	    $('#myTabl2 tbody').on( 'click', 'tr', function () {
	    	$('#tablaxinmueble').html("");
	        dato = $(this).find("td:eq(0)").text();
	        cx = dato.trim();
	        $('#folioInmueble').val(cx);

	        $.post("../../acceso",{acceess:10,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	c = "", c2="", c3="";

c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			$(z).each(function(key,valuee){

			if (valuee.tipod == 1) {
//c2= "<tr><td><a href='../SeguimientoDictamenC/"+valuee.aniodictaminar+"?"+valuee.cve_catastral+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

c2= "<tr><td><a>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;


			}else if(valuee.tipod == 2){

//c2= "<tr><td><a href='../SeguimientoDictamenC/"+valuee.aniodictaminar+"?"+valuee.cve_catastral+"'>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

c2= "<tr><td><a>"+valuee.cve_catastral+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			}
			});

c3 = "</tr></tbody></table>";
			$('#tablaxinmueble').append(c+c2+c3);

		});
		 $('#tablaxinmueble').html("");
	    });

	}




}

/*
function tablaxinmuebleOcultar(){

	$('#tablaxinmueble').html("");
	 location.reload();

}*/
