<?php include '../web/validateadm.php';//$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];$ruta = explode("/", $url);$to=count($ruta);
include '../const.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lista de Usuarios </title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link href="<?php echo jsdict; ?>vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">

    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js_admin/_appa_tableusu.js"></script>

</head>

<body ng-app="Appadmusuview" ng-controller="AppadmusuviewControllerTab">

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
             <div class="row">
                <div class="col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                Lista de Usuarios
                                </h4>
                            </div>
                            <div class="card-body">
                        <div class="container table-responsive">

<br>
<table id="table_ususw" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="color: black;">
<thead>
<tr style="text-align: center;">
<th style="display: none;">_</th>
<th>No.REGISTRO</th>
        <th>NOMBRE</th>
        <th>APELLIDO PARTENO</th>
        <th>APELLIDO MATERNO</th>
        <th>CORREO ELECTRONICO</th>
        <th>PERFIL</th>
        <th>ESTATUS</th>
        <th>EDITAR USUARIO</th>
        <th>ELIMINAR USUARIO</th>

</tr>
</thead>
<tbody>
<tr style="text-align: center;"  ng-repeat="x in empList_usu">
<td style="display: none;">
						{{x.id}}
						</td>
            <td>{{x.numreg}}</td>
						<td>{{x.nombre}}</td>
						<td>{{x.ap_paterno}}</td>
						<td>{{x.ap_materno}}</td>
						<td>{{x.correo}}</td>
						<td>{{x.tipo}}</td>
						<td>{{x.actv}}</td>
						<td>

<!--<input type="button" class="fa fa-pencil-square-o fa-2x" title="Editar" onclick="selection40()" />-->
<center>
 <i style="color: #397bab; cursor: pointer;" class="fa fa-pencil-square-o fa-2x" title="Editar usuario" id="" onclick="selection40()" data-toggle="modal" data-target="#exampleModalLong"></i>
</center>
</td>
	<td>

<!--<input type="button" class="btn-danger" value="ELIMINAR"  onclick="selection50()" /> -->
<center>
 <i style="color: #79213a; cursor: pointer;" class="fa fa-trash fa-2x" title="Eliminar Usuario" id="" onclick="selection50()" data-toggle="modal" data-target="#exampleModalLong"></i>
</center>
</td>

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
    <div class="modal fade" id="exampleModalLong" style="display: none;" aria-hidden="true">
                                        <div id="formulari" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar Usuario</h5>
                                                    <input type="hidden" id="idRewrite2" name="idRewrite2"  />
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">



                                        <div >
                                                     <form id="formulario" name="formulario" method="POST">

                                                     <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Perfil</label>
                                            <div class="col-sm-10">

                                                <select class="form-control" id="selectp" name="selectp" ng-model="selectp" style="width: 200px; border-right: 0; border-top: 0; border-left: 0;">
       <option value="1">Contribuyente</option>
       <option value="2">Dictaminador</option>
       <option value="3">Revisor</option>
       <option value="5">Delegado</option>
       </select>

                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageselec" name="messageselec" style="color:  #c22708;" hidden="">
                        Selecciona una opción adeacuada a tu cambio de rol
                                            </div>

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Usuario </label>
                                            <div class="col-sm-10">

                                                <input class="form-control" placeholder="" type="text"   id="usuavgx" name="usuavgx" ng-model="usuavgx" />
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageXX4" name="messageXX4" style="color:  #c22708;" hidden="">&nbsp;</div>

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Contraseña</label>
                                            <div class="col-sm-10">

                                                <input class="form-control" placeholder="" type="text"  id="passwordavg" name="passwordavg" ng-model="passwordavg" />
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <div id="messageXX2" name="messageXX2" style="color:  #c22708;" hidden="">&nbsp;</div>

                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">

                                                <input class="form-control" placeholder="" type="text" onkeyup="validarNombre()" onblur="validarNombre()" id="nomu" name="nomu" ng-model="nomu" />
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
                                                <input class="form-control" placeholder="" type="text" onkeyup="validarAPP()" onblur="validarAPP()" id="apu" name="apu"   ng-model="apu"/>
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
                                                <input  class="form-control" placeholder="" type="text" onkeyup="validarAPM()" onblur="validarAPM()" id="amu" name="amu"   ng-model="amu"/>
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
                                            <label class="col-sm-2 col-form-label">RFC</label>
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
                                            <label class="col-sm-2 col-form-label">Correo Electrónico</label>
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
                                            <label class="col-sm-2 col-form-label">Telefono</label>
                                            <div class="col-sm-10">
                                               <input  class="form-control" placeholder="" type="text" onkeypress="return validaNumericos(event)"  maxlength="10" id="telu" name="telu" ng-model="telu"/>
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
                                            <center>



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



                                            </div>
                                        </div>
                                    </form>
                                    </div>







                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="background-color: #8b4c55; border-color: #8b4c55; color: white;">Cerrar</button>
                                                <button id="btnsavchanges" type="button" class="btn btn-success" data-dismiss="modal" ng-click="selection60()" style="background-color: rgb(65, 69, 88); border-color: rgb(65, 69, 88); color: white; display: flex;">Guardar Cambios</button>

                                                </div>
                                            </div>
                                        </div>
                                         <div id="formulari2">
                                         <div id="formulari" class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">

                                                <form id="for" name="for" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Eliminar Usuario</h5>
                                                    <input type="hidden" id="idRewrite2" name="idRewrite2"  />
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                     <div class="form-group row">
                                                     <div class="col-sm-12">
                                                     <center>
                                            <label class="col-sm-12 col-form-label" style="color: black;">SEGURO QUE DESEA ELIMINAR EL USUARIO </label>
                                            </center>
                                            </div>
                                            <div class="col-sm-12">
                                                <center>
                                               <input  type="button" class="btn" value="ELIMINAR"  data-dismiss="modal"  ng-click="selection80()" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" />
                                               </center>
                                            </div>

                                        </div>
                                        </div>

                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>





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

div#formulari2 {
  display:none;
}
div#r6 {
  display:none;
}



   </style>

</body>

</html>
