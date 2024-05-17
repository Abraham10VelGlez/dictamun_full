<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
$id_dictaminadorr=$_SESSION["idkey2"];
$json = file_get_contents('php://input');
$obj = json_decode($json);
//print_r($obj);
//die();
//echo $obj->nombreDenRaz;
include '../bd/conex.php';
		include '../controller/ControllerPath2.php';
		$obj1= new Controllermaster2();
		//$noReg = isset($_POST['no18']) ? $_POST['no18']:"";
		$fisicMoral=$obj->inmbl1s->fm;


		$noReg2=$noRegDictamen =$obj->inmbl1s->selcdic;

		if ($fisicMoral == 1) {
			/*
			// poner las letras en mayuscula la primera y despues del espacio otra vez en amyusculas

			ucwords(strtolower($x3));

			// todas  las letra sean mayusculas

			$xx4 = strtoupper($x4);

$bar = 'HELLO WORLD!';
$bar = ucfirst($bar);             // HELLO WORLD!
$bar = ucfirst(strtolower($bar)); // Hello world!

			 ucfirst(strtolower($bar));
			*/


			//persona Física noReg
		//$noRegDictamen = $obj->inmbl1s->nog;
		$noRegDictamen =$obj->inmbl1s->selcdic;
		$nombre = $obj->inmbl1s->nombreDenRaz;
		$apPaterno = $obj->inmbl1s->apPaterno;
		$apMaterno = $obj->inmbl1s->apMaterno;
		$rfc = $obj->inmbl1s->rfc;
		$curp = $obj->inmbl1s->curp;
		$telefono = $obj->inmbl1s->telefono;
		$email = $obj->inmbl1s->correoE;

		//Representante
		/*
		$representante = ucfirst($obj->inmbl1s->nombreRep);
		$apPaRep = ucfirst($obj->inmbl1s->apPaRep);
		$apMaRep = ucfirst($obj->inmbl1s->apMaRep);
		$rfcR = strtoupper($obj->inmbl1s->rfcR);
		$curpR = strtoupper($obj->inmbl1s->curpR);	*/

		$representante = $obj->inmbl1s->nombreRep;
		$apPaRep = $obj->inmbl1s->apPaRep;
		$apMaRep = $obj->inmbl1s->apMaRep;
		$rfcR = $obj->inmbl1s->rfcR;
		$curpR = $obj->inmbl1s->curpR;

		//$folioDictaminador = $obj->inmbl1s->dictaminadorF;
		$anio = $obj->inmbl1s->anio;
		$gender = $obj->inmbl1s->gender;

		$con = $coxx;
		 //$folioReporte = $obj1->guardarContribuyente($coxx,$noRegDictamen,$nombre,$apPaterno,$apMaterno,$rfc,$curp,$telefono, $email,$representante,$apPaRep,$apMaRep,$rfcR,$curpR,$anio,$gender,$fisicMoral);

		$sql="SELECT max(id_con) as ultimo FROM contribuyentedatos_v2;";
		$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs = pg_query( $con, $sql );

		$validate_exixts = pg_num_rows($rs);
		if( $validate_exixts == "1" ){
			while( $obj = pg_fetch_object($rs) ){
				$data[] = $obj;
			}

			$nom = $data[0]->ultimo;

			if(empty($nom)){
				$folio = $nom + 1;
			}else{
				$folio = $nom + 1;
			}

		}

		//echo $folio;
		$fecha = date("Y-m-d H:i:s");
		/* $folio = explode("/",$fol);
		 $fo = $folio[1]; */
		// $claveC=$muni.$zona.$manzana.$lote.$edificio.$depto;
		/* $valorcastral1 = explode("$",$valor);
		 $valorcastral2 = $valorcastral1[1];
		 $valorcastral3 = str_replace(",","",$valorcastral2);    */

		$sql ="INSERT INTO contribuyentedatos_v2(id_dictaminador, nombredenominacion, apaterno, amaterno, rfc, curp, telefono, email, serviciodesc, nombrerep, apaternorep,
		amaternorep, rfcrep, curprep, aniodictamen, id_inmueble,
		fecha_registro,tipodictamen,folio,tipod)
		VALUES ($noRegDictamen,'$nombre','$apPaterno','$apMaterno','$rfc','$curp',$telefono,'$email',null,'$representante','$apPaRep','$apMaRep','$rfcR','$curpR',$anio,$folio,'$fecha',$gender,$folio,$fisicMoral);";

		pg_query($con, $sql);









		 $sqlazx=" select *,trim( cast(folio as text) || tabla3.id )  num_num_consecutivostudioa from
    (select * from aviso_dictamen_v2tmp where id_dictaminador = $id_dictaminadorr ) as tabla1
    join
    (select * from estatusxfoliotmp) as tabla2
    on
    tabla1.cve_cat = tabla2.cclave

    join
    (select *,CAST ( ($id_dictaminadorr || '' || id  )  AS INTEGER) as rel from inmuebles_v2tmp) as tabla3
    on
    tabla1.cve_cat  = tabla3.cve_catastral


    join
    (select *,CAST ( ($id_dictaminadorr || '' || id  )  AS INTEGER) as re2 from domicilio_v2tmp) as tabla4
    on
    tabla3.rel = tabla4.re2
    where
    tabla1.id_dictaminador = $id_dictaminadorr";

		 $result = pg_query($sqlazx) or die('La consulta fallo: ' . pg_last_error());
		 // Imprimiendo los resultados aarray
		 $rsss = pg_query( $con, $sqlazx);

		 $validate_exixtsa = pg_num_rows($rsss);
		 if( $validate_exixtsa >= "1" ){
			 $studioaincrementado = 0;
		 	while( $objext = pg_fetch_object($rsss) ){
		 		$clavecat = $objext->cve_cat;


				$consecutivoid_tabla_a_seguir = "SELECT max(id_domicilio)+1 as ultimoidomicilio FROM inmuebles_v2; ";

				$result = pg_query($consecutivoid_tabla_a_seguir) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$resultantnte_data_max_num_iddomicilio = pg_query( $con, $consecutivoid_tabla_a_seguir );

				//$data_studioa[];
					while( $object_id_domicilio = pg_fetch_object($resultantnte_data_max_num_iddomicilio) ){
						$data_studioa[] = $object_id_domicilio;
					}
					$resultanteiddomicilio = $data_studioa[0]->ultimoidomicilio;
					$numvalor = (int)$resultanteiddomicilio;
					$studioa = $numvalor + $studioaincrementado;






		 		$table1 = "INSERT INTO aviso_dictamen_v2(id_aviso, id_dictaminador,  cve_cat) VALUES (".$folio.", ".$id_dictaminadorr.", '".$objext->cve_cat."');";
		 		$table2 = "INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha,cclave)
                                             VALUES (".$folio.", ".$objext->id_dictaminador.", ".$objext->etapa.", '".$objext->fecha."', '".$objext->cve_cat."');";
		 		$table3 = "INSERT INTO inmuebles_v2( cve_catastral, valor_catastral, id_domicilio,id_aviso, id_clave, aniodictaminar,folio)
                                            VALUES ( '".$objext->cve_cat."', ".$objext->valor_catastral.", ".$studioa.",".$folio.", ".$folio.",".$objext->aniodictaminar." ,".$folio.");";
		 		$table4 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, referencia1,
                                                    referencia2,codigo_p, estado, id_municipio)
                                            VALUES ( ".$studioa.", '".ucfirst($objext->calle)."', '".ucfirst($objext->no_exterior)."', '".ucfirst($objext->no_interior)."','".ucfirst($objext->colonia)."', '".ucfirst($objext->referencia1)."',
                                                    '".ucfirst($objext->referencia2)."', ".$objext->codigo_p.", 15, '".$objext->id_municipio."');";


		 		pg_query($con,$table1);
		 		pg_query($con,$table2);
		 		pg_query($con,$table3);
		 		pg_query($con,$table4);
				$studioaincrementado++;


		 	}
		 	/*
		 	$clear_tmps = "truncate inmuebles_v2tmp restart identity;
            truncate domicilio_v2tmp restart identity;
            truncate estatusxfoliotmp restart identity;
            truncate aviso_dictamen_v2tmp restart identity;";
            */

            $clear_tmps = "delete from aviso_dictamen_v2tmp where fk_numreg = $id_dictaminadorr;
    delete from inmuebles_v2tmp where fk_numreg = $id_dictaminadorr;
    delete from domicilio_v2tmp where fk_numreg = $id_dictaminadorr;
    delete from estatusxfoliotmp where fk_numreg = $id_dictaminadorr;";





		 	pg_query($con,$clear_tmps);

		 	pg_close($con);

		 }else{
		 	echo"-0inmuebles";
		 	die();
		 }

		 echo trim($folio);
		 /*

		 $fecha = date("Y-m-d H:i:s");
		 //$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
		 $muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
		 $zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
		 $manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
		 $lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
		 $edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
		 $depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

		 $claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;
		 $id_in=$folio + $cont;
		 $id_in= $id_in.$cont;


		 $sql2="INSERT INTO inmuebles_v2(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar, folio,manifest_claves)
		 VALUES ($id_in, '$claveC', $scr, $id_in, $folio, '$pagoImpuesto', '$modificacion', $folio, $anio, $folio,$variable_clvs);";
		 pg_query($con, $sql2);

		 $sql3 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado)
		 VALUES ($id_in, '$calle', '$numE', '$numI', '$col', '$municipio', '$referencia', null, '$cp',null );";
		 pg_query($con, $sql3);


   		$sql1="INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha, cclave)
   		 VALUES ($folio, $noReg2, 1, now(), '$claveC');";
   		 pg_query($con, $sql1);
		 //noReg=dictaminador

		 // Cerrando la conexion
		 // pg_close($con);
		 //echo "ok";
		 //****************************************************reparacion de la funcion 04 junio 2021 AABRAHAM VG
		 //reparacion de la funcion 04 junio 2021 AABRAHAM VG

		if ($contador==1) {
			//****************************************************reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//echo $obj1->guardarAvisoDictamen($id_dictaminadorr,$coxx,$muni,$zona,$manzana,$lote,$edificio,$depto);
			//echo"guardar aviso de dictamen".$contador;
			$sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
			$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs = pg_query( $con, $sql );

			$validate_exixts = pg_num_rows($rs);
			if( $validate_exixts == "1" ){
				while( $obj = pg_fetch_object($rs) ){
					$data[] = $obj;
				}

				$nom = $data[0]->ultimo;

				if(empty($nom)){
					$folio = $nom;
					//$id_dom= $nom+1;
				}else{
					$folio = $nom;
					//$id_dom= $nom+1;
				}

			}

			$muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
			$zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
			$manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
			$lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
			$edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
			$depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

			$claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;

			$sql4 = "INSERT INTO aviso_dictamen_v2(id_aviso, id_dictaminador, cve_cat) VALUES ($folio, $id_dictaminadorr, '$claveC');";
			pg_query($con, $sql4);

			//****************************************************reparacion de la funcion 04 junio 2021 AABRAHAM VG
			//reparacion de la funcion 04 junio 2021 AABRAHAM VG
		}

		}*/
	//	echo "INMUBLES: ".$contador;

		 //echo $obj1->guardarContribuyente($coxx,$noRegDictamen,$nombre,$apPaterno,$apMaterno,$rfc,$curp,$telefono, $email,$representante,$apPaRep,$apMaRep,$rfcR,$curpR,$anio,$gender,$muni,$zona,$manzana,$lote,$edificio,$depto,$scr,$calle,$col,$numE,$numI,$cp,$municipio,$referencia,$fisicMoral);

		}else if ($fisicMoral == 2) {
			//Persona moral
		$noRegDictamen =$obj->inmbl1s->selcdic;
		//$noRegDictamen = $obj->inmbl1s->nog;
		$nombre = $obj->inmbl1s->nombreDenominacion;
		$rfcD = $obj->inmbl1s->rfcD;
		$descri = $obj->inmbl1s->descripacrt;
		$telefonoD = $obj->inmbl1s->telefonoD;
		$correoD = $obj->inmbl1s->correoD;
		//Representante
		/*$representante = ucfirst($obj->inmbl1s->nombreRep);
		$apPaRep = ucfirst($obj->inmbl1s->apPaRep);
		$apMaRep = ucfirst($obj->inmbl1s->apMaRep);
		$rfcR = strtoupper($obj->inmbl1s->rfcR);
		$curpR = strtoupper($obj->inmbl1s->curpR);*/



		$representante = $obj->inmbl1s->nombreRep;
		$apPaRep = $obj->inmbl1s->apPaRep;
		$apMaRep = $obj->inmbl1s->apMaRep;
		$rfcR = $obj->inmbl1s->rfcR;
		$curpR = $obj->inmbl1s->curpR;



		$anio = $obj->inmbl1s->anio;
		$gender = $obj->inmbl1s->gender;

		$con = $coxx;
		 //$folioReporte = $obj1->guardarDenominacionR($coxx,$noRegDictamen,$nombre,$rfcD,$descri,$telefonoD, $correoD,$representante,$apPaRep,$apMaRep,$rfcR,$curpR,$anio,$gender,$fisicMoral);
		$sql="SELECT max(id_con) as ultimo FROM contribuyentedatos_v2;";
		$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs = pg_query( $con, $sql );

		$validate_exixts = pg_num_rows($rs);
		if( $validate_exixts == "1" ){

			while( $obj = pg_fetch_object($rs) ){
				$data[] = $obj;
			}

			$nom = $data[0]->ultimo;

			if(empty($nom)){
				$folio = $nom + 1;
			}else{
				$folio = $nom + 1;
			}

		}
		//echo $folio;
		$fecha = date("Y-m-d H:i:s");
		// $claveC=$muni.$zona.$manzana.$lote.$edificio.$depto;

		$sql ="INSERT INTO contribuyentedatos_v2(id_dictaminador, nombredenominacion, apaterno, amaterno, rfc, curp, telefono, email, serviciodesc, nombrerep, apaternorep, amaternorep, rfcrep, curprep, aniodictamen, id_inmueble,
		fecha_registro, tipodictamen, folio, tipod)
		VALUES ($noRegDictamen,'$nombre',null, null,'$rfcD', null, $telefonoD,'$correoD','$descri','$representante','$apPaRep','$apMaRep','$rfcR','$curpR',$anio,$folio,'$fecha',$gender,$folio,$fisicMoral);";
		pg_query($con, $sql);




		//echo trim($folio);




			$sqlazx=" select *,trim( cast(folio as text) || tabla3.id )  num_num_consecutivostudioa from
			(select * from aviso_dictamen_v2tmp where id_dictaminador = $id_dictaminadorr ) as tabla1
			join
			(select * from estatusxfoliotmp) as tabla2
			on
			tabla1.cve_cat = tabla2.cclave

			join
			(select *,CAST ( ($id_dictaminadorr || '' || id  )  AS INTEGER) as rel from inmuebles_v2tmp) as tabla3
			on
			tabla1.cve_cat  = tabla3.cve_catastral


			join
			(select *,CAST ( ($id_dictaminadorr || '' || id  )  AS INTEGER) as re2 from domicilio_v2tmp) as tabla4
			on
			tabla3.rel = tabla4.re2
			where
			tabla1.id_dictaminador = $id_dictaminadorr";

			$result = pg_query($sqlazx) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rsss = pg_query( $con, $sqlazx);

			$validate_exixtsa = pg_num_rows($rsss);
			if( $validate_exixtsa >= "1" ){
				$studioaincrementado = 0;
				while( $objext = pg_fetch_object($rsss) ){
					$clavecat = $objext->cve_cat;

					$consecutivoid_tabla_a_seguir = "SELECT max(id_domicilio)+1 as ultimoidomicilio FROM inmuebles_v2; ";

					$result = pg_query($consecutivoid_tabla_a_seguir) or die('La consulta fallo: ' . pg_last_error());
					// Imprimiendo los resultados aarray
					$resultantnte_data_max_num_iddomicilio = pg_query( $con, $consecutivoid_tabla_a_seguir );

					//$data_studioa[];
						while( $object_id_domicilio = pg_fetch_object($resultantnte_data_max_num_iddomicilio) ){
							$data_studioa[] = $object_id_domicilio;
						}
						$resultanteiddomicilio = $data_studioa[0]->ultimoidomicilio;
						$numvalor = (int)$resultanteiddomicilio;
					  $studioa = $numvalor + $studioaincrementado;



					$table1 = "INSERT INTO aviso_dictamen_v2(id_aviso, id_dictaminador,  cve_cat) VALUES (".$folio.", ".$id_dictaminadorr.", '".$objext->cve_cat."');";
					$table2 = "INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha,cclave)
                                             VALUES (".$folio.", ".$objext->id_dictaminador.", ".$objext->etapa.", '".$objext->fecha."', '".$objext->cve_cat."');";
					$table3 = "INSERT INTO inmuebles_v2( cve_catastral, valor_catastral, id_domicilio,id_aviso, id_clave, aniodictaminar,folio)
                                            VALUES ( '".$objext->cve_cat."', ".$objext->valor_catastral.", ".$studioa.",".$folio.", ".$folio.",".$objext->aniodictaminar." ,".$folio.");";
					$table4 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, referencia1,
                                                    referencia2,codigo_p, estado, id_municipio)
                                            VALUES ( ".$studioa.", '".ucfirst($objext->calle)."', '".ucfirst($objext->no_exterior)."', '".ucfirst($objext->no_interior)."','".ucfirst($objext->colonia)."', '".ucfirst($objext->referencia1)."',
                                                    '".ucfirst($objext->referencia2)."', ".$objext->codigo_p.", 15, '".$objext->id_municipio."');";


					pg_query($con,$table1);
					pg_query($con,$table2);
					pg_query($con,$table3);
					pg_query($con,$table4);

				$studioaincrementado++;


				}

				/*
				$clear_tmps = "truncate inmuebles_v2tmp restart identity;
            truncate domicilio_v2tmp restart identity;
            truncate estatusxfoliotmp restart identity;
            truncate aviso_dictamen_v2tmp restart identity;";*/

            $clear_tmps = "delete from aviso_dictamen_v2tmp where fk_numreg = $id_dictaminadorr;
    delete from inmuebles_v2tmp where fk_numreg = $id_dictaminadorr;
    delete from domicilio_v2tmp where fk_numreg = $id_dictaminadorr;
    delete from estatusxfoliotmp where fk_numreg = $id_dictaminadorr;";

				pg_query($con,$clear_tmps);

				pg_close($con);

			}else{
				echo"-0inmuebles";
				die();
			}
			echo trim($folio);

/*

		foreach ($obj->inmbl1s->inm as $item) {
			//datos del inmueble
		 $muni = $item->c_muni;
		 $zona = $item->c_zona;

		 $manzana = $item->c_manz;
		 $lote = $item->c_lote;
		 $edificio = $item->c_edif;
		 $depto = $item->c_dept;
		 $scr = $item->scrp;

		 $calle = $item->calleAv;
		 $col = $item->col;
		 $numE = $item->numEx;
		 $numI = $item->numIn;
		 $cp = $item->cpp;
		 $municipio = $item->munic;
		 $referencia = $item->refvia;
		 $pagoImpuesto = $item->impuesto;
		 $modificacion = $item->madific;
		 $variable_clvs =$item->variable_clvs;


		 $contador = $contador + 1;
		 $cont = $contador;
		 //echo $obj1->guardarInmuebles($coxx,$muni,$zona,$manzana,$lote,$edificio,$depto,$scr,$calle,$col,$numE,$numI,$cp,$municipio,$referencia,$anio,$contador,$pagoImpuesto,$modificacion,$variable_clvs);

		 $sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
		 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		 // Imprimiendo los resultados aarray
		 $rs = pg_query( $con, $sql );

		 $validate_exixts = pg_num_rows($rs);
		 if( $validate_exixts == "1" ){
		 	while( $obj = pg_fetch_object($rs) ){
		 		$data[] = $obj;
		 	}

		 	$nom = $data[0]->ultimo;

		 	if(empty($nom)){
		 		$folio = $nom;
		 		//$id_dom= $nom+1;
		 	}else{
		 		$folio = $nom;
		 		//$id_dom= $nom+1;
		 	}

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
		 $id_in=$folio + $cont;
		 $id_in= $id_in.$cont;


		 $sql2="INSERT INTO inmuebles_v2(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar, folio,manifest_claves)
		 VALUES ($id_in, '$claveC', $scr, $id_in, $folio, '$pagoImpuesto', '$modificacion', $folio, $anio, $folio,$variable_clvs);";
		 pg_query($con, $sql2);

		 $sql3 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado)
		 VALUES ($id_in, '$calle', '$numE', '$numI', '$col', '$municipio', '$referencia', null, '$cp',null );";
		 pg_query($con, $sql3);

		 $sql1="INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha, cclave)
   		 VALUES ($folio, $noReg2, 1, now(), '$claveC');";
   		 pg_query($con, $sql1);
		 //noReg=dictaminador

		if ($contador==1) {
			//echo $obj1->guardarAvisoDictamen($id_dictaminadorr,$coxx,$muni,$zona,$manzana,$lote,$edificio,$depto);

			$sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
			$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs = pg_query( $con, $sql );

			$validate_exixts = pg_num_rows($rs);
			if( $validate_exixts == "1" ){
				while( $obj = pg_fetch_object($rs) ){
					$data[] = $obj;
				}

				$nom = $data[0]->ultimo;

				if(empty($nom)){
					$folio = $nom;
					//$id_dom= $nom+1;
				}else{
					$folio = $nom;
					//$id_dom= $nom+1;
				}

			}

			$muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
			$zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
			$manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
			$lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
			$edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
			$depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

			$claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;

			$sql4 = "INSERT INTO aviso_dictamen_v2(id_aviso, id_dictaminador, cve_cat) VALUES ($folio, $id_dictaminadorr, '$claveC');";
			pg_query($con, $sql4);

		}
	//	echo "INMUBLES: ".$contador;

		}*/

		// $obj1->reporte($coxx,$folioReporte);


		}

	//echo $obj1->seguimiento_fecha_revisor($coxx,$date_ini, $date_fin);

		//*******Enviar aviso de dictamen**//



?>
