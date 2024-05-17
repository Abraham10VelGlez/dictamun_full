
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


    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
   <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_adminpago/_appaBusquedas.js"></script>
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

                                    <h3 class="card-title">Búsqueda de dictamenes</h3>
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

                                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-calendar text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchf" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por Fechas <br><br> </a></div>

       <div id="a1" class="" style="display: none;">
         <div class="" style="">
          Fecha Inicial:
          <input type="date" id="fechaI" name="fechaI" ng-model="fechaI" >
         </div><br>
         <div class="" style="">
          Fecha Final:
          <input type="date" id="fechaF" name="fechaF" ng-model="fechaF"  >
         </div> <br>
         <!--<div class="" style="">
          Año de Presentación: <select id="an" name="an" ng-model="an" style="width: 100px;">

        <?php

          // $anioActual = date("Y");

         ?>
      <option value="<?php // echo $anioActual-7; ?>"><?php  //echo $anioActual-7; ?></option>
      <option value="<?php // echo $anioActual-6; ?>"><?php  //echo $anioActual-6; ?></option>
      <option value="<?php // echo $anioActual-5; ?>"><?php  //echo $anioActual-5; ?></option>
      <option value="<?php  //echo $anioActual-4; ?>"><?php  //echo $anioActual-4; ?></option>
      <option value="<?php // echo $anioActual-3; ?>"><?php  //echo $anioActual-3; ?></option>
      <option value="<?php //echo $anioActual-2; ?>"><?php  //echo $anioActual-2; ?></option>
      <option value="<?php  //echo $anioActual-1; ?>"><?php  //echo $anioActual-1; ?></option>
      </select>

      </div> -->
       </div>
                                </div>
                            </div>
                        </div>
                    </div>


         <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchcc" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por Nombre del Contribuyente <br><br> </a></div>

          <div id="a7" style="display: none;">
        <div>

           <p style="text-align: center;">Nombre:</p><input type="text" id="nomco" name="nomco" ng-model="nomco" style="width: 300px;">

         </div><br>
         <div class="">
          <p style="text-align: center;">Apellido Paterno: </p>

              <input type="text" id="nomco2" name="nomco2" ng-model="nomco2" style="width: 300px;">

         </div><br>
          <div class="">
          <p style="text-align: center;">Apellido Materno:</p><input type="text" id="nomco3" name="nomco3" ng-model="nomco3" style="width: 300px;">
         </div>
       </div>
                                </div>
                            </div>
                        </div>
                    </div>


             <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-more text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchstts" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por Estatus del dictamen<br><br> </a>
                                    </div>

           <div id="a6" style="display: none;">

         <div class="col-md-5">
             <select id="stt" name="stt" ng-model="stt"  style="width: 200px; height: 25px; margin-top: 5px;">


              <option value="1">REGISTRO DE DICTAMEN</option>
              <option value="3">PENDIENTE DE ASIGNAR REVISOR</option>
              <option value="4">EN REVISION POR PARTE DEL IGECEM</option>
              <option value="5">OBSERVADO POR REVISOR / SUBIR ARCHIVO EN HOJAS VERDES</option>
              <option value="51">CON ARCHIVO EN HOJAS VERDES</option>>
              <option value="52">PRE AUTORIZADO / ARCHIVO VALIDO</option>
              <option value="53">ARCHIVO EN HOJAS VERDES NO VALIDO</option>
              <option value="6">AUTORIZADO</option>
              <option value="7">LIBERADO / PENDIENTE DE PAGO</option>
              <option value="11">OBSERVADO POR REVISOR</option>
              <option value="12">RECHAZADO POR ADMINISTRADOR PAGOS</option>
              <option value="13">RECHAZADO POR ADMINISTRADOR GENERAL</option>
              <option value="15">VALIDADO</option>
              <option value="_" disabled='disabled' selected>SELECCIONAR ESTATUS</option>

            </select>
         </div>
       </div>
                                </div>
                            </div>
                        </div>
                    </div>



                         <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchrvs" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por Revisor<br><br> </a>


                                    </div>

          <div id="a5" style="display: none;">
         <select id="rvs" name="rvs" ng-model="rvs" style="width: 200px; height: 25px; margin-top: 5px;"></select>
       </div>
                                </div>
                            </div>
                        </div>
                    </div>



            <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-folder text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchnodc" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por  No. Dictamen<br><br> </a>
                                    </div>


          <div id="a3" style="display: none;">
            <p>Ingresar No. de Dictamen:</p>
         <input type="text" ng-model="nod" id="nod" name="nod" style="width: 200px;">


       </div>
                                </div>
                            </div>
                        </div>
                    </div>



        <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-world text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchmun" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por  Municipio<br><br></a>
                                    </div>


             <div id="a2" style="display: none;">
          <select ng-model="municcz" id="municcz" name="municcz" style="width: 200px; height: 25px; margin-top: 5px;"></select>

       </div>
                                </div>
                            </div>
                        </div>
                    </div>



        <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-cta-btn-left text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchrfc" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por RFC<br><br></a>
                                    </div>


             <div id="a8" style="display: none;">
                <input type="text" id="rfsear" name="rfsear" ng-model="rfsear" style="width: 200px;">
       </div>
                                </div>
                            </div>
                        </div>
                    </div>


                      <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-home text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchclv" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por Clave Catastral<br><br></a>
                                    </div>


             <div id="a23" style="display: none;">
          <input type="text" id="clv" name="clv" ng-model="clv" style="width: 200px;">
       </div>
                                </div>
                            </div>
                        </div>
                    </div>


                      <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class=""><a id="searchepx" style="cursor: pointer; color: black; font-weight: bold;">Búsqueda por Especialista<br><br> </a>
                                    </div>

           <div id="a4" style="display: none;">

          <select id="espx" name="espx" ng-model="espx" style="width: 200px; height: 25px; margin-top: 5px;">
            </select>
       </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>




       <input type="hidden" id="opt" name="opt" >
       <div class="col-md-12 text-center">
<div id="alertb" style="display: none;">
       <h4 style="text-align: center; color:#8b4c55;"> Esta búsqueda tiene 0 Resultados</h4><br>
</div>

        <center>
            <br>
             <input id="bavg" type="button" name="buscar" class="btn " style="background-color: #414558; border-color: #414558; color: white;" value="Buscar" ng-click="buscarDictaj()">
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
          <div class="col-md-12">
            <div class=""><h5 style="font-weight: bold;">Criterios de Búsqueda Seleccionados:</h5></div>
            <div class=""><h5 id="infof" style=""></h5>

            </div>

          </div>
          <!--div class="col-md-12">
            <div class="col-md-2" style="font-weight: bold;">Total de Avisos:</div>
            <div class="col-md-1">1</div>
            <div class="col-md-3" style="font-weight: bold;">Total de Dictamenes:</div>
             <div class="col-md-1">14</div>
            <div class="col-md-4" style="font-weight: bold;">Total de Dictamenes en el Municipio:</div>
            <div class="col-md-1">0
              <br><br><br><br>
            </div>

          </div-->
          <div class="col-md-12"><br>
            <h5 style="font-weight: bold;">DICTAMENES ENCONTRADOS</h5>
          </div>
           <form id="myForm">
       <div class="col-md-12 table-responsive">
        <table id="example" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="color: black;">
         <thead>
            <tr>
              <th style="text-align: center; background-color: #d0d8f3;">Folio de dictamen</th>
              <th style="text-align: center; background-color: #d0d8f3;">Fecha Presentación</th>
              <th style="text-align: center; background-color: #d0d8f3;">Tipo</th>
              <th style="text-align: center; background-color: #d0d8f3;">Contribuyente</th>
              <th style="text-align: center; background-color: #d0d8f3;">Especialista</th>
            </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in tbldictsearx">
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

     <!--div class="col-md-12">

      <div class="col-md-3"></div>
      <div class="col-md-2"><input type="button" name="salir" class="btn btn-danger" value="Salir"> </div>
      <div class="col-md-2"><input type="button" name="export" class="btn btn-primary" value="Exportar"> </div>
      <div class="col-md-2"><input type="button" name="export2" class="btn btn-success" value="Exportar"> </div>
      <div class="col-md-3"><br><br><br><br></div>
    </div-->
    </div>
       </center>








             <!--
       <form id="myForm">
       <div class="col-md-12 table-responsive" ng-app="Appadmdtmviewpen" ng-controller="AppadmdtmviewpenControllerTab">
        <table id="table_dtm" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="max-width: 100%; height: auto; font-size: small; text-align: center; color: black;">
<thead>
<tr>
<th style="display: none;">_</th>
        <th style="background-color: #d0d8f3;">FOLIO DE DICTAMEN</th>

        <th style="background-color: #d0d8f3;">CONTRIBUYENTE</th>
        <th style="background-color: #d0d8f3;">CORREO ELECTRONICO DEL CONTRIBUYENTE</th>
        <th style="background-color: #d0d8f3;">ESPECIALISTA</th>

</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_dtmpen">
            <td style="display: none;">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</td>
            <td><a href="" onclick="tablaInmueblesP(3);" data-toggle="modal" data-target=".bd-example-modal-lg">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</a></td>

            <td>{{x.nombredenominacion}}{{x.nombre_c}}</td>
            <td>{{x.email}}</td>
            <td>{{x.nombre_especialista}}</td>
</tr>
</tbody>
</table>
          <br><br>
         </form> -->
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
