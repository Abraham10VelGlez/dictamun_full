(function(angular) {


	angular.module('Appadmusu', ['Appadmusu.AppadmusuController']);
	angular.module('Appadmusu.AppadmusuController', []).controller('AppadmusuController', function($scope,$http) {


		$scope.newU = function(){


						if($scope.selectp == "5"){ //Delegado
							var perfil = $scope.selectp;
							perfil = valida_select_perfil();

							var delegacion = $scope.selectpd;
							delegacion = valida_select_delegacion();

				var nombre= $scope.nomu;
				 	nombre = validarNombre();
				var ap = $scope.apu;
					ap= validarAPP();
				var am = $scope.amu;
					am=validarAPM();
				var curp = $scope.curpu;
					curp = validarCurp();
				var rfc = $scope.rfcu;
					rfc = validarRfc();
				var email = $scope.emailu;
					email = validaremailF();
					var tel = $scope.telu;
				    tel = validarTelA();
				if($scope.selectp === undefined || $scope.nomu === undefined ||
					   $scope.apu === undefined ||
				       $scope.amu === undefined||
				       $scope.curpu === undefined||
				       $scope.rfcu === undefined||
				       $scope.emailu === undefined||
					   $scope.telu === undefined ||
					   $scope.selectpd == 0 || !nombre || !ap || !am || !curp || !rfc || !email || !tel || !perfil  || !delegacion ){
					////console.log('Verificar datos');
					//var modal = document.getElementById('id03');
					//modal.style.display = "block";
					//$("#id03").fadeOut(5000);
					//$("#evt").html("");
					//$("#evt").html("<h1>Falta acompletar campos para finalizar el registro</h1>");

					animateprogress("#html5", 0, 5);
			}else{




				$http.post('../../acceso2', {
					data: {access: 60,selectp:$scope.selectp
						,x1 : $scope.nomu ,
					       x2 :$scope.apu,
					       x3 :$scope.amu,
					       x4 :$scope.curpu,
					       x5 :$scope.rfcu,
					       x6 :$scope.emailu,
						   x7 :$scope.telu,
						   x8 :$scope.selectpd
						}
				}).success(function(response){
					//resultado

					if( r == "Error"){
						// se registra con error
					/*
					//console.log(response);
					//console.log('Error');
					var modal = document.getElementById('id03');
					modal.style.display = "block";
					$("#id03").fadeOut(5000);
					$("#evt").html("");
					$("#evt").html("Falta Seleccionar el Tipo de Perfil del Nuevo Usuario");
					  $("#registroU").css('display','block');
					  */
						$("#baravg").css('display','flex');
						$("#xnw").css('display','none');
						$("#xnrest").css('display','none');
					  animateprogress("#html5", 25, r);

				}else{
					//se registra correctamente
					$("#baravg").css('display','flex');
					$("#xnw").css('display','none');
					$("#xnrest").css('display','none');

					   animateprogress("#html5", 100, r);


				}

								/*if( response == "Error"){

									////console.log(response);
									////console.log('Error');
									var modal = document.getElementById('id03');
									modal.style.display = "block";
									$("#id03").fadeOut(5000);
									$("#evt").html("");
									$("#evt").html("Falta Seleccionar el Tipo de Perfil del Nuevo Usuario");
									  $("#registroU").css('display','block');

								}else{

									////console.log(response);
									$scope.selectp = "";
									   $scope.nomu = "";
								       $scope.apu = "";
								       $scope.amu = "";
								       $scope.curpu = "";
								       $scope.rfcu = "";
								       $scope.emailu = "";
									   $scope.telu = "";
										var modal = document.getElementById('id01');
										modal.style.display = "block";
										//$("#id01").fadeOut(5000);

                    $("#credenciales").html("");
                  $("#credenciales").html(response);
                    $("#registroU").css('display','block');
								}*/

				}).error(function(){
					////console.log('Error');
				});


			}

			}else{ //otros

				var perfil = $scope.selectp;
				perfil = valida_select_perfil();



				var nombre= $scope.nomu;
				 	nombre = validarNombre();
				var ap = $scope.apu;
					ap= validarAPP();
				var am = $scope.amu;
					am=validarAPM();
				var curp = $scope.curpu;
					curp = validarCurp();
				var rfc = $scope.rfcu;
					rfc = validarRfc();
				var email = $scope.emailu;
					email = validaremailF();
				var tel = $scope.telu;
				    tel = validarTelA();

				if($scope.selectp === undefined || $scope.nomu === undefined ||
					   $scope.apu === undefined ||
				       $scope.amu === undefined||
				       $scope.curpu === undefined||
				       $scope.rfcu === undefined||
				       $scope.emailu === undefined||
					   $scope.telu === undefined || !nombre || !ap || !am || !curp || !rfc || !email || !tel || !perfil  ){

					animateprogress("#html5", 0, 5);



			}else{
				var numregistro = $scope.registro;
				numregistro = valida_select_numreg();

				if( !numregistro ){
					animateprogress("#html5", 0, 5);
				}else{




					$http.post('../../acceso2', {
						data: {access: 48,selectp:$scope.selectp,x1:$scope.registro}
					}).success(function(response){
						//resultado
										////console.log(response);
										if (response == "s" || response == null) {
											////console.log("Sin Registro");
											$http.post('../../acceso2', {
						data: {access: 47,selectp:$scope.selectp
							,x1 : $scope.nomu ,
						       x2 :$scope.apu,
						       x3 :$scope.amu,
						       x4 :$scope.curpu,
						       x5 :$scope.rfcu,
						       x6 :$scope.emailu,
							   x7 :$scope.telu,
							   x8 :11,
							   reg : $scope.registro
							}
					}).success(function(r){

					////console.log(r);
						//resultado
										if( r == "Error"){
											// se registra con error
										/*
										//console.log(response);
										//console.log('Error');
										var modal = document.getElementById('id03');
										modal.style.display = "block";
										$("#id03").fadeOut(5000);
										$("#evt").html("");
										$("#evt").html("Falta Seleccionar el Tipo de Perfil del Nuevo Usuario");
										  $("#registroU").css('display','block');

										  */
											$("#baravg").css('display','flex');
											$("#xnw").css('display','none');
											$("#xnrest").css('display','none');
										  animateprogress("#html5", 25, r);

									}else{
										$("#baravg").css('display','flex');
										$("#xnw").css('display','none');
										$("#xnrest").css('display','none');
										//se registra correctamente


										   animateprogress("#html5", 100, r);


									}

					}).error(function(){
						//console.log('Error');
					});





										}else{
											////console.log("con registro y ya existe");
											$("#baravg").css('display','flex');
											$("#xnw").css('display','none');
											$("#xnrest").css('display','none');

												animateprogress("#html5", 50, response);





										}

					}).error(function(){
						//console.log('Error');
					});



				}


			}

			}





		};

			$scope.CXU = function (){

			//alert("cancelar todo");

			$scope.selectp = "";
			$scope.selectpd = "";
			$scope.registro = "";
			   $scope.nomu = "";
		       $scope.apu = "";
		       $scope.amu = "";
		       $scope.curpu = "";
		       $scope.rfcu = "";
		       $scope.emailu = "";
			   $scope.telu = "";
		};
	});




	})(angular);



 //AQUI PUEDE IR FUNCIONES CON AJAX Y QUERY


function selection40(){
	var modal = document.getElementById('id007');
	modal.style.display = "block";
	var dato = "";
	$("#idRewrite").val('');
	 //para seleccionar una opcion
	    $('#table_ususw tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            ////console.log(dato.trim());
	            $("#idRewrite").val(dato.trim());
$.post("../../acceso",{acceess:81,alf:dato.trim()},function(s){
		////console.log(s);
			$(s).each(function(key,valuee){

				$('#selectp').val(valuee.tipo_usuario);

			$('#nomu').val(valuee.nombre);
			$('#apu').val(valuee.ap_paterno);
			$('#amu').val(valuee.ap_materno);
			$('#curpu').val(valuee.curp);
			$('#rfcu').val(valuee.rfc);
			$('#emailu').val(valuee.correo);
			$('#telu').val(valuee.telefono);


		});
	});


	    } );

}


function selection50(){
	var modal = document.getElementById('id008');//id007
	modal.style.display = "block";
	var dato = "";
	$("#idRewrite2").val('');
	 //para seleccionar una opcion
	    $('#table_ususw tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	           // //console.log(dato.trim());
	            $("#idRewrite2").val(dato.trim());
	            //location.href = "../SegDictamen/"+dato.trim();
	            //$(this).removeClass('selected');

			   //location.href="../Admin2Gris/";



	    } );

}



function selection60(){
	if( $("#selectp").val() == "" || $("#nomu").val() == "" ||
			$("#apu").val() == "" ||
			$("#amu").val() == ""||
			$("#curpu").val() == ""||
			$("#rfcu").val() == ""||
			$("#emailu").val() == ""||
			$("#telu").val() == ""){
		////console.log('faltan datos');

	}else{

	$.post("../../acceso",{acceess:58,selectp:$("#selectp").val()
		,x0 : $("#idRewrite").val()
		,x1 : $("#nomu").val() ,
	       x2 :$("#apu").val(),
	       x3 :$("#amu").val(),
	       x4 :$("#curpu").val(),
	       x5 :$("#rfcu").val(),
	       x6 :$("#emailu").val(),
	       x7 :$("#telu").val()},function(z){
		////console.log(z);
			document.getElementById('id007').style.display='none';
			location.href="../Admin2Gris/";


	});


	}

}


function selection80(){
	if( $("#idRewrite2").val() == "" || $("#idRewrite2").val() == " "){
		////console.log('faltan datos');
	}else{

	$.post("../../acceso",{acceess:59,x0 : $("#idRewrite2").val()},function(xcx){
		////console.log(xcx);
		 	document.getElementById('id008').style.display='none';
		 	location.href="../Admin2Gris/";
	});


	}

}
var blabla = {
		selects: []
	};

function asignamltp(){
	if($("input[class=className]").prop("checked") == true)
	{
		//$("input[type=checkbox]").prop("checked", false);
       $("input[class=className]").prop("checked", true);
        ////console.log("prendido");
	}
	else
	{
        $("input[class=className]").prop("checked", false);
        ////console.log("apagado");
	}
	//const ;
	////console.log($('input:radio[name=rdasm]:checked').val());
	////console.log($('input[type="radio"][class="className"]:checked').val());
	////console.log(selects);
	blabla.selects.push({erv :$('select[id=Rvigcm]').val(), folio:$('input[type="checkbox"][class="className"]:checked').val() ,selec:1 });
	////console.log($('select[id=Rvigcm]').val());
	////console.log(blabla);


}

$(document).ready(function () {

	//delegaciones
	$.post("../../acceso",{acceess:61},function(n){
		////console.log(n);
			$(n).each(function(key,valuee){

			$('#selectpd').append('<option value="'+ valuee.delegacion +'">' + valuee.nombdeleg +'</option>');

		});
	});
$("#selectp").change(function(){

	   if( $(this).val() == '3' ){
		   $("#r5").css('display','none');
		   $("#r6").css('display','flex');

	   }else if( $(this).val() == '2' ){
		   $("#r5").css('display','none');
		   $("#r6").css('display','flex');

	   }else if( $(this).val() == '5' ){
		   $("#r6").css('display','none');
		   $("#r5").css('display','flex');

	   }else{
		   $("#r6").css('display','none');
		   $("#r5").css('display','none');
	   }




});


});


 function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
}
 function validarNombre() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['formulario']['nomu'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('message');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){

          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }

         if(!isValid) {
        message.hidden = false;


      } else {
        message.hidden = true;
      }
      // devolvemos el valor de isValid
      return isValid;
    }
    function validarAPP() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['formulario']['apu'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAP');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){

          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          }else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }
         if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      // devolvemos el valor de isValid
      return isValid;
    }

    function validarAPM() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['formulario']['amu'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAM');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){

          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          }else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }



         if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      // devolvemos el valor de isValid
      return isValid;
    }
    function validarCurp() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['formulario']['curpu'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('msjCurp');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9]+$', 'i');

      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){

          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          }else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }
         if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      // devolvemos el valor de isValid
      return isValid;
    }
    function validarRfc() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['formulario']['rfcu'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('msjRFC');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('^[A-Z0-9]+$', 'i');

    // Primera validacion, si input esta vacio entonces no es valido
    if(!input.value) {
      isValid = false;
    } else {
        // Segunda validacion, si input contiene caracteres diferentes a los permitidos
        if(!pattern.test(input.value)){

        // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
        // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
          isValid = false;
        }else {
          // Si pasamos todas la validaciones anteriores, entonces el input es valido
          isValid = true;
        }
      }
       if(!isValid) {
      message.hidden = false;

    } else {
      message.hidden = true;
    }
    // devolvemos el valor de isValid
    return isValid;
  }
  function validaremailF() {
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['formulario']['emailu'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageEmail');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}');

    // Primera validacion, si input esta vacio entonces no es valido
    if(!input.value) {
      isValid = false;
    } else {
        // Segunda validacion, si input contiene caracteres diferentes a los permitidos
        if(!pattern.test(input.value)){

        // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
        // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
          isValid = false;
        } else {
          // Si pasamos todas la validaciones anteriores, entonces el input es valido
          isValid = true;
        }
      }

       if(!isValid) {
      message.hidden = false;


    } else {
      message.hidden = true;
    }
    // devolvemos el valor de isValid
    return isValid;
  }

   function cre2(){
    location.reload();
  }


  function reemplazarRegistro(){

  	//alert('reemplazar registro');

  	 document.getElementById('remplazarU').style.display='none';
  	 document.getElementById('cancelarRemU').style.display='none';
  	var tipo = $('#selectp').val();
  	var nombre = $('#nomu').val();
  	var ap = $('#apu').val();
  	var am = $('#amu').val();
  	var rfc = $('#rfcu').val();
  	var curp = $('#curpu').val();
  	var email = $('#emailu').val();
  	var tel = $('#telu').val();
  	var reg = $('#registro').val();
  	var tipoUserAnterior = $('#tipoUserAnterior').val();


				$.post("../../acceso",{ acceess:17,tipo:tipo,nombre:nombre,ap:ap,am:am,curp:curp,rfc:rfc,email:email,tel:tel,reg:reg,tipoUserAnterior:tipoUserAnterior},function(r){
					////console.log(r);
					if (r == "Error") {
					//console.log("error al reemplazar registro");

				}else{
					var modal = document.getElementById('id04');
                    modal.style.display = "none";
					 var modal = document.getElementById('id01');
                    modal.style.display = "block";

                    $("#credenciales").html("");
                  $("#credenciales").html(r);
                    $("#registroU").css('display','block');
					//resultado

				}
	});





  }


  function validarTelA() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['formulario']['telu'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messagetell');
      input.willValidate = false;
      const maximo = 12;
      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[0-9]+$', 'i');
      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){
          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else if (input.value.length > maximo) {
          isValid = false;
          }
          else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }
         if(!isValid) {
        message.hidden = false;
      } else {
        message.hidden = true;
      }
      // devolvemos el valor de isValid
      return isValid;
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
		  $("#baravg").fadeOut(5000);
	      ////console.log("Ocurrio algun detalle de envio de su registro comunicarse con el Administrador IGECEM.");
	      $("#xnw").fadeIn(5000);
			$("#xnrest").fadeIn(5000);


		    }


		    }

		        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */




	  }else if( val == 50){


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



		      //$("#messgerrespuest").html("");
		      //$("#messgerrespuest").html("<h4>Ocurrio algun detalle de envio de su registro comunicarse con el Administrador IGECEM.</h4>");
			    	//$("#baravg").fadeOut(5000);
				      ////console.log("Ocurrio algun detalle de envio de su registro comunicarse con el Administrador IGECEM.");
				      //$("#xnw").fadeIn(5000);
						//$("#xnrest").fadeIn(5000);

							$("#baravg").fadeOut(5000);



				 		 	   /*
				 		 	$("#selectp").val("_");
				 		 	$("#nomu").val("");
				 		 	$("#apu").val("");
				 		 	$("#amu").val("");
				 		 	$("#curpu").val("");
				 		 	$("#rfcu").val("");
				 		 	$("#emailu").val("");
				 		 	$("#telu").val("");
				 		 	$("#registro").val("");	*/

				 		 	 $(x).each(function(key,valuee){
				 		 		if (valuee.tipo_usuario == 2 ) {
								   	 tipo_usuario = "Dictaminador ";
								   }else if (valuee.tipo_usuario == 3) {
								   	 tipo_usuario = "Revisor ";
								   }
				 		 		    $("#aaax").html("");
								 	$("#aaax").html("El registro le pertenece al " + tipo_usuario + "que se encuentra registrado como " + valuee.nombre_especialista);

								 });


							   $("#xnw").fadeIn(5000);
								$("#xnrest").fadeIn(5000);

								 $("#r6").css('display','none');
								   $("#r5").css('display','none');

								   $("#reg_newu").css('display','none');
								   $("#reg_newuresulx").css('display','flex');



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

		 		 	$("#baravg").fadeOut(5000);




		 		 	$("#selectp").val("_");
		 		 	$("#nomu").val("");
		 		 	$("#apu").val("");
		 		 	$("#amu").val("");
		 		 	$("#curpu").val("");
		 		 	$("#rfcu").val("");
		 		 	$("#emailu").val("");
		 		 	$("#telu").val("");
		 		 	$("#registro").val("");

					   ////console.log(x);
		 		 	$("#aaa").html('');
		            $("#aaa").html(x);


					   $("#xnw").fadeIn(5000);
						$("#xnrest").fadeIn(5000);

						 $("#r6").css('display','none');
						   $("#r5").css('display','none');

						   $("#reg_newu").css('display','none');
						   $("#reg_newuresul").css('display','flex');









		          }


			    }

			        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */


		  }



		}


  function finishavg() {

	  location.href = "../AdminGris/";

        }

  function redwriteavg() {
	  $("#reg_newuresulx").css('display','none');
	  $("#reg_newu").css('display','flex');
	  $("#r6").css('display','flex');

	 }



  function valida_select_perfil(){
	  let isValid = false;
	  var gg = $("#selectp").val();
	  const message = document.getElementById('messageperf');
	  if( gg == " " || gg == "" || gg === undefined || gg == "? undefined:undefined ?" || gg == "_" ){
		  isValid = false;

	  }else{
		  isValid = true;

	  }

	  if(!isValid) {
	        message.hidden = false;


	      } else {
	        message.hidden = true;
	      }
	  return isValid;

  }





  function valida_select_delegacion(){
	  let isValid = false;
	  var gg = $("#selectpd").val();
	  const message = document.getElementById('messagedelega');
	  if( gg == " " || gg == "" || gg === undefined || gg == "? undefined:undefined ?" || gg == "_" || gg == "0" ){
		  isValid = false;

	  }else{
		  isValid = true;

	  }

	  if(!isValid) {
	        message.hidden = false;


	      } else {
	        message.hidden = true;
	      }
	  return isValid;

  }



  function valida_select_numreg(){

	  // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['formulario']['registro'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messagenumreg');
      input.willValidate = false;
      const maximo = 12;
      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[0-9]+$', 'i');
      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){
          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else if (input.value.length > maximo) {
          isValid = false;
          }
          else {
            // Si pasamos todas la validaciones anteriores, entonces el input es valido
            isValid = true;
          }
        }
         if(!isValid) {
        message.hidden = false;
      } else {
        message.hidden = true;
      }
      // devolvemos el valor de isValid
      return isValid;


  }
