(function(angular) {


	//Dictamenes/ pendientes

	 angular.module('Appadmdtmviewpen', ['Appadmdtmviewpen.AppadmdtmviewpenControllerTab','datatables']);
	angular.module('Appadmdtmviewpen.AppadmdtmviewpenControllerTab',
	 []).controller('AppadmdtmviewpenControllerTab', function($scope,$http) {

		$http.post('../../acceso2', {
			data: {access: 36}
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
		clvcat: '',
		selec: '',
		opt: '',
	};

		$scope.btnasgrr = function(){  //Reasignar revisor
			var g = $scope.Rvigcm2;


			if( g == "" || g =="_" || g ==" " || g === undefined ){
				$("#alerr").html("Selecciona un Revisor para reasignar");

			}else{
				$("#alerr").html("");

				$("input[type=checkbox]:checked").each(function(){
					//cada elemento seleccionado
				//	console.log($(this).parent().parent().find('td').eq(1).html());
					$scope.pathvector.vector.push({
							folio: $(this).parent().parent().find('td').eq(0).html(),
							clvcat: $(this).parent().parent().find('td').eq(1).html(),
							selec: 1,
							opt: $scope.Rvigcm2
						});
				});
				console.log($scope.pathvector);
				//console.log($scope.pathvector.vector[0].folio);
				if($scope.pathvector.vector.length == 0){
					$("#alerr").html("Active la casilla de asignar.");
				}else{
					$("#alerr").html("");
					$http({
			               method: 'POST',
			               url: '../../acceso14',
			               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			               data: { v:$scope.pathvector },
			           }).then(function(response) {
			  $scope.gists = response.data;
			   //console.log(response);
			  //para vaciar un vector
			  $scope.pathvector.vector = [];
			   console.log(response.data);

							location.href="../AdminReasigRev/";

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



  function tablaInmueblesP(t){

	  $('#tablaxinmueble').html("");
	  //$('#Rvigcm2').html('');

			 //combo de revisores igecem

$.post("../../acceso",{acceess:6},function(n){

		//console.log(n);
		$('#Rvigcm2').html('');
		$('#Rvigcm2').append('<option value="_">OPCIONES</option>');
			$(n).each(function(key,valuee){

			$('#Rvigcm2').append('<option value="'+
			valuee.no_reg_autorizado  +
		'">' + valuee.nombre_especialista  +'</option>');

		});
	});

  	//console.log(t);
  	var dato = "";
	var cx = "";
	var c = "";
	var c2 = "";
	var c3 = "";
	var tipo=t;

	 // z="";
	  if (tipo == 4) {  //Reasignar revisor

	  	  $('#table_dtm tbody').on( 'click', 'tr', function () {
	    		cx="";

	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	           // console.log(cx);
	            $('#folioInmueble').val('');
	            $('#folioInmueble').val(cx);
	            //z="";


	        $.post("../../acceso",{acceess:7,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx="";
	        	c="",c2="",c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black; '><thead><tr><th style='display: none;'>folio</th><th style='display: none;'>cclave</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Revisor</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Asignar</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td style='display: none;'>"+valuee.folio+"</td><td style='display: none;'>"+valuee.cclave+"</td><td><a href='../AdminSeguimiento/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombre_especialista+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td><td><input type='checkbox' class='className' value='"+valuee.folio+"' /></td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td style='display: none;'>"+valuee.folio+"</td><td style='display: none;'>"+valuee.cclave+"</td><td><a href='../AdminSeguimiento/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+valuee.folio_dictamen+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombre_especialista+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td><td><input type='checkbox' class='className' value='"+valuee.folio+"' /></td></tr>"+c2; 

			 	}
			 });

			 c3 = "</tr></tbody></table>";
			 $('#tablaxinmueble').html("");
			 var totalhtml = c+c2+c3;
			 $('#tablaxinmueble').append(totalhtml);
			 //z="";


		});



	    } );

	  }

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



	///

$.post("../../acceso",{acceess:87},function(n){

		console.log(n);
		$('#Rvigcm').html('');
		$('#Rvigcm').append('<option value="_">OPCIONES</option>');
			$(n).each(function(key,valuee){

			$('#Rvigcm').append('<option value="'+
			valuee.no_reg_autorizado  +
		'">' + valuee.nombre_especialista  +'</option>');

		});
	});


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
