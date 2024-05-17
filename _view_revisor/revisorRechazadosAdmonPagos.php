<?php include '../web/validateR.php';
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
    <title>Revisor: Preautorizados</title>
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
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_revisor/_appa5.js"></script>

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

               <?php     if ($codigo == 5) {       ?>

                  <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
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



                  <?php     }else if($codigo == 11){     ?>


                    <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">


                                                      <h6 class="mt-1 mb-1" id="alertaStatusR">Dictamen PRE RECHAZADO</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoR">El dictamen pasa a etapa 11, en espera a que el dictaminador atienda las observaciones realizadas.</p>


                                                </div>
                                            </div>
                                        </div>



                     <?php       }else if($codigo == 52){  ?>

                       <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">


                                                      <h6 class="mt-1 mb-1" id="alertaStatusR">Dictamen PRE AUTORIZADO</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoR">El dictamen pasa a etapa 5.2, en espera a que el ADMINISTRADOR lo autorice.</p>


                                                </div>
                                            </div>
                                        </div>



                     <?php       }else if($codigo ==53){  ?>

                      <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: block; border-top: -10px;" id="alertaaR">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">


                                                      <h6 class="mt-1 mb-1" id="alertaStatusR">Dictamen PRE RECHAZADO</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoR">El dictamen pasa a etapa 5.3, ya que no fue autorizado su archivo en hojas verdes. Esperar a que el dictaminador actualice el documento.</p>


                                                </div>
                                            </div>
                                        </div>


                     <?php   } ?>

                                      </div>
               <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                    <div class="pulse-css"></div>
                                </a>

                            </li>
                                 <li class="nav-item dropdown header-profile" style="color: black;">
                            REVISOR DE IGECEM:   <?php echo $_SESSION['usuarioactual']; ?>

                            </li>


                        </ul>
            </div>
            </nav>
        </div>
      </div>

        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first" > <h3 style="color:#ffffff;">DICTAMUN</h3> </li>


                    <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>

                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                           <li><a href="../SeguimientoRevisor/1">Pendientes</a></li>
                           <li><a href="../SeguimientoRevisorPre/1">Rechazado por Admon pagos</a></li>
                             <li><a href="../observadosPorMunicipioRevisores/1">Observados por el municipio</a></li>
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
    </div>
    <div class="col-sm-3">
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
                                </div>
                                <div class="modal-body">
                                    <center>
                                   <input type="text" name="folioInmueble" id="folioInmueble" style="border: none; text-align: center; font-weight: bold; font-size: large;">
                                    <br><br>
                                    <div id="tablaxinmueble">

                                    </div>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-dismiss="modal" onclick="" style="background-color: #414558; border-color: #414558; color: white;">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

    <div id="tblr2" class="col-md-12 table-responsive" style="display: none;">
      <p style="text-align: center; font-size: x-large; font-weight: bold;">Dictamenes "RECHAZADOS POR ADMINISTRADOR PAGOS"</p>
    <table id="myTabl2ee" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="color: black; text-align: center;">
      <thead>
      <tr>
      <th style="display: none;">_</th>
      <th style="background-color: #d0d8f3;">Folio de Presentaci&oacute;n</th>
      <th style="display: none;"></th>

      <th style="background-color: #d0d8f3;">Fecha</th>
      <th style="background-color: #d0d8f3;">Año a dictaminar</th>
      <th style="background-color: #d0d8f3;">No.Registro del especialista</th>
      <th style="background-color: #d0d8f3;">Especialista</th>
      <th style="background-color: #d0d8f3;">Tipo</th>
      </tr>
    </thead>
        <tbody>
          <tr ng-repeat=" x in lista_r">
            <td style="display: none;">{{x.etapa_folio_d}}{{x.acuse}}</td>
             <td><a href="" onclick="tablaInmueblesP(12);" data-toggle="modal" data-target=".bd-example-modal-lg" >{{x.etapa_folio_d}}{{x.acuse}}</a></td>
            <td style="display: none;">
            {{x.cclave}}
            </td>

            <td>{{x.fechr}}</td>
            <td>{{x.aniodictamen}}</td>
            <td>{{x.dictaminador}}</td>
            <td>{{x.nombre_especialist}}</td>
            <td>{{x.tipoditc}}</td>
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
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_revisor/_app2.js"></script>

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
        location.href = "../SeguimientoRevisor/1";
    }


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
