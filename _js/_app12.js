var pahtv = { vector : [] } ;
	var pahtv_w = { vector_write : [] } ;
	var pahtv_t = { vector_t : [] } ;
	var vector = { id_inmu : '',id_doc : '', bandera : ''};
	var vector_write = { id_inmu : '',id_doc : '', comentario : '' };
	var vector_t = { id_inmu : '',id_doc : '',tipolg_n : '', comentario : '' };


function upload_files4444(){
	var d = $("#domin4444").val();
	var car = $("#idGRec").val();
	var clvcat = $("#idG").val();
	$(".upload-msg5555").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload5555");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload5555',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',clvcat);
	$.ajax({
		url: "../../AEDTMN/MotorFilerARCHFEX",
		type: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			$(".upload-msg5555").html(data);
			window.setTimeout(function() {
			$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove();
			});	}, 1000);

		}
	});


			}

function upload_files333(){
	var d = $("#domin333").val();
	var car = $("#idGRec").val();
	var clvcat = $("#idG").val();
	$(".upload-msg444").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload444");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload444',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',clvcat);
	$.ajax({
		url: "../../AEDTMN/MotorFilerARCHEX",
		type: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			$(".upload-msg444").html(data);
			window.setTimeout(function() {
			$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove();
			});	}, 1000);

		}
	});


			}


function upload_files3(){

	var swi = $("#see").val();

	if( swi == "A" ){
		//alert("es insertar");

		var d = $("#domin3").val();
	var car = $("#idGRec").val();
	var clvcat = $("#idG").val();
	$(".upload-msg4").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload4");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload4',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',clvcat);
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

	}else if ( swi == "B" ) {
		//alert("editar");
		//$('#act').val('');
  var cll = $('#act').val();

		var d = $("#domin3").val();
	var car = $("#idGRec").val();
	var clvcat = $("#idG").val();
	$(".upload-msg4").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload4");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload4',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',clvcat);
	data.append('cll',cll);
	$.ajax({
		url: "../../AEDTMN/MotorFilerED",
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

	}else{
		alert("Error");

	}


} 
function upload_files2(){
	var clvcat = $("#idG").val();
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
	data.append('cv',clvcat);
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
	var clvcat = $("#idG").val();
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
				data.append('cv',clvcat);
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
	
	var clvcat = $("#idG").val();

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
				data.append('cv',clvcat);
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
	
	var clvcat = $("#idG").val();
	
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
				data.append('cv',clvcat);
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
	//alert("valida la version DICTAVAL");

	var abc = $("#idGRec").val();
	var clv = $("#idG").val();

	var a = {acceess:83,abc:abc,clvcc:clv};
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
	});

	var b = {acceess:84,abc:abc,clvcc:clv};
	$.ajax({
		url: "../../acceso",
		type: "POST",
		data: b,
		success: function(ee)
		{
			if( ee == "10" ){

				console.log(ee);
				if( $('#okvaa').val() == "1"  ){

					$("#okava").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
						$("#okava").css('color','#497445');
						pahtv.vector.push({
							id_inmu : $("#n_inm").val(),
							id_doc: $("#av").val(),
					bandera: $('#okvaa').val()
					});
					$('#okvaa').val("2");



				}else if( $('#okvcc').val() == "1" ){

				$("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
						$("#okvc").css('color','#497445');
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

					var tipo_de_persona =  $('#idP').val();
					    if( tipo_de_persona == "1" ){

				load_filesxavg( $("#idGRec").val() , $("#idG").val() );
					    	
					    	if( $('#okvcc').val() == "_" ){
					    		 $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
							      $("#okvc").css('color','#333');

									}else if($('#okvcc').val() == "2"){
										 $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
						$("#okvc").css('color','#497445');

									}else if($('#okvcc').val() == "1"){
										$("#okvc").html('<i  class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
						$("#okvc").css('color','red');

									}

					$("#f7").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f7").css('color','#333');
					$("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f1").css('color','#333');
					$("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f2").css('color','#333');
					$("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f3").css('color','#333');
					$("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f4").css('color','#333');
					$("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f5").css('color','#333');
					$("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f6").css('color','#333');
					
					
					$("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f8").css('color','#333');
					$("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f9").css('color','#333');
					$("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f10").css('color','#333');
					$("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f11").css('color','#333');
					$("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
					$("#f12").css('color','#333');


					$("#codown").css('display','block');

					$("#fff1").css('display','block');
					$("#fff2").css('display','block');
					$("#fff3").css('display','block');
					$("#fff4").css('display','block');
					$("#fff5").css('display','block');
					$("#fff6").css('display','block');
					$("#fff7").css('display','block');
					$("#btnat").css('display','block');
					
					$("#fff8").css('display','block');
					$("#fff9").css('display','block');
					$("#fff10").css('display','block');
					$("#fff11").css('display','block');
					$("#fff12").css('display','block');



					    }else {
					    	load_filesxavg( $("#idGRec").val() , $("#idG").val() );
					    	
					    	if( $('#okvcc').val() == "_" ){
					    		 $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;" ></i>');
							      $("#okvc").css('color','#333');

									}else if($('#okvcc').val() == "2"){
										 $("#okvc").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
						$("#okvc").css('color','#497445');

									}else if($('#okvcc').val() == "1"){
										$("#okvc").html('<i  class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
						$("#okvc").css('color','red');

									}

					      
					      
					      $("#8m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#8m").css('color','#333');
					      $("#1m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#1m").css('color','#333');
					      $("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#2m").css('color','#333');
					      $("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#3m").css('color','#333');
					      $("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#4m").css('color','#333');
					      $("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#5m").css('color','#333');
					      $("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#6m").css('color','#333');
					      $("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#7m").css('color','#333');
					      
					      
					      
					      $("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#9m").css('color','#333');
					      $("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#10m").css('color','#333');
					      $("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#11m").css('color','#333');
					      $("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#12m").css('color','#333');
					      $("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"  ></i>');
					      $("#13m").css('color','#333');
					      

					      $("#codown").css('display','block');

					      $("#mmm1").css('display','block');
					      $("#mmm2").css('display','block');
					      $("#mmm3").css('display','block');
					      $("#mmm4").css('display','block');
					      $("#mmm5").css('display','block');
					      $("#mmm6").css('display','block');
					      $("#mmm7").css('display','block');
					      $("#mmm8").css('display','block');
					      $("#btnat").css('display','block');
					      
					      $("#mmm9").css('display','block');
					      $("#mmm10").css('display','block');
					      $("#mmm11").css('display','block');
					      $("#mmm12").css('display','block');
					      $("#mmm13").css('display','block');
					      



					    }



			}else{
				console.log("tiene una version de dictaval ANTIGUA");


				$('#fileToUpload').val('');
				$("#domin0").val('');
				document.getElementById('id01_mo').style.display='none';
				//btModal
				document.getElementById('btModal').style.display='none';


				var tipo_de_persona =  $('#idP').val();
				    if( tipo_de_persona == "1" ){
				      $("#okava").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#okava").css('color','#348af9');
				$("#okvc").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#okvc").css('color','#348af9');
				$("#f7").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f7").css('color','#348af9');
				$("#f1").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f1").css('color','#348af9');
				$("#f2").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f2").css('color','#348af9');
				$("#f3").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f3").css('color','#348af9');
				$("#f4").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f4").css('color','#348af9');
				$("#f5").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f5").css('color','#348af9');
				$("#f6").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f6").css('color','#348af9');
				
				$("#f8").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f8").css('color','#348af9');
				$("#f9").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f9").css('color','#348af9');
				$("#f10").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f10").css('color','#348af9');
				$("#f11").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f11").css('color','#348af9');
				$("#f12").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				$("#f12").css('color','#348af9');



				$("#okava").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#okava").css('color','red');
				$("#codown").css('display','none');

				$("#fff1").css('display','none');
				$("#fff2").css('display','none');
				$("#fff3").css('display','none');
				$("#fff4").css('display','none');
				$("#fff5").css('display','none');
				$("#fff6").css('display','none');
				$("#fff7").css('display','none');
				$("#btnat").css('display','none');
				$("#acuseG").css('display','none');
				$("#acuseG22").css('display','none');
				
				
				$("#fff8").css('display','none');
				$("#fff9").css('display','none');
				$("#fff10").css('display','none');
				$("#fff11").css('display','none');
				$("#fff12").css('display','none');


				    }else {
				      $("#okava").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				      $("#okava").css('color','#348af9');
				      $("#okvc").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval"></i>');
				      $("#okvc").css('color','#348af9');

				      $("#8m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#8m").css('color','#348af9');
				      $("#1m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#1m").css('color','#348af9');
				      $("#2m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#2m").css('color','#348af9');
				      $("#3m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#3m").css('color','#348af9');
				      $("#4m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#4m").css('color','#348af9');
				      $("#5m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#5m").css('color','#348af9');
				      $("#6m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#6m").css('color','#348af9');
				      $("#7m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#7m").css('color','#348af9');
				      
				      
				      $("#9m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#9m").css('color','#348af9');
				      $("#10m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#10m").css('color','#348af9');
				      $("#11m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#11m").css('color','#348af9');
				      $("#12m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#12m").css('color','#348af9');
				      $("#13m").html('<i  class="fa fa-lock fa-2x" style="margin-top: 10px;" title="Desactualizada la versión del Dictaval" ></i>');
				      $("#13m").css('color','#348af9');
				      


							$("#okava").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
							$("#okava").css('color','red');
				      $("#codown").css('display','none');

				      $("#mmm1").css('display','none');
				      $("#mmm2").css('display','none');
				      $("#mmm3").css('display','none');
				      $("#mmm4").css('display','none');
				      $("#mmm5").css('display','none');
				      $("#mmm6").css('display','none');
				      $("#mmm7").css('display','none');
				      $("#mmm8").css('display','none');
				      
				      $("#mmm9").css('display','none');
				      $("#mmm10").css('display','none');
				      $("#mmm11").css('display','none');
				      $("#mmm12").css('display','none');
				      $("#mmm13").css('display','none');
				      
				      $("#btnat").css('display','none');
				      $("#acuseG").css('display','none');
				      $("#acuseG22").css('display','none');



				    }
			}

		}
	});

/*
	*/
}

function cerrarMod2(){


	if( $('#1f').val() == "1" ){

		$("#f1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f1").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#11f").val(),
	bandera: $('#1f').val()
	});
	$('#1f').val("2");

	}else if( $('#2f').val() == "1" ){

		$("#f2").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#f2").css('color','#497445');
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#12f").val(),
	bandera: $('#2f').val()
	});
	$('#2f').val("2");

	}else if( $('#3f').val() == "1" ){

		$("#f3").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f3").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#13f").val(),
	bandera: $('#3f').val()
	});
	$('#3f').val("2");


	}else if( $('#4f').val() == "1" ){

		$("#f4").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f4").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#14f").val(),
	bandera: $('#4f').val()
	});
	$('#4f').val("2");

	}else if( $('#5f').val() == "1" ){

		$("#f5").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f5").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#15f").val(),
	bandera: $('#5f').val()
	});
	$('#5f').val("2");


	}else if( $('#6f').val() == "1" ){

		$("#f6").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f6").css('color','#497445');
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
		$("#1m").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m11").val(),
	bandera: $('#m1').val()
	});
	$('#m1').val("2");

	}else if( $('#m2').val() == "1" ){

		$("#2m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#2m").css('color','#497445');
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m21").val(),
	bandera: $('#m2').val()
	});
	$('#m2').val("2");

	}else if( $('#m3').val() == "1" ){
		$("#3m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#3m").css('color','#497445');

		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m31").val(),
	bandera: $('#m3').val()
	});
	$('#m3').val("2");

	}else if( $('#m4').val() == "1" ){

		$("#4m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#4m").css('color','#497445');

			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m41").val(),
	bandera: $('#m4').val()
	});
	$('#m4').val("2");

	}else if( $('#m5').val() == "1" ){

		$("#5m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#5m").css('color','#497445');

		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m51").val(),
	bandera: $('#m5').val()
	});
	$('#m5').val("2");

	}else if( $('#m6').val() == "1" ){

		$("#6m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#6m").css('color','#497445');

			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m61").val(),
	bandera: $('#m6').val()
	});
	$('#m6').val("2");

	}else if( $('#m7').val() == "1" ){

		$("#7m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#7m").css('color','#497445');

		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m71").val(),
	bandera: $('#m7').val()
	});
	$('#m7').val("2");

	}else{
		if( $('#m1').val() == "_"){
			$("#1m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#1m").css('color','#8b4c55');

		}else{
			$("#1m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#1m").css('color','#8b4c55');
		}
		if( $('#m2').val() == "_"){
				$("#2m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#2m").css('color','#8b4c55');

			}else{
				$("#2m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#2m").css('color','#8b4c55');
			}
			if( $('#m3').val() == "_"){
			$("#3m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#3m").css('color','#8b4c55');
		}else{
			$("#3m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#3m").css('color','#8b4c55');
		}
		if( $('#m4').val() == "_"){
				$("#4m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#4m").css('color','#8b4c55');

			}else{
				$("#4m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#4m").css('color','#8b4c55');
			}
			if( $('#m5').val() == "_"){
			$("#5m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#5m").css('color','#8b4c55');

		}else{
			$("#5m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#5m").css('color','#8b4c55');
		}
		if( $('#m6').val() == "_"){
				$("#6m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#6m").css('color','#8b4c55');
			}else{
				$("#6m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#6m").css('color','#8b4c55');
			}
			if( $('#m7').val() == "_"){
			$("#7m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#7m").css('color','#8b4c55');

		}else{
			$("#7m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#7m").css('color','#8b4c55');
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

	var etapa = $("#etapa").val();

	if (etapa == 11) {
		document.getElementById('acuseG').style.display='none';
	}

	if( $('#karpet').val() == "1" ){
		$("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#rep1").css('color','#497445');
		//atrae las tipologias
		 var tipp_p = $('#idP').val();
  var dc_t = $('#idG').val();


	$('#karpet').val("2");

//vista Tipologias guardas sin subir
  var tipppx = $('#idP').val();
  var dctx = $('#idG').val();
  var fdctx = $('#idGRec').val();
  $("#tipologs").html('');
  $.post("../../acceso",{acceess:73,idpers:tipppx,dictams:fdctx,dctx:dctx},function(m){
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
  //$("#tipologs").append('<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/><td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> <a onclick=ok('+value.id_docx+')>Tipologia' + a + '</a></td><td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="ok('+ value.id_docx +')"></i></td> <input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#1fce10;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher  +'</textarea></td></tr>tr>');
  $("#tipologs").append('<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/><td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td><td>Tipologia' + a + '</td><td> <a onclick=ok_down('+value.id_docx+')>Dar clic</a></td><td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="ok('+ value.id_docx +')"></i></td> <input type="hidden" id="karpet" name="karpet" value="_"><input type="hidden" id="karpeto" name="karpeto" value="12"><td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="color:#497445;margin-top: 10px;"></i></div></td><td align="center"><textarea id="commentrep" name="commentrep"  placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher  +'</textarea></td><td align="center"><input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" name="dropp" class="btn btn-danger" value="Eliminar"  onclick="deletex(' + value.id_docx + ');"></td></tr>tr>');
});
  });


	}else{
		if( $('#karpet').val() == "_"){
			$("#rep1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#rep1").css('color','#8b4c55');

		}else{
			$("#rep1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#rep1").css('color','#8b4c55');
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
		$("#okfmr").css('color','#497445');
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
		$("#f7").css('color','#497445');
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
		$("#8m").css('color','#497445');
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

	$("#archivosRecT").css('display','block');
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
}

//subir archivos
function active(){
	var t = $("#idP").val();

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

function save_rev2(){
	var idm = 	$('#idG').val();
	var ObservacionPre = 	$('#ObservacionPre').val();
	var ObservacionPre2 = ObservacionPre.trim();
		//cambiar a etapa 5 y guardar observacion general
 $.post("../../acceso",{acceess:70,idm :idm,ObservacionPre2:ObservacionPre2 },function(yz){
			console.log(yz);
			document.getElementById('id02').style.display='block';
		});


}

function save_rev(){
var idm = 	$('#idG').val();
var comentarioDicta = $('#comentarioDicta').val();
var comentarioConstruc = $('#comentarioConstruc').val();
var comentarioAvaluo = $('#comentarioAvaluoFirmado').val();
var comentarioTitulo = $('#comentarioTitulo').val();
var comentarioCroquis = $('#comentarioCroquis').val();
var comentarioPredial = $('#comentarioPredial').val();
var comentarioPlanos = $('#comentarioPlanos').val();
var comentarioIndivisos = $('#comentarioIndivisosC').val();
var comentarioActa = $('#comentarioActa').val();
var comentariOtros = $('#observacionOtros').val();
var comentarioGeneral = $('#comentarioGeneral').val();
var comentarioGReporte = $('#comentarioGReporte').val();




 if (comentarioDicta == "") {
 	comentarioDicta="N/A";

 }

 if (comentarioConstruc == "") {
 	comentarioConstruc="N/A";

 }

 if (comentarioAvaluo == "") {
 	comentarioAvaluo="N/A";

 }

 if (comentarioTitulo == "") {
 	comentarioTitulo="N/A";

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
 	 $.post("../../acceso",{acceess:41,idm :idm,comentarioDicta:comentarioDicta,
        comentarioConstruc:comentarioConstruc,comentarioAvaluo:comentarioAvaluo,
   		comentarioTitulo:comentarioTitulo,comentarioCroquis:comentarioCroquis,
		comentarioPredial:comentarioPredial,comentarioPlanos:comentarioPlanos,
		comentarioIndivisos:comentarioIndivisos,comentarioActa:comentarioActa,
		comentariOtros:comentariOtros,comentarioGeneral:comentarioGeneral,
		comentarioGReporte:comentarioGReporte},function(yz){
			console.log(yz);
			document.getElementById('id01').style.display='block';


		});

}









function cerrarMod333(){

	if( $('#m9').val() == "1" ){

		$("#9m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#9m").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m82").val(),
	bandera: $('#m9').val()
	});
	$('#m9').val("2");

	}else if( $('#m10').val() == "1" ){

		$("#10m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#10m").css('color','#497445');
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m83").val(),
	bandera: $('#m10').val()
	});
	$('#m10').val("2");

	}else if( $('#m11').val() == "1" ){
		$("#11m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#11m").css('color','#497445');

		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m84").val(),
	bandera: $('#m11').val()
	});
	$('#m11').val("2");

	}else if( $('#m12').val() == "1" ){

		$("#12m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#12m").css('color','#497445');

			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m85").val(),
	bandera: $('#m12').val()
	});
	$('#m12').val("2");

	}else if( $('#m13').val() == "1" ){

		$("#13m").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#13m").css('color','#497445');

		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#m86").val(),
	bandera: $('#m13').val()
	});
	$('#m13').val("2");

	}else{

		if( $('#m9').val() == "_"){
			$("#9m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#9m").css('color','red');

		}else{
			$("#9m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#9m").css('color','red');
		}
		if( $('#m10').val() == "_"){
				$("#10m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#10m").css('color','red');

			}else{
				$("#10m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#10m").css('color','red');
			}
			if( $('#m11').val() == "_"){
			$("#11m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#11m").css('color','red');
		}else{
			$("#11m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#11m").css('color','red');
		}
		if( $('#m12').val() == "_"){
				$("#12m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#12m").css('color','red');

			}else{
				$("#12m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#12m").css('color','red');
			}
			if( $('#m13').val() == "_"){
			$("#13m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#13m").css('color','red');

		}else{
			$("#13m").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#13m").css('color','red');
		}


	}


	console.log(pahtv.vector);

	$('#fileToUpload444').val('');
	$("#domin333").val('');
	document.getElementById('id0333_mo').style.display='none';
	//btModal
	document.getElementById('btModal333').style.display='none';
}






function cerrarMod3334(){

	if( $('#8f').val() == "1" ){

		$("#f8").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f8").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#17f").val(),
	bandera: $('#8f').val()
	});
	$('#8f').val("2");

	}else if( $('#9f').val() == "1" ){

		$("#f9").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f9").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#18f").val(),
	bandera: $('#9f').val()
	});
	$('#9f').val("2");

	}else if( $('#10f').val() == "1" ){

		$("#f10").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
			$("#f10").css('color','#497445');
			pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#19f").val(),
	bandera: $('#10f').val()
	});
	$('#10f').val("2");

	}else if( $('#11f').val() == "1" ){

		$("#f11").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f11").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#20f").val(),
	bandera: $('#11f').val()
	});
	$('#11f').val("2");


	}else if( $('#12f').val() == "1" ){

		$("#f12").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f12").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#21f").val(),
	bandera: $('#12f').val()
	});
	$('#12f').val("2");

	}else if( $('#13f').val() == "1" ){

		$("#f13").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#f13").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#22f").val(),
	bandera: $('#13f').val()
	});
	$('#13f').val("2");


	}else if( $('#23f').val() == "1" ){

		$("#23f").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#23f").css('color','#497445');
		pahtv.vector.push({
			id_inmu : $("#n_inm").val(),
			id_doc: $("#23f").val(),
	bandera: $('#23f').val()
	});
	$('#23f').val("2");

	}else{
		if( $('#8f').val() == "_"){
			$("#f8").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f8").css('color','red');

		}else{
			$("#f8").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f8").css('color','red');
		}
		if( $('#9f').val() == "_"){
			$("#f9").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f9").css('color','red');

		}else{
			$("#f9").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f9").css('color','red');
		}
		if( $('#10f').val() == "_"){
				$("#f10").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f10").css('color','red');

			}else{
				$("#f10").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
				$("#f10").css('color','red');
			}
			if( $('#11f').val() == "_"){
			$("#f11").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f11").css('color','red');

		}else{
			$("#f11").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f11").css('color','red');
		}
		if( $('#12f').val() == "_"){
			$("#f12").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f12").css('color','red');

		}else{
			$("#f12").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f12").css('color','red');
		}
		if( $('#13f').val() == "_"){
			$("#f13").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f13").css('color','red');

		}else{
			$("#f13").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#f13").css('color','red');
		}
		if( $('#23f').val() == "_"){
			$("#23f").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#23f").css('color','red');

		}else{
			$("#23f").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#23f").css('color','red');
		}
		

	}
	console.log(pahtv.vector);
	$('#fileToUpload5555').val('');
	$("#domin1").val('');
	document.getElementById('id04444_fo').style.display='none';
	//btModal
	document.getElementById('btModal444').style.display='none';
}

function upload_filesfach(fa){

	$("#domin3f").val(fa);

	var d = $("#domin3f").val();
	var fol = $("#idGRec").val();
	var clvcat = $("#idG").val();
	
	$(".upload-msg4f").text('Cargando...');
	var inputFileImage = document.getElementById("fileToUpload_f");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('fileToUpload_f',file);
	data.append('Kap',fol);
	data.append('opcs',d);
	data.append('cv',clvcat);
	$.ajax({
		url: "../../AEDTMN/MotorFilerFac",
		type: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			$(".upload-msg4f").html(data);
			window.setTimeout(function() {
			$(".alert-dismissible").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove();
			});	}, 1000);
			//$("#Ga").css('display','block');
			//$("#guardarBaldio").css('display','block');

		}
	});
	


}
function cerrarModfach(){
	if( $('#karpetfach').val() == "1" ){
		$("#rep1").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
		$("#rep1").css('color','#497445');
		//atrae las tipologias
		 var tipp_p = $('#idP').val();
  var dc_t = $('#idG').val();


	$('#karpetfach').val("2");
//vista Tipologias guardas sin subir
  var tipppx = $('#idP').val();
  var clvdctx = $('#idG').val();
  var fdctx = $('#idGRec').val();
  $("#tipologs").html('');
 


	}else{
		if( $('#karpetfach').val() == "_"){
			$("#rep1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#rep1").css('color','red');

		}else{
			$("#rep1").html('<i class="fa fa-times fa-2x" style="margin-top: 10px;"></i>');
			$("#rep1").css('color','red');
		}
	}

	console.log(pahtv.vector);
	$('#fileToUpload_f').val('');
	$("#domin3").val('');
	document.getElementById('id0f').style.display='none';
	//btModal
	document.getElementById('btModal4fachada').style.display='none';
	document.getElementById('acuseG').style.display='none';


} 

function upload_hverdes(){
	
	var clvcat = $("#idG").val();
	var car = $("#idGRec").val(); //folio
	//var d = $("#domin110").val();
	//var cat = $("#cvec").val();
	
	document.getElementById('hVerdesMal').style.display='none'; 
	$(".upload-msg55").text('Cargando...');

				var inputFileImage = document.getElementById("archverdes");
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append('archverdes',file);
				data.append('Kap',car);
				data.append('cv',clvcat);
				$.ajax({
					url: "../../AEDTMN/MoterHV",
					type: "POST",
					data: data,
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{

						console.log(data); 
						if (data == "1" || data == '1' || data == 1) {
							//document.getElementById('idhverdes').style.display='block';
							console.log(data);
							document.getElementById('hVerdesMal').style.display='none'; 
 							document.getElementById('hVerdes').style.display='none';
 							document.getElementById('hVerdesBn').style.display='block'; 


						}else{
						///error
						document.getElementById('hVerdes').style.display='none';
						document.getElementById('hVerdesMal').style.display='block';
						console.log(data); 
							}

					}
				});
}

function upload_hverdes2(){
	
	var clvcat = $("#idG").val();
	var car = $("#idGRec").val(); //folio
	//var d = $("#domin110").val();
	//var cat = $("#cvec").val();
	
	document.getElementById('hVerdesMal').style.display='none'; 
	$(".upload-msg55").text('Cargando...');

				var inputFileImage = document.getElementById("archverdes2");
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append('archverdes2',file);
				data.append('Kap',car);
				data.append('cv',clvcat);
				$.ajax({
					url: "../../AEDTMN/MoterHV2",
					type: "POST",
					data: data,
					contentType: false,
					cache: false,
					processData:false,
					success: function(data)
					{

						console.log(data); 
						if (data == "1" || data == '1' || data == 1) {
							//document.getElementById('idhverdes').style.display='block';
							console.log(data);
							document.getElementById('hVerdesMal').style.display='none'; 
 							document.getElementById('hVerdes').style.display='none';
 							document.getElementById('hVerdesBn').style.display='block'; 


						}else{
						///error
						document.getElementById('hVerdes').style.display='none';
						document.getElementById('hVerdesMal').style.display='block';
						console.log(data); 
							}

					}
				});
}