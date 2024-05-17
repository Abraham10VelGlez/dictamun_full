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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../../../../../_js_dictaminador/_app11_especialistaregistrados.js"></script>
    <script type="text/javascript" src="../../../../../_js_dictaminador/_app12_especialistaregistrados.js"></script>

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
  <input type="hidden" id="gva" name="gva" value="<?php echo $foliodecarpeta; ?>"/>

  <input type="hidden" id="etapa" name="etapa" />
  <input type="hidden" id="idGRec" name="idGRec"/>
  <input type="hidden" id="idP" name="idP"/>
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
               <div style="color: black;" class="col-xl-3">Folio del Dictamen:<br>AD/<?php echo $foliosinceros; echo "/"; echo $anio; echo "/"; echo $clv;
 ?> <br></div>
               <div class="col-xl-6"><br><br><br><br>
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
                                                    <h6 class="mt-1 mb-1" id="alertaStatus2">Documentos guardados correctamente</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo2">En espera de que sea asignado un revisor.</p>
                                                    <center>
                                                    <input class="btn" type="submit" value="Finalizar" style="background-color: #414558; border-color: #414558; color: white;" onclick="finishdic();">
                                                  </center>

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
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Datos Generales</h4>
											<!-- Nav tabs -->
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-face-smile"></i></span> <span class="hidden-xs-down">Contribuyente</span></a> </li>
												<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Representante legal</span></a> </li>
												<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-star"></i></span> <span class="hidden-xs-down">Especialista Autorizado por el IGECEM</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#infoaditional" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-bookmark-alt"></i></span> <span class="hidden-xs-down">Información adicional</span></a> </li>
											</ul>
											<!-- Tab panes -->
											<div class="tab-content tabcontent-border">
												<div class="tab-pane active show" id="home" role="tabpanel">
													<div class="tab-pane  p-20">
                            <table class="table table-hover ">

                              <tbody>
                                <tr>
                                  <td style="color: black;">Nombre: </td>
                                  <td>
                                  <input id="nomC" type="text" name="nomC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                                  </td>
                                </tr>
                                <tr>
                                  <td style="color: black;">RFC: </td>
                                  <td>
                                  <input type="text" name="rfcC" id="rfcC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
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
												<div class="tab-pane  p-20" id="profile" role="tabpanel">
                          <table class="table table-hover ">

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

                            </tbody>
                          </table>
                        </div>
												<div class="tab-pane p-20" id="messages" role="tabpanel">
                          <table class="table table-hover ">

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
                        <div class="tab-pane p-20" id="infoaditional" role="tabpanel">
                          <table class="table table-hover">

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

                            </tbody>
                          </table>
                        </div>
											</div>
										</div>
									</div>
								</div>
            </div>







          <div class="row">




          <div class="col-lg-12">
          <div class="card">
          <div class="card-title">
          </div>
          <div class="card-body">
          <div class="table-responsive">
         <div class="col-md-12" id="prediosCla">
          <div class="container-fluid">

            <CENTER>
            <br><br>
                  <h3 style="text-align: center; font-weight: bold;">Selecciona un tipo de Predio</h3>
                  <br><br>
            </CENTER>

           <div id="combofisico" class="col-lg-12 ">
           <div class="row ">
          <div class="col-md-3"> &nbsp; </div>
          <div class="col-md-3">
            <center>
            <input type="radio" id="baldio" name="prediofff" value="1" onclick="baldio();"  style="border: 1px;width: 23%;height: 2em;" >
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio baldío.</label>
            <input type="hidden" id="prebaldio" name="prebaldio" value="" >
            </center>
          </div>

          <div class="col-md-3">
           <center>
            <input type="radio" id="construccion" name="prediofff" value="2" onclick="construccion();"  style="border: 1px;width: 23%;height: 2em;">
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            <input type="hidden" id="preconstruido" name="preconstruido" value="" >
            </center>
          </div>
          <div class="col-md-3"> &nbsp; </div>
          </div>
          </div>



          <div id="combomoral" class="col-lg-12 ">
           <div class="row ">
          <div class="col-md-3"> &nbsp; </div>
          <div class="col-md-3">
            <center>
            <input type="radio" id="baldio" name="prediommm" value="1" onclick="baldio_new();"  style="border: 1px;width: 23%;height: 2em;" >
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio baldío.</label>
            <input type="hidden" id="prebaldiommm" name="prebaldiommm" value="" >
            </center>
          </div>

          <div class="col-md-3">
           <center>
            <input type="radio" id="construccion" name="prediommm" value="2" onclick="construccion_new();"  style="border: 1px;width: 23%;height: 2em;">
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            <input type="hidden" id="preconstruidomx" name="preconstruidomx" value="" >
            </center>
          </div>
          <div class="col-md-3"> &nbsp; </div>
          </div>
          </div>








          </div>
          </div>

              	<div id="xcod" class="col-sm-12 " style="">
    	<CENTER>
        <br><br>
    	<br><br>
            <h3 style="text-align: center; font-weight: bold;">Almacenamiento de documentos requeridos para el dictamen</h3>
            <br><br>
    	</CENTER>
           <table class="table table-striped" style="color: black; ">




        <tbody id="docxs_f" >
        <tr>
            <th style="text-align: center; background-color: #d0d8f3;">Lista de Documentos</th>
            <th style="text-align: center; background-color: #d0d8f3;">Cargar Documento</th>
            <th style="text-align: center; background-color: #d0d8f3;">Documento Guardado</th>
            <th style="text-align: center; background-color: #d0d8f3;">Comentario</th>
            <th style="text-align: center; background-color: #d0d8f3;">Corregir</th>
        </tr>




        <tr>


            <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message14']) && $_SESSION['message14'])
    {
      printf('<b>%s</b>', $_SESSION['message14']);
      unset($_SESSION['message14']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
      <input type="hidden" id="documents" name="documents" value="14">
      <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">

      <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;" />
  </form>
  </center>
            </td>
            <td style="text-align: center;">

            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file1">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment1" name="ficoment1" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">

            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file1delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>

  </a>
            </div>
            </td>

        </tr>

        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message10']) && $_SESSION['message10'])
    {
      printf('<b>%s</b>', $_SESSION['message10']);
      unset($_SESSION['message10']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="10">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">

            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file2">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment2" name="ficoment2" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file2delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>

  </a>
            </div>
            </td>

        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message11']) && $_SESSION['message11'])
    {
      printf('<b>%s</b>', $_SESSION['message11']);
      unset($_SESSION['message11']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="11">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file3">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment3" name="ficoment3" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file3delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>

  </a>
            </div>
            </td>

        </tr>























      <tr>
        <td>Escritura pública o Título de propiedad.</td>
       <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message99']) && $_SESSION['message99'])
    {
      printf('<b>%s</b>', $_SESSION['message99']);
      unset($_SESSION['message99']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
        <input type="hidden" id="documents" name="documents" value="99">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file4">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment4" name="ficoment4" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file4delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Boleta Predial.</td>

                <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message98']) && $_SESSION['message98'])
    {
      printf('<b>%s</b>', $_SESSION['message98']);
      unset($_SESSION['message98']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="98">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file5">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg98']) && $_SESSION['filenameavg98'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg98']);
      unset($_SESSION['filenameavg98']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment5" name="ficoment5" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file5delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg98']) && $_SESSION['filenameavg98'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg98']);
      unset($_SESSION['filenameavg98']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Documento que acredite la propiedad.</td>


              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message83']) && $_SESSION['message83'])
    {
      printf('<b>%s</b>', $_SESSION['message83']);
      unset($_SESSION['message83']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="83">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file6">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg83']) && $_SESSION['filenameavg83'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg83']);
      unset($_SESSION['filenameavg83']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment6" name="ficoment6" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file6delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg83']) && $_SESSION['filenameavg83'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg83']);
      unset($_SESSION['filenameavg83']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>








































       <tr>
        <td>Identificación Oficial del propietario o representante legal  </td>
              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message97']) && $_SESSION['message97'])
    {
      printf('<b>%s</b>', $_SESSION['message97']);
      unset($_SESSION['message97']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="97">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file7">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg97']) && $_SESSION['filenameavg97'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg97']);
      unset($_SESSION['filenameavg97']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment7" name="ficoment7" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file7delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg97']) && $_SESSION['filenameavg97'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg97']);
      unset($_SESSION['filenameavg97']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
             <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message96']) && $_SESSION['message96'])
    {
      printf('<b>%s</b>', $_SESSION['message96']);
      unset($_SESSION['message96']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="96">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file8">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg96']) && $_SESSION['filenameavg96'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg96']);
      unset($_SESSION['filenameavg96']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment8" name="ficoment8" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file8delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg96']) && $_SESSION['filenameavg96'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg96']);
      unset($_SESSION['filenameavg96']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Croquis de Localización.</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message95']) && $_SESSION['message95'])
    {
      printf('<b>%s</b>', $_SESSION['message95']);
      unset($_SESSION['message95']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="95">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
    <br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file9">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg95']) && $_SESSION['filenameavg95'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg95']);
      unset($_SESSION['filenameavg95']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment9" name="ficoment9" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file9delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg95']) && $_SESSION['filenameavg95'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg95']);
      unset($_SESSION['filenameavg95']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>






































      <tr>
        <td>Plano arquitectónico o croquis de construcción.</td>

              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message82']) && $_SESSION['message82'])
    {
      printf('<b>%s</b>', $_SESSION['message82']);
      unset($_SESSION['message82']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="82">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file10">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg82']) && $_SESSION['filenameavg82'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg82']);
      unset($_SESSION['filenameavg82']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment10" name="ficoment10" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file10delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg82']) && $_SESSION['filenameavg82'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg82']);
      unset($_SESSION['filenameavg82']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>

        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message81']) && $_SESSION['message81'])
    {
      printf('<b>%s</b>', $_SESSION['message81']);
      unset($_SESSION['message81']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="81">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file11">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg81']) && $_SESSION['filenameavg81'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg81']);
      unset($_SESSION['filenameavg81']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment11" name="ficoment11" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file11delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg81']) && $_SESSION['filenameavg81'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg81']);
      unset($_SESSION['filenameavg81']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las diferentes superficies constructivas.</td>

        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message80']) && $_SESSION['message80'])
    {
      printf('<b>%s</b>', $_SESSION['message80']);
      unset($_SESSION['message80']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="80">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file12">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg80']) && $_SESSION['filenameavg80'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg80']);
      unset($_SESSION['filenameavg80']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment12" name="ficoment12" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file12delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg80']) && $_SESSION['filenameavg80'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg80']);
      unset($_SESSION['filenameavg80']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>





























      <tr>
        <td>Planos de Factores.</td>
              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message79']) && $_SESSION['message79'])
    {
      printf('<b>%s</b>', $_SESSION['message79']);
      unset($_SESSION['message79']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="79">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file13">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg79']) && $_SESSION['filenameavg79'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg79']);
      unset($_SESSION['filenameavg79']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment13" name="ficoment13" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file13delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg79']) && $_SESSION['filenameavg79'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg79']);
      unset($_SESSION['filenameavg79']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Relación de indivisos de Condominios.</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message15']) && $_SESSION['message15'])
    {
      printf('<b>%s</b>', $_SESSION['message15']);
      unset($_SESSION['message15']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="15">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file14">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment14" name="ficoment14" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file14delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Otros.</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message94']) && $_SESSION['message94'])
    {
      printf('<b>%s</b>', $_SESSION['message94']);
      unset($_SESSION['message94']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="94">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file15">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg94']) && $_SESSION['filenameavg94'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg94']);
      unset($_SESSION['filenameavg94']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment15" name="ficoment15" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file15delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg94']) && $_SESSION['filenameavg94'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg94']);
      unset($_SESSION['filenameavg94']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>













      <tr>
        <div id="fachadaBal">
        <td id="titFachada" >Imagen de Fachada</td>
                    <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message120']) && $_SESSION['message120'])
    {
      printf('<b>%s</b>', $_SESSION['message120']);
      unset($_SESSION['message120']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="120">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file16">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg120']) && $_SESSION['filenameavg120'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg120']);
      unset($_SESSION['filenameavg120']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment16" name="ficoment16" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file16delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg120']) && $_SESSION['filenameavg120'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg120']);
      unset($_SESSION['filenameavg120']);
    }
  ?>

  </a>
            </div>
            </td>
            </div>
      </tr>


    </tbody>
    <!--FIN DE PREDIO BALDIO 123 -->
    <!--INICIO  DE PREDIO CONSTRUIDO 345-->
     <tbody id="docxs_m" >
    <tr>
            <th style="text-align: center; background-color: #d0d8f3;">Lista de Documentos</th>
            <th style="text-align: center; background-color: #d0d8f3;">Cargar Documento</th>
            <th style="text-align: center; background-color: #d0d8f3;">Documento Guardado</th>
            <th style="text-align: center; background-color: #d0d8f3;">Comentario</th>
            <th style="text-align: center; background-color: #d0d8f3;">Corregir</th>
        </tr>



        <tr>


            <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm14']) && $_SESSION['messagemm14'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm14']);
      unset($_SESSION['messagemm14']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
      <input type="hidden" id="documents" name="documents" value="14">
      <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">

      <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            </td>
            <td style="text-align: center;">

            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file18">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm14']) && $_SESSION['filenameavgmm14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm14']);
      unset($_SESSION['filenameavgmm14']);
    }
  ?>

  </a>
            </div>
            </td>

     <td align="center"><textarea id="ficoment18" name="ficoment18" placeholder="Escribir algun comentario" ></textarea></td>

     <td style="text-align: center;">

            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file18delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm14']) && $_SESSION['filenameavgmm14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm14']);
      unset($_SESSION['filenameavgmm14']);
    }
  ?>

  </a>
            </div>
            </td>

        </tr>

        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm10']) && $_SESSION['messagemm10'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm10']);
      unset($_SESSION['messagemm10']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="10">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">

            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file19">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm10']) && $_SESSION['filenameavgmm10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm10']);
      unset($_SESSION['filenameavgmm10']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment19" name="ficoment19" placeholder="Escribir algun comentario" ></textarea></td>

     <td style="text-align: center;">


            <div id="file19delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm10']) && $_SESSION['filenameavgmm10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm10']);
      unset($_SESSION['filenameavgmm10']);
    }
  ?>

  </a>
            </div>
            </td>

        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm11']) && $_SESSION['messagemm11'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm11']);
      unset($_SESSION['messagemm11']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="11">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file20">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm11']) && $_SESSION['filenameavgmm11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm11']);
      unset($_SESSION['filenameavgmm11']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment20" name="ficoment20" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file20delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm11']) && $_SESSION['filenameavgmm11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm11']);
      unset($_SESSION['filenameavgmm11']);
    }
  ?>

  </a>
            </div>
            </td>

        </tr>















           <tr>
        <td>Escritura pública o Título de propiedad.</td>
       <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message99']) && $_SESSION['message99'])
    {
      printf('<b>%s</b>', $_SESSION['message99']);
      unset($_SESSION['message99']);
    }
  ?>
  <form method="POST" action="../../../../../loading/load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="99">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file4fisicopredioconstruido">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment4fc" name="ficoment4fc" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file4deletefisicopredioconstruido">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>


      <tr>
        <td>Boleta Predial</td>

        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm88']) && $_SESSION['messagemm88'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm88']);
      unset($_SESSION['messagemm88']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="88">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file23">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm88']) && $_SESSION['filenameavgmm88'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm88']);
      unset($_SESSION['filenameavgmm88']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment23" name="ficoment23" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file23delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm88']) && $_SESSION['filenameavgmm88'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm88']);
      unset($_SESSION['filenameavgmm88']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>









































       <tr>
        <td>Documento que acredite la propiedad</td>
             <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm78']) && $_SESSION['messagemm78'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm78']);
      unset($_SESSION['messagemm78']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="78">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file24">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm78']) && $_SESSION['filenameavgmm78'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm78']);
      unset($_SESSION['filenameavgmm78']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment24" name="ficoment24" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file24delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm78']) && $_SESSION['filenameavgmm78'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm78']);
      unset($_SESSION['filenameavgmm78']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Identificación Oficial del propietario o representante legal</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm87']) && $_SESSION['messagemm87'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm87']);
      unset($_SESSION['messagemm87']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="87">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file25">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm87']) && $_SESSION['filenameavgmm87'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm87']);
      unset($_SESSION['filenameavgmm87']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment25" name="ficoment25" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file25delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm87']) && $_SESSION['filenameavgmm87'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm87']);
      unset($_SESSION['filenameavgmm87']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>
      <tr>
        <td>Plano ó Croquis del terreno (medidas y colindancias)</td>
           <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm86']) && $_SESSION['messagemm86'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm86']);
      unset($_SESSION['messagemm86']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="86">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file26">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm86']) && $_SESSION['filenameavgmm86'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm86']);
      unset($_SESSION['filenameavgmm86']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment26" name="ficoment26" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file26delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm86']) && $_SESSION['filenameavgmm86'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm86']);
      unset($_SESSION['filenameavgmm86']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>






































      <tr>
        <td>Croquis de Localización</td>

            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm85']) && $_SESSION['messagemm85'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm85']);
      unset($_SESSION['messagemm85']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="85">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file27">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm85']) && $_SESSION['filenameavgmm85'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm85']);
      unset($_SESSION['filenameavgmm85']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment27" name="ficoment27" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file27delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm85']) && $_SESSION['filenameavgmm85'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm85']);
      unset($_SESSION['filenameavgmm85']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>
      <tr>
        <td>Otros</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm84']) && $_SESSION['messagemm84'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm84']);
      unset($_SESSION['messagemm84']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="84">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file28">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm84']) && $_SESSION['filenameavgmm84'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm84']);
      unset($_SESSION['filenameavgmm84']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment28" name="ficoment28" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file28delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm84']) && $_SESSION['filenameavgmm84'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm84']);
      unset($_SESSION['filenameavgmm84']);
    }
  ?>

  </a>
            </div>
            </td>


      </tr>
      <tr>
        <td>Relación de indivisos de Condominio</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm15']) && $_SESSION['messagemm15'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm15']);
      unset($_SESSION['messagemm15']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="15">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file29">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm15']) && $_SESSION['filenameavgmm15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm15']);
      unset($_SESSION['filenameavgmm15']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment29" name="ficoment29" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file29delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm15']) && $_SESSION['filenameavgmm15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm15']);
      unset($_SESSION['filenameavgmm15']);
    }
  ?>

  </a>
            </div>
            </td>


      </tr>
      <tr>
        <td>Plano arquitectónico o croquis de construcción</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm77']) && $_SESSION['messagemm77'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm77']);
      unset($_SESSION['messagemm77']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="77">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file30">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm77']) && $_SESSION['filenameavgmm77'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm77']);
      unset($_SESSION['filenameavgmm77']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment30" name="ficoment30" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file30delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm77']) && $_SESSION['filenameavgmm77'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm77']);
      unset($_SESSION['filenameavgmm77']);
    }
  ?>

  </a>
            </div>
            </td>



      </tr>





























      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm76']) && $_SESSION['messagemm76'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm76']);
      unset($_SESSION['messagemm76']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="76">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file31">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm76']) && $_SESSION['filenameavgmm76'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm76']);
      unset($_SESSION['filenameavgmm76']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment31" name="ficoment31" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file31delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm76']) && $_SESSION['filenameavgmm76'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm76']);
      unset($_SESSION['filenameavgmm76']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las diferentes superficies constructivas</td>
           <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm75']) && $_SESSION['messagemm75'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm75']);
      unset($_SESSION['messagemm75']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="75">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file32">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm75']) && $_SESSION['filenameavgmm75'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm75']);
      unset($_SESSION['filenameavgmm75']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment32" name="ficoment32" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file32delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm75']) && $_SESSION['filenameavgmm75'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm75']);
      unset($_SESSION['filenameavgmm75']);
    }
  ?>

  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Planos de Factores</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm74']) && $_SESSION['messagemm74'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm74']);
      unset($_SESSION['messagemm74']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="74">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file33">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm74']) && $_SESSION['filenameavgmm74'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm74']);
      unset($_SESSION['filenameavgmm74']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment33" name="ficoment33" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file33delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm74']) && $_SESSION['filenameavgmm74'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm74']);
      unset($_SESSION['filenameavgmm74']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>
      <tr id="imgaenmoral">
        <td>Imagen de Fachada</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['messagemm121']) && $_SESSION['messagemm121'])
    {
      printf('<b>%s</b>', $_SESSION['messagemm121']);
      unset($_SESSION['messagemm121']);
    }
  ?>
  <form method="POST" action="../../../../../loading/loadmm" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="120">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>

            </td>
            <td style="text-align: center;">


            <div id="file34">

            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm121']) && $_SESSION['filenameavgmm121'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm121']);
      unset($_SESSION['filenameavgmm121']);
    }
  ?>

  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment34" name="ficoment34" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

     <td style="text-align: center;">


            <div id="file34delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavgmm121']) && $_SESSION['filenameavgmm121'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavgmm121']);
      unset($_SESSION['filenameavgmm121']);
    }
  ?>

  </a>
            </div>
            </td>

      </tr>


    </tbody>
    <tbody id="docxs_prediobaldiof" ><tr>
    <th style="text-align: center; background-color: #d0d8f3;">Lista de Documentos</th>
    <th style="text-align: center; background-color: #d0d8f3;">Cargar Documento</th>
    <th style="text-align: center; background-color: #d0d8f3;">Documento Guardado</th>
    <th style="text-align: center; background-color: #d0d8f3;">Comentario</th>
    <th style="text-align: center; background-color: #d0d8f3;">Corregir</th>
</tr>




<tr>


    <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral14']) && $_SESSION['messagebaldiomoral14'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral14']);
unset($_SESSION['messagebaldiomoral14']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="14">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">

<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>
    </td>
    <td style="text-align: center;">

    <input type="hidden" id="okfmx" name="okfmx" value="_">
    <div id="filebaldiom1">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral14']) && $_SESSION['filenameavgbaldiomoral14'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral14']);
unset($_SESSION['filenameavgbaldiomoral14']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment1b" name="ficoment1b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">

    <input type="hidden" id="okfmx" name="okfmx" value="_">
    <div id="filebaldiom1delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral14']) && $_SESSION['filenameavgbaldiomoral14'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral14']);
unset($_SESSION['filenameavgbaldiomoral14']);
}
?>

</a>
    </div>
    </td>

</tr>

<tr>
    <td>Archivo de  Avaluos.val de dictaval</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral10']) && $_SESSION['messagebaldiomoral10'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral10']);
unset($_SESSION['messagebaldiomoral10']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="10">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">

    <input type="hidden" id="okfmx" name="okfmx" value="_">
    <div id="filebaldiom2">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral10']) && $_SESSION['filenameavgbaldiomoral10'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral10']);
unset($_SESSION['filenameavgbaldiomoral10']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment2b" name="ficoment2b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom2delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral10']) && $_SESSION['filenameavgbaldiomoral10'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral10']);
unset($_SESSION['filenameavgbaldiomoral10']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
    <td>Archivo de Construcciones.val dictaval</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral11']) && $_SESSION['messagebaldiomoral11'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral11']);
unset($_SESSION['messagebaldiomoral11']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="11">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom3">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral11']) && $_SESSION['filenameavgbaldiomoral11'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral11']);
unset($_SESSION['filenameavgbaldiomoral11']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment3b" name="ficoment3b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom3delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral11']) && $_SESSION['filenameavgbaldiomoral11'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral11']);
unset($_SESSION['filenameavgbaldiomoral11']);
}
?>

</a>
    </div>
    </td>

</tr>







<!-- moral predio baldio 987 -->
<tr>
<td>Acta Constitutiva de la Empresa</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoralmm90']) && $_SESSION['messagebaldiomoralmm90'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoralmm90']);
unset($_SESSION['messagebaldiomoralmm90']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="90">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom21">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoralmm90']) && $_SESSION['filenameavgbaldiomoralmm90'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoralmm90']);
unset($_SESSION['filenameavgbaldiomoralmm90']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment21" name="ficoment21" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom21delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoralmm90']) && $_SESSION['filenameavgbaldiomoralmm90'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoralmm90']);
unset($_SESSION['filenameavgbaldiomoralmm90']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Nombramiento del Representante legal</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoralmm89']) && $_SESSION['messagebaldiomoralmm89'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoralmm89']);
unset($_SESSION['messagebaldiomoralmm89']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="89">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom22">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoralmm89']) && $_SESSION['filenameavgbaldiomoralmm89'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoralmm89']);
unset($_SESSION['filenameavgbaldiomoralmm89']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment22" name="ficoment22" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom22delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoralmm89']) && $_SESSION['filenameavgbaldiomoralmm89'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoralmm89']);
unset($_SESSION['filenameavgbaldiomoralmm89']);
}
?>

</a>
    </div>
    </td>

</tr>

<tr>
<td>Boleta Predial.</td>

        <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral98']) && $_SESSION['messagebaldiomoral98'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral98']);
unset($_SESSION['messagebaldiomoral98']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="98">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom5">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral98']) && $_SESSION['filenameavgbaldiomoral98'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral98']);
unset($_SESSION['filenameavgbaldiomoral98']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment5b" name="ficoment5b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom5delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral98']) && $_SESSION['filenameavgbaldiomoral98'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral98']);
unset($_SESSION['filenameavgbaldiomoral98']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Documento que acredite la propiedad.</td>


      <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral83']) && $_SESSION['messagebaldiomoral83'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral83']);
unset($_SESSION['messagebaldiomoral83']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="83">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom6">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral83']) && $_SESSION['filenameavgbaldiomoral83'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral83']);
unset($_SESSION['filenameavgbaldiomoral83']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment6b" name="ficoment6b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom6delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral83']) && $_SESSION['filenameavgbaldiomoral83'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral83']);
unset($_SESSION['filenameavgbaldiomoral83']);
}
?>

</a>
    </div>
    </td>
</tr>








































<tr>
<td>Identificación Oficial del propietario o representante legal  </td>
      <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral97']) && $_SESSION['messagebaldiomoral97'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral97']);
unset($_SESSION['messagebaldiomoral97']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="97">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom7">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral97']) && $_SESSION['filenameavgbaldiomoral97'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral97']);
unset($_SESSION['filenameavgbaldiomoral97']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment7b" name="ficoment7b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom7delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral97']) && $_SESSION['filenameavgbaldiomoral97'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral97']);
unset($_SESSION['filenameavgbaldiomoral97']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Plano o Croquis del terreno con medidas y colindancias.</td>
     <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral96']) && $_SESSION['messagebaldiomoral96'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral96']);
unset($_SESSION['messagebaldiomoral96']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="96">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom8">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral96']) && $_SESSION['filenameavgbaldiomoral96'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral96']);
unset($_SESSION['filenameavgbaldiomoral96']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment8b" name="ficoment8b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom8delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral96']) && $_SESSION['filenameavgbaldiomoral96'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral96']);
unset($_SESSION['filenameavgbaldiomoral96']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Croquis de Localización.</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral95']) && $_SESSION['messagebaldiomoral95'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral95']);
unset($_SESSION['messagebaldiomoral95']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="95">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom9">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral95']) && $_SESSION['filenameavgbaldiomoral95'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral95']);
unset($_SESSION['filenameavgbaldiomoral95']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment9b" name="ficoment9b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom9delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral95']) && $_SESSION['filenameavgbaldiomoral95'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral95']);
unset($_SESSION['filenameavgbaldiomoral95']);
}
?>

</a>
    </div>
    </td>
</tr>






































<tr>
<td>Plano arquitectónico o croquis de construcción.</td>

      <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral82']) && $_SESSION['messagebaldiomoral82'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral82']);
unset($_SESSION['messagebaldiomoral82']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="82">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom10">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral82']) && $_SESSION['filenameavgbaldiomoral82'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral82']);
unset($_SESSION['filenameavgbaldiomoral82']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment10b" name="ficoment10b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom10delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral82']) && $_SESSION['filenameavgbaldiomoral82'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral82']);
unset($_SESSION['filenameavgbaldiomoral82']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>

<td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral81']) && $_SESSION['messagebaldiomoral81'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral81']);
unset($_SESSION['messagebaldiomoral81']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="81">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom11">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral81']) && $_SESSION['filenameavgbaldiomoral81'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral81']);
unset($_SESSION['filenameavgbaldiomoral81']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment11b" name="ficoment11b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom11delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral81']) && $_SESSION['filenameavgbaldiomoral81'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral81']);
unset($_SESSION['filenameavgbaldiomoral81']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Plano del conjunto donde señalan las diferentes superficies constructivas.</td>

<td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral80']) && $_SESSION['messagebaldiomoral80'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral80']);
unset($_SESSION['messagebaldiomoral80']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="80">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom12">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral80']) && $_SESSION['filenameavgbaldiomoral80'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral80']);
unset($_SESSION['filenameavgbaldiomoral80']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment12b" name="ficoment12b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom12delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral80']) && $_SESSION['filenameavgbaldiomoral80'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral80']);
unset($_SESSION['filenameavgbaldiomoral80']);
}
?>

</a>
    </div>
    </td>

</tr>





























<tr>
<td>Planos de Factores.</td>
      <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral79']) && $_SESSION['messagebaldiomoral79'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral79']);
unset($_SESSION['messagebaldiomoral79']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="79">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom13">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral79']) && $_SESSION['filenameavgbaldiomoral79'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral79']);
unset($_SESSION['filenameavgbaldiomoral79']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment13b" name="ficoment13b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom13delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral79']) && $_SESSION['filenameavgbaldiomoral79'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral79']);
unset($_SESSION['filenameavgbaldiomoral79']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Relación de indivisos de Condominios.</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral15']) && $_SESSION['messagebaldiomoral15'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral15']);
unset($_SESSION['messagebaldiomoral15']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="15">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom14">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral15']) && $_SESSION['filenameavgbaldiomoral15'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral15']);
unset($_SESSION['filenameavgbaldiomoral15']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment14b" name="ficoment14b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom14delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral15']) && $_SESSION['filenameavgbaldiomoral15'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral15']);
unset($_SESSION['filenameavgbaldiomoral15']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Otros.</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral94']) && $_SESSION['messagebaldiomoral94'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral94']);
unset($_SESSION['messagebaldiomoral94']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="94">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom15">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral94']) && $_SESSION['filenameavgbaldiomoral94'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral94']);
unset($_SESSION['filenameavgbaldiomoral94']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment15b" name="ficoment15b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom15delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral94']) && $_SESSION['filenameavgbaldiomoral94'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral94']);
unset($_SESSION['filenameavgbaldiomoral94']);
}
?>

</a>
    </div>
    </td>

</tr>













<tr>
<td id="titFachada" >Imagen de Fachada</td>
            <td >
      <center>

       <?php
if (isset($_SESSION['messagebaldiomoral120']) && $_SESSION['messagebaldiomoral120'])
{
printf('<b>%s</b>', $_SESSION['messagebaldiomoral120']);
unset($_SESSION['messagebaldiomoral120']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="120">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom16">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral120']) && $_SESSION['filenameavgbaldiomoral120'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral120']);
unset($_SESSION['filenameavgbaldiomoral120']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment16b" name="ficoment16b" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom16delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgbaldiomoral120']) && $_SESSION['filenameavgbaldiomoral120'])
{
printf('<b>%s</b>', $_SESSION['filenameavgbaldiomoral120']);
unset($_SESSION['filenameavgbaldiomoral120']);
}
?>

</a>
    </div>
    </td>
</tr>


</tbody>

<tbody id="docxs_predioconstrm" >
<tr>
    <th style="text-align: center; background-color: #d0d8f3;">Lista de Documentos</th>
    <th style="text-align: center; background-color: #d0d8f3;">Cargar Documento</th>
    <th style="text-align: center; background-color: #d0d8f3;">Documento Guardado</th>
    <th style="text-align: center; background-color: #d0d8f3;">Comentario</th>
    <th style="text-align: center; background-color: #d0d8f3;">Corregir</th>
</tr>



<tr>


    <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral14']) && $_SESSION['messageconstruidomoral14'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral14']);
unset($_SESSION['messageconstruidomoral14']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="14">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">

<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>
    </td>
    <td style="text-align: center;">

    <input type="hidden" id="okfmx" name="okfmx" value="_">
    <div id="filebaldiom18">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral14']) && $_SESSION['filenameavgconstrumoral14'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral14']);
unset($_SESSION['filenameavgconstrumoral14']);
}
?>

</a>
    </div>
    </td>

<td align="center"><textarea id="ficoment18m" name="ficoment18m" placeholder="Escribir algun comentario" ></textarea></td>

<td style="text-align: center;">

    <input type="hidden" id="okfmx" name="okfmx" value="_">
    <div id="filebaldiom18delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral14']) && $_SESSION['filenameavgconstrumoral14'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral14']);
unset($_SESSION['filenameavgconstrumoral14']);
}
?>

</a>
    </div>
    </td>

</tr>

<tr>
    <td>Archivo de  Avaluos.val de dictaval</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral10']) && $_SESSION['messageconstruidomoral10'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral10']);
unset($_SESSION['messageconstruidomoral10']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="10">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">

    <input type="hidden" id="okfmx" name="okfmx" value="_">
    <div id="filebaldiom19">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral10']) && $_SESSION['filenameavgconstrumoral10'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral10']);
unset($_SESSION['filenameavgconstrumoral10']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment19m" name="ficoment19m" placeholder="Escribir algun comentario" ></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom19delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral10']) && $_SESSION['filenameavgconstrumoral10'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral10']);
unset($_SESSION['filenameavgconstrumoral10']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
    <td>Archivo de Construcciones.val dictaval</td>
    <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral11']) && $_SESSION['messageconstruidomoral11'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral11']);
unset($_SESSION['messageconstruidomoral11']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="11">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom20">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral11']) && $_SESSION['filenameavgconstrumoral11'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral11']);
unset($_SESSION['filenameavgconstrumoral11']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment20m" name="ficoment20m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom20delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral11']) && $_SESSION['filenameavgconstrumoral11'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral11']);
unset($_SESSION['filenameavgconstrumoral11']);
}
?>

</a>
    </div>
    </td>

</tr>

















<tr>
<td>Acta Constitutiva de la Empresa</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral90']) && $_SESSION['messageconstruidomoral90'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral90']);
unset($_SESSION['messageconstruidomoral90']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="90">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom21xtr">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral90']) && $_SESSION['filenameavgconstrumoral90'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral90']);
unset($_SESSION['filenameavgconstrumoral90']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment21m" name="ficoment21m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom21deletextr">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral90']) && $_SESSION['filenameavgconstrumoral90'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral90']);
unset($_SESSION['filenameavgconstrumoral90']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Nombramiento del Representante legal</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral89']) && $_SESSION['messageconstruidomoral89'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral89']);
unset($_SESSION['messageconstruidomoral89']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="89">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom22xtr">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral89']) && $_SESSION['filenameavgconstrumoral89'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral89']);
unset($_SESSION['filenameavgconstrumoral89']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment22m" name="ficoment22m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom22deletextr">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral89']) && $_SESSION['filenameavgconstrumoral89'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral89']);
unset($_SESSION['filenameavgconstrumoral89']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Boleta Predial</td>

<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral88']) && $_SESSION['messageconstruidomoral88'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral88']);
unset($_SESSION['messageconstruidomoral88']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="88">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom23">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral88']) && $_SESSION['filenameavgconstrumoral88'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral88']);
unset($_SESSION['filenameavgconstrumoral88']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment23m" name="ficoment23m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom23delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral88']) && $_SESSION['filenameavgconstrumoral88'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral88']);
unset($_SESSION['filenameavgconstrumoral88']);
}
?>

</a>
    </div>
    </td>

</tr>









































<tr>
<td>Documento que acredite la propiedad</td>
     <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral78']) && $_SESSION['messageconstruidomoral78'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral78']);
unset($_SESSION['messageconstruidomoral78']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="78">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom24">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral78']) && $_SESSION['filenameavgconstrumoral78'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral78']);
unset($_SESSION['filenameavgconstrumoral78']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment24m" name="ficoment24m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom24delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral78']) && $_SESSION['filenameavgconstrumoral78'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral78']);
unset($_SESSION['filenameavgconstrumoral78']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Identificación Oficial del propietario o representante legal</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral87']) && $_SESSION['messageconstruidomoral87'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral87']);
unset($_SESSION['messageconstruidomoral87']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="87">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom25">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral87']) && $_SESSION['filenameavgconstrumoral87'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral87']);
unset($_SESSION['filenameavgconstrumoral87']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment25m" name="ficoment25m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom25delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral87']) && $_SESSION['filenameavgconstrumoral87'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral87']);
unset($_SESSION['filenameavgconstrumoral87']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Plano ó Croquis del terreno (medidas y colindancias)</td>
   <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral86']) && $_SESSION['messageconstruidomoral86'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral86']);
unset($_SESSION['messageconstruidomoral86']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="86">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom26">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral86']) && $_SESSION['filenameavgconstrumoral86'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral86']);
unset($_SESSION['filenameavgconstrumoral86']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment26m" name="ficoment26m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom26delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral86']) && $_SESSION['filenameavgconstrumoral86'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral86']);
unset($_SESSION['filenameavgconstrumoral86']);
}
?>

</a>
    </div>
    </td>
</tr>






































<tr>
<td>Croquis de Localización</td>

    <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral85']) && $_SESSION['messageconstruidomoral85'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral85']);
unset($_SESSION['messageconstruidomoral85']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="85">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom27">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral85']) && $_SESSION['filenameavgconstrumoral85'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral85']);
unset($_SESSION['filenameavgconstrumoral85']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment27m" name="ficoment27m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom27delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral85']) && $_SESSION['filenameavgconstrumoral85'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral85']);
unset($_SESSION['filenameavgconstrumoral85']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Otros</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral84']) && $_SESSION['messageconstruidomoral84'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral84']);
unset($_SESSION['messageconstruidomoral84']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="84">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom28">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral84']) && $_SESSION['filenameavgconstrumoral84'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral84']);
unset($_SESSION['filenameavgconstrumoral84']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment28m" name="ficoment28m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom28delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral84']) && $_SESSION['filenameavgconstrumoral84'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral84']);
unset($_SESSION['filenameavgconstrumoral84']);
}
?>

</a>
    </div>
    </td>


</tr>
<tr>
<td>Relación de indivisos de Condominio</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral15']) && $_SESSION['messageconstruidomoral15'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral15']);
unset($_SESSION['messageconstruidomoral15']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="15">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom29">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral15']) && $_SESSION['filenameavgconstrumoral15'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral15']);
unset($_SESSION['filenameavgconstrumoral15']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment29m" name="ficoment29m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom29delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral15']) && $_SESSION['filenameavgconstrumoral15'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral15']);
unset($_SESSION['filenameavgconstrumoral15']);
}
?>

</a>
    </div>
    </td>


</tr>
<tr>
<td>Plano arquitectónico o croquis de construcción</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral77']) && $_SESSION['messageconstruidomoral77'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral77']);
unset($_SESSION['messageconstruidomoral77']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="77">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom30">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral77']) && $_SESSION['filenameavgconstrumoral77'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral77']);
unset($_SESSION['filenameavgconstrumoral77']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment30m" name="ficoment30m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom30delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral77']) && $_SESSION['filenameavgconstrumoral77'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral77']);
unset($_SESSION['filenameavgconstrumoral77']);
}
?>

</a>
    </div>
    </td>



</tr>





























<tr>
<td>Plano arquitectónico contenido edificaciones de su uso privativo</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral76']) && $_SESSION['messageconstruidomoral76'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral76']);
unset($_SESSION['messageconstruidomoral76']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="76">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom31">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral76']) && $_SESSION['filenameavgconstrumoral76'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral76']);
unset($_SESSION['filenameavgconstrumoral76']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment31m" name="ficoment31m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom31delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral76']) && $_SESSION['filenameavgconstrumoral76'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral76']);
unset($_SESSION['filenameavgconstrumoral76']);
}
?>

</a>
    </div>
    </td>

</tr>
<tr>
<td>Plano del conjunto donde señalan las diferentes superficies constructivas</td>
   <td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral75']) && $_SESSION['messageconstruidomoral75'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral75']);
unset($_SESSION['messageconstruidomoral75']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="75">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom32">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral75']) && $_SESSION['filenameavgconstrumoral75'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral75']);
unset($_SESSION['filenameavgconstrumoral75']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment32m" name="ficoment32m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom32delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral75']) && $_SESSION['filenameavgconstrumoral75'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral75']);
unset($_SESSION['filenameavgconstrumoral75']);
}
?>

</a>
    </div>
    </td>
</tr>
<tr>
<td>Planos de Factores</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral74']) && $_SESSION['messageconstruidomoral74'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral74']);
unset($_SESSION['messageconstruidomoral74']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="74">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>
<br>
<input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom33">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral74']) && $_SESSION['filenameavgconstrumoral74'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral74']);
unset($_SESSION['filenameavgconstrumoral74']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment33m" name="ficoment33m" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom33delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral74']) && $_SESSION['filenameavgconstrumoral74'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral74']);
unset($_SESSION['filenameavgconstrumoral74']);
}
?>

</a>
    </div>
    </td>

</tr>
<!--tr id="imgaenmoral">
<td>Imagen de Fachada</td>
<td >
      <center>

       <?php
if (isset($_SESSION['messageconstruidomoral121']) && $_SESSION['messageconstruidomoral121'])
{
printf('<b>%s</b>', $_SESSION['messageconstruidomoral121']);
unset($_SESSION['messageconstruidomoral121']);
}
?>
<form method="POST" action="../../../../../loadingmr/loadmmml" enctype="multipart/form-data">
<div>
<input type="hidden" id="documents" name="documents" value="120">
<input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
<input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
<input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
<input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
<input type="file" name="uploadedFile" />
</div>

<input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
</form>
</center>

    </td>
    <td style="text-align: center;">


    <div id="filebaldiom34">

    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral121']) && $_SESSION['filenameavgconstrumoral121'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral121']);
unset($_SESSION['filenameavgconstrumoral121']);
}
?>

</a>
    </div>
    </td>
<td align="center"><textarea id="ficoment34" name="ficoment34" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>

<td style="text-align: center;">


    <div id="filebaldiom34delete">
    <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
    <br>
    <a> <?php
if (isset($_SESSION['filenameavgconstrumoral121']) && $_SESSION['filenameavgconstrumoral121'])
{
printf('<b>%s</b>', $_SESSION['filenameavgconstrumoral121']);
unset($_SESSION['filenameavgconstrumoral121']);
}
?>

</a>
    </div>
    </td>

</tr-->


</tbody>







    </table>
    </div>

    <div id="tipolgis" class="col-sm-12 table-responsive" style="">
    	<center>
    		<br><br>
  <form method="POST" action="load" enctype="multipart/form-data">
    <div>

      <H2><B>Agregar Tipologias</B></H2><BR><BR>
      <H4>
      <input type="file" id="uploadedFile" name="uploadedFile" onchange="upload_files3();" />
      </H4>
      <BR><BR>
    </div>


  </form>
  </center>

  <center>

        <div id="messagetipolmoralconstru" style="color: #8b4c55; font-weight: bold;"></div>
  </center>


           <table id="tipologstable" class="table table-striped" style="color: black;">
        <thead ><tr>
            <th style="text-align: center; background-color: #d0d8f3;">Lista de Tipologias</th>
            <th style="text-align: center; background-color: #d0d8f3;">Cargar Tipologias</th>
            <th style="text-align: center; background-color: #d0d8f3;">Tipologias Subidas</th>
            <th style="text-align: center; background-color: #d0d8f3;">Comentario</th>
            <th style="text-align: center; background-color: #d0d8f3;">Corregir Tipologias</th>
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

    function finishdic(){
      location.href = "../../../../SeguimientoDictamen/100";
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
