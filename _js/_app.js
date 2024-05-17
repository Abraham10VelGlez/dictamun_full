
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



  $('#selcdic').on('change', function() {
 
  //alert($(this).val());
  $("#nogx").val($(this).val());
  //$("#noReg").html('<input type="text" id="nogx" name="nogx" value="'+$(this).val()+'" />');
});



    //select Revisores
  $.post("../../acceso",{acceess:68},function(zw){
           console.log(zw);
         /*  $('#Rvigcm').append('<option value="0">--</option>');
           $(zw).each(function(key,valuee){
			$('#Rvigcm').append("<option value='"+ valuee.id +"' selected>" + valuee.nomcomple + "</option>" );*/
			
		});
				
      }); 
  
  //select estado
  $.post("../acceso",{acceess:63},function(z){
           console.log(z);
           $(z).each(function(key,valuee){
		
			$('#estado').append("<option value='"+ valuee.id +"' selected>" + valuee.nombre + "</option>" );
			
		});
				
      });
  
  $("#estado").change(function(){ 

    var j = $(this).val(); 
    $.post("../acceso",{acceess:64,j:j},function(z){
           console.log(z);
           $(z).each(function(key,valuee){
			//datos representante legal
			$('#municipio').append("<option value='"+ valuee.a +"' selected>" + valuee.d_mnpio + "</option>" );
			
		});
				
      });
}); 
  
$.post("../../acceso",{acceess:67},function(zx){
           console.log(zx);
           $(zx).each(function(key,valuee){			
			$('#munic').append("<option value='"+ valuee.a +"' selected>" + valuee.d_mnpio + "</option>" );
			
		});
				
      });


      // cp
 $("#munic").change(function(){ 

    //var ji = $(this).val();
    console.log($(this).val());
     $.post("../../acceso",{acceess:65,ji:$(this).val(),jo:15},function(z){
           console.log(z);
           $(z).each(function(key,valuee){
			//datos representante legal
			$('#cpp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );
			
		});
				
      });
    
}); 



 $("#municipio").change(function(){ 

    var ji = $(this).val();
    var jo = $("#estado").val(); 
    $.post("../acceso",{acceess:65,ji:ji,jo:jo},function(z){
           console.log(z);
           $(z).each(function(key,valuee){
			//datos representante legal
			$('#cp').append("<option value='"+ valuee.d_codigo +"' selected>" + valuee.d_codigo + "</option>" );
			
		});
				
      });
}); 
     

///////////////////////////////////////////////// 
//select dictaminadores
  $.post("../../acceso",{acceess:76},function(l){
           console.log(l);
           $('#selcdic').append('<option value="0">--</option>');
           $(l).each(function(key,valuee){
      $('#selcdic').append("<option value='"+ valuee.num_registro +"' selected>" + valuee.nombre_especialista + "</option>" );
      
      
      
    });
        
      });
//////////////////////////////////////////////////////////////

    
		
    
	//datosgenerales del dictamen
	var lr = $("#idG").val();
	$.post("../../acceso",{ acceess:69,lr:lr },function(v){
		$(v).each(function(key,valuee){
      			
			$('#n_inm').val(valuee.id);	
			$('#cvec').val(valuee.cve_cat);	
			
		
		});
	});
	$.post("../../acceso",{ acceess:51,lr:lr },function(zm){
    console.log(zm);
    if(zm == "0000"){
      ///
      console.log("devolver vista");
      ///
    }else{
      $(zm).each(function(key,valuee){

      	if (valuee.tipopersona == 1) { // fisica
      		//contribuyente
      		$("#descripcionSer").css('display','none'); 	
			$('#nomC').val(valuee.nombredenominacion +" "+ valuee.apaterno +" "+ valuee.amaterno );	
			$('#rfcC').val(valuee.rrfcontri);	 
			$('#curpC').val(valuee.curp);
			$('#telefonoC').val(valuee.telefono);	
			$('#correoC').val(valuee.email);
      	}else if (valuee.tipopersona==2) { // Moral
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
			$('#idP').val(valuee.tipopersona);	 
			
				

    });
    }
		
    
    //verifica datos
    /*var lr = $("#idG").val();
	$.post("../../acceso",{ acceess:66,lr:lr },function(p){
		console.log(p);
		$(p).each(function(key,valuee){
			//datos Identificacion el Contribuyente
			$('#nombreDenRaz').val(valuee.nombe + " " + valuee.aappt + " " + valuee.aapmt );
			$('#rfc').val(valuee.rrfcc);
      $('#curp').val(valuee.curp);
      $('#telefono').val(valuee.telefono);
			$('#correoE').val(valuee.email);
			//Dictaminador - Especialista
			$('#nombesp').html(valuee.nomb + " " + valuee.appt + " " + valuee.apmt );
			$('#rfcss').html(valuee.rrfc);
			$('#nog').html(valuee.no_reg_autorizado);
			//Información Adicional
			$('#anio').val(valuee.aniodictaminar);
			$('#tpd').val(valuee.nomt);	
			//folioreconstruido
			$('#idGRec').val(valuee.folioreconstruido);
      $('#idP').val(valuee.tipopersona);
      		
    });
    }); */

     

		
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
	


/*	var folidicta = $("#idG").val();
	$.post("../../acceso",{ acceess:45,folidicta:folidicta },function(zm){
    console.log(zm);
    
		
		});*/
      

    // creando vistas de documentos
  var tippp = $('#idP').val();
  var dct = $('#idG').val();
  $.post("../../acceso",{acceess:71,idpers:tippp,dictams:dct},function(h){
  //  console.log(h);
     var tip_p = $('#idP').val();
    if( tip_p == "1"){
       $(h).each(function(key,valuee){
      //valuee.orden
        
        switch (valuee.orden) {
          case "10":
            $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
            $("#okava").css('color','#1fce10');

            $("#commentav").val(valuee.comentario);
            
            
            break;
            case "11":
              $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#okvc").css('color','#1fce10');

              $("#commentcx").val(valuee.comentario);
            
            break;
            case "14":
              //documento firmado x el contribuyente
              $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#okfmr").css('color','#1fce10');

              $("#commentfmc").val(valuee.comentario);
            
            break;
            case "15":
              //documento indivisos condominios
              $("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f7").css('color','#1fce10');

              $("#1commentg").val(valuee.comentario);
                        
            
            break;
            case "99":
              $("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f1").css('color','#1fce10');

              $("#1commenta").val(valuee.comentario);
            
            break;
            case "98":
              $("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f2").css('color','#1fce10');

              $("#1commentb").val(valuee.comentario);
            
            break;
            case "97":
              $("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f3").css('color','#1fce10');

              $("#1commentc").val(valuee.comentario);
            
            break;
            case "96":
              $("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f4").css('color','#1fce10');

              $("#1commentd").val(valuee.comentario);
            
            break;
            case "95":
              $("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f5").css('color','#1fce10');

              $("#1commente").val(valuee.comentario);
            
            break;
            case "94":
              $("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#f6").css('color','#1fce10');

              $("#1commentf").val(valuee.comentario);
            
            break;
        
          default:
            break;
        }

    });


    }else{
      $(h).each(function(key,valuee){
      //valuee.orden
        
        switch (valuee.orden) {
          case "10":
            $("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
            $("#okava").css('color','#1fce10');

            $("#commentav").val(valuee.comentario);
            
            
            break;
            case "11":
              $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#okvc").css('color','#1fce10');

              $("#commentcx").val(valuee.comentario);
            
            break;
            
            case "14":
              //documento firmado x el contribuyente
              $("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#okfmr").css('color','#1fce10');

              $("#commentfmc").val(valuee.comentario);
            
            break;
            case "15":
              //documento indivisos condominios
              $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#8m").css('color','#1fce10');

              $("#commenth").val(valuee.comentario);
            
            break;
            case "90":
              $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#1m").css('color','#1fce10');

              $("#commenta").val(valuee.comentario);
            
            break;
            case "89":
              $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#2m").css('color','#1fce10');

              $("#commentb").val(valuee.comentario);
            
            break;
            case "88":
              $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#3m").css('color','#1fce10');

              $("#commentc").val(valuee.comentario);
            
            break;
            case "87":
              $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#4m").css('color','#1fce10');

              $("#commentd").val(valuee.comentario);
            
            break;
            case "86":
              $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#5m").css('color','#1fce10');

              $("#commente").val(valuee.comentario);
            
            break;
            case "85":
              $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#6m").css('color','#1fce10');

              $("#commentf").val(valuee.comentario);
            
            break;
            case "84":
              $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
              $("#7m").css('color','#1fce10');

              $("#commentg").val(valuee.comentario);
            
            break;
        
          default:
            break;
        }

    });


    }
    

  });

  //vista Tipologias guardaR sin subir
  var tipppx = $('#idP').val();
  var dctx = $('#idG').val();
  $("#tipologs").html('');
  $.post("../../acceso",{acceess:73,idpers:tipppx,dictams:dctx},function(m){
    console.log(m);
    $("#Ga").css('display','block');      
    $.each( m, function( key, value ) {
  var a = key + 1;
    var cher = "";
  if( value.comentario === null ){
    cher = "";
  }else{
    cher = value.comentario;
  }
  //j.id as id_docx,nombredoc,orden,comentario
  $("#tipologs").append('<tr><td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> Subido</td><input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#1fce10;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher +'</textarea></td></tr>tr>');  
});
//despliega en automatico el btn de guardar
$("#acuseG").css('display','block');
  });
	
	
	/// cargar archivos de dictamen
	$("#acuseG").click(function(){
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
			var com4 = $("#1commentd").val();
			var com5 = $("#1commente").val();
      var com6 = $("#1commentf").val();

      var com7 = $("#1commentg").val();
			
			//var com7 = $("#commentrep").val();
      
/*
	  $.post("../../acceso",{acceess:55,idG:ky,form:pahtv.vector,comment:pahtv_w.vector_write},function(yz){
        console.log(yz);
        if( yz == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';

				}else{
					
					console.log("error");	
					document.getElementById('id06').style.display='block';			
				}			
    });*/
    
    //traer todas las tipologias
    //para seleccionar una opcion
  
    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#idG").val();
	  var iddoc = 12;
	  var comentario = $(this).find('textarea').val();
	  
	//var a = key + 1;
   pahtv_t.vector_t.push({
			id_inmu : idinmu,
			id_doc: iddoc,
			tipolg_n : a,
			comentario : comentario 
	});
  
         
    });
    console.log(pahtv_t.vector_t);
    
			
			$.post("../../acceso",{acceess:55,idG:ky ,
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
        tipologg:pahtv_t.vector_t},function(z){
					 console.log(z);
				if( z == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';

				}else{
					
					console.log("error");	
					document.getElementById('id06').style.display='block';			
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
      var com7 = $("#commentg").val();
      var com8 = $("#commenth").val();
      

       

      
			
      //var com8 = $("#commentrep").val();
          //traer todas las tipologias
    //para seleccionar una opcion
  
    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#idG").val();
	  var iddoc = 12;
	  var comentario = $(this).find('textarea').val();
	  
	//var a = key + 1;
   pahtv_t.vector_t.push({
			id_inmu : idinmu,
			id_doc: iddoc,
			tipolg_n : a,
			comentario : comentario 
	});
  
         
    });
    console.log(pahtv_t.vector_t);
    
			
			
			$.post("../../acceso",{acceess:56,idG:ky ,
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
         tipologg:pahtv_t.vector_t
         },function(z){
					 console.log(z);
				if( z == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';
				}else{
					
					console.log("error");		
					document.getElementById('id06').style.display='block';		
				}			
      });
      
			  /*$.post("../../acceso",{acceess:55,idG:ky,form:pahtv.vector,comment:pahtv_w.vector_write},function(yz){
        console.log(yz);
        if( yz == "50" ){
					console.log("datos guardados");
					document.getElementById('id05').style.display='block';

				}else{
					
					console.log("error");	
					document.getElementById('id06').style.display='block';			
				}			
	  });*/
			
		}

		
	
		var abc = $("#idGRec").val();		
		var a = {acceess:52,abc:abc};		
		$.ajax({
			url: "../../acceso",
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
		});var b = {acceess:53,abc:abc};
		$.ajax({
			url: "../../acceso",
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
		});var c = {acceess:54,abc:abc};
		$.ajax({
			url: "../../acceso",
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
		
	});

	$("#scrp").keyup(function(){
    var rbk = $("#scrp").val();
    $("#scrp").val('');
		$("#scrp").val(rbk);
	});
	
	
	 var dic = $("#dictaminadortmp").val();  
	$.post("../acceso",{acceess:47,dic:dic},function(n){ 
		
		$(n).each(function(key,valuee){   
			$('#dictaminador').val(valuee.no_reg_autorizado);
			//$('#uicg').val(valuee.cargou);			
	          $("#dictaminadorN").val("Dictaminador: "+ valuee.nombre + " " + valuee.ap_paterno + " " + valuee.ap_materno );
			                   /*set code for Ing abraham date 14-02-2020*/
			                   /*created_at*/
			                });
		  
         
	}); 


	$.post("../acceso",{acceess:46},function(f){
		var fecha = new Date();
		var ano = fecha. getFullYear();
		
		var folio = f;
		//AGREGAR CEROS A LA IZQUIERDA EN FOLIO (FALTA)++++********
		$("#folio").val("FOLIO: AD/"+folio+"/"+ano);  

	});

  // Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});
});

/*  EVENTO PARA INICIAR UN HOLA MUNDO POR MEDIO DE ANGULAR ACTIVANDO TODO EL BODY DE HTML CON USO DE  IndexController */	
var app = angular.module("app", []);//'datatables'
app.controller("ControllerTab",function ControllerTab($scope, $http){
	$http.post('acceso2', {
		data: {access: 53}
	}).success(function(response){					
		var a = JSON.stringify(response);
		var b = JSON.parse(a);		
		$scope.lista =b;		
		
		console.log(response);
	}).error(function(){
		console.log("Error al intentar cargar datos");		
	});
	//$scope.lista = [{"id_usuario":"2265","nombre_usuario":"usig04","tipo_usuario":"2","activo":"t"},{"id_usuario":"2636","nombre_usuario":null,"tipo_usuario":"1","activo":"t"},{"id_usuario":"2607","nombre_usuario":null,"tipo_usuario":"1","activo":"t"},{"id_usuario":"2569","nombre_usuario":null,"tipo_usuario":"1","activo":"t"},{"id_usuario":"2527","nombre_usuario":"LZVAR","tipo_usuario":"2","activo":"t"}];
	
	
});
/*  EVENTO PARA INICIAR CONTROLADOR DE UN  FORMULARIO Y AGREGAR DATOS DE MANERA DIRECTA SIN DATOS DE UN ARCHIVO JSON */	
app.controller("ControllerDate",function ControllerCampeonato($scope, $http){	
		
	$scope.btn1 = function(){
		alert("jajajajaj");

	};

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

function inmueblesRevisar(c){
	/*var clavC = c;
	var fol = $("#idInmu").val();
	var fol2 = $("#idCompl").val(); 
	  $.post("../../acceso",{acceess:44,clavC:clavC, fol:fol},
    	function(z){
            // console.log('info');
             //console.log(z);         
            $(z).each(function(key,valuee){
            	//Aviso
			$("#folioI").val(valuee.folio); 
			$("#anioD").val(valuee.aniodictamen); 
			$("#contri").val(valuee.nombredenominacion); 
			$("#rfcC").val(valuee.rfc); 
			$("#clave").val(valuee.cve_catastral); 
			$("#valor").val(valuee.valor_catastral); 
			$("#calle").val(valuee.calle); 
			$("#noE").val(valuee.no_exterior); 
			$("#noI").val(valuee.no_interior); 
			$("#colonia").val(valuee.colonia);
			$("#municipio").val(valuee.nommpio);
			$("#cp").val(valuee.codigo_p);
			$("#referencia").val(valuee.referencia1);
			//Dictamen
			//$("#noFolio").val();
			var dictaminadorCom= valuee.dictaminador+" "+valuee.apdictaminador+" "+valuee.amdictaminador;
			$("#dictaminador").val(valuee.dictaminadorCom);
			$("#rfcD").val(valuee.rfcdictaminador);
			$("#noReg").val(valuee.noregistro);
			$("#tipoD").val(valuee.tipodictamen);   
			$("#estatus").val(valuee.etapa);

		});				
      });

      //Archivos 
			console.log('archivos'); 
	$.post("../../acceso",{acceess:42,clavC:clavC, fol:fol},
    	function(z){  
    	//console.log(z); 
    	var ruta="http://localhost/dictamun/files/documentos/"; 

            $(z).each(function(key,valuee){
            	
            	if (valuee.orden==10) {
            		$("#dictaval").val(valuee.nombredoc); 
            		$("#comenDictaval").val(valuee.comentario);
            		$("#descargaDictaval").append('<a id="descargaDictaval" href="'+ruta+fol2+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
            	}else if (valuee.orden==11) {
            		$("#construccion").val(valuee.nombredoc);
            		$("#comenConstru").val(valuee.comentario);
            		$("#descargaConstruc").append('<a id="descargaDictaval" href="'+ruta+fol2+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
  
            	}else if (valuee.orden==88) {
            		$("#boletaPredial").val(valuee.nombredoc);
            		$("#comentPredial").val(valuee.comentario);
            		$("#descargarBoletaP").append('<a id="descargaDictaval" href="'+ruta+fol2+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
  					
            	}else if (valuee.orden==84) {
            		$("#otros").val(valuee.nombredoc);
            		$("#comentariOtros").val(valuee.comentario);
            		$("#descargaOtros").append('<a id="descargaDictaval" href="'+ruta+fol2+"/"+valuee.nombredoc+'" download="'+valuee.nombredoc+'"><i class="fa fa-download fa-2x"></i></a>');
  					
            	}
		});		
      });
			
			



	document.getElementById('seguimientoT').style.display='block';  
	document.getElementById('dictamenT').style.display='block'; 
	document.getElementById('archivosRecT').style.display='block'; 
	document.getElementById('RepFotComplT').style.display='block'; 
	document.getElementById('predioT').style.display='block';  
*/

}
function ass() {
	var var1 = "user";
	$.ajax({
		url: "../../acceso2",
		type: "json",             
		data: {data: {access: 103, var1 : var1 }}, 			  
		contentType: false,       
		cache: false,             
		processData:false,        
		success: function(response)   
		{
			console.log(response);
			
		} 
	});
	
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
    const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

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
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

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
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ]+$', 'i');

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
      const pattern = new RegExp('^[A-ZÁÉÍÓÚÑ]+$', 'i');

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
      const input = document.forms['validationForm']['calle'];
      const message = document.getElementById('messageDomi');
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
function validarNE() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar
      const input = document.forms['validationForm']['nExterior'];

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
function validarNi() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['nInterior'];

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
function validarCol() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;

      // El input que queremos validar
      const input = document.forms['validationForm']['colonia'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('messageCol');

      input.willValidate = false;

      // El pattern que vamos a comprobar
      const pattern = new RegExp('^[A-Z ÁÉÍÓÚÑ]+$', 'i');

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

function validarCurp() {
      // Variable que usaremos para determinar si el input es valido
      let isValid = false;
      // El input que queremos validar

      const input = document.forms['validationForm']['curp'];

      //El div con el mensaje de advertencia:
      const message = document.getElementById('msjCurp');

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
function validarRfc2() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['rfc'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('msjCurp');

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
function validarRfc() {
    // Variable que usaremos para determinar si el input es valido
    let isValid = false;
    // El input que queremos validar
    const input = document.forms['validationForm']['rfc1'];

    //El div con el mensaje de advertencia:
    const message = document.getElementById('msjCurp');

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
	
	$("#i").css('display','none');
	$("#j").css('display','block');
	
	
}
function name_morl() {
	$("#j").css('display','none');
	$("#i").css('display','block');

	
}

function btnpre(){
  alert("enviar datos");
  $.post("../acceso",{acceess:48},function(n){ 
		
		  document.getElementById('id01_mo').style.display='block';  
	}); 

}


