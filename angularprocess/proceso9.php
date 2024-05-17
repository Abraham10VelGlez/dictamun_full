<?php

//echo "hola";
session_start();
 $id_dictaminadorr=$_SESSION["idkey2"];

 $nombre = isset($_POST['nombre']) ? $_POST['nombre']:"";
 $c_muni = isset($_POST['c_muni']) ? $_POST['c_muni']:"";
 $c_zona = isset($_POST['c_zona']) ? $_POST['c_zona']:"";
 $c_manz = isset($_POST['c_manz']) ? $_POST['c_manz']:"";
 $c_lote = isset($_POST['c_lote']) ? $_POST['c_lote']:"";
 $c_edif = isset($_POST['c_edif']) ? $_POST['c_edif']:"";
 $c_dept = isset($_POST['c_dept']) ? $_POST['c_dept']:"";
 $scrp = isset($_POST['scrp']) ? $_POST['scrp']:"";
 $calleAv = isset($_POST['calleAv']) ? $_POST['calleAv']:"";
 $col = isset($_POST['col']) ? $_POST['col']:"";
 $numEx = isset($_POST['numEx']) ? $_POST['numEx']:"";
 $numIn = isset($_POST['numIn']) ? $_POST['numIn']:"";
 $cp = isset($_POST['cp']) ? $_POST['cp']:"";
 $muni = isset($_POST['muni']) ? $_POST['muni']:"";
 $cpp = isset($_POST['cpp']) ? $_POST['cpp']:"";
 $munic = isset($_POST['munic']) ? $_POST['munic']:"";
 $refvia = isset($_POST['refvia']) ? $_POST['refvia']:"";
 $impuesto = isset($_POST['impuesto']) ? $_POST['impuesto']:"";
 $madific = isset($_POST['madific']) ? $_POST['madific']:"";
 $variable_clvs = isset($_POST['variable_clvs']) ? $_POST['variable_clvs']:"";
 $fm = isset($_POST['fm']) ? $_POST['fm']:"";
 $no18 = isset($_POST['no18']) ? $_POST['no18']:"";
 $ann = isset($_POST['ann']) ? $_POST['ann']:"";



//print_r($obj);
//echo $nombreDenRaz;
include '../bd/conex.php';
include '../controller/ControllerPath2.php';
$obj1= new Controllermaster2();


//$noReg = isset($_POST['no18']) ? $_POST['no18']:"";
$fisicMoral=$fm;
$anio = $ann;
$noReg2=$no18;

if ($fisicMoral == 1) {
	//persona Fisica

		//datos del inmueble
	$muni = $c_muni;
	$zona = $c_zona;

	$manzana = $c_manz;
	$lote = $c_lote;
	$edificio = $c_edif;
	$depto = $c_dept;
	$scr = $scrp;

	$calle = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $calleAv );
	$col = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $col );
	$numE = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $numEx );
	$numI = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $numIn );
	$cp =   $cpp ;
	$municipio = $munic ;
	$referencia = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $refvia );
	$pagoImpuesto = $impuesto;
	$modificacion = $madific;

	$variable_clvs =$variable_clvs;


		//reparacion de la funcion 04 junio 2021 AABRAHAM VG
		//reparacion de la funcion 04 junio 2021 AABRAHAM VG

		$sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
		$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs = pg_query( $coxx, $sql );
		$folio="";
		$validate_exixts = pg_num_rows($rs);
		if( $validate_exixts == "1" ){
			while( $obj = pg_fetch_object($rs) ){
				$data[] = $obj;
			}

			$nom = $data[0]->ultimo;
			//echo "este folio de contribuyentedatos_v2: ".$nom;

			if(empty($nom)){
				$folio = $nom+1;
				//echo "este folio es vacio ".$folio;
			}else{
				//echo "validamos el segundo folio:";
				//validamos si existe algun folio temp ocupando el folio
	$sqlvali="select max(id_aviso) as aa from aviso_dictamen_v2tmp where id_dictaminador =".$id_dictaminadorr;
				$resultt = pg_query( $coxx, $sqlvali );
				$validate_exi = pg_num_rows($resultt);
		      if( $validate_exi == "1" ){
		      	//echo "si existe el folio anterior agrega uno nuevo: ";
			while( $objxx = pg_fetch_object($resultt) ){
				//print_r($objxx);
				$dataavg[] = $objxx;

			}
			$nomxx = $dataavg[0]->aa;

			if(empty($nomxx)){
				$folio="";
				$folio = $nom+1;
				//echo "es vacio entonces muestra el nuevo folio: ";

			}else{
				$folio="";
				$folio = $nomxx;
				//echo "este folio es el nuevo:",$folio;
			}
			//print_r($dataavg[0]->aa);
			//$nomx = $dataavg[0]->aa;
			//$folio = $nomx;

		}else{
			//echo "no existe el folio";
			// si es nuevo entonces aplica esto
				$folio = $nom+1;
				//$id_dom= $nom+1;

		}
			}

		}else{
			// en caso de un reinicio de baase de datos el folio inicia en 1 folio 00001
			$folio = 1;
		}

		//echo $folio;die();
		$fecha = date("Y-m-d H:i:s");
		//$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
		$muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
		$zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
		$manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
		$lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
		$edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
		$depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

		$claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;
		$id_in=$folio;
		//$id_in2= $id_in.$muni2;
		$id_in2= $id_dictaminadorr.$id_in;


    // SIMPLIFICACION DE LA VALOR CATASTRAL

     $valcatastral_studioa = str_replace(',','',$scr);


		$sql2="INSERT INTO inmuebles_v2tmp(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar, folio,manifest_claves,fk_numreg)
		VALUES ($id_in, '$claveC',$valcatastral_studioa, $id_in2, $folio, '$pagoImpuesto', '$modificacion', $folio, $anio, $folio,$variable_clvs,$id_dictaminadorr);";
		pg_query($coxx, $sql2);

		$sql3 = "INSERT INTO domicilio_v2tmp(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado,fk_numreg)
		VALUES ($id_in2, '$calle', '$numE', '$numI', '$col', '$municipio', '$referencia', null, '$cp',null,$id_dictaminadorr );";
		pg_query($coxx, $sql3);


		$sql1="INSERT INTO estatusxfoliotmp(folio_dictamen, id_dictaminador, etapa, fecha, cclave,fk_numreg)
		VALUES ($id_in, $noReg2, 1, now(), '$claveC',$id_dictaminadorr);";
		pg_query($coxx, $sql1);


		//noReg=dictaminador

		// Cerrando la conexion
		// pg_close($coxx);
		//echo "ok";
		//****************************************************reparacion de la funcion 04 junio 2021 AABRAHAM VG
		//reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//****************************************************reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//echo $obj1->guardarAvisoDictamen($id_dictaminadorr,$coxx,$muni,$zona,$manzana,$lote,$edificio,$depto);


			$muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
			$zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
			$manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
			$lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
			$edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
			$depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

			$claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;

			$sql4 = "INSERT INTO aviso_dictamen_v2tmp(id_aviso, id_dictaminador, cve_cat,fk_numreg) VALUES ($id_in, $id_dictaminadorr, '$claveC',$id_dictaminadorr);";
			pg_query($coxx, $sql4);

			//****************************************************reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//reparacion de la funcion 04 junio 2021 AABRAHAM VG
	echo "100";
}else if ($fisicMoral == 2) {
	//Persona moral

		//datos del inmueble
	$muni = $c_muni;
	$zona = $c_zona;

	$manzana = $c_manz;
	$lote = $c_lote;
	$edificio = $c_edif;
	$depto = $c_dept;
	$scr = $scrp;

	$calle = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $calleAv ) ;
	$col =  preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $col ) ;
	$numE =  preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $numEx ) ;
	$numI = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $numIn ) ;
	$cp = $cpp ;
	$municipio = $munic;
	$referencia = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $refvia ) ;
	$pagoImpuesto = $impuesto;
	$modificacion = $madific;
	$variable_clvs =$variable_clvs;

		$sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
		$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs = pg_query( $coxx, $sql );
		$folio="";
		$validate_exixts = pg_num_rows($rs);
		if( $validate_exixts == "1" ){
			while( $obj = pg_fetch_object($rs) ){
				$data[] = $obj;
			}
			$nom = $data[0]->ultimo;
			//echo "este folio de contribuyentedatos_v2: ".$nom;

			if(empty($nom)){
				$folio = $nom+1;
				//echo "este folio es vacio ".$folio;
			}else{
				//echo "validamos el segundo folio:";
				//validamos si existe algun folio temp ocupando el folio
	$sqlvali="select max(id_aviso) as aa from aviso_dictamen_v2tmp where id_dictaminador =".$id_dictaminadorr;
				$resultt = pg_query( $coxx, $sqlvali );
				$validate_exi = pg_num_rows($resultt);
		      if( $validate_exi == "1" ){
		      	//echo "si existe el folio anterior agrega uno nuevo: ";
			while( $objxx = pg_fetch_object($resultt) ){
				//print_r($objxx);
				$dataavg[] = $objxx;

			}
			$nomxx = $dataavg[0]->aa;

			if(empty($nomxx)){
				$folio="";
				$folio = $nom+1;
				//echo "es vacio entonces muestra el nuevo folio: ";

			}else{
				$folio="";
				$folio = $nomxx;
				//echo "este folio es el nuevo:",$folio;
			}
		}else{
			//echo "no existe el folio";
			// si es nuevo entonces aplica esto
				$folio = $nom+1;
				//$id_dom= $nom+1;
		}
			}

		}else{
			// en caso de un reinicio de baase de datos el folio inicia en 1 folio 00001
			$folio = 1;
		}

		//echo $folio;
		$fecha = date("Y-m-d H:i:s");
		//$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
		$muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
		$zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
		$manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
		$lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
		$edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
		$depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

		$claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;
		$id_in=$folio;

		//$id_in2= $id_in.$muni2;
		$id_in2= $id_dictaminadorr.$id_in;

    $valcatastral_studioa = str_replace(',','',$scr);

		$sql2="INSERT INTO inmuebles_v2tmp(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar, folio,manifest_claves,fk_numreg)
		VALUES ($id_in, '$claveC', $valcatastral_studioa, $id_in2, $folio, '$pagoImpuesto', '$modificacion', $folio, $anio, $folio,$variable_clvs,$id_dictaminadorr);";
		pg_query($coxx, $sql2);

		$sql3 = "INSERT INTO domicilio_v2tmp(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado,fk_numreg)
		VALUES ($id_in2, '$calle', '$numE', '$numI', '$col', '$municipio', '$referencia', null, '$cp',null,$id_dictaminadorr );";
		pg_query($coxx, $sql3);

		$sql1="INSERT INTO estatusxfoliotmp(folio_dictamen, id_dictaminador, etapa, fecha, cclave,fk_numreg)
		VALUES ($id_in, $noReg2, 1, now(), '$claveC', $id_dictaminadorr);";
		pg_query($coxx, $sql1);
		//noReg=dictaminador


			$muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
			$zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
			$manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
			$lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
			$edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
			$depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

			$claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;

			$sql4 = "INSERT INTO aviso_dictamen_v2tmp(id_aviso, id_dictaminador, cve_cat,fk_numreg) VALUES ($id_in, $id_dictaminadorr, '$claveC', $id_dictaminadorr);";
			pg_query($coxx, $sql4);

echo "100";
}


?>
