
<?php include '../const.php';
include '../web/validatejr.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Administrador Pagos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app_info.js"></script>

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
   <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appafilter_validaavg.js"></script>
</head>
 <body ng-app="apptblsearchj" ng-controller="apptblsearchjControllerTab1">

   <input type="hidden" id="idG" name="idG" value="<?php //echo $ruta[$to-1];  ?>" />
  <input type="hidden" id="idGRec" name="idGRec"  />
  <input type="hidden" id="idP" name="idP"  />
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
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                    <div class="pulse-css"></div>
                                </a>

                            </li>
                                 <li class="nav-item dropdown header-profile" style="color: black;">
                              ADMINISTRADOR:  <?php echo $_SESSION['usuarioactual']; ?>

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
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                            <li><a href="../Busqueda/">Búsqueda</a></li>
                           <li><a href="../BusquedaAdmin/">Lista general</a></li>
                           <li><a href="../DicPendientesAdmonP/1">Pendientes para autorizar</a></li>
                           <li><a href="../DicRechazados/1">Rechazados Admon</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Pagos</span></a>
                        <ul aria-expanded="false">
                            <li><a href="../PPago/">Ordenes de Pago</a></li>

                            <li><a href="../Admin2Gris/">Validar</a></li>
                        </ul>
                    </li>
                    <li><a href="../manualAdministrador/"><i class="ti-file"></i>Manual de Usuario</a></li>
                    <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-header">

                                    <h3 class="card-title">DICTAMENES DE LA DETERMINACIÓN DE LA BASE DEL IMPUESTO PREDIAL</h3>
                                    <br><br>
                            </div>
                            <h4 style="text-align: center;"></h4>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">INMUEBLES</h5>
                                <!--<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->
                                </div>
                                <div class="modal-body">
                                  <h5>Folio General:</h5>
                                   <input type="text" name="folioInmueble" id="folioInmueble" style="border: none; text-align: center; font-weight: bold; font-size: large;">
                                    <br><br>
                                    <div id="tablaxinmueble">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <!--onclick="tablaxinmuebleOcultar();"-->
                                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #414558; border-color: #414558; color: white;">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="card-body">






       <input type="hidden" id="opt" name="opt" >
       <div class="col-md-12 text-center">
<div id="alertb" style="display: none;">
       <h4 style="text-align: center; color:#8b4c55;"> Esta búsqueda tiene 0 Resultados</h4><br>
</div>

        <center>
            <br>
             <input id="bavg" type="button" name="buscar" class="btn " style=" display: none;background-color: #414558; border-color: #414558; color: white;" value="Buscar" ng-click="buscarDictaj()">
           </center>
         </div>
       </div>
       <div class="col-md-12">
         <div class="col-md-4"></div>
         <div class="col-md-4">
           <center id="in">

           </center>
         </div>
         <div class="col-md-4"></div>
       </div>
       <br>
       <center>

        <div id="result" style="display: none;">


          <div class="col-md-12"><br>
            <h5 style="font-weight: bold;">DICTAMENES VALIDADOS ENCONTRADOS</h5>
          </div>
           <form id="myForm">
       <div class="col-md-12 table-responsive">
        <table id="example" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="color: black;">
         <thead>
            <tr>
          <!--th style="text-align: center; background-color: #d0d8f3; display:none;">Folio de dictamen</th>
          <th style="text-align: center; background-color: #d0d8f3; display:none;">Fecha Presentación</th-->
          <th style="text-align: center; background-color: #d0d8f3;">Folio de dictamen</th>
          <th style="text-align: center; background-color: #d0d8f3;">Fecha Presentación</th>
          <th style="text-align: center; background-color: #d0d8f3;">Tipo</th>
          <th style="text-align: center; background-color: #d0d8f3;">Contribuyente</th>
          <th style="text-align: center; background-color: #d0d8f3;">Especialista</th>
            </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in tbldictsearx">
          <!--td style="display:none;">{{x.aniodictamen}}</td>
          <td style="display:none;">{{x.folio}}</td>
            <td><a href="" onclick='exe_pdf_datavg();'  data-toggle="modal" data-target=".bd-example-modal-lg">{{x.acuse_recpecion2}}</a>
              <br>
              <a href="../../pdfavg/avisovalidados/{{x.folio}}" target="_blank"  class="ng-binding">PDF </a>
            </td-->
            <td><a href="" onclick="tablaInmuebles(1);" data-toggle="modal" data-target=".bd-example-modal-lg">{{x.acuse_recpecion2}}</a></td>


            <td>{{x.fecha_registro}}</td>
            <td>{{x.tipoditc}}</td>
            <td>{{x.nombredenominacion}} {{x.apaterno}} {{x.amaterno}}</td>
            <td>{{x.nombre_especialista}}</td>
            </tr>
        </tbody>
    </table>
    <br><br>
  </div>
</form>


    </div>
       </center>









                            </div>
                        </div>

                </div>
                </div>

            </div>
        </div>
    </div>
     <div class="footer">
            <div class="copyright">
                              <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
            </div>
        </div>
    <script src="<?php echo jsdict; ?>vendor/global/global.min.js"></script>
    <script src="<?php echo jsdict; ?>js/quixnav-init.js"></script>
    <script src="<?php echo jsdict; ?>js/custom.min.js"></script>

    <script src="<?php echo jsdict; ?>vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/morris/morris.min.js"></script>

    <script src="<?php echo jsdict; ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?php echo jsdict; ?>vendor/gaugeJS/dist/gauge.min.js"></script>

    <script src="<?php echo jsdict; ?>vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo jsdict; ?>vendor/flot/jquery.flot.resize.js"></script>

    <script src="<?php echo jsdict; ?>vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="<?php echo jsdict; ?>vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jquery.counterup/jquery.counterup.min.js"></script>

    <script type="text/javascript">
    function voidindex(){
        location.href = "../BusquedaAdmin/";
    }


    </script>
    <script type="text/javascript">


    function voidclose(){
        //alert("asdasd");
      //location.href = "PadronDictaminadores";
      $.post("../../acceso",{acceess:102},function(z){
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
