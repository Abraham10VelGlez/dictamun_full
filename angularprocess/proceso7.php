<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);
//print_r($obj);
//die();
//echo $obj->nombreDenRaz;
include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obj1= new Controllermaster();		
		$folio=""; 
		$clave="";
		foreach ($obj->v->vector as $item) {
			//datos del inmueble
		$folio = $item->folio.'*'.$item->clave.'|'.$folio;
		//    echo"...........";
		//$revisor_num = $item->opt;

		//cambiar a la fase correcta solo es prueba y ya
		//$e= "UPDATE estatusxfolio SET etapa=4, fecha=now(), id_revisor = $revisor_num WHERE folio_dictamen = $folio";
		//echo$obj1->select_dictm($coxx,$e);
		}
		// Ce
	echo count($obj->v->vector).'|'.$folio;

	//echo $folio;
		
	 pg_close($coxx);


		 

		 
?>