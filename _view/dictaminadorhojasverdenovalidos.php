<?php include '../web/validateE.php'; 
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
    <title>En hojas verdes no validos</title>
    <?php include '../const.php'; ?> 
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app8nogreen.js"></script> 

    <link href="<?php echo jsdict; ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>assets/css/lib/themify-icons.css" rel="stylesheet">
</head>

  <body ng-app="app2"  ng-controller="ControllerTab2">
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
                              <?php echo "Dictaminador:  ".$_SESSION['usuarioactual']; ?>
                               
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
                           <li><a href="../SeguimientoDictamen/1">En Seguimiento</a></li>
                           <li><a href="../dictamenesPreautorizados/">Pendientes (archivo en hojas verdes)</a></li>
                           <li><a href="../SeguimientoDictamenNOGREEN/12">En hojas verdes no validos</a></li>   
                           <li><a href="../observadosPorMunicipio/1">Observados por el municipio</a></li>                           
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
                      

                        <!-- tablasss  --->

                         <div id="tblseg" class="col-md-12 table-responsive" style="display: none;">
                           <center>

                             <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">INMUEBLES</h5>
                                   
                                <!--    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->

                                </div>
                                <div class="modal-body">
                                   <input type="text" name="folioInmueble" id="folioInmueble" style="border: none; text-align: center; font-weight: bold; font-size: large;">
                                    <br><br> 
                                    <div id="tablaxinmueble">
                                 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <!--  onclick="tablaxinmuebleOcultar();" -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div> 



    <br><br><br>
   
    <center>
        <h4>Dictamenes con Hojas Verdes No Valido</h4>
         <br>
         <input type="text" name="sinRegistro4" id="sinRegistro4" value="Sin registro de dictamenes cancelados." style="border: none; color: #b30a0a; width: 370px; text-align: center;" hidden="">
      </center>
       </div>
       <br><br>
    <div id="tblseg4" class="col-md-12 table-responsive">
      <table id="myTabl1e4" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="max-width: 100%; height: auto; font-size: small; text-align: center; color: black;">
      <thead> 
      <tr>
     <th style="display: none;">_</th> 
      <th style="background-color: #d0d8f3;">Folio de Presentaci&oacute;n</th>
      <th style="display: none;">_</th>
     <!-- <th style="background-color: #d0d8f3;">Clave catastral</th> 
      <th style="background-color: #d0d8f3;">Estatus</th>  -->
        <th style="background-color: #d0d8f3;">No.Registro</th>
        <th style="background-color: #d0d8f3;">A&ntilde;o a dictaminar</th>
        <th style="background-color: #d0d8f3;">Fecha de Registro</th>
       
      </tr>
    </thead>
        <tbody>
          <tr ng-repeat=" x in lista_aaax">
            <td style="display: none;">{{x.etapa_folio_d}}{{x.acuse}}</td>
        <!-- <td><a href="" onclick="dictamenrechz()" />AD/{{x.fol}}/{{x.aniodictaminar}}/{{x.fecha}}{{x.cclave}}</a></td> --> 
            <td style="display: none;">{{x.folio}}</td>
            <td style="display: none;">{{x.tipodepers}}</td>  
            
            <td><a href="" onclick="tablaInmueblesP(53);" data-toggle="modal" data-target=".bd-example-modal-lg" >{{x.etapa_folio_d}}{{x.acuse}}</a></td>
          <!--  <td>{{x.etapadictamen}}</td>    -->
            <td style="display: none;">{{x.cclave}}</td> 
            <td>{{x.dictaminador}}</td>
            <td>{{x.aniodictamen}}</td>
            <td>{{x.fechr}}</td>
           <!-- <td><a href="" target="_blank" onclick="avisoCC()"/>{{x.etapa_folio_d}}{{x.acuse}}</a></td>   -->                    
          </tr>
        </tbody>
    </table>
  <br><br>
    </div>
     <br><br>

</div>
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
    	location.href = "../SeguimientoDictamen/1";
    }
        
    function void1(){
        //
        location.href = "../SeguimientoDictamen/1";
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