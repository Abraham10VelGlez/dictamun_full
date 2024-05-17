
$(document).ready(function () {

	//datosgenerales del dictamen
	var lr = $("#idG").val();  //clave catastral
  var anio = $("#anioDic").val();
  var gva = $("#gva").val();
  
  
	$.post("../../../../../acceso",{ acceess:51,lr:lr,anio:anio,folio:gva},function(zm){
    //console.log(zm);
    if(zm == "0000"){
      /// console.log("devolver vista");

    }else{
      $(zm).each(function(key,valuee){
        
        $("#etapa").val(valuee.etapa); 

        if (valuee.etapa == 11 && valuee.baldio == 't') {
          

           document.getElementById('alertaa').style.display='block';
            document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 11 (OBSERVADO POR REVISOR)');
            document.getElementById('alertaStatusMotivo').append('Por tal motivo se requiere que realicen las observaciones generadas. Solo se habilita el documento que cuenta con comentarios' );
            		
            document.getElementById('alertaStatusMotivo2').append('Observaciones Generales: '+valuee.obs_rev  );
            //$("#observacionGral").html();
            
           // $("#alertaa").fadeOut(9000); 

          }else if (valuee.etapa == 11 && valuee.baldio == 'f') {
           

             document.getElementById('alertaa').style.display='block';
            document.getElementById('alertaStatus').append('El dictamen se encuentra en etapa 11 (OBSERVADO POR REVISOR)');
            document.getElementById('alertaStatusMotivo').append('Por tal motivo se requiere que realicen las observaciones generadas. Solo se habilita el documento que cuenta con comentarios.' );
            document.getElementById('alertaStatusMotivo2').append('Observaciones Generales: '+valuee.obs_rev  );
            
           // $("#alertaa").fadeOut(9000);
            
            
            //$("#observacionGral").html('<h5>OBSERVACIONES GENERALES: '+valuee.obs_rev+'</h5>');

          }
        
      	if (valuee.tipopersona == 1) { // fisica
      		//contribuyente
      		$("#descripcionSer").css('display','none');
			$('#nomC').val(valuee.nombredenominacion +" "+ valuee.apaterno +" "+ valuee.amaterno );
			$('#rfcC').val(valuee.rrfcontri);
			$('#curpC').val(valuee.curpcontrib);
			$('#telefonoC').val(valuee.telefono);
			$('#correoC').val(valuee.email);
      	}else if (valuee.tipopersona==2) { // Moral
      		$('#nomC').val(valuee.nombredenominacion);
      		$('#rfcC').val(valuee.rrfcontri);
      		 $("#labelCurp").css('display','none');
      		$("#curpC").css('display','none');
            $("#curpC2").css('display','none');
      		$('#telefonoC').val(valuee.telefono);
			$('#correoC').val(valuee.email);
      		$('#descpAc').val(valuee.serviciodesc);
              document.getElementById('escrituraPublicaMoral').style.display='none'; 
          
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


      //load_filesxavg(valuee.folr,$("#idG").val(),valuee.etapa);
      
      //cargar tipologias
      //$("#tipologs").html('');
      //documentosX(2,valuee.folr,$("#cvec").val());
   	  validacion_para_recargar(valuee.folr,$("#cvec").val());


      $('#idP').val(valuee.tipopersona);
      //document.getElementById('acuseG').style.display='none';
      



    });
    }
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

	
	  

});

/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function deletex(id_docx,aniodicta){

	
	  
	  
	  var a2 = $("#cclv").val(); //clave catastral
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#idGRec").val(); //folio
	 

	  var tipopweronsa = $("#tipopersona").val();

	  
	  //$('#G tbody tr').each(function() {
	      //var _order = $(this).find('td').eq(0).text();

	      //
	  
	  $("#uploadedFile").val('');
	  $.post("../../../../../fil/elim/",{tipopersona:tipopweronsa,nombrefile:id_docx2,idfile:id_docx,clavecat:a2,foliodictamen:a1,oina:anio},function(m){
		  //console.log(m);
		  if( m == "100" ){
			  documentosX(1,a1,a2);
		  }else if( m == "0" ){
			  console.log('error no se pudo subir archivo');
		  }else{
			  console.log('error de servidor');  
		  }
	  });



	      
	   // });

	   
	  
	  
	  

	}
/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function upload_files3(){

	//alert("es insertar");

	var d = 1; 
var car = $("#folioo").val(); // folio
var clvcat = $("#cclv").val(); // claves


//$(".upload-msg4").text('Cargando...');
var inputFileImage = document.getElementById("uploadedFile");
var file = inputFileImage.files[0];
var data = new FormData();
data.append('uploadedFile',file);
data.append('Kap',car);
data.append('opcs',d);
data.append('cv',clvcat);
$.ajax({
	url: "../../../../../loading/load2",
	type: "POST",
	data: data,
	contentType: false,
	cache: false,
	processData:false,
	success: function(data)
	{
		console.log(data);
		
		//alert("tipologia subida");
		//ready tipologias
		documentosX(d,car,clvcat);
		$("#uploadedFile").val('');

	}
});

} 
/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */

function ok_down(xxxxxx) {
   


  //href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+ dctx +'/'+ xxx+ '"
  var a1 = $('#idGRec').val();
  var a2 = $('#cvec').val();
  //alert(a1 + "///" + a2);
  var a3 = $('#'+  xxxxxx).val();


  location.href = "https://dictamunigecem.edomex.gob.mx/files/documentos/" + a1 + "/" + a2 + "/" + a3;


}



/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function documentosX(a,b,c){
    $("#tipologs").html('');
    $.post("../../../../../acceso",{acceess:2210,idpers:a,dictams:b,dctx:c},function(m){
    	//console.log(m);
      $.each( m, function( key, value ) {
    var a = key + 1;
      var cher = "";
      var cher2 = "";
      var html="";
    if( value.comentario === null ){
      cher = "";
    }else{
      cher = value.comentario;
    }

    if( value.comentario2 ===  null ){
        
        cher2 = "";
        htmlcomentario = '<td><input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar"  onclick="deletex(' + value.id_docx +','+ value.aniodictamen + ');"></td></tr>' ;  
      }else if( value.comentario2 ==  "N/A" ){
      
      cher2 = value.comentario2;
      htmlcomentario = '<td>DOCUMENTO REVISADO</td></tr>' ;
    }else{
      cher2 = value.comentario2;
      
      htmlcomentario = '<td><input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar"  onclick="deletex(' + value.id_docx +','+ value.aniodictamen + ');"></td></tr>' ;
      //style="color: red;"
    }		   
    html =
      '<tr  ><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
      '<td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td>' +
      '<td>Tipologia' + a + '</td><td> <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a id="'+ value.id_docx +'" href="https://dictamunigecem.edomex.gob.mx/files/documentos/'+ value.foliocer +'/'+ c +'/'+ value.nombredoc +'">' + value.nombredoc + '</a> </td>';

    $("#tipologs").append( html + '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher2 +'</textarea>' +
    		htmlcomentario
    		);
   


  });
   
    });  
	
}
/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */



function documentosXfiles(a,b,c){
	 if(  $("#tipopersona").val() == "1" ){
		 documentosXfilesmoralpredio_baldio_construido(a,b,c);
	    	
	    }else if( $("#tipopersona").val() == "2" ){
	    	documentosXfilesmoralpredio_baldio_construido(a,b,c);
	    	
	    }else{
	    	console.log("error de datos de tipo de personas");
	    }
}



function documentosXfilesmoralpredio_baldio_construido(a,b,c){
	
	
	documentosX(1,b,c);
	
    $("#file1").html('');
    $("#file2").html('');
    $("#file3").html('');
    
    $("#file4").html('');
    $("#file5").html('');
    $("#file6").html('');

    $("#file7").html('');
    $("#file8").html('');
    $("#file9").html('');


    $("#file10").html('');
    $("#file11").html('');
    $("#file12").html('');

    $("#file13").html('');
    $("#file14").html('');
    $("#file15").html('');

    $("#file16").html('');
    $("#file17").html('');
    $("#file18").html('');

    $("#file19").html('');
    $("#file20").html('');
    $("#file21").html('');

    $("#file22").html('');
    $("#file23").html('');
    $("#file24").html('');

    $("#file25").html('');
    $("#file26").html('');
    $("#file27").html('');


    $("#file28").html('');
    $("#file29").html('');
    $("#file30").html('');

    $("#file31").html('');
    $("#file32").html('');
    $("#file33").html(''); 
    $("#file34").html('');
    
    

    $("#file1delete").html('');
    $("#file2delete").html('');
    $("#file3delete").html('');
    $("#file4delete").html('');
    $("#file5delete").html('');
    $("#file6delete").html('');
    $("#file7delete").html('');
    $("#file8delete").html('');
    $("#file9delete").html('');
    $("#file10delete").html('');

    $("#file11delete").html('');
    $("#file12delete").html('');
    $("#file13delete").html('');
    $("#file14delete").html('');
    $("#file15delete").html('');
    $("#file16delete").html('');
    $("#file17delete").html('');
    $("#file18delete").html('');
    $("#file19delete").html('');
    $("#file20delete").html('');


    $("#file21delete").html('');
    $("#file22delete").html('');
    $("#file23delete").html('');
    $("#file24delete").html('');
    $("#file25delete").html('');
    $("#file26delete").html('');
    $("#file27delete").html('');
    $("#file28delete").html('');
    $("#file29delete").html('');
    $("#file30delete").html('');



    $("#file31delete").html('');
    $("#file32delete").html('');
    $("#file33delete").html('');
    $("#file34delete").html('');
    
    



    $("#file1deleteprediobaldio").html('');
    $("#file2deleteprediobaldio").html('');
    $("#file3deleteprediobaldio").html('');
    $("#file4deleteprediobaldio").html('');
    $("#file5deleteprediobaldio").html('');
    $("#file6deleteprediobaldio").html('');
    $("#file7deleteprediobaldio").html('');
    $("#file8deleteprediobaldio").html('');
    $("#file9deleteprediobaldio").html('');
    $("#file10deleteprediobaldio").html('');

    $("#file11deleteprediobaldio").html('');
    $("#file12deleteprediobaldio").html('');
    $("#file13deleteprediobaldio").html('');
    $("#file14deleteprediobaldio").html('');
    $("#file15deleteprediobaldio").html('');
    $("#file16deleteprediobaldio").html('');
    $("#file17deleteprediobaldio").html('');
    $("#file18deleteprediobaldio").html('');
    $("#file19deleteprediobaldio").html('');
    $("#file20deleteprediobaldio").html('');


    $("#file21deleteprediobaldio").html('');
    $("#file22deleteprediobaldio").html('');
    $("#file23deleteprediobaldio").html('');
    $("#file24deleteprediobaldio").html('');
    $("#file25deleteprediobaldio").html('');
    $("#file26deleteprediobaldio").html('');
    $("#file27deleteprediobaldio").html('');
    $("#file28deleteprediobaldio").html('');
    $("#file29deleteprediobaldio").html('');
    $("#file30deleteprediobaldio").html('');



    $("#file31delete").html('');
    $("#file32delete").html('');
    $("#file33delete").html('');
    $("#file34delete").html('');



    $("#ficoment1").html('');
    $("#ficoment2").html('');
    $("#ficoment3").html('');
    
    $("#ficoment4").html('');
    $("#ficoment5").html('');
    $("#ficoment6").html('');

    $("#ficoment7").html('');
    $("#ficoment8").html('');
    $("#ficoment9").html('');


    $("#ficoment10").html('');
    $("#ficoment11").html('');
    $("#ficoment12").html('');

    $("#ficoment13").html('');
    $("#ficoment14").html('');
    $("#ficoment15").html('');

    $("#ficoment16").html('');
    $("#ficoment17").html('');
    $("#ficoment18").html('');

    $("#ficoment19").html('');
    $("#ficoment20").html('');
    $("#ficoment21").html('');

    $("#ficoment22").html('');
    $("#ficoment23").html('');
    $("#ficoment24").html('');

    $("#ficoment25").html('');
    $("#ficoment26").html('');
    $("#ficoment27").html('');


    $("#ficoment28").html('');
    $("#ficoment29").html('');
    $("#ficoment30").html('');

    $("#ficoment31").html('');
    $("#ficoment32").html('');
    $("#ficoment33").html(''); 
    $("#ficoment34").html('');
    
    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	
    $.post("../../../../../acceso",{acceess:120, tipopre:a , dictams:b, dctx:c },function(m){
    	//console.log(m);
      $.each( m, function( key, value ) {
    var a = key + 1;
      var cher = "";
      var cher2 = "";
      var html="";
    if( value.comentario === null ){
      cher = "";
    }else{
      cher = value.comentario;
    }
    
   
    



    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	if( $("#prebaldio").val()  == "100" ){
				

    //if( a == "1" ){
        
    // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica

    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file1").html(html1);


        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
        	$("#docxsfiles1").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');
        	
        	cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
            $("#file1delete").html(html1_1);
      	
      
      }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file1delete").html(html1_1);
             $("#docxsfiles1").html(html1_1);
           }else{
        	   $("#docxsfiles1").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file1delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment1").val(cher2);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file2").html(html1);


        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
        	$("#docxsfiles2").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');
        	
        	   cher2 = value.observacionRevisor;
               
               html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
               $("#file2delete").html(html1_1);
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file2delete").html(html1_1);
             $("#docxsfiles2").html(html1_1);
           }else{
        	  $("#docxsfiles2").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file2delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment2").val(cher2);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file3").html(html1);


        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
        	$("#docxsfiles3").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');
        	
       	   cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file3delete").html(html1_1);
        	
        
        }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file3delete").html(html1_1);
             $("#docxsfiles3").html(html1_1);
           }else{
        	   $("#docxsfiles3").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file3delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment3").val(cher2);
    }
    if( value.orden == "99"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file4").html(html1);


        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
        	$("#docxsfiles4").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');
      	   
        	cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
            $("#file4delete").html(html1_1);
            
        	
        
        }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file4delete").html(html1_1);
             $("#docxsfiles4").html(html1_1);
           }else{
        	 $("#docxsfiles4").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file4delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment4").val(cher2);
    }
    if( value.orden == "98"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file5").html(html1);

        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
        	
        	$("#docxsfiles5").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
     	   
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
            $("#file5delete").html(html1_1);
            
        	
        
        }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file5delete").html(html1_1);
             $("#docxsfiles5").html(html1_1);
           }else{
        	 //123  
        	 $("#docxsfiles5").html('DOCUMENTO CON OBSERVACIONES');
        	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file5delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment5").val(cher2);
    }
    if( value.orden == "83"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file6").html(html1);


       if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
        	
        	$("#docxsfiles6").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
     	   
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
            $("#file6delete").html(html1_1);
            
        	
        
        }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file6delete").html(html1_1);
             $("#docxsfiles6").html(html1_1);
           }else{
        	   $("#docxsfiles6").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file6delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment6").val(cher2);
    }
    if( value.orden == "97"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file7").html(html1);

        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles7").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file7delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file7delete").html(html1_1);
             $("#docxsfiles7").html(html1_1);
           }else{
        	   $("#docxsfiles7").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file7delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment7").val(cher2);
    }
    if( value.orden == "96"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file8").html(html1);


    
    if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
     	
     	$("#docxsfiles8").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
  	   
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file8delete").html(html1_1);
         
     	
     
     }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
         
         cher2 = value.observacionRevisor;
         
         html1_1 = 'DOCUMENTO REVISADO';
         $("#file8delete").html(html1_1);
         $("#docxsfiles8").html(html1_1);
       }else{
    	   $("#docxsfiles8").html('DOCUMENTO CON OBSERVACIONES');
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file8delete").html(html1_1);
         //style="color: red;"
       }	
     
     
     
     $("#ficoment8").val(cher2);
    }
    if( value.orden == "95"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file9").html(html1);
    
    if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
     	
     	$("#docxsfiles9").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
  	   
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file9delete").html(html1_1);
         
     	
     
     }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
         
         cher2 = value.observacionRevisor;
         
         html1_1 = 'DOCUMENTO REVISADO';
         $("#file9delete").html(html1_1);
         $("#docxsfiles9").html(html1_1);
       }else{
    	   $("#docxsfiles9").html('DOCUMENTO CON OBSERVACIONES');
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file9delete").html(html1_1);
         //style="color: red;"
       }	
     
     
     
     $("#ficoment9").val(cher2);
    }

    if( value.orden == "82"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file10").html(html1);


        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles10").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file10delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "   ){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file10delete").html(html1_1);
             $("#docxsfiles10").html(html1_1);
           }else{
        	   $("#docxsfiles10").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file10delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment10").val(cher2);
    }
    if( value.orden == "81"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file11").html(html1);


    
    if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
     	
     	$("#docxsfiles11").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
  	   
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file11delete").html(html1_1);
         
     	
     
     }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
         
         cher2 = value.observacionRevisor;
         
         html1_1 = 'DOCUMENTO REVISADO';
         $("#file11delete").html(html1_1);
         $("#docxsfiles11").html(html1_1);
       }else{
    	   $("#docxsfiles11").html('DOCUMENTO CON OBSERVACIONES');
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file11delete").html(html1_1);
         //style="color: red;"
       }	
     
     
     
     $("#ficoment11").val(cher2);
    }
    if( value.orden == "80"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file12").html(html1);


      if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
     	
     	$("#docxsfiles12").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
  	   
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file12delete").html(html1_1);
         
     	
     
     }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "   ){
         
         cher2 = value.observacionRevisor;
         
         html1_1 = 'DOCUMENTO REVISADO';
         $("#file12delete").html(html1_1);
         $("#docxsfiles12").html(html1_1);
       }else{
    	   $("#docxsfiles12").html('DOCUMENTO CON OBSERVACIONES');
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file12delete").html(html1_1);
         //style="color: red;"
       }	
     
     
     
     $("#ficoment12").val(cher2);
    }
    if( value.orden == "79"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file13").html(html1);


        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles13").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file13delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
             
             cher2 = value.observacionRevisor;
             
             html1_1 = 'DOCUMENTO REVISADO';
             $("#file13delete").html(html1_1);
             $("#docxsfiles13").html(html1_1);
           }else{
        	   $("#docxsfiles13").html('DOCUMENTO CON OBSERVACIONES');
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file13delete").html(html1_1);
             //style="color: red;"
           }	
         
         
         
         $("#ficoment13").val(cher2);
    }
    if( value.orden == "15"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file14").html(html1);


    
    if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
     	
     	$("#docxsfiles14").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
  	   
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file14delete").html(html1_1);
         
     	
     
     }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
         
         cher2 = value.observacionRevisor;
         
         html1_1 = 'DOCUMENTO REVISADO';
         $("#file14delete").html(html1_1);
         $("#docxsfiles14").html(html1_1);
       }else{
    	   $("#docxsfiles14").html('DOCUMENTO CON OBSERVACIONES');
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file14delete").html(html1_1);
         //style="color: red;"
       }	
     
     
     
     $("#ficoment14").val(cher2);
    }
    if( value.orden == "94"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file15").html(html1);


    
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
     	
     	$("#docxsfiles15").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
  	   
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file15delete").html(html1_1);
         
     	
     
     }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
         
         cher2 = value.observacionRevisor;
         
         html1_1 = 'DOCUMENTO REVISADO';
         $("#file15delete").html(html1_1);
         $("#docxsfiles15").html(html1_1);
       }else{
    	   $("#docxsfiles15").html('DOCUMENTO CON OBSERVACIONES');
         cher2 = value.observacionRevisor;
         
         html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
         $("#file15delete").html(html1_1);
         //style="color: red;"
       }	
     
     
     
     $("#ficoment15").val(cher2);
    }


    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file16").html(html1);

        
        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles16").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file16delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file16delete").html(html1_1);
            $("#docxsfiles16").html(html1_1);
          }else{
        	  $("#docxsfiles16").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
            $("#file16delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment16").val(cher2);
        
        
        
        }
    
    
    
if( value.orden == "90"){    //Acta constitutiva de la empresa 
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file21prediobaldio").html(html1);
        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles21prediobaldio").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
            cher2 = value.observacionRevisor;
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
            $("#file21deleteprediobaldio").html(html1_1);

}else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
                 
                 cher2 = value.observacionRevisor;
                 html1_1 = 'DOCUMENTO REVISADO';
                 $("#file21deleteprediobaldio").html(html1_1);
                 $("#docxsfiles21prediobaldio").html(html1_1);

}else{

            	   $("#docxsfiles21prediobaldio").html('DOCUMENTO CON OBSERVACIONES');
                 cher2 = value.observacionRevisor;
                 html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
                 $("#file21deleteprediobaldio").html(html1_1);
                 //style="color: red;"

}	
             
             
             
             $("#ficoment21prediobaldio").val(cher2);
       
    }
    if( value.orden == "89"){ //nombramineto del representante legal
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file22prediobaldio").html(html1);

 if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles22prediobaldio").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file22deleteprediobaldio").html(html1_1);
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
                 
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = 'DOCUMENTO REVISADO';
                 $("#file22deleteprediobaldio").html(html1_1);
                 $("#docxsfiles22prediobaldio").html(html1_1);
               }else{
            	   $("#docxsfiles22prediobaldio").html('DOCUMENTO CON OBSERVACIONES');
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
                 $("#file22deleteprediobaldio").html(html1_1);
                 //style="color: red;"
               }	
             
             
             
             $("#ficoment22prediobaldio").val(cher2);
       
       
       
    }
    
    

    
 // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica


    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/
	
    }else if( $("#preconstruido").val() == "100" ){
    	





        
        
 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral
    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file18").html(html1);
        
        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles18").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file18delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file18delete").html(html1_1);
            $("#docxsfiles18").html(html1_1);
          }else{
        	  $("#docxsfiles18").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file18delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment18").val(cher2);
        
        
        
        
        
        
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file19").html(html1);

        
        
        
 if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles19").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file19delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file19delete").html(html1_1);
            $("#docxsfiles19").html(html1_1);
          }else{
        	  $("#docxsfiles19").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file19delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment19").val(cher2);
        
        
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file20").html(html1);
        
        
        if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles20").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file20delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
                 
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = 'DOCUMENTO REVISADO';
                 $("#file20delete").html(html1_1);
                 $("#docxsfiles20").html(html1_1);
               }else{
            	   $("#docxsfiles20").html('DOCUMENTO CON OBSERVACIONES');
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
                 $("#file20delete").html(html1_1);
                 //style="color: red;"
               }	
             
             
             
             $("#ficoment20").val(cher2);
        
        
        
    }
    
    if( value.orden == "90"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file21predioconstruido").html(html1);

       

        
        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles21predioconstruido").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file21deletepredioconstruido").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
                 
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = 'DOCUMENTO REVISADO';
                 $("#file21deletepredioconstruido").html(html1_1);
                 $("#docxsfiles21predioconstruido").html(html1_1);
               }else{
            	   $("#docxsfiles21predioconstruido").html('DOCUMENTO CON OBSERVACIONES');
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
                 $("#file21deletepredioconstruido").html(html1_1);
                 //style="color: red;"
               }	
             
             
             
             $("#ficoment21predioconstruido").val(cher2);
       
    }
    if( value.orden == "89"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file22predioconstruido").html(html1);

       
        

        
        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles22predioconstruido").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file22deletepredioconstruido").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
                 
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = 'DOCUMENTO REVISADO';
                 $("#file22deletepredioconstruido").html(html1_1);
                 $("#docxsfiles22predioconstruido").html(html1_1);
               }else{
            	   $("#docxsfiles22predioconstruido").html('DOCUMENTO CON OBSERVACIONES');
                 cher2 = value.observacionRevisor;
                 
                 html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
                 $("#file22deletepredioconstruido").html(html1_1);
                 //style="color: red;"
               }	
             
             
             
             $("#ficoment22predioconstruido").val(cher2);
       
       
       
    }
    if( value.orden == "88"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file23").html(html1);

       
        
        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles23").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file23delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file23delete").html(html1_1);
            $("#docxsfiles23").html(html1_1);
          }else{
        	  $("#docxsfiles23").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file23delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment23").val(cher2);
        
        
        
    }
    if( value.orden == "87"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file25").html(html1);


        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles25").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file25delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file25delete").html(html1_1);
            $("#docxsfiles25").html(html1_1);
          }else{
        	  $("#docxsfiles25").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file25delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment25").val(cher2);
    }
    if( value.orden == "86"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file26").html(html1);


        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles26").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file26delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file26delete").html(html1_1);
            $("#docxsfiles26").html(html1_1);
          }else{
        	  $("#docxsfiles26").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file26delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment26").val(cher2);
    }
    if( value.orden == "85"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file27").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles27").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file27delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file27delete").html(html1_1);
            $("#docxsfiles27").html(html1_1);
          }else{
        	  $("#docxsfiles27").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file27delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment27").val(cher2);
    }
    if( value.orden == "84"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file28").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles28").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file28delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file28delete").html(html1_1);
            $("#docxsfiles28").html(html1_1);
          }else{
        	  $("#docxsfiles28").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file28delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment28").val(cher2);
    }
    if( value.orden == "15"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file29").html(html1);


if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles29").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file29delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
          
          cher2 = value.observacionRevisor;
          
          html1_1 = 'DOCUMENTO REVISADO';
          $("#file29delete").html(html1_1);
          $("#docxsfiles29").html(html1_1);
        }else{
        	$("#docxsfiles29").html('DOCUMENTO CON OBSERVACIONES');
          cher2 = value.observacionRevisor;
          
          html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
          $("#file29delete").html(html1_1);
          //style="color: red;"
        }	
      
      
      
      $("#ficoment29").val(cher2);
    }
    if( value.orden == "78"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file24").html(html1);
        
if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles24").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file24delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
          
          cher2 = value.observacionRevisor;
          
          html1_1 = 'DOCUMENTO REVISADO';
          $("#file24delete").html(html1_1);
          $("#docxsfiles24").html(html1_1);
        }else{
        	$("#docxsfiles24").html('DOCUMENTO CON OBSERVACIONES');
          cher2 = value.observacionRevisor;
          
          html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
          $("#file24delete").html(html1_1);
          //style="color: red;"
        }	
      
      
      
      $("#ficoment24").val(cher2);
      
    }
    if( value.orden == "77"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file30").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles30").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file30delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " || value.observacionRevisor === undefined || value.observacionRevisor == null  ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file30delete").html(html1_1);
            $("#docxsfiles30").html(html1_1);
          }else{
        	  $("#docxsfiles30").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file30delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment30").val(cher2);
    }
    if( value.orden == "76"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file31").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles31").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file31delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file31delete").html(html1_1);
            $("#docxsfiles31").html(html1_1);
          }else{
        	  $("#docxsfiles31").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file31delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment31").val(cher2);
    }
    if( value.orden == "75"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file32").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles32").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file32delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " "  ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file32delete").html(html1_1);
            $("#docxsfiles32").html(html1_1);
          }else{
        	  $("#docxsfiles32").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file32delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment32").val(cher2);
    }
    if( value.orden == "74"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file33").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles33").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file33delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file33delete").html(html1_1);
            $("#docxsfiles33").html(html1_1);
          }else{
        	  $("#docxsfiles33").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file33delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment33").val(cher2);
    }
    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file34").html(html1);

if( value.observacionRevisor === undefined || value.observacionRevisor == null  ){
         	
         	$("#docxsfiles34").html('DOCUMENTO SUBIDO Y GUARDADO CORRECTAMENTE');        	
      	   
             cher2 = value.observacionRevisor;
             
             html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
             $("#file34delete").html(html1_1);
             
         	
         
         }else if( value.observacionRevisor ==  "N/A" ||  value.observacionRevisor == "" || value.observacionRevisor == " " || value.observacionRevisor === undefined || value.observacionRevisor == null  ){
            
            cher2 = value.observacionRevisor;
            
            html1_1 = 'DOCUMENTO REVISADO';
            $("#file34delete").html(html1_1);
            $("#docxsfiles34").html(html1_1);
          }else{
        	  $("#docxsfiles34").html('DOCUMENTO CON OBSERVACIONES');
            cher2 = value.observacionRevisor;
            
            html1_1 = '<input type="button" id="dropp" style="background-color: #8b4c55; border-color: #8b4c55;" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
            $("#file34delete").html(html1_1);
            //style="color: red;"
          }	
        
        
        
        $("#ficoment34").val(cher2);
        }








    

    }else{
        console.log("error de logica de tipo de predio baldio o construido");
    }

 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral  


  });
   
    });  
	
}


function validacion_para_recargar(flo,clvc){
	
	
	
	
	$("#camp23baldio").css('display','none');
	
	
	
	$("#camp23contruid").css('display','none');
	
	
	
	
	var b = flo; // folio con ceros
	var c = clvc; // claves
	$.post("../../../../../acceso",{acceess:116,
	    claveCat:c,
	    folio2:b,          
      },function(updatecampvalidad){
          //console.log(updatecamp);
    	  
    	  
    	  
    	  if( $("#tipopersona").val() == '1' ){ //fisico
    		  
    		  if( updatecampvalidad == 't' ){
            	  console.log( "es un predio baldio, continua " + updatecampvalidad );
            	  $("input[name=predio]").val(['1']);
            	  
            	  $("input[type=radio]").attr('disabled', true);
            	  
            	  baldio(flo,clvc);
            	  $("#camp21actaconsbaldio").css('display','none');
            		$("#camp22actaconsbaldio").css('display','none');
            		$("#camp21actacons").css('display','none');
            		$("#camp22actacons").css('display','none');
            		
              }else if( updatecampvalidad == 'f' ){
            	  console.log( "es un predio construido, continua "  + updatecampvalidad );
            	  $("input[name=predio]").val(['2']);
            	  
            	  $("input[type=radio]").attr('disabled', true);
            	  
            	  construccion(flo,clvc);
            	  $("#camp21actaconsbaldio").css('display','none');
            		$("#camp22actaconsbaldio").css('display','none');
            		$("#camp21actacons").css('display','none');
            		$("#camp22actacons").css('display','none');
              }else{
            	  console.log( "error de ejecucion"  );
              }
    		  
    	  }else if( $("#tipopersona").val() == '2' ){// moral
    		  
    		  
    		  if( updatecampvalidad == 't' ){
            	  console.log( "es un predio baldio, continua " + updatecampvalidad );
            	  $("input[name=predio]").val(['1']);
            	  
            	  $("input[type=radio]").attr('disabled', true);
            	  
            	  baldio(flo,clvc);
            	  
            	  // se activan campos para moral ´predio vbaldio
            	  //$("#camp21actaconsbaldio").css('display','block');
            	  //$("#camp22actaconsbaldio").css('display','block');
            	  $("#camp23baldio").css('display','block');
            		
              }else if( updatecampvalidad == 'f' ){
            	  console.log( "es un predio construido, continua "  + updatecampvalidad );
            	  $("input[name=predio]").val(['2']);
            	  
            	  $("input[type=radio]").attr('disabled', true);
            	  
            	  construccion(flo,clvc);
            	  
            	  //$("#camp21actacons").css('display','block');
            	  //$("#camp22actacons").css('display','block');
            	  
            	  $("#camp23contruid").css('display','block');
            		
            		
              }else{
            	  console.log( "error de ejecucion"  );
              }
    		  
    		  
    	  }else{
    		  
    	  }
    	  
    	  
    	  
    	  
    	  
    	  
    	  
          
          
          
          });
}




function baldio(flo,clvc){



	
	$("#prebaldio").val(100);
	$("#preconstruido").val("");
	$("#xcod").css("display","block");
	
	$("#avg1").css("display","block");

		$("#docxs_f").css("display","block");
		$("#docxs_m").css("display","none");
		$("#tipolgis").css("display","none");


		 /*
		funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
		ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
		y
		ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
		*/
		
		
		var b = flo; // folio
		var c = clvc; // claves
					
		documentosXfiles(1,b,c);


	    
	}


function construccion(flo,clvc){
		$("#prebaldio").val("");
		$("#preconstruido").val(100);
		$("#xcod").css("display","block");
		
		$("#avg1").css("display","block");

		
		$("#docxs_m").css("display","block");
		$("#tipolgis").css("display","block");
		
		$("#docxs_f").css("display","none");

		$("#imgaenmoral").css("display","none");

		var sssuper = flo;
		//var b = zfill(sssuper, 5) // folio
		var b = sssuper; // folio
		var c = clvc; // claves
		
		documentosXfiles(2,b,c);
		


	}
	
	
function zfill(number, width) {
	    var numberOutput = Math.abs(number); /* Valor absoluto del número */
	    var length = number.toString().length; /* Largo del número */ 
	    var zero = "0"; /* String de cero */  
	    
	    if (width <= length) {
	        if (number < 0) {
	             return ("-" + numberOutput.toString()); 
	        } else {
	             return numberOutput.toString(); 
	        }
	    } else {
	        if (number < 0) {
	            return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
	        } else {
	            return ((zero.repeat(width - length)) + numberOutput.toString()); 
	        }
	    }
	}



function deletedocs(id_docx,aniodicta){
	//,cclave,idfolxavg
	

	
	  //var a1 = idfolxavg; //
	  
	  var a2 = $("#cclv").val(); //
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#idGRec").val(); //folio

	  var tipopweronsa = $("#tipopersona").val()

	  
	  $.post("../../../../../fil/elim/",{tipopersona:tipopweronsa,nombrefile:id_docx2,idfile:id_docx,clavecat:a2,foliodictamen:a1,oina:anio},function(m){
		  //console.log(m);
		  if( m == "100" ){
			    var b = a1; // folio
				var c = a2; // claves
							
				//documentosXfiles(1,b,c);
				location.reload();
			  
			  
		  }else if( m == "0" ){
			  console.log('error no se pudo subir archivo');
		  }else{
			  console.log('error de servidor');  
		  }
	  });

	   
	  
	  
	  

	}














var pahtv_t = { vector_t : [] } ;
var vector_t = { id_inmu : '',id_doc : '',tipolg_n : '', comentario : '' };

function bad(pers,fl,clv,anio){
	/*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	if( $("#prebaldio").val()  == "100" ){
	      //Predio baldío
	 var avaluofirmado = $('#ficoment1').val(); //formato avaluo firmado
     var dictaval = $('#ficoment2').val(); //archivo dictaval .val
     var construcciones = $('#ficoment3').val(); //archivo contrucciones .val 
     var escriturap = $('#ficoment4').val(); //escritura publica
     var boletapredial = $('#ficoment5').val(); // boleta predial
     var acreditapropied = $('#ficoment6').val(); //doc q acredite la propiedad
     var idenoficial = $('#ficoment7').val(); //identificacion oficial
     var medidascolindanc = $('#ficoment8').val(); //medidad y colindancias
     var croquislocaliz = $('#ficoment9').val(); // creoquis de localizacion
     var otros = $('#ficoment15').val(); //otros
     var indivisoscondominios = $('#ficoment14').val(); //indivisos y condominio
     var croquisconstruccion = $('#ficoment10').val(); //plano arq. o croquis de construccion
     var usoprivativo = $('#ficoment11').val(); //uso privativo
     var superficiesconstru = $('#ficoment12').val(); //superficies constructivas
     var planosfactores = $('#ficoment13').val(); // planos de factores
     var fachada = $('#ficoment16').val(); // fachada


     
     

     var actaConstitutiva = $('#ficoment21prediobaldio').val();
      var nombramientooLegal = $('#ficoment22prediobaldio').val();

     $.post("../../../../../acceso",{acceess:113,
		    claveCat:clv,
		    folio2:fl},function(z){
	            
		    	console.log(z); 
           if( z == "50" ){
	              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
	             // alert(" DEBES TENER AL MENOS 7 O MAS DOCUMENTOS");
               document.getElementById('alertaa').style.display='none';
                document.getElementById('alertaa2').style.display='block';
                document.getElementById('alertaa3').style.display='none';
	              
	              
           }else if( z == "100" ){
	              //TIENES LOS DOCUMENTOS NECESARIOS
         	  //alert("TIENES LOS DOCUMENTOS NECESARIOS");
            document.getElementById('alertaa').style.display='none';
            document.getElementById('alertaa2').style.display='none';
            document.getElementById('alertaa3').style.display='block';

         	  $.post("../../../../../acceso",{acceess:2228,
             	  claveCat:clv,
             	  folio2:fl,
                  avaluofirmado :avaluofirmado, 
                  dictaval :dictaval, 
                  construcciones :construcciones, 
                  escriturap :escriturap, 
                  boletapredial :boletapredial, 
                  acreditapropied :acreditapropied, 
                  idenoficial:idenoficial,
                  medidascolindanc:medidascolindanc,
                  croquislocaliz :croquislocaliz, 
                  otros:otros,
                  indivisoscondominios :indivisoscondominios, 
                  croquisconstruccion :croquisconstruccion, 
                  usoprivativo :usoprivativo, 
                  superficiesconstru:superficiesconstru,
                  planosfactores :planosfactores, 
                  actaConstitutiva:actaConstitutiva,
                  nombramientooLegal:nombramientooLegal, 
                  fachada:fachada},function(prediobaldiosave){

                	  console.log(prediobaldiosave);
		            	if( prediobaldiosave == "50" ){
	  		            	
		            		console.log("guardados comentarios");



		            		
		            	    var abc = fl;
		            	    var a = {acceess:2252,abc:abc,ky:clv};
		            	    $.ajax({
		            	      url: "../../../../../acceso",
		            	      type: "POST",
		            	      data: a,		  		            	      
		            	      success: function(e)
		            	      {
		            	        if( e == "10" ){
		            	          console.log( "correccion de .val lista al " + e);
		            	        }else{
		            	          console.log("error de ordenar avaluos val: " + e);
		            	        }

		            	      }
		            	    });

		            	    var b = {acceess:2253,abc:abc,ky:clv};
		            	    $.ajax({
		            	      url: "../../../../../acceso",
		            	      type: "POST",
		            	      data: b,
		            	      success: function(ee)
		            	      {
		            	        if( ee == "10" ){
		            	          console.log("guardado del avaluos.val listo tiene" + ee);
		            	        }else{
		            	        	console.log("error al guardar avaluos val: " + ee);
		            	        }

		            	      }
		            	    });

		            	    var c = {acceess:2254,abc:abc,ky:clv};
		            	    $.ajax({
		            	      url: "../../../../../acceso",
		            	      type: "POST",
		            	      data: c,
		            	      success: function(i)
		            	      {
		            	        if( i == "10" ){
		            	          console.log( "guardado del construcciones .val listo tiene" + i);
		            	        }else{
		            	          console.log(i);
		            	        console.log("error al guardar construcciones val: " + i);
		            	        }

		            	      }
		            	    });


		            	 $.post("../../../../../acceso",{acceess:555555,ffff:fl,clvvv:clv},function(VaL){
                        
                        if( VaL == 200){
                         //alert("GUARDADO");
                         location.href = " https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/4";
                        }else{
                          console.log("Error de renovar los archivos .val ");
                        }                  

                       });
		            	

		            		
		            	}else{
	  		            	
		            		console.log("error : " + prediobaldiosave );
		            	}
		            	
                      
                      });
              

           }
		    });

   
				

			}else if( $("#preconstruido").val() == "100" ){
				// Predio construido
			

			      var avaluofirmadoM = $("#ficoment18").val(); //formato avaluo firmado
			      var dictavalM =$("#ficoment19").val(); //archivo dictaval .val
			      var construccionesM = $("#ficoment20").val(); //archivo contrucciones .val  

			      //var actaempresa = $("#ficoment21").val(); //Acta Constitutiva de la Empresa  
			      //var nombramientolegal = $("#ficoment22").val(); // Nombramiento del Representante legal
			      var actaempresa = $('#ficoment21predioconstruido').val();
		          var nombramientolegal = $('#ficoment22predioconstruido').val(); 
			      var boleta = $("#ficoment23").val(); //Boleta Predial  

			      var acreditapropiedadM = $("#ficoment24").val(); //Documento que acredite la propiedad
			      var idenoficialM = $("#ficoment25").val(); //Identificación Oficial del propietario o representante legal
			      var medidascolindancM = $("#ficoment26").val(); // Planos ó Croquis de terreno (medidas y colindancias)

			      var croquislocalizM = $("#ficoment27").val(); //Croquis de Localización  
			      var otrosM = $("#ficoment28").val(); //otros
			      var indivisoscondominiosM = $("#ficoment29").val(); //Relación de indivisos de Condominio
			      var croquisconstruccionM = $("#ficoment30").val(); //Plano arquitectónico o croquis de construcción

			      var usoprivativoM = $("#ficoment31").val(); //Plano arquitectónico contenido edificaciones de su uso privativo
			      var superficiesconstruM = $("#ficoment32").val(); //Plano del conjunto donde señalan las deferentes superficies constructivas
			      var planosfactoresM = $("#ficoment33").val();//Planos de Factores

			        
			      var fachadaM = $('#ficoment34').val(); // fachada
			      
			    
			    pahtv_t.vector_t = [];
			    
			    $('#tipologstable tbody tr').each(function() {
			      var codigodi = $(this).find('td').eq(0).text();			      
				  var iddoc = 12;
				  var comentario = $(this).find('textarea').val();						
				  
				//var a = key + 1;
			   pahtv_t.vector_t.push({				   
			            folio : fl,
			            clve : clv,						
						id_doc: iddoc,
						tipolg_n : codigodi,
						comentario : comentario
				});


			    });
			    console.log(pahtv_t.vector_t);



			    $.post("../../../../../acceso",{acceess:113,
				    claveCat:clv,
				    folio2:fl},function(z){
			            
				    	console.log(z); 
		              if( z == "50" ){
			              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
			             // alert(" DEBES TENER AL MENOS 7 O MAS DOCUMENTOS");
                   document.getElementById('alertaa').style.display='none';
                   document.getElementById('alertaa2').style.display='block';
                document.getElementById('alertaa3').style.display='none';
			              
			              
		              }else if( z == "100" ){
			              //TIENES LOS DOCUMENTOS NECESARIOS
		            	  //alert("TIENES LOS DOCUMENTOS NECESARIOS");
                    document.getElementById('alertaa').style.display='none';
                    document.getElementById('alertaa2').style.display='none';
                document.getElementById('alertaa3').style.display='block';

		            	  $.post("../../../../../acceso",{acceess:222,
		  				    claveCat:clv,
		  				    folio2:fl,
		  		            avaluofirmadoM:avaluofirmadoM, 
		  		            dictavalM:dictavalM, 
		  		            construccionesM:construccionesM, 
		  		            actaempresa:actaempresa, 
		  		            nombramientolegal:nombramientolegal, 
		  		            boleta:boleta, 
		  		            acreditapropiedadM:acreditapropiedadM,
		  		            idenoficialM:idenoficialM,
		  		            medidascolindancM:medidascolindancM, 
		  		            croquislocalizM:croquislocalizM,
		  		            otrosM:otrosM, 
		  		            indivisoscondominiosM:indivisoscondominiosM, 
		  		            croquisconstruccionM:croquisconstruccionM, 
		  		            usoprivativoM:usoprivativoM,
		  		            superficiesconstruM:superficiesconstruM, 
		  		            planosfactoresM:planosfactoresM,
		  		            fachadaM:fachadaM,
		  		            
		  		            tipologg:pahtv_t.vector_t
		  		            
		  		            },function(saver){
		  		            	console.log(saver);
		  		            	if( saver == "50" ){
			  		            	
		  		            		console.log("guardados comentarios");



		  		            		
		  		            	  var abc = fl;
				            	    var a = {acceess:2252,abc:abc,ky:clv};
				            	    $.ajax({
				            	      url: "../../../../../acceso",
				            	      type: "POST",
				            	      data: a,		  		            	      
				            	      success: function(e)
				            	      {
				            	        if( e == "10" ){
				            	          console.log( "correccion de .val lista al " + e);
				            	        }else{
				            	          console.log("error de ordenar avaluos val: " + e);
				            	        }

				            	      }
				            	    });

				            	    var b = {acceess:2253,abc:abc,ky:clv};
				            	    $.ajax({
				            	      url: "../../../../../acceso",
				            	      type: "POST",
				            	      data: b,
				            	      success: function(ee)
				            	      {
				            	        if( ee == "10" ){
				            	          console.log("guardado del avaluos.val listo tiene" + ee);
				            	        }else{
				            	        	console.log("error al guardar avaluos val: " + ee);
				            	        }

				            	      }
				            	    });

				            	    var c = {acceess:2254,abc:abc,ky:clv};
				            	    $.ajax({
				            	      url: "../../../../../acceso",
				            	      type: "POST",
				            	      data: c,
				            	      success: function(i)
				            	      {
				            	        if( i == "10" ){
				            	          console.log( "guardado del construcciones .val listo tiene" + i);
				            	        }else{
				            	          console.log(i);
				            	        console.log("error al guardar construcciones val: " + i);
				            	        }

				            	      }
				            	    });


		  		            	   $.post("../../../../../acceso",{acceess:555555,ffff:fl,clvvv:clv},function(VaL){
                        
                        if( VaL == 200){
                         //alert("GUARDADO");
                        location.href = " https://dictamunigecem.edomex.gob.mx/AEDTMN/SeguimientoDictamen/4";
                        }else{
                          console.log("Error de renovar los archivos .val ");
                        }                  

                       });
		  		            	

		  		            		
		  		            	}else{
			  		            	
		  		            		console.log("error : " + saver );
		  		            	}
			  		            
		  		            });

		  		            
		            	  
			              
			              
		              }else{
			              console.log("error logico");
		              }
		              
		           
		            
		        
		      });


			}else{
				 console.log("error no se seeleciono tipo de predio");
			}
	
}
