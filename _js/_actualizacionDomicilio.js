
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

      $('#clave').val(valuee.cve_catastral);

      $('#valor').val(valuee.valor_catastral); 
      $('#anio').val(valuee.aniodictaminar); 
     

      
    });

      
    }); 


  }

  function actualizar(){
    var folio = $("#folio").val();

     var calle=  $('#calle').val(); 
     var noEx=  $('#noEx').val(); 
     var municipio=   $('#munic').val(); 
     var colonia=  $('#col').val();  
     var noI=  $('#noI').val();  
     var cp=  $('#cpp').val(); 
     var referencia=  $('#ref').val();  

    var calle2 = validarDomi();
    var noEx2 = validarNE();
    var colonia2 = validarCol();
     var noI2 = validarNI();

    if (calle2=='' || noEx2=='' || colonia2=='' || noI2=='' || referencia=='' || municipio =='' || cp =='') {
      //ingresar todos los datos solicitados
    }else{
      $.post("../../acceso",{acceess:97,folio:folio,calle:calle,noEx:noEx,noI:noI,colonia:colonia,referencia:referencia,municipio:municipio,cp:cp},function(z){

       // document.getElementById('id01').style.display='block';
      location.href="https://dictamunigecem.edomex.gob.mx/Inicio";


      });
    }
  
    //actualizar en la tabla de inmuebles

  }
  function ok(){
    location.href="https://dictamunigecem.edomex.gob.mx/Inicio";
  }

  function validarNE() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm2']['noEx'];

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
      const input = document.forms['validationForm3']['noI'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageNI');

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
      const input = document.forms['validationForm2']['calle'];
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
      const input = document.forms['validationForm3']['col'];
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

 

$(document).ready(function () { 

    var mun = { vector : [] } ;
  var vector = { clvid : '',nom: ''};
  mun.vector.length = 0;
  
  
  
$.post("../../acceso",{acceess:67},function(zx){
           console.log(zx);
          // $('#munic').html("");
           //$('#munic').append("<option value='0' selected='selected' disabled> Selecciona Municipio </option>");
           $(zx).each(function(key,valuee){             
             mun.vector.push({clvid:valuee.a,nom:valuee.d_mnpio});
             });
           });


 $("#munic").change(function(){

    ///console.log("hola municipio");
var p = $("#munic").val();
if(p >= 126 ){
  console.log("numero de municipio no existe");
  $("#munic").css("border-color","#FF0000");
  return false;
  
  
}else if(p == "" || p ==" "  ){
  //$('#munic').html("");
  //$('#cpp').html("");
  $("#munic").css("border-color","FFFFFF");
     $('#munic').val("0");     
     $('#cpp').append("<option value='0' selected='selected' disabled> Selecciona CP </option>");
}else {
  $("#munic").css("border-color","FFFFFF");
  
  
        $(mun.vector).each(function(key,valuee){
          
            if( p ==  valuee.nom ){
              $('#munic').val(valuee.nom);
              //var tt = $("#wwe").val();
              console.log(valuee.nom);
                $.post("../../acceso",{acceess:65,ji:valuee.nom,jo:15},function(z){
                      console.log(z);
                      $('#cpp').html('');
                      $('#cpp').append("<option value='0' selected='selected' disabled> Selecciona CP </option>");
                      $(z).each(function(key,valuee){
                 //datos representante legal
                 $('#cpp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );

                });

                });                           
                           
            }
            });              

}

 });

    


});

