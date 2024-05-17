(function(angular) {


	//Dictamenes/ pendientes

	 angular.module('Appadmdtmviewpen', ['Appadmdtmviewpen.AppadmdtmviewpenControllerTab','datatables']); 
	angular.module('Appadmdtmviewpen.AppadmdtmviewpenControllerTab',
	 []).controller('AppadmdtmviewpenControllerTab', function($scope,$http) {
		
		$http.post('../../acceso2', {
			data: {access: 31}
		}).success(function(response){					
				
			$scope.empList_dtmpen  = response ;		
			
			//console.log(response);
		}).error(function(){ 
			console.log("Error al intentar cargar datos");		
		});

		
	});


	})(angular);

function actualizarTarifas(){
	var cuota1 = $("#cuotaFija1").val();
	var cuota2 = $("#cuotaFija2").val();
	var cuota3 = $("#cuotaFija3").val();
	var cuota4 = $("#cuotaFija4").val();
	var cuota5 = $("#cuotaFija5").val();
	var cuota6 = $("#cuotaFija6").val();
	var cuota7 = $("#cuotaFija7").val();

	////////////////////////////////////////////////

	var factoRango1 = $("#factoRango1").val();
	var factoRango2 = $("#factoRango2").val();
	var factoRango3 = $("#factoRango3").val();
	var factoRango4 = $("#factoRango4").val();
	var factoRango5 = $("#factoRango5").val();
	var factoRango6 = $("#factoRango6").val();
 	var factoRango7 = $("#factoRango7").val();

	////////////////////////////////////////////////////


	 $.post("../../acceso",{acceess:49,cuota1:cuota1,cuota2:cuota2,cuota3:cuota3,cuota4:cuota4,cuota5:cuota5,cuota6:cuota6,cuota7:cuota7,factoRango1:factoRango1,factoRango2:factoRango2,
	 	factoRango3:factoRango3,factoRango4:factoRango4,factoRango5:factoRango5,factoRango6:factoRango6,factoRango7:factoRango7},function(z){
	        


			location.reload();

			
			 					
		});  

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