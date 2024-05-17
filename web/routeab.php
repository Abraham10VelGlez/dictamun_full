<?php

$Schlussel = isset($_POST['acceess2022']) ? $_POST['acceess2022']:"";

if(empty($Schlussel)){
	echo "loqito";
	die();
header('Location: ../index.php');
}else{



switch ($Schlussel) {
	case 86:
	 include '../bd/conex.php';
	 include '../controller/ControllerPath.php';
	 $obje= new Controllermaster();
	 echo $obje->inmuebles_list($coxx);

	 break;
	 case 104:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
				
		$val = isset($_POST['datofilter']) ? $_POST['datofilter']:"";
		echo $obje->inmuebles_readred($coxx,$val);

		break;
}
}



?>
