<?php
//Reanudamos la sesión
@session_start();
//Validamos si existe realmente una sesión activa o no
if($_SESSION["autenticadictamc"] != "AVG_contrib1")
{
	//Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
	header("Location: ../../Inicio");
	exit();
}

// ESTO SIRVE PARA DESENCRIPTAR PERO POR EL MOMENTO NO SE UTILIZA
//include '../web/validate.php';
//    $b = $_GET['link'];  $res = ControllerValidateAVG::validate_avg($b); if($res=="1.00"){ header('Location: http://localhost/dictamun/Inicio'); die(); }else{ }



/*

define('METHOD','AES-256-CBC');
define('SECRET_KEY','$DICTAMUN@2020');
define('SECRET_IV','121212');
class ControllerValidateAVG {
	
	public static function validate_avg($string){
		$key=hash('sha256', SECRET_KEY);
		$iv=substr(hash('sha256', SECRET_IV), 0, 16);
		$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
		$output;		
		//consulta de validacion de actividad y rastreo ip
		include '../bd/conex.php';
		$c = $coxx;
		// Realizando una consulta SQL
		$query = "select  id_usuario,nombre_usuario,tipo_usuario,activo,id_datos  from usuario_v2 where id_usuario = $output ;";
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs = pg_query( $c, $query );
		while( $obj = pg_fetch_object($rs) ){						
			$data[] = $obj;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result);
		
		if( $data[0]->activo == "f" ){
			return "1.00";
		}else{
			return  "10.00";
		}
		
		
		

	}
}
*/
?>