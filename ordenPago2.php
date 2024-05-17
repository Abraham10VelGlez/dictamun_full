
<?php

$totales =$_GET['num'];
$totOrdenes = explode("|", $totales);
 $todo = count($totOrdenes); 
 $todo = $todo - 2; 
 $totOr = $totOrdenes[0]; 

require_once 'tcpdf/tcpdf.php';
 

$page_formate = array('MediaBox' => array('llx' => 0, 'lly' => 0, 'urx' => 180, 'ury' => 180));
$pdf = new TCPDF('P', 'mm', $page_formate, true, 'UTF-8', false);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// set auto page break
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

for ($i=1; $i <= $todo; $i++) { 
    ///folio puro numero
    $a = $totOrdenes[$i];
    $aFol = explode("/", $a);
    $folioConsulta= $aFol[1];
    $folioConsulta2 = ltrim($folioConsulta, "0");

      $claveCatastral = $aFol[3];
     $anioEval = $aFol[2];
   // echo $folioConsulta2;

$pdf->AddPage(); 

$pdf->Image('_img/encabezadoDoc.PNG',10,6,160,20);

$str_conexao='host=10.10.68.31 dbname=dictamun2022 port=5432 user=postgres password=j7cr3a';
//$str_conexao='host=localhost dbname=dictamun port=5432 user=postgres password=Igecem2018';
$conexao=pg_connect($str_conexao) or die('lA conexion ao banco de dados falhou!');

/*echo $consulta=pg_exec($conexao,'select
a.folio,
fecha_registro,date(fecha_registro) as fecha_registro2,
aniodictamen as anio_dictaminar,
nombre_especialista ,
cve_cat,valor_catastral,b.no_reg_autorizado as no_reg_autorizados,id_revisor
from contribuyentedatos_v2 as a join
especialistas_vigentes_v2 as b
on
a.id_dictaminador = b.no_reg_autorizado
join
aviso_dictamen_v2 as aa
on
a.folio =  aa.id_aviso
join
estatusxfolio as aaa
on
a.folio = aaa.folio_dictamen
join
inmuebles_v2 as aaaa
on
a.folio = aaaa.folio
join
domicilio_v2 as aaaaa
on
aaaa.id_domicilio = aaaaa.id_domicilio 
 where a.folio  ='.$folioConsulta2.' and a.aniodictamen = '.$anioEval.' 
 and cclave =\''.$claveCatastral.'\'');*/

$consulta=pg_exec($conexao, 'select
a.folio, foliodictaval, 
fecha_registro,date(fecha_registro) as fecha_registro2,
aniodictamen as anio_dictaminar,
nombre_especialista ,
cve_cat,valor_catastral,b.no_reg_autorizado as no_reg_autorizados,id_revisor
from contribuyentedatos_v2 as a join
especialistas_vigentes_v2 as b
on
a.id_dictaminador = b.no_reg_autorizado  
join
(select * from aviso_dictamen_v2 where cve_cat =\''.$claveCatastral.'\') as aa
on
a.folio =  aa.id_aviso
join
(select * from estatusxfolio where cclave = \''.$claveCatastral.'\') as aaa
on
a.folio = aaa.folio_dictamen
join 
(select * from hojasverdes where clavecc = \''.$claveCatastral.'\') as hv
on aaa.folio_dictamen = hv.folio 
join
(select * from inmuebles_v2 where cve_catastral=\''.$claveCatastral.'\') as aaaa
on
a.folio = aaaa.folio
join
domicilio_v2 as aaaaa
on
aaaa.id_domicilio = aaaaa.id_domicilio where a.folio  ='.$folioConsulta2.' and a.aniodictamen = '.$anioEval.' 
 and cclave =\''.$claveCatastral.'\'');

$numregs=pg_numrows($consulta); 
 $dictaminador=pg_result($consulta,0,'nombre_especialista');
 $valorCat=pg_result($consulta,0,'valor_catastral');
$anioDic=pg_result($consulta,0,'anio_dictaminar');
$folioDictavall = pg_result($consulta,0,'foliodictaval');
$fol=pg_result($consulta,0,'folio');

$foli = str_pad($fol, 5, 0, STR_PAD_LEFT);
$porcentaje = (10 / 100);
//$pagar = ($valorCat * $porcentaje);
$pagar=45; 
$dia = date('d');
$mes = date('n');
$anio = date('Y'); 

$mes2 = "";

if ($mes == 1) {
    $mes2="Enero";
}else if ($mes == 2) {
    $mes2="Febrero";
}else if ($mes == 3) {
    $mes2="Marzo";
}else if ($mes == 4) {
    $mes2="Abril";
}else if ($mes == 5) {
    $mes2="Mayo";
}else if ($mes == 6) {
    $mes2="Junio";
}else if ($mes == 7) {
    $mes2="Julio";
}else if ($mes == 8) {
    $mes2="Agosto";
}else if ($mes == 9) {
    $mes2="Septiembre";
}else if ($mes == 10) {
    $mes2="Octubre";
}else if ($mes == 11) {
    $mes2="Noviembre";
}else if ($mes == 12) {
    $mes2="Diciembre";
}

/*   /////falta la tabla de genero
$genero=pg_result($consulta,0,'tipo');
if ($genero == "F") {
    $gen = "a la ";
}else if($genero == "M"){
    $gen = "a el ";
}*/



////  *******************SACAR EL VALOR DE LA TARIFA  A PAGAR 


/////////////////*************************///////////
/*$queryy = "select ava_vc_terr as valorpropio, con_vc_con as valorsub from construcciones_v2 as c 
join dictaval_avaluos as d 
on c.folio_dictamun=d.folio_dictamun 
where c.folio_dictamun=$folioConsulta2 and c.cclave='$clavv' and d.cclave='$clavv'";*/
$queryy = "select ava_vc_terr as valorpropio, con_vc_con as valorsub from construcciones_v2 as c 
join dictaval_avaluos as d 
on c.folio_dictamun=d.folio_dictamun 
where c.folio_dictamun=$folioConsulta2";  
$resultt = pg_query($queryy) or die('La consulta fallo: ' . pg_last_error());
$rss = pg_query( $conexao, $queryy );
$valor = 0;
$valorRT = 0;  

 //privada = parseFloat(valuee.valorconstruccion) + privada;
      // valor_privada = new Intl.NumberFormat('es-MX').format(privada); 

while( $obj = pg_fetch_object($rss) ){

    //echo  $valor = parseFloat($obj->valorsub) + $valor;
   $valor = floatval($obj->valorsub);
 // echo "<br>";
   $valorRT = $valorRT + $valor;

   $valorP = floatval($obj->valorpropio);
   
}

  $valorFinal= $valorRT + $valorP;
/////////////////*************************///////////


//$N ="769398.87";
//$N = $valorCat;
  $N = $valorFinal;

//$N = $valorCat;
$aa = (int) $N ;

$query = "select * from tarifaxanio";
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados aarray
$rs = pg_query( $conexao, $query );
$validate_exixts = pg_num_rows($rs);
//if( $validate_exixts == "1" ){

while( $obj = pg_fetch_object($rs) ){
    
    $data2 [] =
    array(
        
            'min_range' =>  (int) $obj->limiteinferior,
        'max_range' =>  (int) $obj->limitesuperior
       
    );
}


foreach ($data2 as $key => $value) {
    
    //echo "<br>".$value['min_range'] . "---" . $value['max_range']."<br>" ;
    //echo "<br>".$value;
    if ($N < $value['min_range'] || $N < $value['max_range']) {
        //echo "RANGO: ".$key;    //echo "rango 1";
         $key;
        break; 
    }else{
        //echo "no es rango 1";
    }
   
}

$options = array(
'options' => array(
'min_range' =>  0.01,
'max_range' => 5000000.001,
)
);

$k = $key + 1;

$query = "select * from tarifaxanio where id = ". $k;

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rs = pg_query( $conexao, $query );
$validate_exixts = pg_num_rows($rs);
//if( $validate_exixts == "1" ){

while( $obj = pg_fetch_object($rs) ){
    $limiteinferior = $obj->limiteinferior;
    $factorporrango = $obj->factorporrango;
    $cuotafijaa = $obj->cuotafija;
   
}


$res1 = $N - $limiteinferior;

 $res1;

$res2 = $res1 * $factorporrango;

 $res3 = $res2 + $cuotafijaa;
$porciento = 10;
$decimales = 2;
 $res4 = number_format($res3*$porciento/100 ,$decimales);
//////******************TERMINA TARIFA



$txt = <<<EOD
<p style="text-align: right; font-size: small;">Toluca, México, a $dia de $mes2 de $anio.</p>
<br>
<p style="font-weight: bold; text-align: center; font-size: medium;">ORDEN DE PAGO</p>
<br>
<p style="text-align: justify; font-size: small;">Sírvase Ud. cobrar, a $dictaminador la cantidad de $$res4, por concepto de revisión y validación del avalúo catastral practicado para efectos de dictaminar la determinación de la base del Impuesto Predial $anioDic, como lo dispone el Capítulo III de las Normas Generales.</p><br>
EOD;

$pdf->writeHTML($txt, true, false, false, false, '');

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td style="text-align: center; font-size: x-small; width: 60px;">Cantidad</td>
        <td style="text-align: center; font-size: x-small; width: 260px;">Referencia</td>
        <td style="text-align: center; font-size: x-small; width: 100px;">Importe</td>
        <td style="text-align: center; font-size: x-small; width: 100px;">Total</td>
    </tr> 
     <tr>
        <td style="font-size: x-small; text-align: center;">1</td>
        <td style="font-size: x-small; text-align: justify;"> Revisión y validación del avalúo catastral practicado para efectos de dictaminar la determinación de la base del Impuesto Predial.<br><br>
        DIP/$aFol[1]/$anioDic/$aFol[3]
        <br>
        Folio: $folioDictavall

        </td>
        <td style="font-size: x-small; text-align: center;">$$res4</td>
        <td style="font-size: x-small; text-align: center;">$$res4</td>
    </tr>
    </table>
    
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');

$txt2 = <<<EOD
<p style="text-align: right; font-size: medium; font-weight: bold;">SUMA: $$res4</p>
EOD;

$pdf->writeHTML($txt2, true, false, false, false, '');

$tbl2 = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td style="text-align: center; font-size: x-small; width: 260px;">ELABOR&Oacute;<br>
        <p><u>JORGE CELSO DAVILA BORJA</u><br>NOMBRE Y FIRMA</p>
        </td>
        <td style="text-align: center; font-size: x-small; width: 260px;">AUTORIZ&Oacute;<br>
        <p><u>GRISEL SALINAS CARMONA</u><br>NOMBRE Y FIRMA</p>
      
        </td>
    </tr> 
    
    </table>
EOD;
$pdf->writeHTML($tbl2, true, false, false, false, '');

$txt3 = <<<EOD
<p style="text-align: justify; font-size: xx-small;"><b>NOTA:</b> El pago deberá realizarse en un plazo no mayor a <b>veinte días hábiles</b> a partir de la fecha en que fue revisado y validado por el IGECEM, según lo Dispuesto en la Cláusula CUARTA del Acuerdo de Colaboración que celebran el IGECEM y el COEVEM, SAVAC Y COMEV.</p>
EOD;
$pdf->writeHTML($txt3, true, false, false, false, '');


}

$pdf_name='OrdenDePago'.$totOr.'.pdf';
$foliotoemail = 'OrdenDePago.pdf';
ob_end_clean();
$pdf->Output("C:/xampp/htdocs/dictamun/oficios/".$foliotoemail, 'F');
$pdf->Output($pdf_name, 'I');
?>