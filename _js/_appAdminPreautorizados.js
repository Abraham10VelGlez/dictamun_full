(function(angular) {


	//Dictamenes/ pendientes

	 angular.module('Appadmdtmviewpen', ['Appadmdtmviewpen.AppadmdtmviewpenControllerTab','datatables']);
	angular.module('Appadmdtmviewpen.AppadmdtmviewpenControllerTab',
	 []).controller('AppadmdtmviewpenControllerTab', function($scope,$http) {

		$http.post('../../acceso2', {
			data: {access: 38}
		}).success(function(response){

			$scope.empList_dtmpen  = response ;

			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");
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

  	//console.log(t);
  	var dato = "";
	var cx = "";
	var c = "";
	var c2 = "";
	var c3 = "";
	var tipo=t;

	 // z="";
	  if (tipo == 2) {  //Autorizados

	  	  $('#table_dtm tbody').on( 'click', 'tr', function () {
	    		cx="";

	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	           // console.log(cx);
	            $('#folioInmueble').val(cx);
	            //z="";
	        $.post("../../acceso",{acceess:7,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx="";
	        	c = "",c2 = "",c3 = "";

  c= "<table class='table table-striped table-responsive-sm' style='color: black; '><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../AdminSeguimiento/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../AdminSeguimiento/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2; 

			 	}
			 });

			 c3 = "</tr></tbody></table>";
			 $('#tablaxinmueble').append(c+c2+c3);
			 z="";

		});

	    } );

	  }

}
