<?php

class Controllermaster2 {


public function creartu_funcion($c,$user,$pass){


}
public function tipologias($con,$fol,$clave){

  $sql2="select distinct con_num_con as tipologia, con_uni_ren as construccion, con_uso as uso,
con_clase as clase, con_catego as categoria, con_super as superficie,
con_vc_con as valorconstruccion ,con_edad as edad, con_estado as conservacion, con_f1c as factoredad,
con_f2c as factorconservacion, con_f3c as factorniveles, con_piso as niveles, con_priva as tipoconstruccion, c.cclave as clave, ava_vc_terr as valorpropio
 from (select * from construcciones_v2 where folio_dictamun = $fol and cclave = '$clave') AS c join (select * from  dictaval_avaluos
  where folio_dictamun = $fol and cclave = '$clave') as d on c.folio_dictamun= d.folio_dictamun
WHERE c.folio_dictamun= $fol and c.cclave='$clave' and d.cclave='$clave' order by con_num_con;";

   $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

    $rs2 = pg_query( $con, $sql2 );
    $validate_exixts = pg_num_rows($rs2);

    	if ($validate_exixts == 0) {
    		echo "10";
    	}else{
    		   while( $obj1 = pg_fetch_object($rs2) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);


  header('Content-type: application/json');
  echo json_encode($data2);

    	}


}
public function predios($con,$fol,$clave){

    $sql2="
select ava_pro_pre,ava_su_te_pr as superficie, ava_vc_terr as valorpropio,
ava_vc_com as valorcomun, ava_frente as frente, ava_fondo as fondo,
ava_altura as altura, ava_ti_co_do as tipoinmueble, ava_area_in as areaInscrita, ava_su_to_do as areatotal,
ava_aprov as aprovechable, ava_posic as factorposicion, ava_fp1 as factorfrente, ava_fp2 as factorfondo,
ava_fp3 as factorirregularidad, ava_fp4 as factorarea, ava_fp5 as factortopografia, ava_fp6 as factorposicion , ava_posic as posicion22 ,
ava_fp7 as factorrestriccion, b.cclave as clave, ava_porcen,round((ava_vc_terr + ava_vc_com),2) as sumavalorterravg

--select *
from (select * from contribuyentedatos_v2 where folio = $fol) as a

JOIN (  select distinct ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
       ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
       ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,
       ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
       ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
       ava_fec_imp, ava_aprov, folio_dictamun, cclave from dictaval_avaluos where folio_dictamun = $fol and cclave = '$clave' group by  ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
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
       clave_catastral, ava_imp_pred, md5,  folio_dictamun, cclave from dictaval_notasfis where folio_dictamun = $fol and cclave = '$clave'
       group by
       cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
       con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
       dicta_apellido_materno_not, dicta_nombre_not, nota_not, ava_den_pob,
       ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
       ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
       clave_catastral, ava_imp_pred, md5, folio_dictamun, cclave) as c

ON b.folio_dictamun=c.folio_dictamun

where folio=$fol and b.cclave='$clave';";

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



/*public function comentariosRevisorArc($con,$idm,$folio,$comentarioDicta,$comentarioConstruc,$comentarioAvaluo,$comentarioEscritura,$comentarioCroquis,$comentarioPredial,$comentarioPlanos,$comentarioIndivisos,$comentariOtros,$comentarioGeneral,$comentarioGReporte,$comentarioActa,$comentarioDocAcreditaP,$comentarioidentificacionOf2,$comentarioCroquis22,$comentarioedificacionesUsoPriv2,$comentariosuperficiesConstr2,$comentariofactores2,$comentarioCroquis223,$comentarioFachadas){
	$sql="select baldio from inmuebles_v2 where folio=$folio and cve_catastral ='$idm'";
	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

	$rs = pg_query( $con, $sql );

	// $validate_exixts = pg_num_rows($rs);
	while( $obj1 = pg_fetch_object($rs) ){
		$data2[] = $obj1;
	}
	$tipoPredio = $data2[0]->baldio;

	if ($tipoPredio == 't') {
		//dictaval
		$sql4 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDicta' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=10;";
		pg_query($con, $sql4);
		//construcciones
		$sql5 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioConstruc' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=11;";
		pg_query($con, $sql5);
		//Avaluo frimado por contribuyente y dictaminador
		$sql11 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioAvaluo' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=14;";
		pg_query($con, $sql11);
		//Indivisos de condominio
		$sql12 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioIndivisos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=15;";
		pg_query($con, $sql12);
		//Titulo de Propiedad
		$sql6 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioEscritura' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=99;";
		pg_query($con, $sql6);
		//croquis de Localizacion
		$sql7 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=95;";
		pg_query($con, $sql7);
		//Boleta predial
		$sql8 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPredial' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=98;";
		pg_query($con, $sql8);
		//Planos
		$sql9 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPlanos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=96;";
		pg_query($con, $sql9);
		//Otros
		$sql10 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariOtros' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=94;";
		pg_query($con, $sql10);
		//documento que acredita la propiedad - antes 78
		$sql78 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDocAcreditaP' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=83;";
		pg_query($con, $sql78);
		//identificacion oficial del propietario
		$sql97 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioidentificacionOf2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=97;";
		pg_query($con, $sql97);
		//Planoarquitectonicocroquisconstruccion  - antes 77
		$sql77 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis22' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=82;";
		pg_query($con, $sql77);
		//Planoarquitectonicodesuusoprivativo - antes 76
		$sql76 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioedificacionesUsoPriv2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=81;";
		pg_query($con, $sql76);
		//Planodelconjuntosuperficiesconstructivas - antes 75
		$sql75 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariosuperficiesConstr2' WHERE id_dictamen=$folio and clavecastatral='$idm'  and orden=80;";
		pg_query($con, $sql75);
		//PlanosdeFactores - antes 74
		$sql74 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariofactores2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=79;";
		pg_query($con, $sql74);
		// imagen de fachada
		$sql120 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioFachadas' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=120;";
		pg_query($con, $sql120);

		//nombramiento legal
		$sql89 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioFachadas' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=89;";
		pg_query($con, $sql89);

		//acta constitutiva
		$sql90 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioFachadas' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=90;";
		pg_query($con, $sql90);


		echo "Comentarios Guardados(Persona fisica)";

	}else if ($tipoPredio == 'f') {
		//dictaval
		$sql4 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDicta' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=10;";
		pg_query($con, $sql4);
		//construcciones
		$sql5 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioConstruc' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=11;";
		pg_query($con, $sql5);
		//Avaluo frimado por contribuyente y dictaminador
		$sql12 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioAvaluo' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=14;";
		pg_query($con, $sql12);
		//Indivisos de condominio
		$sql13 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioIndivisos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=15;";
		pg_query($con, $sql13);
		//nombramiento legal
		$sql6 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioEscritura' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=89;";
		pg_query($con, $sql6);
		//croquis de Localizacion
		$sql7 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=85;";
		pg_query($con, $sql7);
		//Boleta predial
		$sql8 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPredial' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=88;";
		pg_query($con, $sql8);
		//Planos
		$sql9 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis223' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=86;";
		pg_query($con, $sql9);
		//Otros
		$sql10 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariOtros' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=84;";
		pg_query($con, $sql10);
		//Acta constitutiva
		$sql11 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioActa' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=90;";
		pg_query($con, $sql11);
		//Documentoacreditapropiedad - antes 83
		$sql83 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDocAcreditaP' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=78;";
		pg_query($con, $sql83);
		//IdentificacionOficialdelpropietarioorepresentantelegal
		$sql87 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioidentificacionOf2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=87;";
		pg_query($con, $sql87);
		//
		// $sql77 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis22' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=77;";
		//pg_query($con, $sql77);


		//Planoarquitectonicocroquisconstruccion - antes 82
		$sql82 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPlanos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=77;";
		pg_query($con, $sql82);
		//Planoarquitectonicodesuusoprivativo - antes 81
		$sql81 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioedificacionesUsoPriv2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=76;";
		pg_query($con, $sql81);
		//Planodelconjuntosuperficiesconstructivas - antes 80
		$sql80 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariosuperficiesConstr2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=75;";
		pg_query($con, $sql80);
		//PlanosdeFactores - antes 79
		$sql79 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariofactores2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=74;";
		pg_query($con, $sql79);
		// tipologias.
		$sql12 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioFachadas' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=12;";
		pg_query($con, $sql12);

		$sql99 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioEscritura' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=99;";
		pg_query($con, $sql99);

		echo "Comentarios Guardados(Persona Moral)";

	}


}*/


public function comentariosRevisorArc($con,$idm,$folio,$comentarioDicta,$comentarioConstruc,$comentarioAvaluo,$comentarioEscritura,$comentarioCroquis,$comentarioPredial,$comentarioPlanos,$comentarioIndivisos,$comentariOtros,$comentarioGeneral,$comentarioGReporte,$comentarioActa,$comentarioDocAcreditaP,$comentarioidentificacionOf2,$comentarioCroquis22,$comentarioedificacionesUsoPriv2,$comentariosuperficiesConstr2,$comentariofactores2,$comentarioCroquis223,$comentarioFachadas,$comentarioNombra,$comentariocomennombrleg2){


		//dictaval

		$sql4 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDicta' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=10;";
		pg_query($con, $sql4);
		//construcciones
		$sql5 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioConstruc' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=11;";
		pg_query($con, $sql5);
		//Avaluo frimado por contribuyente y dictaminador
		$sql11 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioAvaluo' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=14;";
		pg_query($con, $sql11);
		//Indivisos de condominio
		$sql12 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioIndivisos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=15;";
		pg_query($con, $sql12);
		//Titulo de Propiedad
		$sql6 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioEscritura' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=99;";
		pg_query($con, $sql6);
		//croquis de Localizacion
		$sql7 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=95;";
		pg_query($con, $sql7);
		//Boleta predial
		$sql8 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPredial' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=98;";
		pg_query($con, $sql8);
		//Planos
		$sql9 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis22' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=96;";
		pg_query($con, $sql9);
		//Otros
		$sql10 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariOtros' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=94;";
		pg_query($con, $sql10);
		//documento que acredita la propiedad - antes 78
		$sql78 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDocAcreditaP' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=83;";
		pg_query($con, $sql78);
		//identificacion oficial del propietario
		$sql97 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioidentificacionOf2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=97;";
		pg_query($con, $sql97);
		//Planoarquitectonicocroquisconstruccion  - antes 77
		$sql77 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPlanos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=82;";
		pg_query($con, $sql77);
		//Planoarquitectonicodesuusoprivativo - antes 76
		$sql76 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioedificacionesUsoPriv2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=81;";
		pg_query($con, $sql76);
		//Planodelconjuntosuperficiesconstructivas - antes 75
		$sql75 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariosuperficiesConstr2' WHERE id_dictamen=$folio and clavecastatral='$idm'  and orden=80;";
		pg_query($con, $sql75);
		//PlanosdeFactores - antes 74
		$sql74 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariofactores2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=79;";
		pg_query($con, $sql74);
		// imagen de fachada
		$sql120 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioFachadas' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=120;";
		pg_query($con, $sql120);
		//nombramiento legal
		$sql89 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioNombra' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=89;";
		pg_query($con, $sql89);
		//acta constitutiva
		$sql90 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioActa' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=90;";
		pg_query($con, $sql90);
		//$sql89 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariocomennombrleg2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=89;";
	//	pg_query($con, $sql89);



		//croquis de Localizacion
		$sql7 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis223' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=85;";
		pg_query($con, $sql7);
		//Boleta predial
		$sql8 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPredial' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=88;";
		pg_query($con, $sql8);
		//Planos
		$sql9 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioCroquis' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=86;";
		pg_query($con, $sql9);
		//Otros
		$sql10 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariOtros' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=84;";
		pg_query($con, $sql10);
		//Acta constitutiva
		$sql11 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioActa' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=90;";
		pg_query($con, $sql11);
		//Documentoacreditapropiedad - antes 83
		$sql83 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioDocAcreditaP' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=78;";
		pg_query($con, $sql83);
		//IdentificacionOficialdelpropietarioorepresentantelegal
		$sql87 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioidentificacionOf2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=87;";
		pg_query($con, $sql87);


		//Planoarquitectonicocroquisconstruccion - antes 82
		$sql82 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioPlanos' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=77;";
		pg_query($con, $sql82);
		//Planoarquitectonicodesuusoprivativo - antes 81
		$sql81 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioedificacionesUsoPriv2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=76;";
		pg_query($con, $sql81);
		//Planodelconjuntosuperficiesconstructivas - antes 80
		$sql80 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariosuperficiesConstr2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=75;";
		pg_query($con, $sql80);
		//PlanosdeFactores - antes 79
		$sql79 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentariofactores2' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=74;";
		pg_query($con, $sql79);
		// tipologias.
		$sql12 = "UPDATE listadocumentos_v2 SET \"observacionRevisor\"='$comentarioFachadas' WHERE id_dictamen=$folio and clavecastatral='$idm' and orden=12;";
		pg_query($con, $sql12);



		echo "Comentarios Guardados";

}



public function inmueblesArevisar($con,$idIN,$anio,$flioavg){
	//echo $idIN;
	session_start();
	$id_revisor=$_SESSION["idkey2"];
	// echo $id_revisor;
	/*  $sql="
	 select (lpad(folio::text, 5, '0')) as folio
	 from inmuebles_v2 as a JOIN estatusxfolio as b
	 on a.cve_catastral = b.cclave
	 where cve_catastral='$idIN' and etapa=4 or etapa=12 and id_revisor=$id_revisor and b.cclave='$idIN';";
	 */
	///////Para validar el a�o*///////

	/*$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from inmuebles_v2 as a JOIN estatusxfolio as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=4 or etapa=12 or etapa=51 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=".$anio;*/
/*  CODIGO ORIGINAL
	$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN') as a JOIN
	(select * from estatusxfolio where cclave = '$idIN') as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=15 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio";*/

/*correccion de sistema avg 14 /07 / 2022 */
//flioavg
	/*$sqlvalidacion="
	select distinct (lpad(a.folio::text, 5, '0')) as folio, etapa from
	(select folio, aniodictaminar , cve_catastral from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN' and folio = $flioavg ) as a JOIN
	(select * from estatusxfolio where cclave = '$idIN' and folio_dictamen = (select folio from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN' and folio = $flioavg )) as b
	on a.cve_catastral = b.cclave";

	$resultados = pg_query( $con, $sqlvalidacion );
	//$validate_exixts = pg_num_rows($resultados);
	 while( $objx = pg_fetch_object($resultados) ){
   $dataxx[] = $objx;
            }

           $etapadictamen = $dataxx[0]->etapa;

	if(  $etapadictamen  == "51" ){

		$sql = "select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio
	 and cve_catastral = '$idIN' and folio = $flioavg ) as a JOIN
	(select * from estatusxfolio where cclave = '$idIN' and folio_dictamen = $flioavg ) as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=51 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio" ;


	}else if(  $etapadictamen  == "4" ){

		$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 4";

	}else if(  $etapadictamen  == "5" ){

		$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 5";

	}else if( $etapadictamen  == "12"){
		$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN') as a JOIN
	(select * from estatusxfolio where cclave = '$idIN') as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=12 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio";

	}else if( $etapadictamen  == "15" ){

		$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN') as a JOIN
	(select * from estatusxfolio where cclave = '$idIN') as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=15 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio";

	}else if( $etapadictamen  == "52" ){

		$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN') as a JOIN
	(select * from estatusxfolio where cclave = '$idIN') as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=52 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio";

	}


	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
	$rs = pg_query( $con, $sql );
	// $validate_exixts = pg_num_rows($rs);
	while( $obj1 = pg_fetch_object($rs) ){
		$data2[] = $obj1;
	}
	 $cve = $data2[0]->folio;
	 echo $folio = $cve; */


	 echo $flioavg = str_pad($flioavg, 5, "0", STR_PAD_LEFT);

	// Liberando el conjunto de resultados
	/* pg_free_result($result);
	header('Content-type: application/json');
	echo json_encode($data2);*/

}

public function inmueblesArevisar2($con,$idIN,$pp,$o){

    session_start();
        $id_revisor=$_SESSION["idkey2"];

           $sql="
select cve_catastral,  (lpad(a.folio::text, 5, '0')) as folio
from (select * from inmuebles_v2 where cve_catastral = '$idIN' and aniodictaminar = '$pp' and inmuebles_v2.folio = $o) as a JOIN estatusxfolio as b on a.folio = b.folio_dictamen join contribuyentedatos_v2 as c on c.folio = b.folio_dictamen
where cve_catastral='$idIN' and cclave='$idIN' and aniodictamen = "."$pp";


///////*Para validar con año**///////


 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

    $rs = pg_query( $con, $sql );

  // $validate_exixts = pg_num_rows($rs);
   while( $obj1 = pg_fetch_object($rs) ){
    $data2[] = $obj1;
  }
   echo $cve = $data2[0]->folio;
  // Liberando el conjunto de resultados
 /* pg_free_result($result);


  header('Content-type: application/json');
  echo json_encode($data2);*/

}

public function inmueblesArevisar2_avgeliminar($con,$idIN,$pp,$o){

    session_start();
        $id_revisor=$_SESSION["idkey2"];

           $sql="

select cve_catastral,  (lpad(a.folio::text, 5, '0')) as folio
from (select * from inmuebles_v2 where  aniodictaminar = '$pp' and inmuebles_v2.folio = $o) as a JOIN estatusxfolio as b on a.folio = b.folio_dictamen join contribuyentedatos_v2 as c on c.folio = b.folio_dictamen
where  aniodictamen = "."$pp";


///////*Para validar con año**///////


 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

    $rs = pg_query( $con, $sql );

  // $validate_exixts = pg_num_rows($rs);
   while( $obj1 = pg_fetch_object($rs) ){
    $data2[] = $obj1;
  }
   echo $cve = $data2[0]->folio;
  // Liberando el conjunto de resultados
 /* pg_free_result($result);


  header('Content-type: application/json');
  echo json_encode($data2);*/

}




public function revisionDictamen2($con,$fol,$claveCat){


	 $sql="select tipod, etapa from estatusxfolio as a
	JOIN contribuyentedatos_v2 as b
	ON a.folio_dictamen = b.folio
	join inmuebles_v2 as i
	on b.folio = i.folio
	where folio_dictamen=$fol and cve_catastral='$claveCat' and cclave='$claveCat';";


	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

	$rs = pg_query( $con, $sql );
	$datos = pg_num_rows($rs);

	if ($datos == "1") {
		while( $obj = pg_fetch_object($rs) ){
			$data[] = $obj;
		}
		$tipoPersona = $data[0]->tipod;
		$etapaD = $data[0]->etapa;
		// echo json_encode($tipoPersona);
	}
	if ($etapaD == 1) {
		if ($tipoPersona == 2) {

			$sql2="select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1,id_municipio as nommpio , id_revisor,
			g.nombre as tipoDictamen, e.etapa, tipod, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, f.nombre_especialista, e.obs_rev, e.obs_municipio, b.baldio
			from contribuyentedatos_v2 as a
			JOIN inmuebles_v2 as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio
			JOIN estatusxfolio as e ON e.folio_dictamen = a.folio
			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";
			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if ($tipoPersona == 1) {

			$sql2="select a.folio, aniodictamen, a.nombredenominacion, a.apaterno, a.amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1,id_municipio as nommpio , id_revisor,
			g.nombre as tipoDictamen, e.etapa, tipod, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, f.nombre_especialista, e.obs_rev, e.obs_municipio, b.baldio
			from contribuyentedatos_v2 as a
			JOIN inmuebles_v2 as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio
			JOIN estatusxfolio as e ON e.folio_dictamen = a.folio
			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}
	}else if($etapaD == 3){

		if ($tipoPersona == 2) {

			$sql2="
			select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod

			from contribuyentedatos_v2 as a

			JOIN (

			SELECT * FROM  inmuebles_v2 WHERE folio = $fol and cve_catastral='$claveCat'
			) as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo




			JOIN (

			SELECT * FROM estatusxfolio where folio_dictamen = $fol and cclave = '$claveCat'
			) as e ON e.folio_dictamen = a.folio
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";
			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if ($tipoPersona == 1) {

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod, e.obs_rev, e.obs_municipio, b.baldio, orden, nombredoc, comentario


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			join (SELECT * FROM listadocumentos_v2 WHERE id_dictamen = $fol and clavecastatral = '$claveCat') as li on e.cclave = li.clavecastatral

			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}

	}else if($etapaD == 15){




		if ($tipoPersona == 2){



			 $sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
			g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio, h.id as tipologia , hv.url

			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			JOIN
			(

			select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
			) as h ON a.folio=h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";



			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
		}else if($tipoPersona == 1){

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
			g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio, h.id as tipologia , hv.url


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			JOIN
			(

			select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
			) as h ON a.folio=h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}

	}else if($etapaD == 13){

		if ($tipoPersona == 2){

			$sql2="
			select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod, e.obs_rev, e.obs_municipio, orden, h.nombredoc, comentario, h.\"observacionRevisor\", b.baldio, h.id as tipologia, hv.url, hv.activo
			from contribuyentedatos_v2 as a
			JOIN (
			SELECT * FROM  inmuebles_v2 WHERE folio = $fol and cve_catastral='$claveCat'
			) as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
			JOIN (
			SELECT * FROM estatusxfolio where folio_dictamen = $fol and cclave = '$claveCat'
			) as e ON e.folio_dictamen = a.folio
			JOIN (
			SELECT * FROM listadocumentos_v2 WHERE id_dictamen=$fol and clavecastatral='$claveCat') as h ON a.folio = h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if($tipoPersona == 1){

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
			g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio, h.id as tipologia , hv.url, hv.activo


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			JOIN
			(

			select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
			) as h ON a.folio=h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}

	}else{
		if ($tipoPersona == 2) {

			 $sql2="
			select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod

			from contribuyentedatos_v2 as a

			JOIN (

			SELECT * FROM  inmuebles_v2 WHERE folio = $fol and cve_catastral='$claveCat'
			) as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN (select * from especialistas_vigentes_v2 where tipo_usuariofk=2) as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo




			JOIN (

			SELECT * FROM estatusxfolio where folio_dictamen = $fol and cclave = '$claveCat'
			) as e ON e.folio_dictamen = a.folio



			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";
			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());


		}else if ($tipoPersona == 1) {

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,g.nombre as tipoDictamen, e.etapa, tipod


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio


			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}
	}



	$rs2 = pg_query( $con, $sql2 );
	while( $obj1 = pg_fetch_object($rs2) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);


	header('Content-type: application/json');
	echo json_encode($data2);



}

public function archivosRevisorDes($con,$fol,$clave){
session_start();
        $id_revisor=$_SESSION["idkey2"];
       // echo $id_revisor;
$sql="
select tipod from estatusxfolio as a
JOIN contribuyentedatos_v2 as b
ON a.folio_dictamen = b.folio
where folio_dictamen=$fol and etapa=4 and id_revisor=$id_revisor";
    $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

    $rs = pg_query( $con, $sql );
    $datos = pg_num_rows($rs);

    if ($datos == "1") {
      while( $obj = pg_fetch_object($rs) ){
      $data[] = $obj;
      }
       $tipoPersona = $data[0]->tipod;

    }

     $sql2="select nombredoc,orden,etapa,comentario,tipod
from contribuyentedatos_v2 as a
JOIN listadocumentos_v2 as b ON a.folio = b.id_dictamen
JOIN estatusxfolio as c ON a.folio = c.folio_dictamen
where a.folio = $fol and id_revisor=$id_revisor and etapa=4;
      ";
    $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

    $rs2 = pg_query( $con, $sql2 );
     while( $obj1 = pg_fetch_object($rs2) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);

  pg_close($con);
  header('Content-type: application/json');
  echo json_encode($data2);



}

public function guardarAvisoDictamen($con,$muni,$zona,$manzana,$lote,$edificio,$depto){

  $sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
    while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

            $nom = $data[0]->ultimo;

            if(empty($nom)){
               $folio = $nom;
               //$id_dom= $nom+1;
            }else{
               $folio = $nom;
               //$id_dom= $nom+1;
}

}

   $muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
  $zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
  $manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
  $lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
  $edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
  $depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

   $claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;
   session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];
        $sql4 = "INSERT INTO aviso_dictamen_v2(id_aviso, id_dictaminador, cve_cat) VALUES ($folio, $id_dictaminadorr, '$claveC');";
    pg_query($con, $sql4);




try {
    $mbd = new PDO('mysql:host=10.10.68.31;dbname=ventanillaunik', 'root', 'yzR3qruwNnDFglDX');
    //$mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$user_vua=$id_dictaminadorr;

$dd = date("Y-m-d");

// Prepare
$sentencia = $mbd->prepare("INSERT INTO tramites  (id_usuario, id_tramite, tipo_tramite, fecha_tramite, estatus,estatus2, obs, F_EstatusServ) VALUES (?,?,?,?,?,?,?,?)");
// Bind
$a=$user_vua;
$b=1;
//tipo de tramite para el dictamun es 2
$c=2;
//fecha
$d=$dd;
// los estatus pueden ir del 1 al 13
/*
CASE WHEN etapa =1 THEN 'REGISTRO DE DICTAMEN'
WHEN etapa =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN etapa =3 THEN 'FALTA ASIGNAR A REVISOR'
WHEN etapa =4 THEN 'ASIGNADO A REVISOR'
WHEN etapa =5 THEN 'PRE VALIDADO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'PRE RECHAZO'
WHEN etapa =12 THEN 'NO AUTORIZADO'
WHEN etapa =13 THEN 'RECHAZADO'
END) as etapa_de_dict
*/

$e=1;
$f="";
//fecha
$g=$dd;

$sentencia->bindParam(1, $a);
$sentencia->bindParam(2, $b);
$sentencia->bindParam(3, $c);
$sentencia->bindParam(4, $d);
$sentencia->bindParam(5, $e);
$sentencia->bindParam(6, $e);
$sentencia->bindParam(7, $f);
$sentencia->bindParam(8, $g);
// Excecute
$sentencia->execute();








    //Enviar email a dictaminador.
  /*$sql2="SELECT tipod, email as correo, nombredenominacion, apaterno, amaterno, folio FROM contribuyentedatos_v2 as a
  JOIN especialistas_vigentes_v2 as b ON a.id_dictaminador=b.num_registro where folio=$folio;";
  $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
  $rs2 = pg_query( $con, $sql2 );
   while( $obj2 = pg_fetch_object($rs2) ){
   $data2[] = $obj2;
            }

    echo $emailc = $data2[0]->correo;
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

//AD/00456/2020
$anioAc = date("Y");
$folioC=str_pad($folio, 5, "0", STR_PAD_LEFT);

$folioPresentacion = "AD/".$folioC."/".$anioAc;

//Enviar Email al dictaminador asignado
    require 'PHPMailer/PHPMailerAutoload.php';

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';//Modificar
  $mail->Host = 'smtp.gmail.com';//Modificar
  $mail->Port = '587';//Modificar
  $mail->Username = 'usbrifa@gmail.com'; //Modificar
  $mail->Password = 'el10avjgameover10'; //Modificar

  $mail->setFrom('usbrifa@gmail.com', 'Coordinación de Catastro ');//Modificar
  $mail->addAddress($emailc, 'destinatario');//Modificar
  $mail->Subject = 'Aviso de Dictamen -'.$nombre;//Modificar
   $folioPresentacion2 = "../files/documentos/AcuseDeDictamenAD_".$folioC."_".$anioAc.".pdf";
  $mail->Body = 'Folio de dictamen: '.$folioPresentacion; //Modificar
  $mail->IsHTML(true);
  $mail->AddAttachment('../files/documentos/AcuseDeDictamenAD_00131_2020.pdf', $name = 'Acuse',  $encoding = 'base64', $type = 'application/pdf');


  //print_r( $mail );

  if($mail->send()){
    echo 'Enviado';
    } else {
    echo 'Error';
  }
  //echo $mail->send();*/


}

public function guardarInmuebles($con,$muni,$zona,$manzana,$lote,$edificio,$depto,$scr,$calle,$col,$numE,$numI,$cp,$municipio,$referencia,$anio,$cont,$pagoImpuesto,$modificacion,$vv){


 $sql="SELECT max(id_inmueble) as ultimo FROM contribuyentedatos_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
    while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

            $nom = $data[0]->ultimo;

            if(empty($nom)){
               $folio = $nom;
               //$id_dom= $nom+1;
            }else{
               $folio = $nom;
               //$id_dom= $nom+1;
}

}

  //echo $folio;
  $fecha = date("Y-m-d H:i:s");
//$folioCompleto=str_pad($folioPresentacion, 5, "0", STR_PAD_LEFT);
  $muni2 = str_pad($muni, 3, "0", STR_PAD_LEFT);
  $zona2 = str_pad($zona, 2, "0", STR_PAD_LEFT);
  $manzana2 = str_pad($manzana, 3, "0", STR_PAD_LEFT);
  $lote2 = str_pad($lote, 2, "0", STR_PAD_LEFT);
  $edificio2 = str_pad($edificio, 2, "0", STR_PAD_LEFT);
  $depto2 = str_pad($depto, 4, "0", STR_PAD_LEFT);

  $claveC=$muni2.$zona2.$manzana2.$lote2.$edificio2.$depto2;
  $id_in=$folio + $cont;
  $id_in= $id_in.$cont;
/*  $sql ="INSERT INTO contribuyentedatos_v2(id_dictaminador, nombredenominacion, apaterno, amaterno, rfc, curp, telefono, email, serviciodesc, nombrerep, apaternorep,
            amaternorep, rfcrep, curprep, aniodictamen, id_inmueble,
            fecha_registro,tipodictamen,folio,tipod)
    VALUES ($noReg,'$nombre','$apPaterno','$apMaterno','$rfc','$curp',$telefono,'$email',null,'$representante','$apPaRep','$apMaRep','$rfcR','$curpR',$anio,$folio,'$fecha',$gender,$folio,$fm);";

  pg_query($con, $sql); */

   $sql2="INSERT INTO inmuebles_v2(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar, folio,manifest_claves)
    VALUES ($id_in, '$claveC', $scr, $id_in, $folio, '$pagoImpuesto', '$modificacion', $folio, $anio, $folio,$vv);";
    pg_query($con, $sql2);

  $sql3 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado)
    VALUES ($id_in, '$calle', '$numE', '$numI', '$col', '$municipio', '$referencia', null, '$cp',null );";
    pg_query($con, $sql3);

    // Cerrando la conexion
 // pg_close($con);
  echo "ok";
}

public function guardarContribuyente($con,$noReg,$nombre,$apPaterno,$apMaterno,$rfc,$curp,$telefono, $email,$representante,$apPaRep,$apMaRep,$rfcR,$curpR,$anio,$gender,$fm){

 $sql="SELECT max(id_con) as ultimo FROM contribuyentedatos_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
    while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

            $nom = $data[0]->ultimo;

            if(empty($nom)){
               $folio = $nom + 1;
            }else{
               $folio = $nom + 1;
}

}

  //echo $folio;
  $fecha = date("Y-m-d H:i:s");
 /* $folio = explode("/",$fol);
  $fo = $folio[1]; */
 // $claveC=$muni.$zona.$manzana.$lote.$edificio.$depto;
 /* $valorcastral1 = explode("$",$valor);
  $valorcastral2 = $valorcastral1[1];
  $valorcastral3 = str_replace(",","",$valorcastral2);    */

  $sql ="INSERT INTO contribuyentedatos_v2(id_dictaminador, nombredenominacion, apaterno, amaterno, rfc, curp, telefono, email, serviciodesc, nombrerep, apaternorep,
            amaternorep, rfcrep, curprep, aniodictamen, id_inmueble,
            fecha_registro,tipodictamen,folio,tipod)
    VALUES ($noReg,'$nombre','$apPaterno','$apMaterno','$rfc','$curp',$telefono,'$email',null,'$representante','$apPaRep','$apMaRep','$rfcR','$curpR',$anio,$folio,'$fecha',$gender,$folio,$fm);";

  pg_query($con, $sql);


  /* $sql1="INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha)
    VALUES ($folio, $noReg, 1, now());";
    pg_query($con, $sql1); */

 /* $sql2="INSERT INTO inmuebles_v2(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar)
    VALUES ($folio, '$claveC', $scr, $folio, $folio, null, null, $folio, $anio);";
    pg_query($con, $sql2);

  $sql3 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado)
    VALUES ($folio, '$calle', '$numE', '$numI', '$col', $municipio, '$referencia', null, '$cp',null );";
    pg_query($con, $sql3); */
    // Cerrando la conexion
 // pg_close($con);
   echo trim($folio);
}


public function guardarDenominacionR($con,$noRegDictamen,$nombre,$rfcD,$descri,$telefonoD, $correoD,$representante,$apPaRep,$apMaRep,$rfcR,$curpR,$anio,$gender,$fm){

 $sql="SELECT max(id_con) as ultimo FROM contribuyentedatos_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){

    while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

            $nom = $data[0]->ultimo;

            if(empty($nom)){
               $folio = $nom + 1;
            }else{
               $folio = $nom + 1;
}

}
  //echo $folio;
  $fecha = date("Y-m-d H:i:s");
 // $claveC=$muni.$zona.$manzana.$lote.$edificio.$depto;

 $sql ="INSERT INTO contribuyentedatos_v2(id_dictaminador, nombredenominacion, apaterno, amaterno, rfc, curp, telefono, email, serviciodesc, nombrerep, apaternorep, amaternorep, rfcrep, curprep, aniodictamen, id_inmueble,
            fecha_registro, tipodictamen, folio, tipod)
    VALUES ($noRegDictamen,'$nombre',null, null,'$rfcD', null, $telefonoD,'$correoD','$descri','$representante','$apPaRep','$apMaRep','$rfcR','$curpR',$anio,$folio,'$fecha',$gender,$folio,$fm);";
  pg_query($con, $sql);


   /* $sql1="INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha)
    VALUES ($folio, $noRegDictamen, 1, now());";
    pg_query($con, $sql1); */
/*
  $sql2="INSERT INTO inmuebles_v2(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar)
    VALUES ($folio, '$claveC', $scr, $folio, $folio, null, null, $folio, $anio);";
    pg_query($con, $sql2);

   $sql3 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado)
    VALUES ($folio, '$calle', '$numE', '$numI', '$col', $municipio, '$referencia', null, '$cp',null );";
    pg_query($con, $sql3); */
    // Cerrando la conexion
  //pg_close($con);
 echo trim($folio);

}
/*
public function guardarContribuyente($con,$nomb,$tel,$ap,$am,$emaill,$dicta,$fol,$calle,$nExterior,$nInterior,$col,$municipio,$estado,$cp,$ref1,$ref2,$muni,$zona,$man,$lote,$edif,$dep,$valor,$anio,$tipo,
  $cur,$rfc,$Tpersona){
  $fecha = date("Y-m-d H:i:s");
  $folio = explode("/",$fol);
  $fo = $folio[1];
  $claveC=$muni.$zona.$man.$lote.$edif.$dep;
  $valorcastral1 = explode("$",$valor);
  $valorcastral2 = $valorcastral1[1];
  $valorcastral3 = str_replace(",","",$valorcastral2);

  $sql="INSERT INTO contribuyente_v2(folio, id_dictaminador, nombre, ap_paterno, ap_materno, telefono, email, fecha_registro, id_inmueble, rfc,tipod,curp,tipopersona)
  VALUES ('$fo', '$dicta', '$nomb', '$ap', '$am', '$tel' , '$emaill', '$fecha', '$fo', '$rfc',$tipo,'$cur',$Tpersona);";

  pg_query($con, $sql);

  $sql2="INSERT INTO inmuebles_v2(id_inmueble, cve_catastral, valor_catastral, id_domicilio, id_aviso, manifest_pago, manifest_mejoras, id_clave, anioDictaminar)
    VALUES ('$fo', '$claveC', '$valorcastral3', '$fo', $fo, null, null, $fo, $anio);";
    pg_query($con, $sql2);

    $sql3 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, id_municipio, referencia1, referencia2, codigo_p,estado)
    VALUES ('$fo', '$calle', '$nExterior', '$nInterior', '$col', $municipio, '$ref1', '$ref2', '$cp',$estado );";
    pg_query($con, $sql3);
    // Cerrando la conexion
  pg_close($con);
  echo "ok";
}  */

public function reportePdf($con){

$sql="SELECT max(folio) as ultimo FROM contribuyentedatos_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );
  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
    while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

            $nom = $data[0]->ultimo;

            if(empty($nom)){
               $folio = $nom;
            }else{
               $folio = $nom;
}
}

  $sql2 ="select a.id_con,a.id_dictaminador, a.nombredenominacion, a.apaterno, a.amaterno, a.fecha_registro,
 d.nombre as dictaminador, a.rfc,
d.ap_paterno as ap_paterno2, d.ap_materno as ap_materno2, d.rfc as rfc2,
b.cve_catastral, b.valor_catastral,
c.calle, c.no_exterior ,c.no_interior, c.colonia, c.codigo_p, c.referencia1,
d.rfc as rcf2,
b.aniodictaminar, e.nombre as tipoDictamen
from contribuyentedatos_v2 as a
join inmuebles_v2 as b on a.id_inmueble = b.id_inmueble
join domicilio_v2 as c on b.id_domicilio = c.id_domicilio
join dictaminadores_v2 as d on a.id_dictaminador = d.no_reg_autorizado
join dictamen_tipo_v2 as e on a.tipodictamen = e.id_tipo
WHERE id_con= $folio;";
$result = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql2 );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
      while( $obj = pg_fetch_object($rs) ){
                   //echo $obj->id_usuario;
    //print_r($obj);
    //$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
   $data[] = $obj;
            }
             pg_free_result($rs);
             pg_close($con);

           header('Content-type: application/json');
           echo json_encode($data);

  }else{
    echo "sin Registro";
  }



}


public function nomDictaminador($con,$nom){
$sql="SELECT * FROM dictaminadores_v2 where id = $nom;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
  	while( $obj = pg_fetch_object($rs) ){
                   //echo $obj->id_usuario;
   	//print_r($obj);
   	//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
   $data[] = $obj;
            }

            //$nom = $data[0]->nombre." ".$data[0]->ap_paterno." ".$data[0]->ap_materno;
           //echo $nom;
           // Liberando el conjunto de resultados
           pg_free_result($rs);
           // Cerrando la conexion
           pg_close($con);

           header('Content-type: application/json');
           echo json_encode($data);
  }else{
  	echo "error";
  }
}
public function folios($con){
	$sql="SELECT max(id_contribuyente) as ultimo FROM contribuyente_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $con, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
  	while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

            $nom = $data[0]->ultimo;

            if(empty($nom)){
            	echo str_pad($nom+1, 4, "00", STR_PAD_LEFT);
            }else{
            	echo str_pad($nom+1, 4, "00", STR_PAD_LEFT);
}

}

}

//insertar datos de dictaminador tipo fisico
public function dataandfilesf($c,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$IDD,$id14,$id15,$id10,$id11,$id12,$id13,$id16){

    session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];
                 //tipologias comentarios y validacion


foreach($id1 as $key => $val) {
    //print "$key = $val[id_doc] <br>";
   $ppp = $val["folio"];
    $i = $val["id_inmu"];
    $e = $val["id_doc"];
    $j = $val["comentario"];
    $ii = $val["tipolg_n"];
if ( empty( $j ) ) {
      $comentarios="N/A";
  }else{
     $comentarios= $j ;
  }
$comentarios;
 $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$comentarios' WHERE id = $ii and id_dictamen =  $ppp and orden=$e and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
 pg_query($c, $sqLPS);


}
  //Datos vacios
  /*if ($id1 == '') {
      $id1="N/A";
  }*/

    if ($id2 == '') {
      $id2="N/A";
  }

    if ($id3 == '') {
      $id3="N/A";
  }

    if ($id4 == '') {
      $id4="N/A";
  }

    if ($id5 == '') {
      $id5="N/A";
  }

    if ($id6 == '') {
      $id6="N/A";
  }

    if ($id7 == '') {
      $id7="N/A";
  }

    if ($id8 == '') {
      $id8="N/A";
  }

    if ($id9 == '') {
      $id9="N/A";
  }

   if ($id14 == '') {
      $id14="N/A";
  }
  if ($id15 == '') {
      $id15="N/A";
  }
  if ($id10 == '') {
      $id10="N/A";
  }
  if ($id11 == '') {
      $id11="N/A";
  }
   if ($id12 == '') {
      $id12="N/A";
  }
   if ($id13 == '') {
      $id13="N/A";
  }
   if ($id16 == '') {
      $id16="N/A";
  }
  // Realizando una consulta SQL
    //$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD order by orden;";
   $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $ppp and orden != 12 and clavecastatral='$IDD';";
    $rx = pg_query( $c, $sqlv );
    //if( pg_num_rows($rx) >= 9 ){
      if( pg_num_rows($rx) >= 5 ){
    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }

    //$orden = $data[2]->orden;
    for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id8' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
      //  echo "comentario 10";
        break;
      case '11':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id7' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 11";
        break;
      case '14':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id14' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 14";
        break;
        case '15':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id15' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 15";
        break;
      case '99':
          $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id6' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 99";
        break;
      case '98':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id5' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
        case '78':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id10' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '77':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id11' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '76':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id12' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '75':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id13' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '74':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id16' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
      case '97':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id4' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 97";
        break;
      case '96':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id3' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 96";
        break;
      case '95':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id2' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 95";
        break;
      case '94':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id9' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 94";
        break;

      default:

        break;
    }

    }


      $sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $ppp and id_dictaminador=$id_dictaminadorr and cclave='$IDD';";
      pg_query($c, $sqL);
    echo"50";
    // Cerrando la conexiÃƒÂ³n
    pg_close($c);
    }else{
      //faltan archivos
      echo"00";

      // Cerrando la conexiÃƒÂ³n
      pg_close($c);
    }




}
//insertar datos de dictaminador tipo moral
public function dataandfilesm($c,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$id10,$id11,$IDD,$id14,$id15,$id16,$id17,$id18,$id19,$id20){
  session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];

         //tipologias comentarios y validacion


foreach($id1 as $key => $val) {
    //print "$key = $val[id_doc] <br>";
   $ppp = $val["folio"];
    $i = $val["id_inmu"];
    $e = $val["id_doc"];
    $j = $val["comentario"];
    $ii = $val["tipolg_n"];
if ( empty( $j ) ) {
      $comentarios="N/A";
  }else{
     $comentarios= $j ;
  }
$comentarios;
 $sqLPSc = "UPDATE listadocumentos_v2 SET comentario='$comentarios' WHERE id=$ii and id_dictamen =  $ppp and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
 pg_query($c, $sqLPSc);


}
//die();
  //Campos vacios
  /*if ($id1=='') {
    $id1='N/A';
  }*/

  if ($id2=='') {
    $id2='N/A';
  }

  if ($id3=='') {
    $id3='N/A';
  }

  if ($id4=='') {
    $id4='N/A';
  }

  if ($id5=='') {
    $id5='N/A';
  }

  if ($id6=='') {
    $id6='N/A';
  }

  if ($id7=='') {
    $id7='N/A';
  }

  if ($id8=='') {
    $id8='N/A';
  }

  if ($id9=='') {
    $id9='N/A';
  }

  if ($id10=='') {
    $id10='N/A';
  }

  if ($id11=='') {
    $id11='N/A';
  }
  if ($id14 == '') {
      $id14="N/A";
  }
  if ($id15 == '') {
      $id15="N/A";
  }
  if ($id16 == '') {
      $id16="N/A";
  }
  if ($id17 == '') {
      $id17="N/A";
  }
  if ($id18 == '') {
      $id18="N/A";
  }
  if ($id19 == '') {
      $id19="N/A";
  }
  if ($id20 == '') {
      $id20="N/A";
  }

  // Realizando una consulta SQL
 // $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD order by orden;";
  $sqlv="select orden from listadocumentos_v2 where id_dictamen = $ppp and orden != 12 and clavecastatral='$IDD';";
  $rx = pg_query( $c, $sqlv );

    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }

    $orden = $data[2]->orden;
    for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id10' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 10";
        break;
      case '11':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id9' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 11";
        break;
      case '14':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id14' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 14";
        break;
        case '15':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id15' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 15";
        break;
      case '90':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id8' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 90";
        break;
      case '89':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id7' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 89";
        break;
      case '88':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id6' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 88";
        break;
      case '87':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id5' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 87";
        break;
      case '86':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id4' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
      // echo "comentario 86";
        break;
      case '85':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id3' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
      //  echo "comentario 85";
        break;
      case '84':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id2' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '83':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id16' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '82':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id17' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '81':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id18' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '80':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id19' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '79':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id20' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;

      default:

        break;
    }

    }

    // antes era a 11
    //if( pg_num_rows($rx) >= 11 ){
  if( pg_num_rows($rx) >= 5 ){

     $sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $ppp and id_dictaminador=$id_dictaminadorr and cclave='$IDD';";
      pg_query($c, $sqL);
      echo"50";

      $sqLB = "UPDATE inmuebles_v2 SET baldio='FALSE' WHERE folio=$ppp and cve_catastral='$IDD';";
      pg_query($c, $sqLB);

   }else{
    //faltan archivos
     $sqL2 = "UPDATE estatusxfolio SET etapa=1, fecha=now() WHERE folio_dictamen = $ppp and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
    pg_query($c, $sqL2);
    echo "00";

  }

}


public function observacionesTipologias($con,$obserTipologias,$clave,$fol){
   session_start();
   $id_revisor=$_SESSION["idkey2"];


  foreach($obserTipologias as $key => $val) {
    //print "$key = $val[id_doc] <br>";
    $idT = $val["id_t"];
    $e = $val["comel"];

if ( empty( $e ) ) {
      $observacionT="N/A";
  }else{
     $observacionT= $e ;
  }

 $sqLPS = "UPDATE listadocumentos_v2
SET \"observacionRevisor\" = '$observacionT'
WHERE id_dictamen = $fol and clavecastatral='$clave' and id=$idT;";
 pg_query($con, $sqLPS);


}
pg_close($con);
echo "10";
}

public function preRechazoCambios($con,$fol){
  session_start();
   $dictaminador=$_SESSION["idkey2"];
   $sqLPS = "UPDATE estatusxfolio SET etapa=4 WHERE folio_dictamen=$fol and etapa=11 and id_dictaminador=$dictaminador;";
 pg_query($con, $sqLPS);
 echo "100";
 pg_close($con);

}

public function revisionDictamen3($con,$fol,$claveCat){

    session_start();
        $id_revisor=$_SESSION["idkey2"];
       // echo $id_revisor;
    $sql="select tipod from contribuyentedatos_v2 as b
join
(select * from estatusxfolio where  folio_dictamen=$fol and id_revisor=$id_revisor and cclave='$claveCat') as a
ON a.folio_dictamen = b.folio;";
    $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

    $rs = pg_query( $con, $sql );
    $datos = pg_num_rows($rs);

    if ($datos == "1") {
      while( $obj = pg_fetch_object($rs) ){
      $data[] = $obj;
      }
       $tipoPersona = $data[0]->tipod;
       // echo json_encode($tipoPersona);
    }

    if ($tipoPersona == 2) {

   $sql2="
select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
g.nombre as tipoDictamen, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev, b.baldio
from

contribuyentedatos_v2 as a

JOIN


(select * from inmuebles_v2 where cve_catastral = '$claveCat')  as b

 ON a.folio = b.folio

JOIN domicilio_v2 as c

ON b.id_domicilio = c.id_domicilio

JOIN estatusxfolio as e

ON e.folio_dictamen = a.folio

JOIN especialistas_vigentes_v2 as f

 ON a.id_dictaminador = f.no_reg_autorizado

JOIN tipo_dictamen_v2 as g

ON a.tipodictamen = g.id_tipo

JOIN

(select * from  listadocumentos_v2 where clavecastatral =  '$claveCat') as h ON a.folio = h.id_dictamen


    where a.folio = $fol and etapa=4 or etapa=12 and id_revisor=$id_revisor and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,
f.ap_paterno, f.ap_materno,f.rfc, f.no_reg_autorizado,
g.nombre, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev, b.baldio  ;
";

    $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

    }else if ($tipoPersona == 1) {

    $sql2="
select a.folio, aniodictamen, nombredenominacion,a.apaterno, a.amaterno, a.rfc, cve_catastral, valor_catastral,
calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
g.nombre as tipoDictamen, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev, b.baldio
from

contribuyentedatos_v2 as a

JOIN


(select * from inmuebles_v2 where cve_catastral = '$claveCat')  as b

 ON a.folio = b.folio

JOIN domicilio_v2 as c

ON b.id_domicilio = c.id_domicilio

JOIN estatusxfolio as e

ON e.folio_dictamen = a.folio

JOIN especialistas_vigentes_v2 as f

 ON a.id_dictaminador = f.no_reg_autorizado

JOIN tipo_dictamen_v2 as g

ON a.tipodictamen = g.id_tipo

JOIN

(select * from  listadocumentos_v2 where clavecastatral =  '$claveCat') as h ON a.folio = h.id_dictamen


    where a.folio = $fol and etapa=4 or etapa=12 and id_revisor=$id_revisor and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,
f.ap_paterno, f.ap_materno,f.rfc, f.no_reg_autorizado, a.apaterno, a.amaterno,
g.nombre, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev, b.baldio  ;";

   $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

    }

    $rs2 = pg_query( $con, $sql2 );
     while( $obj1 = pg_fetch_object($rs2) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);


  header('Content-type: application/json');
  echo json_encode($data2);

    //echo $idIN;
/*
    session_start();
        $id_revisor=$_SESSION["idkey2"];
       // echo $id_revisor;
    $sql="
select tipod from estatusxfolio as a
JOIN contribuyentedatos_v2 as b
ON a.folio_dictamen = b.folio
where folio_dictamen=$fol and cclave='$claveCat';";
    $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

    $rs = pg_query( $con, $sql );
    $datos = pg_num_rows($rs);

    if ($datos == "1") {
      while( $obj = pg_fetch_object($rs) ){
      $data[] = $obj;
      }
       $tipoPersona = $data[0]->tipod;
       // echo json_encode($tipoPersona);
    }

    if ($tipoPersona == 2) {

   $sql2="
select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_revisor, f.nombre as dictminador,
f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
g.nombre as tipoDictamen, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev
from contribuyentedatos_v2 as a
JOIN inmuebles_v2 as b ON a.folio = b.folio
JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio
JOIN estatusxfolio as e ON e.folio_dictamen = a.folio
JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
JOIN listadocumentos_v2 as h ON a.folio = h.id_dictamen
    where a.folio = $fol and cve_catastral='$claveCat' order by h.id";

    $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

    }else if ($tipoPersona == 1) {
echo "hola..!1";
die();
    $sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio

from contribuyentedatos_v2 as a

JOIN
(

SELECT * FROM inmuebles_v2 WHERE folio = 484 and cve_catastral = '$claveCat'
)
 as b ON a.folio = b.folio

JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

JOIN

especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado

JOIN

tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


JOIN
(
SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
)as e

 ON e.folio_dictamen = a.folio


JOIN

(

select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
) as h ON a.folio=h.id_dictamen

    where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";


   $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

    }

    $rs2 = pg_query( $con, $sql2 );
     while( $obj1 = pg_fetch_object($rs2) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);


  header('Content-type: application/json');
  echo json_encode($data2);
*/

}


public function dataandfilesfCambios($c,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$IDD,$id14,$id15,$id10,$id11,$id12,$id13,$id16){

        session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];
                 //tipologias comentarios y validacion


foreach($id1 as $key => $val) {
    //print "$key = $val[id_doc] <br>";
    $ppp = $val["folio"];
    $i = $val["id_inmu"];
    $e = $val["id_doc"];
    $j = $val["comentario"];
    $ii = $val["tipolg_n"];
if ( empty( $j ) ) {
      $comentarios="N/A";
  }else{
     $comentarios= $j ;
  }
$comentarios;
 $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$comentarios' WHERE id = $ii and id_dictamen = $ppp  and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
 pg_query($c, $sqLPS);


}
  //Datos vacios
  /*if ($id1 == '') {
      $id1="N/A";
  }*/

    if ($id2 == '') {
      $id2="N/A";
  }

    if ($id3 == '') {
      $id3="N/A";
  }

    if ($id4 == '') {
      $id4="N/A";
  }

    if ($id5 == '') {
      $id5="N/A";
  }

    if ($id6 == '') {
      $id6="N/A";
  }

    if ($id7 == '') {
      $id7="N/A";
  }

    if ($id8 == '') {
      $id8="N/A";
  }

    if ($id9 == '') {
      $id9="N/A";
  }

   if ($id14 == '') {
      $id14="N/A";
  }
  if ($id15 == '') {
      $id15="N/A";
  }
  if ($id10 == '') {
      $id10="N/A";
  }
  if ($id11 == '') {
      $id11="N/A";
  }
   if ($id12 == '') {
      $id12="N/A";
  }
   if ($id13 == '') {
      $id13="N/A";
  }
   if ($id16 == '') {
      $id16="N/A";
  }
  // Realizando una consulta SQL
    //$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD order by orden;";
   $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $ppp and orden != 12 and clavecastatral='$IDD';";
    $rx = pg_query( $c, $sqlv );
    //if( pg_num_rows($rx) >= 9 ){
      if( pg_num_rows($rx) >= 7 ){
    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }

    //$orden = $data[2]->orden;
    for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id8' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
      //  echo "comentario 10";
        break;
      case '11':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id7' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 11";
        break;
      case '14':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id14' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 14";
        break;
        case '15':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id15' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 15";
        break;
      case '99':
          $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id6' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 99";
        break;
      case '98':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id5' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
        case '78':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id10' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '77':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id11' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '76':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id12' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '75':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id13' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
         case '74':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id16' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 98";
        break;
      case '97':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id4' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 97";
        break;
      case '96':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id3' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 96";
        break;
      case '95':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id2' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 95";
        break;
      case '94':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id9' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 94";
        break;

      default:

        break;
    }

    }




      $sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $ppp and id_dictaminador=$id_dictaminadorr and cclave='$IDD';";
      pg_query($c, $sqL);

        $sqLB = "UPDATE inmuebles_v2 SET baldio='FALSE' WHERE folio = $ppp and cve_catastral='$IDD';";
      pg_query($c, $sqLB);

    echo"50";
    // Cerrando la conexiÃƒÂ³n
    pg_close($c);
    }else{
      //faltan archivos
      echo"00";
      // Cerrando la conexiÃƒÂ³n
      pg_close($c);
    }




}


public function dataandfilesmCambios($c,$id1,$id2,$id3,$id4,$id5,$id6,$id7,$id8,$id9,$id10,$id11,$IDD,$id14,$id15,$id16,$id17,$id18,$id19,$id20){
        session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];

         //tipologias comentarios y validacion


foreach($id1 as $key => $val) {
    //print "$key = $val[id_doc] <br>";
   $ppp = $val["folio"];
    $i = $val["id_inmu"];
    $e = $val["id_doc"];
    $j = $val["comentario"];
    $ii = $val["tipolg_n"];
if ( empty( $j ) ) {
      $comentarios="N/A";
  }else{
     $comentarios= $j ;
  }
$comentarios;
 $sqLPSc = "UPDATE listadocumentos_v2 SET comentario='$comentarios' WHERE id=$ii and id_dictamen =  $ppp  and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
 pg_query($c, $sqLPSc);


}
//die();
  //Campos vacios
  /*if ($id1=='') {
    $id1='N/A';
  }*/

  if ($id2=='') {
    $id2='N/A';
  }

  if ($id3=='') {
    $id3='N/A';
  }

  if ($id4=='') {
    $id4='N/A';
  }

  if ($id5=='') {
    $id5='N/A';
  }

  if ($id6=='') {
    $id6='N/A';
  }

  if ($id7=='') {
    $id7='N/A';
  }

  if ($id8=='') {
    $id8='N/A';
  }

  if ($id9=='') {
    $id9='N/A';
  }

  if ($id10=='') {
    $id10='N/A';
  }

  if ($id11=='') {
    $id11='N/A';
  }
  if ($id14 == '') {
      $id14="N/A";
  }
  if ($id15 == '') {
      $id15="N/A";
  }
  if ($id16 == '') {
      $id16="N/A";
  }
  if ($id17 == '') {
      $id17="N/A";
  }
  if ($id18 == '') {
      $id18="N/A";
  }
  if ($id19 == '') {
      $id19="N/A";
  }
  if ($id20 == '') {
      $id20="N/A";
  }

  // Realizando una consulta SQL
 // $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD order by orden;";
  $sqlv="select orden from listadocumentos_v2 where id_dictamen = $ppp and orden != 12 and clavecastatral='$IDD'";
  $rx = pg_query( $c, $sqlv );

    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }

    $orden = $data[2]->orden;
    for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id10' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 10";
        break;
      case '11':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id9' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 11";
        break;
      case '14':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id14' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 14";
        break;
        case '15':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id15' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 15";
        break;
      case '90':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id8' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
        //echo "comentario 90";
        break;
      case '89':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id7' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 89";
        break;
      case '88':
       $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id6' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 88";
        break;
      case '87':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id5' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 87";
        break;
      case '86':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id4' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
      // echo "comentario 86";
        break;
      case '85':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id3' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
      //  echo "comentario 85";
        break;
      case '84':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id2' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '83':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id16' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '82':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id17' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '81':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id18' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '80':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id19' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;
        case '79':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='$id20' WHERE id_dictamen = $ppp and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$IDD';";
        pg_query($c, $sqLPS);
       // echo "comentario 84";
        break;

      default:

        break;
    }

    }

    // antes era a 11
    //if( pg_num_rows($rx) >= 11 ){
  if( pg_num_rows($rx) >= 5 ){

     $sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $ppp and id_dictaminador=$id_dictaminadorr and cclave='$IDD';";
      pg_query($c, $sqL);
      echo"50";

   }else{
    //faltan archivos
     $sqL2 = "UPDATE estatusxfolio SET etapa=1, fecha=now() WHERE folio_dictamen = $ppp and id_dictaminador=$id_dictaminadorr and cclave='$IDD';";
    pg_query($c, $sqL2);
    echo "00";

  }

}



public function revisionDictamen($con,$fol,$claveCat){

	session_start();
	$id_revisor=$_SESSION["idkey2"];
	// echo $id_revisor;
	 $sql="select tipod, etapa from contribuyentedatos_v2 as b
	join
	(select * from estatusxfolio where  folio_dictamen=$fol and id_revisor=$id_revisor and cclave='$claveCat') as a
	ON a.folio_dictamen = b.folio;";


	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

	$rs = pg_query( $con, $sql );
	$datos = pg_num_rows($rs);

	if ($datos == "1") {
		while( $obj = pg_fetch_object($rs) ){
			$data[] = $obj;
		}
		$tipoPersona = $data[0]->tipod;
		$etapa = $data[0]->etapa;
		// echo json_encode($tipoPersona);
	}

	if ($tipoPersona == 2) {

		if ($etapa ==4 || $etapa == 1){

			$sql2="select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
		f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
		g.nombre as tipoDictamen, e.etapa, tipod
		from

		contribuyentedatos_v2 as a

		JOIN


		(select * from inmuebles_v2 where cve_catastral = '$claveCat')  as b

		ON a.folio = b.folio

		JOIN domicilio_v2 as c

		ON b.id_domicilio = c.id_domicilio

		JOIN (select * from estatusxfolio where folio_dictamen=$fol and cclave='$claveCat') as e

		ON e.folio_dictamen = a.folio

		JOIN (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f

		ON a.id_dictaminador = f.no_reg_autorizado

		JOIN tipo_dictamen_v2 as g

		ON a.tipodictamen = g.id_tipo

		where a.folio = $fol and etapa=4 or etapa=12 or etapa=51 and id_revisor=$id_revisor and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,
		f.ap_paterno, f.ap_materno,f.rfc, f.no_reg_autorizado,
		g.nombre, e.etapa, tipod;";

		$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());


		}else{

      $sql2="select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
		f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
		g.nombre as tipoDictamen, e.etapa, tipod
		from

		contribuyentedatos_v2 as a

		JOIN


		(select * from inmuebles_v2 where cve_catastral = '$claveCat')  as b

		ON a.folio = b.folio

		JOIN domicilio_v2 as c

		ON b.id_domicilio = c.id_domicilio

		JOIN (select * from estatusxfolio where folio_dictamen=$fol and cclave='$claveCat') as e

		ON e.folio_dictamen = a.folio

		JOIN (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f

		ON a.id_dictaminador = f.no_reg_autorizado

		JOIN tipo_dictamen_v2 as g

		ON a.tipodictamen = g.id_tipo

		where a.folio = $fol and etapa=4 or etapa=12 or etapa=51 and id_revisor=$id_revisor and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,
		f.ap_paterno, f.ap_materno,f.rfc, f.no_reg_autorizado,
		g.nombre, e.etapa, tipod;";

		$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());


		}


	}else if ($tipoPersona == 1) {

		if ($etapa ==4 || $etapa == 1) {

			 $sql2="select a.folio, aniodictamen, nombredenominacion,a.apaterno, a.amaterno, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
		f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
		g.nombre as tipoDictamen, e.etapa, tipod
		from

		contribuyentedatos_v2 as a

		JOIN


		(select * from inmuebles_v2 where cve_catastral = '$claveCat')  as b

		ON a.folio = b.folio

		JOIN domicilio_v2 as c

		ON b.id_domicilio = c.id_domicilio

		JOIN
		(select * from estatusxfolio where folio_dictamen = $fol AND cclave='$claveCat') as e

		ON e.folio_dictamen = a.folio

		JOIN (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f

		ON a.id_dictaminador = f.no_reg_autorizado

		JOIN tipo_dictamen_v2 as g

		ON a.tipodictamen = g.id_tipo


		where a.folio = $fol and etapa=4 or etapa=12 or etapa = 51 and id_revisor=$id_revisor and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,
		f.ap_paterno, f.ap_materno,f.rfc, f.no_reg_autorizado, a.apaterno, a.amaterno,
		g.nombre, e.etapa, tipod";


		$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else{
			 $sql2="select a.folio, aniodictamen, nombredenominacion,a.apaterno, a.amaterno, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
		f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
		g.nombre as tipoDictamen, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev, b.baldio, ava_pro_pre, hv.activo
		from

		contribuyentedatos_v2 as a

		JOIN


		(select * from inmuebles_v2 where cve_catastral = '$claveCat')  as b

		ON a.folio = b.folio

		JOIN domicilio_v2 as c

		ON b.id_domicilio = c.id_domicilio

		JOIN
		(select * from estatusxfolio where folio_dictamen = $fol AND cclave='$claveCat') as e

		ON e.folio_dictamen = a.folio

		JOIN (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f

		ON a.id_dictaminador = f.no_reg_autorizado

		JOIN tipo_dictamen_v2 as g

		ON a.tipodictamen = g.id_tipo

		JOIN

		(select * from  listadocumentos_v2 where clavecastatral =  '$claveCat') as h ON a.folio = h.id_dictamen
		JOIN (select * from dictaval_avaluos where folio_dictamun = $fol and cclave = '$claveCat') as we ON we.folio_dictamun= h.id_dictamen
		join (select * from hojasverdes where clavecc='$claveCat' and folio=$fol) as hv
		on we.folio_dictamun = hv.folio
		where a.folio = $fol and etapa=4 or etapa=12 or etapa = 51 and id_revisor=$id_revisor and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, valor_catastral,
		calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,
		f.ap_paterno, f.ap_materno,f.rfc, f.no_reg_autorizado, a.apaterno, a.amaterno,
		g.nombre, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista, e.obs_rev, b.baldio, ava_pro_pre, hv.activo;";

		$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}





	}

	$rs2 = pg_query( $con, $sql2 );
	while( $obj1 = pg_fetch_object($rs2) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	header('Content-type: application/json');
	echo json_encode($data2);



}

public function revisionDictamenInstituciones($con,$fol,$claveCat){
	$sql="select tipod, etapa from estatusxfolio as a
	JOIN contribuyentedatos_v2 as b
	ON a.folio_dictamen = b.folio
	join inmuebles_v2 as i
	on b.folio = i.folio
	where folio_dictamen=$fol and cve_catastral='$claveCat' and cclave='$claveCat';";

	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

	$rs = pg_query( $con, $sql );
	$datos = pg_num_rows($rs);

	if ($datos == "1") {
		while( $obj = pg_fetch_object($rs) ){
			$data[] = $obj;
		}
		$tipoPersona = $data[0]->tipod;
		$etapaD = $data[0]->etapa;
		// echo json_encode($tipoPersona);
	}
	if ($etapaD == 1) {
		if ($tipoPersona == 2) {

			$sql2="select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1,id_municipio as nommpio , id_revisor,
			g.nombre as tipoDictamen, e.etapa, tipod, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, f.nombre_especialista, e.obs_rev, e.obs_municipio, b.baldio
			from contribuyentedatos_v2 as a
			JOIN inmuebles_v2 as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio
			JOIN estatusxfolio as e ON e.folio_dictamen = a.folio
			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";
			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if ($tipoPersona == 1) {

			$sql2="select a.folio, aniodictamen, a.nombredenominacion, a.apaterno, a.amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1,id_municipio as nommpio , id_revisor,
			g.nombre as tipoDictamen, e.etapa, tipod, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, f.nombre_especialista, e.obs_rev, e.obs_municipio, b.baldio
			from contribuyentedatos_v2 as a
			JOIN inmuebles_v2 as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio
			JOIN estatusxfolio as e ON e.folio_dictamen = a.folio
			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}
	}else if($etapaD == 3){

		if ($tipoPersona == 2) {

			$sql2="
			select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod, e.obs_rev, e.obs_municipio, b.baldio

			from contribuyentedatos_v2 as a

			JOIN (

			SELECT * FROM  inmuebles_v2 WHERE folio = $fol and cve_catastral='$claveCat'
			) as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo




			JOIN (

			SELECT * FROM estatusxfolio where folio_dictamen = $fol and cclave = '$claveCat'
			) as e ON e.folio_dictamen = a.folio
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";
			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if ($tipoPersona == 1) {

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod, e.obs_rev, e.obs_municipio, b.baldio, orden, nombredoc, comentario


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			join (SELECT * FROM listadocumentos_v2 WHERE id_dictamen = $fol and clavecastatral = '$claveCat') as li on e.cclave = li.clavecastatral
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}

	}else if($etapaD == 15){

		//if ($tipoPersona == 2){

		//	$sql2=" ";

			//$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		//}else if($tipoPersona == 1){

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
			g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio, h.id as tipologia , hv.url


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			JOIN
			(

			select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
			) as h ON a.folio=h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		//}

	}else if($etapaD == 13){

		if ($tipoPersona == 2){

			$sql2="
			select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod, e.obs_rev, e.obs_municipio, orden, h.nombredoc, comentario, h.\"observacionRevisor\", b.baldio, h.id as tipologia, hv.url, hv.activo
			from contribuyentedatos_v2 as a
			JOIN (
			SELECT * FROM  inmuebles_v2 WHERE folio = $fol and cve_catastral='$claveCat'
			) as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo
			JOIN (
			SELECT * FROM estatusxfolio where folio_dictamen = $fol and cclave = '$claveCat'
			) as e ON e.folio_dictamen = a.folio
			JOIN (
			SELECT * FROM listadocumentos_v2 WHERE id_dictamen=$fol and clavecastatral='$claveCat') as h ON a.folio = h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if($tipoPersona == 1){

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
			g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio, h.id as tipologia , hv.url, hv.activo


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			JOIN
			(

			select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
			) as h ON a.folio=h.id_dictamen
			join (select * from hojasverdes where folio =$fol and clavecc='$claveCat') as hv on e.cclave=hv.clavecc
			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}

	}else{
		if ($tipoPersona == 2) {

			$sql2="
			select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, tipod, e.obs_rev, e.obs_municipio, orden, h.nombredoc, comentario, h.\"observacionRevisor\", b.baldio, h.id as tipologia

			from contribuyentedatos_v2 as a

			JOIN (

			SELECT * FROM  inmuebles_v2 WHERE folio = $fol and cve_catastral='$claveCat'
			) as b ON a.folio = b.folio
			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN especialistas_vigentes_v2 as f ON a.id_dictaminador = f.no_reg_autorizado
			JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo




			JOIN (

			SELECT * FROM estatusxfolio where folio_dictamen = $fol and cclave = '$claveCat'
			) as e ON e.folio_dictamen = a.folio

			JOIN (
			SELECT * FROM listadocumentos_v2 WHERE id_dictamen=$fol and clavecastatral='$claveCat') as h ON a.folio = h.id_dictamen

			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";
			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}else if ($tipoPersona == 1) {

			$sql2="select a.folio, aniodictamen, nombredenominacion, apaterno, amaterno, a.rfc, cve_catastral, e.cclave, valor_catastral,
			calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador,
			f.no_reg_autorizado as noRegistro, h.\"observacionRevisor\",
			g.nombre as tipoDictamen, e.etapa, tipod, orden, nombredoc, comentario, h.id_dictaminador, e.obs_rev, e.obs_municipio, b.baldio, h.id as tipologia


			from contribuyentedatos_v2 as a

			JOIN
			(

			SELECT * FROM inmuebles_v2 WHERE folio = $fol and cve_catastral = '$claveCat'
			)
			as b ON a.folio = b.folio

			JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio

			JOIN

			(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador = f.no_reg_autorizado

			JOIN

			tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo


			JOIN
			(
			SELECT * FROM estatusxfolio WHERE folio_dictamen = $fol AND cclave='$claveCat'
			)as e

			ON e.folio_dictamen = a.folio
			JOIN
			(

			select * from listadocumentos_v2 where id_dictamen=$fol and clavecastatral='$claveCat'
			) as h ON a.folio=h.id_dictamen

			where a.folio = $fol and cve_catastral='$claveCat' and cclave='$claveCat';";

			$result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		}
	}



	$rs2 = pg_query( $con, $sql2 );
	while( $obj1 = pg_fetch_object($rs2) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);


	header('Content-type: application/json');
	echo json_encode($data2);

}


public function inmueblesArevisar43($con,$idIN,$pp,$folio){

	session_start();
	$id_revisor=$_SESSION["idkey2"];

	$sql="
	select cve_catastral, a.folio, (lpad(a.folio::text, 5, '0')) as fol
	from (select * from inmuebles_v2 where folio=$folio and cve_catastral = '$idIN' ) as a JOIN
    (select * from estatusxfolio where folio_dictamen = $folio and cclave = '$idIN') as b on a.folio = b.folio_dictamen join contribuyentedatos_v2 as c on c.folio = b.folio_dictamen
	where cve_catastral='$idIN' and cclave='$idIN' and aniodictamen = $pp";


	///////*Para validar con año**///////


	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());

	$rs = pg_query( $con, $sql );

	// $validate_exixts = pg_num_rows($rs);
	while( $obj1 = pg_fetch_object($rs) ){
		$data2[] = $obj1;
	}
	echo $cve = $data2[0]->folio;
	// Liberando el conjunto de resultados
	/* pg_free_result($result);


	header('Content-type: application/json');
	echo json_encode($data2);*/

}

public function inmueblesArevisar_rechazadoxadminpagos($con,$idIN,$anio){
	//echo $idIN;
	session_start();
	$id_revisor=$_SESSION["idkey2"];

   $sqlvalidacion="select * from estatusxfolio as e
join inmuebles_v2 as i
on e.folio_dictamen = i.folio
 where cclave = '$idIN' and id_revisor=$id_revisor and aniodictaminar=$anio and cve_catastral='$idIN'";

	$resultados = pg_query( $con, $sqlvalidacion );
	//$validate_exixts = pg_num_rows($resultados);
	 while( $objx = pg_fetch_object($resultados) ){
   $dataxx[] = $objx;
            }

            $etapadictamen = $dataxx[0]->etapa;

	if(  $etapadictamen  == "51" ){

		/*$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 51";*/


		$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio  as e
join inmuebles_v2 as i
on e.folio_dictamen = i.folio
where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 51 and aniodictaminar=$anio and cve_catastral='$idIN';";

	}else if(  $etapadictamen  == "4" ){

		/*$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 4";*/

		 $sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio  as e
join inmuebles_v2 as i
on e.folio_dictamen = i.folio
where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 4 and aniodictaminar=$anio and cve_catastral='$idIN';";


	}else if(  $etapadictamen  == "5" ){

		/*$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 5";*/


		$sql="select (lpad(folio_dictamen::text, 5, '0')) as folio, cclave, etapa from estatusxfolio  as e
join inmuebles_v2 as i
on e.folio_dictamen = i.folio
where cclave = '$idIN' and id_revisor=$id_revisor and etapa = 5 and aniodictaminar=$anio and cve_catastral='$idIN';";

	}else if( $etapadictamen  == "12"){
		$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN') as a JOIN
	(select * from estatusxfolio where cclave = '$idIN') as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=12 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio";

	}else if( $etapadictamen  == "15" ){

		$sql="select (lpad(a.folio::text, 5, '0')) as folio
	from (select * from inmuebles_v2 where aniodictaminar = $anio and cve_catastral = '$idIN') as a JOIN
	(select * from estatusxfolio where cclave = '$idIN') as b
	on a.cve_catastral = b.cclave
	JOIN contribuyentedatos_v2 as c on a.folio = c.folio
	where cve_catastral='$idIN' and etapa=15 and id_revisor=$id_revisor and b.cclave='$idIN'
	and c.aniodictamen=$anio";

	}



	$result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
	$rs = pg_query( $con, $sql );

	while( $obj1 = pg_fetch_object($rs) ){
		$data2[] = $obj1;
	}
	 $cve = $data2[0]->folio;
	 echo $folio = $cve;

	// Liberando el conjunto de resultados
	/* pg_free_result($result);
	header('Content-type: application/json');
	echo json_encode($data2);*/

}






}
