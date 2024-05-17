(function(angular) {


	angular.module('Appadmusuview', ['Appadmusuview.AppadmusuviewControllerTab','datatables']);
	angular.module('Appadmusuview.AppadmusuviewControllerTab',
	 []).controller('AppadmusuviewControllerTab', function($scope,$http) {

		$http.post('../../acceso2', {
			data: {access: 33  }
		}).success(function(response){

			$scope.empList_usu  = response ;

			//console.log(response);
		}).error(function(){
			//console.log("Error al intentar cargar datos");
		});

	});

	})(angular);



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


	function tablaInmueblesP(t){

		var dato = "";
		var cx = "";
		var c = "";
		var c2 = "";
		var c3 = "";
		var tipo=t;
		 $('#tablaxinmueble').html("");
		  z="";


		  	  $('#table_ususw tbody').on( 'click', 'tr', function () {
		    		cx="";
		           $('#tablaxinmueble').html("");
		            dato = $(this).find("td:eq(0)").text();
		            cx = dato.trim();
		            $('#folioInmueble').val(cx);
		            z="";
		        $.post("../../acceso",{acceess:3,cx:cx,tipo:tipo},function(z){
		        	$('#tablaxinmueble').html("");
		        	cx=""; c = "", c2="", c3="";

	  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Revisor</th></tr></thead><tbody>";

				 $(z).each(function(key,valuee){

				 	if (valuee.tipod == 1) {
			 c2= "<tr><td><a href='../ObservacionDeMunicipio/"+valuee.folio+"/"+valuee.cclave+"/"+valuee.aniodictamen+"/"+valuee.tipod+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.nombre+" "+valuee.ap_paterno+" "+valuee.ap_materno+"</td></tr>"+c2;

				 	}else if(valuee.tipod == 2){

	 c2= "<tr><td><a href='../ObservacionDeMunicipio/"+valuee.folio+"/"+valuee.cclave+"/"+valuee.aniodictamen+"/"+valuee.tipod+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.nombre+" "+valuee.ap_paterno+" "+valuee.ap_materno+"</td></tr>"+c2;

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






	}
