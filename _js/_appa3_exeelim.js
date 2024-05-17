

var pahtv1 = { vector1 : [] } ;
  var vector1 = { id_t : '', comel: ''};
$(document).ready(function () {



  $("#saver").click(function(){
    var id_fol = $("#idG").val();

    if( id_fol == '' || id_fol ==" " ){
      document.getElementById('alertaa').style.display='block';
      $("#alertaStatus").html('');
      document.getElementById('alertaStatus').append('Error en servidor de datos, contacta a Catastro IGECEM');
      $("#alertaStatusMotivo").html('');
      document.getElementById('alertaStatusMotivo').append('Por tal motivo  no puedes continuar con el proceso de eliminación');

    }else{
      //console.log(valorx);
    $.post("../../acceso",{acceess:911924,id_fol:id_fol},function(z){
      //console.log(z);
      if( z == "100" ){
        
        location.href='../../AIGECEMDTMN/Dictamen_deleted/';
      }else{
        document.getElementById('alertaa').style.display='block';
        $("#alertaStatus").html('');
        document.getElementById('alertaStatus').append('Erro de comunicación con el servidor');
        $("#alertaStatusMotivo").html('');
        document.getElementById('alertaStatusMotivo').append('Contacte con el CI DE IGECEM');

        console.log("error de Eliminación de dictamen");
      }
    });

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

     var anioxc = $("#anioDic").val();
     var idI = '0000000000000000';
     var folioxcadf = $("#gva").val();

    //Total de inmuebles a revisar
    $.post("../../acceso",{acceess:911925,idI:idI,anio:anioxc,folioxcadf:folioxcadf},
    	function(n){
    	 console.log('inmuebles');
         $("#cc").val(n);
         //consultar informacion de inmuebles en vista revisor
      var fol = $("#cc").val();
		  var clavC = $("#idInmu").val();
      $("#idInmu").html("");
      $("#idInmu").html("DELETE/"+fol+"/"+anioxc+"/");
    });

///////*************************archivos y tipologias


var anioxc = $("#anioDic").val();
 //predio 2   idI o funciona aun
     var idI = '0000000000000000';
    //Total de inmuebles a revisar
    var folioxcadf = $("#gva").val();
    $.post("../../acceso",{acceess:911925,idI:idI,anio:anioxc,folioxcadf:folioxcadf},
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



function button_exe(){
document.getElementById('alertaa').style.display='none';
}
