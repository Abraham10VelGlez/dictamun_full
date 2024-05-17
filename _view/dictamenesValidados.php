<?php include '../web/validateE.php';$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$ruta = explode("/", $url);
 $to=count($ruta);
 $foliosinceros = $ruta[$to-4];
 $clv = $ruta[$to-3];
 $anio = $ruta[$to-2];
 $tipopersona = $ruta[$to-1];
$length = 5;
$foliodecarpeta = str_pad($foliosinceros,$length,"0", STR_PAD_LEFT);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Datos Generales</title>
    <?php include '../const.php'; ?> 
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../../../_js/_app11_dicValidadosDictaminador.js"></script>
   <!-- <script type="text/javascript" src="../../../../../_js/_app12_especialistaregistrados.js"></script>-->

     <link href="<?php echo jsdict; ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <style>
   
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  height: 300px;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

</style>
</head>

<body>
  <input type="hidden" id="idG" name="idG" value="<?php echo $clv; ?>" />
  <input type="hidden" id="cvec" name="cvec"  value="<?php echo $clv; ?>"/>
  <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $anio; ?>"/>
  <input type="hidden" id="etapa" name="etapa" />
  <input type="hidden" id="idGRec" name="idGRec"/>
  <input type="hidden" id="idP" name="idP" value="<?php echo $tipopersona; ?>" /> 
  <input type="hidden" id="n_inm" name="n_inm"  />
    <div id="preloader">
      <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
      </div>
    </div>
    <div id="main-wrapper">
      <div class="nav-header">
        <a class="brand-logo">
         <img class="logo-abbr" src="<?php echo jsdict; ?>images/igecem.png" alt="">
                <img class="logo-compact" src="<?php echo jsdict; ?>images/logo-text.png" alt="">
                <img class="brand-title" src="<?php echo jsdict; ?>images/logo-text.png" alt="">
        </a>
        <div class="nav-control">
          <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
               <div style="color: black;" class="col-xl-3">Folio del Dictamen:<br>DIP/<?php echo $foliodecarpeta; echo "/"; echo $anio; echo "/"; echo $clv;?> <br></div>
               <div class="col-xl-5"><br><br><br><br>
                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa').style.display='none'"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus">Debe tener almenos 7 o más documentos.</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo">Por tal motivo el sistema no le permitira continuar hasta tener la documentacion minima.</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa2">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa2').style.display='none'"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus2">Docuemntos guardados correctamente</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo2">En espera de que sea asignado un revisor.</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
               <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                    <div class="pulse-css"></div>
                                </a>
                               
                            </li>
                                 <li class="nav-item dropdown header-profile" style="color: black;">
                              <?php echo $_SESSION['usuarioactual']; ?>
                               
                            </li>
                           
                           
                        </ul>
            </div>
            </nav>
        </div>
      </div>
          <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first" > <h3 style="color:#ffffff;">DICTAMUN MUNICIPAL</h3> </li>
                    
                      <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>
                        
                    </li>                    
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                           <li><a href="../../../../SeguimientoDictamen/1">En Seguimiento</a></li>
                           <li><a href="../../../../dictamenesPreautorizados/">Pendientes (archivo en hojas verdes)</a></li>
                           <li><a href="../../../../SeguimientoDictamenNOGREEN/12">En hojas verdes no validos</a></li> 
                           <li><a href="../../../../observadosPorMunicipio/1">Observados por el municipio</a></li>                            
                        </ul>
                    </li>
                    
                      <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>
                        
                    </li>
                </ul>
            </div>
        </div>
      <div class="content-body">
        <div class="container-fluid">
        <div class="col-lg-12 col-sm-12">
          <section id="main-content">
          <div class="col-lg-12">
          <div class="card">
          <div class="bootstrap-data-table-panel">
          <div class="">
          <div class="w3-container"><br>
          <div class="col-md-12"><br>
          <div class="col-lg-12">
          <div class="row">
          <div class="col-lg-6" style="">
          <div class="card">
          <div class="card-title">
            <center><h4>Contribuyente</h4></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">Nombre: </td>
                  <td>
                  <input id="nomC" type="text" name="nomC" style="border-bottom: 1px solid #888; background-color: transparent; border: none; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">RFC: </td>
                  <td>
                  <input type="text" name="rfcC" id="rfcC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;" id="curpC2" name="curpC2">CURP:</td>
                  <td>
                  <input type="text" name="curpC" id="curpC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">Telefono:</td>
                  <td>
                  <input type="text" name="telefonoC" id="telefonoC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">Correo electronico:</td>
                  <td>
                  <input type="text" name="correoC" id="correoC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div> 
          <div class="col-lg-6">
          <div class="card">
          <div class="card-title">
            <center><h4>Representante legal</h4></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">Nombre: </td>
                  <td>
                  <input id="nom" type="text" name="nom" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 220px; height: 30px;" readonly="">
                  </td> 
                </tr>
                <tr>
                  <td style="color: black;">RFC: </td>
                  <td>
                  <input type="text" name="cfr" id="cfr" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">CURP:</td>
                  <td>
                  <input type="text" id="purc" name="purc" style="border-bottom: 1px solid #888; background-color: transparent; border:none; border-left: 0; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td><br><br><br><br></td>
                  <td></td>
                </tr>   
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-6">
          <div class="card">
          <div class="card-title">
            <center>
            <br>  
            <h4>Dictaminador<br>(Especialista en valuaci&oacute;n inmoviliaria autorizado por el IGECEM)</h4></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">Dictaminador: </td>
                  <td>
                  <div id="nombs" style="color: black;"></div>
                  </td> 
                </tr>
                <tr>
                  <td style="color: black;">RFC: </td>
                  <td>
                  <div id="rfcss" style="color: black;"></div>
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">No.Registro:</td>
                  <td>
                  <div id="nog" style="color: black;"></div>
                  </td>
                </tr>                     
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-6">
          <div class="card">
          <div class="card-title">
            <center>
            <br>
            <h4>Informaci&oacute;n adicional</h4><br></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                        <tr>
                          <th></th>
                          <th></th>
                        </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">A&ntilde;o a Dictaminar:</td>
                  <td>
                  <input type="text" name="aniod" id="aniod" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">Tipo de Dictamen:</td>
                  <td>
                  <input type="text" name="tpd" id="tpd" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr> 
                <tr>
                  <td></td>
                </tr>                 
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-12">
          <div class="card">
          <div class="card-title">
          </div>
          <div class="card-body">
          <div class="table-responsive">
         <div class="col-md-12" id="prediosCla">
          <div class="container-fluid">
          
          
        
          
          
          
          
          
          
           <div id="comboBaldio" class="col-lg-12 ">
           <div class="row ">
          <div class="col-md-3"> &nbsp; </div>
          <div class="col-md-3"> 
            <center>
            <input type="radio" id="baldio" name="prediofff" value="1" onclick="baldio();"  style="border: 1px;width: 23%;height: 2em;" checked>
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio baldío.</label>
            <input type="hidden" id="prebaldio" name="prebaldio" value="" >
            </center>
          </div>
          
          <div class="col-md-3"> 
           <center> 
            <input type="radio" id="construccion" name="prediofff" value="2" onclick="construccion();"  style="border: 1px;width: 23%;height: 2em;" disabled>
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            <input type="hidden" id="preconstruido" name="preconstruido" value="" >
            </center>
          </div>
          <div class="col-md-3"> &nbsp; </div>
          </div>
          </div>
          
          
          
          <div id="comboConstruido" class="col-lg-12 ">
           <div class="row ">
          <div class="col-md-3"> &nbsp; </div>
          <div class="col-md-3"> 
            <center>
            <input type="radio" id="baldio" name="prediommm" value="1" onclick="baldio_new();"  style="border: 1px;width: 23%;height: 2em;" disabled>
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio baldío.</label>
            <input type="hidden" id="prebaldiommm" name="prebaldiommm" value="" >
            </center>
          </div>
          
          <div class="col-md-3"> 
           <center> 
            <input type="radio" id="construccion" name="prediommm" value="2" onclick="construccion_new();"  style="border: 1px;width: 23%;height: 2em;" checked>
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            <input type="hidden" id="preconstruidomx" name="preconstruidomx" value="" >
            </center>
          </div>
          <div class="col-md-3"> &nbsp; </div>
          </div>
          </div>
          
          
          
          
          
          
          
          
          </div>   
          </div> 
          
              	<div id="xcod" class="col-md-12 " style="">
    	<CENTER>
    	<br><br>
            <h3 style="text-align: center; font-weight: bold;">Almacenamiento de documentos requeridos para el dictamen</h3>
            <br><br>
    	</CENTER>
           <table class="table table-striped" style="color: black; width: 100%;">
        <tbody id="doc_fisico">
        <tr>
            <th style="text-align: center; background-color: #d0d8f3; width: 600px;">Lista de Documentos</th>
            <th style="text-align: center; background-color: #d0d8f3; width: 400px;">Documento Guardado</th>
            <th style="text-align: center; background-color: #d0d8f3; width: 800px;">Comentario</th>
        </tr>
  
        <tr>
            <td><p>Formato del avaluo</td>
            <td id="ficoment1-a" align="center">NO SE REGISTRO DOCUMENTO</i></td>
            <td align="center"><textarea id="ficoment1" name="ficoment1" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td id="ficoment2-a" align="center">NO SE REGISTRO DOCUMENTO</i></td>
            <td align="center"><textarea id="ficoment2" name="ficoment2" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>   
        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td id="ficoment3-a" align="center">NO SE REGISTRO DOCUMENTO</td>
            <td align="center"><textarea id="ficoment3" name="ficoment3" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
      <tr>
        <div id="Baldio1">
        <td>Escritura pública o Título de propiedad.</td>
        <td id="ficoment4-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment4" name="ficoment4" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </div>
      </tr>
       <tr id="Construido1">
        <div>
      <td>Acta Constitutiva de la Empresa</td>
      <td id="ficoment21-a" align="center">NO SE REGISTRO DOCUMENTO</td>
      <td align="center"><textarea id="ficoment21" name="ficoment21" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </div>
    </tr>
    <tr id="Construido2">
      <div>
      <td>Nombramiento del Representante legal</td>
      <td id="ficoment22-a" align="center">NO SE REGISTRO DOCUMENTO</td>
      <td align="center"><textarea id="ficoment22" name="ficoment22" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </div>
    </tr>
      <tr>
        <td>Boleta Predial.</td>
        <td id="ficoment5-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment5" name="ficoment5" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Documento que acredite la propiedad.</td>
        <td id="ficoment6-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment6" name="ficoment6" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Identificación Oficial del propietario o representante legal  </td>
        <td id="ficoment7-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment7" name="ficoment7" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
        <td id="ficoment8-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment8" name="ficoment8" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Croquis de Localización.</td>
        <td id="ficoment9-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment9" name="ficoment9" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Plano arquitectónico o croquis de construcción.</td>
        <td id="ficoment10-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment10" name="ficoment10" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr> 
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>
        <td id="ficoment11-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment11" name="ficoment11" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas.</td>
        <td id="ficoment12-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment12" name="ficoment12" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>
      <tr>
        <td>Planos de Factores.</td>
        <td id="ficoment13-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment13" name="ficoment13" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr> 
      <tr>
        <td>Relación de indivisos de Condominios.</td>
        <td id="ficoment14-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment14" name="ficoment14" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr>       
      <tr>
        <td>Otros.</td>
        <td id="ficoment15-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment15" name="ficoment15" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </tr> 
      <tr>
        <div id="Baldio2">
        <td id="titFachada" >Imagen de Fachada</td>
        <td id="ficoment16-a" align="center">NO SE REGISTRO DOCUMENTO</td>
        <td align="center"><textarea id="ficoment16" name="ficoment16" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
     
        </div>
      </tr>
    </tbody>

     <tbody id="doc_moral" >
        <tr>
            <th style="text-align: center; background-color: #d0d8f3; width: 600px;">Lista de Documentos</th>
            <th style="text-align: center; background-color: #d0d8f3; width: 400px;">Documento Guardado</th>
            <th style="text-align: center; background-color: #d0d8f3; width: 800px;">Comentario</th>
        </tr>
        <tr>
          <td><p>Formato del avaluo</td>
          <td id="ficoment18-a" align="center">NO SE REGISTRO DOCUMENTO</td>
           <td align="center"><textarea id="ficoment18" name="ficoment18" placeholder="SIN COMENTARIO AGREGADO" style="width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Archivo de  Avaluos.val de dictaval</td>
          <td id="ficoment19-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment19" name="ficoment19" placeholder="SIN COMENTARIO AGREGADO" style="width: 350px;"></textarea></td>
        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td id="ficoment20-a" align="center">NO SE REGISTRO DOCUMENTO</td>
            <td align="center"><textarea id="ficoment20" name="ficoment20" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <div id="baldioM1">
          <td>Escritura pública o Título de propiedad.</td>
          <td id="ficoment4fc-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment4fc" name="ficoment4fc" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
          </div>
        </tr>
         <tr>
          <div id="construccionM1">
      <td>Acta Constitutiva de la Empresa</td>
      <td id="ficoment21m-a" align="center">NO SE REGISTRO DOCUMENTO</td>
      <td align="center"><textarea id="ficoment21m" name="ficoment21m" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </div>
    </tr>
    <tr> 
      <div id="construccionM2">
      <td>Nombramiento del Representante legal</td>
      <td id="ficoment22m-a" align="center">NO SE REGISTRO DOCUMENTO</td>
      <td align="center"><textarea id="ficoment22m" name="ficoment22m" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
      </div>
    </tr>
        <tr>
          <td>Boleta Predial</td>
          <td id="ficoment23-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment23" name="ficoment23" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Documento que acredite la propiedad</td>
          <td id="ficoment24-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment24" name="ficoment24" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Identificación Oficial del propietario o representante legal</td>
          <td id="ficoment25-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment25" name="ficoment25" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Plano ó Croquis del terreno (medidas y colindancias)</td>
          <td id="ficoment26-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment26" name="ficoment26" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Croquis de Localización</td>
          <td id="ficoment27-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment27" name="ficoment27" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr> 
        <tr>
          <td>Otros</td>
          <td id="ficoment28-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment28" name="ficoment28" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Relación de indivisos de Condominio</td>
          <td id="ficoment29-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment29" name="ficoment29" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Plano arquitectónico o croquis de construcción</td>
          <td id="ficoment30-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment30" name="ficoment30" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <td>Plano arquitectónico contenido edificaciones de su uso privativo</td>
          <td id="ficoment31-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment31" name="ficoment31" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr> 
        <tr>
          <td>Plano del conjunto donde señalan las deferentes superficies constructivas</td>
          <td id="ficoment32-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment32" name="ficoment32" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>       
        <tr>
          <td>Planos de Factores</td>
          <td id="ficoment33-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment33" name="ficoment33" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
        </tr>
        <tr>
          <div id="baldioM2">
          <td>Imagen de Fachada</td>
          <td id="ficoment34-a" align="center">NO SE REGISTRO DOCUMENTO</td>
          <td align="center"><textarea id="ficoment34" name="ficoment34" placeholder="SIN COMENTARIO AGREGADO" style="margin-top: 10px; width: 350px;"></textarea></td>
          </div>
        </tr> 
    </tbody>
</table>
</div>
    
    <div id="tipolgis" class="col-sm-12 table-responsive" style="">
    	<center>
    		<br><br>
  <form method="POST" action="load" enctype="multipart/form-data">
    <div>
      
      <H2 id="tituloTipolog"><B>AGREGAR TIPOLOGIAS</B></H2><BR><BR>
      <H4>
      <input type="file" id="uploadedFile" name="uploadedFile" onchange="upload_files3();" />
      </H4>
      <BR><BR>
    </div>

    
  </form>
  </center>
           <table id="tipologstable" class="table table-striped" style="color: black;">
        <thead ><tr>
            <th style="text-align: center; background-color: #d0d8f3;">Lista de Tipologias</th>
            <th style="text-align: center; background-color: #d0d8f3;">Tipologias Subidas</th>
            <th style="text-align: center; background-color: #d0d8f3;">Comentario</th>
        </tr>

      


    </thead>
    
     
    
                  <tbody id="tipologs" style="text-align: center;"></tbody>
    
    
    
    
    
    </table>
    </div>
          
          
            </div>
            </div>
            <center>
            <div id="btnoss" style="display: none;" class="col-md-12">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
            
              <!--input type="button" id="acuseG" name="acuseG" class="btn" value="Guardar" style="display: none; background-color: #1b2856; border-color: #1b2856;" onclick="acuseG1();"-->
              
              <input class="btn" type="button" name="avg1" id="avg1" value="Guardar Todo" onclick="bad(<?php echo $tipopersona;?>,'<?php echo $foliosinceros;?>','<?php echo $clv;?>',<?php echo $anio;?>);" style="background-color: #414558; border-color: #414558; color: white; width: 350px;">    


              <input type="hidden" name="btnat" id="btnat">
               <input type="hidden" name="documentacion" id="documentacion">


            </div>
            <div class="col-md-4">&nbsp;</div>
            </div>
            </center>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
          
          </section> 
          </div>
          </div>
          </div>
    
         
                                    <div class="modal fade" id="exampleModalpopover">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Popover in a modal</h5>
                                                    <p>This <a href="#" role="button" data-container-fluid="body" data-toggle="popover" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a>                                                        triggers a popover on click.</p>
                                                    <hr>
                                                    <h5>Tooltips in a modal</h5>
                                                    <p><a href="#" class="tooltip-test text-primary" data-toggle="tooltip" title="Told you!">This link</a> and <a href="#" class="tooltip-test text-primary" data-toggle="tooltip" title="Another one!">that link</a>                                                        have tooltips on hover.</p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <div class="footer">
            <div class="copyright">
                <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
            </div>
            </div>
          </div>

     <!-- Required vendors -->
    <script src="<?php echo jsdict; ?>vendor/global/global.min.js"></script>
    <script src="<?php echo jsdict; ?>js/quixnav-init.js"></script>
    <script src="<?php echo jsdict; ?>js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="<?php echo jsdict; ?>vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/morris/morris.min.js"></script>


    <script src="<?php echo jsdict; ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?php echo jsdict; ?>vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="<?php echo jsdict; ?>vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo jsdict; ?>vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="<?php echo jsdict; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="<?php echo jsdict; ?>vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="<?php echo jsdict; ?>js/dashboard/dashboard-1.js"></script>



     <script src="<?php echo jsdict; ?>assets/js/lib/jquery.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo jsdict; ?>assets/js/lib/menubar/sidebar.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->

    <script src="<?php echo jsdict; ?>assets/js/lib/bootstrap.min.js"></script><script src="<?php echo jsdict; ?>assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/datatables-init.js"></script>
    
    
     <script type="text/javascript">
    function voidindex(){
    	location.href = "../../../../SeguimientoDictamen/1";
    }
        
    /*function void1(){
       
        location.href = "../SeguimientoDictamen/1";
    }*/

    function voidclose(){
        //alert("asdasd");
    	//location.href = "PadronDictaminadores";
    	$.post("../../../../../../acceso",{acceess:102},function(z){
			//alert(z);
			if( z == "23000" ){
				//alert(" usuario activo ");
			}else{
				
				location.href=z;				
			}			
		});
    }

    </script>
</body>

</html>
