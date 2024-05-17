<?php include '../web/validateM.php';//$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];$ruta = explode("/", $url);$to=count($ruta); 
include '../const.php';
?>

<!DOCTYPE html>
<html lang="en">

 
                                                
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Inicio de Administrador </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <!-- Form step -->
    <link href="<?php echo jsdict; ?>vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    
    <!-- SCRIPTS TO TABLES -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">
<script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appaM2.js"></script>
    <!-- SCRIPTS TO TABLES -->     
    

</head>

  <body ng-app="Appadmdtmview" ng-controller="AppadmdtmviewControllerTab">

 
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="#" class="brand-logo">
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
                                    <div class="pulse-css" style="background: #7cdb3b;"></div>
                                     
                              
                                </a>
                               
                            </li>
                            <li class="nav-item dropdown header-profile" style="color: black;">
                              MUNICIPIO: <?php echo $_SESSION['usuarioactual']; ?>
                               
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
                           <li><a href="../DictProcc/">Dictamenes en Proceso</a></li>
                           <li><a href="../DictEmt/">Dictamenes Validados</a></li>                           
                        </ul>
                    </li>
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
                                <h4 class="card-title">Dictamenes Validados</h4>
                            </div>
                            <div class="card-body">
                        <div  class="container table-responsive">

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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="tablaxinmuebleOcultar();" style="background-color: #414558; border-color: #414558; color: white;">Cerrar</button>
                                   
                                </div>
                            </div>
                        </div>
                    </div> 

 <form id="myForm">
       <div class="col-md-12 table-responsive">
        <table id="table_dtm" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="color: black;">
<thead>
<tr>
<th style="display: none;">_</th>
        <th style="background-color: #d0d8f3;">FOLIO DE DICTAMEN</th>
        
        <th style="background-color: #d0d8f3;">TIPO</th>
        <th style="background-color: #d0d8f3;">MUNICIPIO</th>
        <th style="background-color: #d0d8f3;">CONTRIBUYENTE</th>        
        <th style="background-color: #d0d8f3;">ESPECIALISTA</th>   
                    
</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_dtm">
            <td style="display: none;">{{x.acuse_recpecion2}}</td> 
            <td><a href="" onclick="tablaInmuebles(2)" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer;" >{{x.acuse_recpecion2}}</a></td>
            <!--<td>{{x.acuse_recpecion2}}</td>-->
            
            <td>{{x.tipoditc}}</td>
            <td>{{x.id_municipio}}</td>                       
            <td>{{x.nombredenominacion}}{{x.nombre_c}}</td>                       
            <td>{{x.nomespecialista}}</td>              
                                    
 
            
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
        
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
         <div class="footer">
            <div class="copyright">
                <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
                
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main content to read-write
    ***********************************-->
    
                                                

    <!--**********************************
        HTML TO EDIT AND DELETE
        
        
        
    ***********************************-->
       
    
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
    
    
     <script type="text/javascript">
    function voidindex(){
    	location.href = "../InicioM/";
    }
        
    function void1(){
        //
        location.href = "../InicioM/";
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
      <style>
//
//
div#message {
  display:none;
}




   </style>

</body>

</html>