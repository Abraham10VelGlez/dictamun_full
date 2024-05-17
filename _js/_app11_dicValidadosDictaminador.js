
$(document).ready(function () {

	$("#combofisico").css('display','none');
		$("#combomoral").css('display','none');



	//datosgenerales del dictamen
	var lr = $("#idG").val();  //clave catastral
  var anio = $("#anioDic").val();
  
	/*$.post("../../../../acceso",{ acceess:69,lr:lr },function(v){
		$(v).each(function(key,valuee){

			$('#n_inm').val(valuee.id);
			$('#cvec').val(valuee.cve_catastral);
		});
	});*/
	$.post("../../../../../acceso",{ acceess:51,lr:lr,anio:anio},function(zm){
    //console.log(zm);
    if(zm == "0000"){
      /// console.log("devolver vista");

    }else{
      $(zm).each(function(key,valuee){
        
        $("#etapa").val(valuee.etapa); 
        document.getElementById('btnoss').style.display='none';
        

         if (valuee.etapa == 15) {
       
          // document.getElementById('prediosCla').style.display='none';
           document.getElementById('btnat').style.display='none';
           document.getElementById('documentacion').style.display='block';
            $("#uploadedFile").css('display','none');
             $("#tituloTipolog").css('display','none');
        }


      
      	if (valuee.tipopersona == 1) { // fisica

      		   
      		    $("#descripcionSer").css('display','none');
			        $('#nomC').val(valuee.nombredenominacion +" "+ valuee.apaterno +" "+ valuee.amaterno );
			        $('#rfcC').val(valuee.rrfcontri);
			        $('#curpC').val(valuee.curpcontrib);
			        $('#telefonoC').val(valuee.telefono);
			        $('#correoC').val(valuee.email);

             $("#doc_fisico").css('display','block'); 
              $("#doc_moral").css('display','none'); 

      	}else if (valuee.tipopersona==2) { // Moral

              
      		   $("#doc_fisico").css('display','none');
             $("#doc_moral").css('display','block'); 

      		    $("#curpC2").css('display','none');
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

      if (valuee.baldio == 't') { //predio baldio
        
         document.getElementById('comboConstruido').style.display='none';         
         document.getElementById('comboBaldio').style.display='block';

          $("#Construido1").css('display','none'); 
          $("#Construido2").css('display','none'); 
          $("#construccionM1").css('display','none'); 
          $("#construccionM2").css('display','none'); 
          $("#tipolgis").css('display','none');


          $("#Baldio1").css('display','block'); 
          $("#Baldio2").css('display','block'); 
          $("#baldioM1").css('display','block'); 
          $("#baldioM2").css('display','block'); 


          


      }else if(valuee.baldio == 'f'){ //predio construido
        
         document.getElementById('comboBaldio').style.display='none';
         document.getElementById('comboConstruido').style.display='block';

          $("#Construido1").css('display','block'); 
          $("#Construido2").css('display','block');
          $("#construccionM1").css('display','block'); 
          $("#construccionM2").css('display','block');  
          $("#tipolgis").css('display','block');

          $("#Baldio1").css('display','none'); 
          $("#Baldio2").css('display','none'); 
          $("#baldioM1").css('display','none'); 
          $("#baldioM2").css('display','none');


      }



   

      load_filesxavg(valuee.folr,$("#idG").val(),valuee.etapa);
      
      tipologiasAll (valuee.folr,$("#idG").val());


    });
    }
	

		});
	

});


function tipologiasAll(folio,clave){
        //tipologs
         $.post("../../../../../acceso",{acceess:13,folio:folio,clave:clave},function(g){ 

          console.log(g); 
           $(g).each(function(key,valuee){

            $("#tipologs").append('<tr><th>'+valuee.nombredoc+'</th><th><i  class="fa fa-check fa-2x" style="margin-top: 10px; color: #497445;"></i></th><th><textarea readonly>'+valuee.comentario+'</textarea></th></tr>');

            });



         });
         

}



function load_filesxavg(axxxxxxxx,x,etapa){

   var clv = $('#cvec').val();
    //var dct = $('#idGRec').val();
    var dct = axxxxxxxx;
    $.post("../../../../../acceso",{acceess:85,dictams:dct},function(g){
      //  console.log(g);
      if( g == "3" ){
      var tippp = $('#idP').val();
      var dct = axxxxxxxx;

      $.post("../../../../../acceso",{acceess:71,idpers:tippp,dictams:dct,calvecatt:clv,etapa:etapa},function(h){
         console.log(h);
         var tip_p = $('#idP').val();

           if( tip_p == "1"){ //fisico 


             $(h).each(function(key,valuee){
        
             $('#etapa').val(valuee.etapa);

             if( valuee.etapa == "15" ){  //validado

                switch (valuee.orden) {

                  /*

                  ficoment1     //14 formato del avaluo firmado
                  ficoment2    //10 avaluos.val
                  ficoment3   //11 Construcciones .val
                  ficoment4   //99 Escritura publica o titulo de propiedad
                  
                 
                  ficoment5   //98 y 88 Boleta predial
                  ficoment6   //83 y 78 Doc que acredita la propiedad
                  ficoment7   //97 y 87 identificacion oficial
                  ficoment8    //medidas y colindancias
                  ficoment9   //95 y 85 Localizacion
                  ficoment10  //82 y 77 Croquis de construccion
                  ficoment11  //81 y 76 uso privativo
                  ficoment12  //80 y 75 superficies constructivas
                  ficoment13  //79 y 74 Planos de factores
                  ficoment14   //15 Indivisos de condominios
                  ficoment15   //94 y 84Otros
                  ficoment16    //120 Imagen de fachada

                  */
                case "14":
                $("#ficoment1-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment1-a").css('color','#497445');
                $("#ficoment1").val(valuee.comentario); 
                $("#ficoment1").attr('readonly','readonly'); 
                break;

                case "10":
                 $("#ficoment2-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment2-a").css('color','#497445');
                $("#ficoment2").val(valuee.comentario); 
                $("#ficoment2").attr('readonly','readonly'); 
                break;

                case "11":
                 $("#ficoment3-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment3-a").css('color','#497445');
                $("#ficoment3").val(valuee.comentario); 
                $("#ficoment3").attr('readonly','readonly'); 
                break;

                case "99":
                 $("#ficoment4-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment4-a").css('color','#497445');
                $("#ficoment4").val(valuee.comentario); 
                $("#ficoment4").attr('readonly','readonly'); 
                break;

                case "88":
                 $("#ficoment5-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment5-a").css('color','#497445');
                $("#ficoment5").val(valuee.comentario); 
                $("#ficoment5").attr('readonly','readonly'); 
                break;

                case "98":
                 $("#ficoment5-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment5-a").css('color','#497445');
                $("#ficoment5").val(valuee.comentario); 
                $("#ficoment5").attr('readonly','readonly'); 
                break;

                case "78":
                 $("#ficoment6-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment6-a").css('color','#497445');
                $("#ficoment6").val(valuee.comentario); 
                $("#ficoment6").attr('readonly','readonly'); 
                break;

                case "83":
                 $("#ficoment6-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment6-a").css('color','#497445');
                $("#ficoment6").val(valuee.comentario); 
                $("#ficoment6").attr('readonly','readonly'); 
                break;

                case "87":
                 $("#ficoment7-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment7-a").css('color','#497445');
                $("#ficoment7").val(valuee.comentario); 
                $("#ficoment7").attr('readonly','readonly'); 
                break;

                case "97":
                 $("#ficoment7-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment7-a").css('color','#497445');
                $("#ficoment7").val(valuee.comentario); 
                $("#ficoment7").attr('readonly','readonly'); 
                break;

                case "85":
                 $("#ficoment9-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment9-a").css('color','#497445');
                $("#ficoment9").val(valuee.comentario); 
                $("#ficoment9").attr('readonly','readonly'); 
                break;

                case "95":
                 $("#ficoment9-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment9-a").css('color','#497445');
                $("#ficoment9").val(valuee.comentario); 
                $("#ficoment9").attr('readonly','readonly'); 
                break;

                case "77":
                 $("#ficoment10-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment10-a").css('color','#497445');
                $("#ficoment10").val(valuee.comentario); 
                $("#ficoment10").attr('readonly','readonly'); 
                break;

                case "82":
                 $("#ficoment10-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment10-a").css('color','#497445');
                $("#ficoment10").val(valuee.comentario); 
                $("#ficoment10").attr('readonly','readonly'); 
                break;

                case "76":
                 $("#ficoment11-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment11-a").css('color','#497445');
                $("#ficoment11").val(valuee.comentario); 
                $("#ficoment11").attr('readonly','readonly'); 
                break;

                case "81":
                 $("#ficoment11-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment11-a").css('color','#497445');
                $("#ficoment11").val(valuee.comentario); 
                $("#ficoment11").attr('readonly','readonly'); 
                break;

                case "75":
                 $("#ficoment12-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment12-a").css('color','#497445');
                $("#ficoment12").val(valuee.comentario); 
                $("#ficoment12").attr('readonly','readonly'); 
                break;

                case "80":
                 $("#ficoment12-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment12-a").css('color','#497445');
                $("#ficoment12").val(valuee.comentario); 
                $("#ficoment12").attr('readonly','readonly'); 
                break;

                case "74":
                 $("#ficoment13-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment13-a").css('color','#497445');
                $("#ficoment13").val(valuee.comentario); 
                $("#ficoment13").attr('readonly','readonly'); 
                break;

                case "79":
                 $("#ficoment13-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment13-a").css('color','#497445');
                $("#ficoment13").val(valuee.comentario); 
                $("#ficoment13").attr('readonly','readonly'); 
                break;

                case "15":
                 $("#ficoment14-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment14-a").css('color','#497445');
                $("#ficoment14").val(valuee.comentario); 
                $("#ficoment14").attr('readonly','readonly'); 
                break;

                case "84":
                 $("#ficoment15-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment15-a").css('color','#497445');
                $("#ficoment15").val(valuee.comentario); 
                $("#ficoment15").attr('readonly','readonly'); 
                break;

                case "94":
                 $("#ficoment15-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment15-a").css('color','#497445');
                $("#ficoment15").val(valuee.comentario); 
                $("#ficoment15").attr('readonly','readonly'); 
                break;

                case "120":
                $("#ficoment16-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment16-a").css('color','#497445');
                $("#ficoment16").val(valuee.comentario); 
                $("#ficoment16").attr('readonly','readonly'); 
                break;


              }





             }

           });

           }else if (tip_p == "2") { //Moral


            /*

                  ficoment18     //14 formato del avaluo firmado
                  ficoment19    //10 avaluos.val
                  ficoment20   //11 Construcciones .val
                  
                  ficoment21m  //90 Acta constitutiva
                  ficoment22m  //89 Nombramiento del representante legal
                  ficoment23   //98 y 88 Boleta predial
                  ficoment24   //83 y 78 Doc que acredita la propiedad
                  ficoment25   //97 y 87 identificacion oficial
                  ficoment26    //96medidas y colindancias
                  ficoment27   //95 y 85Localizacion
                  ficoment30  //82 y 77 Croquis de construccion
                  ficoment31  //81 y 76 uso privativo
                  ficoment32  //80 y 75 superficies constructivas
                  ficoment33  //79 y 74 Planos de factores
                  ficoment29   //15 Indivisos de condominios
                  ficoment28   // 94 y 84 Otros
                  ficoment34    //120 Imagen de fachada



            */

                   $(h).each(function(key,valuee){
        
             $('#etapa').val(valuee.etapa);

             if( valuee.etapa == "15" ){  //validado

                switch (valuee.orden) {


                case "14":
                $("#ficoment18-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment18-a").css('color','#497445');
                $("#ficoment18").val(valuee.comentario); 
                $("#ficoment18").attr('readonly','readonly'); 
                break;

                case "10":
                $("#ficoment19-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment19-a").css('color','#497445');
                $("#ficoment19").val(valuee.comentario); 
                $("#ficoment19").attr('readonly','readonly'); 
                break;

                case "11":
                $("#ficoment20-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment20-a").css('color','#497445');
                $("#ficoment20").val(valuee.comentario); 
                $("#ficoment20").attr('readonly','readonly'); 
                break;

                case "96":
                $("#ficoment26-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment26-a").css('color','#497445');
                $("#ficoment26").val(valuee.comentario); 
                $("#ficoment26").attr('readonly','readonly'); 
                break;

                case "90":
                $("#ficoment21m-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment21m-a").css('color','#497445');
                $("#ficoment21m").val(valuee.comentario); 
                $("#ficoment21m").attr('readonly','readonly'); 
                break;

                case "89":
                $("#ficoment22m-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment22m-a").css('color','#497445');
                $("#ficoment22m").val(valuee.comentario); 
                $("#ficoment22m").attr('readonly','readonly'); 
                break;

                case "88":
                $("#ficoment23-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment23-a").css('color','#497445');
                $("#ficoment23").val(valuee.comentario); 
                $("#ficoment23").attr('readonly','readonly'); 
                break;

                case "98":
                $("#ficoment23-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment23-a").css('color','#497445');
                $("#ficoment23").val(valuee.comentario); 
                $("#ficoment23").attr('readonly','readonly'); 
                break;

                 case "99":
                $("#ficoment4fc-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment4fc-a").css('color','#497445');
                $("#ficoment4fc").val(valuee.comentario); 
                $("#ficoment4fc").attr('readonly','readonly'); 
                break;

                case "78":
                $("#ficoment24-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment24-a").css('color','#497445');
                $("#ficoment24").val(valuee.comentario); 
                $("#ficoment24").attr('readonly','readonly'); 
                break;

                case "83":
                $("#ficoment24-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment24-a").css('color','#497445');
                $("#ficoment24").val(valuee.comentario); 
                $("#ficoment24").attr('readonly','readonly'); 
                break;

                case "87":
                $("#ficoment25-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment25-a").css('color','#497445');
                $("#ficoment25").val(valuee.comentario); 
                $("#ficoment25").attr('readonly','readonly'); 
                break;

                case "97":
                $("#ficoment25-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment25-a").css('color','#497445');
                $("#ficoment25").val(valuee.comentario); 
                $("#ficoment25").attr('readonly','readonly'); 
                break;

                case "85":
                $("#ficoment27-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment27-a").css('color','#497445');
                $("#ficoment27").val(valuee.comentario); 
                $("#ficoment27").attr('readonly','readonly'); 
                break;

                case "95":
                $("#ficoment27-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment27-a").css('color','#497445');
                $("#ficoment27").val(valuee.comentario); 
                $("#ficoment27").attr('readonly','readonly'); 
                break;

                case "77":
                $("#ficoment30-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment30-a").css('color','#497445');
                $("#ficoment30").val(valuee.comentario); 
                $("#ficoment30").attr('readonly','readonly'); 
                break;

                case "82":
                $("#ficoment30-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment30-a").css('color','#497445');
                $("#ficoment30").val(valuee.comentario); 
                $("#ficoment30").attr('readonly','readonly'); 
                break;

                case "76":
                $("#ficoment31-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment31-a").css('color','#497445');
                $("#ficoment31").val(valuee.comentario); 
                $("#ficoment31").attr('readonly','readonly'); 
                break;

                case "81":
                $("#ficoment31-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment31-a").css('color','#497445');
                $("#ficoment31").val(valuee.comentario); 
                $("#ficoment31").attr('readonly','readonly'); 
                break;

                case "75":
                $("#ficoment32-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment32-a").css('color','#497445');
                $("#ficoment32").val(valuee.comentario); 
                $("#ficoment32").attr('readonly','readonly'); 
                break;

                case "80":
                $("#ficoment32-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment32-a").css('color','#497445');
                $("#ficoment32").val(valuee.comentario); 
                $("#ficoment32").attr('readonly','readonly'); 
                break;

                case "74":
                $("#ficoment33-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment33-a").css('color','#497445');
                $("#ficoment33").val(valuee.comentario); 
                $("#ficoment33").attr('readonly','readonly'); 
                break;

                case "79":
                $("#ficoment33-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment33-a").css('color','#497445');
                $("#ficoment33").val(valuee.comentario); 
                $("#ficoment33").attr('readonly','readonly'); 
                break;

                case "15":
                $("#ficoment29-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment29-a").css('color','#497445');
                $("#ficoment29").val(valuee.comentario); 
                $("#ficoment29").attr('readonly','readonly'); 
                break;

                case "84":
                $("#ficoment28-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment28-a").css('color','#497445');
                $("#ficoment28").val(valuee.comentario); 
                $("#ficoment28").attr('readonly','readonly'); 
                break;

                case "94":
                $("#ficoment28-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment28-a").css('color','#497445');
                $("#ficoment28").val(valuee.comentario); 
                $("#ficoment28").attr('readonly','readonly'); 
                break;

                case "120":
                $("#ficoment34-a").html('<i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>');
                $("#ficoment34-a").css('color','#497445');
                $("#ficoment34").val(valuee.comentario); 
                $("#ficoment34").attr('readonly','readonly'); 
                break;



                }

              }

            });













           }












       });

    }

    });


}