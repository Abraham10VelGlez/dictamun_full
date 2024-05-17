
$(document).ready(function () {

  $("#killer").click(function(){
    $.post("../../acceso",{acceess:102},function(z){
      if( z == "23000" ){
        alert(" usuario activo ");
      }else{

        location.href=z;
      }
    });
  });


 var anioxc = $("#anioDic").val();
      var idI = $("#idInmu").val();

       var gva = $("#ffff").val();

    //Total de inmuebles a revisar
    $.post("../../acceso",{acceess:37,idI:idI,anio:anioxc,fffff:gva},
      function(n){
         $("#cc").val(gva);
         //consultar informacion de inmuebles en vista revisor
      var fol = gva;
      var clavC = $("#idInmu").val();
       $.post("../../acceso",{acceess:36,clavC:clavC, fol:fol},
      function(z){

        var conta=0;
        var conTipologias = 0;
            $(z).each(function(key,valuee){
              //Aviso
      var fol2 = gva;
      var inicio = "AD/";
      var inicio2 = "DIP/";
      var anio= valuee.aniodictamen;
      var folioCompleto = inicio+fol2+"/"+idI+"/"+anio;
      $("#folioI").val(folioCompleto);

      $("#anioD").val(valuee.aniodictamen);
      $("#ObservacionMun").val(valuee.obs_municipio);
      $("#rfcC").val(valuee.rfc);
      $("#clave").val(valuee.cve_catastral);

      var foliocavg = folioCompleto + "/" + valuee.cve_catastral;

      var foliocavg_style = folioCompleto;

      $("#foldicview").html(foliocavg_style); 

     var valor_catast = new Intl.NumberFormat('es-MX').format(valuee.valor_catastral);

      $("#valor").val(valor_catast);
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

      if (valuee.etapa == 1) {
        document.getElementById('archivosRecibidosT').style.display='none';
        document.getElementById('tipologiasTT').style.display='none';
        document.getElementById('prediosT').style.display='none';
      }

       //Archivos
      var ruta="https://dictamunigecem.edomex.gob.mx/dictamun/files/documentos/";

           document.getElementById('descargarHojasVerdes').style.display='block';


            conta = conta + 1 ;

      if (valuee.baldio == "t" && valuee.etapa == 1) {

          document.getElementById('archivosRecibidosT').style.display='none';
         document.getElementById('prediosT').style.display='none';
         document.getElementById('tipologiasTT').style.display='none';
       //  document.getElementById('fachada').style.display='block';
        // document.getElementById('titFachada').style.display='block';

         document.getElementById('alertaa').style.display='block';
          document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 1 (REGISTRO DE DICTAMEN)');
          document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se muestra el apartado de "AVISO" Y "DICTAMEN"');
          $("#alertaa").fadeOut(9000);


       }else if (valuee.baldio == "f" && valuee.etapa == 1) {
         document.getElementById('archivosRecibidosT').style.display='none';
         document.getElementById('prediosT').style.display='none';
         document.getElementById('tipologiasTT').style.display='none';
        // document.getElementById('fachada').style.display='none';
       //  document.getElementById('titFachada').style.display='none';

         document.getElementById('alertaa').style.display='block';
          document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 1 (REGISTRO DE DICTAMEN)');
          document.getElementById('alertaStatusMotivo').append('Por tal motivo solo se muestra el apartado de "AVISO" Y "DICTAMEN"');
          $("#alertaa").fadeOut(9000);

       }else if (valuee.baldio == "t" && valuee.etapa != 1) {

         document.getElementById('tipologiasTT').style.display='none';
         document.getElementById('fachada').style.display='block';
         document.getElementById('titFachada').style.display='block';


       }else if (valuee.baldio == "f" && valuee.etapa != 1) {

         document.getElementById('tipologiasTT').style.display='block';
         document.getElementById('fachada').style.display='none';
         document.getElementById('titFachada').style.display='none';

       }






        if (valuee.baldio == "t" && valuee.etapa == 15) {

          document.getElementById('archivosRecibidosT').style.display='none';
         document.getElementById('prediosT').style.display='none';
         document.getElementById('tipologiasTT').style.display='none';
         document.getElementById('archivosRecibidosT').style.display='block';
         document.getElementById('prediosT').style.display='block';
         document.getElementById('descargarHojasVerdes').style.display='block';

          if (conta == 1) {
          document.getElementById('alertaa').style.display='block';
          document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 15 (VALIDADO)');
          document.getElementById('alertaStatusMotivo').append('Por tal motivo se muestra toda la información');
          $("#alertaa").fadeOut(9000);
        $("#descargarHojasVerdes").append('<center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/'+valuee.url+'" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')




        }

       }else if (valuee.baldio == "f" && valuee.etapa == 15) {
         document.getElementById('archivosRecibidosT').style.display='none';
         document.getElementById('prediosT').style.display='none';
         document.getElementById('tipologiasTT').style.display='block';
         document.getElementById('archivosRecibidosT').style.display='block';
         document.getElementById('prediosT').style.display='block';
         document.getElementById('descargarHojasVerdes').style.display='block';
         document.getElementById('tipologiasPa').style.display='none';

        if (conta == 1) {
           document.getElementById('alertaa').style.display='block';
          document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 15 (VALIDADO)');
          document.getElementById('alertaStatusMotivo').append('Por tal motivo se muestra toda la información');
          $("#alertaa").fadeOut(9000);
            $("#descargarHojasVerdes").append('<center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/'+valuee.url+'" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')


        }

       }


      if (valuee.orden==10) {
                $("#dictaval").val(valuee.nombredoc);
                $("#comenDictaval").val(valuee.comentario);
                $("#descargaDictaval").append('<a id="descargaDictaval" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');


      }else if (valuee.orden==11) {
                $("#construccion").val(valuee.nombredoc);
                $("#comenConstru").val(valuee.comentario);
                $("#descargaConstruc").append('<a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

      }else if(valuee.orden==14){
                $("#avaluoFirmado").val(valuee.nombredoc);
                $("#comenAvaluoFirmado").val(valuee.comentario);
                $("#descargAvaluoFirmado").append('<a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');


      }else if(valuee.orden==15){
                $("#indivisosC").val(valuee.nombredoc);
                $("#comenIndivisosC").val(valuee.comentario);
                $("#descargarIndivisosC").append('<a id="descargarIndivisosC" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

      }else if (valuee.orden==12 || valuee.orden==32 || valuee.orden==33) {
                conTipologias = conTipologias + 1;
                 comentariosT="";
                if (valuee.comentario == null) {
                  comentariosT = "N/A";
                }else{
                  comentariosT=valuee.comentario;
                }


                if (valuee.observacionRevisor == null) {
                   $("#tipologiass").append('<tr><th style="display:none;">'+valuee.id+'</th><th>T-'+conTipologias+'</th><th style="text-align: center;">'+valuee.nombredoc+'</th><th style="text-align: center;">'+comentariosT+'</th><th style="text-align: center; width: 605px;"><a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a></th></tr>');

                }else{
                   $("#tipologiass").append('<tr><th style="display:none;">'+valuee.id+'</th><th>T-'+conTipologias+'</th><th style="text-align: center;">'+valuee.nombredoc+'</th><th style="text-align: center;">'+comentariosT+'</th><th style="text-align: center; width: 605px;"><a id="descargaConstruc" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a></th></tr>');

                }


                 }
              //Total de Tipologias
              $("#totalTipologias").val(conTipologias);



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
        if (valuee.orden == 78) {

          $("#tituloPropiedad").val(valuee.nombredoc);
                $("#comenPropiedad").val(valuee.comentario);
                $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');


        }else if (valuee.orden == 95) {
          $("#croquisLocalizacion").val(valuee.nombredoc);
                $("#comencroquisLocalizacion").val(valuee.comentario);
                $("#descargacroquisLocalizacion").append('<a id="descargacroquisLocalizacion" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 98) {
          $("#boletaPredial").val(valuee.nombredoc);
                $("#comentPredial").val(valuee.comentario);
                $("#descargarBoletaP").append('<a id="descargarBoletaP" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 96) {
          $("#planos").val(valuee.nombredoc);
                $("#comentplanos").val(valuee.comentario);
                $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 94) {
          $("#otros").val(valuee.nombredoc);
                $("#comentariOtros").val(valuee.comentario);
                $("#descargaOtros").append('<a id="descargaOtros" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 99) {
          $("#escrituratituloPropiedad").val(valuee.nombredoc);
                $("#comenescrituratituloPropiedad").val(valuee.comentario);
                $("#descargaescrituratituloPropiedad").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 97) {
          $("#identificacionOf").val(valuee.nombredoc);
                $("#comenidentificacionOf").val(valuee.comentario);
                $("#descargaidentificacionOf").append('<a id="descargaidentificacionOf" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 76) {
          $("#edificacionesUsoPriv").val(valuee.nombredoc);
                $("#comenedificacionesUsoPriv").val(valuee.comentario);
                $("#descargaredificacionesUsoPriv").append('<a id="descargaredificacionesUsoPriv" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 75) {
          $("#superficiesConstr").val(valuee.nombredoc);
                $("#comensuperficiesConstr").val(valuee.comentario);
                $("#descargarsuperficiesConstr").append('<a id="descargarsuperficiesConstr" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 74) {
          $("#factores").val(valuee.nombredoc);
                $("#comenfactores").val(valuee.comentario);
                $("#descargarfactores").append('<a id="descargarfactores" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 77) {
          $("#croquis").val(valuee.nombredoc);
                $("#comenCroquis").val(valuee.comentario);
                $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 120) {
               $("#fachadaNom").val(valuee.nombredoc);
                $("#comentarioFachada").val(valuee.comentario);
                $("#descargarFachada").append('<a id="descargarFachada" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }

      }else if (valuee.tipod == 2) { // persona moral

        $("#contri").val(valuee.nombredenominacion);
        $("#propietario").val(valuee.nombredenominacion);

        document.getElementById('escriturap').style.display='none';

         if (valuee.orden == 120) { // imagen de fachada. moral-baldio
               $("#fachadaNom").val(valuee.nombredoc);
                $("#comentarioFachada").val(valuee.comentario);
                $("#descargarFachada").append('<a id="descargarFachada" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 98) { //Boleta predial. moral-baldio
          $("#boletaPredial").val(valuee.nombredoc);
                $("#comentPredial").val(valuee.comentario);
                $("#descargarBoletaP").append('<a id="descargarBoletaP" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 97) { //Identificacion oficial. moral-baldio
          $("#identificacionOf").val(valuee.nombredoc);

                $("#comenidentificacionOf").val(valuee.comentario);
                $("#descargaidentificacionOf").append('<a id="descargaidentificacionOf" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 96) {// medidas y colindancias. moral-baldio
          $("#croquis").val(valuee.nombredoc);
                $("#comenCroquis").val(valuee.comentario);
                $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 95) { //croquis de localizacion. moral-baldio
          $("#croquisLocalizacion").val(valuee.nombredoc);

                $("#comencroquisLocalizacion").val(valuee.comentario);
                $("#descargacroquisLocalizacion").append('<a id="descargacroquisLocalizacion" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 94) { //Otros. moral-baldio
          $("#otros").val(valuee.nombredoc);
                $("#comentariOtros").val(valuee.comentario);
                $("#descargaOtros").append('<a id="descargaOtros" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 90) { //Acta constitutiva. moral-baldio
          $("#actaC").val(valuee.nombredoc);

                $("#comentactaC").val(valuee.comentario);
                $("#descargarActaC").append('<a id="descargarActaC" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 89) { //nombramiento legal. moral-baldio
          $("#nombrleg").val(valuee.nombredoc);

                $("#comennombrleg").val(valuee.comentario);
                $("#descarganombrleg").append('<a id="descargaescrituratituloPropiedad" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 88) { //Boleta predial. moral-tipologias
          $("#boletaPredial").val(valuee.nombredoc);
                $("#comentPredial").val(valuee.comentario);
                $("#descargarBoletaP").append('<a id="descargarBoletaP" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 87) { //identificacion oficial.  moral-tipologias
          $("#identificacionOf").val(valuee.nombredoc);

                $("#comenidentificacionOf").val(valuee.comentario);
                $("#descargaidentificacionOf").append('<a id="descargaidentificacionOf" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 86) { //medidas y colindancias. moral-tipologias
          $("#croquis").val(valuee.nombredoc);
                $("#comenCroquis").val(valuee.comentario);
                $("#descargaCroquis").append('<a id="descargaCroquis" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 85) { //croquis de localizacion. moral-tipologias
          $("#croquisLocalizacion").val(valuee.nombredoc);

                $("#comencroquisLocalizacion").val(valuee.comentario);
                $("#descargacroquisLocalizacion").append('<a id="descargacroquisLocalizacion" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 84) { //Otros moral-tipologias
          $("#otros").val(valuee.nombredoc);
                $("#comentariOtros").val(valuee.comentario);
                $("#descargaOtros").append('<a id="descargaOtros" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 83) { //doc que acredita la propiedad. moral-baldio

          $("#tituloPropiedad").val(valuee.nombredoc);
                $("#comenPropiedad").val(valuee.comentario);
                $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 82) { //Croquis de construccion. moral-baldio
          $("#planos").val(valuee.nombredoc);

                $("#comentplanos").val(valuee.comentario);
                $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 81) { //Uso privativo. moral-baldio
          $("#edificacionesUsoPriv").val(valuee.nombredoc);

                $("#comenedificacionesUsoPriv").val(valuee.comentario);
                $("#descargaredificacionesUsoPriv").append('<a id="descargaredificacionesUsoPriv" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 80) { // superficies constructivas. moral-baldio
          $("#superficiesConstr").val(valuee.nombredoc);

                $("#comensuperficiesConstr").val(valuee.comentario);
                $("#descargarsuperficiesConstr").append('<a id="descargarsuperficiesConstr" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 79) { // Plano de factores. moral-baldio
          $("#factores").val(valuee.nombredoc);

                $("#comenfactores").val(valuee.comentario);
                $("#descargarfactores").append('<a id="descargarfactores" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 78) { //Doc q acredita la propiedad. moral-tipologias
             $("#tituloPropiedad").val(valuee.nombredoc);
                $("#comenPropiedad").val(valuee.comentario);
                $("#descargaTitulo").append('<a id="descargaTitulo" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 77) { //croquis de construccion. moral-tipologias
          $("#planos").val(valuee.nombredoc);

                $("#comentplanos").val(valuee.comentario);
                $("#descargarPlanos").append('<a id="descargarPlanos" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 76) { //Uso privativo. moral-tipologias
          $("#edificacionesUsoPriv").val(valuee.nombredoc);

                $("#comenedificacionesUsoPriv").val(valuee.comentario);
                $("#descargaredificacionesUsoPriv").append('<a id="descargaredificacionesUsoPriv" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 75) { //superficies constructivas. moral-tipologias
           $("#superficiesConstr").val(valuee.nombredoc);

                $("#comensuperficiesConstr").val(valuee.comentario);
                $("#descargarsuperficiesConstr").append('<a id="descargarsuperficiesConstr" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }else if (valuee.orden == 74) { //Plano de factores moral-tipologias
          $("#factores").val(valuee.nombredoc);

                $("#comenfactores").val(valuee.comentario);
                $("#descargarfactores").append('<a id="descargarfactores" href="'+ruta+fol2+"/"+clavC+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');

        }

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
 //predio 2   idI o funciona aun
 var anioxc = $("#anioDic").val();
          $.post("../../acceso",{acceess:37,idI:idI, anio:anioxc},
      function(n){
        var gva = $("#gva").val();
         $("#cc").val(gva);
        var folioD = $("#cc").val();
        var clavecatastral = $("#idInmu").val();
      $.post("../../acceso",{acceess:39,folioD:folioD,clavecatastral:clavecatastral},function(z){

              $(z).each(function(key,valuee){

             $("#tipoInmueble").val('-');
             //$("#tipoInmueble").val(valuee.tipoinmueble);
             $("#supTerreno").val(valuee.superficie);

             var valor_terrenoP = new Intl.NumberFormat('es-MX').format(valuee.valorpropio);
             var valor_terrenoC = new Intl.NumberFormat('es-MX').format(valuee.valorcomun);

             $("#valorP").val(valor_terrenoP);
             $("#valorC").val(valor_terrenoC);

             $("#frente").val(valuee.frente);
             $("#fondo").val(valuee.fondo);
             $("#altura").val(valuee.altura);
             $("#areaInscrita").val(valuee.areainscrita);
             $("#areaTotal").val(valuee.areatotal);
             $("#posicion").val(valuee.posicion);
             $("#aprovechable").val(valuee.aprovechable);

             $("#factorposicion").val(valuee.factorposicion);
            //PARA EVALUAR LA POSICION DEL PREDIO DE ACUERDO CON EL FACTOR DE POSICION QUE YA SE ALMACENA EN LA BASE DE DATOS
            //FALTA EVALUAR EL PREDIO "FRENDES NO CONTIGUOS" YA QUE EL VALOR DEL FACTOR ES EL MIMSO QUE EL PREDIO EZQUINERO (1.10)
             if (valuee.factorposicion > 0 && valuee.factorposicion <= 0.5) {
              $("#posicion").val('INTERIOR');
             }else if (valuee.factorposicion >= 1 && valuee.factorposicion < 1.10) {
              $("#posicion").val('INTERMEDIO');
             }else if (valuee.factorposicion >= 1.10 && valuee.factorposicion < 1.20) {
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


             var valor_terre = new Intl.NumberFormat('es-MX').format(valuee.valorpropio);
             $("#valorTerreno").val(valor_terre);
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
var ValoConstrucci=0;
 var valor_privada=0;
 var valor_especial=0;
 var valor_Totall=0;
 var ValorRedondeado=0;
 var valorComunn=0;
    $.post("../../acceso",{acceess:38,folioD:folioD,clavecatastral:clavecatastral},function(z){

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
            valorComunn = new Intl.NumberFormat('es-MX').format(comun);
           $("#comun").val(valorComunn);
        }


        //valorTerre = $("#valorTerreno").val();
         valorTerre = valuee.valorpropio;
        valorTotalT = parseFloat(privada) + parseFloat(especial) + parseFloat(valorTerre) + parseFloat(comun);
          valor_Totall = new Intl.NumberFormat('es-MX').format(valorTotalT);
        $("#valorTT").val(valor_Totall);

       redondeado = Math.round(valorTotalT);
       ValorRedondeado = new Intl.NumberFormat('es-MX').format(redondeado);
       $("#redondeado").val(ValorRedondeado);

       ValoConstrucci = new Intl.NumberFormat('es-MX').format(valuee.valorconstruccion);



      $("#tipologiasP").append('<tr><td style="text-align: center;">T-'+valuee.tipologia+'</td><td style="text-align: center; width: 500px;">'+tipoConstruccion2+'</td><td style="text-align: center;">'+valuee.uso+'</td><td style="text-align: center;">'+valuee.clase+'</td><td style="text-align: center;">'+valuee.categoria+'</td><td style="text-align: center; width: 700px;">'+valuee.superficie+'</td><td colspan="2" style="width: 500px; text-align: center;">$'+ValoConstrucci+'</td></tr>');

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


});



function obsMunicipio(){

  var observacion = $("#ObservacionMun").val();
  var clave = $("#idG").val();
  var folioDic = $("#cc").val();
  var ObservacionM2 = observacion.trim();
   $.post("../../acceso",{acceess:24,ObservacionM2:ObservacionM2,folioDic:folioDic,clave:clave},function(z){


    if (z == '10') {
     // document.getElementById('id01').style.display='block';
          document.getElementById('alertaa2').style.display='block';
          document.getElementById('alertaa').style.display='none';
          document.getElementById('alertaa3').style.display='none';
      //BIEN
    }else{
     // document.getElementById('id02').style.display='block';
      document.getElementById('alertaa3').style.display='block';
      document.getElementById('alertaa').style.display='none';
          document.getElementById('alertaa2').style.display='none';
      //MAL
    }

    });
   }
