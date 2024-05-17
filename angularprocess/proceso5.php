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
		$cont = 0;
		foreach ($obj->v->vector as $item) {
			//datos del inmueble
			$cont = $cont + 1; 
		$folio = $item->folio.'/'.$item->cclave.'|'.$folio;
		

		}
		// Ce
		$folio = $cont.'|'.$folio; 
		 // ../../ordenPago.php?num=
	echo "../../ordenPago.php?num=".$folio;

	 //echo json_encode($folio);
		
	 pg_close($coxx);


		 

		 
?>