<?php
$json = file_get_contents('php://input');
$obj = json_decode($json);

//echo "hola";
//print_r($obj);
//echo $obj->data->access;
//echo $obj->data->var1;
//die();
$Schlussel = $obj->data->access;
if(empty($Schlussel)){
header('Location: ../index.php');
}else{



switch ($Schlussel) {


  case 88:
          include '../bd/conex.php';
          include '../controller/ControllerPath_update1.php';

          //echo "hola karlota";die();
           $obje= new Controllermaster();
          if(empty($obj->data->email)){
             echo"error2";die();
        }else{
             $date_ini =  $obj->data->email;
        }

        if(empty($obj->data->x4)){echo"6";$x4=0;die();}else{$x4 =  $obj->data->x4;}
        if(empty($obj->data->x5)){echo"6";$x5=0;die();}else{$x5 =  $obj->data->x5;}

          echo $obje->validarCorreo($coxx,$date_ini,$x4,$x5);
   break;

   /// recuperacion de contraseñas
    case 87:


        include '../bd/conex.php';
        include '../controller/ControllerPath_update1.php';

        if(empty($obj->data->x4)){echo"6";$x4=0;die();}else{$x4 =  $obj->data->x4;}
        if(empty($obj->data->x5)){echo"6";$x5=0;die();}else{$x5 =  $obj->data->x5;}
        if(empty($obj->data->x6)){echo"6";$x6=0;die();}else{$x6 =  $obj->data->x6;}

        $obje= new Controllermaster();
        echo $obje->validationpaswords($coxx,$x4,$x5,$x6);

        break;



    case 31:

        include '../bd/conex.php';
        include '../controller/ControllerPath.php';
        $obje= new Controllermaster();
        echo $obje->actualizacionTarifas($coxx);

        break;
     case 32:
        include '../bd/conex.php';
        include '../controller/ControllerPath.php';
        $obje= new Controllermaster();
        echo $obje->dictamenes_observacionesMunicipioRev($coxx);

        break;
    case 33:
        include '../bd/conex.php';
        include '../controller/ControllerPath.php';
        $obje= new Controllermaster();
        echo $obje->dictamenes_observacionesMunicipio($coxx);

        break;
	case 34:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
		echo $obje->dictamenes_rechazadosAdmonGral($coxx);

		break;

	case 35:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
		echo $obje->dictamenes_pendientesAdmonPagos($coxx);

		break;

	case 37:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
		echo $obje->dictamenes_estatusALL($coxx);

		break;
	case 36:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
		echo $obje->dictamen_full2_revisor($coxx);

		break;
	case 38:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
		echo $obje->Admindictamenes_autorizados($coxx);

		break;
	case 39:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();

		if(empty($obj->data->claf)){
			echo"error3";die();
		}else{
			$claff = $obj->data->claf;
		}

		echo $obje->seguimientoRevisorAll($coxx,$claff);

		break;
	case 41:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();
		echo $obje->dictamenes_preautorizados($coxx);

		break;

	case 42:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();


		if(empty($obj->data->clasif)){
			echo"error3";die();
		}else{
			$cla = $obj->data->clasif;
		}

		echo $obje->seguimiento_dictaminadorAll($coxx,$cla);

		break;

	case 43:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();


		echo $obje->tbl_dictamenes_validados2($coxx);
		break;

	case 44:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();

		echo $obje->tbl_process_dict2($coxx);
		break;

	case 45:
		include '../bd/conex.php';
		include '../controller/ControllerPath.php';
		$obje= new Controllermaster();

		echo $obje->tbl_seg_dict2($coxx);
		break;


 case 46:
                             include '../bd/conex.php';
                             include '../controller/ControllerPath.php';
                             $obje= new Controllermaster();

                             if(empty($obj->data->var1)){
                                 echo"error2";die();
                             }else{
                                 $date_ini =  $obj->data->var1;
                             }
                             if(empty($obj->data->var2)){
                                 echo"error3";die();
                             }else{
                                 $date_fin = $obj->data->var2;
                             }

                   echo $obje->tbl_dictamenes_validados($coxx, $date_ini, $date_fin);
    break;

     case 47:
                 if(empty($obj->data->x8)){echo"6";$x8=0;die();}else{$x8 =  $obj->data->x8;}
                 if( $x8 == "5" ){
                     if(empty($obj->data->x8)){echo"6";$x8=0;die();}else{$x8 =  $obj->data->x8;}
                     if(empty($obj->data->selectp)){echo"6";$opcss=0;die();}else{$opcss =  $obj->data->selectp;}
                if(empty($obj->data->x1)){echo"6";$x1=0;die();}else{$x1 =  $obj->data->x1;}
                if(empty($obj->data->x2)){echo"6";$x2=0;die();}else{$x2 =  $obj->data->x2;}
                if(empty($obj->data->x3)){echo"6";$x3=0;die();}else{$x3 =  $obj->data->x3;}
                if(empty($obj->data->x4)){echo"6";$x4=0;die();}else{$x4 =  $obj->data->x4;}
                if(empty($obj->data->x5)){echo"6";$x5=0;die();}else{$x5 =  $obj->data->x5;}
                if(empty($obj->data->x6)){echo"6";$x6=0;die();}else{$x6 =  $obj->data->x6;}
                 if(empty($obj->data->x7)){echo"6";$x7=0;die();}else{$x7 =  $obj->data->x7;}


                 }else{
                     if(empty($obj->data->x8)){echo"611";$x8=0;die();}else{$x8 =  $obj->data->x8;}
                     if(empty($obj->data->selectp)){echo"61";$opcss=0;die();}else{$opcss =  $obj->data->selectp;}
                if(empty($obj->data->x1)){echo"62";$x1=0;die();}else{$x1 =  $obj->data->x1;}
                if(empty($obj->data->x2)){echo"63";$x2=0;die();}else{$x2 =  $obj->data->x2;}
                if(empty($obj->data->x3)){echo"64";$x3=0;die();}else{$x3 =  $obj->data->x3;}
                if(empty($obj->data->x4)){echo"65";$x4=0;die();}else{$x4 =  $obj->data->x4;}
                if(empty($obj->data->x5)){echo"66";$x5=0;die();}else{$x5 =  $obj->data->x5;}
                if(empty($obj->data->x6)){echo"67";$x6=0;die();}else{$x6 =  $obj->data->x6;}
                if(empty($obj->data->x7)){echo"68";$x7=0;die();}else{$x7 =  $obj->data->x7;}
                if(empty($obj->data->reg)){echo"69";$reg=0;die();}else{$reg =  $obj->data->reg;}



                 }


                include '../bd/conex.php';
                include '../controller/ControllerPath.php';
                $obje= new Controllermaster();
                echo $obje->new_userSinRegistro($coxx,$opcss, $x1, $x2, $x3, $x4, $x5, $x6, $x7,$x8,$reg);

                break;
      case 48:
            include '../bd/conex.php';
            include '../controller/ControllerPath.php';
             $obje= new Controllermaster();
            if(empty($obj->data->selectp)){
               echo"error1";die();
          }else{
               $tipoUser =  $obj->data->selectp;
          }


          if(empty($obj->data->x1)){
               echo"error2";die();
          }else{
               $noRegistro =  $obj->data->x1;
          }

            echo $obje->noRegistro($coxx,$tipoUser,$noRegistro);
     break;

    case 49:
            include '../bd/conex.php';
            include '../controller/ControllerPath_newuser.php';

            //echo "hola karlota";die();
             $obje= new Controllermaster();
            if(empty($obj->data->email)){
               echo"error2";die();
          }else{
               $date_ini =  $obj->data->email;
          }
            echo $obje->validarCorreo($coxx,$date_ini);
     break;
    case 50:
        include '../bd/conex.php';
        include '../controller/ControllerPath.php';
        $obje= new Controllermaster();
        echo $obje->dictamenes_pendientes($coxx);

    break;
	//REVISOR IGECEM
    case 51:
    	include '../bd/conex.php';
    	include '../controller/ControllerPath.php';
    	$obje= new Controllermaster();

    	if(empty($obj->data->var1)){
    		echo"error2";die();
    	}else{
    		$date_ini =  $obj->data->var1;
    	}
    	if(empty($obj->data->var2)){
    		echo"error3";die();
    	}else{
    		$date_fin = $obj->data->var2;
    	}

    	echo $obje->seguimiento_fecha_revisor($coxx,$date_ini, $date_fin);

    	break;
     //DICTAMINADOR
     case 52:
     	include '../bd/conex.php';
     	include '../controller/ControllerPath.php';
     	$obje= new Controllermaster();

     	if(empty($obj->data->var1)){
     		echo"error2";die();
     	}else{
     		$date_ini =  $obj->data->var1;
     	}
     	if(empty($obj->data->var2)){
     		echo"error3";die();
     	}else{
     		$date_fin = $obj->data->var2;
     	}
        if(empty($obj->data->clasif)){
            echo"error2";die();
        }else{
            $clasifi =  $obj->data->clasif;
        }

     	echo $obje->seguimiento_fecha_dictaminador($coxx, $date_ini, $date_fin,$clasifi);

     break;
     // LISTA PARA LLENAR LA TABLA DEL PADRON DICTAMINADOR
     case 53:
     	include '../bd/conex.php';
     	include '../controller/ControllerPath.php';
     	$obje= new Controllermaster();

     	echo $obje->listado_tabl_dictaminadores($coxx);


     break;
     // select anidado de estados del formulario de contribuyente
     case 54:
     	include '../bd/conex.php';
     	include '../controller/ControllerPath.php';
     	$obje= new Controllermaster();

     	echo $obje->lista_estado($coxx);

     break;
     // select anidado de municipio del formulario de contribuyente
     case 55:
     	include '../bd/conex.php';
     	include '../controller/ControllerPath.php';
     	$obje= new Controllermaster();

     	if(empty($obj->data->xa)){
     		echo"error2";die();
     	}else{
     		$date_xa =  $obj->data->xa;
     	}

     	echo $obje->lista_municipio($coxx,$date_xa);

     break;
     case 56:
     	include '../bd/conex.php';
     	include '../controller/ControllerPath.php';
     	$obje= new Controllermaster();

     	if(empty($obj->data->xax)){
     		echo"error2";die();
     	}else{
     		$date_xax =  $obj->data->xax;
     	}
     	if(empty($obj->data->xa)){
     		echo"error2";die();
     	}else{
     		$date_xa =  $obj->data->xa;
     	}

     	echo $obje->lista_cp_mx($coxx,$date_xa,$date_xax);
     	break;
     case 57:
     	include '../bd/conex.php';
     	include '../controller/ControllerPath.php';
     	$obje= new Controllermaster();

     	echo $obje->lista_tipodic($coxx);

     	break;
     	case 58:
     		include '../bd/conex.php';
     		include '../controller/ControllerPath.php';
     		$obje= new Controllermaster();

     		if(empty($obj->data->dat)){
     			echo"6";
     			$s=0;
     			die();
     		}else{
     			 $s =  $obj->data->dat;
     		}
     		if(is_numeric($s)) {
     			//echo var_export($s, true) . " es num�rico", PHP_EOL;
     			echo $obje->set_update_user($coxx, $s);
     		} else {
     			echo"6";
     			//echo var_export($s, true) . " NO es num�rico", PHP_EOL;
     		}


     		break;
     		case 59:
     			include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
     			$obje= new Controllermaster();

     			if(empty($obj->data->dat)){
     				echo"6";
     				$s=0;
     				die();
     			}else{
     				$s =  $obj->data->dat;
     			}
     			if(is_numeric($s)) {
     				//echo var_export($s, true) . " es num�rico", PHP_EOL;
     				echo $obje->set_disabled_user($coxx, $s);
     			} else {
     				echo"6";
     				//echo var_export($s, true) . " NO es num�rico", PHP_EOL;
     			}


     			break;
     		case 60:
				 if(empty($obj->data->x8)){echo"6";$x8=0;die();}else{$x8 =  $obj->data->x8;}
				 if( $x8 == "5" ){
					 if(empty($obj->data->x8)){echo"6";$x8=0;die();}else{$x8 =  $obj->data->x8;}
					 if(empty($obj->data->selectp)){echo"6";$opcss=0;die();}else{$opcss =  $obj->data->selectp;}
     			if(empty($obj->data->x1)){echo"6";$x1=0;die();}else{$x1 =  $obj->data->x1;}
     			if(empty($obj->data->x2)){echo"6";$x2=0;die();}else{$x2 =  $obj->data->x2;}
     			if(empty($obj->data->x3)){echo"6";$x3=0;die();}else{$x3 =  $obj->data->x3;}
     			if(empty($obj->data->x4)){echo"6";$x4=0;die();}else{$x4 =  $obj->data->x4;}
     			if(empty($obj->data->x5)){echo"6";$x5=0;die();}else{$x5 =  $obj->data->x5;}
     			if(empty($obj->data->x6)){echo"6";$x6=0;die();}else{$x6 =  $obj->data->x6;}
				 if(empty($obj->data->x7)){echo"6";$x7=0;die();}else{$x7 =  $obj->data->x7;}


				 }else{
					 if(empty($obj->data->x8)){echo"611";$x8=0;die();}else{$x8 =  $obj->data->x8;}
					 if(empty($obj->data->selectp)){echo"61";$opcss=0;die();}else{$opcss =  $obj->data->selectp;}
     			if(empty($obj->data->x1)){echo"62";$x1=0;die();}else{$x1 =  $obj->data->x1;}
     			if(empty($obj->data->x2)){echo"63";$x2=0;die();}else{$x2 =  $obj->data->x2;}
     			if(empty($obj->data->x3)){echo"64";$x3=0;die();}else{$x3 =  $obj->data->x3;}
     			if(empty($obj->data->x4)){echo"65";$x4=0;die();}else{$x4 =  $obj->data->x4;}
     			if(empty($obj->data->x5)){echo"66";$x5=0;die();}else{$x5 =  $obj->data->x5;}
     			if(empty($obj->data->x6)){echo"67";$x6=0;die();}else{$x6 =  $obj->data->x6;}
				 if(empty($obj->data->x7)){echo"68";$x7=0;die();}else{$x7 =  $obj->data->x7;}


				 }


     			include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
     			$obje= new Controllermaster();
     			echo $obje->new_user($coxx,$opcss, $x1, $x2, $x3, $x4, $x5, $x6, $x7,$x8);

     			break;

     		case 61:
     			include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
     			$obje= new Controllermaster();
     			echo $obje->list_users($coxx);

				 break;
				 case 62:
					include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
				 $obje= new Controllermaster();
				 echo $obje->dictamen_full($coxx);

				 break;
				 case 63:

					if(empty($obj->data->vers)){echo"62";$vv=0;die();}else{$vv =  $obj->data->vers;}
				include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
				 $obje= new Controllermaster();
				 echo $obje->newversion_DICTABAL($coxx,$vv);

				 break;
				 case 64:
				include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
				$obje= new Controllermaster();


				print_r($obj);

				 break;
				 case 65:
				include '../bd/conex.php';
     			include '../controller/ControllerPath.php';
				$obje = new Controllermaster();
				echo $obje->tbl_cash_dtm($coxx);

				 break;
                    case 66:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                    $obje = new Controllermaster();
                    if(empty($obj->data->vp)){echo"68";$vp=0;die();}else{$vp =  $obj->data->vp;}
                    echo $obje->tbl_inmuebles_files($coxx,$vp);

                          break;
                          case 67:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();

                         if(empty($obj->data->a)){$a="";}else{$a =  $obj->data->a;}
                         if(empty($obj->data->b)){$b="";}else{$b =  $obj->data->b;}
                         if(empty($obj->data->c)){$cx="";}else{$cx =  $obj->data->c;}
                         /*
                         if(empty($obj->data->d)){$d="";}else{$d =  $obj->data->d;}
                         if(empty($obj->data->e)){$e="";}else{$e =  $obj->data->e;}
                         if(empty($obj->data->f)){$f="";}else{$f =  $obj->data->f;}
                         if(empty($obj->data->g)){$g="";}else{$g =  $obj->data->g;}
                         if(empty($obj->data->h)){$h="";}else{$h =  $obj->data->h;}
                         if(empty($obj->data->i)){$i="";}else{$i =  $obj->data->i;}
                         if(empty($obj->data->j)){$j="";}else{$j =  $obj->data->j;}
                         if(empty($obj->data->k)){$k="";}else{$k =  $obj->data->k;}
                         if(empty($obj->data->l)){$l="";}else{$l =  $obj->data->l;}*/

                         //echo $obje->tbl_inmuebles_files($coxx,$vp);
                         //echo $obje->search_dtmj($coxx,$a,$b,$cx,$d,$e,$f,$g,$h,$i,$j,$k,$l);
                         echo $obje->search_dtmj($coxx,$a,$b,$cx);

                         break;
                         case 68:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();

                         if(empty($obj->data->d)){$d="";}else{$d =  $obj->data->d;}
                         echo $obje->search_dtmj2($coxx,$d);

                         break;
                         case 69:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->e)){$e="";}else{$e =  $obj->data->e;}
                         echo $obje->search_dtmj3($coxx,$e);

                         break;
                         case 70:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->f)){$f="";}else{$f =  $obj->data->f;}
                         echo $obje->search_dtmj4($coxx,$f);

                         break;
                         case 71:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->g)){$g="";}else{$g =  $obj->data->g;}
                         echo $obje->search_dtmj5($coxx,$g);

                         break;
                         case 72:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->h)){$h="";}else{$h =  $obj->data->h;}
                         echo $obje->search_dtmj6($coxx,$h);

                         break;
                         case 73:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->i)){$i="";}else{$i =  $obj->data->i;}
                         echo $obje->search_dtmj7($coxx,$i);

                         break;
                         case 74:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->j)){$j="";}else{$j =  $obj->data->j;}
                         if(empty($obj->data->k)){$k="";}else{$k =  $obj->data->k;}
                         if(empty($obj->data->l)){$l="";}else{$l =  $obj->data->l;}
                         echo $obje->search_dtmj8($coxx,$j,$k,$l);

                         break;
                        case 75:
                             include '../bd/conex.php';
                             include '../controller/ControllerPath.php';
                             $obje= new Controllermaster();
                             //echo "hola";die();
                             if(empty($obj->data->var1)){
                                 echo"error2";die();
                             }else{
                                 $date_ini =  $obj->data->var1;
                             }
                             if(empty($obj->data->var2)){
                                 echo"error3";die();
                             }else{
                                 $date_fin = $obj->data->var2;
                             }
                             //echo "hola2";die();
                             echo $obje->tbl_seg_dict($coxx, $date_ini, $date_fin);
                         break;
                         case 76:
                             include '../bd/conex.php';
                             include '../controller/ControllerPath.php';
                             $obje= new Controllermaster();

                             if(empty($obj->data->var1)){
                                 echo"error2";die();
                             }else{
                                 $date_ini =  $obj->data->var1;
                             }
                             if(empty($obj->data->var2)){
                                 echo"error3";die();
                             }else{
                                 $date_fin = $obj->data->var2;
                             }

                             echo $obje->tbl_process_dict($coxx, $date_ini, $date_fin);
                         break;
                         case 77:
                             include '../bd/conex.php';
                             include '../controller/ControllerPath.php';
                             $obje = new Controllermaster();
                             echo $obje->tbl_dictamenes_process_pago($coxx);

                             break;
                             case 78:
                                     if(empty($obj->data->x8)){echo"6";$x8=0;die();}else{$x8 =  $obj->data->x8;}
                                     if( $x8 == "5" ){
                                         if(empty($obj->data->x8)){echo"6";$x8=0;die();}else{$x8 =  $obj->data->x8;}
                                         if(empty($obj->data->selectp)){echo"6";$opcss=0;die();}else{$opcss =  $obj->data->selectp;}
                                    if(empty($obj->data->x1)){echo"6";$x1=0;die();}else{$x1 =  $obj->data->x1;}
                                    if(empty($obj->data->x2)){echo"6";$x2=0;die();}else{$x2 =  $obj->data->x2;}
                                    if(empty($obj->data->x3)){echo"6";$x3=0;die();}else{$x3 =  $obj->data->x3;}
                                    if(empty($obj->data->x4)){echo"6";$x4=0;die();}else{$x4 =  $obj->data->x4;}
                                    if(empty($obj->data->x5)){echo"6";$x5=0;die();}else{$x5 =  $obj->data->x5;}
                                    if(empty($obj->data->x6)){echo"6";$x6=0;die();}else{$x6 =  $obj->data->x6;}
                                     if(empty($obj->data->x7)){echo"6";$x7=0;die();}else{$x7 =  $obj->data->x7;}


                                     }else{
                                         if(empty($obj->data->x8)){echo"611";$x8=0;die();}else{$x8 =  $obj->data->x8;}
                                         if(empty($obj->data->selectp)){echo"61";$opcss=0;die();}else{$opcss =  $obj->data->selectp;}
                                    if(empty($obj->data->x1)){echo"62";$x1=0;die();}else{$x1 =  $obj->data->x1;}
                                    if(empty($obj->data->x2)){echo"63";$x2=0;die();}else{$x2 =  $obj->data->x2;}
                                    if(empty($obj->data->x3)){echo"64";$x3=0;die();}else{$x3 =  $obj->data->x3;}
                                    if(empty($obj->data->x4)){echo"65";$x4=0;die();}else{$x4 =  $obj->data->x4;}
                                    if(empty($obj->data->x5)){echo"66";$x5=0;die();}else{$x5 =  $obj->data->x5;}
                                    if(empty($obj->data->x6)){echo"67";$x6=0;die();}else{$x6 =  $obj->data->x6;}
                                     if(empty($obj->data->x7)){echo"68";$x7=0;die();}else{$x7 =  $obj->data->x7;}


                                     }


                                     include '../bd/conex.php';
                                    include '../controller/ControllerPath_newuser.php';
                                    $obje= new Controllermaster();
                                    echo $obje->new_user($coxx,$opcss, $x1, $x2, $x3, $x4, $x5, $x6, $x7,$x8);

                                    break;
                                    case 79:
                    include '../bd/conex.php';
                    include '../controller/ControllerPath.php';
                         $obje = new Controllermaster();


                         if(empty($obj->data->j)){$j="";}else{$j =  $obj->data->j;}

                         echo $obje->search_dtmj9($coxx,$j);

                         break;
                           case 80:
                                        include '../bd/conex.php';
                                        include '../controller/ControllerPath.php';
                                        $obje= new Controllermaster();
                                        echo $obje->dictamenes_proccess($coxx);
                                        break;
                                    case 81:
                                        include '../bd/conex.php';
                                        include '../controller/ControllerPath.php';
                                        $obje= new Controllermaster();
                                        echo $obje->dictamenes_emit($coxx);
                                        break;
                                    case 82:
                                        include '../bd/conex.php';
                                        include '../controller/ControllerPath.php';
                                        $obje= new Controllermaster();
                                        echo $obje->dictamenes_liberty($coxx);
                                        break;
                                    case 83:
                                        include '../bd/conex.php';
                                        include '../controller/ControllerPath.php';
                                        $obje= new Controllermaster();
                                        echo $obje->dictamenes_xmun($coxx);
                                        break;

                                        case 84:
                                        include '../bd/conex.php';
                                        include '../controller/ControllerPath.php';
                                        $obje= new Controllermaster();
                                        $fl_ini =  $obj->data->var1;


                                        echo $obje->seguimiento_x_inmueble($coxx, $fl_ini);

                                        break;
                                         case 85:
                    include '../bd/conex.php';
                include '../controller/ControllerPath.php';
                 $obje= new Controllermaster();
                 echo $obje->dictamen_full2($coxx);

                 break;

                                         case 86:
                                         	include '../bd/conex.php';
                                         	include '../controller/ControllerPath.php';
                                         	$obje= new Controllermaster();
                                         	echo $obje->inmuebles_list($coxx);

                                         	break;
                                         case 104:
                                         	include '../bd/conex.php';
                                         	include '../controller/ControllerPath.php';
                                         	$obje= new Controllermaster();

                                         	if(empty($obj->data->datofilter)){$val="";}else{$val =  $obj->data->datofilter;}


                                         	echo $obje->inmuebles_readred($coxx,$val);

                                         	break;

     case 101:
          break;
     case 102:

     	break;

 }
}


?>
