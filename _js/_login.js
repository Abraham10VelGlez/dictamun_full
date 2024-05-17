
 function login(a){
  var g = a;
  var user = $('#usr').val();
  var pass = $('#psw').val();
  
  var vl1 = voidvalidation1();
  var vl2 = voidvalidation2();
  
  if( user === undefined || pass === undefined || user == " " || user == "" || pass == " " || pass == "" || !vl1 || !vl2 ){
	 
      $('#usr').css("border", "1px solid red");
      $('#psw').css("border", "1px solid red");
      const message = document.getElementById('message');
      const message22 = document.getElementById('message22');
      
          message.hidden = "";
          message22.hidden = "";              
      
  }else{
      var usa = $('#usr').val();
      var pwd = $('#psw').val();
      
      $("#baravg").css('display','block');
  	//animateprogress ("#baravg", 100);
      $("#btnaaa").css('display','none');
    $.post("acceso",{acceess:101,u2:usa,pw2:pwd,g:g},function(yz){
      //console.log(yz);  
    	//document.getElementById('id01').style.display='none';  
    	
      if( yz == "23001" ){
       // alert(" usuario desconocido hjhjkhj");
       //document.getElementById('id08').style.display='block';
    	  $("#btnaaa").css('display','none');
    	  
    	  const message = document.getElementById('message');
          const message22 = document.getElementById('message22');
          
              message.hidden = "";
              message22.hidden = ""; 
              
    	  animateprogress ("#html5", 50,yz);
      }else if( yz == "23003" ){
    	  $("#btnaaa").css('display','none');
    	  const message = document.getElementById('message');
          const message22 = document.getElementById('message22');
          
              message.hidden = "";
              message22.hidden = "";
       //document.getElementById('id09').style.display='block'; 
      }else{
    	  $('#usr').css("border", "");
          $('#psw').css("border", "");
    	  const message = document.getElementById('message');
          const message22 = document.getElementById('message22');
          
              message.hidden = "";
              message22.hidden = "";
              
              $("#message").css('display','none');
              $("#message22").css('display','none');
    	  $('#usr').val('');
          $('#psw').val('');
    	  
    	  animateprogress ("#html5", 100,yz);
        
        
      }
    });

  }
}
 
 

 
 function animateprogress (id, val, x){    
	  
	  
	  if( val == 50){
		  
		  
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
		    
		    
		    if( i == 50){
		    	
		    	$("#examplef").modal('show');
	            var modal = document.getElementById('examplef');
	      modal.style.display = "block";
	      $("#messgerF").html("");
	      $("#messgerF").html("<h4>Este Usuario  es desconocido, utiliza uno alterno.</h4>");	    	
		    	$("#baravg").fadeOut(5000);
	            //$("#registroU").css('display','block');
		    	$("#btnaaa").fadeIn(5000);
		    	
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
		    	 
	            //render a 
		    	
	            location.href=x;
	            $("#baravg").css('display','none');
	            $("#btnaaa").css('display','block');
	            
	          	
	          }
		
		                                         
		    }
		 
		        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */
		  
		  
	  }
	  
	
	                 
	}

 
 
 function login0(a){
  var g = a;
  var user = $('#uname0').val();
  var pass = $('#psw0').val();
  if( user == " " || user == "" || pass == " " || pass == ""  ){
    alert("completa campos");
  }else{
      var usa = $('#uname0').val();
      var pwd = $('#psw0').val();
    $.post("acceso",{acceess:101,u2:usa,pw2:pwd,g:g},function(yz){
      document.getElementById('id0').style.display='none';  

      if( yz == "23001" ){
       // alert(" usuario desconocido hjhjkhj");
       document.getElementById('id07').style.display='block'; 
      }else if( yz == "23003" ){
       // alert(" GFHTY YHuario activo ");
    
       document.getElementById('id06').style.display='block'; 
      }else{

        location.href=yz;
      }
    });

  }
}

 function login10(a){
  var g = a;
  var user = $('#uname10').val();
  var pass = $('#psw10').val();
  if( user == " " || user == "" || pass == " " || pass == ""  ){
    alert("completa campos");
  }else{
      var usa = $('#uname10').val();
      var pwd = $('#psw10').val();
    $.post("acceso",{acceess:101,u2:usa,pw2:pwd,g:g},function(yz){
      document.getElementById('id10').style.display='none';  

      if( yz == "23001" ){
       // alert(" usuario desconocido hjhjkhj");
       document.getElementById('id12').style.display='block'; 
      }else if( yz == "23003" ){
       // alert(" GFHTY YHuario activo ");
   
       document.getElementById('id11').style.display='block'; 
      }else{

        location.href=yz;
      }
    });

  }
}

function redirect(){
  location.href="Registro_C";
}
function nUser(){
   document.getElementById('id07').style.display='none';
  document.getElementById('id0').style.display='block';
}
function nUser2(){
   document.getElementById('id08').style.display='none';
  document.getElementById('id01').style.display='block';
}
function nUser3(){
   document.getElementById('id12').style.display='none';
  document.getElementById('id10').style.display='block';
}
function reactivarS(){
 
	 var user = $('#uname0').val();
     var pass = $('#psw0').val(); 

     $.post("acceso",{acceess:100,user:user,pass:pass},function(yz){
    	
    	//alert(yz);
    document.getElementById('id06').style.display='none';
	document.getElementById('id0').style.display='block';
      
    });

}
function reactivarS2(){
 
   var user = $('#uname').val();
     var pass = $('#psw').val(); 

     $.post("acceso",{acceess:100,user:user,pass:pass},function(yz){
      
      //alert(yz);
    document.getElementById('id09').style.display='none';
  document.getElementById('id01').style.display='block';
      
    });

}
function reactivarS3(){
 
   var user = $('#uname10').val();
     var pass = $('#psw10').val(); 

     $.post("acceso",{acceess:100,user:user,pass:pass},function(yz){
      
      //alert(yz);
    document.getElementById('id11').style.display='none';
  document.getElementById('id10').style.display='block';
      
    });

}
 function login2(a){
  var g = a;
  var user = $('#uname2').val();
  var pass = $('#psw2').val();
  if( user == " " || user == "" || pass == " " || pass == ""  ){
    alert("completa campos");
  }else{
      var usa = $('#uname2').val();
      var pwd = $('#psw2').val();
    $.post("acceso",{acceess:101,u2:usa,pw2:pwd,g:g},function(yz){

      if( yz == "23001" ){
        alert(" usuario desconocido");
      }else if( yz == "23003" ){
        alert(" usuario activo ");
      }else{

        location.href=yz;
      }
    });

  }
}

 function login3(a){
    var g = a;
  var user = $('#uname3').val();
  var pass = $('#psw3').val();
  if( user == " " || user == "" || pass == " " || pass == ""  ){
    alert("completa campos");
  }else{
      var usa = $('#uname3').val();
      var pwd = $('#psw3').val();
    $.post("acceso",{acceess:101,u2:usa,pw2:pwd,g:g},function(yz){
      if( yz == "23001" ){
        alert(" usuario desconocido");
      }else if( yz == "23003" ){
        alert(" usuario activo ");
      }else{

        location.href=yz;
      }
    });

  }
}

function login4(a){
  var g = a;
  var user = $('#uname4').val();
  var pass = $('#psw4').val();
  if( user == " " || user == "" || pass == " " || pass == ""  ){
    alert("completa campos");
  }else{
      var usa = $('#uname4').val();
      var pwd = $('#psw4').val();
    $.post("acceso",{acceess:101,u2:usa,pw2:pwd,g:g},function(yz){

      if( yz == "23001" ){
        alert(" usuario desconocido");
      }else if( yz == "23003" ){
        alert(" usuario activo ");
      }else{

        location.href=yz;
      }
    });

  }
}


