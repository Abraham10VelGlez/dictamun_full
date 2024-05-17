<?php include '../web/validateadm.php';//$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];$ruta = explode("/", $url);$to=count($ruta);
include '../const.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Nuevo Usuario </title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link href="<?php echo jsdict; ?>vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_admin/_appa_xnewu.js"></script> 
</head>

<body ng-app="Appadmusu" ng-controller="AppadmusuController">

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

                    <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>

                    </li>
                </ul>
            </div>


        </div>

        <div class="content-body">
            <div class="container-fluid">
             <div class="row" id="reg_newuresulx" >
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>

                            <div class="row">
                <div class="col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Este número de registro ya existe y le pertenece al siguiente usuario:</h4>
                            </div>
                            <div class="card-body" style="style: black;color: black;">
                                  <div class="col-lg-12 col-sm-12">
                                <center>
                                <h4 class="card" id="aaax"></h4>
                                 </center>
                                 <center>
                                 <img src="<?php echo jsdict; ?>assets/images/hand.jpg" style="width: 80px; height: 80px;width:80px; height:80px;" />
                                 <br><br><button type="button" class="btn btn-success" onclick="redwriteavg();">Editar el Registro</button>
                                 </center>
                                </div>
                            </div>
                        </div>

                </div>
                </div>
                 </div>

                            </div>
                            </div>

            <div class="row" id="reg_newuresul" >
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>

                            <div class="row">
                <div class="col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">A Finalizado el registro de un Nuevo Usuario con Éxito</h4>
                            </div>
                            <div class="card-body" style="style: black;color: black;">
                                  <div class="col-lg-12 col-sm-12">
                                <center>
                                <h4 class="card-title" id="aaa"></h4>
                                 </center>
                                 <center>
                                 <img src="<?php echo jsdict; ?>assets/images/hand.jpg" style="width: 80px; height: 80px;width:80px; height:80px;" />
                                 <br><br><button type="button" class="btn btn-success" onclick="finishavg();">Terminar Registro</button>
                                 </center>


                                </div>
                            </div>
                        </div>

                </div>
                </div>
                             </div>

                            </div>
                            </div>
                <div class="row" id="reg_newu" >
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>

                            <div class="row">
                <div class="col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nuevo Usuario</h4>
                            </div>
                            <div class="card-body" style="style: black;color: black;">
                                <div class="basic-form">
                                    <form id="formulario" name="formulario" method="POST">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Perfil</label>
                                            <div class="col-sm-10">

                                                 <select class="form-control" id="selectp" name="selectp" ng-model="selectp"  style="">
                                                 <option value="_">Selecciona un perfil</option>
                                                 <option value="2">Dictaminador</option>
                                                 <option value="3">Revisor</option>
                                                 <option value="5">Delegado</option>
       </select>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageperf" name="messageperf" style="color:  #c22708;" hidden="">
                                            Selecciona un perfil, de esto dependera el tipo de usuario
                                            </div>

                                            </div>

                                        </div>



                                        <div id="r5" class="form-group row">

                                            <label class="col-sm-2 col-form-label">Delgación</label>
                                            <div class="col-sm-10">
                                                 <select  class="form-control" id="selectpd" name="selectpd" ng-model="selectpd">
                                                 <option value="0">Selecciona una Delegación</option>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messagedelega" name="messagedelega" style="color:  #c22708;" hidden="">
                                            Selecciona una Delegación, debes conocer cuantas delegaciones activas tienes actualmente para abrir una nueva cuenta
                                            </div>

                                            </div>

                                        </div>
                                        <div id="r6" class="form-group row">
                                            <label class="col-sm-2 col-form-label">No. Registro</label>
                                            <div class="col-sm-10">
                                                 <input class="form-control" type="text" onkeypress=""  maxlength="10" id="registro" name="registro" ng-model="registro"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messagenumreg" name="messagenumreg" style="color:  #c22708;" hidden="">
                                            Ingresa solo números, en caso de que este numero ya exista no podras guardarlo
                                            </div>

                                            </div>

                                        </div>


                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" onkeyup="validarNombre()" onblur="validarNombre()" id="nomu" name="nomu" ng-model="nomu" />
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="message" name="message" style="color:  #c22708;" hidden="">
                        Nombre incorrecto. Introducir solo letras y no dejar el campo vacio.
                                            </div>

                                            </div>

                                        </div>


                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Apellido Paterno</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" onkeyup="validarAPP()" onblur="validarAPP()" id="apu" name="apu"   ng-model="apu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageAP" name="messageAP" style="color:  #c22708;" hidden="">Apellido Incorrecto. Introducir solo letras y no dejar el campo vacio.</div>

                                            </div>

                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Apellido Materno</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" onkeyup="validarAPM()" onblur="validarAPM()" id="amu" name="amu"   ng-model="amu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageAM" name="messageAM" style="color:  #c22708;" hidden="">Apellido Incorrecto. Introducir solo letras y no dejar el campo vacio.</div>

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">CURP</label>
                                            <div class="col-sm-10">
                                                <input  class="form-control" type="text" maxlength="19"  onkeyup="validarCurp()" onblur="validarCurp()" id="curpu" name="curpu" ng-model="curpu"/>
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
                                            <label class="col-sm-2 col-form-label">RFC</label>
                                            <div class="col-sm-10">
                                               <input class="form-control" type="text" maxlength="13" onkeyup="validarRfc()" onblur="validarRfc()" id="rfcu" name="rfcu"   ng-model="rfcu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="msjRFC" name="msjRFC" style="color:  #c22708;" hidden="">RFC Incorrecto. Introducir letras y números, no dejar el campo vacio.</div>

                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Correo Electrónico</label>
                                            <div class="col-sm-10">
                                               <input class="form-control" type="text" onkeyup="validaremailF()" onblur="validaremailF()" id="emailu" name="emailu"   ng-model="emailu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageEmail" name="messageEmail" style="color:  #c22708;" hidden="">Correo Electrónico Incorrecto.  Acompleta el dato y no dejar el campo vacio.</div>

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Telefono</label>
                                            <div class="col-sm-10">
                                               <input  class="form-control" type="text" onkeypress="validarTelA()"  maxlength="10" id="telu" name="telu" ng-model="telu"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messagetell" name="messagetell" style="color:  #c22708;" hidden="">Telefono Incorrecto. Acompleta el dato y no dejar el campo vacio.</div>

                                            </div>
                                        </div>







                                        <div class="form-group row">
                                            <div class="col-sm-12">



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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>


                                            </div>
                                        </div>
                                         <div class="form-group row">
                                         <div class="col-sm-4">
                                             &nbsp;
                                             </div>
                                            <div class="col-sm-2">
                                            <center>

                                            <button type="submit" id="xnw" class="btn btn-success  btn-lg m-b-10" ng-click="newU();" value="Registrar" style="background-color: #414558; border-color: #414558; color: white;">Registrar</button>
                                            </center>
                                             </div>
                                             <div class="col-sm-1">
                                             &nbsp;
                                             </div>
                                             <div class="col-sm-2">
                                             <center>

                                             <input type="button" id="xnrest" class="btn btn-danger btn-lg m-b-10" ng-click="CXU();" value="Cancelar" style="background-color: #8b4c55; border-color: #8b4c55; color: white;">
                                             </center>
                                             </div>
                                             <div class="col-sm-4">
                                             &nbsp;
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
        HTML TO EDIT AND DELETE



    ***********************************-->


    <!-- Required vendors -->
    <script src="<?php echo jsdict; ?>vendor/global/global.min.js"></script>
    <script src="<?php echo jsdict; ?>js/quixnav-init.js"></script>
    <script src="<?php echo jsdict; ?>js/custom.min.js"></script>



    <script src="<?php echo jsdict; ?>vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="<?php echo jsdict; ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="<?php echo jsdict; ?>js/plugins-init/jquery.validate-init.js"></script>



    <!-- Form step init -->
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

div#r5 {
  display:none;
}
div#r6 {
  display:none;
}
div#reg_newuresul {
  display:none;
}
div#reg_newuresulx{
  display:none;
}


   </style>

</body>

</html>
