

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

     filesavg(folioxcadf,idI);
     files_tipologias(folioxcadf,idI);
     //

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
              // document.getElementById('save_rev').style.display='none';
                  //document.getElementById('tipologias').style.display='none';
                 document.getElementById('obs_general').style.display='none';
                document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 3 (PENDIENTE DE ASIGNAR REVISOR)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo no se pueden realizar observaciones ni pasar de etapa.');
                document.getElementById('archivoCCT').style.display='none';
                //document.getElementById('tipologiasPa').style.display='none';

               }


              }else if (valuee.etapa == 4) {

                if (conta == 1) {
                  //document.getElementById('save_rev').style.display='none';
                  //document.getElementById('tipologias').style.display='none';
                 //document.getElementById('tipologiasPa').style.display='none';
                 document.getElementById('obs_general').style.display='none';
                 document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 4 (ASIGNADO A REVISOR)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo el administrador no podra hacer observaciones hasta que el dictamen sea AUTORIZADO.');
                  document.getElementById('archivoCCT').style.display='none';
                }


              }else if (valuee.etapa == 6) {

              //document.getElementById('escriturap').style.display='none';

                  if (conta == 1) {
                   document.getElementById('alertaa').style.display='block';
                   document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 6 (AUTORIZADO)');
                   document.getElementById('alertaStatusMotivo').append('Por tal motivo el administrador general podra hacer observaciones para posteriormente "Rechazarlo" o de lo contrario "Liberarlo" para generar ordenes de Pago');
                   document.getElementById('autorizado').style.display='none';
                   document.getElementById('preRechazoPagos').style.display='none';
                   //document.getElementById('tipologiasPa').style.display='none';
                   document.getElementById('save_revPa').style.display='none';
                   //document.getElementById('descargarHojasVerdes').style.display='block';
                   //$("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
                  document.getElementById('descargarHojasVerdes').style.display='block';
                  $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
                  document.getElementById('archivoCCT').style.display='block';
                  //document.getElementById('save_rev').style.display='none';


                  }


                }else if (valuee.etapa == 7) { //PENDIENTE DE PAGO

                  if (conta == 1) {
                  document.getElementById('observacionFinales').style.display='none';
                  document.getElementById('guardarObservacionsJ').style.display='none';
                  //document.getElementById('tipologias').style.display='none';
                  //document.getElementById('save_rev').style.display='none';
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
                    //document.getElementById('tipologiasPa').style.display='none';
                    document.getElementById('descargarHojasVerdes').style.display='block';
                  $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')



                }


                }else if (valuee.etapa == 13) {  //RECHAZADO POR ADMINISTRADOR GENERAL

                if (conta == 1) {


                loaad_commentaaa(folioxcadf,idI);
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

                //$("#com").html('<h5>Observaciones Generales: '+valuee.obs_rev+'</h5>');
                loaad_commentaaa(folioxcadf,idI);
                 document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 5.2 (PRE AUTORIZADO)');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo el Administrador Pagos tendrá que verificar la informacion y "AUTORIZAR" O "RECHAZAR" el dictamen.');

                   document.getElementById('descargarHojasVerdes').style.display='block';
   $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')

    //document.getElementById('escriturap').style.display='none';

              }

              }else if (valuee.etapa == 15) {

                //document.getElementById('escriturap').style.display='none';

                  if (conta == 1) {

                    //  document.getElementById('save_rev').style.display='none';
                      //document.getElementById('tipologiasPa').style.display='none';
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
           //document.getElementById('save_rev').style.display='none';
           document.getElementById('obs_general').style.display='none';


                      }

                     }else if(valuee.etapa=12){
                      if (conta == 1) {
                        document.getElementById('alertaa').style.display='block';
                      document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 12 (Rechazado por Administrador pagos).');
                      document.getElementById('alertaStatusMotivo').append('Por tal motivo el dictamen esta en espera de que el revisor atienda las observaciones especificadas.');


                     document.getElementById('archivoCCT').style.display='none';
           //document.getElementById('save_rev').style.display='none';
           //document.getElementById('tipologiasPa').style.display='none';

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



                      }


                     }

            	//Aviso
      var fol2 = $("#cc").val();
      var inicio = "AD/";
      var inicio2 = "DIP/";
      var anio= valuee.aniodictamen;
      var folioCompleto = inicio+fol2+"/"+anio;
			//$("#folioI").val(folioCompleto);
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
      //$("#noFolio").val(folioCompleto2);
      $("#noFolio").val(foliocavg);
      $("#folioI").val(foliocavg);
			var dictaminadorCom= valuee.dictminador+" "+valuee.apdictaminador+" "+valuee.amdictaminador;
			$("#dictaminador").val(dictaminadorCom);
			$("#rfcD").val(valuee.rfcdictaminador);
			$("#noReg").val(valuee.noregistro);
			$("#tipoD").val(valuee.tipodictamen);
			$("#estatus").val(valuee.etapa);


                 //Total de Tipologias
              //$("#totalTipologias").val(contaTipo);





			if (valuee.tipod == 1) {
        var nom=valuee.nombredenominacion;
        var apa=valuee.apaterno;
        var ama=valuee.amaterno;
        var nombreCamp=nom+" "+apa+" "+ama;
        $("#contri").val(nombreCamp);
        $("#propietario").val(nombreCamp);
       // nombredenominacion,a.apaterno,a.amaterno
        //document.getElementById('acta').style.display='none';
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

             //$("#tipoInmueble").val('-');
             $("#tipoInmueble").val(valuee.tipoinmueble);
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

             var valor_terren = new Intl.NumberFormat('es-MX').format(valuee.sumavalorterravg);
             ///$("#valorTerreno").val(valor_terren);
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
            //$("#valorTT").val(valorTerrenoSinConstruc);




      }else{

            $(z).each(function(key,valuee){


        /*if (valuee.tipoconstruccion == 1) {
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

        //valorTerrenoCondominios = $("#valorC2").val();
        //valorTerrenoCondominios2 = new Intl.NumberFormat('es-MX').format(valorTerrenoCondominios);
         //$("#valorTerreno").val(valorTerrenoCondominios2);

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
       }*/




        //$("#valorTT").val(valor_tot);

       //redondeado = Math.round(valorTotalT);
       //valor_redon = new Intl.NumberFormat('es-MX').format(redondeado);
       //$("#redondeado").val(valor_redon);

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


load_valterr_avg($("#gva").val(),$("#idInmu").val());
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




function filesavg(f,c){
      //var  data = "datos" ;
      var comm = "";
      var data = new FormData();
      data.append('acceess',"449945");
      data.append('folio',f);
      data.append('cllv',c);
  $.ajax({
    url: "../../acceso",
    type: "POST",
    data: data,
    contentType: false,
    cache: false,
    processData:false,
    success: function(datar)
    {
      $("#files_studioa").html('');
      //var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/01135/0472300513000000/Avaluos.val";
      var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/";
      $("#files_studioa").append('<tr>');
      $.each( datar, function( key, value ) {
        if( value.comentariorevi != null){
           comm = value.comentariorevi;
        }else{
          comm = '';
        }
        $("#files_studioa").append(
        '<tr>'+
        '<td style="text-align: center;width: 300px;">' + value.nombrearchivo + '</td>'+
         '<td style="text-align: center;"><center>' + value.comentario + '</center></td>'+
        '<td  style="text-align: center;">'+
        '<a target="_blank"  href=" '+ urlavg + value.flo + '/' + value.clavecastatral + '/' + value.nombredoc + '" download="' + value.nombredoc +'"><i class="fa fa-download fa-2x"></i></a>'+
        '</td>'+
        '<td style="text-align: center;" > <textarea style="width: 300px;" id="comentariorevisorcap'+ value.id +'" name="comentariorevisorcap'+ value.id +'" placeholder="Agregar Observacion" onchange="eventstudifile('+ value.id +')" value="'+ comm +'">'+ comm +'</textarea>  </td>'
      );
                });
                $("#files_studioa").append('</tr>');

    }
  });


}


function files_tipologias(f,c){
  var data = new FormData();
  data.append('acceess',"449946");
  data.append('folio',f);
  data.append('cllv',c);
  var time_count = 0;
  $.ajax({
    url: "../../acceso",
    type: "POST",
    data: data,
    contentType: false,
    cache: false,
    processData:false,
    success: function(datar)
    {
      $("#tip_no_studioa").html('');
      //var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/01135/0472300513000000/Avaluos.val";
      var urlavg = "https://dictamunigecem.edomex.gob.mx/files/documentos/";
      $("#tip_no_studioa").append('<tr>');
      $.each( datar, function( key, value ) {
        time_count = time_count + 1 ;
        if( value.comentariorevi != null){
           comm = value.comentariorevi;
        }else{
          comm = '';
        }

        $("#tip_no_studioa").append(
        '<tr>'+
        '<td style="text-align: center;width: 300px;">' + value.nombredoc + '</td>'+
         '<td style="text-align: center;"><center>' + value.comentario + '</center></td>'+
        '<td  style="text-align: center;">'+
        '<a target="_blank"  href=" '+ urlavg + value.flo + '/' + value.clavecastatral + '/' + value.nombredoc + '" download="' + value.nombredoc +'"><i class="fa fa-download fa-2x"></i></a>'+
        '</td>'+
        '<td style="text-align: center;" > <textarea style="width: 300px;" id="comentariotipologrev'+ value.id +'" name="comentariotipologrev'+ value.id +'" placeholder="Agregar Observacion" onchange="eventstudiotipolog('+ value.id +')" value="'+ comm +'">'+ comm +'</textarea> </td>');
                });

                $("#totalTipologias").html(time_count);
                $("#tip_no_studioa").append('</tr>');

    }
  });

}


function eventstudifile(a){
  //console.log(a);
  var comentario_val = $("#comentariorevisorcap" + a ).val();
  //console.log(comentario_val);

  var data = new FormData();
  data.append('acceess',"4499415");
  data.append('idval',a);
  data.append('val',comentario_val);
$.ajax({
url: "../../acceso",
type: "POST",
data: data,
contentType: false,
cache: false,
processData:false,
success: function(dataresul)
{

  if( dataresul == '100' ){
    console.log('comentario agregado');

  }else{
    console.log(dataresul);

  }


}
});


}



function eventstudiotipolog(a){
  console.log(a);
  var comentario_val = $("#comentariotipologrev" + a ).val();
  console.log(comentario_val);

  var data = new FormData();
  data.append('acceess',"4499415");
  data.append('idval',a);
  data.append('val',comentario_val);
$.ajax({
url: "../../acceso",
type: "POST",
data: data,
contentType: false,
cache: false,
processData:false,
success: function(dataresul)
{

  if( dataresul == '100' ){
    console.log('comentario agregado');

  }else{
    console.log(dataresul);

  }


}
});


}





function loaad_commentaaa(a,cc){


  var data = new FormData();
  data.append('acceess',"4499414");
  data.append('folio',a);
  data.append('cllv',cc);
$.ajax({
url: "../../acceso",
type: "POST",
data: data,
contentType: false,
cache: false,
processData:false,
success: function(dataresul)
{


  $("#com").html('');
  $.each( dataresul, function( key, value ) {
    $("#com").html('<h5>Observaciones Generales: '+value.obs_rev+'</h5>');
                });


}
});


}








function load_valterr_avg(a,cc){
  $("#valorTerreno").val('');
  $("#privada").val('');
  $("#comun").val('');
  $("#especial").val('');

    $("#valorTT").val('');
    $("#redondeado").val('');

  $("#valorTerreno").val('0');
  $("#privada").val('0');
  $("#comun").val('0');
  $("#especial").val('0');
  $("#valorTT").val('0');
  $("#redondeado").val('0');



  var data = new FormData();
  data.append('acceess',"892124");
  data.append('folio',a);
  data.append('cllv',cc);
  $.ajax({
    url: "../../acceso",
    type: "POST",
    data: data,
    dataType: "JSON", //ayuda a omitir el dato de jQuery.parseJSON(datajson)
    contentType: false,
    cache: false,
    processData:false,
    success: function(dataresul)
    {
      console.log(dataresul);

      if(dataresul == "mal"){
        console.log("un no tiene datos cargados de .val avaluos.val y construcciones.val");
      }else{

        $(dataresul).each(function(key,valuee){
          //console.log(key);


          //$("#privada").val(valuee.);
          //$("#comun").val(valuee);
          //$("#especial").val(valuee);
            if( valuee.tipodeconstruccion == 100 ){
              const localeString1avg =  new Intl.NumberFormat('es-MX').format(valuee.valordeltipoconstruccavg);
              $("#valorTerreno").val(localeString1avg);

          }else  if( valuee.tipodeconstruccion == 1 ){
            //var numerox = valuee.valordeltipoconstruccavg;
            const localeString1 =  new Intl.NumberFormat('es-MX').format(valuee.valordeltipoconstruccavg);
            $("#privada").val(localeString1);
          }else if( valuee.tipodeconstruccion == 2 ){
            //var numerox = valuee.valordeltipoconstruccavg;
            const localeString2 =  new Intl.NumberFormat('es-MX').format(valuee.valordeltipoconstruccavg);
              $("#comun").val(localeString2);
          }else if( valuee.tipodeconstruccion == 3){
            //var numerox = valuee.valordeltipoconstruccavg;
            const localeString3 = new Intl.NumberFormat('es-MX').format(valuee.valordeltipoconstruccavg);
            $("#especial").val(localeString3);
          }
        });

        var data = new FormData();
        data.append('acceess',"892125");
        data.append('folio',a);
        data.append('cllv',cc);
        $.ajax({
          url: "../../acceso",
          type: "POST",
          data: data,
          dataType: "JSON", //ayuda a omitir el dato de jQuery.parseJSON(datajson)
          contentType: false,
          cache: false,
          processData:false,
          success: function(dataresul)
          {
            //console.log(dataresul);

            if(dataresul == "mal"){
              console.log("un no tiene datos cargados de .val avaluos.val y construcciones.val");
            }else{

              $(dataresul).each(function(key,valuee){
                //if( valuee.text == 'SUBTOTAL' ){
                  const localeString1avg =  new Intl.NumberFormat('es-MX').format(valuee.subzero);
                  $("#valorTT").val(localeString1avg);
                //}else  if( valuee.text == 'TOTAL' ){
                //var numerox = valuee.valordeltipoconstruccavg;
                const localeString1 =  new Intl.NumberFormat('es-MX').format(valuee.ttotalavg);
                $("#redondeado").val(localeString1);
                //}

              });



            }


          }
        });



      }


    }
  });







}
