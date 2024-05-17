<?php
/*
// JOIN UNION PARA TODO EL SISTEMA
FOLIO, ID CONTRIBUYENTE, ID_DICTAMINADOR
select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
*/

class Controllermaster {

    public function validationpaswords($c,$curp,$rfc, $emails){
        $emialmm = strtolower($emails);
        $curpmm = strtoupper($curp);
        $rfcmm = strtoupper($rfc);

        $Sqlk2 = "select idetallusu as id_union,nombre_usuario,pasword,nombre_especialista from
       (select *  from usuario_v2 where tipo_usuario = 1 or tipo_usuario = 2  ) as a
       join
       (select * from especialistas_vigentes_v2 where  curp = '$curpmm' and rfc = '$rfcmm' )  as b
       on
        a.idetallusu = b.no_reg_autorizado;";
       $rs3 = pg_query( $c, $Sqlk2 );

       $validate_exixts = pg_num_rows($rs3);
       if( $validate_exixts != 0){
           while( $obj1ab = pg_fetch_object($rs3) ){

               $num_registro = $obj1ab->id_union;
               $nombreusus = $obj1ab->nombre_usuario;
               $contraseniavg = $obj1ab->pasword;
               $nomcomple = $obj1ab->nombre_especialista;
           }
          // echo 100;
           $html5boody = '<img src="cid:banner2" height="90%" width="50%"/><br><br><b>DIRECCION DE CATASTRO</b><br>Estimado (a):
            '.' '.utf8_decode($nomcomple).'. Con numero de REGISTRO
            '.$num_registro.' <br> '.'Le proporcionamos los datos de acceso al Sitema
             DICTAMUN para que pueda continuar con su proceso.<br><br><b>Usuario:
              '.$nombreusus.'<br>'.utf8_decode('Contraseña:').$contraseniavg.'</b><br><br> Sin mas por el momento reciba cordiales saludos.';
              
           
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
        $mail->addAddress($emialmm, 'destinatario');//Modificar a $emailDic
        $mail->Subject = 'Entrega de credenciales para el acceso al Sistema DICTAMUN IGECEM';
        $mail->AddEmbeddedImage('../_img/encabezadoDoc.png', 'banner2');
        $mail->Body = $html5boody;
        $mail->IsHTML(true);

        if($mail->send()){
        //echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN para que pueda continuar con su proceso:<br><br><b>Usuario: '.$nombreusus.'<br> Contrasenia: '.$contraseniavg.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';
        echo "100";
        } else {
        echo '50';
      }
    }else{
      echo "0";
    }


    }



    public function validarCorreo($c,$email,$curp,$rfc){
    	$emialmm = strtolower($email);
      $curpmm = strtoupper($curp);
      $rfcmm = strtoupper($rfc);
      $query1 = "select correo from especialistas_vigentes_v2 where correo = '$emialmm' and curp = '$curpmm' and rfc = '$rfcmm';";
      $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
      // Imprimiendo los resultados aarray
      $rs3 = pg_query( $c, $query1 );

      $validate_exixts = pg_num_rows($rs3);

      if( $validate_exixts >= "1" ){
        echo 1;


      }else{
        echo 2;
      }


    }

    public function reload_ravg($c,$folio,$eetapa,$clavecat){

      $query1 = "update estatusxfolio set etapa = $eetapa where folio_dictamen = $folio and cclave = '$clavecat' ;";
      $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
      echo "100";
    }


      public function deleted_fol_ravg($c,$folio){


        $query1 = "delete from public.aviso_dictamen_v2 where id_aviso = $folio; delete from public.estatusxfolio where folio_dictamen = $folio;";
        $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());

        $query2 ="select id_domicilio from public.inmuebles_v2 where folio = $folio;";
        $consulta=pg_exec($c,$query2);
        $numregs=pg_numrows($consulta);
        $num = 0;
        $tbl = "";
        for ($i=0; $i < $numregs; $i++) {

          $domicilio=pg_result($consulta,$i,'id_domicilio');
          $query3 = "delete from public.domicilio_v2 where id_domicilio = $domicilio;";
          $result3 = pg_query($query3) or die('La consulta fallo: ' . pg_last_error());



        }
        $query4 = "delete from public.contribuyentedatos_v2 where folio = $folio; delete from public.inmuebles_v2 where folio = $folio;";
        $result4 = pg_query($query4) or die('La consulta fallo: ' . pg_last_error());
        echo "100";


      }


}
