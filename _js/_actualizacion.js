
function buscar(){
    var folio = $("#folio").val();
    var dictaminador = $("#dic").val();
 
    $.post("../../acceso",{acceess:99,folio:folio,dictaminador:dictaminador},function(z){

      $(z).each(function(key,valuee){
      $('#tipoP').val(valuee.tipod);
      if (valuee.tipod == 1 ) { //persona fisica
        $("#info").css('display','block'); 
          $('#nombreDenRaz').val(valuee.nombredenominacion);
          $('#apPaterno').val(valuee.apaterno);
          $('#apMaterno').val(valuee.amaterno);
          $('#rfc').val(valuee.rfc);
          $('#curp').val(valuee.curp);
          $('#telefono').val(valuee.telefono); 
          $('#correoE').val(valuee.email);
      }else if(valuee.tipod == 2){ //persona moral
         $("#info2").css('display','block');
         $('#nombreDenominacion').val(valuee.nombredenominacion);
         $('#rfcD').val(valuee.rfc);
         $('#descripacrt').val(valuee.serviciodesc);
         $('#telefonoD').val(valuee.telefono);
         $('#correoD').val(valuee.email);  
      }
      $("#general").css('display','block');
      $('#nombreRep').val(valuee.nombrerep);
      $('#apPaRep').val(valuee.apaternorep);
      $('#apMaRep').val(valuee.amaternorep);
      $('#rfcR').val(valuee.rfcrep);
      $('#curpR').val(valuee.curprep);

      $('#calle').val(valuee.calle);
      $('#noEx').val(valuee.no_exterior); 
      $('#noI').val(valuee.no_interior); 
      $('#col').val(valuee.colonia); 
      $('#ref').val(valuee.referencia1); 
      $('#mun').val(valuee.id_municipio); 
      $('#cp').val(valuee.codigo_p); 

      
    });

      
    }); 


  }

  function actualizar(){
    var folio = $("#folio").val();

    //validar que exista informacion
    var anio =  $('#anio').val(); 
    var valoC = $('#valor').val(); 
    var clave =  $('#clave').val(); 
    var pagoIm = $('input[name=impuesto]:checked').val(); 
    var modificacion = $('input[name=gender2]:checked').val(); 
    var m3 = $('input[name=gender3]:checked').val(); 

    var anio2 = validarAnio();
    var valoC2 = validarValorC();

    if (anio2=='' || valoC2=='' || clave=='' || pagoIm=='' || modificacion=='' || m3=='') {
      //ingresar todos los datos solicitados
    }else{
      $.post("../../acceso",{acceess:98,folio:folio,anio:anio,valoC:valoC,clave:clave,pagoIm:pagoIm,modificacion:modificacion,m3:m3},function(z){

       // document.getElementById('id01').style.display='block';
      location.href="https://dictamunigecem.edomex.gob.mx/Inicio";


      });
    }
  
    //actualizar en la tabla de inmuebles

  }
  function ok(){
    location.href="https://dictamunigecem.edomex.gob.mx/Inicio";
  }

  function validarValorC() {
      let isValid = false;
      const input = document.forms['validationForm2']['valor'];
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

    function validarAnio() {
      let isValid = false;
      const input = document.forms['validationForm3']['anio'];
      const message = document.getElementById('messageValorA');
      input.willValidate = false;
      const pattern = new RegExp('^[0-9]+$', 'i');//'^[0-9]+$', 'i'

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
