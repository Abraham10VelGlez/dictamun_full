<?php include '../web/validateC.php'; 
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
    <title>Seguimiento de dictamenes</title>
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

    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app5.js"></script> 


</head>

<body ng-app="app8"  ng-controller="ControllerTab8">
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
                    <li class="nav-label first" >  <h3 style="color: #ffff;">
                              DICTAMUN MUNICIPAL
                                  </h3>  </li>
                    
                     <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>
                        
                    </li>
                    
                    <li><a  href="javascript:void1()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Registro de Aviso de Dictamen</span></a>
                        
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-magnify"></i><span class="nav-text">Seguimiento</span></a>
                        <ul aria-expanded="false">
                            <li><a href="../SeguimientoContribuyente/">Dictamenes Registrados</a></li>
                           
                            <li><a href="../SeguimientoContribuyente2/">Dictamenes en Proceso y Validados</a></li>
                        </ul>
                    </li>
                    <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>
                        
                    </li>
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
                                    <div class="table-responsive">
                                        <div id="app"  class="w3-container"><br>
      <div class="col-md-12"><br><br> <center><h3 style="text-align: center;">Seguimiento de dictamenes en proceso y validados</h3></center>
      <div class="container-fluid">
      <div class="row">
      
    <div class="col-sm-3"></div>
    <div class="col-sm-2" style=""><br><br>
           </div>
             <div class="col-sm-1"></div>
    <div class="col-sm-2" style="">
    </div>
    <div class="col-sm-4"></div>  
    <div class="col-sm-3"></div>
    <div class="col-sm-2" style=""><br>
        
    </div>
     <div class="col-sm-1"></div>
    <div class="col-sm-2" style="">
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
</div>
      <br>
      </div>
         <div id="tblseg"  class="col-md-12 table-responsive">
            <center>
                   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">INMUEBLES</h5>
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
              <h4 id="titulo1" style="display: none;">Dictamenes en proceso</h4>
              
              <input type="text" name="sinRegistro" id="sinRegistro" value="Sin registro de dictamenes en proceso" style="border: none; color: #8b4c55; width: 370px; display: none; text-align: center; font-size: large;">
              
                   
       <table id="myTabl2" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="font-size: small; text-align: center; color: black;">
      <thead> 
      <tr>   
        <th style="display: none;">_</th>
       
        <th style="background-color: #d0d8f3; ">Folio de Presentaci&oacute;n</th>
        <th style="background-color: #d0d8f3; ">Fecha de Registro</th>
        <th style="background-color: #d0d8f3; ">A&ntilde;o a dictaminar</th>
      
        <th style="background-color: #d0d8f3; ">Nombre contribuyente </th>
    
        <th style="background-color: #d0d8f3; ">Dictaminador</th>
        
        <!--<th style="background-color: #d0d8f3; ">Aviso de Dictamen</th>-->
                         
        
      </tr>
    </thead>
        <tbody style="font-size: small;">

          <tr ng-repeat=" x in myTabl1ec">
          <td style="display: none;">{{x.acuse}}</td>
         
           <td><a href="" onclick="tablaInmuebles(1);" data-toggle="modal" data-target=".bd-example-modal-lg" >
           {{x.acuse}}</a>
             <td>{{x.fecha_registro}}</td>
            <td>{{x.aniodictamen}}</td>
            <td>{{x.nombredenominacion}} {{x.apaterno}} {{x.amaterno}}</td>
            <td>{{x.nombre_especialista}}</td>      
           <!-- <td><a href="../avisoDictamen">{{x.acuse}}</a></td>  -->             
          </tr>
          
        </tbody>
    </table>
    </center>
    <br><br><br>
     <br><br><br>
     <center>
      <h4 id="titulo2" style="display: none; text-align: center;">Dictamenes Validados</h4>
      <input type="text" name="sinRegistro2" id="sinRegistro2" value="Sin registro de dictamenes validados" style="border: none; color: #8b4c55; width: 370px; display: none; text-align: center; font-size: large;">
<div id="tblseg2"  class="col-md-12 table-responsive" style="display: none;">

      <table id="myTabl2" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="font-size: small; text-align: center; color: black;">
      <thead> 
      <tr>   
        <th style="display: none;">_</th>
        <th style="background-color: #d0d8f3; ">Folio de Presentaci&oacute;n</th>
        <th style="background-color: #d0d8f3; ">Estatus de Dictamen</th>
        <th style="background-color: #d0d8f3; ">Fecha de Registro</th>
        <th style="background-color: #d0d8f3; ">A&ntilde;o a dictaminar</th>
        <th style="background-color: #d0d8f3; ">Nombre contribuyente </th>
        <th style="background-color: #d0d8f3; ">Dictaminador</th>
                   
        
      </tr>
    </thead>
        <tbody style="font-size: small;">
          <tr ng-repeat=" x in myTabl1ec2">
          <td style="display: none;">{{x.acuse}}</td>
            <td><a href="" onclick="tablaInmuebles(2);" data-toggle="modal" data-target=".bd-example-modal-lg" >{{x.acuse}}</a>
            </td>
            <td>{{x.etapadictamen}}</td>
             <td>{{x.fecha_registro}}</td>
            <td>{{x.aniodictamen}}</td>
            <td>{{x.nombredenominacion}} {{x.apaterno}} {{x.amaterno}}</td>
            <td>{{x.nombre_especialista}}</td>               
          </tr>
        </tbody>
    </table>
    <br><br><br>
</center>
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
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/global/global.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/js/quixnav-init.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/morris/morris.min.js"></script>


    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="<?php echo SERVERURL; ?>jsvendor/js/dashboard/dashboard-1.js"></script>



     <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/menubar/sidebar.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->

    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo SERVERURL; ?>jsvendor/assets/js/lib/data-table/datatables-init.js"></script>
    
    <script type="text/javascript">
    function voidindex(){
    	location.href = "../DatosContribuyente/";
    }
        
    function void1(){
        //alert("asdasd");
        location.href = "../DatosContribuyente/";
    }

    function void2(){
        //alert("asdasd");
        location.href = "../SeguimientoContribuyente/";
    }

    function void3(){
        //alert("asdasd");
        location.href = "../SeguimientoContribuyente2/";
    }

    function voidclose(){
        //alert("asdasd");
    	//location.href = "PadronDictaminadores";
    	$.post("../../acceso",{acceess:10102},function(z){
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