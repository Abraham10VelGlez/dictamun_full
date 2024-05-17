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
		$folio=""; 
		foreach ($obj->v->vector as $item) {
			//datos del inmueble
		$folio = $item->folio;
		//    echo"...........";
		$Especialista_num = $item->opt;


		 $folio_x_clv = $item->clvcat;

		
		 $e3= "UPDATE estatusxfolio SET id_revisor = $Especialista_num WHERE folio_dictamen = $folio and cclave = '$folio_x_clv'";

			pg_query($c, $e3);

		
						
		}
	
		
		echo "100";
		
	 pg_close($coxx);


		 

		 
?>