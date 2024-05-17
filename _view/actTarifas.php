
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
   <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appaTarifas.js"></script>
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
                    <li><a href="../actualizacionTarifas/"><i class="ti-money"></i>Actualización de tarifas</a></li>
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
                             
                                    <h3 class="card-title">Actualización de tarifas</h3>
                                    <br><br>
                            </div>
                            <h4 style="text-align: center;">Tarifas <?php echo $anio = date("Y");  ?> </h4>

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
                                </div>
                                <div class="modal-footer">
                                <!--  onclick="tablaxinmuebleOcultar();" -->
                                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #414558; border-color: #414558; color: white;">Cerrar</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div> 
                            <div class="card-body">
                 
       <form id="myForm">
       <div class="col-md-12 table-responsive" ng-app="Appadmdtmviewpen" ng-controller="AppadmdtmviewpenControllerTab">
        <table id="table_dtm" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="max-width: 100%; height: auto; font-size: small; text-align: center; color: black;">
<thead>
<tr>
        <th style="background-color: #d0d8f3;">No.</th>
        <th style="background-color: #d0d8f3;">limite inferior</th>
        <th style="background-color: #d0d8f3;">Limite superior</th>
        <th style="background-color: #d0d8f3;">Cuota Fija</th>
        <th style="background-color: #d0d8f3;">Factor por rango</th>
                      
</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_dtmpen">
            <td>{{x.id}}</td>  
            <td>{{x.limiteinferior}}</td> 
            <td>{{x.limitesuperior}}</td> 
            <td><input type="text" name="cuotaFija{{x.id}}" id="cuotaFija{{x.id}}" value="{{x.cuotafija}}"></td>
            <td><input type="text" name="factoRango{{x.id}}" id="factoRango{{x.id}}" value="{{x.factorporrango}}"></td>   
                 
                                            
</tr>
</tbody>
</table>
          <br><br>
          <center>
              <input type="button" name="actualizarT" id="actualizarT" class="btn" style="background-color: #414558; border-color: #414558; color: white;" value="Actualizar" onclick='actualizarTarifas();'> 
          </center>
         
         </form>
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
  