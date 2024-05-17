(function(angular) {


	
	
	//vsnewU
	angular.module('Appadmvers', ['Appadmvers.AppadmversController']); 
	angular.module('Appadmvers.AppadmversController', []).controller('AppadmversController', function($scope,$http) {
		

		$scope.vsnewU = function(){
			$("#objsms").html("");
			$("#updateverw").css("display","none");
			$("#message").css("display","none");
			if( $scope.vrsnew == "" || $scope.vrsnew == " " || $scope.vrsnew === undefined  ){
				$('#vrsnew').css("border", "1px solid red");
				$("#message").css("display","flex");
				$("#updateverw").css("display","block");
			}else{
				$('#vrsnew').css("border", "");
				$("#message").css("display","none");
				$http.post('../../acceso2', {
					data: {access: 63,vers:$scope.vrsnew}
				}).success(function(response){			
					//resultado			
					console.log(response);				
								if( response == 6){
									
									
									$("#baravg").css("display","block");
									animateprogress ("#html5", 25,response);
									console.log('Error');	
								}else{
									
									$("#baravg").css("display","block");									
									animateprogress ("#html5", 100, response);					       
									//var modal = document.getElementById('examplet');
									//modal.style.display = "block";
									//$("#id01").fadeOut(5000);	
								}
								
				}).error(function(){	
					$('#vrsnew').css("border", "");
					$("#message").css("display","none");
					console.log('Error');
				});


			}
			
		}
		
		
		
	});	

	
	
	})(angular);

$(document).ready(function () {
	versionx();


});


function versionx(){
	//version
	$.post("../../acceso",{acceess:62},function(n){
		//console.log(n);
			$(n).each(function(key,valuee){
			
			$('#vdtvl').html(valuee.version);
					
		});
	});	
}




function animateprogress (id, val, x){    
	  
	  
	if( val == 25){
		  
		  
	    var getRequestAnimationFrame = function () {  /* <------- Declaro getRequestAnimationFrame intentando obtener la máxima compatibilidad con todos los navegadores */
	        return window.requestAnimationFrame ||
	        window.webkitRequestAnimationFrame ||  
	        window.mozRequestAnimationFrame ||
	        window.oRequestAnimationFrame ||
	        window.msRequestAnimationFrame ||
	        function ( callback ){
	            window.setTimeout(enroute, 1 / 60 * 1000);
	        };
	         
	    };
	     
	    var fpAnimationFrame = getRequestAnimationFrame();   /* <--- Declaro una instancia de getRequestAnimationFrame para llamar a la función animación */
	    var i = 0;
	    var animacion = function () {
	             
	    if (i<=val)
	        {	            	          
	            	
	            	document.querySelector(id).setAttribute("value",i);      /* <----  Incremento el valor de la barra de progreso */
		            document.querySelector(id+"+ span").innerHTML = i+"%";     /* <---- Incremento el porcentaje y lo muestro en la etiqueta span */
		            i++;
		            fpAnimationFrame(animacion);          /* <------------------ Mientras que el contador no llega al porcentaje fijado la función vuelve a llamarse con fpAnimationFrame     */
	            	
	            }
	    
	    
	    if( i == 25){
	    	
	    	
	    	
      //$("#messgerrespuest").html("");
      //$("#messgerrespuest").html("<h4>Ocurrio algun detalle de envio de su registro comunicarse con el Administrador IGECEM.</h4>");
	    	//$("#baravg").fadeOut(5000);
	    	$("#vrsnew").val("");
	    	$("#baravg").css("display","none");
	    	$("#objsms").html("Ocurrio algun detalle de envio de su nueva versión comunicarse con el Administrador IGECEM.");
      console.log("Ocurrio algun detalle de envio de su nueva versión comunicarse con el Administrador IGECEM.");
      $("#updateverw").css("display","block");
	    	
	    	
	    }
	
	                                         
	    }
	 
	        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */
	        
	  

	  
  }else if( val == 100){
		  
		  
		    var getRequestAnimationFrame = function () {  /* <------- Declaro getRequestAnimationFrame intentando obtener la máxima compatibilidad con todos los navegadores */
		        return window.requestAnimationFrame ||
		        window.webkitRequestAnimationFrame ||  
		        window.mozRequestAnimationFrame ||
		        window.oRequestAnimationFrame ||
		        window.msRequestAnimationFrame ||
		        function ( callback ){
		            window.setTimeout(enroute, 1 / 60 * 1000);
		        };
		         
		    };
		     
		    var fpAnimationFrame = getRequestAnimationFrame();   /* <--- Declaro una instancia de getRequestAnimationFrame para llamar a la función animación */
		    var i = 0;
		    var animacion = function () {
		             
		    if (i<=val)
		        {	            	          
		            	
		            	document.querySelector(id).setAttribute("value",i);      /* <----  Incremento el valor de la barra de progreso */
			            document.querySelector(id+"+ span").innerHTML = i+"%";     /* <---- Incremento el porcentaje y lo muestro en la etiqueta span */
			            i++;
			            fpAnimationFrame(animacion);          /* <------------------ Mientras que el contador no llega al porcentaje fijado la función vuelve a llamarse con fpAnimationFrame     */
		            	
		            }
		    if(i == 100){
		    	
		    	$("#baravg").css("display","none"); 		    	
		    	$("#vrsnew").val("");
			    $("#objsms").html("Actualización de la Versión Dictaval Completa");
			    $("#updateverw").css("display","block");
			    
			    versionx();
	          	
	          }
		
		                                         
		    }
		 
		        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */
		  
		  
	  }
	  
	
	                 
	}

