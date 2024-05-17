<?php
/*
$json = file_get_contents('php://input');
$obj = json_decode($json);
echo $obj->access;
echo $obj->var1;
die();*/
$Schlussel = isset($_POST['acceess']) ? $_POST['acceess']:"";

if(empty($Schlussel)){
	echo "error";
	die();
header('Location: ../index.php');
}else{



switch ($Schlussel) { //folioDic

	case 892125: /// suma del valor del terrreno
	include '../bd/conex.php';
	include '../controller/ControllerPath.php';
	$obj1= new Controllermaster();
	$folio = isset($_POST['folio']) ? $_POST['folio']:"";
	$clavedict = isset($_POST['cllv']) ? $_POST['cllv']:"";

	echo $obj1->load_valterr_avg_total_total_redondeado($coxx,$folio,$clavedict);

	break;


	case 892124: /// suma del valor del terrreno
	include '../bd/conex.php';
	include '../controller/ControllerPath.php';
	$obj1= new Controllermaster();
	$folio = isset($_POST['folio']) ? $_POST['folio']:"";
	$clavedict = isset($_POST['cllv']) ? $_POST['cllv']:"";

	echo $obj1->load_valterr_avg($coxx,$folio,$clavedict);

	break;


	case 892123:

	$folio = isset($_POST['fl']) ? $_POST['fl']:"";
	$clavecatast = isset($_POST['clv']) ? $_POST['clv']:"";
	$anioxd = isset($_POST['anio']) ? $_POST['anio']:"";
	//echo "datos";
	if (file_exists("../files/documentos/".$folio."/".$clavecatast."/Avaluos.val") && file_exists("../files/documentos/".$folio."/".$clavecatast."/Construcciones.val")  ){
   echo "Los fichero existe";
}else{
   echo "Los fichero no existe";
}
	break;

	 case 4499415:// filtra información de predio por dictamen en rol revisor igecem

        include '../bd/conex.php';
        include '../controller/ControllerPath_update_admin.php';
        $obj1= new Controllermaster();
        $id = isset($_POST['idval']) ? $_POST['idval']:"";
        $comentario = isset($_POST['val']) ? $_POST['val']:"";

        echo $obj1->download_comment_revisor($coxx,$id,$comentario);

   break;


	case 4499414:// registra_ nuevo usuario de rol cpontribuyente

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $folio = isset($_POST['folio']) ? $_POST['folio']:"";
 				$clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

				 echo $obj1->comentarios_generalesxfolioxclv($coxx,$folio,$clave);

		break;






	case 4499413:// devuelve la observacion general del administrador pagos por que fue devuelto el dictamen al revisor

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $folio = isset($_POST['folio']) ? $_POST['folio']:"";
 				$clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

				 echo $obj1->comentarios_generalesxfolioxclv($coxx,$folio,$clave);

		break;


	case 4499412:// filtra información de predio por dictamen en rol revisor igecem

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $id = isset($_POST['idval']) ? $_POST['idval']:"";
				 $comentario = isset($_POST['val']) ? $_POST['val']:"";

				 echo $obj1->write_tiipolghojaverddownload_comment_revisor($coxx,$id,$comentario);

		break;


	case 4499411: // escribir en dictamen  etapa 5.1 "PRE AUTORIZADO / CON ARCHIVO EN HOJAS VERDES" tipologia x tipologia

	include '../bd/conex.php';
	include '../controller/ControllerPath_update_revisor.php';
	$obj1= new Controllermaster();
	$folio = isset($_POST['folio']) ? $_POST['folio']:"";
	$clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

	echo $obj1->revision_archivo_conhojasverdesDictamen_tipologiasn($coxx,$folio,$clave);


		break;

	case 4499410: // escribir en dictamen  etapa 5.1 "PRE AUTORIZADO / CON ARCHIVO EN HOJAS VERDES" archivo x archivo

	include '../bd/conex.php';
 include '../controller/ControllerPath_update_revisor.php';
 $obj1= new Controllermaster();
 $id = isset($_POST['idval']) ? $_POST['idval']:"";
 $comentario = isset($_POST['val']) ? $_POST['val']:"";

 echo $obj1->write_download_comment_revisor($coxx,$id,$comentario);


		break;


	case 449949: // filtra los archivos por dictamen en rol revisor igecem

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $folio = isset($_POST['folio']) ? $_POST['folio']:"";
				 $clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

				 echo $obj1->revisionDictamen_preautorizado_con_hojav($coxx,$folio,$clave);

		break;


	case 449948:// filtra información de predio por dictamen en rol revisor igecem

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $id = isset($_POST['idval']) ? $_POST['idval']:"";
				 $comentario = isset($_POST['val']) ? $_POST['val']:"";

				 echo $obj1->download_comment_revisor($coxx,$id,$comentario);

		break;


	case 449947:// filtra información de predio por dictamen en rol revisor igecem

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $folio = isset($_POST['folio']) ? $_POST['folio']:"";
				 $clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

				 echo $obj1->revisionDictamen_infopredio($coxx,$folio,$clave);

		break;


	case 449946:// filtra las tipolgias de archivos por dictamen en rol revisor igecem

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $folio = isset($_POST['folio']) ? $_POST['folio']:"";
				 $clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

				 echo $obj1->revisionDictamen_tipologiasn($coxx,$folio,$clave);

		break;


	case 449945: // filtra los archivos por dictamen en rol revisor igecem

				 include '../bd/conex.php';
				 include '../controller/ControllerPath_update_revisor.php';
				 $obj1= new Controllermaster();
				 $folio = isset($_POST['folio']) ? $_POST['folio']:"";
				 $clave = isset($_POST['cllv']) ? $_POST['cllv']:"";

				 echo $obj1->revisionDictamen($coxx,$folio,$clave);

		break;
////////////////////////////////////////////////////////////////////////////////////////////// HACIA ARRIBA INICIA LAS ACTUAALIZACIONES 24/05/2023

		case 911925:

						include '../bd/conex.php';
						include '../controller/ControllerPath2.php';
						$obj1= new Controllermaster2();
						$idI = isset($_POST['idI']) ? $_POST['idI']:"";
						$an = isset($_POST['anio']) ? $_POST['anio']:"";
						$oilof = isset($_POST['folioxcadf']) ? $_POST['folioxcadf']:"";
						echo $obj1->inmueblesArevisar2_avgeliminar($coxx,$idI,$an,$oilof);
			break;



		case 911924:
			include '../bd/conex.php';
			include '../controller/ControllerPath_update1.php';
			$obj1= new Controllermaster();


			$fol = isset($_POST['id_fol']) ? $_POST['id_fol']:"";

			echo $obj1->deleted_fol_ravg($coxx,$fol);

			break;

		case 911923:
			include '../bd/conex.php';
			include '../controller/ControllerPath_update1.php';
			$obj1= new Controllermaster();

			$etapa_n = isset($_POST['valorx']) ? $_POST['valorx']:"";
			$fol = isset($_POST['id_fol']) ? $_POST['id_fol']:"";
			$clavecattls = isset($_POST['cllv']) ? $_POST['cllv']:"";

			echo $obj1->reload_ravg($coxx,$fol,$etapa_n,$clavecattls);

			break;


		case 8882399:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			//folio:folio,anio:anio,clavec:clavec
			$fol = isset($_POST['folio']) ? $_POST['folio']:"";
			$annio = isset($_POST['anio']) ? $_POST['anio']:"";
			$clvcatavg = isset($_POST['clavec']) ? $_POST['clavec']:"";
			//$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->recarga_val1($coxx,$fol,$annio,$clvcatavg);
			//echo $obj1->recarga_val2($coxx,$fol,$annio,$clvcatavg);
			break;

			case 88823992:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			//folio:folio,anio:anio,clavec:clavec
			$fol = isset($_POST['folio']) ? $_POST['folio']:"";
			$annio = isset($_POST['anio']) ? $_POST['anio']:"";
			$clvcatavg = isset($_POST['clavec']) ? $_POST['clavec']:"";
			//$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			//echo $obj1->recarga_val1($coxx,$fol,$annio,$clvcatavg);
			echo $obj1->recarga_val2($coxx,$fol,$annio,$clvcatavg);
			break;



		case 1:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmueblesObsMunicipioRev($coxx,$fol,$tipo);
			break;
		case 2:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();

				$folio = isset($_POST['folio']) ? $_POST['folio']:"";
				$anio = isset($_POST['anio']) ? $_POST['anio']:"";
				$clave = isset($_POST['clave']) ? $_POST['clave']:"";

				echo $obj1->SelectiondatosObsMunicipio($coxx, $folio,$anio,$clave);

				break;
		case 3:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmueblesObsMunicipio($coxx,$fol,$tipo);
			break;
		case 4:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			//fol:fol,idm:idm,ObservacionPre2:ObservacionPre2,anioD:anioD
			$fol = isset($_POST['fol']) ? $_POST['fol']:"";
			$dat = isset($_POST['idm']) ? $_POST['idm']:"";
			$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
			$anioD = isset($_POST['anioD']) ? $_POST['anioD']:"";

			echo $obj1->preAutorizaRevisorr($coxx,$fol,$dat,$ObservacionPre,$anioD);
			break;
		case 5:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['fol']) ? $_POST['fol']:"";
			$dat = isset($_POST['idm']) ? $_POST['idm']:"";
			$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
			$archivoHJSVErdes = isset($_POST['archivoHJSVErdes']) ? $_POST['archivoHJSVErdes']:"";
			echo $obj1->preRechazooHV($coxx,$fol,$dat,$ObservacionPre,$archivoHJSVErdes);
			break;
		case 6:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			echo $obj1->listado_tabl_Revisoress($coxx);
			break;

		case 7:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmueblesAdmon($coxx,$fol,$tipo);
			break;

		case 8:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmueblesRev($coxx,$fol,$tipo);
			break;

		/*case 8:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmueblesRev($coxx,$fol,$tipo);
			break; */
		case 9:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmueblesP($coxx,$fol,$tipo);
			break;


		case 10:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tip = isset($_POST['tipo']) ? $_POST['tipo']:"";
			echo $obj1->tablaInmuebles($coxx,$fol,$tip);
			break;

		case 11:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tip = isset($_POST['tip']) ? $_POST['tip']:"";
			echo $obj1->tablaInmuebles_municipios($coxx,$fol,$tip);
			break;
		case 12:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();

			$folioDic = isset($_POST['folioDic']) ? $_POST['folioDic']:"";
			$clavec = isset($_POST['clavec']) ? $_POST['clavec']:"";
			$folio = isset($_POST['folio']) ? $_POST['folio']:"";
			$anio = isset($_POST['anio']) ? $_POST['anio']:"";

			echo $obj1->guardarFolioDictavalNG($coxx,$folioDic,$clavec,$folio,$anio);

			break;
		case 13:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();

			$folioDic = isset($_POST['folio']) ? $_POST['folio']:"";
			$clavec = isset($_POST['clave']) ? $_POST['clave']:"";
			//$folio = isset($_POST['folio']) ? $_POST['folio']:"";
			//$anio = isset($_POST['anio']) ? $_POST['anio']:"";

			echo $obj1->listadoDeTipologiasDic($coxx,$folioDic,$clavec);

			break;
		case 14:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['cx']) ? $_POST['cx']:"";
			$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";

			echo $obj1->inmueblesBusquedaJ($coxx,$fol,$tipo);

		break;


		case 15:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();
			$fol = isset($_POST['fol']) ? $_POST['fol']:"";
			$dat = isset($_POST['idm']) ? $_POST['idm']:"";
			$anioD = isset($_POST['anioD']) ? $_POST['anioD']:"";
			$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
			$activo = isset($_POST['activo']) ? $_POST['activo']:"";

			echo $obj1->savepreautHojasverdes($coxx,$fol,$dat,$ObservacionPre,$anioD,$activo);
			break;
		case 16:
			include '../bd/conex.php';
			include '../controller/ControllerPath.php';
			$obj1= new Controllermaster();

			$folioDic = isset($_POST['folioDic']) ? $_POST['folioDic']:"";
			$clavec = isset($_POST['clavec']) ? $_POST['clavec']:"";
			$folio = isset($_POST['folio']) ? $_POST['folio']:"";
			$anio = isset($_POST['anio']) ? $_POST['anio']:"";

			echo $obj1->guardarFolioDictaval($coxx,$folioDic,$clavec,$folio,$anio);

			break;
		case 17:
		 	    include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
				$nombre = isset($_POST['nombre']) ? $_POST['nombre']:"";
				$ap = isset($_POST['ap']) ? $_POST['ap']:"";
				$am = isset($_POST['am']) ? $_POST['am']:"";
				$curp = isset($_POST['curp']) ? $_POST['curp']:"";

				$rfc = isset($_POST['rfc']) ? $_POST['rfc']:"";
				$email = isset($_POST['email']) ? $_POST['email']:"";
				$tel = isset($_POST['tel']) ? $_POST['tel']:"";
				$reg = isset($_POST['reg']) ? $_POST['reg']:"";
				$tipoUserAnterior = isset($_POST['tipoUserAnterior']) ? $_POST['tipoUserAnterior']:"";

				echo $obj1->actualizarRegistroExistente($coxx,$tipo,$nombre,$ap,$am,$curp,$rfc,$email,$tel,$reg,$tipoUserAnterior);

		  	break;
		case 18:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();

			  $claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
			  $folio = isset($_POST['folio2'])? $_POST['folio2']:"";

			  $avaluofirmadoM = isset($_POST['avaluofirmadoM'])? $_POST['avaluofirmadoM']:"";
			  $dictavalM = isset($_POST['dictavalM'])? $_POST['dictavalM']:"";
			  $construccionesM = isset($_POST['construccionesM'])? $_POST['construccionesM']:"";

			  $actaempresa = isset($_POST['actaempresa'])? $_POST['actaempresa']:"";
			  $nombramientolegal = isset($_POST['nombramientolegal'])? $_POST['nombramientolegal']:"";
			  $boleta = isset($_POST['boleta'])? $_POST['boleta']:"";

			  $acreditapropiedadM= isset($_POST['acreditapropiedadM'])? $_POST['acreditapropiedadM']:"";
			  $idenoficialM= isset($_POST['idenoficialM'])? $_POST['idenoficialM']:"";
			  $medidascolindancM = isset($_POST['medidascolindancM'])? $_POST['medidascolindancM']:"";

			  $croquislocalizM= isset($_POST['croquislocalizM'])? $_POST['croquislocalizM']:"";
			  $otrosM = isset($_POST['otrosM'])? $_POST['otrosM']:"";
			  $indivisoscondominiosM = isset($_POST['indivisoscondominiosM'])? $_POST['indivisoscondominiosM']:"";

			  $croquisconstruccionM = isset($_POST['croquisconstruccionM'])? $_POST['croquisconstruccionM']:"";
			  $usoprivativoM= isset($_POST['usoprivativoM'])? $_POST['usoprivativoM']:"";
			  $superficiesconstruM = isset($_POST['superficiesconstruM'])? $_POST['superficiesconstruM']:"";

			  $planosfactoresM= isset($_POST['planosfactoresM'])? $_POST['planosfactoresM']:"";
			  $fachadaM= isset($_POST['fachadaM'])? $_POST['fachadaM']:"";

				echo $obj1->guardarcomentariosBaldioCambiosM($coxx,$claveCat,$folio,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM);
				break;

		case 19:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();

			  $claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
			  $folio = isset($_POST['folio2'])? $_POST['folio2']:"";

			  $avaluofirmado = isset($_POST['avaluofirmado'])? $_POST['avaluofirmado']:"";
			  $dictaval = isset($_POST['dictaval'])? $_POST['dictaval']:"";
			  $construcciones = isset($_POST['construcciones'])? $_POST['construcciones']:"";
			  $escriturap = isset($_POST['escriturap'])? $_POST['escriturap']:"";
			  $boletapredial = isset($_POST['boletapredial'])? $_POST['boletapredial']:"";
			  $acreditapropied = isset($_POST['acreditapropied'])? $_POST['acreditapropied']:"";
			  $idenoficial= isset($_POST['idenoficial'])? $_POST['idenoficial']:"";
			  $medidascolindanc= isset($_POST['medidascolindanc'])? $_POST['medidascolindanc']:"";
			  $croquislocaliz = isset($_POST['croquislocaliz'])? $_POST['croquislocaliz']:"";
			  $otros= isset($_POST['otros'])? $_POST['otros']:"";
			  $indivisoscondominios = isset($_POST['indivisoscondominios'])? $_POST['indivisoscondominios']:"";
			  $croquisconstruccion = isset($_POST['croquisconstruccion'])? $_POST['croquisconstruccion']:"";
			  $usoprivativo = isset($_POST['usoprivativo'])? $_POST['usoprivativo']:"";
			  $superficiesconstru= isset($_POST['superficiesconstru'])? $_POST['superficiesconstru']:"";
			  $planosfactores = isset($_POST['planosfactores'])? $_POST['planosfactores']:"";
			  $fachada= isset($_POST['fachada'])? $_POST['fachada']:"";

				echo $obj1->guardarcomentariosBaldioCambios($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada);
		   break;
		case 20:
						include '../bd/conex.php';
						include '../controller/ControllerPath2.php';
						$obj1= new Controllermaster2();
						$IDD = isset($_POST['idG']) ? $_POST['idG']:"";

						$id1 = isset($_POST['tipologg']) ? $_POST['tipologg']:"";

						$id2 = isset($_POST['commentg']) ? $_POST['commentg']:"";
						$id3 = isset($_POST['commentf']) ? $_POST['commentf']:"";
						$id4 = isset($_POST['commente']) ? $_POST['commente']:"";
						$id5 = isset($_POST['commentd']) ? $_POST['commentd']:"";
						$id6 = isset($_POST['commentc']) ? $_POST['commentc']:"";
						$id7 = isset($_POST['commentb']) ? $_POST['commentb']:"";
						$id8 = isset($_POST['commenta']) ? $_POST['commenta']:"";
						$id9 = isset($_POST['commentcx']) ? $_POST['commentcx']:"";
						$id10 = isset($_POST['commentav']) ? $_POST['commentav']:"";

						$id14 = isset($_POST['commentfmc']) ? $_POST['commentfmc']:"";
						$id15 = isset($_POST['commenth']) ? $_POST['commenth']:"";

						$id11 = isset($_POST['descpAc']) ? $_POST['descpAc']:"";
						//commenth9
						$id16 = isset($_POST['commenth9']) ? $_POST['commenth9']:"";
						$id17 = isset($_POST['commenth10']) ? $_POST['commenth10']:"";
						$id18 = isset($_POST['commenth11']) ? $_POST['commenth11']:"";
						$id19 = isset($_POST['commenth12']) ? $_POST['commenth12']:"";
						$id20 = isset($_POST['commenth13']) ? $_POST['commenth13']:"";

						echo $obj1->dataandfilesmCambios($coxx, $id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $id11,$IDD,$id14,$id15,$id16,$id17,$id18,$id19,$id20);


						break;
			case 21:
					include '../bd/conex.php';
					include '../controller/ControllerPath2.php';
					$obj1= new Controllermaster2();

				$IDD = isset($_POST['idG']) ? $_POST['idG']:"";

				$id1 = isset($_POST['tipologg']) ? $_POST['tipologg']:"";
				$id2 = isset($_POST['commente']) ? $_POST['commente']:"";
				$id3 = isset($_POST['commentg8']) ? $_POST['commentg8']:"";
				$id4 = isset($_POST['commentc']) ? $_POST['commentc']:"";
				$id5 = isset($_POST['commentb']) ? $_POST['commentb']:"";
				$id6 = isset($_POST['commenta']) ? $_POST['commenta']:"";
				$id7 = isset($_POST['commentcx']) ? $_POST['commentcx']:"";
				$id8 = isset($_POST['commentav']) ? $_POST['commentav']:"";
				$id9 = isset($_POST['commentf']) ? $_POST['commentf']:"";//otros
				$id14 = isset($_POST['commentfmc']) ? $_POST['commentfmc']:"";
				$id15 = isset($_POST['commentg']) ? $_POST['commentg']:"";//indivisos
				$id10 = isset($_POST['commentd']) ? $_POST['commentd']:"";
				$id11= isset($_POST['commentg9']) ? $_POST['commentg9']:"";

				$id12= isset($_POST['commentg10']) ? $_POST['commentg10']:"";
				$id13= isset($_POST['commentg11']) ? $_POST['commentg11']:"";
				$id16= isset($_POST['commentg12']) ? $_POST['commentg12']:"";
				//$comentariostipobj = isset($_POST['tipologg']) ? $_POST['tipologg']:"";
				echo $obj1->dataandfilesfCambios($coxx, $id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9,$IDD,$id14,$id15,$id10,$id11,$id12,$id13,$id16);

				//form:pahtv.vector,comment
				/*
				$filesobj = isset($_POST['form']) ? $_POST['form']:"";
				$comentariosobj = isset($_POST['comment']) ? $_POST['comment']:"";
				*/

				/*print_r($filesobj);

				print_r($comentariosobj);
				die();*/

				//echo $obj1->dataandfilesf($coxx,$IDD,$filesobj,$comentariosobj);



					break;
		    case 22:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();

			  $claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
			  $folio = isset($_POST['folio2'])? $_POST['folio2']:"";

			  $avaluofirmadoM = isset($_POST['avaluofirmadoM'])? $_POST['avaluofirmadoM']:"";
			  $dictavalM = isset($_POST['dictavalM'])? $_POST['dictavalM']:"";
			  $construccionesM = isset($_POST['construccionesM'])? $_POST['construccionesM']:"";

			  $actaempresa = isset($_POST['actaempresa'])? $_POST['actaempresa']:"";
			  $nombramientolegal = isset($_POST['nombramientolegal'])? $_POST['nombramientolegal']:"";
			  $boleta = isset($_POST['boleta'])? $_POST['boleta']:"";

			  $acreditapropiedadM= isset($_POST['acreditapropiedadM'])? $_POST['acreditapropiedadM']:"";
			  $idenoficialM= isset($_POST['idenoficialM'])? $_POST['idenoficialM']:"";
			  $medidascolindancM = isset($_POST['medidascolindancM'])? $_POST['medidascolindancM']:"";

			  $croquislocalizM= isset($_POST['croquislocalizM'])? $_POST['croquislocalizM']:"";
			  $otrosM = isset($_POST['otrosM'])? $_POST['otrosM']:"";
			  $indivisoscondominiosM = isset($_POST['indivisoscondominiosM'])? $_POST['indivisoscondominiosM']:"";

			  $croquisconstruccionM = isset($_POST['croquisconstruccionM'])? $_POST['croquisconstruccionM']:"";
			  $usoprivativoM= isset($_POST['usoprivativoM'])? $_POST['usoprivativoM']:"";
			  $superficiesconstruM = isset($_POST['superficiesconstruM'])? $_POST['superficiesconstruM']:"";

			  $planosfactoresM= isset($_POST['planosfactoresM'])? $_POST['planosfactoresM']:"";
			  $fachadaM= isset($_POST['fachadaM'])? $_POST['fachadaM']:"";

				echo $obj1->guardarcomentariosBaldioM($coxx,$claveCat,$folio,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM);
		   break;
		   case 23:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();

			  $claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
			  $folio = isset($_POST['folio2'])? $_POST['folio2']:"";

			  $avaluofirmado = isset($_POST['avaluofirmado'])? $_POST['avaluofirmado']:"";
			  $dictaval = isset($_POST['dictaval'])? $_POST['dictaval']:"";
			  $construcciones = isset($_POST['construcciones'])? $_POST['construcciones']:"";
			  $escriturap = isset($_POST['escriturap'])? $_POST['escriturap']:"";
			  $boletapredial = isset($_POST['boletapredial'])? $_POST['boletapredial']:"";
			  $acreditapropied = isset($_POST['acreditapropied'])? $_POST['acreditapropied']:"";
			  $idenoficial= isset($_POST['idenoficial'])? $_POST['idenoficial']:"";
			  $medidascolindanc= isset($_POST['medidascolindanc'])? $_POST['medidascolindanc']:"";
			  $croquislocaliz = isset($_POST['croquislocaliz'])? $_POST['croquislocaliz']:"";
			  $otros= isset($_POST['otros'])? $_POST['otros']:"";
			  $indivisoscondominios = isset($_POST['indivisoscondominios'])? $_POST['indivisoscondominios']:"";
			  $croquisconstruccion = isset($_POST['croquisconstruccion'])? $_POST['croquisconstruccion']:"";
			  $usoprivativo = isset($_POST['usoprivativo'])? $_POST['usoprivativo']:"";
			  $superficiesconstru= isset($_POST['superficiesconstru'])? $_POST['superficiesconstru']:"";
			  $planosfactores = isset($_POST['planosfactores'])? $_POST['planosfactores']:"";
			  $fachada= isset($_POST['fachada'])? $_POST['fachada']:"";

				echo $obj1->guardarcomentariosBaldio($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada);
		   break;
		   case 24:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$observacionMun = isset($_POST['ObservacionM2']) ? $_POST['ObservacionM2']:"";
				$folioD = isset($_POST['folioDic']) ? $_POST['folioDic']:"";
				$claves = isset($_POST['clave']) ? $_POST['clave']:"";
				echo $obj1->guardarObsMuni($coxx,$observacionMun,$folioD,$claves);
		   break;
		   case 25:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$idUser = isset($_POST['idP']) ? $_POST['idP']:"";

				$tel = isset($_POST['te']) ? $_POST['te']:"";
				$user = isset($_POST['us']) ? $_POST['us']:"";
				$contra = isset($_POST['co']) ? $_POST['co']:"";

				echo $obj1->guardarCambiosRev($coxx,$idUser,$tel,$user,$contra);
			break;
			case 26:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$idUser = isset($_POST['idP']) ? $_POST['idP']:"";
				$nombre = isset($_POST['nom']) ? $_POST['nom']:"";
				$apaterno = isset($_POST['ap']) ? $_POST['ap']:"";
				$amaterno = isset($_POST['am']) ? $_POST['am']:"";
				$rfc = isset($_POST['rf']) ? $_POST['rf']:"";
				$curp = isset($_POST['cu']) ? $_POST['cu']:"";
				$tel = isset($_POST['te']) ? $_POST['te']:"";
				$email = isset($_POST['ema']) ? $_POST['ema']:"";
				$user = isset($_POST['us']) ? $_POST['us']:"";
				$contra = isset($_POST['co']) ? $_POST['co']:"";

				echo $obj1->guardarCambios($coxx,$idUser,$nombre,$apaterno,$amaterno,$rfc,$curp,$tel,$email,$user,$contra);
			break;
		    case 27:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$idUser = isset($_POST['idUser']) ? $_POST['idUser']:"";

				echo $obj1->editarInfoC($coxx,$idUser);
			 break;
		   case 28:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$dat = isset($_POST['idm']) ? $_POST['idm']:"";
				$fol = isset($_POST['ff']) ? $_POST['ff']:"";
				$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
				$archivoHJSVErdes = isset($_POST['archivoHJSVErdes']) ? $_POST['archivoHJSVErdes']:"";
				echo $obj1->rechazoGr($coxx,$dat,$ObservacionPre,$fol,$archivoHJSVErdes);
			 break;
		   case 29:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$dat = isset($_POST['idm']) ? $_POST['idm']:"";
				$fol = isset($_POST['ff']) ? $_POST['ff']:"";
				$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
				echo $obj1->autorizadoJ($coxx,$dat,$ObservacionPre,$fol);
			 break;
		   case 30:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$dat = isset($_POST['idm']) ? $_POST['idm']:"";
				$fol = isset($_POST['ff']) ? $_POST['ff']:"";
				$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
				$archivoHJSVErdes = isset($_POST['archivoHJSVErdes']) ? $_POST['archivoHJSVErdes']:"";
				echo $obj1->liberado($coxx,$dat,$ObservacionPre,$fol,$archivoHJSVErdes);
			 break;
		   case 31:
		   	include '../bd/conex.php';
		   	include '../controller/ControllerPath.php';
		   	$obj1= new Controllermaster();
		   	$dat = isset($_POST['idm']) ? $_POST['idm']:"";
		   	$folio = isset($_POST['fol']) ? $_POST['fol']:"";
		   	$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
		   	$archivoHJSVErdes = isset($_POST['archivoHJSVErdes']) ? $_POST['archivoHJSVErdes']:"";
		   	echo $obj1->preRechazooJ($coxx,$dat,$ObservacionPre,$folio,$archivoHJSVErdes);
		   	break;
		case 32:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $folioDic = isset($_POST['folioDic']) ? $_POST['folioDic']:"";
	          echo $obj1->preRechazoCambios($coxx,$folioDic);

	     break;
		case 33:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $clave = isset($_POST['clavC']) ? $_POST['clavC']:"";
	           $folio = isset($_POST['fol']) ? $_POST['fol']:"";
	          echo $obj1->revisionDictamen2($coxx,$folio,$clave);

	     break;
		case 34:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $idI = isset($_POST['idI']) ? $_POST['idI']:"";
	          $an = isset($_POST['anio']) ? $_POST['anio']:"";
	          $oilof = isset($_POST['folioxcadf']) ? $_POST['folioxcadf']:"";
	          echo $obj1->inmueblesArevisar2($coxx,$idI,$an,$oilof);
	    break;
	    case 35:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $folio = isset($_POST['idI']) ? $_POST['idI']:"";
	          $clave = isset($_POST['clavC']) ? $_POST['clavC']:"";

	          echo $obj1->revisionDictamen3($coxx,$folio,$clave);

	     break;
		case 36:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $clave = isset($_POST['clavC']) ? $_POST['clavC']:"";
	           $folio = isset($_POST['fol']) ? $_POST['fol']:"";
	          echo $obj1->revisionDictamen2($coxx,$folio,$clave);

	     break;
		case 37:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $idI = isset($_POST['idI']) ? $_POST['idI']:"";
	          $an = isset($_POST['anio']) ? $_POST['anio']:"";
	          $folll = isset($_POST['fffff']) ? $_POST['fffff']:"";

	          echo $obj1->inmueblesArevisar2($coxx,$idI,$an,$folll);

	     break;
		case 38:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $foli = isset($_POST['folioD']) ? $_POST['folioD']:"";
	          $clav = isset($_POST['clavecatastral']) ? $_POST['clavecatastral']:"";

	          echo $obj1->tipologias($coxx,$foli,$clav); //continur con path2

	     break;
		case 39:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $foli2 = isset($_POST['folioD']) ? $_POST['folioD']:"";
	          $clave = isset($_POST['clavecatastral']) ? $_POST['clavecatastral']:"";
	          echo $obj1->predios($coxx,$foli2,$clave); //continur con path2

	     break;
		case 40:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $vectorTipologias = isset($_POST['vectorss']) ? $_POST['vectorss']:"";
	          $clave = isset($_POST['clavec']) ? $_POST['clavec']:"";
	          $foli = isset($_POST['folio']) ? $_POST['folio']:"";
	          echo $obj1->observacionesTipologias($coxx,$vectorTipologias,$clave,$foli);

	     break;
		case 41:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $idm = isset($_POST['idm']) ? $_POST['idm']:"";
	          $foli = isset($_POST['fo']) ? $_POST['fo']:"";
	          $comentarioDicta = isset($_POST['comentarioDicta']) ? $_POST['comentarioDicta']:"";
	          $comentarioConstruc = isset($_POST['comentarioConstruc']) ? $_POST['comentarioConstruc']:"";
	          $comentarioAvaluo = isset($_POST['comentarioAvaluo']) ? $_POST['comentarioAvaluo']:"";
	          $comentarioEscritura = isset($_POST['comentarioEscritura']) ? $_POST['comentarioEscritura']:"";
	          $comentarioCroquis = isset($_POST['comentarioCroquis']) ? $_POST['comentarioCroquis']:"";
	          $comentarioPredial = isset($_POST['comentarioPredial']) ? $_POST['comentarioPredial']:"";
	          $comentarioNombra = isset($_POST['comentarioNombra']) ? $_POST['comentarioNombra']:"";
	          $comentarioPlanos = isset($_POST['comentarioPlanos']) ? $_POST['comentarioPlanos']:"";
	          $comentarioIndivisos = isset($_POST['comentarioIndivisos']) ? $_POST['comentarioIndivisos']:"";
	          $comentariOtros = isset($_POST['comentariOtros']) ? $_POST['comentariOtros']:"";
	          $comentarioGeneral = isset($_POST['comentarioGeneral']) ? $_POST['comentarioGeneral']:"";
	          $comentarioGReporte = isset($_POST['comentarioGReporte']) ? $_POST['comentarioGReporte']:"";
	          $comentarioActa = isset($_POST['comentarioActa']) ? $_POST['comentarioActa']:"";
	          $comentarioDocAcreditaP = isset($_POST['comentarioDocAcreditaP']) ? $_POST['comentarioDocAcreditaP']:"";
	          $comentarioidentificacionOf2 = isset($_POST['comentarioidentificacionOf2']) ? $_POST['comentarioidentificacionOf2']:"";
	          $comentarioCroquis22 = isset($_POST['comentarioCroquis22']) ? $_POST['comentarioCroquis22']:"";
	          $comentarioedificacionesUsoPriv2 = isset($_POST['comentarioedificacionesUsoPriv2']) ? $_POST['comentarioedificacionesUsoPriv2']:"";
	          $comentariosuperficiesConstr2 = isset($_POST['comentariosuperficiesConstr2']) ? $_POST['comentariosuperficiesConstr2']:"";
	          $comentariofactores2 = isset($_POST['comentariofactores2']) ? $_POST['comentariofactores2']:"";
	           $comentarioCroquis223 = isset($_POST['comentarioCroquis223']) ? $_POST['comentarioCroquis223']:"";
	           $comentarioFachadas = isset($_POST['comentarioFachada']) ? $_POST['comentarioFachada']:"";
	           $comentariocomennombrleg2 = isset($_POST['comentariocomennombrleg2']) ? $_POST['comentariocomennombrleg2']:"";


	          echo $obj1->comentariosRevisorArc($coxx,$idm,$foli,$comentarioDicta,$comentarioConstruc,$comentarioAvaluo,$comentarioEscritura,$comentarioCroquis,$comentarioPredial,$comentarioPlanos,$comentarioIndivisos,$comentariOtros,$comentarioGeneral,$comentarioGReporte,$comentarioActa,$comentarioDocAcreditaP,$comentarioidentificacionOf2,$comentarioCroquis22,$comentarioedificacionesUsoPriv2,$comentariosuperficiesConstr2,$comentariofactores2,$comentarioCroquis223,$comentarioFachadas,$comentarioNombra,$comentariocomennombrleg2);

	     break;
		case 42:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $folio = isset($_POST['fol']) ? $_POST['fol']:"";
	          $clave = isset($_POST['clavC']) ? $_POST['clavC']:"";
	          echo $obj1->archivosRevisorDes($coxx,$folio,$clave);

	     break;
		case 43:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $idI = isset($_POST['idI']) ? $_POST['idI']:"";
	          $anio = isset($_POST['anio']) ? $_POST['anio']:"";
	          $folio = isset($_POST['avgfff']) ? $_POST['avgfff']:"";

	          echo $obj1->inmueblesArevisar($coxx,$idI,$anio,$folio);

	     break;
		 case 44:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $clave = isset($_POST['clavC']) ? $_POST['clavC']:"";
	           $folio = isset($_POST['fol']) ? $_POST['fol']:"";

	          echo $obj1->revisionDictamen($coxx,$folio,$clave);

	     break;

	      case 45:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $clave = isset($_POST['clavC']) ? $_POST['clavC']:"";
	           $folio = isset($_POST['fol']) ? $_POST['fol']:"";

	          echo $obj1->revisionDictamenInstituciones($coxx,$folio,$clave);

	     break;

	     //revisionDictamenInstituciones
		/* case 45:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $fol = isset($_POST['folidicta']) ? $_POST['folidicta']:"";
	          echo $obj1->inmueblesPorFolio($coxx,$fol);

	     break;*/
	     case 46:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          //$nombre = isset($_POST['dic']) ? $_POST['dic']:"";
	          echo $obj1->folios($coxx);

	     break;
		case 47:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $nombre = isset($_POST['dic']) ? $_POST['dic']:"";
	          echo $obj1->nomDictaminador($coxx,$nombre);

	     break;
		case 48:

			include '../bd/conex.php';
			include '../controller/ControllerPath2.php';
			$obj1= new Controllermaster2();

			$nombre = isset($_POST['nombre2']) ? $_POST['nombre2']:"";
	          $telefono = isset($_POST['telefono2']) ? $_POST['telefono2']:"";
	          $apellidoP = isset($_POST['apellidoP2']) ? $_POST['apellidoP2']:"";
	          $apellidoM = isset($_POST['apellidoM2']) ? $_POST['apellidoM2']:"";
	          $email = isset($_POST['email']) ? $_POST['email']:"";
	          $dictaminador = isset($_POST['dictaminador']) ? $_POST['dictaminador']:"";
	          $folio = isset($_POST['folio']) ? $_POST['folio']:"";
	          $calle = isset($_POST['calle2']) ? $_POST['calle2']:"";
	          $nEx = isset($_POST['nExterior2']) ? $_POST['nExterior2']:"";
	          $nInt = isset($_POST['nInterior2']) ? $_POST['nInterior2']:"";
	          $curp = isset($_POST['curp2']) ? $_POST['curp2']:"";
	          $rfc = isset($_POST['rfc2']) ? $_POST['rfc2']:"";
	          //c_edif:c_edif,c_dept:c_dept,valorCatastral:valorCatastral,anioDic:anioDic,tipoD:tipoD
	          $colonia2 = isset($_POST['colonia2']) ? $_POST['colonia2']:"";

	          $estado = isset($_POST['estado']) ? $_POST['estado']:"";
	          $cp = isset($_POST['cp']) ? $_POST['cp']:"";
	          $municipio = isset($_POST['municipio']) ? $_POST['municipio']:"";

	          $referencias = isset($_POST['referencias']) ? $_POST['referencias']:"";
	          $referencias2 = isset($_POST['referencias2']) ? $_POST['referencias2']:"";
	          $c_muni = isset($_POST['c_muni']) ? $_POST['c_muni']:"";
	          $c_zona = isset($_POST['c_zona']) ? $_POST['c_zona']:"";
	          $c_manz = isset($_POST['c_manz']) ? $_POST['c_manz']:"";
	          $c_lote = isset($_POST['c_lote']) ? $_POST['c_lote']:"";
	          $c_edif = isset($_POST['c_edif']) ? $_POST['c_edif']:"";
	          $c_dept = isset($_POST['c_dept']) ? $_POST['c_dept']:"";
	          $valorCatastral = isset($_POST['valorCatastral']) ? $_POST['valorCatastral']:"";
	          $anioDic = isset($_POST['anioDic']) ? $_POST['anioDic']:"";

	          $tipoD = isset($_POST['tipoD']) ? $_POST['tipoD']:"";
	          $Tpersona = isset($_POST['person']) ? $_POST['person']:"";


			echo $obj1->guardarContribuyente($coxx,$nombre,$telefono,$apellidoP,$apellidoM,$email,$dictaminador,$folio,$calle,$nEx,
					$nInt,$colonia2,$municipio,$estado,$cp,$referencias,$referencias2,
	               $c_muni,$c_zona,$c_manz,$c_lote,$c_edif,$c_dept,$valorCatastral,$anioDic,$tipoD,
	               $curp,$rfc,$Tpersona);

			break;

			case 49:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath.php';
	          $obj1= new Controllermaster();
	           $cuota1 = isset($_POST['cuota1']) ? $_POST['cuota1']:"";
	           $cuota2 = isset($_POST['cuota2']) ? $_POST['cuota2']:"";
	           $cuota3 = isset($_POST['cuota3']) ? $_POST['cuota3']:"";
	           $cuota4 = isset($_POST['cuota4']) ? $_POST['cuota4']:"";
	           $cuota5 = isset($_POST['cuota5']) ? $_POST['cuota5']:"";
	           $cuota6 = isset($_POST['cuota6']) ? $_POST['cuota6']:"";
	           $cuota7 = isset($_POST['cuota7']) ? $_POST['cuota7']:"";

	           $factoRango1 = isset($_POST['factoRango1']) ? $_POST['factoRango1']:"";
	           $factoRango2 = isset($_POST['factoRango2']) ? $_POST['factoRango2']:"";
	           $factoRango3 = isset($_POST['factoRango3']) ? $_POST['factoRango3']:"";
	           $factoRango4 = isset($_POST['factoRango4']) ? $_POST['factoRango4']:"";
	           $factoRango5 = isset($_POST['factoRango5']) ? $_POST['factoRango5']:"";
	           $factoRango6 = isset($_POST['factoRango6']) ? $_POST['factoRango6']:"";
	           $factoRango7 = isset($_POST['factoRango7']) ? $_POST['factoRango7']:"";

	          echo $obj1->actualizacionTarifas2($coxx,$cuota1,$cuota2,$cuota3,$cuota4,$cuota5,$cuota6,$cuota7,$factoRango1,$factoRango2,$factoRango3,$factoRango4,$factoRango5,$factoRango6,$factoRango7);

	    	 break;

			case 51:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$dat = isset($_POST['lr']) ? $_POST['lr']:"";
				$anio = isset($_POST['anio']) ? $_POST['anio']:"";
				$o = isset($_POST['folio']) ? $_POST['folio']:"";
				echo $obj1->Selectiondatos($coxx, $dat,$anio,$o);

				break;
				case 52:
					include '../bd/conex.php';
					include '../controller/ControllerPath.php';
					$obj1= new Controllermaster();
					$id = isset($_POST['abc']) ? $_POST['abc']:"";
					$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
					echo $obj1->savage_garden($coxx,$id,$clavcatt);

					break;
				case 53:
					include '../bd/conex.php';
					include '../controller/ControllerPath.php';
					$obj1= new Controllermaster();
					$id = isset($_POST['abc']) ? $_POST['abc']:"";
					$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
					echo $obj1->savage_garden_two($coxx, $id,$clavcatt);

					break;
				case 54:
					include '../bd/conex.php';
					include '../controller/ControllerPath.php';
					$obj1= new Controllermaster();
					$id = isset($_POST['abc']) ? $_POST['abc']:"";
					$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
					echo $obj1->arms_around_you($coxx, $id,$clavcatt);

					break;
				case 55:
					include '../bd/conex.php';
					include '../controller/ControllerPath2.php';
					$obj1= new Controllermaster2();

				$IDD = isset($_POST['idG']) ? $_POST['idG']:"";

				$id1 = isset($_POST['tipologg']) ? $_POST['tipologg']:"";
				$id2 = isset($_POST['commente']) ? $_POST['commente']:"";
				$id3 = isset($_POST['commentg8']) ? $_POST['commentg8']:"";
				$id4 = isset($_POST['commentc']) ? $_POST['commentc']:"";
				$id5 = isset($_POST['commentb']) ? $_POST['commentb']:"";
				$id6 = isset($_POST['commenta']) ? $_POST['commenta']:"";
				$id7 = isset($_POST['commentcx']) ? $_POST['commentcx']:"";
				$id8 = isset($_POST['commentav']) ? $_POST['commentav']:"";
				$id9 = isset($_POST['commentf']) ? $_POST['commentf']:"";//otros
				$id14 = isset($_POST['commentfmc']) ? $_POST['commentfmc']:"";
				$id15 = isset($_POST['commentg']) ? $_POST['commentg']:"";//indivisos
				$id10 = isset($_POST['commentd']) ? $_POST['commentd']:"";
				$id11= isset($_POST['commentg9']) ? $_POST['commentg9']:"";

				$id12= isset($_POST['commentg10']) ? $_POST['commentg10']:"";
				$id13= isset($_POST['commentg11']) ? $_POST['commentg11']:"";
				$id16= isset($_POST['commentg12']) ? $_POST['commentg12']:"";
				//$comentariostipobj = isset($_POST['tipologg']) ? $_POST['tipologg']:"";
				echo $obj1->dataandfilesf($coxx, $id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9,$IDD,$id14,$id15,$id10,$id11,$id12,$id13,$id16);

				//form:pahtv.vector,comment
				/*
				$filesobj = isset($_POST['form']) ? $_POST['form']:"";
				$comentariosobj = isset($_POST['comment']) ? $_POST['comment']:"";
				*/

				/*print_r($filesobj);

				print_r($comentariosobj);
				die();*/

				//echo $obj1->dataandfilesf($coxx,$IDD,$filesobj,$comentariosobj);



					break;
					case 56:
						include '../bd/conex.php';
						include '../controller/ControllerPath2.php';
						$obj1= new Controllermaster2();
						$IDD = isset($_POST['idG']) ? $_POST['idG']:"";

						$id1 = isset($_POST['tipologg']) ? $_POST['tipologg']:"";

						$id2 = isset($_POST['commentg']) ? $_POST['commentg']:"";
						$id3 = isset($_POST['commentf']) ? $_POST['commentf']:"";
						$id4 = isset($_POST['commente']) ? $_POST['commente']:"";
						$id5 = isset($_POST['commentd']) ? $_POST['commentd']:"";
						$id6 = isset($_POST['commentc']) ? $_POST['commentc']:"";
						$id7 = isset($_POST['commentb']) ? $_POST['commentb']:"";
						$id8 = isset($_POST['commenta']) ? $_POST['commenta']:"";
						$id9 = isset($_POST['commentcx']) ? $_POST['commentcx']:"";
						$id10 = isset($_POST['commentav']) ? $_POST['commentav']:"";

						$id14 = isset($_POST['commentfmc']) ? $_POST['commentfmc']:"";
						$id15 = isset($_POST['commenth']) ? $_POST['commenth']:"";

						$id11 = isset($_POST['descpAc']) ? $_POST['descpAc']:"";
						//commenth9
						$id16 = isset($_POST['commenth9']) ? $_POST['commenth9']:"";
						$id17 = isset($_POST['commenth10']) ? $_POST['commenth10']:"";
						$id18 = isset($_POST['commenth11']) ? $_POST['commenth11']:"";
						$id19 = isset($_POST['commenth12']) ? $_POST['commenth12']:"";
						$id20 = isset($_POST['commenth13']) ? $_POST['commenth13']:"";

						echo $obj1->dataandfilesm($coxx, $id1, $id2, $id3, $id4, $id5, $id6, $id7, $id8, $id9, $id10, $id11,$IDD,$id14,$id15,$id16,$id17,$id18,$id19,$id20);


						break;
					case 57:
						include '../bd/conex.php';
						include '../controller/ControllerPath.php';
						$obje= new Controllermaster();
							$date_xa = isset($_POST['xa']) ? $_POST['xa']:"";

						echo $obje->lista_municipio($coxx,$date_xa);
						break;
					case 58:
						include '../bd/conex.php';
						include '../controller/ControllerPath.php';
						$obje= new Controllermaster();
						$opcss = isset($_POST['selectp']) ? $_POST['selectp']:"";
						$x0 = isset($_POST['x0']) ? $_POST['x0']:"";
						$x1 = isset($_POST['x1']) ? $_POST['x1']:"";
						$x2 = isset($_POST['x2']) ? $_POST['x2']:"";
						$x3 = isset($_POST['x3']) ? $_POST['x3']:"";
						$x4 = isset($_POST['x4']) ? $_POST['x4']:"";
						$x5 = isset($_POST['x5']) ? $_POST['x5']:"";
						$x6 = isset($_POST['x6']) ? $_POST['x6']:"";
						$x7 = isset($_POST['x7']) ? $_POST['x7']:"";
						$x8 = isset($_POST['x8']) ? $_POST['x8']:"";
						$x9 = isset($_POST['x9']) ? $_POST['x9']:"";

						echo $obje->Rewrite_user($coxx, $opcss,$x0 , $x1, $x2, $x3, $x4, $x5, $x6, $x7,$x8,$x9);
						break;
					case 59:
						$x0 = isset($_POST['x0']) ? $_POST['x0']:"";
						include '../bd/conex.php';
						include '../controller/ControllerPath.php';
						$obje= new Controllermaster();
						echo $obje->detele_user($coxx, $x0);
						break;
					case 60:
						include '../bd/conex.php';
						include '../controller/ControllerPath.php';
						$obje= new Controllermaster();
						$date_xa = isset($_POST['xa']) ? $_POST['xa']:"";
						//if(empty($obj->data->xa)){echo"error2";die();}else{$date_xa =  $obj->data->xa;}
						echo $obje->lista_municipio($coxx,$date_xa);

						break;
						case 61:
						include '../bd/conex.php';
						include '../controller/ControllerPath.php';
						$obje= new Controllermaster();
						echo $obje->combox_Delegac($coxx);

						break;
						case 62:
						include '../bd/conex.php';
						include '../controller/ControllerPath.php';
						$obje= new Controllermaster();
						echo $obje->version_DICTABAL($coxx);

						break;
						case 63:
							include '../bd/conex.php';
							include '../controller/ControllerPath.php';
							$obje= new Controllermaster();
							echo $obje->lista_estado($coxx);

						break;
						case 64:
							include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
			 $obje= new Controllermaster();
			 $x0 = isset($_POST['j']) ? $_POST['j']:"";

	     	echo $obje->lista_municipio($coxx,$x0);

						break;
						case 65:
							include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
			 $obje= new Controllermaster();
			  $x0 = isset($_POST['ji']) ? $_POST['ji']:"";
			 $x1 = isset($_POST['jo']) ? $_POST['jo']:"";

	     	if(  $x0 == "" ||  $x0 == " " ){
	echo $obje->lista_cp_mx($coxx,$x1,$x0);
			 }else{
				 echo $obje->lista_cp_mx($coxx,$x1,$x0);

			 }



						break;
						case 66:
							include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$dat = isset($_POST['lr']) ? $_POST['lr']:"";
				echo $obj1->SelectiondatosAvC($coxx, $dat);

						break;
						case 67:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->municpios($coxx);
						break;
						case 68:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->combox_checks($coxx);
			 break;
			 case 69:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$dat = isset($_POST['lr']) ? $_POST['lr']:"";
				echo $obj1->inmueble1($coxx,$dat);
			 break;

			case 70:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$fol = isset($_POST['fol']) ? $_POST['fol']:"";
				$dat = isset($_POST['idm']) ? $_POST['idm']:"";
				$anioD = isset($_POST['anioD']) ? $_POST['anioD']:"";
				$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
				$activo = isset($_POST['activo']) ? $_POST['activo']:"";
				echo $obj1->save($coxx,$fol,$dat,$ObservacionPre,$anioD,$activo);
			break;

			 case 71:
			 	include '../bd/conex.php';
			 	include '../controller/ControllerPath.php';
			 	$obj1= new Controllermaster();
			 	$datoper = isset($_POST['idpers']) ? $_POST['idpers']:"";
			 	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
			 	$datoclav = isset($_POST['calvecatt']) ? $_POST['calvecatt']:"";
			 	$etapa = isset($_POST['etapa']) ? $_POST['etapa']:"";
			 	echo $obj1->view_docs_general($coxx,$datoper,$datodic,$datoclav,$etapa);

			 break;
			 case 72:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo$datoper = isset($_POST['tiper']) ? $_POST['tiper']:"";
				echo$datodic = isset($_POST['dct']) ? $_POST['dct']:"";
				//die();
				echo $obj1->view_tipologs_general($coxx,$datoper,$datodic);


			 break;
			 case 73:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				$datoper = isset($_POST['idpers']) ? $_POST['idpers']:"";
				$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
				$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";

				echo $obj1->xview_tipologs_general($coxx,$datoper,$datodic,$datoclv);
				break;
			 case 74:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->selectopctrevis($coxx);

			 break;
			  case 75:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->combox_especialiss($coxx);

			 break;
			 case 76:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->combo_expecialistas($coxx);

			 break;
			 case 77:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->email_more($coxx);
			 break;
			 case 78:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->tbl_seg_dict($coxx);
			 break;
			 case 79:
				include '../bd/conex.php';
				include '../controller/ControllerPath.php';
				$obj1= new Controllermaster();
				echo $obj1->tbl_process_dict($coxx);
			 break;
			 case 80:
			 	include '../bd/conex.php';
			 	include '../controller/ControllerPath.php';
			 	$obj1= new Controllermaster();
			 	$fol = isset($_POST['fol']) ? $_POST['fol']:"";
			 	$dat = isset($_POST['idm']) ? $_POST['idm']:"";
			 	$ObservacionPre = isset($_POST['ObservacionPre2']) ? $_POST['ObservacionPre2']:"";
			 	$anioD = isset($_POST['anioD']) ? $_POST['anioD']:"";
			 	$activo = isset($_POST['activo']) ? $_POST['activo']:"";
			 	echo $obj1->preRechazoo($coxx,$fol,$dat,$ObservacionPre,$anioD,$activo);
			 	break;
			 case 81:
			     include '../bd/conex.php';
			     include '../controller/ControllerPath.php';
			     $datt = isset($_POST['alf']) ? $_POST['alf']:"";
			     $obj1= new Controllermaster();
			     echo $obj1->busqeda_datos_user($coxx,$datt);
			     break;
			 case 82:
			     include '../bd/conex.php';
			     include '../controller/ControllerPath.php';
			     $obj1= new Controllermaster();
			     echo $obj1->revisores_igecem_combo($coxx);
			     break;
	         case 83:
	           include '../bd/conex.php';
	           include '../controller/ControllerPath.php';
	           $obj1= new Controllermaster();
	           $id = isset($_POST['abc']) ? $_POST['abc']:"";
	           $idcl = isset($_POST['clvcc']) ? $_POST['clvcc']:"";
	           echo $obj1->savage_garden($coxx,$id,$idcl);

	           break;
	         case 84:
	           include '../bd/conex.php';
	           include '../controller/ControllerPath.php';
	           $obj1= new Controllermaster();
	           $id = isset($_POST['abc']) ? $_POST['abc']:"";
	           $clvcc = isset($_POST['clvcc']) ? $_POST['clvcc']:"";
	           echo $obj1->savage_garden_validation($coxx, $id,$clvcc);

	           break;
	            case 85:
	           include '../bd/conex.php';
	           include '../controller/ControllerPath.php';
	           $obj1= new Controllermaster();
	           $datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	           echo $obj1->view_docs_general_validation_version($coxx,$datodic);

	           break;
	           case 86:
	           include '../bd/conex.php';
	           include '../controller/ControllerPath.php';
	           $obj1= new Controllermaster();
	           $idmun = isset($_POST['p']) ? $_POST['p']:"";
	           echo $obj1->municpios_autoacompletado($coxx,$idmun);

	           break;
	           case 87:
						 	include '../bd/conex.php';
						 	include '../controller/ControllerPath.php';
						 	$obj1= new Controllermaster();
						 	echo $obj1->listado_tabl_dictaminadores($coxx);
						 	break;

						 	case 88:
						 	include '../bd/conex.php';
						 	include '../controller/ControllerPath.php';
						 	$obj1= new Controllermaster();
						 	echo $obj1->listado_tabl_dictaminadores2($coxx);
						 	break;

						 	case 89:
						 		include '../bd/conex.php';
						 		include '../controller/ControllerPath.php';
						 		$obj1= new Controllermaster();
						 		echo $obj1->validarClaveCatatral($coxx);
						 		break;

	      case 96:
	     break;
	     case 97:
	      include '../bd/conex.php';
	        include '../controller/ControllerPath.php';
	        $obj1= new Controllermaster();
	      //folio:folio,calle2:calle2,noEx2:noEx2,colonia2:colonia2,referencia:referencia,municipio:municipio,cp:cp
	       $folio = isset($_POST['folio']) ? $_POST['folio']:"";
	       $calle2 = isset($_POST['calle']) ? $_POST['calle']:"";
	       $noEx2 = isset($_POST['noEx']) ? $_POST['noEx']:"";
	        $noI2 = isset($_POST['noI']) ? $_POST['noI']:"";
	       $colonia2 = isset($_POST['colonia']) ? $_POST['colonia']:"";
	       $referencia = isset($_POST['referencia']) ? $_POST['referencia']:"";
	       $municipio = isset($_POST['municipio']) ? $_POST['municipio']:"";
	       $cp = isset($_POST['cp']) ? $_POST['cp']:"";

	       echo $obj1->actualizarDom($coxx,$folio,$calle2,$noEx2,$noI2,$colonia2,$referencia,$municipio,$cp);
	     break;
	     case 98:
	     include '../bd/conex.php';
	        include '../controller/ControllerPath.php';
	        $obj1= new Controllermaster();

	       $folio = isset($_POST['folio']) ? $_POST['folio']:"";
	       $anio = isset($_POST['anio']) ? $_POST['anio']:"";
	       $valoC = isset($_POST['valoC']) ? $_POST['valoC']:"";
	       $clave = isset($_POST['clave']) ? $_POST['clave']:"";
	       $pagoIm = isset($_POST['pagoIm']) ? $_POST['pagoIm']:"";
	       $modificacion = isset($_POST['modificacion']) ? $_POST['modificacion']:"";
	       $m3 = isset($_POST['m3']) ? $_POST['m3']:"";

	       echo $obj1->actualizarInmueble($coxx,$folio,$anio,$valoC,$clave,$pagoIm,$modificacion,$m3);
	     break;
	     case 99:

	     	include '../bd/conex.php';
	        include '../controller/ControllerPath.php';
	        $obj1= new Controllermaster();

	       $folio = isset($_POST['folio']) ? $_POST['folio']:"";
	       $dictaminador = isset($_POST['dictaminador']) ? $_POST['dictaminador']:"";


	       echo $obj1->buscaRegistro($coxx,$folio,$dictaminador);

	     break;
	     case 100:
	     	include '../bd/conex.php';
	        include '../controller/ControllerPath.php';
	        $obj1= new Controllermaster();

	       $usuario = isset($_POST['user']) ? $_POST['user']:"";
	       $contras = isset($_POST['pass']) ? $_POST['pass']:"";
	      // $gt = isset($_POST['g']) ? $_POST['g']:"";

	       echo $obj1->reactivar($coxx,$usuario,$contras);
	     break;
	     case 101:

	     include '../bd/conex.php';
	     include '../controller/ControllerPath.php';
	     $obj1= new Controllermaster();

	    $usuario = isset($_POST['u2']) ? $_POST['u2']:"";
	     $contras = isset($_POST['pw2']) ? $_POST['pw2']:"";
	     $gt = isset($_POST['g']) ? $_POST['g']:"";

	     echo $obj1->login($coxx,$usuario,$contras,$gt);

	     break;
	     case 102:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj= new Controllermaster();

	     	//$usuario = isset($_POST['e']) ? $_POST['e']:"";
	     	//echo $obj->closeed($coxx, $usuario);

	     	//echo "serrar ";die();
	     	echo $obj->closeed($coxx);

	     	break;

	     case 10102:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj= new Controllermaster();

	     	//$usuario = isset($_POST['e']) ? $_POST['e']:"";
	     	//echo $obj->closeed($coxx, $usuario);

	     	//echo "serrar ";die();
	     	echo $obj->closeed_contribuyente($coxx);

	     	break;

	     case 10103:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj= new Controllermaster();

	     	//$usuario = isset($_POST['e']) ? $_POST['e']:"";
	     	//echo $obj->closeed($coxx, $usuario);

	     	//echo "serrar ";die();
	     	echo $obj->closeed_ADMIN1($coxx);

	     	break;

	     case 999:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj= new Controllermaster();

	     	//$usuario = isset($_POST['e']) ? $_POST['e']:"";
	     	//echo $obj->closeed($coxx, $usuario);

	     	//echo "serrar ";die();
	     	echo $obj->closeed_vista_general($coxx);

	     	break;







	     case 110:
	     	//echo "holaa"; die();
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$datoper = isset($_POST['idpers']) ? $_POST['idpers']:"";
	     	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	     	$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";

	     	echo $obj1->xview_tipologs_general2($coxx,$datoper,$datodic,$datoclv);
	     	break;


	     case 111:
	     	//echo "holaa"; die();
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$datotipodepredio = isset($_POST['tipopre']) ? $_POST['tipopre']:"";
	     	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	     	$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";
	     	$etapa=1;
	     	echo $obj1->view_docs_generalextra($coxx,$datotipodepredio,$datodic,$datoclv,$etapa);
	     	break;
	     case 112:
	     	//construido
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	$avaluofirmadoM = isset($_POST['avaluofirmadoM'])? $_POST['avaluofirmadoM']:"";
	     	$dictavalM = isset($_POST['dictavalM'])? $_POST['dictavalM']:"";
	     	$construccionesM = isset($_POST['construccionesM'])? $_POST['construccionesM']:"";

	     	$actaempresa = isset($_POST['actaempresa'])? $_POST['actaempresa']:"";
	     	$nombramientolegal = isset($_POST['nombramientolegal'])? $_POST['nombramientolegal']:"";
	     	$boleta = isset($_POST['boleta'])? $_POST['boleta']:"";

	     	$acreditapropiedadM= isset($_POST['acreditapropiedadM'])? $_POST['acreditapropiedadM']:"";
	     	$idenoficialM= isset($_POST['idenoficialM'])? $_POST['idenoficialM']:"";
	     	$medidascolindancM = isset($_POST['medidascolindancM'])? $_POST['medidascolindancM']:"";

	     	$croquislocalizM= isset($_POST['croquislocalizM'])? $_POST['croquislocalizM']:"";
	     	$otrosM = isset($_POST['otrosM'])? $_POST['otrosM']:"";
	     	$indivisoscondominiosM = isset($_POST['indivisoscondominiosM'])? $_POST['indivisoscondominiosM']:"";

	     	$croquisconstruccionM = isset($_POST['croquisconstruccionM'])? $_POST['croquisconstruccionM']:"";
	     	$usoprivativoM= isset($_POST['usoprivativoM'])? $_POST['usoprivativoM']:"";
	     	$superficiesconstruM = isset($_POST['superficiesconstruM'])? $_POST['superficiesconstruM']:"";

	     	$planosfactoresM= isset($_POST['planosfactoresM'])? $_POST['planosfactoresM']:"";

	     	$fachadaM= isset($_POST['fachadaM'])? $_POST['fachadaM']:"";

	     	$tipolooo = isset($_POST['tipologg']) ? $_POST['tipologg']:"";

	     	echo $obj1->guardarcomentariosConstruidoMextra($coxx,$claveCat,$folio,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM,$tipolooo);

	     	break;
	     case 1118:
	     	// baldio
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	$avaluofirmado = isset($_POST['avaluofirmado'])? $_POST['avaluofirmado']:"";
	     	$dictaval = isset($_POST['dictaval'])? $_POST['dictaval']:"";
	     	$construcciones = isset($_POST['construcciones'])? $_POST['construcciones']:"";
	     	$escriturap = isset($_POST['escriturap'])? $_POST['escriturap']:"";
	     	$boletapredial = isset($_POST['boletapredial'])? $_POST['boletapredial']:"";
	     	$acreditapropied = isset($_POST['acreditapropied'])? $_POST['acreditapropied']:"";
	     	$idenoficial= isset($_POST['idenoficial'])? $_POST['idenoficial']:"";
	     	$medidascolindanc= isset($_POST['medidascolindanc'])? $_POST['medidascolindanc']:"";
	     	$croquislocaliz = isset($_POST['croquislocaliz'])? $_POST['croquislocaliz']:"";
	     	$otros= isset($_POST['otros'])? $_POST['otros']:"";
	     	$indivisoscondominios = isset($_POST['indivisoscondominios'])? $_POST['indivisoscondominios']:"";
	     	$croquisconstruccion = isset($_POST['croquisconstruccion'])? $_POST['croquisconstruccion']:"";
	     	$usoprivativo = isset($_POST['usoprivativo'])? $_POST['usoprivativo']:"";
	     	$superficiesconstru= isset($_POST['superficiesconstru'])? $_POST['superficiesconstru']:"";
	     	$planosfactores = isset($_POST['planosfactores'])? $_POST['planosfactores']:"";
	     	$fachada= isset($_POST['fachada'])? $_POST['fachada']:"";

	     	echo $obj1->guardarcomentariosBaldioBAldioMextra($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada);
	     	break;

	     case 113:

	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	echo $obj1->validardocx_m($coxx,$claveCat,$folio);

	     	break;
	     case 114:

	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	echo $obj1->validar_tipo_prediobaldio($coxx,$claveCat,$folio);

	     	break;
	     case 115:

	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	echo $obj1->validar_tipo_predioconstruido($coxx,$claveCat,$folio);

	     	break;
	     case 116:

	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	echo $obj1->validar_pararecargar($coxx,$claveCat,$folio);

	     	break;

	     case 1152:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->savage_gardenextra($coxx,$id,$clavcatt);

	     	break;
	     case 1153:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->savage_garden_twoextra($coxx, $id,$clavcatt);

	     	break;
	     case 1154:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->arms_around_youextra($coxx, $id,$clavcatt);
	     	break;

	     case 7070: //subida2
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	echo $obj1->subida2($coxx);
	     	break;





	     case 120:
	     	//echo "holaa"; die();
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$datotipodepredio = isset($_POST['tipopre']) ? $_POST['tipopre']:"";
	     	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	     	$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";
	     	$etapa=1;
	     	echo $obj1->view_docs_generales_to_cancelados($coxx,$datotipodepredio,$datodic,$datoclv,$etapa);
	     	break;








	     case 213:

	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	echo $obj1->validardocx_m_all($coxx,$claveCat,$folio);

	     	break;












	     case 2228:
	     	// guarda datos de cambio y comentarios de un predio baldio
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	$avaluofirmado = isset($_POST['avaluofirmado'])? $_POST['avaluofirmado']:"";
	     	$dictaval = isset($_POST['dictaval'])? $_POST['dictaval']:"";
	     	$construcciones = isset($_POST['construcciones'])? $_POST['construcciones']:"";
	     	$escriturap = isset($_POST['escriturap'])? $_POST['escriturap']:"";
	     	$boletapredial = isset($_POST['boletapredial'])? $_POST['boletapredial']:"";
	     	$acreditapropied = isset($_POST['acreditapropied'])? $_POST['acreditapropied']:"";
	     	$idenoficial= isset($_POST['idenoficial'])? $_POST['idenoficial']:"";
	     	$medidascolindanc= isset($_POST['medidascolindanc'])? $_POST['medidascolindanc']:"";
	     	$croquislocaliz = isset($_POST['croquislocaliz'])? $_POST['croquislocaliz']:"";
	     	$otros= isset($_POST['otros'])? $_POST['otros']:"";
	     	$indivisoscondominios = isset($_POST['indivisoscondominios'])? $_POST['indivisoscondominios']:"";
	     	$croquisconstruccion = isset($_POST['croquisconstruccion'])? $_POST['croquisconstruccion']:"";
	     	$usoprivativo = isset($_POST['usoprivativo'])? $_POST['usoprivativo']:"";
	     	$superficiesconstru= isset($_POST['superficiesconstru'])? $_POST['superficiesconstru']:"";
	     	$planosfactores = isset($_POST['planosfactores'])? $_POST['planosfactores']:"";
	     	$fachada= isset($_POST['fachada'])? $_POST['fachada']:"";


	     	$actaConstitutiva= isset($_POST['actaConstitutiva'])? $_POST['actaConstitutiva']:"";
	     	$nombramientooLegal= isset($_POST['nombramientooLegal'])? $_POST['nombramientooLegal']:"";

	     	echo $obj1->guardarcomentariosBaldioBAldio_cambios($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,
	     			$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,
	     			$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada,
	     			$actaConstitutiva,$nombramientooLegal);

	     	//echo $obj1->guardarcomentariosBaldioBAldio_cambios($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada);
	     	break;



	     case 2252:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->savage_garden_changesave($coxx,$id,$clavcatt);

	     	break;
	     case 2253:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->savage_garden_two_changesave($coxx, $id,$clavcatt);

	     	break;
	     case 2254:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->arms_around_you_changesave($coxx, $id,$clavcatt);
	     	break;


	     case 222:
	     	// guarda datos de cambio y comentarios de un predio construido
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	$avaluofirmadoM = isset($_POST['avaluofirmadoM'])? $_POST['avaluofirmadoM']:"";
	     	$dictavalM = isset($_POST['dictavalM'])? $_POST['dictavalM']:"";
	     	$construccionesM = isset($_POST['construccionesM'])? $_POST['construccionesM']:"";

	     	$actaempresa = isset($_POST['actaempresa'])? $_POST['actaempresa']:"";
	     	$nombramientolegal = isset($_POST['nombramientolegal'])? $_POST['nombramientolegal']:"";
	     	$boleta = isset($_POST['boleta'])? $_POST['boleta']:"";

	     	$acreditapropiedadM= isset($_POST['acreditapropiedadM'])? $_POST['acreditapropiedadM']:"";
	     	$idenoficialM= isset($_POST['idenoficialM'])? $_POST['idenoficialM']:"";
	     	$medidascolindancM = isset($_POST['medidascolindancM'])? $_POST['medidascolindancM']:"";

	     	$croquislocalizM= isset($_POST['croquislocalizM'])? $_POST['croquislocalizM']:"";
	     	$otrosM = isset($_POST['otrosM'])? $_POST['otrosM']:"";
	     	$indivisoscondominiosM = isset($_POST['indivisoscondominiosM'])? $_POST['indivisoscondominiosM']:"";

	     	$croquisconstruccionM = isset($_POST['croquisconstruccionM'])? $_POST['croquisconstruccionM']:"";
	     	$usoprivativoM= isset($_POST['usoprivativoM'])? $_POST['usoprivativoM']:"";
	     	$superficiesconstruM = isset($_POST['superficiesconstruM'])? $_POST['superficiesconstruM']:"";

	     	$planosfactoresM= isset($_POST['planosfactoresM'])? $_POST['planosfactoresM']:"";

	     	$fachadaM= isset($_POST['fachadaM'])? $_POST['fachadaM']:"";

	     	$tipolooo = isset($_POST['tipologg']) ? $_POST['tipologg']:"";

	     	echo $obj1->guardarcomentariosConstruidoM_changesave($coxx,$claveCat,$folio,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM,$tipolooo);

	     	break;


	     case 2210:
	     	//echo "holaa"; die();
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$datoper = isset($_POST['idpers']) ? $_POST['idpers']:"";
	     	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	     	$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";

	     	echo $obj1->xview_tipologs_general_observacionesrevisor($coxx,$datoper,$datodic,$datoclv);
	     	break;



	     case 313:

	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

	     	echo $obj1->validardocx_m_all($coxx,$claveCat,$folio);

	     	break;


	     case 3338:
	     	// baldio
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

				//echo "datos";
				if (file_exists("../files/documentos/".$folio."/".$claveCat."/Avaluos.val") && file_exists("../files/documentos/".$folio."/".$claveCat."/Construcciones.val")  ){
			   //echo "Los fichero existe";
				 //continua el proceso

				 	     	$avaluofirmado = isset($_POST['avaluofirmado'])? $_POST['avaluofirmado']:"";
				 	     	$dictaval = isset($_POST['dictaval'])? $_POST['dictaval']:"";
				 	     	$construcciones = isset($_POST['construcciones'])? $_POST['construcciones']:"";
				 	     	$escriturap = isset($_POST['escriturap'])? $_POST['escriturap']:"";
				 	     	$boletapredial = isset($_POST['boletapredial'])? $_POST['boletapredial']:"";
				 	     	$acreditapropied = isset($_POST['acreditapropied'])? $_POST['acreditapropied']:"";
				 	     	$idenoficial= isset($_POST['idenoficial'])? $_POST['idenoficial']:"";
				 	     	$medidascolindanc= isset($_POST['medidascolindanc'])? $_POST['medidascolindanc']:"";
				 	     	$croquislocaliz = isset($_POST['croquislocaliz'])? $_POST['croquislocaliz']:"";
				 	     	$otros= isset($_POST['otros'])? $_POST['otros']:"";
				 	     	$indivisoscondominios = isset($_POST['indivisoscondominios'])? $_POST['indivisoscondominios']:"";
				 	     	$croquisconstruccion = isset($_POST['croquisconstruccion'])? $_POST['croquisconstruccion']:"";
				 	     	$usoprivativo = isset($_POST['usoprivativo'])? $_POST['usoprivativo']:"";
				 	     	$superficiesconstru= isset($_POST['superficiesconstru'])? $_POST['superficiesconstru']:"";
				 	     	$planosfactores = isset($_POST['planosfactores'])? $_POST['planosfactores']:"";
				 	     	$fachada= isset($_POST['fachada'])? $_POST['fachada']:"";


				 	     	$actaConstitutiva = isset($_POST['actaConstitutiva'])? $_POST['actaConstitutiva']:"";
				 	     	$nombramientoLegal= isset($_POST['nombramientoLegal'])? $_POST['nombramientoLegal']:"";



				 	     	echo $obj1->guardarcomentariosBaldioBAldio_cargarfilesone($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada,$actaConstitutiva,$nombramientoLegal);

			}else{
			   //echo "Los fichero no existe";
				 echo "99991155000";
			}



	     	//echo $obj1->guardarcomentariosBaldioBAldio_cargarfilesone($coxx,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada);
	     	break;


	     case 3352:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->savage_garden_filesone($coxx,$id,$clavcatt);

	     	break;
	     case 3353:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->savage_garden_two_filesone($coxx, $id,$clavcatt);

	     	break;
	     case 3354:
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();
	     	$id = isset($_POST['abc']) ? $_POST['abc']:"";
	     	$clavcatt = isset($_POST['ky']) ? $_POST['ky']:"";
	     	echo $obj1->arms_around_you_filesone($coxx, $id,$clavcatt);
	     	break;

	     	 case 332:
	     	//construido
	     	include '../bd/conex.php';
	     	include '../controller/ControllerPath.php';
	     	$obj1= new Controllermaster();

	     	$claveCat = isset($_POST['claveCat'])? $_POST['claveCat']:"";
	     	$folio = isset($_POST['folio2'])? $_POST['folio2']:"";

				if (file_exists("../files/documentos/".$folio."/".$claveCat."/Avaluos.val") && file_exists("../files/documentos/".$folio."/".$claveCat."/Construcciones.val")  ){

					$avaluofirmadoM = isset($_POST['avaluofirmadoM'])? $_POST['avaluofirmadoM']:"";
		     	$dictavalM = isset($_POST['dictavalM'])? $_POST['dictavalM']:"";
		     	$construccionesM = isset($_POST['construccionesM'])? $_POST['construccionesM']:"";
		     	/*
		     	$actaempresa = isset($_POST['actaempresa'])? $_POST['actaempresa']:"";
		     	$nombramientolegal = isset($_POST['nombramientolegal'])? $_POST['nombramientolegal']:"";
		     	*/
		     	$actaempresa = "N/A";
		     	$nombramientolegal = "N/A";

		     	$boleta = isset($_POST['boleta'])? $_POST['boleta']:"";

		     	$acreditapropiedadM= isset($_POST['acreditapropiedadM'])? $_POST['acreditapropiedadM']:"";
		     	$idenoficialM= isset($_POST['idenoficialM'])? $_POST['idenoficialM']:"";
		     	$medidascolindancM = isset($_POST['medidascolindancM'])? $_POST['medidascolindancM']:"";

		     	$croquislocalizM= isset($_POST['croquislocalizM'])? $_POST['croquislocalizM']:"";
		     	$otrosM = isset($_POST['otrosM'])? $_POST['otrosM']:"";
		     	$indivisoscondominiosM = isset($_POST['indivisoscondominiosM'])? $_POST['indivisoscondominiosM']:"";

		     	$croquisconstruccionM = isset($_POST['croquisconstruccionM'])? $_POST['croquisconstruccionM']:"";
		     	$usoprivativoM= isset($_POST['usoprivativoM'])? $_POST['usoprivativoM']:"";
		     	$superficiesconstruM = isset($_POST['superficiesconstruM'])? $_POST['superficiesconstruM']:"";

		     	$planosfactoresM= isset($_POST['planosfactoresM'])? $_POST['planosfactoresM']:"";

		     	$fachadaM= isset($_POST['fachadaM'])? $_POST['fachadaM']:"";

		     	$tipolooo = isset($_POST['tipologg']) ? $_POST['tipologg']:"";
		     	$tituloPropiedafc= isset($_POST['tituloPropiedafc'])? $_POST['tituloPropiedafc']:"";

		     	echo $obj1->guardarcomentariosConstruido_filesone($coxx,$claveCat,$folio,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM,$tipolooo,$tituloPropiedafc);


				}else{
						 echo "99991155000";
				}


	     	break;

	     	 case 333:
	     	 	//echo "holaa"; die();
	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath.php';
	     	 	$obj1= new Controllermaster();
	     	 	$datotipodepredio = isset($_POST['tipopre']) ? $_POST['tipopre']:"";
	     	 	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	     	 	$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";
	     	 	$etapa=1;
	     	 	$annii = isset($_POST['anixxo']) ? $_POST['anixxo']:"";
	     	 	//echo "aaaaaaaa";die();
	     	 	echo $obj1->view_docs_generales_filesone($coxx,$datotipodepredio,$datodic,$datoclv,$etapa,$annii);
	     	 	break;


	     	 case 444:
	     	 	//echo "holaa"; die();
	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath.php';
	     	 	$obj1= new Controllermaster();
	     	 	$datoper = isset($_POST['idpers']) ? $_POST['idpers']:"";
	     	 	$datodic = isset($_POST['dictams']) ? $_POST['dictams']:"";
	     	 	$datoclv = isset($_POST['dctx']) ? $_POST['dctx']:"";

	     	 	echo $obj1->xview_tipologs_general_filesone($coxx,$datoper,$datodic,$datoclv);
	     	 	break;

	     	 case 8989:
	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath.php';
	     	 	$obj1= new Controllermaster();
	     	 	echo $obj1->validarClaveCatatral_oneturn($coxx);
	     	 	break;

	     	 	case 7779:
	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath.php';
	     	 	$obj1= new Controllermaster();
	     	 	$fol = isset($_POST['cx']) ? $_POST['cx']:"";
	     	 	$tipo = isset($_POST['tipo']) ? $_POST['tipo']:"";
	     	 	echo $obj1->tablaInmueblesDireccionFiscal($coxx,$fol,$tipo);
	     	 	break;

	     	 case 434343:

	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath2.php';
	     	 	$obj1= new Controllermaster2();
	     	 	$fffolio = isset($_POST['f']) ? $_POST['f']:"";
	     	 	$idI = isset($_POST['idI']) ? $_POST['idI']:"";
	     	 	$anio = isset($_POST['anio']) ? $_POST['anio']:"";
	     	 	echo $obj1->inmueblesArevisar43($coxx,$idI,$anio,$fffolio);

	     	 	break;


	     	 case 444444:

	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath.php';
	     	 	$obj1= new Controllermaster();
	     	 	$clave = isset($_POST['clavC']) ? $_POST['clavC']:"";
	     	 	$folio = isset($_POST['fol']) ? $_POST['fol']:"";

	     	 	echo $obj1->revisionDictamenMUNicipio($coxx,$folio,$clave);

	     	 	break;

	     	 case 555555:

	     	 	include '../bd/conex.php';
	     	 	include '../controller/ControllerPath.php';
	     	 	$obj1= new Controllermaster();
	     	 	$folio = isset($_POST['ffff']) ? $_POST['ffff']:"";
	     	 	$clave = isset($_POST['clvvv']) ? $_POST['clvvv']:"";
	     	 	echo $obj1->validacionval($coxx,$folio,$clave);

	     	 	break;


	     	 	case 222143:

	          include '../bd/conex.php';
	          include '../controller/ControllerPath2.php';
	          $obj1= new Controllermaster2();
	          $idI = isset($_POST['idI']) ? $_POST['idI']:"";
	          $anio = isset($_POST['anio']) ? $_POST['anio']:"";
	          echo $obj1->inmueblesArevisar_rechazadoxadminpagos($coxx,$idI,$anio);

	     break;


 }
}



?>
