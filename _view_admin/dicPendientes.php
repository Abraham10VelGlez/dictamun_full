<?php include '../web/validateadm.php';
include '../const.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asignar Revisor </title>
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
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_admin/_appa4.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_admin/_appa.js"></script>
</head>

 <body>
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
                        <!--   <li><a href="../Admin6Gris/">Busqueda de Dictamenes</a></li> -->
                           <li><a href="../AdminReasig/">Reasignar Especialista</a></li>
                           <li><a href="../AdminReasigRev/">Reasignar Revisor</a></li>
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

        <div class="content-body" ng-app="Appadmdtmviewpen" ng-controller="AppadmdtmviewpenControllerTab">
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
                                <h4 class="card-title">Asignar Revisor</h4>

                            </div>
                            <div class="card-body">
                                <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                  <div class="container-fluid">

                                  </div>
                                </div>
                            </div>
                        </div>

                        <!-- tablasss  --->



       <br><br>


                             <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">INMUEBLES</h5>

                                <!--    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->

                                </div>
                                <div class="modal-body">
                                        <center>
                                  <h5>Folio General:</h5>
                                   <input type="text" name="folioInmueble" id="folioInmueble" style="border: none; text-align: center; font-weight: bold; font-size: large;">
                                     <br><br>

        <h4>Seleccionar a un revisor de la siguiente lista: </h4><br>
           <select id="Rvigcm" name="Rvigcm" class="cm" ng-model="Rvigcm">
       </select>
       <br><br>
         <div id="inf" style="color: #8b4c55; font-weight: bold;"></div>

       </center>
                                    <div id="tablaxinmueble">

                                    </div>
                                </div>
                                <div class="modal-footer">
                                <!--  onclick="tablaxinmuebleOcultar();" -->
                                 <input type="button" class="btn" id="btnasg" name="btnasg" ng-click="btnasg()" value="Asignar" style="background-color: #414558; border-color: #414558; color: white;" />
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #8b4c55; border-color: #8b4c55; color: white;">Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>








       <form id="myForm">
       <div class="col-md-12 table-responsive" >
        <table id="table_dtm" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="max-width: 100%; height: auto; font-size: small; text-align: center; color: black;">
<thead>
<tr>
<th style="display: none;">_</th>
        <th style="background-color: #d0d8f3;">FOLIO DE DICTAMEN</th>

        <th style="background-color: #d0d8f3;">TIPO</th>
        <th style="background-color: #d0d8f3;">CONTRIBUYENTE</th>
        <th style="background-color: #d0d8f3;">CORREO ELECTRONICO DEL CONTRIBUYENTE</th>
        <th style="background-color: #d0d8f3;">ESPECIALISTA</th>

       <!-- <th style="background-color: #d0d8f3;">ESTATUS</th>
        <th style="background-color: #d0d8f3;">ASIGNACION</th>  -->
</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_dtmpen">
            <td style="display: none;">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</td>
           <!-- <td><a href="../AdminSeguimiento/{{x.claveanio}}">{{x.cve_cat}}</a></td>  -->
            <td><a href="" onclick="tablaInmueblesP(1);" data-toggle="modal" data-target=".bd-example-modal-lg">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</a></td>

            <!--<td>{{x.acuse_recpecion2}}</td>-->

            <td>{{x.tipoditc}}</td>
            <td>{{x.nombredenominacion}}{{x.nombre_c}}</td>
            <td>{{x.email}}</td>
            <td>{{x.nombre_espec}}</td>

       <!--     <td  style="">{{x.etapa_de_dict}}</td>

  <td >
  <input type="checkbox" class="className" value="{{x.folio}}" />
</td>  -->

</tr>
</tbody>
</table>
          <br><br>
         </form>


    <br><br>
                        </div>
    </div>
     </div>
      </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->


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
