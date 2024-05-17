(function(angular) {//alert("angular activadoo");
	'use strict'; 
	/*EVENTO PARA INICIAR CONTROLADOR DE UN FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */
	angular.module('app22', ['app22.Controller22']);
	angular.module('app22.Controller22', []).controller('Controller22', function($scope,$http) {
		
		$scope.searchan = function(){
			console.log($scope.an);
			if( $scope.an == "" || $scope.an == " " || $scope.an === undefined  ){
				$("#alerrt").html("");
				$("#alerrt").html("Favor de seleccionar un Año a Dictaminar, para Continuar"); 
			}else{
				location.href= "../VerifC/" + $scope.an;				
			}
			
			  

		}; 
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
