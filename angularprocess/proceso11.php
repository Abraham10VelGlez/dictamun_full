<?php

session_start();
$id_dictaminadorr=$_SESSION["idkey2"];

$variable = isset($_POST['variable']) ? $_POST['variable']:"";
$personatipo = isset($_POST['personatipo']) ? $_POST['personatipo']:"";


$ida_modificar= $variable;
$fisicMoral = $personatipo;
include '../bd/conex.php';
include '../controller/ControllerPath2.php';
$obj1= new Controllermaster2();


//$ida_modificar=$obj->variable;
//$fisicMoral = $obj->personatipo;
if ($fisicMoral == 1) {
	//persona Fisica

		$sql4 = "DELETE FROM aviso_dictamen_v2tmp WHERE  id= $ida_modificar";
		pg_query($coxx, $sql4);

		$sql1="DELETE FROM estatusxfoliotmp WHERE  id= $ida_modificar;";
		pg_query($coxx, $sql1);


		$sql2="DELETE FROM inmuebles_v2tmp WHERE  id= $ida_modificar; ";
		pg_query($coxx, $sql2);

		$sql3 = "DELETE FROM domicilio_v2tmp WHERE  id= $ida_modificar;";
		pg_query($coxx, $sql3);

}else if ($fisicMoral == 2) {
	//Persona moral
	$sql4 = "DELETE FROM aviso_dictamen_v2tmp WHERE  id= $ida_modificar";
	pg_query($coxx, $sql4);

	$sql1="DELETE FROM estatusxfoliotmp WHERE  id= $ida_modificar;";
	pg_query($coxx, $sql1);


	$sql2="DELETE FROM inmuebles_v2tmp WHERE  id= $ida_modificar; ";
	pg_query($coxx, $sql2);

	$sql3 = "DELETE FROM domicilio_v2tmp WHERE  id= $ida_modificar;";
	pg_query($coxx, $sql3);



}
echo "100";
/*
session_start();
$id_dictaminadorr=$_SESSION["idkey2"];
$json = file_get_contents('php://input');
$obj = json_decode($json);
//print_r($obj);
//echo $obj->nombreDenRaz;
include '../bd/conex.php';
include '../controller/ControllerPath2.php';
$obj1= new Controllermaster2();


$ida_modificar=$obj->variable;
$fisicMoral = $obj->personatipo;
if ($fisicMoral == 1) {
	//persona Fisica

		$sql4 = "DELETE FROM aviso_dictamen_v2tmp WHERE  id= $ida_modificar";
		pg_query($coxx, $sql4);

		$sql1="DELETE FROM estatusxfoliotmp WHERE  id= $ida_modificar;";
		pg_query($coxx, $sql1);


		$sql2="DELETE FROM inmuebles_v2tmp WHERE  id= $ida_modificar; ";
		pg_query($coxx, $sql2);

		$sql3 = "DELETE FROM domicilio_v2tmp WHERE  id= $ida_modificar;";
		pg_query($coxx, $sql3);

}else if ($fisicMoral == 2) {
	//Persona moral
	$sql4 = "DELETE FROM aviso_dictamen_v2tmp WHERE  id= $ida_modificar";
	pg_query($coxx, $sql4);

	$sql1="DELETE FROM estatusxfoliotmp WHERE  id= $ida_modificar;";
	pg_query($coxx, $sql1);


	$sql2="DELETE FROM inmuebles_v2tmp WHERE  id= $ida_modificar; ";
	pg_query($coxx, $sql2);

	$sql3 = "DELETE FROM domicilio_v2tmp WHERE  id= $ida_modificar;";
	pg_query($coxx, $sql3);



}
echo "100";
*/
?>
