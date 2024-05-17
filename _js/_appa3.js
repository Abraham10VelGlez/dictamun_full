

var pahtv1 = { vector1 : [] } ;
  var vector1 = { id_t : '', comel: ''};
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

     var anioxc = $("#anioDic").val(); 
     var idI = $("#idInmu").val();  
     var folioxcadf = $("#gva").val();
     
    //Total de inmuebles a revisar
    $.post("../../acceso",{acceess:34,idI:idI,anio:anioxc,folioxcadf:folioxcadf}, 
    	function(n){
    	 console.log('inmuebles');
         $("#cc").val(n); 
         //consultar informacion de inmuebles en vista revisor
      var fol = $("#cc").val();
		  var clavC = $("#idInmu").val();   
		   $.post("../../acceso",{acceess:33,clavC:clavC,fol:fol},
    	function(z){       
    		console.log(z);
        var ruta="https://dictamunigecem.edomex.gob.mx/files/documentos/";  
        var conta=0;
        var contaTipo=0;
            $(z).each(function(key,valuee){
              conta = conta + 1; 


             /* if (conta == 1 ) {
                $("#estatus").val(valuee.etapa); 
                if(valuee.etapa=5){

                        document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5 (Observado por revisor / Subir archivo en hojas verdes).');
                      document.getElementById('alertaStatusMotivo').append('Por tal motivo el dictamen esta en espera de que el administrador suba el archivo en hojas verdes.');
                     
              }
            }*/

                if (valuee.baldio == "t") {

        document.getElementById('tipologiasTT').style.display='none';
        document.getElementById('fachada').style.display='block';
         document.getElementById('titFachada').style.display='block';
         
      }else if (valuee.baldio == "f") {

        document.getElementById('fachada').style.display='none'; 
        document.getElementById('titFachada').style.display='none';
        if (valuee.etapa == 1) {
           document.getElementById('tipologiasTT').style.display='none';
        }else{
           document.getElementById('tipologiasTT').style.display='block';
        }
      }
////////////////////****validaciones por etapas**** //////////////////////////

if (valuee.etapa == 52) { //solo muestra aviso y dictamen
 
                       if( valuee.tipod == '1' ){

                           document.getElementById('escriturap').style.display='contents';
                    document.getElementById('nombraml').style.display='none';

                    if (valuee.orden == 99) { 
                   $("#escrituratituloPropiedad").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comenescrituratituloPropiedad").val(valuee.comentario);
                         $("#descargaescrituratituloPropiedad").html('');
                         $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                            $("#comentarioescrituratituloPropiedad").html('');
                           $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                            $("#comentarioescrituratituloPropiedad").html('');
                             $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else{

  }
                   

                
                


                }


                if (valuee.etapa == 13 && valuee.tipod == '2') {
                     document.getElementById('escriturap').style.display='none';
                        if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }
                }

                   if (valuee.etapa == 13 && valuee.tipod == '1') {
                     document.getElementById('escriturap').style.display='contents';
                        if (valuee.orden == 99) { 
                   $("#escrituratituloPropiedad").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comenescrituratituloPropiedad").val(valuee.comentario);
                         $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }
                }

if (valuee.etapa == 53) { //solo muestra aviso y dictamen
 
                       if( valuee.tipod == '1' ){

                           document.getElementById('escriturap').style.display='contents';
                    document.getElementById('nombraml').style.display='none';


                    if (valuee.orden == 99) { 
                   $("#escrituratituloPropiedad").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comenescrituratituloPropiedad").val(valuee.comentario);
                         $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else{

  }
                }


                if (valuee.etapa == 11) { 

                   if( valuee.tipod == '1' ){

                      document.getElementById('escriturap').style.display='contents';
                    document.getElementById('nombraml').style.display='none';


                    if (valuee.orden == 99) { 
                   $("#escrituratituloPropiedad").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comenescrituratituloPropiedad").val(valuee.comentario);
                         $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }



  }else if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else{

  }

                }



                if(valuee.etapa == 6 ){

                  if( valuee.tipod == '2' ){
                     document.getElementById('escriturap').style.display='none';
                     document.getElementById('nombraml').style.display='contents';
                     document.getElementById('save_rev').style.display='block'; 

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }
  
                }



                      if(valuee.etapa == 7 ){

                  if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }
  
                }



                      if(valuee.etapa == 15 ){

                        document.getElementById('archivoCCT').style.display='none';
                        document.getElementById('tipologias').style.display='none';
/////////////////////////////////////////////ocultar la descarga de archivos porq estan en etapa 15 y toda esa documentacion se respaldo y elimino para liberar espacio///////////////////////////////////////////////////////////////
                        document.getElementById('descargarTable').style.display='none';
                        document.getElementById('descargaDictaval').style.display='none';

                        document.getElementById('descargaConstruc').style.display='none';
                        document.getElementById('descargAvaluoFirmado').style.display='none';
                        document.getElementById('descargaescrituratituloPropiedad').style.display='none';
                        document.getElementById('descarganombrleg').style.display='none';
                        document.getElementById('descargarBoletaP').style.display='none';
                        document.getElementById('descargaTitulo').style.display='none';
                        document.getElementById('descargaidentificacionOf').style.display='none';
                        document.getElementById('descargaCroquis').style.display='none';
                        document.getElementById('descargacroquisLocalizacion').style.display='none';
                        document.getElementById('descargarPlanos').style.display='none';

                        document.getElementById('descargaredificacionesUsoPriv').style.display='none';
                        document.getElementById('descargarsuperficiesConstr').style.display='none';
                        document.getElementById('descargarfactores').style.display='none';
                        document.getElementById('descargarIndivisosC').style.display='none';
                        document.getElementById('descargarActaC').style.display='none';
                        document.getElementById('descargaOtros').style.display='none';
                        document.getElementById('descargarFachada').style.display='none';
                        document.getElementById('descargarHojasVerdes').style.display='none';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////                         
                  if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }
  
                }




                      if(valuee.etapa == 4 ){

                  if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }
  
                }





                if (valuee.etapa == 3) {

                     if( valuee.tipod == '1' ){

                           document.getElementById('escriturap').style.display='contents';
                    document.getElementById('nombraml').style.display='none';


                    if (valuee.orden == 99) { 
                   $("#escrituratituloPropiedad").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comenescrituratituloPropiedad").val(valuee.comentario);
                         $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else if( valuee.tipod == '2' ){
     document.getElementById('escriturap').style.display='none';
                    document.getElementById('nombraml').style.display='contents';

                    if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         var fol2x = $("#cc").val();
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2x+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentariocomennombrleg2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }

  }else{

  }




                }



                if (valuee.etapa == 1) { //solo muestra aviso y dictamen
                  if (conta == 1) {
                 document.getElementById('prediosT').style.display='none'; 
                 document.getElementById('archivosRecibidosT').style.display='none'; 
                 document.getElementById('obs_general').style.display='none';
                 document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 1 (REGISTRO DE DICTAMEN)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se pueden visualizar dos apartados que son "AVISO" Y "DICTAMEN"');
                 
                 document.getElementById('tipologiasTT').style.display='none'; 
                }


                }else if (valuee.etapa == 3) {

                  if (conta == 1) {
                document.getElementById('alertaa').style.display='block';
               document.getElementById('save_rev').style.display='none';
                  document.getElementById('tipologias').style.display='none';
                 document.getElementById('obs_general').style.display='none';
                document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 3 (PENDIENTE DE ASIGNAR REVISOR)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo no se pueden realizar observaciones ni pasar de etapa.');
                document.getElementById('archivoCCT').style.display='none';
                document.getElementById('tipologiasPa').style.display='none';

               }

            
              }else if (valuee.etapa == 4) {

                if (conta == 1) {
                  document.getElementById('save_rev').style.display='none';
                  document.getElementById('tipologias').style.display='none';
                 document.getElementById('tipologiasPa').style.display='none';
                 document.getElementById('obs_general').style.display='none';
                 document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 4 (ASIGNADO A REVISOR)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo el administrador no podra hacer observaciones hasta que el dictamen sea AUTORIZADO.');
                  document.getElementById('archivoCCT').style.display='none';
                }
               

              }else if (valuee.etapa == 6) {

              document.getElementById('escriturap').style.display='none';                

                  if (conta == 1) {
                   document.getElementById('alertaa').style.display='block';
                   document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 6 (AUTORIZADO)');
                   document.getElementById('alertaStatusMotivo').append('Por tal motivo el administrador general podra hacer observaciones para posteriormente "Rechazarlo" o de lo contrario "Liberarlo" para generar ordenes de Pago');
                   document.getElementById('autorizado').style.display='none';
                   document.getElementById('preRechazoPagos').style.display='none';
                   document.getElementById('tipologiasPa').style.display='none';
                   document.getElementById('save_revPa').style.display='none';
                   //document.getElementById('descargarHojasVerdes').style.display='block';
                   //$("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
                  document.getElementById('descargarHojasVerdes').style.display='block';
                  $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
                  document.getElementById('archivoCCT').style.display='block';
                  document.getElementById('save_rev').style.display='none';


                  }
                 

                }else if (valuee.etapa == 7) { //PENDIENTE DE PAGO 

                  if (conta == 1) {
                  document.getElementById('observacionFinales').style.display='none';
                  document.getElementById('guardarObservacionsJ').style.display='none';
                  document.getElementById('tipologias').style.display='none';
                  document.getElementById('save_rev').style.display='none';
                  document.getElementById('liberadoGr').style.display='none';
                  document.getElementById('rechazoGr').style.display='none';
                  document.getElementById('obervacionGr').style.display='none';
                  $("#ObservacionPre").val('Dictamen Liberado');
                  document.getElementById('alertaa').style.display='block';
                  document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 7 (PENDIENTE DE PAGO)');
                  document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se visualiza la infomracion, sin poder hacer comentarios.');


                    document.getElementById('archivoCCT').style.display='none';
                    document.getElementById('autorizado').style.display='none';
                    document.getElementById('preRechazoPagos').style.display='none';
                    document.getElementById('tipologiasPa').style.display='none';
                    document.getElementById('descargarHojasVerdes').style.display='block';
                  $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>') 
         


                }
                 

                }else if (valuee.etapa == 13) {  //RECHAZADO POR ADMINISTRADOR GENERAL

                if (conta == 1) {

                $("#com").html('<h5>Observaciones Generales: '+valuee.obs_rev+'</h5>');  
                 document.getElementById('alertaa').style.display='block';
  document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 13 (RECHAZADO POR ADMINISTRADOR GENERAL)');
                
                 if (valuee.activo == 1) {

        document.getElementById('alertaStatusMotivo').append('El archivo en hojas verdes fue incorrecto, verificar las observaciones realizadas.');
                $( "#radio1" ).prop( 'disabled', 'true' );
                $( "#radio1" ).prop('checked', 'false');
                $( "#radio2" ).prop('checked', 'true');

                 }else{

           document.getElementById('alertaStatusMotivo').append('Verificar las observaciones relizadas por el administrador pagos. Archivo en hojas verdes valido');
         $( "#radio2" ).prop( 'disabled', 'true' );

                 }



                 document.getElementById('descargarHojasVerdes').style.display='block';
   $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>') 
      
              }

              }else if (valuee.etapa == 52) {  //pre autorizado por Revisor (vlido el archivo en hojas verdes)

                if (conta == 1) {

                $("#com").html('<h5>Observaciones Generales: '+valuee.obs_rev+'</h5>');  
                 document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5.2 (PRE AUTORIZADO)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo el Administrador Pagos tendrá que verificar la informacion y "AUTORIZAR" O "RECHAZAR" el dictamen.');
                 
                   document.getElementById('descargarHojasVerdes').style.display='block';
   $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>') 

    document.getElementById('escriturap').style.display='none';
        
              }

              }else if (valuee.etapa == 15) {

                document.getElementById('escriturap').style.display='none';    
                
                  if (conta == 1) {

                      document.getElementById('save_rev').style.display='none';
                      document.getElementById('tipologiasPa').style.display='none';
                      document.getElementById('obs_general').style.display='none';
                      document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 15 (VALIDADO)');
                      document.getElementById('alertaStatusMotivo').append('Por tal motivo a terminado el proceso en dictamun ya que su pago fue validado correctamente.');
                      
                          document.getElementById('descargarHojasVerdes').style.display='block';
          $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
                      

                      if (valuee.activo == 1) {

        document.getElementById('alertaStatusMotivo').append('El archivo en hojas verdes fue incorrecto, verificar las observaciones realizadas.');
                $( "#radio1" ).prop( 'disabled', 'true' );
                $( "#radio1" ).prop('checked', 'false');
                $( "#radio2" ).prop('checked', 'true');

                 }else{

           document.getElementById('alertaStatusMotivo').append('Verificar las observaciones relizadas por el administrador pagos. Archivo en hojas verdes valido');
         $( "#radio2" ).prop( 'disabled', 'true' );

                 }
          
               
                     }

                     }else if(valuee.etapa == 51){

                      if (conta == 1) {
                   document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5.1 (Con archivo en hojas verdes)');
                      document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se muestra la información sin hacer observaciones hasta que el dictamen sea pre autorizado.');
                     
                     document.getElementById('descargarHojasVerdes').style.display='block';
          $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
           document.getElementById('archivoCCT').style.display='none';
           document.getElementById('save_rev').style.display='none';
           document.getElementById('obs_general').style.display='none';


                      }
                     
                     }else if(valuee.etapa=12){

                      if (conta == 1) {
                        document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 12 (Rechazado por Administrador pagos).');
                      document.getElementById('alertaStatusMotivo').append('Por tal motivo el dictamen esta en espera de que el revisor atienda las observaciones especificadas.');
                     

                     document.getElementById('archivoCCT').style.display='none';
           document.getElementById('save_rev').style.display='none';
           document.getElementById('tipologiasPa').style.display='none';

            document.getElementById('descargarHojasVerdes').style.display='block';
          $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
          document.getElementById('autorizado').style.display='none';
          document.getElementById('preRechazoPagos').style.display='none';


                      }


                     }else if(valuee.etapa=5){

                      if (conta == 1) {
                        document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5 (Observado por revisor / Subir archivo en hojas verdes).');
                      document.getElementById('alertaStatusMotivo').append('Por tal motivo el dictamen esta en espera de que el administrador suba el archivo en hojas verdes.');
                     
/*
                     document.getElementById('archivoCCT').style.display='none';
           document.getElementById('save_rev').style.display='none';
           document.getElementById('tipologiasPa').style.display='none';

            document.getElementById('descargarHojasVerdes').style.display='block';
          $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
          document.getElementById('autorizado').style.display='none';
          document.getElementById('preRechazoPagos').style.display='none';*/


                      }


                     }

            	//Aviso
      var fol2 = $("#cc").val(); 
      var inicio = "AD/";
      var inicio2 = "DIP/";
      var anio= valuee.aniodictamen;
      var folioCompleto = inicio+fol2+"/"+anio;
			$("#folioI").val(folioCompleto); 
			$("#anioD").val(valuee.aniodictamen); 
			
			$("#rfcC").val(valuee.rfc); 
			$("#clave").val(valuee.cve_catastral); 

      var foliocavg = folioCompleto + "/" + valuee.cve_catastral;

      $("#foldicview").html(foliocavg); 

      var valor_cat = new Intl.NumberFormat('es-MX').format(valuee.valor_catastral); 

			$("#valor").val(valor_cat); 
			$("#calle").val(valuee.calle); 
			$("#noE").val(valuee.no_exterior); 
			$("#noI").val(valuee.no_interior); 
			$("#colonia").val(valuee.colonia);
			$("#municipio").val(valuee.nommpio);
			$("#cp").val(valuee.codigo_p);
			$("#referencia").val(valuee.referencia1);
			//Dictamen
      var folioCompleto2 = inicio2+fol2+"/"+anio;
      $("#noFolio").val(folioCompleto2);
			var dictaminadorCom= valuee.dictminador+" "+valuee.apdictaminador+" "+valuee.amdictaminador; 
			$("#dictaminador").val(dictaminadorCom); 
			$("#rfcD").val(valuee.rfcdictaminador);
			$("#noReg").val(valuee.noregistro);
			$("#tipoD").val(valuee.tipodictamen);   
			$("#estatus").val(valuee.etapa);


        if (valuee.orden==10) {
                $("#dictaval").val(valuee.nombredoc); 
                $("#comenDictaval").val(valuee.comentario);
                $("#descargaDictaval").append('<a id="descargaDictaval" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                 if (valuee.observacionRevisor == null) {
                  $("#comentarioDicta2").append('<textarea style="width: 300px;" id="comentarioDicta" placeholder="Agregar Observacion"></textarea>');
           
                 }else{
                    $("#comentarioDicta2").append('<textarea style="width: 300px;" id="comentarioDicta">'+valuee.observacionRevisor+'</textarea>');
           
                 }

      }else if (valuee.orden==11) {
                $("#construccion").val(valuee.nombredoc);
                $("#comenConstru").val(valuee.comentario);
                $("#descargaConstruc").append('<a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                if (valuee.observacionRevisor == null) {
                  $("#comentarioConstruc2").append('<textarea style="width: 300px;" id="comentarioConstruc" placeholder="Agregar Observacion"></textarea>');
           
                 }else{
                    $("#comentarioConstruc2").append('<textarea style="width: 300px;" id="comentarioConstruc">'+valuee.observacionRevisor+'</textarea>');
           
                 }
      }else if(valuee.orden==14){
                $("#avaluoFirmado").val(valuee.nombredoc);
                $("#comenAvaluoFirmado").val(valuee.comentario);
                $("#descargAvaluoFirmado").append('<a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                 if (valuee.observacionRevisor == null) {
                  $("#comentarioAvaluoFirmado2").append('<textarea style="width: 300px;" id="comentarioAvaluoFirmado" placeholder="Agregar Observacion"></textarea>');
           
                 }else{
                    $("#comentarioAvaluoFirmado2").append('<textarea style="width: 300px;" id="comentarioAvaluoFirmado">'+valuee.observacionRevisor+'</textarea>');
           
                 }

      }else if(valuee.orden==15){
                $("#indivisosC").val(valuee.nombredoc);
                $("#comenIndivisosC").val(valuee.comentario);
                $("#descargarIndivisosC").append('<a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                if (valuee.observacionRevisor == null) {
                  $("#comentarioIndivisosC2").append('<textarea style="width: 300px;" id="comentarioIndivisosC" placeholder="Agregar Observacion"></textarea>');
           
                 }else{
                    $("#comentarioIndivisosC2").append('<textarea style="width: 300px;" id="comentarioIndivisosC">'+valuee.observacionRevisor+'</textarea>');
           
                 }
      }else if (valuee.orden==12 || valuee.orden==32 || valuee.orden==33) {
                contaTipo = contaTipo + 1;
                 comentariosT="";
                if (valuee.comentario == null) {
                  comentariosT = "N/A"; 
                }else{
                  comentariosT=valuee.comentario;
                }


                if (valuee.observacionRevisor == null) {
                  if (valuee.etapa == 15) {
$("#tipologiass").append('<tr><th style="display:none;">'+valuee.tipologia+'</th><th>T-'+contaTipo+'</th><th>'+valuee.nombredoc+'</th><th>'+comentariosT+'</th><th style="width: 605px;"><a id="descargaConstruc"></a></th><th><textarea style="width: 300px; height: 50px;" id="comentarioT'+contaTipo+'" placeholder="Agregar Observacion"></textarea></th></tr>');
                  }else{
$("#tipologiass").append('<tr><th style="display:none;">'+valuee.tipologia+'</th><th>T-'+contaTipo+'</th><th>'+valuee.nombredoc+'</th><th>'+comentariosT+'</th><th style="width: 605px;"><a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a></th><th><textarea style="width: 300px; height: 50px;" id="comentarioT'+contaTipo+'" placeholder="Agregar Observacion"></textarea></th></tr>');
                  }
                }else{

                    if (valuee.etapa == 15) {
$("#tipologiass").append('<tr><th style="display:none;">'+valuee.tipologia+'</th><th>T-'+contaTipo+'</th><th>'+valuee.nombredoc+'</th><th>'+comentariosT+'</th><th style="width: 605px;"><a id="descargaConstruc"></a></th><th><textarea style="width: 300px; height: 50px;" id="comentarioT'+contaTipo+'">'+valuee.observacionRevisor+'</textarea></th></tr>');
            
                    }else{
$("#tipologiass").append('<tr><th style="display:none;">'+valuee.tipologia+'</th><th>T-'+contaTipo+'</th><th>'+valuee.nombredoc+'</th><th>'+comentariosT+'</th><th style="width: 605px;"><a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a></th><th><textarea style="width: 300px; height: 50px;" id="comentarioT'+contaTipo+'">'+valuee.observacionRevisor+'</textarea></th></tr>');
            
                    }                      

                   
                }

               
                 } 
                 //Total de Tipologias
              $("#totalTipologias").val(contaTipo);

              if (valuee.baldio == "t") {

                  
                  document.getElementById('tipologiasTT').style.display='none';
                  document.getElementById('fachada').style.display='block';
                   document.getElementById('titFachada').style.display='block';
                   
                   
                   
          ///////////***DOCUMENTOS CON PREDIO BALDIO*****/////////////

                   /*
                   99 TituloPropiedad   
                   98 BoletaPredial     
                   97 IdentificacionOficialdelpropietarioorepresentantelegal  
                   96 Planos   *
                   95 CroquisLocalizacion  
                   94 Otros   
                   83 Documentoacreditapropiedad                           78
                   82 Planoarquitectonicocroquisconstruccion               77
                   81 Planoarquitectonicodesuusoprivativo                  76
                   80 Planodelconjuntosuperficiesconstructivas             75
                   79 PlanosdeFactores                                     74 
                   */

                              if (valuee.orden == 99) {
                             $("#escrituratituloPropiedad").val(valuee.nombredoc);
                                   $("#comenescrituratituloPropiedad").val(valuee.comentario);
                                   $("#descargaescrituratituloPropiedad").html('');
                                   $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                    $("#comentarioescrituratituloPropiedad").html('');
                                     $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                      $("#comentarioescrituratituloPropiedad").html('');
                                       $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 98) {
                             $("#boletaPredial").val(valuee.nombredoc);
                                   $("#comentPredial").val(valuee.comentario);
                                   $("#descargarBoletaP").append('<a id="descargarBoletaP" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioPredial2").append('<textarea style="width: 300px;" id="comentarioPredial" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioPredial2").append('<textarea style="width: 300px;" id="comentarioPredial">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 97) {
                             $("#identificacionOf").val(valuee.nombredoc);
                                   $("#comenidentificacionOf").val(valuee.comentario);
                                   $("#descargaidentificacionOf").append('<a id="descargaidentificacionOf" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioidentificacionOf").append('<textarea style="width: 300px;" id="comentarioidentificacionOf2" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioidentificacionOf").append('<textarea style="width: 300px;" id="comentarioidentificacionOf2">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 96) { //MEDIDAS Y COLINDANCIAS
                            /* $("#planos").val(valuee.nombredoc);
                                   $("#comentplanos").val(valuee.comentario);
                                   $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }*/
                                    $("#croquis").val(valuee.nombredoc);
                                   $("#comenCroquis").val(valuee.comentario);
                                   $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis22" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{ 
                                       $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis22">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                                    
                           }else if (valuee.orden == 95) {
                             $("#croquisLocalizacion").val(valuee.nombredoc);
                                   $("#comencroquisLocalizacion").val(valuee.comentario);
                                   $("#descargacroquisLocalizacion").append('<a id="descargacroquisLocalizacion" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                    if (valuee.observacionRevisor == null) {
                                     $("#comentariocroquisLocalizacion").append('<textarea style="width: 300px;" id="comentarioCroquis" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentariocroquisLocalizacion").append('<textarea style="width: 300px;" id="comentarioCroquis">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 94) {
                             $("#otros").val(valuee.nombredoc);
                                   $("#comentariOtros").val(valuee.comentario);
                                   $("#descargaOtros").append('<a id="descargaOtros" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#observacionOtros2").append('<textarea style="width: 300px;" id="observacionOtros" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#observacionOtros2").append('<textarea style="width: 300px;" id="observacionOtros">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 83) {
                             
                             $("#tituloPropiedad").val(valuee.nombredoc);
                                   $("#comenPropiedad").val(valuee.comentario);
                                   $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }

                           }else if (valuee.orden == 82) { //CONSTRUCCION 
                             /*$("#croquis").val(valuee.nombredoc);
                                   $("#comenCroquis").val(valuee.comentario);
                                   $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis22" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{ 
                                       $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis22">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }*/
                                     $("#planos").val(valuee.nombredoc);
                                   $("#comentplanos").val(valuee.comentario);
                                   $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 81) {
                             $("#edificacionesUsoPriv").val(valuee.nombredoc);
                                   $("#comenedificacionesUsoPriv").val(valuee.comentario);
                                   $("#descargaredificacionesUsoPriv").append('<a id="descargaredificacionesUsoPriv" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioedificacionesUsoPriv").append('<textarea style="width: 300px;" id="comentarioedificacionesUsoPriv2" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioedificacionesUsoPriv").append('<textarea style="width: 300px;" id="comentarioedificacionesUsoPriv2">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 80) {
                             $("#superficiesConstr").val(valuee.nombredoc);
                                   $("#comensuperficiesConstr").val(valuee.comentario);
                                   $("#descargarsuperficiesConstr").append('<a id="descargarsuperficiesConstr" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentariosuperficiesConstr").append('<textarea style="width: 300px;" id="comentariosuperficiesConstr2" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentariosuperficiesConstr").append('<textarea style="width: 300px;" id="comentariosuperficiesConstr2">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 79) {
                             $("#factores").val(valuee.nombredoc);
                                   $("#comenfactores").val(valuee.comentario);
                                   $("#descargarfactores").append('<a id="descargarfactores" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentariofactores").append('<textarea style="width: 300px;" id="comentariofactores2" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{ 
                                       $("#comentariofactores").append('<textarea style="width: 300px;" id="comentariofactores2">'+valuee.observacionRevisor+'</textarea>');
                              
                                    }
                           }else if (valuee.orden == 78) {

                  $("#tituloPropiedad").val(valuee.nombredoc);
                         $("#comenPropiedad").val(valuee.comentario);
                         $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo">'+valuee.observacionRevisor+'</textarea>');
                    
                          }


                 }else if (valuee.orden == 90) {
                               $("#actaC").val(valuee.nombredoc);
                               
                               $("#comentactaC").val(valuee.comentario);
                               $("#descargarActaC").append('<a id="descargarActaC" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                               if (valuee.observacionRevisor == null) {
                                 $("#comentarioActa2").append('<textarea style="width: 300px;" id="comentarioActa" placeholder="Agregar Observacion"></textarea>');
                          
                                }else{
                                   $("#comentarioActa2").append('<textarea style="width: 300px;" id="comentarioActa">'+valuee.observacionRevisor+'</textarea>');
                          
                                }
                       }else if(valuee.orden == 120){

                    	   $("#fachadaNom").val(valuee.nombredoc); 
                           $("#comentarioFachada").val(valuee.comentario);
                           $("#descargarFachada").append('<a id="descargarFachada" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                            if (valuee.observacionRevisor == null) {
                             $("#observacionFachada").append('<textarea style="width: 300px;" id="observacionFachada2" placeholder="Agregar Observacion"></textarea>');
                      
                            }else{
                               $("#observacionFachada").append('<textarea style="width: 300px;" id="observacionFachada2">'+valuee.observacionRevisor+'</textarea>');
                      
                            }
                    	   
                    	   
                    	   
                       }/*else if (valuee.orden == 89) { 
                   $("#nombrleg").val(valuee.nombredoc);
                         
                         $("#comennombrleg").val(valuee.comentario);
                         $("#descarganombrleg").append('<a id="descarganombrleg" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentarionombrleg" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarionombrleg").append('<textarea style="width: 300px;" id="comentarionombrleg">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }*/
                       










                            ///////////////////*****/////////////


                }else if (valuee.baldio == "f") {
                  if (valuee.etapa == 1) {
                     document.getElementById('tipologiasTT').style.display='none';
                  }else{

                    document.getElementById('tipologiasTT').style.display='block';
                  }
                  document.getElementById('fachada').style.display='none'; 
                  document.getElementById('titFachada').style.display='none';
                  //document.getElementById('escriturap').style.display='none';
                  
                  
          ///////////***DOCUMENTOS CON PREDIO CONSTRUIDO*****/////////////

                  /*
           
          90 ActaConstitutiva -
          89 NombramientoLegal -
          88 BoletaPredial -
          87 IdentificacionOficialdelpropietarioorepresentantelegal -
          86 Planos-
          85 CroquisLocalizacion-
          84 Otros-

          78 Documentoacreditapropiedad                       83
          77 Planoarquitectonicocroquisconstruccion           82
          76 Planoarquitectonicodesuusoprivativo              81 
          75 Planodelconjuntosuperficiesconstructivas         80
          74 PlanosdeFactores                                 79
                  */
                  if (valuee.orden == 90) {
                   $("#actaC").val(valuee.nombredoc);
                         
                         $("#comentactaC").val(valuee.comentario);
                         $("#descargarActaC").append('<a id="descargarActaC" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#comentarioActa2").append('<textarea style="width: 300px;" id="comentarioActa" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioActa2").append('<textarea style="width: 300px;" id="comentarioActa">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 89) { 
                   $("#nombra").val(valuee.nombredoc);
                         
                         $("#comentaNombra").val(valuee.comentario);
                         $("#descargarNombra").append('<a id="descargarNombra" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioNombra").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioNombra").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 88) {
                   $("#boletaPredial").val(valuee.nombredoc);
                         $("#comentPredial").val(valuee.comentario);
                         $("#descargarBoletaP").append('<a id="descargarBoletaP" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioPredial2").append('<textarea style="width: 300px;" id="comentarioPredial" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioPredial2").append('<textarea style="width: 300px;" id="comentarioPredial">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 87) { 
                   $("#identificacionOf").val(valuee.nombredoc);
                         
                         $("#comenidentificacionOf").val(valuee.comentario);
                         $("#descargaidentificacionOf").append('<a id="descargaidentificacionOf" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#comentarioidentificacionOf").append('<textarea style="width: 300px;" id="comentarioidentificacionOf2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioidentificacionOf").append('<textarea style="width: 300px;" id="comentarioidentificacionOf2">'+valuee.observacionRevisor+'</textarea>');
                    
                          } 
                 }else if (valuee.orden == 85) { // planos - medidas y colindancias
                   $("#croquisLocalizacion").val(valuee.nombredoc);
                         
                         $("#comencroquisLocalizacion").val(valuee.comentario);
                         $("#descargacroquisLocalizacion").append('<a id="descargacroquisLocalizacion" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentariocroquisLocalizacion").append('<textarea style="width: 300px;" id="comentarioCroquis223" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentariocroquisLocalizacion").append('<textarea style="width: 300px;" id="comentarioCroquis223">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 86) {// croquiz de localizacion
                   $("#croquis").val(valuee.nombredoc);
                         $("#comenCroquis").val(valuee.comentario);
                         $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 84) {
                   $("#otros").val(valuee.nombredoc);
                         $("#comentariOtros").val(valuee.comentario);
                         $("#descargaOtros").append('<a id="descargaOtros" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#observacionOtros2").append('<textarea style="width: 300px;" id="observacionOtros" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#observacionOtros2").append('<textarea style="width: 300px;" id="observacionOtros">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 83) {

                  $("#tituloPropiedad").val(valuee.nombredoc);
                         $("#comenPropiedad").val(valuee.comentario);
                         $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo">'+valuee.observacionRevisor+'</textarea>');
                    
                          }


                 }else if (valuee.orden == 78) {
                   
                   $("#tituloPropiedad").val(valuee.nombredoc);
                         $("#comenPropiedad").val(valuee.comentario);
                         $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioTitulo2").append('<textarea style="width: 300px;" id="comentarioTitulo">'+valuee.observacionRevisor+'</textarea>');
                    
                          }

                 }else if (valuee.orden == 77) { 
                   $("#planos").val(valuee.nombredoc);
                         
                         $("#comentplanos").val(valuee.comentario);
                         $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                           if (valuee.observacionRevisor == null) {
                           $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos">'+valuee.observacionRevisor+'</textarea>');
                    
                          } 
                 }else if (valuee.orden == 76) {  //uso privativo
                   $("#edificacionesUsoPriv").val(valuee.nombredoc);
                         
                         $("#comenedificacionesUsoPriv").val(valuee.comentario);
                         $("#descargaredificacionesUsoPriv").append('<a id="descargaredificacionesUsoPriv" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentarioedificacionesUsoPriv").append('<textarea style="width: 300px;" id="comentarioedificacionesUsoPriv2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentarioedificacionesUsoPriv").append('<textarea style="width: 300px;" id="comentarioedificacionesUsoPriv2">'+valuee.observacionRevisor+'</textarea>');
                    
                          } 
                 }else if (valuee.orden == 75) { 
                   $("#superficiesConstr").val(valuee.nombredoc);
                         
                         $("#comensuperficiesConstr").val(valuee.comentario);
                         $("#descargarsuperficiesConstr").append('<a id="descargarsuperficiesConstr" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentariosuperficiesConstr").append('<textarea style="width: 300px;" id="comentariosuperficiesConstr2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentariosuperficiesConstr").append('<textarea style="width: 300px;" id="comentariosuperficiesConstr2">'+valuee.observacionRevisor+'</textarea>');
                    
                          } 
                 }else if (valuee.orden == 74) { 
                   $("#factores").val(valuee.nombredoc);
                         
                         $("#comenfactores").val(valuee.comentario);
                         $("#descargarfactores").append('<a id="descargarfactores" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                         if (valuee.observacionRevisor == null) {
                           $("#comentariofactores").append('<textarea style="width: 300px;" id="comentariofactores2" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentariofactores").append('<textarea style="width: 300px;" id="comentariofactores2">'+valuee.observacionRevisor+'</textarea>');
                    
                          } 
                 }



                 ////////////***********/////////////////////
                  
                  
                  
                  
                  
                }

      


			if (valuee.tipod == 1) {
        var nom=valuee.nombredenominacion;
        var apa=valuee.apaterno;
        var ama=valuee.amaterno;
        var nombreCamp=nom+" "+apa+" "+ama;
        $("#contri").val(nombreCamp); 
        $("#propietario").val(nombreCamp);
       // nombredenominacion,a.apaterno,a.amaterno
        document.getElementById('acta').style.display='none';
				//persona fisica 
        


			}else if (valuee.tipod == 2) {
        $("#contri").val(valuee.nombredenominacion); 
        $("#propietario").val(valuee.nombredenominacion);
        //document.getElementById('acta').style.display='block'; 
				//persona moral
				
			}
			
      //predio
      $("#folioPresenta").val(folioCompleto2); 

      var ca=valuee.calle; 
      var nE=valuee.no_exterior; 
      var nI=valuee.no_interior; 
      var col=valuee.colonia;
      var mun=valuee.nommpio;
      var cp=valuee.codigo_p;
      var ref=valuee.referencia1;
      var ubi= ca+" No.EXTERIOR: "+nE+" No.INTERIOR: "+nI+" COL."+col+" ,"+mun+" ;"+cp;

      $("#ubicacion2").val(ubi);
      $("#claveCa2").val(valuee.cve_catastral); 
           


		});				
      });
		   
      });

///////*************************archivos y tipologias


var anioxc = $("#anioDic").val();
 //predio 2   idI o funciona aun 
     var idI = $("#idInmu").val();  
    //Total de inmuebles a revisar
    var folioxcadf = $("#gva").val();
    $.post("../../acceso",{acceess:34,idI:idI,anio:anioxc,folioxcadf:folioxcadf},
      function(n){
       console.log('inmuebles');
         $("#cc").val(n);  

         var folioD =  $("#cc").val();
         var clavecatastral = $("#idInmu").val();

      $.post("../../acceso",{acceess:39,folioD:folioD,clavecatastral:clavecatastral},function(z){
         
              $(z).each(function(key,valuee){ 


                 $("#prcentaje").val(valuee.ava_porcen); 
                  $("#valorC2").val(valuee.valorcomun);

             $("#tipoInmueble").val('-'); 
             //$("#tipoInmueble").val(valuee.tipoinmueble); 
             $("#supTerreno").val(valuee.superficie); 

              var valor_terrenoPro = new Intl.NumberFormat('es-MX').format(valuee.valorpropio); 
              var valor_terrenoComn = new Intl.NumberFormat('es-MX').format(valuee.valorcomun); 
               
             $("#valorP").val(valor_terrenoPro);
             $("#valorC").val(valor_terrenoComn);
             $("#frente").val(valuee.frente);
             $("#fondo").val(valuee.fondo);
             $("#altura").val(valuee.altura);
             $("#areaInscrita").val(valuee.areainscrita);
             $("#areaTotal").val(valuee.areatotal);
             $("#posicion").val('');
             $("#aprovechable").val(valuee.aprovechable); 
             
             $("#factorposicion").val(valuee.factorposicion);
            //PARA EVALUAR LA POSICION DEL PREDIO DE ACUERDO CON EL FACTOR DE POSICION QUE YA SE ALMACENA EN LA BASE DE DATOS
            //FALTA EVALUAR EL PREDIO "FRENDES NO CONTIGUOS" YA QUE EL VALOR DEL FACTOR ES EL MIMSO QUE EL PREDIO EZQUINERO (1.10)
/*
            if (valuee.factorposicion == 1) {
              $("#posicion").val('INTERMEDIO');
             }else if (valuee.factorposicion == 2) {
              $("#posicion").val('ESQUINERO');
             }else if (valuee.factorposicion  == 3 ) {
              $("#posicion").val('CABECERO');
             }else if (valuee.factorposicion == 4) {
              $("#posicion").val('MANZANERO');
             }else if (valuee.factorposicion == 5) {
              $("#posicion").val('FRENTES NO CONTI');
             }else if (valuee.factorposicion == 6) {
              $("#posicion").val('INTERIOR');
             }else{
              $("#posicion").val('ERROR CONTACTE AL ADMINISTRADOR');
             }  */        

             
             if (valuee.factorposicion > 0 && valuee.factorposicion <= 0.5) {
              $("#posicion").val('INTERIOR');
             }else if (valuee.factorposicion >= 1 && valuee.factorposicion < 1.10) {
              $("#posicion").val('INTERMEDIO');
             }else if (valuee.factorposicion >= 1.11 && valuee.factorposicion < 1.20) {
              $("#posicion").val('ESQUINERO');
             }else if (valuee.factorposicion >= 1.20 && valuee.factorposicion < 1.30) {
              $("#posicion").val('CABECERO');
             }else if (valuee.factorposicion >= 1.30) {
              $("#posicion").val('MANZANERO');
             }
             


             $("#factorfrente").val(valuee.factorfrente); 
             $("#factorfondo").val(valuee.factorfondo); 
             $("#factorirregularidad").val(valuee.factorirregularidad); 
             $("#factorarea").val(valuee.factorarea); 
             $("#factortopografia").val(valuee.factortopografia);
             $("#factorrestriccion").val(valuee.factorrestriccion);  

             var valor_terren = new Intl.NumberFormat('es-MX').format(valuee.valorpropio); 
             $("#valorTerreno").val(valor_terren);
             var factorAplicado2 = valuee.factorposicion*valuee.factorfrente*valuee.factorfondo*valuee.factorirregularidad*valuee.factorarea*valuee.factortopografia*valuee.factorrestriccion;
               
                if (factorAplicado2 < 0.50000) {
                  factorAplicado2 = 0.50000;
                  $("#factorAplicado").val(factorAplicado2);
                }else{
                  $("#factorAplicado").val(factorAplicado2);
                }
             

    });
        
      });

      //Tipologias
var conservacion2="";
var tipoConstruccion2="";
var privada=0;

var especial=0;
var comun=0;
var valorTotalT=0;
var valorTerre=0;
var redondeado=0;
var valor_constru=0;
var valor_privada=0;
var valor_especial=0;
var valor_comun=0; 
var valor_tot=0;
var valor_redon=0;

  var valorTerrenoCondominios=0;
  var porcentajeCondominio =0;
  var porcientoCon =0;
  var  pocientoConTotal=0;
  var   valorTerrenoCondominios2 = 0;
  var l = 0; 
  var porcentajeCondominio2 = 0;
  var porcientoCon2 = 0; 
  var pocientoConTotal2=0;

    $.post("../../acceso",{acceess:38,folioD:folioD,clavecatastral:clavecatastral},function(z){

      if (z == "10" || z == 10) {

         var valorTerrenoSinConstruc =  $("#valorTerreno").val();
            $("#valorTT").val(valorTerrenoSinConstruc); 

           


      }else{

            $(z).each(function(key,valuee){  
          

        if (valuee.tipoconstruccion == 1) {
          tipoConstruccion2="PRIVADA";
           privada = parseFloat(valuee.valorconstruccion) + privada;
           valor_privada = new Intl.NumberFormat('es-MX').format(privada); 
           $("#privada").val(valor_privada); 


           valorTerre = valuee.valorpropio;  
        valorTotalT = parseFloat(privada) + parseFloat(especial) + parseFloat(valorTerre);
        valor_tot = new Intl.NumberFormat('es-MX').format(valorTotalT); 




        }else if (valuee.tipoconstruccion == 3) {
          tipoConstruccion2="ESPECIAL";
           especial = parseFloat(valuee.valorconstruccion) + especial;
            valor_especial = new Intl.NumberFormat('es-MX').format(especial); 
           $("#especial").val(valor_especial); 


           valorTerre = valuee.valorpropio;  
        valorTotalT = parseFloat(privada) + parseFloat(especial) + parseFloat(valorTerre) ;
        valor_tot = new Intl.NumberFormat('es-MX').format(valorTotalT); 

        }else if (valuee.tipoconstruccion == 2) { //VERIFICAR SI EL DOS ES PARA COMUNES Y SI EXISTEN MAS NUMEROS
          
          tipoConstruccion2="COMUNES";
           comun = parseFloat(valuee.valorconstruccion) + comun;
           valor_comun = new Intl.NumberFormat('es-MX').format(comun); 
           //$("#comun").val(valor_comun);

        valorTerrenoCondominios = $("#valorC2").val(); 
        valorTerrenoCondominios2 = new Intl.NumberFormat('es-MX').format(valorTerrenoCondominios); 
         $("#valorTerreno").val(valorTerrenoCondominios2);
      
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        l = comun; 
        porcentajeCondominio = $("#prcentaje").val();
        porcentajeCondominio2 = parseFloat(porcentajeCondominio);
        var avb = 100;

        porcientoCon = porcentajeCondominio2 / avb;
        porcientoCon2 = parseFloat(porcientoCon); 

        pocientoConTotal = parseFloat(l) * porcientoCon2;
           
          
           pocientoConTotal2 = new Intl.NumberFormat('es-MX').format(pocientoConTotal); 

         $("#comun").val(pocientoConTotal2);
        
       // valorTerre = $("#valorTerreno").val();
        valorTerre = valuee.valorpropio;  
        valorTotalT = parseFloat(privada) + parseFloat(especial) + parseFloat(valorTerre) + parseFloat(pocientoConTotal) + parseFloat(valorTerrenoCondominios);
        valor_tot = new Intl.NumberFormat('es-MX').format(valorTotalT); 

         ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }/*else{

        

          var valorTerrenoSinConstruc =  $("#valorTerreno").val();
            $("#valorTT").val(valorTerrenoSinConstruc); 
        }*/
    
        
        

        $("#valorTT").val(valor_tot);

       redondeado = Math.round(valorTotalT);
       valor_redon = new Intl.NumberFormat('es-MX').format(redondeado); 
       $("#redondeado").val(valor_redon);

      valor_constru = new Intl.NumberFormat('es-MX').format(valuee.valorconstruccion);

      $("#tipologiasP").append('<tr><td style="text-align: center;">T-'+valuee.tipologia+'</td><td style="text-align: center; width: 300px;">'+tipoConstruccion2+'</td><td style="text-align: center;">'+valuee.uso+'</td><td style="text-align: center;">'+valuee.clase+'</td><td style="text-align: center;">'+valuee.categoria+'</td><td style="text-align: center; width: 300px;">'+valuee.superficie+'</td><td colspan="2" style="width: 400px; text-align: center;">$'+valor_constru+'</td></tr>'); 
      
      //SACAR LA CONSERVACION DE ACURDO AL FACTOR DE CONSERVACION O DEL CAMPO CON_ESTADO PERO SE APLICA SU VALORACION ES DECIR 1=BUENO

      if (valuee.factorconservacion > 0 && valuee.factorconservacion <= 0.08000) {
          conservacion2="Ruinoso";
      }else if (valuee.factorconservacion > 0.08000 && valuee.factorconservacion <= 0.40000) {
          conservacion2="MALO";
      }else if (valuee.factorconservacion > 0.40000 && valuee.factorconservacion <= 0.75000) {
          conservacion2="REGULAR";
      }else if (valuee.factorconservacion > 0.75000 && valuee.factorconservacion <= 0.90000) {
          conservacion2="NORMAL";
      }else if (valuee.factorconservacion > 0.90000 && valuee.factorconservacion <= 1) {
          conservacion2="BUENO";
      }else if (valuee.factorconservacion > 1) {
          conservacion2="BUENO";
      }

      var factorAplicadoT= valuee.factoredad*valuee.factorconservacion*valuee.factorniveles;

      $("#tipologias2").append(' <tr><td style="text-align: center;">T-'+valuee.tipologia+'</td><td style="text-align: center; width: 200px;">'+valuee.edad+'</td><td style="text-align: center;">'+valuee.factoredad+'</td><td style="text-align: center; width: 300px;">'+conservacion2+'</td><td style="text-align: center; width: 200px;">'+valuee.factorconservacion+'</td><td style="text-align: center;">'+valuee.niveles+'</td><td style="text-align: center;">'+valuee.factorniveles+'</td><td style="text-align: center; width: 300px;">'+factorAplicadoT+'</td></tr>');
  

    });

      }
         
        });

         });     



});

function liberado(){ 

 var archivoHJSVErdes = $('input[name=optradio]:checked').val(); 

   if (archivoHJSVErdes == 1) {
      document.getElementById('alertaa').style.display='none'; 
      document.getElementById('alertaa2').style.display='block'; 

         }else{

           var idm =   $('#idG').val();
  var ff =   $('#cc').val();
  var ObservacionPre =  $('#ObservacionPre').val();
  var ObservacionPre2 = ObservacionPre.trim();
    //cambiar a etapa 5 y guardar observacion general
 $.post("../../acceso",{acceess:30,idm :idm,ObservacionPre2:ObservacionPre2,ff:ff,archivoHJSVErdes:archivoHJSVErdes},function(yz){
      console.log(yz);
    //  document.getElementById('id05').style.display='block'; 
      //location.reload();
        location.href ="../AdminAutorizados/7";  

    });

         }

}


function rechazoG(){ 

   var archivoHJSVErdes = $('input[name=optradio]:checked').val(); 

           var idm =   $('#idG').val();
  var ff =   $('#cc').val();
  var ObservacionPre =  $('#ObservacionPre').val();
  var ObservacionPre2 = ObservacionPre.trim();
    //cambiar a etapa 5 y guardar observacion general
 $.post("../../acceso",{acceess:28,ff:ff,idm:idm,ObservacionPre2:ObservacionPre2,archivoHJSVErdes:archivoHJSVErdes},function(yz){
      console.log(yz);
     // document.getElementById('id06').style.display='block'; 
    
     location.href ="../AdminAutorizados/13";  

    });

         

}

function autorizado(){

	  var archivoHJSVErdes = $('input[name=optradio]:checked').val(); 

	        if (archivoHJSVErdes == 1) {
	          //archivo no valido
	          document.getElementById('alertaa').style.display='none'; 
	         document.getElementById('alertaa2').style.display='block'; 
	        }else{
	          //archivo  valido

	    var idm =   $('#idG').val();
	      var ff =   $('#cc').val();
	    var ObservacionPre =  $('#ObservacionPre').val();
	    var ObservacionPre2 = ObservacionPre.trim();
	      //cambiar a etapa 5 y guardar observacion general
	   $.post("../../acceso",{acceess:29,idm:idm,ObservacionPre2:ObservacionPre2,ff:ff },function(yz){
	        console.log(yz);
	        //document.getElementById('id04').style.display='block'; 
	      //  $('#alertaStatus').html("");
	       // $('#alertaStatusMotivo').html("");
	      //  location.reload();
           location.href ="../DicPendientesAdmonP/6";  
	      //document.getElementById('alertaStatus').append('Dictamen AUTORIZADO, pasa a etapa 6');
	      //document.getElementById('alertaStatusMotivo').append('En espera a que el Administrador General lo libere para poder generar las Ordenes de Pago.');
	              

	      });
	        }


	}


function rechazoG2(){
      document.getElementById('id06').style.display='none'; 
   location.href ="../AdminGris/";
}

function o(){
      document.getElementById('id04').style.display='none'; 
   location.href ="../BusquedaAdmin/";
}


function liberado2(){
      document.getElementById('id05').style.display='none'; 
   location.href ="../AdminGris/";
}

function preRechazo(){

	  var archivoHJSVErdes = $('input[name=optradio]:checked').val(); 

		  var idm =   $('#idG').val(); 
		   var fol =   $('#cc').val();
		  var ObservacionPre =  $('#ObservacionPre').val();
		  var ObservacionPre2 = ObservacionPre.trim();
		    //cambiar a etapa 5 y guardar observacion general
		 $.post("../../acceso",{acceess:31,idm :idm,ObservacionPre2:ObservacionPre2,fol:fol,archivoHJSVErdes:archivoHJSVErdes },function(yz){
		      console.log(yz);
		      //document.getElementById('id03').style.display='block'; 
		     /* document.getElementById('alertaStatus').append('El dictamen pasa a etapa 4');
		                 document.getElementById('alertaStatusMotivo').append('Por tal motivo el revisor atendera las observaciones generadas.');
		                  $("#alertaa").fadeOut(9000); */
		                 location.href ="../DicPendientesAdmonP/12"; 

		    });
		}

function preRechazo2(){
  document.getElementById('id03').style.display='none'; 
   location.href ="../BusquedaAdmin/";
}

function elitips(){
  var clavec = $('#idG').val(); 
  var folio = $('#cc').val(); 
  var dato = "";
  var e="";
  var aa ="";
   //para seleccionar una opcion

      $('#RepFotComplT tbody tr').each(function() {
              dato = $(this).find("th:eq(0)").text();
              e = $(this).find('textarea').val();
              console.log(dato.trim());
               console.log(e.trim());
               aa = e.trim();

              pahtv1.vector1.push({
      id_t : dato,
      comel: aa
  });  
      });
      console.log(pahtv1.vector1);
 $.post("../../acceso",{acceess:40,vectorss:pahtv1.vector1,clavec:clavec,folio:folio},function(n){ 
  console.log(n); 
   document.getElementById('alertaa2').style.display='none'; 
      document.getElementById('alertaa').style.display='none'; 
      document.getElementById('alertaaCom').style.display='block';  
    
  }); 





}


function save_rev(){
var idm =   $('#idG').val();
var fo =  $('#cc').val();
var comentarioDicta = $('#comentarioDicta').val();
var comentarioConstruc = $('#comentarioConstruc').val();
var comentarioAvaluo = $('#comentarioAvaluoFirmado').val();
var comentarioEscritura = $('#comentarioescrituratituloPropiedad2').val(); 
var comentarioCroquis = $('#comentarioCroquis').val();
var comentarioPredial = $('#comentarioPredial').val();
var comentarioPlanos = $('#comentarioPlanos').val();
var comentarioIndivisos = $('#comentarioIndivisosC').val();
var comentarioActa = $('#comentarioActa').val();
var comentariOtros = $('#observacionOtros').val();
var comentarioGeneral = $('#comentarioGeneral').val();
var comentarioGReporte = $('#comentarioGReporte').val();
var comentarioDocAcreditaP = $('#comentarioTitulo').val();
var comentarioidentificacionOf2 = $('#comentarioidentificacionOf2').val();
var comentarioCroquis22 = $('#comentarioCroquis22').val();
var comentarioedificacionesUsoPriv2 = $('#comentarioedificacionesUsoPriv2').val();
var comentariosuperficiesConstr2 = $('#comentariosuperficiesConstr2').val();
var comentariofactores2 = $('#comentariofactores2').val();
var comentarioCroquis223 = $('#comentarioCroquis223').val();
var comentarioFachada = $('#observacionFachada2').val();
var comentariocomennombrleg2 =$('#comentariocomennombrleg2').val();



if (comentariofactores2 == "") {
  comentariofactores2="N/A";
  
 }

 if (comentariosuperficiesConstr2 == "") {
  comentariosuperficiesConstr2="N/A";
  
 }

 if (comentarioedificacionesUsoPriv2 == "") {
  comentarioedificacionesUsoPriv2="N/A";
  
 }
 
 if (comentarioCroquis22 == "") {
  comentarioCroquis22="N/A";
  
 }

 if (comentarioidentificacionOf2 == "") {
  comentarioidentificacionOf2="N/A";
  
 }

 if (comentarioDocAcreditaP == "") {
  comentarioDocAcreditaP="N/A";
  
 }

 if (comentarioDicta == "") {
  comentarioDicta="N/A";
  
 }

 if (comentarioConstruc == "") {
  comentarioConstruc="N/A";
  
 }

 if (comentarioAvaluo == "") {
  comentarioAvaluo="N/A";
  
 }

 if (comentarioEscritura == "") {
  comentarioEscritura="N/A";
  
 }

 if (comentarioCroquis == "") {
  comentarioCroquis="N/A";
  
 }

 if (comentarioPredial == "") {
  comentarioPredial="N/A";
  
 }

 if (comentarioPlanos == "") {
  comentarioPlanos="N/A";
  
 }

 if (comentarioIndivisos == "") {
  comentarioIndivisos="N/A";
  
 }

 if (comentarioActa == "") {
  comentarioActa="N/A";
  
 }

 if (comentariOtros == "") {
  comentariOtros="N/A";
  
 }

 if (comentarioGeneral == "") {
  comentarioGeneral="N/A";
  
 }

 if (comentarioGReporte == "") {
  comentarioGReporte="N/A";
  
 }

  if (comentarioCroquis223 == "") {
  comentarioCroquis223 ="N/A";
  
 }

 if (comentarioFachada == "") {
  comentarioFachada ="N/A";
  
 }

 if (comentariocomennombrleg2 == "") {
  comentariocomennombrleg2 = "N/A";

 }
   $.post("../../acceso",{acceess:41,idm:idm,fo:fo,comentarioDicta:comentarioDicta,
        comentarioConstruc:comentarioConstruc,comentarioAvaluo:comentarioAvaluo,comentarioCroquis223:comentarioCroquis223,
      comentarioEscritura:comentarioEscritura,comentarioCroquis:comentarioCroquis,comentariofactores2:comentariofactores2,
    comentarioPredial:comentarioPredial,comentarioPlanos:comentarioPlanos,comentariosuperficiesConstr2:comentariosuperficiesConstr2,
    comentarioIndivisos:comentarioIndivisos,comentarioActa:comentarioActa,comentarioedificacionesUsoPriv2:comentarioedificacionesUsoPriv2,
    comentariOtros:comentariOtros,comentarioGeneral:comentarioGeneral,comentarioCroquis22:comentarioCroquis22,
    comentarioGReporte:comentarioGReporte,comentarioDocAcreditaP:comentarioDocAcreditaP,comentarioidentificacionOf2:comentarioidentificacionOf2,
    comentarioFachada:comentarioFachada,comentariocomennombrleg2:comentariocomennombrleg2},function(yz){
      console.log(yz); 
      document.getElementById('alertaa2').style.display='none'; 
      document.getElementById('alertaa').style.display='none'; 
      document.getElementById('alertaaCom').style.display='block'; 



    });

} 

