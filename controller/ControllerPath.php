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

public function login($c,$user,$pass,$g){


	// Realizando una consulta SQL
	$queryvv = "select a.tipo_usuario, a.activo
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ";

	$resultaaaa = pg_query($queryvv) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$reeeees = pg_query( $c, $queryvv);
	$validate_exixtsxxxxxxxxx = pg_num_rows($reeeees);
	if( $validate_exixtsxxxxxxxxx== "1" ){
		while( $objazzzzzzzzz = pg_fetch_object($reeeees) ){
			$datazxzxzxzxzx[] = $objazzzzzzzzz;
		}

		$type_user_db = $datazxzxzxzxzx[0]->tipo_usuario;



		switch ($type_user_db){
			case "1": // contribuyente
				// Realizando una consulta SQL
				$query = "select idetallusu as id_union,* from
       (select *  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ) as a
       join
       (select * from especialistas_vigentes_v2 where tipo_usuariofk = ( select tipo_usuario  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."')  ) as b
       on
        a.idetallusu = b.no_reg_autorizado
         where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ;";



				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						switch ($typeusu) {
							//CONTRIBUYENTE
							case 1:
								if( $data[0]->activo == "t" ){
									//verdadero usuario activo
									//error 23000 significa usuario activo
									echo "23000";

								}else if( $data[0]->activo == "f" ){

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticadictamc"] = "AVG_contrib1";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/DatosContribuyente/" ;

								}else{
									echo "23000";
								}
								break;
								//DICTAMINADOR
							case 2:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// REVISOR IGECEM
							case 3:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// ADMIN JORGE CELSO
							case 4:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/BusquedaAdmin/" ;
								}else{
									echo "23000";
								}
								break;
								//SUBDIRECTOR TECNICO
							case 10:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaAVG"] = "AVGADMIN";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/AdminGris/";
								}else{
									echo "23000";
								}
								break;

							default:
								# code...
								break;
						}

					}else if( $data[0]->activo== "t" ){
						// si no, si es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";*/

						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticadictamc"] = "AVG_contrib1";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/DatosContribuyente/" ;




					}
				}else{
					echo "23001";
				}
				break;
			case 2: // especialista
				// Realizando una consulta SQL
				$query = "select idetallusu as id_union,* from
       (select *  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ) as a
       join
       (select * from especialistas_vigentes_v2 where tipo_usuariofk = ( select tipo_usuario  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."')  ) as b
       on
        a.idetallusu = b.no_reg_autorizado
         where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ;";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						switch ($typeusu) {
							//CONTRIBUYENTE
							case 1:
								if( $data[0]->activo == "t" ){
									//verdadero usuario activo
									//error 23000 significa usuario activo
									echo "23000";

								}else if( $data[0]->activo == "f" ){

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticadictamc"] = "AVG_contrib1";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/DatosContribuyente/" ;

								}else{
									echo "23000";
								}
								break;
								//DICTAMINADOR
							case 2:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// REVISOR IGECEM
							case 3:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// ADMIN JORGE CELSO
							case 4:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/BusquedaAdmin/" ;
								}else{
									echo "23000";
								}
								break;
								//SUBDIRECTOR TECNICO
							case 10:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaAVG"] = "AVGADMIN";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/AdminGris/";
								}else{
									echo "23000";
								}
								break;

							default:
								# code...
								break;
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";
						*/
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);
						//sesion para usuario
						session_start();
						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
						$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
						echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
						$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;



					}
				}else{
					echo "23001";
				}
				break;
			case 3: // revisor
				// Realizando una consulta SQL
				$query = "select idetallusu as id_union,* from
       (select *  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ) as a
       join
       (select * from especialistas_vigentes_v2 where tipo_usuariofk = ( select tipo_usuario  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."')  ) as b
       on
        a.idetallusu = b.no_reg_autorizado
         where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ;";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						switch ($typeusu) {
							//CONTRIBUYENTE
							case 1:
								if( $data[0]->activo == "t" ){
									//verdadero usuario activo
									//error 23000 significa usuario activo
									echo "23000";

								}else if( $data[0]->activo == "f" ){

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticadictamc"] = "AVG_contrib1";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/DatosContribuyente/" ;

								}else{
									echo "23000";
								}
								break;
								//DICTAMINADOR
							case 2:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// REVISOR IGECEM
							case 3:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// ADMIN JORGE CELSO
							case 4:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/BusquedaAdmin/" ;
								}else{
									echo "23000";
								}
								break;
								//SUBDIRECTOR TECNICO
							case 10:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaAVG"] = "AVGADMIN";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/AdminGris/";
								}else{
									echo "23000";
								}
								break;

							default:
								# code...
								break;
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";*/

						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);
						//sesion para usuario
						session_start();
						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
						$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
						echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
						$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;



					}
				}else{
					echo "23001";
				}
				break;
			case 4: // jr admin
				// Realizando una consulta SQL
				$query = "select idetallusu as id_union,* from
       (select *  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ) as a
       join
       (select * from especialistas_vigentes_v2 where tipo_usuariofk = ( select tipo_usuario  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."')  ) as b
       on
        a.idetallusu = b.no_reg_autorizado
         where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ;";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						switch ($typeusu) {
							//CONTRIBUYENTE
							case 1:
								if( $data[0]->activo == "t" ){
									//verdadero usuario activo
									//error 23000 significa usuario activo
									echo "23000";

								}else if( $data[0]->activo == "f" ){

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticadictamc"] = "AVG_contrib1";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/DatosContribuyente/" ;

								}else{
									echo "23000";
								}
								break;
								//DICTAMINADOR
							case 2:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// REVISOR IGECEM
							case 3:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// ADMIN JORGE CELSO
							case 4:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/BusquedaAdmin/" ;
								}else{
									echo "23000";
								}
								break;
								//SUBDIRECTOR TECNICO
							case 10:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaAVG"] = "AVGADMIN";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/AdminGris/";
								}else{
									echo "23000";
								}
								break;

							default:
								# code...
								break;
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";*/
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);
						//sesion para usuario
						session_start();
						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
						$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

						echo $link = "AEDTMN/BusquedaAdmin/" ;




					}
				}else{
					echo "23001";
				}
				break;
			case 10: // ADMIN MASTER
				// Realizando una consulta SQL
				$query = "select idetallusu as id_union,* from
       (select *  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ) as a
       join
       (select * from especialistas_vigentes_v2 where tipo_usuariofk = ( select tipo_usuario  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."')  ) as b
       on
        a.idetallusu = b.no_reg_autorizado
         where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ;";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						switch ($typeusu) {
							//CONTRIBUYENTE
							case 1:
								if( $data[0]->activo == "t" ){
									//verdadero usuario activo
									//error 23000 significa usuario activo
									echo "23000";

								}else if( $data[0]->activo == "f" ){

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticadictamc"] = "AVG_contrib1";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/DatosContribuyente/" ;

								}else{
									echo "23000";
								}
								break;
								//DICTAMINADOR
							case 2:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// REVISOR IGECEM
							case 3:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
									echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
									$_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
								}else{
									echo "23000";
								}
								break;
								// ADMIN JORGE CELSO
							case 4:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/BusquedaAdmin/" ;
								}else{
									echo "23000";
								}
								break;
								//SUBDIRECTOR TECNICO
							case 10:
								if( $data[0]->activo == "t" ){
									echo "23000";
								}else if( $data[0]->activo == "f" ){
									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);
									//sesion para usuario
									session_start();
									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticaAVG"] = "AVGADMIN";
									$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

									echo $link = "AEDTMN/AdminGris/";
								}else{
									echo "23000";
								}
								break;

							default:
								# code...
								break;
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";
						*/
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);
						//sesion para usuario
						session_start();
						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticaAVG"] = "AVGADMIN";
						$_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

						echo $link = "AEDTMN/AdminGris/";


					}
				}else{
					echo "23001";
				}
				break;
			case 5: // Delegado
				break;
			case 6: // Municipio

				// Realizando una consulta SQL
				$query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuario = 6";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);






					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;


						switch ($typeusu) {
							//MUNICIPIO
							case 6:
								if( $data[0]->activo == "t" ){
									//verdadero usuario activo
									//error 23000 significa usuario activo
									echo "23000";

								}else if( $data[0]->activo == "f" ){

									$n_id = $data[0]->id_usuario;
									$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 6 ";
									pg_query($c, $query);
									// Cerrando la conexion
									pg_close($c);

									//sesion para usuario
									session_start();

									//NOMBRE DE LA BASEDEDATOS DE CTVWEB
									include '../bd/bd.php';
									$x = $xxx;
									// Realizando una consulta SQL
									$querye = " SELECT  nombreusu, correo, id_mun, datesession
                              FROM admin.tblusuarios where id =".$data[0]->id_union;

									$resulte = pg_query($querye) or die('La consulta fallo: ' . pg_last_error());
									// Imprimiendo los resultados aarray
									$rse = pg_query( $x, $querye );
									$validate_exixtse = pg_num_rows($rse);

									while( $obje = pg_fetch_object($rse) ){
										$datae[] = $obje;
									}
									// Liberando el conjunto de resultados
									pg_free_result($resulte);

									//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
									$_SESSION["idkey1"] = $n_id;
									$_SESSION["idkey2"] = $data[0]->id_union;
									$_SESSION["autenticamun"] = "AVG_MUN6";
									$_SESSION["usuarioactual"] = $datae[0]->nombreusu;
									pg_close($x);
									//falso usuario inactivo
									//echo "usuario_inactivo";
									echo $link = "AEDTMN/InicioM/" ;

								}else{
									echo "23000";
								}
								break;
								//DICTAMINADOR
							case 7:

								break;
								// REVISOR IGECEM
							case 8:

								break;

							default:
								# code...
								break;
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";*/
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 6 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);

						//sesion para usuario
						session_start();

						//NOMBRE DE LA BASEDEDATOS DE CTVWEB
						include '../bd/bd.php';
						$x = $xxx;
						// Realizando una consulta SQL
						$querye = " SELECT  nombreusu, correo, id_mun, datesession
                              FROM admin.tblusuarios where id =".$data[0]->id_union;

						$resulte = pg_query($querye) or die('La consulta fallo: ' . pg_last_error());
						// Imprimiendo los resultados aarray
						$rse = pg_query( $x, $querye );
						$validate_exixtse = pg_num_rows($rse);

						while( $obje = pg_fetch_object($rse) ){
							$datae[] = $obje;
						}
						// Liberando el conjunto de resultados
						pg_free_result($resulte);

						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticamun"] = "AVG_MUN6";
						$_SESSION["usuarioactual"] = $datae[0]->nombreusu;
						pg_close($x);
						//falso usuario inactivo
						//echo "usuario_inactivo";
						echo $link = "AEDTMN/InicioM/" ;
					}









				}else{
					echo "23001";
				}

				break;
			case 7: // DIRECCIONN DE RECAUDADCION
				// Realizando una consulta SQL
				$query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuario = 7";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						if( $data[0]->activo == "t" ){
							//verdadero usuario activo
							//error 23000 significa usuario activo
							echo "23000";

						}else if( $data[0]->activo == "f" ){

							$n_id = $data[0]->id_usuario;
							$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 7 ";
							pg_query($c, $query);
							// Cerrando la conexion
							pg_close($c);

							//sesion para usuario
							session_start();

							//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
							$_SESSION["idkey1"] = $n_id;
							$_SESSION["idkey2"] = $data[0]->id_union;
							$_SESSION["autenticaDGR"] = "AVG_DGR7";
							$_SESSION["usuarioactual"] = "Dirección General de Recaudación";

							//falso usuario inactivo
							//echo "usuario_inactivo";
							echo $link = "AEDTDGR/InicioDGR/" ;

						}else{
							echo "23000";
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";*/
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 7 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);

						//sesion para usuario
						session_start();

						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticaDGR"] = "AVG_DGR7";
						$_SESSION["usuarioactual"] = "Dirección General de Recaudación";

						//falso usuario inactivo
						//echo "usuario_inactivo";
						echo $link = "AEDTDGR/InicioDGR/" ;

					}


				}else{
					echo "23001";
				}

				break;
			case 8: // DIRECCIONN DE FISCALIZACION
				$query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuario = 8";

				$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
				// Imprimiendo los resultados aarray
				$rs = pg_query( $c, $query );
				$validate_exixts = pg_num_rows($rs);
				if( $validate_exixts == "1" ){
					while( $obj = pg_fetch_object($rs) ){
						$data[] = $obj;
					}
					// Liberando el conjunto de resultados
					pg_free_result($result);


					if( $data[0]->activo== "f" ){
						// si es falso todo normal
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						if( $data[0]->activo == "t" ){
							//verdadero usuario activo
							//error 23000 significa usuario activo
							echo "23000";

						}else if( $data[0]->activo == "f" ){

							$n_id = $data[0]->id_usuario;
							$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 8 ";
							pg_query($c, $query);
							// Cerrando la conexion
							pg_close($c);

							//sesion para usuario
							session_start();

							//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
							$_SESSION["idkey1"] = $n_id;
							$_SESSION["idkey2"] = $data[0]->id_union;
							$_SESSION["autenticaDGFIS"] = "AVG_DGF8";
							$_SESSION["usuarioactual"] = "Dirección General de Fiscalización";

							//falso usuario inactivo
							//echo "usuario_inactivo";
							echo $link = "AEDTDGF/InicioDGF/" ;

						}else{
							echo "23000";
						}

					}else if( $data[0]->activo== "t" ){
						// si no es verdadero haz cambios en la base
						/*
						$query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
						pg_query($c, $query1111);
						// Cerrando la conexion
						pg_close($c);

						//Redireccionamos a Inicio (al inicio de sesion)
						echo "23003";*/
						$typeusu = $data[0]->tipo_usuario;
						//falta encriptar__________________________________________________
						$string =$data[0]->id_usuario;
						define('METHOD','AES-256-CBC');
						define('SECRET_KEY','$DICTAMUN@2020');
						define('SECRET_IV','121212');
						$output=FALSE;
						$key=hash('sha256', SECRET_KEY);
						$iv=substr(hash('sha256', SECRET_IV), 0, 16);
						$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
						$output=base64_encode($output);
						$clave = $output;

						$n_id = $data[0]->id_usuario;
						$query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 8 ";
						pg_query($c, $query);
						// Cerrando la conexion
						pg_close($c);

						//sesion para usuario
						session_start();

						//Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
						$_SESSION["idkey1"] = $n_id;
						$_SESSION["idkey2"] = $data[0]->id_union;
						$_SESSION["autenticaDGFIS"] = "AVG_DGF8";
						$_SESSION["usuarioactual"] = "Dirección General de Fiscalización";

						//falso usuario inactivo
						//echo "usuario_inactivo";
						echo $link = "AEDTDGF/InicioDGF/" ;

					}

				}else{
					echo "23001";
				}

				break;

		}
	}else{
		echo "23001";
	}



	die();


  if( $g == "5"){
    // Realizando una consulta SQL
    $query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuario = 8";

    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs = pg_query( $c, $query );
    $validate_exixts = pg_num_rows($rs);
    if( $validate_exixts == "1" ){
      while( $obj = pg_fetch_object($rs) ){
        $data[] = $obj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($result);


      if( $data[0]->activo== "f" ){
        // si es falso todo normal
        $typeusu = $data[0]->tipo_usuario;
        //falta encriptar__________________________________________________
        $string =$data[0]->id_usuario;
        define('METHOD','AES-256-CBC');
        define('SECRET_KEY','$DICTAMUN@2020');
        define('SECRET_IV','121212');
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        $clave = $output;

        if( $data[0]->activo == "t" ){
          //verdadero usuario activo
          //error 23000 significa usuario activo
          echo "23000";

        }else if( $data[0]->activo == "f" ){

          $n_id = $data[0]->id_usuario;
          $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 8 ";
          pg_query($c, $query);
          // Cerrando la conexion
          pg_close($c);

          //sesion para usuario
          session_start();

          //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
          $_SESSION["idkey1"] = $n_id;
          $_SESSION["idkey2"] = $data[0]->id_union;
          $_SESSION["autenticaDGFIS"] = "AVG_DGF8";
          $_SESSION["usuarioactual"] = "Dirección General de Fiscalización";

          //falso usuario inactivo
          //echo "usuario_inactivo";
          echo $link = "AEDTDGF/InicioDGF/" ;

        }else{
          echo "23000";
        }

      }else if( $data[0]->activo== "t" ){
        // si no es verdadero haz cambios en la base

        $query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
        pg_query($c, $query1111);
        // Cerrando la conexion
        pg_close($c);

        //Redireccionamos a Inicio (al inicio de sesion)
        echo "23003";

      }

    }else{
      echo "23001";
    }


  }else if( $g == "4"){

    // Realizando una consulta SQL
    $query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuario = 7";

    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs = pg_query( $c, $query );
    $validate_exixts = pg_num_rows($rs);
    if( $validate_exixts == "1" ){
      while( $obj = pg_fetch_object($rs) ){
        $data[] = $obj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($result);


      if( $data[0]->activo== "f" ){
        // si es falso todo normal
        $typeusu = $data[0]->tipo_usuario;
        //falta encriptar__________________________________________________
        $string =$data[0]->id_usuario;
        define('METHOD','AES-256-CBC');
        define('SECRET_KEY','$DICTAMUN@2020');
        define('SECRET_IV','121212');
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        $clave = $output;

        if( $data[0]->activo == "t" ){
          //verdadero usuario activo
          //error 23000 significa usuario activo
          echo "23000";

        }else if( $data[0]->activo == "f" ){

          $n_id = $data[0]->id_usuario;
          $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 7 ";
          pg_query($c, $query);
          // Cerrando la conexion
          pg_close($c);

          //sesion para usuario
          session_start();

          //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
          $_SESSION["idkey1"] = $n_id;
          $_SESSION["idkey2"] = $data[0]->id_union;
          $_SESSION["autenticaDGR"] = "AVG_DGR7";
          $_SESSION["usuarioactual"] = "Dirección General de Recaudación";

          //falso usuario inactivo
          //echo "usuario_inactivo";
          echo $link = "AEDTDGR/InicioDGR/" ;

        }else{
          echo "23000";
        }

      }else if( $data[0]->activo== "t" ){
        // si no es verdadero haz cambios en la base

        $query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
        pg_query($c, $query1111);
        // Cerrando la conexion
        pg_close($c);

        //Redireccionamos a Inicio (al inicio de sesion)
        echo "23003";

      }


    }else{
      echo "23001";
    }

  }else if( $g == "3"){

    // Realizando una consulta SQL
    $query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union
  from usuario_v2 as a where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuario = 6";

    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs = pg_query( $c, $query );
    $validate_exixts = pg_num_rows($rs);
    if( $validate_exixts == "1" ){
      while( $obj = pg_fetch_object($rs) ){
        $data[] = $obj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($result);






      if( $data[0]->activo== "f" ){
        // si es falso todo normal
        $typeusu = $data[0]->tipo_usuario;
        //falta encriptar__________________________________________________
        $string =$data[0]->id_usuario;
        define('METHOD','AES-256-CBC');
        define('SECRET_KEY','$DICTAMUN@2020');
        define('SECRET_IV','121212');
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        $clave = $output;


        switch ($typeusu) {
          //MUNICIPIO
          case 6:
            if( $data[0]->activo == "t" ){
              //verdadero usuario activo
              //error 23000 significa usuario activo
              echo "23000";

            }else if( $data[0]->activo == "f" ){

              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 6 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);

              //sesion para usuario
              session_start();

              //NOMBRE DE LA BASEDEDATOS DE CTVWEB
              include '../bd/bd.php';
              $x = $xxx;
              // Realizando una consulta SQL
              $querye = " SELECT  nombreusu, correo, id_mun, datesession
                              FROM admin.tblusuarios where id =".$data[0]->id_union;

              $resulte = pg_query($querye) or die('La consulta fallo: ' . pg_last_error());
              // Imprimiendo los resultados aarray
              $rse = pg_query( $x, $querye );
              $validate_exixtse = pg_num_rows($rse);

              while( $obje = pg_fetch_object($rse) ){
                $datae[] = $obje;
              }
              // Liberando el conjunto de resultados
              pg_free_result($resulte);

              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticamun"] = "AVG_MUN6";
              $_SESSION["usuarioactual"] = $datae[0]->nombreusu;
              pg_close($x);
              //falso usuario inactivo
              //echo "usuario_inactivo";
              echo $link = "AEDTMN/InicioM/" ;

            }else{
              echo "23000";
            }
            break;
            //DICTAMINADOR
          case 7:

            break;
            // REVISOR IGECEM
          case 8:

            break;

          default:
            # code...
            break;
        }

      }else if( $data[0]->activo== "t" ){
        // si no es verdadero haz cambios en la base

        $query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
        pg_query($c, $query1111);
        // Cerrando la conexion
        pg_close($c);

        //Redireccionamos a Inicio (al inicio de sesion)
        echo "23003";

      }









    }else{
      echo "23001";
    }



  }else if( $g == "2"){

    // Realizando una consulta SQL
    $query = "select a.id_usuario, a.nombre_usuario, a.tipo_usuario, a.activo, a.idetallusu as id_union , b.curp, b.rfc,nombre, b.nombre_especialista
    from usuario_v2 as a join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado
    where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' and tipo_usuariofk = 2;";

    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs = pg_query( $c, $query );
    $validate_exixts = pg_num_rows($rs);
    if( $validate_exixts == "1" ){
      while( $obj = pg_fetch_object($rs) ){
        $data[] = $obj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($result);


      if( $data[0]->activo== "f" ){
        // si es falso todo normal
        $typeusu = $data[0]->tipo_usuario;
        //falta encriptar__________________________________________________
        $string =$data[0]->id_usuario;
        define('METHOD','AES-256-CBC');
        define('SECRET_KEY','$DICTAMUN@2020');
        define('SECRET_IV','121212');
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        $clave = $output;

        switch ($typeusu) {
          //CONTRIBUYENTE
          case 1:
            if( $data[0]->activo == "t" ){
              //verdadero usuario activo
              //error 23000 significa usuario activo
              echo "23000";

            }else if( $data[0]->activo == "f" ){

              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);

              //sesion para usuario
              session_start();

              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticadictamc"] = "AVG_contrib1";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
              $_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

              //falso usuario inactivo
              //echo "usuario_inactivo";
              echo $link = "AEDTMN/DatosContribuyente/" ;

            }else{
              echo "23000";
            }
            break;
            //DICTAMINADOR
          case 2:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
              echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
              $_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
            }else{
              echo "23000";
            }
            break;
            // REVISOR IGECEM
          case 3:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
              echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
              $_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
            }else{
              echo "23000";
            }
            break;
            // ADMIN JORGE CELSO
          case 4:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

              echo $link = "AEDTMN/BusquedaAdmin/" ;
            }else{
              echo "23000";
            }
            break;
            //SUBDIRECTOR TECNICO
          case 10:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticaAVG"] = "AVGADMIN";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

              echo $link = "AEDTMN/AdminGris/";
            }else{
              echo "23000";
            }
            break;

          default:
            # code...
            break;
        }

      }else if( $data[0]->activo== "t" ){
        // si no es verdadero haz cambios en la base

        $query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
        pg_query($c, $query1111);
        // Cerrando la conexion
        pg_close($c);

        //Redireccionamos a Inicio (al inicio de sesion)
        echo "23003";



      }
    }else{
      echo "23001";
    }

  }else{


    // Realizando una consulta SQL
    $query = "select idetallusu as id_union,* from
       (select *  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ) as a
       join
       (select * from especialistas_vigentes_v2 where tipo_usuariofk = ( select tipo_usuario  from usuario_v2 where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."')  ) as b
       on
        a.idetallusu = b.no_reg_autorizado
         where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."' ;";

    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs = pg_query( $c, $query );
    $validate_exixts = pg_num_rows($rs);
    if( $validate_exixts == "1" ){
      while( $obj = pg_fetch_object($rs) ){
        $data[] = $obj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($result);


      if( $data[0]->activo== "f" ){
        // si es falso todo normal
        $typeusu = $data[0]->tipo_usuario;
        //falta encriptar__________________________________________________
        $string =$data[0]->id_usuario;
        define('METHOD','AES-256-CBC');
        define('SECRET_KEY','$DICTAMUN@2020');
        define('SECRET_IV','121212');
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        $clave = $output;

        switch ($typeusu) {
          //CONTRIBUYENTE
          case 1:
            if( $data[0]->activo == "t" ){
              //verdadero usuario activo
              //error 23000 significa usuario activo
              echo "23000";

            }else if( $data[0]->activo == "f" ){

              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 1 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);

              //sesion para usuario
              session_start();

              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticadictamc"] = "AVG_contrib1";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
              $_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;

              //falso usuario inactivo
              //echo "usuario_inactivo";
              echo $link = "AEDTMN/DatosContribuyente/" ;

            }else{
              echo "23000";
            }
            break;
            //DICTAMINADOR
          case 2:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 2 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticaESPECIALIST"] = "AVG_dictaminator2";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
              echo $link = "AEDTMN/SeguimientoDictamen/".$clave ;
              $_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
            }else{
              echo "23000";
            }
            break;
            // REVISOR IGECEM
          case 3:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 3 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticaREVISITION"] = "AVG_revigecem3";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;
              echo $link = "AEDTMN/SeguimientoRevisor/".$clave ;
              $_SESSION["tipoUsuario"] = $data[0]->tipo_usuario;
            }else{
              echo "23000";
            }
            break;
            // ADMIN JORGE CELSO
          case 4:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 4 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticajrADMIN"] = "AVG_JRADMIN4";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

              echo $link = "AEDTMN/BusquedaAdmin/" ;
            }else{
              echo "23000";
            }
            break;
            //SUBDIRECTOR TECNICO
          case 10:
            if( $data[0]->activo == "t" ){
              echo "23000";
            }else if( $data[0]->activo == "f" ){
              $n_id = $data[0]->id_usuario;
              $query = "UPDATE usuario_v2 SET activo = 'TRUE' WHERE id_usuario = $n_id and tipo_usuario = 10 ";
              pg_query($c, $query);
              // Cerrando la conexion
              pg_close($c);
              //sesion para usuario
              session_start();
              //Guardamos n variables de sesiÃ³n que nos auxiliarÃ¡ para saber si se estÃ¡ o no "logueado" un usuario
              $_SESSION["idkey1"] = $n_id;
              $_SESSION["idkey2"] = $data[0]->id_union;
              $_SESSION["autenticaAVG"] = "AVGADMIN";
              $_SESSION["usuarioactual"] = $data[0]->nombre_especialista;

              echo $link = "AEDTMN/AdminGris/";
            }else{
              echo "23000";
            }
            break;

          default:
            # code...
            break;
        }

      }else if( $data[0]->activo== "t" ){
        // si no es verdadero haz cambios en la base

        $query1111 = "UPDATE usuario_v2 SET activo = 'FALSE' where nombre_usuario = '".htmlentities($user)."' AND pasword = '".htmlentities($pass)."'";
        pg_query($c, $query1111);
        // Cerrando la conexion
        pg_close($c);

        //Redireccionamos a Inicio (al inicio de sesion)
        echo "23003";



      }
    }else{
      echo "23001";
    }



  }









}

public function closeed( $c){
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','$DICTAMUN@2020');
	define('SECRET_IV','121212');

	//Reanudamos la sesión
	session_start();
	//
	if( isset($_SESSION["idkey1"]) == false ){
		pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
    session_regenerate_id();
    session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../../Inicio";

	}else{
		$num_id = $_SESSION["idkey1"];

		$query = "UPDATE usuario_v2 SET activo = 'FALSE' WHERE id_usuario = $num_id ";
	pg_query($c, $query);
	// Cerrando la conexion
	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
    session_regenerate_id();
    session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../../Inicio";

	}


}
public function closeed_contribuyente( $c){
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','$DICTAMUN@2020');
	define('SECRET_IV','121212');

	//Reanudamos la sesión
	session_start();
	//$num_id = $_SESSION["idkey1"];

		if( isset($_SESSION["idkey1"]) == false ){
			// Cerrando la conexion
	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
	session_regenerate_id();
	session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../Inicio";

		}else{
			$num_id = $_SESSION["idkey1"];
				$query = "UPDATE usuario_v2 SET activo = 'FALSE' WHERE id_usuario = $num_id ";
	pg_query($c, $query);
	// Cerrando la conexion
	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
	session_regenerate_id();
	session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../Inicio";


		}

}

public function closeed_ADMIN1( $c){
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','$DICTAMUN@2020');
	define('SECRET_IV','121212');

	//Reanudamos la sesión
	session_start();
	//$num_id = $_SESSION["idkey1"];
	if( isset($_SESSION["idkey1"]) == false ){

	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
	session_regenerate_id();
	session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../../Inicio";

	}else{
		$num_id = $_SESSION["idkey1"];
		$query = "UPDATE usuario_v2 SET activo = 'FALSE' WHERE id_usuario = $num_id ";
	pg_query($c, $query);
	// Cerrando la conexion
	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
	session_regenerate_id();
	session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../../Inicio";

	}


}


public function closeed_vista_general( $c){
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','$DICTAMUN@2020');
	define('SECRET_IV','121212');

	//Reanudamos la sesión
	session_start();
	//$num_id = $_SESSION["idkey1"];
	if( isset($_SESSION["idkey1"]) == false ){

	// Cerrando la conexion
	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
	session_regenerate_id();
	session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../../Inicio";

	}else{
		$num_id = $_SESSION["idkey1"];
		$query = "UPDATE usuario_v2 SET activo = 'FALSE' WHERE id_usuario = $num_id ";
	pg_query($c, $query);
	// Cerrando la conexion
	pg_close($c);
	//Literalmente la destruimos
	//session_destroy();
	$_SESSION=array();
	session_regenerate_id();
	session_destroy();
	//Redireccionamos a Inicio (al inicio de sesión)
	echo "../../../Inicio";


	}


}

public function guardarObsMuni($c,$obs,$fol,$clave){

   session_start();$revisors = $_SESSION["idkey2"];
   $QSl = "UPDATE estatusxfolio SET obs_municipio='$obs' WHERE folio_dictamen=$fol and cclave='$clave';";

  pg_query($c, $QSl);
  // Cerrando la conexiÃ³n
  pg_close($c);
  echo"10";


}

//seguimiento de revisor igecem
public function seguimiento_fecha_revisor($c,$f_ini,$f_fin){
	//Reanudamos la sesi?
	session_start();
	$num_id = $_SESSION["idkey2"];
	$fechainicio = date("Y-m-d", strtotime($f_ini));
	$fechafin = date("Y-m-d", strtotime($f_fin));

	// Realizando una consulta SQL
	$query = "select
	( aniodictamen || '?' || cclave)AS claveanio,
	(CASE
	WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
	END) as etapa_folio_d,
	(CASE
	WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
	END) as etapadictamen,
	d.id_dictaminador as dictaminador,j.nombre_especialista as  nombre_especialist,p.id_dictaminador as contribuyente,k.nombre_especialista,nombredenominacion,apaterno,amaterno,email,
	d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
	(CASE WHEN tipodictamen =1 THEN 'NORMAL'
	WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
	WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
	END) as tipoditc ,
	id_revisor, cclave
	from contribuyentedatos_v2 as d
	join
	aviso_dictamen_v2 as p
	on
	d.folio = p.id_aviso
	join
	(

	select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
	join usuario_v2  as u
	on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2

	) as j

	on
	j.num_registro = d.id_dictaminador
	join
	(

	select num_registro,nombre_especialista,tipo_usuario from especialistas_vigentes_v2 as e
	join usuario_v2  as u
	on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 1

	) as k
	on
	k.num_registro = p.id_dictaminador


	join

	(
	select distinct folio_dictamen, etapa,id_revisor, cclave from estatusxfolio group by folio_dictamen,etapa,id_revisor, cclave

	) as t

	on

	t.folio_dictamen =  d.folio  where id_revisor = $num_id and  fecha_registro between '$fechainicio' and '$fechafin' and etapa = 4 or etapa = 12 or etapa = 13 order by  d.folio;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	$validate_exixts = pg_num_rows($rs1);

	if ($validate_exixts >= 1) {
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion


		header('Content-type: application/json');
		echo json_encode($data2);

	}else{
		echo "000";
	}

	pg_close($c);
}
//seguimiento de dictaminador

public function  seguimiento_fecha_dictaminador($c,$f_ini,$f_fin,$cla){

  $fechainicio = date("Y-m-d", strtotime($f_ini));
  $fechafin = date("Y-m-d", strtotime($f_fin));

  session_start();
  $num_id = $_SESSION["idkey2"];

  $fechainicioanio = date("Y", strtotime($f_ini));
  $fechafinanio = date("Y", strtotime($f_fin));


if ($cla == 1) {
    $query = "select distinct co.folio, ( aniodictamen || '?' || cclave)AS claveanio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
    (CASE
    WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE
WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen,
 es.cclave from contribuyentedatos_v2
as co join
( select * from estatusxfolio where id_dictaminador = $num_id )
as es on co.folio = es.folio_dictamen
where co.id_dictaminador = $num_id and es.etapa = 1 or es.etapa=2 and date(fecha_registro) between '$fechainicio' and '$fechafin'
group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave;";

}else if ($cla == 2) {

   $query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
   (CASE
   WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE
WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen,
es.cclave from contribuyentedatos_v2
as co join
( select * from estatusxfolio where id_dictaminador = $num_id )
as es on co.folio = es.folio_dictamen
where co.id_dictaminador = $num_id and es.etapa = 3 or es.etapa = 4 and date(fecha_registro) between '$fechainicio' and '$fechafin'

group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave;";

//where co.id_dictaminador = $num_id and es.etapa = 3 or es.etapa=11 and date(fecha_registro) between '$fechainicio' and '$fechafin'

}else if ($cla == 3) {

   $query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
   (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE
WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen,
es.cclave from contribuyentedatos_v2
as co join
( select * from estatusxfolio where id_dictaminador = $num_id )
as es on co.folio = es.folio_dictamen
where co.id_dictaminador = $num_id and es.etapa = 15 and date(fecha_registro) between '$fechainicio' and '$fechafin'
group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave;";

}else if ($cla == 4) {

   $query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
   (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE
WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen,
es.cclave from contribuyentedatos_v2
as co join
( select * from estatusxfolio where id_dictaminador = $num_id )
as es on co.folio = es.folio_dictamen
where co.id_dictaminador = $num_id and es.etapa = 11 or es.etapa = 12 or es.etapa = 13 and date(fecha_registro) between '$fechainicio' and '$fechafin'
group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave;";

}





 $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $c, $query );
  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts >= "1" ){
$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
    //$data2[] = array('folioconstruido' => str_pad($data2[0]->folio, 4, "00", STR_PAD_LEFT));

  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);

  }else{
    // Cerrando la conexiÃ³n
  pg_close($c);
    echo "000";

  }
  }



//LISTA PARA LLENAR LA TABLA DEL PADRON DICTAMINADOR
public function listado_tabl_dictaminadores($c){

	// Realizando una consulta SQL
	$query = "select b.tipo_usuario ,no_reg_autorizado as id_tmp,no_reg_autorizado,nombre_especialista,curp, rfc, nombre, ap_paterno, ap_materno,
correo,  telefono
from
(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2)
as a
join
(select * from usuario_v2 where tipo_usuario = 2) as b
on
a.no_reg_autorizado = b.idetallusu where b.tipo_usuario = 2;";
	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs = pg_query( $c, $query );
	while( $obj = pg_fetch_object($rs) ){

		$data[] = $obj;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result);
	// Cerrando la conexiÃ³n
	pg_close($c);
	//$obj = json_encode($data);
	//var_dump(json_encode($data));
	header('Content-type: application/json');
	print_r(json_encode($data));

}

//lista de seguimiento x dictaminador
public function lista_dictamenes(){

	$sql = "
select * from
(select * from aviso_dictamen_v2 where id_dictaminador = 47) as a
join
(select a.tipo_usuario, a.activo as actusu,
  a.idetallusu,b.no_reg_autorizado, b.nombre, b.correo, b.personal_moral,b.id,b.id_dictaminador
 from usuario_v2 as a
 join
 dictaminadores_v2 as b
 on
 a.idetallusu = b.no_reg_autorizado
 where idetallusu = 275) as b
 on
 a.id_dictaminador = b.id_dictaminador;";

}


//lista de estados de mexico,municipios y cp
public function lista_estado($c){

	// Realizando una consulta SQL
	$query = "select nombre,id_fk as id from cp.estados order by id_fk";

	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs = pg_query( $c, $query );
	while( $obj = pg_fetch_object($rs) ){
			$data[] = $obj;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result);
	// Cerrando la conexiÃ³n
	pg_close($c);
	header('Content-type: application/json');
	print_r(json_encode($data));


}

//lista de municipios y cp
public function lista_municipio($c,$x){
	// Realizando una consulta SQL
	$query = "select nombre,id_fk as id from cp.estados where id_fk =$x ";
	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs = pg_query( $c, $query );
	while( $obj = pg_fetch_object($rs) ){
		$data[] = $obj;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result);
	$a1 = utf8_decode( $data[0]->nombre );

	// Realizando una consulta SQL
	 $query1 = utf8_encode("select distinct b.d_mnpio,cast (b.c_mnpio as integer) as a,a.id_fk,b.c_estado  from cp.estados as a
	 join cp.$a1 as b
	 on a.id_fk = cast(b.c_estado as integer)
	 order by b.d_mnpio");

	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
			$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexiÃ³n
	pg_close($c);

	header('Content-type: application/json');
	print_r(json_encode($data5));

}


//lista de cp masiva
public function lista_cp_mx($c,$etd,$var){
  // Realizando una consulta SQL
  $query1 = "select nombre,id_fk as id from cp.estados where id_fk =$etd";


  $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs3 = pg_query( $c, $query1 );
  while( $obj4 = pg_fetch_object($rs3) ){
   $data5[] = $obj4;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  $a1 = utf8_decode( $data5[0]->nombre );
  // Realizando una consulta SQL
  $a1 = "méxico";
  $query = "
   select  b.d_codigo from cp.estados as a
   join cp.$a1 as b
   on a.id_fk = cast(b.c_estado as integer)
   where b.d_mnpio like '%$var%'
   group by d_codigo";
  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs) ){
    $data[] = $obj;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result);
  pg_close($c);
  //print_r($data);die();
  header('Content-type: application/json');
  print_r(json_encode($data));

}

//lista de tipo de dictamen
public function lista_tipodic($c){

	// Realizando una consulta SQL
	$query1 = utf8_encode("select * from tipo_dictamen_v2 where id_tipo =1 or id_tipo =2");
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
		$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexiÃ³n
	pg_close($c);

	header('Content-type: application/json');
	print_r(json_encode($data5));
}

//dictamen seleccionado para cargar datos
public function dat_dictamen($c,$dat){
	// Realizando una consulta SQL
	$query1 = utf8_encode("select * from tipo_dictamen_v2 where id_tipo =1 or id_tipo =2");
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
	 $data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexiÃ³n
	pg_close($c);

	header('Content-type: application/json');
	print_r(json_encode($data5));
}

//ver un dictamen seleccionado x el dictaminador con numero de registro 340
public function Selectiondatos($c,$cx,$anio,$t){
  session_start();
    $num_registroxdictaminador = $_SESSION["idkey2"];
  // Realizando una consulta SQL
  $query1 = "select a.folio,no_reg_autorizado, a.tipod as tipopersona from
contribuyentedatos_v2 as a
join
(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as b
on
a.id_dictaminador = b.no_reg_autorizado
join (select * from inmuebles_v2 where cve_catastral = '$cx' and aniodictaminar = '$anio' and folio = $t) as i
on a.folio=i.folio
where i.cve_catastral ='$cx' and a.aniodictamen=$anio and b.no_reg_autorizado = $num_registroxdictaminador; ";


$result = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $c, $query1 );
  $validate_exixts = pg_num_rows($rs);

  if( $validate_exixts >= "1" ){

    $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs3 = pg_query( $c, $query1 );
  while( $obj4 = pg_fetch_object($rs3) ){
    $data5[] = $obj4;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  $a1 = $data5[0]->folio;
  $a3 = $data5[0]->no_reg_autorizado;
  // Realizando una consulta SQL
  $query11 = "select  (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,cast ((CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'

END) as character varying) as dictament,  tipod as tipopersona,
lpad(folio::text, 5, '0') as folr,aniodictamen as anio_dictaminar,
 ('/' ||  lpad(folio::text, 4, '0') || '/' || aniodictamen   || '/' ||
  to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,id_con as id_aviso,
  norg as no_reg_autorizado,date(fecha_registro) as fecha_registro1,*,curpcontrib
  from
(select *,a.rfc as rrfcontri,b.nombre as nomb,b.ap_paterno as appt,
b.ap_materno as apmt,b.rfc as rrfc,b.telefono as tel,b.no_reg_autorizado as norg,a.curp as curpcontrib
from
contribuyentedatos_v2 as a
join
(select * from especialistas_vigentes_v2 where num_registro = $a3 and tipo_usuariofk = 2) as b
on
a.id_dictaminador = b.no_reg_autorizado
where b.no_reg_autorizado = $a3 and folio = $a1 ) as a
join
(select id_inmueble, cve_catastral, valor_catastral, a.id_domicilio as domic,
       id_aviso, manifest_pago, manifest_mejoras, baldio, id_clave, aniodictaminar,b.id_domicilio as domic2, calle, no_exterior, no_interior, colonia, id_municipio,
       referencia1, referencia2, codigo_p, estado, a.folio as ff from
inmuebles_v2 as a
join
domicilio_v2 as b
on a.id_domicilio = b.id_domicilio where id_aviso = $a1 and cve_catastral = '$cx') as b
on a.folio = b.ff
join estatusxfolio as mym
on a.folio = mym.folio_dictamen
where a.no_reg_autorizado =$a3 and folio =$a1 and cve_catastral='$cx' and cclave='$cx';";
  $result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs33 = pg_query( $c, $query11 );
  while( $obj34 = pg_fetch_object($rs33) ){
    $data53[] = $obj34;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result23);
  // Cerrando la conexiÃ³n
  pg_close($c);

  header('Content-type: application/json');
  print_r(json_encode($data53));
  }else{
    // Cerrando la conexiÃ³n
  pg_close($c);
    echo"0000";
  }

}


public function savage_garden($c,$id,$clavcatt){
// SOLO CORRER UNA SOLA VEZ ESTO PARA PODER HACER LA UNION EN UN SOLA LINEA DE CODIGO...
//echo $rutam ='C:/xampp/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';die();
//ahora vamos a unir en un solo renglon los archivos .val de cada inmueble x inmueble
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


}
echo"10";//bandera de todo esta bien
// Liberando el conjunto de resultados
pg_free_result($result23);

/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------
/*
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val','rb');
$string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val'));
$file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';
$contenidomed = trim($string);
//version php 5.6
$contenido = preg_replace("/[\r\n\\n\\r]+/", "", $contenidomed);
$aux[] = $contenido;

// PARA VER COMO RESULTA EL PROCESO FINAL dataandfilesf
//print_r($aux[0]);

$fp = fopen($file, "w");
fwrite($fp, $aux[0]);
fclose($fp);
fclose($archivo);
echo"10";//bandera de todo esta bien
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------

// Cerrando la conexiÃ³n
pg_close($c);

}



public function savage_garden_two($c,$id,$clavcatt){
$id_r = (int) $id;

//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
session_start();
$num_registroxdictaminador = $_SESSION["idkey2"];
// Realizando una consulta SQL
  $query11="select * from (

SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
  FROM aviso_dictamen_v2 as a
  join
  inmuebles_v2 as b
  on
  a.id_aviso = b.id_aviso where folio = $id ) as dd
  JOIN
  (
 select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso ) as ddf
ON dd.folio=ddf.folio

where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt' ";
$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray

$rs33 = pg_query( $c, $query11 );
$validate_exixts_registro = pg_num_rows($rs33);
if( $validate_exixts_registro != 0 ){
  //echo "borra los datos e inicia un INSERT INTO";
  $sqldroptables="
DELETE FROM dictaval_avaluos where folio_dictamun =$id and cclave='$clavcatt';

DELETE FROM dictaval_contribuyente where folio_dictamun =$id and cclave='$clavcatt';
DELETE FROM dictaval_cuestionario where folio_dictamun =$id and cclave='$clavcatt';

DELETE FROM dictaval_especialistas where folio_dictamun =$id and cclave='$clavcatt';
DELETE FROM dictaval_informes where folio_dictamun =$id and cclave='$clavcatt';

DELETE FROM dictaval_notasfis where folio_dictamun =$id and cclave='$clavcatt';
DELETE FROM dictaval_opiniones where folio_dictamun =$id and cclave='$clavcatt';

DELETE FROM dictaval_representante where folio_dictamun =$id and cclave='$clavcatt';
";
$resultadosdrop = pg_query( $c, $sqldroptables );



while( $obj34 = pg_fetch_object($rs33) ){
$carpetainm = $obj34->cve_catastral;

// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
//1202690001   1302690003     1202690006        1322690004
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val','r');
while ($linea = fgets($archivo)) {
$a = $linea.'';

$datastovector = explode("|", $a);
$aux[0] = $datastovector;
}
//print_r($aux);
foreach ($aux as $key => $value) {
$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


 $a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
           //echo utf8_encode($a3);

$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



 $a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

pg_query($c, utf8_encode($a1));
pg_query($c, utf8_encode($a2));
pg_query($c, utf8_encode($a3));
pg_query($c, utf8_encode($a4));
pg_query($c, utf8_encode($a5));
pg_query($c, utf8_encode($a6));
pg_query($c, utf8_encode($a7));
pg_query($c, utf8_encode($a8));





}
//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
//print_r($aux[0][145]);


}



}else{
  //ECHO "SI NO HAY DATOS AGREGAR UN NUEVO REGISTRO";

while( $obj34 = pg_fetch_object($rs33) ){
$carpetainm = $obj34->cve_catastral;

// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
//1202690001   1302690003     1202690006        1322690004
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val','r');
while ($linea = fgets($archivo)) {
$a = $linea.'';

$datastovector = explode("|", $a);
$aux[0] = $datastovector;
}
//print_r($aux);
foreach ($aux as $key => $value) {
$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


 $a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
           //echo utf8_encode($a3);

$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



 $a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

pg_query($c, utf8_encode($a1));
pg_query($c, utf8_encode($a2));
pg_query($c, utf8_encode($a3));
pg_query($c, utf8_encode($a4));
pg_query($c, utf8_encode($a5));
pg_query($c, utf8_encode($a6));
pg_query($c, utf8_encode($a7));
pg_query($c, utf8_encode($a8));





}
//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
//print_r($aux[0][145]);


}


}
//die();

echo "10";//bandera de todo esta bien
fclose($archivo);
pg_close($c);

}

public function savage_garden_validation($c,$id,$clavcatt){
$id_r = (int) $id;

//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
session_start();
$num_registroxdictaminador = $_SESSION["idkey2"];
// Realizando una consulta SQL
  $query11="
  select * from (
SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
  FROM (select * from aviso_dictamen_v2 where id_aviso = $id  and cve_cat = '$clavcatt' ) as a
  join
  (
  select * from  inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
  on
  a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt'
   ) as dd
  JOIN
  (
 select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
(select * from aviso_dictamen_v2 where id_aviso = $id  and cve_cat = '$clavcatt' ) as p
on
d.folio = p.id_aviso where folio= $id
 ) as ddf
ON dd.folio=ddf.folio

where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt' ";
$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rs33 = pg_query( $c, $query11 );

$validate_exixts_registro = pg_num_rows($rs33);
//if( $validate_exixts_registro != 0 ){

 // $sqldroptables="
//DELETE FROM construcciones_v2 where folio_dictamun = $id and cclave='$clavcatt';
//";
//$resultadosdrop = pg_query( $c, $sqldroptables );

  while( $obj34 = pg_fetch_object($rs33) ){
$carpetainm = $obj34->cve_catastral;

// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
//1202690001   1302690003     1202690006        1322690004
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val','r');
while ($linea = fgets($archivo)) {
$a = $linea.'';

$datastovector = explode("|", $a);
$aux[0] = $datastovector;

}
/////////////////////////////////////////////////// validamos la version del dictaval
$queryvalidaversion="SELECT trim(version) as vrsion,activo FROM versionesdictaval_v2 where activo = 'true';";
$resultversion = pg_query($queryvalidaversion) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rsver = pg_query( $c, $queryvalidaversion );
while( $objversion = pg_fetch_object($rsver) ){
  $verssion = $objversion->vrsion;

}
$verssion;
$vers = trim($verssion);
/////////////////////////////////////////////////// validamos la version del dictaval
//print_r($aux);
foreach ($aux as $key => $value) {

     $tipo_version = trim($value[145]);

     if( $tipo_version == $vers){
       //echo "son version igual".$tipo_version."_".$verssion;
echo "10";//bandera de todo esta bien
     }else {
       // code...
       //echo "son version diferente".$tipo_version."_".$verssion;
fclose($archivo);
$sqlevil = "delete  from listadocumentos_v2 where id_dictamen = $id_r and orden = 10";
pg_query($c,$sqlevil);
If (unlink('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val')) {
  //echo "file was successfully deleted";
  //echo "5"."_______".$tipo_version."_____________".$vers;//bandera de todo esta MALLLLLL
  echo "5";//bandera de todo esta MALLLLLL
} else {
  //echo "there was a problem deleting the file";
}
//       echo"no se puede insertar este avaluo por que tiene una version de dictaval vieja";

     }



}
//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
//print_r($aux[0][145]);


}



pg_close($c);

}


public function arms_around_you($c,$id,$clavcatt){
$id_r = (int) $id;

//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
session_start();
$num_registroxdictaminador = $_SESSION["idkey2"];
// Realizando una consulta SQL
$query11="select * from (
	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt' ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio
	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt'; ";

$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rs33 = pg_query( $c, $query11 );

$validate_exixts_registro = pg_num_rows($rs33);
if( $validate_exixts_registro != 0 ){

  $sqldroptables="
DELETE FROM construcciones_v2 where folio_dictamun = $id and cclave='$clavcatt';
";

$resultadosdrop = pg_query( $c, $sqldroptables );


  while( $obj34 = pg_fetch_object($rs33) ){

$carpetainm = $obj34->cve_catastral;

// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r');

while ($linea = fgets($archivo)) {
$a = $linea.'';
$datastovector = explode("|", $a);
$aux[] = $datastovector;

}
//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
$va = array_slice($aux[0],0,1,true);
//print_r($aux[0]);
$universo_array = $aux[0];
$fragmeto_md5 = array_shift($universo_array);

$v = array_chunk($universo_array, 19);

fclose($archivo);

$vector_n = $v;
$l=0;
foreach($vector_n as $equipo)
{
if(empty($equipo[15])  ){
$r ="campo_vacio";
$equipo[15] = $r;

}
if(empty($equipo[16]) ){
$r ="campo_vacio";
$equipo[16] = $r;

}
if(empty($equipo[17])){
$r ="campo_vacio";
$equipo[17] = $r;

}
if(empty($equipo[18]) ){
$r ="campo_vacio";
$equipo[18] = $r;
}



$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
//echo "<br><br><br>";

pg_query($c, $sql_construccion);



$l++;
}

}

}else{
while( $obj34 = pg_fetch_object($rs33) ){

$carpetainm = $obj34->cve_catastral;

// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r');

while ($linea = fgets($archivo)) {
$a = $linea.'';
$datastovector = explode("|", $a);
$aux[] = $datastovector;

}
//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
$va = array_slice($aux[0],0,1,true);
//print_r($aux[0]);
$universo_array = $aux[0];
$fragmeto_md5 = array_shift($universo_array);

$v = array_chunk($universo_array, 19);

fclose($archivo);

$vector_n = $v;
$l=0;
foreach($vector_n as $equipo)
{
if(empty($equipo[15])  ){
$r ="campo_vacio";
$equipo[15] = $r;

}
if(empty($equipo[16]) ){
$r ="campo_vacio";
$equipo[16] = $r;

}
if(empty($equipo[17])){
$r ="campo_vacio";
$equipo[17] = $r;

}
if(empty($equipo[18]) ){
$r ="campo_vacio";
$equipo[18] = $r;
}



$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
//echo "<br><br><br>";

pg_query($c, $sql_construccion);



$l++;
}

}
}
echo "10";
pg_close($c);

}




public function arms_around_you_two($c,$id){

}

//desbloqueo x usuario
public function set_update_user($c,$s){
	// cuando el usuario bloquea su sesion
	$QSl = "UPDATE usuario_v2 SET activo='FALSE' WHERE  idetallusu =".htmlentities($s);
	pg_query($c, $QSl);
	// Cerrando la conexiÃ³n
	pg_close($c);
	echo"10";

}
//desactivacion de un usuario
public function set_disabled_user($c,$s){
	//caducidad al 100 esta activado y caducidad al 50 esta desactivado por tiempo de renovacion de licencia
	$QSl = "UPDATE usuario_v2 SET caducidad=50 WHERE  idetallusu =".htmlentities($s);
	pg_query($c, $QSl);
	// Cerrando la conexiÃ³n
	pg_close($c);
	echo"10";
}
// dar de alta un nuevo usuario con nuevo numero de registro dictamun
public function new_user($c,$opcz,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8){

	$xx1 = ucwords(strtolower($x1));
	$xx2 = ucwords(strtolower($x2));
	$xx3 = ucwords(strtolower($x3));
	$xx4 = strtoupper($x4);
	$xx5 = strtoupper($x5);
	$xx6 = strtolower($x6);

/* EN CASO DE QE HAYA UN USUARIO Q TENGA DATOS EN DICTAVAL SE DA DE ALTA CON UN INSERT NORMAL EN LA
TABLA DE USUARIO_V2 Y DETALLES_USUARIO_V2
DESPUES SE EJECUTA EL ALGORITMO PARA TOMAR EL NUMERO LIBRE*/

	//algoritmo que calcula no_de_registro_disponibles x dictamun
	// arreglo de numeros de resgistro

	/*
	 *
	 *
	 *
	 *   data: {access: 78,selectp:1
            ,x1 : $scope.nomu ,
                 x2 :$scope.apu,
                 x3 :$scope.amu,
                 x4 :$scope.curpu,
                 x5 :$scope.rfcu,
                 x6 :$scope.emailu,
               x7 :$scope.telu,
               x8 :11
	 *
	 *
	 *
	 *
	 * */
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

		$nameall = preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx1) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx2) ."". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $xx3);
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
	}else{
		// nuevo dictaminador y revisor

		//$NombrUs="Dict".$rest1.$nuevo_numero_de_registro_calculado."2022";

		$new_user_studio = "Contrib".$rest1.$nuevo_numero_de_registro_calculado."2024";
		$pwd_studio = $pwd;

		$sqlNewUs ="INSERT INTO usuario_v2(
            nombre_usuario, pasword, tipo_usuario, activo, idetallusu, caducidad)
    VALUES ('$NombrUs','$pwd',$opcz , 'false', $nuevo_numero_de_registro_calculado, 100);";


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
             '$apellidomart', '$emailavg','$celavg',$opcz);";


	//die();
	pg_query($c, $sqlNewUs)  or die('La consulta fallo: ' . pg_last_error());
	pg_query($c, $SQLiUSER)  or die('La consulta fallo: ' . pg_last_error());

	//echo"10";
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
	echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso:<br><br><b>Usuario: '.$new_user_studio.'<br> Contrasenia: '.$valx.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';
	//Enviar Email al dictaminador asignado
  /*  require 'PHPMailer/PHPMailerAutoload.php';

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

  if($mail->send()){
    echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso:<br><br><b>Usuario: '.$NombrUs.'<br> Contrasenia: '.$valx.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';

    } else {
    echo 'Error';
  }*/
  //echo $mail->send();

}

// LISTA DE TODOS LOS USUARIOS PARA EL ADMINISTRADOR
public function list_users($c){
	/*
	$query = "select  a.id,nombre_usuario,
(CASE WHEN tipo_usuario =2 THEN 'Dictaminador'
WHEN tipo_usuario =1 THEN 'Contribuyente'
WHEN tipo_usuario =3 THEN 'Revisor IGECEM'
WHEN tipo_usuario =4 THEN 'Administrador Jr'
WHEN tipo_usuario =10 THEN 'Administrador Master'
END) as tipo
, (CASE WHEN activo ='f' THEN 'Inactivo'
WHEN activo ='t' THEN 'Activo'
END) as actv,a.idetallusu,a.idetallusu ,
caducidad,  b.no_reg_autorizado as numreg,nombre, ap_paterno, ap_materno, correo from usuario_v2 as a
join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado where a.caducidad=100;";*/

	$query = "select  distinct a.id,nombre_usuario,
(CASE WHEN tipo_usuario =2 THEN 'Dictaminador'
WHEN tipo_usuario =1 THEN 'Contribuyente'
WHEN tipo_usuario =3 THEN 'Revisor IGECEM'
WHEN tipo_usuario =4 THEN 'Administrador'
WHEN tipo_usuario =5 THEN 'Delegacion'
WHEN tipo_usuario =6 THEN 'Municipio'
WHEN tipo_usuario =7 THEN 'Direccion de Recaudacion'
WHEN tipo_usuario =8 THEN 'Direccion de Fiscalizacion'
WHEN tipo_usuario =10 THEN 'Administrador'
END) as tipo
, (CASE WHEN activo ='f' THEN 'Inactivo'
WHEN activo ='t' THEN 'Activo'
END) as actv,a.idetallusu,a.idetallusu ,
caducidad,  b.no_reg_autorizado as numreg,nombre, ap_paterno, ap_materno, correo
 from usuario_v2 as a
join especialistas_vigentes_v2 as b
 on a.idetallusu = b.no_reg_autorizado
 where
 a.tipo_usuario = b.tipo_usuariofk
 and
 a.caducidad=100;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}

// EDITAR LOS DATOS X USUARIO
public function Rewrite_user($c,$opcz,$x0,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9){
	echo$sql_rewriteuseruser = "SELECT insertofuncionform1(
    $x0,
    $opcz,
    '$x1',
    '$x2',
    '$x3',
    '$x4',
    '$x5',
    '$x6',
    '$x7',
		'$x8',
		'$x9');";
	pg_query($c, $sql_rewriteuseruser);
	//pg_close($c);
	//echo "100";

}
// para eliminar un usuario de la base de datos
public function detele_user($c,$p){

    $query = "select  a.id,nombre_usuario,
(CASE WHEN tipo_usuario =2 THEN 'Dictaminador'
WHEN tipo_usuario =1 THEN 'Contribuyente'
WHEN tipo_usuario =3 THEN 'Revisor IGECEM'
WHEN tipo_usuario =4 THEN 'Adminstrador'
WHEN tipo_usuario =10 THEN 'Adminstrador'
END) as tipo
, (CASE WHEN activo ='f' THEN 'Inactivo'
WHEN activo ='t' THEN 'Activo'
END) as actv,a.idetallusu,a.idetallusu ,
caducidad,  b.no_reg_autorizado as numreg,nombre, ap_paterno, ap_materno, correo from usuario_v2 as a
join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado where a.caducidad=100 and id =$p";
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    //$i = $obj1->id;
    $j = $obj1->numreg;

    $sql_deteled_especial = "DELETE FROM especialistas_vigentes_v2 WHERE no_reg_autorizado=$j";
  pg_query($c, $sql_deteled_especial);


  $sql_deteleduser = "DELETE FROM usuario_v2 WHERE idetallusu=$j";
  pg_query($c, $sql_deteleduser);


  }
	pg_close($c);
	echo "100";
}

// dar se alta un nuevo usuario con nuevo numero
public function new_user_type($c){
	// arreglo de numeros de resgistro
$testArray = array(10,8,4,3,2);
// tomar el mayor numero
$arrayRange = range(1,max($testArray));
//diferenciar los que hagan falta
$missingValues = array_diff($arrayRange,$testArray);
//numeros disponibles
print_r($missingValues);
}

//combo de delegaciones
public function combox_Delegac($c){
	$query = "SELECT delegacion, nombdeleg FROM delegaciones2_v2020;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}

//tabla de dictamenes para admin
public function dictamen_full($c){
$query = "
select
( aniodictamen || '?' || cclave)AS claveanio,
(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen,
 d.id_dictaminador as dictaminador,j.nombre_especialista as  nombre_especialist,p.id_dictaminador as contribuyente,k.nombre_especialista,nombredenominacion,apaterno,amaterno,email,
 d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc , t.cclave,
(CASE WHEN id_revisor =0 THEN 'NO TIENE ASIGNADO REVISOR'
ELSE ( select nombre_especialista from especialistas_vigentes_v2 where num_registro = id_revisor and tipo_usuariofk = 3 )
END) AS revisor , ( select nombre_especialista from especialistas_vigentes_v2 where num_registro = id_revisor and tipo_usuariofk = 3 ),id_revisor
from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
join
(

select num_registro,nombre_especialista,tipo_usuario from ( select * from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2

  ) as j

on
j.num_registro = d.id_dictaminador
join
(

select num_registro,nombre_especialista,tipo_usuario from ( select * from especialistas_vigentes_v2 where tipo_usuariofk = 1 ) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 1

  ) as k
on
k.num_registro = p.id_dictaminador


join

(
select distinct folio_dictamen, etapa, cclave, id_revisor from estatusxfolio group by folio_dictamen,etapa, cclave, id_revisor

) as t

on

t.folio_dictamen =  d.folio

order by   d.folio
;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

public function dictamen_full2($c){

	$query = "select
 d.id_dictaminador as dictaminador,j.nombre_especialista as  nombre_especialist,nombredenominacion,apaterno,amaterno,email,
 d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc
from contribuyentedatos_v2 as d
join
(
select num_registro,nombre_especialista,tipo_usuario from especialistas_vigentes_v2 as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2 and tipo_usuariofk =2
  ) as j
on
j.num_registro = d.id_dictaminador

join
(
select distinct folio_dictamen from estatusxfolio group by folio_dictamen
) as t
on
t.folio_dictamen =  d.folio
order by   d.folio;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}


public function inmueblesIn($c,$fol){
$query = "select * from inmuebles_v2 where folio=$fol";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  //echo "okokok";
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

// campo de version actual del dictaval
public function version_DICTABAL($c){
	$query = "SELECT id_version, version , fecha_registro, activo, id_usuario FROM versionesdictaval_v2  where activo='TRUE' ";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}
// registro de nueva version del dictaval
public function newversion_DICTABAL($c,$vvv){
	//echo "100";
	//die();
	$sql_rewr = "UPDATE versionesdictaval_v2 SET activo='FALSE' ";
	pg_query($c, $sql_rewr);

	//Reanudamos la sesión
	session_start();
	$num_id = $_SESSION["idkey2"];
	$sql_rewriteuseruser = "INSERT INTO versionesdictaval_v2(version, fecha_registro, activo, id_usuario)
			VALUES ('$vvv',now(), 'TRUE',$num_id);";
	pg_query($c, $sql_rewriteuseruser);
	pg_close($c);
	echo "100";

}

//ver un dictamen seleccionado x el dictaminador con numero de registro 340
public function SelectiondatosAvC($c,$cx){
	// Realizando una consulta SQL
	$query1 = "select folio,no_reg_autorizado from
contribuyentedatos_v2 as a
join
especialistas_vigentes_v2 as b
on
a.id_dictaminador = b.no_reg_autorizado
where a.folio =".$cx;
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
		//echo $obj->id_usuario;
		//print_r($obj);
		//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
		$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	$a1 = $data5[0]->folio;
	$a3 = $data5[0]->no_reg_autorizado;
	// Realizando una consulta SQL
	$query11 = "
select tipod as tipopersona,a.folio as ff,lpad(a.folio::text, 4, '0') as folioreconstruido,nombe,aappt,aapmt,rrfcc, nomb,appt,apmt,rrfc,no_reg_autorizado , aniodictaminar,tipod as tipodd,nomt,curp,telefono, email from
(
select * from
(
select a.folio,a.nombredenominacion as nombe,a.apaterno as aappt,a.amaterno as aapmt,a.rfc as rrfcc
,b.nombre as nomb,b.ap_paterno as appt,b.ap_materno as apmt,b.rfc as rrfc,b.telefono as tel,id_inmueble,b.no_reg_autorizado,tipod,a.curp,a.tipod as tipoddd,a.telefono, a.email from
contribuyentedatos_v2 as a
join
especialistas_vigentes_v2 as b
on
a.id_dictaminador = b.no_reg_autorizado
where b.no_reg_autorizado = $a3
) as x
join
(select id_tipo,nombre as nomt from tipo_dictamen_v2) as j
on x.tipod = j.id_tipo) as a
join
(
select * from
inmuebles_v2 as a
join
domicilio_v2 as b
on a.id_domicilio = b.id_domicilio ) as b
on a.id_inmueble = b.id_inmueble
where a.no_reg_autorizado =$a3 and a.folio = $a1";
	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs33 = pg_query( $c, $query11 );
	while( $obj34 = pg_fetch_object($rs33) ){
		$data53[] = $obj34;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result23);
	// Cerrando la conexiÃ³n
	pg_close($c);

	header('Content-type: application/json');
	print_r(json_encode($data53));

}

//select municipios
public function municpios($c){

	$query = "select lpad(estado_fk::text, 3, '0')  as a ,nombremn2 as d_mnpio from union_cp_select";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}
// combo para sellecion de revisor de igecem y turnar dictamenes para revision
public function combox_checks($c){
	$query ="select id_usuario,tipo_usuario,caducidad,a.idetallusu as id,( nombre || ' ' || ap_paterno || ' ' || ap_materno ) as nomcomple
		 from usuario_v2 as a join detalles_usuario_v2 as b on a.idetallusu = b.idetallusu where tipo_usuario = 3";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

// Asigna a revisor multiples dictamenes
public function select_dictm($c,$f){
	$query =$f;
	pg_query($c, $query);

	 echo "100";
}

// tabla de control de pagos
public function tbl_cash_dtm($c){
	session_start();

	if( $_SESSION["idkey2"] == "2246"){
		$query ="SELECT idok,folio_de_dictamen, especialista, node_registro, date(fecha_validacion) as fecha_validacion1,
       municipio, folio_avaluos_catastral_para_efectos_de_dictamen,
       valor_total_del_avaluo, tarifa, monto_por_concepto_de_validacion_y_revision,
       nofactura, fecha_de_pago
  FROM control_validados_ok WHERE id != 0;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);


	}else{
echo "0000";
	}

}

public function tbl_inmuebles_files($c,$i){
  session_start();$rev = $_SESSION["idkey2"];
  $query ="SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,cve_cat,id_inmueble, cve_catastral, valor_catastral,folio
  FROM aviso_dictamen_v2 as a
  join
  inmuebles_v2 as b
  on
  a.id_aviso = b.id_aviso where folio = $i and id_dictaminador = $rev;";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}


// realiza la busqueda de un dictamen paea la vista de dictaminador y suba archivos x clave cat
public function inmueble1($c,$id){
  session_start();$dictaminador = $_SESSION["idkey2"];

$query="select * from
(select * from
aviso_dictamen_v2 as a
join
inmuebles_v2 as b
on a.id_aviso = b.folio
where folio = $id order by b.id) as ee
join
(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
where d.folio = $id) AS PP
ON
ee.folio  =  PP.folio

where ee.folio = $id and PP.folio = $id and PP.dictaminador = $dictaminador";

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);



}

// guarda la revision con preguardar de un revisro como visto visto bueno de dictamenes
public function save($c,$folio,$clavec,$ObservacionPre,$anioD,$activo){
	session_start();$revisors = $_SESSION["idkey2"];
	if ($ObservacionPre == "") {
		$ObservacionPre="N/A";
	}
	$sqL = "UPDATE estatusxfolio SET etapa=5, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $folio and cclave='$clavec' and id_revisor=$revisors;";
	pg_query($c, $sqL);

	$sql4 = "INSERT INTO hojasverdes(anio, folio, clavecc, url, activo, foliodictaval, noregistrorevisor, observacion, \"comentarioDictaminador\") VALUES ($anioD, $folio, '$clavec', null, $activo, null, $revisors, '$ObservacionPre', null);";
	pg_query($c, $sql4);
	echo"10";
	pg_close($c);
}
//preRechazoo
public function preRechazoo($c,$folio,$clave,$ObservacionPre,$anioD,$activo){

	session_start();$revisors = $_SESSION["idkey2"];
	if ($ObservacionPre == "") {
		$ObservacionPre="N/A";
	}


	if ($activo == 1) { //11 es OBSERVADO POR REVISOR

		$sqL = "UPDATE estatusxfolio SET etapa=11, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $folio and cclave='$clave' and id_revisor=$revisors;";
		pg_query($c, $sqL);
		echo"10";

	}else if ($activo == 2) { // etapa 5 . Observado por revisor / subir archivo en hojas verdes


		$sqL = "UPDATE estatusxfolio SET etapa=5, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $folio and cclave='$clave' and id_revisor=$revisors;";
		pg_query($c, $sqL);

		///**VALIDAR SI EXISTE UN REGISTRO EN LA TABLA HOJAS VERDES YA NO SE INSERTA, SE ACTUALIZA**////

		$sql2="SELECT folio FROM hojasverdes WHERE folio =$folio and clavecc = '$clave' and anio=$anioD;";

		$result = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());

		$rs = pg_query( $c, $sql2 );

		$validate_exixts = pg_num_rows($rs);

		if ($validate_exixts >=1 ) {

			$sql4="UPDATE hojasverdes SET anio=$anioD, folio =$folio, clavecc='$clave', activo= $activo, noregistrorevisor=$revisors, observacion= '$ObservacionPre' WHERE anio=$anioD and folio =$folio and clavecc='$clave';";
			pg_query($c, $sql4);
			echo"10";


		}else{

			$sql4 = "INSERT INTO hojasverdes(anio, folio, clavecc, url, activo, foliodictaval, noregistrorevisor, observacion, \"comentarioDictaminador\") VALUES ($anioD, $folio, '$clave', null, $activo, null, $revisors, '$ObservacionPre', null);";
			pg_query($c, $sql4);
			echo"20";

		}
		//////////////////////********////////////////////////////////////




	}

	// Cerrando la conexión
	pg_close($c);

}


public function liberado($c,$clave,$ObservacionPre,$fol,$archivoHJSVErdes){


$query1 = "SELECT * FROM estatusxfolio where folio_dictamen=$fol and cclave='$clave' and etapa =6";
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
		//echo $obj->id_usuario;
		//print_r($obj);
		//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
		$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	$revisors = $data5[0]->id_revisor;
	$dictaminador = $data5[0]->id_dictaminador;


	if ($ObservacionPre == "") {
      $ObservacionPre="N/A";
  		}
//7 es PENDIENTE DE PAGO
$sqL = "UPDATE estatusxfolio SET etapa=7, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $fol and cclave='$clave' and id_revisor=$revisors and id_dictaminador=$dictaminador;";
      pg_query($c, $sqL);


 $sqL2 = "UPDATE hojasverdes SET activo=$archivoHJSVErdes WHERE folio = $fol and clavecc='$clave';";
      pg_query($c, $sqL2);


    echo"10";
    // Cerrando la conexiÃ³n
    pg_close($c);

}


public function rechazoGr($c,$clave,$ObservacionPre,$foli,$archivoHJSVErdes){


	$query1 = "SELECT * FROM estatusxfolio where folio_dictamen=$foli and cclave = '$clave' and etapa =6";
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
		//echo $obj->id_usuario;
		//print_r($obj);
		//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
		$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	$revisors = $data5[0]->id_revisor;
	$dictaminador = $data5[0]->id_dictaminador;



	if ($ObservacionPre == "") {
      $ObservacionPre="N/A";
  		}
//13 es rechazado por administrador(Grisel)
$sqL = "UPDATE estatusxfolio SET etapa=13, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $foli and id_revisor=$revisors and id_dictaminador=$dictaminador and cclave ='$clave';";
      pg_query($c, $sqL);


   $sqL2 = "UPDATE hojasverdes SET activo=$archivoHJSVErdes WHERE folio = $foli and clavecc='$clave';";
      pg_query($c, $sqL2);


    echo"10";
    // Cerrando la conexiÃ³n
    pg_close($c);

}

// ver los documentos almacenados
public function view_docs_general($c,$i,$d,$clv,$etapa){
	session_start();
	$dictaminador = $_SESSION["idkey2"];

	if ($etapa == 1) {
		if( $i == "1"){
			$query ="select *  from
			(
			select * from
			aviso_dictamen_v2 as aaaa
			join
			estatusxfolio as bbbb
			on
			aaaa.id_aviso = bbbb.folio_dictamen
			) as kkkkkk
			join
			(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
			join
			aviso_dictamen_v2 as p
			on
			d.folio = p.id_aviso) as ll
			on
			kkkkkk.id_aviso = ll.folio
			join listadocumentos_v2 as j
			on kkkkkk.id_aviso = j.id_dictamen
			where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'
			"; //and kkkkkk.etapa = 1
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);
		}else{

			$query ="select *  from
			(
			select * from
			aviso_dictamen_v2 as aaaa
			join
			estatusxfolio as bbbb
			on
			aaaa.id_aviso = bbbb.folio_dictamen
			) as kkkkkk
			join
			(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
			join
			aviso_dictamen_v2 as p
			on
			d.folio = p.id_aviso) as ll
			on
			kkkkkk.id_aviso = ll.folio
			join listadocumentos_v2 as j
			on kkkkkk.id_aviso = j.id_dictamen
			where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave ='$clv'";


			// and kkkkkk.etapa = 1
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);

		}

	}else{

		if( $i == "1"){
			$query ="select *, \"observacionRevisor\" as comentarios2 from
			(
			select * from
			aviso_dictamen_v2 as aaaa
			join
			estatusxfolio as bbbb
			on
			aaaa.id_aviso = bbbb.folio_dictamen
			join
			listadocumentos_v2 as j
			on
			aaaa.id_aviso  = j.id_dictamen
			) as kkkkkk
			join
			(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
			join
			aviso_dictamen_v2 as p
			on
			d.folio = p.id_aviso) as ll
			on
			kkkkkk.id_aviso = ll.folio
			where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.clavecastatral = '$clv' and cclave='$clv';";
			//and kkkkkk.etapa = 1
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);


		}else{

			$query ="select *, \"observacionRevisor\" as comentarios2 from
			(
			select * from
			aviso_dictamen_v2 as aaaa
			join
			estatusxfolio as bbbb
			on
			aaaa.id_aviso = bbbb.folio_dictamen
			join
			listadocumentos_v2 as j
			on
			aaaa.id_aviso  = j.id_dictamen
			) as kkkkkk
			join
			(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
			join
			aviso_dictamen_v2 as p
			on
			d.folio = p.id_aviso) as ll
			on
			kkkkkk.id_aviso = ll.folio
			where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.clavecastatral ='$clv'";  // and kkkkkk.etapa = 1
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);

		}

	}





}

// VALIDAR  los documentos almacenados DEPENDE DE LAS VERSIONES DE DICTAVAL
public function view_docs_general_validation_version($c,$i){
  session_start();$dictaminador = $_SESSION["idkey2"];


  // VALIDACION MOMENTANIA PARA EL FUNCIONAMIENTO DEL SISTEMA CON EL DICTAVAL DESACTUALIZADO.
  echo "3";

die();
//validar la version de dictaval
/////////////////////////////////////////////////// validamos la version del dictaval
$queryvalidaversion="SELECT trim(version) as vrsion,extract(year from fecha_registro) as ff FROM versionesdictaval_v2 where activo = 'true';";
$resultversion = pg_query($queryvalidaversion) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rsver = pg_query( $c, $queryvalidaversion );
while( $objversion = pg_fetch_object($rsver) ){
  $verssion = $objversion->vrsion;
  $vfecha = $objversion->ff;

}
$e = date("Y");
//print_r($vfecha."____".$e );
/////////////////////////////////////////////////// validamos la version del dictaval
$r = 2021;

$entrada1 = $verssion;
$a = explode( '-', $entrada1 );
//print_r($a[1]);
$anioDICTAVAL = str_split($a[1],4);

//print_r($anioDICTAVAL);

//if( $e == $vfecha ){
if( $e == $vfecha && $e == $anioDICTAVAL[0] ){
//echo"dictaval actualizado";
echo "3";
}else{
  echo "2";
  //echo"dictaval antiguo";
  /*
  $data2[] = ["orden" => 100];
  header('Content-type: application/json');
  echo json_encode($data2);
*/
}


}

public function view_tipologs_general($c,$i,$d){
  session_start();$dictaminador = $_SESSION["idkey2"];
if( $i == "1"){




  $query ="select j.id as id_docx,nombredoc,orden,comentario  from
(
select * from
aviso_dictamen_v2 as aaaa
join
estatusxfolio as bbbb
on
aaaa.id_aviso = bbbb.folio_dictamen
where etapa = 1 and aaaa.id_aviso = $d and bbbb.id_dictaminador =  $dictaminador
) as i
 join
listadocumentos_v2 as j
on
i.id_aviso  = j.id_dictamen
where   i.etapa = 1 and i.id_aviso = $d and j.orden = 12 or j.orden = 32 or j.orden = 33 or j.orden = 120";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);


  }else{

  $query ="select j.id as id_docx,nombredoc,orden,comentario  from
(
select * from
aviso_dictamen_v2 as aaaa
join
estatusxfolio as bbbb
on
aaaa.id_aviso = bbbb.folio_dictamen
where etapa = 1 and aaaa.id_aviso = $d and bbbb.id_dictaminador =  $dictaminador
) as i
 join
listadocumentos_v2 as j
on
i.id_aviso  = j.id_dictamen
where   i.etapa = 1 and i.id_aviso = $d and j.orden = 12 or j.orden = 32 or j.orden = 33 or j.orden = 120";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);

  }

}

// tipologias guardadas sin subirse a dictamen final
public function xview_tipologs_general($c,$i,$d,$xclv){
  session_start();$dictaminador = $_SESSION["idkey2"];

if( $i == "1"){

 /* $query ="
      select * from ( ( select
 j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
 from listadocumentos_v2 as j WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv' ) as eeeee
join
(
select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
WHERE p.id_aviso = $d
) as gggggg
on eeeee.id_dictamen = gggggg.folio
) as la
join
(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
on
la.id_dictamen = lo.folio_dictamen
where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc ";*/ // and eeeee.etapa = 1
  //--where eeeee.id_aviso = 332 and eeeee.orden = PPTX or eeeee.orden = ZIP O RAR or eeeee.orden = SON DWG DE AUTOCAD  and gggggg.dictaminador = 270 and eeeee.clavecastatral = '1060200000000000' order by id_docx asc


$query = "select *,(lpad(id_con::text, 5, '0')) as folioconceros from contribuyentedatos_v2 as c
join (select * from estatusxfolio where folio_dictamen= $d and cclave='$xclv') as e
on c.folio = e.folio_dictamen
join (select * from listadocumentos_v2 where id_dictamen=$d and clavecastatral = '$xclv') as l
on e.cclave = l.clavecastatral
where c.folio = $d and e.cclave='$xclv' and orden =12 or orden =32 or orden =33 or orden =120 and c.id_dictaminador = $dictaminador;";

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);


  }else{

 /* $query ="select * from

(
(

select
 j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.\"observacionRevisor\" as comentario2 , j.clavecastatral
 from
 listadocumentos_v2 as j
WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
) as eeeee
join
(
select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
WHERE p.id_aviso = $d
) as gggggg

on eeeee.id_dictamen = gggggg.folio

) as la
join
(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
on

la.id_dictamen = lo.folio_dictamen

where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc ";   */// and eeeee.etapa = 1

$query = "select *,(lpad(id_con::text, 5, '0')) as folioconceros from contribuyentedatos_v2 as c
join (select * from estatusxfolio where folio_dictamen= $d and cclave='$xclv') as e
on c.folio = e.folio_dictamen
join (select * from listadocumentos_v2 where id_dictamen=$d and clavecastatral = '$xclv') as l
on e.cclave = l.clavecastatral
where c.folio = $d and e.cclave='$xclv' and orden =12 or orden =32 or orden =33 or orden =120 and c.id_dictaminador = $dictaminador;";

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);

  }

}

public function xview_tipologs_general2($c,$i,$d,$xclv){
	//echo "aaa";
	//die();
	//SOLO ES PARA CASO ESPECIAL DE AURORA
	//session_start();$dictaminador = $_SESSION["idkey2"];
	$dictaminador = "340";

	if( $i == "1"){

		$query ="
      select *,lpad(folio::text, 5, '0') as foliocer from
      (
(

select
 j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
 from
 listadocumentos_v2 as j
WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
) as eeeee
join
(
select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
WHERE p.id_aviso = $d and cve_cat = '$xclv'
) as gggggg

on eeeee.id_dictamen = gggggg.folio
) as la
join
(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
on

la.id_dictamen = lo.folio_dictamen

where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc
 "; // and eeeee.etapa = 1
		//--where eeeee.id_aviso = 332 and eeeee.orden = PPTX or eeeee.orden = ZIP O RAR or eeeee.orden = SON DWG DE AUTOCAD  and gggggg.dictaminador = 270 and eeeee.clavecastatral = '1060200000000000' order by id_docx asc

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);


	}else{

		$query ="

      select *,lpad(folio::text, 5, '0') as foliocer from
      (
(

select
 j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
 from
 listadocumentos_v2 as j
WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
) as eeeee
join
(
select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
WHERE p.id_aviso = $d and cve_cat = '$xclv'
) as gggggg

on eeeee.id_dictamen = gggggg.folio
) as la
join
(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
on

la.id_dictamen = lo.folio_dictamen

where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc
";// and eeeee.etapa = 1

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

}

public function view_docs_generalextra($c,$i,$d,$clv,$etapa){
	session_start();
	//$dictaminador = $_SESSION["idkey2"];
	$dictaminador = 340;


		if( $i == "1"){
			//predio baldio

			$query ="select *, lpad(folio::text, 5, '0') as folix, j.id as iddox   from
			(
			select * from
			aviso_dictamen_v2 as aaaa
			join
			estatusxfolio as bbbb
			on
			aaaa.cve_cat = bbbb.cclave
			where aaaa.cve_cat = '$clv'
			) as kkkkkk
			join
			(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen, p.cve_cat from contribuyentedatos_v2 as d
			join
			aviso_dictamen_v2 as p
			on
			d.folio = p.id_aviso where d.id_dictaminador = $dictaminador and p.cve_cat = '$clv' ) as ll
			on
			kkkkkk.id_aviso = ll.folio
			join (select * from listadocumentos_v2 where clavecastatral = '$clv') as j
			on kkkkkk.id_aviso = j.id_dictamen
			where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'
			"; //and kkkkkk.etapa = 1
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);


		}else{
			//predio construido

			$query ="select *, lpad(folio::text, 5, '0') as folix, j.id as iddox   from
			(
			select * from
			aviso_dictamen_v2 as aaaa
			join
			estatusxfolio as bbbb
			on
			aaaa.cve_cat = bbbb.cclave
			where aaaa.cve_cat = '$clv'
			) as kkkkkk
			join
			(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen, p.cve_cat from contribuyentedatos_v2 as d
			join
			aviso_dictamen_v2 as p
			on
			d.folio = p.id_aviso where d.id_dictaminador = $dictaminador and p.cve_cat = '$clv' ) as ll
			on
			kkkkkk.id_aviso = ll.folio
			join (select * from listadocumentos_v2 where clavecastatral = '$clv') as j
			on kkkkkk.id_aviso = j.id_dictamen
			where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'";


			// and kkkkkk.etapa = 1
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);

		}







}


//select revisores para adminjorge
public function selectopctrevis($c){

  $query = "select tipo_usuario,activo,a.idetallusu as id_union ,nombre,ap_paterno,ap_materno
    from usuario_v2 as a join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado
     where tipo_usuario = 3 and caducidad = 100";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);

}

public function combox_especialiss($c){
  $query = "select tipo_usuario,activo,a.idetallusu as id_union ,nombre,ap_paterno,ap_materno
    from usuario_v2 as a join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado
     where tipo_usuario = 2 and caducidad = 100";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

///select dictaminadores o especialstas
public function combo_expecialistas($c){


  session_start();$dictaminador = $_SESSION["idkey2"];
  $query ="select num_registro, nombre_especialista
    from usuario_v2 as a join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado
    WHERE a.tipo_usuario = 2";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);



}

// envio de correos masivos
public function email_more($c){

 $sql="SELECT max(folio) as folio FROM contribuyentedatos_v2;";
 $result = pg_query($sql) or die('La consulta fallo: ' . pg_last_error());
 // Imprimiendo los resultados aarray
  $rs = pg_query( $c, $sql );

  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts == "1" ){
    while( $obj = pg_fetch_object($rs) ){
   $data[] = $obj;
            }

             $nom = $data[0]->folio;

            if(empty($nom)){
               $folio2 = $nom;
               //$id_dom= $nom+1;
            }else{
               $folio2 = $nom;
               //$id_dom= $nom+1;
}

}

  //Enviar email a dictaminador.
  $sql2="SELECT tipod, email as correo, nombredenominacion, apaterno, amaterno, folio, correo as correodic FROM contribuyentedatos_v2 as a
  JOIN especialistas_vigentes_v2 as b ON a.id_dictaminador=b.num_registro where folio=$folio2;";
  $result2 = pg_query($sql2) or die('La consulta fallo: ' . pg_last_error());
  $rs2 = pg_query( $c, $sql2 );
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
   unlink('../tmp/AcuseDeDictamen.pdf'); //Elimina el archivo pdf que se envio de la carpeta tmp
    } else {
    echo 'Error';
  }
  //echo $mail->send();

}
// TABLA de aviso de seguimiento de dictamenes para contribuyentes
public function tbl_seg_dict($c,$fe1,$fe2){

    $fechainicio = date("Y-m-d", strtotime($fe1));
    $fechafin = date("Y-m-d", strtotime($fe2));

    session_start();
    $num_id = $_SESSION["idkey2"];

 $query ="select *,(CASE
WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,(CASE WHEN etapa  =1 THEN 'DICTAMEN REGISTRO'
WHEN etapa  =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN etapa  =3 THEN 'PENDIENTE DE ASIGNAR'
END) as etapadictamen, ( aniodictamen || '?' || cclave)AS claveanio,
w.fecha_registro as fecha_etapa, cclave from
(select aa.id_aviso,
('/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse
,to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fecha_registro ,aniodictamen , gg.rfc as rfc_contribuyente,nombredenominacion,apaterno,amaterno,
gg.id_dictaminador as no_reg_autorizado, gg.rfc,
 ee.nombre_especialista ,aa.id_dictaminador as id_contribuyente_dandode_alta from aviso_dictamen_v2 as aa
join
contribuyentedatos_v2 as gg
on
aa.id_aviso = gg.folio
join usuario_v2 as dd
on
gg.id_dictaminador = dd.idetallusu
join
(select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as ee
on
gg.id_dictaminador = ee.no_reg_autorizado group by  aa.id_aviso,
('/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY'))
,to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') ,aniodictamen , gg.rfc ,nombredenominacion,apaterno,amaterno,
gg.id_dictaminador ,
 ee.nombre_especialista
,aa.id_dictaminador
) AS w

join
 (select DISTINCT folio_dictamen,etapa,cclave from estatusxfolio ORDER  by folio_dictamen) as s
 on
 w.id_aviso = s.folio_dictamen


where w.id_contribuyente_dandode_alta = $num_id and s.etapa = 1  and date(w.fecha_registro) between '$fechainicio' and '$fechafin';";//hh.etapa = 1

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
   $validate_exixts = pg_num_rows($rs1);//tbl_seg_dict

   if ($validate_exixts >= 1) {
      while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }

  //print_r($data2);
  // Liberando el conjunto de resultados
  pg_free_result($result2);

//echo "hola4";die();
  header('Content-type: application/json');
  echo json_encode($data2);
   }else{
    echo "000";
   }
//die();


  // Cerrando la conexion
  pg_close($c);

}
// TABLA de  dictamenes en proceso para contribuyentes

public function tbl_process_dict($c,$fe1,$fe2){
    $fechainicio = date("Y-m-d", strtotime($fe1));
    $fechafin = date("Y-m-d", strtotime($fe2));

  session_start();$contribuy_revisando = $_SESSION["idkey2"];
//echo "hola5";die();
  $query ="
  select lpad(d.folio::text, 5, '0') as fl, cclave,
(CASE
WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen,
 d.id_dictaminador as dictaminador,j.nombre_especialista as
 nombre_especialist,p.id_dictaminador as contribuyente,
k.nombre_especialista, d.fecha_registro, d.nombredenominacion, d.apaterno, d.amaterno,
d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc
from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
join
(

select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2

  ) as j

on
j.num_registro = d.id_dictaminador
join
(

select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 1) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 1

  ) as k
on
k.num_registro = p.id_dictaminador


join

(
select distinct folio_dictamen, etapa, cclave from estatusxfolio group by folio_dictamen,etapa, cclave

) as t

on

t.folio_dictamen =  d.folio

where p.id_dictaminador = $contribuy_revisando  and etapa != 1 and etapa != 15 and date(fecha_registro) between '$fechainicio' and '$fechafin';";

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
   $validate_exixts = pg_num_rows($rs1);
   if ($validate_exixts >= 1) {
     while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
    // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
   $query2="rollback;";
   $rs1 = pg_query( $c, $query );


  header('Content-type: application/json');
  echo json_encode($data2);

   }else{
    echo "000";

   }




           // print_r($data2);


  pg_close($c);




}

///tbl_dictamenes_validados
public function tbl_dictamenes_validados($c,$fe1,$fe2){
    $fechainicio = date("Y-m-d", strtotime($fe1));
    $fechafin = date("Y-m-d", strtotime($fe2));

  session_start();$contribuy_revisando = $_SESSION["idkey2"];
//echo "hola5";die();
  $query ="
  select lpad(d.folio::text, 5, '0') as fl, cclave,
(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen, ( aniodictamen || '?' || cclave)AS claveanio,
 d.id_dictaminador as dictaminador,j.nombre_especialista as  nombre_especialist,p.id_dictaminador as contribuyente,k.nombre_especialista,
 d.nombredenominacion, d.apaterno, d.amaterno, d.fecha_registro,
d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc
from contribuyentedatos_v2 as d
join
aviso_dictamen_v2 as p
on
d.folio = p.id_aviso
join
(

select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2

  ) as j

on
j.num_registro = d.id_dictaminador
join
(

select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 1) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 1

  ) as k
on
k.num_registro = p.id_dictaminador


join

(
select distinct folio_dictamen, etapa, cclave from estatusxfolio group by folio_dictamen,etapa, cclave

) as t

on

t.folio_dictamen =  d.folio

where p.id_dictaminador = $contribuy_revisando  and etapa = 15 and date(fecha_registro) between '$fechainicio' and '$fechafin';";

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
   $validate_exixts = pg_num_rows($rs1);
   if ($validate_exixts >= 1) {
     while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
    // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
   $query2="rollback;";
   $rs1 = pg_query( $c, $query );

  header('Content-type: application/json');
  echo json_encode($data2);

   }else{
    echo "000";

   }

  pg_close($c);

}


public function busqeda_datos_user($c,$e){
    session_start();$u = $_SESSION["idkey2"];

   $query = "select  a.id,nombre_usuario,pasword,
(CASE WHEN tipo_usuario =2 THEN 'Dictaminador'
WHEN tipo_usuario =3 THEN 'Revisor IGECEM'
WHEN tipo_usuario =4 THEN 'Adminstrador'
WHEN tipo_usuario =10 THEN 'Adminstrador'
END) as tipo
, (CASE WHEN activo ='f' THEN 'Inactivo'
WHEN activo ='t' THEN 'Activo'
END) as actv,a.idetallusu,a.idetallusu ,
caducidad,  b.no_reg_autorizado as numreg,nombre, ap_paterno, ap_materno, correo,b.curp, b.rfc,b.telefono,tipo_usuario from usuario_v2 as a
join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado where a.caducidad=100 and a.id = $e";
    $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs1 = pg_query( $c, $query );
    while( $obj1 = pg_fetch_object($rs1) ){
        $data2[] = $obj1;
    }
    // Liberando el conjunto de resultados
    pg_free_result($result2);
    // Cerrando la conexion
    pg_close($c);

    header('Content-type: application/json');
    echo json_encode($data2);


}
public function revisores_igecem_combo($c){
    $query = "select  a.id,nombre_usuario,
(CASE WHEN tipo_usuario =2 THEN 'Dictaminador'
WHEN tipo_usuario =3 THEN 'Revisor IGECEM'
WHEN tipo_usuario =4 THEN 'Adminstrador'
WHEN tipo_usuario =10 THEN 'Adminstrador'
END) as tipo
, (CASE WHEN activo ='f' THEN 'Inactivo'
WHEN activo ='t' THEN 'Activo'
END) as actv,a.idetallusu,a.idetallusu ,
caducidad,  b.no_reg_autorizado as numreg,nombre, ap_paterno, ap_materno, tipo_usuario from usuario_v2 as a
join especialistas_vigentes_v2 as b on a.idetallusu = b.no_reg_autorizado where a.caducidad=100 and tipo_usuario=3;";
    $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs1 = pg_query( $c, $query );
    while( $obj1 = pg_fetch_object($rs1) ){
        $data2[] = $obj1;
    }
    // Liberando el conjunto de resultados
    pg_free_result($result2);
    // Cerrando la conexion
    pg_close($c);

    header('Content-type: application/json');
    echo json_encode($data2);

}

////////////////////////////////////////////////////////new///////////////////////////////////////////////////////////////////////
 //busqueda_fechas
public function search_dtmj($c,$a,$b,$cx){
  $fechainicio = date("Y-m-d", strtotime($a));
  $fechafin = date("Y-m-d", strtotime($b));

  if( empty($cx)){
$query = "select v.folio, e.nombre_especialista, v.fecha_registro, v.nombredenominacion, v.apaterno, v.amaterno, v.tipodictamen,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'

WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'

WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'

END) as tipoditc, ('/' ||  lpad(v.folio::text, 5, '0') || '/' || v.aniodictamen   || '/' || to_char(v.fecha_registro, 'YYYY')) AS acuse_recpecion2  from contribuyentedatos_v2 as v
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
on v.id_dictaminador = e.no_reg_autorizado
WHERE fecha_registro between '$fechainicio' and '$fechafin';";

  }else if( empty($fechainicio) && empty($fechafin) ) {

    $query = "
    select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,
date(fecha_registro) as fecha_registro2 , e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen

join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE aniodictamen=$cx ";


  }else if( !empty($fechainicio) && !empty($fechafin) && !empty($cx) ) {

    $query = "select v.folio, e.nombre_especialista, v.fecha_registro, v.nombredenominacion, v.apaterno, v.amaterno, v.tipodictamen,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'

WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'

WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'

END) as tipoditc, ('/' ||  lpad(v.folio::text, 5, '0') || '/' || v.aniodictamen   || '/' || to_char(v.fecha_registro, 'YYYY')) AS acuse_recpecion2
 from contribuyentedatos_v2 as v
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
on v.id_dictaminador = e.no_reg_autorizado
WHERE fecha_registro between '$fechainicio' and '$fechafin' ;";
  }

  //$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){
    /*

      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
       'acuse_recpecion2' => $obj->acuse_recpecion2,
       'fecha_registro2' => $obj->fecha_registro2,
       'tipoditc' => $obj->tipoditc,
       'nombredenominacion' => $obj->nombredenominacion,
       'apaterno' => $obj->apaterno,
       'amaterno' => $obj->amaterno,
       'nombre_especialista' => $obj->nombre_especialista,
       'revisornom' => $revisornom,
       'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
       'etapa_de_dict' => $obj->etapa_de_dict
       );*/

      $data2[] = $obj;
  }
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

//busqueda_municipio
public function search_dtmj2($c,$d){

  $query = "select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.fecha_registro,v.tipodictamen,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2 , e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join (SELECT id_domicilio as iddomiciliox , id_municipio FROM domicilio_v2 ) as dom on dp.id_domicilio=dom.iddomiciliox
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE dom.id_municipio ='$d';";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){

/*

      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

// busqueda_rfc
public function search_dtmj3($c,$e){

  $query = "select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.folio,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc
,date(fecha_registro) as fecha_registro2 ,
(select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 2 and  no_reg_autorizado = v.id_dictaminador) as nombre_especialista

 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join (SELECT id_domicilio as iddomiciliox , id_municipio FROM domicilio_v2 ) as dom on dp.id_domicilio=dom.iddomiciliox

WHERE v.rfc like '%".htmlentities($e)."%';";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){


/*
      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

// busqueda_revisor
public function search_dtmj4($c,$f){

  $query = "
select distinct v.folio, v.id_dictaminador, v.fecha_registro, v.nombredenominacion, v.apaterno, v.amaterno,
 v.tipodictamen, e.nombre_especialista,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc, ('/' ||  lpad(v.folio::text, 5, '0') || '/' || v.aniodictamen   || '/' || to_char(v.fecha_registro, 'YYYY')) AS acuse_recpecion2
  from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2)as e
on v.id_dictaminador = e.no_reg_autorizado
WHERE id_revisor = $f;";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){



/*
      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

//busqueda_folio
public function search_dtmj5($c,$g){

  $query = "
  select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2, e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado
WHERE v.folio = $g;";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){
     /*
      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

//busqueda_status
public function search_dtmj6($c,$h){

  $query = "
  select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2 , e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE  g.etapa = $h;";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){

/*
      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

//busqueda_especialista
public function search_dtmj7($c,$i){

  $query = "select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2 , e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen

join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE  v.id_dictaminador = $i;";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){

     /* $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

//busqueda_nombre_contribuyente
public function search_dtmj8($c,$j,$k,$l){

  if ($k== null || $l==null || $k== "" || $l=="") {
   $query="select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod ,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2, e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE nombredenominacion like '%$j%';";

  }else{

  $query = "select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod ,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2, e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE nombredenominacion like '%$j%' and
 apaterno like '%$k%' and
  amaterno like '%$l%';";
}
  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){


/*

      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }

  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);
  //print_r($data2);
 // die();

  header('Content-type: application/json');
  echo json_encode($data2);
}


//busqueda_clavecatastral
public function search_dtmj9($c,$j){

  $query = "select distinct v.folio,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.tipod,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,date(fecha_registro) as fecha_registro2, e.nombre_especialista
 from contribuyentedatos_v2 as v
join
estatusxfolio as g
on
v.folio = g. folio_dictamen
JOIN
inmuebles_v2 AS dp
on
g.cclave = dp.cve_catastral
join
dictaval_avaluos as i
on
dp.cve_catastral = i.cclave
join (select nombre_especialista, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as e
on v.id_dictaminador = e.no_reg_autorizado

WHERE  g.cclave like '%$j%';";

  $rs1 = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs1) ){


/*
      $data2[] = array( 'folio' => $obj->folio ,
      	'etapa_folio_d' => $obj->etapa_folio_d,
          'acuse_recpecion2' => $obj->acuse_recpecion2,
          'fecha_registro2' => $obj->fecha_registro2,
          'tipoditc' => $obj->tipoditc,
          'nombredenominacion' => $obj->nombredenominacion,
          'apaterno' => $obj->apaterno,
          'amaterno' => $obj->amaterno,
          'nombre_especialista' => $obj->nombre_especialista,
          'revisornom' => $revisornom,
          'cve_cat' => $obj->cve_cat,
          'valor_catastral' => $obj->valor_catastral,
          'valor_catastralDICTAMEN' => $valx,
          'etapa_de_dict' => $obj->etapa_de_dict
      );*/

      $data2[] = $obj;
  }
  //print_r($data2);
  //die();
  // Liberando el conjunto de resultados
  pg_free_result($rs1);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}


public function tbl_dictamenes_process_pago($c){
	$query = "select DISTINCT sf.folio_dictamen , ('DIP/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse
	, folio,fecha_registro, aniodictamen, c.rfc, nombredenominacion, e.no_reg_autorizado, nombre_especialista
	 from contribuyentedatos_v2 as c join aviso_dictamen_v2 as a on c.folio =a.id_aviso
	join (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e on c.id_dictaminador = e.no_reg_autorizado join estatusxfolio as sf on c.folio= sf.folio_dictamen
	where sf.etapa=7;";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);
}

public function newContribuyente($c,$opcz,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8){

	/* EN CASO DE QE HAYA UN USUARIO Q TENGA DATOS EN DICTAVAL SE DA DE ALTA CON UN INSERT NORMAL EN LA
	TABLA DE USUARIO_V2 Y DETALLES_USUARIO_V2
	DESPUES SE EJECUTA EL ALGORITMO PARA TOMAR EL NUMERO LIBRE*/

		//algoritmo que calcula no_de_registro_disponibles x dictamun
		// arreglo de numeros de resgistro
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
	$f=$x1;
	$g=$x4;
	$H = $x5;
	$cel =$x7;

	$rest1 = substr($f, 2);
	$rest2 = substr($g, 4,8);
	$rest3 = substr($H, 1,3);
	$rest4 = substr($cel, -4,4);
	$rest5 = substr($cel, -1,4);
	$pwd = $rest1.$rest4;

		if($opcz == "5"){ // si es 5 es una delegacion dada de alta si no continua puede ser un revisor o un dictaminador
	$NombrUs="Delg"."2020".$opcz;
	$sqlNewUs ="INSERT INTO usuario_v2(
	            nombre_usuario, pasword, tipo_usuario, activo, idetallusu, caducidad)
	    VALUES ('$NombrUs','$pwd',5 , 'false', $nuevo_numero_de_registro_calculado, 100);";

		$SQLiUSER = "INSERT INTO especialistas_vigentes_v2(
	            num_registro, nombre_especialista, no_reg_autorizado, curp, rfc,

	            nombre, ap_paterno, ap_materno, correo, telefono)

	    VALUES ($nuevo_numero_de_registro_calculado, '$x1 $x2 $x3' , $nuevo_numero_de_registro_calculado, '$x4','$x5',
	            '$x1','$x2','$x3', '$x6', '$x7');";
		//die();
		pg_query($c, $sqlNewUs);
		pg_query($c, $SQLiUSER);
		// Cerrando la conexiÃ³n
		pg_close($c);
		echo"10";
		}else{
			// nuevo dictaminador y revisor
			$NombrUs="2020".$rest1;
			$sqlNewUs ="INSERT INTO usuario_v2(
	            nombre_usuario, pasword, tipo_usuario, activo, idetallusu, caducidad)
	    VALUES ('$NombrUs','$pwd$nuevo_numero_de_registro_calculado',$opcz , 'false', $nuevo_numero_de_registro_calculado, 100);";

		 $SQLiUSER = "INSERT INTO especialistas_vigentes_v2(
	            num_registro, nombre_especialista, no_reg_autorizado, curp, rfc,

	            nombre, ap_paterno, ap_materno, correo, telefono)

	    VALUES ($nuevo_numero_de_registro_calculado, '$x1 $x2 $x3' , $nuevo_numero_de_registro_calculado, '$x4','$x5',
	            '$x1','$x2','$x3', '$x6', '$x7');";
		//die();
		pg_query($c, $sqlNewUs);
		pg_query($c, $SQLiUSER);

		echo"10";
		}
		   $Sqlk2 = "select nombre_usuario,pasword from usuario_v2 where  idetallusu =".$nuevo_numero_de_registro_calculado;
      $rs3 = pg_query( $c, $Sqlk2 );

      $validate_exixts = pg_num_rows($rs3);
      if( $validate_exixts != 0){
          while( $obj1ab = pg_fetch_object($rs3) ){
              $valx = $obj1ab->pasword;
          }
}else{
  $valx = "COMUNICATE CON EL ADMINISTRADOR";
}

// Cerrando la conexiÃ³n
  pg_close($c);
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
  $mail->addAddress($x6, 'destinatario');//Modificar a $emailDic
  $mail->Subject = 'Entrega de credenciales para el acceso al Sistema DICTAMUN IGECEM';
  $mail->AddEmbeddedImage('../_img/encabezadoDoc.png', 'banner2');
  $mail->Body = '<img src="cid:banner2" height="90%" width="50%"/><br><br><b>DIRECCION DE CATASTRO</b><br>Estimado (a): '.' '.$x1.' '.$x2.' '.$x3.'.<br> '.'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso.<br><br><b>Usuario: '.$NombrUs.'<br> Contrasenia: '.$valx.'</b><br><br> Sin mas por el momento reciba cordiales saludos.';
  $mail->IsHTML(true);

  if($mail->send()){
    echo 'Enviado';

    } else {
    echo 'Error';
  }
	  //echo $mail->send();
	}


	//tabla de dictamenes pendientes para admin
public function dictamenes_pendientes($c){
		$query = "
select distinct folio_dictamen,(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,('/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,

(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapa_de_dict, (nombre ||' '|| ap_paterno ||' '|| ap_materno) as nombre_espec,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,
nombredenominacion, email, a.id_dictaminador, etapa from contribuyentedatos_v2 as a
join especialistas_vigentes_v2 as b
on a.id_dictaminador = b.no_reg_autorizado
join estatusxfolio as e
on a.folio = e.folio_dictamen
where etapa=3;";
		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);
	}


//select municipios
public function municpios_autoacompletado($c,$v){


  $query = "select *,trim(initcap (nommpio) ) as d_mnpio,municipio as a  from municipios2020 where municipio = $v";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);

}

public function editarInfoC($c,$id){
  session_start();
  $num_id = $_SESSION["idkey1"];

  $tipoUser = $_SESSION["tipoUsuario"];

  $query2 = "SELECT * FROM usuario_v2 where id_usuario=$id and tipo_usuario=$tipoUser;";
  $result2 = pg_query($query2) or die('La consulta fallo: ' . pg_last_error());
  $rs2 = pg_query( $c, $query2 );
  while( $obj2 = pg_fetch_object($rs2) ){

      $iduserr = $obj2->idetallusu;
  }

  /////////////////////////////////////////////////////////////////
  $query = " select * from usuario_v2 as u JOIN especialistas_vigentes_v2 as e ON u.idetallusu = e.num_registro where u.idetallusu = $iduserr and id_usuario = $num_id;";

  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  $rs = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs) ){

    $data[] = $obj;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result);
  // Cerrando la conexiÃ³n
  pg_close($c);
  //$obj = json_encode($data);
  //var_dump(json_encode($data));
  header('Content-type: application/json');
  print_r(json_encode($data));



  }

  public function guardarCambios($c,$idUser,$nombre,$apaterno,$amaterno,$rfc,$curp,$tel,$email,$user,$contra){



  $query = "UPDATE especialistas_vigentes_v2 SET curp='$curp', rfc='$rfc', nombre='$nombre', ap_paterno='$apaterno', ap_materno='$amaterno', correo='$email', telefono=$tel WHERE num_registro = $idUser";
  pg_query($c, $query);


  $query2 = "UPDATE usuario_v2 SET nombre_usuario='$user', pasword='$contra' WHERE  idetallusu = $idUser";
  pg_query($c, $query2);
  // Cerrando la conexion
  pg_close($c);
  echo 'ok';

  }

  public function guardarCambiosRev($c,$idUser,$tel,$user,$contra){
    session_start();
  $num_id = $_SESSION["idkey1"];

  $query = "UPDATE especialistas_vigentes_v2 SET telefono=$tel WHERE num_registro = $idUser";
  pg_query($c, $query);


  $query2 = "UPDATE usuario_v2 SET nombre_usuario='$user', pasword='$contra' WHERE  idetallusu = $idUser and id_usuario=$num_id"; //2 Dictaminador and tipo_usuario=2
  pg_query($c, $query2);
  // Cerrando la conexion
  pg_close($c);
  echo 'ok';

  }



public function dictamenes_proccess($c){

  //$_SESSION["idkey1"] = $n_id;
  //$_SESSION["idkey2"] = $data[0]->id_union;
  //$_SESSION["autentica"] = "AVG";
  //$_SESSION["usuarioactual"] = $datae[0]->nombreusu;
  session_start();
  $num_id = $_SESSION["idkey2"];


   $queryaa = "select j.idetallusu,i.estado_fk, nombremn2 from usuario_v2 as j join union_cp_select as i
 on j.idetallusu  = i.estado_fk where j.idetallusu = $num_id  and tipo_usuario = 6";

    $resultad = pg_query($queryaa) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rxcs = pg_query( $c, $queryaa );
    //$validate_exixts = pg_num_rows($rs);

      while( $obaj = pg_fetch_object($rxcs) ){
        $datacc[] = $obaj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($resultad);

      $nombremun = $datacc[0]->nombremn2;

      $query = "select distinct c.folio, ('/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
		(CASE WHEN tipodictamen =1 THEN 'NORMAL'

WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'

WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'

END) as tipoditc, (select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 2 and  no_reg_autorizado = c.id_dictaminador) as nomespecialista, nombredenominacion,
apaterno, amaterno, id_municipio, c.folio from contribuyentedatos_v2 as c
join inmuebles_v2 as i on c.folio = i.folio
join domicilio_v2 as d on i.id_domicilio = d.id_domicilio
join estatusxfolio as e on i.folio = e.folio_dictamen
where d.id_municipio ='$nombremun' and e.etapa !=15;";

/*
  $query = "
 select id_con,id_con,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.folio,v.tipod,g.etapa,
g.id_revisor,(CASE WHEN id_revisor =0 THEN 'AUN NO TIENE ESPECIALISTA ASIGNADO' ELSE (select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 3 and no_reg_autorizado = g.id_revisor ) END) AS nombredelrevisor ,
g.cclave,valor_catastral,id_domicilio,ava_cve_fol,folio_dictamun,i.ava_vc_terr,(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =2 THEN 'DIP'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa=15 THEN 'DIP'
END) as etapa_folio_d, ( aniodictamen || '?' || g.cclave)AS claveanio,
('/' ||  lpad(v.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'

WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'

WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'

END) as tipoditc,

(CASE WHEN etapa =1 THEN 'REGISTRO DE DICTAMEN'
WHEN etapa =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR'
WHEN etapa =4 THEN 'ASIGNADO A REVISOR'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'RECHAZADO'
WHEN etapa =12 THEN 'NO AUTORIZADO'
WHEN etapa=13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa=15 THEN 'VALIDADO'
END) as etapa_de_dict,date(fecha_registro) as fecha_registro2 , i.ava_vc_terr as avaluovalcat,email,
(select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 2 and  no_reg_autorizado = v.id_dictaminador) as nomespecialista,
(CASE WHEN  (select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 3 and no_reg_autorizado = g.id_revisor ) = ' '
 THEN 'AUN NO TIENE DICTAMINADOR' ELSE (select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 3 and no_reg_autorizado = g.id_revisor ) END ),
 id_municipio

 from contribuyentedatos_v2 as v
join
estatusxfolio as g

on

v.folio = g. folio_dictamen

JOIN
inmuebles_v2 AS dp

on

g.cclave = dp.cve_catastral
join

dictaval_avaluos as i

on
dp.cve_catastral = i.cclave


join (SELECT id_domicilio as iddomiciliox , id_municipio FROM domicilio_v2 ) as dom on dp.id_domicilio=dom.iddomiciliox

WHERE dom.id_municipio ='$nombremun'


group by id_con,id_con,v.id_dictaminador,v.nombredenominacion,
v.apaterno,v.amaterno,v.aniodictamen,v.id_inmueble,v.fecha_registro,v.tipodictamen,v.folio,v.tipod,g.etapa,
g.id_revisor,
g.cclave,valor_catastral,id_domicilio,ava_cve_fol,folio_dictamun,i.ava_vc_terr,email,id_municipio;";*/
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);


}


public function dictamenes_emit($c){

session_start();
  $num_id = $_SESSION["idkey2"];


   $queryaa = "select j.idetallusu,i.estado_fk, nombremn2 from usuario_v2 as j join union_cp_select as i
 on j.idetallusu  = i.estado_fk where j.idetallusu = $num_id  and tipo_usuario = 6";

    $resultad = pg_query($queryaa) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rxcs = pg_query( $c, $queryaa );
    //$validate_exixts = pg_num_rows($rs);

      while( $obaj = pg_fetch_object($rxcs) ){
        $datacc[] = $obaj;
      }
      // Liberando el conjunto de resultados
      pg_free_result($resultad);

      $nombremun = $datacc[0]->nombremn2;

      $query = "select distinct c.folio, ('/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2, (CASE WHEN tipodictamen =1 THEN 'NORMAL'

WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'

WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'

END) as tipoditc, (select nombre_especialista from especialistas_vigentes_v2 where tipo_usuariofk = 2 and  no_reg_autorizado = c.id_dictaminador) as nomespecialista, nombredenominacion,
apaterno, amaterno, id_municipio, c.folio from contribuyentedatos_v2 as c
join inmuebles_v2 as i on c.folio = i.folio
join domicilio_v2 as d on i.id_domicilio = d.id_domicilio
join estatusxfolio as e on i.folio = e.folio_dictamen
where d.id_municipio ='$nombremun' and etapa=15;
";  //es etapa 15

/*
  $query = "
 select  obs_municipio,id_municipio as nommpio,(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =2 THEN 'DIP'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa=15 THEN 'DIP'
END) as etapa_folio_d,a.folio as folllio,( '/' ||  lpad(a.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
fecha_registro,
aniodictamen as anio_dictaminar,
norg,
email,nombredenominacion, (nombredenominacion || ' ' || apaterno || ' '
   || amaterno) AS nombre_c,
(CASE WHEN etapa =1 THEN 'REGISTRO DE DICTAMEN'
WHEN etapa =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR'
WHEN etapa =4 THEN 'ASIGNADO A REVISOR'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'RECHAZADO'
WHEN etapa=12 THEN 'RECHAZADO POR ADMINISTRADOR'
WHEN etapa=13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa=15 THEN 'VALIDADO'
END) as etapa_de_dict,
etapa,
(nombre ||' '|| ap_paterno ||' '|| ap_materno) as nombre_espec,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc, cve_cat from
(select *,b.nombre as nomb,b.ap_paterno as appt,b.ap_materno as apmt,b.rfc as rrfc,b.telefono as tel,b.no_reg_autorizado as norg from
contribuyentedatos_v2 as a
join
especialistas_vigentes_v2 as b
on
a.id_dictaminador = b.no_reg_autorizado ) as a
join
(
select * from aviso_dictamen_v2 as a
join
estatusxfolio as b
on a.id_aviso = b.folio_dictamen
) as b
on a.folio = b.id_aviso
join
inmuebles_v2 as cc
on a.folio = cc.folio
join
domicilio_v2 as nn
on cc.id_domicilio = nn.id_domicilio
 where nn.id_municipio ='".$nombremun."' and obs_municipio != 'N/A'";*/

  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);


}
public function dictamenes_liberty($c){

  session_start();
  $num_id = $_SESSION["idkey2"];

  $query = "create or replace view foliossiete as (
select distinct id_aviso,folio_dictamen,etapa from aviso_dictamen_v2 as a
join
estatusxfolio as b
on a.id_aviso = b.folio_dictamen where etapa=15 order by id_aviso);

select * from
(
select ( 'DIP' || '/' ||  lpad(a.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) as foliocompuesto , folio,(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,nombredenominacion,apaterno ,amaterno,nombre_especialista,aniodictamen from
contribuyentedatos_v2 as a
join
( select * from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as b
on
a.id_dictaminador = b.no_reg_autorizado ) as alfa
join (SELECT * FROM foliossiete) as beta
on
alfa.folio = beta.folio_dictamen

 order by folio asc;

 ";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);


}


public function dictamenes_xmun($c){

  session_start();
  $num_id = $_SESSION["idkey2"];
  $query = "create or replace view foliossiete as (
select distinct id_aviso,folio_dictamen,etapa from aviso_dictamen_v2 as a
join
estatusxfolio as b
on a.id_aviso = b.folio_dictamen where etapa=15 order by id_aviso);

select * from
(
select ( 'DIP' || '/' ||  lpad(a.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) as foliocompuesto , folio,(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,nombredenominacion,apaterno ,amaterno,nombre_especialista,aniodictamen from
contribuyentedatos_v2 as a
join
( select * from especialistas_vigentes_v2 where tipo_usuariofk = 2 ) as b
on
a.id_dictaminador = b.no_reg_autorizado ) as alfa
join (SELECT * FROM foliossiete) as beta
on
alfa.folio = beta.folio_dictamen

 order by folio asc;";
  $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs1 = pg_query( $c, $query );
  while( $obj1 = pg_fetch_object($rs1) ){
    $data2[] = $obj1;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result2);
  // Cerrando la conexion
  pg_close($c);

  header('Content-type: application/json');
  echo json_encode($data2);


}


//LISTA PARA LLENAR LA TABLA DEL PADRON DICTAMINADOR
public function listado_tabl_dictaminadores2($c){

  // Realizando una consulta SQL
  $query = "select no_reg_autorizado as id_tmp,no_reg_autorizado,nombre_especialista as ll,curp, rfc, nombre, ap_paterno, ap_materno,
correo,  telefono,(  nombre || ' ' || ap_paterno || ' ' || ap_materno || ' ' || no_reg_autorizado  ) as nombre_especialista,b.tipo_usuario
from
(select * FROM especialistas_vigentes_v2 WHERE tipo_usuariofk = 2)
as a join usuario_v2 as b on a.no_reg_autorizado = b.idetallusu where b.tipo_usuario = 2 order by nombre;";
  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs) ){

    $data[] = $obj;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result);
  // Cerrando la conexiÃ³n
  pg_close($c);
  //$obj = json_encode($data);
  //var_dump(json_encode($data));
  header('Content-type: application/json');
  print_r(json_encode($data));

}

public function reactivar ($c, $user, $contra){
   $query = "UPDATE usuario_v2 SET activo = 'FALSE' WHERE nombre_usuario = '$user' and pasword = '$contra'";
   pg_query($c, $query);
   pg_close($c);
   echo "ok";
}

public function buscaRegistro ($c, $folio, $dicta){

  $query = "SELECT * FROM contribuyentedatos_v2 as c join inmuebles_v2 as i on c.folio =i.folio join domicilio_v2 as d on i.id_inmueble = d.id_domicilio where c.folio = $folio;";
  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

  // Imprimiendo los resultados aarray
 $rs = pg_query( $c, $query );
  while( $obj = pg_fetch_object($rs) ){

    $data[] = $obj;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result);
  // Cerrando la conexiÃ³n
  pg_close($c);
  //$obj = json_encode($data);
  //var_dump(json_encode($data));
  header('Content-type: application/json');
  print_r(json_encode($data));
}

public function actualizarInmueble($c, $fol,$anio,$valoC,$clave,$pagoIm,$modificacion,$m3){
  $folio = $fol + 1;
  $folio2 = $folio.'1';
  echo $query = "UPDATE inmuebles_v2
   SET  cve_catastral='$clave', valor_catastral=$valoC, manifest_pago='$pagoIm', manifest_mejoras='$modificacion', aniodictaminar=$anio, manifest_claves='$m3' WHERE id_inmueble = $folio2 ";
        pg_query($c, $query);
///*********************ACTIVAR SI SE REQUIERE***************************////////////
        /*   $query2 = "UPDATE estatusxfolio SET cclave='$clave' WHERE folio_dictamen = $folio;";
        pg_query($c, $query2);*/
        // Cerrando la conexion
        pg_close($c);
}

public function actualizarDom($c, $fol,$calle2,$noEx2,$noI2,$colonia2,$referencia,$municipio,$cp){
  $folio = $fol + 1;
  $folio2 = $folio.'1';
  echo $query = "UPDATE domicilio_v2 SET calle='$calle2', no_exterior='$noEx2', no_interior='$noI2', colonia='$colonia2', referencia1='$referencia', codigo_p=$cp, id_municipio='$municipio' WHERE id_domicilio= $folio2;";
        pg_query($c, $query);
        // Cerrando la conexion
        pg_close($c);
}

public function validarCorreo($c,$email){
	$emialmm = strtolower($email);
  $query1 = "select correo from especialistas_vigentes_v2 where correo = '$emialmm'";
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
public function validarClaveCatatral($c){

    session_start();
  $num_id = $_SESSION["idkey2"];
  $tipoU = $_SESSION["tipoUsuario"];

  $query = "select folio,cve_catastral, id_inmueble, id_dictaminador as iidcontribuyente,aniodictaminar
from
aviso_dictamen_v2 as aa
 join
  inmuebles_v2 as  hh
 on
 aa.id_aviso = hh.folio where id_dictaminador =  $num_id
 group by folio,cve_catastral, id_inmueble, id_dictaminador ,aniodictaminar ";
  /*

select folio,cve_catastral, id_inmueble, id_dictaminador as iidcontribuyente,aniodictaminar
from
aviso_dictamen_v2 as aa
 join
  inmuebles_v2 as  hh
 on
 aa.id_aviso = hh.folio
   * */
  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray

  $rs = pg_query( $c, $query );

  $validate_exixts = pg_num_rows($rs);


  if( $validate_exixts == 0){


    $data[] = $miArray = array("cve_catastral"=>0, "aniodictaminar"=>0);
      // Liberando el conjunto de resultados
      pg_free_result($result);
      pg_close($c);


  }else{


    while( $obj = pg_fetch_object($rs) ){
      $data[] = $obj;
    }
    // Liberando el conjunto de resultados
    pg_free_result($result);
    pg_close($c);

  }

  //print_r($data);die();
  header('Content-type: application/json');
  print_r(json_encode($data));

}


public function guardarcomentariosBaldio($c,$claveCat,$IDD,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada){

        session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];

      if ($avaluofirmado == '') {
      $avaluofirmado="N/A";
      }

      if ($dictaval == '') {
      $dictaval="N/A";
      }

      if ($construcciones == '') {
      $construcciones="N/A";
      }

      if ($escriturap == '') {
      $escriturap="N/A";
      }

      if ($boletapredial == '') {
      $boletapredial="N/A";
      }

      if ($acreditapropied == '') {
      $acreditapropied="N/A";
      }

      if ($idenoficial == '') {
      $idenoficial="N/A";
      }

       if ($medidascolindanc == '') {
      $medidascolindanc="N/A";
      }

      if ($croquislocaliz == '') {
      $croquislocaliz="N/A";
      }

      if ($otros == '') {
      $otros="N/A";
      }

      if ($indivisoscondominios == '') {
      $indivisoscondominios="N/A";
      }

      if ($croquisconstruccion == '') {
      $croquisconstruccion="N/A";
      }

      if ($usoprivativo == '') {
      $usoprivativo="N/A";
      }

      if ($superficiesconstru == '') {
      $superficiesconstru="N/A";
      }

      if ($planosfactores == '') {
      $planosfactores="N/A";
      }

      if ($fachada == '') {
      $fachada="N/A";
      }


     $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12 and clavecastatral='$claveCat';";

    $rx = pg_query( $c, $sqlv );
    //if( pg_num_rows($rx) >= 9 ){
      if( pg_num_rows($rx) >= 7 ){
    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }


             for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $dictaval) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '11':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $construcciones) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '14':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $avaluofirmado) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '15':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $indivisoscondominios) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '99':
          $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $escriturap) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '98':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $boletapredial) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '97':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $idenoficial) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '96':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $medidascolindanc) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '95':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquislocaliz) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '94':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $otros) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '78':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $acreditapropied) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '77':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquisconstruccion) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '76':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $usoprivativo) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '75':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $superficiesconstru) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '74':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $planosfactores) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '120':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $fachada) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;

      default:

        break;
    }

    }



      $sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD  and cclave='$claveCat';";
      /*$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD  and cclave='$claveCat';";*/
      /*$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD and id_dictaminador=$id_dictaminadorr and cclave='$claveCat';";*/
      pg_query($c, $sqL);

       $sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
      pg_query($c, $sqLB);

      echo"50";
    // Cerrando la conexiÃƒÂ³n
    pg_close($c);

    }else {
      echo "000";
    }





}


public function guardarcomentariosBaldioM($c,$claveCat,$IDD,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM){

        session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];

      if ($avaluofirmadoM == '') {
      $avaluofirmadoM="N/A";
      }

      if ($dictavalM == '') {
      $dictavalM="N/A";
      }

      if ($construccionesM == '') {
      $construccionesM="N/A";
      }

      if ($actaempresa == '') {
      $actaempresa="N/A";
      }

      if ($nombramientolegal == '') {
      $nombramientolegal="N/A";
      }

      if ($boleta == '') {
      $boleta="N/A";
      }

      if ($acreditapropiedadM == '') {
      $acreditapropiedadM="N/A";
      }

       if ($idenoficialM == '') {
      $idenoficialM="N/A";
      }

      if ($medidascolindancM == '') {
      $medidascolindancM="N/A";
      }

      if ($croquislocalizM == '') {
      $croquislocalizM="N/A";
      }

      if ($otrosM == '') {
      $otrosM="N/A";
      }

      if ($indivisoscondominiosM == '') {
      $indivisoscondominiosM="N/A";
      }

      if ($croquisconstruccionM == '') {
      $croquisconstruccionM="N/A";
      }

      if ($usoprivativoM == '') {
      $usoprivativoM="N/A";
      }

      if ($superficiesconstruM == '') {
      $superficiesconstruM="N/A";
      }

      if ($planosfactoresM == '') {
      $planosfactoresM="N/A";
      }

       if ($fachadaM == '') {
      $fachadaM="N/A";
      }


     $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12;";
    $rx = pg_query( $c, $sqlv );
    //if( pg_num_rows($rx) >= 9 ){
      if( pg_num_rows($rx) >= 7 ){
    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }


             for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $dictavalM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '11':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $construccionesM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '14':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $avaluofirmadoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '15':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $indivisoscondominiosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '90':
          $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $actaempresa) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '89':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $nombramientolegal) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '88':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $boleta) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '87':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $idenoficialM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '86': //planos
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $medidascolindancM)  ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '85': //croquis
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquislocalizM)."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '84':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otrosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '83':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $acreditapropiedadM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '82':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquisconstruccionM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '81':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $usoprivativoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '80':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $superficiesconstruM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '79':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $planosfactoresM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;

        case '120':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $fachadaM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;


      default:

        break;
    }

    }


      $sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD  and cclave='$claveCat';";
            /*$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD and id_dictaminador=$id_dictaminadorr and cclave='$claveCat';";*/
      pg_query($c, $sqL);

       $sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
      pg_query($c, $sqLB);

      echo"50";
    // Cerrando la conexiÃƒÂ³n
    pg_close($c);

    }else {
      echo "000";
    }





}


public function guardarcomentariosBaldioCambios($c,$claveCat,$IDD,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada){

        session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];

      if ($avaluofirmado == '') {
      $avaluofirmado="N/A";
      }

      if ($dictaval == '') {
      $dictaval="N/A";
      }

      if ($construcciones == '') {
      $construcciones="N/A";
      }

      if ($escriturap == '') {
      $escriturap="N/A";
      }

      if ($boletapredial == '') {
      $boletapredial="N/A";
      }

      if ($acreditapropied == '') {
      $acreditapropied="N/A";
      }

      if ($idenoficial == '') {
      $idenoficial="N/A";
      }

       if ($medidascolindanc == '') {
      $medidascolindanc="N/A";
      }

      if ($croquislocaliz == '') {
      $croquislocaliz="N/A";
      }

      if ($otros == '') {
      $otros="N/A";
      }

      if ($indivisoscondominios == '') {
      $indivisoscondominios="N/A";
      }

      if ($croquisconstruccion == '') {
      $croquisconstruccion="N/A";
      }

      if ($usoprivativo == '') {
      $usoprivativo="N/A";
      }

      if ($superficiesconstru == '') {
      $superficiesconstru="N/A";
      }

      if ($planosfactores == '') {
      $planosfactores="N/A";
      }

      if ($fachada == '') {
      $fachada="N/A";
      }


     $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12 and clavecastatral='$claveCat';";
    $rx = pg_query( $c, $sqlv );
    //if( pg_num_rows($rx) >= 9 ){
      if( pg_num_rows($rx) >= 7 ){
    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }

    }

     for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $dictaval) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '11':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $construcciones) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '14':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $avaluofirmado) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '15':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $indivisoscondominios) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '99':
          $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $escriturap) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '98':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $boletapredial) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '97':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $idenoficial) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '96':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $medidascolindanc) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '95':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquislocaliz) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '94':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otros) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '78':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $acreditapropied) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '77':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquisconstruccion) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '76':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $usoprivativo) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '75':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $superficiesconstru) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '74':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $planosfactores) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '120':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $fachada) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;


      default:

        break;
    }

    }


      $sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $IDD  and cclave='$claveCat';";
      /*$sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $IDD and id_dictaminador=$id_dictaminadorr and cclave='$claveCat';";*/
      pg_query($c, $sqL);

       $sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
      pg_query($c, $sqLB);

      echo"50";
    // Cerrando la conexiÃƒÂ³n
    pg_close($c);



}
public function guardarcomentariosBaldioCambiosM($c,$claveCat,$IDD,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM){

   session_start();
        $id_dictaminadorr=$_SESSION["idkey2"];

      if ($avaluofirmadoM == '') {
      $avaluofirmadoM="N/A";
      }

      if ($dictavalM == '') {
      $dictavalM="N/A";
      }

      if ($construccionesM == '') {
      $construccionesM="N/A";
      }

      if ($actaempresa == '') {
      $actaempresa="N/A";
      }

      if ($nombramientolegal == '') {
      $nombramientolegal="N/A";
      }

      if ($boleta == '') {
      $boleta="N/A";
      }

      if ($acreditapropiedadM == '') {
      $acreditapropiedadM="N/A";
      }

       if ($idenoficialM == '') {
      $idenoficialM="N/A";
      }

      if ($medidascolindancM == '') {
      $medidascolindancM="N/A";
      }

      if ($croquislocalizM == '') {
      $croquislocalizM="N/A";
      }

      if ($otrosM == '') {
      $otrosM="N/A";
      }

      if ($indivisoscondominiosM == '') {
      $indivisoscondominiosM="N/A";
      }

      if ($croquisconstruccionM == '') {
      $croquisconstruccionM="N/A";
      }

      if ($usoprivativoM == '') {
      $usoprivativoM="N/A";
      }

      if ($superficiesconstruM == '') {
      $superficiesconstruM="N/A";
      }

      if ($planosfactoresM == '') {
      $planosfactoresM="N/A";
      }

       if ($fachadaM == '') {
      $fachadaM="N/A";
      }

      $sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12 and clavecastatral='$claveCat';";
    $rx = pg_query( $c, $sqlv );

      if( pg_num_rows($rx) >= 7 ){
    while( $obj = pg_fetch_object($rx) ){
   $data[] = $obj;
            }

               for ($i=0; $i < pg_num_rows($rx); $i++) {
          $orden = $data[$i]->orden;

     switch ($orden) {
      case '10':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $dictavalM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '11':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $construccionesM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '14':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $avaluofirmadoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '15':
        $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $indivisoscondominiosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '90':
          $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $actaempresa) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
      case '89':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $nombramientolegal) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '88':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $boleta) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '87':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $idenoficialM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

         break;
         case '86': //planos
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $medidascolindancM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '85': //croquis
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquislocalizM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '84':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otrosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '83':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $acreditapropiedadM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '82':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquisconstruccionM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '81':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $usoprivativoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
        case '80':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $superficiesconstruM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;
         case '79':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $planosfactoresM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;

        case '120':
         $sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $fachadaM)."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveCat';";
        pg_query($c, $sqLPS);

        break;


      default:

        break;
    }

    }

     $sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $IDD  and cclave='$claveCat';";
     /*$sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $IDD and id_dictaminador=$id_dictaminadorr and cclave='$claveCat';";*/
      pg_query($c, $sqL);

       $sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
      pg_query($c, $sqLB);

      echo"50";
    // Cerrando la conexiÃƒÂ³n
    pg_close($c);


          }else{
              echo "000";

          }

}

 public function noRegistro($c,$tipo,$numeroR){

     /////////////////////////////////////////////////// validamos la version del dictaval
$queryRegistro="select * from usuario_v2 as u
join especialistas_vigentes_v2 as e
on u.idetallusu = e.no_reg_autorizado where u.idetallusu = $numeroR and u.tipo_usuario=$tipo;";
$resultRegistro = pg_query($queryRegistro) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rsver = pg_query( $c, $queryRegistro );
 $validate = pg_num_rows($rsver);


 if ($validate == 0 || $validate == null) {
   echo "s";
 }else{

while( $objversion = pg_fetch_object($rsver) ){
 // $noReg = $objversion->idetallusu;
   $data[] = $objversion;
}

 echo json_encode($data);


 }



  }

  public function new_userSinRegistro($c,$opcz,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$reg){


// SE AUTOMARIZA EL USUARIO Y CONTRASEÑA
$f=$x1;
$g=$x4;
$H = $x5;
$cel =$x7;

$rest1 = substr($f, 2);
$rest2 = substr($g, 4,8);
$rest3 = substr($H, 1,3);
$rest4 = substr($cel, -4,4);
$rest5 = substr($cel, -1,4);
$pwd = $rest1.$rest4;


    // nuevo dictaminador y revisor

    $NombrUs="2020".$rest1;
    $sqlNewUs ="INSERT INTO usuario_v2(
            nombre_usuario, pasword, tipo_usuario, activo, idetallusu, caducidad)
    VALUES ('$NombrUs','$pwd$reg',$opcz , 'false', $reg, 100);";

   $SQLiUSER = "INSERT INTO especialistas_vigentes_v2(
            num_registro, nombre_especialista, no_reg_autorizado, curp, rfc,

            nombre, ap_paterno, ap_materno, correo, telefono, tipo_usuariofk)

    VALUES ($reg, '". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x1) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x2) ."
     ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x3) ."' , $reg, '". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x4) ."','". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x5) ."',
            '". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x1) ."','". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x2) ."',
            '". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x3) ."', '". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x6) ."',
             '". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x7) ."', $opcz);";
  //die();
  pg_query($c, $sqlNewUs);
  pg_query($c, $SQLiUSER);

  //echo"10";


   $Sqlk2 = "select nombre_usuario,pasword from usuario_v2 where  idetallusu =".$reg;
      $rs3 = pg_query( $c, $Sqlk2 );

      $validate_exixts = pg_num_rows($rs3);
      if( $validate_exixts != 0){
          while( $obj1ab = pg_fetch_object($rs3) ){
              $valx = $obj1ab->pasword;
          }
}else{
  $valx = "COMUNICATE CON EL ADMINISTRADOR";
}

// Cerrando la conexiÃ³n
  pg_close($c);
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
  $mail->addAddress($x6, 'destinatario');//Modificar a $emailDic
  $mail->Subject = 'Entrega de credenciales para el acceso al Sistema DICTAMUN IGECEM';
  $mail->AddEmbeddedImage('../_img/encabezadoDoc.png', 'banner2');
  $mail->Body = '<img src="cid:banner2" height="90%" width="50%"/><br><br><b>DIRECCION DE CATASTRO</b><br>Estimado (a): '.' '.utf8_decode($x1).' '.utf8_decode($x2).' '.utf8_decode($x3).'.<br> '.'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso.<br><br><b>Usuario: '.$NombrUs.'<br>'.utf8_decode('Contraseña:').$valx.'</b><br><br> Sin mas por el momento reciba cordiales saludos.';
  $mail->IsHTML(true);

  if($mail->send()){
    echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso:<br><br><b>Usuario: '.$NombrUs.'<br> Contrasenia: '.$valx.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';

    } else {
    echo 'Error';
  }
  //echo $mail->send();

}

public function actualizarRegistroExistente($c,$opcz,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$reg,$tipoRegAnterior){

// SE AUTOMARIZA EL USUARIO Y CONTRASEÑA
$f=$x1;
$g=$x4;
$H = $x5;
$cel =$x7;

$rest1 = substr($f, 2);
$rest3 = substr($H, 1,3);
$rest4 = substr($cel, -4,4);
$rest5 = substr($cel, -1,4);
$pwd = $rest1.$rest4;


    // nuevo dictaminador y revisor

    $NombrUs="2020".$rest1;

     $Sqlk2REG = "SELECT * FROM usuario_v2 as u join especialistas_vigentes_v2 as e on u.idetallusu=e.no_reg_autorizado where idetallusu=$reg and tipo_usuario=$tipoRegAnterior;";
      $rs3REG = pg_query( $c, $Sqlk2REG );

      $validate_exixtsREG = pg_num_rows($rs3REG);
      if( $validate_exixtsREG != 0){
          while( $obj1abREG = pg_fetch_object($rs3REG) ){
              $IDREG = $obj1abREG->tipo_usuariofk;
          }
}else{
  $IDREG = "00";
}


   $SQLiUSER ="UPDATE especialistas_vigentes_v2 SET nombre_especialista='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x1) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x2) ." ". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x3) ."',
    curp='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x4) ."',
    rfc='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x5) ."',
    nombre='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x1) ."',
    ap_paterno='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x2) ."',
    ap_materno='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $x3) ."', correo='$x6', telefono='$x7' WHERE no_reg_autorizado = $reg and tipo_usuariofk='$IDREG';";
   pg_query($c, $SQLiUSER);

   $sqlNewUs ="UPDATE usuario_v2 SET nombre_usuario = '$NombrUs', pasword = '$pwd$reg', tipo_usuario='$opcz' FROM especialistas_vigentes_v2 WHERE usuario_v2.idetallusu = especialistas_vigentes_v2.no_reg_autorizado and idetallusu=$reg and tipo_usuario=$tipoRegAnterior;";
    pg_query($c, $sqlNewUs);


   /*UPDATE especialistas_vigentes_v2 SET nombre_especialista ='$x1 $x2 $x3', curp='$x4', rfc='$x5', nombre='$x1', ap_paterno='$x2', ap_materno='$x3', correo='$x6', telefono='$x7' FROM usuario_v2 WHERE especialistas_vigentes_v2.no_reg_autorizado = usuario_v2.idetallusu and idetallusu=$reg and tipo_usuario=$tipoRegAnterior;*/



  //echo"10";


   $Sqlk2 = "select nombre_usuario,pasword from usuario_v2 where  idetallusu =".$reg;
      $rs3 = pg_query( $c, $Sqlk2 );

      $validate_exixts = pg_num_rows($rs3);
      if( $validate_exixts != 0){
          while( $obj1ab = pg_fetch_object($rs3) ){
              $valx = $obj1ab->pasword;
          }
}else{
  $valx = "COMUNICATE CON EL ADMINISTRADOR";
}

// Cerrando la conexiÃ³n
  pg_close($c);
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
  $mail->addAddress($x6, 'destinatario');//Modificar a $emailDic
  $mail->Subject = 'Entrega de credenciales para el acceso al Sistema DICTAMUN IGECEM';
  $mail->AddEmbeddedImage('../_img/encabezadoDoc.png', 'banner2');
  $mail->Body = '<img src="cid:banner2" height="90%" width="50%"/><br><br><b>DIRECCION DE CATASTRO</b><br>Estimado (a): '.' '.utf8_decode($x1).' '.utf8_decode($x2).' '.utf8_decode($x3).'.<br> '.'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso.<br><br><b>Usuario: '.$NombrUs.'<br>'.utf8_decode('Contraseña:').$valx.'</b><br><br> Sin mas por el momento reciba cordiales saludos.';
  $mail->IsHTML(true);

  if($mail->send()){
    echo 'Le proporcionamos los datos de acceso al Sitema DICTAMUN IGECEM para que pueda continuar con su proceso:<br><br><b>Usuario: '.$NombrUs.'<br> Contrasenia: '.$valx.'</b><br><br>De igual manera se ha enviado por correo electrónico está información.<br><br>';

    } else {
    echo 'Error';
  }
  //echo $mail->send();


}



// vista para dictaminador
public function seguimiento_x_inmueble($c,$folio){

  session_start();
  $num_id = $_SESSION["idkey2"];
  $tipoU = $_SESSION["tipoUsuario"];


  if ($tipoU == 2) { ///para busqueda de dictamenens del dictaminador

      $query = "select (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen, * from
( select folio, nombre_especialista,b.no_reg_autorizado as norg,id_inmueble from contribuyentedatos_v2 as a join especialistas_vigentes_v2 as b on a.id_dictaminador = b.no_reg_autorizado where b.no_reg_autorizado =$num_id and folio = $folio) as p
  join
(select h.folio,id_inmueble,cve_catastral, aniodictaminar,id_municipio  from inmuebles_v2 AS h join domicilio_v2 as f on h.id_domicilio = f.id_domicilio where h.folio = $folio)
  as k
  join
  estatusxfolio as ee on k.cve_catastral = ee.cclave
  on p.folio = k.folio where k.folio = $folio";

  }else if ($tipoU == 1) {   ///para busqueda de dictamenes del contribuyente

     $query = "select (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen, * from
( select *, e.no_reg_autorizado as norg from contribuyentedatos_v2 as a
join aviso_dictamen_v2 as b on a.folio = b.id_aviso join especialistas_vigentes_v2 as e on a.id_dictaminador = e.no_reg_autorizado where b.id_dictaminador =$num_id and id_aviso = $folio) as p
  join
(select h.folio,id_inmueble,cve_catastral, aniodictaminar,id_municipio  from inmuebles_v2 AS h join domicilio_v2 as f on h.id_domicilio = f.id_domicilio where h.folio = $folio)
  as k
   join estatusxfolio as ee on k.cve_catastral = ee.cclave
  on p.folio = k.folio where k.folio = $folio
";

  }else if ($tipoU == 3) {
    $query="select (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen, * from
( select *, e.no_reg_autorizado as norg from contribuyentedatos_v2 as a
join aviso_dictamen_v2 as b on a.folio = b.id_aviso join especialistas_vigentes_v2 as e on a.id_dictaminador = e.no_reg_autorizado where  id_aviso = $folio) as p
  join
(select h.folio,id_inmueble,cve_catastral, aniodictaminar,id_municipio  from inmuebles_v2 AS h join domicilio_v2 as f on h.id_domicilio = f.id_domicilio where h.folio = $folio)
  as k
   join estatusxfolio as ee on k.cve_catastral = ee.cclave
  on p.folio = k.folio where k.folio = $folio and id_revisor = $num_id; ";
  }




  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs = pg_query( $c, $query );
  $validate_exixts = pg_num_rows($rs);
  if( $validate_exixts >= "1" ){
    $result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    // Imprimiendo los resultados aarray
    $rs1 = pg_query( $c, $query );
    while( $obj1 = pg_fetch_object($rs1) ){
      $data2[] = $obj1;
      //$data2[] = array('folioconstruido' => str_pad($data2[0]->folio, 4, "00", STR_PAD_LEFT));

    }
    // Liberando el conjunto de resultados
    pg_free_result($result2);
    // Cerrando la conexion
    pg_close($c);

    header('Content-type: application/json');
    echo json_encode($data2);

  }else{
    // Cerrando la conexiÃ³n
    pg_close($c);
    echo "0000";

  }

}


public function inmuebles_list($c){
	session_start();
	$id_dictaminadorr=$_SESSION["idkey2"];

	$query123="
     select * from
    (select * from aviso_dictamen_v2tmp where fk_numreg = $id_dictaminadorr ) as tabla1
    join
    (select * from estatusxfoliotmp where fk_numreg = $id_dictaminadorr) as tabla2
    on
    tabla1.cve_cat = tabla2.cclave

    join
    (select *,CAST ( (fk_numreg || '' || id  )  AS INTEGER) as rel from inmuebles_v2tmp where fk_numreg = $id_dictaminadorr) as tabla3
    on
    tabla1.cve_cat  = tabla3.cve_catastral
    join
    (select *,CAST ( (fk_numreg || '' || id  )  AS INTEGER) as re2 from domicilio_v2tmp where fk_numreg = $id_dictaminadorr) as tabla4
    on
    tabla3.rel = tabla4.re2
    where
    tabla1.id_dictaminador = $id_dictaminadorr
    ";

	$rrrrrrrrr = pg_query( $c, $query123 );
	$validate_exixtsdatas = pg_num_rows($rrrrrrrrr);
	if( $validate_exixtsdatas >= 1 ){
		while( $objxx = pg_fetch_object($rrrrrrrrr) ){
			$dataw[] = $objxx;
		}

		// Liberando el conjunto de resultados
		pg_free_result($rrrrrrrrr);
		// Cerrando la conexion
		pg_close($c);
		//print_r($data2);
		// die();

		header('Content-type: application/json');
		echo json_encode($dataw);
	}else{

		// Liberando el conjunto de resultados
		pg_free_result($rrrrrrrrr);
		// Cerrando la conexion
		pg_close($c);


		//header('Content-type: application/json');
		echo "10";
	}



}

public function inmuebles_readred($c,$val){
	session_start();
	$id_dictaminadorr=$_SESSION["idkey2"];
	//123456789
	$query123="
    select * from
    (select * from aviso_dictamen_v2tmp where fk_numreg = $id_dictaminadorr ) as tabla1
    join
    (select * from estatusxfoliotmp where fk_numreg = $id_dictaminadorr) as tabla2
    on
    tabla1.cve_cat = tabla2.cclave

    join
    (select *,CAST ( (fk_numreg || '' || id  )  AS INTEGER) as rel from inmuebles_v2tmp where fk_numreg = $id_dictaminadorr) as tabla3
    on
    tabla1.cve_cat  = tabla3.cve_catastral
    join
    (select *,CAST ( (fk_numreg || '' || id  )  AS INTEGER) as re2 from domicilio_v2tmp where fk_numreg = $id_dictaminadorr) as tabla4
    on
    tabla3.rel = tabla4.re2
    where
	tabla1.id_dictaminador = $id_dictaminadorr and tabla4.id=".$val;



	$rrrrrrrrr = pg_query( $c, $query123 );
	$validate_exixtsdatas = pg_num_rows($rrrrrrrrr);
	if( $validate_exixtsdatas >= 1 ){
	while( $objxx = pg_fetch_object($rrrrrrrrr) ){
		$dataw[] = $objxx;
	}

	// Liberando el conjunto de resultados
	pg_free_result($rrrrrrrrr);
	// Cerrando la conexion
	pg_close($c);
	//print_r($data2);
	// die();

	header('Content-type: application/json');
	echo json_encode($dataw);
	}else{
		// Liberando el conjunto de resultados
		pg_free_result($rrrrrrrrr);
		// Cerrando la conexion
		pg_close($c);


		//header('Content-type: application/json');
		echo "10";
	}

}

public function tbl_seg_dict2($c){


	session_start();
	$num_id = $_SESSION["idkey2"];

	$query ="select DISTINCT sf.folio_dictamen , ('AD/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse
	, folio,fecha_registro, aniodictamen, c.rfc, nombredenominacion, e.no_reg_autorizado, nombre_especialista  from contribuyentedatos_v2 as c join aviso_dictamen_v2 as a on c.folio =a.id_aviso
	join especialistas_vigentes_v2 as e on c.id_dictaminador = e.no_reg_autorizado join estatusxfolio as sf on c.folio= sf.folio_dictamen
	where a.id_dictaminador=$num_id and e.tipo_usuariofk =2 and sf.etapa=1;";//hh.etapa = 1

	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	$validate_exixts = pg_num_rows($rs1);//tbl_seg_dict

	if ($validate_exixts >= 1) {
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}

		//print_r($data2);
		// Liberando el conjunto de resultados
		pg_free_result($result2);

		//echo "hola4";die();
		header('Content-type: application/json');
		echo json_encode($data2);
	}else{
		echo "000";
	}
	//die();


	// Cerrando la conexion
	pg_close($c);
	}


public function tbl_dictamenes_validados2($c){

		session_start();$contribuy_revisando = $_SESSION["idkey2"];
		//echo "hola5";die();
		$query ="
		select DISTINCT sf.folio_dictamen , ('DIP/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse
		, folio,fecha_registro, aniodictamen, c.rfc, nombredenominacion, e.no_reg_autorizado, nombre_especialista,

		lpad(c.folio::text, 5, '0') as fl, apaterno, amaterno

		from contribuyentedatos_v2 as c join aviso_dictamen_v2 as a on c.folio =a.id_aviso
		join especialistas_vigentes_v2 as e on c.id_dictaminador = e.no_reg_autorizado join estatusxfolio as sf on c.folio= sf.folio_dictamen
		where a.id_dictaminador=$contribuy_revisando and e.tipo_usuariofk =2 and sf.etapa =15;";

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		$validate_exixts = pg_num_rows($rs1);
		if ($validate_exixts >= 1) {
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			$query2="rollback;";
			$rs1 = pg_query( $c, $query );
			//pg_close($c);
			header('Content-type: application/json');
			echo json_encode($data2);

		}else{
			echo "000";

		}



	}

public function tbl_process_dict2($c){

		session_start();$contribuy_revisando = $_SESSION["idkey2"];
		//echo "hola5";die();
		$query="
		select DISTINCT sf.folio_dictamen , ('AD/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse
		, folio,fecha_registro, aniodictamen, c.rfc, nombredenominacion, e.no_reg_autorizado, nombre_especialista  from contribuyentedatos_v2 as c join aviso_dictamen_v2 as a on c.folio =a.id_aviso
		join especialistas_vigentes_v2 as e on c.id_dictaminador = e.no_reg_autorizado join estatusxfolio as sf on c.folio= sf.folio_dictamen
		where a.id_dictaminador=$contribuy_revisando and e.tipo_usuariofk =2 and sf.etapa !=1 and sf.etapa !=15";

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		$validate_exixts = pg_num_rows($rs1);
		if ($validate_exixts >= 1) {
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			$query2="rollback;";
			$rs1 = pg_query( $c, $query );


			header('Content-type: application/json');
			echo json_encode($data2);

		}else{
			echo "000";

		}

		pg_close($c);
	}


public function tablaInmuebles($c,$folio,$tip){
		session_start();
		$dictaminador = $_SESSION["idkey2"];

		$folio2 = explode("/", $folio);
		$folio3 = $folio2[1];
		$anioDicta = $folio2[2];

		if ($tip == 1) { //en proceso
			$query="select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join estatusxfolio as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where et.folio_dictamen=$folio3 and i.folio=$folio3 and c.aniodictamen=$anioDicta
			and et.etapa !=15 and et.etapa !=1;";


		}else if ($tip == 2) { //validados

			$query="select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join estatusxfolio as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where et.folio_dictamen=$folio3 and i.folio=$folio3 and c.aniodictamen=$anioDicta
			and et.etapa=15;";

		}else if ($tip == 3) { //registrado

			$query="select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join estatusxfolio as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where et.folio_dictamen=$folio3 and i.folio=$folio3 and c.aniodictamen=$anioDicta
			and et.etapa=1;";


		}



		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}

		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);



	}


public function tablaInmuebles_municipios($c,$folio,$tipo){
		session_start();
		$municipio = $_SESSION["usuarioactual"];

		$municipio2 = strtolower($municipio);
		$municipio3 = ucfirst($municipio2);

		$folio2 = explode("/", $folio);
		$folio3 = $folio2[1];

		if ($tipo == 1) {

			$query = "
select (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE
WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen, * from contribuyentedatos_v2 as c
		join inmuebles_v2 as i
		on c.folio = i.folio
		join (select * from estatusxfolio where folio_dictamen = $folio3) as e
		on i.cve_catastral = e.cclave
		join (select * from domicilio_v2 where id_municipio = '$municipio3') as domi
		on i.id_domicilio=domi.id_domicilio
		where i.folio=$folio3 and etapa != 15;";

		}else if ($tipo == 2) {

			$query = "
select (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,
(CASE
WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapadictamen, * from contribuyentedatos_v2 as c
		join inmuebles_v2 as i
		on c.folio = i.folio
		join (select * from estatusxfolio where folio_dictamen = $folio3) as e
		on i.cve_catastral = e.cclave
		join (select * from domicilio_v2 where id_municipio = '$municipio3') as domi
		on i.id_domicilio=domi.id_domicilio
		where i.folio=$folio3 and etapa=15;";


		}


		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}

		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);



	}


public function tablaInmueblesP($c,$folio,$tipo){
	//echo "hola";DIE();
		session_start();
		$dictaminador = $_SESSION["idkey2"];
		//die();
		//////**********//////////////
		//$dictaminador = 201;
		///////////////////*****///////////////
		$folio2 = explode("/", $folio);
		$folio3 = $folio2[1];

		if ($tipo == 1) {  //Registrados
			$query = "select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join ( select * from estatusxfolio where folio_dictamen = $folio3 and etapa=1 or etapa=2 ) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa=1 or et.etapa=2
			";

		}else if ($tipo == 2) { //en proceso

			$query = "select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa != 1 and etapa != 2 and etapa != 5 and etapa != 6 and etapa !=11
			and etapa !=12 and etapa !=13 and etapa !=15) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa != 1 and et.etapa != 2 and et.etapa != 5 and et.etapa != 6 and et.etapa !=11
			and et.etapa !=12 and et.etapa !=13 and et.etapa !=15;";
		}else if ($tipo == 3) { //validados

			$query = "select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa=15 ) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa=15;
			";
		}else if ($tipo == 4) { //cancelados o obser

			$query = "select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa =11
			 or etapa =13) as et
			on c.folio = et.folio_dictamen
			join (SELECT * FROM inmuebles_v2 WHERE folio=$folio3) as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and etapa =11
			or etapa =12 or etapa =13;";
		}else if ($tipo == 53) { //cancelados

				$query = "select
				(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
				END) as etapadictamen, *
				from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa=53 ) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa=53;
			";
			}else if ($tipo == 5) { //En revicion por igecem

			$query = "select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa=4 or etapa=12 or etapa=13) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on c.id_inmueble=i.id_inmueble
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa=4 or et.etapa=12 or et.etapa=13;
			";
		}else if ($tipo == 6) { //pre autorizados con archivo en hojas verdes

			$query = "select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa = 51 ) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa = 51;";
		}else if ($tipo == 7) { // pre autorizados para subir archivos 5 o 51

			$query = "

			select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3 and etapa = 5 ) as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			where i.id_aviso=$folio3 and c.id_dictaminador=$dictaminador
			and et.etapa = 5;";
		}


		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}

		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

public function seguimiento_dictaminadorAll($c,$cla){

		session_start();
		$num_id = $_SESSION["idkey2"];


		if ($cla == 1) {
			$query = "select distinct (lpad(co.folio::text, 5, '0')) as folio, co.aniodictamen, co.id_dictaminador as dictaminador, co.fecha_registro as fechr,
			('AD/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse,co.tipod as tipodepers, co.folio as fff
			from contribuyentedatos_v2
			as co join estatusxfolio as es
			on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id and es.etapa = 1 or es.etapa=2 order by fff asc;";

		}else if ($cla == 2) {
			$query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr

			 from (select distinct folio, id_dictaminador, aniodictamen, fecha_registro from contribuyentedatos_v2 where id_dictaminador = $num_id)
			as co join
			( select distinct folio_dictamen from estatusxfolio where etapa = 3 and id_dictaminador = $num_id
union
select distinct folio_dictamen from estatusxfolio where etapa = 4 and id_dictaminador = $num_id
union
select distinct folio_dictamen from estatusxfolio where etapa = 7 and id_dictaminador = $num_id
union
select distinct folio_dictamen from estatusxfolio where etapa = 51 and id_dictaminador = $num_id
union
select distinct folio_dictamen from estatusxfolio where etapa = 52 and id_dictaminador = $num_id )
			as es on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id
			group by co.folio,co.id_dictaminador, co.aniodictamen, co.fecha_registro";
			/*$query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
			(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
			END) as etapa_folio_d,
			(CASE
			WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen
			 from contribuyentedatos_v2
			as co join
			( select * from estatusxfolio where id_dictaminador = $num_id )
			as es on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id and es.etapa = 3 or es.etapa = 4 or es.etapa = 7 or es.etapa=51 or es.etapa=52
			group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave;";*/

			//where co.id_dictaminador = $num_id and es.etapa = 3 or es.etapa=11 and date(fecha_registro) between '$fechainicio' and '$fechafin'

		}else if ($cla == 3) {

			$query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr, co.tipod as tipodepers

		    from contribuyentedatos_v2
			as co join
			( select * from estatusxfolio where id_dictaminador = $num_id )
			as es on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id and es.etapa = 15
			group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave, co.tipod;";

		}else if ($cla == 4) {

			$query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
			(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
			END) as etapa_folio_d,
			(CASE
			WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen,
			 co.tipod as tipodepers from contribuyentedatos_v2
			as co join
			( select * from estatusxfolio where id_dictaminador = $num_id )
			as es on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id and es.etapa = 11 or es.etapa = 13
			group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave, co.tipod  ;";

		}else if ($cla == 53) {

			$query="select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse,
		co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr, co.tipod as tipodepers from contribuyentedatos_v2
			as co join
			( select * from estatusxfolio where id_dictaminador = $num_id )
			as es on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id and es.etapa = 53
			group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave, co.tipod;";

			/*$query = "select distinct co.folio ,('/' ||  lpad(co.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse, es.etapa, co.id_dictaminador as dictaminador, co.aniodictamen as aniodictamen, co.fecha_registro as fechr,
			(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
			END) as etapa_folio_d,
			(CASE
			WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen,
			es.cclave, co.tipod as tipodepers from contribuyentedatos_v2
			as co join
			( select * from estatusxfolio where id_dictaminador = $num_id )
			as es on co.folio = es.folio_dictamen
			where co.id_dictaminador = $num_id and  es.etapa = 53
			group by co.folio, es.etapa, co.id_dictaminador, co.aniodictamen, co.fecha_registro, es.cclave, co.tipod  ;";*/

		}





		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs = pg_query( $c, $query );
		$validate_exixts = pg_num_rows($rs);
		if( $validate_exixts >= "1" ){
			$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rs1 = pg_query( $c, $query );
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
				//$data2[] = array('folioconstruido' => str_pad($data2[0]->folio, 4, "00", STR_PAD_LEFT));

			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion
			pg_close($c);

			header('Content-type: application/json');
			echo json_encode($data2);

		}else{
			// Cerrando la conexi?
			pg_close($c);
			echo "000";

		}
	}


public function dictamenes_preautorizados($c){


		//////****     AGREGAR EL ID DEL DICTAMINADOR   *******///////
		session_start();
		$dictaminador = $_SESSION["idkey2"];
		/*
		select distinct c.folio , c.id_dictaminador, e.id_revisor, h.anio, c.nombredenominacion, c.fecha_registro,
		('/' ||  lpad(c.folio::text, 5, '0') || '/' || anio   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse,
		nombre_especialista, c.apaterno, c.amaterno
		from (select * from especialistas_vigentes_v2 where tipo_usuariofk=2 and no_reg_autorizado=$dictaminador) as es
		join contribuyentedatos_v2 as c
		on es.no_reg_autorizado = c.id_dictaminador
		join hojasverdes as h
		on c.folio = h.folio
		join estatusxfolio as e
		on h.clavecc = e.cclave
		where etapa=5  and c.id_dictaminador=$dictaminador ;

		*/

		$query = "select distinct c.folio , c.id_dictaminador, e.id_revisor, c.aniodictamen as anio, c.nombredenominacion, c.fecha_registro,
		('/' ||  lpad(c.folio::text, 5, '0') || '/' ||  c.aniodictamen || '/' || to_char(fecha_registro, 'YYYY')) AS acuse,
		nombre_especialista, c.apaterno, c.amaterno
		from (select * from especialistas_vigentes_v2 where tipo_usuariofk=2 and no_reg_autorizado=$dictaminador) as es
		join contribuyentedatos_v2 as c
		on es.no_reg_autorizado = c.id_dictaminador
		join (select * from estatusxfolio where id_dictaminador = $dictaminador) as e
		on c.folio = e.folio_dictamen
		where etapa=5  and c.id_dictaminador=$dictaminador ";
		//where etapa=5 and activo=2 and c.id_dictaminador=$dictaminador and url is null and foliodictaval is null;

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}


public function seguimientoRevisorAll($c,$cla){
		//Reanudamos la sesi?
		session_start();
		$num_id = $_SESSION["idkey2"];


		if ($cla == 1) {
			$query = "
			select distinct folio, fecha_registro as fechr, aniodictamen, d.id_dictaminador as dictaminador, nombre_especialista as nombre_especialist,
			(CASE WHEN tipodictamen =1 THEN 'NORMAL'
			WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
			WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
			END) as tipoditc,
			(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
			END) as etapa_folio_d,
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, ('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse
			from contribuyentedatos_v2 as d
			join estatusxfolio as t on d.folio = t.folio_dictamen
			join
			(

			select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
			join usuario_v2  as u
			on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2

			) as j

			on
			j.num_registro = d.id_dictaminador

			where t.id_revisor=$num_id and etapa=4 or etapa = 13;";
		}else if ($cla == 2) {
			$query = " select  distinct d.folio, d.id_dictaminador as dictaminador, j.nombre_especialista as  nombre_especialist,
			nombredenominacion,apaterno,amaterno,email,
			d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse,
			to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
			(CASE WHEN tipodictamen =1 THEN 'NORMAL'
			WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
			WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
			END) as tipoditc
			from contribuyentedatos_v2 as d
			join estatusxfolio as t on d.folio = t.folio_dictamen
			join
			(
			select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
			join usuario_v2  as u
			on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2
			) as j
			on
			j.num_registro = d.id_dictaminador
			where t.id_revisor=$num_id and etapa=51;";
		}else if ($cla == 3) {
			$query = " select  distinct d.folio, d.id_dictaminador as dictaminador, j.nombre_especialista as  nombre_especialist,
			nombredenominacion,apaterno,amaterno,email,
			d.folio,('/' ||  lpad(d.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse,
			to_char(fecha_registro, 'YYYY-MM-DD HH12:MI:SS') as fechr, aniodictamen,
			(CASE WHEN tipodictamen =1 THEN 'NORMAL'
			WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
			WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
			END) as tipoditc
			from contribuyentedatos_v2 as d
			join estatusxfolio as t on d.folio = t.folio_dictamen
			join
			(
			select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
			join usuario_v2  as u
			on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2
			) as j
			on
			j.num_registro = d.id_dictaminador
			where t.id_revisor=$num_id and etapa=12;";
		}

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		$validate_exixts = pg_num_rows($rs1);

		if ($validate_exixts >= 1) {
			while( $obj1 = pg_fetch_object($rs1) ){
				$data2[] = $obj1;
			}
			// Liberando el conjunto de resultados
			pg_free_result($result2);
			// Cerrando la conexion


			header('Content-type: application/json');
			echo json_encode($data2);

		}else{
			echo "000";
		}

		pg_close($c);
	}

public function savepreautHojasverdes($c,$folio,$clavec,$ObservacionPre,$anioD){

		session_start();$revisors = $_SESSION["idkey2"];
		if ($ObservacionPre == "") {
			$ObservacionPre="N/A";
		}

		$sqL = "UPDATE estatusxfolio SET etapa=52, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $folio and cclave='$clavec' and id_revisor=$revisors;";
		pg_query($c, $sqL);

		/*$sql4 = "INSERT INTO hojasverdes(anio, folio, clavecc, url, activo, foliodictaval, noregistrorevisor) VALUES ($anioD, $folio, '$clavec', null, $activo, null, $revisors);";
		 pg_query($c, $sql4); */


		echo"10";
		// Cerrando la conexi?
		pg_close($c);



	}


public function subida2($c){

		$query = "select * from contribuyentedatos_v2 as c
JOIN inmuebles_v2 as ii
ON c.folio = ii.folio
 where id_dictaminador = 340;";
		/*
		 * select *,st.id_dictaminador as dictaminador,

(CASE WHEN st.etapa =1 THEN 'REGISTRO DE DICTAMEN'
WHEN st.etapa =2 THEN 'PENDIENTE DE CONTRIBUYENTE vobo'
WHEN st.etapa =3 THEN 'PENDIENTE DE ASIGNAR'
WHEN st.etapa =4 THEN 'ASIGNADO A REVISOR'
WHEN st.etapa =5 THEN 'OBSERVADO POR REVISOR'
WHEN st.etapa =6 THEN 'AUTORIZADO'
WHEN st.etapa =7 THEN 'PENDIENTE DE PAGO'
WHEN st.etapa =11 THEN 'RECHAZADO'
WHEN st.etapa=12 THEN 'RECHAZADO POR ADMINISTRADOR'
WHEN st.etapa=13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN st.etapa=15 THEN 'VALIDADO'
END) as etapa_de_dict

 from contribuyentedatos_v2 as c
JOIN inmuebles_v2 as ii
ON c.folio = ii.folio
join estatusxfolio as st
on ii.cve_catastral = st.cclave
 where st.id_dictaminador = 340;*/

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);
	}


public function guardarcomentariosConstruidoMextra($c,$claveCat,$IDD,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM,$tipologiass){

		session_start();
		$id_dictaminadorr= 340 ;
		//$_SESSION["idkey2"];
		$length = 16;
		$claveconceros = str_pad($claveCat,$length,"0", STR_PAD_LEFT);


		if ($avaluofirmadoM == '') {
			$avaluofirmadoM="N/A";
		}

		if ($dictavalM == '') {
			$dictavalM="N/A";
		}

		if ($construccionesM == '') {
			$construccionesM="N/A";
		}

		if ($actaempresa == '') {
			$actaempresa="N/A";
		}

		if ($nombramientolegal == '') {
			$nombramientolegal="N/A";
		}

		if ($boleta == '') {
			$boleta="N/A";
		}

		if ($acreditapropiedadM == '') {
			$acreditapropiedadM="N/A";
		}

		if ($idenoficialM == '') {
			$idenoficialM="N/A";
		}

		if ($medidascolindancM == '') {
			$medidascolindancM="N/A";
		}

		if ($croquislocalizM == '') {
			$croquislocalizM="N/A";
		}

		if ($otrosM == '') {
			$otrosM="N/A";
		}

		if ($indivisoscondominiosM == '') {
			$indivisoscondominiosM="N/A";
		}

		if ($croquisconstruccionM == '') {
			$croquisconstruccionM="N/A";
		}

		if ($usoprivativoM == '') {
			$usoprivativoM="N/A";
		}

		if ($superficiesconstruM == '') {
			$superficiesconstruM="N/A";
		}

		if ($planosfactoresM == '') {
			$planosfactoresM="N/A";
		}

		if ($fachadaM == '') {
			$fachadaM="N/A";
		}

		$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12;";
		$rx = pg_query( $c, $sqlv );

			while( $obj = pg_fetch_object($rx) ){
				$data[] = $obj;
			}


			for ($i=0; $i < pg_num_rows($rx); $i++) {
				$orden = $data[$i]->orden;

				switch ($orden) {
					case '10'://
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $dictavalM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '11':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $construccionesM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '14':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $avaluofirmadoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '15':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $indivisoscondominiosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '90':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $actaempresa) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '89':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $nombramientolegal) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '88':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $boleta) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '87':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $idenoficialM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '86': //planos
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $medidascolindancM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '85': //croquis
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquislocalizM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '84':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otrosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '78':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $acreditapropiedadM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;






					case '77':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquisconstruccionM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '76':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $usoprivativoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '75':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $superficiesconstruM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;
					case '74':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $planosfactoresM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;







					case '120':
						$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $fachadaM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
						pg_query($c, $sqLPS);

						break;


					default:

						break;
				}

			}


			$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD and cclave='$claveconceros';";
			/*$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD and id_dictaminador=$id_dictaminadorr and cclave='$claveconceros';";*/
			pg_query($c, $sqL);

			//$sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
			//pg_query($c, $sqLB);





			//agregamos comentarios de las topologias

			foreach($tipologiass as $key => $val) {
				//print "$key = $val[id_doc] <br>";
				$ppp = $val["folio"];
				$i = $val["clve"];
				$e = $val["id_doc"];
				$j = $val["comentario"];
				$ii = $val["tipolg_n"];
				if ( empty( $j ) ) {
					$comentarios="N/A";
				}else{
					$comentarios= $j ;
				}
				$comentarios;
				$sqLPSc = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $comentarios) ."' WHERE id=$ii and id_dictamen =  $ppp  and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPSc);


			}

			// Cerrando la conexion
			pg_close($c);



			echo"50";


	}


public function validardocx_m($c,$clav,$f){

	$length = 16;
	$claveconceros = str_pad($clav,$length,"0", STR_PAD_LEFT);

	$sqlv = "select id_dictamen,clavecastatral,orden from listadocumentos_v2 where id_dictamen = $f and clavecastatral = '$claveconceros' and orden != 12;";
	$rx = pg_query( $c, $sqlv );
	//if( pg_num_rows($rx) >= 9 ){
	if( pg_num_rows($rx) >= 7 ){
		 // ya puede guardar
		echo "100";
	}else{
		//no  puedes guardar
		echo "50";

	}

}


public function savage_gardenextra($c,$id,$clavcatt){
	// SOLO CORRER UNA SOLA VEZ ESTO PARA PODER HACER LA UNION EN UN SOLA LINEA DE CODIGO...
	//echo $rutam ='C:/xampp/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';die();
	//ahora vamos a unir en un solo renglon los archivos .val de cada inmueble x inmueble
	session_start();
	//$num_registroxdictaminador = $_SESSION["idkey2"];
	$num_registroxdictaminador = 340;

	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);




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
		$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','rb');
		$string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val'));
		$file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val';
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


	}
	echo"10";//bandera de todo esta bien
	// Liberando el conjunto de resultados
	pg_free_result($result23);

	/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------
	/*
	 $archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val','rb');
	 $string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val'));
	 $file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';
	 $contenidomed = trim($string);
	 //version php 5.6
	 $contenido = preg_replace("/[\r\n\\n\\r]+/", "", $contenidomed);
	 $aux[] = $contenido;

	 // PARA VER COMO RESULTA EL PROCESO FINAL dataandfilesf
	 //print_r($aux[0]);

	 $fp = fopen($file, "w");
	 fwrite($fp, $aux[0]);
	 fclose($fp);
	 fclose($archivo);
	 echo"10";//bandera de todo esta bien
	 */
	/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------

	// Cerrando la conexiÃ³n
	pg_close($c);

}


public function savage_garden_twoextra($c,$id,$clavcatt){
	$id_r = (int) $id;


	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);


	//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
	session_start();
	//$num_registroxdictaminador = $_SESSION["idkey2"];
	$num_registroxdictaminador = 340;
	// Realizando una consulta SQL
	$query11="select * from (

	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM aviso_dictamen_v2 as a
	join
	inmuebles_v2 as b
	on
	a.id_aviso = b.id_aviso where folio = $id ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d
	join
	aviso_dictamen_v2 as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio

	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt' ";
	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray

	$rs33 = pg_query( $c, $query11 );
	$validate_exixts_registro = pg_num_rows($rs33);
	if( $validate_exixts_registro != 0 ){
		//echo "borra los datos e inicia un INSERT INTO";
		$sqldroptables="
		DELETE FROM dictaval_avaluos where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_contribuyente where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_cuestionario where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_especialistas where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_informes where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_notasfis where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_opiniones where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_representante where folio_dictamun =$id and cclave='$clavcatt';
		";
		$resultadosdrop = pg_query( $c, $sqldroptables );



		while( $obj34 = pg_fetch_object($rs33) ){
			$carpetainm = $obj34->cve_catastral;

			// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
			//1202690001   1302690003     1202690006        1322690004
			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','r');
			while ($linea = fgets($archivo)) {
				$a = $linea.'';

				$datastovector = explode("|", $a);
				$aux[0] = $datastovector;
			}
			//print_r($aux);
			foreach ($aux as $key => $value) {
				$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
				$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


				$a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
				//echo utf8_encode($a3);

				$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

				$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


				$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



				$a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


				$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

				pg_query($c, utf8_encode($a1));
				pg_query($c, utf8_encode($a2));
				pg_query($c, utf8_encode($a3));
				pg_query($c, utf8_encode($a4));
				pg_query($c, utf8_encode($a5));
				pg_query($c, utf8_encode($a6));
				pg_query($c, utf8_encode($a7));
				pg_query($c, utf8_encode($a8));





			}
			//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
			//print_r($aux[0][145]);


		}



	}else{
		//ECHO "SI NO HAY DATOS AGREGAR UN NUEVO REGISTRO";

		while( $obj34 = pg_fetch_object($rs33) ){
			$carpetainm = $obj34->cve_catastral;

			// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
			//1202690001   1302690003     1202690006        1322690004
			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','r');
			while ($linea = fgets($archivo)) {
				$a = $linea.'';

				$datastovector = explode("|", $a);
				$aux[0] = $datastovector;
			}
			//print_r($aux);
			foreach ($aux as $key => $value) {
				$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
				$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


				$a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
				//echo utf8_encode($a3);

				$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

				$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


				$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



				$a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


				$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

				pg_query($c, utf8_encode($a1));
				pg_query($c, utf8_encode($a2));
				pg_query($c, utf8_encode($a3));
				pg_query($c, utf8_encode($a4));
				pg_query($c, utf8_encode($a5));
				pg_query($c, utf8_encode($a6));
				pg_query($c, utf8_encode($a7));
				pg_query($c, utf8_encode($a8));





			}
			//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
			//print_r($aux[0][145]);


		}


	}
	//die();

	echo "10";//bandera de todo esta bien
	fclose($archivo);
	pg_close($c);

}


public function arms_around_youextra($c,$id,$clavcatt){
	$id_r = (int) $id;

	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);

	//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
	session_start();
	//$num_registroxdictaminador = $_SESSION["idkey2"];
	$num_registroxdictaminador = 340;
	// Realizando una consulta SQL
	$query11="select * from (
	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt' ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio
	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt'; ";

	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs33 = pg_query( $c, $query11 );

	$validate_exixts_registro = pg_num_rows($rs33);
	if( $validate_exixts_registro != 0 ){

		$sqldroptables="
		DELETE FROM construcciones_v2 where folio_dictamun = $id and cclave='$clavcatt';
		";

		$resultadosdrop = pg_query( $c, $sqldroptables );


		while( $obj34 = pg_fetch_object($rs33) ){

			$carpetainm = $obj34->cve_catastral;

			// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
			//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
			//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Construcciones.val','r');

			while ($linea = fgets($archivo)) {
				$a = $linea.'';
				$datastovector = explode("|", $a);
				$aux[] = $datastovector;

			}
			//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
			$va = array_slice($aux[0],0,1,true);
			//print_r($aux[0]);
			$universo_array = $aux[0];
			$fragmeto_md5 = array_shift($universo_array);

			$v = array_chunk($universo_array, 19);

			fclose($archivo);

			$vector_n = $v;
			$l=0;
			foreach($vector_n as $equipo)
			{
				if(empty($equipo[15])  ){
					$r ="campo_vacio";
					$equipo[15] = $r;

				}
				if(empty($equipo[16]) ){
					$r ="campo_vacio";
					$equipo[16] = $r;

				}
				if(empty($equipo[17])){
					$r ="campo_vacio";
					$equipo[17] = $r;

				}
				if(empty($equipo[18]) ){
					$r ="campo_vacio";
					$equipo[18] = $r;
				}



				$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
				//echo "<br><br><br>";

				pg_query($c, $sql_construccion);



				$l++;
			}

		}

	}else{
		while( $obj34 = pg_fetch_object($rs33) ){

			$carpetainm = $obj34->cve_catastral;

			// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
			//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
			//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Construcciones.val','r');

			while ($linea = fgets($archivo)) {
				$a = $linea.'';
				$datastovector = explode("|", $a);
				$aux[] = $datastovector;

			}
			//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
			$va = array_slice($aux[0],0,1,true);
			//print_r($aux[0]);
			$universo_array = $aux[0];
			$fragmeto_md5 = array_shift($universo_array);

			$v = array_chunk($universo_array, 19);

			fclose($archivo);

			$vector_n = $v;
			$l=0;
			foreach($vector_n as $equipo)
			{
				if(empty($equipo[15])  ){
					$r ="campo_vacio";
					$equipo[15] = $r;

				}
				if(empty($equipo[16]) ){
					$r ="campo_vacio";
					$equipo[16] = $r;

				}
				if(empty($equipo[17])){
					$r ="campo_vacio";
					$equipo[17] = $r;

				}
				if(empty($equipo[18]) ){
					$r ="campo_vacio";
					$equipo[18] = $r;
				}



				$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
				//echo "<br><br><br>";

				pg_query($c, $sql_construccion);



				$l++;
			}

		}
	}
	echo "10";
	pg_close($c);

}


public function guardarcomentariosBaldioBAldioMextra($c,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada){
	session_start();
	//$id_dictaminadorr=$_SESSION["idkey2"];
	$id_dictaminadorr = 340;


	$length = 16;
	$claveconceros = str_pad($claveCat,$length,"0", STR_PAD_LEFT);


	if ($avaluofirmado == '') {
		$avaluofirmado="N/A";
	}

	if ($dictaval == '') {
		$dictaval="N/A";
	}

	if ($construcciones == '') {
		$construcciones="N/A";
	}

	if ($escriturap == '') {
		$escriturap="N/A";
	}

	if ($boletapredial == '') {
		$boletapredial="N/A";
	}

	if ($acreditapropied == '') {
		$acreditapropied="N/A";
	}

	if ($idenoficial == '') {
		$idenoficial="N/A";
	}

	if ($medidascolindanc == '') {
		$medidascolindanc="N/A";
	}

	if ($croquislocaliz == '') {
		$croquislocaliz="N/A";
	}

	if ($otros == '') {
		$otros="N/A";
	}

	if ($indivisoscondominios == '') {
		$indivisoscondominios="N/A";
	}

	if ($croquisconstruccion == '') {
		$croquisconstruccion="N/A";
	}

	if ($usoprivativo == '') {
		$usoprivativo="N/A";
	}

	if ($superficiesconstru == '') {
		$superficiesconstru="N/A";
	}

	if ($planosfactores == '') {
		$planosfactores="N/A";
	}

	if ($fachada == '') {
		$fachada="N/A";
	}


	$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $folio and orden != 12 and clavecastatral='$claveconceros';";

	$rx = pg_query( $c, $sqlv );

		while( $obj = pg_fetch_object($rx) ){
			$data[] = $obj;
		}


		for ($i=0; $i < pg_num_rows($rx); $i++) {
			$orden = $data[$i]->orden;

			switch ($orden) {
				case '10':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $dictaval) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '11':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $construcciones) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '14':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $avaluofirmado) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '15':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $indivisoscondominios) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '99':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $escriturap) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '98':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $boletapredial) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '97':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $idenoficial) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '96':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $medidascolindanc)  ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '95':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquislocaliz) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '94':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otros) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '83':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $acreditapropied) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;






				case '82':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquisconstruccion) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '81':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $usoprivativo) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '80':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $superficiesconstru) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;
				case '79':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $planosfactores) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;









				case '120':
					$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $fachada) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
					pg_query($c, $sqLPS);

					break;

				default:

					break;
			}

		}


		$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $folio  and cclave='$claveconceros';";
		/*$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $folio and id_dictaminador=$id_dictaminadorr and cclave='$claveconceros';";*/
		pg_query($c, $sqL);

		//$sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$folio and cve_catastral='$claveCat';";
		//pg_query($c, $sqLB);


		// Cerrando la conexiÃƒÂ³n
		pg_close($c);

		echo"50";


}

public function validar_tipo_prediobaldio($c,$clav,$f){

	$sqlv = "select folio,cve_catastral,baldio from inmuebles_v2 where folio = $f and  cve_catastral = '$clav';";
	$rx = pg_query( $c, $sqlv );

	if( pg_num_rows($rx) >= 1 ){
		// ya puede guardar
		//echo "100";
		$rrrr= "UPDATE inmuebles_v2 SET  baldio = 't' WHERE folio = $f and  cve_catastral = '$clav';";
		$qeuryexe = pg_query( $c, $rrrr );
		echo "100";

	}else{
		//no  puedes guardar
		echo "50";

	}

}

public function validar_tipo_predioconstruido($c,$clav,$f){

	$sqlv = "select folio,cve_catastral,baldio from inmuebles_v2 where folio = $f and  cve_catastral = '$clav';";
	$rx = pg_query( $c, $sqlv );

	if( pg_num_rows($rx) >= 1 ){
		// ya puede guardar
		//echo "100";
		$rrrr= "UPDATE inmuebles_v2 SET  baldio = 'f' WHERE folio = $f and  cve_catastral = '$clav';";
		$qeuryexe = pg_query( $c, $rrrr );
		echo "100";

	}else{
		//no  puedes guardar
		echo "50";

	}

}

public function validar_pararecargar($c,$clav,$f){

	$sqlv = "select folio,cve_catastral,baldio from inmuebles_v2 where folio = $f and  cve_catastral = '$clav';";
	$rx = pg_query( $c, $sqlv );

	if( pg_num_rows($rx) >= 1 ){
		// ya puede guardar




		while( $objxx = pg_fetch_object($rx) ){

		echo $objxx->baldio;

		}
		//echo "100";




	}else{
		//no  puedes guardar
		echo "50";

	}

}


public function tablaInmueblesRev($c,$folio,$tipo){
	//ECHO "100";DIE();
	session_start(); $revisor = $_SESSION["idkey2"];
	//////****//////////////
	//$dictaminador = 201;
	///////////////////***///////////////
	$folio2 = explode("/", $folio);
	$folio3 = $folio2[1];

	if ($tipo == 1) {  //Registrados
		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where i.folio=$folio3 and c.folio=$folio3 and et.etapa=1 or et.etapa=2 and et.id_revisor=$revisor;";

	}else if ($tipo == 2) { //en proceso

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and et.id_revisor=$revisor
		and et.etapa != 1 and et.etapa != 2 and et.etapa != 5 and et.etapa != 6 and et.etapa !=11
		and et.etapa !=12 and et.etapa !=13 and et.etapa !=15;";
	}else if ($tipo == 3) { //validados

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and et.id_revisor=$revisor
		and et.etapa=15";
	}else if ($tipo == 4) { //cancelados

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and et.id_revisor=$revisor
		and et.etapa=11 or et.etapa=12 or et.etapa=13;";
	}else if ($tipo == 5) { //En revicion por igecem

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join ( select * from estatusxfolio where folio_dictamen= $folio3 )  as et
		on c.folio = et.folio_dictamen
		join (select * from inmuebles_v2 where folio = $folio3) as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and i.folio=$folio3 and et.id_revisor=$revisor
		and et.etapa=4 or et.etapa=12 or et.etapa=13;";
	}else if ($tipo == 6) { // con archivo en hojas verdes

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and et.id_revisor=$revisor
		and et.etapa=51 and i.folio = $folio3;";
	}else if ($tipo == 7) { // pre autorizados para subir archivos 5 o 51

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and et.id_revisor=$revisor
		and et.etapa=5;";
	}else if ($tipo == 12) { // rechazado por admon pagos etapa 12

		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where et.folio_dictamen=$folio3 and et.id_revisor=$revisor
		and et.etapa=12;";
	}


	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}

	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}


public function view_docs_generales_to_cancelados($c,$i,$d,$clv,$etapa){
	session_start();
	$dictaminador = $_SESSION["idkey2"];
	//$dictaminador = 340;


	if( $i == "1"){
		//predio baldio

		$query ="select *, lpad(folio::text, 5, '0') as folix, j.id as iddox   from
		(
		select * from
		aviso_dictamen_v2 as aaaa
		join
		estatusxfolio as bbbb
		on
		aaaa.cve_cat = bbbb.cclave
		where aaaa.cve_cat = '$clv'
		) as kkkkkk
		join
		(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen, p.cve_cat from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso where d.id_dictaminador = $dictaminador and p.cve_cat = '$clv' ) as ll
		on
		kkkkkk.id_aviso = ll.folio
		join (select * from listadocumentos_v2 where clavecastatral = '$clv') as j
		on kkkkkk.id_aviso = j.id_dictamen
		where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'
		"; //and kkkkkk.etapa = 1
		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);


	}else{
		//predio construido

		$query ="select *, lpad(folio::text, 5, '0') as folix, j.id as iddox   from
		(
		select * from
		aviso_dictamen_v2 as aaaa
		join
		estatusxfolio as bbbb
		on
		aaaa.cve_cat = bbbb.cclave
		where aaaa.cve_cat = '$clv'
		) as kkkkkk
		join
		(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen, p.cve_cat from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso where d.id_dictaminador = $dictaminador and p.cve_cat = '$clv' ) as ll
		on
		kkkkkk.id_aviso = ll.folio
		join (select * from listadocumentos_v2 where clavecastatral = '$clv') as j
		on kkkkkk.id_aviso = j.id_dictamen
		where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'";


		// and kkkkkk.etapa = 1
		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}







}



public function validardocx_m_all($c,$clav,$f){

	$length = 15;
	$claveconceros = str_pad($clav,$length,"0", STR_PAD_LEFT);

	$sqlv = "select id_dictamen,clavecastatral,orden from listadocumentos_v2 where id_dictamen = $f and clavecastatral = '$claveconceros' and orden != 12;";
	$rx = pg_query( $c, $sqlv );
	//if( pg_num_rows($rx) >= 9 ){
	//echo $ds = pg_num_rows($rx);
	if( pg_num_rows($rx) >= 7 ){
		// ya puede guardar
		echo "100";
	}else{
		//no  puedes guardar
		echo "50";

	}

}


function guardarcomentariosBaldioBAldio_cambios($c,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada,$actaConstitutiva,$nombramientooLegal){

	session_start();
	$id_dictaminadorr=$_SESSION["idkey2"];



	$length = 16;
	$claveconceros = str_pad($claveCat,$length,"0", STR_PAD_LEFT);


	if ($avaluofirmado == '') {
		$avaluofirmado="N/A";
	}

	if ($dictaval == '') {
		$dictaval="N/A";
	}

	if ($construcciones == '') {
		$construcciones="N/A";
	}

	if ($escriturap == '') {
		$escriturap="N/A";
	}

	if ($boletapredial == '') {
		$boletapredial="N/A";
	}

	if ($acreditapropied == '') {
		$acreditapropied="N/A";
	}

	if ($idenoficial == '') {
		$idenoficial="N/A";
	}

	if ($medidascolindanc == '') {
		$medidascolindanc="N/A";
	}

	if ($croquislocaliz == '') {
		$croquislocaliz="N/A";
	}

	if ($otros == '') {
		$otros="N/A";
	}

	if ($indivisoscondominios == '') {
		$indivisoscondominios="N/A";
	}

	if ($croquisconstruccion == '') {
		$croquisconstruccion="N/A";
	}

	if ($usoprivativo == '') {
		$usoprivativo="N/A";
	}

	if ($superficiesconstru == '') {
		$superficiesconstru="N/A";
	}

	if ($planosfactores == '') {
		$planosfactores="N/A";
	}

	if ($fachada == '') {
		$fachada="N/A";
	}

	////////////////////////////////////////////////////////
	if ($nombramientooLegal == '') {
		$nombramientooLegal="N/A";
	}


	if ($actaConstitutiva == '') {
		$actaConstitutiva="N/A";
	}
	////////////////////////////////////////////////////////


	$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $folio and orden != 12 and clavecastatral='$claveconceros';";

	$rx = pg_query( $c, $sqlv );

	while( $obj = pg_fetch_object($rx) ){
		$data[] = $obj;
	}


	for ($i=0; $i < pg_num_rows($rx); $i++) {
		$orden = $data[$i]->orden;

		switch ($orden) {
			case '10':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $dictaval) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '11':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $construcciones) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '14':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $avaluofirmado) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '15':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $indivisoscondominios) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '99':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $escriturap) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '98':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $boletapredial) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '97':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $idenoficial) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '96':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $medidascolindanc) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '95':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquislocaliz)  ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '94':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otros) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '83':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $acreditapropied) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;






			case '82':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $croquisconstruccion) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '81':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $usoprivativo) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '80':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $superficiesconstru) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '79':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $planosfactores) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;









			case '120':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $fachada) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;



				//$actaConstitutiva,$nombramientooLegal
			case '89':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $nombramientooLegal) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);
				//echo"loactualice";

				break;

			case '90':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $actaConstitutiva) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;


			default:

				break;
		}

	}

	// cambia de etapa a revisor de nuevo
	$sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $folio  and cclave='$claveconceros';";
	/*$sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $folio and id_dictaminador=$id_dictaminadorr and cclave='$claveconceros';";*/
	pg_query($c, $sqL);

	//$sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$folio and cve_catastral='$claveCat';";
	//pg_query($c, $sqLB);


	// Cerrando la conexiÃƒÂ³n
	pg_close($c);

	echo"50";


}


public function savage_garden_changesave($c,$id,$clavcatt){
	// SOLO CORRER UNA SOLA VEZ ESTO PARA PODER HACER LA UNION EN UN SOLA LINEA DE CODIGO...
	//echo $rutam ='C:/xampp/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';die();
	//ahora vamos a unir en un solo renglon los archivos .val de cada inmueble x inmueble
	session_start();
	$num_registroxdictaminador = $_SESSION["idkey2"];


	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);




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
		$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','rb');
		$string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val'));
		$file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val';
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


	}
	echo"10";//bandera de todo esta bien
	// Liberando el conjunto de resultados
	pg_free_result($result23);

	/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------
	/*
	 $archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val','rb');
	 $string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val'));
	 $file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';
	 $contenidomed = trim($string);
	 //version php 5.6
	 $contenido = preg_replace("/[\r\n\\n\\r]+/", "", $contenidomed);
	 $aux[] = $contenido;

	 // PARA VER COMO RESULTA EL PROCESO FINAL dataandfilesf
	 //print_r($aux[0]);

	 $fp = fopen($file, "w");
	 fwrite($fp, $aux[0]);
	 fclose($fp);
	 fclose($archivo);
	 echo"10";//bandera de todo esta bien
	 */
	/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------

	// Cerrando la conexiÃ³n
	pg_close($c);

}


public function savage_garden_two_changesave($c,$id,$clavcatt){
	$id_r = (int) $id;


	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);


	//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
	session_start();
	$num_registroxdictaminador = $_SESSION["idkey2"];

	// Realizando una consulta SQL
	$query11="select * from (

	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM  (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio

	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt' ";
	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray

	$rs33 = pg_query( $c, $query11 );
	$validate_exixts_registro = pg_num_rows($rs33);
	if( $validate_exixts_registro != 0 ){
		//echo "borra los datos e inicia un INSERT INTO";
		$sqldroptables="
		DELETE FROM dictaval_avaluos where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_contribuyente where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_cuestionario where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_especialistas where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_informes where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_notasfis where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_opiniones where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_representante where folio_dictamun =$id and cclave='$clavcatt';
		";
		$resultadosdrop = pg_query( $c, $sqldroptables );



		while( $obj34 = pg_fetch_object($rs33) ){
			$carpetainm = $obj34->cve_catastral;

			// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
			//1202690001   1302690003     1202690006        1322690004
			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','r');
			while ($linea = fgets($archivo)) {
				$a = $linea.'';

				$datastovector = explode("|", $a);
				$aux[0] = $datastovector;
			}
			//print_r($aux);
			foreach ($aux as $key => $value) {
				$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
				$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


				$a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
				//echo utf8_encode($a3);

				$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

				$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


				$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



				$a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


				$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

				pg_query($c, utf8_encode($a1));
				pg_query($c, utf8_encode($a2));
				pg_query($c, utf8_encode($a3));
				pg_query($c, utf8_encode($a4));
				pg_query($c, utf8_encode($a5));
				pg_query($c, utf8_encode($a6));
				pg_query($c, utf8_encode($a7));
				pg_query($c, utf8_encode($a8));





			}
			//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
			//print_r($aux[0][145]);


		}



	}else{
		//ECHO "SI NO HAY DATOS AGREGAR UN NUEVO REGISTRO";

		while( $obj34 = pg_fetch_object($rs33) ){
			$carpetainm = $obj34->cve_catastral;

			// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
			//1202690001   1302690003     1202690006        1322690004
			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','r');
			while ($linea = fgets($archivo)) {
				$a = $linea.'';

				$datastovector = explode("|", $a);
				$aux[0] = $datastovector;
			}
			//print_r($aux);
			foreach ($aux as $key => $value) {
				$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
				$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


				$a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
				//echo utf8_encode($a3);

				$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

				$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


				$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



				$a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


				$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

				pg_query($c, utf8_encode($a1));
				pg_query($c, utf8_encode($a2));
				pg_query($c, utf8_encode($a3));
				pg_query($c, utf8_encode($a4));
				pg_query($c, utf8_encode($a5));
				pg_query($c, utf8_encode($a6));
				pg_query($c, utf8_encode($a7));
				pg_query($c, utf8_encode($a8));





			}
			//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
			//print_r($aux[0][145]);


		}


	}
	//die();

	echo "10";//bandera de todo esta bien
	fclose($archivo);
	pg_close($c);

}

public function arms_around_you_changesave($c,$id,$clavcatt){
	$id_r = (int) $id;

	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);

	//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
	session_start();
	$num_registroxdictaminador = $_SESSION["idkey2"];

	// Realizando una consulta SQL
	$query11="
	select * from (
	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt' ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio
	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt';
	";

	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs33 = pg_query( $c, $query11 );

	$validate_exixts_registro = pg_num_rows($rs33);
	if( $validate_exixts_registro != 0 ){

		$sqldroptables="
		DELETE FROM construcciones_v2 where folio_dictamun = $id and cclave='$clavcatt';
		";

		$resultadosdrop = pg_query( $c, $sqldroptables );


		while( $obj34 = pg_fetch_object($rs33) ){

			$carpetainm = $obj34->cve_catastral;

			// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
			//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
			//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Construcciones.val','r');

			while ($linea = fgets($archivo)) {
				$a = $linea.'';
				$datastovector = explode("|", $a);
				$aux[] = $datastovector;

			}
			//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
			$va = array_slice($aux[0],0,1,true);
			//print_r($aux[0]);
			$universo_array = $aux[0];
			$fragmeto_md5 = array_shift($universo_array);

			$v = array_chunk($universo_array, 19);

			fclose($archivo);

			$vector_n = $v;
			$l=0;
			foreach($vector_n as $equipo)
			{
				if(empty($equipo[15])  ){
					$r ="campo_vacio";
					$equipo[15] = $r;

				}
				if(empty($equipo[16]) ){
					$r ="campo_vacio";
					$equipo[16] = $r;

				}
				if(empty($equipo[17])){
					$r ="campo_vacio";
					$equipo[17] = $r;

				}
				if(empty($equipo[18]) ){
					$r ="campo_vacio";
					$equipo[18] = $r;
				}



				$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
				//echo "<br><br><br>";

				pg_query($c, $sql_construccion);



				$l++;
			}

		}

	}else{
		$sqldroptables="
		DELETE FROM construcciones_v2 where folio_dictamun = $id and cclave='$clavcatt';
		";

		$resultadosdrop = pg_query( $c, $sqldroptables );

		while( $obj34 = pg_fetch_object($rs33) ){

			$carpetainm = $obj34->cve_catastral;

			// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
			//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
			//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Construcciones.val','r');

			while ($linea = fgets($archivo)) {
				$a = $linea.'';
				$datastovector = explode("|", $a);
				$aux[] = $datastovector;

			}
			//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
			$va = array_slice($aux[0],0,1,true);
			//print_r($aux[0]);
			$universo_array = $aux[0];
			$fragmeto_md5 = array_shift($universo_array);

			$v = array_chunk($universo_array, 19);

			fclose($archivo);

			$vector_n = $v;
			$l=0;
			foreach($vector_n as $equipo)
			{
				if(empty($equipo[15])  ){
					$r ="campo_vacio";
					$equipo[15] = $r;

				}
				if(empty($equipo[16]) ){
					$r ="campo_vacio";
					$equipo[16] = $r;

				}
				if(empty($equipo[17])){
					$r ="campo_vacio";
					$equipo[17] = $r;

				}
				if(empty($equipo[18]) ){
					$r ="campo_vacio";
					$equipo[18] = $r;
				}



				$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
				//echo "<br><br><br>";

				pg_query($c, $sql_construccion);



				$l++;
			}

		}
	}
	echo "10";
	pg_close($c);

}


public function guardarcomentariosConstruidoM_changesave($c,$claveCat,$IDD,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM,$tipologiass){

	session_start();
	$id_dictaminadorr= $_SESSION["idkey2"];
	$length = 16;
	$claveconceros = str_pad($claveCat,$length,"0", STR_PAD_LEFT);


	if ($avaluofirmadoM == '') {
		$avaluofirmadoM="N/A";
	}

	if ($dictavalM == '') {
		$dictavalM="N/A";
	}

	if ($construccionesM == '') {
		$construccionesM="N/A";
	}

	if ($actaempresa == '') {
		$actaempresa="N/A";
	}

	if ($nombramientolegal == '') {
		$nombramientolegal="N/A";
	}

	if ($boleta == '') {
		$boleta="N/A";
	}

	if ($acreditapropiedadM == '') {
		$acreditapropiedadM="N/A";
	}

	if ($idenoficialM == '') {
		$idenoficialM="N/A";
	}

	if ($medidascolindancM == '') {
		$medidascolindancM="N/A";
	}

	if ($croquislocalizM == '') {
		$croquislocalizM="N/A";
	}

	if ($otrosM == '') {
		$otrosM="N/A";
	}

	if ($indivisoscondominiosM == '') {
		$indivisoscondominiosM="N/A";
	}

	if ($croquisconstruccionM == '') {
		$croquisconstruccionM="N/A";
	}

	if ($usoprivativoM == '') {
		$usoprivativoM="N/A";
	}

	if ($superficiesconstruM == '') {
		$superficiesconstruM="N/A";
	}

	if ($planosfactoresM == '') {
		$planosfactoresM="N/A";
	}

	if ($fachadaM == '') {
		$fachadaM="N/A";
	}

	$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12;";
	$rx = pg_query( $c, $sqlv );

	while( $obj = pg_fetch_object($rx) ){
		$data[] = $obj;
	}


	for ($i=0; $i < pg_num_rows($rx); $i++) {
		$orden = $data[$i]->orden;

		switch ($orden) {
			case '10': //
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $dictavalM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '11':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $construccionesM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '14':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $avaluofirmadoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '15':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $indivisoscondominiosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '90':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $actaempresa) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '89':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $nombramientolegal) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '88':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $boleta) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '87':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $idenoficialM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '86': //planos
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $medidascolindancM)."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '85': //croquis
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $croquislocalizM)."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '84':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',  $otrosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '78':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $acreditapropiedadM)."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;






			case '77':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $croquisconstruccionM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '76':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $usoprivativoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '75':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $superficiesconstruM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '74':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $planosfactoresM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;







			case '120':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $fachadaM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;



				//$actaConstitutiva,$nombramientooLegal
			case '89':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $nombramientooLegal) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;

			case '90':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $actaConstitutiva) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;


			default:

				break;
		}

	}

	// cambia de etapa a revisor de nuevo
	$sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $IDD and cclave='$claveconceros';";
	/*$sqL = "UPDATE estatusxfolio SET etapa=4, fecha=now() WHERE folio_dictamen = $IDD and id_dictaminador=$id_dictaminadorr and cclave='$claveconceros';";*/
	pg_query($c, $sqL);


	//$sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
	//pg_query($c, $sqLB);





	//agregamos comentarios de las topologias

	foreach($tipologiass as $key => $val) {
		//print "$key = $val[id_doc] <br>";
		$ppp = $val["folio"];
		$i = $val["clve"];
		$e = $val["id_doc"];
		$j = $val["comentario"];
		$ii = $val["tipolg_n"];
		if ( empty( $j ) ) {
			$comentarios="N/A";
		}else{
			$comentarios= $j ;
		}
		$comentarios;
		$sqLPSc = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '',   $comentarios) ."' WHERE id=$ii and id_dictamen =  $ppp  and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
		pg_query($c, $sqLPSc);


	}

	// Cerrando la conexion
	pg_close($c);



	echo"50";


}


public function xview_tipologs_general_observacionesrevisor($c,$i,$d,$xclv){
	//echo "aaa";
	//die();
	//SOLO ES PARA CASO ESPECIAL DE AURORA
	session_start();
	$dictaminador = $_SESSION["idkey2"];
	//$dictaminador = "340";

	if( $i == "1"){

		$query ="
		select *,lpad(folio::text, 5, '0') as foliocer from
		(
		(

		select
		j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
		from
		listadocumentos_v2 as j
		WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
		) as eeeee
		join
		(
		select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso
		WHERE p.id_aviso = $d and cve_cat = '$xclv'
		) as gggggg

		on eeeee.id_dictamen = gggggg.folio
		) as la
		join
		(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
		on

		la.id_dictamen = lo.folio_dictamen

		where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc
		"; // and eeeee.etapa = 1
		//--where eeeee.id_aviso = 332 and eeeee.orden = PPTX or eeeee.orden = ZIP O RAR or eeeee.orden = SON DWG DE AUTOCAD  and gggggg.dictaminador = 270 and eeeee.clavecastatral = '1060200000000000' order by id_docx asc

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);


	}else{

		$query ="

		select *,lpad(folio::text, 5, '0') as foliocer from
		(
		(

		select
		j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
		from
		listadocumentos_v2 as j
		WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
		) as eeeee
		join
		(
		select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso
		WHERE p.id_aviso = $d and cve_cat = '$xclv'
		) as gggggg

		on eeeee.id_dictamen = gggggg.folio
		) as la
		join
		(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
		on

		la.id_dictamen = lo.folio_dictamen

		where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc
		";// and eeeee.etapa = 1

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

}



public function guardarcomentariosBaldioBAldio_cargarfilesone($c,$claveCat,$folio,$avaluofirmado,$dictaval,$construcciones,$escriturap,$boletapredial,$acreditapropied,$idenoficial,$medidascolindanc,$croquislocaliz,$otros,$indivisoscondominios,$croquisconstruccion,$usoprivativo,$superficiesconstru,$planosfactores,$fachada,$actaConstitutiva,$nombramientoLegal){
	session_start();
	$id_dictaminadorr=$_SESSION["idkey2"];
	//$id_dictaminadorr = 340;


	$length = 16;
	$claveconceros = str_pad($claveCat,$length,"0", STR_PAD_LEFT);


	if ($avaluofirmado == '') {
		$avaluofirmado="N/A";
	}

	if ($dictaval == '') {
		$dictaval="N/A";
	}

	if ($construcciones == '') {
		$construcciones="N/A";
	}

	if ($escriturap == '') {
		$escriturap="N/A";
	}

	if ($boletapredial == '') {
		$boletapredial="N/A";
	}

	if ($acreditapropied == '') {
		$acreditapropied="N/A";
	}

	if ($idenoficial == '') {
		$idenoficial="N/A";
	}

	if ($medidascolindanc == '') {
		$medidascolindanc="N/A";
	}

	if ($croquislocaliz == '') {
		$croquislocaliz="N/A";
	}

	if ($otros == '') {
		$otros="N/A";
	}

	if ($indivisoscondominios == '') {
		$indivisoscondominios="N/A";
	}

	if ($croquisconstruccion == '') {
		$croquisconstruccion="N/A";
	}

	if ($usoprivativo == '') {
		$usoprivativo="N/A";
	}

	if ($superficiesconstru == '') {
		$superficiesconstru="N/A";
	}

	if ($planosfactores == '') {
		$planosfactores="N/A";
	}

	if ($fachada == '') {
		$fachada="N/A";
	}



	////////////////////////////////////////////////////////
	if ($nombramientoLegal == '') {
		$nombramientoLegal="N/A";
	}


	if ($actaConstitutiva == '') {
		$actaConstitutiva="N/A";
	}
	////////////////////////////////////////////////////////


	$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $folio and orden != 12 and clavecastatral='$claveconceros';";

	$rx = pg_query( $c, $sqlv );

	while( $obj = pg_fetch_object($rx) ){
		$data[] = $obj;
	}


	for ($i=0; $i < pg_num_rows($rx); $i++) {
		$orden = $data[$i]->orden;


		/*




		*/

		switch ($orden) {
			case '10': //Avaluos.val //
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='".preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $dictaval) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '11': //Construcciones.val
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $construcciones) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '14':  //FormatoFirmado
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $avaluofirmado) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '15': //IndivisosdeCondominio.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $indivisoscondominios) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '99': //TituloPropiedad.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $escriturap) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '98': // BoletaPredial.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $boletapredial) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '97': // IdentificacionOficial.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $idenoficial)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '96': //Planos.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $medidascolindanc)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '95': //"CroquisLocalizacion.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquislocaliz)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '94': //Otros.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $otros)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '83': //Documentoacreditapropiedad.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $acreditapropied)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;

			case '82':  //Planoarquitectonicocroquisconstruccion.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquisconstruccion)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '81': //Planoarquitectonicodesuusoprivativo.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $usoprivativo)."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '80': //Planodelconjuntosuperficiesconstructivas.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $superficiesconstru)  ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '79': //PlanosdeFactores.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $planosfactores) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;

			case '120': //Imagen_de_fachada.pdf
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $fachada) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;

				//$actaConstitutiva,$nombramientoLegal
			case '89':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $nombramientoLegal) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '90':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $actaConstitutiva) ."' WHERE id_dictamen = $folio and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;


			default:

				break;
		}

	}


	$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $folio  and cclave='$claveconceros';";
	/*$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $folio and id_dictaminador=$id_dictaminadorr and cclave='$claveconceros';";*/
	pg_query($c, $sqL);

	//$sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$folio and cve_catastral='$claveCat';";
	//pg_query($c, $sqLB);


	// Cerrando la conexiÃƒÂ³n
	pg_close($c);

	echo"50";


}



public function savage_garden_filesone($c,$id,$clavcatt){
	// SOLO CORRER UNA SOLA VEZ ESTO PARA PODER HACER LA UNION EN UN SOLA LINEA DE CODIGO...
	//echo $rutam ='C:/xampp/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';die();
	//ahora vamos a unir en un solo renglon los archivos .val de cada inmueble x inmueble
	session_start();
	$num_registroxdictaminador = $_SESSION["idkey2"];
	//$num_registroxdictaminador = 340;

	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);




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
		$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','rb');
		$string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val'));
		$file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val';
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


	}
	echo"10";//bandera de todo esta bien
	// Liberando el conjunto de resultados
	pg_free_result($result23);

	/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------
	/*
	 $archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val','rb');
	 $string = fread($archivo, filesize('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val'));
	 $file = 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/Avaluos.val';
	 $contenidomed = trim($string);
	 //version php 5.6
	 $contenido = preg_replace("/[\r\n\\n\\r]+/", "", $contenidomed);
	 $aux[] = $contenido;

	 // PARA VER COMO RESULTA EL PROCESO FINAL dataandfilesf
	 //print_r($aux[0]);

	 $fp = fopen($file, "w");
	 fwrite($fp, $aux[0]);
	 fclose($fp);
	 fclose($archivo);
	 echo"10";//bandera de todo esta bien
	 */
	/////////////////////////////////////////////////////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------

	// Cerrando la conexiÃ³n
	pg_close($c);

}


public function savage_garden_two_filesone($c,$id,$clavcatt){
	$id_r = (int) $id;


	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);


	//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
	session_start();
	$num_registroxdictaminador = $_SESSION["idkey2"];
	//$num_registroxdictaminador = 340;
	// Realizando una consulta SQL
	$query11="select * from (

	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM  (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio

	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt' ";
	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray

	$rs33 = pg_query( $c, $query11 );
	$validate_exixts_registro = pg_num_rows($rs33);
	if( $validate_exixts_registro != 0 ){
		//echo "borra los datos e inicia un INSERT INTO";
		$sqldroptables="
		DELETE FROM dictaval_avaluos where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_contribuyente where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_cuestionario where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_especialistas where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_informes where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_notasfis where folio_dictamun =$id and cclave='$clavcatt';
		DELETE FROM dictaval_opiniones where folio_dictamun =$id and cclave='$clavcatt';

		DELETE FROM dictaval_representante where folio_dictamun =$id and cclave='$clavcatt';
		";
		$resultadosdrop = pg_query( $c, $sqldroptables );



		while( $obj34 = pg_fetch_object($rs33) ){
			$carpetainm = $obj34->cve_catastral;

			// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
			//1202690001   1302690003     1202690006        1322690004
			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','r');
			while ($linea = fgets($archivo)) {
				$a = $linea.'';

				$datastovector = explode("|", $a);
				$aux[0] = $datastovector;
			}
			//print_r($aux);
			foreach ($aux as $key => $value) {
				$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
				$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


				$a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
				//echo utf8_encode($a3);

				$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

				$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


				$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



				$a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


				$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

				pg_query($c, utf8_encode($a1));
				pg_query($c, utf8_encode($a2));
				pg_query($c, utf8_encode($a3));
				pg_query($c, utf8_encode($a4));
				pg_query($c, utf8_encode($a5));
				pg_query($c, utf8_encode($a6));
				pg_query($c, utf8_encode($a7));
				pg_query($c, utf8_encode($a8));





			}
			//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
			//print_r($aux[0][145]);


		}



	}else{
		//ECHO "SI NO HAY DATOS AGREGAR UN NUEVO REGISTRO";

		while( $obj34 = pg_fetch_object($rs33) ){
			$carpetainm = $obj34->cve_catastral;

			// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
			//1202690001   1302690003     1202690006        1322690004
			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Avaluos.val','r');
			while ($linea = fgets($archivo)) {
				$a = $linea.'';

				$datastovector = explode("|", $a);
				$aux[0] = $datastovector;
			}
			//print_r($aux);
			foreach ($aux as $key => $value) {
				$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
				$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


				$a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
				//echo utf8_encode($a3);

				$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

				$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


				$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



				$a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


				$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

				pg_query($c, utf8_encode($a1));
				pg_query($c, utf8_encode($a2));
				pg_query($c, utf8_encode($a3));
				pg_query($c, utf8_encode($a4));
				pg_query($c, utf8_encode($a5));
				pg_query($c, utf8_encode($a6));
				pg_query($c, utf8_encode($a7));
				pg_query($c, utf8_encode($a8));





			}
			//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
			//print_r($aux[0][145]);


		}


	}
	//die();

	echo "10";//bandera de todo esta bien
	fclose($archivo);
	pg_close($c);

}



public function arms_around_you_filesone($c,$id,$clavcatt){
	$id_r = (int) $id;

	$length = 5;
	$foliodecarpeta = str_pad($id,$length,"0", STR_PAD_LEFT);

	//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble
	session_start();
	$num_registroxdictaminador = $_SESSION["idkey2"];
	//$num_registroxdictaminador = 340;
	// Realizando una consulta SQL
	$query11="
	select * from (
	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt' ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio
	where dd.folio = $id and ddf.dictaminador = $num_registroxdictaminador and cve_catastral = '$clavcatt'; ";

	$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs33 = pg_query( $c, $query11 );

	$validate_exixts_registro = pg_num_rows($rs33);
	if( $validate_exixts_registro != 0 ){

		$sqldroptables="
		DELETE FROM construcciones_v2 where folio_dictamun = $id and cclave='$clavcatt';
		";

		$resultadosdrop = pg_query( $c, $sqldroptables );


		while( $obj34 = pg_fetch_object($rs33) ){

			$carpetainm = $obj34->cve_catastral;

			// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
			//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
			//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Construcciones.val','r');

			while ($linea = fgets($archivo)) {
				$a = $linea.'';
				$datastovector = explode("|", $a);
				$aux[] = $datastovector;

			}
			//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
			$va = array_slice($aux[0],0,1,true);
			//print_r($aux[0]);
			$universo_array = $aux[0];
			$fragmeto_md5 = array_shift($universo_array);

			$v = array_chunk($universo_array, 19);

			fclose($archivo);

			$vector_n = $v;
			$l=0;
			foreach($vector_n as $equipo)
			{
				if(empty($equipo[15])  ){
					$r ="campo_vacio";
					$equipo[15] = $r;

				}
				if(empty($equipo[16]) ){
					$r ="campo_vacio";
					$equipo[16] = $r;

				}
				if(empty($equipo[17])){
					$r ="campo_vacio";
					$equipo[17] = $r;

				}
				if(empty($equipo[18]) ){
					$r ="campo_vacio";
					$equipo[18] = $r;
				}



				$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
				//echo "<br><br><br>";

				pg_query($c, $sql_construccion);



				$l++;
			}

		}

	}else{
		while( $obj34 = pg_fetch_object($rs33) ){

			$carpetainm = $obj34->cve_catastral;

			// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
			//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
			//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

			$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$foliodecarpeta.'/'.$carpetainm.'/Construcciones.val','r');

			while ($linea = fgets($archivo)) {
				$a = $linea.'';
				$datastovector = explode("|", $a);
				$aux[] = $datastovector;

			}
			//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
			$va = array_slice($aux[0],0,1,true);
			//print_r($aux[0]);
			$universo_array = $aux[0];
			$fragmeto_md5 = array_shift($universo_array);

			$v = array_chunk($universo_array, 19);

			fclose($archivo);

			$vector_n = $v;
			$l=0;
			foreach($vector_n as $equipo)
			{
				if(empty($equipo[15])  ){
					$r ="campo_vacio";
					$equipo[15] = $r;

				}
				if(empty($equipo[16]) ){
					$r ="campo_vacio";
					$equipo[16] = $r;

				}
				if(empty($equipo[17])){
					$r ="campo_vacio";
					$equipo[17] = $r;

				}
				if(empty($equipo[18]) ){
					$r ="campo_vacio";
					$equipo[18] = $r;
				}



				$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
				//echo "<br><br><br>";

				pg_query($c, $sql_construccion);



				$l++;
			}

		}
	}
	echo "10";
	pg_close($c);

}


public function guardarcomentariosConstruido_filesone($c,$claveCat,$IDD,$avaluofirmadoM,$dictavalM,$construccionesM,$actaempresa,$nombramientolegal,$boleta,$acreditapropiedadM,$idenoficialM,$medidascolindancM,$croquislocalizM,$otrosM,$indivisoscondominiosM,$croquisconstruccionM,$usoprivativoM,$superficiesconstruM,$planosfactoresM,$fachadaM,$tipologiass,$tituloPropiedafc){

	session_start();
	$id_dictaminadorr = $_SESSION["idkey2"];
	/*
	$length = 16;
	$claveconceros = str_pad($claveCat,$length,"0", STR_PAD_LEFT);
	*/


	//$length = 16;
	//$length = 15;
	$claveconceros = $claveCat;



	if ($avaluofirmadoM == '') {
		$avaluofirmadoM="N/A";
	}

	if ($dictavalM == '') {
		$dictavalM="N/A";
	}

	if ($construccionesM == '') {
		$construccionesM="N/A";
	}

	if ($actaempresa == '') {
		$actaempresa="N/A";
	}

	if ($nombramientolegal == '') {
		$nombramientolegal="N/A";
	}

	if ($boleta == '') {
		$boleta="N/A";
	}

	if ($acreditapropiedadM == '') {
		$acreditapropiedadM="N/A";
	}

	if ($idenoficialM == '') {
		$idenoficialM="N/A";
	}

	if ($medidascolindancM == '') {
		$medidascolindancM="N/A";
	}

	if ($croquislocalizM == '') {
		$croquislocalizM="N/A";
	}

	if ($otrosM == '') {
		$otrosM="N/A";
	}

	if ($indivisoscondominiosM == '') {
		$indivisoscondominiosM="N/A";
	}

	if ($croquisconstruccionM == '') {
		$croquisconstruccionM="N/A";
	}

	if ($usoprivativoM == '') {
		$usoprivativoM="N/A";
	}

	if ($superficiesconstruM == '') {
		$superficiesconstruM="N/A";
	}

	if ($planosfactoresM == '') {
		$planosfactoresM="N/A";
	}

	if ($fachadaM == '') {
		$fachadaM="N/A";
	}

	$sqlv = "select orden from listadocumentos_v2 where id_dictamen = $IDD and orden != 12;";
	$rx = pg_query( $c, $sqlv );

	while( $obj = pg_fetch_object($rx) ){
		$data[] = $obj;
	}


	for ($i=0; $i < pg_num_rows($rx); $i++) {
		$orden = $data[$i]->orden;

		switch ($orden) {
			case '10':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $dictavalM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '11':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $construccionesM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '14':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $avaluofirmadoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '15':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $indivisoscondominiosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '90':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $actaempresa)  ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '89':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $nombramientolegal) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '88':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $boleta) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '87':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $idenoficialM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '86': //planos
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $medidascolindancM)  ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '85': //croquis
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquislocalizM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '84':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $otrosM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '78':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $acreditapropiedadM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;

			case '77':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $croquisconstruccionM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '76':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $usoprivativoM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '75':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $superficiesconstruM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;
			case '74':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $planosfactoresM) ."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;


			case '120':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $fachadaM)."' WHERE id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;

			case '99':
				$sqLPS = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $tituloPropiedafc) ."' WHERE
				id_dictamen = $IDD and orden=$orden and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
				pg_query($c, $sqLPS);

				break;


			default:

				break;
		}

	}


	$sqL = "UPDATE estatusxfolio SET etapa=3, fecha=now() WHERE folio_dictamen = $IDD and cclave='$claveconceros';";
	pg_query($c, $sqL);

	//$sqLB = "UPDATE inmuebles_v2 SET baldio='TRUE' where folio=$IDD and cve_catastral='$claveCat';";
	//pg_query($c, $sqLB);





	//agregamos comentarios de las topologias

	foreach($tipologiass as $key => $val) {
		//print "$key = $val[id_doc] <br>";
		$ppp = $val["folio"];
		$i = $val["clve"];
		$e = $val["id_doc"];
		$j = $val["comentario"];
		$ii = $val["tipolg_n"];
		if ( empty( $j ) ) {
			$comentarios="N/A";
		}else{
			$comentarios= $j ;
		}
		$comentarios;
		$sqLPSc = "UPDATE listadocumentos_v2 SET comentario='". preg_replace('/[\;\|\!\'\"\?\&\$\%\#]+/', '', $comentarios) ."' WHERE id=$ii and id_dictamen =  $ppp  and id_dictaminador=$id_dictaminadorr and clavecastatral='$claveconceros';";
		pg_query($c, $sqLPSc);


	}

	// Cerrando la conexion
	pg_close($c);



	echo"50";


}


public function view_docs_generales_filesone($c,$i,$d,$clv,$etapa,$anioo){
	session_start();
	$dictaminador = $_SESSION["idkey2"];
	//$dictaminador = 340;


	if( $i == "1"){
		//predio baldio

		$query ="select *, lpad(folio::text, 5, '0') as folix, j.id as iddox   from
		(
		select * from
		(select * from aviso_dictamen_v2 where id_aviso = $d  and cve_cat = '$clv') as aaaa
		join
		(select * from estatusxfolio where folio_dictamen = $d and  cclave = '$clv') as bbbb
		on
		aaaa.cve_cat = bbbb.cclave
		where aaaa.cve_cat = '$clv'
		) as kkkkkk
		join
		(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen, p.cve_cat from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso where d.id_dictaminador = $dictaminador and p.cve_cat = '$clv' and d.aniodictamen = $anioo ) as ll
		on
		kkkkkk.id_aviso = ll.folio
		join (select * from listadocumentos_v2 where clavecastatral = '$clv') as j
		on kkkkkk.id_aviso = j.id_dictamen
		where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'
		"; //and kkkkkk.etapa = 1
		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);


	}else{
		//predio construido

		$query ="select *, lpad(folio::text, 5, '0') as folix, j.id as iddox   from
		(
		select * from
		(select * from aviso_dictamen_v2 where id_aviso = $d  and cve_cat = '$clv')  as aaaa
		join
		(select * from estatusxfolio where folio_dictamen = $d and  cclave = '$clv') as bbbb
		on
		aaaa.cve_cat = bbbb.cclave
		where aaaa.cve_cat = '$clv' AND id_aviso = $d
		) as kkkkkk
		join
		(select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen, p.cve_cat from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso where d.id_dictaminador = $dictaminador and p.cve_cat = '$clv' and d.aniodictamen = $anioo ) as ll
		on
		kkkkkk.id_aviso = ll.folio
		join (select * from listadocumentos_v2 where id_dictamen = $d and clavecastatral = '$clv') as j
		on kkkkkk.id_aviso = j.id_dictamen
		where kkkkkk.id_aviso = $d and ll.dictaminador = $dictaminador and kkkkkk.cclave = '$clv'";


		// and kkkkkk.etapa = 1
		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}







}


public function xview_tipologs_general_filesone($c,$i,$d,$xclv){
	//echo "aaa";
	//die();
	//SOLO ES PARA CASO ESPECIAL DE AURORA
	session_start();
	$dictaminador = $_SESSION["idkey2"];
	//$dictaminador = "340";

	if( $i == "1"){

		$query ="
		select *,lpad(folio::text, 5, '0') as foliocer from
		(
		(

		select
		j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
		from
		listadocumentos_v2 as j
		WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
		) as eeeee
		join
		(
		select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso
		WHERE p.id_aviso = $d and cve_cat = '$xclv'
		) as gggggg

		on eeeee.id_dictamen = gggggg.folio
		) as la
		join
		(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
		on

		la.id_dictamen = lo.folio_dictamen

		where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc
		"; // and eeeee.etapa = 1
		//--where eeeee.id_aviso = 332 and eeeee.orden = PPTX or eeeee.orden = ZIP O RAR or eeeee.orden = SON DWG DE AUTOCAD  and gggggg.dictaminador = 270 and eeeee.clavecastatral = '1060200000000000' order by id_docx asc

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);


	}else{

		$query ="

		select *,lpad(folio::text, 5, '0') as foliocer from
		(
		(

		select
		j.id as id_docx, j.nombredoc, j.orden, j.id_dictamen, j.id_dictaminador, j.comentario, j.clavecastatral, j.\"observacionRevisor\" as comentario2
		from
		listadocumentos_v2 as j
		WHERE j.id_dictamen = $d and j.clavecastatral = '$xclv'
		) as eeeee
		join
		(
		select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio,d.aniodictamen from contribuyentedatos_v2 as d
		join
		aviso_dictamen_v2 as p
		on
		d.folio = p.id_aviso
		WHERE p.id_aviso = $d and cve_cat = '$xclv'
		) as gggggg

		on eeeee.id_dictamen = gggggg.folio
		) as la
		join
		(select * from estatusxfolio where folio_dictamen = $d and cclave = '$xclv') as lo
		on

		la.id_dictamen = lo.folio_dictamen

		where la.id_dictamen = $d and la.orden = 12 or la.orden = 32 or la.orden = 33 or la.orden = 120 and la.dictaminador = $dictaminador and la.clavecastatral = '$xclv' order by id_docx asc
		";// and eeeee.etapa = 1

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

}



public function tablaInmueblesAdmon($c,$folio,$tipo){

	//session_start(); $revisor = $_SESSION["idkey2"];

	$folio2 = explode("/", $folio);
	$folio3 = $folio2[1];
	$anio = $folio2[2];

	if ($tipo == 1) {  //Asignar Revisor, etapa=3
		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where i.folio=$folio3 and c.folio=$folio3 and et.etapa=3 and c.aniodictamen=$anio;";

	}else if ($tipo == 2 ) {  //Dictamenes autorizados por admon Pagos
		$query = "select
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		where i.folio=$folio3 and c.folio=$folio3 and et.etapa=6 and c.aniodictamen=$anio;";
	}else if($tipo == 3){

		$query = "select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *,
		(CASE WHEN (select nombre_especialista as revisor from especialistas_vigentes_v2 where tipo_usuariofk = 3 and num_registro = et.id_revisor)  is null THEN 'SIN REVISOR ASIGNADO'
			WHEN (select nombre_especialista as revisor from especialistas_vigentes_v2 where tipo_usuariofk = 3 and num_registro = et.id_revisor)  is not null THEN (select nombre_especialista as revisor from especialistas_vigentes_v2 where tipo_usuariofk = 3 and num_registro = et.id_revisor)
			END) AS revisor
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral


		----join (select nombre_especialista as revisor, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 3 or  tipo_usuariofk = 0) as e

		----on et.id_revisor = e.no_reg_autorizado

		where i.folio=$folio3 and c.folio=$folio3 and c.aniodictamen=$anio;";

		/*

select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		join (select nombre_especialista as revisor, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 3 or  tipo_usuariofk = 0) as e
		on et.id_revisor = e.no_reg_autorizado
		where i.folio=$folio3 and c.folio=$folio3 and c.aniodictamen=$anio;
		*/
		//die();

	}else if ($tipo == 4) { //Reasignar Revisor

		$query = "select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		join (select * from especialistas_vigentes_v2 where tipo_usuariofk =3) as r
		on et.id_revisor = r.no_reg_autorizado
		where i.folio=$folio3 and c.folio=$folio3 and c.aniodictamen=$anio
		and etapa != 1 and etapa != 2 and etapa != 3;";



	}else if ($tipo == 5) { //Reasignar Revisor

		$query = "select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		join (select * from especialistas_vigentes_v2 where tipo_usuariofk =3) as r
		on et.id_revisor = r.no_reg_autorizado
		where i.folio=$folio3 and c.folio=$folio3 and c.aniodictamen=$anio
		and etapa =52;";



	}else if ($tipo == 7) { //PRENDIENTE DE PAGO

		$query = "select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, ('DIP/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen) AS acuse, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		join (select * from especialistas_vigentes_v2 where tipo_usuariofk =3) as r
		on et.id_revisor = r.no_reg_autorizado
		where i.folio=$folio3 and c.folio=$folio3 and c.aniodictamen=$anio
		and etapa =7;";



	}else if ($tipo == 13) { //PRE RECHAZO / OBSERVADO POR REVISOR por admon general

		$query = "select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, ('DIP/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen) AS acuse, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		join (select * from especialistas_vigentes_v2 where tipo_usuariofk =3) as r
		on et.id_revisor = r.no_reg_autorizado
		where i.folio=$folio3 and c.folio=$folio3 and c.aniodictamen=$anio
		and etapa =13;";



	}


	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}

	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}
public function Admindictamenes_autorizados($c){
	$query = "
select distinct folio_dictamen,(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,('/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,

(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
END) as etapa_de_dict, (nombre ||' '|| ap_paterno ||' '|| ap_materno) as nombre_espec,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,
nombredenominacion, email, a.id_dictaminador, etapa from contribuyentedatos_v2 as a
join especialistas_vigentes_v2 as b
on a.id_dictaminador = b.no_reg_autorizado
join estatusxfolio as e
on a.folio = e.folio_dictamen
where etapa=6;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

public function dictamen_full2_revisor($c){

	$query = "select distinct folio_dictamen,(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,('/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,
 (b.nombre ||' '|| b.ap_paterno ||' '|| b.ap_materno) as nombre_espec,
(CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as tipoditc,
nombredenominacion, email, a.id_dictaminador from contribuyentedatos_v2 as a
join (select * from especialistas_vigentes_v2 where tipo_usuariofk =2) as b
on a.id_dictaminador = b.no_reg_autorizado
join estatusxfolio as e
on a.folio = e.folio_dictamen
where etapa != 1 and etapa != 2 and etapa !=3;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

public function listado_tabl_Revisoress($c){

	// Realizando una consulta SQL
	$query = "select b.tipo_usuario ,no_reg_autorizado as id_tmp,no_reg_autorizado,nombre_especialista,curp, rfc, nombre, ap_paterno, ap_materno,
correo,  telefono
from
(select * from especialistas_vigentes_v2 where tipo_usuariofk = 3)
as a
join
(select * from usuario_v2 where tipo_usuario = 3) as b
on
a.no_reg_autorizado = b.idetallusu where b.tipo_usuario = 3;";
	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs = pg_query( $c, $query );
	while( $obj = pg_fetch_object($rs) ){

		$data[] = $obj;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result);
	// Cerrando la conexión
	pg_close($c);
	//$obj = json_encode($data);
	//var_dump(json_encode($data));
	header('Content-type: application/json');
	print_r(json_encode($data));

}


public function dictamenes_estatusALL($c){
	$query = "
select distinct folio,('/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2, nombre_especialista,
nombredenominacion, email, a.id_dictaminador from
contribuyentedatos_v2 as a
join
(
select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2
  ) as j
on
j.num_registro = a.id_dictaminador;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

public function dictamenes_pendientesAdmonPagos($c){
	$query = "
select distinct folio_dictamen,('DIP/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2, nombre_especialista,

nombredenominacion, email, a.id_dictaminador, etapa, fecha_registro, aniodictamen from
contribuyentedatos_v2 as a

join

(
select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2
  ) as j
on
j.num_registro = a.id_dictaminador
join estatusxfolio as e
on a.folio = e.folio_dictamen where e.etapa = 52;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

public function dictamenes_rechazadosAdmonGral($c){

	$query = "
select distinct folio_dictamen,('DIP/' ||  lpad(folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2, nombre_especialista,

nombredenominacion, email, a.id_dictaminador, etapa, fecha_registro, aniodictamen from
contribuyentedatos_v2 as a

join

(
select num_registro,nombre_especialista,tipo_usuario from (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as e
join usuario_v2  as u
on e.no_reg_autorizado = u.idetallusu where tipo_usuario = 2
  ) as j
on
j.num_registro = a.id_dictaminador
join estatusxfolio as e
on a.folio = e.folio_dictamen where e.etapa = 13;";
	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);
}

public function preRechazooJ($c,$did_dictam,$ObservacionPre,$foll,$archivoHJSVErdes){



	$query1 = "
	SELECT * FROM estatusxfolio where folio_dictamen=$foll and cclave= '$did_dictam' and etapa =5
	union
	SELECT * FROM estatusxfolio where folio_dictamen=$foll and cclave= '$did_dictam' and etapa =13
	union
	SELECT * FROM estatusxfolio where folio_dictamen=$foll and cclave= '$did_dictam' and etapa =52
";
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
		//echo $obj->id_usuario;
		//print_r($obj);
		//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
		$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	$revisors = $data5[0]->id_revisor;
	$dictaminador = $data5[0]->id_dictaminador;



	if ($ObservacionPre == "") {
		$ObservacionPre="N/A";
	}
	//12 es PRE RECHAZO / OBSERVADO POR REVISOR de Administrador (jorge)
	$sqL = "UPDATE estatusxfolio SET etapa=12, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $foll and cclave='$did_dictam' and id_revisor=$revisors and id_dictaminador=$dictaminador;";
	pg_query($c, $sqL);

	$sqL2 = "UPDATE hojasverdes SET activo=$archivoHJSVErdes WHERE folio = $foll and clavecc='$did_dictam' ;";
	pg_query($c, $sqL2);

	echo"10";
	// Cerrando la conexión
	pg_close($c);

}

public function autorizadoJ($c,$clave,$ObservacionPre,$fol){


	$query1 = "SELECT * FROM estatusxfolio where folio_dictamen=$fol and cclave='$clave' and etapa =52 or etapa=13";
	$result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs3 = pg_query( $c, $query1 );
	while( $obj4 = pg_fetch_object($rs3) ){
		//echo $obj->id_usuario;
		//print_r($obj);
		//$data[] = array('idclave' => $obj->municipio, 'clv'=> $Muni , 'nommun' => $obj->nommpio );
		$data5[] = $obj4;
	}
	// Liberando el conjunto de resultados
	pg_free_result($result2);
	$revisors = $data5[0]->id_revisor;
	$dictaminador = $data5[0]->id_dictaminador;



	if ($ObservacionPre == "") {
		$ObservacionPre="N/A";
	}
	//6 es Autorizador por administrador(Jorge)
	$sqL = "UPDATE estatusxfolio SET etapa=6, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $fol and cclave='$clave' and id_revisor=$revisors and id_dictaminador=$dictaminador;";
	pg_query($c, $sqL);
	echo"10";
	// Cerrando la conexión
	pg_close($c);

}


public function guardarFolioDictaval($c,$fol,$clavec,$folio,$anio){
	//$dictaminador = $_SESSION["idkey1"];

	$sqls="UPDATE hojasverdes SET foliodictaval='$fol' WHERE clavecc='$clavec' and folio = $folio and anio=$anio;";
	pg_query($c, $sqls);


	$sqls2="UPDATE estatusxfolio SET etapa=51 WHERE folio_dictamen=$folio and cclave='$clavec' and etapa=5;";
	// and id_dictaminador=201
	pg_query($c, $sqls2);

	pg_close($c);

	echo "1";

}

public function guardarFolioDictavalNG($c,$fol,$clavec,$folio,$anio){
	//$dictaminador = $_SESSION["idkey1"];

	$sqls="UPDATE hojasverdes SET foliodictaval='$fol' WHERE clavecc='$clavec' and folio = $folio and anio=$anio;";
	pg_query($c, $sqls);


	$sqls2="UPDATE estatusxfolio SET etapa=51 WHERE folio_dictamen=$folio and cclave='$clavec' and etapa=53;";
	// and id_dictaminador=201
	pg_query($c, $sqls2);

	pg_close($c);

	echo "1";

}



public function preRechazooHV($c,$folio,$clave,$ObservacionPre,$archivoHJSVErdes){  //Archivo en hojas verdes RECHAZADO POR ADMINISTRADOR PAGOS

	session_start();$revisors = $_SESSION["idkey2"];
	if ($ObservacionPre == "") {
		$ObservacionPre="N/A";
	}

	$sqL = "UPDATE estatusxfolio SET etapa=53, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $folio and cclave='$clave' and id_revisor=$revisors;";
	pg_query($c, $sqL);

	$sqL2 = "UPDATE hojasverdes SET activo=$archivoHJSVErdes WHERE folio = $folio and clavecc='$clave';";
	pg_query($c, $sqL2);

	echo"10";

	pg_close($c);

}


public function validarClaveCatatral_oneturn($c){

	session_start();
	$num_id = $_SESSION["idkey2"];
	$tipoU = $_SESSION["tipoUsuario"];
	/*
select cve_cat,cclave,cve_catastral,aniodictaminar,tabla1.id_dictaminador as contribuyente,folio from
	(select * from aviso_dictamen_v2tmp where id_dictaminador = $num_id) as tabla1
    join
    (select * from estatusxfoliotmp) as tabla2
    on
    tabla1.cve_cat = tabla2.cclave

    join
    (select *,CAST ( (id_domicilio || '' || id  )  AS INTEGER) as rel from inmuebles_v2tmp) as tabla3
    on
    tabla1.cve_cat  = tabla3.cve_catastral


    join
    (select *,CAST ( (id_domicilio || '' || id  )  AS INTEGER) as re2 from domicilio_v2tmp) as tabla4
    on
    tabla3.rel = tabla4.re2
    where
    tabla1.id_dictaminador = $num_id
	*/

	$query = "
    select * from
    (select * from aviso_dictamen_v2tmp where fk_numreg = $num_id ) as tabla1
    join
    (select * from estatusxfoliotmp where fk_numreg = $num_id) as tabla2
    on
    tabla1.cve_cat = tabla2.cclave

    join
    (select *,CAST ( (fk_numreg || '' || id  )  AS INTEGER) as rel from inmuebles_v2tmp where fk_numreg = $num_id) as tabla3
    on
    tabla1.cve_cat  = tabla3.cve_catastral
    join
    (select *,CAST ( (fk_numreg || '' || id  )  AS INTEGER) as re2 from domicilio_v2tmp where fk_numreg = $num_id) as tabla4
    on
    tabla3.rel = tabla4.re2
    where
    tabla1.id_dictaminador = $num_id

	";

	$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray

	$rs = pg_query( $c, $query );

	$validate_exixts = pg_num_rows($rs);


	if( $validate_exixts == 0){


		$data[] = $miArray = array("cve_catastral"=>0, "aniodictaminar"=>0);
		// Liberando el conjunto de resultados
		pg_free_result($result);
		pg_close($c);


	}else{


		while( $obj = pg_fetch_object($rs) ){
			$data[] = $obj;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result);
		pg_close($c);

	}

	//print_r($data);die();
	header('Content-type: application/json');
	print_r(json_encode($data));

}


public function preAutorizaRevisorr($c,$fol,$dat,$ObservacionPre,$anioD){
	session_start();$revisors = $_SESSION["idkey2"];
	if ($ObservacionPre == "") {
		$ObservacionPre="N/A";
	}

	$sqL = "UPDATE estatusxfolio SET etapa=52, \"obs_rev\"='$ObservacionPre', fecha=now() WHERE folio_dictamen = $fol and cclave='$dat' and id_revisor=$revisors;";
	pg_query($c, $sqL);

	echo "10";

}

public function dictamenes_observacionesMunicipio($c){

		session_start();
		$dictaminador = $_SESSION["idkey2"];


		$queryTabla = "create or replace view observacionesMunicipio as (
select distinct folio_dictamen, nombredenominacion, aniodictamen as anio, fecha_registro,
( '/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) as foliocompleto, c.id_dictaminador
 from
estatusxfolio as e
join contribuyentedatos_v2 as c
on e.folio_dictamen = c.folio
where obs_municipio != null or obs_municipio != 'N/A' and c.id_dictaminador = $dictaminador);";


		$resultabla = pg_query($queryTabla) or die('La consulta fallo: ' . pg_last_error());


		$query = "select * from observacionesMunicipio;";

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}


	public function dictamenes_observacionesMunicipioRev($c){

		session_start();
		$revisor = $_SESSION["idkey2"];


		$queryTabla = "create or replace view observacionesMunicipioRevisor as (
select distinct folio_dictamen, nombredenominacion, aniodictamen as anio, fecha_registro,
( '/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen   || '/' || to_char(fecha_registro, 'YYYY')) as foliocompleto, c.id_dictaminador
 from
estatusxfolio as e
join contribuyentedatos_v2 as c
on e.folio_dictamen = c.folio
where obs_municipio != null or obs_municipio != 'N/A' and e.id_revisor = $revisor);";

		$resultabla = pg_query($queryTabla) or die('La consulta fallo: ' . pg_last_error());


		$query = "select * from observacionesMunicipioRevisor;";

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

	public function tablaInmueblesObsMunicipio($c,$folio,$tipo){

		session_start();
		$dictaminador = $_SESSION["idkey2"];

		$folio2 = explode("/", $folio);
		$folio3 = $folio2[1];

			$query = "select (CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, * from contribuyentedatos_v2 as c
			join estatusxfolio as e on c.folio = e.folio_dictamen
			join (select * from inmuebles_v2 where folio=$folio3 ) as i on e.cclave = i.cve_catastral
			join ( select * from especialistas_vigentes_v2 where tipo_usuariofk = 3 ) as r
			on e.id_revisor = r.no_reg_autorizado
			where c.folio=$folio3 and c.id_dictaminador=$dictaminador and obs_municipio != 'N/A' or obs_municipio != null;";




		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}

		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

		public function tablaInmueblesObsMunicipioRev($c,$folio,$tipo){

		session_start();
		$revisor = $_SESSION["idkey2"];

		$folio2 = explode("/", $folio);
		$folio3 = $folio2[1];

			$query = "select (CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, * from contribuyentedatos_v2 as c
			join estatusxfolio as e on c.folio = e.folio_dictamen
			join (SELECT * FROM inmuebles_v2 WHERE folio=$folio3) as i on e.cclave = i.cve_catastral
			join ( select * from especialistas_vigentes_v2 where tipo_usuariofk = 3 ) as r
			on e.id_revisor = r.no_reg_autorizado
			where c.folio=$folio3 and e.id_revisor=$revisor and obs_municipio != 'N/A' or obs_municipio != null;";




		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}

		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}


	public function SelectiondatosObsMunicipio($c,$folio,$anio,$clave){
  session_start();
    $num_registroxdictaminador = $_SESSION["idkey2"];

  // Realizando una consulta SQL
  $query11 = "select  (CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
END) as etapa_folio_d,cast ((CASE WHEN tipodictamen =1 THEN 'NORMAL'
WHEN tipodictamen =2 THEN 'COMPLEMENTARIO'
WHEN tipodictamen =3 THEN 'COMPLEMENTARIO ADICIONAL'
END) as character varying) as dictament,  tipod as tipopersona,
lpad(folio::text, 5, '0') as folr,aniodictamen as anio_dictaminar,
 ('/' ||  lpad(folio::text, 4, '0') || '/' || aniodictamen   || '/' ||
  to_char(fecha_registro, 'YYYY')) AS acuse_recpecion2,id_con as id_aviso,
  norg as no_reg_autorizado,date(fecha_registro) as fecha_registro1,*,curpcontrib
  from
(select *,a.rfc as rrfcontri,b.nombre as nomb,b.ap_paterno as appt,
b.ap_materno as apmt,b.rfc as rrfc,b.telefono as tel,b.no_reg_autorizado as norg,a.curp as curpcontrib
from
contribuyentedatos_v2 as a
join
(select * from especialistas_vigentes_v2 where num_registro = $num_registroxdictaminador and tipo_usuariofk = 2) as b
on
a.id_dictaminador = b.no_reg_autorizado
where b.no_reg_autorizado = $num_registroxdictaminador and id_con = $folio ) as a
join
(select id_inmueble, cve_catastral, valor_catastral, a.id_domicilio as domic,
       id_aviso, manifest_pago, manifest_mejoras, baldio, id_clave, aniodictaminar,b.id_domicilio as domic2, calle, no_exterior, no_interior, colonia, id_municipio,
       referencia1, referencia2, codigo_p, estado, a.folio as ff from
inmuebles_v2 as a
join
domicilio_v2 as b
on a.id_domicilio = b.id_domicilio where id_aviso = $folio and cve_catastral = '$clave') as b
on a.folio = b.ff
join estatusxfolio as mym
on a.folio = mym.folio_dictamen
where a.no_reg_autorizado =$num_registroxdictaminador and folio =$folio and cve_catastral='$clave' and cclave='$clave';";



  $result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs33 = pg_query( $c, $query11 );
  while( $obj34 = pg_fetch_object($rs33) ){
    $data53[] = $obj34;
  }
  // Liberando el conjunto de resultados
  pg_free_result($result23);

  pg_close($c);

  header('Content-type: application/json');

  print_r(json_encode($data53));


}


public function tablaInmueblesDireccionFiscal($c,$folio,$tipo){

	//session_start(); $revisor = $_SESSION["idkey2"];


	$folio3 = $folio;

	 if ($tipo == 7) {
	 	//echo "hola";die();

		$query = "select
		(CASE WHEN etapa =1 THEN 'AD'
WHEN etapa =3 THEN 'DIP'
WHEN etapa =4 THEN 'DIP'
WHEN etapa =5 THEN 'DIP'
WHEN etapa =51 THEN 'DIP'
WHEN etapa =52 THEN 'DIP'
WHEN etapa =53 THEN 'DIP'
WHEN etapa =6 THEN 'DIP'
WHEN etapa =7 THEN 'DIP'
WHEN etapa =11 THEN 'DIP'
WHEN etapa =12 THEN 'DIP'
WHEN etapa =13 THEN 'DIP'
WHEN etapa =15 THEN 'DIP'
		END) as etapa_folio_d,
		(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
		END) as etapadictamen, ('DIP/' ||  lpad(c.folio::text, 5, '0') || '/' || aniodictamen) AS acuse, *
		from contribuyentedatos_v2 as c
		join estatusxfolio as et
		on c.folio = et.folio_dictamen
		join inmuebles_v2 as i
		on et.cclave=i.cve_catastral
		--join (select * from especialistas_vigentes_v2 where tipo_usuariofk =3) as r
		--on et.id_revisor = r.no_reg_autorizado
		where i.folio=$folio3 and c.folio=$folio3
		--and c.aniodictamen=
		and etapa =15;";



	}


	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}

	pg_free_result($result2);
	// Cerrando la conexion
	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);

}



public function revisionDictamenMUNicipio($con,$fol,$claveCat){

		 $query = "select a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral,
			valor_catastral,calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio as nommpio, id_revisor, f.nombre as dictminador,
			f.ap_paterno as apDictaminador, f.ap_materno as amDictaminador,f.rfc as rfcDictaminador, f.no_reg_autorizado as noRegistro,
			g.nombre as tipoDictamen, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\",
			f.nombre_especialista, e.obs_rev, b.baldio, ava_pro_pre
			from contribuyentedatos_v2
			as a JOIN(select * from inmuebles_v2 where folio = $fol and  cve_catastral = '$claveCat')
			 as b ON a.folio = b.folio JOIN domicilio_v2 as c ON b.id_domicilio = c.id_domicilio
			 JOIN (select * from estatusxfolio where folio_dictamen=$fol and cclave='$claveCat') as e ON e.folio_dictamen =
			 a.folio JOIN (select * from especialistas_vigentes_v2 where tipo_usuariofk = 2) as f ON a.id_dictaminador =
			  f.no_reg_autorizado JOIN tipo_dictamen_v2 as g ON a.tipodictamen = g.id_tipo JOIN(
			  select * from  listadocumentos_v2 where id_dictamen = $fol and clavecastatral =  '$claveCat') as h ON a.folio = h.id_dictamen JOIN
			  ( select * from dictaval_avaluos where folio_dictamun = $fol and cclave = '$claveCat' ) as we ON we.folio_dictamun= h.id_dictamen
			  where a.folio = $fol and etapa=15 and cve_catastral='$claveCat' group by a.folio, aniodictamen, nombredenominacion, a.rfc, cve_catastral,
			   valor_catastral,calle,no_exterior, no_interior, colonia, codigo_p, referencia1, id_municipio, id_revisor, f.nombre,f.ap_paterno,
			    f.ap_materno,f.rfc, f.no_reg_autorizado,g.nombre, e.etapa, h.nombredoc, orden, comentario, tipod, h.id, h.\"observacionRevisor\", f.nombre_especialista,
			     e.obs_rev, b.baldio, ava_pro_pre;";

	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}

	pg_free_result($result2);

	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);



}


public function validacionval($c,$fl,$cclvv){
  /*

select * from dictaval_avaluos where folio_dictamun = 855 and cclave = '0387001001000000';
select * from construcciones_v2 where folio_dictamun = 855 and cclave = '0387001001000000';
  */
  $val1="";$val2="";$valR="";
  $query1 = "select * from dictaval_avaluos where folio_dictamun = $fl and cclave = '$cclvv';";
  $result2 = pg_query($query1) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs3 = pg_query( $c, $query1 );

  $query12 = "select * from construcciones_v2 where folio_dictamun = $fl and cclave = '$cclvv';";
  $result23 = pg_query($query12) or die('La consulta fallo: ' . pg_last_error());
  // Imprimiendo los resultados aarray
  $rs34 = pg_query( $c, $query12 );


  $validate_exixts1 = pg_num_rows($rs3);

  $validate_exixts12 = pg_num_rows($rs34);

  if( $validate_exixts1 >= "1" ){
    $val1 = 100;
  }else{
    $val1 = 50;
  }

  if( $validate_exixts12 >= "1" ){
  	$val2 = 100;
  }else{
    $val2 = 50;
  }

  echo $valR = $val1 + $val2;


}


public function listadoDeTipologiasDic($c,$folio,$clave){

 session_start();
    $num_registroxdictaminador = $_SESSION["idkey2"];

 $query = "select * from listadocumentos_v2 where id_dictamen=$folio and clavecastatral='$clave' and id_dictaminador=$num_registroxdictaminador and orden=12;";

	$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
	// Imprimiendo los resultados aarray
	$rs1 = pg_query( $c, $query );
	while( $obj1 = pg_fetch_object($rs1) ){
		$data2[] = $obj1;
	}

	pg_free_result($result2);

	pg_close($c);

	header('Content-type: application/json');
	echo json_encode($data2);


}


public function inmueblesBusquedaJ($c,$folio,$tip){
		session_start();
		//$admon = $_SESSION["idkey2"];
		$folio2 = explode("/", $folio);
		$folio3 = $folio2[1];
		$anioDicta = $folio2[2];
		if ($tip == 1) { //en proceso
			/*

select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen, *
			from contribuyentedatos_v2 as c
			join estatusxfolio as et
			on c.folio = et.folio_dictamen
			join inmuebles_v2 as i
			on et.cclave=i.cve_catastral
			join (select nombre_especialista as revisor, no_reg_autorizado from especialistas_vigentes_v2 where tipo_usuariofk = 3 or tipo_usuariofk = 0)as e
			on et.id_revisor = e.no_reg_autorizado
			where et.folio_dictamen=$folio3 and i.folio=$folio3 and c.aniodictamen=$anioDicta;


			*/
			$query="

select
			(CASE WHEN etapa =1 THEN 'REGISTRO DICTAMEN'
WHEN etapa =3 THEN 'PENDIENTE DE ASIGNAR REVISOR'
WHEN etapa =4 THEN 'EN REVISION POR PARTE DEL IGECEM'
WHEN etapa =5 THEN 'OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES'
WHEN etapa =51 THEN 'CON ARCHIVO EN HOJAS VERDES'
WHEN etapa =52 THEN 'PRE AUTORIZADO / ARCHIVO VALIDO'
WHEN etapa =53 THEN 'ARCHIVO EN HOJAS VERDES NO VALIDO'
WHEN etapa =6 THEN 'AUTORIZADO'
WHEN etapa =7 THEN 'LIBERADO / PENDIENTE DE PAGO'
WHEN etapa =11 THEN 'OBSERVADO POR REVISOR'
WHEN etapa =12 THEN 'RECHAZADO POR ADMINISTRADOR PAGOS'
WHEN etapa =13 THEN 'RECHAZADO POR ADMINISTRADOR GENERAL'
WHEN etapa =15 THEN 'VALIDADO'
			END) as etapadictamen,
			(CASE WHEN (select nombre_especialista as revisor from especialistas_vigentes_v2 where tipo_usuariofk = 3 and num_registro = et.id_revisor)  is null THEN 'SIN REVISOR ASIGNADO'
			WHEN (select nombre_especialista as revisor from especialistas_vigentes_v2 where tipo_usuariofk = 3 and num_registro = et.id_revisor)  is not null THEN (select nombre_especialista as revisor from especialistas_vigentes_v2 where tipo_usuariofk = 3 and num_registro = et.id_revisor)
			END) AS revisor
			,*
			from contribuyentedatos_v2 as c
			join (select * from estatusxfolio where folio_dictamen = $folio3) as et
			on c.folio = et.folio_dictamen
			join (select * from inmuebles_v2 where folio = $folio3 and aniodictaminar = $anioDicta) as i
			on et.cclave=i.cve_catastral
			where et.folio_dictamen=$folio3 and i.folio=$folio3 and c.aniodictamen=$anioDicta;
			"; //and etapa=15;
		}

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);
		header('Content-type: application/json');
		echo json_encode($data2);
		}


	public function actualizacionTarifas($c){

		/*session_start();
		$revisor = $_SESSION["idkey2"];*/

		$query = "select * from tarifaxanio;";

		$result2 = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		// Imprimiendo los resultados aarray
		$rs1 = pg_query( $c, $query );
		while( $obj1 = pg_fetch_object($rs1) ){
			$data2[] = $obj1;
		}
		// Liberando el conjunto de resultados
		pg_free_result($result2);
		// Cerrando la conexion
		pg_close($c);

		header('Content-type: application/json');
		echo json_encode($data2);

	}

	public function actualizacionTarifas2($c,$cuota1,$cuota2,$cuota3,$cuota4,$cuota5,$cuota6,$cuota7,$factoRango1,$factoRango2,$factoRango3,$factoRango4,$factoRango5,$factoRango6,$factoRango7){

		$query1 = "UPDATE tarifaxanio set cuotafija=$cuota1 where id=1";
		pg_query($c, $query1);

		$query2 = "UPDATE tarifaxanio set cuotafija=$cuota2 where id=2";
		pg_query($c, $query2);

		$query3 = "UPDATE tarifaxanio set cuotafija=$cuota3 where id=3";
		pg_query($c, $query3);

		$query4 = "UPDATE tarifaxanio set cuotafija=$cuota4 where id=4";
		pg_query($c, $query4);

		$query5 = "UPDATE tarifaxanio set cuotafija=$cuota5 where id=5";
		pg_query($c, $query5);

		$query6 = "UPDATE tarifaxanio set cuotafija=$cuota6 where id=6";
		pg_query($c, $query6);

		$query7 = "UPDATE tarifaxanio set cuotafija=$cuota7 where id=7";
		pg_query($c, $query7);

		$query8 = "UPDATE tarifaxanio set factorporrango=$factoRango1 where id=1";
		pg_query($c, $query8);

		$query9 = "UPDATE tarifaxanio set factorporrango=$factoRango2 where id=2";
		pg_query($c, $query9);

		$query10 = "UPDATE tarifaxanio set factorporrango=$factoRango3 where id=3";
		pg_query($c, $query10);

		$query11 = "UPDATE tarifaxanio set factorporrango=$factoRango4 where id=4";
		pg_query($c, $query11);

		$query12 = "UPDATE tarifaxanio set factorporrango=$factoRango5 where id=5";
		pg_query($c, $query12);

		$query13 = "UPDATE tarifaxanio set factorporrango=$factoRango6 where id=6";
		pg_query($c, $query13);

		$query14 = "UPDATE tarifaxanio set factorporrango=$factoRango7 where id=7";
		pg_query($c, $query14);

				pg_close($c);

				echo "100";



	}











	public function recarga_val1($c,$foliodif,$annio,$clavcatt){


//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble



$length = 5;
$id = str_pad($foliodif,$length,"0", STR_PAD_LEFT);
$id_r = (int) $id;

// Realizando una consulta SQL
  $query11="
  select * from (



SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio

  FROM (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a

  join

  inmuebles_v2 as b

  on

  a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt' ) as dd

  JOIN

  (

 select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from contribuyentedatos_v2 as d

join

(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p

on

d.folio = p.id_aviso ) as ddf

ON dd.folio=ddf.folio



where dd.folio = $id  and cve_catastral = '$clavcatt'
";

$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray

$rs33 = pg_query( $c, $query11 );
$validate_exixts_registro = pg_num_rows($rs33);
if( $validate_exixts_registro != 0 ){
  //echo "borra los datos e inicia un INSERT INTO";
  $sqldroptables="
DELETE FROM dictaval_avaluos where folio_dictamun =$id_r and cclave='$clavcatt';

DELETE FROM dictaval_contribuyente where folio_dictamun =$id_r and cclave='$clavcatt';
DELETE FROM dictaval_cuestionario where folio_dictamun =$id_r and cclave='$clavcatt';

DELETE FROM dictaval_especialistas where folio_dictamun =$id_r and cclave='$clavcatt';
DELETE FROM dictaval_informes where folio_dictamun =$id_r and cclave='$clavcatt';

DELETE FROM dictaval_notasfis where folio_dictamun =$id_r and cclave='$clavcatt';
DELETE FROM dictaval_opiniones where folio_dictamun =$id_r and cclave='$clavcatt';

DELETE FROM dictaval_representante where folio_dictamun =$id_r and cclave='$clavcatt';
";
$resultadosdrop = pg_query( $c, $sqldroptables );



while( $obj34 = pg_fetch_object($rs33) ){
$carpetainm = $obj34->cve_catastral;

// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
//1202690001   1302690003     1202690006        1322690004
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val','r');
while ($linea = fgets($archivo)) {
$a = $linea.'';

$datastovector = explode("|", $a);
$aux[0] = $datastovector;
}
//print_r($aux);
foreach ($aux as $key => $value) {
$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


 $a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
           //echo utf8_encode($a3);

$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



 $a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

pg_query($c, utf8_encode($a1));
pg_query($c, utf8_encode($a2));
pg_query($c, utf8_encode($a3));
pg_query($c, utf8_encode($a4));
pg_query($c, utf8_encode($a5));
pg_query($c, utf8_encode($a6));
pg_query($c, utf8_encode($a7));
pg_query($c, utf8_encode($a8));





}
//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
//print_r($aux[0][145]);


}



}else{
  //ECHO "SI NO HAY DATOS AGREGAR UN NUEVO REGISTRO";

while( $obj34 = pg_fetch_object($rs33) ){
$carpetainm = $obj34->cve_catastral;

// ESTE SE CORRE DESPUES DE UNIR TODO EN UNA SOLA LINEA DE CODIGO LUEGO SE EJECUTA EL VECTOR PARA EXTRAER DATO X DATO
//1202690001   1302690003     1202690006        1322690004
$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Avaluos.val','r');
while ($linea = fgets($archivo)) {
$a = $linea.'';

$datastovector = explode("|", $a);
$aux[0] = $datastovector;
}
//print_r($aux);
foreach ($aux as $key => $value) {
$a1 = "INSERT INTO dictaval_contribuyente(
            id_dictamen, cve_avaluo, nombre_razon_social, apellido_paterno,
            apellido_materno, nombres, razon_social, rfc, curp, telefono,
            correo_electronico, calle, numero_exterior, edificio, numero_interior,
            colonia, municipio, estado, codigo_postal, calle_referencia1,
            calle_referencia2,folio_dictamun, cclave)
    VALUES (1, '".$value[1]."', '".$value[2]."', '".$value[3]."',
            '".$value[4]."', '".$value[5]."', '".$value[6]."', '".$value[7]."', '".$value[8]."', '".$value[9]."',
            '".$value[10]."', '".$value[11]."', '".$value[12]."', '".$value[13]."', '".$value[14]."',
            '".$value[15]."', '".$value[16]."', '".$value[17]."', '".$value[18]."', '".$value[19]."',
            '".$value[20]."',$id_r,'$clavcatt');";
$a2 = "INSERT INTO dictaval_representante(
            cve_avaluo_rep, apellido_paterno_rep, apellido_materno_rep, nombres_rep,
            rfc_rep, curp_rep, telefono_rep, correo_electronico_rep, calle_rep,
            numero_exterior_rep, edificio_rep, numero_interior_rep, colonia_rep,
            municipio_rep, estado_rep, codigo_postal_rep, calle_referencia1_rep,
            calle_referencia2_rep, instrumento_notarial, numero_notarial,
            fecha_designacion_poder,folio_dictamun, cclave)
    VALUES ('".$value[21]."', '".$value[22]."', '".$value[23]."', '".$value[24]."',
            '".$value[25]."', '".$value[26]."', '".$value[27]."', '".$value[28]."', '',
            '', '', '', '',
            '', '', '', '',
            '', '".$value[29]."', '".$value[30]."',
            '".$value[31]."',$id_r,'$clavcatt');";


 $a3 = "INSERT INTO dictaval_cuestionario(
            cve_avaluo_cuet, servicios_cuet, tipo_dictamen_cuet, anio_dictamen_cuet,
            folio_aviso_cuet, numero_inmueble_edomex_cuet, total_inmuebles_cuet,
            tipo_persona_cuet, estados_financieros_cuet, calle_cuet, numero_exterior_cuet,
            edificio_cuet, numero_interior_cuet, colonia_cuet, municipio_cuet,
            estado_cuet, codigo_postal_cuet, calle_referencia1_cuet, calle_referencia2_cuet,
            clave_catastral_cuet, tipo_contribuyente_cuet, regimen_juridico_cuet,
            fecha_adquisicion_cuet, registro_ifrem_cuet, impuesto_predial_pagado_cuet,
            pago_anual_anticipado_cuet, pago_dos_anios_cuet,folio_dictamun, cclave)
    VALUES ('".$value[32]."', '".$value[33]."', '".$value[34]."', '".$value[35]."',
            '".$value[36]."', '".$value[37]."', '".$value[38]."',
            '".$value[39]."', '".$value[40]."', '".$value[41]."', '".$value[42]."',
            '".$value[43]."', '".$value[44]."', '".$value[45]."', '".$value[46]."',
            '".$value[47]."', '".$value[48]."', '".$value[49]."', '".$value[50]."',
            '".$value[51]."', '".$value[52]."', '".$value[53]."',
            '".$value[54]."', '".$value[55]."', '".$value[56]."',
            '".$value[57]."', '".$value[58]."',$id_r,'$clavcatt');";
           //echo utf8_encode($a3);

$a4 =  "INSERT INTO dictaval_especialistas(
            cve_avaluo_esp, apellido_paterno_esp, apellido_materno_esp, nombre_esp,
            rfc_esp, curp_esp, telefono_esp, correo_electronico_esp, titulo_esp,
            numero_registro_esp, fecha_renovacion_esp, manifiesto_verdad_esp,
            vinculo_profecional_esp,folio_dictamun, cclave)
    VALUES ('".$value[59]."', '".$value[60]."', '".$value[61]."', '".$value[62]."',
            '".$value[63]."', '".$value[64]."', '".$value[65]."', '".$value[66]."', '".$value[67]."',
            '".$value[68]."', '".$value[70]."', '".$value[71]."',
            '".$value[72]."',$id_r,'$clavcatt');";

$a5 = "INSERT INTO dictaval_informes(
            cve_avaluo_inf, nombre_razon_social_inf, con_apellido_paterno_inf,
            con_apellido_materno_inf, con_nombre_inf, razon_social_inf, dicta_apellido_paterno_inf,
            dicta_apellido_materno_inf, dicta_nombre_inf, informe_inf,folio_dictamun, cclave)
    VALUES ('".$value[73]."', '".$value[74]."', '".$value[75]."',
            '".$value[76]."', '".$value[77]."', '".$value[78]."', '".$value[79]."',
            '".$value[80]."', '".$value[81]."', '".utf8_encode($value[82])."',$id_r,'$clavcatt');";


$a6 = "INSERT INTO dictaval_opiniones(
            cve_avaluo_opc, nombre_razon_social_opc, con_apellido_paterno_opc,
            con_apellido_materno_opc, con_nombre_opc, razon_social_opc, dicta_apellido_paterno_opc,
            dicta_apellido_materno_opc, dicta_nombre_opc, opcion_opc,folio_dictamun, cclave)
    VALUES ('".$value[83]."', '".$value[84]."', '".$value[85]."',
            '".$value[86]."', '".$value[87]."', '".$value[88]."', '".$value[89]."',
            '".$value[90]."', '".$value[91]."', '".utf8_encode($value[103])."',$id_r,'$clavcatt');";



 $a7 = "INSERT INTO dictaval_avaluos(
            ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
            ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
            ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,

            ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
            ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
            ava_fec_imp, ava_aprov,folio_dictamun, cclave)
    VALUES ('".$value[104]."', '".$value[105]."', '".$value[106]."', '".$value[107]."', '".$value[108]."',
            '".$value[109]."', '".$value[110]."', '".$value[111]."', '".$value[112]."', '".$value[114]."',
            '".$value[116]."', '".$value[117]."', '".$value[118]."', '".$value[119]."', '".$value[120]."',

            '".$value[124]."', '".$value[125]."', '".$value[126]."', '".$value[128]."', '".$value[129]."',
            '".$value[130]."', '".$value[131]."', '".$value[132]."', ".$value[139].", ".$value[140].",
            '".$value[141]."', '".$value[142]."',$id_r,'$clavcatt');";


$a8 = "INSERT INTO dictaval_notasfis(
            cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
            con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
            dicta_apellido_materno_not, dicta_nombre_not,

             nota_not, ava_den_pob,
            ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
            ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
            clave_catastral, ava_imp_pred, md5,folio_dictamun, cclave)
    VALUES ('".$value[93]."', '".$value[94]."', '".$value[95]."',
            '".$value[96]."', '".$value[97]."', '".$value[98]."', '".$value[99]."',
            '".$value[100]."', '".$value[101]."', '".$value[92]."', '".$value[115]."',

            '".$value[121]."', '".$value[122]."', '".$value[123]."', '".$value[127]."', ".$value[133].", ".$value[134].",
            ".$value[135].", ".$value[136].", ".$value[137].", ".$value[138].", ".$value[143].", '".$value[102]."', '".$value[69]."',
'".$value[113]."', '".$value[144]."', '".$value[0]."',$id_r,'$clavcatt');";

pg_query($c, utf8_encode($a1));
pg_query($c, utf8_encode($a2));
pg_query($c, utf8_encode($a3));
pg_query($c, utf8_encode($a4));
pg_query($c, utf8_encode($a5));
pg_query($c, utf8_encode($a6));
pg_query($c, utf8_encode($a7));
pg_query($c, utf8_encode($a8));





}
//para probar que el arreglo esta bien y que se debe continuar debe tener 145 posiciones
//print_r($aux[0][145]);


}


}
//die();

echo "10";//bandera de todo esta bien
fclose($archivo);
pg_close($c);

}


 public function recarga_val2($c,$foliodif,$annio,$clavcatt){


//METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL de cada inmueble x inmueble

$length = 5;
$id = str_pad($foliodif,$length,"0", STR_PAD_LEFT);
 $id_r = (int) $id;
//die();
// Realizando una consulta SQL
$query11="select * from (
	SELECT b.id,a.id_aviso as idavisodictamen, id_dictaminador,id_inmueble, cve_catastral, valor_catastral,folio
	FROM (select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as a
	join
	(select * from inmuebles_v2 where folio = $id and cve_catastral = '$clavcatt') as b
	on
	a.id_aviso = b.id_aviso where folio = $id and cve_catastral = '$clavcatt' ) as dd
	JOIN
	(
	select d.id_dictaminador as dictaminador,p.id_dictaminador as contribuyente,d.folio from (select * from contribuyentedatos_v2 where folio = $id) as d
	join
	(select * from aviso_dictamen_v2 where id_aviso = $id and cve_cat = '$clavcatt') as p
	on
	d.folio = p.id_aviso ) as ddf
	ON dd.folio=ddf.folio
	where dd.folio = $id  and cve_catastral = '$clavcatt'; ";

$result23 = pg_query($query11) or die('La consulta fallo: ' . pg_last_error());
// Imprimiendo los resultados aarray
$rs33 = pg_query( $c, $query11 );

$validate_exixts_registro = pg_num_rows($rs33);
if( $validate_exixts_registro != 0 ){

  $sqldroptables="
DELETE FROM construcciones_v2 where folio_dictamun = $id_r and cclave='$clavcatt';
";

$resultadosdrop = pg_query( $c, $sqldroptables );


  while( $obj34 = pg_fetch_object($rs33) ){

$carpetainm = $obj34->cve_catastral;

// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r');

while ($linea = fgets($archivo)) {
$a = $linea.'';
$datastovector = explode("|", $a);
$aux[] = $datastovector;

}
//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
$va = array_slice($aux[0],0,1,true);
//print_r($aux[0]);
$universo_array = $aux[0];
$fragmeto_md5 = array_shift($universo_array);

$v = array_chunk($universo_array, 19);

fclose($archivo);

$vector_n = $v;
$l=0;
foreach($vector_n as $equipo)
{
if(empty($equipo[15])  ){
$r ="campo_vacio";
$equipo[15] = $r;

}
if(empty($equipo[16]) ){
$r ="campo_vacio";
$equipo[16] = $r;

}
if(empty($equipo[17])){
$r ="campo_vacio";
$equipo[17] = $r;

}
if(empty($equipo[18]) ){
$r ="campo_vacio";
$equipo[18] = $r;
}



$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
//echo "<br><br><br>";

pg_query($c, $sql_construccion);



$l++;
}

}

}else{
while( $obj34 = pg_fetch_object($rs33) ){

$carpetainm = $obj34->cve_catastral;

// METODO PARA EXTRAER A TODOS LOS ARCHIVOS DE CONTRUCCIONES.VAL
//1202690001   1302690003     1202690006        1322690004  \1432690003  1432690006
//echo 'C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r';

$archivo = fopen('C:/xampp/htdocs/dictamun/files/documentos/'.$id.'/'.$carpetainm.'/Construcciones.val','r');

while ($linea = fgets($archivo)) {
$a = $linea.'';
$datastovector = explode("|", $a);
$aux[] = $datastovector;

}
//PARA AGREGAR A PARTE DE TODO EL ARCHIVO
$va = array_slice($aux[0],0,1,true);
//print_r($aux[0]);
$universo_array = $aux[0];
$fragmeto_md5 = array_shift($universo_array);

$v = array_chunk($universo_array, 19);

fclose($archivo);

$vector_n = $v;
$l=0;
foreach($vector_n as $equipo)
{
if(empty($equipo[15])  ){
$r ="campo_vacio";
$equipo[15] = $r;

}
if(empty($equipo[16]) ){
$r ="campo_vacio";
$equipo[16] = $r;

}
if(empty($equipo[17])){
$r ="campo_vacio";
$equipo[17] = $r;

}
if(empty($equipo[18]) ){
$r ="campo_vacio";
$equipo[18] = $r;
}



$sql_construccion = "INSERT INTO construcciones_v2(con_cve_fol, con_priva, con_super, con_uso, con_clase, con_catego,
            con_edad, con_estado, con_piso, con_f1c, con_f2c, con_f3c, con_vc_con,
            con_avance, con_vida, con_uni_ren, con_mante, con_num_con, clave_catastral,
            md5,folio_dictamun,cclave) VALUES ('".$equipo[0]."', ".$equipo[1].",'".$equipo[2]."','".$equipo[3]."', '".$equipo[4]."',
            '".$equipo[5]."', '".$equipo[6]."', '".$equipo[7]."', '".$equipo[8]."', ".$equipo[9].", ".$equipo[10].",
            ".$equipo[11].", ".$equipo[12].", '".$equipo[13]."', '".$equipo[14]."','".utf8_encode($equipo[15])."', '".$equipo[16]."',
'".$equipo[17]."', '".$equipo[18]."','".$va[0]."',$id_r,'$clavcatt');";
//echo "<br><br><br>";

pg_query($c, $sql_construccion);



$l++;
}

}
}
echo "10";
pg_close($c);

}


 public function load_valterr_avg($c,$folio,$clavecat){
	 //echo "hola_datos";
	 // Realizando una consulta SQL
 	$queryvv = "Create or replace view operacion_valores1x as (

SELECT * FROM  (

            select ('100'::INTEGER) as tipodeconstruccion,('VALORTERRENO'::TEXT) as banderaclasificacion,round((ava_vc_terr + ava_vc_com),2) as valordeltipoconstruccavg,
           ('0'::TEXT) AS indiviso_avaluos_notifisavg, ('0'::INTEGER) AS indivisox

--select *
from (select * from contribuyentedatos_v2 where folio = $folio) as a

JOIN (  select distinct ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
       ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
       ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,
       ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
       ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
       ava_fec_imp, ava_aprov, folio_dictamun, cclave from dictaval_avaluos where folio_dictamun = $folio and cclave = '$clavecat' group by  ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
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
       clave_catastral, ava_imp_pred, md5,  folio_dictamun, cclave from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat'
       group by
       cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
       con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
       dicta_apellido_materno_not, dicta_nombre_not, nota_not, ava_den_pob,
       ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
       ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
       clave_catastral, ava_imp_pred, md5, folio_dictamun, cclave) as c

ON b.folio_dictamun=c.folio_dictamun

where folio=$folio and b.cclave='$clavecat'


UNION

select distinct
con_priva::integer as tipodeconstruccion,
(CASE WHEN con_priva =1.00000 THEN 'PRIVADA'
WHEN con_priva =2.00000 THEN 'COMUNES'
WHEN con_priva =3.00000 THEN 'ESPECIAL'
END ) as banderaclasificacion,
(CASE WHEN con_priva =1.00000 THEN sum(con_vc_con) ------PRIVADA
WHEN con_priva =2.00000 THEN (sum(con_vc_con) * (select (ava_porcen::float / 100) as indivisox  from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat')::decimal) --------COMUNES
WHEN con_priva =3.00000 THEN sum(con_vc_con)  ----------ESPECIAL
END ) as valordeltipoconstruccavg,
(select ava_porcen from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat') as indiviso_avaluos_notifisavg,
(select (ava_porcen::float / 100) as indivisox  from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat')::decimal
   from construcciones_v2 where folio_dictamun = $folio and cclave = '$clavecat'
   group by con_priva

) AS  tablafinalavg

			);

			 select tipodeconstruccion,
 trim(to_char(valordeltipoconstruccavg::decimal,'999999999999.99')) as valordeltipoconstruccavg,
       tipodeconstruccion
       indivisox from operacion_valores1x;

			";
			//die();


			$resultaaaa = pg_query($queryvv) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$reeeees = pg_query( $c, $queryvv);
			 $validate_exixtsxxxxxxxxx = pg_num_rows($reeeees);
			//die();
			if( $validate_exixtsxxxxxxxxx >= "1" ){
				while( $objazzzzzzzzz = pg_fetch_object($reeeees) ){
					//print_r($data[] = $objazzzzzzzzz);
					$data[] = $objazzzzzzzzz;
				}

				//print_r($data[0]->sumavalorterravg);
				//print_r($data);
				header('Content-type: application/json');
				echo json_encode($data);
			}else {
				echo "mal";
			}




 }









 public function load_valterr_avg_total_total_redondeado($c,$folio,$clavecat){
	 //echo "hola_datos";
	 // Realizando una consulta SQL


	 $queryvv = "SELECT ('TOTAL'::TEXT),(sum(valordeltipoconstruccavg::decimal)::DECIMAL )as subzero,ROUND(sum(valordeltipoconstruccavg::numeric),-2) as ttotalavg FROM  (

		 select ('100'::INTEGER) as tipodeconstruccion,('VALORTERRENO'::TEXT) as banderaclasificacion,round((ava_vc_terr + ava_vc_com),2) as valordeltipoconstruccavg,
		 ('0'::TEXT) AS indiviso_avaluos_notifisavg, ('0'::INTEGER) AS indivisox

		 --select *
		 from (select * from contribuyentedatos_v2 where folio = $folio) as a

		 JOIN (  select distinct ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
		 ava_cve_cla, ava_solici, ava_fecha_ava, ava_ubi_pre, ava_pro_pre,
		 ava_ti_co_do, ava_ser_pub, ava_ca_tr_or, ava_me_co_do, ava_su_to_do,
		 ava_area_in, ava_posic, ava_destin, ava_su_te_co, ava_su_te_pr,
		 ava_zorig, ava_c_calle, ava_ca_terr, ava_vc_terr, ava_vc_com,
		 ava_fec_imp, ava_aprov, folio_dictamun, cclave from dictaval_avaluos where folio_dictamun = $folio and cclave = '$clavecat' group by  ava_cve_fol, ava_fecha, ava_tipo_ava, ava_tipo_pre, ava_cve_per,
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
			 clave_catastral, ava_imp_pred, md5,  folio_dictamun, cclave from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat'
			 group by
			 cve_avaluo_not, nombre_razon_social_not, con_apellido_paterno_not,
			 con_apellido_materno_not, con_nombre_not, razon_social_not, dicta_apellido_paterno_not,
			 dicta_apellido_materno_not, dicta_nombre_not, nota_not, ava_den_pob,
			 ava_frente, ava_fondo, ava_altura, ava_porcen, ava_fp1, ava_fp2,
			 ava_fp3, ava_fp4, ava_fp5, ava_fp6, ava_fp7, tipo_opinion, fecha_de_inicio_esp,
			 clave_catastral, ava_imp_pred, md5, folio_dictamun, cclave) as c

			 ON b.folio_dictamun=c.folio_dictamun

			 where folio=$folio and b.cclave='$clavecat'


			 UNION

			 select distinct
			 con_priva::integer as tipodeconstruccion,
			 (CASE WHEN con_priva =1.00000 THEN 'PRIVADA'
			 WHEN con_priva =2.00000 THEN 'COMUNES'
			 WHEN con_priva =3.00000 THEN 'ESPECIAL'
			 END ) as banderaclasificacion,
			 (CASE WHEN con_priva =1.00000 THEN sum(con_vc_con) ------PRIVADA
			 WHEN con_priva =2.00000 THEN (sum(con_vc_con) * (select (ava_porcen::float / 100) as indivisox  from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat')::decimal) --------COMUNES
			 WHEN con_priva =3.00000 THEN sum(con_vc_con)  ----------ESPECIAL
			 END ) as valordeltipoconstruccavg,
			 (select ava_porcen from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat') as indiviso_avaluos_notifisavg,
			 (select (ava_porcen::float / 100) as indivisox  from dictaval_notasfis where folio_dictamun = $folio and cclave = '$clavecat')::decimal
			 from construcciones_v2 where folio_dictamun = $folio and cclave = '$clavecat'
			 group by con_priva

			 ) AS  tablafinalavg

			 ";








			$resultaaaa = pg_query($queryvv) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$reeeees = pg_query( $c, $queryvv);
			 $validate_exixtsxxxxxxxxx = pg_num_rows($reeeees);
			//die();
			if( $validate_exixtsxxxxxxxxx >= "1" ){
				while( $objazzzzzzzzz = pg_fetch_object($reeeees) ){
					//print_r($data[] = $objazzzzzzzzz);
					$data[] = $objazzzzzzzzz;
				}

				//print_r($data[0]->sumavalorterravg);
				//print_r($data);
				header('Content-type: application/json');
				echo json_encode($data);
			}else {
				echo "mal";
			}




 }


}
