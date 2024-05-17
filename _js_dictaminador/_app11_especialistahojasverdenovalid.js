
$(document).ready(function () {





	//datosgenerales del dictamen
	var lr = $("#idG").val();  //clave catastral
  var anio = $("#anioDic").val();
  var folio = $("#foliooo").val();
	/*$.post("../../acceso",{ acceess:69,lr:lr },function(v){
		$(v).each(function(key,valuee){

			$('#n_inm').val(valuee.id);
			$('#cvec').val(valuee.cve_catastral);
		});
	});*/
	$.post("../../../../../acceso",{ acceess:51,lr:lr,anio:anio,folio:folio},function(zm){
    //console.log(zm);
    if(zm == "0000"){
      /// console.log("devolver vista");

    }else{
      $(zm).each(function(key,valuee){
        
        $("#etapa").val(valuee.etapa); 
        document.getElementById('btnoss').style.display='block';

        if (valuee.etapa ==3 && valuee.baldio == 't') {
          document.getElementById('prediosCla').style.display='none';
          document.getElementById('reporteFot').style.display='none';  
          document.getElementById('documentacion').style.display='block';
          document.getElementById('fachada').style.display='block'; 
          document.getElementById('acuseG').style.display='none';
        }else if (valuee.etapa ==3 && valuee.baldio == 'f') {
          document.getElementById('prediosCla').style.display='none';
          document.getElementById('reporteFot').style.display='block';  
          document.getElementById('documentacion').style.display='block';
          document.getElementById('fachada').style.display='none'; 
          document.getElementById('acuseG').style.display='none';
          document.getElementById('btnat').style.display='none';

        }else if (valuee.etapa == 11 && valuee.baldio == 't') {
          document.getElementById('prediosCla').style.display='none';
          document.getElementById('reporteFot').style.display='none';  
          document.getElementById('documentacion').style.display='block';
          document.getElementById('fachada').style.display='block';
           document.getElementById('guardarBaldio').style.display='none';
          document.getElementById('guardarBaldioCambios').style.display='block'; 
         $("#observacionGral").html('<h5>OBSERVACIONES GENERALES: '+valuee.obs_rev+'</h5>');
        }else if (valuee.etapa == 11 && valuee.baldio == 'f') {
          document.getElementById('prediosCla').style.display='none';
          document.getElementById('reporteFot').style.display='block';  
          document.getElementById('documentacion').style.display='block';
          document.getElementById('fachada').style.display='none'; 
          document.getElementById('guardarBaldioCambios').style.display='none'; 
          document.getElementById('guardarCambiosTip').style.display='block'; 
          document.getElementById('acuseG').style.display='none';

        }else if (valuee.etapa ==4 && valuee.baldio == 't') {
          document.getElementById('prediosCla').style.display='none';
          document.getElementById('reporteFot').style.display='none';  
          document.getElementById('documentacion').style.display='block';
          document.getElementById('fachada').style.display='none'; 
          document.getElementById('guardarBaldioCambios').style.display='none'; 
          document.getElementById('guardarCambiosTip').style.display='none'; 
          document.getElementById('acuseG').style.display='none';
        }else if (valuee.etapa ==4 && valuee.baldio == 'f') {
          document.getElementById('prediosCla').style.display='none';
          document.getElementById('reporteFot').style.display='block';  
          document.getElementById('documentacion').style.display='block';
          document.getElementById('fachada').style.display='none'; 
            document.getElementById('guardarBaldioCambios').style.display='none'; 
          document.getElementById('guardarCambiosTip').style.display='none'; 
           document.getElementById('acuseG').style.display='none';
            document.getElementById('btnat').style.display='none';
        }else if (valuee.etapa == 1 && valuee.baldio == 'f') {
       
           document.getElementById('acuseG').style.display='block';
           //document.getElementById('prediosCla').style.display='none';
           //document.getElementById('documentacion').style.display='block';

        }else if (valuee.etapa == 15) {
       
           document.getElementById('acuseG').style.display='none'; 
           document.getElementById('prediosCla').style.display='none';
           document.getElementById('btnat').style.display='none';
           document.getElementById('documentacion').style.display='block';
        }else if (valuee.etapa == 5 && valuee.baldio == 't'){

          document.getElementById('prediosCla').style.display='none';
          document.getElementById('documentacion').style.display='block';
          document.getElementById('reporteFot').style.display='none'; 
           document.getElementById('fachada').style.display='block'; 


        }else if (valuee.etapa == 5 && valuee.baldio == 'f'){

          document.getElementById('prediosCla').style.display='none';
          document.getElementById('documentacion').style.display='block';
          document.getElementById('reporteFot').style.display='block'; 
           document.getElementById('fachada').style.display='none'; 

        }
        else if (valuee.etapa == 53 && valuee.baldio == 't'){
            document.getElementById('hVerdes').style.display='block';
            document.getElementById('prediosCla').style.display='none';
            document.getElementById('documentacion').style.display='block';
            document.getElementById('reporteFot').style.display='none'; 
             document.getElementById('fachada').style.display='block'; 
            document.getElementById('alertaa').style.display='block';
            document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5.3 (PRE RECHAZADO / ARCHIVO EN HOJAS VERDES NO VALIDO)');
            document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se habilitara la opcion para ACTUALIZAR el archivo en hojas verdes y el folio dictaval correspondiente.');
           // $("#alertaa").fadeOut(9000); 


          }else if (valuee.etapa == 53 && valuee.baldio == 'f'){

            document.getElementById('prediosCla').style.display='none';
            document.getElementById('documentacion').style.display='block';
            document.getElementById('reporteFot').style.display='block'; 
            document.getElementById('btnat').style.display='none'; 
            document.getElementById('hVerdes').style.display='block';
             document.getElementById('fachada').style.display='none'; 
             document.getElementById('alertaa').style.display='block';
            document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5.3 (PRE RECHAZADO / ARCHIVO EN HOJAS VERDES NO VALIDO)');
            document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se habilitara la opcion para ACTUALIZAR el archivo en hojas verdes y el folio dictaval correspondiente.');
          //  $("#alertaa").fadeOut(9000);


          }





      
      	if (valuee.tipopersona == 1) { // fisica
      		//contribuyente
      		$("#descripcionSer").css('display','none');
			$('#nomC').val(valuee.nombredenominacion +" "+ valuee.apaterno +" "+ valuee.amaterno );
			$('#rfcC').val(valuee.rrfcontri);
			$('#curpC').val(valuee.curpcontrib);
			$('#telefonoC').val(valuee.telefono);
			$('#correoC').val(valuee.email);
      	}else if (valuee.tipopersona==2) { // Moral
      		$('#nomC').val(valuee.nombredenominacion);
      		$('#rfcC').val(valuee.rrfcontri);
      		 $("#labelCurp").css('display','none');
      		 $("#curpC").css('display','none');
      		$('#telefonoC').val(valuee.telefono);
			$('#correoC').val(valuee.email);
      		$('#descpAc').val(valuee.serviciodesc);
          
      	}
			//datos representante legal
			$('#nom').val(valuee.nombrerep + " " + valuee.apaternorep + " " + valuee.amaternorep );
			$('#cfr').val(valuee.rfcrep);
			$('#purc').val(valuee.curprep);
			//Dictaminador - Especialista
      $('#nombs').html(valuee.nomb + " " + valuee.appt + " " + valuee.apmt );
      $('#rfcss').html(valuee.rrfc);
      $('#nog').html(valuee.no_reg_autorizado);
      //Información Adicional
      $('#aniod').val(valuee.aniodictamen);
      $('#tpd').val(valuee.dictament);
      //folioreconstruido
      $('#idGRec').val(valuee.folr);


      load_filesxavg(valuee.folr,$("#idG").val(),valuee.etapa);


      $('#idP').val(valuee.tipopersona);
      document.getElementById('acuseG').style.display='none';
      



    });
    }
		// verificar x  tipo de persona  = archivos
		var p = $('#idP').val();
		if(p == "1"){
			$("#t01_moral").css('display','none');
			  $("#t01_fisica").css('display','block');
			  $("#table01").css('display','block');

		}else if(p == "2"){
			$("#t01_fisica").css('display','none');
			  $("#t01_moral").css('display','block');
        $("#curpC2").css('display','none');
        

		}


		});

	//*pre rechazo..
  /*$("#acuseG22").click(function(){
//alert('okoko');
   var folioDic = $("#idG").val();

  $.post("../../acceso",{acceess:32,folioDic:folioDic},function(m){
    console.log(m);
    location.href="../SeguimientoDictamen/0";

  });


  });*/

	/// cargar archivos de dictamen
	$("#acuseG2").click(function(){

	alert('cambio');

	});

});

function guardarTipolog(){

 var ky = $("#idG").val();
    var t = $("#idP").val();

    if( t  == "1"){
      //

      var com1ac = $("#descpAc").val();


      var com1av = $("#commentav").val();
      var com2co = $("#commentcx").val();
      var com14co = $("#commentfmc").val();


      var com1 = $("#1commenta").val();
      var com2 = $("#1commentb").val();
      var com3 = $("#1commentc").val();
      var com4 = $("#1commenth").val();//doc acredite propiedad
      var com5 = $("#1commente").val();
      var com6 = $("#1commentf").val();//otros
      var com7 = $("#1commentg").val();//Indivisos de condominio
      var com8 = $("#1commentd").val();//Planos o croquis terreno
      var com9 = $("#1commenti").val();//planos arquitectonicos o croquis de construccion
      var com10 = $("#1commentj").val();//edificaciones
      var com11 = $("#1commentk").val();//Plano del conjunto
      var com12 = $("#1commentl").val();//Planos de factores
    //traer todas las tipologias
    //para seleccionar una opcion

    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#idG").val();
    var iddoc = 12;
    var comentario = $(this).find('textarea').val();
    var clfol = $("#idGRec").val();

  //var a = key + 1;
   pahtv_t.vector_t.push({
    folio : clfol,
      id_inmu : idinmu,
      id_doc: iddoc,
      tipolg_n : a,
      comentario : comentario
  });


    });
   // console.log(pahtv_t.vector_t);
      $.post("../../../../../acceso",{acceess:55,idG:ky ,
         descpAc:com1ac,
         commentav:com1av,
         commentcx:com2co,
         commentfmc:com14co,
         commenta:com1,
         commentb:com2,
         commentc:com3,
         commentd:com4,
         commente:com5,
         commentf:com6,
         commentg:com7,
         commentg8:com8,
         commentg9:com9,
         commentg10:com10,
         commentg11:com11,
         commentg12:com12,
        tipologg:pahtv_t.vector_t},function(z){
          console.log(z);

        if( z == "50" ){
        //  console.log("datos guardados");
          document.getElementById('id05').style.display='block';
          document.getElementById('idGuardarTipologia1').style.display='none';

        }else{

        //  console.log("error");
        console.log('faltan archivos por subir'); //mostrar que faltan archivos por subir 
        document.getElementById('id07').style.display='block';
        document.getElementById('idGuardarTipologia1').style.display='none';
        }
      });

    }else{
      var ky = $("#idG").val();
      var com1ac = $("#descpAc").val();

      var com1av = $("#commentav").val();
      var com2co = $("#commentcx").val();

      var com14co = $("#commentfmc").val();

      var com1 = $("#commenta").val();
      var com2 = $("#commentb").val();
      var com3 = $("#commentc").val();
      var com4 = $("#commentd").val();
      var com5 = $("#commente").val();
      var com6 = $("#commentf").val();
      var com7 = $("#commentg").val();//otros
      var com8 = $("#commenth").val();//indivisos
      var com9 = $("#commenti").val();//doc acredite propiedad
      var com10 = $("#commentj").val();//croquis construccion
      var com11 = $("#commentk").val();//edificaciones de uso privativo
      var com12 = $("#commentl").val();//superficies construcctivas
      var com13 = $("#commentm").val();//planos de factores
      
      //var com8 = $("#commentrep").val();
          //traer todas las tipologias
    //para seleccionar una opcion

    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      console.log('Comentarios');
      console.log(a);
      var idinmu = $("#idG").val();
    var iddoc = 12;
    var comentario = $(this).find('textarea').val();
     var clfol = $("#idGRec").val();

  //var a = key + 1;
   pahtv_t.vector_t.push({
     folio : clfol,
      id_inmu : idinmu,
      id_doc: iddoc,
      tipolg_n : a,
      comentario : comentario
  });


    });
    //console.log(pahtv_t.vector_t);

      $.post("../../../../../acceso",{acceess:56,idG:ky ,
         descpAc:com1ac,
         commentav:com1av,
         commentcx:com2co,
         commentfmc:com14co,
         commenta:com1,
         commentb:com2,
         commentc:com3,
         commentd:com4,
         commente:com5,
         commentf:com6,
         commentg:com7,
         commenth:com8,
         commenth9:com9,
         commenth10:com10,
         commenth11:com11,
         commenth12:com12,
         commenth13:com13,
         tipologg:pahtv_t.vector_t
         },function(z){
          // console.log(z);
        if( z == "50" ){
           document.getElementById('alertas1').style.display='block';

           $("#alertas1").fadeOut(9000); 

            document.getElementById('prediosCla').style.display='none';
            document.getElementById('acuseG').style.display='none';
            //quitar los botones de eliminar en tipologias 

        }else{
          console.log(z);
          console.log("faltan datos-error");
          document.getElementById('id07').style.display='block';
          document.getElementById('idGuardarTipologia1').style.display='none';
        }
      });


    }


    var abc = $("#idGRec").val();
    var a = {acceess:52,abc:abc,ky:ky};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: a,
      //contentType: false,
      //cache: false,
      //processData:false,
      success: function(e)
      {
        if( e == "10" ){
          console.log(e);
        }else{
          console.log(e);
        }

      }
    });

    var b = {acceess:53,abc:abc,ky:ky};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: b,
      success: function(ee)
      {
        if( ee == "10" ){
          console.log(ee);
        }else{
          console.log(ee);
        }

      }
    });

    var c = {acceess:54,abc:abc,ky:ky};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: c,
      success: function(i)
      {
        if( i == "10" ){
          console.log(i);
        }else{
          console.log(i);
        }

      }
    });



}
function subiryeditar(e){

  //alert("editar" + e );

  $('#see').val('');
  $('#see').val('B');
  $('#act').val('');
  $('#act').val(e);
  $('#domin3').val(1);
  document.getElementById('id0t').style.display='block';

}


function ok(h){

  //alert(h);



  //href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+ dctx +'/'+ xxx+ '"
  var a1 = $('#idGRec').val();
  var a2 = $('#cvec').val();
  //alert(a1 + "///" + a2);
  var a3 = $('#'+h).val();


  location.href = "https://dictamunigecem.edomex.gob.mx/files/documentos/" + a1 + "/" + a2 + "/" + a3;



}
function baldio(){
  //alert('baldios'); 
    document.getElementById('documentacion').style.display='block';
    document.getElementById('reporteFot').style.display='none';
    document.getElementById('guardarBaldio').style.display='block';
    document.getElementById('fachada').style.display='block';
    document.getElementById('btnoss').style.display='block';
    document.getElementById('acuseG').style.display='none';
  //document.getElementById('acuseG22').style.display='none';
    
}
function construccion(){
  //alert('construccion');
  document.getElementById('documentacion').style.display='block';
  document.getElementById('reporteFot').style.display='block';
  document.getElementById('guardarBaldio').style.display='none';
  document.getElementById('fachada').style.display='none';
  document.getElementById('btnoss').style.display='block';
  document.getElementById('acuseG').style.display='block';


}
function guardarBaldio(){
    var claveCat = $("#idG").val(); 
    var folio = $("#idGRec").val(); //folio con ceros antes.
    var t = $("#idP").val();
    document.getElementById('acuseG').style.display='none';

    
 
    var folio2 = folio.replace(/^(0+)/g, '');
 

    if( t  == "1"){ //Persona fisica

     var avaluofirmado = $('#commentfmc').val(); //formato avaluo firmado
     var dictaval = $('#commentav').val(); //archivo dictaval .val
     var construcciones = $('#commentcx').val(); //archivo contrucciones .val 
     var escriturap = $('#1commenta').val(); //escritura publica
     var boletapredial = $('#1commentb').val(); // boleta predial
     var acreditapropied = $('#1commenth').val(); //doc q acredite la propiedad
     var idenoficial = $('#1commentc').val(); //identificacion oficial
     var medidascolindanc = $('#1commentd').val(); //medidad y colindancias
     var croquislocaliz = $('#1commente').val(); // creoquis de localizacion
     var otros = $('#1commentf').val(); //otros
     var indivisoscondominios = $('#1commentg').val(); //indivisos y condominio
     var croquisconstruccion = $('#1commenti').val(); //plano arq. o croquis de construccion
     var usoprivativo = $('#1commentj').val(); //uso privativo
     var superficiesconstru = $('#1commentk').val(); //superficies constructivas
     var planosfactores = $('#1commentl').val(); // planos de factores
     var fachada = $('#comenfachada').val(); // fachada

     $.post("../../../../../acceso",{acceess:23,claveCat:claveCat,folio2:folio2,
            avaluofirmado :avaluofirmado, 
            dictaval :dictaval, 
            construcciones :construcciones, 
            escriturap :escriturap, 
            boletapredial :boletapredial, 
            acreditapropied :acreditapropied, 
            idenoficial:idenoficial,
            medidascolindanc:medidascolindanc,
            croquislocaliz :croquislocaliz, 
            otros:otros,
            indivisoscondominios :indivisoscondominios, 
            croquisconstruccion :croquisconstruccion, 
            usoprivativo :usoprivativo, 
            superficiesconstru:superficiesconstru,
            planosfactores :planosfactores, 
            fachada:fachada},function(z){
              console.log(z); 
             if (z == "50") {
              document.getElementById('id08').style.display='block';
            $("#id08").fadeOut(8000); 
            document.getElementById('prediosCla').style.display='none';

            document.getElementById('idGuardarBaldio1').style.display='none';




               var abc = $("#idGRec").val();
    var a = {acceess:52,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: a,
      //contentType: false,
      //cache: false,
      //processData:false,
      success: function(e)
      {
        if( e == "10" ){
          console.log(e);
        }else{
          console.log(e);
        }

      }
    });



var b = {acceess:53,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: b,
      success: function(ee)
      {
        if( ee == "10" ){
          console.log(ee);
        }else{
          console.log(ee);
        }

      }
    });


 var c = {acceess:54,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: c,
      success: function(i)
      {
        if( i == "10" ){
          console.log(i);
        }else{
          console.log(i);
        }

      }
    });

              location.reload();
              }else if (z == "000") {
                document.getElementById('id07').style.display='block';

              }
            
        
      });


    }else if (t == "2") { //Persona moral

       var avaluofirmadoM = $('#commentfmc').val(); //formato avaluo firmado
     var dictavalM = $('#commentav').val(); //archivo dictaval .val
     var construccionesM = $('#commentcx').val(); //archivo contrucciones .val  

     var actaempresa = $('#commenta').val(); //Acta Constitutiva de la Empresa  
     var nombramientolegal = $('#commentb').val(); // Nombramiento del Representante legal  
     var boleta = $('#commentc').val(); //Boleta Predial  

     var acreditapropiedadM = $('#commenti').val(); //Documento que acredite la propiedad
     var idenoficialM = $('#commentd').val(); //Identificación Oficial del propietario o representante legal
     var medidascolindancM = $('#commente').val(); // Planos ó Croquis de terreno (medidas y colindancias)

     var croquislocalizM = $('#commentf').val(); //Croquis de Localización  
     var otrosM = $('#commentg').val(); //otros
     var indivisoscondominiosM = $('#commenth').val(); //Relación de indivisos de Condominio
     var croquisconstruccionM = $('#commentj').val(); //Plano arquitectónico o croquis de construcción

     var usoprivativoM = $('#commentk').val(); //Plano arquitectónico contenido edificaciones de su uso privativo
     var superficiesconstruM = $('#commentl').val(); //Plano del conjunto donde señalan las deferentes superficies constructivas
     var planosfactoresM = $('#commentm').val();//Planos de Factores  
     var fachadaM = $('#comenfachada').val(); // fachada

     $.post("../../../../../acceso",{acceess:22,claveCat:claveCat,folio2:folio2,
            avaluofirmadoM:avaluofirmadoM, 
            dictavalM:dictavalM, 
            construccionesM:construccionesM, 
            actaempresa:actaempresa, 
            nombramientolegal:nombramientolegal, 
            boleta:boleta, 
            acreditapropiedadM:acreditapropiedadM,
            idenoficialM:idenoficialM,
            medidascolindancM:medidascolindancM, 
            croquislocalizM:croquislocalizM,
            otrosM:otrosM, 
            indivisoscondominiosM:indivisoscondominiosM, 
            croquisconstruccionM:croquisconstruccionM, 
            usoprivativoM:usoprivativoM,
            superficiesconstruM:superficiesconstruM, 
            planosfactoresM:planosfactoresM,
            fachadaM:fachadaM},function(z){
              console.log(z); 
              if (z == "50") {
            document.getElementById('alertas1').style.display='block';

           $("#alertas1").fadeOut(9000); 

            document.getElementById('prediosCla').style.display='none';

             document.getElementById('guardarBaldio').style.display='none';
            ///funcion para bloquear la parte de subir archivos 
            
       


             var abc = $("#idGRec").val();
    var a = {acceess:52,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: a,
      //contentType: false,
      //cache: false,
      //processData:false,
      success: function(e)
      {
        if( e == "10" ){
          console.log(e);
        }else{
          console.log(e);
        }

      }
    });



var b = {acceess:53,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: b,
      success: function(ee)
      {
        if( ee == "10" ){
          console.log(ee);
        }else{
          console.log(ee);
        }

      }
    });


 var c = {acceess:54,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: c,
      success: function(i)
      {
        if( i == "10" ){
          console.log(i);
        }else{
          console.log(i);
        }

      }
    });
             // location.reload();

              }else if (z == "000") {
                document.getElementById('id07').style.display='block';

              }
           
            
        
      });

    }


}


function load_filesxavg(axxxxxxxx,x,etapa){

	  var clv = $('#cvec').val();
	  //var dct = $('#idGRec').val();
	  var dct = axxxxxxxx;
	  $.post("../../../../..//acceso",{acceess:85,dictams:dct},function(g){
	    //console.log(g);
	    if( g == "3" ){
	      // creando vistas de documentos
	    var tippp = $('#idP').val();
	    //var dct = $('#idG').val();
	    var dct = axxxxxxxx;
	    $.post("../../../../../acceso",{acceess:71,idpers:tippp,dictams:dct,calvecatt:clv,etapa:etapa},function(h){
	    //  console.log(h);
	       var tip_p = $('#idP').val();
	  if( tip_p == "1"){ //Tipo de persona fisica
	         $(h).each(function(key,valuee){
	        //valuee.orden
	           $('#etapa').val(valuee.etapa);

	           if(valuee.etapa == "53"){

	               switch (valuee.orden) {

	                 case "120":
	                   $("#rep1").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#rep1").css('color','#497445');
	                   $("#comenfachada").val(valuee.comentario); 
	                   $("#comenfachada").attr('readonly','readonly'); 
	                   break;
	                 case "10":
	                   $("#okava").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#okava").css('color','#497445');
	                   $("#commentav").val(valuee.comentario);
	                   $("#commentav").attr('readonly','readonly'); 
	                   break;
	                   case "11":
	                     $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#okvc").css('color','#497445');
	                     $("#commentcx").val(valuee.comentario);
	                     $("#commentcx").attr('readonly','readonly'); 
	                   break;
	                   case "14":
	                     $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#okfmr").css('color','#497445');
	                     $("#commentfmc").val(valuee.comentario);
	                     $("#commentfmc").attr('readonly','readonly');                
	                   break;
	                   case "15":
	                     //documento indivisos condominios 
	                     $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f7").css('color','#497445');
	                     $("#1commentg").val(valuee.comentario);
	                     $("#1commentg").attr('readonly','readonly');
	                   break;
	                   case "99":
	                     $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f1").css('color','#497445');
	                     $("#1commenta").val(valuee.comentario);
	                     $("#1commenta").attr('readonly','readonly');
	                   break;
	                   case "88": //Boleta predial
	                     $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f2").css('color','#497445');
	                     $("#1commentb").val(valuee.comentario);
	                     $("#1commentb").attr('readonly','readonly');
	                   break;
                      case "98": //Boleta predial fisico  - baldio
                       $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f2").css('color','#497445');
                       $("#1commentb").val(valuee.comentario);
                       $("#1commentb").attr('readonly','readonly');
                     break;
	                   case "87": //Identificación Oficial del propietario o representante legal 
	                     $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f3").css('color','#497445');
	                     $("#1commentc").val(valuee.comentario);
	                     $("#1commentc").attr('readonly','readonly');
	                   break;
                        case "97": //Identificación Oficial del propietario o representante legal  fisico - baldio
                       $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f3").css('color','#497445');
                       $("#1commentc").val(valuee.comentario);
                       $("#1commentc").attr('readonly','readonly');
                     break;
	                   case "86": //Planos ó Croquis de terreno (medidas y colindancias) 
	                     $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f4").css('color','#497445');
	                     $("#1commentd").val(valuee.comentario);
	                     $("#1commentd").attr('readonly','readonly');
	                   break;
                      case "96": //Planos ó Croquis de terreno (medidas y colindancias)  fisico - baldio
                       $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f4").css('color','#497445');
                       $("#1commentd").val(valuee.comentario);
                       $("#1commentd").attr('readonly','readonly');
                     break;
	                   case "85": //Croquis de Localización  
	                     $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f5").css('color','#497445');
	                     $("#1commente").val(valuee.comentario);
	                     $("#1commente").attr('readonly','readonly');
	                   break;
                      case "95": //Croquis de Localización  fisico - baldio
                       $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f5").css('color','#497445');
                       $("#1commente").val(valuee.comentario);
                       $("#1commente").attr('readonly','readonly');
                     break;
	                   case "84": //Otros
	                     $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f6").css('color','#497445');
	                     $("#1commentf").val(valuee.comentario);
	                     $("#1commentf").attr('readonly','readonly');
	                   break;
                      case "94": //Otros  fisico - baldio
                       $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f6").css('color','#497445');
                       $("#1commentf").val(valuee.comentario);
                       $("#1commentf").attr('readonly','readonly');
                     break;
	                   case "78": //Documento que acredite la propiedad  
	                     $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f8").css('color','#497445');
	                     $("#1commenth").val(valuee.comentario);
	                     $("#1commenth").attr('readonly','readonly');
	                   break;
                       case "83": //Documento que acredite la propiedad   fisico - baldio
                       $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f8").css('color','#497445');
                       $("#1commenth").val(valuee.comentario);
                       $("#1commenth").attr('readonly','readonly');
                     break;
	                   case "77": //Plano arquitectónico o croquis de construcción 
	                     $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f9").css('color','#497445');
	                     $("#1commenti").val(valuee.comentario);
	                     $("#1commenti").attr('readonly','readonly');
	                   break;
                       case "82": //Plano arquitectónico o croquis de construcción  fisico - baldio 
                       $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f9").css('color','#497445');
                       $("#1commenti").val(valuee.comentario);
                       $("#1commenti").attr('readonly','readonly');
                     break;
	                   case "76"://Plano arquitectónico contenido edificaciones de su uso privativo  
	                     $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f10").css('color','#497445');
	                     $("#1commentj").val(valuee.comentario);
	                     $("#1commentj").attr('readonly','readonly');
	                   break;
                     case "81"://Plano arquitectónico contenido edificaciones de su uso privativo   fisico - baldio
                       $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f10").css('color','#497445');
                       $("#1commentj").val(valuee.comentario);
                       $("#1commentj").attr('readonly','readonly');
                     break;
	                   case "75": //Plano del conjunto donde señalan las deferentes superficies constructivas  
	                     $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f11").css('color','#497445');
	                     $("#1commentk").val(valuee.comentario);
	                     $("#1commentk").attr('readonly','readonly');
	                   break;
                     case "80": //Plano del conjunto donde señalan las deferentes superficies constructivas  fisico - baldio
                       $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f11").css('color','#497445');
                       $("#1commentk").val(valuee.comentario);
                       $("#1commentk").attr('readonly','readonly');
                     break;
	                   case "74": //Planos de Factores 
	                     $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#f12").css('color','#497445');
	                     $("#1commentl").val(valuee.comentario);
	                     $("#1commentl").attr('readonly','readonly');
	                   break;
                       case "79": //Planos de Factores  fisico - baldio 
                       $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#f12").css('color','#497445');
                       $("#1commentl").val(valuee.comentario);
                       $("#1commentl").attr('readonly','readonly');
                     break;
	                 default:
	                   break;


	                }

	              }else if( valuee.etapa == "1" ){  
	             $("#rep2").css('display','block');
	             $("#avdown").css('display','block');
	             $("#codown").css('display','block');
	             $("#fmcdown").css('display','block');
	             $("#fff7").css('display','block');
	             $("#fff1").css('display','block');
	             $("#fff2").css('display','block');
	             $("#fff3").css('display','block');
	             $("#fff4").css('display','block');
	             $("#fff5").css('display','block');
	             $("#fff6").css('display','block');
	             $("#fff8").css('display','block');
	             $("#fff9").css('display','block');
	             $("#fff10").css('display','block');
	             $("#fff11").css('display','block');
	             $("#fff12").css('display','block');

	          switch (valuee.orden) {
	            case "120":
	              $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#rep1").css('color','#497445');
	              $("#comenfachada").val(valuee.comentario); 
	              //  $("#comenfachada").attr('readonly','readonly'); 
	              break;
	            case "10":
	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#497445');
	              $("#commentav").val(valuee.comentario);
	              break;
	              case "11":
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#497445');
	                $("#commentcx").val(valuee.comentario);
	              break;
	              case "14":
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#497445');
	                $("#commentfmc").val(valuee.comentario);                
	              break;
	              case "15":
	                //documento indivisos condominios
	                $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f7").css('color','#497445');
	                $("#1commentg").val(valuee.comentario);
	              break;
	              case "99":
	                $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f1").css('color','#497445');
	                $("#1commenta").val(valuee.comentario);
	              break;
	              case "98":
	                $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f2").css('color','#497445');
	                $("#1commentb").val(valuee.comentario);
	              break;
	              case "97":
	                $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f3").css('color','#497445');
	                $("#1commentc").val(valuee.comentario);
	              break;
	              case "96":
	                $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f4").css('color','#497445');
	                $("#1commentd").val(valuee.comentario);
	              break;
	              case "95":
	                $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f5").css('color','#497445');
	                $("#1commente").val(valuee.comentario);
	              break;
	              case "94":
	                $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f6").css('color','#497445');
	                $("#1commentf").val(valuee.comentario);
	              break;
	              case "78":
	                $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f8").css('color','#497445');
	                $("#1commenth").val(valuee.comentario);
	              break;
	              case "77":
	                $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f9").css('color','#497445');
	                $("#1commenti").val(valuee.comentario);
	              break;
	              case "76":
	                $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f10").css('color','#497445');
	                $("#1commentj").val(valuee.comentario);
	              break;
	              case "75":
	                $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f11").css('color','#497445');
	                $("#1commentk").val(valuee.comentario);
	              break;
	              case "74":
	                $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f12").css('color','#497445');
	                $("#1commentl").val(valuee.comentario);
	              break;
	            default:
	              break;
	          }

	         
	         }else if(valuee.etapa == "5"){

	          switch (valuee.orden) {
	            case "120":
	              $("#rep1").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#rep1").css('color','#497445');
	              $("#comenfachada").val(valuee.comentario); 
	              $("#comenfachada").attr('readonly','readonly'); 
	              break;
	            case "10":
	              $("#okava").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#497445');
	              $("#commentav").val(valuee.comentario);
	              $("#commentav").attr('readonly','readonly'); 
	              break;
	              case "11":
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#497445');
	                $("#commentcx").val(valuee.comentario);
	                $("#commentcx").attr('readonly','readonly'); 
	              break;
	              case "14":
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#497445');
	                $("#commentfmc").val(valuee.comentario);
	                $("#commentfmc").attr('readonly','readonly');                
	              break;
	              case "15":
	                //documento indivisos condominios
	                $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f7").css('color','#497445');
	                $("#1commentg").val(valuee.comentario);
	                $("#1commentg").attr('readonly','readonly');
	              break;
	              case "99":
	                $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f1").css('color','#497445');
	                $("#1commenta").val(valuee.comentario);
	                $("#1commenta").attr('readonly','readonly');
	              break;
	              case "98":
	                $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f2").css('color','#497445');
	                $("#1commentb").val(valuee.comentario);
	                $("#1commentb").attr('readonly','readonly');
	              break;
	              case "97":
	                $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f3").css('color','#497445');
	                $("#1commentc").val(valuee.comentario);
	                $("#1commentc").attr('readonly','readonly');
	              break;
	              case "96":
	                $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f4").css('color','#497445');
	                $("#1commentd").val(valuee.comentario);
	                $("#1commentd").attr('readonly','readonly');
	              break;
	              case "95":
	                $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f5").css('color','#497445');
	                $("#1commente").val(valuee.comentario);
	                $("#1commente").attr('readonly','readonly');
	              break;
	              case "94":
	                $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f6").css('color','#497445');
	                $("#1commentf").val(valuee.comentario);
	                $("#1commentf").attr('readonly','readonly');
	              break;
	              case "78":
	                $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f8").css('color','#497445');
	                $("#1commenth").val(valuee.comentario);
	                $("#1commenth").attr('readonly','readonly');
	              break;
	              case "77":
	                $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f9").css('color','#497445');
	                $("#1commenti").val(valuee.comentario);
	                $("#1commenti").attr('readonly','readonly');
	              break;
	              case "76":
	                $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f10").css('color','#497445');
	                $("#1commentj").val(valuee.comentario);
	                $("#1commentj").attr('readonly','readonly');
	              break;
	              case "75":
	                $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f11").css('color','#497445');
	                $("#1commentk").val(valuee.comentario);
	                $("#1commentk").attr('readonly','readonly');
	              break;
	              case "74":
	                $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f12").css('color','#497445');
	                $("#1commentl").val(valuee.comentario);
	                $("#1commentl").attr('readonly','readonly');
	              break;
	            default:
	              break;
	          }

	         }else if( valuee.etapa == "11" ){
	          switch (valuee.orden) {           
	            case "120":

	              if (valuee.comentarios2 == "N/A") {

	              $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#rep1").css('color','#497445');
	              $("#comenfachada").val(valuee.comentarios2);

	              //$("#rep2").css('display','none');
	              $("#comenfachada").attr('readonly','readonly'); 

	              }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {
	              $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#rep1").css('color','#BDBDC7');
	              $("#comenfachada").val(valuee.comentarios2);

	             // $("#rep2").css('display','none');
	              $("#comenfachada").attr('readonly','readonly'); 

	              }else{

	              $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#rep1").css('color','#BDBDC7');
	              $("#comenfachada").val(valuee.comentarios2);
	              $("#rep2").css('display','block');

	              }

	              
	              break;
	            case "10":

	              if(valuee.comentarios2 == "N/A"){

	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#497445');
	              $("#commentav").val(valuee.comentarios2);
	             // $("#avdown").css('display','none');
	              $("#commentav").attr('readonly','readonly');  

	              }else if(valuee.comentarios2 == "" || valuee.comentarios2 == null){

	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#BDBDC7');
	              $("#commentav").val(valuee.comentarios2);
	             // $("#avdown").css('display','none');
	              $("#commentav").attr('readonly','readonly');  

	              }else{
	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#BDBDC7');
	              $("#commentav").val(valuee.comentarios2);
	              $("#avdown").css('display','block');
	              
	              }

	              
	              break;
	              case "11":

	                if (valuee.comentarios2 == "N/A") {
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#497445');
	                $("#commentcx").val(valuee.comentarios2);
	              //  $("#codown").css('display','none');
	                $("#commentcx").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#BDBDC7');
	                $("#commentcx").val(valuee.comentarios2);
	                //$("#codown").css('display','none');
	                $("#commentcx").attr('readonly','readonly');
	                }else{

	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#BDBDC7');
	                $("#commentcx").val(valuee.comentarios2);
	                $("#codown").css('display','block');

	                }

	              break;
	              case "14":
	                //documento firmado x el contribuyente
	               /* $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#1fce10');
	                $("#commentfmc").val(valuee.comentarios2);*/
	            
	                if (valuee.comentario2 == "N/A") {

	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#497445');
	                $("#commentfmc").val(valuee.comentarios2);

	                //$("#fmcdown").css('display','none');
	                $("#commentfmc").attr('readonly','readonly');
	                
	                }else if(valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                
	               // $("#fmcdown").html('<i id="fmcdown" class="fa fa-lock fa-2x" style="margin-top: 10px; cursor: pointer;"></i>');
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#BDBDC7');
	                $("#commentfmc").val(valuee.comentarios2);
	                //$("#fmcdown").css('display','none');
	                $("#commentfmc").attr('readonly','readonly');
	                }else{

	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#BDBDC7');
	                $("#commentfmc").val(valuee.comentarios2);
	                $("#fmcdown").css('display','block');

	                }

	              break;
	              case "15":
	                //documento indivisos condominios
	                if (valuee.comentarios2 == "N/A") {
	                $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f7").css('color','#497445');
	                $("#1commentg").val(valuee.comentarios2);

	               // $("#fff7").css('display','none');
	                $("#1commentg").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {
	                $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f7").css('color','#BDBDC7');
	                $("#1commentg").val(valuee.comentarios2);

	               // $("#fff7").css('display','none');
	                $("#1commentg").attr('readonly','readonly');

	                }else{
	                $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f7").css('color','#BDBDC7');
	                $("#1commentg").val(valuee.comentarios2);
	                 $("#fff7").css('display','block');

	                }
	                
	              break;
	              case "99":
	                if (valuee.comentarios2 == "N/A") {
	                $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f1").css('color','#497445');
	                $("#1commenta").val(valuee.comentarios2);

	               // $("#fff1").css('display','none');
	                $("#1commenta").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {
	                $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f1").css('color','#BDBDC7');
	                $("#1commenta").val(valuee.comentarios2);

	                //$("#fff1").css('display','none');
	                $("#1commenta").attr('readonly','readonly');

	                }else{
	                $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f1").css('color','#BDBDC7');
	                $("#1commenta").val(valuee.comentarios2);
	                 $("#fff1").css('display','block');

	                }

	                
	              break;
	              case "98":
	                if (valuee.comentarios2 == "N/A"){
	                $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f2").css('color','#497445');
	                $("#1commentb").val(valuee.comentarios2);


	               // $("#fff2").css('display','none');
	                $("#1commentb").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {

	                   $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f2").css('color','#BDBDC7');
	                $("#1commentb").val(valuee.comentarios2);


	               // $("#fff2").css('display','none');
	                $("#1commentb").attr('readonly','readonly');

	                }else{

	                  $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f2").css('color','#BDBDC7');
	                $("#1commentb").val(valuee.comentarios2);
	                 $("#fff2").css('display','block');

	                }


	               
	              break;
	              case "97":

	                if (valuee.comentarios2 == "N/A") {

	                $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f3").css('color','#497445');
	                $("#1commentc").val(valuee.comentarios2);

	                //$("#fff3").css('display','none');
	                $("#1commentc").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {

	                $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f3").css('color','#BDBDC7');
	                $("#1commentc").val(valuee.comentarios2);

	               // $("#fff3").css('display','none');
	                $("#1commentc").attr('readonly','readonly');

	                }else{
	                  $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f3").css('color','#BDBDC7');
	                $("#1commentc").val(valuee.comentarios2);
	                 $("#fff3").css('display','block');

	                }

	                
	              break;
	              case "96":

	                if (valuee.comentarios2 == "N/A"){
	                $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f4").css('color','#497445');
	                $("#1commentd").val(valuee.comentarios2);

	                // $("#fff4").css('display','none');
	                $("#1commentd").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {
	                  $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f4").css('color','#BDBDC7');
	                $("#1commentd").val(valuee.comentarios2);

	                // $("#fff4").css('display','none');
	                $("#1commentd").attr('readonly','readonly');
	              }else{
	                $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f4").css('color','#BDBDC7');
	                $("#1commentd").val(valuee.comentarios2);
	                 $("#fff4").css('display','block');

	              }

	               
	              break;
	              case "95":
	                 if (valuee.comentarios2 == "N/A"){
	                  $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#f5").css('color','#497445');
	                   $("#1commente").val(valuee.comentarios2);
	                    $("#1commente").attr('readonly','readonly');

	                 }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {
	                   $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#f5").css('color','#BDBDC7');
	                   $("#1commente").val(valuee.comentarios2);
	                    $("#1commente").attr('readonly','readonly');

	                 }else{
	                  $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#f5").css('color','#BDBDC7');
	                   $("#1commente").val(valuee.comentarios2);

	                 }
	               
	              break;
	              case "94":
	               if (valuee.comentarios2 == "N/A"){
	                $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f6").css('color','#497445');
	                $("#1commentf").val(valuee.comentarios2);
	                $("#1commentf").attr('readonly','readonly');

	               }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f6").css('color','#BDBDC7');
	                $("#1commentf").val(valuee.comentarios2);
	                $("#1commentf").attr('readonly','readonly');

	               }else{
	                $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f6").css('color','#BDBDC7');
	                $("#1commentf").val(valuee.comentarios2);

	               }
	                
	              break;
	              case "78":

	                if (valuee.comentarios2 == "N/A") {

	                $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f8").css('color','#497445');
	                $("#1commenth").val(valuee.comentarios2);

	                //$("#fff8").css('display','none');
	                $("#1commenth").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null) {

	                $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f8").css('color','#BDBDC7');
	                $("#1commenth").val(valuee.comentarios2);

	               // $("#fff8").css('display','none');
	                $("#1commenth").attr('readonly','readonly');

	                }else{
	                   $("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f8").css('color','#BDBDC7');
	                $("#1commenth").val(valuee.comentarios2);
	                $("#fff8").css('display','block');
	                }
	               
	              break;
	              case "77":
	                if (valuee.comentarios2 == "N/A"){
	                $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f9").css('color','#497445');
	                $("#1commenti").val(valuee.comentarios2);
	                $("#1commenti").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f9").css('color','#BDBDC7');
	                $("#1commenti").val(valuee.comentarios2);
	                $("#1commenti").attr('readonly','readonly');

	                }else{
	                $("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f9").css('color','#BDBDC7');
	                $("#1commenti").val(valuee.comentarios2);

	                }

	                
	              break;
	              case "76":
	              if (valuee.comentarios2 == "N/A"){
	                $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f10").css('color','#497445');
	                $("#1commentj").val(valuee.comentarios2);
	                $("#1commentj").attr('readonly','readonly');

	              }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f10").css('color','#BDBDC7');
	                $("#1commentj").val(valuee.comentarios2);
	                $("#1commentj").attr('readonly','readonly');

	              }else{
	                $("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f10").css('color','#BDBDC7');
	                $("#1commentj").val(valuee.comentarios2);

	              }
	                
	              break;
	              case "75":
	              if (valuee.comentarios2 == "N/A"){
	                $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f11").css('color','#497445');
	                $("#1commentk").val(valuee.comentarios2);
	                $("#1commentk").attr('readonly','readonly');

	              }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f11").css('color','#BDBDC7');
	                $("#1commentk").val(valuee.comentarios2);
	                $("#1commentk").attr('readonly','readonly');
	              }else{
	                $("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#f11").css('color','#BDBDC7');
	                $("#1commentk").val(valuee.comentarios2);
	              }
	                
	              break;
	              case "74":
	                if (valuee.comentarios2 == "N/A"){
	                    $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                    $("#f12").css('color','#497445');
	                    $("#1commentl").val(valuee.comentarios2);
	                    $("#1commentl").attr('readonly','readonly');
	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                    $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                    $("#f12").css('color','#BDBDC7');
	                    $("#1commentl").val(valuee.comentarios2);
	                    $("#1commentl").attr('readonly','readonly');
	                }else{
	                    $("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                    $("#f12").css('color','#BDBDC7');
	                    $("#1commentl").val(valuee.comentarios2);
	                }
	               
	              break;
	            default:
	              break;
	          }

	         }else if(valuee.etapa == "15"){

	             $("#rep2").css('display','none');
	             $("#avdown").css('display','none');
	             $("#codown").css('display','none'); 
	             $("#fmcdown").css('display','none');
	             $("#fff7").css('display','none');
	             $("#fff1").css('display','none');
	             $("#fff2").css('display','none');
	             $("#fff3").css('display','none');
	             $("#fff4").css('display','none');
	             $("#fff5").css('display','none');
	             $("#fff6").css('display','none');
	             $("#fff8").css('display','none');
	             $("#fff9").css('display','none');
	             $("#fff10").css('display','none');
	             $("#fff11").css('display','none');
	             $("#fff12").css('display','none');


	            $("#comenfachada").attr('readonly','readonly'); 
	            $("#commentav").attr('readonly','readonly'); 
	            $("#commentcx").attr('readonly','readonly');
	            $("#commentfmc").attr('readonly','readonly');
	            $("#1commentg").attr('readonly','readonly');
	            $("#1commenta").attr('readonly','readonly');
	            $("#1commentb").attr('readonly','readonly');
	            $("#1commentc").attr('readonly','readonly');
	            $("#1commentd").attr('readonly','readonly');
	            $("#1commente").attr('readonly','readonly');
	            $("#1commentf").attr('readonly','readonly');
	            $("#1commenth").attr('readonly','readonly');
	            $("#1commenti").attr('readonly','readonly');
	            $("#1commentj").attr('readonly','readonly');
	            $("#1commentk").attr('readonly','readonly');
	            $("#1commentl").attr('readonly','readonly');


	         }else{

	         }
	      });


	      }else if(tip_p == "2"){ //Tipo de persona 2= moral----
	        $(h).each(function(key,valuee){
	        //valuee.orden
	           $('#etapa').val(valuee.etapa);

	           if(valuee.etapa == "53"){
	        	   // eliza
	        	   $("#avdown").css('display','none');
		            $("#codown").css('display','none');
		            $("#fmcdown").css('display','none');
		            
	        	   $("#mmm1").css('display','none'); 
		            $("#mmm2").css('display','none'); 
		            $("#mmm3").css('display','none');
		            $("#mmm4").css('display','none');
		            $("#mmm5").css('display','none');
		            $("#mmm6").css('display','none');
		            $("#mmm7").css('display','none');
		            $("#mmm8").css('display','none'); 
		            $("#mmm9").css('display','none');
		            $("#mmm10").css('display','none');
		            $("#mmm11").css('display','none'); 
		            $("#mmm12").css('display','none');
		            $("#mmm13").css('display','none');
                $("#rep2").css('display','none');

	               switch (valuee.orden) {

                  case "83": ///Documento que acredita la propiedad
                  $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#9m").css('color','#497445');
                  $("#commenti").val(valuee.comentario);
                  break;

                  case "82": //Plano arquitectónico o croquis de construcción  
                       $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#10m").css('color','#497445');
                       $("#commentj").val(valuee.comentario);
                       $("#commentj").attr('readonly','readonly');
                     break;


                     case "81": //Plano arquitectónico o croquis de construcción  privativo
                       $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#11m").css('color','#497445');
                       $("#commentk").val(valuee.comentario);
                       $("#commentk").attr('readonly','readonly');
                     break;


                     case "80": //Plano arquitectónico o croquis de construcción  constructiva
                       $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#12m").css('color','#497445');
                       $("#commentl").val(valuee.comentario);
                       $("#commentl").attr('readonly','readonly');
                     break;


                      case "79": //Plano de Fcatores
                       $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                       $("#13m").css('color','#497445');
                       $("#commentm").val(valuee.comentario);
                       $("#commentm").attr('readonly','readonly');
                     break;


                     





	                   case "120":
	                   $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#rep1").css('color','#497445');
	                   $("#comenfachada").val(valuee.comentario);
	                   $("#comenfachada").attr('readonly','readonly');
	                   break;
	                 case "10":
	                   $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                   $("#okava").css('color','#497445');
	                   $("#commentav").val(valuee.comentario);
	                    $("#commentav").attr('readonly','readonly');
	                   break;
	                   case "11":
	                     $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#okvc").css('color','#497445');
	                     $("#commentcx").val(valuee.comentario);
	                      $("#commentcx").attr('readonly','readonly');
	                   break;
	                   case "14":
	                     //documento firmado x el contribuyente
	                     $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#okfmr").css('color','#497445');
	                     $("#commentfmc").val(valuee.comentario);
	                      $("#commentfmc").attr('readonly','readonly');
	                   break;
	                   case "15":
	                     //documento indivisos condominios
	                     $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#8m").css('color','#497445');
	                     $("#commenth").val(valuee.comentario);
	                      $("#commenth").attr('readonly','readonly');
	                   break;
	                   case "90":
	                     $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#1m").css('color','#497445');
	                     $("#commenta").val(valuee.comentario);
	                      $("#commenta").attr('readonly','readonly');
	                   break;
	                   case "89":
	                     $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#2m").css('color','#497445');
	                     $("#commentb").val(valuee.comentario);
	                      $("#commentb").attr('readonly','readonly');
	                   break;
	                   case "98":
	                     $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#3m").css('color','#497445');
	                     $("#commentc").val(valuee.comentario);
	                      $("#commentc").attr('readonly','readonly');
	                   break;
	                   case "97":
	                     $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#4m").css('color','#497445');
	                     $("#commentd").val(valuee.comentario);
	                      $("#commentd").attr('readonly','readonly');
	                   break;
	                   case "96":
	                     $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#5m").css('color','#497445');
	                     $("#commente").val(valuee.comentario);
	                      $("#commente").attr('readonly','readonly');
	                   break;
	                   case "95":
	                     $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#6m").css('color','#497445');
	                     $("#commentf").val(valuee.comentario);
	                      $("#commentf").attr('readonly','readonly');
	                   break;
	                   case "94":
	                     $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#7m").css('color','#497445');
	                     $("#commentg").val(valuee.comentario);
	                      $("#commentg").attr('readonly','readonly');
	                   break;
	                   case "78":
	                     $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#9m").css('color','#497445');
	                     $("#commenti").val(valuee.comentario);
	                      $("#commenti").attr('readonly','readonly');
	                   break;
	                   case "77":
	                     $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#10m").css('color','#497445');
	                     $("#commentj").val(valuee.comentario);
	                      $("#commentj").attr('readonly','readonly');
	                   break;
	                   case "76":
	                     $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#11m").css('color','#497445');
	                     $("#commentk").val(valuee.comentario);
	                      $("#commentk").attr('readonly','readonly');
	                   break;
	                   case "75":
	                     $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#12m").css('color','#497445');
	                     $("#commentl").val(valuee.comentario);
	                      $("#commentl").attr('readonly','readonly');
	                   break;
	                   case "74":
	                     $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                     $("#13m").css('color','#497445');
	                     $("#commentm").val(valuee.comentario);
	                      $("#commentm").attr('readonly','readonly');
	                   break;
	                 default:
	                   break;


	                }

	              }else if( valuee.etapa == "1" ){  

	            $("#rep2").css('display','block');
	            $("#avdown").css('display','block');
	            $("#codown").css('display','block');
	            $("#fmcdown").css('display','block');
	            $("#fff8").css('display','block');
	            $("#fff1").css('display','block');
	            $("#fff2").css('display','block');
	            $("#mmm1").css('display','block'); 
	            $("#mmm2").css('display','block'); 
	            $("#mmm3").css('display','block');
	            $("#mmm4").css('display','block');
	            $("#mmm5").css('display','block');
	            $("#mmm6").css('display','block');
	            $("#mmm7").css('display','block');
	            $("#mmm8").css('display','block'); 
	            $("#mmm9").css('display','block');
	            $("#mmm10").css('display','block');
	            $("#mmm11").css('display','block'); 
	            $("#mmm12").css('display','block');
	            $("#mmm13").css('display','block');

	            switch (valuee.orden) {
	            case "120":
	              $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#rep1").css('color','#497445');
	              $("#comenfachada").val(valuee.comentario);
	              break;
	            case "10":
	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#497445');
	              $("#commentav").val(valuee.comentario);
	              break;
	              case "11":
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#497445');
	                $("#commentcx").val(valuee.comentario);
	              break;
	              case "14":
	                //documento firmado x el contribuyente
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#497445');
	                $("#commentfmc").val(valuee.comentario);
	              break;
	              case "15":
	                //documento indivisos condominios
	                $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#8m").css('color','#497445');
	                $("#commenth").val(valuee.comentario);
	              break;
	              case "90":
	                $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#1m").css('color','#497445');
	                $("#commenta").val(valuee.comentario);
	              break;
	              case "89":
	                $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#2m").css('color','#497445');
	                $("#commentb").val(valuee.comentario);
	              break;
	              case "88":
	                $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#3m").css('color','#497445');
	                $("#commentc").val(valuee.comentario);
	              break;
	              case "87":
	                $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#4m").css('color','#497445');
	                $("#commentd").val(valuee.comentario);
	              break;
	              case "86":
	                $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#5m").css('color','#497445');
	                $("#commente").val(valuee.comentario);
	              break;
	              case "85":
	                $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#6m").css('color','#497445');
	                $("#commentf").val(valuee.comentario);
	              break;
	              case "84":
	                $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#7m").css('color','#497445');
	                $("#commentg").val(valuee.comentario);
	              break;
	              case "83":
	                $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#9m").css('color','#497445');
	                $("#commenti").val(valuee.comentario);
	              break;
	              case "82":
	                $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#10m").css('color','#497445');
	                $("#commentj").val(valuee.comentario);
	              break;
	              case "81":
	                $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#11m").css('color','#497445');
	                $("#commentk").val(valuee.comentario);
	              break;
	              case "80":
	                $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#12m").css('color','#497445');
	                $("#commentl").val(valuee.comentario);
	              break;
	              case "79":
	                $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#13m").css('color','#497445');
	                $("#commentm").val(valuee.comentario);
	              break;
	            default:
	              break;
	          }
	         }else if( valuee.etapa == "11" ){ // etapa = 11
              
             /* $("#fmcdown").css('display','block'); 14
              $("#avdown").css('display','block');   10
              $("#codown").css('display','block');  11
              $("#mmm1").css('display','block');  90
              $("#mmm2").css('display','block');  89
              $("#mmm3").css('display','block');  88
              $("#mmm4").css('display','block');   87
              $("#mmm5").css('display','block');  86 medidas y colindancias
              $("#mmm6").css('display','block');  85
              $("#mmm7").css('display','block');  84
              $("#mmm8").css('display','block');  15
              $("#mmm9").css('display','block');   83
              $("#mmm10").css('display','block');  82
              $("#mmm11").css('display','block');  81
              $("#mmm12").css('display','block');  80
              $("#mmm13").css('display','block');  79
                
              $("#rep2").css('display','block');   120
              $("#fff8").css('display','block');
              $("#fff1").css('display','block');
              $("#fff2").css('display','block');*/
             



	           switch (valuee.orden) {
	            case "120":
	               if (valuee.comentarios2 == "N/A"){
	                    $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                    $("#rep1").css('color','#497445');
	                    $("#comenfachada").val(valuee.comentarios2);
	                    $("#comenfachada").attr('readonly','readonly');

	                }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                    $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                    $("#rep1").css('color','#BDBDC7');
	                    $("#comenfachada").val(valuee.comentarios2);
	                    $("#comenfachada").attr('readonly','readonly');
	                }else{
	                    $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                    $("#rep1").css('color','#BDBDC7');
	                    $("#comenfachada").val(valuee.comentarios2);
                       $("#rep2").css('display','block'); 

	                }
	             
	              break;
	            case "10":
	             if (valuee.comentarios2 == "N/A"){
	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#497445');
	              $("#commentav").val(valuee.comentarios2);
	              $("#commentav").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#BDBDC7');
	              $("#commentav").val(valuee.comentarios2);
	              $("#commentav").attr('readonly','readonly');
	             }else{
	              $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	              $("#okava").css('color','#BDBDC7');
	              $("#commentav").val(valuee.comentarios2);
	               $("#avdown").css('display','block');
	             }
	              
	              break;
	              case "11":
	              if (valuee.comentarios2 == "N/A"){
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#497445');
	                $("#commentcx").val(valuee.comentarios2);
	                $("#commentcx").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#BDBDC7');
	                $("#commentcx").val(valuee.comentarios2);
	                $("#commentcx").attr('readonly','readonly');
	                  
	             }else{
	                $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okvc").css('color','#BDBDC7');
	                $("#commentcx").val(valuee.comentarios2);      
                   $("#codown").css('display','block');
	             }
	                
	              break;
	              case "14":
	                //documento firmado x el contribuyente
	                if (valuee.comentarios2 == "N/A"){
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#497445');
	                $("#commentfmc").val(valuee.comentarios2);
	                $("#commentfmc").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#BDBDC7');
	                $("#commentfmc").val(valuee.comentarios2);
	                $("#commentfmc").attr('readonly','readonly');
	                  
	             }else{
	                $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#okfmr").css('color','#BDBDC7');
	                $("#commentfmc").val(valuee.comentarios2);
                  $("#fmcdown").css('display','block');
	                    
	             }
	                
	              break;
	              case "15":
	                //documento indivisos condominios
	              if (valuee.comentarios2 == "N/A"){
	                $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#8m").css('color','#497445');
	                $("#commenth").val(valuee.comentarios2);
	                $("#commenth").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#8m").css('color','#BDBDC7');
	                $("#commenth").val(valuee.comentarios2);
	                $("#commenth").attr('readonly','readonly');
	                  
	             }else{
	                $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#8m").css('color','#BDBDC7');
	                $("#commenth").val(valuee.comentarios2);
                  $("#mmm8").css('display','block'); 
	                    
	             }
	                
	              break;
	              case "90":
	              if (valuee.comentarios2 == "N/A"){
	                $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#1m").css('color','#497445');
	                $("#commenta").val(valuee.comentarios2);
	                $("#commenta").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#1m").css('color','#BDBDC7');
	                $("#commenta").val(valuee.comentarios2);
	                $("#commenta").attr('readonly','readonly');
	                  
	             }else{
	                $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#1m").css('color','#BDBDC7');
	                $("#commenta").val(valuee.comentarios2);
                  $("#mmm1").css('display','block'); 
	                    
	             }
	                
	              break;
	              case "89":
	              if (valuee.comentarios2 == "N/A"){
	                $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#2m").css('color','#497445');
	                $("#commentb").val(valuee.comentarios2);
	                $("#commentb").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#2m").css('color','#BDBDC7');
	                $("#commentb").val(valuee.comentarios2);
	                $("#commentb").attr('readonly','readonly');
	                  
	             }else{
	                $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#2m").css('color','#BDBDC7');
	                $("#commentb").val(valuee.comentarios2);
                   $("#mmm2").css('display','block');
	                    
	             }
	                
	              break;
	              case "88":
	              if (valuee.comentarios2 == "N/A"){
	                $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#3m").css('color','#497445');
	                $("#commentc").val(valuee.comentarios2);
	                $("#commentc").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#3m").css('color','#BDBDC7');
	                $("#commentc").val(valuee.comentarios2);
	                $("#commentc").attr('readonly','readonly');
	                  
	             }else{
	                $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#3m").css('color','#BDBDC7');
	                $("#commentc").val(valuee.comentarios2);
                   $("#mmm3").css('display','block');
	                    
	             }
	                
	              break;
	              case "87":
	              if (valuee.comentarios2 == "N/A"){
	                $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#4m").css('color','#497445');
	                $("#commentd").val(valuee.comentarios2);
	                $("#commentd").attr('readonly','readonly');
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#4m").css('color','#BDBDC7');
	                $("#commentd").val(valuee.comentarios2);
	                $("#commentd").attr('readonly','readonly');
	                  
	             }else{
	                $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#4m").css('color','#BDBDC7');
	                $("#commentd").val(valuee.comentarios2);
                  $("#mmm4").css('display','block');
	                    
	             }
	               
	              break;
	              case "86":
	              if (valuee.comentarios2 == "N/A"){
	                $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#5m").css('color','#497445');
	                $("#commente").val(valuee.comentarios2);
	                $("#commente").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#5m").css('color','#BDBDC7');
	                $("#commente").val(valuee.comentarios2);
	                $("#commente").attr('readonly','readonly');
	                  
	             }else{
	                $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#5m").css('color','#BDBDC7');
	                $("#commente").val(valuee.comentarios2);
                  $("#mmm5").css('display','block');
	                    
	             }
	                
	              break;
	              case "85":
	              if (valuee.comentarios2 == "N/A"){
	                $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#6m").css('color','#497445');
	                $("#commentf").val(valuee.comentarios2);
	                $("#commentf").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#6m").css('color','#BDBDC7');
	                $("#commentf").val(valuee.comentarios2);
	                $("#commentf").attr('readonly','readonly');
	                  
	             }else{
	                $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#6m").css('color','#BDBDC7');
	                $("#commentf").val(valuee.comentarios2);
                  $("#mmm6").css('display','block');
	                    
	             }
	                
	              break;
	              case "84":
	              if (valuee.comentarios2 == "N/A"){
	                $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#7m").css('color','#497445');
	                $("#commentg").val(valuee.comentarios2);
	                $("#commentg").attr('readonly','readonly');
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#7m").css('color','#BDBDC7');
	                $("#commentg").val(valuee.comentarios2);
	                $("#commentg").attr('readonly','readonly');
	                  
	             }else{
	                $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#7m").css('color','#BDBDC7');
	                $("#commentg").val(valuee.comentarios2);
	                $("#mmm7").css('display','block'); 
	             }
	                
	              break;
	              case "83":
	              if (valuee.comentarios2 == "N/A"){
	                $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#9m").css('color','#497445');
	                $("#commenti").val(valuee.comentarios2);
	                $("#commenti").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#9m").css('color','#BDBDC7');
	                $("#commenti").val(valuee.comentarios2);
	                $("#commenti").attr('readonly','readonly');
	                  
	             }else{
	                $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#9m").css('color','#BDBDC7');
	                $("#commenti").val(valuee.comentarios2);
                   $("#mmm9").css('display','block');  
	                    
	             }
	                
	              break;
	              case "82":
	              if (valuee.comentarios2 == "N/A"){
	                $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#10m").css('color','#497445');
	                $("#commentj").val(valuee.comentarios2);
	                $("#commentj").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#10m").css('color','#BDBDC7');
	                $("#commentj").val(valuee.comentarios2);
	                $("#commentj").attr('readonly','readonly');
	                  
	             }else{
	                $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#10m").css('color','#BDBDC7');
	                $("#commentj").val(valuee.comentarios2);
                  $("#mmm10").css('display','block');
	                    
	             }
	               
	              break;
	              case "81":
	              if (valuee.comentarios2 == "N/A"){
	                $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#11m").css('color','#497445');
	                $("#commentk").val(valuee.comentarios2);
	                $("#commentk").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#11m").css('color','#BDBDC7');
	                $("#commentk").val(valuee.comentarios2);
	                $("#commentk").attr('readonly','readonly');
	             }else{
	                $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#11m").css('color','#BDBDC7');
	                $("#commentk").val(valuee.comentarios2);
                  $("#mmm11").css('display','block');
	                    
	             }
	               
	              break;
	              case "80":
	              if (valuee.comentarios2 == "N/A"){
	                $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#12m").css('color','#497445');
	                $("#commentl").val(valuee.comentarios2);
	                $("#commentl").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#12m").css('color','#BDBDC7');
	                $("#commentl").val(valuee.comentarios2);
	                $("#commentl").attr('readonly','readonly');
	                  
	             }else{
	                $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#12m").css('color','#BDBDC7');
	                $("#commentl").val(valuee.comentarios2);
                  $("#mmm12").css('display','block');
	                    
	             }
	                
	              break;
	              case "79":
	              if (valuee.comentarios2 == "N/A"){
	                $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#13m").css('color','#497445');
	                $("#commentm").val(valuee.comentarios2);
	                $("#commentm").attr('readonly','readonly');
	               
	             }else if (valuee.comentarios2 == "" || valuee.comentarios2 == null){
	                $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#13m").css('color','#BDBDC7');
	                $("#commentm").val(valuee.comentarios2);
	                $("#commentm").attr('readonly','readonly');
	                  
	             }else{
	                $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
	                $("#13m").css('color','#BDBDC7');
	                $("#commentm").val(valuee.comentarios2);
                  $("#mmm13").css('display','block');
	                    
	             }
	                
	              break;
	            default:
	              break;
	          }
	         }else if(valuee.etapa == "3"){

            switch (valuee.orden) {
              
              case "120":
                 if (valuee.comentario == "N/A"){
                      $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                      $("#rep1").css('color','#497445');
                      $("#comenfachada").val(valuee.comentario);
                      $("#comenfachada").attr('readonly','readonly');

                  }else if (valuee.comentario == "" || valuee.comentario == null){
                      $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                      $("#rep1").css('color','#BDBDC7');
                      $("#comenfachada").val(valuee.comentario);
                      $("#comenfachada").attr('readonly','readonly');
                  }else{
                      $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                      $("#rep1").css('color','#497445');
                      $("#comenfachada").val(valuee.comentario);

                  }
               
                break;
              case "10":
               if (valuee.comentario == "N/A"){
                $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#okava").css('color','#497445');
                $("#commentav").val(valuee.comentarios2);
                $("#commentav").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#okava").css('color','#BDBDC7');
                $("#commentav").val(valuee.comentario);
                $("#commentav").attr('readonly','readonly');
               }else{
                $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#okava").css('color','#497445');
                $("#commentav").val(valuee.comentario);
                      
               }
                
                break;
                case "11":
                if (valuee.comentario == "N/A"){
                  $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okvc").css('color','#497445');
                  $("#commentcx").val(valuee.comentario);
                  $("#commentcx").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okvc").css('color','#BDBDC7');
                  $("#commentcx").val(valuee.comentario);
                  $("#commentcx").attr('readonly','readonly');
                    
               }else{
                  $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okvc").css('color','#497445');
                  $("#commentcx").val(valuee.comentario);      
               }
                  
                break;
                case "14":
                  //documento firmado x el contribuyente
                  if (valuee.comentario == "N/A"){
                  $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okfmr").css('color','#497445');
                  $("#commentfmc").val(valuee.comentario);
                  $("#commentfmc").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okfmr").css('color','#BDBDC7');
                  $("#commentfmc").val(valuee.comentario);
                  $("#commentfmc").attr('readonly','readonly');
                    
               }else{
                  $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okfmr").css('color','#497445');
                  $("#commentfmc").val(valuee.comentario);
                      
               }
                  
                break;
                case "15":
                  //documento indivisos condominios
                if (valuee.comentario == "N/A"){
                  $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#8m").css('color','#497445');
                  $("#commenth").val(valuee.comentario);
                  $("#commenth").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#8m").css('color','#BDBDC7');
                  $("#commenth").val(valuee.comentario);
                  $("#commenth").attr('readonly','readonly');
                    
               }else{
                  $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#8m").css('color','#497445');
                  $("#commenth").val(valuee.comentario);
                      
               }
                  
                break;
                case "90":
                if (valuee.comentario == "N/A"){
                  $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#1m").css('color','#497445');
                  $("#commenta").val(valuee.comentario);
                  $("#commenta").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#1m").css('color','#BDBDC7');
                  $("#commenta").val(valuee.comentario);
                  $("#commenta").attr('readonly','readonly');
                    
               }else{
                  $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#1m").css('color','#497445');
                  $("#commenta").val(valuee.comentario);
                      
               }
                  
                break;
                case "89":
                if (valuee.comentario == "N/A"){
                  $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#2m").css('color','#497445');
                  $("#commentb").val(valuee.comentario);
                  $("#commentb").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#2m").css('color','#BDBDC7');
                  $("#commentb").val(valuee.comentario);
                  $("#commentb").attr('readonly','readonly');
                    
               }else{
                  $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#2m").css('color','#497445');
                  $("#commentb").val(valuee.comentario);
                      
               }
                  
                break;
                case "88":
                if (valuee.comentario == "N/A"){
                  $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#3m").css('color','#497445');
                  $("#commentc").val(valuee.comentario);
                  $("#commentc").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#3m").css('color','#BDBDC7');
                  $("#commentc").val(valuee.comentario);
                  $("#commentc").attr('readonly','readonly');
                    
               }else{
                  $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#3m").css('color','#497445');
                  $("#commentc").val(valuee.comentario);
                      
               }
                  
                break;
                case "87":
                if (valuee.comentario == "N/A"){
                  $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#4m").css('color','#497445');
                  $("#commentd").val(valuee.comentario);
                  $("#commentd").attr('readonly','readonly');
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#4m").css('color','#BDBDC7');
                  $("#commentd").val(valuee.comentario);
                  $("#commentd").attr('readonly','readonly');
                    
               }else{
                  $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#4m").css('color','#497445');
                  $("#commentd").val(valuee.comentario);
                      
               }
                 
                break;
                case "86":
                if (valuee.comentario == "N/A"){
                  $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#5m").css('color','#497445');
                  $("#commente").val(valuee.comentario);
                  $("#commente").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#5m").css('color','#BDBDC7');
                  $("#commente").val(valuee.comentario);
                  $("#commente").attr('readonly','readonly');
                    
               }else{
                  $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#5m").css('color','#497445');
                  $("#commente").val(valuee.comentario);
                      
               }
                  
                break;
                case "85":
                if (valuee.comentario == "N/A"){
                  $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#6m").css('color','#497445');
                  $("#commentf").val(valuee.comentario);
                  $("#commentf").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#6m").css('color','#BDBDC7');
                  $("#commentf").val(valuee.comentario);
                  $("#commentf").attr('readonly','readonly');
                    
               }else{
                  $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#6m").css('color','#497445');
                  $("#commentf").val(valuee.comentario);
                      
               }
                  
                break;
                case "84":
                if (valuee.comentario == "N/A"){
                  $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#7m").css('color','#497445');
                  $("#commentg").val(valuee.comentario);
                  $("#commentg").attr('readonly','readonly');
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#7m").css('color','#BDBDC7');
                  $("#commentg").val(valuee.comentario);
                  $("#commentg").attr('readonly','readonly');
                    
               }else{
                  $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#7m").css('color','#497445');
                  $("#commentg").val(valuee.comentario);
                      
               }
                  
                break;
                case "83":
                if (valuee.comentario == "N/A"){
                  $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#9m").css('color','#497445');
                  $("#commenti").val(valuee.comentario);
                  $("#commenti").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#9m").css('color','#BDBDC7');
                  $("#commenti").val(valuee.comentario);
                  $("#commenti").attr('readonly','readonly');
                    
               }else{
                  $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#9m").css('color','#497445');
                  $("#commenti").val(valuee.comentario);
                      
               }
                  
                break;
                case "82":
                if (valuee.comentario == "N/A"){
                  $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#10m").css('color','#497445');
                  $("#commentj").val(valuee.comentario);
                  $("#commentj").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#10m").css('color','#BDBDC7');
                  $("#commentj").val(valuee.comentario);
                  $("#commentj").attr('readonly','readonly');
                    
               }else{
                  $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#10m").css('color','#497445');
                  $("#commentj").val(valuee.comentario);
                      
               }
                 
                break;
                case "81":
                if (valuee.comentario == "N/A"){
                  $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#11m").css('color','#497445');
                  $("#commentk").val(valuee.comentario);
                  $("#commentk").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#11m").css('color','#BDBDC7');
                  $("#commentk").val(valuee.comentarios2);
                  $("#commentk").attr('readonly','readonly');
               }else{
                  $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#11m").css('color','#497445');
                  $("#commentk").val(valuee.comentario);
                      
               }
                 
                break;
                case "80":
                if (valuee.comentario == "N/A"){
                  $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#12m").css('color','#497445');
                  $("#commentl").val(valuee.comentario);
                  $("#commentl").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#12m").css('color','#BDBDC7');
                  $("#commentl").val(valuee.comentario);
                  $("#commentl").attr('readonly','readonly');
                    
               }else{
                  $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#12m").css('color','#497445');
                  $("#commentl").val(valuee.comentario);
                      
               }
                  
                break;
                case "79":
                if (valuee.comentario == "N/A"){
                  $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#13m").css('color','#497445');
                  $("#commentm").val(valuee.comentario);
                  $("#commentm").attr('readonly','readonly');
                 
               }else if (valuee.comentario == "" || valuee.comentario == null){
                  $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#13m").css('color','#BDBDC7');
                  $("#commentm").val(valuee.comentario);
                  $("#commentm").attr('readonly','readonly');
                    
               }else{
                  $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#13m").css('color','#497445');
                  $("#commentm").val(valuee.comentario);
                      
               }
                  
                break;
              default:
                break;




              
            }


           }else if(valuee.etapa == "5"){ //etapa 5

             switch (valuee.orden) {

                case "120":
                $("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#rep1").css('color','#497445');
                $("#comenfachada").val(valuee.comentario);
                $("#comenfachada").attr('readonly','readonly');
                break;
              case "10":
                $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#okava").css('color','#497445');
                $("#commentav").val(valuee.comentario);
                 $("#commentav").attr('readonly','readonly');
                break;
                case "11":
                  $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okvc").css('color','#497445');
                  $("#commentcx").val(valuee.comentario);
                   $("#commentcx").attr('readonly','readonly');
                break;
                case "14":
                  //documento firmado x el contribuyente
                  $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#okfmr").css('color','#497445');
                  $("#commentfmc").val(valuee.comentario);
                   $("#commentfmc").attr('readonly','readonly');
                break;
                case "15":
                  //documento indivisos condominios
                  $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#8m").css('color','#497445');
                  $("#commenth").val(valuee.comentario);
                   $("#commenth").attr('readonly','readonly');
                break;
                case "90":
                  $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#1m").css('color','#497445');
                  $("#commenta").val(valuee.comentario);
                   $("#commenta").attr('readonly','readonly');
                break;
                case "89":
                  $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#2m").css('color','#497445');
                  $("#commentb").val(valuee.comentario);
                   $("#commentb").attr('readonly','readonly');
                break;
                case "88":
                  $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#3m").css('color','#497445');
                  $("#commentc").val(valuee.comentario);
                   $("#commentc").attr('readonly','readonly');
                break;
                case "87":
                  $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#4m").css('color','#497445');
                  $("#commentd").val(valuee.comentario);
                   $("#commentd").attr('readonly','readonly');
                break;
                case "86":
                  $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#5m").css('color','#497445');
                  $("#commente").val(valuee.comentario);
                   $("#commente").attr('readonly','readonly');
                break;
                case "85":
                  $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#6m").css('color','#497445');
                  $("#commentf").val(valuee.comentario);
                   $("#commentf").attr('readonly','readonly');
                break;
                case "84":
                  $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#7m").css('color','#497445');
                  $("#commentg").val(valuee.comentario);
                   $("#commentg").attr('readonly','readonly');
                break;
                case "83":
                  $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#9m").css('color','#497445');
                  $("#commenti").val(valuee.comentario);
                   $("#commenti").attr('readonly','readonly');
                break;
                case "82":
                  $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#10m").css('color','#497445');
                  $("#commentj").val(valuee.comentario);
                   $("#commentj").attr('readonly','readonly');
                break;
                case "81":
                  $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#11m").css('color','#497445');
                  $("#commentk").val(valuee.comentario);
                   $("#commentk").attr('readonly','readonly');
                break;
                case "80":
                  $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#12m").css('color','#497445');
                  $("#commentl").val(valuee.comentario);
                   $("#commentl").attr('readonly','readonly');
                break;
                case "79":
                  $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                  $("#13m").css('color','#497445');
                  $("#commentm").val(valuee.comentario);
                   $("#commentm").attr('readonly','readonly');
                break;
              default:
                break;


             }

           }else{
	         }  
	      });
	      }
	    });

	    }else if( g == "2" ){ ///
	  var tipo_de_persona =  $('#idP').val();
	      if( tipo_de_persona == "1" ){
	        $("#okava").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#okava").css('color','#348af9');
	  $("#okvc").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#okvc").css('color','#348af9');
	  $("#okfmr").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#okfmr").css('color','#348af9');
	  $("#f7").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f7").css('color','#348af9');
	  $("#f1").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f1").css('color','#348af9');
	  $("#f2").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f2").css('color','#348af9');
	  $("#f3").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f3").css('color','#348af9');
	  $("#f4").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f4").css('color','#348af9');
	  $("#f5").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f5").css('color','#348af9');
	  $("#f6").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#f6").css('color','#348af9');

	  $("#rep1").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	  $("#rep1").css('color','#348af9');


	  $("#fmcdown").css('display','none');
	  $("#avdown").css('display','none');
	  $("#codown").css('display','none');
	  $("#rep2").css('display','none');

	  $("#fff1").css('display','none');
	  $("#fff2").css('display','none');
	  $("#fff3").css('display','none');
	  $("#fff4").css('display','none');
	  $("#fff5").css('display','none');
	  $("#fff6").css('display','none');
	  $("#fff7").css('display','none');
	  $("#btnat").css('display','none');
	  $("#acuseG").css('display','none');
	  $("#acuseG22").css('display','none');


	      }else {
	        $("#okava").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	        $("#okava").css('color','#348af9');
	        $("#okvc").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	        $("#okvc").css('color','#348af9');
	        $("#okfmr").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#okfmr").css('color','#348af9');
	        $("#8m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#8m").css('color','#348af9');
	        $("#1m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#1m").css('color','#348af9');
	        $("#2m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#2m").css('color','#348af9');
	        $("#3m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#3m").css('color','#348af9');
	        $("#4m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#4m").css('color','#348af9');
	        $("#5m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#5m").css('color','#348af9');
	        $("#6m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#6m").css('color','#348af9');
	        $("#7m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
	        $("#7m").css('color','#348af9');
	        $("#rep1").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
	       $("#rep1").css('color','#348af9');

	        $("#fmcdown").css('display','none');
	        $("#avdown").css('display','none');
	        $("#codown").css('display','none');
	         $("#rep2").css('display','none');

	        $("#mmm1").css('display','none');
	        $("#mmm2").css('display','none');
	        $("#mmm3").css('display','none');
	        $("#mmm4").css('display','none');
	        $("#mmm5").css('display','none');
	        $("#mmm6").css('display','none');
	        $("#mmm7").css('display','none');
	        $("#mmm8").css('display','none');
	        $("#btnat").css('display','none');
	        $("#acuseG").css('display','none');
	       // $("#acuseG22").css('display','none');

	      }

	    }else {
	      console.log("error");
	    }

	  });
	    //vista Tipologias guardaR sin subir
	    var tipppx = $('#idP').val();
	    var dctx = $('#idG').val();
	    var xxx = axxxxxxxx;

	    $("#tipologs").html('');
	    $.post("../../../../../acceso",{acceess:73,idpers:tipppx,dictams:xxx,dctx:dctx},function(m){
	      console.log(m);
	     // alert(m);
	      $("#Ga").css('display','block');
	      //$("#tipologs").append('<tr>');
	      $.each( m, function( key, value ) {
	    var a = key + 1;
	      var cher = "";
	      var cher2 = "";
	      var html="";
	    if( value.comentario === null ){
	      cher = "";
	    }else{
	      cher = value.comentario;
	    }

	    if( value.comentario2 === null ){
	      cher2 = "";
	    }else{
	      cher2 = value.comentario2;
	    }
	    //j.id as id_docx,nombredoc,orden,comentario tipologias cambio
	    //"https://dictamunigecem.edomex.gob.mx/files/documentos/00227/1210450408000000/Avaluos.val"
	    //$("#tipologs").append('<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/><td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> <a onclick=ok('+value.id_docx+')>Tipologia' + a + '</a></td><td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="subiryeditar('+ value.id_docx +')"></i></td><input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#1fce10;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher +'</textarea></td></tr>tr>');
	    html =
	      '<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
	      '<td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td>' +
	      '<td>Tipologia' + a + '</td><td> <a onclick=ok_down('+value.id_docx+')><i class="fa fa-download fa-2x" style="margin-top: 10px; cursor: pointer;" title="Descargar archivo"></i></a></td>' +
	      '<td align="center"><i class="fa fa-upload fa-2x" title="Editar Archivo" style="margin-top: 10px; cursor: pointer;"' +
	       'onclick="subiryeditar('+ value.id_docx +')"></i></td>' +
	       '<input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12">' +
	       '<td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#497445; margin-top: 10px;"></i></div></td>';
	    if(value.etapa == 3) {

	    $("#tipologs").append( html + '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher +'</textarea></td></tr>');

	  }else if (value.etapa == 11) {

	    $("#tipologs").append(html +  '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher2 +'</textarea></td></tr>');

	    $("#acuseG").css('display','none');
	    //$("#acuseG22").css('display','block');
	    $("#observacionGral").html('<h5>OBSERVACIONES GENERALES: '+value.obs_rev+'</h5>'); 
	    
	  } if (value.etapa == 1) {

	    $("#tipologs").append(html +  '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher2 +'</textarea></td>' + '<td style="color: black;" align="center"><input type="button" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" id="dropp" name="dropp" class="btn" value="Eliminar"  onclick="deletex(' + value.id_docx + ');"></td></tr>');

	    $("#acuseG").css('display','block');

	  }else{
	    // $("#acuseG").css('display','block');
	   // $("#acuseG22").css('display','none');
	  }


	  if(value.etapa == 5 || value.etapa == 53) {

		     htmll =
		      '<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
		      '<td style="display:none;">' + value.id_docx + '</td>'+
		      '<td>' + a + '</td>' +
		      '<td>Tipologia' + a + '</td>'+
		      '<td></td>' +
		      '<td align="center"></td>' +
		      '<input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12">' +
		      '<td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#497445; margin-top: 10px;"></i></div></td>';


		     htmll =
		      '<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
		      '<td style="display:none;">' + value.id_docx + '</td>'+
		      '<td>' + a + '</td>' +
		      '<td>Tipologia' + a + '</td>' +
		      '<td> </td>'+
		      '<td> </td>'+
		      '<input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12">' +
		      '<td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#497445;margin-top: 10px;"></i></div></td>';
		   
		    $("#tipologs").append( htmll + '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep" readonly="" cols="50" style="margin-top: 10px;">'+ cher +'</textarea></td></tr>');

		  }


	  });
	     // $("#tipologs").append('</tr>');
	  //despliega en automatico el btn de guardar
	  //$("#acuseG").css('display','block');
	    });   
	}


function guardarBaldioCambios(){

     var claveCat = $("#idG").val(); 
    var folio = $("#idGRec").val(); //folio con ceros antes.
    var t = $("#idP").val();

    
 
    var folio2 = folio.replace(/^(0+)/g, '');


    if( t  == "1"){ //Persona fisica

     var avaluofirmado = $('#commentfmc').val(); //formato avaluo firmado
     var dictaval = $('#commentav').val(); //archivo dictaval .val
     var construcciones = $('#commentcx').val(); //archivo contrucciones .val 
     var escriturap = $('#1commenta').val(); //escritura publica
     var boletapredial = $('#1commentb').val(); // boleta predial
     var acreditapropied = $('#1commenth').val(); //doc q acredite la propiedad
     var idenoficial = $('#1commentc').val(); //identificacion oficial
     var medidascolindanc = $('#1commentd').val(); //medidad y colindancias
     var croquislocaliz = $('#1commente').val(); // creoquis de localizacion
     var otros = $('#1commentf').val(); //otros
     var indivisoscondominios = $('#1commentg').val(); //indivisos y condominio
     var croquisconstruccion = $('#1commenti').val(); //plano arq. o croquis de construccion
     var usoprivativo = $('#1commentj').val(); //uso privativo
     var superficiesconstru = $('#1commentk').val(); //superficies constructivas
     var planosfactores = $('#1commentl').val(); // planos de factores
     var fachada = $('#comenfachada').val(); // fachada

     $.post("../../../../../acceso",{acceess:19,claveCat:claveCat,folio2:folio2,
            avaluofirmado :avaluofirmado, 
            dictaval :dictaval, 
            construcciones :construcciones, 
            escriturap :escriturap, 
            boletapredial :boletapredial, 
            acreditapropied :acreditapropied, 
            idenoficial:idenoficial,
            medidascolindanc:medidascolindanc,
            croquislocaliz :croquislocaliz, 
            otros:otros,
            indivisoscondominios :indivisoscondominios, 
            croquisconstruccion :croquisconstruccion, 
            usoprivativo :usoprivativo, 
            superficiesconstru:superficiesconstru,
            planosfactores :planosfactores, 
            fachada:fachada},function(z){
              console.log(z); 
             if (z == "50") {
              document.getElementById('id08').style.display='block';
            $("#id08").fadeOut(8000); 
            document.getElementById('prediosCla').style.display='none';


               var abc = $("#idGRec").val();
    var a = {acceess:52,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: a,
      //contentType: false,
      //cache: false,
      //processData:false,
      success: function(e)
      {
        if( e == "10" ){
          console.log(e);
        }else{
          console.log(e);
        }

      }
    });



var b = {acceess:53,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: b,
      success: function(ee)
      {
        if( ee == "10" ){
          console.log(ee);
        }else{
          console.log(ee);
        }

      }
    });


 var c = {acceess:54,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: c,
      success: function(i)
      {
        if( i == "10" ){
          console.log(i);
        }else{
          console.log(i);
        }

      }
    });

                 location.reload();
              }else if (z == "000") {
                document.getElementById('id07').style.display='block';

              }
            
        
      });


    }else if (t == "2") { //Persona moral

       var avaluofirmadoM = $('#commentfmc').val(); //formato avaluo firmado
     var dictavalM = $('#commentav').val(); //archivo dictaval .val
     var construccionesM = $('#commentcx').val(); //archivo contrucciones .val  

     var actaempresa = $('#commenta').val(); //Acta Constitutiva de la Empresa  
     var nombramientolegal = $('#commentb').val(); // Nombramiento del Representante legal  
     var boleta = $('#commentc').val(); //Boleta Predial  

     var acreditapropiedadM = $('#commenti').val(); //Documento que acredite la propiedad
     var idenoficialM = $('#commentd').val(); //Identificación Oficial del propietario o representante legal
     var medidascolindancM = $('#commente').val(); // Planos ó Croquis de terreno (medidas y colindancias)

     var croquislocalizM = $('#commentf').val(); //Croquis de Localización  
     var otrosM = $('#commentg').val(); //otros
     var indivisoscondominiosM = $('#commenth').val(); //Relación de indivisos de Condominio
     var croquisconstruccionM = $('#commentj').val(); //Plano arquitectónico o croquis de construcción

     var usoprivativoM = $('#commentk').val(); //Plano arquitectónico contenido edificaciones de su uso privativo
     var superficiesconstruM = $('#commentl').val(); //Plano del conjunto donde señalan las deferentes superficies constructivas
     var planosfactoresM = $('#commentm').val();//Planos de Factores  
     var fachadaM = $('#comenfachada').val(); // fachada

     $.post("../../../../../acceso",{acceess:18,claveCat:claveCat,folio2:folio2,
            avaluofirmadoM:avaluofirmadoM, 
            dictavalM:dictavalM, 
            construccionesM:construccionesM, 
            actaempresa:actaempresa, 
            nombramientolegal:nombramientolegal, 
            boleta:boleta, 
            acreditapropiedadM:acreditapropiedadM,
            idenoficialM:idenoficialM,
            medidascolindancM:medidascolindancM, 
            croquislocalizM:croquislocalizM,
            otrosM:otrosM, 
            indivisoscondominiosM:indivisoscondominiosM, 
            croquisconstruccionM:croquisconstruccionM, 
            usoprivativoM:usoprivativoM,
            superficiesconstruM:superficiesconstruM, 
            planosfactoresM:planosfactoresM,
            fachadaM:fachadaM},function(z){
              console.log(z); 
              if (z == "50") {
              document.getElementById('id08').style.display='block';
            $("#id08").fadeOut(8000); 
            document.getElementById('prediosCla').style.display='none';


             var abc = $("#idGRec").val();
    var a = {acceess:52,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: a,
      //contentType: false,
      //cache: false,
      //processData:false,
      success: function(e)
      {
        if( e == "10" ){
          console.log(e);
        }else{
          console.log(e);
        }

      }
    });



var b = {acceess:53,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: b,
      success: function(ee)
      {
        if( ee == "10" ){
          console.log(ee);
        }else{
          console.log(ee);
        }

      }
    });


 var c = {acceess:54,abc:abc,ky:claveCat};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: c,
      success: function(i)
      {
        if( i == "10" ){
          console.log(i);
        }else{
          console.log(i);
        }

      }
    });
    
                 location.reload();
              }else if (z == "000") {
                document.getElementById('id07').style.display='block';

              }
           
            
        
      });

    }


} 

function deletex(lav){

  var a1 = $('#idGRec').val();
  var a2 = $('#cvec').val();
  //name_file
  var a3 = $('#'+  lav).val();

  var anio = $("#anioDic").val();

  //$('#G tbody tr').each(function() {
      //var _order = $(this).find('td').eq(0).text();

      //console.log( "https://dictamunigecem.edomex.gob.mx/files/motor_deletefile/" + a1 + "/" + a2 + "/" + _order + "/" + a3 );
      location.href = "http://localhost/dictamun/files/motor_deletefile/"+ anio +"/" + a1 + "/" + a2 + "/" + lav + "/" + a3;


      
   // });

   
  
  
  

}

function ok_down(xxxxxx) {
   


  //href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+ dctx +'/'+ xxx+ '"
  var a1 = $('#idGRec').val();
  var a2 = $('#cvec').val();
  //alert(a1 + "///" + a2);
  var a3 = $('#'+  xxxxxx).val();


  location.href = "https://dictamunigecem.edomex.gob.mx/files/documentos/" + a1 + "/" + a2 + "/" + a3;


}


function ok() {
   location.reload();
}

function ok1() {
    location.href="../SeguimientoDictamen/0";
}

function guardarCambiosTip(){
   var ky = $("#idG").val();
    var t = $("#idP").val();

    if( t  == "1"){
      //

      var com1ac = $("#descpAc").val();


      var com1av = $("#commentav").val();
      var com2co = $("#commentcx").val();
      var com14co = $("#commentfmc").val();


      var com1 = $("#1commenta").val();
      var com2 = $("#1commentb").val();
      var com3 = $("#1commentc").val();
      var com4 = $("#1commenth").val();//doc acredite propiedad
      var com5 = $("#1commente").val();
      var com6 = $("#1commentf").val();//otros
      var com7 = $("#1commentg").val();//Indivisos de condominio
      var com8 = $("#1commentd").val();//Planos o croquis terreno
      var com9 = $("#1commenti").val();//planos arquitectonicos o croquis de construccion
      var com10 = $("#1commentj").val();//edificaciones
      var com11 = $("#1commentk").val();//Plano del conjunto
      var com12 = $("#1commentl").val();//Planos de factores
    //traer todas las tipologias
    //para seleccionar una opcion

    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#idG").val();
    var iddoc = 12;
    var comentario = $(this).find('textarea').val();
      var clfol = $("#idGRec").val();
  //var a = key + 1;
   pahtv_t.vector_t.push({
     folio : clfol,
      id_inmu : idinmu,
      id_doc: iddoc,
      tipolg_n : a,
      comentario : comentario
  });


    });
   // console.log(pahtv_t.vector_t);
      $.post("../../../../../acceso",{acceess:21,idG:ky ,
         descpAc:com1ac,
         commentav:com1av,
         commentcx:com2co,
         commentfmc:com14co,
         commenta:com1,
         commentb:com2,
         commentc:com3,
         commentd:com4,
         commente:com5,
         commentf:com6,
         commentg:com7,
         commentg8:com8,
         commentg9:com9,
         commentg10:com10,
         commentg11:com11,
         commentg12:com12,
        tipologg:pahtv_t.vector_t},function(z){
          // console.log(z);

        if( z == "50" ){
        //  console.log("datos guardados");
          document.getElementById('id05').style.display='block'; 


        }else{

        //  console.log("error");
        console.log('faltan archivos por subir');
        document.getElementById('id05').style.display='block';
        }
      });

    }else{
      var ky = $("#idG").val();
      var com1ac = $("#descpAc").val();

      var com1av = $("#commentav").val();
      var com2co = $("#commentcx").val();

      var com14co = $("#commentfmc").val();

      var com1 = $("#commenta").val();
      var com2 = $("#commentb").val();
      var com3 = $("#commentc").val();
      var com4 = $("#commentd").val();
      var com5 = $("#commente").val();
      var com6 = $("#commentf").val();
      var com7 = $("#commentg").val();//otros
      var com8 = $("#commenth").val();//indivisos
      var com9 = $("#commenti").val();//doc acredite propiedad
      var com10 = $("#commentj").val();//croquis construccion
      var com11 = $("#commentk").val();//edificaciones de uso privativo
      var com12 = $("#commentl").val();//superficies construcctivas
      var com13 = $("#commentm").val();//planos de factores
      
      //var com8 = $("#commentrep").val();
          //traer todas las tipologias
    //para seleccionar una opcion

    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      console.log('Comentarios');
      console.log(a);
      var idinmu = $("#idG").val();
    var iddoc = 12;
    var comentario = $(this).find('textarea').val();
   var clfol = $("#idGRec").val();
  //var a = key + 1;
   pahtv_t.vector_t.push({
     folio : clfol,
      id_inmu : idinmu,
      id_doc: iddoc,
      tipolg_n : a,
      comentario : comentario
  });


    });
    //console.log(pahtv_t.vector_t);

      $.post("../../../../../acceso",{acceess:20,idG:ky ,
         descpAc:com1ac,
         commentav:com1av,
         commentcx:com2co,
         commentfmc:com14co,
         commenta:com1,
         commentb:com2,
         commentc:com3,
         commentd:com4,
         commente:com5,
         commentf:com6,
         commentg:com7,
         commenth:com8,
         commenth9:com9,
         commenth10:com10,
         commenth11:com11,
         commenth12:com12,
         commenth13:com13,
         tipologg:pahtv_t.vector_t
         },function(z){
          // console.log(z);
        if( z == "50" ){
          console.log("datos guardados");
        //  document.getElementById('id05').style.display='block';
           document.getElementById('alertas2').style.display='block';

           $("#alertas2").fadeOut(9000); 
          document.getElementById('guardarCambiosTip').style.display='none';
          document.getElementById('btnat').style.display='none';

              $("#fmcdown").css('display','none');  //14
              $("#avdown").css('display','none');  // 10
              $("#codown").css('display','none'); // 11
              $("#mmm1").css('display','none');  //90
              $("#mmm2").css('display','none');  //89
              $("#mmm3").css('display','none');  //88
              $("#mmm4").css('display','none');  // 87
              $("#mmm5").css('display','none');  //86 medidas y colindancias
              $("#mmm6").css('display','none');  //85
              $("#mmm7").css('display','none');  //84
              $("#mmm8").css('display','none');  //15
              $("#mmm9").css('display','none');  // 83
              $("#mmm10").css('display','none'); // 82
              $("#mmm11").css('display','none'); // 81
              $("#mmm12").css('display','none'); // 80
              $("#mmm13").css('display','none'); // 79
                
              $("#rep2").css('display','block');  // 120


          //$("#acuseG").css('display','none');
        }else{
          console.log(z);
          console.log("faltan datos-error");
          document.getElementById('id07').style.display='block';
        }
      });


    }



    var abc = $("#idGRec").val();
    var a = {acceess:52,abc:abc,ky:ky};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: a,
      //contentType: false,
      //cache: false,
      //processData:false,
      success: function(e)
      {
        if( e == "10" ){
          console.log(e);
        }else{
          console.log(e);
        }

      }
    });

    var b = {acceess:53,abc:abc,ky:ky};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: b,
      success: function(ee)
      {
        if( ee == "10" ){
          console.log(ee);
        }else{
          console.log(ee);
        }

      }
    });

    var c = {acceess:54,abc:abc,ky:ky};
    $.ajax({
      url: "../../../../../acceso",
      type: "POST",
      data: c,
      success: function(i)
      {
        if( i == "10" ){
          console.log(i);
        }else{
          console.log(i);
        }

      }
    });


}



function guardarBaldio1(){
    document.getElementById('idGuardarBaldio1').style.display='block';
}

function acuseG1(){
    document.getElementById('idGuardarTipologia1').style.display='block';
}
function guardarFolioDic(){
	   var folioDic = $("#folioDictaval").val();
	   var clavec = $("#idG").val();  //clave catastral
	   var folio = $("#idGRec").val();  //folio dictamun
	   var anio = $("#anioDic").val();  //año 
	   //alert(folioDic); 
	   $("#descripcionModal").html("");

	   if (folioDic == null || folioDic=="") {
	    //mensaje de campo vacio
	   // document.getElementById('folMal').style.display='block';
	    $("#descripcionModal").html("");
	    $("#descripcionModal").append('<p>Error al registrar folio, no deje el campo vacio.</p>')
	   }else{
	    //guardar folio
	     $.post("../../../../../acceso",{acceess:12,folioDic:folioDic,clavec:clavec,folio:folio,anio:anio},function(m){
	    
	    if (m == "1") {
	          //registro bien
	         // document.getElementById('folBien').style.display='block';
	          $("#descripcionModal").html("");
	          $("#descripcionModal").append('<p>Folio registrado correctamente</p>');
	          $("#bFolio").append('<button type="button" class="btn btn-primary" onclick="folioDicBn();">OK</button>');
	        }else{
	          //registro mal
	        //  document.getElementById('folMal').style.display='block';
	        $("#descripcionModal").html(""); 
	         $("#descripcionModal").append('<p>Error al registrar folio, intente de nuevo</p>');
	          $("#bFolio").append('<button type="button" class="btn btn-primary" data-dismiss="modal"></button>');

	        }
	       $("#descripcionModal").append("");

	    });
	  
	   } 
	}

function folioDicBn(){
  
   location.href="../../../../SeguimientoDictamenNOGREEN/10";
 //  document.getElementById('guardarFolio').style.display='none'; 

}

