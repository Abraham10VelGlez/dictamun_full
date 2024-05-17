<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["uploadedFile"]["type"])){
	$carpeta_x_folio = $_POST["Kap"];
	$tipo_file = $_POST["opcs"];
	$carpeta_x_inmueble = $_POST["cv"];
	$target_dir = "files/documentos/";
	
	$length = 5;
	$foliodecarpeta = str_pad($carpeta_x_folio,$length,"0", STR_PAD_LEFT);
	
	$carpeta=$target_dir.$foliodecarpeta."/".$carpeta_x_inmueble."/";
	if (!file_exists($carpeta)) {
		mkdir($carpeta, 0777, true);
	}
	$nomArchivo=$_FILES["uploadedFile"]["name"];
	$nomArchivo2= str_replace("_","",$nomArchivo);
	
	
	/* validacion de caracteres especiales */
	$originales = 'Ã€Ã�Ã‚ÃƒÃ„Ã…Ã†Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃ�ÃŽÃ�Ã�Ã‘Ã’Ã“Ã”Ã•Ã–Ã˜Ã™ÃšÃ›ÃœÃ�Ãž
ÃŸÃ Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã¸Ã¹ÃºÃ»Ã½Ã½Ã¾Ã¿Å”Å•';/* validacion de caracteres especiales */
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';/* validacion de caracteres especiales */
	$cadena = utf8_decode($nomArchivo);/* validacion de caracteres especiales */
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);/* validacion de caracteres especiales */
	$cadena = strtolower($cadena);/* validacion de caracteres especiales */
	$namefinal=  utf8_encode($cadena);/* validacion de caracteres especiales */
	/* validacion de caracteres especiales */
	
	/*
	 * CREACION DE LA CARPETA X ARCHIVO. DE ACUERDO A SU FOLIO
	 $carpeta_x_folio = $_POST["Kap"];
	 $target_dir = "val/";
	 $carpeta=$target_dir.$carpeta_x_folio."/";
	 *
	 * */
	$target_file = $carpeta . basename($nomArchivo2);
	$target_file2 =  basename($nomArchivo2);
	
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if file already exists
	//if (file_exists($target_file)) {
		// si existe el archivo entonces
		
		// VERIFICACION DE TIPO DE ARCHIVO A SUBIR .pptx , .jpg , .png , .pdf
		$opc = $imageFileType;
		
		session_start(); 
		
		$num_id = 340; // $_SESSION["idkey2"];
		
		include_once 'bd/conex.php';
		
	//}else{
		//si no exitiste y es nuevo el archivo
		// Check file size
	//	if ($_FILES["uploadedFile"]["size"] > 10024288) {
			//         $errors[]= "Lo sentimos, el archivo es demasiado grande.  TamaÃ±o mÃ¡ximo admitido: 1.0 MB";
		//	$uploadOk = 0;
	//	}else{
			// VERIFICACION DE TIPO DE ARCHIVO A SUBIR
			$opc = $imageFileType;
			
			
			switch ($opc){
				////////////////////////////////////////////////////////////////////////**************************************************************************************////////////////////////*//
				case "dwg":
					if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
						$messages[]= "El Archivo ha sido subido correctamente.";
						switch ($tipo_file) {
							case 1:
								rename ($target_file, $carpeta.$namefinal);
								
								$ane = 33;
								
								$y = (int) $carpeta_x_folio;
								$c = $coxx;
								$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$namefinal', $ane , $y, $num_id,'$carpeta_x_inmueble');";
								pg_query($c, $sqls);
								pg_close($c);
								
								break;
								
							default:
								$errors[]= "Lo sentimos, hubo un error al resubir el archivo.";$ane = 100;
								break;
						}
						
					} else {
						$errors[]= "Lo sentimos, hubo un error subiendo el archivo.";$ane = 100;
					}
					break;
					////////////////////////////////////////////////////////////////////////**************************************************************************************////////////////////////*//
				case "zip":
					if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
						$messages[]= "El Archivo ha sido subido correctamente.";
						switch ($tipo_file) {
							case 1:
								rename ($target_file, $carpeta.$namefinal);
								$ane = 32;
								
								$y = (int) $carpeta_x_folio;
								$c = $coxx;
								$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$namefinal', $ane , $y, $num_id,'$carpeta_x_inmueble');";
								pg_query($c, $sqls);
								pg_close($c);
								
								break;
								
							default:
								$errors[]= "Lo sentimos, hubo un error al resubir el archivo.";$ane = 100;
								break;
						}
						
					} else {
						$errors[]= "Lo sentimos, hubo un error subiendo el archivo.";$ane = 100;
					}
					break;
				case "rar":
					if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
						$messages[]= "El Archivo ha sido subido correctamente.";
						switch ($tipo_file) {
							case 1:
								rename ($target_file, $carpeta.$namefinal);
								$ane = 32;
								
								$y = (int) $carpeta_x_folio;
								$c = $coxx;
								$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$namefinal', $ane , $y, $num_id,'$carpeta_x_inmueble');";
								pg_query($c, $sqls);
								pg_close($c);
								
								break;
								
							default:
								$errors[]= "Lo sentimos, hubo un error al resubir el archivo.";$ane = 100;
								break;
						}
						
					} else {
						$errors[]= "Lo sentimos, hubo un error subiendo el archivo.";$ane = 100;
					}
					break;
				case "pptx":
					if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
						$messages[]= "El Archivo ha sido subido correctamente.";
						switch ($tipo_file) {
							case 1:
								//rename ($target_file, $carpeta."ReporteFotografico.pptx");
								rename ($target_file, $carpeta.$namefinal);
								$ane = 12;
								
								$y = (int) $carpeta_x_folio;
								$c = $coxx;
								$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$namefinal', $ane , $y, $num_id,'$carpeta_x_inmueble');";
								pg_query($c, $sqls);
								pg_close($c);
								
								break;
								
							default:
								$errors[]= "Lo sentimos, hubo un error al resubir el archivo.";$ane = 100;
								break;
						}
						
					} else {
						$errors[]= "Lo sentimos, hubo un error subiendo el archivo.";$ane = 100;
					}
					break;
				case "ppt":
					if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
						$messages[]= "El Archivo ha sido subido correctamente.";
						switch ($tipo_file) {
							case 1:
								//rename ($target_file, $carpeta."ReporteFotografico.pptx");
								rename ($target_file, $carpeta.$namefinal);
								$ane = 12;
								
								$y = (int) $carpeta_x_folio;
								$c = $coxx;
								$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$namefinal', $ane , $y, $num_id,'$carpeta_x_inmueble');";
								pg_query($c, $sqls);
								pg_close($c);
								break;
								
							default:
								$errors[]= "Lo sentimos, hubo un error al resubir el archivo.";$ane = 100;
								break;
						}
						
					} else {
						$errors[]= "Lo sentimos, hubo un error subiendo el archivo.";$ane = 100;
					}
					break;
					
					
				default:
					$errors[]= "Lo sentimos, el tipo de archivo no permitido";$ane = 100;
					$uploadOk = 0;
					break;
			}
			
			
			
			
		//}
		$uploadOk = 0;
		
	//}
	
	if (isset($errors)){
		?>
	 
	  <?php
	  foreach ($errors as $error){
		  echo"<p>$error</p>";
	  }
	  ?>
	
	<?php
}

if (isset($messages)){
	?>
	 
	  <?php
		 
	  foreach ($messages as $message){
		  echo"<p>$message</p>";
	  }
	  ?>
	
	<?php 
}
}
?> 
