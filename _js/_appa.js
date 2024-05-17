(function(angular) {


	//Dictamenes/ pendientes

	 angular.module('Appadmdtmviewpen', ['Appadmdtmviewpen.AppadmdtmviewpenControllerTab','datatables']);
	angular.module('Appadmdtmviewpen.AppadmdtmviewpenControllerTab',
	 []).controller('AppadmdtmviewpenControllerTab', function($scope,$http) {

		$http.post('../../acceso2', {
			data: {access: 50}
		}).success(function(response){

			$scope.empList_dtmpen  = response ;

			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");
		});

	$scope.pathvector = {
		vector: []
	};

		/*  CAPTURADOR  */
	$scope.vector = {
		folio: '',
		selec: '',
		opt: '',
	};

	$scope.btnasg = function(){
		//alert("holaaaaaaaa");

		if( $scope.Rvigcm == "" ||  $scope.Rvigcm == " " ||  $scope.Rvigcm == "_" ||  $scope.Rvigcm === undefined ){
			$("#inf").html("Selecciona un Revisor");
		}else{

		$("input[type=checkbox]:checked").each(function(){
//cada elemento seleccionado
console.log($(this).parent().parent().find('td').eq(1).html());
$scope.pathvector.vector.push({
		folio: $(this).parent().parent().find('td').eq(0).html(),
		clave: $(this).parent().parent().find('td').eq(1).html(),
		selec: 1,
		opt: $scope.Rvigcm
	});
});
console.log($scope.pathvector);
console.log($scope.pathvector);
if( $scope.pathvector.vector.length == 0){
//$("#id02").css("display","block");
$("#inf").html("Active la casilla de asignar.");

}else{
$http({
           method: 'POST',
           url: '../../acceso4',
           headers: {'Content-Type': 'application/x-www-form-urlencoded'},
           data: { v:$scope.pathvector },
       }).then(function(response) {
$scope.gists = response.data;
//console.log(response);
console.log(response.data);
//$scope.pathvector.vector = [];
			location.href="../AdminPendientes/";

})
.catch(function(response) {
console.error('Gists error', response.status, response.data);
})
.finally(function() {
console.log("finally finished gists");
});


}
}
	}


	});
	//alert("angular");
	angular.module('Appadm', ['Appadm.AppadmController']);
	angular.module('Appadm.AppadmController', []).controller('AppadmController', function($scope,$http) {

	  $scope.nobtnag = function(){

		  		 if( $scope.no =='' || $scope.no == " " || $scope.no === undefined ){//si es false
		  			console.log("sin dato");
		  		 }else{//si no es verdadero
		  			$http.post('../../acceso2', {
						data: {access: 58,dat:$scope.no}
					}).success(function(response){
						//resultado
									if( response == 6){
										console.log(response);
										console.log('Error');
									}else{
										console.log(response);
										$scope.no="";
										var modal = document.getElementById('id01');
										modal.style.display = "block";
										//$("#id01").fadeOut(5000);
									}

					}).error(function(){
						console.log('Error');
					});

		  		 }


	  };

	  $scope.nodevag = function (){
		  if( $scope.nod =='' || $scope.nod == " " || $scope.nod === undefined ){//si es false
	  			console.log("sin dato");
	  		 }else{//si no es verdadero
	  			$http.post('../../acceso2', {
					data: {access: 59,dat:$scope.nod}
				}).success(function(response){
					//resultado
								if( response == 6){
									console.log(response);
									console.log('Error');
								}else{
									console.log(response);
									$scope.nod="";
									var modal = document.getElementById('id02');
									modal.style.display = "block";
									$("#id02").fadeOut(5000);
								}

				}).error(function(){
					console.log('Error');
				});

	  		 }

	  };




	});


	angular.module('Appadmusu', ['Appadmusu.AppadmusuController']);
	angular.module('Appadmusu.AppadmusuController', []).controller('AppadmusuController', function($scope,$http) {


		$scope.newU = function(){

						if($scope.selectp == "5"){ //Delegado
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
				if($scope.selectp === undefined || $scope.nomu === undefined ||
					   $scope.apu === undefined ||
				       $scope.amu === undefined||
				       $scope.curpu === undefined||
				       $scope.rfcu === undefined||
				       $scope.emailu === undefined||
					   $scope.telu === undefined ||
					   $scope.selectpd == 0 || !nombre || !ap || !am || !curp || !rfc || !email){
					console.log('Verificar datos');
					var modal = document.getElementById('id03');
					modal.style.display = "block";
					$("#id03").fadeOut(5000);
					$("#evt").html("");
					$("#evt").html("<h1>Falta acompletar campos para finalizar el registro</h1>");
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
								if( response == "Error"){

									console.log(response);
									console.log('Error');
									var modal = document.getElementById('id03');
									modal.style.display = "block";
									$("#id03").fadeOut(5000);
									$("#evt").html("");
									$("#evt").html("Falta Seleccionar el Tipo de Perfil del Nuevo Usuario");
									  $("#registroU").css('display','block');

								}else{

									console.log(response);
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
								}

				}).error(function(){
					console.log('Error');
				});


			}

			}else{ //otros

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

				if($scope.selectp === undefined || $scope.nomu === undefined ||
					   $scope.apu === undefined ||
				       $scope.amu === undefined||
				       $scope.curpu === undefined||
				       $scope.rfcu === undefined||
				       $scope.emailu === undefined||
					   $scope.telu === undefined || !nombre || !ap || !am || !curp || !rfc || !email){

				console.log('Verificar datos');
				var modal = document.getElementById('id03');
				modal.style.display = "block";
				$("#id03").fadeOut(5000);
				$("#evt").html("");
				$("#evt").html("<h1>Falta acompletar campos para finalizar el registro</h1>");
			}else{


				$http.post('../../acceso2', {
					data: {access: 48,selectp:$scope.selectp,x1:$scope.registro}
				}).success(function(response){
					//resultado
									console.log(response);
									if (response == "s" || response == null) {
										console.log("Sin Registro");
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

				console.log(r);
					//resultado
									if( r == "Error"){

									console.log(response);
									console.log('Error');
									var modal = document.getElementById('id03');
									modal.style.display = "block";
									$("#id03").fadeOut(5000);
									$("#evt").html("");
									$("#evt").html("Falta Seleccionar el Tipo de Perfil del Nuevo Usuario");
									  $("#registroU").css('display','block');

								}else{

									console.log(r);
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
                  $("#credenciales").html(r);
                    $("#registroU").css('display','block');
								}

				}).error(function(){
					console.log('Error');
				});





									}else{
										console.log("con registro");
										 $(response).each(function(key,valuee){
										 	$("#tipoUserAnterior").val(valuee.tipo_usuario);

										 });

										var modal = document.getElementById('id04');
										modal.style.display = "block";
										 var tipo_usuario = "";

										$(response).each(function(key,valuee){

										//$("#tipoUser").html("");

									   $("#nombre").val(valuee.nombre_especialista);

									   if (valuee.tipo_usuario == 2 ) {
									   	 tipo_usuario = "Dictaminador:";
									   }else if (valuee.tipo_usuario == 3) {
									   	 tipo_usuario = "Revisor:";
									   }

									   $("#tipoUser").val(tipo_usuario);


										});





									}

				}).error(function(){
					console.log('Error');
				});


			}

			}





		};

			$scope.CXU = function (){

			//alert("cancelar todo");
			$scope.selectp = "";
			   $scope.nomu = "";
		       $scope.apu = "";
		       $scope.amu = "";
		       $scope.curpu = "";
		       $scope.rfcu = "";
		       $scope.emailu = "";
			   $scope.telu = "";
		};
	});


	angular.module('Appadmusuview', ['Appadmusuview.AppadmusuviewControllerTab','datatables']);
	angular.module('Appadmusuview.AppadmusuviewControllerTab',
	 []).controller('AppadmusuviewControllerTab', function($scope,$http) {

		$http.post('../../acceso2', {
			data: {access: 61}
		}).success(function(response){

			$scope.empList_usu  = response ;

			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");
		});

	});


	angular.module('Appadmdtmview', ['Appadmdtmview.AppadmdtmviewControllerTab','datatables']);
	angular.module('Appadmdtmview.AppadmdtmviewControllerTab',
	 []).controller('AppadmdtmviewControllerTab', function($scope,$http) {

		$http.post('../../acceso2', {
			data: {access: 62}
		}).success(function(response){

			$scope.empList_dtm  = response ;

			console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");
		});

	$scope.pathvector = {
		vector: []
	};

		/*  CAPTURADOR  */
	$scope.vector = {
		folio: '',
		selec: '',
		opt: '',
	};

			/*$scope.btnasg = function(){
		///$scope.pathvector=0;
		if( $scope.Rvigcm == "" ||  $scope.Rvigcm == " " ||  $scope.Rvigcm == "_" ||  $scope.Rvigcm === undefined ){
			$("#inf").html("Selecciona un Revisor");
		}else{
			$("#inf").html("");
			$("input[type=checkbox]:checked").each(function(){
//cada elemento seleccionado
console.log($(this).parent().parent().find('td').eq(1).html());
$scope.pathvector.vector.push({
		folio: $(this).parent().parent().find('td').eq(0).html(),
		clave: $(this).parent().parent().find('td').eq(1).html(),
		selec: 1,
		opt: $scope.Rvigcm
	});
});

console.log($scope.pathvector);
if( $scope.pathvector.vector.length == 0){
	$("#id02").css("display","block");

}else{
	$http({
        method: 'POST',
        url: '../../acceso4',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data: { v:$scope.pathvector },
    }).then(function(response) {
$scope.gists = response.data;
//console.log(response);
console.log(response.data);
//$scope.pathvector.vector = [];


			//if( response.data == "100" ){

				location.href="../AdminGris/";
			//}else{
				//$("#id01").css("display","block");



			//}

})
.catch(function(response) {
console.error('Gists error', response.status, response.data);
})
.finally(function() {
console.log("finally finished gists");
});

}




		}




	}*/

	});


	//vsnewU
	angular.module('Appadmvers', ['Appadmvers.AppadmversController']);
	angular.module('Appadmvers.AppadmversController', []).controller('AppadmversController', function($scope,$http) {


		$scope.vsnewU = function(){
			if( $scope.vrsnew == "" || $scope.vrsnew == " " ){
				console.log('campo vacio');
			}else{
				$http.post('../../acceso2', {
					data: {access: 63,vers:$scope.vrsnew}
				}).success(function(response){
					//resultado
					console.log(response);
								if( response == 6){

									console.log('Error');
								}else{
									console.log(response);
									    $scope.vrsnew == ""
									var modal = document.getElementById('id01');
									modal.style.display = "block";
									//$("#id01").fadeOut(5000);
								}

				}).error(function(){
					console.log('Error');
				});


			}

		}



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

$(document).ready(function () {
	//version
	$.post("../../acceso",{acceess:62},function(n){
		console.log(n);
			$(n).each(function(key,valuee){

			$('#vdtvl').html(valuee.version);

		});
	});
	//delegaciones
	$.post("../../acceso",{acceess:61},function(n){
		console.log(n);
			$(n).each(function(key,valuee){

			$('#selectpd').append('<option value="'+ valuee.delegacion +'">' + valuee.nombdeleg +'</option>');

		});
	});
$("#selectp").change(function(){
	   if( $(this).val() == '5' ){
		   $("#r5").css('display','block');

	   }else{
		   $("#r5").css('display','none');
	   }




});


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

//combo de revisores igecem

$.post("../../acceso",{acceess:82},function(n){

		console.log(n);
		$('#Rvigcm').html('');
		$('#Rvigcm').append('<option value="_">OPCIONES</option>');
			$(n).each(function(key,valuee){

			$('#Rvigcm').append('<option value="'+
			valuee.numreg  +
		'">' + valuee.nombre + ' ' + valuee.ap_paterno + ' ' + valuee.ap_materno  +'</option>');

		});
	});





 function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
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
					console.log(r);
					if (r == "Error") {
					console.log("error al reemplazar registro");

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



  function tablaInmueblesP(t){
		//console.log(t);
		var dato = "";
		var cx = "";
		var c = "";
		var c2 = "";
		var c3 = "";
		var tipo=t;

		 // z="";
		  if (tipo == 1) {  //Asignar Revisor

		  	  $('#table_dtm tbody').on( 'click', 'tr', function () {
		    		cx="";

		            dato = $(this).find("td:eq(0)").text();
		            cx = dato.trim();
		           // console.log(cx);
		            $('#folioInmueble').val(cx);
		            //z="";
		        $.post("../../acceso",{acceess:7,cx:cx,tipo:tipo},function(z){
		        	$('#tablaxinmueble').html("");
		        	cx=""; c = "", c2="", c3="";

	  c= "<table class='table table-striped table-responsive-sm' style='color: black; '><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Asignar</th></tr></thead><tbody>";

				 $(z).each(function(key,valuee){

				 	if (valuee.tipod == 1) {
			 c2= "<tr><td style='display: none;'>"+valuee.folio+"</td><td style='display: none;'>"+valuee.cclave+"</td><td><a href='../AdminSeguimiento/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td><td><input type='checkbox' class='className' value='"+valuee.folio+"' /></td></tr>"+c2;

				 	}else if(valuee.tipod == 2){

	 c2= "<tr><td style='display: none;'>"+valuee.folio+"</td><td style='display: none;'>"+valuee.cclave+"</td><td><a href='../AdminSeguimiento/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td><td><input type='checkbox' class='className' value='"+valuee.folio+"' /></td></tr>"+c2; 

				 	}
				 });

				 c3 = "</tr></tbody></table>";
				 $('#tablaxinmueble').append(c+c2+c3);
				 z="";

			});

		    } );

		  }

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
