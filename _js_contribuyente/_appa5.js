(function(angular) {


	angular.module('Appadmusu', ['Appadmusu.AppadmusuController']);
	angular.module('Appadmusu.AppadmusuController', []).controller('AppadmusuController', function($scope,$http) {


		$scope.newU = function(){
			$("#registroU").css('display','none');
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
				    tel = validarTel();




        if($scope.nomu === undefined ||
             $scope.apu === undefined ||
               $scope.amu === undefined||
               $scope.curpu === undefined||
               $scope.rfcu === undefined||
               $scope.emailu === undefined||
             $scope.telu === undefined || !nombre || !ap || !am || !curp || !rfc || !email || !tel){

        //console.log('Verificar datos');
        //	$("#examplef").modal('show');
        //var modal = document.getElementById('examplef');
       // modal.style.display = "block";
       // $("#examplef").fadeOut(5000);
        //$("#messgerF").html("");
        //$("#messgerF").html("<h3>Registro Incompleto, por favor completa los campos </h3>");
				$("#registroU").css('display','block');

      }else{

    	//validar que el correo no se encuentre ya registrado

          $http.post('acceso2', {
           data: {access: 49,email:$scope.emailu
             }
         }).success(function(response){
           //resultado
              if (response == 2) {
              //console.log('sin registro');
               $("#registroU").css('display','none');
               email = validaremailF();


               //$("#baravg").css('display','block');
               //$("#porc").width('100%');
        $http.post('acceso2', {
          data: {access: 78,selectp:1
            ,x1 : $scope.nomu ,
                 x2 :$scope.apu,
                 x3 :$scope.amu,
                 x4 :$scope.curpu,
                 x5 :$scope.rfcu,
                 x6 :$scope.emailu,
               x7 :$scope.telu,
               x8 :11
            }
        }).success(function(response){

					$("#baravg").css('display','block');
					//animateprogress ("#baravg", 100);
					animateprogress ("#html5", 100,response);
					 //console.log(response);



          //resultado
              /*  if( response == "Error"){

         console.log(response);
                  //console.log('Error');
         $("#examplef").modal('show');
                  var modal = document.getElementById('examplef');
                  modal.style.display = "block";
                  //$("#examplef").fadeOut(5000);
                  $("#messgerF").html("");
                  $("#messgerF").html("<h4>Ocurrio un detalle técnico de registro, contactar ak Administrador</h4>");
                   $("#registroU").css('display','block');


                }else{

                	$("#baravg").css('display','block');
                	//animateprogress ("#baravg", 100);
                	animateprogress ("#html5", 100,response);
                   //console.log(response);
                	$scope.nomu = "";
                    $scope.apu = "";
                    $scope.amu = "";
                    $scope.curpu = "";
                    $scope.rfcu = "";
                    $scope.emailu = "";
                  $scope.telu = "";


                }*/



        }).error(function(){
          //console.log('Error');
        	$("#examplef").modal('show');
          var modal = document.getElementById('examplef');
          modal.style.display = "block";
          $("#messgerF").html("");
          $("#messgerF").html("<h4>No se puede registrar la información, Verificar conexión de red</h4>");

        });


              }else{
								$("#registroU").css('display','block');
                  //console.log('exixtente');
            	  $("#baravg").css('display','block');
            var c = "error";
            animateprogress ("#html5", 50,c);



                 }

            }).error(function(resulta){
              //console.log(resulta);
            	$("#examplef").modal('show');
            	 var modal = document.getElementById('examplef');
                 modal.style.display = "block";
                 $("#messgerF").html("");
                 $("#messgerF").html("<h4>Error de  Correo Electrónico al enviarse</h4>");
            });


      }



		};

			$scope.CXU = function (){

			//alert("cancelar todo");
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
	            //console.log(dato.trim());
	            $("#idRewrite").val(dato.trim());
$.post("../../acceso",{acceess:81,alf:dato.trim()},function(s){
		//console.log(s);
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
	            console.log(dato.trim());
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
		console.log('faltan datos');

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
		console.log(z);
			document.getElementById('id007').style.display='none';
			location.href="../Admin2Gris/";


	});


	}

}


function selection80(){
	if( $("#idRewrite2").val() == "" || $("#idRewrite2").val() == " "){
		console.log('faltan datos');
	}else{

	$.post("../../acceso",{acceess:59,x0 : $("#idRewrite2").val()},function(xcx){
		console.log(xcx);
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
        console.log("prendido");
	}
	else
	{
        $("input[class=className]").prop("checked", false);
        console.log("apagado");
	}
	//const ;
	//console.log($('input:radio[name=rdasm]:checked').val());
	//console.log($('input[type="radio"][class="className"]:checked').val());
	//console.log(selects);
	blabla.selects.push({erv :$('select[id=Rvigcm]').val(), folio:$('input[type="checkbox"][class="className"]:checked').val() ,selec:1 });
	//console.log($('select[id=Rvigcm]').val());
	console.log(blabla);


}


 function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
}
 function validarNombre() {


      let isValid = false;
      const message = document.getElementById('message');
            var dato = document.getElementById("nomu").value;
         //var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
         var valoresAceptados = /^[a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
             if (dato.match(valoresAceptados)){
                isValid = true;
             } else {
               isValid = false;
            }

            if(!isValid) {
              message.hidden = false;

            } else {
              message.hidden = true;
            }
            return isValid;

    }
    function validarAPP() {

    	let isValid = false;
        const message = document.getElementById('messageAP');
              var dato = document.getElementById("apu").value;
           //var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
           var valoresAceptados = /^[a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
               if (dato.match(valoresAceptados)){
                  isValid = true;
               } else {
                 isValid = false;
              }

              if(!isValid) {
                message.hidden = false;

              } else {
                message.hidden = true;
              }
              return isValid;
    }

    function validarAPM() {

    	let isValid = false;
        const message = document.getElementById('messageAM');
              var dato = document.getElementById("amu").value;
           //var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
           var valoresAceptados = /^[a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
               if (dato.match(valoresAceptados)){
                  isValid = true;
               } else {
                 isValid = false;
              }

              if(!isValid) {
                message.hidden = false;

              } else {
                message.hidden = true;
              }
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
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ0-9]+$', 'i');

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
    const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ0-9]+$', 'i');

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
	  let isValid = false;

		    campo =  document.forms['formulario']['emailu'];
		    const message = document.getElementById('messageEmail');

		    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
		    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
		    if (emailRegex.test(campo.value)) {
		      //valido.innerText = "válido";
		    	isValid = true;
		    } else {
		      //valido.innerText = "incorrecto";
		    	isValid = false;
		    }

		    if(!isValid) {
		        message.hidden = false;


		      } else {
		        message.hidden = true;
		      }
		      // devolvemos el valor de isValid


		      return isValid;




  }

  function validarTel() {
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

  function cre2(){
    location.reload();
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
	      $("#messgerF").html("<h4>Este Correo Electrónico ya esta registrado, utiliza uno alterno.</h4>");
		    	$("#baravg").fadeOut(5000);
	            //$("#registroU").css('display','block');
		    	$("#registroU").fadeIn(5000);

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

	            $("#examplet").modal('show');
	           var modal = document.getElementById('examplet');
	           modal.style.display = "block";
	           $("#messgerT").html("");
	         $("#messgerT").html(x);
	            $("#messgerT").css('display','block');
	            $("#baravg").fadeOut(5000);
	            //$("#registroU").css('display','block');
	            $("#registroU").fadeIn(5000);

	          }


		    }

		        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */


	  }



	}
