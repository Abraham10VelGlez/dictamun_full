<?php include '../web/validateadm.php';

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;
$ruta = explode("/", $url);
$to=count($ruta);

$folioCompleto=str_pad($ruta[$to-1], 5, "0", STR_PAD_LEFT);
$id_di=$ruta[$to-1];
$an = explode("?", $id_di);
$an2 = $an[0];// año a dictaminar
// echo "<br>";
 $cla = $an[1]; //clave catastral
 $gvafff = $an[2];
?>
    <!doctype html>
<html ng-app="todoApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Datos Generales</title>
    <?php include '../const.php'; ?>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>

    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>

    <link href="<?php echo jsdict; ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>assets/css/lib/themify-icons.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_admin/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_admin/_appa3.js"></script>

  <style type="text/css">
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
  </style>
</head>

  <body>
    <input type="hidden" id="idG" name="idG" value="<?php echo $cla;  ?>" />
    <input type="hidden" id="gva" name="gva" value="<?php echo $gvafff;  ?>" />

  <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
         <div class="nav-header">
            <a href="#" class="brand-logo">
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
              <div style="color: black;" class="col-xl-3">Folio del Dictamen:<br><div id="foldicview"></div><br></div>
               <div class="col-xl-5"><br><br><br><br>
                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa').style.display='none';" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus"></h6>
                                                    <p class="mb-2" id="alertaStatusMotivo"></p>

                                                </div>
                                            </div>
                                        </div>
                                          <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa2">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa2').style.display='none';" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus2">No puede "Autorizar" el dictamen si el archivo en hojas verdes no es correcto.</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo2">Por tal motivo debera activar la casilla "Si" en el apartado de "Archivos Recibidos"</p>

                                                </div>
                                            </div>
                                        </div>
                                         <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaaCom">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa2').style.display='none';" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus3">Comentarios guardados correctamente..</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo3">Puede continuar con la revisión</p>

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
                            ADMINISTRADOR:   <?php echo $_SESSION['usuarioactual']; ?>

                            </li>


                        </ul>
            </div>
            </nav>
        </div>
        </div>


       <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first" >  <h3 style="color: #ffff;">
                              DICTAMUN MUNICIPAL
                                  </h3>  </li>

                     <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>

                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Usuarios</span></a>
                        <ul aria-expanded="false">
                            <li><a href="../Admin4Gris/">Agregar Usuario</a></li>

                            <li><a href="../Admin2Gris/">Lista Usuarios</a></li>
                        </ul>
                    </li>


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                           <li><a href="../AdminPendientes/">Asignar Revisor</a></li>
                            <li><a href="../AdminAutorizados/1">Autorizados</a></li>
                           <!--<li><a href="../Admin6Gris/">Busqueda de Dictamenes</a></li> -->
                           <li><a href="../AdminReasig/">Reasignar Especialista</a></li>
                           <li><a href="../AdminReasig/">Reasignar Revisor</a></li>
                            <li><a href="../AdminEstatus/">Estatus</a></li>

                        </ul>
                    </li>


                   <li><a  href="../Admin5Gris/"  aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Versi&oacute;n</span></a>

                    </li>

                    <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>

                    </li>




                    <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button-->


                </ul>
            </div>


        </div>

           <div class="content-body">

       <div class="col-md-12" style="text-align: center;">
      <input type="text" name="idInmu" id="idInmu" value="<?php echo $cla; ?>" hidden="">
       <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $an2;  ?>" />
      <input type="text" name="idCompl" id="idCompl" value="<?php echo $folioCompleto; ?>" hidden="">
    </div>


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

                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Revisi&oacute;n de dictamen.</h4>

                                 <div id="cct">
       <input type="hidden" name="cc" id="cc" value="">
     </div>
                            </div>
                            <div class="card-body">
                                <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                    <div class="accordion__item">
                                        <div class="accordion__header accordion__header--primary" style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseOne">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">AVISO</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseOne" class="collapse show" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">

                                                  <table id="seguimientoT" class="table table-striped" style="display: block; color: black;">

    <thead>
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;"><input type="text" name="folioI" id="folioI" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Año a Dictaminar:</td>
        <td><input type="text" name="anioD" id="anioD" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Nombre del Contribuyente:</td>
        <td><input type="text" name="contri" id="contri" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>RFC del Contribuyente:</td>
        <td><input type="text" name="rfcC" id="rfcC" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Clave Catastral:</td>
        <td><input type="text" name="clave" id="clave" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Valor Catastral:</td>
        <td>$<input type="text" name="valor" id="valor" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Domicilio del Inmueble</td>
        <td></td>
      </tr>
      <tr>
        <td>Calle:</td>
        <td><input type="text" name="calle" id="calle" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>No. Exterior:</td>
        <td><input type="text" name="noE" id="noE" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>No. Interior:</td>
        <td><input type="text" name="noI" id="noI" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Colonia:</td>
        <td><input type="text" name="colonia" id="colonia" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Municipio:</td>
        <td><input type="text" name="municipio" id="municipio" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>C.P:</td>
        <td><input type="text" name="cp" id="cp" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Referencias:</td>
        <td><input type="text" name="referencia" id="referencia" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
    </tbody>
  </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseTwo">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">DICTAMEN</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseTwo" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                              <table id="dictamenT" class="table table-striped" style="display: block; color: black;">

    <thead>
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;"><input type="text" name="noFolio" id="noFolio" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Nombre del Dictaminador:</td>
        <td><input type="text" name="dictaminador" id="dictaminador" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>RFC del Dictaminador:</td>
        <td><input type="text" name="rfcD" id="rfcD" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Número de Registro del Dictaminador:</td>
        <td><input type="text" name="noReg" id="noReg" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <!--tr style="display: none;">
        <td>Fecha y hora de envio del Dictamen:</td>
        <td><input type="text" name="fechaEnvio" id="fechaEnvio" style="border: 0; background-color: transparent; width: 800px;"></td>
      </tr-->
      <tr>
        <td>Tipo de Dictamen:</td>
        <td><input type="text" name="tipoD" id="tipoD" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Estatus del Dictamen:</td>
        <td><input type="text" name="estatus" id="estatus" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
    </tbody>
  </table>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item" id="archivosRecibidosT">
                                        <div class="accordion__header collapsed accordion__header--success"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseThree">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">ARCHIVOS RECIBIDOS</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseThree" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                             <table  class="table table-striped" style="display: block; width: 98%; color: black;">

   <thead>
     <tr>
       <th style="text-align: center;width: 600px;">Nombre del Archivo</th>
       <th style="text-align: center;">Comentario del Especialista</th>
       <th style="text-align: center;">Descargar</th>
       <th style="text-align: center;">Observar</th>
     </tr>
   </thead>
   <tbody id="files_studioa">
   </tbody>
 </table>



  <center>
  <div id="descargarHojasVerdes" style="display: none; color: black;">

      </div>
       <div class="col-md-12"  id="archivoCCT">
<div class="container-fluid">
  <div class="row">

    <div class="col-md-3"></div>
    <div class="col-md-4"><br><br>
      <label style="font-weight: bold; font-size: medium; color: black;" >El archivo en hojas verdes ¿Es correcto ?</label>
    </div>
    <div class="col-md-1"><br><br>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="2" checked>Si
        <label class="form-check-label" for="radio1"></label>
      </div>
    </div>
    <div class="col-md-1"> <br><br>
     <div class="form-check">
        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="1">No
        <label class="form-check-label" for="radio2"></label>
      </div>
    </div>
    <div class="col-md-3">

    </div>


  </div>
</div>
  </div>

    </center>




                                            </div>
                                        </div>
                                    </div>
                                      <div class="accordion__item" id="tipologiasTT">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseFour">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">REPORTE FOTOGRAFICO COMPLETO</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseFour" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                               <br>
                                              <center>
                                               <table style="color: black; color: black;">
      <thead></thead>
      <tbody>
      <tr>
        <th style="text-align: center; width: 500px;">No. Archivos Fotográficos</th>
        <th id="totalTipologias"></th>
      </tr>
      </tbody>
    </table>
  </center>
    <br><br>
    <center>
      <table  class="table table-striped" style="display: block; color: black; text-align: center;">
    <thead>
       <tr>
        <th style="text-align: center; width: 100px; display: none;">Tipología</th>
        <th style="text-align: center; width: 400px;">Nombre del Archivo</th>
        <th style="text-align: center; width: 400px;">Comentarios</th>
        <th style="text-align: center; width: 150px;">Descargar</th>
        <th style="text-align: center; width: 500px;">Observar</th>
      </tr>
    </thead>
    <tbody id="tip_no_studioa">

    </tbody>
  </table>
  </center>
    <br><br>



                                            </div>
                                        </div>
                                    </div>
                                      <div class="accordion__item" id="prediosT">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseFive">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">PREDIO</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseFive" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                               <table id="predioT" class="table table-striped" style="display: block; color: black;">

    <thead>
      <tr>
        <th style="text-align: left;"></th>
        <th style="text-align: left;"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="width: 250px;">Folio de presentación:</td>
        <td><input type="text" name="folioPresenta" id="folioPresenta" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Tipo de Inmueble:</td>
        <td><input type="text" name="tipoInmueble" id="tipoInmueble" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Ubicación:</td>
        <td><input type="text" name="ubicacion2" id="ubicacion2" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Clave Catastral:</td>
        <td><input type="text" name="claveCa2" id="claveCa2" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>

      </tr>
      <tr>
        <td>Propietario:</td>
        <td><input type="text" name="propietario" id="propietario" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>

      </tr>
      <tr>
        <td>Superficie de terreno:</td>
        <td><input type="text" name="supTerreno" id="supTerreno" style="border: 0; background-color: transparent;" readonly=""></td>

      </tr>
      <tr>
        <td>Valor del Terreno propio:</td>
       <td>$ <input type="text" name="valorP" id="valorP" style="border: 0; background-color: transparent;" readonly=""></td>

      </tr>
      <tr>
        <td>Valor del Terreno Común:</td>
       <td>$ <input type="text" name="valorC" id="valorC" style="border: 0; background-color: transparent;" readonly=""></td>

      </tr>
      <tr>
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped" style="display: block; color: black;">
    <thead>

    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor del terreno</td>
      </tr>
       <tr>
        <th colspan="4" style="text-align: center;">Datos del Predio</th>
        <th colspan="4" style="text-align: center;">Factor</th>
      </tr>
      <tr>
        <td>Frente:</td>
        <td><input type="text" name="frente" id="frente" style="border: 0; background-color: transparent;" readonly=""></td>
        <td><input type="text" name="p" id="p" style="background-color: transparent; border: 0" readonly=""></td>
        <td>Frente:</td>
        <td><input type="text" name="factorfrente" id="factorfrente" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
       <tr>
        <td>Fondo:</td>
        <td><input type="text" name="fondo" id="fondo" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
         <td>Fondo:</td>
        <td><input type="text" name="factorfondo" id="factorfondo" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
       <tr>
        <td>&Aacute;rea Inscrita:</td>
        <td><input type="text" name="areaInscrita" id="areaInscrita" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Irregularidad:</td>
        <td><input type="text" name="factorirregularidad" id="factorirregularidad" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
      <tr>
        <td>&Aacute;rea Total:</td>
        <td><input type="text" name="areaTotal" id="areaTotal" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
        <td>&Aacute;rea:</td>
        <td><input type="text" name="factorarea" id="factorarea" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
       <tr>
        <td>Altura:</td>
        <td><input type="text" name="altura" id="altura" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Topografia:</td>
        <td><input type="text" name="factortopografia" id="factortopografia" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
       <tr>
        <td>Posición del Predio:</td>
        <td><input type="text" name="posicion" id="posicion" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Posición:</td>
        <td><input type="text" name="factorposicion" id="factorposicion" style="border: 0; background-color: transparent;" value="-" readonly=""></td>
        <td></td>
      </tr>
      <tr>
        <td>&Aacute;rea Aprovechable:</td>
        <td><input type="text" name="aprovechable" id="aprovechable" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Restricción:</td>
        <td><input type="text" name="factorrestriccion" id="factorrestriccion" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
         <td></td>
        <td>Factor Aplicado:</td>
        <td><input type="text" name="factorAplicado" id="factorAplicado" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
      </tr>
       <tr>
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table id="tipologiasP" class="table table-striped" style="display: block; color: black;">
    <thead>

    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor de las Construcciones</td>
      </tr>
       <tr>
        <th style="text-align: center;">Tipología</th>
        <th style="text-align: center;">Tipo de Construcción</th>
        <th style="text-align: center;">Uso</th>
        <th style="text-align: center;">Clase</th>
        <th style="text-align: center;">Categoría</th>
        <th style="text-align: center;">Superficie</th>
        <th colspan="2" style="text-align: center;">Valor de las Construcciones</th>
      </tr>
     </tbody>
   </table>
   <table id="tipologias2" class="table table-striped" style="display: block; color: black;">
    <thead>

    </thead>
    <tbody>
       <tr>
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;"></td>
      </tr>
       <tr>
        <th style="text-align: center;">Tipología</th>
        <th style="text-align: center;">Edad</th>
        <th style="text-align: center;">Factor de Edad</th>
        <th style="text-align: center;">Conservación</th>
        <th style="text-align: center;">Factor de Conservación</th>
        <th style="text-align: center;">Niveles</th>
        <th style="text-align: center;">Factor de Niveles</th>
        <th style="text-align: center;">Factor Aplicado</th>
      </tr>

       <tr>
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
    <input type="text" name="prcentaje" id="prcentaje" style="display: none;">
  <input type="text" name="valorC2" id="valorC2" style="display: none;">
  <table class="table table-striped" style="display: block; color: black;">
    <thead>

    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Totales</td>
      </tr>
      <tr>
        <td  style="width: 400px;">Valor del Terreno</td>
        <td>$ <input type="text" name="valorTerreno" id="valorTerreno" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"><input type="text" name="pp" id="pp" style="background-color: transparent; border: 0" readonly=""></td>
      </tr>
      <tr>
        <td>Valor de las Construcciones Privativas</td>
        <td>$ <input type="text" name="privada" id="privada" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"></td>
      </tr>
      <tr>
        <td>Valor de las Instalaciones especiales</td>
        <td>$ <input type="text" name="especial" id="especial" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"></td>
      </tr>
      <tr>
        <td>Valor de las Construcciones Comunes</td>
        <td>$ <input type="text" name="comun" id="comun" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"></td>
      </tr>

      <tr>
        <td>Valor Total</td>
        <td>$ <input type="text" name="valorTT" id="valorTT" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"></td>
      </tr>
      <tr>
        <td>Valor Total en números Redondos</td>
        <td>$ <input type="text" name="redondeado" id="redondeado" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"></td>
      </tr>
    </tbody>
  </table>

                                            </div>
                                        </div>
                                    </div>
                                     <div class="accordion__item" id="obs_general">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapsesix">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">OBSERVACION GENERAL</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapsesix" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                                 <center>
      <h3 style="text-align: center;" id="obervacionGr">Ingresar Observaciones</h3><br>
      <textarea placeholder="Ingresar Observaciones" id="ObservacionPre" name="ObservacionPre" style="width: 600px; height: 100px;">

      </textarea><br><br>
        <button type="button" class="btn" id="liberadoGr" name="liberadoGr"  style="background-color: #414558; color: white;" onclick="liberado()">Liberado</button>


        <button type="button" class="btn" id="rechazoGr" name="rechazoGr" style="background-color: #8b4c55; color: white;" onclick="rechazoG()">Rechazado</button>




        <button type="button" class="btn" id="autorizado" name="autorizado"  style="background-color: #414558; color: white; border-color: #414558; display: none;" onclick="autorizado();">Autorizado</button>
        <button type="button" class="btn" id="preRechazoPagos" style="background-color: #8b4c55; color: white; border-color: #8b4c55; display: none;" onclick="preRechazo()">Pre Rechazo</button>
        <button type="button" id="tipologiasPa" style="display: none;"></button>
        <button type="button" id="save_revPa" style="display: none;"></button>

     <input type="hidden" name="observacionFinales" id="observacionFinales">
     <input type="hidden" name="guardarObservacionsJ" id="guardarObservacionsJ">
      <br><br><br><br>
      <br><br>
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
                                </div>
                            </div>

                        </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">

                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
          </div>

          <div class="footer">
            <div class="copyright">
                <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
            </div>
        </div>


    </div>

  </body>






<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>


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
        location.href = "../AdminGris/";
    }

    function void1(){
        //
        location.href = "../AdminGris/";
    }

    function voidclose(){
        //alert("asdasd");
        //location.href = "PadronDictaminadores";
        $.post("../../acceso",{acceess:10103},function(z){
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
