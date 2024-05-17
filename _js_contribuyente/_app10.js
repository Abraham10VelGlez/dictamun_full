(function(angular) {//alert("angular activadoo");
	'use strict';
	$("#btnsend").css('display','none');
	$("#morefexx").css('display','none');
	$("#inmueblesmore").css("display","flex");
	$("#inmuebleseditable").css("display","none");
	$('#messageclvValor').css("display", "none");


	//inmuebles
	  angular.module('app_inmuebls', ['app_inmuebls.app_inmueblsController','datatables']);
	angular.module('app_inmuebls.app_inmueblsController', []).controller('app_inmueblsController', function($scope,$http) {

	$http.post('../../acceso2', {
			data: {access: 66, vp: $("#idG").val()}
		}).success(function(response){

			$scope.list_inmbb  = response ;

			console.log(response);
		}).error(function(response){
      console.log(response);
			console.log("Error al intentar cargar datos");
    });

    $scope.pathvector1 = {
    vector2: []
  };

   $scope.pathvector2 = {
    vectorview : []
	};

		/*  CAPTURADOR  */
	$scope.vector2 = {
		id_inmueble: '',
		tipodoc: '',
		validacion: '',
  };

  $scope.vectorview = {
    num_inmueble: '',
    view: ''
  }

  /*$scope.pathvector.vector.push({
			id_inmueble: $("#n_inm").val() ,
			tipodoc: 10,
			validacion: 1
		});		 */

    $scope.btninm_x = function(){
      var dato = "";
      var idx = "";
      var cv = "";
      $("#n_inm").val('');
	 //para seleccionar una opcion
	    $('#tableinms tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
              dato = $(this).find("td:eq(0)").text();
              idx = $(this).find("td:eq(1)").text();
              cv = $(this).find("td:eq(2)").text();
              console.log(dato.trim());
              $("#n_inm").val('');
              $("#n_inm").val(dato.trim());
              $("#cvec").val('');
              $("#cvec").val(cv.trim());
              $("#infoe").html('<h3 style="text-align: left; font-weight: bold;">Usted esta cargando archivos del Inmueble '+ idx.trim() +'</h3>');
              $("#documentacion").css('display','block');
              //$("#documentacion").html("");
             //$("#documentacion").html(
               //var avgl = '<table id="tableinms" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions"><thead><tr>        <th style="text-align: center;">Documentos</th>            <th style="text-align: center;">Subir Archivo</th>              <th style="text-align: center;">Estatus</th>            <th style="text-align: center;">Comentario</th>  </tr></thead><tbody><tr>       <td >Avaluos.val</td>               <td ><input type="file" id="fileToUpload" name="fileToUpload" onchange="upload_val();"></td>         <td >AVALUO</td>         <td ><textarea id="commentav" name="commentav" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Contruccion.val</td>               <td ><input type="file" id="fileToUpload" name="fileToUpload" onchange="upload_val();"></td>         <td >AVALUO</td>         <td ><textarea id="commentcx" name="commnetcx" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Acta Constitutiva de la Empresa</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commenta" name="commenta" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Nombramiento del Representante legal</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commentb" name="commentb" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Boleta Predial</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commentc" name="commentc" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Boleta de Agua</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commentd" name="commentd" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Planos</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commente" name="commente" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Croquis de Localizacion</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commentf" name="commentf" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr><tr>       <td >Otros</td>               <td ><input type="file" id="fileToUpload3" name="fileToUpload3" onchange="upload_files2();"></td>         <td >AVALUO</td>         <td ><textarea id="commentg" name="commentg" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> 					</tr></tbody></table>';
             // );
              //$scope.pathvector2.vectorview.push({
			//num_inmueble: dato.trim(),
    //view: avgl
    //});


    console.log($scope.pathvector2.vectorview);

    var invernaderos=[
    { "id_inmu": "71", "id_doc": "10", "bandera": "1" },
{ "id_inmu": "71", "id_doc": "90", "bandera": "1" },
{ "id_inmu": "71", "id_doc": "85", "bandera": "1" },
{ "id_inmu": "71", "id_doc": "12", "bandera": "1" },
{ "id_inmu": "72", "id_doc": "10", "bandera": "1" },
{ "id_inmu": "72", "id_doc": "85", "bandera": "1" },
{ "id_inmu": "72", "id_doc": "84", "bandera": "1" }
]

//var pre_save_files_view = [​]

var invv = $scope.pathvector2.vectorview;
/*
  let valores= invernaderos.map(inv => inv.attrValue);
  console.log(valores);*/

  let vll = invv.map( x => x.view);
console.log(vll);

let segtmto = invernaderos.map( x => x.id_doc);
console.log(segtmto);
/*if (invernaderos.some(inv => inv.attrName=='sensor1')) {
  let valores= invernaderos.map(inv => inv.attrValue);
  console.log(valores);
}*/


var arr = ['a', 'b', 'c'];
console.log(Object.keys(arr)); // console: ['0', '1', '2']

// arreglo como objeto
var obj = { 0: 'a', 1: 'b', 2: 'c' };
console.log(Object.keys(obj)); // console: ['0', '1', '2']

// arreglo como objeto con nombres ordenados aleatoriamente
var an_obj = { 100: 'a', 2: 'b', 7: 'c' };
console.log(Object.keys(an_obj)); // console: ['2', '7', '100']

// getFoo es una propiedad no enumerable
var my_obj = Object.create({}, { getFoo: { value: function() { return this.foo; } } });
my_obj.foo = 1;

console.log(Object.keys(my_obj)); // console: ['foo']





	    });


    }

	});


	//InmueblesApp
	/*  EVENTO PARA INICIAR CONTROLADOR DE UN  FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */
	angular.module('InmueblesApp', ['InmueblesApp.InmueblesAppController','datatables']);
	angular.module('InmueblesApp.InmueblesAppController', []).controller('InmueblesAppController', function($scope,$http) {
		//console.log($("#nogx").val());
		//$scope.nog =  $("#nogx").val();
	$scope.imblss = {

		anio: '',
		selcdic: '',


		//persona fisica
		nombreDenRaz: '',
		apPaterno: '',
		apMaterno:'',
		telefono: '',
		correoE: '',
		curp: '',
		rfc: '',
		//persona moral
		nombreDenominacion:'',
		rfcD:'',
		descripacrt: '',
		telefonoD:'',
		correoD:'',
		//Representante legal
		nombreRep: '',
		apPaRep:'',
		apMaRep:'',
		rfcR: '',
		curpR: '',
		//datos dictamen
		//nombesp:$("#nombespx").val(),
		fm:'',
		nog: '',
		gender: '',
		inm: []
	};

		/*  CAPTURADOR  */
	$scope.inmbls = {
		c_muni: '',
		c_zona: '',
		c_manz: '',
		c_lote: '',
		c_edif: '',
		c_dept: '',
		scrp: '',
		calleAv: '',
		col: '',
		numEx: '',
		numIn: '',
		muni: '',
		cpp:'',
		refvia: ''
	};

	$scope.xv = function() {
		//alert("koko");
		//$("#default_collapseTwo").addClass(" collapse show");
		//$("#default_collapseTwo").hide();
		$("#default_collapseTwo").removeClass("show");


	};


	///mostrar tabla inmuebles
	$scope.mm = function(){
		//alert("angular table");
		$("#tbinm").css('display','block');
		window.scroll({
			top: 2000,
			left: 1000,
			behavior: 'smooth'
		});
		$http.post('../../acceso2', {
			data: {access: 86}
		}).success(function(response){

			if( response == "10" ){
					$scope.list_inmueblesr  = [] ;
				}else{
					$scope.list_inmueblesr  = response ;
				}

			//console.log(response);
		}).error(function(){
			console.log("Error al intentar cargar datos");
		});




	};

	$scope.btndeleteinm = function(){

		var dato = "";
		 //para seleccionar una opcion de dato
		    $('#DataTables_Table_0 tbody').on( 'click', 'tr', function () {
		            //
		            dato = $(this).find("td:eq(0)").text();
		            var cidx = dato.trim();
		            $http({
		                method: 'POST',
		                url: '../../acceso13',
		                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
		                data: {
		              	    variable : cidx,
		              	    personatipo : $scope.imblss.fm},
		            }).then(function(res) {


		  			$('#inmublegg').modal('hide');
		  			$("#default_collapseTwo").removeClass("show");
		  			$("#tbinm").css('display','block');
		  			$("#default_collapseOne").addClass(" collapse show");
		  			$("#tbinm2").css('display','block');

		  			$http.post('../../acceso2', {
		  				data: {access: 86}
		  			}).success(function(response){

		  				if( response == "10" ){
		  					$scope.list_inmueblesr  = [] ;
		  					$("#btnsend").css('display','none');
		  				}else{
		  					$scope.list_inmueblesr  = response ;
		  					$("#btnsend").css('display','block');
		  				}





		  			}).error(function(){
		  				console.log("Error al intentar cargar datos");
		  				$("#btnsend").css('display','none');
		  			});

		  			$("#morefexx").css('display','block');






		  })
		  .catch(function(response) {
		   $("#tbinm").css('display','none');
		   console.error('Error de envio de datos', response.status, response.data);
		  })
		  .finally(function() {
		   console.log("Ejecucion finalizada");
		  });





		    });




	};

	$scope.btneditinm = function(){
		$("#modfclav").val('');
		$("#modfscrp").val('');
		$("#modfcalleAv").val('');
		$("#modfcol").val('');
		$("#modfnumEx").val('');
		$("#modfnumIn").val('');
		$("#modfmunic").val('');
		$("#modfcpp").val('');
		$("#modfrefvia").val('');

			document.querySelectorAll('[id=modfgender1]').forEach((x) => x.checked = false);
			document.querySelectorAll('[id=modfgender2]').forEach((x) => x.checked = false);
			document.querySelectorAll('[id=modfgender2S]').forEach((x) => x.checked = false);
			document.querySelectorAll('[id=modfgender2N]').forEach((x) => x.checked = false);
			document.querySelectorAll('[id=modfgender3S]').forEach((x) => x.checked = false);
			document.querySelectorAll('[id=modfgender3N]').forEach((x) => x.checked = false);

		$("#inmueblesmore").css("display","none");
		$("#inmuebleseditable").css("display","flex");

		var dato = "";
		 //para seleccionar una opcion de dato
		    $('#DataTables_Table_0 tbody').on( 'click', 'tr', function () {
		            //
		            dato = $(this).find("td:eq(0)").text();
		            var cx = dato.trim();
		          //SAVE DATES
		            $("#inmu").val('');
					$("#inmu").val(cx);
		            //vamos a filtrar datos
		            $http.post('../../acceso2', {
						data: {access: 104,datofilter: cx}
					}).success(function(response){

						//PINTAR DATOS EN LA VISTA

						//console.log(response[0].cve_cat);
						$("#modfclav").val(response[0].cve_cat);
						$("#modfscrp").val(response[0].valor_catastral);

						$("#modfcalleAv").val(response[0].calle);
						$("#modfcol").val(response[0].colonia);
						$("#modfnumEx").val(response[0].no_exterior);
						$("#modfnumIn").val(response[0].no_interior);


						$("#modfmunic").val(response[0].id_municipio);

						$("#modfmunic option[value='"+ response[0].id_municipio +"']").attr("selected",true);

						cargar_datos_cp2(response[0].id_municipio,response[0].codigo_p);




						$("#modfrefvia").val(response[0].referencia1);

						if( response[0].manifest_pago == "t" ){
							document.querySelectorAll('[id=modfgender1]').forEach((x) => x.checked = true);
						}else{
							document.querySelectorAll('[id=modfgender2]').forEach((x) => x.checked = true);


						}

						if( response[0].manifest_mejoras == "t" ){
							document.querySelectorAll('[id=modfgender2S]').forEach((x) => x.checked = true);
						}else{

							document.querySelectorAll('[id=modfgender2N]').forEach((x) => x.checked = true);
						}

						if( response[0].manifest_claves == "t" ){
							document.querySelectorAll('[id=modfgender3S]').forEach((x) => x.checked = true);
						}else{

							document.querySelectorAll('[id=modfgender3N]').forEach((x) => x.checked = true);
						}


						//$("#modfcpp").val(response[0].codigo_p);
						//$("#modfcpp option[value='"+  response[0].codigo_p +"']").attr("selected",true);






					}).error(function(){
						console.log("Error al intentar cargar datos");
					});


		    });









	};


	$scope.updateInm = function(){
		var calleI= $("#modfcalleAv").val();// $scope.inmblsmod.modfcalleAv;
		var colI= $("#modfcol").val();// $scope.inmblsmod.modfcol;
		var nE= $("#modfnumEx").val();// $scope.inmblsmod.modfnumEx;
		var nI= $("#modfnumIn").val();// $scope.inmblsmod.modfnumIn;
		var ValorC = $("#modfscrp").val();// $scope.inmblsmod.modfscrp;

		calleI = validarDomimodf();
		colI = validarColmodf();
		nE = validarNEmodf();
		nI = validarNImodf();
		ValorC = validarValorCmodf();

 		var cpI = $('#modfcpp').val();
 		var municipioI = $('#modfmunic').val();
 		//radio button de pago de impuesto
 		var pagoIm = $('input[name=modfimpuesto]:checked').val();

		//radio button de modificacion
 		var modificacion = $('input[name=modfgender2]:checked').val();

 		var m3 = $('input[name=modfgender3]:checked').val();

		var dictaminador = $("#selcdic").val();

			//
		var clave_catastral = PadLeft( $("#modfclav").val(), 16);


		if ( $("#modfclav").val() == ''  ||
				$("#modfcalleAv").val() == '' || $("#modfcol").val() =='' ||
				$("#modfnumEx").val() =='' || $("#modfnumIn").val() =='' ||  $("#modfrefvia").val() =='' ||
			!calleI || !colI || !nE || !nI || !ValorC || cpI == '' || municipioI=='' || pagoIm== null || modificacion== null
			|| m3 == null) {

			$('#modfclav').css("border", "1px solid red");


			$('#modfscrp').css("border", "1px solid red");

			$('#modfmunic').css("border", "1px solid red");
			$('#modfcpp').css("border", "1px solid red");
			$('#modfrefvia').css("border", "1px solid red");

			$("#modfmessageradios").css('display','flex');

		}else{



			var claveCatatral = $("#modfclav").val() ;



  	        		$http({
  	                  method: 'POST',
  	                  url: '../../acceso12',
  	                  headers: {'Content-Type': 'application/x-www-form-urlencoded'},
  	                  data: {
  	                	    variable : $("#inmu").val(),
							clavv: claveCatatral,
							scrp: $("#modfscrp").val(),// $scope.inmblsmod.modfscrp,
							calleAv: $("#modfcalleAv").val(),// $scope.inmblsmod.modfcalleAv,
							col: $("#modfcol").val(),// $scope.inmblsmod.modfcol,
							numEx: $("#modfnumEx").val(),// $scope.inmblsmod.modfnumEx,
							numIn: $("#modfnumIn").val(),// $scope.inmblsmod.modfnumIn,
							cp: $("#modfcp").val(),// $scope.inmblsmod.modfcp,
							muni: $("#modfmuni").val(),// $scope.inmblsmod.modfmuni,
							cpp: $('#modfcpp').val(),
							munic: $('#modfmunic').val(),
							refvia: $("#modfrefvia").val(),// $scope.inmblsmod.modfrefvia,
							impuesto:  pagoIm,
							madific: modificacion,
							variable_clvs: m3,
							fm:  $scope.imblss.fm,
							no18: $scope.imblss.selcdic,
							ann: $scope.imblss.anio},
  	              }).then(function(res) {


					$('#inmublegg').modal('hide');
					$("#default_collapseTwo").removeClass("show");
					$("#tbinm").css('display','block');
					$("#default_collapseOne").addClass(" collapse show");
					$("#tbinm2").css('display','block');

					$http.post('../../acceso2', {
						data: {access: 86}
					}).success(function(response){

						if( response == "10" ){
		  					$scope.list_inmueblesr  = [] ;
		  				}else{
		  					$scope.list_inmueblesr  = response ;
		  				}



					}).error(function(){
						console.log("Error al intentar cargar datos");
					});

					$("#btnsend").css('display','block');
					$("#morefexx").css('display','block');






  	   })
  	   .catch(function(response) {
  		 $("#tbinm").css('display','none');
  	     console.error('Error de envio de datos', response.status, response.data);
  	   })
  	   .finally(function() {
  	     console.log("Ejecucion finalizada");
  	   });







		//}

		}



	};

	$scope.clearinmueble = function(){

		$('#btnaddi').css("display", "block");

		$scope.inmbls.c_muni = "";
		$scope.inmbls.c_zona = "";
		$scope.inmbls.c_manz = "";
		$scope.inmbls.c_lote = "";
		$scope.inmbls.c_edif = "";
		$scope.inmbls.c_dept = "";

		$scope.inmbls.scrp = "";


		$('#messageValorc').css("display", "none");
		$('#scrp').css("border", "");



		$scope.inmbls.calleAv = "";
		$scope.inmbls.col = "";
		$scope.inmbls.numEx = "";
		$scope.inmbls.numIn = "";
		$scope.inmbls.cp = "";
		$scope.inmbls.muni = "";
		$('#cpp').val("");
		$('#munic').val("");

		$scope.inmbls.refvia = "";


		//document.getElementById('impuesto').checked = false;
		document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
		//document.getElementById('gender2').checked = false;
		document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
		//document.getElementById('gender3').checked = false;
		document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);

	};

	$scope.clearinmuebleupdate = function(){
		$scope.inmbls.c_muni = "";
		$scope.inmbls.c_zona = "";
		$scope.inmbls.c_manz = "";
		$scope.inmbls.c_lote = "";
		$scope.inmbls.c_edif = "";
		$scope.inmbls.c_dept = "";

		$scope.inmbls.scrp = "";

		$scope.inmbls.calleAv = "";
		$scope.inmbls.col = "";
		$scope.inmbls.numEx = "";
		$scope.inmbls.numIn = "";
		$scope.inmbls.cp = "";
		$scope.inmbls.muni = "";
		$('#cpp').val("");
		$('#munic').val("");

		$scope.inmbls.refvia = "";


		//document.getElementById('impuesto').checked = false;
		document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
		//document.getElementById('gender2').checked = false;
		document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
		//document.getElementById('gender3').checked = false;
		document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);


	};
	/*  EVENTO PARA INICIAR EL FUNCIONAMIENTO DE UN BOTON */
	/*$scope.agregarInm = function(){


				$('#btnaddi').css("display", "block");

				$('#municipio').css("display", "none");
				$('#zona').css("display", "none");
				$('#manzana').css("display", "none");
				$('#lote').css("display", "none");
				$('#edificio').css("display", "none");
				$('#departamento').css("display", "none");


				$('#numEx').css("border", "");
				$('#numIn').css("border", "");

				$('#c_muni').css("border", "");
				$('#c_zona').css("border", "");
				$('#c_manz').css("border", "");
				$('#c_lote').css("border", "");
				$('#c_edif').css("border", "");
				$('#c_dept').css("border", "");

				$('#scrp').css("border", "");

				$('#munic').css("border", "");
				$('#cpp').css("border", "");
				$('#refvia').css("border", "");

				$("#messageradios").css('display','none');

				$('#messageclvValor').css("display", "none");


				var calleI= $scope.inmbls.calleAv;
				var colI= $scope.inmbls.col;
				var nE= $scope.inmbls.numEx;
				var nI= $scope.inmbls.numIn;
				var ValorC = $scope.inmbls.scrp;

				calleI = validarDomi();
				colI = validarCol();
				nE = validarNE();
				nI = validarNI();
				ValorC = validarValorC();

				var cpI = $('#cpp').val();
				var municipioI = $('#munic').val();
				//radio button de pago de impuesto
				var pagoIm = $('input[name=impuesto]:checked').val();

				//radio button de modificacion
				var modificacion = $('input[name=gender2]:checked').val();

				var m3 = $('input[name=gender3]:checked').val();

				var dictaminador = $("#selcdic").val();

					//$('#nogx').val(dictaminador);
					var ed = PadLeft($scope.inmbls.c_edif, 2);
					var dep = PadLeft($scope.inmbls.c_dept, 4);


					if( $scope.inmbls.c_muni >= '126' ){
						$('#municipio').css("display", "block");
						$('#btnaddi').css("display", "block");
					}else{

						if ($scope.inmbls.c_muni == '' || $scope.inmbls.c_muni == ' '  ) {
							$('#municipio').css("display", "block");
							$('#c_muni').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.c_zona=='' || $scope.inmbls.c_zona==' ' ) {

								$('#zona').css("display", "block");
								$('#c_zona').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.c_manz=='' || $scope.inmbls.c_manz==' ' ) {

								$('#manzana').css("display", "block");
								$('#c_manz').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.c_lote=='' || $scope.inmbls.c_lote==' ' ) {

								$('#lote').css("display", "block");
								$('#c_lote').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.c_edif=='' || $scope.inmbls.c_edif==' ' ) {

								$('#edificio').css("display", "block");
								$('#c_edif').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.c_dept=='' || $scope.inmbls.c_dept==' ' ) {

								$('#departamento').css("display", "block");
								$('#c_dept').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.scrp =='' || $scope.inmbls.scrp ==' ' || !ValorC ) {

								$('#scrp').css("border", "1px solid red");
								$('#messageValorc').css("display", "block");
								$('#btnaddi').css("display", "block");


							}else if ( $scope.inmbls.calleAv =='' || $scope.inmbls.calleAv ==' ' || !calleI ) {

								$('#calleAv').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.col =='' || $scope.inmbls.col ==' ' || !colI ) {

								$('#col').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.numEx =='' || $scope.inmbls.numEx ==' ' || !nE ) {

								$('#numEx').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.numIn =='' || $scope.inmbls.numIn ==' ' || !nI ) {

								$('#numIn').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $('#munic').val() =='' || $('#munic').val() ==' ' ) {

								$('#munic').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $('#cpp').val() =='' || $('#cpp').val() ==' ' ) {

								$('#cpp').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( $scope.inmbls.refvia =='' || $scope.inmbls.refvia ==' ' ) {

								$('#refvia').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else if ( pagoIm== null || modificacion== null || m3 == null ) {

								$("#messageradios").css('display','flex');
								$('#btnaddi').css("display", "block");

							}else{




								//validacion campo x campo


								if (ed != '00' && dep == '0000') {

								//console.log('Primer Error');
								//document.getElementById('id05').style.display='block';
									$('#c_edif').css("border", "1px solid red");
									$('#c_dept').css("border", "1px solid red");

									$('#btnaddi').css("display", "block");
							}else if (dep != '0000' && ed == '00') {
								//console.log('Segundo Error');
								document.getElementById('id05').style.display='block';
								$('#c_edif').css("border", "1px solid red");
								$('#c_dept').css("border", "1px solid red");
								$('#btnaddi').css("display", "block");

							}else{

								var claveCatatral = $scope.inmbls.c_muni+$scope.inmbls.c_zona+$scope.inmbls.c_manz+$scope.inmbls.c_lote+$scope.inmbls.c_edif+$scope.inmbls.c_dept;

								 var ma = pahtv.vector;
								 var pahtv2 = { vector2 : [] } ;
								 var vector2 = { clave2 : '',annio: ''};

									$.each( ma, function( key, value ){

										 if( value.clave == claveCatatral ){
											 pahtv2.vector2.push({clave2:value.clave,annio:value.anio});
										 }

										});

									//ASI PODEMOS VER LOS DATOS UNO X UNO DE UN ARRAY DE OBJETOS
									//console.log(pahtv2.vector2[0].annio);

												//console.log($("#aniox").val());

												if(  pahtv2.vector2.length == 0 ){
													//inserta el inmueble 23

													var validacion2 = pahtavg.vectoravg;
										 var pahtvavg2 = { vectoravg2 : [] } ;
										 var vectoravg2 = { clave21 : '',annio12: ''};

													$.each( validacion2, function( key, value ){

											 if( value.clave == claveCatatral ){
												pahtvavg2.vectoravg2.push({clave21:value.clave,annio12:value.anio});
											 }

											});

													if(  pahtvavg2.vectoravg2.length == 0 ){


														$http({
																	method: 'POST',
																	url: '../../acceso11',
																	headers: {'Content-Type': 'application/x-www-form-urlencoded'},
																	data: {nombre: $scope.inmbls.nombre,
													c_muni: $scope.inmbls.c_muni,
													c_zona: $scope.inmbls.c_zona,
													c_manz: $scope.inmbls.c_manz,
													c_lote: $scope.inmbls.c_lote,
													c_edif: $scope.inmbls.c_edif,
													c_dept: $scope.inmbls.c_dept,
													scrp: $scope.inmbls.scrp,
													calleAv: $scope.inmbls.calleAv,
													col: $scope.inmbls.col,
													numEx: $scope.inmbls.numEx,
													numIn: $scope.inmbls.numIn,
													cp: $scope.inmbls.cp,
													muni: $scope.inmbls.muni,
													cpp: $('#cpp').val(),
													munic: $('#munic').val(),
													refvia: $scope.inmbls.refvia,
													impuesto: pagoIm,
													madific: modificacion,
													variable_clvs: m3,
													fm: $scope.imblss.fm,
													no18: $scope.imblss.selcdic,
													ann: $scope.imblss.anio},
															}).then(function(res) {


										//$scope.list_inmueblesr  = res.data ;

											$('#inmublegg').modal('hide');
											$("#default_collapseTwo").removeClass("show");
											$("#tbinm").css('display','block');
											$("#default_collapseOne").addClass(" collapse show");
											$("#tbinm2").css('display','block');

											$http.post('../../acceso2', {
												data: {access: 86}
											}).success(function(response){

												if( response == "10" ){
														$scope.list_inmueblesr  = [] ;
														$('#btnaddi').css("display", "block");
													}else{
														$('#btnaddi').css("display", "block");
														$scope.list_inmueblesr  = response ;
													}



											}).error(function(){
												$('#btnaddi').css("display", "block");
												console.log("Error al intentar cargar datos");
											});

											$("#btnsend").css('display','block');
											$("#morefexx").css('display','block');






									 })
									 .catch(function(response) {
									 $("#tbinm").css('display','none');
										 console.error('Error de envio de datos', response.status, response.data);
									 })
									 .finally(function(response) {
										 console.log("Ejecucion finalizada");
										 console.log(response);
									 });



														$scope.inmbls.c_muni = "";
														$scope.inmbls.c_zona = "";
														$scope.inmbls.c_manz = "";
														$scope.inmbls.c_lote = "";
														$scope.inmbls.c_edif = "";
														$scope.inmbls.c_dept = "";

														$scope.inmbls.scrp = "";

														$scope.inmbls.calleAv = "";
														$scope.inmbls.col = "";
														$scope.inmbls.numEx = "";
														$scope.inmbls.numIn = "";
														$scope.inmbls.cp = "";
														$scope.inmbls.muni = "";
														$('#cpp').val("");
														$('#munic').val("");

														$scope.inmbls.refvia = "";


														//document.getElementById('impuesto').checked = false;
														document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
														//document.getElementById('gender2').checked = false;
														document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
														//document.getElementById('gender3').checked = false;
														document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);


													}else{
														$scope.inmbls.c_muni = "";
											$scope.inmbls.c_zona = "";
											$scope.inmbls.c_manz = "";
											$scope.inmbls.c_lote = "";
											$scope.inmbls.c_edif = "";
											$scope.inmbls.c_dept = "";

											$('#c_muni').css("border", "1px solid red");
											$('#c_zona').css("border", "1px solid red");
											$('#c_manz').css("border", "1px solid red");
											$('#c_lote').css("border", "1px solid red");
											$('#c_edif').css("border", "1px solid red");
											$('#c_dept').css("border", "1px solid red");


											$('#messageclvValor').css("display", "block");

													}



												}else{

													var ma1 = pahtv2.vector2;
											 var pahtv3 = { vector3 : [] } ;
											 var vector3 = { clave3 : '',annio3: ''};

												$.each( ma1, function( key, value ){

													 if( value.annio == $scope.imblss.anio ){
														 pahtv3.vector3.push({clave3:value.clave2,annio3:value.annio});
													 }

													});

												if( pahtv3.vector3.length == 0 ){



														var validacion2 = pahtavg.vectoravg;
											 var pahtvavg2 = { vectoravg2 : [] } ;
											 var vectoravg2 = { clave21 : '',annio12: ''};

														$.each( validacion2, function( key, value ){

												 if( value.clave == claveCatatral ){
													pahtvavg2.vectoravg2.push({clave21:value.clave,annio12:value.anio});
												 }

												});

														if(  pahtvavg2.vectoravg2.length == 0 ){

															$http({
																			method: 'POST',
																			url: '../../acceso11',
																			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
																			data: {nombre: $scope.inmbls.nombre,
															c_muni: $scope.inmbls.c_muni,
															c_zona: $scope.inmbls.c_zona,
															c_manz: $scope.inmbls.c_manz,
															c_lote: $scope.inmbls.c_lote,
															c_edif: $scope.inmbls.c_edif,
															c_dept: $scope.inmbls.c_dept,
															scrp: $scope.inmbls.scrp,
															calleAv: $scope.inmbls.calleAv,
															col: $scope.inmbls.col,
															numEx: $scope.inmbls.numEx,
															numIn: $scope.inmbls.numIn,
															cp: $scope.inmbls.cp,
															muni: $scope.inmbls.muni,
															cpp: $('#cpp').val(),
															munic: $('#munic').val(),
															refvia: $scope.inmbls.refvia,
															impuesto: pagoIm,
															madific: modificacion,
															variable_clvs: m3,
															fm: $scope.imblss.fm,
															no18: $scope.imblss.selcdic,
															ann: $scope.imblss.anio},
																	}).then(function(res) {

																//console.log(res);

													//$scope.list_inmueblesr  = res.data ;
																	$('#inmublegg').modal('hide');
													$("#default_collapseTwo").removeClass("show");
													$("#tbinm").css('display','block');
													$("#default_collapseOne").addClass(" collapse show");
													$("#tbinm2").css('display','block');

													$http.post('../../acceso2', {
														data: {access: 86}
													}).success(function(response){

														if( response == "10" ){
																$scope.list_inmueblesr  = [] ;
															}else{
																$scope.list_inmueblesr  = response ;
															}

														//console.log(response);
													}).error(function(){
														console.log("Error al intentar cargar datos");
													});

													$("#btnsend").css('display','block');
													$("#morefexx").css('display','block');





											 })
											 .catch(function(response) {
											 $("#tbinm").css('display','none');
												 console.error('Error de envio de datos', response.status, response.data);
											 })
											 .finally(function(response) {
												console.log(response);
												 console.log("Ejecucion finalizada");
											 });



															$scope.inmbls.c_muni = "";
															$scope.inmbls.c_zona = "";
															$scope.inmbls.c_manz = "";
															$scope.inmbls.c_lote = "";
															$scope.inmbls.c_edif = "";
															$scope.inmbls.c_dept = "";

															$scope.inmbls.scrp = "";

															$scope.inmbls.calleAv = "";
															$scope.inmbls.col = "";
															$scope.inmbls.numEx = "";
															$scope.inmbls.numIn = "";
															$scope.inmbls.cp = "";
															$scope.inmbls.muni = "";
															$('#cpp').val("");
															$('#munic').val("");

															$scope.inmbls.refvia = "";


															//document.getElementById('impuesto').checked = false;
															document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
															//document.getElementById('gender2').checked = false;
															document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
															//document.getElementById('gender3').checked = false;
															document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);



														}else{
															$scope.inmbls.c_muni = "";
												$scope.inmbls.c_zona = "";
												$scope.inmbls.c_manz = "";
												$scope.inmbls.c_lote = "";
												$scope.inmbls.c_edif = "";
												$scope.inmbls.c_dept = "";

												$('#c_muni').css("border", "1px solid red");
												$('#c_zona').css("border", "1px solid red");
												$('#c_manz').css("border", "1px solid red");
												$('#c_lote').css("border", "1px solid red");
												$('#c_edif').css("border", "1px solid red");
												$('#c_dept').css("border", "1px solid red");


												$('#messageclvValor').css("display", "block");

														}
														///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



												}else{
												 $scope.inmbls.c_muni = "";
											$scope.inmbls.c_zona = "";
											$scope.inmbls.c_manz = "";
											$scope.inmbls.c_lote = "";
											$scope.inmbls.c_edif = "";
											$scope.inmbls.c_dept = "";

											$('#c_muni').css("border", "1px solid red");
											$('#c_zona').css("border", "1px solid red");
											$('#c_manz').css("border", "1px solid red");
											$('#c_lote').css("border", "1px solid red");
											$('#c_edif').css("border", "1px solid red");
											$('#c_dept').css("border", "1px solid red");


											$('#messageclvValor').css("display", "block");




												}



												}

							}

							}




					}

	};*/
		/*  EVENTO PARA INICIAR EL FUNCIONAMIENTO DE UN BOTON */
	$scope.eliminarInmbls = function(index){
		var no_inmbls = [];
		angular.forEach($scope.imblss.inm, function(inmueble, i) {
        	if(index != i){
        		no_inmbls.push(inmueble);

        	}
      	});
      	$scope.imblss.inm = no_inmbls;
      	///Muestra el boton para agregar un inmueble.
      			$('#agreIn').show();
        		$('#agregarNewIn').show();
        		$('#agreIn2').hide();
        		//Limpiar los campos de agregar dictamen, ya que se quedan con los anteriores.
	};

			$scope.btnpre = function(){
				$("#btnsend").css('display','none');
				$("#morefexx").css('display','none');
				var fisicaMoral = $scope.imblss.fm;

			//fisica
			/*
			no = validarNombre();
			no1 = validarAPP();
			no2 = validarAPM();
			no3 = validarTel();
			no4 = validaremailF();
			no5 = validarCurp();
			no6 = validarRfc();
			//Moral
			no7 = validarNombreA();
			no8 = validarRfcA();
			no10 = validarTelA();
			no11 = validaremailM();
			*/
			//Representante legal
			/*no12 = validarNombreRL();
			no13 = validarAPPas();
			no14 = validarAPMas();
			no15 = validarRfcAs();
			no16 = validarCurpAs();*/
			//inmueble
			/*no28 = validarDomi();
			no29 = validarCol();
			no30 = validarNE();
			no31 = validarNI();*/



			if (fisicaMoral==1) {

				var no=$("#nombreDenRaz").val();
				var no1=$("#apPaterno").val();
				var no2=$("#apMaterno").val();
				var no3=$("#telefono").val();
				var no4=$("#correoE").val();
				var no5=$("#curp").val();
				var no6=$("#rfc").val();

				var no12=$("#nombreRep").val();
				var no13=$("#apPaRep").val();
				var no14=$("#apMaRep").val();
				var no15=$("#rfcR").val();
				var no16=$("#curpR").val();

				var no18=$("#nogx").val();

				var tipoDictamen = $scope.imblss.gender;
				/*
					if (no12 == "" && no13 == "" && no14 == "" && no15 == "" && no16 == "") {
				console.log("Sin registro de representante legal")

			}else{

				//Representante legal
			no12 = validarNombreRL();//nombre del representante legal
			no13 = validarAPPas();//apellido paterno del representante legal
			no14 = validarAPMas();//apellido materno del representante legal
			no15 = validarRfcAs(); //rfc del representante legal
			no16 = validarCurpAs();//curp del representante legal


			}*/



				//console.log('persona Fisica');
				if (!no || !no1 || !no2 || !no3 || !no4 || !no5 || !no6 || tipoDictamen=='') {
					console.log('Datos incorrectos');
				//document.getElementById('id02').style.display='block';
				}else{
					//console.log('Bien, seguir');
					//document.getElementById('id03').style.display='block';
						$http({
               method: 'POST',
               url: '../../acceso3',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: { inmbl1s:$scope.imblss, no18:no18 },
           }).then(function(response) {
         //$scope.gists = response.data;
   //console.log(response);
   //console.log(response.data);
   if(response.data == " " || response.data == "" ){
	   $("#baravg").css('display','flex');
	   animateprogress ("#html5", 50,response.data,fisicaMoral);


   }else{
	   $("#baravg").css('display','flex');
	   animateprogress ("#html5", 100,response.data,fisicaMoral);

   }


   //console.log(url);

   	//document.getElementById('ok').style.display='none';
    //document.getElementById('id03').style.display='block';
   	 //$("#id03").fadeOut(8000);
     //location.href='https://dictamunigecem.edomex.gob.mx/avisoDicta/'+response.data;  //cambiar ruta para el servidor


/*
   	$http({
               method: 'POST',
               url: '../../acceso8',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: {fol:fol},
           }).then(function(res) {



   console.log('Enviar correo');
   console.log(res);

    download(name,url);


    window.setTimeout(function() {
						window.location.href = "../DatosContribuyente/";
					}, 500);




})
.catch(function(response) {
  console.error('Gists error', response.status, response.data);
})
.finally(function() {
  console.log("finally finished gists");
});*/




})
.catch(function(response) {
  console.error('Error de ejecución command Avg', response.status, response.data);
})
.finally(function() {
  console.log("Execute Excelent");
});
				}
			}else if (fisicaMoral==2) {

				var no7=$("#nombreDenominacion").val();
				var no8=$("#rfcD").val();
				var no9=$("#descripacrt").val();
				var no10=$("#telefonoD").val();
				var no11=$("#correoD").val();

				var no12=$("#nombreRep").val();
				var no13=$("#apPaRep").val();
				var no14=$("#apMaRep").val();
				var no15=$("#rfcR").val();
				var no16=$("#curpR").val();

				var no18=$("#nogx").val();

				var tipoDictamen = $scope.imblss.gender;


					//Representante legal
				/*
			no12 = validarNombreRL();//nombre del representante legal
			no13 = validarAPPas();//apellido paterno del representante legal
			no14 = validarAPMas();//apellido materno del representante legal
			no15 = validarRfcAs(); //rfc del representante legal
			no16 = validarCurpAs();//curp del representante legal
			*/

				console.log('Persona moral');
				if (!no7 || !no8 || !no10 || !no11 || !no12 || !no13 || !no14 || !no15 ||
					!no16 || no9=='' || tipoDictamen=='') {
					console.log('Datos incorrectos');
				//document.getElementById('id02').style.display='block';

				}else{
					console.log('Bien, seguir');
					//document.getElementById('id03').style.display='block';
				$http({
               method: 'POST',
               url: '../../acceso3',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: { inmbl1s:$scope.imblss, no18:no18 },
           }).then(function(response) {
  //$scope.gists = response.data;
   //console.log(response);
   //console.log(response.data);

        	   if(response.data == " " || response.data == "" ){
        		   $("#baravg").css('display','flex');
        		   animateprogress ("#html5", 50,response.data,fisicaMoral);


        	   }else{
        		   $("#baravg").css('display','flex');
        		   animateprogress ("#html5", 100,response.data,fisicaMoral);



        	   }


   //console.log(url);

   //document.getElementById('ok').style.display='none';
   // document.getElementById('id03').style.display='block';
   	 //$("#id03").fadeOut(8000);
     //location.href='https://dictamunigecem.edomex.gob.mx/avisoDicta/'+response.data;  //cambiar ruta para el servidor



/*
   	$http({
               method: 'POST',
               url: '../../acceso8',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: {fol:fol},
           }).then(function(res) {



   console.log('Enviar correo');
   console.log(res);

    download(name,url);


    window.setTimeout(function() {
						window.location.href = "../DatosContribuyente/";
					}, 450);



})
.catch(function(response) {
  console.error('Gists error', response.status, response.data);
})
.finally(function() {
  console.log("finally finished gists");
});

*/

})
.catch(function(response) {
  console.error('Error de ejecucion', response.status, response.data);
})
.finally(function() {
  console.log("Execute Excelent");
});
				}

			}else{

				$("#baravg").css('display','flex');
				animateprogress ("#html5", 25,0,fisicaMoral);
				console.log('no Registro');

				//document.getElementById('id02').style.display='block';
			}

			 /*$http.get('../../acceso2',{data: {access: 56,xa:12}})
.then(function(response) {
  $scope.gists = response.data;
   //console.log(response);
   console.log(response.data);
})
.catch(function(response) {
  console.error('Gists error', response.status, response.data);
})
.finally(function() {
  console.log("finally finished gists");
});*/
		};

	});

	})(angular);
function download(filename, url) {

  var element = document.createElement('a');
  element.setAttribute('href', url);
  element.setAttribute('download', filename);

  element.style.display = 'none';
  document.body.appendChild(element);

  element.click();

  document.body.removeChild(element);




}
 function validarNombre() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['nombreDenRaz'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('message');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ]+$', 'i');

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
      const input = document.forms['step-form-horizontal']['apPaterno'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAP');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ]+$', 'i');

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
      const input = document.forms['step-form-horizontal']['apMaterno'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAM');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ]+$', 'i');

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

      const input = document.forms['step-form-horizontal']['rfc'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRFC');

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
 function validarCurp() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['step-form-horizontal']['curp'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageCUr');

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
            // Si pasamos todas la validaciones anteriores, entonces el input es valido89

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
 function validarTel() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['telefono'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageTelAsc');
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
 function validaremailM() {
 	let isValid = false;

		    campo =  document.forms['step-form-horizontal']['correoD'];
		    const message = document.getElementById('messageEmailm');

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

 	/*
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['step-form-horizontal']['correoD'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageEmailm');

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
    return isValid;*/
  }

 function validaremailF() {

 	let isValid = false;

		    campo =  document.forms['step-form-horizontal']['correoE'];
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

 	/*
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['step-form-horizontal']['correoE'];
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
    */
  }
 function validarNombreA() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['nombreDenominacion'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageA');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ÁÉÍÓÚÑüÜ . ,]+$', 'i');

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
 function validarRfcA() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['step-form-horizontal']['rfcD'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRFCa');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ]+$', 'i');

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
 function validarTelA() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['telefonoD'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageTelA');
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
 function validarNombreRL() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['nombreRep'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRL');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ ]+$', 'i');

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
 function validarAPPas() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['apPaRep'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAPas');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ ]+$', 'i');

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
 function validarAPMas() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['step-form-horizontal']['apMaRep'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAPMas');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ÁÉÍÓÚÑüÜ ]+$', 'i');

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
 function validarRfcAs() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['step-form-horizontal']['rfcR'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRFCas');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ]+$', 'i');

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
 function validarCurpAs() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['step-form-horizontal']['curpR'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageCuras');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ]+$', 'i');

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



 function validarValorCmodf() {
     let isValid = false;
     const input = document.forms['validationForm2']['modfscrp'];
     const message = document.getElementById('modfmessageValorc');
     input.willValidate = false;
     const pattern = new RegExp('^[1-9 , . 0]+$', 'i');//'^[0-9]+$', 'i'

     if(!input.value) {
       isValid = false;
     } else {
         if(!pattern.test(input.value)){
           isValid = false;
         }else {
           isValid = true;
         }
       }
        if(!isValid) {
       message.hidden = false;

     } else {
       message.hidden = true;
     }
     return isValid;
   }


 function validarDomimodf() {

	let isValid = false;
	const message = document.getElementById('modfmessageCalle');
	      var dato = document.getElementById("modfcalleAv").value;
	   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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
 function validarColmodf() {


	let isValid = false;
	const message = document.getElementById('modfmessageCol');
	      var dato = document.getElementById("modfcol").value;
	   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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
 function validarNEmodf() {

	 let isValid = false;
	 const message = document.getElementById('modfmessageNE');
	       var dato = document.getElementById("modfnumEx").value;
	    var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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
 function validarNImodf() {

	 let isValid = false;
	 const message = document.getElementById('modfmessageNI');
	       var dato = document.getElementById("modfnumIn").value;
	    var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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






 function validarDomi() {
 	/*
      let isValid = false;
      const input = document.forms['validationForm2']['calleAv'];
      const message = document.getElementById('messageCalle');
      input.willValidate = false;
      const pattern = new RegExp('^[A-Z 0-9 ÁÉÍÓÚÑüÜ ]+$', 'i');

      if(!input.value) {
        isValid = false;
      } else {
          if(!pattern.test(input.value)){
            isValid = false;
          }else {
            isValid = true;
          }
        }
         if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      return isValid;
*/
let isValid = false;
const message = document.getElementById('messageCalle');
      var dato = document.getElementById("calleAv").value;
   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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
 function validarCol() {


let isValid = false;
const message = document.getElementById('messageCol');
      var dato = document.getElementById("col").value;
   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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
 function validarNE() {

	 let isValid = false;
	 const message = document.getElementById('messageNE');
	       var dato = document.getElementById("numEx").value;
	    var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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
 function validarNI() {

	 let isValid = false;
	 const message = document.getElementById('messageNI');
	       var dato = document.getElementById("numIn").value;
	    var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ\.  ]+$/;
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





 function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
}

function validaNumLet(event) {
    if(event.charCode >= 48 && event.charCode <= 122){
      return true;
     }
     return false;
}

function PadLeft(value, length) {
    return (value.toString().length < length) ? PadLeft("0" + value, length) :
    value;
}

function validarValorC() {
      let isValid = false;
      const input = document.forms['validationForm2']['scrp'];
      const message = document.getElementById('messageValorc');
      input.willValidate = false;
      const pattern = new RegExp('^[1-9 , . 0]+$', 'i');//'^[0-9]+$', 'i'

      if(!input.value) {
        isValid = false;
      } else {
          if(!pattern.test(input.value)){
            isValid = false;
          }else {
            isValid = true;
          }
        }
         if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      return isValid;
    }



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


var pahtv = { vector : [] } ;
var vector = { clave : '',anio: ''};
pahtv.vector.length = 0;


//*validacion para inmuebles que carga por primera vez en el sistema*/
var pahtavg = { vectoravg : [] } ;
var vectoravg = { clave : '',anio: ''};
pahtavg.vectoravg.length = 0;



$.post("../../acceso",{acceess:89},function(z){
      //console.log(z);

      $(z).each(function(key,valuee){

    	  //if( valuee.cve_catastral == claveCatatral ){
    		  //pahtv.vector.length = 0;
    		  //console.log("Esta clave ya existe");
    		  pahtv.vector.push({clave:valuee.cve_catastral,anio:valuee.aniodictaminar});
    		//  var p = 1;

    	  //}
 //console.log(valuee.cve_catastral);


});
     // console.log(pahtv.vector);
      //console.log(pahtv.vector.length);

});




function animateprogress (id, val, x, tpipofisicaMoral){


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
      console.log("Ocurrio algun detalle de envio de su registro comunicarse con el Administrador IGECEM.");


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
		    	$("#baravg").fadeOut(5000);
		    	console.log("Ocurrio algun detalle de envio de su registro comunicarse con el Administrador IGECEM.");


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

	            if( tpipofisicaMoral == "1" ){
	            	var name='AcuseDeDictamen.pdf'
	 		 		   var url = 'https://dictamunigecem.edomex.gob.mx/pdf/aviso/'+ x;
	            		//var url = 'http://localhost/dictamun/pdf/aviso/'+ x;
	 		 	   var fol= x;

	 		 	   download(name,url);
	 		 	 $("#baravg").fadeOut(5000);


	 		 	   window.setTimeout(function() {
	 		 							window.location.href = "../DatosContribuyente/";
	 		 						}, 500);

	            }else{
	            	 var name='AcuseDeDictamen.pdf'
	  		 		   var url = 'https://dictamunigecem.edomex.gob.mx/pdf/aviso/'+ x;
	            		 //var url = 'http://localhost/dictamun/pdf/aviso/'+ x;
	  		 		   	 var fol= x;
	  		 		     download(name,url);
	  		 		  $("#baravg").fadeOut(5000);


	  		 		     window.setTimeout(function() {
	  		 		  						window.location.href = "../DatosContribuyente/";
	  		 		  					}, 450);

	            }










	          }


		    }

		        fpAnimationFrame(animacion);   /*  <---- Llamo la función animación por primera vez usando fpAnimationFrame para que se ejecute a 60fps  */


	  }



	}


function activeviews(){

	$("#inmueblesmore").css("display","flex");
	$("#inmuebleseditable").css("display","none");

	$.post("../../acceso",{acceess:8989},function(z){
	      //console.log(z);
	      $(z).each(function(key,valuee){
	    		  pahtavg.vectoravg.push({clave:valuee.cve_catastral,anio:valuee.aniodictaminar});

	});

	});


}


function clearinmueble(){

}


function clearinmuebleupdate() {

}




function agregarInm(){



			$('#btnaddi').css("display", "block");

			$('#municipio').css("display", "none");
			$('#zona').css("display", "none");
			$('#manzana').css("display", "none");
			$('#lote').css("display", "none");
			$('#edificio').css("display", "none");
			$('#departamento').css("display", "none");


			$('#numEx').css("border", "");
			$('#numIn').css("border", "");

			$('#c_muni').css("border", "");
			$('#c_zona').css("border", "");
			$('#c_manz').css("border", "");
			$('#c_lote').css("border", "");
			$('#c_edif').css("border", "");
			$('#c_dept').css("border", "");

			$('#scrp').css("border", "");

			$('#munic').css("border", "");
			$('#cpp').css("border", "");
			$('#refvia').css("border", "");

			$("#messageradios").css('display','none');

			$('#messageclvValor').css("display", "none");


			var calleI= $("#calleAv").val();
			var colI= $("#col").val();
			var nE= $("#numEx").val();
			var nI= $("#numIn").val();
			var ValorC = $("#scrp").val();

			calleI = validarDomi();
			colI = validarCol();
			nE = validarNE();
			nI = validarNI();
			ValorC = validarValorC();

			var cpI = $('#cpp').val();
			var municipioI = $('#munic').val();
			//radio button de pago de impuesto
			var pagoIm = $('input[name=impuesto]:checked').val();

			//radio button de modificacion
			var modificacion = $('input[name=gender2]:checked').val();

			var m3 = $('input[name=gender3]:checked').val();

			var dictaminador = $("#selcdic").val();

				//$('#nogx').val(dictaminador);
				var ed = PadLeft($("#c_edif").val(), 2);
				var dep = PadLeft($("#c_dept").val(), 4);


				if( $("#c_muni").val() >= '126' ){
					$('#municipio').css("display", "block");
					$('#btnaddi').css("display", "block");
				}else{

					if ( $("#c_muni").val() == '' || $("#c_muni").val() == ' '  ) {
						$('#municipio').css("display", "block");
						$('#c_muni').css("border", "1px solid red");
						$('#btnaddi').css("display", "block");

						}else if ( $("#c_zona").val() =='' || $("#c_zona").val() ==' ' ) {

							$('#zona').css("display", "block");
							$('#c_zona').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#c_manz").val() =='' || $("#c_manz").val() ==' ' ) {

							$('#manzana').css("display", "block");
							$('#c_manz').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#c_lote").val() =='' || $("#c_lote").val() ==' ' ) {

							$('#lote').css("display", "block");
							$('#c_lote').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#c_edif").val() =='' ||  $("#c_edif").val() ==' ' ) {

							$('#edificio').css("display", "block");
							$('#c_edif').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#c_dept").val() =='' || $("#c_dept").val() ==' ' ) {

							$('#departamento').css("display", "block");
							$('#c_dept').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#scrp").val() =='' || $("#scrp").val() ==' ' || !ValorC ) {

							$('#scrp').css("border", "1px solid red");
							$('#messageValorc').css("display", "block");
							$('#btnaddi').css("display", "block");


						}else if ( $("#calleAv").val()  =='' || $("#calleAv").val() ==' ' || !calleI ) {

							$('#calleAv').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#col").val()  =='' || $("#col").val() ==' ' || !colI ) {

							$('#col').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#numEx").val()  =='' || $("#numEx").val() ==' ' || !nE ) {

							$('#numEx').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#numIn").val()  =='' || $("#numIn").val() ==' ' || !nI ) {

							$('#numIn').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $('#munic').val() =='' || $('#munic').val() ==' ' ) {

							$('#munic').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $('#cpp').val() =='' || $('#cpp').val() ==' ' ) {

							$('#cpp').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( $("#refvia").val() =='' || $("#refvia").val() ==' ' ) {

							$('#refvia').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else if ( pagoIm== null || modificacion== null || m3 == null ) {

							$("#messageradios").css('display','flex');
							$('#btnaddi').css("display", "block");

						}else{




							//validacion campo x campo


							if (ed != '00' && dep == '0000') {

							//console.log('Primer Error');
							//document.getElementById('id05').style.display='block';
								$('#c_edif').css("border", "1px solid red");
								$('#c_dept').css("border", "1px solid red");

								$('#btnaddi').css("display", "block");
						}else if (dep != '0000' && ed == '00') {
							//console.log('Segundo Error');
							document.getElementById('id05').style.display='block';
							$('#c_edif').css("border", "1px solid red");
							$('#c_dept').css("border", "1px solid red");
							$('#btnaddi').css("display", "block");

						}else{

							var claveCatatral = $("#c_muni").val() + $("#c_zona").val() + $("#c_manz").val() + $("#c_lote").val() + $("#c_edif").val() + $("#c_dept").val() ;

							 var ma = pahtv.vector;
							 var pahtv2 = { vector2 : [] } ;
							 var vector2 = { clave2 : '',annio: ''};

								$.each( ma, function( key, value ){

									 if( value.clave == claveCatatral ){
										 pahtv2.vector2.push({clave2:value.clave,annio:value.anio});
									 }

									});

								//ASI PODEMOS VER LOS DATOS UNO X UNO DE UN ARRAY DE OBJETOS
								//console.log(pahtv2.vector2[0].annio);

											//console.log($("#aniox").val());

											if(  pahtv2.vector2.length == 0 ){
												//inserta el inmueble 23

												///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

												/*$.post("../../acceso",{acceess:8989},function(z){
														//console.log(z);
														$(z).each(function(key,valuee){
																pahtavg.vectoravg.push({clave:valuee.cve_catastral,anio:valuee.aniodictaminar});

											});

											});*/
												var validacion2 = pahtavg.vectoravg;
									 var pahtvavg2 = { vectoravg2 : [] } ;
									 var vectoravg2 = { clave21 : '',annio12: ''};

												$.each( validacion2, function( key, value ){

										 if( value.clave == claveCatatral ){
											pahtvavg2.vectoravg2.push({clave21:value.clave,annio12:value.anio});
										 }

										});

												if(  pahtvavg2.vectoravg2.length == 0 ){

													var fmavg = $('input[name=fm]:checked').val();
													var _c_muni =  $("#c_muni").val() ;
													var _c_zona =  $("#c_zona").val() ;
													var _c_manz =  $("#c_manz").val() ;
													var _c_lote =  $("#c_lote").val() ;
													var _c_edif =  $("#c_edif").val() ;
													var _c_dept =  $("#c_dept").val() ;
													var _scrp =  $("#scrp").val() ;
													var _calleAv =  $("#calleAv").val() ;
													var _col =  $("#col").val() ;
													var _numEx =  $("#numEx").val() ;
													var _numIn =  $("#numIn").val() ;
													var _cp =  $("#cp").val() ;
													var _muni =  $("#muni").val() ;
													var _cpp =  $('#cpp').val();
													var _munic =  $('#munic').val();
													var _refvia =  $("#refvia").val() ;
													var _impuesto =  pagoIm ;
													var _madific =  modificacion;
													var _variable_clvs =  m3;
													var _fm =   fmavg ;
													var _no18 =   $("#selcdic").val() ;
													var _ann =   $("#an").val();


													$.post("../../acceso11",{

													 c_muni: _c_muni
				 									,c_zona:  _c_zona
				 									,c_manz:  _c_manz
				 									,c_lote:  _c_lote
				 									,c_edif:  _c_edif
				 									,c_dept:  _c_dept
				 									,scrp:  _scrp
				 									,calleAv:  _calleAv
				 									,col:  _col
				 									,numEx:  _numEx
				 									,numIn:  _numIn
				 									,cp:  _cp
				 									,muni:  _muni
				 									,cpp:  _cpp
				 									,munic:  _munic
				 									,refvia:  _refvia
				 									,impuesto:  _impuesto
				 									,madific:  _madific
				 									,variable_clvs:_variable_clvs
				 									,fm:   _fm
				 									,no18:  _no18
				 									,ann:   _ann},function(a){
										console.log(a);


																				$('#inmublegg').modal('hide');
																				$("#default_collapseTwo").removeClass("show");
																				$("#tbinm").css('display','block');
																				$("#default_collapseOne").addClass(" collapse show");
																				$("#tbinm2").css('display','block');

																				$.post("../../acceso20",{acceess2022: 86},function(response){
																					console.log(response);
																					if( response == "10" ){
																							//$scope.list_inmueblesr  = [] ;
																							$("#datosxd").html('');
																							$('#btnaddi').css("display", "block");
																						}else{
																							$('#btnaddi').css("display", "block");
																							//$scope.list_inmueblesr  = response ;
																							$("#datosxd").html('');
																							$(response).each(function(key,valuee){
																								$("#datosxd").append(
																								'<tr ng-repeat="x in list_inmueblesr">' +
																								'<td style="display: none;">' +
																														valuee.id +
																														'</td>' +
																														'<td> ' + valuee.id_dictaminador + '</td>' +
																														'<td>' + valuee.cve_cat + '</td>' +
																														'<td>' + valuee.valor_catastral + '</td>' +
																														'<td class="text-center ">' +
																														'<button type="button" class="btn btn-info btn-outline btn-rounded m-b-10" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="btneditinm('+ valuee.id +')" style="background-color: #414558; border-color: #414558; color: white;" > EDITAR  </button>'+
																														'</td>' +
																														'<td class="text-center ">' +
																														'<button type="button" class="btn btn-danger btn-outline  m-b-10 m-l-5" onclick="btndeleteinm('+ valuee.id +')" style="background-color: #8b4c55; border-color: #8b4c55; color: white;"> ELIMINAR  </button>' +
																														'</td>' +
																								'</tr>');
																							});

																						}
																				});



																				$("#btnsend").css('display','block');
																				$("#morefexx").css('display','block');




													});




												/*	$scope.inmbls.c_muni = "";
													$scope.inmbls.c_zona = "";
													$scope.inmbls.c_manz = "";
													$scope.inmbls.c_lote = "";
													$scope.inmbls.c_edif = "";
													$scope.inmbls.c_dept = "";

													$scope.inmbls.scrp = "";

													$scope.inmbls.calleAv = "";
													$scope.inmbls.col = "";
													$scope.inmbls.numEx = "";
													$scope.inmbls.numIn = "";
													$scope.inmbls.cp = "";
													$scope.inmbls.muni = "";


													$scope.inmbls.refvia = "";*/
													$('#cpp').val("");
													$('#munic').val("");


													//document.getElementById('impuesto').checked = false;
													document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
													//document.getElementById('gender2').checked = false;
													document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
													//document.getElementById('gender3').checked = false;
													document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);


												}else{
												/*	$scope.inmbls.c_muni = "";
										$scope.inmbls.c_zona = "";
										$scope.inmbls.c_manz = "";
										$scope.inmbls.c_lote = "";
										$scope.inmbls.c_edif = "";
										$scope.inmbls.c_dept = "";*/

										$('#c_muni').css("border", "1px solid red");
										$('#c_zona').css("border", "1px solid red");
										$('#c_manz').css("border", "1px solid red");
										$('#c_lote').css("border", "1px solid red");
										$('#c_edif').css("border", "1px solid red");
										$('#c_dept').css("border", "1px solid red");


										$('#messageclvValor').css("display", "block");

												}
												///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



											}else{

												var ma1 = pahtv2.vector2;
										 var pahtv3 = { vector3 : [] } ;
										 var vector3 = { clave3 : '',annio3: ''};
										 var _annioselec =   $("#an").val();

											$.each( ma1, function( key, value ){

												 //if( value.annio == $scope.imblss.anio ){
												 	if( value.annio == _annioselec ){
													 pahtv3.vector3.push({clave3:value.clave2,annio3:value.annio});
												 }

												});

											if( pahtv3.vector3.length == 0 ){

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
													/*$.post("../../acceso",{acceess:8989},function(z){
																//console.log(z);
																$(z).each(function(key,valuee){
																		pahtavg.vectoravg.push({clave:valuee.cve_catastral,anio:valuee.aniodictaminar});

													});

													});*/

													var validacion2 = pahtavg.vectoravg;
										 var pahtvavg2 = { vectoravg2 : [] } ;
										 var vectoravg2 = { clave21 : '',annio12: ''};

													$.each( validacion2, function( key, value ){

											 if( value.clave == claveCatatral ){
												pahtvavg2.vectoravg2.push({clave21:value.clave,annio12:value.anio});
											 }

											});

													if(  pahtvavg2.vectoravg2.length == 0 ){

														var fmavg = $('input[name=fm]:checked').val();
														var _c_muni =  $("#c_muni").val() ;
														var _c_zona =  $("#c_zona").val() ;
														var _c_manz =  $("#c_manz").val() ;
														var _c_lote =  $("#c_lote").val() ;
														var _c_edif =  $("#c_edif").val() ;
														var _c_dept =  $("#c_dept").val() ;
														var _scrp =  $("#scrp").val() ;
														var _calleAv =  $("#calleAv").val() ;
														var _col =  $("#col").val() ;
														var _numEx =  $("#numEx").val() ;
														var _numIn =  $("#numIn").val() ;
														var _cp =  $("#cp").val() ;
														var _muni =  $("#muni").val() ;
														var _cpp =  $('#cpp').val();
														var _munic =  $('#munic').val();
														var _refvia =  $("#refvia").val() ;
														var _impuesto =  pagoIm ;
														var _madific =  modificacion;
														var _variable_clvs =  m3;
														var _fm =   fmavg ;
														var _no18 =   $("#selcdic").val() ;
														var _ann =   $("#an").val();


														$.post("../../acceso11",{

														 c_muni: _c_muni
														,c_zona:  _c_zona
														,c_manz:  _c_manz
														,c_lote:  _c_lote
														,c_edif:  _c_edif
														,c_dept:  _c_dept
														,scrp:  _scrp
														,calleAv:  _calleAv
														,col:  _col
														,numEx:  _numEx
														,numIn:  _numIn
														,cp:  _cp
														,muni:  _muni
														,cpp:  _cpp
														,munic:  _munic
														,refvia:  _refvia
														,impuesto:  _impuesto
														,madific:  _madific
														,variable_clvs:_variable_clvs
														,fm:   _fm
														,no18:  _no18
														,ann:   _ann},function(a){

											console.log(a);


																					$('#inmublegg').modal('hide');
																					$("#default_collapseTwo").removeClass("show");
																					$("#tbinm").css('display','block');
																					$("#default_collapseOne").addClass(" collapse show");
																					$("#tbinm2").css('display','block');

																					$.post("../../acceso20",{acceess2022: 86},function(response){
																						//console.log(response);
																						if( response == "10" ){
																								//$scope.list_inmueblesr  = [] ;
																								$("#datosxd").html('');
																								$('#btnaddi').css("display", "block");
																							}else{
																								$('#btnaddi').css("display", "block");
																								//$scope.list_inmueblesr  = response ;
																								$("#datosxd").html('');
																								$(response).each(function(key,valuee){
																									$("#datosxd").append(
																									'<tr ng-repeat="x in list_inmueblesr">' +
																									'<td style="display: none;">' +
																															valuee.id +
																															'</td>' +
																															'<td> ' + valuee.id_dictaminador + '</td>' +
																															'<td>' + valuee.cve_cat + '</td>' +
																															'<td>' + valuee.valor_catastral + '</td>' +
																															'<td class="text-center ">' +
																															'<button type="button" class="btn btn-info btn-outline btn-rounded m-b-10" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="btneditinm('+ valuee.id +')" style="background-color: #414558; border-color: #414558; color: white;" > EDITAR  </button>'+
																															'</td>' +
																															'<td class="text-center ">' +
																															'<button type="button" class="btn btn-danger btn-outline  m-b-10 m-l-5" onclick="btndeleteinm('+ valuee.id +')" style="background-color: #8b4c55; border-color: #8b4c55; color: white;"> ELIMINAR  </button>' +
																															'</td>' +
																									'</tr>');
																								});



																							}
																					});



																					$("#btnsend").css('display','block');
																					$("#morefexx").css('display','block');




														});



													/*	$scope.inmbls.c_muni = "";
														$scope.inmbls.c_zona = "";
														$scope.inmbls.c_manz = "";
														$scope.inmbls.c_lote = "";
														$scope.inmbls.c_edif = "";
														$scope.inmbls.c_dept = "";

														$scope.inmbls.scrp = "";

														$scope.inmbls.calleAv = "";
														$scope.inmbls.col = "";
														$scope.inmbls.numEx = "";
														$scope.inmbls.numIn = "";
														$scope.inmbls.cp = "";
														$scope.inmbls.muni = "";


														$scope.inmbls.refvia = "";*/
														$('#cpp').val("");
														$('#munic').val("");


														//document.getElementById('impuesto').checked = false;
														document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
														//document.getElementById('gender2').checked = false;
														document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
														//document.getElementById('gender3').checked = false;
														document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);



													}else{
													/*	$scope.inmbls.c_muni = "";
											$scope.inmbls.c_zona = "";
											$scope.inmbls.c_manz = "";
											$scope.inmbls.c_lote = "";
											$scope.inmbls.c_edif = "";
											$scope.inmbls.c_dept = "";*/

											$('#c_muni').css("border", "1px solid red");
											$('#c_zona').css("border", "1px solid red");
											$('#c_manz').css("border", "1px solid red");
											$('#c_lote').css("border", "1px solid red");
											$('#c_edif').css("border", "1px solid red");
											$('#c_dept').css("border", "1px solid red");


											$('#messageclvValor').css("display", "block");

													}
													///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



											}else{
										/*	 $scope.inmbls.c_muni = "";
										$scope.inmbls.c_zona = "";
										$scope.inmbls.c_manz = "";
										$scope.inmbls.c_lote = "";
										$scope.inmbls.c_edif = "";
										$scope.inmbls.c_dept = "";*/

										$('#c_muni').css("border", "1px solid red");
										$('#c_zona').css("border", "1px solid red");
										$('#c_manz').css("border", "1px solid red");
										$('#c_lote').css("border", "1px solid red");
										$('#c_edif').css("border", "1px solid red");
										$('#c_dept').css("border", "1px solid red");


										$('#messageclvValor').css("display", "block");




											}



											}

						}

						}




				}



					$('#btnaddi').css("display", "block");

					$('#c_muni').val("");
					$('#c_zona').val("");
					$('#c_manz').val("");
					$('#c_lote').val("");
					$('#c_edif').val("");
					$('#c_dept').val("");

					$('#scrp').val("");


					$('#messageValorc').css("display", "none");
					$('#scrp').css("border", "");



					$('#calleAv' ).val("");
					$('#col' ).val("");
					$('#numEx' ).val("");
					$('#numIn' ).val("");
					$('#cp' ).val("");
					$('#muni' ).val("");
					$('#cpp').val("");
					$('#munic').val("");

					$('#refvia').val("");


					//document.getElementById('impuesto').checked = false;
					document.querySelectorAll('[name=impuesto]').forEach((x) => x.checked = false);
					//document.getElementById('gender2').checked = false;
					document.querySelectorAll('[name=gender2]').forEach((x) => x.checked = false);
					//document.getElementById('gender3').checked = false;
					document.querySelectorAll('[name=gender3]').forEach((x) => x.checked = false);

}




function btneditinm(j){
	$("#modfclav").val('');
	$("#modfscrp").val('');
	$("#modfcalleAv").val('');
	$("#modfcol").val('');
	$("#modfnumEx").val('');
	$("#modfnumIn").val('');
	$("#modfmunic").val('');
	$("#modfcpp").val('');
	$("#modfrefvia").val('');

		document.querySelectorAll('[id=modfgender1]').forEach((x) => x.checked = false);
		document.querySelectorAll('[id=modfgender2]').forEach((x) => x.checked = false);
		document.querySelectorAll('[id=modfgender2S]').forEach((x) => x.checked = false);
		document.querySelectorAll('[id=modfgender2N]').forEach((x) => x.checked = false);
		document.querySelectorAll('[id=modfgender3S]').forEach((x) => x.checked = false);
		document.querySelectorAll('[id=modfgender3N]').forEach((x) => x.checked = false);

	$("#inmueblesmore").css("display","none");
	$("#inmuebleseditable").css("display","flex");

	var dato = "";
	 //para seleccionar una opcion de dato
		//	$('#DataTables_Table_0 tbody').on( 'click', 'tr', function () {
							//
						//	dato = $(this).find("td:eq(0)").text();
							var cx = j;
						//SAVE DATES
							$("#inmu").val('');
				$("#inmu").val(cx);
							//vamos a filtrar datos
							$.post("../../acceso20",{acceess2022: 104,datofilter: cx},function(response){

								//PINTAR DATOS EN LA VISTA

								console.log(response);
								$("#modfclav").val(response[0].cve_cat);
								$("#modfscrp").val(response[0].valor_catastral);

								$("#modfcalleAv").val(response[0].calle);
								$("#modfcol").val(response[0].colonia);
								$("#modfnumEx").val(response[0].no_exterior);
								$("#modfnumIn").val(response[0].no_interior);


								$("#modfmunic").val(response[0].id_municipio);

								$("#modfmunic option[value='"+ response[0].id_municipio +"']").attr("selected",true);

								cargar_datos_cp2(response[0].id_municipio,response[0].codigo_p);




								$("#modfrefvia").val(response[0].referencia1);

								if( response[0].manifest_pago == "t" ){
									document.querySelectorAll('[id=modfgender1]').forEach((x) => x.checked = true);
								}else{
									document.querySelectorAll('[id=modfgender2]').forEach((x) => x.checked = true);


								}

								if( response[0].manifest_mejoras == "t" ){
									document.querySelectorAll('[id=modfgender2S]').forEach((x) => x.checked = true);
								}else{

									document.querySelectorAll('[id=modfgender2N]').forEach((x) => x.checked = true);
								}

								if( response[0].manifest_claves == "t" ){
									document.querySelectorAll('[id=modfgender3S]').forEach((x) => x.checked = true);
								}else{

									document.querySelectorAll('[id=modfgender3N]').forEach((x) => x.checked = true);
								}

							});



			//});



}



function btndeleteinm(i){

	var dato = "";
	 //para seleccionar una opcion de dato
		//	$('#DataTables_Table_0 tbody').on( 'click', 'tr', function () {
							//
						//	dato = $(this).find("td:eq(0)").text();
							var cidx = i; var fmavg = $('input[name=fm]:checked').val();
							$.post("../../acceso13",{ variable : cidx, personatipo : fmavg },function(res){


								$('#inmublegg').modal('hide');
								$("#default_collapseTwo").removeClass("show");
								$("#tbinm").css('display','block');
								$("#default_collapseOne").addClass(" collapse show");
								$("#tbinm2").css('display','block');

								$.post("../../acceso20",{acceess2022: 86},function(response){
									if( response == "10" ){
										//$scope.list_inmueblesr  = [] ;
										$("#datosxd").html('');
										$("#btnsend").css('display','none');
									}else{
										//$scope.list_inmueblesr  = response ;
										$("#btnsend").css('display','block');
										$("#datosxd").html('');
										$(response).each(function(key,valuee){
											$("#datosxd").append(
											'<tr ng-repeat="x in list_inmueblesr">' +
											'<td style="display: none;">' +
																	valuee.id +
																	'</td>' +
																	'<td> ' + valuee.id_dictaminador + '</td>' +
																	'<td>' + valuee.cve_cat + '</td>' +
																	'<td>' + valuee.valor_catastral + '</td>' +
																	'<td class="text-center ">' +
																	'<button type="button" class="btn btn-info btn-outline btn-rounded m-b-10" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="btneditinm('+ valuee.id +')" style="background-color: #414558; border-color: #414558; color: white;" > EDITAR  </button>'+
																	'</td>' +
																	'<td class="text-center ">' +
																	'<button type="button" class="btn btn-danger btn-outline  m-b-10 m-l-5" onclick="btndeleteinm('+ valuee.id +')" style="background-color: #8b4c55; border-color: #8b4c55; color: white;"> ELIMINAR  </button>' +
																	'</td>' +
											'</tr>');
										});
									}
								});


								$("#morefexx").css('display','block');





							});










	//		});



}



function updateInm(){
	var calleI= $("#modfcalleAv").val();// $scope.inmblsmod.modfcalleAv;
	var colI= $("#modfcol").val();// $scope.inmblsmod.modfcol;
	var nE= $("#modfnumEx").val();// $scope.inmblsmod.modfnumEx;
	var nI= $("#modfnumIn").val();// $scope.inmblsmod.modfnumIn;
	var ValorC = $("#modfscrp").val();// $scope.inmblsmod.modfscrp;

	calleI = validarDomimodf();
	colI = validarColmodf();
	nE = validarNEmodf();
	nI = validarNImodf();
	ValorC = validarValorCmodf();

	var cpI = $('#modfcpp').val();
	var municipioI = $('#modfmunic').val();
	//radio button de pago de impuesto
	var pagoIm = $('input[name=modfimpuesto]:checked').val();

	//radio button de modificacion
	var modificacion = $('input[name=modfgender2]:checked').val();

	var m3 = $('input[name=modfgender3]:checked').val();

	var dictaminador = $("#selcdic").val();

		//
	var clave_catastral = PadLeft( $("#modfclav").val(), 16);


	if ( $("#modfclav").val() == ''  ||
			$("#modfcalleAv").val() == '' || $("#modfcol").val() =='' ||
			$("#modfnumEx").val() =='' || $("#modfnumIn").val() =='' ||  $("#modfrefvia").val() =='' ||
		!calleI || !colI || !nE || !nI || !ValorC || cpI == '' || municipioI=='' || pagoIm== null || modificacion== null
		|| m3 == null) {

		$('#modfclav').css("border", "1px solid red");


		$('#modfscrp').css("border", "1px solid red");

		$('#modfmunic').css("border", "1px solid red");
		$('#modfcpp').css("border", "1px solid red");
		$('#modfrefvia').css("border", "1px solid red");

		$("#modfmessageradios").css('display','flex');

	}else{



		var claveCatatral = $("#modfclav").val() ;
		var fmavg = $('input[name=fm]:checked').val();
		var _no18 =   $("#selcdic").val() ;
		var _ann =   $("#an").val();

		$.post("../../acceso12",{
		variable : $("#inmu").val(),
		clavv: claveCatatral,
		scrp: $("#modfscrp").val(),// $scope.inmblsmod.modfscrp,
		calleAv: $("#modfcalleAv").val(),// $scope.inmblsmod.modfcalleAv,
		col: $("#modfcol").val(),// $scope.inmblsmod.modfcol,
		numEx: $("#modfnumEx").val(),// $scope.inmblsmod.modfnumEx,
		numIn: $("#modfnumIn").val(),// $scope.inmblsmod.modfnumIn,
		cp: $("#modfcp").val(),// $scope.inmblsmod.modfcp,
		muni: $("#modfmuni").val(),// $scope.inmblsmod.modfmuni,
		cpp: $('#modfcpp').val(),
		munic: $('#modfmunic').val(),
		refvia: $("#modfrefvia").val(),// $scope.inmblsmod.modfrefvia,
		impuesto:  pagoIm,
		madific: modificacion,
		variable_clvs: m3,
		fm:  fmavg,
		no18: _no18,
		ann: _ann},function(res){


							$('#inmublegg').modal('hide');
							$("#default_collapseTwo").removeClass("show");
							$("#tbinm").css('display','block');
							$("#default_collapseOne").addClass(" collapse show");
							$("#tbinm2").css('display','block');

							$.post("../../acceso20",{acceess2022: 86},function(response){
								if( response == "10" ){
									//$scope.list_inmueblesr  = [] ;
									$("#datosxd").html('');
									$("#btnsend").css('display','none');
								}else{
									//$scope.list_inmueblesr  = response ;
									$("#btnsend").css('display','block');
									$("#datosxd").html('');
									$(response).each(function(key,valuee){
										$("#datosxd").append(
										'<tr ng-repeat="x in list_inmueblesr">' +
										'<td style="display: none;">' +
																valuee.id +
																'</td>' +
																'<td> ' + valuee.id_dictaminador + '</td>' +
																'<td>' + valuee.cve_cat + '</td>' +
																'<td>' + valuee.valor_catastral + '</td>' +
																'<td class="text-center ">' +
																'<button type="button" class="btn btn-info btn-outline btn-rounded m-b-10" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="btneditinm('+ valuee.id +')" style="background-color: #414558; border-color: #414558; color: white;" > EDITAR  </button>'+
																'</td>' +
																'<td class="text-center ">' +
																'<button type="button" class="btn btn-danger btn-outline  m-b-10 m-l-5" onclick="btndeleteinm('+ valuee.id +')" style="background-color: #8b4c55; border-color: #8b4c55; color: white;"> ELIMINAR  </button>' +
																'</td>' +
										'</tr>');
									});
								}
							});

							$("#btnsend").css('display','block');
							$("#morefexx").css('display','block');


		});

















	//}

	}



}
