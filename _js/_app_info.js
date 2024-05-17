(function(angular) {//alert("angular activadoo");
	'use strict';
	angular.module('app1', ['app1.ControllerTab1','datatables']);
	angular.module('app1.ControllerTab1', []).controller('ControllerTab1', function($scope,$http) {

	$http.post('acceso2', {
			data: {access: 53}
		}).success(function(response){					
				
			$scope.empList  = response ;		
			
			//console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");		
		});

	});
	

	
		
	})(angular);
