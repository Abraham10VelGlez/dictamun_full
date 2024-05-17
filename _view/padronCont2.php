
<?php include '../const.php'; ?>


<?php include '../web/validatesess.php'; ?>

<!DOCTYPE html>
<html lang="en">

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
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app_info.js"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appa5.js"></script>



</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header" style="background-color: #474648;">
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

                    </div>
                </nav>
            </div>
        </div>
         <div class="quixnav" style="background-color: #474648;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first" > <h3 style="color:#ffffff;">DICTAMUN MUNICIPAL</h3> </li>
                    
                     <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>
                        
                    </li>
                    
                    <li><a  href="javascript:void1()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Registro de Contribuyentes</span></a>
                        
                    </li>
                    <li><a  href="javascript:void2()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Padrón de Dictaminadores</span></a>
                        
                    </li>
                   
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
                                <h4 class="card-title">Padrón de Dictaminadores</h4>
                            </div>
                            <div class="card-body">
                        <div ng-app="app1" ng-controller="ControllerTab1" class="container table-responsive">
<br>
<table class="table table-striped table-bordered" datatable="ng" dt-options="vm.dtOptions" style="color: black;">
<thead style="text-align: center;">
<tr >
<th style="display: none;">_</th>
        <th>No.Registro</th>
        <th class="rfcEspecialista2">RFC</th>
        <th class="especialista">Especialista</th>
        <th class="tel">Telefono</th>
        <th class="correo">Correo</th>
</tr>
</thead>
<tbody style="text-align: center;">
<tr ng-repeat="x in empList">
<td style="display: none;">
						{{x.id_tmp}}																	
						</td>	    
						<td>{{x.no_reg_autorizado}}</td>
						<td class="rfcEspecialista">{{x.rfc}}</td>
						<td>{{x.nombre_especialista}}						
						</td>
						<td>{{x.telefono}}</td>
						<td>{{x.correo}}</td>
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
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
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
    	location.href = "../";
    }
        
    function void1(){
        //alert("asdasd");
        location.href = "Registro_C";
    }

    function void2(){
        //alert("asdasd");
        location.href = "PadronDictaminadores";
    }

    </script>



</body>

</html>
  