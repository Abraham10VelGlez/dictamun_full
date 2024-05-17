<?php ob_start();
//echo 'folio:'. $_GET["var"];
 $folio = $_GET["var"];
include '../bd/conex.php';
$conexao = $coxx;
$consulta=pg_exec($conexao,'

select a.id_con,a.id_dictaminador, UPPER(a.nombredenominacion) as nombredenominacion, UPPER(a.apaterno) as apaterno, UPPER(a.amaterno) as amaterno, a.fecha_registro,
 UPPER(d.nombre) as dictaminador, UPPER(a.rfc) as rfc,
UPPER(d.ap_paterno) as ap_paterno2, UPPER(d.ap_materno) as ap_materno2, UPPER(d.rfc) as rfc2,
b.cve_catastral, b.valor_catastral,
UPPER(c.calle) as calle , UPPER(c.no_exterior) as no_exterior ,UPPER(c.no_interior) as no_interior, UPPER(c.colonia) as colonia, c.codigo_p, UPPER(c.referencia1) as referencia1,
UPPER(d.rfc) as rcf2, d.no_reg_autorizado,
b.aniodictaminar, UPPER(e.nombre) as tipoDictamen, a.tipod, a.folio,UPPER(d.nombre_especialista) as nombre_especialista

from (select * from contribuyentedatos_v2 where folio = '.$folio.') as a
join (select * from inmuebles_v2 where folio = '.$folio.') as b on a.folio = b.folio

join domicilio_v2 as c on b.id_domicilio = c.id_domicilio

join (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as d on a.id_dictaminador = d.no_reg_autorizado

join dictamen_tipo_v2 as e on a.tipodictamen = e.id_tipo

WHERE d.tipo_usuariofk =2 and a.folio='.$folio);
$numregs=pg_numrows($consulta);


?>

<html>
<body style="font-size: 12px;">

<center>
<img alt="" width="800px;" src="../_img/banner2.png">
</center>
<center>
<h2>ACUSE DE PRESENTACION DEL AVISO DE DICTAMEN SOBRE LA<br>
DETERMINACION DE LA BASE DEL IMPUESTO PREDIAL</h2>
</center>
<br>
<p style="text-align: right;" id="fechayhora" name="fechayhora" >
<meta charset='utf-8'>

<?php

$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Miercoles 05 de Septiembre del 2016

?>
</p>

<p style="text-align: left;">Folio de presentación: <?php
$folioPresentacion=pg_result($consulta,0,'folio');
$anioAc = date("Y");
$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
$anioAdictaminar=pg_result($consulta,0,'aniodictaminar');
echo$folioPresentacion = "AD/".$folioCompleto."/".$anioAdictaminar;

?></p>
<p style="text-align: left;">Año a dictaminar: <?php echo $anioAdictaminar;?></p>

<p style="text-align: left;">Fecha y hora de aviso presentación: <?php 

$fechaHora = pg_result($consulta,0,'fecha_registro');

$date = date_create($fechaHora);



echo date_format($date,"d/m/Y h:i:s");


?></p>
<br>
<h3 style="text-align: center;">   Datos del Contribuyente</h3>
<p style="text-align: left;">Contribuyente: <?php $fisicaMoral=pg_result($consulta,0,'tipod'); 
if ($fisicaMoral == 1) {
$contribuyente=pg_result($consulta,0,'nombredenominacion');
$aPaterno=$a_paterno=pg_result($consulta,0,'apaterno');
$aMaterno=$a_paterno=pg_result($consulta,0,'amaterno');  

$nombreCompleto = $contribuyente." ".$aPaterno." ".$aMaterno;
$nombreCompleto = strtoupper($nombreCompleto);

}else if ($fisicaMoral == 2) {
  $nombreCompleto=pg_result($consulta,0,'nombredenominacion');
  $nombreCompleto = strtoupper($nombreCompleto);
}

echo $nombreCompleto;
?></p>
<p style="text-align: left;">RFC: <?php 
$rfcContri=pg_result($consulta,0,'rfc');
echo$rfcContri = strtoupper($rfcContri);
?></p>

<br>

<h3 style="text-align: center;">Datos del Dictaminador</h3>

<p style="text-align: left;">No. Registro: <?php echo $noRegistro=pg_result($consulta,0,'no_reg_autorizado'); ?></p>
<p style="text-align: left;">Dictaminador: <?php $dictaminador=pg_result($consulta,0,'nombre_especialista');
echo $gg = mb_strtoupper($dictaminador,'UTF-8');?></p>
<p style="text-align: left;">RFC: <?php echo $rfcDic=pg_result($consulta,0,'rfc2');?></p>
<br>
<p style="text-align: left;">Tipo de dictamen: <?php echo $TipoDic=pg_result($consulta,0,'tipodictamen');?></p>
<p style="text-align: left;">Tipo de presentación: <?php 
$TipoDic=pg_result($consulta,0,'tipodictamen');
if ($TipoDic == 'NORMAL') {
	$descripcion='Obligatorio, Unicamente por tener uno o más inmuebles con valor catastral igual o superior a $20,000,000.00';
	
}else if ($TipoDic == 'COMPLEMENTARIO') {
	$descripcion='Obligatorio, por tener inmuebles con valor catastral igual o superior a $5,000,000.00 y que en suma tiene un valor catastral igual o superior a $20,000,000.00';
	
}else if ($TipoDic == 'NORMAL*') {
	$descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios';
	
}else if ($TipoDic == 'COMPLEMENTARIO ADICIONAL') {
    $descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios.'; 
   
}
echo $mmm = mb_strtoupper($descripcion,'UTF-8');

?></p>


<script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();

var htmlf = f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear();

var objetivo = document.getElementById('fechayhora');
objetivo.innerHTML = '';
objetivo.innerHTML = htmlf;

</script>
<center>
<h3>Inmuebles Objetos a Dictaminar</h3>
</center>
<br>
<center>
<table  border="1" style="text-align: center;">
   
    <tr bgcolor="#CCCCCC">
        <td>No.</td>
        <td>Clave catastral</td>
        <td>Valor catastral</td>
        <td>Domicilio del Estado de México</td>
        
    </tr>
    <?php
    $num = 0;
    for ($i=0; $i < $numregs; $i++) {
    	$num = $i + 1;
    	$claveCa=pg_result($consulta,$i,'cve_catastral');
    	$valorCa=pg_result($consulta,$i,'valor_catastral');
    	
    	$calle=pg_result($consulta,$i,'calle');
    	$NoExt=pg_result($consulta,$i,'no_exterior');
    	$NoInt=pg_result($consulta,$i,'no_interior');
    	$colonia=pg_result($consulta,$i,'colonia');
    	//$municipio=pg_result($consulta,$i,'municipio');
    	$cp=pg_result($consulta,$i,'codigo_p');
    	$referencia=pg_result($consulta,$i,'referencia1');
    	$tbl = "";
    	$tbl.= '    	
    <tr>
        <td >'.$num.'</td>
        <td >'.$claveCa.'</td>
        <td >$ '.$valorCa.'</td>
        <td >Calle: '.$calle.' ,No.Exterior: '.$NoExt.' ,No.Interior: '.$NoInt .',Colonia: '.$colonia.' ,CP: '.$cp .',Referencias: '.$referencia.'</td>
    </tr>';

echo $tbl;
    	
    	
    }
    ?>
</table>
</center>
</body>
</html>

<?php
//die();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "AcuseDeDictamen.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
