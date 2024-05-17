<?php
session_start();
   // $num_id = $_SESSION["idkey1"];
echo "pruebas de login";
    if(  isset($_SESSION["idkey1"]) == false ){
        echo "<br>cerrado destroy";
            // Cerrando la conexion
    //pg_close($c);
    //Literalmente la destruimos
    //session_destroy();
    $_SESSION=array();
    session_regenerate_id();
    session_destroy();
    //Redireccionamos a Inicio (al inicio de sesión)
    echo "../../Inicio";

        }else{
            echo "<br>cerrado normal";
     //           $query = "UPDATE usuario_v2 SET activo = 'FALSE' WHERE id_usuario = $num_id ";
   // pg_query($c, $query);
    // Cerrando la conexion
    //pg_close($c);
    //Literalmente la destruimos
    //session_destroy();
    $_SESSION=array();
    session_regenerate_id();
    session_destroy();
    //Redireccionamos a Inicio (al inicio de sesión)
    echo "../../Inicio";


        }

        die();
/*
//datos a vistade segDictamen-para inmuebles
    var clavC = $("#cc").val();
    console.log(clavC);
	var fol = $("#idInmu").val();
	var fol2 = $("#idCompl").val(); 
	  $.post("../../acceso",{acceess:44,clavC:clavC, fol:fol},
    	function(z){       
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
*/
      ?>