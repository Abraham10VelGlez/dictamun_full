
$(document).ready(function () {	
	
	/*$("#av").click(function(){
		location.href="http://localhost/dictamun/pdf/aviso/700";
			
					
				
				
		
	});*/
	
  
 	  	 
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



  $('#selcdic').on('change', function() {
 
  //alert($(this).val());
  $("#nogx").val($(this).val());
  //$("#noReg").html('<input type="text" id="nogx" name="nogx" value="'+$(this).val()+'" />');
});



  
  //select estado
 /* $.post("../acceso",{acceess:63},function(z){
           console.log(z);
           $(z).each(function(key,valuee){
		
			$('#estado').append("<option value='"+ valuee.id +"' selected>" + valuee.nombre + "</option>" );
			
		});
				
      });*/
  /*
    $("#estado").change(function(){

    var j = $(this).val();
    $.post("../acceso",{acceess:64,j:j},function(z){
           console.log(z);
           $('#municipio').append("<option value='0' selected='selected' disabled> Selecciona Municipio </option>");
           $(z).each(function(key,valuee){
      //datos representante legal
      $('#municipio').append("<option value='"+ valuee.d_mnpio +"' selected>" + valuee.d_mnpio + "</option>" );

    });

      });
});*/

 var mun = { vector : [] } ;
  var vector = { clvid : '',nom: ''};
  mun.vector.length = 0;
  
  
  
$.post("../../acceso",{acceess:67},function(zx){
          // console.log(zx);
           $('#munic').html("");
           $('#munic').append("<option value='0' selected='selected' disabled> Selecciona Municipio </option>");
           $(zx).each(function(key,valuee){
             $('#munic').append("<option value='"+ valuee.d_mnpio +"' selected>" + valuee.d_mnpio + "</option>" );
             mun.vector.push({clvid:valuee.a,nom:valuee.d_mnpio});
             });
           });


      // cp
 $("#munic").change(function(){

    var ji = $(this).val();
    //console.log($(this).val());
     $.post("../../acceso",{acceess:65,ji:$(this).val(),jo:15},function(z){
           //console.log(z);
           $('#cpp').html('');
           $('#cp').append("<option value='0' selected='selected' disabled> Selecciona CP </option>");
           $(z).each(function(key,valuee){
      //datos representante legal
      $('#cpp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );

    });

      });

});
 
 
 $("#modfmunic").change(function(){

	    var ji = $(this).val();
	    cargar_datos_cp(ji);

	});
 



 $("#municipio").change(function(){

    var ji = $(this).val();
    var jo = $("#estado").val();
    $.post("../acceso",{acceess:65,ji:ji,jo:jo},function(z){
           //console.log(z);
           $('#cpp').html('');
           $('#cp').append("<option value='0' selected='selected' disabled> Selecciona CP </option>");
           $(z).each(function(key,valuee){
      //datos representante legal
      $('#cp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );

    });

      });
});


/////////////////////////////////////////////////
//select dictaminadores
  $.post("../../acceso",{acceess:88},function(l){
           //console.log(l);
           $('#selcdic').append("<option value='0' selected='selected' disabled> Selecciona </option>");
           $(l).each(function(key,valuee){
           $('#selcdic').append("<option value='"+ valuee.no_reg_autorizado +"' >" + valuee.nombre_especialista + "</option>" );



    });

      });
//////////////////////////////////////////////////////////////


    /*
	$("#scrp").keyup(function(){
    var rbk = $("#scrp").val();
    $("#scrp").val('');
		$("#scrp").val(rbk);
	});
	*/
  // Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});









//////////////// modificacion PARA EL Municipio ACOMPLETADO
$("#c_muni").keyup(function(s){
  ///console.log("hola municipio");
var p = $("#c_muni").val();
if(p >= 126 ){
  console.log("numero de municipio no existe");
  $("#c_muni").css("border-color","#FF0000");
  return false;
  
  
}else if(p == "" || p ==" "  ){
  //$('#munic').html("");
  //$('#cpp').html("");
     $('#munic').val("0");
     $('#cpp').append("<option value='0' selected='selected' disabled> Selecciona CP </option>");
}else {
  
        $(mun.vector).each(function(key,valuee){
          
            if( p ==  valuee.clvid ){
              $('#munic').val(valuee.nom);
              //var tt = $("#wwe").val();
              //console.log(valuee.nom);
                $.post("../../acceso",{acceess:65,ji:valuee.nom,jo:15},function(z){
                      //console.log(z);
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


// new code inmuebles
$("#saveinm").click(function(){
	alert("save");
	
});


});




function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}



function guardarContribuyente(){
	
	var person = $('input:radio[name=demo-priority]:checked').val();
	
	if(person == "1"){
		var nombre = $('#nombref').val();
	    var telefono = $('#telefonof').val();
	    var apellidoP = $('#apellidoP').val();
	    var apellidoM = $('#apellidoM').val();
	    var email = $('#email').val();
	    var curp = $('#curp').val();var rfc = $('#rfc1').val();
	    var dictaminador = $('#dictaminador').val();
	    var folio = $('#folio').val(); 

	    var calle = $('#calle').val();
	    var nExterior = $('#nExterior').val();
	    var nInterior = $('#nInterior').val();
	    var colonia = $('#colonia').val();
	    
	    var estado = $('#estado').val();
	    var cp = $('#cp').val();
	    
	    var municipio = $('#municipio').val();
	    var referencias = $('#referencias').val();
	    var referencias2 = $('#referencias2').val();

	    var c_muni = $('#c_muni').val();
	    var c_zona = $('#c_zona').val();
	    var c_manz = $('#c_manz').val();
	    var c_lote = $('#c_lote').val();
	    var c_edif = $('#c_edif').val(); 
	    var c_dept = $('#c_dept').val();  

	    var valorCatastral = $('#currency-field').val();  
	    var anioDic = $('#anioDic').val();  
	    var tipoD = $('#tipoD').val();  

	    var nombre2 = nombre;
	    var telefono2 = telefono;
	    var apellidoP2 = apellidoP;
	    var apellidoM2 = apellidoM;
	    var calle2 = calle; 
	    var nExterior2 = nExterior;
	    var nInterior2 = nInterior;
	    var colonia2 = colonia;
      var curp2 = curp;

        nombre = validarNombre();
        telefono = validarTel(); 
        apellidoP = validarAPP();
        apellidoM = validarAPM(); 
        //falta validar el email, CP, Municipio, Referencias
        calle = validarDomi(); 
        nExterior = validarNE(); 
        nInterior = validarNi(); 
        colonia = validarCol();
        
         
       var estado1 =	validarestd();
        	 var municipio1 = validarmunc();
      var  cp1 =	validarcp();
      var  rfc2 =	validarRfc();
	     
	    	 
	    
        curp = validarCurp();
        

        if (!nombre || !telefono || !apellidoP || !apellidoM || dictaminador == null || 
        	!calle || !nExterior || !nInterior || !colonia || !estado1 || !municipio1 || !cp1  || referencias=='' || referencias2==''
        	|| c_muni=='' || c_zona=='' || c_manz=='' || c_lote=='' || c_edif=='' || 
        	c_dept=='' || valorCatastral=='' || anioDic=='' || tipoD=='' || !curp || !rfc2) {
        	alert('Datos no validos, verificar'); 
        }else{
        	//alert('continuar'); 
       $.post("../acceso",{acceess:48,nombre2:nombre2,telefono2:telefono2,
          apellidoP2:apellidoP2,apellidoM2:apellidoM2,email:email,dictaminador:dictaminador,
          folio:folio,calle2:calle2,nExterior2:nExterior2,nInterior2:nInterior2,
          colonia2:colonia2, estado:estado, cp:cp, municipio:municipio ,referencias:referencias,referencias2:referencias2,
          c_muni:c_muni,c_zona:c_zona,c_manz:c_manz,c_lote:c_lote,c_edif:c_edif,
          c_dept:c_dept,valorCatastral:valorCatastral,anioDic:anioDic,tipoD:tipoD,
          curp2:curp2,rfc2:rfc,person:person},function(n){  
		
		  document.getElementById('id01_mo').style.display='block';  
	}); 
        }
		
	}else if(person == "2"){
		
		var nombre = $('#nombre').val();
	    var telefono = $('#telefono').val();
	    var apellidoP = ""; // este campo no se valida
	    var apellidoM = ""; // este campo no se valida
	    var email = $('#email').val();
	    var curp = ""; // este campo no se valida
	    var rfc = $('#rfc').val();
	    var dictaminador = $('#dictaminador').val();
	    var folio = $('#folio').val(); 

	    var calle = $('#calle').val();
	    var nExterior = $('#nExterior').val();
	    var nInterior = $('#nInterior').val();
	    var colonia = $('#colonia').val();
	    
	    var estado = $('#estado').val();
	    var cp = $('#cp').val();
	    
	    var municipio = $('#municipio').val();
	    var referencias = $('#referencias').val();
	    var referencias2 = $('#referencias2').val();

	    var c_muni = $('#c_muni').val();
	    var c_zona = $('#c_zona').val();
	    var c_manz = $('#c_manz').val();
	    var c_lote = $('#c_lote').val();
	    var c_edif = $('#c_edif').val(); 
	    var c_dept = $('#c_dept').val();  

	    var valorCatastral = $('#currency-field').val();  
	    var anioDic = $('#anioDic').val();  
	    var tipoD = $('#tipoD').val();  

	    var nombre2 = nombre;
	    var telefono2 = telefono;
	    var apellidoP2 = apellidoP;
	    var apellidoM2 = apellidoM;
	    var calle2 = calle; 
	    var nExterior2 = nExterior;
	    var nInterior2 = nInterior;
	    var colonia2 = colonia;
      var curp2 = curp; // este campo no se valida

        nombre = validarNombre2();
        telefono = validarTel2(); 
        //apellidoP = validarAPP();
        //apellidoM = validarAPM(); 
        
        calle = validarDomi(); 
        nExterior = validarNE(); 
        nInterior = validarNi(); 
        colonia = validarCol();
        
         
       var estado1 =	validarestd();
        	 var municipio1 = validarmunc();
      var  cp1 =	validarcp();
      var  rfc2 =	validarRfc2();
	     
	    	 
	    
        //curp = validarCurp();
        

        if (!nombre || !telefono || dictaminador == '' || 
        	!calle || !nExterior || !nInterior || !colonia || !estado1 || !municipio1 || !cp1  || referencias=='' || referencias2==''
        	|| c_muni=='' || c_zona=='' || c_manz=='' || c_lote=='' || c_edif=='' || 
        	c_dept=='' || valorCatastral=='' || anioDic=='' || tipoD=='' || !rfc2) {
        	alert('Datos no validos m, verificar'); 
        }else{        	
        $.post("../acceso",{acceess:48,nombre2:nombre2,telefono2:telefono2,
          apellidoP2:apellidoP2,apellidoM2:apellidoM2,email:email,dictaminador:dictaminador,
          folio:folio,calle2:calle2,nExterior2:nExterior2,nInterior2:nInterior2,
          colonia2:colonia2, estado:estado, cp:cp, municipio:municipio ,referencias:referencias,referencias2:referencias2,
          c_muni:c_muni,c_zona:c_zona,c_manz:c_manz,c_lote:c_lote,c_edif:c_edif,
          c_dept:c_dept,valorCatastral:valorCatastral,anioDic:anioDic,tipoD:tipoD,
          curp2:curp2,rfc2:rfc,person:person},function(n){ 
		
		  document.getElementById('id01_mo').style.display='block';  
	}); 
        }
		
	}else{
		console.log("error");
	}
	
	    	
}






function okAcuse(){     

  //Ocultar Boton de enviar 
  $('#EnviarAcuse').hide(); 
  
  //correosmasivos
 $.post("../../acceso",{acceess:77},function(d){

  console.log(d);
  document.getElementById('id04').style.display='none'; 
  location.href="../DatosContribuyente/"; 


 }); 
  
}
function acuseDescargar(){

  document.getElementById('id03').style.display='none'; 
  document.getElementById('id04').style.display='block'; 

}
function validaremailF() {
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['correoE'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageEmail');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}');

    // Primera validacion, si input esta vacio entonces no es valido
    if(!input.value) {
      isValid = false;
    } else {
        // Segunda validacion, si input contiene caracteres diferentes a los permitidos
        if(!pattern.test(input.value)){ 
      
        // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
        // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
          isValid = false;
        } else {
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
function validaremailM() {
    // Variable que usaremos para determinar si  el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['correoD'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageEmailm');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}');

    // Primera validacion, si input esta vacio entonces no es valido
    if(!input.value) {
      isValid = false;
    } else {
        // Segunda validacion, si input contiene caracteres diferentes a los permitidos
        if(!pattern.test(input.value)){ 
      
        // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
        // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
          isValid = false;
        } else {
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
function validarNombre2() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['nombre'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('message');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ]+$', 'i');

    // Primera validacion, si input esta vacio entonces no es valido
    if(!input.value) {
      isValid = false;
    } else {
        // Segunda validacion, si input contiene caracteres diferentes a los permitidos
        if(!pattern.test(input.value)){ 
      
        // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
        // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
          isValid = false;
        } else {
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
function validarTel2() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['telefono'];
    //El div con el mensaje de advertencia:
    const message = document.getElementById('messageTelAsc');
    input.willValidate = false;
    const maximo = 12;
    // El pattern que vamos a comprobar
    const pattern = new RegExp('^[0-9]+$', 'i');
    // Primera validacion, si input esta vacio entonces no es valido
    if(!input.value) {
      isValid = false;
    } else {
        // Segunda validacion, si input contiene caracteres diferentes a los permitidos
        if(!pattern.test(input.value)){ 
        // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
        // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
          isValid = false;
        } else if (input.value.length > maximo) {
        isValid = false;
        }
        else {
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

 function validarNombre() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['nombref'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('message');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ]+$', 'i');

      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){ 
        
          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else {
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
function validarTel() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['telefonof'];
      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageTelAsc');
      input.willValidate = false;
      const maximo = 12;
      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[0-9]+$', 'i');
      // Primera validacion, si input esta vacio entonces no es valido
      if(!input.value) {
        isValid = false;
      } else {
          // Segunda validacion, si input contiene caracteres diferentes a los permitidos
          if(!pattern.test(input.value)){ 
          // Si queremos agregar letras acentuadas y/o letra ñ debemos usar
          // codigos de Unicode (ejemplo: Ñ: \u00D1  ñ: \u00F1)
            isValid = false;
          } else if (input.value.length > maximo) {
          isValid = false;
          }
          else {
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
function validarAPP() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['apellidoP'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAP');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑüÜ]+$', 'i');

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
function validarAPM() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['apellidoM'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageAM');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z 0-9 ÁÉÍÓÚÑüÜ ]+$', 'i');

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
  /*
      let isValid = false;
      const input = document.forms['validationForm']['calle'];
      const message = document.getElementById('messageDomi');
      input.willValidate = false;
      const pattern = new RegExp('^[A-Z 0-9 ÁÉÍÓÚÑüÜ ]+$', 'i');

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

      */

      let isValid = false;
const message = document.getElementById('messageDomi');
      var dato = document.getElementById("calle").value;
   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
       if (dato.match(valoresAceptados)){
          isValid = true;
       } else {
         isValid = false;
      }

      if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      return isValid;
    }
function validarNE() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['nExterior'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageNE');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ]+$', 'i');

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
function validarNi() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['nInterior'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageNE');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ]+$', 'i');

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
function validarCol() {
  /*
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['colonia'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageCol');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z 0-9 ÁÉÍÓÚÑüÜ ]+$', 'i');

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


      */


      let isValid = false;
const message = document.getElementById('messageCol');
      var dato = document.getElementById("colonia").value;
   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
       if (dato.match(valoresAceptados)){
          isValid = true;
       } else {
         isValid = false;
      }

      if(!isValid) {
        message.hidden = false;

      } else {
        message.hidden = true;
      }
      return isValid;
    }

function validarCurp() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['validationForm']['curp'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('msjCurp');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z0-9 ]+$', 'i'); 

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
function validarRfc2() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['rfc'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('msjCurp');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('^[A-Z0-9 ]+$', 'i'); 

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
function validarRfc() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['rfc1'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('msjCurp');

    input.willValidate = false;

    // El pattern que vamos a comprobar
    const pattern = new RegExp('^[A-Z0-9 ]+$', 'i'); 

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


function validarestd(){
	var estado = $('#estado').val();
	if( estado == " " || estado == "" ){
		isValid = false;
	}else{
		 isValid = true;
	}
	 return isValid;
}

function validarmunc(){
	var municipio = $('#municipio').val();
	if( municipio == " " || municipio == "" ){
		isValid = false;
	}else{
		 isValid = true;
	}
	 return isValid;
}
function validarcp(){
	var cp = $('#cp').val();
	if( cp == " " || cp == "" ){
		isValid = false;
	}else{
		 isValid = true;
	}
	 return isValid;
}

/// TIPO DE PERSONA 
function name_fisk() {
	
	$("#i").css('display','none'); // flex
	$("#j").css('display','flex');
	color_twonone();
	
	
}
function name_morl() {
	$("#j").css('display','none');
	$("#i").css('display','flex');
	color_twonone();

	
}

function btnpre(){
  alert("enviar datos");
  $.post("../acceso",{acceess:48},function(n){ 
		
		  document.getElementById('id01_mo').style.display='block';  
	}); 

}


function cargar_datos_cp(xxx){
	//console.log($(this).val());
    $.post("../../acceso",{acceess:65,ji:xxx,jo:15},function(z){
          //console.log(z);
          $('#modfcpp').html('');	           
          $(z).each(function(key,valuee){     
     $('#modfcpp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );

   });

     });
}

function cargar_datos_cp2(xxx,pc){
	//console.log($(this).val());
    $.post("../../acceso",{acceess:65,ji:xxx,jo:15},function(z){
          //console.log(z);
          $('#modfcpp').html('');	           
          $(z).each(function(key,valuee){     
     $('#modfcpp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );

   });
        $("#modfcpp").val(pc);
		$("#modfcpp option[value='"+  pc +"']").attr("selected",true);
          

     });
}

