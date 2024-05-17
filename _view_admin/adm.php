<?php include '../web/validateadm.php';
//$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];$ruta = explode("/", $url);$to=count($ruta);
include '../const.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Inicio de Administrador </title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link href="<?php echo jsdict; ?>vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
   <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>


</head>

  <body ng-app="Appadmvers" ng-controller="AppadmversController">

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
                            <li><a href="../AdminAutorizados/10">Autorizados</a></li>
                           <!--<li><a href="../Admin6Gris/">Busqueda de Dictamenes</a></li> -->
                           <li><a href="../AdminReasig/">Reasignar Especialista</a></li>
                           <li><a href="../AdminReasig/">Reasignar Revisor</a></li>
                            <li><a href="../AdminEstatus/">Estatus</a></li>

                        </ul>
                    </li>

                   <li><a  href="../Admin5Gris/"  aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Versi&oacute;n</span></a>

                    </li>
                    <li><a href="../manualAdminGeneral/"><i class="ti-file"></i>Manual de Usuario</a></li>
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
                               <center>
                                <h4 class="card-title">Bienvenido Administrador</h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                <img src="../../_img/dictamen1.jpg" style="width: 100%;">
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

    </div>
    <script src="<?php echo jsdict; ?>vendor/global/global.min.js"></script>
    <script src="<?php echo jsdict; ?>js/quixnav-init.js"></script>
    <script src="<?php echo jsdict; ?>js/custom.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="<?php echo jsdict; ?>js/plugins-init/jquery.validate-init.js"></script>
    <script src="<?php echo jsdict; ?>js/plugins-init/jquery-steps-init.js"></script>

     <script type="text/javascript">
    function voidindex(){
    	location.href = "../AdminGris/";
    }

    function void1(){
        //
        location.href = "../AdminGris/";
    }

    function void2(){

        location.href = "../SeguimientoContribuyente/";
    }

    function void3(){

        location.href = "../SeguimientoContribuyente2/";
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
      <style>

div#message {
  display:none;
}




   </style>

</body>

</html>