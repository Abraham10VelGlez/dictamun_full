(function(angular) {//alert("angular activadoo");
	'use strict';

	/*  EVENTO PARA INICIAR CONTROLADOR DE UN  FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */
	angular.module('app2', ['app2.ControllerTab2','datatables']);
	angular.module('app2.ControllerTab2', []).controller('ControllerTab2', function($scope,$http) {



		$("#tblseg").css('display','block');

		var link = 1;
               var  clasif = 53;
                ////////*** muestra los dictamenes en estatus 53, con archivo en hojas verdes no validos //******///////////

              				$http.post('../../acceso2', {
              					data: {access: 42,link : link,clasif:clasif }
              				}).success(function(response){

                              if( response == "000"){
                                $("#tblseg4").css('display','block');
                                $('#sinRegistro4').css('display','block');
                                //console.log("sin registros dictamenes validados");
                                // document.getElementById('id01').style.display='block'; arreglar la posicion del modal
                              }else{
                                //mostramos los datos de la tabla
                              //console.log(response);
              								$("#tblseg4").css('display','block');
              								$scope.lista_aaax = response;
                              }



              				 }).error(function(response){
             					//console.log(response);
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



	//se puede usar este metodo para capturar un valor del tabla
function selection2(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(1)").text();
	            var cx = dato.trim();
	            location.href = "../DictameneGral/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
}
function selection3(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            var cx = dato.trim();
	            location.href = "../DictameneGral/"+dato.trim();
	            //$(this).removeClass('selected');	 SegDictamen
	    } );
}
function selection32(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e3 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            var cx = dato.trim();
	            location.href = "../DictameneGral/"+dato.trim();
	            //$(this).removeClass('selected');	 SegDictamen
	    } );
}


function dictamenpen(){
var dato = "";
var dato4 = "";
	 //para seleccionar una opcion
	    $('#myTabl1e tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            dato4 = $(this).find("td:eq(4)").text();
	            var cx = dato.trim();
	            var sd = dato4.trim();
	            location.href = "../DictameneGral/"+ dato + '?' + dato4 ;
	            //$(this).removeClass('selected');	 SegDictamen
	    } );
}
function dictamenpr(){

		var dato = "";
		var dato3 = "";
	 //para seleccionar una opcion
	    $('#myTabl1e2 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            dato3 = $(this).find("td:eq(5)").text();
	            var cx = dato.trim();
	            var fg = dato3.trim();
	            location.href = "../DictameneGral/"+ fg + '?' + dato.trim();
	            //$(this).removeClass('selected');	 SegDictamen
	    } );

}
function dictamenvali(){
	var dato = "";
	var dato6 = "";
	 //para seleccionar una opcion
	    $('#myTabl1e3 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            dato6 = $(this).find("td:eq(7)").text();
	            var cx = dato.trim();
	            var yu = dato6.trim();
	            location.href = "../DictameneGral/"+ dato6 + '?' +dato.trim();
	            //$(this).removeClass('selected');	 SegDictamen
	    } );
}
function dictamenrechz(){
	var dato = "";
	var dato6 = "";
	 //para seleccionar una opcion
	    $('#myTabl1e4 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            dato6 = $(this).find("td:eq(7)").text();
	            var cx = dato.trim();
	            var yu = dato6.trim();
	            location.href = "../DictameneGral/"+ dato6 + '?' +dato.trim();
	            //$(this).removeClass('selected');	 SegDictamen
	    } );

}

function avisoD(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(1)").text();
	            var cx = dato.trim();
	            location.href = "../avisoDictamen/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
}
function avisoDP(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e2 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(2)").text();
	            var cx = dato.trim();
	            location.href = "../avisoDictamen/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
}
function avisoDV(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e3 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(2)").text();
	            var cx = dato.trim();
	            location.href = "../avisoDictamen/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
}

function avisoCC(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl1e4 tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(2)").text();
	            var cx = dato.trim();
	            location.href = "../avisoDictamen/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
}
function editarInDic(){

	var modal = document.getElementById('id02');//id007
	modal.style.display = "block";

		var idUser =  $("#idSe").val();

		$.post("../../acceso",{acceess:27,idUser:idUser},function(z){

		//$("#editP").val(z);
		$(z).each(function(key,valuee){
				$("#editP").val(valuee.idetallusu);

				$('#tel').val(valuee.telefono);

				$('#user').val(valuee.nombre_usuario);
				$('#con').val(valuee.pasword);
		});

		});

  }
  function guardarCambiosD(){
  		var modal = document.getElementById('id02');
  		modal.style.display = "none";

  		var idP= $("#editP").val();


		var te2= $('#tel').val();
		te2 = validaNumericos2();

		////////////////////////////////////

		var te= $('#tel').val();
		var us= $('#user').val();
		var co= $('#con').val();

		if (!te2 || us=="" || co == "") {

			var modal = document.getElementById('id04');
  		modal.style.display = "none";
			var modal = document.getElementById('id03');
  		modal.style.display = "block";

		}else{

		$.post("../../acceso",{acceess:25,idP:idP,te:te,us:us,co:co},function(z){

		var modal = document.getElementById('id04');
  		modal.style.display = "block";


		});

		}


  }
  function validaNumericos2(event) {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['formulario']['tel'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('msjTel');

    input.willValidate = false;

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
function okValidado2(){
  	var modal = document.getElementById('id04');
  		modal.style.display = "none";
  	location.reload();

  }





function tablaxinmuebleOcultar(){

		$('#tablaxinmueble').html("");
		 location.reload();

}


function tablaInmueblesP(t){

	var dato = "";
	var cx = "";
	var c = "";
	var c2 = "";
	var c3 = "";
	var tipo=t;
	 $('#tablaxinmueble').html("");
	  z="";

	  if (tipo == 1) {  //pendientes
		  var folio_sinceros = ""; var personat = "";
	  	  $('#myTabl1e tbody').on( 'click', 'tr', function () {
	    		cx="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            folio_sinceros = $(this).find("td:eq(1)").text();
	            personat = $(this).find("td:eq(2)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:9,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx=""; c=""; c2=""; c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
					 c2= "<tr><td><a href='../DictameneGral/"+ folio_sinceros + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + personat + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

						 	}else if(valuee.tipod == 2){

			 c2= "<tr><td><a href='../DictameneGral/"+ folio_sinceros + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + personat + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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

	  }else if (tipo == 2) { //en proceso
	  	  $('#myTabl1e2 tbody').on( 'click', 'tr', function () {
	    		cx=""; c=""; c2=""; c3="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:9,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx=""; c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td>"+valuee.cclave+"</td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td>"+valuee.cclave+"</td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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
	  }else if (tipo == 3) { //validados
	  	  $('#myTabl1e3 tbody').on( 'click', 'tr', function () {
	    		cx=""; c=""; c2=""; c3="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:9,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx="";
	        	c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../DictameneGral/"+valuee.aniodictamen+"?"+valuee.cclave+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../DictameneGral/"+valuee.aniodictamen+"?"+valuee.cclave+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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
	  }else if (tipo == 4) {  //cancelados o observados
		  var folio_sinceros = ""; var personat = "";
	  	  $('#myTabl1e4 tbody').on( 'click', 'tr', function () {
	    		cx=""; c=""; c2=""; c3="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            folio_sinceros = $(this).find("td:eq(1)").text();
	            personat = $(this).find("td:eq(2)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:9,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx=""; c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){
				 //285/1210621207000000/2020/2
			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../DictameneGralC/"+ folio_sinceros + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + personat + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../DictameneGralC/"+ folio_sinceros + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + personat + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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
	  }else if (tipo == 53) {  //cancelados
		  var folio_sinceros = ""; var personat = "";
	  	  $('#myTabl1e4 tbody').on( 'click', 'tr', function () {
	    		cx=""; c=""; c2=""; c3="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            folio_sinceros = $(this).find("td:eq(1)").text();
	            personat = $(this).find("td:eq(2)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:9,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx=""; c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){
				 //285/1210621207000000/2020/2
			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../DictamenenoGreen/"+ folio_sinceros + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + personat + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../DictamenenoGreen/"+ folio_sinceros + "/" + valuee.cclave + "/" + valuee.aniodictamen + "/" + personat + "'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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




}
