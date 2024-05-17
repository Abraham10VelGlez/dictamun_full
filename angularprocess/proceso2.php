<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);
//print_r($obj);
//die();
//echo $obj->nombreDenRaz;
include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obj1= new Controllermaster();	
		$c = $coxx;	



		foreach ($obj->v->vector as $item) {
			//datos del inmueble
		$folio = $item->folio;
		$clave = $item->clave;
		$revisor_num = $item->opt;

		if( empty($folio) || $folio == "" || $folio ==" "  ){
			echo "no hay folios a dictaminar";


		}else{
					$sql="select  (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =2 THEN 'DIP'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa=15 THEN 'DIP'
END) as etapa_folio_d,folio,( '/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
fecha_registro,
aniodictamen as anio_dictaminar,
norg,
email,nombredenominacion, (nombredenominacion || ' ' || apaterno || ' '
   || amaterno) AS nombre_c,
(CASE WHEN etapa =1 THEN 'REGISTRO DE DICTAMEN'
WHEN etapa =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR'
WHEN etapa =4 THEN 'ASIGNADO A REVISOR'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'RECHAZADO'
WHEN etapa=15 THEN 'VALIDADO'
END) as etapa_de_dict,
etapa,
(CASE WHEN etapa =1 THEN 'AUN NO ESTA COMPLETA LA DOCUMENTACIÓN'
WHEN etapa =2 THEN 'AUN NO ESTA COMPLETA LA DOCUMENTACIÓN'
WHEN etapa =3 THEN '<input type=checkbox class=className value=' || folio || '/>'
END) as etapa_de_dict2,
--(nombre ||' '|| ap_paterno ||' '|| ap_materno) as nombre_espec,
nombre_especialista as nombre_espec,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'NORMAL*'
END) as tipoditc, cclave from
(select *,b.nombre as nomb,b.ap_paterno as appt,b.ap_materno as apmt,b.rfc as rrfc,b.telefono as tel,b.no_reg_autorizado as norg from
contribuyentedatos_v2 as a
join
especialistas_vigentes_v2 as b
on
a.id_dictaminador = b.no_reg_autorizado ) as a
join
(
select * from aviso_dictamen_v2 as a
join
estatusxfolio as b
on a.id_aviso = b.folio_dictamen
) as b
on a.folio = b.id_aviso WHERE folio = $folio and b.cclave = '$clave' and etapa = 3";
		 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
		 // Imprimiendo los resultados aarray
		 $rs = pg_query( $c, $sql );
		 
		 $validate_exixts = pg_num_rows($rs);
		 if( $validate_exixts >= "1" ){
		 	//cambiar a la fase correcta solo es prueba y ya
		$e= "UPDATE estatusxfolio SET etapa=4, fecha=now(), id_revisor = $revisor_num WHERE folio_dictamen = $folio and cclave = '$clave' ";
		//echo$obj1->select_dictm($c,$e);
		pg_query($c, $e);
		echo "100";

		 }else{
		 	echo "50";

		 }

		}




		
		}
		// Cerrando la conexion
	 pg_close($c);


		 

		 
?>