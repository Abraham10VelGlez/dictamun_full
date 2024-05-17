<?php
header('Content-Type: text/html; charset=UTF-8');
//include 'bd/conex.php';
//$con = $coxx;
//$id_dictaminadorr = 164;
//$folio = 874;
	$sqlazx=" select * from
			(select * from aviso_dictamen_v2tmp where id_dictaminador = $id_dictaminadorr ) as tabla1
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
			tabla1.id_dictaminador = $id_dictaminadorr";
			
			$result = pg_query($sqlazx) or die('La consulta fallo: ' . pg_last_error());
			// Imprimiendo los resultados aarray
			$rsss = pg_query( $con, $sqlazx);
			
			$validate_exixtsa = pg_num_rows($rsss);
			//if( $validate_exixtsa >= "1" ){
				while( $objext = pg_fetch_object($rsss) ){
					$clavecat = $objext->cve_cat;
					
					echo$table1 = "INSERT INTO aviso_dictamen_v2(id_aviso, id_dictaminador,  cve_cat) VALUES (".$folio.", ".$id_dictaminadorr.", '".$objext->cve_cat."');";
					echo$table2 = "INSERT INTO estatusxfolio(folio_dictamen, id_dictaminador, etapa, fecha,cclave)
                                             VALUES (".$folio.", ".$objext->id_dictaminador.", ".$objext->etapa.", '".$objext->fecha."', '".$objext->cve_cat."');";
					echo$table3 = "INSERT INTO inmuebles_v2( cve_catastral, valor_catastral, id_domicilio,id_aviso, id_clave, aniodictaminar,folio)
                                            VALUES ( '".$objext->cve_cat."', ".$objext->valor_catastral.", ".$objext->rel.",".$folio.", ".$folio.",".$objext->aniodictaminar." ,".$folio.");";
					echo$table4 = "INSERT INTO domicilio_v2(id_domicilio, calle, no_exterior, no_interior, colonia, referencia1,
                                                    referencia2,codigo_p, estado, id_municipio)
                                            VALUES ( ".$objext->re2.", '".ucfirst($objext->calle)."', '".ucfirst($objext->no_exterior)."', '".ucfirst($objext->no_interior)."','".ucfirst($objext->colonia)."', '".ucfirst($objext->referencia1)."',
                                                    '".ucfirst($objext->referencia2)."', ".$objext->codigo_p.", 15, '".$objext->id_municipio."');";
					
					
					//pg_query($con,$table1);
				//	pg_query($con,$table2);
				//	pg_query($con,$table3);
				//	pg_query($con,$table4);
					
					
				}
				
				/*/$clear_tmps = "truncate inmuebles_v2tmp restart identity;
            truncate domicilio_v2tmp restart identity;
            truncate estatusxfoliotmp restart identity;
            truncate aviso_dictamen_v2tmp restart identity;";*/
				
				//pg_query($con,$clear_tmps);
				
				pg_close($con); 
?> 