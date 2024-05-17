


$(document).ready(function () {	



    var fol = $("#cc").val();
    var clavC = $("#idInmu").val();    

      $.post("../../../../../acceso",{acceess:33,clavC:clavC,fol:fol},
      function(z){       
       
       //console.log(z); 
        var ruta="https://dictamunigecem.edomex.gob.mx/dictamun/files/documentos/";  

         var conta=0;
            $(z).each(function(key,valuee){
              conta = conta + 1; 

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



          if (conta == 1) {

              $("#comentarioMunicipioRevisor").val(valuee.obs_municipio); 

             $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
           
             if (valuee.etapa == 1) {
              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 1 (Registro del dictamen) ');
             $("#alertaStatusMotivo").append('Por tal motivo solo se muestran los apartados de "Aviso" y "Dictamen"');
             document.getElementById('archivosRecibidosT').style.display='none'; 
             document.getElementById('tipologiasTT').style.display='none'; 
             document.getElementById('prediosT').style.display='none'; 


             }else if (valuee.etapa == 3) {

                document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 3 (Pendiente de Asignar revisor) ');
             $("#alertaStatusMotivo").append('El dictaminador ya subio los archivos correspondientes y esta en espera de que sea asignado un revisor.');


             }else if (valuee.etapa == 4 ) {
               document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 4 (En Revision por parte del IGECEM) ');
             $("#alertaStatusMotivo").append('Por tal motivo ya cuenta con archivos e informacion requerida para ser revisado.');



             }else if (valuee.etapa == 5) {
                document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 5 (Observado por revisor/Subir archivo en hojas verdes) ');
             $("#alertaStatusMotivo").append('Por tal motivo el dictaminador ya puede subir su archivo en hojas verdes');


             }else if (valuee.etapa == 51) {
              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 5.1 (Con archivo en hojas verdes) ');
             $("#alertaStatusMotivo").append('En espera de que el revisor continue con el proceso');

             }else if (valuee.etapa == 52) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 5.2 (Pre autorizado / archivo valido) ');
             $("#alertaStatusMotivo").append('Por tal motivo el dictamen pasa al Administrador.');


             }else if (valuee.etapa == 53) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 5.3 (Archivo en hojas verdes no valido) ');
             $("#alertaStatusMotivo").append('Por tal motivo el dictaminador tendra que actualizar el archivo.');


             }else if (valuee.etapa == 6) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 6 (Autorizado) ');
             $("#alertaStatusMotivo").append('Dictamen autorizado por el Administrador Pagos, en espera a que sea liberado');


             }else if (valuee.etapa == 7) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 7 (Liberado / pendiente de pago) ');
             $("#alertaStatusMotivo").append('En espera de que el dictamen sea pagado.');


             }else if (valuee.etapa == 11) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 11 (Observado por revisor) ');
             $("#alertaStatusMotivo").append('Por tal motivo el dictaminador tendra que acatar las observacinones realizadas.');


             }else if (valuee.etapa == 12) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 12 (Rechazado por administrador pagos) ');
             $("#alertaStatusMotivo").append('Por tal motivo el revisor tendra que acatar las observaciones realizadas.');


             }else if (valuee.etapa == 13) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 13 (Rechazado por administrador general) ');
             $("#alertaStatusMotivo").append('Por tal motivo el administrador pagos tendra que acatar las observaciones realizadas.');


             }else if (valuee.etapa == 15) {

              document.getElementById('alertaa').style.display='block'; 
             $("#alertaStatus").append('El dictamen se encuentra en Etapa 15 (Validado) ');
             $("#alertaStatusMotivo").append('Por tal motivo el dictamen ya se encuentra con su pago aprobado.');


             }


            
          }

          //aviso

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
                conta = conta + 1;
                 comentariosT="";
                if (valuee.comentario == null) {
                  comentariosT = "N/A"; 
                }else{
                  comentariosT=valuee.comentario;
                }


                if (valuee.observacionRevisor == null) {
                   $("#tipologiass").append('<tr><th style="display:none;">'+valuee.tipologia+'</th><th>T-'+conta+'</th><th>'+valuee.nombredoc+'</th><th>'+comentariosT+'</th><th style="width: 605px;"><a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a></th><th><textarea style="width: 300px; height: 50px;" id="comentarioT'+conta+'" placeholder="Agregar Observacion"></textarea></th></tr>');
            
                }else{
                   $("#tipologiass").append('<tr><th style="display:none;">'+valuee.tipologia+'</th><th>T-'+conta+'</th><th>'+valuee.nombredoc+'</th><th>'+comentariosT+'</th><th style="width: 605px;"><a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a></th><th><textarea style="width: 300px; height: 50px;" id="comentarioT'+conta+'">'+valuee.observacionRevisor+'</textarea></th></tr>');
            
                }

               
                 } 
                 //Total de Tipologias
              $("#totalTipologias").val(conta);
          
               
                     

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
                                   $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioescrituratituloPropiedad").append('<textarea style="width: 300px;" id="comentarioescrituratituloPropiedad2" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
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
                           }else if (valuee.orden == 96) {
                             $("#planos").val(valuee.nombredoc);
                                   $("#comentplanos").val(valuee.comentario);
                                   $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{
                                       $("#comentarioPlanos2").append('<textarea style="width: 300px;" id="comentarioPlanos">'+valuee.observacionRevisor+'</textarea>');
                              
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

                           }else if (valuee.orden == 82) {
                             $("#croquis").val(valuee.nombredoc);
                                   $("#comenCroquis").val(valuee.comentario);
                                   $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                                   if (valuee.observacionRevisor == null) {
                                     $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis22" placeholder="Agregar Observacion"></textarea>');
                              
                                    }else{ 
                                       $("#comentarioCroquis2").append('<textarea style="width: 300px;" id="comentarioCroquis22">'+valuee.observacionRevisor+'</textarea>');
                              
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
                         
                         
                         
                       }
                       










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
                 }else if (valuee.orden == 86) { 
                   $("#croquisLocalizacion").val(valuee.nombredoc);
                         
                         $("#comencroquisLocalizacion").val(valuee.comentario);
                         $("#descargacroquisLocalizacion").append('<a id="descargacroquisLocalizacion" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
                          if (valuee.observacionRevisor == null) {
                           $("#comentariocroquisLocalizacion").append('<textarea style="width: 300px;" id="comentarioCroquis223" placeholder="Agregar Observacion"></textarea>');
                    
                          }else{
                             $("#comentariocroquisLocalizacion").append('<textarea style="width: 300px;" id="comentarioCroquis223">'+valuee.observacionRevisor+'</textarea>');
                    
                          }
                 }else if (valuee.orden == 85) {
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
                 }else if (valuee.orden == 76) { 
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

///////*************************archivos y tipologias

         var folioD =  $("#cc").val();
         var clavecatastral = $("#idInmu").val();

          $.post("../../../../../acceso",{acceess:39,folioD:folioD,clavecatastral:clavecatastral},function(z){
          //  console.log(z); 

           $(z).each(function(key,valuee){ 

             $("#tipoInmueble").val('-'); 
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

              $.post("../../../../../acceso",{acceess:38,folioD:folioD,clavecatastral:clavecatastral},function(z){

                //console.log(z); 
                    $(z).each(function(key,valuee){  
                       if (valuee.tipoconstruccion == 1) {
          tipoConstruccion2="PRIVADA";
           privada = parseFloat(valuee.valorconstruccion) + privada;
           valor_privada = new Intl.NumberFormat('es-MX').format(privada); 
           $("#privada").val(valor_privada); 
        }else if (valuee.tipoconstruccion == 3) {
          tipoConstruccion2="ESPECIAL";
           especial = parseFloat(valuee.valorconstruccion) + especial;
            valor_especial = new Intl.NumberFormat('es-MX').format(especial); 
           $("#especial").val(valor_especial); 
        }else if (valuee.tipoconstruccion == 2) { //VERIFICAR SI EL DOS ES PARA COMUNES Y SI EXISTEN MAS NUMEROS
          tipoConstruccion2="COMUNES";
           comun = parseFloat(valuee.valorconstruccion) + comun;
           valor_comun = new Intl.NumberFormat('es-MX').format(comun); 
           $("#comun").val(valor_comun); 
        }


       // valorTerre = $("#valorTerreno").val();
        valorTerre = valuee.valorpropio;  
        valorTotalT = parseFloat(privada) + parseFloat(especial) + parseFloat(valorTerre) + parseFloat(comun);
        valor_tot = new Intl.NumberFormat('es-MX').format(valorTotalT); 
        

        $("#valorTT").val(valor_tot);

       redondeado = Math.round(valorTotalT);
       valor_redon = new Intl.NumberFormat('es-MX').format(redondeado); 
       $("#redondeado").val(valor_redon);

      valor_constru = new Intl.NumberFormat('es-MX').format(valuee.valorconstruccion);

      $("#tipologiastblavg").append('<tr><td style="text-align: center;">T-'+valuee.tipologia+'</td><td style="text-align: center; width: 300px;">'+tipoConstruccion2+'</td><td style="text-align: center;">'+valuee.uso+'</td><td style="text-align: center;">'+valuee.clase+'</td><td style="text-align: center;">'+valuee.categoria+'</td><td style="text-align: center; width: 300px;">'+valuee.superficie+'</td><td colspan="2" style="width: 400px; text-align: center;">$'+valor_constru+'</td></tr>'); 
      
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


              });








});


  function save_rev(){



}

