<?php
//Reanudamos la sesi�n
@session_start();
include 'const.php'; 
//const SERVERURL = "http://localhost/dictamun/";

//Validamos si existe realmente una sesi�n activa o no
//var_dump(isset($_SESSION["autenticadictamc"]));
//die();
$contribuyente = isset($_SESSION["autenticadictamc"]) ? $_SESSION["autenticadictamc"]: '';
$especilista = isset($_SESSION["autenticaESPECIALIST"]) ? $_SESSION["autenticaESPECIALIST"]: '';
$revisor = isset($_SESSION["autenticaREVISITION"]) ? $_SESSION["autenticaREVISITION"]: '';

$admin = isset($_SESSION["autenticaAVG"]) ? $_SESSION["autenticaAVG"]: '';
$adminjr = isset($_SESSION["autenticajrADMIN"]) ? $_SESSION["autenticajrADMIN"]: '';


$municipio = isset($_SESSION["autenticamun"]) ? $_SESSION["autenticamun"]: '';

$aDGFIS = isset($_SESSION["autenticaDGFIS"]) ? $_SESSION["autenticaDGFIS"]: '';
$aDGR = isset($_SESSION["autenticaDGR"]) ? $_SESSION["autenticaDGR"]: '';


// || $especilista != "AVG_dictaminator2" || $especilista === undefined 
if( $contribuyente == "AVG_contrib1")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location:".$url."AEDTMN/DatosContribuyente/");
	exit();
}
if( $especilista== "AVG_dictaminator2")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTMN/SeguimientoDictamen/100");
	exit();
}
if( $revisor == "AVG_revigecem3")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTMN/SeguimientoRevisor/100");
	exit();
}
if( $admin == "AVGADMIN")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTMN/AdminGris/");
	exit();
}

if( $adminjr == "AVG_JRADMIN4")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTMN/BusquedaAdmin/");
	exit();
}

if( $municipio == "AVG_MUN6")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTMN/InicioM/");
	exit();
}
if( $aDGFIS == "AVG_DGF8")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTDGF/InicioDGF/");
	exit();
}
if( $aDGR== "AVG_DGR7")

{
	//Si no hay sesi�n activa, lo direccionamos al index.php (inicio de sesi�n)
	//header("Location: ");
	//exit();
	header("Location: ".$url."AEDTDGR/InicioDGR/");
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