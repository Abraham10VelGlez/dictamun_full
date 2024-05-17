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
			$fol = explode("/", $item->folio);
			$foli = $fol[1];
		//$folio = $item->folio.'*'.$item->clave.'|'.$folio;
	  $sqL = "UPDATE estatusxfolio SET etapa=15, fecha=now() WHERE folio_dictamen = $foli and cclave='$item->clave';";
      pg_query($coxx, $sqL);
		

		}
		//$folio = $cont.'|'.$folio; 
		 // ../../ordenPago.php?num=
	echo $cont;

	 //echo json_encode($folio);
		
	 pg_close($coxx);


		 

		 
?>