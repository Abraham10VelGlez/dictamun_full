<?php include '../web/validatejr.php';
include '../const.php';
?>
<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Padrón de Dictaminadores </title>
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

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_adminpago/_appaValP.js"></script>
</head>

  <body ng-app="Appcahsview2" ng-controller="Appcahsview2ControllerTab" >

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
                                <h4 class="card-title">Validar Pagos.</h4>

                                </div>
                                    <div class="card-body">
                                    <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                    <div class="container-fluid">


                                      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">INMUEBLES</h5>

                                <!--    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->

                                </div>
                                <div class="modal-body">
                                  <h5>Folio General:</h5>
                                   <input type="text" name="folioInmueble" id="folioInmueble" style="border: none; text-align: center; font-weight: bold; font-size: large;">
                                    <br><br>

                                    <div id="tablaxinmueble">

                                    </div>
                                    <h4 id="sinDatos" style="display: none; text-align: center; color: #8b4c55;">Seleccionar almenos un Dictamen</h4>
                                    <div id="validarPagos" style="display: none;">
                                      <center>
                                      <input id="ee" name="ee" type="Hidden" value="" >
                                       <input type="text" name="foliosT" id="foliosT" style="display: none;" readonly="">
                                       <input type="text" name="foliosCom" id="foliosCom" style="display: none;" readonly="">
                                      <h4>¿ Los pagos ya han sigo registrados correctamente ?</h4>
                                      <br>
                                      <button id="docc3" ng-click="docc3()" class="btn" style="background-color: #414558; color: white; border-color: #414558;">Si, Continuar</button>
                                      </center>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn" style="background-color: #414558; color: white; border-color: #414558;" id="btnVP" name="btnVP" ng-click="btnvalidarP()">Validar</button>

                                <button type="button" class="btn" data-dismiss="modal" style="background-color: #8b4c55; color: white; border-color: #8b4c55;">Cancelar</button>

                                </div>
                            </div>
                        </div>
                    </div>



     <!--  <center><br>
       <input type="button" class="btn btn-success" id="btnVP" name="btnVP" ng-click="btnvalidarP()" value="Validar" style="background-color: #414558; border-color: #414558; color: white;">
       <br><br>
       </center> -->
       <table id="table_cashs" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="text-align: center; color: black;">
<thead>
<tr>
 <td style="display: none;">_</td>
 <td style="display: none;">_</td>
            <td style="background-color: #d0d8f3;">FOLIO DICTAMEN</td>
            <td style="background-color: #d0d8f3;">ESPECIALISTA</td>
            <td style="background-color: #d0d8f3;">No REGISTRO DEL ESPECIALISTA</td>
            <td style="background-color: #d0d8f3;">CONTRIBUYENTE</td>
            <td style="background-color: #d0d8f3;">FECHA DE REGISTRO</td>
            <!--<td style="background-color: #d0d8f3;">SELECCIONAR</td>  -->

</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_P">
            <td style="display: none;">{{x.acuse}}</td>
            <td style="display: none;">{{x.acuse}}</td>
            <td><a onclick="tablaInmueblesP(7);" href="" data-toggle="modal" data-target=".bd-example-modal-lg">{{x.acuse}}</a></td>
            <!--<td><a href="../AdminSeguimientoJ/{{x.cve_cat}}">{{x.cclave}}</a></td>  -->
            <td>{{x.nombre_especialista}}</td>
            <td>{{x.no_reg_autorizado}}</td>
            <td>{{x.nombredenominacion}}</td>
            <td>{{x.fecha_registro}}</td>
            <!--<td>
            <input type="checkbox" >
            </td> -->
</tr>
</tbody>
</table>

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
                </section>
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
<!--
  <div id="id03" class="modal modal-content animate" style="height: 220px;">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    <center>
    <h4>¿ Los pagos ya han sigo registrados correctamente ?</h4>
    </center>
    </div>
    <div  id="evt" class="col-md-12 text-center" >
    </div>
    <div  id="evt" class="col-md-12 text-center" >&nbsp;</div>
    <div  id="evt" class="col-md-12 text-center" >&nbsp;</div>
    <div  id="evt" class="col-md-12 text-center" >
    <div  id="evt" class="col-md-6 text-center" >
    <input id="ee" name="ee" type="Hidden" value="" >
    </div>
    <div  id="evt" class="col-md-6 text-center" >
      <center>
         <button class="btn btn-danger" onclick="document.getElementById('id03').style.display='none'">Cancelar</button>
    <button id="docc2" ng-click="docc2()" class="btn btn-success">Si, Continuar</button>
    </center>
    </div>
    </div>
    </div>

    <div id="id04" class="modal modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
    <center>
       <input id="ee" name="ee" type="Hidden" value="" >
    <h4 style="font-weight: bold; text-align: center;">Folios correspondientes a las siguientes claves catastrales:</h4>
    <input type="text" name="foliosT" id="foliosT" style="display: none;" readonly="">
    <input type="text" name="foliosCom" id="foliosCom" style="display: none;" readonly="">
    <?php

     ?>
    <table id="taFolios" class="table table-striped table-bordered xa">

    </table>

    </center>
    </div>
    <div  id="evt" class="col-md-12 text-center" >
      <button class="btn btn-danger" onclick="document.getElementById('id04').style.display='none'">Cancelar</button>
     <button id="docc3" ng-click="docc3()" class="btn btn-success">Ok, Validar</button>
    </div>
    <div  id="evt" class="col-md-12 text-center" >&nbsp;</div>
    <div  id="evt" class="col-md-12 text-center" >&nbsp;</div>
    </div>

   <div id="id05" class="modal modal-content animate" style="height: 250px;">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
    <center>
    <h4 style="font-weight: bold; text-align: center;">No se registraron folios para validar, por favor intente de nuevo.</h4><br>
    <input type="text" name="foliosOficio" id="foliosOficio" style="display: none;">
    <button type="button" class="btn-success" style="width: 90px;" onclick="document.getElementById('id05').style.display='none'">OK</button>
    </center>
    </div>
    </div>
  -->



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
