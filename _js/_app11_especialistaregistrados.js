
$(document).ready(function () {

	$("#combofisico").css('display','none');
		$("#combomoral").css('display','none');



	//datosgenerales del dictamenbad

	var lr = $("#idG").val();  //clave catastral
  var anio = $("#anioDic").val();
  var gva = $("#gva").val();
  
	/*$.post("../../../../acceso",{ acceess:69,lr:lr },function(v){
		$(v).each(function(key,valuee){

			$('#n_inm').val(valuee.id);
			$('#cvec').val(valuee.cve_catastral);
		});
	});*/
	$.post("../../../../../acceso",{ acceess:51,lr:lr,anio:anio,folio:gva},function(zm){
    //console.log(zm);
    if(zm == "0000"){
      /// console.log("devolver vista");

    }else{
      $(zm).each(function(key,valuee){
        
        $("#etapa").val(valuee.etapa); 
        document.getElementById('btnoss').style.display='block';

     if (valuee.etapa == 1 && valuee.baldio == 'f') {
       
           //document.getElementById('acuseG').style.display='block';
           //document.getElementById('prediosCla').style.display='none';
           //document.getElementById('documentacion').style.display='block';

        }else if (valuee.etapa == 15) {
       
        //   document.getElementById('acuseG').style.display='none'; 
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





      
      	if (valuee.tipopersona == 1) { // fisica
      		
      		$("#combofisico").css('display','block');
      		$("#combomoral").css('display','none');
      		
      		
      		$("#descripcionSer").css('display','none');
			$('#nomC').val(valuee.nombredenominacion +" "+ valuee.apaterno +" "+ valuee.amaterno );
			$('#rfcC').val(valuee.rrfcontri);
			$('#curpC').val(valuee.curpcontrib);
			$('#telefonoC').val(valuee.telefono);
			$('#correoC').val(valuee.email);
      	}else if (valuee.tipopersona==2) { // Moral
      		$("#combofisico").css('display','none');
      		$("#combomoral").css('display','block');
      		
      		 $("#curpC2").css('display','none');
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
      
      /*
  	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
  	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
  	y
  	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
  	*/
  	var b = $("#idGRec").val(); // folio
  	var c = $("#cvec").val(); // claves
  	
  	$("#xcod").css("display","none");
  	$("#tipolgis").css("display","none");
  	$("#avg1").css("display","none");
  	
  	validacion_para_recargar(valuee.folr,$("#idG").val());

      $('#idP').val(valuee.tipopersona);
      //document.getElementById('acuseG').style.display='none';
      



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
		}


		});

	//*pre rechazo..
  /*$("#acuseG22").click(function(){
//alert('okoko');
   var folioDic = $("#idG").val();

  $.post("../../../../acceso",{acceess:32,folioDic:folioDic},function(m){
    console.log(m);
    location.href="../SeguimientoDictamen/0";

  });


  });*/

	

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
      $.post("../../../../acceso",{acceess:55,idG:ky ,
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

      $.post("../../../../acceso",{acceess:56,idG:ky ,
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
            //document.getElementById('acuseG').style.display='none';
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
    //document.getElementById('acuseG').style.display='none';
  //document.getElementById('acuseG22').style.display='none';
    
}
function construccion(){
  //alert('construccion');
  document.getElementById('documentacion').style.display='block';
  document.getElementById('reporteFot').style.display='block';
  document.getElementById('guardarBaldio').style.display='none';
  document.getElementById('fachada').style.display='none';
  document.getElementById('btnoss').style.display='block';
  //document.getElementById('acuseG').style.display='block';


}
function guardarBaldio(){
    var claveCat = $("#idG").val(); 
    var folio = $("#idGRec").val(); //folio con ceros antes.
    var t = $("#idP").val();
    //document.getElementById('acuseG').style.display='none';

    
 
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

     $.post("../../../../acceso",{acceess:23,claveCat:claveCat,folio2:folio2,
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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

     $.post("../../../../acceso",{acceess:22,claveCat:claveCat,folio2:folio2,
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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

     $.post("../../../../acceso",{acceess:19,claveCat:claveCat,folio2:folio2,
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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

     $.post("../../../../acceso",{acceess:18,claveCat:claveCat,folio2:folio2,
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      $.post("../../../../acceso",{acceess:21,idG:ky ,
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

      $.post("../../../../acceso",{acceess:20,idG:ky ,
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
      url: "../../../../acceso",
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
     $.post("../../../../acceso",{acceess:16,folioDic:folioDic,clavec:clavec,folio:folio,anio:anio},function(m){
    
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
  
   location.href="../dictamenesPreautorizados/";
 //  document.getElementById('guardarFolio').style.display='none'; 

}







/* ME QUEDE EN QUE SE IBA A REPARAR LOS ROUTE PARA QUE FUNCIONEN LAS FUNCIONES DE GUARDAR TIPOLOGIAS, Y ARCHIVOS */





function documentosXfiles(a,b,c){
    $("#file1").html('');
    $("#file2").html('');
    $("#file3").html('');
    
    $("#file4").html('');
    $("#file5").html('');
    $("#file6").html('');

    $("#file7").html('');
    $("#file8").html('');
    $("#file9").html('');


    $("#file10").html('');
    $("#file11").html('');
    $("#file12").html('');

    $("#file13").html('');
    $("#file14").html('');
    $("#file15").html('');

    $("#file16").html('');
    $("#file17").html('');
    $("#file18").html('');

    $("#file19").html('');
    $("#file20").html('');
    $("#file21").html('');

    $("#file22").html('');
    $("#file23").html('');
    $("#file24").html('');

    $("#file25").html('');
    $("#file26").html('');
    $("#file27").html('');


    $("#file28").html('');
    $("#file29").html('');
    $("#file30").html('');

    $("#file31").html('');
    $("#file32").html('');
    $("#file33").html(''); 
    $("#file34").html('');     
    
    
    
    $("#file1delete").html('');
    $("#file2delete").html('');
    $("#file3delete").html('');
    $("#file4delete").html('');
    $("#file5delete").html('');
    $("#file6delete").html('');
    $("#file7delete").html('');
    $("#file8delete").html('');
    $("#file9delete").html('');
    $("#file10delete").html('');

    $("#file11delete").html('');
    $("#file12delete").html('');
    $("#file13delete").html('');
    $("#file14delete").html('');
    $("#file15delete").html('');
    $("#file16delete").html('');
    $("#file17delete").html('');
    $("#file18delete").html('');
    $("#file19delete").html('');
    $("#file20delete").html('');


    $("#file21delete").html('');
    $("#file22delete").html('');
    $("#file23delete").html('');
    $("#file24delete").html('');
    $("#file25delete").html('');
    $("#file26delete").html('');
    $("#file27delete").html('');
    $("#file28delete").html('');
    $("#file29delete").html('');
    $("#file30delete").html('');



    $("#file31delete").html('');
    $("#file32delete").html('');
    $("#file33delete").html('');
    $("#file34delete").html('');
    
    
    $("#file4deletefisicopredioconstruido").html('');
    
    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	var anixxo = $("#anioDic").val();
    $.post("../../../../../acceso",{acceess:333, tipopre:a , dictams:b, dctx:c, anixxo:anixxo },function(m){
    	//console.log(m);
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



    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	if( $("#prebaldio").val()  == "100" ){
				

    //if( a == "1" ){
        
    // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica

    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file1").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file1delete").html(html1_1);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file2").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file2delete").html(html1_1);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file3").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file3delete").html(html1_1);
    }
    if( value.orden == "99"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file4").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file4delete").html(html1_1);
    }
    if( value.orden == "98"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file5").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file5delete").html(html1_1);
    }
    if( value.orden == "83"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file6").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file6delete").html(html1_1);
    }
    if( value.orden == "97"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file7").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file7delete").html(html1_1);
    }
    if( value.orden == "96"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file8").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file8delete").html(html1_1);
    }
    if( value.orden == "95"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file9").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file9delete").html(html1_1);
    }

    if( value.orden == "82"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file10").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file10delete").html(html1_1);
    }
    if( value.orden == "81"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file11").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file11delete").html(html1_1);
    }
    if( value.orden == "80"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file12").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file12delete").html(html1_1);
    }
    if( value.orden == "79"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file13").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file13delete").html(html1_1);
    }
    if( value.orden == "15"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file14").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
    $("#file14delete").html(html1_1);
    }
    if( value.orden == "94"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file15").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
    $("#file15delete").html(html1_1);
    }


    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file16").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file16delete").html(html1_1);
        }
 // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica


    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/
	
    }else if( $("#preconstruido").val() == "100" ){





    	 if( value.orden == "99"){
    	        
    	    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    	        $("#file4fisicopredioconstruido").html(html1);

    	        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    	        $("#file4deletefisicopredioconstruido").html(html1_1);
    	    }



        
        
 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral
    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file18").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file18delete").html(html1_1);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file19").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file19delete").html(html1_1);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file20").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file20delete").html(html1_1);
    }
    
    if( value.orden == "90"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file21").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file21delete").html(html1_1);
    }
    if( value.orden == "89"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file22").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file22delete").html(html1_1);
    }
    if( value.orden == "88"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file23").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file23delete").html(html1_1);
    }
    if( value.orden == "87"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file25").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file25delete").html(html1_1);
    }
    if( value.orden == "86"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file26").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file26delete").html(html1_1);
    }
    if( value.orden == "85"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file27").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file27delete").html(html1_1);
    }
    if( value.orden == "84"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file28").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file28delete").html(html1_1);
    }
    if( value.orden == "15"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file29").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file29delete").html(html1_1);
    }
    if( value.orden == "78"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file24").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        //,' + value.clavecastatral + ',' + value.folix
        $("#file24delete").html(html1_1);
    }
    if( value.orden == "77"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file30").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file30delete").html(html1_1);
    }
    if( value.orden == "76"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file31").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file31delete").html(html1_1);
    }
    if( value.orden == "75"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file32").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file32delete").html(html1_1);
    }
    if( value.orden == "74"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file33").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file33delete").html(html1_1);
    }
    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file34").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file34delete").html(html1_1);
        }








    

    }else{
        console.log("error de logica de tipo de predio baldio o construido");
    }

 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral  


  });
   
    });  
	
}



function documentosXfilmoralpredios(a,b,c){
    $("#filebaldiom1").html('');
    $("#filebaldiom2").html('');
    $("#filebaldiom3").html('');
    
    $("#filebaldiom4").html('');
    $("#filebaldiom5").html('');
    $("#filebaldiom6").html('');

    $("#filebaldiom7").html('');
    $("#filebaldiom8").html('');
    $("#filebaldiom9").html('');


    $("#filebaldiom10").html('');
    $("#filebaldiom11").html('');
    $("#filebaldiom12").html('');

    $("#filebaldiom13").html('');
    $("#filebaldiom14").html('');
    $("#filebaldiom15").html('');

    $("#filebaldiom16").html('');
    $("#filebaldiom17").html('');
    $("#filebaldiom18").html('');

    $("#filebaldiom19").html('');
    $("#filebaldiom20").html('');
    $("#filebaldiom21").html('');

    $("#filebaldiom22").html('');
    
    $("#filebaldiom21xtr").html('');

    $("#filebaldiom22xtr").html('');
    
    $("#filebaldiom23").html('');
    $("#filebaldiom24").html('');

    $("#filebaldiom25").html('');
    $("#filebaldiom26").html('');
    $("#filebaldiom27").html('');


    $("#filebaldiom28").html('');
    $("#filebaldiom29").html('');
    $("#filebaldiom30").html('');

    $("#filebaldiom31").html('');
    $("#filebaldiom32").html('');
    $("#filebaldiom33").html(''); 
    $("#filebaldiom34").html('');     
    
    
    
    $("#filebaldiom1delete").html('');
    $("#filebaldiom2delete").html('');
    $("#filebaldiom3delete").html('');
    $("#filebaldiom4delete").html('');
    $("#filebaldiom5delete").html('');
    $("#filebaldiom6delete").html('');
    $("#filebaldiom7delete").html('');
    $("#filebaldiom8delete").html('');
    $("#filebaldiom9delete").html('');
    $("#filebaldiom10delete").html('');

    $("#filebaldiom11delete").html('');
    $("#filebaldiom12delete").html('');
    $("#filebaldiom13delete").html('');
    $("#filebaldiom14delete").html('');
    $("#filebaldiom15delete").html('');
    $("#filebaldiom16delete").html('');
    $("#filebaldiom17delete").html('');
    $("#filebaldiom18delete").html('');
    $("#filebaldiom19delete").html('');
    $("#filebaldiom20delete").html('');


    $("#filebaldiom21delete").html('');
    $("#filebaldiom22delete").html('');
    
    $("#filebaldiom21deletextr").html('');
    $("#filebaldiom22deletextr").html('');
    
    
    $("#filebaldiom23delete").html('');
    $("#filebaldiom24delete").html('');
    $("#filebaldiom25delete").html('');
    $("#filebaldiom26delete").html('');
    $("#filebaldiom27delete").html('');
    $("#filebaldiom28delete").html('');
    $("#filebaldiom29delete").html('');
    $("#filebaldiom30delete").html('');



    $("#filebaldiom31delete").html('');
    $("#filebaldiom32delete").html('');
    $("#filebaldiom33delete").html('');
    $("#filebaldiom34delete").html('');
    
    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	var anixxo = $("#anioDic").val();
    $.post("../../../../../acceso",{acceess:333, tipopre:a , dictams:b, dctx:c, anixxo:anixxo },function(m){
    	//console.log(m);
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



    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	if( $("#prebaldiommm").val()  == "100" ){
				

    //if( a == "1" ){
        
    // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica

    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom1").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom1delete").html(html1_1);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom2").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom2delete").html(html1_1);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom3").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom3delete").html(html1_1);
    }
    if( value.orden == "99"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom4").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom4delete").html(html1_1);
    }
    if( value.orden == "98"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom5").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom5delete").html(html1_1);
    }
    if( value.orden == "83"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom6").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom6delete").html(html1_1);
    }
    if( value.orden == "97"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom7").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom7delete").html(html1_1);
    }
    if( value.orden == "96"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#filebaldiom8").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#filebaldiom8delete").html(html1_1);
    }
    if( value.orden == "95"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#filebaldiom9").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#filebaldiom9delete").html(html1_1);
    }

    if( value.orden == "82"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom10").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom10delete").html(html1_1);
    }
    if( value.orden == "81"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#filebaldiom11").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#filebaldiom11delete").html(html1_1);
    }
    if( value.orden == "80"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#filebaldiom12").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#filebaldiom12delete").html(html1_1);
    }
    if( value.orden == "79"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom13").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#filebaldiom13delete").html(html1_1);
    }
    if( value.orden == "15"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#filebaldiom14").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
    $("#filebaldiom14delete").html(html1_1);
    }
    if( value.orden == "94"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#filebaldiom15").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
    $("#filebaldiom15delete").html(html1_1);
    }


    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom16").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#filebaldiom16delete").html(html1_1);
        }
    
    
    
if( value.orden == "90"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom21").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom21delete").html(html1_1);
        
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom21xtr").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom21deletextr").html(html1_1);
        
        
        
    }
    if( value.orden == "89"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom22").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom22delete").html(html1_1);
        
        html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom22xtr").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom22deletextr").html(html1_1);
        
    }
    
 // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica


    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/
	
    }else if( $("#preconstruidomx").val() == "100" ){









        
        
 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral
    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom18").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom18delete").html(html1_1);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom19").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom19delete").html(html1_1);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom20").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom20delete").html(html1_1);
    }
    
    if( value.orden == "90"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom21").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom21delete").html(html1_1);
        
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom21xtr").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom21deletextr").html(html1_1);
        
        
        
    }
    if( value.orden == "89"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom22").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom22delete").html(html1_1);
        
        html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom22xtr").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom22deletextr").html(html1_1);
        
    }
    if( value.orden == "88"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom23").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom23delete").html(html1_1);
    }
    if( value.orden == "87"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom25").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#filebaldiom25delete").html(html1_1);
    }
    if( value.orden == "86"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom26").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#filebaldiom26delete").html(html1_1);
    }
    if( value.orden == "85"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom27").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom27delete").html(html1_1);
    }
    if( value.orden == "84"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom28").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom28delete").html(html1_1);
    }
    if( value.orden == "15"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom29").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom29delete").html(html1_1);
    }
    if( value.orden == "78"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom24").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        //,' + value.clavecastatral + ',' + value.folix
        $("#filebaldiom24delete").html(html1_1);
    }
    if( value.orden == "77"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom30").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom30delete").html(html1_1);
    }
    if( value.orden == "76"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom31").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom31delete").html(html1_1);
    }
    if( value.orden == "75"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom32").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom32delete").html(html1_1);
    }
    if( value.orden == "74"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom33").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#filebaldiom33delete").html(html1_1);
    }
    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#filebaldiom34").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar" onclick="deletedocsmmmx(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#filebaldiom34delete").html(html1_1);
        }








    

    }else{
        console.log("error de logica de tipo de predio baldio o construido");
    }

 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral  


  });
   
    });  
	
}

function deletedocs(id_docx,aniodicta){
	//,cclave,idfolxavg
	

	
	  //var a1 = idfolxavg; //
	  
	  var a2 = $("#cclv").val(); //
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#idGRec").val(); //

	  var tipopweronsa = $("#tipopersona").val();

	  
	  $.post("../../../../../fil/elimfilesone/",{tipopersona:tipopweronsa,nombrefile:id_docx2,idfile:id_docx,clavecat:a2,foliodictamen:a1,oina:anio},function(m){
		  //console.log(m);
		  if( m == "100" ){
			    var b = a1; // folio
				var c = a2; // claves
							
				documentosXfiles(1,b,c);
			  
			  
		  }else if( m == "0" ){
			  console.log('error no se pudo subir archivo');
		  }else{
			  console.log('error de servidor');  
		  }
	  });
	   
	  
	  
	  

	}


function deletedocsmmmx(id_docx,aniodicta){
	//,cclave,idfolxavg
	

	
	  //var a1 = idfolxavg; //
	  
	  var a2 = $("#cclv").val(); //
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#idGRec").val(); //

	  var tipopweronsa = $("#tipopersona").val();

	  
	  $.post("../../../../../fil/elimfilesone/",{tipopersona:tipopweronsa,nombrefile:id_docx2,idfile:id_docx,clavecat:a2,foliodictamen:a1,oina:anio},function(m){
		  //console.log(m);
		  if( m == "100" ){
			    var b = a1; // folio
				var c = a2; // claves
							
				documentosXfilmoralpredios(1,b,c);
			  
			  
		  }else if( m == "0" ){
			  console.log('error no se pudo subir archivo');
		  }else{
			  console.log('error de servidor');  
		  }
	  });
	   
	  
	  
	  

	}



/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function documentosX(a,b,c){
    $("#tipologs").html('');
    $.post("../../../../../acceso",{acceess:444,idpers:a,dictams:b,dctx:c},function(m){
    	//console.log(m);
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
    html =
      '<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
      '<td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td>' +
      '<td>Tipologia' + a + '</td><td> <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a id="'+ value.id_docx +'" href=" https://dictamunigecem.edomex.gob.mx/files/documentos/'+ b +'/'+ c +'/'+ value.nombredoc +'">' + value.nombredoc + '</a> </td>';

    $("#tipologs").append( html + '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher +'</textarea>' +
    		'<td><input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;"  name="dropp" class="btn btn-danger" value="Eliminar"  onclick="deletex(' + value.id_docx +','+ value.aniodictamen + ');"></td></tr>');
   


  });
   
    });  
	
}

function documentosbprediosmoralX(a,b,c){
    $("#tipologs").html('');
    $.post("../../../../../acceso",{acceess:444,idpers:a,dictams:b,dctx:c},function(m){
    	//console.log(m);
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
    html =
      '<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
      '<td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td>' +
      '<td>Tipologia' + a + '</td><td> <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a id="'+ value.id_docx +'" href=" https://dictamunigecem.edomex.gob.mx/files/documentos/'+ b +'/'+ c +'/'+ value.nombredoc +'">' + value.nombredoc + '</a> </td>';

    $("#tipologs").append( html + '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher +'</textarea>' +
    		'<td><input type="button" id="dropp"  name="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" class="btn btn-danger" value="Eliminar"  onclick="deletex(' + value.id_docx +','+ value.aniodictamen + ');"></td></tr>');
   


  });
   
    });  
	
}

/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function upload_files3(){

		//alert("es insertar");

	var d = 1; 
	var car = $("#idGRec").val(); // folio
	var clvcat = $("#cvec").val(); // claves
  $("#messagetipolmoralconstru").html('');

	
	//$(".upload-msg4").text('Cargando...');
	var inputFileImage = document.getElementById("uploadedFile");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('uploadedFile',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',clvcat);
	$.ajax({
		url: "../../../../../loadingone/load2",
		type: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			//console.log(data);      
      $("#messagetipolmoralconstru").html(data);
      $("#uploadedFile").val('');
			
			//alert("tipologia subida");
			//ready tipologias
			documentosX(d,car,clvcat);

		}
	});

} 

/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function deletex(id_docx,aniodicta){

	
	  
	  
	  var a2 = $("#cclv").val(); //clave catastral
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#idGRec").val(); //folio
	 

	  var tipopweronsa = $("#tipopersona").val();

	  
	  $.post("../../../../../fil/elimfilesone/",{tipopersona:tipopweronsa,nombrefile:id_docx2,idfile:id_docx,clavecat:a2,foliodictamen:a1,oina:anio},function(m){
		  //console.log(m);
		  if( m == "100" ){
			  
			  $("#uploadedFile").val('');
			  documentosX(1,a1,a2);
		  }else if( m == "0" ){
			  console.log('error no se pudo subir archivo');
		  }else{
			  console.log('error de servidor');  
		  }
	  });


	   
	  
	  
	  

	}

var pahtv_t = { vector_t : [] } ;
var vector_t = { id_inmu : '',id_doc : '',tipolg_n : '', comentario : '' };

function bad(pers,fl,clv,anio){
  
  document.getElementById('avg1').style.display='none';
	/*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/
	if( pers == "1" ){
		if( $("#prebaldio").val()  == "100" ){
		      //Predio baldío
		   var avaluofirmado = $('#ficoment1').val(); //formato avaluo firmado
	     var dictaval = $('#ficoment2').val(); //archivo dictaval .val
	     var construcciones = $('#ficoment3').val(); //archivo contrucciones .val 
	     var escriturap = $('#ficoment4').val(); //escritura publica
	     var boletapredial = $('#ficoment5').val(); // boleta predial
	     var acreditapropied = $('#ficoment6').val(); //doc q acredite la propiedad
	     var idenoficial = $('#ficoment7').val(); //identificacion oficial
	     var medidascolindanc = $('#ficoment8').val(); //medidad y colindancias
	     var croquislocaliz = $('#ficoment9').val(); // creoquis de localizacion
	     var otros = $('#ficoment15').val(); //otros
	     var indivisoscondominios = $('#ficoment14').val(); //indivisos y condominio
	     var croquisconstruccion = $('#ficoment10').val(); //plano arq. o croquis de construccion
	     var usoprivativo = $('#ficoment11').val(); //uso privativo
	     var superficiesconstru = $('#ficoment12').val(); //superficies constructivas
	     var planosfactores = $('#ficoment13').val(); // planos de factores
	     var fachada = $('#ficoment16').val(); // fachada

	     $.post("../../../../../acceso",{acceess:313,
			    claveCat:clv,
			    folio2:fl},function(z){
		            
			    	console.log(z); 
	           if( z == "50" ){
		              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
		              //alert(" DEBES TENER AL MENOS 7 O MAS DOCUMENTOS");
                 document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaa2').style.display='none';

                 document.getElementById('avg1').style.display='block';
		              
	           }else if( z == "100" ){
		              //TIENES LOS DOCUMENTOS NECESARIOS
	         	  

	         	  $.post("../../../../../acceso",{acceess:3338,
	             	  claveCat:clv,
	             	  folio2:fl,
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
	                  fachada:fachada},function(prediobaldiosave){

	                	  console.log(prediobaldiosave);
			            	if( prediobaldiosave == "50" ){
		  		            	
			            		console.log("guardados comentarios");



			            		
			            	    var abc = fl;
			            	    var a = {acceess:3352,abc:abc,ky:clv};
			            	    $.ajax({
			            	      url: "../../../../../acceso",
			            	      type: "POST",
			            	      data: a,		  		            	      
			            	      success: function(e)
			            	      {
			            	        if( e == "10" ){
			            	          console.log( "correccion de .val lista al " + e);
			            	        }else{
			            	          console.log("error de ordenar avaluos val: " + e);
			            	        }

			            	      }
			            	    });

			            	    var b = {acceess:3353,abc:abc,ky:clv};
			            	    $.ajax({
			            	      url: "../../../../../acceso",
			            	      type: "POST",
			            	      data: b,
			            	      success: function(ee)
			            	      {
			            	        if( ee == "10" ){
			            	          console.log("guardado del avaluos.val listo tiene" + ee);
			            	        }else{
			            	        	console.log("error al guardar avaluos val: " + ee);
			            	        }

			            	      }
			            	    });

			            	    var c = {acceess:3354,abc:abc,ky:clv};
			            	    $.ajax({
			            	      url: "../../../../../acceso",
			            	      type: "POST",
			            	      data: c,
			            	      success: function(i)
			            	      {
			            	        if( i == "10" ){
			            	          console.log( "guardado del construcciones .val listo tiene" + i);
			            	        }else{
			            	          console.log(i);
			            	        console.log("error al guardar construcciones val: " + i);
			            	        }

			            	      }
			            	    });


			            	
                     $.post("../../../../../acceso",{acceess:555555,ffff:fl,clvvv:clv},function(VaL){
                      document.getElementById('alertaa2').style.display='block';
              document.getElementById('alertaa').style.display='none';
                        if( VaL == "200"){
                         //alert("GUARDADO");
                         location.href = "https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/10";
                        }else{
                          console.log("Error de guardar .val ");
                        }                  

                       });

			            		
			            	}else{
		  		            	
			            		console.log("error : " + prediobaldiosave );
			            	}
			            	
	                      
	                      });
	              

	           }
			    });

	   
					

				}else if( $("#preconstruido").val() == "100" ){
					// Predio construido
					   var tituloPropiedafc = $("#ficoment4fc").val(); // titulo de la propiedad


				      var avaluofirmadoM = $("#ficoment18").val(); //formato avaluo firmado
				      var dictavalM =$("#ficoment19").val(); //archivo dictaval .val
				      var construccionesM = $("#ficoment20").val(); //archivo contrucciones .val  

				      //var actaempresa = $("#ficoment21").val(); //Acta Constitutiva de la Empresa  
				      //var nombramientolegal = $("#ficoment22").val(); // Nombramiento del Representante legal  
				      var boleta = $("#ficoment23").val(); //Boleta Predial  

				      var acreditapropiedadM = $("#ficoment24").val(); //Documento que acredite la propiedad
				      var idenoficialM = $("#ficoment25").val(); //Identificación Oficial del propietario o representante legal
				      var medidascolindancM = $("#ficoment26").val(); // Planos ó Croquis de terreno (medidas y colindancias)

				      var croquislocalizM = $("#ficoment27").val(); //Croquis de Localización  
				      var otrosM = $("#ficoment28").val(); //otros
				      var indivisoscondominiosM = $("#ficoment29").val(); //Relación de indivisos de Condominio
				      var croquisconstruccionM = $("#ficoment30").val(); //Plano arquitectónico o croquis de construcción

				      var usoprivativoM = $("#ficoment31").val(); //Plano arquitectónico contenido edificaciones de su uso privativo
				      var superficiesconstruM = $("#ficoment32").val(); //Plano del conjunto donde señalan las deferentes superficies constructivas
				      var planosfactoresM = $("#ficoment33").val();//Planos de Factores

				        
				      var fachadaM = $('#ficoment34').val(); // fachada
				      
				    
				    pahtv_t.vector_t = [];
				    
				    $('#tipologstable tbody tr').each(function() {
				      var codigodi = $(this).find('td').eq(0).text();			      
					  var iddoc = 12;
					  var comentario = $(this).find('textarea').val();						
					  
					//var a = key + 1;
				   pahtv_t.vector_t.push({				   
				            folio : fl,
				            clve : clv,						
							id_doc: iddoc,
							tipolg_n : codigodi,
							comentario : comentario
					});


				    });
				    console.log(pahtv_t.vector_t);



				    $.post("../../../../../acceso",{acceess:313,
					    claveCat:clv,
					    folio2:fl},function(z){
				            
					    	console.log(z); 
			              if( z == "50" ){
				              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
				             // alert(" DEBES TENER AL MENOS 7 O MAS DOCUMENTOS");
				              document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaa2').style.display='none';
                      document.getElementById('avg1').style.display='block';
				              
			              }else if( z == "100" ){
				              //TIENES LOS DOCUMENTOS NECESARIOS
			            	 // alert("TIENES LOS DOCUMENTOS NECESARIOS");
                      

			            	  $.post("../../../../../acceso",{acceess:332,
			  				    claveCat:clv,
			  				    folio2:fl,
			  		            avaluofirmadoM:avaluofirmadoM, 
			  		            dictavalM:dictavalM, 
			  		            construccionesM:construccionesM, 
			  		            //actaempresa:actaempresa, 
			  		            //nombramientolegal:nombramientolegal, 
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
			  		            fachadaM:fachadaM,
			  		          tituloPropiedafc:tituloPropiedafc,
			  		            
			  		            tipologg:pahtv_t.vector_t
			  		            
			  		            },function(saver){
			  		            	console.log(saver);
			  		            	if( saver == "50" ){
				  		            	
			  		            		console.log("guardados comentarios");



			  		            		
			  		            	  var abc = fl;
					            	    var a = {acceess:3352,abc:abc,ky:clv};
					            	    $.ajax({
					            	      url: "../../../../../acceso",
					            	      type: "POST",
					            	      data: a,		  		            	      
					            	      success: function(e)
					            	      {
					            	        if( e == "10" ){
					            	          console.log( "correccion de .val lista al " + e);
					            	        }else{
					            	          console.log("error de ordenar avaluos val: " + e);
					            	        }

					            	      }
					            	    });

					            	    var b = {acceess:3353,abc:abc,ky:clv};
					            	    $.ajax({
					            	      url: "../../../../../acceso",
					            	      type: "POST",
					            	      data: b,
					            	      success: function(ee)
					            	      {
					            	        if( ee == "10" ){
					            	          console.log("guardado del avaluos.val listo tiene" + ee);
					            	        }else{
					            	        	console.log("error al guardar avaluos val: " + ee);
					            	        }

					            	      }
					            	    });

					            	    var c = {acceess:3354,abc:abc,ky:clv};
					            	    $.ajax({
					            	      url: "../../../../../acceso",
					            	      type: "POST",
					            	      data: c,
					            	      success: function(i)
					            	      {
					            	        if( i == "10" ){
					            	          console.log( "guardado del construcciones .val listo tiene" + i);
					            	        }else{
					            	          console.log(i);
					            	        console.log("error al guardar construcciones val: " + i);
					            	        }

					            	      }
					            	    });


			  		            	   $.post("../../../../../acceso",{acceess:555555,ffff:fl,clvvv:clv},function(VaL){
                              document.getElementById('alertaa2').style.display='block';
                      document.getElementById('alertaa').style.display='none';
                        if( VaL == "200"){
                         //alert("GUARDADO");
                         location.href = "https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/10";
                        }else{
                          console.log("Error de guardar .val ");
                        }                  

                       });

			  		            	

			  		            		
			  		            	}else{
				  		            	
			  		            		console.log("error : " + saver );
			  		            	}
				  		            
			  		            });

			  		            
			            	  
				              
				              
			              }else{
				              console.log("error logico");
			              }
			              
			           
			            
			        
			      });


				}else{
					 console.log("error no se seeleciono tipo de predio");
				}
		
	}else if( pers == "2" ){ //moral
		
		
		
		if( $("#prebaldiommm").val()  == "100" ){
		      //Predio baldío
			var avaluofirmado = $('#ficoment1b').val(); //formato avaluo firmado
		     var dictaval = $('#ficoment2b').val(); //archivo dictaval .val
		     var construcciones = $('#ficoment3b').val(); //archivo contrucciones .val 
		     var escriturap = $('#ficoment4b').val(); //escritura publica
		     var boletapredial = $('#ficoment5b').val(); // boleta predial
		     var acreditapropied = $('#ficoment6b').val(); //doc q acredite la propiedad

		     var idenoficial = $('#ficoment7b').val(); //identificacion oficial
		     var medidascolindanc = $('#ficoment8b').val(); //medidad y colindancias
		     var croquislocaliz = $('#ficoment9b').val(); // creoquis de localizacion
		     var otros = $('#ficoment15b').val(); //otros
		     var indivisoscondominios = $('#ficoment14b').val(); //indivisos y condominio
		     var croquisconstruccion = $('#ficoment10b').val(); //plano arq. o croquis de construccion
		     var usoprivativo = $('#ficoment11b').val(); //uso privativo
		     var superficiesconstru = $('#ficoment12b').val(); //superficies constructivas
		     var planosfactores = $('#ficoment13b').val(); // planos de factores
		     var fachada = $('#ficoment16b').val(); // fachada

	       var actaConstitutiva = $('#ficoment21').val(); // acta Constitutiva
	       var nombramientoLegal = $('#ficoment22').val(); //  nombramiento Legal

	     $.post("../../../../../acceso",{acceess:313,
			    claveCat:clv,
			    folio2:fl},function(z){
		            
			    	console.log(z); 
	           if( z == "50" ){
		              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
		              document.getElementById('alertaa').style.display='block';
                  document.getElementById('alertaa2').style.display='none';
		              
		              
	           }else if( z == "100" ){
		              //TIENES LOS DOCUMENTOS NECESARIOS
	         	

	         	  $.post("../../../../../acceso",{acceess:3338,
	             	  claveCat:clv,
	             	  folio2:fl,
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
	                  actaConstitutiva:actaConstitutiva,
	                  nombramientoLegal:nombramientoLegal, 
	                  fachada:fachada},function(prediobaldiosave){

	                	  console.log(prediobaldiosave);
			            	if( prediobaldiosave == "50" ){
		  		            	
			            		console.log("guardados comentarios");

                      

			            		
			            	    var abc = fl;
			            	    var a = {acceess:3352,abc:abc,ky:clv};
			            	    $.ajax({
			            	      url: "../../../../../acceso",
			            	      type: "POST",
			            	      data: a,		  		            	      
			            	      success: function(e)
			            	      {
			            	        if( e == "10" ){
                              
			            	          console.log( "correccion de .val lista al " + e);
			            	        }else{
                              
			            	          console.log("error de ordenar avaluos val: " + e);
			            	        }

			            	      }
			            	    });

			            	    var b = {acceess:3353,abc:abc,ky:clv};
			            	    $.ajax({
			            	      url: "../../../../../acceso",
			            	      type: "POST",
			            	      data: b,
			            	      success: function(ee)
			            	      {
			            	        if( ee == "10" ){
                              
			            	          console.log("guardado del avaluos.val listo tiene" + ee);
			            	        }else{
                              
			            	        	console.log("error al guardar avaluos val: " + ee);
			            	        }

			            	      }
			            	    });

			            	    var c = {acceess:3354,abc:abc,ky:clv};
			            	    $.ajax({
			            	      url: "../../../../../acceso",
			            	      type: "POST",
			            	      data: c,
			            	      success: function(i)
			            	      {
			            	        if( i == "10" ){
                              
			            	          console.log( "guardado del construcciones .val listo tiene" + i);
			            	        }else{
                              
			            	          console.log(i);
			            	        console.log("error al guardar construcciones val: " + i);
			            	        }

			            	      }
			            	    });

                        
                       $.post("../../../../../acceso",{acceess:555555,ffff:fl,clvvv:clv},function(VaL){
                         document.getElementById('alertaa2').style.display='block';
             document.getElementById('alertaa').style.display='none';
                        if( VaL == "200"){
                         //alert("GUARDADO");
                         location.href = "https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/10";
                        }else{
                          console.log("Error de guardar .val ");
                        }                  

                       });
                         

                        //location.href = "https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/10";
			            	 

			            		
			            	}else{
		  		            	
			            		console.log("error : " + prediobaldiosave );
			            	}
			            	
	                      
	                      });
	              

	           }
			    });

	   
					

				}else if( $("#preconstruidomx").val() == "100" ){
					// Predio construido
				


					var avaluofirmadoM = $("#ficoment18m").val(); //formato avaluo firmado
									      var dictavalM =$("#ficoment19m").val(); //archivo dictaval .val
									      var construccionesM = $("#ficoment20m").val(); //archivo contrucciones .val  

									      var actaempresa = $("#ficoment21m").val(); //Acta Constitutiva de la Empresa  
									      var nombramientolegal = $("#ficoment22m").val(); // Nombramiento del Representante legal  
									      var boleta = $("#ficoment23m").val(); //Boleta Predial  

									      var acreditapropiedadM = $("#ficoment24m").val(); //Documento que acredite la propiedad
									      var idenoficialM = $("#ficoment25m").val(); //Identificación Oficial del propietario o representante legal
									      var medidascolindancM = $("#ficoment26m").val(); // Planos ó Croquis de terreno (medidas y colindancias)

									      var croquislocalizM = $("#ficoment27m").val(); //Croquis de Localización  
									      var otrosM = $("#ficoment28m").val(); //otros
									      var indivisoscondominiosM = $("#ficoment29m").val(); //Relación de indivisos de Condominio
									      var croquisconstruccionM = $("#ficoment30m").val(); //Plano arquitectónico o croquis de construcción

									      var usoprivativoM = $("#ficoment31m").val(); //Plano arquitectónico contenido edificaciones de su uso privativo
									      var superficiesconstruM = $("#ficoment32m").val(); //Plano del conjunto donde señalan las deferentes superficies constructivas
									      var planosfactoresM = $("#ficoment33m").val();//Planos de Factores
									      var fachadaM = $('#ficoment34').val(); // fachada
				      
				    
				    pahtv_t.vector_t = [];
				    
				    $('#tipologstable tbody tr').each(function() {
				      var codigodi = $(this).find('td').eq(0).text();			      
					  var iddoc = 12;
					  var comentario = $(this).find('textarea').val();						
					  
					//var a = key + 1;
				   pahtv_t.vector_t.push({				   
				            folio : fl,
				            clve : clv,						
							id_doc: iddoc,
							tipolg_n : codigodi,
							comentario : comentario
					});


				    });
				    console.log(pahtv_t.vector_t);



				    $.post("../../../../../acceso",{acceess:313,
					    claveCat:clv,
					    folio2:fl},function(z){
				            
					    	console.log(z); 
			              if( z == "50" ){
				              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
				              document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaa2').style.display='none';
				              
				              
			              }else if( z == "100" ){
				              //TIENES LOS DOCUMENTOS NECESARIOS
			            	 

			            	  $.post("../../../../../acceso",{acceess:332,
			  				    claveCat:clv,
			  				    folio2:fl,
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
			  		            fachadaM:fachadaM,
			  		            
			  		            tipologg:pahtv_t.vector_t
			  		            
			  		            },function(saver){
			  		            	console.log(saver);
			  		            	if( saver == "50" ){
				  		            	
			  		            		console.log("guardados comentarios");



			  		            		
			  		            	  var abc = fl;
					            	    var a = {acceess:3352,abc:abc,ky:clv};
					            	    $.ajax({
					            	      url: "../../../../../acceso",
					            	      type: "POST",
					            	      data: a,		  		            	      
					            	      success: function(e)
					            	      {
					            	        if( e == "10" ){
					            	          console.log( "correccion de .val lista al " + e);
					            	        }else{
					            	          console.log("error de ordenar avaluos val: " + e);
					            	        }

					            	      }
					            	    });

					            	    var b = {acceess:3353,abc:abc,ky:clv};
					            	    $.ajax({
					            	      url: "../../../../../acceso",
					            	      type: "POST",
					            	      data: b,
					            	      success: function(ee)
					            	      {
					            	        if( ee == "10" ){
					            	          console.log("guardado del avaluos.val listo tiene" + ee);
					            	        }else{
					            	        	console.log("error al guardar avaluos val: " + ee);
					            	        }

					            	      }
					            	    });

					            	    var c = {acceess:3354,abc:abc,ky:clv};
					            	    $.ajax({
					            	      url: "../../../../../acceso",
					            	      type: "POST",
					            	      data: c,
					            	      success: function(i)
					            	      {
					            	        if( i == "10" ){
					            	          console.log( "guardado del construcciones .val listo tiene" + i);
					            	        }else{
					            	          console.log(i);
					            	        console.log("error al guardar construcciones val: " + i);
					            	        }

					            	      }
					            	    });


			  		            
                          $.post("../../../../../acceso",{acceess:555555,ffff:fl,clvvv:clv},function(VaL){
                             document.getElementById('alertaa2').style.display='block';
                      document.getElementById('alertaa').style.display='none';
                        if( VaL == "200"){
                         //alert("GUARDADO");
                         location.href = "https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/10";
                        }else{
                          console.log("Error de guardar .val ");
                        }                  

                       });
                            
                            
			  		            		// location.href = "https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/10";
			  		            	}else{
				  		            	
			  		            		console.log("error : " + saver );
			  		            	}
				  		            
			  		            });

			  		            
			            	  
				              
				              
			              }else{
				              console.log("error logico");
			              }
			              
			           
			            
			        
			      });


				}else{
					 console.log("error no se seeleciono tipo de predio");
				}
		
	}else{
		console.log("error de tipo de persona y predio");
	}
	
}


function baldio(){



	
	$("#prebaldio").val(100);
	$("#preconstruido").val("");
	$("#xcod").css("display","block");
	
	$("#avg1").css("display","block");

		$("#docxs_f").css("display","contents");
		$("#docxs_m").css("display","none");
		$("#tipolgis").css("display","none");


		 /*
		funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
		ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
		y
		ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
		*/
		
		
		var b = $("#idGRec").val(); // folio
		var c = $("#cvec").val(); // claves
					
		documentosXfiles(1,b,c);


		$.post("../../../../../acceso",{acceess:114,
			    claveCat:c,
			    folio2:b,          
	          },function(updatecamp){
		          //console.log(updatecamp);
		          
		          if( updatecamp == '50' ){
			          console.log("error al seleccionar tipo de predio baldio");
		          }else{
		        	  console.log( "es un predio baldio continua" + updatecamp );
		          }
		          
	              });
	    
	}

function baldio_new(){



	
	$("#prebaldiommm").val(100);
	$("#preconstruidomx").val("");
	$("#xcod").css("display","block");
	
	$("#avg1").css("display","block");

	$("#docxs_prediobaldiof").css("display","contents");
	$("#docxs_predioconstrm").css("display","none");
		$("#tipolgis").css("display","none");


		 /*
		funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
		ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
		y
		ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
		*/
		
		
		var b = $("#idGRec").val(); // folio
		var c = $("#cvec").val(); // claves
					
		documentosXfilmoralpredios(1,b,c);


		$.post("../../../../../acceso",{acceess:114,
			    claveCat:c,
			    folio2:b,          
	          },function(updatecamp){
		          //console.log(updatecamp);
		          
		          if( updatecamp == '50' ){
			          console.log("error al seleccionar tipo de predio baldio");
		          }else{
		        	  console.log( "es un predio baldio continua" + updatecamp );
		          }
		          
	              });
	    
	}

function construccion(){
		$("#prebaldio").val("");
		$("#preconstruido").val(100);
		$("#xcod").css("display","block");
		
		$("#avg1").css("display","block");

		
		$("#docxs_m").css("display","contents");
		$("#tipolgis").css("display","block");
		
		$("#docxs_f").css("display","none");

		$("#imgaenmoral").css("display","none");

		var sssuper = $("#idGRec").val();
		var b = zfill(sssuper, 5); // folio
		var c = $("#cvec").val(); // claves
		
		documentosXfiles(2,b,c);
		
		documentosX(2,b,c);


		$.post("../../../../../acceso",{acceess:115,
		    claveCat:c,
		    folio2:b,          
          },function(updatecamp){
	          //console.log(updatecamp);
	          
	          if( updatecamp == '50' ){
		          console.log("error al seleccionar tipo de predio baldio");
	          }else{
	        	  console.log( "es un predio construido continua" + updatecamp );
	          }
	          
              });


	}

function construccion_new(){
	$("#prebaldiommm").val("");
	$("#preconstruidomx").val(100);
	$("#xcod").css("display","block");
	
	$("#avg1").css("display","block");

	$("#docxs_prediobaldiof").css("display","none");
	$("#docxs_predioconstrm").css("display","contents");
		
	$("#tipolgis").css("display","block");
	
	

	$("#imgaenmoral").css("display","none");

	var sssuper = $("#idGRec").val();
	var b = zfill(sssuper, 5); // folio
	var c = $("#cvec").val(); // claves
	
	documentosXfilmoralpredios(2,b,c);
	
	documentosX(2,b,c);


	$.post("../../../../../acceso",{acceess:115,
	    claveCat:c,
	    folio2:b,          
      },function(updatecamp){
          //console.log(updatecamp);
          
          if( updatecamp == '50' ){
	          console.log("error al seleccionar tipo de predio baldio");
          }else{
        	  console.log( "es un predio construido continua" + updatecamp );
          }
          
          });


}


function validacion_para_recargar(bb,cc){
	
	$("#docxs_f").css("display","none");
	$("#docxs_m").css("display","none");
	$("#docxs_prediobaldiof").css("display","none");
	$("#docxs_predioconstrm").css("display","none");
	
		var b = bb; //$("#idGRec").val(); // folio idGRec 
		var c = cc; //$("#cvec").val(); // claves cvec
		$.post("../../../../../acceso",{acceess:116,
		    claveCat:c,
		    folio2:b,          
          },function(updatecampvalidad){
	          //console.log(updatecamp);
        	  
        	  if( $("#tipopersona").val() == '1' ){
        		  
        		  if( updatecampvalidad == 't' ){
    	        	  console.log( "es un predio baldio, continua " + updatecampvalidad );
    	        	  $("input[name=prediofff]").val(['1']);
    	        	  baldio();	        	  
    	          }else if( updatecampvalidad == 'f' ){
    	        	  console.log( "es un predio construido, continua "  + updatecampvalidad );
    	        	  $("input[name=prediofff]").val(['2']);
    	        	  construccion();
    	          }else if( updatecampvalidad == ' ' || updatecampvalidad == ''  ){
    	        	  
    	        	  
    	        	  
    	          }else{
    	        	  console.log( "error de ejecucion de recargar predio");
    	          }
        		  
        	  }else if( $("#tipopersona").val() == '2' ){
        		  
        		  
        		  if( updatecampvalidad == 't' ){
    	        	  console.log( "es un predio baldio, continua " + updatecampvalidad );
    	        	  $("input[name=prediommm]").val(['1']);
    	        	  baldio_new();	        	  
    	          }else if( updatecampvalidad == 'f' ){
    	        	  console.log( "es un predio construido, continua "  + updatecampvalidad );
    	        	  $("input[name=prediommm]").val(['2']);
    	        	  construccion_new();
    	          }else if( updatecampvalidad == ' ' || updatecampvalidad == ''  ){
    	        	  
    	        	  
    	        	  
    	          }else{
    	        	  console.log( "error de ejecucion de recargar predio");
    	          }
        		  
        		  
        	  }else{
        		  
        	  }
	          
	        
	          
              });
	}


function zfill(number, width) {
	    var numberOutput = Math.abs(number); /* Valor absoluto del número */
	    var length = number.toString().length; /* Largo del número */ 
	    var zero = "0"; /* String de cero */  
	    
	    if (width <= length) {
	        if (number < 0) {
	             return ("-" + numberOutput.toString()); 
	        } else {
	             return numberOutput.toString(); 
	        }
	    } else {
	        if (number < 0) {
	            return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
	        } else {
	            return ((zero.repeat(width - length)) + numberOutput.toString()); 
	        }
	    }
	}

function load_filesxavg(axxxxxxxx,x,etapa){

  var clv = $('#cvec').val();
    //var dct = $('#idGRec').val();
    var dct = axxxxxxxx;
    $.post("../../../../../acceso",{acceess:85,dictams:dct},function(g){

    //  console.log(g);

         if( g == "3" ){


            var tippp = $('#idP').val();
      //var dct = $('#idG').val();
      var dct = axxxxxxxx;
      $.post("../../../../../acceso",{acceess:71,idpers:tippp,dictams:dct,calvecatt:clv,etapa:etapa},function(h){
      //  console.log(h);
         var tip_p = $('#idP').val();


        if( tip_p == "1"){ //Tipo de persona fisica

          $(h).each(function(key,valuee){

          if( valuee.etapa == "15" ){  


            $("#fachadaBal").css('display','none'); 
          /*  switch (valuee.orden) {

              case "120":

              
                
                break;




                   }*/




              }


           });

         }


       }
       );


         }





    }
    );


}






































