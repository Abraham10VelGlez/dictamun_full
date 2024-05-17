
<?php

class Controllermaster {

	public function validarCorreo($c,$email){
		$emialmm = strtolower($email);
	  $query1 = "select correo from especialistas_vigentes_v2 where correo = '$emialmm'";
	  $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	  // Imprimiendo los resultados aarray
	  $rs3 = pg_query( $c, $query1 );

	  $validate_exixts = pg_num_rows($rs3);

	  if( $validate_exixts >= "1" ){
	    echo "1";


	  }else{
	    echo "2";
	  }


	}
public function new_user($c,$opcz,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8){

	$xx1 = ucwords(strtolower($x1));
	$xx2 = ucwords(strtolower($x2));
	$xx3 = ucwords(strtolower($x3));
	$xx4 = strtoupper($x4);
	$xx5 = strtoupper($x5);
	$xx6 = strtolower($x6);
//die();

	$query = "SELECT  idetallusu as numregx FROM usuario_v2 order by idetallusu;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;

	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	//pg_close($c);
	$sg="";
foreach ($data2 as $departamento) {
    $sg.=$departamento->numregx.",";

}
$sg.="0";
//print_r($sg);
//echo"<br>";
$array = array(
    "n1" =>  "1",
    "n2" => "2",
    "n4" => "4",
    "n3" => "3",
    "n6" => "6",
"n7" => "7"
);

$array = explode(",", $sg);
 $testArray = array($sg);
$arrayRange = range(1,max($array));
$missingValues = array_diff($arrayRange,$array);
foreach ($missingValues as &$valor) {
    $valora = $valor;
}
$e = $missingValues;
$nuevo_numero_de_registro_calculado = reset($e);
//echo  $nuevo_numero_de_registro_calculado = $missingValues[0];
// SE AUTOMARIZA EL USUARIO Y CONTRASEÑA
$f=$xx1;
$g=$xx4;
$H = $xx5;
$cel =$x7;

$rest1 = substr($f, 1,3);
$rest2 = substr($g, 1,2);
$rest3 = substr($H, 2,4);
$rest4 = substr($cel, 2,4);
$rest5 = substr($cel, 1,4);
$pwd = $rest1.$rest4.$nuevo_numero_de_registro_calculado;

	if($opcz == "5"){ // si es 5 es una delegacion dada de alta si no continua puede ser un revisor o un dictaminador
 $NombrUs="Delg"."2022".$opcz;
 $sqlNewUs ="INSERT INTO usuario_v2(
            nombre_usuario, pasword, tipo_usuario, activo, idetallusu, caducidad)
    VALUES ('$NombrUs','$pwd',5 , 'false', $nuevo_numero_de_registro_calculado, 100);";


		$nameall = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx1) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx2) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx3);
		$curp = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx4);
		$rfc = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx5);
		$nombrenormal = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx1);
		$apellidopart = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx2);
		$apellidomart = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx3);

		$emailavg = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx6);
		$celavg = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x7);

	$SQLiUSER = "INSERT INTO especialistas_vigentes_v2(
            num_registro, nombre_especialista, no_reg_autorizado, curp, rfc,

            nombre, ap_paterno, ap_materno, correo, telefono, tipo_usuariofk)

    VALUES ($nuevo_numero_de_registro_calculado, '$nameall' , $nuevo_numero_de_registro_calculado, '$curp','$rfc',
            '$nombrenormal','$apellidopart',
            '$apellidomart', '$emailavg','$celavg', 5);";


             /*
             VALUES ($nuevo_numero_de_registro_calculado, '$xx1 $xx2 $xx3' , $nuevo_numero_de_registro_calculado, '$xx4','$xx5',
            '$xx1','$xx2','$xx3', '$xx6', '$x7', 5);";
             */
	//die();
	pg_query($c, $sqlNewUs) or die('La consulta fallo: ' . pg_last_error());
	pg_query($c, $SQLiUSER)  or die('La consulta fallo: ' . pg_last_error());
	// Cerrando la conexiÃ³n
//	pg_close($c);
	//echo"10";
	}else{
		// nuevo dictaminador y revisor

		//$NombrUs="Dict".$rest1.$nuevo_numero_de_registro_calculado."2022";
		$new_user_studio = "Contrib".$rest1.$nuevo_numero_de_registro_calculado."2024";
		$pwd_studio = $pwd;


		$sqlNewUs ="INSERT INTO usuario_v2(
            nombre_usuario, pasword, tipo_usuario, activo, idetallusu, caducidad)
    VALUES ('$new_user_studio','$pwd_studio',$opcz , 'false', $nuevo_numero_de_registro_calculado, 100);";

		$nameall = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx1) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx2) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx3);
		$curp = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx4);
		$rfc = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx5);
		$nombrenormal = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx1);
		$apellidopart = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx2);
		$apellidomart = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx3);

		$emailavg = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx6);
		$celavg = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x7);


	 $SQLiUSER = "INSERT INTO especialistas_vigentes_v2(
             num_registro, nombre_especialista, no_reg_autorizado, curp, rfc,
             nombre, ap_paterno, ap_materno, correo, telefono, tipo_usuariofk)
     VALUES ($nuevo_numero_de_registro_calculado, '$nameall' , $nuevo_numero_de_registro_calculado, '$curp','$rfc',
             '$nombrenormal','$apellidopart',
             '$apellidomart', '$emailavg','$celavg', 1);";


	//die();
	pg_query($c, $sqlNewUs)  or die('La consulta fallo: ' . pg_last_error());
	pg_query($c, $SQLiUSER)  or die('La consulta fallo: ' . pg_last_error());
	
	}

   $Sqlk2 = "select nombre_usuario,pasword from usuario_v2 where  idetallusu =".$nuevo_numero_de_registro_calculado;
      $rs3 = pg_query( $c, $Sqlk2 );

      $validate_exixts = pg_num_rows($rs3);
      if( $validate_exixts != 0){
          while( $obj1ab = pg_fetch_object($rs3) ){
              $valx = $obj1ab->pasword;
          }
}else{
  //$valx = "COMUNICATE CON EL ADMINISTRADOR, PARA QUE TE CONFIRME TU ACCESO";
  $valx = $pwd;

}
$new_user_studio = "Contrib".$rest1.$nuevo_numero_de_registro_calculado."2024";

// Cerrando la conexiÃ³n
  pg_close($c);
	echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso:<br><br><b>Usuario: '.$new_user_studio.'<br> Contraseña: '.$valx.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';
	//Enviar Email al dictaminador asignado
	/*
	try {
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
  $mail->addAddress($xx6, 'destinatario');//Modificar a $emailDic
  $mail->Subject = 'Entrega de credenciales para el acceso al Sistema DICTAMUN IGECEM';
  $mail->AddEmbeddedImage('../_img/encabezadoDoc.png', 'banner2');
  $mail->Body = '<img src="cid:banner2" height="90%" width="50%"/><br><br><b>DIRECCION DE CATASTRO</b><br>Estimado (a): '.' '.utf8_decode($xx1).' '.utf8_decode($xx2).' '.utf8_decode($xx3).'.<br> '.'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso.<br><br><b>Usuario: '.$NombrUs.'<br>'.utf8_decode('Contraseña:').$valx.'</b><br><br> Sin mas por el momento reciba cordiales saludos.';
  $mail->IsHTML(true);
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

  if($mail->send()){
    echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso:<br><br><b>Usuario: '.$NombrUs.'<br> Contrasenia: '.$valx.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';

    } else {
    echo 'Error';
  }
	*/
  //echo $mail->send();

}



}
