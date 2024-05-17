<?php include '../web/validatejr.php';
include '../const.php';
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;
$ruta = explode("/", $url);
 $to=count($ruta);
  $codigo = $ruta[$to-1];
?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ADMON: Pendientes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">


    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">

    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_adminpago/_appaEstatusPagos.js"></script>
</head>

  <body ng-app="app3"  ng-controller="ControllerTab3" class="w3-container">
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
              <div class="col-xl-1"><br></div>
               <div class="col-xl-5"><br><br><br><br>
                    <?php if ($codigo == 12) {   ?>
                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">

                                                    <h6 class="mt-1 mb-1" id="alertaStatusR">Dictamen RECHAZADO</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoR">El dictamen pasa a etapa 12, en espera a que el REVISOR realise las observaciones especificadas.</p>

                                                </div>
                                            </div>
                                        </div>

                   <?php  }else if($codigo == 6){  ?>
                         <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">

                                                    <h6 class="mt-1 mb-1" id="alertaStatusR">Dictamen Autorizado</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoR">En espera a que el Administrador General lo libere para poder generar las Ordenes de Pago.</p>

                                                </div>
                                            </div>
                                        </div>

                  <?php   }?>




                <!--  <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">

                                                    <h6 class="mt-1 mb-1" id="alertaStatusR">Dictamen PRE AUTORIZADO</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoR">El dictamen pasa a etapa 5, en espera a que el dictaminador suba el archivo en hojas verdes.</p>

                                                </div>
                                            </div>
                                        </div>
                                      -->



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

                            <li><a href="../validaPag/">Validar</a></li>
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
                                <div class="card">
                                <div class="card-header d-block">
                                <h4 class="card-title">Seguimiento.</h4>

                                </div>
                                    <div class="card-body">
                                    <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                    <div class="container-fluid">

                                     <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-3">
     <!--  <center>
        <br><br><br><br>
        <p>Visualizar todos los dictamenes registrados</p>
            <br>
            <input type="button" name="buscar" value="Mostrar" style="background-color: #1b2856; border-color: #1b2856;" class="btn  btn-rounded m-b-10 m-l-5" ng-click="searAll()" />
        </center>  -->
    </div>
    <div class="col-sm-3">
    <!--  <center>
        <p style="text-align: center; margin-top: 10px;">Introducir un rango de fechas:<br><br></p><br>
        <p style="margin-top: 10px;">Fecha Inicial:</p>
         <input type="date" name="fechaI" id="fechaI" ng-model="fech1"><i class="" style="margin-left: 15px;"></i>
        <p style="margin-top: 10px;">Fecha Final:</p>
        <input type="date" name="fechaF" id="fechaF" ng-model="fech2"><i class="" style="margin-left: 15px;"></i>
        <br><br><br>
      <input type="button" name="buscar" value="Seguimiento" style="background-color: #1b2856; border-color: #1b2856;" class="btn" ng-click="searchd()" />
       <br><br><br>
        <input type="text" name="sinRegistro" id="sinRegistro" value="Sin registro de dictamenes, introducir otro rango de fechas." style="border: none; color: #b30a0a; width: 370px;" hidden="">
      <br>
        <br><br><br>
        </center> -->
    </div>
    <div class="col-sm-3"></div>

  </div>


                                    </div>
                                    </div>
                                    </div>

                                     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">INMUEBLES</h5>
                                <!--<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->
                                </div>
                                <div class="modal-body">
                                   <input type="text" name="folioInmueble" id="folioInmueble" style="border: none; text-align: center; font-weight: bold; font-size: large;">
                                    <br><br>
                                    <div id="tablaxinmueble">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-dismiss="modal" onclick="" style="background-color: #414558; border-color: #414558; color: white;">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tblr" class="col-md-12 table-responsive">
 <p style="text-align: center; font-size: x-large; font-weight: bold;">Dictamenes pendientes</p>

    <table id="table_dtm2" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="color: black; text-align: center;">
      <thead>
      <tr>
      <th style="display: none; background-color: #d0d8f3;">_</th>
      <th style="background-color: #d0d8f3; text-align: center;">Folio de Presentaci&oacute;n</th>
      <th style="background-color: #d0d8f3; text-align: center;">Fecha</th>
      <th style="background-color: #d0d8f3; width: 30px; text-align: center;">Año a dictaminar</th>
      <th style="background-color: #d0d8f3; width: 50px; text-align: center;">No.Registro del especialista</th>
      <th style="background-color: #d0d8f3; text-align: center;">Especialista</th>

      </tr>
    </thead>
        <tbody>
          <tr ng-repeat="x in empList_dtmpenP">
             <td style="display: none;">{{x.acuse_recpecion2}}</td>
         <!-- <td>  <a href="" onclick="selection4()" />{{x.cclave}}   </a></td> -->
             <td><a href="" onclick="tablaInmueblesP(5);" data-toggle="modal" data-target=".bd-example-modal-lg" >{{x.acuse_recpecion2}}</a></td>

           <!-- <td>{{x.etapadictamen}}</td> -->
            <td>{{x.fecha_registro}}</td>
            <td>{{x.aniodictamen}}</td>
            <td>{{x.id_dictaminador}}</td>
            <td>{{x.nombre_especialista}}</td>

          </tr>
        </tbody>
    </table>
    <br><br><br>
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
        </div>




        <div class="footer">
            <div class="copyright">
                <p><a href="#" target="">IGECEM 2021-2022. Versión X</a> </p>
            </div>
        </div>


    </div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
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


     function voidindex(){
        location.href = "../BusquedaAdmin/";
    }


    </script>

</body>

</html>
