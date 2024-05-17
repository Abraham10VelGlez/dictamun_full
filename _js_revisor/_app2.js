(function(angular) {//alert("angular activadoo");
	'use strict';



	/*  EVENTO PARA INICIAR CONTROLADOR DE UN  FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */
	angular.module('app3', ['app3.ControllerTab3','datatables']);
	angular.module('app3.ControllerTab3', []).controller('ControllerTab3', function($scope,$http) {


		var claf=1;

				$http.post('../../acceso2', {
					data: {access: 39,claf:claf }
				}).success(function(response){
					//ocultamos cuadro de seguimiento

					//mostramos los datos de la tabla

								if(response == '000'){

									$("#myTabl2e").css('display','none');
									$("#myTabl2e_wrapper").css('display','none');
									$("#messagestudiavg1").css('display','block');
								}else {
									$("#messagestudiavg1").css('display','none');
									//console.log(response);
	                $scope.lista_b = response;
	                $("#tblr").css('display','block');
								}

				}).error(function(){
					//console.log(response);
                 //$("#tblr").css('display','none');
								 $("#messagestudiavg1").css('display','none');
				});

				//////
				claf=2;
				$http.post('../../acceso2', {
					data: {access: 39,claf:claf}
				}).success(function(response){
					//ocultamos cuadro de seguimiento

					//mostramos los datos de la tabla


								if( response == '000' ){

									$("#myTabl2ee").css('display','none');
									$("#myTabl2ee_wrapper").css('display','none');
									$("#messagestudiavg").css('display','block');


								}else{
									$("#messagestudiavg").css('display','none');
									//console.log(response);
									$scope.lista_bb = response;
									$("#tblr2").css('display','block');
								}

				}).error(function(){
					//console.log(response);
                 //$("#tblr2").css('display','none');
								 $("#messagestudiavg").css('display','none');
				});


				claf=3;
				$http.post('../../acceso2', {
					data: {access: 39,claf:claf}
				}).success(function(response){
					//ocultamos cuadro de seguimiento

					//mostramos los datos de la tabla
                //console.log(response);
								$("#myTabl2ee").css('display','revert');
                $scope.lista_r = response;
                $("#tblr2").css('display','block');

				}).error(function(){
					//console.log(response);
					$("#myTabl2ee").css('display','none');
                 $("#tblr2").css('display','none');
				});





	});

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

	angular.module('ContrApp3', ['ContrApp3.CtrbyController3']); //,'datatables'
	angular.module('ContrApp3.CtrbyController3', []).controller('CtrbyController3', function($scope,$http) {

	  $http.post('../acceso2', {
			data: {access: 54}
		}).success(function(response){
			//mostramos los datos de la tabla
						console.log(response);
						$scope.lista_c = response;


		}).error(function(){
			console.log('Error al intentar.');
		});

	  $http.post('../acceso2', {
			data: {access: 57}
		}).success(function(response){
			//mostramos los datos de la tabla
						console.log(response);
						$scope.lista_f = response;


		}).error(function(){
			console.log('Error al intentar.');
		});


	  $scope.regionElegida = function (){
		var xa = $("#estado").val();
		$http.post('../acceso2', {
			data: {access: 55,xa :xa}
		}).success(function(response){
			//mostramos los datos de la tabla
						console.log(response);
						$scope.lista_d = response;


		}).error(function(){
			console.log('Error al intentar.');
		});

	  };

	  $scope.cpsmx = function(){
		  var xa = $("#estado").val();
		  var xax = $("#municipio").val();
		  $http.post('../acceso2', {
				data: {access: 56,xa : xa,xax : xax}
			}).success(function(response){
				//mostramos los datos de la tabla
							console.log(response);
							$scope.lista_e = response;


			}).error(function(){
				console.log('Error al intentar.');
			});

	  };



	});

	//InmueblesApp
	/*  EVENTO PARA INICIAR CONTROLADOR DE UN  FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */
	angular.module('InmueblesApp', ['InmueblesApp.InmueblesAppController']);
	angular.module('InmueblesApp.InmueblesAppController', []).controller('InmueblesAppController', function($scope,$http) {
		//console.log($("#nogx").val());
		//$scope.nog =  $("#nogx").val();
	$scope.imblss = {

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
		anio: $("#aniox").val(),
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

	/*  EVENTO PARA INICIAR EL FUNCIONAMIENTO DE UN BOTON */
		$scope.agregarInm = function(){
			//console.log($scope.inmbls.scrp);

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

		var dictaminador = $("#selcdic").val();

			//$('#nogx').val(dictaminador);
			console.log('aaaaa');


		if ($scope.inmbls.c_muni == '' || $scope.inmbls.c_zona=='' || $scope.inmbls.c_manz=='' ||
			$scope.inmbls.c_lote=='' || $scope.inmbls.c_edif=='' || $scope.inmbls.c_dept=='' ||
			$scope.inmbls.calleAv == '' || $scope.inmbls.col=='' ||
			$scope.inmbls.numEx=='' || $scope.inmbls.numIn=='' || $scope.inmbls.refvia=='' ||
			!calleI || !colI || !nE || !nI || !ValorC || cpI == '' || municipioI=='' || pagoIm=='' || modificacion=='') {
			//console.log('datos incorrectos de inmueble');
			document.getElementById('id02').style.display='block';
		}else{
			//console.log('continuar registro de inmueble');
				$scope.imblss.inm.push({
		nombre: $scope.inmbls.nombre,
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
		madific: modificacion
		});
			document.getElementById('id01').style.display='none';
			document.getElementById('ok').style.display='block';
			document.getElementById('agregarNewIn').style.display='none';
			document.getElementById('agreIn').style.display='none';
			document.getElementById('agreIn2').style.display='block';
			/*$('#c_muni').val('');
			$('#c_zona').val('');
			$('#c_manz').val('');
			$('#c_lote').val('');
			$('#c_edif').val('');
			$('#c_dept').val('');
			$('#scrp').val('');
			$('#calleAv').val('');
			$('#col').val('');
			$('#numEx').val('');
			$('#numIn').val('');
			$('#munic').val('');
			$('#cpp').val('');
			$('#refvia').val('');*/

		}

		};
		/*  EVENTO PARA INICIAR EL FUNCIONAMIENTO DE UN BOTON */
	$scope.eliminarInmbls = function(index){
		var no_inmbls = [];
		angular.forEach($scope.imblss.inm, function(inmueble, i) {
        	if(index != i){
        		no_inmbls.push(inmueble);

        	}
      	});
      	$scope.imblss.inm = no_inmbls;
	};

			$scope.btnpre = function(){
			console.log("enviar datos");
			//console.log($scope.imblss.gender);

			var no=$("#nombreDenRaz").val();
			var no1=$("#apPaterno").val();
			var no2=$("#apMaterno").val();
			var no3=$("#telefono").val();
			var no4=$("#correoE").val();
			var no5=$("#curp").val();
			var no6=$("#rfc").val();

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

			//var no19=$("#anio").val();
			//var no20=$("#gender").val();

			var no21=$("#c_muni").val();
			var no22=$("#c_zona").val();
			var no23=$("#c_manz").val();
			var no24=$("#c_lote").val();
			var no25=$("#c_edif").val();
			var no26=$("#c_dept").val();
			var no27=$("#scrp").val();

			var no28=$("#calleAv").val();
			var no29=$("#col").val();
			var no30=$("#numEx").val();
			var no31=$("#numIn").val();
			var no32=$("#cp").val();
			var no33=$("#muni").val();
			var no34=$("#refvia").val();

			var fisicaMoral = $scope.imblss.fm;
			var tipoDictamen = $scope.imblss.gender;
			//fisica
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
			//Representante legal
			no12 = validarNombreRL();
			no13 = validarAPPas();
			no14 = validarAPMas();
			no15 = validarRfcAs();
			no16 = validarCurpAs();
			//inmueble
			no28 = validarDomi();
			no29 = validarCol();
			no30 = validarNE();
			no31 = validarNI();



			if (fisicaMoral==1) {
				console.log('persona Fisica');
				if (!no || !no1 || !no2 || !no3 || !no4 || !no5 || !no6 || !no12 || !no13 ||
					!no14 || !no15 || !no16 || !no28 || !no29 || !no30 || !no31 ||
					tipoDictamen=='' || no21=='' || no22=='' || no23=='' || no24=='' ||
					no25=='' || no26=='' || no27=='' || no34=='') {
					console.log('Datos incorrectos');
				document.getElementById('id02').style.display='block';
				}else{
					console.log('Bien, seguir');
					document.getElementById('id03').style.display='block';
						$http({
               method: 'POST',
               url: '../../acceso3',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: { inmbl1s:$scope.imblss, no18:no18 },
           }).then(function(response) {
  $scope.gists = response.data;
   //console.log(response);
   console.log(response.data);


})
.catch(function(response) {
  console.error('Gists error', response.status, response.data);
})
.finally(function() {
  console.log("finally finished gists");
});
				}
			}else if (fisicaMoral==2) {
				console.log('Persona moral');
				if (!no7 || !no8 || !no10 || !no11 || !no12 || !no13 || !no14 || !no15 ||
					!no16 || !no28 || !no29 || !no30 || !no31 || no9=='' ||
					tipoDictamen=='' || no21=='' || no22=='' ||
					no23=='' || no24=='' || no25=='' || no26=='' || no27=='' ||
					no34=='') {
					console.log('Datos incorrectos');
				document.getElementById('id02').style.display='block';

				}else{
					console.log('Bien, seguir');
					document.getElementById('id03').style.display='block';
				$http({
               method: 'POST',
               url: '../../acceso3',
               headers: {'Content-Type': 'application/x-www-form-urlencoded'},
               data: { inmbl1s:$scope.imblss, no18:no18 },
           }).then(function(response) {
  $scope.gists = response.data;
   //console.log(response);
   console.log(response.data);

})
.catch(function(response) {
  console.error('Gists error', response.status, response.data);
})
.finally(function() {
  console.log("finally finished gists");
});
				}

			}else{
				console.log('no Registro');
				document.getElementById('id02').style.display='block';
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
function editarInRev(){

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

  function guardarCambiosR(){
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

  function okValidado2(){
  	var modal = document.getElementById('id04');
  		modal.style.display = "none";
  	location.reload();

  }

  function selection4(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl2e tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            var cx = dato.trim();
	            location.href = "../SegDictamen/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
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
 function validarNombre() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['nombreDenRaz'];
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
      const input = document.forms['validationForm']['apPaterno'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAP');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ]+$', 'i');

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
      const input = document.forms['validationForm']['apMaterno'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAP');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ]+$', 'i');

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

      const input = document.forms['validationForm']['rfc'];

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

      const input = document.forms['validationForm']['curp'];

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
 function validarTel() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['telefono'];
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
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['correoD'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageEmailm');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)[.][a-zA-Z]{1,5}');

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

 function validaremailF() {
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['correoE'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageEmail');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)[.][a-zA-Z]{1,5}');

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
 function validarNombreA() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['nombreDenominacion'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageA');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ . ,]+$', 'i');

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

      const input = document.forms['validationForm']['rfcD'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRFCa');

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
 function validarTelA() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['telefonoD'];
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
      const input = document.forms['validationForm']['nombreRep'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRL');

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
 function validarAPPas() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['apPaRep'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAPas');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ]+$', 'i');

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
      const input = document.forms['validationForm']['apMaRep'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAPas');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ]+$', 'i');

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

      const input = document.forms['validationForm']['rfcR'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRFCas');

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
 function validarCurpAs() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['validationForm']['curpR'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageRFCas');

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
 function validarDomi() {
      let isValid = false;
      const input = document.forms['validationForm2']['calleAv'];
      const message = document.getElementById('messageCalle');
      input.willValidate = false;
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

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
 function validarCol() {
      let isValid = false;
      const input = document.forms['validationForm2']['col'];
      const message = document.getElementById('messageCol');
      input.willValidate = false;
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

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
 function validarNE() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm2']['numEx'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageNE');

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
 function validarNI() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm2']['numIn'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageNE');

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
 function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
}

function validarValorC() {
      let isValid = false;
      const input = document.forms['validationForm2']['scrp'];
      const message = document.getElementById('messageValorc');
      input.willValidate = false;
      const pattern = new RegExp('^[1-9 . 0]+$', 'i');//'^[0-9]+$', 'i'

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
//se puede usar este metodo para capturar un valor del tabla
function selection(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#table_d tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(0)").text();
	            console.log(dato.trim());
	            location.href = "DatosContribuyente/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
}





//se puede usar este metodo para capturar un valor del tabla
function selection3(){
	var dato = "";
	 //para seleccionar una opcion
	    $('#myTabl2e tbody').on( 'click', 'tr', function () {
	            //$(this).addClass('selected');
	            dato = $(this).find("td:eq(1)").text();
	            console.log(dato.trim());
	            location.href = "../SegDictamen/"+dato.trim();
	            //$(this).removeClass('selected');
	    } );
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



function regionElegida(){
	var xa = $("#estado").val();
	$.post("../acceso2",{access: 55,xa :xa},function(xcx){
		console.log(xcx);
	});


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

	  if (tipo == 5) {  //pendientes







	  	  $('#myTabl2e tbody').on( 'click', 'tr', function () {
	    		cx="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";



	        $.post("../../acceso",{acceess:8,cx:cx,tipo:tipo},function(z){

	        	$('#tablaxinmueble').html("");
	        	cx="";
	        	c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	//reloadvalavg(folio,anio,clavec);
	  	reloadvalavgavaluo(valuee.id_aviso,valuee.aniodictamen,valuee.cclave);
	  	reloadvalavgconstruccion(valuee.id_aviso,valuee.aniodictamen,valuee.cclave);
	  	//reaload de .val avg 04/07/2022

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../SegDictamen/"+valuee.aniodictamen+"?"+valuee.cclave+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../SegDictamen/"+valuee.aniodictamen+"?"+valuee.cclave+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}
			 });

			 c3 = "</tr></tbody></table>";
			 //reaload de .val avg 04/07/2022

			 $('#tablaxinmueble').append(c+c2+c3);
			 z="";

		});
	        cx="";
		$('#tablaxinmueble').html("");
		 z="";
	    } );

	  }else if (tipo == 6) { // con archivo en hojas verdes
	  	  $('#myTabl2ee tbody').on( 'click', 'tr', function () {
	    		cx="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:8,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx="";
	        	c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../SegDictamenpreautorizado/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+ valuee.folio_dictamen +"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../SegDictamenpreautorizado/"+valuee.aniodictamen+"?"+valuee.cclave+"?"+ valuee.folio_dictamen +"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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
	  }else if (tipo == 12) { // con archivo en hojas verdes
	  	  $('#myTabl2ee tbody').on( 'click', 'tr', function () {
	    		cx="";
	           $('#tablaxinmueble').html("");
	            dato = $(this).find("td:eq(0)").text();
	            cx = dato.trim();
	            $('#folioInmueble').val(cx);
	            z="";
	        $.post("../../acceso",{acceess:8,cx:cx,tipo:tipo},function(z){
	        	$('#tablaxinmueble').html("");
	        	cx="";
	        	c = "", c2="", c3="";

  c= "<table class='table table-striped table-responsive-sm' style='color: black;'><thead><tr><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Clave catastral</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Estatus</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Contribuyente</th><th style='font-weight: bold; color: black; background-color: #d0d8f3;'>Valor catastral</th></tr></thead><tbody>";

			 $(z).each(function(key,valuee){

			 	if (valuee.tipod == 1) {
		 c2= "<tr><td><a href='../SegDictamen/"+valuee.aniodictamen+"?"+valuee.cclave+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+" "+valuee.apaterno+" "+valuee.amaterno+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

			 	}else if(valuee.tipod == 2){

 c2= "<tr><td><a href='../SegDictamen/"+valuee.aniodictamen+"?"+valuee.cclave+"'>"+valuee.cclave+"</a></td><td>"+valuee.etapadictamen+"</td><td>"+valuee.nombredenominacion+"</td><td>"+valuee.valor_catastral+"</td></tr>"+c2;

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




function reloadvalavgavaluo(folio,anio,clavec){
	//../../acceso",{acceess:8,cx:cx
	$.ajax({
    url : '../../acceso',
    data : { acceess:8882399 , folio:folio,anio:anio,clavec:clavec },
    type : 'POST',
    dataType : 'html',
    beforeSend: function() {

    },
    success: function(RESUL) {
    	//console.log(RESUL);
			if(RESUL != '10'){
				console.log("EL ARCHIVO NO EXISTE, DEJO DE ESTAR EN LA BASE DE DATOS, NO SE GUARDO , SI NO CONTACTE CON ADMINISTRADOR DE CI SISTEMAS IGECEM");
			}
    },

    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {

        console.log(xhr);
        console.log(status);
    },

    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {

        //console.log(xhr);
        console.log(status);
    }
});
}


function reloadvalavgconstruccion(folio,anio,clavec){
	//../../acceso",{acceess:8,cx:cx
	$.ajax({
    url : '../../acceso',
    data : { acceess:88823992 , folio:folio,anio:anio,clavec:clavec },
    type : 'POST',
    dataType : 'html',
    beforeSend: function() {

    },
    success: function(RESUL) {
    	//console.log(RESUL);
			if(RESUL != '10'){
				console.log("EL ARCHIVO NO EXISTE, DEJO DE ESTAR EN LA BASE DE DATOS, NO SE GUARDO , SI NO CONTACTE CON ADMINISTRADOR DE CI SISTEMAS IGECEM");
			}

    },

    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {

        console.log(xhr);
        console.log(status);
    },

    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {

        //console.log(xhr);
        console.log(status);
    }
});
}
