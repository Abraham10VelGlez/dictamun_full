<?php include '../const.php';
include '../web/validateC.php';$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$ruta = explode("/", $url);
$to=count($ruta);
$e = $ruta[4-1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registro de Aviso de Dictamen</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link href="<?php echo jsdict; ?>vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
</head>

<body ng-app="InmueblesApp" ng-controller="InmueblesAppController">
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


                    <li><a href="../manualContribuyente/"><i class="ti-file"></i>Manual de Usuario</a></li>

                    <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>

                    </li>

                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row"  >
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                <div class="card">
                <div id="accordion-one" class="accordion">
                 <div class="accordion__item" id="tbinm2" >
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#default_collapseTwo">
                                            <span class="accordion__header--text">
                                            <h4>
                                            Datos Generales del Aviso de Dictamen
                                            <input type="hidden" id="proceessone" name="proceessone" value="1ok" />
                                            <input type="hidden" id="proceesstwo" name="proceesstwo" value="" />
                                            <input type="hidden" id="proceesstree" name="proceesstree" value="" />
                                            <input type="hidden" id="proceessfour" name="proceessfour" value="" />
                                            </h4>
                                            </span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="default_collapseTwo" class="accordion__body collapse show " data-parent="#accordion-one">
                                            <div class="accordion__body--text">

                                                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                            </div>


                            <div class="card-body">
                                <form action="#" id="step-form-horizontal" class="step-form-horizontal" action="#"   name="step-form-horizontal" method="POST" class="step-form-horizontal">
                                    <div>
                                     <h4 style="color:black;">Proceso 1</h4>
                                        <section>
                                            <div class="row">

                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">
                                                        <label  class="text-label" style="color:black;">
                                                         <h5>
                                                          Año a Dictaminar
                                                          </h5>
                                                        </label>
                                                        <select id="an" name="an" ng-model="imblss.anio"  class="form-control form-control-lg" >
                                                        <option value="0">Selecciona un año</option>
      <option value="2012">2012</option>
      <option value="2013">2013</option>
      <option value="2014">2014</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      </select>

                                                    </div>
                                                </div>
                                                 <div class="col-lg-12 mb-12">
                                                    <div class="form-group">
                                                        <center>

                                                      &nbsp;
                                                        </label>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                         <h5>
                                                          Seleccionar al Dictaminador (Especialista en valuación inmobiliaria autorizado por el IGECEM)
                                                          </h5>
                                                        </label>
                                                        <center>
                                                        <select id="selcdic" name="selcdic" ng-model="imblss.selcdic"   class="form-control form-control-lg"  >
                                                        <option value="0">Selecciona un Dictaminador</option>
                                                        </select>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">
                                                        <center>

                                                      &nbsp;
                                                        </label>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">
                                                        <label  class="text-label" style="color:black;">
                                                         <h5>
                                                          Tipo de Dictamen <label id="alerttipodc"  class="text-label" style="color:red; display: none;"> Selecciona un Tipo de Dictamen adecuado para el trámite </label>
                                                          </h5>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group" style="margin-left: 8%;">

                                                        <form action="#" >
                                                        <label   class="text-label" style="color:black;">
                                                        <input type="radio"  id="male" name="gender" ng-model="imblss.gender" value="1" class="form-check-input" >
                                                        Obligatorio, únicamente por tener uno o más inmuebles con valor catastral igual o superior a $20,000,000.00
                                                        </label>
                                                        <label   class="text-label" style="color:black;">
                                                        <input type="radio" id="female" name="gender" ng-model="imblss.gender" value="2" class="form-check-input">
                                                        Obligatorio, por tener inmuebles con valor catastral igual o superior a $5,000,000.00 y que en suma tiene un valor catastral igual o superior a $20,000,000.00
                                                        </label>

                                                        <label   class="text-label" style="color:black;">
                                                        <input type="radio" id="other" name="gender" ng-model="imblss.gender" value="3" class="form-check-input">
                                                        Opcional, de acuerdo con el artículo 47 bis tercer párrafo del código financiero del estado de México y municipios.
                                                        </label>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>Proceso 2</h4>
                                        <section>
                                         <div class="row"  >
                                        <div class="col-lg-12 mb-12">
                                                    <div class="form-group" style="margin-bottom: -1rem;">
                                                        <center>
                                                        <label  class="text-label" style="color:black;">

                                                      <h4> Identificación del Contribuyente
                                                      </h4>
                                                      <label id="tipocontribuy"  class="text-label" style="color:red; display: none;">Selecciona una opción adecuado para el trámite </label>
                                                        </label>
                                                        </center>
                                                    </div>
                                                </div>

                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">
                                                    <center>
                                                    <label for="fisica" title="Persona Física" class="text-label" style="color:black;">
                                                    <input type="radio" id="fisica" name="fm" ng-model="imblss.fm" value="1" onclick="name_fisk();" class="form-check-input">
                                                    <h5>  Persona Fisica
                                                    </h5>
                                                    </label>
                                                    </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                    <center>
                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                        <input type="radio" id="moral" name="fm" ng-model="imblss.fm" value="2" onclick="name_morl();" class="form-check-input">
                                                        <h5>Persona Moral
                                                        </h5>
                                                        </label>
                                                        </center>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row" id="j" style="display: none;" >
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                         <label  class="text-label" style="color:black;">
                                                     Nombre del Contribuyente
                                                        </label>
                                                        <input type="text" onkeyup="validarNombre()" onblur="validarNombre()" name="nombreDenRaz" id="nombreDenRaz" ng-model="imblss.nombreDenRaz" class="form-control" minlength="2" maxlength="50" >
                                                         <label id="message" name="message" style="color:  red;" hidden="">
                                                        Nombre incorrecto. Introducir solo letras y sin dejar el campo vacio.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label  class="text-label" style="color:black;">
                                                     RFC
                                                        </label>
                                                        <input type="text" maxlength="13" onkeyup="validarRfc()" onblur="validarRfc()" name="rfc" id="rfc" ng-model="imblss.rfc" class="form-control"  >
                                                         <label id="messageRFC" name="messageRFC" style="color:  red;" hidden="">
                                                       Ingresar Datos validos. Introducir solo letras y n&uacute;meros, sin dejar espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                         <label  class="text-label" style="color:black;">
                                                     Apellido Paterno
                                                        </label>
                                                        <input type="text" onkeyup="validarAPP()" onblur="validarAPP()" name="apPaterno" id="apPaterno" ng-model="imblss.apPaterno"  class="form-control" minlength="2" maxlength="50">
                                                        <label id="messageAP" name="messageAP" style="color:  red;" hidden="">
                                                       Apellido incorrecto. Introducir solo letras y sin dejar el campo vacio.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label  class="text-label" style="color:black;">
                                                     CURP
                                                        </label>
                                                        <input type="text" maxlength="19" onkeyup="validarCurp()" onblur="validarCurp()" name="curp" id="curp" ng-model="imblss.curp"  class="form-control">
                                                        <label id="messageCUr" name="messageCUr" style="color:  red;" hidden="">
                                                       Ingresar Datos validos. Introducir solo letras y n&uacute;meros, sin dejar espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label  class="text-label" style="color:black;">
                                                     Apellido Materno
                                                        </label>
                                                        <input type="text" onkeyup="validarAPM()" onblur="validarAPM()" name="apMaterno" id="apMaterno" ng-model="imblss.apMaterno"  class="form-control" minlength="2" maxlength="50">
                                                        <label id="messageAM" name="messageAM" style="color:  red;" hidden="">
                                                       Apellido incorrecto. Introducir solo letras y sin dejar el campo vacio.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label  class="text-label" style="color:black;">
                                                     Telefono
                                                        </label>
                                                        <input type="text" onkeyup="validarTel()" onblur="validarTel()" name="telefono" id="telefono" ng-model="imblss.telefono" class="form-control"  maxlength="10">
                                                        <label id="messageTelAsc" name="messageTelAsc" style="color:  red;" hidden="">
                                                       Telefono incorrecto. Introducir sólo 10 n&uacute;meros, sin dejar el campo vacio ni introducir espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label  class="text-label" style="color:black;">
                                                     Correo Electrónico
                                                        </label>
                                                        <input type="text" onkeyup="validaremailF()" onblur="validaremailF()" name="correoE" id="correoE" ng-model="imblss.correoE"  class="form-control"  maxlength="70">
                                                        <label id="messageEmail" name="messageEmail" style="color:  red;" hidden="">
                                                       Ingresar un correo electrónico valido
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="row" id="i" style="display: none;" >

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     Nombre, Denominación o Razón social
                                                        </label>
                                                        <input type="text" onkeyup="validarNombreA()" onblur="validarNombreA()" name="nombreDenominacion" id="nombreDenominacion" ng-model="imblss.nombreDenominacion" class="form-control"  maxlength="200" >
                                                         <label id="messageA" name="messageA" style="color:  red;" hidden="">
                                                       Ingresar Datos validos.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     Telefono
                                                        </label>
                                                        <input type="text" onkeyup="validarTelA()" onblur="validarTelA()" name="telefonoD" id="telefonoD" ng-model="imblss.telefonoD" class="form-control" maxlength="10">
                                                        <label id="messageTelA" name="messageTelA" style="color:  red;" hidden="">
                                                       Telefono incorrecto. Introducir sólo 10 n&uacute;meros, sin dejar el campo vacio ni introducir espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     RFC
                                                        </label>

                                                        <input type="text" maxlength="13" onkeyup="validarRfcA()" onblur="validarRfcA()" name="rfcD" id="rfcD" ng-model="imblss.rfcD"  class="form-control">
                                                        <label id="messageRFCa" name="messageRFCa" style="color:  red;" hidden="">
                                                       Ingresar Datos validos. Introducir solo letras y n&uacute;meros, sin dejar espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     Correo Electrónico
                                                        </label>
                                                        <input type="text" onkeyup="validaremailM()" onblur="validaremailM()" name="correoD" id="correoD" ng-model="imblss.correoD" class="form-control" maxlength="70" >
                                                        <label id="messageEmailm" name="messageEmailm" style="color:  red;" hidden="">
                                                       Ingresar un correo electrónico valido
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 mb-4">
                                                    <div class="form-group" style="margin-bottom: -1rem;">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     Descripción de los servicios o Actividades que realiza
                                                        </label>
                                                        <textarea id="descripacrt" name="descripacrt" ng-model="imblss.descripacrt" class="form-control" minlength="2" maxlength="250" >
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>Proceso 3</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">
                                                        <center>
                                                        <label  class="text-label" style="color:black;">
                                                         <h4>
                                                          Representante Legal
                                                          </h4>
                                                        </label>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                     Nombre
                                                        </label>
                                                        <input type="text" onkeyup="validarNombreRL()" onblur="validarNombreRL()" name="nombreRep" id="nombreRep" ng-model="imblss.nombreRep"  class="form-control">
                                                        <label id="messageRL" name="messageRL" style="color:  red;" hidden="" minlength="2" maxlength="50">
                                                       Nombre invalido. Introducir solo letras y sin dejar el campo vacio.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                     RFC
                                                        </label>
                                                        <input type="text" maxlength="13" onkeyup="validarRfcAs()" onblur="validarRfcAs()" name="rfcR" id="rfcR" ng-model="imblss.rfcR" class="form-control">
                                                        <label id="messageRFCas" name="messageRFCas" style="color:  red;" hidden="">
                                                       Ingresar Datos validos. Introducir solo letras y n&uacute;meros, sin dejar espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Apellido Paterno
                                                        </label>
                                                        <input type="text" onkeyup="validarAPPas()" onblur="validarAPPas()" name="apPaRep" id="apPaRep" ng-model="imblss.apPaRep" class="form-control">
                                                       <label id="messageAPas" name="messageAPas" style="color:  red;" hidden="" minlength="2" maxlength="50">
                                                       Apellido incorrecto. Introducir solo letras y sin dejar el campo vacio.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     CURP
                                                        </label>
                                                        <input type="text" maxlength="19" onkeyup="validarCurpAs()" onblur="validarCurpAs()" name="curpR" id="curpR" ng-model="imblss.curpR" class="form-control">
                                                        <label id="messageCuras" name="messageCuras" style="color:  red;" hidden="">
                                                       Ingresar Datos validos. Introducir solo letras y n&uacute;meros, sin dejar espacios.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label for="moral" title="Persona Moral" class="text-label" style="color:black;">
                                                     Apellido Materno
                                                        </label>
                                                        <input type="text" onkeyup="validarAPMas()" onblur="validarAPMas()" name="apMaRep" id="apMaRep" ng-model="imblss.apMaRep" class="form-control">
                                                        <label id="messageAPMas" name="messageAPMas" style="color:  red;" hidden="" minlength="2" maxlength="50">
                                                       Apellido incorrecto. Introducir solo letras y sin dejar el campo vacio.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        </form>
                                        <h4>Proceso 4</h4>
                                        <section style="position: static;">
                                                <div class="row emial-setup">

                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">
                                                        <center>
                                                        <label  class="text-label" style="color:black;">
                                                        <h4>
                                                      Captura los Inmuebles Objeto de Dictaminación
                                                      </h4>
                                                        </label>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group col-lg-12 mb-12">
                                                     <center>
                                                        <label for="mailclient11" class="mailclinet mailclinet-gmail">
                                                            <input type="radio" name="emailclient" id="mailclient11" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="activeviews()">
                                                            <span class="mail-icon">
                                                                <i class="mdi mdi-google-drive" aria-hidden="true"></i>
                                                            </span>
                                                            <span class="mail-text">Agregar Inmueble</span>
                                                        </label>
                                                         </center>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group col-lg-12 mb-12">
                                                     <center>
                                                         </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion__item" id="tbinm" style="display: none;">
                                    <a class="form-group four" href="#" id="mm" >
                                        <div class="accordion__header collapsed" data-toggle="collapse" data-target="#default_collapseOne" aria-expanded="false" ng-click="mm()">

                                            <span class="accordion__header--text">
                                             <h4>
                                             Lista de Inmuebles Agregados (Mostrar)
                                              </h4>
                                             </span>
                                            <span class="accordion__header--indicator"></span>

                                        </div></a>
                                        <div id="default_collapseOne" class="accordion__body collapse" data-parent="#accordion-one" style="">
                                            <div class="accordion__body--text">
                                                <div class="row" >
                <div class="col-lg-12 col-sm-12">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Registro de Contribuyentes</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">

                                                 <div class="col-lg-12 mb-12"  >
                                                    <div class="form-group col-lg-12 mb-12">
                                                   <div class="table-responsive">
                                                   <table  class="table table-striped table-bordered xa" >
<thead>
<tr>
<th style="display: none;">_</th>
        <th>No.Registro del Dictaminador</th>
        <th>Clave Catastral</th>
        <th>Valor Catastral del Inmueble</th>
        <th>Editar Información</th>
        <th>Eliminar Inmueble</th>


</tr>
</thead>
<tbody id="datosxd">


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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-xl-4 col-xxl-4">
                                &nbsp;
                                </div>
                                <div class="col-xl-4 col-xxl-4 text-center">
                                <center>
                                <button id="morefexx" type="button" class="btn btn-success btn-rounded m-b-10 m-l-5" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="activeviews()" style="background-color: #5F8159; border-color: #5F8159; color: white; ">
                                <i class="ti-plus"></i>Agregar un inmueble más
                                </button>
                                </center>

                                </div>
                                <div class="col-xl-4 col-xxl-4">
                                &nbsp;
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-xl-12 col-xxl-12">
                                &nbsp;

                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-2 col-xxl-2">
                                &nbsp;
                                </div>
                                <div class="col-xl-8 col-xxl-8">
                                <center id="baravg" style="display: none;">
                                                <div  class="col-sm-12">
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
			<span style="color: black;"></span>
                                                        </div>


                                                </center>
                                <center>
                                <button id="btnsend" name="btnsend" type="button" class="btn btn-primary btn-block m-b-10" ng-click="btnpre()" style="background-color: #414558; border-color: #414558; color: white;">Guardar</button>
                                </center>
                                </div>
                                <div class="col-xl-2 col-xxl-2">
                                &nbsp;
                                </div>
                                </div>


                                    <div class="row">
                                <div class="col-xl-12 col-xxl-12">


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
         <div class="footer">
            <div class="copyright">
                <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>

            </div>
        </div>
    </div>
     <form action="#"  id="validationForm2" name="validationForm2" method="POST">
                                          <div id="inmublegg" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                        <div id="inmueblesmore" class="modal-dialog modal-lg" style="display: none;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Datos Generales del Inmueble</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <div class="row">
                                                <div class="col-lg-12 mb-12">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">

                                                          Clave Catastral

                                                        </label>
                                                         <label id="messageclvValor" name="messageclvValor" style="color:  red; display: none;" >
                                                         Clave Catastral invalida, debido a que ya existe un registro de esta clave catastral en este año a dictaminar.
                                                         </label>
                                                        </center>





                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                    <label id="municipio" name="municipio" style="color:  red; display: none;" >
                                                        municipio erroneo, digitos invalidos
                                                         </label>
                                                        <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="inmbls.c_muni"  id="c_muni" name="c_muni" placeholder="Municipio" title="Escriba clave de municipio" maxlength="3" style="text-align: center;">

                                                    </div>
                                                </div>
                                                 <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                       <label id="zona" name="zona" style="color:  red; display: none;"  >
                                                        digitos invalidos
                                                         </label>
                                                       <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"  ng-model="inmbls.c_zona"  id="c_zona" name="c_zona" placeholder="Zona" title="Escriba clave de Zona" maxlength="2" style="text-align: center;">

                                                    </div>
                                                </div>

                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                       <label id="manzana" name="manzana" style="color:  red; display: none;" >
                                                        digitos invalidos
                                                         </label>
                                                       <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="inmbls.c_manz" id="c_manz" name="c_manz" placeholder="Manzana" title="Escriba clave de Manzana" maxlength="3" style="text-align: center;">

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                       <label id="lote" name="lote" style="color:  red; display: none;"  >
                                                        digitos invalidos
                                                         </label>
                                                       <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="inmbls.c_lote" id="c_lote" name="c_lote" placeholder="Lote" title="Escriba clave de Lote" maxlength="2" style="text-align: center;">

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                       <label id="edificio" name="edificio" style="color:  red; display: none;" >
                                                        digitos invalidos
                                                         </label>
                                                       <input type="text" onkeypress="return validaNumLet(event)" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="inmbls.c_edif" id="c_edif" name="c_edif" placeholder="Edificio" title="Escriba clave de Edificio" maxlength="2" style="text-align: center;">

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">
                                                       <label id="departamento" name="departamento" style="color:  red; display: none;" >
                                                        digitos invalidos
                                                         </label>
                                                      <input type="text" onkeypress="return validaNumLet(event)" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="inmbls.c_dept" id="c_dept" name="c_dept" placeholder="Depto" title="Escriba clave de Depto" maxlength="4" style="text-align: center;">

                                                    </div>
                                                </div>


                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">
                                                        <center>
                                                        <label class="text-label" style="color:black;">
                                                     Valor Catastral
                                                        </label>
                                                         <input type="text"  name="scrp" id="scrp" ng-model="inmbls.scrp" maxlength="12"  class="form-control" />
                                                         <label id="messageValorc" name="messageValorc" style="color:  red;" hidden="">
                                                         Valor incorrecto, introducir solo n&uacute;meros, punto y  2 decimales, Ejemplo: 1000000.50</label>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">

                                                    </div>
                                                </div>

                                                   <div class="col-lg-12 mb-12">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                         <h5>
                                                         Ubicación del Inmueble
                                                          </h5>

                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                     Calle principal
                                                        </label>
                                                       <input type="text" onkeyup="validarDomi()" onblur="validarDomi()" ng-model="inmbls.calleAv" placeholder="Ingresar calle o avenida" id="calleAv" name="calleAv" required="" style="" class="form-control ">
                                                        <label id="messageCalle" name="messageCalle" style="color:  red;" hidden="">
                                                        Nombre de la calle incorrecto. Introducir solo letras y no dejar el campo vacio.
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Colonia
                                                        </label>
                                                        <input type="text" onkeyup="validarCol()" onblur="validarCol()" ng-model="inmbls.col" placeholder="Ingresar nombre de la colonia" id="col" name="col" required="" style="" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                                                        <label id="messageCol" name="messageCol" style="color:  red;" hidden="">
                                                        Nombre de colonia incorrecto. Introducir solo letras y no dejar el campo vacio.
                                                        </label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                     Número Exterior
                                                        </label>
                                                        <input type="text" onkeyup="validarNE()" onblur="validarNE()" ng-model="inmbls.numEx" placeholder="Ingresar Número Exterior" id="numEx" name="numEx" required="" style="" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                                                         <label  id="messageNE" name="messageNE" style="color:  red;" hidden="">
                                                        Dato incorrecto. Si no cuenta con n&uacute;mero introducir "0".
                                                        </label>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label class="text-label" style="color:black;">
                                                     Número Interior
                                                        </label>
                                                        <input type="text" onkeyup="validarNI()" onblur="validarNI()" ng-model="inmbls.numIn" placeholder="Ingresar Número Interior" id="numIn" name="numIn" required="" style="" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                                                         <label  id="messageNI" name="messageNI" style="color:  red;" hidden="">
                                                        Dato incorrecto. Si no cuenta con n&uacute;mero introducir "0".
                                                        </label>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Municipio
                                                        </label>
                                                        <select required="" id="munic" name="munic" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched"><option value="0" selected="selected" disabled=""> Selecciona Municipio </option><option value="Acambay de Ruíz Castañeda" selected="">Acambay de Ruíz Castañeda</option><option value="Acolman" selected="">Acolman</option><option value="Aculco" selected="">Aculco</option><option value="Almoloya de Alquisiras" selected="">Almoloya de Alquisiras</option><option value="Almoloya de Juárez" selected="">Almoloya de Juárez</option><option value="Almoloya del Río" selected="">Almoloya del Río</option><option value="Amanalco" selected="">Amanalco</option><option value="Amatepec" selected="">Amatepec</option><option value="Amecameca" selected="">Amecameca</option><option value="Apaxco" selected="">Apaxco</option><option value="Atenco" selected="">Atenco</option><option value="Atizapán" selected="">Atizapán</option><option value="Atizapán de Zaragoza" selected="">Atizapán de Zaragoza</option><option value="Atlacomulco" selected="">Atlacomulco</option><option value="Atlautla" selected="">Atlautla</option><option value="Axapusco" selected="">Axapusco</option><option value="Ayapango" selected="">Ayapango</option><option value="Calimaya" selected="">Calimaya</option><option value="Capulhuac" selected="">Capulhuac</option><option value="Coacalco de Berriozábal" selected="">Coacalco de Berriozábal</option><option value="Coatepec Harinas" selected="">Coatepec Harinas</option><option value="Cocotitlán" selected="">Cocotitlán</option><option value="Coyotepec" selected="">Coyotepec</option><option value="Cuautitlán" selected="">Cuautitlán</option><option value="Cuautitlán Izcalli" selected="">Cuautitlán Izcalli</option><option value="Chalco" selected="">Chalco</option><option value="Chapa de Mota" selected="">Chapa de Mota</option><option value="Chapultepec" selected="">Chapultepec</option><option value="Chiautla" selected="">Chiautla</option><option value="Chicoloapan" selected="">Chicoloapan</option><option value="Chiconcuac" selected="">Chiconcuac</option><option value="Chimalhuacán" selected="">Chimalhuacán</option><option value="Donato Guerra" selected="">Donato Guerra</option><option value="Ecatepec de Morelos" selected="">Ecatepec de Morelos</option><option value="Ecatzingo" selected="">Ecatzingo</option><option value="El Oro" selected="">El Oro</option><option value="Huehuetoca" selected="">Huehuetoca</option><option value="Hueypoxtla" selected="">Hueypoxtla</option><option value="Huixquilucan" selected="">Huixquilucan</option><option value="Isidro Fabela" selected="">Isidro Fabela</option><option value="Ixtapaluca" selected="">Ixtapaluca</option><option value="Ixtapan de la Sal" selected="">Ixtapan de la Sal</option><option value="Ixtapan del Oro" selected="">Ixtapan del Oro</option><option value="Ixtlahuaca" selected="">Ixtlahuaca</option><option value="Jaltenco" selected="">Jaltenco</option><option value="Jilotepec" selected="">Jilotepec</option><option value="Jilotzingo" selected="">Jilotzingo</option><option value="Jiquipilco" selected="">Jiquipilco</option><option value="Jocotitlán" selected="">Jocotitlán</option><option value="Joquicingo" selected="">Joquicingo</option><option value="Juchitepec" selected="">Juchitepec</option><option value="La Paz" selected="">La Paz</option><option value="Lerma" selected="">Lerma</option><option value="Luvianos" selected="">Luvianos</option><option value="Malinalco" selected="">Malinalco</option><option value="Melchor Ocampo" selected="">Melchor Ocampo</option><option value="Metepec" selected="">Metepec</option><option value="Mexicaltzingo" selected="">Mexicaltzingo</option><option value="Morelos" selected="">Morelos</option><option value="Naucalpan de Juárez" selected="">Naucalpan de Juárez</option><option value="Nextlalpan" selected="">Nextlalpan</option><option value="Nezahualcóyotl" selected="">Nezahualcóyotl</option><option value="Nicolás Romero" selected="">Nicolás Romero</option><option value="Nopaltepec" selected="">Nopaltepec</option><option value="Ocoyoacac" selected="">Ocoyoacac</option><option value="Ocuilan" selected="">Ocuilan</option><option value="Otumba" selected="">Otumba</option><option value="Otzoloapan" selected="">Otzoloapan</option><option value="Otzolotepec" selected="">Otzolotepec</option><option value="Ozumba" selected="">Ozumba</option><option value="Papalotla" selected="">Papalotla</option><option value="Polotitlán" selected="">Polotitlán</option><option value="Rayón" selected="">Rayón</option><option value="San Antonio la Isla" selected="">San Antonio la Isla</option><option value="San Felipe del Progreso" selected="">San Felipe del Progreso</option><option value="San José del Rincón" selected="">San José del Rincón</option><option value="San Martín de las Pirámid" selected="">San Martín de las Pirámid</option><option value="San Mateo Atenco" selected="">San Mateo Atenco</option><option value="San Simón de Guerrero" selected="">San Simón de Guerrero</option><option value="Santo Tomás" selected="">Santo Tomás</option><option value="Soyaniquilpan de Juárez" selected="">Soyaniquilpan de Juárez</option><option value="Sultepec" selected="">Sultepec</option><option value="Tecámac" selected="">Tecámac</option><option value="Tejupilco" selected="">Tejupilco</option><option value="Temamatla" selected="">Temamatla</option><option value="Temascalapa" selected="">Temascalapa</option><option value="Temascalcingo" selected="">Temascalcingo</option><option value="Temascaltepec" selected="">Temascaltepec</option><option value="Temoaya" selected="">Temoaya</option><option value="Tenancingo" selected="">Tenancingo</option><option value="Tenango del Aire" selected="">Tenango del Aire</option><option value="Tenango del Valle" selected="">Tenango del Valle</option><option value="Teoloyucan" selected="">Teoloyucan</option><option value="Teotihuacán" selected="">Teotihuacán</option><option value="Tepetlaoxtoc" selected="">Tepetlaoxtoc</option><option value="Tepetlixpa" selected="">Tepetlixpa</option><option value="Tepotzotlán" selected="">Tepotzotlán</option><option value="Tequixquiac" selected="">Tequixquiac</option><option value="Texcaltitlán" selected="">Texcaltitlán</option><option value="Texcalyacac" selected="">Texcalyacac</option><option value="Texcoco" selected="">Texcoco</option><option value="Tezoyuca" selected="">Tezoyuca</option><option value="Tianguistenco" selected="">Tianguistenco</option><option value="Timilpan" selected="">Timilpan</option><option value="Tlalmanalco" selected="">Tlalmanalco</option><option value="Tlalnepantla de Baz" selected="">Tlalnepantla de Baz</option><option value="Tlatlaya" selected="">Tlatlaya</option><option value="Toluca" selected="">Toluca</option><option value="Tonanitla" selected="">Tonanitla</option><option value="Tonatico" selected="">Tonatico</option><option value="Tultepec" selected="">Tultepec</option><option value="Tultitlán" selected="">Tultitlán</option><option value="Valle de Bravo" selected="">Valle de Bravo</option><option value="Valle de Chalco Solidarid" selected="">Valle de Chalco Solidarid</option><option value="Villa de Allende" selected="">Villa de Allende</option><option value="Villa del Carbón" selected="">Villa del Carbón</option><option value="Villa Guerrero" selected="">Villa Guerrero</option><option value="Villa Victoria" selected="">Villa Victoria</option><option value="Xalatlaco" selected="">Xalatlaco</option><option value="Xonacatlán" selected="">Xonacatlán</option><option value="Zacazonapan" selected="">Zacazonapan</option><option value="Zacualpan" selected="">Zacualpan</option><option value="Zinacantepec" selected="">Zinacantepec</option><option value="Zumpahuacán" selected="">Zumpahuacán</option><option value="Zumpango" selected="">Zumpango</option><option value="Acambay de Ruíz Castañeda" selected="">Acambay de Ruíz Castañeda</option><option value="Acolman" selected="">Acolman</option><option value="Aculco" selected="">Aculco</option><option value="Almoloya de Alquisiras" selected="">Almoloya de Alquisiras</option><option value="Almoloya de Juárez" selected="">Almoloya de Juárez</option><option value="Almoloya del Río" selected="">Almoloya del Río</option><option value="Amanalco" selected="">Amanalco</option><option value="Amatepec" selected="">Amatepec</option><option value="Amecameca" selected="">Amecameca</option><option value="Apaxco" selected="">Apaxco</option><option value="Atenco" selected="">Atenco</option><option value="Atizapán" selected="">Atizapán</option><option value="Atizapán de Zaragoza" selected="">Atizapán de Zaragoza</option><option value="Atlacomulco" selected="">Atlacomulco</option><option value="Atlautla" selected="">Atlautla</option><option value="Axapusco" selected="">Axapusco</option><option value="Ayapango" selected="">Ayapango</option><option value="Calimaya" selected="">Calimaya</option><option value="Capulhuac" selected="">Capulhuac</option><option value="Coacalco de Berriozábal" selected="">Coacalco de Berriozábal</option><option value="Coatepec Harinas" selected="">Coatepec Harinas</option><option value="Cocotitlán" selected="">Cocotitlán</option><option value="Coyotepec" selected="">Coyotepec</option><option value="Cuautitlán" selected="">Cuautitlán</option><option value="Cuautitlán Izcalli" selected="">Cuautitlán Izcalli</option><option value="Chalco" selected="">Chalco</option><option value="Chapa de Mota" selected="">Chapa de Mota</option><option value="Chapultepec" selected="">Chapultepec</option><option value="Chiautla" selected="">Chiautla</option><option value="Chicoloapan" selected="">Chicoloapan</option><option value="Chiconcuac" selected="">Chiconcuac</option><option value="Chimalhuacán" selected="">Chimalhuacán</option><option value="Donato Guerra" selected="">Donato Guerra</option><option value="Ecatepec de Morelos" selected="">Ecatepec de Morelos</option><option value="Ecatzingo" selected="">Ecatzingo</option><option value="El Oro" selected="">El Oro</option><option value="Huehuetoca" selected="">Huehuetoca</option><option value="Hueypoxtla" selected="">Hueypoxtla</option><option value="Huixquilucan" selected="">Huixquilucan</option><option value="Isidro Fabela" selected="">Isidro Fabela</option><option value="Ixtapaluca" selected="">Ixtapaluca</option><option value="Ixtapan de la Sal" selected="">Ixtapan de la Sal</option><option value="Ixtapan del Oro" selected="">Ixtapan del Oro</option><option value="Ixtlahuaca" selected="">Ixtlahuaca</option><option value="Jaltenco" selected="">Jaltenco</option><option value="Jilotepec" selected="">Jilotepec</option><option value="Jilotzingo" selected="">Jilotzingo</option><option value="Jiquipilco" selected="">Jiquipilco</option><option value="Jocotitlán" selected="">Jocotitlán</option><option value="Joquicingo" selected="">Joquicingo</option><option value="Juchitepec" selected="">Juchitepec</option><option value="La Paz" selected="">La Paz</option><option value="Lerma" selected="">Lerma</option><option value="Luvianos" selected="">Luvianos</option><option value="Malinalco" selected="">Malinalco</option><option value="Melchor Ocampo" selected="">Melchor Ocampo</option><option value="Metepec" selected="">Metepec</option><option value="Mexicaltzingo" selected="">Mexicaltzingo</option><option value="Morelos" selected="">Morelos</option><option value="Naucalpan de Juárez" selected="">Naucalpan de Juárez</option><option value="Nextlalpan" selected="">Nextlalpan</option><option value="Nezahualcóyotl" selected="">Nezahualcóyotl</option><option value="Nicolás Romero" selected="">Nicolás Romero</option><option value="Nopaltepec" selected="">Nopaltepec</option><option value="Ocoyoacac" selected="">Ocoyoacac</option><option value="Ocuilan" selected="">Ocuilan</option><option value="Otumba" selected="">Otumba</option><option value="Otzoloapan" selected="">Otzoloapan</option><option value="Otzolotepec" selected="">Otzolotepec</option><option value="Ozumba" selected="">Ozumba</option><option value="Papalotla" selected="">Papalotla</option><option value="Polotitlán" selected="">Polotitlán</option><option value="Rayón" selected="">Rayón</option><option value="San Antonio la Isla" selected="">San Antonio la Isla</option><option value="San Felipe del Progreso" selected="">San Felipe del Progreso</option><option value="San José del Rincón" selected="">San José del Rincón</option><option value="San Martín de las Pirámid" selected="">San Martín de las Pirámid</option><option value="San Mateo Atenco" selected="">San Mateo Atenco</option><option value="San Simón de Guerrero" selected="">San Simón de Guerrero</option><option value="Santo Tomás" selected="">Santo Tomás</option><option value="Soyaniquilpan de Juárez" selected="">Soyaniquilpan de Juárez</option><option value="Sultepec" selected="">Sultepec</option><option value="Tecámac" selected="">Tecámac</option><option value="Tejupilco" selected="">Tejupilco</option><option value="Temamatla" selected="">Temamatla</option><option value="Temascalapa" selected="">Temascalapa</option><option value="Temascalcingo" selected="">Temascalcingo</option><option value="Temascaltepec" selected="">Temascaltepec</option><option value="Temoaya" selected="">Temoaya</option><option value="Tenancingo" selected="">Tenancingo</option><option value="Tenango del Aire" selected="">Tenango del Aire</option><option value="Tenango del Valle" selected="">Tenango del Valle</option><option value="Teoloyucan" selected="">Teoloyucan</option><option value="Teotihuacán" selected="">Teotihuacán</option><option value="Tepetlaoxtoc" selected="">Tepetlaoxtoc</option><option value="Tepetlixpa" selected="">Tepetlixpa</option><option value="Tepotzotlán" selected="">Tepotzotlán</option><option value="Tequixquiac" selected="">Tequixquiac</option><option value="Texcaltitlán" selected="">Texcaltitlán</option><option value="Texcalyacac" selected="">Texcalyacac</option><option value="Texcoco" selected="">Texcoco</option><option value="Tezoyuca" selected="">Tezoyuca</option><option value="Tianguistenco" selected="">Tianguistenco</option><option value="Timilpan" selected="">Timilpan</option><option value="Tlalmanalco" selected="">Tlalmanalco</option><option value="Tlalnepantla de Baz" selected="">Tlalnepantla de Baz</option><option value="Tlatlaya" selected="">Tlatlaya</option><option value="Toluca" selected="">Toluca</option><option value="Tonanitla" selected="">Tonanitla</option><option value="Tonatico" selected="">Tonatico</option><option value="Tultepec" selected="">Tultepec</option><option value="Tultitlán" selected="">Tultitlán</option><option value="Valle de Bravo" selected="">Valle de Bravo</option><option value="Valle de Chalco Solidarid" selected="">Valle de Chalco Solidarid</option><option value="Villa de Allende" selected="">Villa de Allende</option><option value="Villa del Carbón" selected="">Villa del Carbón</option><option value="Villa Guerrero" selected="">Villa Guerrero</option><option value="Villa Victoria" selected="">Villa Victoria</option><option value="Xalatlaco" selected="">Xalatlaco</option><option value="Xonacatlán" selected="">Xonacatlán</option><option value="Zacazonapan" selected="">Zacazonapan</option><option value="Zacualpan" selected="">Zacualpan</option><option value="Zinacantepec" selected="">Zinacantepec</option><option value="Zumpahuacán" selected="">Zumpahuacán</option><option value="Zumpango" selected="">Zumpango</option></select>





                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Código Postal
                                                        </label>
                                                        <select ng-model="inmbls.cpp" required="" id="cpp" name="cpp" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched"><option value="? string: ?" selected="selected"></option>
        </select>





                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Referencia de las calles y/o Vialidades principales del domicilio

                                                        </label>
                                                        <textarea id="refvia" minlength="2" maxlength="200" ng-model="inmbls.refvia" name="refvia" class=" form-control ng-pristine ng-valid ng-empty ng-touched"></textarea>





                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">

                                                        <label class="text-label" style="color:black;">
                                                   <h5>
                                                   Descripción de los Servicios ó Actividades que realiza:
                                                   </h5>
                                                            <label  id="messageradios" name="messageradios" style="color:  red; display: none;" >
                                                        Selecciona una Opción de acuerdo a los Servicios ó Actividades
                                                        </label>
                                                        </label>

                                                        <a>
                                                        <label   class="text-label" style="color:black;">

                                                        PAGÉ OPORTUNAMENTE EL IMPUESTO PREDIAL DEL INMUEBLE AL QUE CORRESPONDE LA CLAVE CATASTRAL.
                                                        </label>

                                                        </a>

                                                        <div class="col-lg-12 mb-6">
                                                        <center>

         <label>SI&nbsp;</label><input type="radio" name="impuesto" id="gender1" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="impuesto" id="gender2" value="FALSE">
         </center>
       </div>


                                                        <label   class="text-label" style="color:black;">

                                                        NO SE REALIZARÓN MEJORAS, AMPLIACIONES O CONSTRUCCIONES QUE AUMENTEN EL VALOR CATASTRAL DEL INMUEBLE.
                                                        </label>

                                                        <div class="col-lg-12 mb-6">
                                                        <center>
          <label>SI&nbsp;</label><input type="radio" name="gender2" id="gender2S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender2" id="gender2N" value="FALSE">
         </center>
       </div>

                                                        <label   class="text-label" style="color:black;">

                                                        SE ESTÁN REPORTANDO TODAS LAS CLAVES CATASTRALES PROPIEDAD DEL CONTRIBUYENTE QUE ESTÁN SUJETAS A DICTAMEN PREDIAL.
                                                        </label>

                                                        <div class="col-lg-12 mb-6">
                                                        <center>
          <label>SI&nbsp;</label><input type="radio" name="gender3" id="gender3S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender3" id="gender3N" value="FALSE">
         </center>
       </div>






                                                    </div>
                                                </div>







                                            </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-dismiss="modal"  ng-click="clearinmueble()" style="background-color: #8b4c55; border-color: #8b4c55; color: white;">Cancelar</button>
					<button id="btnaddi" name="btnaddi" type="button"  onclick="agregarInm()" class="btn" style="background-color: #414558; border-color: #414558; color: white;">Guardar</button>
          <!--ng-click="agregarInm()"-->
				</div>
                                            </div>
                                        </div>



                                        <div id="inmuebleseditable" class="modal-dialog modal-lg" style="display: flex;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modificar Datos Generales del Inmueble Agregado</h5>
                                                    <input type="hidden" id="inmu" name="inmu">
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <div class="row">
                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">
                                                        <center>
                                                        <label  class="text-label" style="color:black;">

                                                          Clave Catastral

                                                        </label>
                                                        </center>




                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">

                                                        <input type="text" class="form-control clave ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="inmblsmod.modfclav" id="modfclav" name="modfclav" placeholder="" title="Escriba clave de clave catastral" maxlength="16" >

                                                    </div>
                                                </div>




                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">
                                                        <center>
                                                        <label  class="text-label" style="color:black;">
                                                     Valor Catastral
                                                        </label>
                                                         <input type="text" onkeyup="validarValorCmodf()" onblur="validarValorCmodf()" name="modfscrp" id="modfscrp" ng-model="inmblsmod.modfscrp" maxlength="12"  class=" form-control ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched"/>
                                                         <label id="modfmessageValorc" name="modfmessageValorc" style="color:  red;" hidden="">
                                                         Valor incorrecto, introducir solo n&uacute;meros.</label>
                                                        </center>





                                                    </div>
                                                </div>
                                                <div class="col-lg-2 mb-2">
                                                    <div class="form-group">








                                                    </div>
                                                </div>

                                                   <div class="col-lg-12 mb-12">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                         <h5>
                                                         Ubicación del Inmueble
                                                          </h5>

                                                        </label>





                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                     Calle principal
                                                        </label>
                                                       <input type="text" onkeyup="validarDomimodf()" onblur="validarDomimodf()" ng-model="inmblsmod.modfcalleAv" placeholder="Ingresar calle o avenida" id="modfcalleAv" name="modfcalleAv" required="" style="" class="form-control ">
                                                        <label id="modfmessageCalle" name="modfmessageCalle" style="color:  red;" hidden="">
                                                        Nombre de la calle incorrecto. Introducir solo letras y no dejar el campo vacio.
                                                        </label>





                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Colonia
                                                        </label>
                                                        <input type="text" onkeyup="validarColmodf()" onblur="validarColmodf()" ng-model="inmblsmod.modfcol" placeholder="Ingresar nombre de la colonia" id="modfcol" name="modfcol" required="" style="" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                                                        <label id="modfmessageCol" name="modfmessageCol" style="color:  red;" hidden="">
                                                        Nombre de colonia incorrecto. Introducir solo letras y no dejar el campo vacio.
                                                        </label>






                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                     Número Exterior
                                                        </label>
                                                        <input type="text" onkeyup="validarNEmodf()" onblur="validarNEmodf()" ng-model="inmblsmod.modfnumEx" placeholder="Ingresar Número Exterior" id="modfnumEx" name="modfnumEx" required="" style="" class="form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                                                         <label  id="modfmessageNE" name="modfmessageNE" style="color:  red;" hidden="">
                                                        Dato incorrecto. Si no cuenta con n&uacute;mero introducir "0".
                                                        </label>




                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label class="text-label" style="color:black;">
                                                     Número Interior
                                                        </label>
                                                        <input type="text" onkeyup="validarNImodf()" onblur="validarNImodf()" ng-model="inmblsmod.modfnumIn" placeholder="Ingresar Número Interior" id="modfnumIn" name="modfnumIn" required="" style="" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">
                                                         <label  id="modfmessageNI" name="modfmessageNI" style="color:  red;" hidden="">
                                                        Dato incorrecto. Si no cuenta con n&uacute;mero introducir "0".
                                                        </label>





                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Municipio
                                                        </label>
                                                        <select ng-model="inmblsmod.modfmunic" required="" id="modfmunic" name="modfmunic" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched"><option value="0" selected="selected" disabled=""> Selecciona Municipio </option><option value="Acambay de Ruíz Castañeda" selected="">Acambay de Ruíz Castañeda</option><option value="Acolman" selected="">Acolman</option><option value="Aculco" selected="">Aculco</option><option value="Almoloya de Alquisiras" selected="">Almoloya de Alquisiras</option><option value="Almoloya de Juárez" selected="">Almoloya de Juárez</option><option value="Almoloya del Río" selected="">Almoloya del Río</option><option value="Amanalco" selected="">Amanalco</option><option value="Amatepec" selected="">Amatepec</option><option value="Amecameca" selected="">Amecameca</option><option value="Apaxco" selected="">Apaxco</option><option value="Atenco" selected="">Atenco</option><option value="Atizapán" selected="">Atizapán</option><option value="Atizapán de Zaragoza" selected="">Atizapán de Zaragoza</option><option value="Atlacomulco" selected="">Atlacomulco</option><option value="Atlautla" selected="">Atlautla</option><option value="Axapusco" selected="">Axapusco</option><option value="Ayapango" selected="">Ayapango</option><option value="Calimaya" selected="">Calimaya</option><option value="Capulhuac" selected="">Capulhuac</option><option value="Coacalco de Berriozábal" selected="">Coacalco de Berriozábal</option><option value="Coatepec Harinas" selected="">Coatepec Harinas</option><option value="Cocotitlán" selected="">Cocotitlán</option><option value="Coyotepec" selected="">Coyotepec</option><option value="Cuautitlán" selected="">Cuautitlán</option><option value="Cuautitlán Izcalli" selected="">Cuautitlán Izcalli</option><option value="Chalco" selected="">Chalco</option><option value="Chapa de Mota" selected="">Chapa de Mota</option><option value="Chapultepec" selected="">Chapultepec</option><option value="Chiautla" selected="">Chiautla</option><option value="Chicoloapan" selected="">Chicoloapan</option><option value="Chiconcuac" selected="">Chiconcuac</option><option value="Chimalhuacán" selected="">Chimalhuacán</option><option value="Donato Guerra" selected="">Donato Guerra</option><option value="Ecatepec de Morelos" selected="">Ecatepec de Morelos</option><option value="Ecatzingo" selected="">Ecatzingo</option><option value="El Oro" selected="">El Oro</option><option value="Huehuetoca" selected="">Huehuetoca</option><option value="Hueypoxtla" selected="">Hueypoxtla</option><option value="Huixquilucan" selected="">Huixquilucan</option><option value="Isidro Fabela" selected="">Isidro Fabela</option><option value="Ixtapaluca" selected="">Ixtapaluca</option><option value="Ixtapan de la Sal" selected="">Ixtapan de la Sal</option><option value="Ixtapan del Oro" selected="">Ixtapan del Oro</option><option value="Ixtlahuaca" selected="">Ixtlahuaca</option><option value="Jaltenco" selected="">Jaltenco</option><option value="Jilotepec" selected="">Jilotepec</option><option value="Jilotzingo" selected="">Jilotzingo</option><option value="Jiquipilco" selected="">Jiquipilco</option><option value="Jocotitlán" selected="">Jocotitlán</option><option value="Joquicingo" selected="">Joquicingo</option><option value="Juchitepec" selected="">Juchitepec</option><option value="La Paz" selected="">La Paz</option><option value="Lerma" selected="">Lerma</option><option value="Luvianos" selected="">Luvianos</option><option value="Malinalco" selected="">Malinalco</option><option value="Melchor Ocampo" selected="">Melchor Ocampo</option><option value="Metepec" selected="">Metepec</option><option value="Mexicaltzingo" selected="">Mexicaltzingo</option><option value="Morelos" selected="">Morelos</option><option value="Naucalpan de Juárez" selected="">Naucalpan de Juárez</option><option value="Nextlalpan" selected="">Nextlalpan</option><option value="Nezahualcóyotl" selected="">Nezahualcóyotl</option><option value="Nicolás Romero" selected="">Nicolás Romero</option><option value="Nopaltepec" selected="">Nopaltepec</option><option value="Ocoyoacac" selected="">Ocoyoacac</option><option value="Ocuilan" selected="">Ocuilan</option><option value="Otumba" selected="">Otumba</option><option value="Otzoloapan" selected="">Otzoloapan</option><option value="Otzolotepec" selected="">Otzolotepec</option><option value="Ozumba" selected="">Ozumba</option><option value="Papalotla" selected="">Papalotla</option><option value="Polotitlán" selected="">Polotitlán</option><option value="Rayón" selected="">Rayón</option><option value="San Antonio la Isla" selected="">San Antonio la Isla</option><option value="San Felipe del Progreso" selected="">San Felipe del Progreso</option><option value="San José del Rincón" selected="">San José del Rincón</option><option value="San Martín de las Pirámid" selected="">San Martín de las Pirámid</option><option value="San Mateo Atenco" selected="">San Mateo Atenco</option><option value="San Simón de Guerrero" selected="">San Simón de Guerrero</option><option value="Santo Tomás" selected="">Santo Tomás</option><option value="Soyaniquilpan de Juárez" selected="">Soyaniquilpan de Juárez</option><option value="Sultepec" selected="">Sultepec</option><option value="Tecámac" selected="">Tecámac</option><option value="Tejupilco" selected="">Tejupilco</option><option value="Temamatla" selected="">Temamatla</option><option value="Temascalapa" selected="">Temascalapa</option><option value="Temascalcingo" selected="">Temascalcingo</option><option value="Temascaltepec" selected="">Temascaltepec</option><option value="Temoaya" selected="">Temoaya</option><option value="Tenancingo" selected="">Tenancingo</option><option value="Tenango del Aire" selected="">Tenango del Aire</option><option value="Tenango del Valle" selected="">Tenango del Valle</option><option value="Teoloyucan" selected="">Teoloyucan</option><option value="Teotihuacán" selected="">Teotihuacán</option><option value="Tepetlaoxtoc" selected="">Tepetlaoxtoc</option><option value="Tepetlixpa" selected="">Tepetlixpa</option><option value="Tepotzotlán" selected="">Tepotzotlán</option><option value="Tequixquiac" selected="">Tequixquiac</option><option value="Texcaltitlán" selected="">Texcaltitlán</option><option value="Texcalyacac" selected="">Texcalyacac</option><option value="Texcoco" selected="">Texcoco</option><option value="Tezoyuca" selected="">Tezoyuca</option><option value="Tianguistenco" selected="">Tianguistenco</option><option value="Timilpan" selected="">Timilpan</option><option value="Tlalmanalco" selected="">Tlalmanalco</option><option value="Tlalnepantla de Baz" selected="">Tlalnepantla de Baz</option><option value="Tlatlaya" selected="">Tlatlaya</option><option value="Toluca" selected="">Toluca</option><option value="Tonanitla" selected="">Tonanitla</option><option value="Tonatico" selected="">Tonatico</option><option value="Tultepec" selected="">Tultepec</option><option value="Tultitlán" selected="">Tultitlán</option><option value="Valle de Bravo" selected="">Valle de Bravo</option><option value="Valle de Chalco Solidarid" selected="">Valle de Chalco Solidarid</option><option value="Villa de Allende" selected="">Villa de Allende</option><option value="Villa del Carbón" selected="">Villa del Carbón</option><option value="Villa Guerrero" selected="">Villa Guerrero</option><option value="Villa Victoria" selected="">Villa Victoria</option><option value="Xalatlaco" selected="">Xalatlaco</option><option value="Xonacatlán" selected="">Xonacatlán</option><option value="Zacazonapan" selected="">Zacazonapan</option><option value="Zacualpan" selected="">Zacualpan</option><option value="Zinacantepec" selected="">Zinacantepec</option><option value="Zumpahuacán" selected="">Zumpahuacán</option><option value="Zumpango" selected="">Zumpango</option><option value="Acambay de Ruíz Castañeda" selected="">Acambay de Ruíz Castañeda</option><option value="Acolman" selected="">Acolman</option><option value="Aculco" selected="">Aculco</option><option value="Almoloya de Alquisiras" selected="">Almoloya de Alquisiras</option><option value="Almoloya de Juárez" selected="">Almoloya de Juárez</option><option value="Almoloya del Río" selected="">Almoloya del Río</option><option value="Amanalco" selected="">Amanalco</option><option value="Amatepec" selected="">Amatepec</option><option value="Amecameca" selected="">Amecameca</option><option value="Apaxco" selected="">Apaxco</option><option value="Atenco" selected="">Atenco</option><option value="Atizapán" selected="">Atizapán</option><option value="Atizapán de Zaragoza" selected="">Atizapán de Zaragoza</option><option value="Atlacomulco" selected="">Atlacomulco</option><option value="Atlautla" selected="">Atlautla</option><option value="Axapusco" selected="">Axapusco</option><option value="Ayapango" selected="">Ayapango</option><option value="Calimaya" selected="">Calimaya</option><option value="Capulhuac" selected="">Capulhuac</option><option value="Coacalco de Berriozábal" selected="">Coacalco de Berriozábal</option><option value="Coatepec Harinas" selected="">Coatepec Harinas</option><option value="Cocotitlán" selected="">Cocotitlán</option><option value="Coyotepec" selected="">Coyotepec</option><option value="Cuautitlán" selected="">Cuautitlán</option><option value="Cuautitlán Izcalli" selected="">Cuautitlán Izcalli</option><option value="Chalco" selected="">Chalco</option><option value="Chapa de Mota" selected="">Chapa de Mota</option><option value="Chapultepec" selected="">Chapultepec</option><option value="Chiautla" selected="">Chiautla</option><option value="Chicoloapan" selected="">Chicoloapan</option><option value="Chiconcuac" selected="">Chiconcuac</option><option value="Chimalhuacán" selected="">Chimalhuacán</option><option value="Donato Guerra" selected="">Donato Guerra</option><option value="Ecatepec de Morelos" selected="">Ecatepec de Morelos</option><option value="Ecatzingo" selected="">Ecatzingo</option><option value="El Oro" selected="">El Oro</option><option value="Huehuetoca" selected="">Huehuetoca</option><option value="Hueypoxtla" selected="">Hueypoxtla</option><option value="Huixquilucan" selected="">Huixquilucan</option><option value="Isidro Fabela" selected="">Isidro Fabela</option><option value="Ixtapaluca" selected="">Ixtapaluca</option><option value="Ixtapan de la Sal" selected="">Ixtapan de la Sal</option><option value="Ixtapan del Oro" selected="">Ixtapan del Oro</option><option value="Ixtlahuaca" selected="">Ixtlahuaca</option><option value="Jaltenco" selected="">Jaltenco</option><option value="Jilotepec" selected="">Jilotepec</option><option value="Jilotzingo" selected="">Jilotzingo</option><option value="Jiquipilco" selected="">Jiquipilco</option><option value="Jocotitlán" selected="">Jocotitlán</option><option value="Joquicingo" selected="">Joquicingo</option><option value="Juchitepec" selected="">Juchitepec</option><option value="La Paz" selected="">La Paz</option><option value="Lerma" selected="">Lerma</option><option value="Luvianos" selected="">Luvianos</option><option value="Malinalco" selected="">Malinalco</option><option value="Melchor Ocampo" selected="">Melchor Ocampo</option><option value="Metepec" selected="">Metepec</option><option value="Mexicaltzingo" selected="">Mexicaltzingo</option><option value="Morelos" selected="">Morelos</option><option value="Naucalpan de Juárez" selected="">Naucalpan de Juárez</option><option value="Nextlalpan" selected="">Nextlalpan</option><option value="Nezahualcóyotl" selected="">Nezahualcóyotl</option><option value="Nicolás Romero" selected="">Nicolás Romero</option><option value="Nopaltepec" selected="">Nopaltepec</option><option value="Ocoyoacac" selected="">Ocoyoacac</option><option value="Ocuilan" selected="">Ocuilan</option><option value="Otumba" selected="">Otumba</option><option value="Otzoloapan" selected="">Otzoloapan</option><option value="Otzolotepec" selected="">Otzolotepec</option><option value="Ozumba" selected="">Ozumba</option><option value="Papalotla" selected="">Papalotla</option><option value="Polotitlán" selected="">Polotitlán</option><option value="Rayón" selected="">Rayón</option><option value="San Antonio la Isla" selected="">San Antonio la Isla</option><option value="San Felipe del Progreso" selected="">San Felipe del Progreso</option><option value="San José del Rincón" selected="">San José del Rincón</option><option value="San Martín de las Pirámid" selected="">San Martín de las Pirámid</option><option value="San Mateo Atenco" selected="">San Mateo Atenco</option><option value="San Simón de Guerrero" selected="">San Simón de Guerrero</option><option value="Santo Tomás" selected="">Santo Tomás</option><option value="Soyaniquilpan de Juárez" selected="">Soyaniquilpan de Juárez</option><option value="Sultepec" selected="">Sultepec</option><option value="Tecámac" selected="">Tecámac</option><option value="Tejupilco" selected="">Tejupilco</option><option value="Temamatla" selected="">Temamatla</option><option value="Temascalapa" selected="">Temascalapa</option><option value="Temascalcingo" selected="">Temascalcingo</option><option value="Temascaltepec" selected="">Temascaltepec</option><option value="Temoaya" selected="">Temoaya</option><option value="Tenancingo" selected="">Tenancingo</option><option value="Tenango del Aire" selected="">Tenango del Aire</option><option value="Tenango del Valle" selected="">Tenango del Valle</option><option value="Teoloyucan" selected="">Teoloyucan</option><option value="Teotihuacán" selected="">Teotihuacán</option><option value="Tepetlaoxtoc" selected="">Tepetlaoxtoc</option><option value="Tepetlixpa" selected="">Tepetlixpa</option><option value="Tepotzotlán" selected="">Tepotzotlán</option><option value="Tequixquiac" selected="">Tequixquiac</option><option value="Texcaltitlán" selected="">Texcaltitlán</option><option value="Texcalyacac" selected="">Texcalyacac</option><option value="Texcoco" selected="">Texcoco</option><option value="Tezoyuca" selected="">Tezoyuca</option><option value="Tianguistenco" selected="">Tianguistenco</option><option value="Timilpan" selected="">Timilpan</option><option value="Tlalmanalco" selected="">Tlalmanalco</option><option value="Tlalnepantla de Baz" selected="">Tlalnepantla de Baz</option><option value="Tlatlaya" selected="">Tlatlaya</option><option value="Toluca" selected="">Toluca</option><option value="Tonanitla" selected="">Tonanitla</option><option value="Tonatico" selected="">Tonatico</option><option value="Tultepec" selected="">Tultepec</option><option value="Tultitlán" selected="">Tultitlán</option><option value="Valle de Bravo" selected="">Valle de Bravo</option><option value="Valle de Chalco Solidarid" selected="">Valle de Chalco Solidarid</option><option value="Villa de Allende" selected="">Villa de Allende</option><option value="Villa del Carbón" selected="">Villa del Carbón</option><option value="Villa Guerrero" selected="">Villa Guerrero</option><option value="Villa Victoria" selected="">Villa Victoria</option><option value="Xalatlaco" selected="">Xalatlaco</option><option value="Xonacatlán" selected="">Xonacatlán</option><option value="Zacazonapan" selected="">Zacazonapan</option><option value="Zacualpan" selected="">Zacualpan</option><option value="Zinacantepec" selected="">Zinacantepec</option><option value="Zumpahuacán" selected="">Zumpahuacán</option><option value="Zumpango" selected="">Zumpango</option></select>





                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Código Postal
                                                        </label>
                                                        <select ng-model="inmblsmod.modfcpp" required="" id="modfcpp" name="modfcpp" class=" form-control ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched"><option value="? string: ?" selected="selected"></option>
        </select>





                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">

                                                        <label  class="text-label" style="color:black;">
                                                    Referencia de las calles y/o Vialidades principales del domicilio

                                                        </label>
                                                        <textarea id="modfrefvia" ng-model="inmblsmod.modfrefvia" name="modfrefvia" class=" form-control ng-pristine ng-valid ng-empty ng-touched" minlength="2" maxlength="200"></textarea>





                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-6">
                                                    <div class="form-group">

                                                        <label class="text-label" style="color:black;">
                                                   <h5>
                                                   Descripción de los Servicios ó Actividades que realiza:
                                                   </h5>
                                                            <label  id="modfmessageradios" name="modfmessageradios" style="color:  red; display: none;" >
                                                        Selecciona una Opción de acuerdo a los Servicios ó Actividades
                                                        </label>
                                                        </label>

                                                        <a>
                                                        <label   class="text-label" style="color:black;">

                                                        PAGÉ OPORTUNAMENTE EL IMPUESTO PREDIAL DEL INMUEBLE AL QUE CORRESPONDE LA CLAVE CATASTRAL.
                                                        </label>

                                                        </a>

                                                        <div class="col-lg-12 mb-6">
                                                        <center>

         <label>SI&nbsp;</label><input type="radio" name="modfimpuesto" id="modfgender1" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="modfimpuesto" id="modfgender2" value="FALSE">
         </center>
       </div>


                                                        <label   class="text-label" style="color:black;">

                                                        NO SE REALIZARÓN MEJORAS, AMPLIACIONES O CONSTRUCCIONES QUE AUMENTEN EL VALOR CATASTRAL DEL INMUEBLE.
                                                        </label>

                                                        <div class="col-lg-12 mb-6">
                                                        <center>
          <label>SI&nbsp;</label><input type="radio" name="modfgender2" id="modfgender2S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="modfgender2" id="modfgender2N" value="FALSE">
         </center>
       </div>

                                                        <label   class="text-label" style="color:black;">

                                                        SE ESTÁN REPORTANDO TODAS LAS CLAVES CATASTRALES PROPIEDAD DEL CONTRIBUYENTE QUE ESTÁN SUJETAS A DICTAMEN PREDIAL.
                                                        </label>

                                                        <div class="col-lg-12 mb-6">
                                                        <center>
          <label>SI&nbsp;</label><input type="radio" name="modfgender3" id="modfgender3S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="modfgender3" id="modfgender3N" value="FALSE">
         </center>
       </div>






                                                    </div>
                                                </div>







                                            </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-dismiss="modal"  ng-click="clearinmuebleupdate()" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" >Cancelar</button>
					<button type="button" onclick="updateInm()" class="btn" style="background-color: #414558; border-color: #414558; color: white;">Actualizar</button>
				</div>
                                            </div>
                                        </div>


                                    </div>
                                          </form>



    <!--**********************************
        HTML TO EDIT AND DELETE



    ***********************************-->


    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app9.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app10.js"></script>

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
