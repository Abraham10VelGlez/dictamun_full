var pahtv = { vector : [] } ;
	var pahtv_w = { vector_write : [] } ;
	var pahtv_t = { vector_t : [] } ;
	var vector = { id_inmu : '',id_doc : '', bandera : ''};
	var vector_write = { id_inmu : '',id_doc : '', comentario : '' };
	var vector_t = { id_inmu : '',id_doc : '',tipolg_n : '', comentario : '' };




function upload_files3(){
	
	var d = $("#domin3").val();
	var car = $("#idGRec").val();
	var cat = $("#cvec").val();
	$(".upload-msg4").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload4");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload4',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',cat);
	$.ajax({
		url: "../../AEDTMN/MotorFilerR",
		type: "POST",             
		data: data, 			  
		contentType: false,       
		cache: false,             
		processData:false,        
		success: function(data)   
		{						
			$(".upload-msg4").html(data);
			window.setTimeout(function() {
			$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove();
			});	}, 1000);
			$("#Ga").css('display','block');
			$("#acuseG").css('display','block');
			
		} 
	});
}
function upload_files2(){
	var d = $("#domin2").val();
	var car = $("#idGRec").val();
	var cat = $("#cvec").val();
	$(".upload-msg3").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload3");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload3',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',cat);
	$.ajax({
		url: "../../AEDTMN/MotorFilerM",
		type: "POST",             
		data: data, 			  
		contentType: false,       
		cache: false,             
		processData:false,        
		success: function(data)   
		{						
			$(".upload-msg3").html(data);
			window.setTimeout(function() {
			$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove();
			});	}, 1000);
			
		} 
	});

				
			}
function upload_files(){
	var car = $("#idGRec").val();
	var d = $("#domin1").val();
	var cat = $("#cvec").val();
				$(".upload-msg2").text('Cargando...');
				var inputFileImage = document.getElementById("fileToUpload2");
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append('fileToUpload2',file);
				data.append('Kap',car);
				data.append('opcs',d);
				data.append('cv',cat);
				$.ajax({
					url: "../../AEDTMN/MotorFilerF",
					type: "POST",             
					data: data, 			  
					contentType: false,       
					cache: false,             
					processData:false,        
					success: function(data)   
					{						
						$(".upload-msg2").html(data);
						window.setTimeout(function() {
						$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
						$(this).remove();
						});	}, 1000);
						
					} 
				});
				
			}

function upload_val2(){

	var car = $("#idGRec").val();
	var d = $("#domin110").val();
	var cat = $("#cvec").val();
	$(".upload-msg55").text('Cargando...');
				var inputFileImage = document.getElementById("fileToUpload55");
				var file = inputFileImage.files[0];				
				var data = new FormData();
				data.append('fileToUpload55',file);	
				data.append('Kap',car);
				data.append('opcs',d);
				data.append('cv',cat);
				$.ajax({
					url: "../../AEDTMN/MoterFC",
					type: "POST",             
					data: data, 			  
					contentType: false,       
					cache: false,             
					processData:false,        
					success: function(data)   
					{
					
						$(".upload-msg55").html(data);
						window.setTimeout(function() {
						$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
						$(this).remove();
						});	}, 1000);

								
							
					} 
				});
}

function upload_val(){

	var car = $("#idGRec").val();
	var d = $("#domin0").val();
	var cat = $("#cvec").val();
	$(".upload-msg").text('Cargando...');
				var inputFileImage = document.getElementById("fileToUpload");
				var file = inputFileImage.files[0];				
				var data = new FormData();
				data.append('fileToUpload',file);	
				data.append('Kap',car);
				data.append('opcs',d);
				data.append('cv',cat);
				$.ajax({
					url: "../../AEDTMN/MoterF",
					type: "POST",             
					data: data, 			  
					contentType: false,       
					cache: false,             
					processData:false,        
					success: function(data)   
					{
					
						$(".upload-msg").html(data);
						window.setTimeout(function() {
						$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
						$(this).remove();
						});	}, 1000);

								
							
					} 
				});
}
function cerrarMod(){

if( $('#okvaa').val() == "1"  ){

	$("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#okava").css('color','#1fce10');	
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#av").val(),
	bandera: $('#okvaa').val()
	});
	$('#okvaa').val("2");
	
	

}else if( $('#okvcc').val() == "1" ){

$("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#okvc").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#co").val(),
	bandera: $('#okvcc').val()
	});				
	$('#okvcc').val("2");
	 
	
}else{
	if( $('#okvaa').val() == "_"){
			$("#okava").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#okava").css('color','red');	
			
		}else{
			$("#okava").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#okava").css('color','red');
		}

	if( $('#okvcc').val() == "_"){
			$("#okvc").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#okvc").css('color','red');	
		}else{
			$("#okvc").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#okvc").css('color','red');	
		}

}
console.log(pahtv.vector);
	
	$('#fileToUpload').val(''); 	
	$("#domin0").val('');
	document.getElementById('id01_mo').style.display='none';
	//btModal
	document.getElementById('btModal').style.display='none'; 
}
function cerrarMod2(){  
	

	if( $('#1f').val() == "1" ){

		$("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f1").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#11f").val(),
	bandera: $('#1f').val()
	});
	$('#1f').val("2"); 	

	}else if( $('#2f').val() == "1" ){

		$("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#f2").css('color','#1fce10');
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#12f").val(),
	bandera: $('#2f').val()	
	});
	$('#2f').val("2"); 

	}else if( $('#3f').val() == "1" ){
		
		$("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f3").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#13f").val(),
	bandera: $('#3f').val()	
	});
	$('#3f').val("2"); 


	}else if( $('#4f').val() == "1" ){

		$("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f4").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#14f").val(),
	bandera: $('#4f').val()
	});
	$('#4f').val("2"); 

	}else if( $('#5f').val() == "1" ){

		$("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f5").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#15f").val(),
	bandera: $('#5f').val()
	});
	$('#5f').val("2"); 


	}else if( $('#6f').val() == "1" ){

		$("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f6").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#16f").val(),
	bandera: $('#6f').val()	
	});
	$('#6f').val("2");

	}else{
		if( $('#1f').val() == "_"){
			$("#f1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f1").css('color','red');	
			
		}else{
			$("#f1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f1").css('color','red');	
		}
		if( $('#2f').val() == "_"){
				$("#f2").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f2").css('color','red');	
				
			}else{
				$("#f2").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#f2").css('color','red');	
			}
			if( $('#3f').val() == "_"){
			$("#f3").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f3").css('color','red');	
			
		}else{
			$("#f3").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f3").css('color','red');	
		}
		if( $('#4f').val() == "_"){
			$("#f4").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f4").css('color','red');	
			
		}else{
			$("#f4").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f4").css('color','red');	
		}
		if( $('#5f').val() == "_"){
			$("#f5").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f5").css('color','red');	
			
		}else{
			$("#f5").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f5").css('color','red');	
		}
		if( $('#6f').val() == "_"){
			$("#okvc").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#okvc").css('color','red');	
			
		}else{
			$("#f6").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f6").css('color','red');	
		}					

	}	
	console.log(pahtv.vector);
	$('#fileToUpload2').val(''); 	
	$("#domin1").val('');
	document.getElementById('id02_mo').style.display='none';
	//btModal
	document.getElementById('btModal2').style.display='none'; 
}
function cerrarMod3(){

	if( $('#m1').val() == "1" ){

		$("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#1m").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m11").val(),
	bandera: $('#m1').val()
	});
	$('#m1').val("2"); 

	}else if( $('#m2').val() == "1" ){
		
		$("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#2m").css('color','#1fce10');
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m21").val(),
	bandera: $('#m2').val()
	});
	$('#m2').val("2");

	}else if( $('#m3').val() == "1" ){
		$("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#3m").css('color','#1fce10');
		
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m31").val(),
	bandera: $('#m3').val()
	});
	$('#m3').val("2"); 

	}else if( $('#m4').val() == "1" ){

		$("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#4m").css('color','#1fce10');
			
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m41").val(),
	bandera: $('#m4').val()
	});
	$('#m4').val("2"); 

	}else if( $('#m5').val() == "1" ){

		$("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#5m").css('color','#1fce10');
		
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m51").val(),
	bandera: $('#m5').val()
	});
	$('#m5').val("2"); 

	}else if( $('#m6').val() == "1" ){
		
		$("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#6m").css('color','#1fce10');
			
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m61").val(),
	bandera: $('#m6').val()
	});
	$('#m6').val("2"); 

	}else if( $('#m7').val() == "1" ){

		$("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#7m").css('color','#1fce10');
		
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m71").val(),
	bandera: $('#m7').val()
	});
	$('#m7').val("2");

	}else{
		if( $('#m1').val() == "_"){
			$("#1m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#1m").css('color','red');	
			
		}else{
			$("#1m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#1m").css('color','red');	
		}
		if( $('#m2').val() == "_"){
				$("#2m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#2m").css('color','red');	
				
			}else{
				$("#2m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#2m").css('color','red');	
			}
			if( $('#m3').val() == "_"){
			$("#3m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#3m").css('color','red');	
		}else{
			$("#3m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#3m").css('color','red');	
		}
		if( $('#m4').val() == "_"){
				$("#4m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#4m").css('color','red');	
				
			}else{
				$("#4m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#4m").css('color','red');	
			}
			if( $('#m5').val() == "_"){
			$("#5m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#5m").css('color','red');	
			
		}else{
			$("#5m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#5m").css('color','red');	
		}
		if( $('#m6').val() == "_"){
				$("#6m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#6m").css('color','red');	
			}else{
				$("#6m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#6m").css('color','red');	
			}
			if( $('#m7').val() == "_"){
			$("#7m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#7m").css('color','red');	
			
		}else{
			$("#7m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#7m").css('color','red');	
		}		


	}
	

	console.log(pahtv.vector);

	$('#fileToUpload3').val('');
	$("#domin2").val('');
	document.getElementById('id03_mo').style.display='none';
	//btModal
	document.getElementById('btModal3').style.display='none'; 
}

function cerrarMod4(){
	if( $('#karpet').val() == "1" ){		
		$("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#rep1").css('color','#1fce10');	
		//atrae las tipologias
		 var tipp_p = $('#idP').val();
  var dc_t = $('#idG').val();

    //vista ipologias guardas sin subir
 /* var tipppx = $('#idP').val();
  var dctx = $('#idG').val();
  $.post("../../acceso",{acceess:73,idpers:tipppx,dictams:dctx},function(m){
    console.log(m);
    $.each( m, function( key, value ) {
  var a = key + 1;
  //j.id as id_docx,nombredoc,orden,comentario
  $("#tipologs").append('<tr><td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> Subido</td><input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#1fce10;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td></tr>tr>');
  
});
  });*/
  
/*
		$.post("../../acceso",{acceess:72,tiper:tipp_p,dct:dc_t},function(a){
			console.log(a);
			$.each( a, function( key, value ) {
				pahtv_t.vector_t.push({
			id_inmu : $("#idG").val(),
			id_doc: $("#karpeto").val(),
			tipolg_n : value.id_docx,
			comentario : ''});

			});
		});*/
		
	$('#karpet').val("2");
	//vista Tipologias guardas sin subir
  var tipppx = $('#idP').val();
  var dctx = $('#idG').val();
  $("#tipologs").html('');
  $.post("../../acceso",{acceess:73,idpers:tipppx,dictams:dctx},function(m){
    console.log(m);
    $.each( m, function( key, value ) {
  var a = key + 1;
  //j.id as id_docx,nombredoc,orden,comentario
  var cher = "";
  if( value.comentario === null ){
	  cher = "";
  }else{
	  cher = value.comentario;
  }
  $("#tipologs").append('<tr><td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> Subido</td><input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#1fce10;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher  +'</textarea></td></tr>tr>');  
});
  });
	/*var obj = pahtv_t.vector_t;
	$("#tipologs").html('');
//$("#tipologs").html('<table  width="100%"><tr><th >Archivo de Construccion</th><th >Subir Archivo</th><th >Estatus</th><th >Comentario</th></tr>');
$.each( obj, function( key, value ) {
	var a = key + 1;
  //$("#tipologs").append('<tr><td >Tipologia' + a + ' ' + value.id_doc + '</td><td ><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" ></i></td><input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td></tr>');
  $("#tipologs").append('<tr><td style="display:none;">' + value.tipolg_n + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> Subido</td><input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#1fce10;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td></tr>tr>');
  
});
console.log(pahtv_t.vector_t);
*/

 //para seleccionar una opcion
  /*
        //para seleccionar una opcion
  
    $('#G tbody tr').each(function() {
      var a = $(this).find('td').eq(0).text();
      var idinmu = $("#n_inm").val();
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
  
*/
	


//$("#tipologs").append('</table>'); 
			
	}else{		
		if( $('#karpet').val() == "_"){
			$("#rep1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#rep1").css('color','red');	
			
		}else{
			$("#rep1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#rep1").css('color','red');	
		}		
	}

	console.log(pahtv.vector);
	$('#fileToUpload4').val('');
	$("#domin3").val('');
	document.getElementById('id0t').style.display='none';
	//btModal
	document.getElementById('btModal4').style.display='none';

	

}


function cerrarMod5(){

	
if( $('#okfmx').val() == "1"  ){

	$("#okfmr").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#okfmr").css('color','#1fce10');	
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#frmc").val(),
	bandera: $('#okfmx').val()
	});
	$('#okfmx').val("2");
	
	
//editar el archivo 15
}else if( $('#okfmx').val() == "_" ){
$("#okfmr").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			
}else{
//$("#okfmr").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
//			$("#okfmr").css('color','red');
} 

if( $("#idP").val() == 1  ){

	if( $('#7f').val() == "1" ){

	$("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f7").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#17f").val(),
	bandera: $('#7f').val()
	});				
	$('#7f').val("2");


}else if( $('#7f').val() == "_" ){ 
	
	$("#f7").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			

		 }else{
//	$("#f7").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
	//		$("#f7").css('color','red');	
}


}else{

if( $('#m8').val() == "1" ){

$("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#8m").css('color','#1fce10');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m81").val(),
	bandera: $('#m8').val()
	});				
	$('#m8').val("2");
	 
	
}else if( $('#m8').val() == "_" ){ 

	$("#8m").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			
	
		 }else{
//$("#8m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
		//	$("#8m").css('color','red');
}


}

//else{
	if( $('#okfmx').val() == "_"){
			$("#okfmr").html('<i class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			//$("#okfmr").css('color','red');				
		}else{
			
		}
		
		if( $("#idP").val() == 1 ){

					if( $('#7f').val() == "_"){
			$("#f7").html('<i class="fa fa-check  fa-2x" style="margin-top: 10px;"></i>');
			//$("#f7").css('color','red');	
		}else{
			
		}
		

		}else{

			if( $('#m8').val() == "_"){
			$("#8m").html('<i class="fa fa-check  fa-2x" style="margin-top: 10px;"></i>');
			//$("#8m").css('color','red');	
		}else{
				
		}


		}

//}
console.log(pahtv.vector);
	
	$('#fileToUpload55').val(''); 	
	$("#domin110").val('');
	document.getElementById('id020_mo').style.display='none';
	//btModal
	document.getElementById('btModal').style.display='none'; 

} 

function generarAcuse(){
	alert('ok'); 
}

//table_fi table_mo
function RgtroC(){
	location.href="PadronDictaminadores";
}
/*function table_fi(){ 
  $("#t01_moral").css('display','none');
  $("#t01_fisica").css('display','block'); 
  
  $("#table01").css('display','block'); 
 
}
function table_mo(){ 
  $("#t01_fisica").css('display','none');
  $("#t01_moral").css('display','block');

}*/

function cerrarSesion(){

	 location.href ="../Inicio";
	 $.post("acceso",{acceess:101,u2:usa,pw2:pwd},function(yz){
			if( yz == "23000" ){
				alert(" usuario activo ");
			}else{
				location.href=yz;				
			}			
		});
}
function seguimientoMos(){ 

	$("#dictamenT").css('display','none');
	$("#archivosRecT").css('display','none');
	$("#RepFotComplT").css('display','none');
	$("#predioT").css('display','none'); 

	$("#seguimientoT").css('display','block');
	//alert('ok'); 
}
function dictamenMos(){ 
	$("#seguimientoT").css('display','none');
	$("#archivosRecT").css('display','none');
	$("#RepFotComplT").css('display','none');
	$("#predioT").css('display','none'); 
	//dictamenT
	$("#dictamenT").css('display','block');

}
function archivosRecMos(){
	$("#dictamenT").css('display','none');
	$("#seguimientoT").css('display','none'); 
	$("#RepFotComplT").css('display','none');
	$("#predioT").css('display','none'); 

	$("#archivosRecT").css('display','contents');   
}
function RepFotComplMos(){
	$("#dictamenT").css('display','none');
	$("#seguimientoT").css('display','none');
	$("#predioT").css('display','none'); 
	$("#archivosRecT").css('display','none');  
	//archivosRecMos

	$("#RepFotComplT").css('display','block'); 

}
function PredioMos(){
	$("#seguimientoT").css('display','none');
	$("#dictamenT").css('display','none');
	$("#archivosRecT").css('display','none');  
	$("#RepFotComplT").css('display','none'); 

	$("#predioT").css('display','block');   
}
function buscarDic(a){ 

		var fechaInicial = $('#fechaI').val();
		var fechafinal = $('#fechaF').val();
		if (fechaInicial == "" || fechafinal == "") {
			$("#id01").css('display','block');

		}else{
			//alert(a);  
		location.href =a;  
		}
}
function observa(){

	$("#observacion").css('display','block'); 
}
function buscarDicD(){

		var fechaInicial = $('#fechaI').val();
		var fechafinal = $('#fechaF').val();
		if (fechaInicial == "" || fechafinal == "") {
			alert('Ingresar un Rango de fechas')
		}else{
			var dtmdr = $('#d').val();
			//alert(dtmdr);
			location.href = dtmdr; 		
		}
}
function buscarDicta(){
	//Validar que se encuentre algun registro insertado para hacer la busqueda
	$("#result").css('display','block');
}
function reporte(){
	//alert('vaa'); 
	//var divContents = $('#va').html();
   // var divContents=$('#va2').html();//alert(divca);
   $.post("acceso",{acceess:45},function(yz){


			alert(yz);
		});

   /* var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Acuse de Dictamen</title>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h4>ya xfavor</h4>');
    printWindow.document.write('</body></html>'); */
}

//subir archivos
function active(){ 
	var t = $("#idP").val();
	/*
	var pahtv_w = { vector_write : [] } ;
	var vector_write = { id_inmu : '',id_doc : '', comentario : '' };

	comentario : $('#commentav').val()
	comentario : $('#commentcx').val()

	fisico
	
	
	
	
	
	

	<input type="hidden" id="11f" name="11f" value="99">
        <input type="hidden" id="12f" name="12f" value="98">
        <input type="hidden" id="13f" name="13f" value="97">
        <input type="hidden" id="14f" name="14f" value="96">
        <input type="hidden" id="15f" name="15f" value="95">
        <input type="hidden" id="16f" name="16f" value="94">

	moral
	comentario : $('#commenta').val()
	comentario : $('#commentb').val()
	comentario : $('#commentc').val()
	comentario : $('#commentd').val()
	comentario : $('#commente').val()
	comentario : $('#commentf').val()
	comentario : $('#commentg').val()

	<input type="hidden" id="m11" name="m11" value="90">
<input type="hidden" id="m21" name="m21" value="89">
<input type="hidden" id="m31" name="m31" value="88">
<input type="hidden" id="m41" name="m41" value="87">
<input type="hidden" id="m51" name="m51" value="86">
<input type="hidden" id="m61" name="m61" value="85">
<input type="hidden" id="m71" name="m71" value="84">

	comentario : $('#commentrep').val()


*/

		if( t  == "1"){
	  console.log("fisico");
	  console.log(pahtv.vector);
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#av').val() ,  comentario : $('#1commenta').val() });		
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#co').val() ,  comentario : $('#1commentb').val() });

	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#11f').val() ,  comentario : $('#1commenta').val() });		
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#12f').val() ,  comentario : $('#1commentb').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#13f').val() ,  comentario : $('#1commentc').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#14f').val() ,  comentario : $('#1commentd').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#15f').val() ,  comentario : $('#1commente').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#16f').val() ,  comentario : $('#1commentf').val() });

	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#karpeto').val() ,  comentario : $('#commentrep').val() });		

	  console.log(pahtv_w.vector_write);
	  $("#documentacion").css('display','none');
	  // un mensaje de inmueble subido	  
    }else{
		
	  console.log("moral");
	  console.log(pahtv.vector);
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#av').val() ,  comentario : $('#1commenta').val() });		
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#co').val() ,  comentario : $('#1commentb').val() });

	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m11').val() ,  comentario : $('#commenta').val() });		
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m21').val() ,  comentario : $('#commentb').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m31').val() ,  comentario : $('#commentc').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m41').val() ,  comentario : $('#commentd').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m51').val() ,  comentario : $('#commente').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m61').val() ,  comentario : $('#commentf').val() });
	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#m71').val() ,  comentario : $('#commentg').val() });

	  pahtv_w.vector_write.push({ id_inmu : $("#n_inm").val() ,id_doc : $('#karpeto').val() ,  comentario : $('#commentrep').val() });
	  console.log(pahtv_w.vector_write);


	  
	  $("#documentacion").css('display','none');
	  // un mensaje de inmueble subido
	}

	  
}
function prevalidado(){
	document.getElementById('id02').style.display='none'; 
	 location.href ="../SeguimientoRevisor/1";
}
function preRechazo2(){
	document.getElementById('id03').style.display='none'; 
	 location.href ="../SeguimientoRevisor/1";
}
/*
function save_rev2(){

	var activo = 0;
if ($('#hojasVerdes').prop('checked') ) {
    console.log("Checkbox seleccionado");
    activo = 2;

	var anioD = $("#anioD").val(); 
	var fol = $("#cfol").val(); 
	var idm = 	$('#idG').val();
	var ObservacionPre = 	$('#ObservacionPre').val();
	var ObservacionPre2 = ObservacionPre.trim();
		//cambiar a etapa 5 y guardar observacion general
 $.post("../../acceso",{acceess:70,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,anioD:anioD,activo:activo },function(yz){
			console.log(yz);
			if (yz == "10") {
				document.getElementById('id02').style.display='block'; 
				/*$('#alertaStatus').html("");
				$('#alertaStatusMotivo').html(""); 
				
				
				$('#alertaStatus').append('Comentarios guardados correctamente.');
				$('#alertaStatusMotivo').append('Puede continuar con la revisión.');
				*/
				
			/*}else{

			}
	
		});

}else {
	console.log("Checkbox no seleccionado");
	activo = 1;
	//mostrar mensaje de seleccionar el Checkbox

	document.getElementById('activarcheck').style.display='block';
}

}*/


function save_rev2(){



	var activo = 0;
if ($('#hojasVerdes').prop('checked') ) {
    console.log("Checkbox seleccionado");
    activo = 2;

	var anioD = $("#anioD").val(); 

	var fol = $("#cfol").val(); 
	var idm = 	$('#idG').val();
	var ObservacionPre = 	$('#ObservacionPre').val();
	var ObservacionPre2 = ObservacionPre.trim();
		//cambiar a etapa 5 y guardar observacion general
 $.post("../../acceso",{acceess:70,fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,anioD:anioD,activo:activo },function(yz){
			console.log(yz);
			if (yz == "10") {
				document.getElementById('id02').style.display='block'; 
			}else{


			}

			
		});


}else {
	console.log("Checkbox no seleccionado");
	activo = 1;
	//mostrar mensaje de seleccionar el Checkbox

	document.getElementById('activarcheck').style.display='block';
}

}