<?php

session_start();
$id_dictaminadorr=$_SESSION["idkey2"];


include '../bd/conex.php';
include '../controller/ControllerPath2.php';
$obj1= new Controllermaster2();


//$ida_modificar=$obj->variable;
$ida_modificar = isset($_POST['variable']) ? $_POST['variable']:"";
$fisicMoral = isset($_POST['fm']) ? $_POST['fm']:"";
$anio = isset($_POST['ann']) ? $_POST['ann']:"";
$noReg2 = isset($_POST['no18']) ? $_POST['no18']:"";

//$fisicMoral=$obj->fm;
//$anio = $obj->ann;
//$noReg2=$obj->no18;

if ($fisicMoral == 1) {
	//persona Fisica

	$clavecatastrall = isset($_POST['clavv']) ? $_POST['clavv']:"";
	$scr = isset($_POST['scrp']) ? $_POST['scrp']:"";
	$cp = isset($_POST['cpp']) ? $_POST['cpp']:"";
	$municipio = isset($_POST['munic']) ? $_POST['munic']:"";
	$pagoImpuesto = isset($_POST['impuesto']) ? $_POST['impuesto']:"";
	$modificacion = isset($_POST['madific']) ? $_POST['madific']:"";
	$variable_clvs = isset($_POST['variable_clvs']) ? $_POST['variable_clvs']:"";


	$calle_ = isset($_POST['calleAv']) ? $_POST['calleAv']:"";
	$col_ = isset($_POST['col']) ? $_POST['col']:"";
	$numE_ = isset($_POST['numEx']) ? $_POST['numEx']:"";
	$numI_ = isset($_POST['numIn']) ? $_POST['numIn']:"";
	$referencia_ = isset($_POST['refvia']) ? $_POST['refvia']:"";


	$calle = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $calle_ );
	$col = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $col_ );
	$numE = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $numE_ );
	$numI = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $numI_  );
	$referencia = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $referencia_ );


$valcatastral_studioa = str_replace(',','',$scr);



		$fecha = date("Y-m-d H:i:s");
		$claveC=$clavecatastrall;

		$sql4 = "UPDATE aviso_dictamen_v2tmp SET  cve_cat='$claveC' WHERE  id= $ida_modificar";
		pg_query($coxx, $sql4);

		$sql1="UPDATE estatusxfoliotmp SET  fecha='$fecha',  cclave='$claveC'  WHERE  id= $ida_modificar;";
		pg_query($coxx, $sql1);


		$sql2="UPDATE inmuebles_v2tmp SET cve_catastral='$claveC', valor_catastral='$valcatastral_studioa', manifest_pago='$pagoImpuesto', manifest_mejoras='$modificacion',
        aniodictaminar=$anio, manifest_claves=$variable_clvs   WHERE id= $ida_modificar; ";
		pg_query($coxx, $sql2);

		$sql3 = "UPDATE domicilio_v2tmp SET  calle='$calle', no_exterior='$numE', no_interior='$numI', colonia='$col',
        referencia1='$referencia', codigo_p='$cp', id_municipio='$municipio' WHERE id= $ida_modificar;";
		pg_query($coxx, $sql3);







}else if ($fisicMoral == 2) {
	//Persona moral


	$clavecatastrall = isset($_POST['clavv']) ? $_POST['clavv']:"";
	$scr = isset($_POST['scrp']) ? $_POST['scrp']:"";
	$cp = isset($_POST['cpp']) ? $_POST['cpp']:"";
	$municipio = isset($_POST['munic']) ? $_POST['munic']:"";
	$pagoImpuesto = isset($_POST['impuesto']) ? $_POST['impuesto']:"";
	$modificacion = isset($_POST['madific']) ? $_POST['madific']:"";
	$variable_clvs = isset($_POST['variable_clvs']) ? $_POST['variable_clvs']:"";


	$calle_ = isset($_POST['calleAv']) ? $_POST['calleAv']:"";
	$col_ = isset($_POST['col']) ? $_POST['col']:"";
	$numE_ = isset($_POST['numEx']) ? $_POST['numEx']:"";
	$numI_ = isset($_POST['numIn']) ? $_POST['numIn']:"";
	$referencia_ = isset($_POST['refvia']) ? $_POST['refvia']:"";


	$calle = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $calle_ );
	$col = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $col_ );
	$numE = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '',  $numE_ );
	$numI = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $numI_  );
	$referencia = preg_replace('/[\;\|\!\'\"\?\&\$\%\#\/]+/', '', $referencia_ );


		$fecha = date("Y-m-d H:i:s");
		$claveC=$clavecatastrall;

		$valcatastral_studioa = str_replace(',','',$scr);


		$sql4 = "UPDATE aviso_dictamen_v2tmp SET  cve_cat='$claveC' WHERE  id= $ida_modificar";
		pg_query($coxx, $sql4);

		$sql1="UPDATE estatusxfoliotmp SET  fecha='$fecha',  cclave='$claveC'  WHERE  id= $ida_modificar;";
		pg_query($coxx, $sql1);


		$sql2="UPDATE inmuebles_v2tmp SET cve_catastral='$claveC', valor_catastral='$valcatastral_studioa', manifest_pago='$pagoImpuesto', manifest_mejoras='$modificacion',
		aniodictaminar=$anio, manifest_claves=$variable_clvs   WHERE id= $ida_modificar; ";
		pg_query($coxx, $sql2);

		$sql3 = "UPDATE domicilio_v2tmp SET  calle='$calle', no_exterior='$numE', no_interior='$numI', colonia='$col',
		referencia1='$referencia', codigo_p='$cp', id_municipio='$municipio' WHERE id= $ida_modificar;";
		pg_query($coxx, $sql3);



}
echo "100";


?>
