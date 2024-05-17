<?php
/*
/////////////////////////////////////////////////////////////////////////////////////////////////////////////ORDENA LOS DATOS DE ARCHIVO AVALUO.VAL
session_start();
$num_registroxdictaminador = $_SESSION["idkey2"];
$query11="SELECT * FROM (

SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
  FROM aviso_dictamen_v2 as a
  join
  inmuebles_v2 as b
  on
  a.id_aviso = b.id_aviso where folio = $id
) AS lo
JOIN
(
select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso) AS lop

ON lo.folio = lop.folio
 where lop.folio = $id and lop.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt' ";
$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rs33 = pg_query( $c, $query11 );
while( $obj34 = pg_fetch_object($rs33) ){

$carpetainm = $obj34->cve_catastral;
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val','rb');
$string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val'));
$file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val';
$contenidomed ="";
$contenidomed = trim($string);
//version php 5.6
$contenido = preg_replace("/[\r\n\\n\\r]+/", "", $contenidomed);
$aux[0] = $contenido;
$resultxxxz180422 = preg_replace('/[\;\""\'\"\?\&\$\%\#\/]+/', '', $aux[0]);
$fp = fopen($file, "w");
fwrite($fp, $resultxxxz180422);
fclose($fp);
fclose($archivo);


echo"10";//bandera de todo esta bien
// Liberando el conjunto de resultados
pg_free_result($result23);
*/

//include '../bd/conex.php';


// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
//1202690001   1302690003     1202690006        1322690004
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/Avaluos.val','r');
while ($linea = fgets($archivo)) {
$a = $linea.'';

$datastovector = explode("|", $a);
$aux[0] = $datastovector;
}
print_r($aux);

DIE();
