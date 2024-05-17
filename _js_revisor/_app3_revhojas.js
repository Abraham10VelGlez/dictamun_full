var pahtv1 = { vector1 : [] } ;
  var vector1 = { id_t : '', comel: ''};
$(document).ready(function () {
	$('#ObservacionPre').val('');

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

      var idI = $("#idInmu").val();
      var anioxc = $("#anioDic").val();
      var avgfff = $("#fffavg").val();

      filesavg(avgfff,idI);
      files_tipologias(avgfff,idI);
      load_valterr_avg(avgfff,idI);


    //Total de inmuebles a revisar
     $.post("../../acceso",{acceess:43,idI:idI, anio:anioxc,avgfff:avgfff},
    	function(n){
    	 console.log('inmuebles');
         $("#cc").val(n);

         //folioIn(avgfff);
         //consultar informacion de inmuebles en vista revisor
      var fol = n;
      fol = n ;
      var clavC = $("#idInmu").val();

       $.post("../../acceso",{acceess:44,clavC:clavC,fol:fol},
    	function(z){
        //console.log(z);
        var conta=0;
        var contt=0;
            $(z).each(function(key,valuee){

              //Aviso
      var fol2 = n;
      var inicio = "DIP/";
      var inicio2 = "DIP/";
      var anio= valuee.aniodictamen;
      var folioCompleto = inicio+fol2+"/"+anio;
      $("#folioI").val(folioCompleto);
      $("#anioD").val(valuee.aniodictamen);

      $("#rfcC").val(valuee.rfc);
      $("#clave").val(valuee.cve_catastral);

      var foliocavg = folioCompleto + "/" + valuee.cve_catastral;

      $("#foldicview").html(foliocavg);

      var valor_Catastra = new Intl.NumberFormat('es-MX').format(valuee.valor_catastral);
      $("#valor").val(valor_Catastra);
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

      if (valuee.etapa==51) {
          conta = conta + 1;

          if (conta == 1 ) {
           document.getElementById('descargarHojasVerdes').style.display='block';
   $("#descargarHojasVerdes").append(' <center><label>Archivo en hojas verdes&nbsp;&nbsp;&nbsp;&nbsp;</label><a id="descargarActaC" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+fol2+'/'+clavC+'/dic_hojasverdes.pdf" download="dic_hojasverdes.pdf"><i class="fa fa-download fa-2x"></i></a></center>')
           document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en la etapa 5.1 "PRE AUTORIZADO / CON ARCHIVO EN HOJAS VERDES"');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo solamente se validara el archivo en hojas seguridad."');
               //   $("#alertaa").fadeOut(9000);

          }
                 }else if (valuee.etapa==4) {
                   conta = conta + 1;

          if (conta == 1 ) {
          document.getElementById('alertaa').style.display='block';
                 document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 4');
                 document.getElementById('alertaStatusMotivo').append('Por tal motivo se tiene que revisar y realizar las observaciones correspondientes.');
                //  $("#alertaa").fadeOut(9000);

          }

                 }else if(valuee.etapa == 12){

                     conta = conta + 1;
             if (conta == 1 ) {
                $("#com").html('<h5>Observaciones Generales: '+valuee.obs_rev+'</h5>');

             document.getElementById('alertaa').style.display='block';
                    document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 12');
                    document.getElementById('alertaStatusMotivo').append('Por tal motivo se tiene que revisar las observaciones.');
                     $("#alertaa").fadeOut(9000);
                   if (valuee.activo == 2) {
                 document.getElementById('activararchivoHV').style.display='none';
                 document.getElementById('preAurorizadoRevisor').style.display='block';
                  document.getElementById('preAurorizadoRevisor2').style.display='none';


               }else if(valuee.activo == 1){
                 document.getElementById('activararchivoHV').style.display='block';
                 document.getElementById('preAurorizadoRevisor').style.display='none';
               }

             }

                    }

       //Archivos
      console.log('archivos');

      var ruta="https://dictamunigecem.edomex.gob.mx/files/documentos/";

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

              //Total de Tipologias
              $("#totalTipologias").val(contt);



      if (valuee.tipod == 1) {
        var nom=valuee.nombredenominacion;
        var apa=valuee.apaterno;
        var ama=valuee.amaterno;
        var nombreCamp=nom+" "+apa+" "+ama;
        $("#contri").val(nombreCamp);
        //$("#propietario").val(nombreCamp);

       // nombredenominacion,a.apaterno,a.amaterno
        //document.getElementById('acta').style.display='none';
        //document.getElementById('documentotofisico').style.display='contents';
        //document.getElementById('nombramientoM').style.display='none';


      }else if (valuee.tipod == 2) {
        $("#contri").val(valuee.nombredenominacion);
        //$("#propietario").val(valuee.ava_pro_pre);
      //  document.getElementById('nombramientoM').style.display='contents';
        //document.getElementById('escrituraOtituloPropiedadM').style.display='none';
        //document.getElementById('documentotofisico').style.display='none';
        //document.getElementById('acta').style.display='block';

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
      //var ubi= ca+" No.EXTERIOR: "+nE+" No.INTERIOR: "+nI+" COL."+col+" ,"+mun+" ;"+cp;

      $("#ubicacion2").val(ubi);
      var ubi= ca+" No.EXTERIOR: "+nE+" No.INTERIOR: "+nI;
       var ubi2= " COL."+col+" ,"+mun+" ;"+cp;
      $("#ubicacion2").val(ubi);
       $("#ubicacion3").val(ubi2);

      $("#claveCa2").val(valuee.cve_catastral);


		});
      });

      });
 //predio 2   idI o funciona aun


   var clavecatastral = $("#idInmu").val();
   var anioxc = $("#anioDic").val();
   var avgfff = $("#fffavg").val();
     $.post("../../acceso",{acceess:43,idI:idI,anio:anioxc,avgfff:avgfff},
      function(n){
       console.log('inmuebles');
         $("#cc").val(n);
         folioIn(n);

          var folioD = $("#cfol").val();

           $.post("../../acceso",{acceess:39,folioD:folioD,clavecatastral:clavecatastral},function(z){

              $(z).each(function(key,valuee){

             //$("#tipoInmueble").val('-');
             $("#tipoInmueble").val(valuee.tipoinmueble);
             $("#propietario").val(valuee.ava_pro_pre);
             $("#supTerreno").val(valuee.superficie);

             var valor_terrenoPro = new Intl.NumberFormat('es-MX').format(valuee.valorpropio);
             var valor_terrenoCom = new Intl.NumberFormat('es-MX').format(valuee.valorcomun);

             $("#valorP").val(valor_terrenoPro);
             $("#valorC").val(valor_terrenoCom);
             $("#valorC2").val(valuee.valorcomun);
             $("#prcentaje").val(valuee.ava_porcen);

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



              var valor_terr = new Intl.NumberFormat('es-MX').format(valuee.valorpropio);




             $("#valorTerreno").val(valor_terr);
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
var valor_terrenoC=0;
var valor_privada=0;
var valor_especial=0;
var valor_comu=0;
var valor_tto=0;
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
          //  $("#valorTT").val(valorTerrenoSinConstruc);




      }else{

            $(z).each(function(key,valuee){
              /*
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
       }*/
       /*else{



          var valorTerrenoSinConstruc =  $("#valorTerreno").val();
            $("#valorTT").val(valorTerrenoSinConstruc);
        }*/




        //$("#valorTT").val(valor_tot);

      // redondeado = Math.round(valorTotalT);
       //valor_redon = new Intl.NumberFormat('es-MX').format(redondeado);
      // $("#redondeado").val(valor_redon);

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

      }

        });

         });




});




function elitips(){
  var dato = "";
  var e="";
  var aa ="";
   var clavec = $("#idInmu").val();
   var folio = $('#cc').val();

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
 $.post("../../acceso",{acceess:40, vectorss:pahtv1.vector1,clavec:clavec,folio:folio},function(n){

   //document.getElementById('id01').style.display='block';

    document.getElementById('alertaa').style.display='none';
    document.getElementById('alertaa2').style.display='none';
    document.getElementById('alertaa3').style.display='block';



  });





}




function folioIn(fol){
	   $("#cfol").val(fol);
	   console.log(fol);
	}
function save_revpreauto(){

	  var archivoHJSVErdes = $('input[name=optradio]:checked').val();


	    if (archivoHJSVErdes == 1) {
	      //el archivo en hojas verdes no es vvalido.
	     // console.log(archivoHJSVErdes);
	       document.getElementById('alertaa3').style.display='block';
          document.getElementById('alertaa').style.display='none';


	    }else {
	      //el archivo en hojas verdes es valido.
	            //console.log(archivoHJSVErdes);
	             var anioD = $("#anioD").val();

	    var fol = $("#cfol").val();
	    var idm =   $('#idG').val();
	    var ObservacionPre =  $('#ObservacionPre').val();
	    var ObservacionPre2 = ObservacionPre.trim();
	      //cambiar a etapa 5 y guardar observacion general
	   $.post("../../acceso",{acceess:15,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,anioD:anioD },function(yz){
	        console.log(yz); //etapa 52
	      /*  document.getElementById('id02').style.display='block'; */
	     location.href="../SeguimientoRevisorPre/52";

	      });
	    }



		}



	function preRechazo(){
		   $('#alertaStatus2').html("");
		   $('#alertaStatusMotivo2').html("");
		   var anioD = $("#anioD").val();
		   var fol = $("#cfol").val();
		  var idm =   $('#idG').val();
		  var ObservacionPre =  $('#ObservacionPre').val();
		  var ObservacionPre2 = ObservacionPre.trim();
		  var activo = 0;

		if ($('#hojasVerdes').prop('checked') ) {
		    console.log("Checkbox seleccionado");
		    activo = 2;

      document.getElementById('alertaa3').style.display='none';
		  document.getElementById('alertaa').style.display='none';
		  document.getElementById('alertaa2').style.display='block';
		  document.getElementById('alertaStatus2').append('"Subir archivo en hojas verdes (Archivo PDF)"');
		  document.getElementById('alertaStatusMotivo2').append('Esta opcion le informara al dictaminador que ya puede subir el archivo');

		 //document.getElementById('save_rev2').style.display='none';
		 document.getElementById('preRechazo').style.display='none';
		//cambiar a etapa 111 y guardar observacion general
		 $.post("../../acceso",{acceess:80,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,anioD:anioD,activo:activo },function(yz){
		      console.log(yz);
		      //document.getElementById('id03').style.display='block';

		       location.href="../SeguimientoRevisor/5";
		    });



		  }else{
		    activo = 1;


		 //document.getElementById('alertaa').style.display='none';
		  document.getElementById('alertaa2').style.display='block';
		  document.getElementById('alertaStatus2').append('El dictamen aun cuenta con Observaciones pasa a etapa 11 (Observado por revisor)');
		  document.getElementById('alertaStatusMotivo2').append('Por tanto el dictaminador aún no podrá subir su archivo en hojas verdes.');
		 //  document.getElementById('save_rev2').style.display='none';
		 document.getElementById('preRechazo').style.display='none';



		    //cambiar a etapa 11 y guardar observacion general
		 $.post("../../acceso",{acceess:80,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,activo:activo },function(yz){
		      console.log(yz);
		      //document.getElementById('id03').style.display='block';

		        location.href="../SeguimientoRevisor/11";



		    });


		  }

		}


	function preRechazoHV(){

		var archivoHJSVErdes = $('input[name=optradio]:checked').val();

		if (archivoHJSVErdes == 2) {
		  //archivo en hojas verdes correcto

		     document.getElementById('alertaa').style.display='none';
         document.getElementById('alertaa3').style.display='none';
         document.getElementById('alertaa4').style.display='block';

		}else {
		//archivo en hojas verdes no validado
		 var fol = $("#cfol").val();
		    var idm =   $('#idG').val();
		    var ObservacionPre =  $('#ObservacionPre').val();
		    var ObservacionPre2 = ObservacionPre.trim();
		      //cambiar a etapa 5 y guardar observacion general
		   $.post("../../acceso",{acceess:5,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,archivoHJSVErdes:archivoHJSVErdes },function(yz){
		        console.log(yz);
		        //document.getElementById('id03').style.display='block';
		         location.href="../SeguimientoRevisor/53";  //SeguimientoRevisorPre

		      });
		}



			  }







	function preAurorizadoRevisor(){


	       var anioD = $("#anioD").val();
	       var fol = $("#cfol").val();
	      var idm =   $('#idG').val();
	      var ObservacionPre =  $('#ObservacionPre').val();
	      var ObservacionPre2 = ObservacionPre.trim();

	 $.post("../../acceso",{acceess:4,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,anioD:anioD},function(yz){
	          console.log(yz);
	          //document.getElementById('id03').style.display='block';

	            location.href="../SeguimientoRevisor/52";


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
var comentarioNombra = $('#comentarioNombra').val();
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

 if (comentarioNombra == "") {
  comentarioNombra="N/A";

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


   $.post("../../acceso",{acceess:41,idm:idm,fo:fo,comentarioDicta:comentarioDicta,
        comentarioConstruc:comentarioConstruc,comentarioAvaluo:comentarioAvaluo,comentarioCroquis223:comentarioCroquis223,
      comentarioEscritura:comentarioEscritura,comentarioCroquis:comentarioCroquis,comentariofactores2:comentariofactores2,
    comentarioPredial:comentarioPredial,comentarioNombra:comentarioNombra,comentarioPlanos:comentarioPlanos,comentariosuperficiesConstr2:comentariosuperficiesConstr2,
    comentarioIndivisos:comentarioIndivisos,comentarioActa:comentarioActa,comentarioedificacionesUsoPriv2:comentarioedificacionesUsoPriv2,
    comentariOtros:comentariOtros,comentarioGeneral:comentarioGeneral,comentarioCroquis22:comentarioCroquis22,
    comentarioGReporte:comentarioGReporte,comentarioDocAcreditaP:comentarioDocAcreditaP,comentarioidentificacionOf2:comentarioidentificacionOf2,comentarioFachada:comentarioFachada},function(yz){
      console.log(yz);


        document.getElementById('alertaa3').style.display='none';
        document.getElementById('alertaa2').style.display='none';
      document.getElementById('alertaa').style.display='block';


      $('#alertaStatus').html("");
      $('#alertaStatusMotivo').html("");


      $('#alertaStatus').append('Comentarios guardados correctamente.');
      $('#alertaStatusMotivo').append('Puede continuar con la revisión.');


    });

}




function filesavg(f,c){
      //var  data = "datos" ;
      var comm = "";
      var data = new FormData();
      data.append('acceess',"449949");
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



function eventstudifile(a){
  //console.log(a);
  var comentario_val = $("#comentariorevisorcap" + a ).val();
  //console.log(comentario_val);

  var data = new FormData();
  data.append('acceess',"4499410");
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



function files_tipologias(f,c){
  var data = new FormData();
  data.append('acceess',"4499411");
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


function eventstudiotipolog(a){
  console.log(a);
  var comentario_val = $("#comentariotipologrev" + a ).val();
  console.log(comentario_val);

  var data = new FormData();
  data.append('acceess',"4499412");
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
