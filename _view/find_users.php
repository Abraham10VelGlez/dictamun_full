
<?php include '../const.php'; ?>

<?php include '../web/validatesess.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registro de Contribuyentes </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    //_appa_new_find_user.js

    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appa_new_find_user.js"></script>
</head>

<body ng-app="Appadmusu" ng-controller="AppadmusuController">
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper" >
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
        <div class="header" >
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
                                class="icon icon-home"></i><span class="nav-text">Regresar a Inicio</span></a>

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
                                <p class="card-title" style="font-size: large; font-weight: bold; text-align: center;">Recupera tu contrase&ntilde;a</p>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id="formulario" name="formulario" method="POST">




                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="color: black; text-align: right; font-size: large;">CURP: </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" placeholder="" type="text" maxlength="19"  onkeyup="validarCurp()" onblur="validarCurp()" id="curpu" name="curpu" ng-model="curpu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="msjCurp" name="msjCurp" style="color:  #c22708;" hidden="">
                        CURP incorrecto. Introducir letras y números, no dejar el campo vacio.</div>

                                            </div>

                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="color: black; text-align: right; font-size: large;">RFC: </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" placeholder="" type="text" maxlength="13" onkeyup="validarRfc()" onblur="validarRfc()" id="rfcu" name="rfcu"   ng-model="rfcu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="msjRFC" name="msjRFC" style="color:  #c22708;" hidden="">RFC Incorrecto. Introducir letras y números, no dejar el campo vacio.</div>

                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="color: black; text-align: right; font-size: large;">Correo Electrónico: </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" placeholder="" type="email" onkeyup="validaremailF()" onblur="validaremailF()" id="emailu" name="emailu"   ng-model="emailu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageEmail" name="messageEmail" style="color:  #c22708;" hidden="">Correo Electrónico Incorrecto.  Acompleta el dato y no dejar el campo vacio.</div>

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" style="color: black; text-align: right; font-size: large;">Correo Electrónico donde se enviaran el acceso recuperado: </label>
                                            <div class="col-sm-10">
                                                <input class="form-control" placeholder="" type="email" onkeyup="validaremailsended()" onblur="validaremailsended()" id="emailuextr" name="emailuextr"   ng-model="emailuextr"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageEmailext" name="messageEmailext" style="color:  #c22708;" hidden="">Correo Electrónico Incorrecto.  Acompleta el dato y no dejar el campo vacio.</div>

                                            </div>

                                        </div>






                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                            <center>
                                                <button type="submit" class="btn btn-lg m-b-10" id="registroU" ng-click="finderuser();" style="background-color: #414558; border-color: #414558; color: white;">Buscar</button>
                                                </center>
                                                <center id="baravg" style="display: none;">
                                                <div  class="col-sm-12">
                                                            <!-- div id="porc" class="progress-bar bg-danger wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div-->
                                                            <progress  id="html5" max="100" value="0" style="/* Elimino la apariencia por defecto */
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    /* Quito el borde que aparece en Firefox */
    border: none;

    /* Añado mis propios estilos */
    width: 100%;
    height: 30px;
    overflow:hidden;

/*  Estos estilos solo se aplicaran al fondo de la barra en mozilla */
        border:1px inset #666;
    background-color:#D8D8D8;
    border-radius : 20px ;"></progress>
			<span></span>
                                                        </div>


                                                </center>










<!-- Modal true style="margin: 12.75rem auto;" -->
<div class="modal fade" id="examplet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document" style="margin: 12.75rem auto;">
    <div class="modal-content">
      <div class="modal-header">
      <center>
        <h3 class="modal-title" id="exampleModalLabel">CONFIRMACIÓN</h3>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><img src="<?php echo jsdict; ?>assets/images/hand.jpg" style="width: 80px; height: 80px;width:80px; height:80px;" /></center>
      <div id="messgerT"  class="modal-body" style="color: black;">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #8b4c55; border-color: #8b4c55; color: white;">Cerrar</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal error       style="margin: 12.75rem auto;"-->
<div class="modal fade" id="examplef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document" style="margin: 12.75rem auto;">
    <div class="modal-content">
      <div class="modal-header">

      <center>

        <h3 class="modal-title" id="exampleModalLabel"> <span class="ti-alert" style="color: #ffa735;"></span> ADVERTENCIA</h3>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="messgerF" class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
                                            </div>
                                        </div>
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
    	location.href = "../../";
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
