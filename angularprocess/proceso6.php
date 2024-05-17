<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);
//print_r($obj);
//die();
//echo $obj->nombreDenRaz;
include '../bd/conex.php';
	
	
$folioE = trim($obj->fol); 
$folio = $folioE ;

require_once 'tcpdf/tcpdf.php';
$page_formate = array('MediaBox' => array('llx' => 0, 'lly' => 0, 'urx' => 180, 'ury' => 180));
$pdf = new TCPDF('P', 'mm', $page_formate, true, 'UTF-8', false);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 009', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$pdf->AddPage(); 
$pdf->Image('../_img/banner2.png',10,6,160,15);


$str_conexao='host=10.10.68.31 dbname=dictamun port=5432 user=postgres password=j7cr3a';
//$str_conexao='host=localhost dbname=dictamun port=5432 user=postgres password=Igecem2018';
$conexao=pg_connect($str_conexao) or die('lA conexion ao banco de dados falhou!');
//$folio = pg_exec($conexao,'SELECT max(id_con)ultimo FROM contribuyentedatos_v2;');
//$folio2 = pg_result($folio,'ultimo');


$consulta=pg_exec($conexao,'select a.id_con,a.id_dictaminador, a.nombredenominacion, a.apaterno, a.amaterno, a.fecha_registro,
 d.nombre as dictaminador, a.rfc,
d.ap_paterno as ap_paterno2, d.ap_materno as ap_materno2, d.rfc as rfc2, 
b.cve_catastral, b.valor_catastral, 
c.calle, c.no_exterior ,c.no_interior, c.colonia, c.codigo_p, c.referencia1, 
d.rfc as rcf2, d.no_reg_autorizado,
b.aniodictaminar, e.nombre as tipoDictamen, a.tipod, a.folio
from contribuyentedatos_v2 as a 
join inmuebles_v2 as b on a.folio = b.folio
join domicilio_v2 as c on b.id_domicilio = c.id_domicilio
join especialistas_vigentes_v2 as d on a.id_dictaminador = d.no_reg_autorizado
join dictamen_tipo_v2 as e on a.tipodictamen = e.id_tipo
WHERE id_con='.$folio);
 $numregs=pg_numrows($consulta);


//Encabezado del Acuse
$txt = <<<EOD
ACUSE DE PRESENTACION DEL AVISO DE DICTAMEN SOBRE LA DETERMINACION DE LA BASE DEL IMPUESTO PREDIAL.


EOD;

$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
//identificar si es persona fisica o moral para obtener sus datos correctamente
$fisicaMoral=pg_result($consulta,0,'tipod'); 
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
//obtencion de Datos
$rfcContri=pg_result($consulta,0,'rfc');
$rfcContri = strtoupper($rfcContri);
$folioPresentacion=pg_result($consulta,0,'folio');
//AD/00456/2020
$anioAc = date("Y");
$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);

$folioPresentacion = "AD/".$folioCompleto."/".$anioAc; 
$fechaHora=pg_result($consulta,0,'fecha_registro');
$anioAdictaminar=pg_result($consulta,0,'aniodictaminar');
$TipoDic=pg_result($consulta,0,'tipodictamen');
if ($TipoDic == 'NORMAL') {
  $descripcion='Obligatorio, Unicamente por tener uno o más inmuebles con valor catastral igual o superior a $20,000,000.00';
  $descripcion = strtoupper($descripcion);  
}else if ($TipoDic == 'COMPLEMENTARIO') {
  $descripcion='Obligatorio, por tener inmuebles con valor catastral igual o superior a $5,000,000.00 y que en suma tiene un valor catastral igual o superior a $20,000,000.00';
  $descripcion = strtoupper($descripcion);
}else if ($TipoDic == 'NORMAL*') {
  $descripcion='Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios'; 
  $descripcion = strtoupper($descripcion); 
}
$dictaminador=pg_result($consulta,0,'dictaminador');
$rfcDic=pg_result($consulta,0,'rfc2'); //
$noRegistro=pg_result($consulta,0,'no_reg_autorizado');
//Llenado de la informacion del contribuyente y dictamen
$tablaDatos = <<<EOD
      <table style="border: hidden;">
    <tr>
        <td style="width: 180px;"></td>
        <td style="width: 350px;"></td>
    </tr>
    <tr>
        <td style="font-size: x-small;">Contribuyente:</td>
        <td style="font-size: x-small;">$nombreCompleto</td>
    </tr>
    <tr>
        <td style="font-size: x-small;">RFC:</td>
        <td style="font-size: x-small;">$rfcContri</td>
    </tr>
    <tr>
        <td style="font-size: x-small;">Folio de presentación:</td>
        <td style="font-size: x-small;">$folioPresentacion</td>
    </tr>
    <tr>
        <td style="font-size: x-small;">Fecha y hora de presentación:</td>
        <td style="font-size: x-small;">$fechaHora</td>
    </tr>
    <tr>
      <td style="font-size: x-small;">Año a dictaminar:</td>
        <td style="font-size: x-small;">$anioAdictaminar</td>
    </tr>
    <tr>
        <td style="font-size: x-small;">Tipo de dictamen:</td>
        <td style="font-size: x-small;">$descripcion</td>
    </tr>
    <tr>
        <td style="font-size: x-small;">Tipo de presentación:</td>
        <td style="font-size: x-small;">$TipoDic</td>
    </tr>
    <tr>
     <td style="font-size: x-small;">Dictaminador:</td>
        <td style="font-size: x-small;">$dictaminador</td>
    </tr>
    <tr>
        <td style="font-size: x-small;">RFC:</td>
        <td style="font-size: x-small;">$rfcDic</td>
    </tr>
    <tr>       
        <td style="font-size: x-small;">No. Registro:</td>
        <td style="font-size: x-small;">$noRegistro</td>
    </tr>
    </table>

EOD;
$pdf->writeHTML($tablaDatos, true, false, false, false, '');

$txt2 = <<<EOD
Inmuebles Objetos a dictaminar:
EOD;

//$pdf->Write(0, $txt2, '', 0, 'C', true, 0, false, false, 0);
$pdf->writeHTMLCell(0, 0, '', '', $txt2, 0, 1, 0, true, '', true);
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td style="text-align: center; width:20px; font-size: x-small;">No.</td>
        <td style="text-align: center; font-size: x-small;">Clave catastral</td>
        <td style="text-align: center; font-size: x-small;">Valor catastral</td>
        <td style="text-align: center; font-size: x-small; width:250px;">Domicilio del Estado de México</td>
    </tr> 
EOD;

//  $pdf->Cell(50,50,$numregs,0,0,'L',0,0);
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
    $tbl.= <<<EOD
    
    <tr>
        <td style="font-size: x-small; text-align: center;">$num</td>
        <td style="font-size: x-small;">$claveCa</td>
        <td style="font-size: x-small;">$ $valorCa</td>
        <td style="font-size: x-small;">calle: $calle; No.Exterior: $NoExt; No.Interior: $NoInt; Colonia: $colonia; CP: $cp; Referencias: $referencia</td>
    </tr>
EOD;


  }

  
$tbl.= <<<EOD
    
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


$pdf_name='AcuseDeDictamen'.$folioPresentacion.'.pdf';
$foliotoemail = 'AcuseDeDictamen.pdf';
ob_end_clean();
$pdf->Output("C:/xampp/htdocs/dictamun/tmp/".$foliotoemail, 'F');
//$pdf->Output($pdf_name, 'I');
		 //Enviar email a dictaminador.

  $sql2="SELECT tipod, email as correo, nombredenominacion, apaterno, amaterno, folio, correo as correodic FROM contribuyentedatos_v2 as a
  JOIN especialistas_vigentes_v2 as b ON a.id_dictaminador=b.num_registro where folio= $folioE;";
  $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
  $rs2 = pg_query( $coxx, $sql2 );
   while( $obj2 = pg_fetch_object($rs2) ){
   $data2[] = $obj2;
            }
    //$emailDic = $data2[0]->correodic;
    $emailc = $data2[0]->correo;  //$emailDic para que sea el correo del especialista
    $tipoPersona = $data2[0]->tipod;
    $nombreC = $data2[0]->nombredenominacion;
    $ap = $data2[0]->apaterno;
    $am = $data2[0]->amaterno;
    $folio = $data2[0]->folio;

    if ($tipoPersona == 1) {
        $nombre = $nombreC.$ap.$am;
    }else if ($tipoPersona==2) {
        $nombre = $nombreC;
    }


$anioAc = date("Y");
$folioC=str_pad($folio, 5, "0", STR_PAD_LEFT);

$folioPresentacion = "AD/".$folioC."/".$anioAc;

//Enviar Email al dictaminador asignado
    require 'PHPMailer/PHPMailerAutoload.php';

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp-mail.outlook.com';
  $mail->Port = '587';
  $mail->Username = 'dictamun@igecem.gob.mx';
  $mail->Password = 'ahxQ5XU!';

  $mail->setFrom('dictamun@igecem.gob.mx', utf8_decode('Dirección de Catastro'));
  $mail->addAddress($emailc, 'destinatario');//Modificar a $emailDic
  $mail->Subject = 'Aviso de Dictamen -'.$nombre;
  $mail->Body = 'Folio de dictamen: '.$folioPresentacion;
  $mail->IsHTML(true);
  $mail->AddAttachment('../tmp/AcuseDeDictamen.pdf', $name = 'AvisoDeDictamen.pdf',  $encoding = 'base64', $type = 'application/pdf');

  if($mail->send()){
    echo 'Enviado';
  
    } else {
    echo 'Error';
  }
  //echo $mail->send();

		
// unlink('../tmp/AcuseDeDictamen.pdf'); //Elimina el archivo pdf que se envio de la carpeta tmp 
		 
?>