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

		//REASIGNAR A ESPECIALISTA
		// vamos a editar el numero de registro en 3 tablas
		/*
		 * listadocumentos_v2
		 * estatusxfolio
		 * contribuyentedatos_v2
		 * aviso_dictamen_v2
		 * 
		 * */
		$e1= "UPDATE aviso_dictamen_v2 SET  id_dictaminador = $Especialista_num  WHERE id_aviso = $folio and cve_cat =  $folio_x_clv";
		$e2= "UPDATE contribuyentedatos_v2 SET  id_dictaminador = $Especialista_num WHERE folio = $folio";
		$e3= "UPDATE estatusxfolio SET  id_dictaminador = $Especialista_num WHERE folio_dictamen = $folio and cclave = $folio_x_clv";
		$e4= "UPDATE listadocumentos_v2 SET  id_dictaminador = $Especialista_num WHERE id_dictamen = $folio and clavecastatral = $folio_x_clv";

		pg_query($c, $e1);
		pg_query($c, $e2);
		pg_query($c, $e3);
		pg_query($c, $e4);
						
		}
		
		
		echo "100";
		// Ce
		//echo "folio a reasignar: ".$folio."___ especialista".$Especialista_num;

	//echo $folio;
		
	 pg_close($coxx);


		 

		 
?>