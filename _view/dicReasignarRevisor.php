<?php include '../web/validateadm.php';
include '../const.php';
//$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];$ruta = explode("/", $url);$to=count($ruta); 
?> 
<!doctype html>
<html>
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reasignar Revisor IGECEM </title>
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
                              ADMINISTRADOR: <?php echo $_SESSION['usuarioactual']; ?>
                               
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
                                <h4 class="card-title">Reasignar Revisor IGECEM</h4>
                                
                            </div>
                            <div class="card-body">
                                <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                  <div class="container-fluid">
                                                <h3 style="text-align: center; font-weight: bold;">Reasignación de Revisor por clave catastral</h3><br>
     <center>
       <h5 style="font-weight: bold;">**Solo se podra Reasignar revisor en los dictamenes que se encuentran en etapa 4 y posteriores.**</h5>
     

              <!--      <div class="col-md-4"><br><br><br><h5>Selecciona al nuevo revisor:</h5><br></div>
       <div id="s" class="col-md-6" style="font-weight: bold;">
       <select id="Rvigcm2" name="Rvigcm2" class="cm" ng-model="Rvigcm2" style="width:400px"></select><br><br> 
       </div>  -->
       </center>

        <center>

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
                                   
                                    <div class="col-md-4"><br><br><h5>Selecciona al nuevo revisor:</h5><br></div>
       <div id="s" class="col-md-6" style="font-weight: bold;">
       <select id="Rvigcm2" name="Rvigcm2" class="cm" ng-model="Rvigcm2" style="width:400px"></select><br><br>
       </div>
        <p id="alerr" style="color: #8b4c55; font-weight: bold;"></p>

                                    <div id="tablaxinmueble">
                                 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <!--  onclick="tablaxinmuebleOcultar();" -->
                                    <input type="button" class="btn" id="btnasgrr" name="btnasgrr" ng-click="btnasgrr()" value="Reasignar" style="background-color: #414558; border-color: #414558; color: white;" />
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #8b4c55; border-color: #8b4c55; color: white;">Cerrar</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div> 

       <!--<input type="button" class="btn btn-success" id="btnasgrr" name="btnasgrr" ng-click="btnasgRevisor()" value="Reasignar" style="background-color: #414558; border-color: #414558; color: white;" /> -->
         <p id="alerr" style="color: red;"></p>
         </center> 
            <form id="myForm">
       <div class="col-md-12 table-responsive">
        <table id="table_dtm" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions">
<thead>
<tr>
<th style="display: none;">_</th>
      
        <th style="background-color: #d0d8f3;">NO. DICTAMEN</th>
        <th style="background-color: #d0d8f3;">TIPO</th>
        <th style="background-color: #d0d8f3;">CONTRIBUYENTE</th>        
        <th style="background-color: #d0d8f3;">ESPECIALISTA</th>
       <!-- <th style="background-color: #d0d8f3;">REVISOR</th>   -->           
</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_dtmpen">
            <td style="display: none;">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</td>
             <td><a href="" onclick="tablaInmueblesP(4);" data-toggle="modal" data-target=".bd-example-modal-lg">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</a></td> 
         <!--<td style="color: black;">{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</td>  -->  
            <!--<td>{{x.acuse_recpecion2}}</td>-->
            
            <td style="color: black;">{{x.tipoditc}}</td>                     
            <td style="color: black;">{{x.nombredenominacion}} {{x.apaterno}} {{x.amaterno}}</td>
            
            <td style="color: black;">{{x.nombre_espec}}</td>          
                                    
 <!-- <td style="color: black;">{{x.nombre_revisor}}
  <input type="checkbox" class="className" value="{{x.folio}}" />
</td> -->
            
</tr>
</tbody>
</table>
          <br><br>
         </form>


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
        
         <div class="footer">
            <div class="copyright">
               <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
            </div>
        </div>

     </div>

<script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appRRev.js"></script>

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