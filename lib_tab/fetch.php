<?php

$coxx = pg_connect("host=127.0.0.1 port=5432 dbname=dictamun user=postgres password=geografia") or die('No se ha podido conectar: ' . pg_last_error());
$c= $coxx;

// Realizando una consulta SQL
	$query = "select no_reg_autorizado,curp, rfc, nombre, ap_paterno, ap_materno, correo, personal_moral, servicios, telefono, cargo,id from dictaminadores_v2;";
	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs = pg_query( $c, $query );
	while( $obj = pg_fetch_object($rs) ){
		//echo $obj->id_usuario;
		//print_r($obj);
		//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
		$data[] = $obj;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result);
	// Cerrando la conexiÃ³n
	pg_close($c);
	
	
	//$obj = json_encode($data);
	//var_dump(json_encode($data));
	//header('Content-type: application/json');
	echo json_encode($data);	

//echo json_encode($data);

?>