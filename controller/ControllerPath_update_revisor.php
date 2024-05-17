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

  public function comentarios_generalesxfolioxclv($con,$folio,$clave){

          $sql2="SELECT folio_dictamen, id_dictaminador, etapa, fecha, id_revisor, obs_rev, obs_municipio, cclave
          FROM public.estatusxfolio where folio_dictamen = $folio and cclave = '$clave'";

          $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
          $rs2 = pg_query( $con, $sql2 );
          while( $obj1 = pg_fetch_object($rs2) ){
            $data2[] = $obj1;
          }
        // Liberando el conjunto de resultados
        pg_free_result($result2);
        header('Content-type: application/json');
        echo json_encode($data2);


  }

  public function write_tiipolghojaverddownload_comment_revisor($con,$id,$comentario){
    $sql2="UPDATE public.listadocumentos_v2 set \"observacionRevisor\" = '$comentario' where id = $id;";
    pg_query($con, $sql2);
    echo "100";

  }


  public function revision_archivo_conhojasverdesDictamen_tipologiasn($con,$fol,$claveCat){

    session_start();
    $id_revisor=$_SESSION["idkey2"];


        $sql2="SELECT * FROM

(
  SELECT nombredoc, orden, comentario, trim(to_char(id_dictamen,'00000')) as flo,clavecastatral,id,\"observacionRevisor\" as comentariorevi,
   (CASE WHEN orden =10 THEN 'Archivo de Avaluo (DICTAVAL).'
WHEN orden =11 THEN 'Archivo de Construcción (DICTAVAL).'
WHEN orden =14 THEN 'Formato del avalúo.'
WHEN orden =12 THEN 'Tipología de construcción'
WHEN orden =32 THEN 'Tipología de construcción'
WHEN orden =15 THEN 'Relacion de Indivisos.'

WHEN orden =77 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =78 THEN 'Documento que acredite la propiedad.'
WHEN orden =86 THEN 'Planos de Factores.'
WHEN orden =88 THEN 'Boleta Predial.'

WHEN orden =99 THEN 'Titulo de Propiedad.'
WHEN orden =98 THEN 'Boleta Predial.'
WHEN orden =97 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =96 THEN 'Planos.'
WHEN orden =95 THEN 'Croquis de Localización'
WHEN orden =94 THEN 'Otros.'

WHEN orden =76 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =75 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =74 THEN 'Planos de Factores.'

WHEN orden =90 THEN 'Acta Constitutiva.'
WHEN orden =89 THEN 'Nombramiento del representante Legal.'
WHEN orden =87 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =85 THEN 'Croquis de Localización.'
WHEN orden =84 THEN 'Otros.'

WHEN orden =83 THEN 'Documento que acredite la propiedad.'
WHEN orden =82 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =81 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =80 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =79 THEN 'Planos de Factores.'
WHEN orden =120 THEN 'Imagen de Fachada.'

END) as nombrearchivo
FROM public.listadocumentos_v2
where id_dictamen = $fol and clavecastatral = '$claveCat' and orden = 12 order by id
) as aa
union
 select * from (
  SELECT nombredoc, orden, comentario, trim(to_char(id_dictamen,'00000')) as flo,clavecastatral,id,\"observacionRevisor\" as comentariorevi,
   (CASE WHEN orden =10 THEN 'Archivo de Avaluo (DICTAVAL).'
WHEN orden =11 THEN 'Archivo de Construcción (DICTAVAL).'
WHEN orden =14 THEN 'Formato del avalúo.'
WHEN orden =12 THEN 'Tipología de construcción'
WHEN orden =32 THEN 'Tipología de construcción'
WHEN orden =15 THEN 'Relacion de Indivisos.'

WHEN orden =77 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =78 THEN 'Documento que acredite la propiedad.'
WHEN orden =86 THEN 'Planos de Factores.'
WHEN orden =88 THEN 'Boleta Predial.'

WHEN orden =99 THEN 'Titulo de Propiedad.'
WHEN orden =98 THEN 'Boleta Predial.'
WHEN orden =97 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =96 THEN 'Planos.'
WHEN orden =95 THEN 'Croquis de Localización'
WHEN orden =94 THEN 'Otros.'

WHEN orden =76 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =75 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =74 THEN 'Planos de Factores.'

WHEN orden =90 THEN 'Acta Constitutiva.'
WHEN orden =89 THEN 'Nombramiento del representante Legal.'
WHEN orden =87 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =85 THEN 'Croquis de Localización.'
WHEN orden =84 THEN 'Otros.'

WHEN orden =83 THEN 'Documento que acredite la propiedad.'
WHEN orden =82 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =81 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =80 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =79 THEN 'Planos de Factores.'
WHEN orden =120 THEN 'Imagen de Fachada.'

END) as nombrearchivo
FROM public.listadocumentos_v2
where id_dictamen = $fol and clavecastatral = '$claveCat' and orden = 32 order by id
) as bb";

      $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
      $rs2 = pg_query( $con, $sql2 );
      while( $obj1 = pg_fetch_object($rs2) ){
        $data2[] = $obj1;
      }
    // Liberando el conjunto de resultados
    pg_free_result($result2);
    header('Content-type: application/json');
    echo json_encode($data2);


  }


  public function write_download_comment_revisor($con,$id,$comentario){
    $sql2="UPDATE public.listadocumentos_v2 set \"observacionRevisor\" = '$comentario' where id = $id;";
    pg_query($con, $sql2);
    echo "100";

  }

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



      public function revisionDictamen($con,$fol,$claveCat){

      	session_start();
      	$id_revisor=$_SESSION["idkey2"];


      			$sql2="SELECT nombredoc, orden, comentario, trim(to_char(id_dictamen,'00000')) as flo,clavecastatral,id,\"observacionRevisor\" as comentariorevi,
       (CASE WHEN orden =10 THEN 'Archivo de Avaluo (DICTAVAL).'
WHEN orden =11 THEN 'Archivo de Construcción (DICTAVAL).'
WHEN orden =14 THEN 'Formato del avalúo.'
WHEN orden =15 THEN 'Relacion de Indivisos.'

WHEN orden =77 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =78 THEN 'Documento que acredite la propiedad.'
WHEN orden =86 THEN 'Planos de Factores.'
WHEN orden =88 THEN 'Boleta Predial.'

WHEN orden =99 THEN 'Titulo de Propiedad.'
WHEN orden =98 THEN 'Boleta Predial.'
WHEN orden =97 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =96 THEN 'Planos.'
WHEN orden =95 THEN 'Croquis de Localización'
WHEN orden =94 THEN 'Otros.'

WHEN orden =76 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =75 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =74 THEN 'Planos de Factores.'

WHEN orden =90 THEN 'Acta Constitutiva.'
WHEN orden =89 THEN 'Nombramiento del representante Legal.'
WHEN orden =87 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =85 THEN 'Croquis de Localización.'
WHEN orden =84 THEN 'Otros.'

WHEN orden =83 THEN 'Documento que acredite la propiedad.'
WHEN orden =82 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =81 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =80 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =79 THEN 'Planos de Factores.'
WHEN orden =120 THEN 'Imagen de Fachada.'

END) as nombrearchivo
  FROM public.listadocumentos_v2
  where id_dictamen = $fol and clavecastatral = '$claveCat' and orden != 12 and orden != 32
  order by orden";

      		$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
          $rs2 = pg_query( $con, $sql2 );
          while( $obj1 = pg_fetch_object($rs2) ){
            $data2[] = $obj1;
          }
      	// Liberando el conjunto de resultados
      	pg_free_result($result2);
      	header('Content-type: application/json');
      	echo json_encode($data2);


      }


      public function revisionDictamen_tipologiasn($con,$fol,$claveCat){

        session_start();
        $id_revisor=$_SESSION["idkey2"];


            $sql2="SELECT * FROM

    (
      SELECT nombredoc, orden, comentario, trim(to_char(id_dictamen,'00000')) as flo,clavecastatral,id,\"observacionRevisor\" as comentariorevi,
       (CASE WHEN orden =10 THEN 'Archivo de Avaluo (DICTAVAL).'
    WHEN orden =11 THEN 'Archivo de Construcción (DICTAVAL).'
    WHEN orden =14 THEN 'Formato del avalúo.'
    WHEN orden =12 THEN 'Tipología de construcción'
    WHEN orden =32 THEN 'Tipología de construcción'
    WHEN orden =15 THEN 'Relacion de Indivisos.'

    WHEN orden =77 THEN 'Plano arquitectónico o croquis de construcción.'
    WHEN orden =78 THEN 'Documento que acredite la propiedad.'
    WHEN orden =86 THEN 'Planos de Factores.'
    WHEN orden =88 THEN 'Boleta Predial.'

    WHEN orden =99 THEN 'Titulo de Propiedad.'
    WHEN orden =98 THEN 'Boleta Predial.'
    WHEN orden =97 THEN 'Identificación Oficial del propietario o representante legal.'
    WHEN orden =96 THEN 'Planos.'
    WHEN orden =95 THEN 'Croquis de Localización'
    WHEN orden =94 THEN 'Otros.'

    WHEN orden =76 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
    WHEN orden =75 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
    WHEN orden =74 THEN 'Planos de Factores.'

    WHEN orden =90 THEN 'Acta Constitutiva.'
    WHEN orden =89 THEN 'Nombramiento del representante Legal.'
    WHEN orden =87 THEN 'Identificación Oficial del propietario o representante legal.'
    WHEN orden =85 THEN 'Croquis de Localización.'
    WHEN orden =84 THEN 'Otros.'

    WHEN orden =83 THEN 'Documento que acredite la propiedad.'
    WHEN orden =82 THEN 'Plano arquitectónico o croquis de construcción.'
    WHEN orden =81 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
    WHEN orden =80 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
    WHEN orden =79 THEN 'Planos de Factores.'
    WHEN orden =120 THEN 'Imagen de Fachada.'

    END) as nombrearchivo
    FROM public.listadocumentos_v2
    where id_dictamen = $fol and clavecastatral = '$claveCat' and orden = 12 order by id
    ) as aa
    union
     select * from (
      SELECT nombredoc, orden, comentario, trim(to_char(id_dictamen,'00000')) as flo,clavecastatral,id,\"observacionRevisor\" as comentariorevi,
       (CASE WHEN orden =10 THEN 'Archivo de Avaluo (DICTAVAL).'
    WHEN orden =11 THEN 'Archivo de Construcción (DICTAVAL).'
    WHEN orden =14 THEN 'Formato del avalúo.'
    WHEN orden =12 THEN 'Tipología de construcción'
    WHEN orden =32 THEN 'Tipología de construcción'
    WHEN orden =15 THEN 'Relacion de Indivisos.'

    WHEN orden =77 THEN 'Plano arquitectónico o croquis de construcción.'
    WHEN orden =78 THEN 'Documento que acredite la propiedad.'
    WHEN orden =86 THEN 'Planos de Factores.'
    WHEN orden =88 THEN 'Boleta Predial.'

    WHEN orden =99 THEN 'Titulo de Propiedad.'
    WHEN orden =98 THEN 'Boleta Predial.'
    WHEN orden =97 THEN 'Identificación Oficial del propietario o representante legal.'
    WHEN orden =96 THEN 'Planos.'
    WHEN orden =95 THEN 'Croquis de Localización'
    WHEN orden =94 THEN 'Otros.'

    WHEN orden =76 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
    WHEN orden =75 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
    WHEN orden =74 THEN 'Planos de Factores.'

    WHEN orden =90 THEN 'Acta Constitutiva.'
    WHEN orden =89 THEN 'Nombramiento del representante Legal.'
    WHEN orden =87 THEN 'Identificación Oficial del propietario o representante legal.'
    WHEN orden =85 THEN 'Croquis de Localización.'
    WHEN orden =84 THEN 'Otros.'

    WHEN orden =83 THEN 'Documento que acredite la propiedad.'
    WHEN orden =82 THEN 'Plano arquitectónico o croquis de construcción.'
    WHEN orden =81 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
    WHEN orden =80 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
    WHEN orden =79 THEN 'Planos de Factores.'
    WHEN orden =120 THEN 'Imagen de Fachada.'

    END) as nombrearchivo
    FROM public.listadocumentos_v2
    where id_dictamen = $fol and clavecastatral = '$claveCat' and orden = 32 order by id
    ) as bb";

          $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

          $validate_exixtsxxxxxxxxx = pg_num_rows($result2);
        if( $validate_exixtsxxxxxxxxx >= "1" ){
             $rs2 = pg_query( $con, $sql2 );
          while( $obj1 = pg_fetch_object($rs2) ){
            $data2[] = $obj1;
          }
        // Liberando el conjunto de resultados
        pg_free_result($result2);
        header('Content-type: application/json');
        echo json_encode($data2);

        }else{
          echo "50";

        }





      }

      public function revisionDictamen_infopredio($con,$folio,$clave){
        $sql2="
    select ava_pro_pre,ava_su_te_pr as superficie, ava_vc_terr as valorpropio,
    ava_vc_com as valorcomun, ava_frente as frente, ava_fondo as fondo,
    ava_altura as altura, ava_ti_co_do as tipoinmueble, ava_area_in as areaInscrita, ava_su_to_do as areatotal,
    ava_aprov as aprovechable, ava_posic as factorposicion, ava_fp1 as factorfrente, ava_fp2 as factorfondo,
    ava_fp3 as factorirregularidad, ava_fp4 as factorarea, ava_fp5 as factortopografia, ava_fp6 as factorposicion , ava_posic as posicion22 ,
    ava_fp7 as factorrestriccion, b.cclave as clave, ava_porcen,round((ava_vc_terr + ava_vc_com),2) as sumavalorterravg

    --select *
    from (select * from contribuyentedatos_v2 where folio = $folio) as a

    JOIN (  select distinct ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
           ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
           ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,
           ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
           ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
           ava_fec_imp, ava_aprov, folio_dictamun, cclave from dictaval_avaluos where folio_dictamun = $folio and cclave = '$clave' group by  ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
           ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
           ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,
           ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
           ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
           ava_fec_imp, ava_aprov, folio_dictamun, cclave ) as b

    ON a.folio=b.folio_dictamun

    JOIN (
      select cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
           con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
           dicta_apellido_materno_not, dicta_nombre_not, nota_not, ava_den_pob,
           ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
           ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
           clave_catastral, ava_imp_pred, md5,  folio_dictamun, cclave from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clave'
           group by
           cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
           con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
           dicta_apellido_materno_not, dicta_nombre_not, nota_not, ava_den_pob,
           ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
           ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
           clave_catastral, ava_imp_pred, md5, folio_dictamun, cclave) as c

    ON b.folio_dictamun=c.folio_dictamun

    where folio=$folio and b.cclave='$clave';";

       $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());


        $rs2 = pg_query( $con, $sql2 );
         while( $obj1 = pg_fetch_object($rs2) ){
        $data2[] = $obj1;
      }
      // Liberando el conjunto de resultados
      pg_free_result($result2);


      header('Content-type: application/json');
      echo json_encode($data2);


      }


      public function download_comment_revisor($con,$id,$comentario){
        $sql2="UPDATE public.listadocumentos_v2 set \"observacionRevisor\" = '$comentario' where id = $id;";
        pg_query($con, $sql2);
        echo "100";

      }



      public function revisionDictamen_preautorizado_con_hojav($con,$fol,$claveCat){
        //PRE AUTORIZADO / CON ARCHIVO EN HOJAS VERDES"

      	session_start();
      	$id_revisor=$_SESSION["idkey2"];


      			$sql2="SELECT nombredoc, orden, comentario, trim(to_char(id_dictamen,'00000')) as flo,clavecastatral,id,\"observacionRevisor\" as comentariorevi,
       (CASE WHEN orden =10 THEN 'Archivo de Avaluo (DICTAVAL).'
WHEN orden =11 THEN 'Archivo de Construcción (DICTAVAL).'
WHEN orden =14 THEN 'Formato del avalúo.'
WHEN orden =15 THEN 'Relacion de Indivisos.'

WHEN orden =77 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =78 THEN 'Documento que acredite la propiedad.'
WHEN orden =86 THEN 'Planos de Factores.'
WHEN orden =88 THEN 'Boleta Predial.'

WHEN orden =99 THEN 'Titulo de Propiedad.'
WHEN orden =98 THEN 'Boleta Predial.'
WHEN orden =97 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =96 THEN 'Planos.'
WHEN orden =95 THEN 'Croquis de Localización'
WHEN orden =94 THEN 'Otros.'

WHEN orden =76 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =75 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =74 THEN 'Planos de Factores.'

WHEN orden =90 THEN 'Acta Constitutiva.'
WHEN orden =89 THEN 'Nombramiento del representante Legal.'
WHEN orden =87 THEN 'Identificación Oficial del propietario o representante legal.'
WHEN orden =85 THEN 'Croquis de Localización.'
WHEN orden =84 THEN 'Otros.'

WHEN orden =83 THEN 'Documento que acredite la propiedad.'
WHEN orden =82 THEN 'Plano arquitectónico o croquis de construcción.'
WHEN orden =81 THEN 'Plano arquitectónico contenido edificaciones de su uso privativo.'
WHEN orden =80 THEN 'Plano del conjunto donde señalan las deferentes superficies constructivas.'
WHEN orden =79 THEN 'Planos de Factores.'
WHEN orden =120 THEN 'Imagen de Fachada.'

END) as nombrearchivo
  FROM public.listadocumentos_v2
  where id_dictamen = $fol and clavecastatral = '$claveCat' and orden != 12 and orden != 32
  order by orden";

      		$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
          $rs2 = pg_query( $con, $sql2 );
          while( $obj1 = pg_fetch_object($rs2) ){
            $data2[] = $obj1;
          }
      	// Liberando el conjunto de resultados
      	pg_free_result($result2);
      	header('Content-type: application/json');
      	echo json_encode($data2);


      }



}
