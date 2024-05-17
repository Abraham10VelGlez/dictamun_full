<?php include '../web/validateC.php';$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$ruta = explode("/", $url);
$to=count($ruta);
$e = $ruta[4-1];



?>
 <!doctype html>
<html >

  <head>
  <!--  <script>document.cookie=’resolution=’+Math.max(screen.width,screen.height)+’; path=/’;</script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php include '../const.php'; ?>

 <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css">
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery.dataTables.min.js"></script>

<link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 768px)" href="<?php echo SERVERURL; ?>_js/estilos2.css">
<link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1023px)" href="<?php echo SERVERURL; ?>_js/estilos2.css">
<link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="<?php echo SERVERURL; ?>_js/estilos2.css">
<link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="<?php echo SERVERURL; ?>_js/estilos2.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #606A5D;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}



@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}



@media screen and (max-width: 400px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
  </head>


  <body ng-app="InmueblesApp" ng-controller="InmueblesAppController" >

    <input type="hidden"  id="aniox" name="aniox"  value="<?php echo $e;?>" />

  <input type="hidden" id="idG" name="idG" value="<?php echo $ruta[$to-1];  ?>" />
  <input type="hidden" id="idGRec" name="idGRec"  />
  <input type="hidden" id="idP" name="idP"  />
    <center><div class="col-md-12 col-sm-6" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" id="banner">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br>
    </div></center>
  <br><br>
  <div class="col-md-12">
    <div class="col-md-12">
    <div class="col-md-1"></div>
   <div class="col-md-10">

<nav class="navbar navbar-inverse" style="background: #606A5D; border-color: #606A5D;">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <nav class="navbar navbar-default" style="background-color: #606A5D; border-color: #606A5D;">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="color: white;"><img src="<?php echo SERVERURL; ?>_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a>
      <a class="navbar-brand" style="font-size: large; font-weight: bold;">DICTAMUN</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li><a  href="../DatosContribuyente/" style="font-size: medium;">A&ntilde;o a Dictaminar</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
         <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp;
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesi&oacute;n" id="killer"></i>
      </p></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   </div>
   </nav>
<div class="col-md-1"></div>
</div>
<div class="col-md-1"></div>

</div>

    <div class="col-md-12">
       <div class="col-md-12">
    <div class="col-md-1"><br></div>
  <div class="col-md-10" style="background-color: #D3D9D1"><br><br>
    <h3 style="text-align: center; font-weight: bold;">Aviso de Dictamen</h3>
    <br>
    <h4 style="font-weight: bold;">Identificaci&oacute;n del Contribuyente</h4>

    <br>
    <!-- -->

       <form id="validationForm" name="validationForm" method="POST">

     <div class="col-md-12">&nbsp;</div>
     <div class="col-md-12">
           <div class="col-md-3"><br></div>
           <div class="col-md-3">

           <input type="radio" id="fisica" name="fm" ng-model="imblss.fm" value="1" onclick="name_fisk();">
              <label for="fisica" title="Persona F&iacute;sica">Persona Fisica</label>
           </div>
           <div class="col-md-3">
           <input type="radio" id="moral" name="fm" ng-model="imblss.fm" value="2" onclick="name_morl();">
              <label for="moral" title="Persona Moral">Persona Moral</label>
            </div>
            <div class="col-md-3"><br></div><br><br><br>

     </div>
   <div id="j" style="display: none;">
     <div class="col-md-7 col-sm-4">
      <label style="font-size: small; text-align: left;">Nombre del Contribuyente:</label><input type="text" onkeyup="validarNombre()" onblur="validarNombre()" name="nombreDenRaz" id="nombreDenRaz" ng-model="imblss.nombreDenRaz" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

      <label style="font-size: small; text-align: left; width: 170px;">Apellido Paterno:</label><input type="text" onkeyup="validarAPP()" onblur="validarAPP()" name="apPaterno" id="apPaterno" ng-model="imblss.apPaterno" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

      <label style="font-size: small; text-align: left; width: 170px;">Apellido Materno:</label><input type="text" onkeyup="validarAPM()" onblur="validarAPM()" name="apMaterno" id="apMaterno" ng-model="imblss.apMaterno" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

    </div>


     <div class="col-md-5 col-sm-2">

        <label style="width: 70px; font-size: small; text-align: left;">RFC:</label><input type="text" maxlength="13" onkeyup="validarRfc()" onblur="validarRfc()" name="rfc" id="rfc" ng-model="imblss.rfc" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
       <label style="width: 70px; font-size: small; text-align: left;">CURP:</label><input type="text" maxlength="19" onkeyup="validarCurp()" onblur="validarCurp()" name="curp" id="curp" ng-model="imblss.curp" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>


         <label style="width: 70px; font-size: small; text-align: left;">Telefono:</label><input type="text" onkeyup="validarTel()" onblur="validarTel()" name="telefono" id="telefono" ng-model="imblss.telefono" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
    </div><br><br>
      <div class="col-md-6 col-sm-3" id="message" name="message" style="color:  #c22708;" hidden="">
                        Nombre incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
      <div class="col-md-6 col-sm-3" id="messageAP" name="messageAP" style="color:  #c22708;" hidden="">
                        Apellido incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
      <div class="col-md-6 col-sm-3" id="messageRFC" name="messageRFC" style="color:  #c22708;" hidden="">
                        Ingresar Datos validos. Introducir solo letras y n&uacute;meros, no dejar espacios.

                        </div>
      <div class="col-md-6 col-sm-3" id="messageTelAsc" name="messageTelAsc" style="color:  #c22708;" hidden="">
                        Telefono incorrecto. Introducir solo 10 n&uacute;meros, no dejar el campo vacio ni introducir espacios.

                        </div>
    <div class="col-md-12">
       <label style="width: 170px; font-size: small; text-align: left;">Correo Electr&oacute;nico:</label><input type="text" onkeyup="validaremailF()" onblur="validaremailF()" name="correoE" id="correoE"  ng-model="imblss.correoE" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
    </div>
     <div class="col-md-6 col-sm-3" id="messageEmail" name="messageEmail" style="color:  #c22708;" hidden="">
                        Ingresar Datos validos.

                        </div>
   </div>


   <div id="i" style="display: none;">
     <div class="col-md-7 col-sm-4">
      <label style="font-size: small; text-align: right;">Nombre, Denominaci&oacute;n o Raz&oacute;n social:</label><input type="text" onkeyup="validarNombreA()" onblur="validarNombreA()" name="nombreDenominacion" id="nombreDenominacion" ng-model="imblss.nombreDenominacion" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
       <label style="width: 240px; font-size: small; text-align: right;">RFC:</label><input type="text" maxlength="13" onkeyup="validarRfcA()" onblur="validarRfcA()" name="rfcD" id="rfcD" ng-model="imblss.rfcD" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>


    <label style="width: 240px; font-size: small; text-align: right;">Descripci&oacute;n de los servicios o Actividades que realiza:<br><br><br></label><textarea id="descripacrt" name="descripacrt" ng-model="imblss.descripacrt" style="width: 260px; height: 100px;"></textarea><br><br>


    </div>

     <div class="col-md-5 col-sm-2">

         <label style="width: 70px; font-size: small; text-align: left;">Telefono:</label><input type="text" onkeyup="validarTelA()" onblur="validarTelA()" name="telefonoD" id="telefonoD" ng-model="imblss.telefonoD" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
          <label style="width: 70px; font-size: small; text-align: left;">Correo Electr&oacute;nico:</label><input type="text" onkeyup="validaremailM()" onblur="validaremailM()" name="correoD" id="correoD"  ng-model="imblss.correoD" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
    </div><br><br>
    <div class="col-md-6 col-sm-3" id="messageA" name="messageA" style="color:  #c22708;" hidden="">
                        Nombre incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
    <div class="col-md-6 col-sm-3" id="messageRFCa" name="messageRFCa" style="color:  #c22708;" hidden="">
                        Ingresar Datos validos. Introducir solo letras y n&uacute;meros, no dejar espacios.

                        </div>
   <div class="col-md-6 col-sm-3" id="messageTelA" name="messageTelA" style="color:  #c22708;" hidden="">
                        Telefono incorrecto. Introducir solo 10 n&uacute;meros, no dejar el campo vacio ni introducir espacios.

                        </div>
    <div class="col-md-3 col-sm-3" id="messageEmailm" name="messageEmailm" style="color:  #c22708;" hidden="">
                        Ingresar Datos validos.

                        </div>

   </div>



    <!--   </form> -->
      <div class="col-md-12">
    <h4 style="font-weight: bold;">Representante Legal</h4><br>
  </div>
     <div class="col-md-7 col-sm-4">
      <label style="width: 150px; font-size: small; text-align: left;">Nombre:</label><input type="text" onkeyup="validarNombreRL()" onblur="validarNombreRL()" name="nombreRep" id="nombreRep" ng-model="imblss.nombreRep" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

      <label style="width: 150px; font-size: small; text-align: left;">Apellido Paterno:</label><input type="text" onkeyup="validarAPPas()" onblur="validarAPPas()" name="apPaRep" id="apPaRep" ng-model="imblss.apPaRep" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

      <label style="width: 150px; font-size: small; text-align: left;">Apellido Materno:</label><input type="text" onkeyup="validarAPMas()" onblur="validarAPMas()" name="apMaRep" id="apMaRep" ng-model="imblss.apMaRep" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

    </div>
    <div class="col-md-5">
      <label style="width: 70px; font-size: small; text-align: left;">RFC:</label><input type="text" maxlength="13" onkeyup="validarRfcAs()" onblur="validarRfcAs()" name="rfcR" id="rfcR" ng-model="imblss.rfcR" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
       <label style="width: 70px; font-size: small; text-align: left;">CURP:</label><input type="text" maxlength="19" onkeyup="validarCurpAs()" onblur="validarCurpAs()" name="curpR" id="curpR" ng-model="imblss.curpR" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
    </div>
    <div class="col-md-6 col-sm-3" id="messageRL" name="messageRL" style="color:  #c22708;" hidden="">
                        Nombre incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
    <div class="col-md-6 col-sm-3" id="messageAPas" name="messageAPas" style="color:  #c22708;" hidden="">
                        Apellido incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
    <div class="col-md-6 col-sm-3" id="messageRFCas" name="messageRFCas" style="color:  #c22708;" hidden="">
                        Ingresar Datos validos. Introducir solo letras y n&uacute;meros, no dejar espacios.

                        </div>
    </form>
    <div class="col-md-12">
      <h4 style="font-weight: bold;">Dictaminador (Especialista en valuaci&oacute;n inmobiliaria autorizado por el IGECEM)</h4><br>
      <div class="col-md-10">
        <label>Seleccionar Dictaminador:   </label><select id="selcdic" name="selcdic" ng-model="imblss.selcdic"></select>
       <!-- <p id="nombesp"><?php //echo $_SESSION['nombre_detalle']; ?></p> -->
       <!-- <input type="text" name="nombespx" id="nombespx" value="<?php //echo $_SESSION['idkey2']; ?>" hidden> -->
        <br><br>
        <div id="noReg">
        <input type="hidden" name="nogx" id="nogx">
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <h4 style="font-weight: bold;">Informaci&oacute;n Adicional</h4>
      <div class="col-md-7 col-sm-4">
      <label style="width: 170px; font-size: small; text-align: left;">A&ntilde;o a Dictaminar:</label><label><?php echo $e;?></label><br><br>


       <label style="width: 220px; font-size: small; text-align: left;">Tipo de Dictamen:</label>
    </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-1"></div>
      <div class="col-md-11"><br>
       <form action="#">
  <input type="radio" id="male" name="gender"  ng-model="imblss.gender" value="1">
  <label>Obligatorio, &uacute;nicamente por tener uno o m&aacute;s inmuebles con valor catastral igual o superior a $20,000,000.00</label><br>

  <input type="radio" id="female" name="gender" ng-model="imblss.gender" value="2">
  <label>Obligatorio, por tener inmuebles con valor catastral igual o superior a $5,000,000.00 y que en suma tiene un valor catastral igual o superior a $20,000,000.00</label><br>

  <input type="radio" id="other" name="gender" ng-model="imblss.gender" value="3">
  <label>Opcional, de acuerdo con el art&iacute;culo 47 bis tercer p&aacute;rrafo del c&oacute;digo financiero del estado de M&eacute;xico y municipios.</label>
</form>
    </div>
</div>
<div class="col-md-12">
    <h4 style="font-weight: bold;">Inmueble Objeto de Dictaminaci&oacute;n</h4><br>
    <div class="col-md-1"></div>
    <div class="col-md-2">

  <a><i id="agregarNewIn" style="color: #4CAB73; cursor: pointer;" class="fa fa-plus-circle fa-4x" title="Agregar Inmueble" onclick="document.getElementById('id01').style.display='block'"></i></a>

    <h5 id="agreIn">Agregar Inmueble</h5><br><br><br>
    <h5 id="agreIn2" style="display: none;">Inmueble Agregado</h5><br><br><br>
    </div>
    <div class="col-md-6">
      <h5>Total de Inmuebles:</h5>
    <table border=2 >
      <tr>



    <td style="width: 200px;">Valor Catastral</td>

    <td style="width: 200px;">Clave Catastral</td>
    <td style="width: 150px;">Eliminar</td>

  </tr>
    <tr ng-repeat="xxx in imblss.inm">

    <td>{{ xxx.scrp }}</td>
    <td>{{ xxx.c_muni }}{{xxx.c_zona}}{{xxx.c_manz}}{{xxx.c_lote}}{{xxx.c_edif}}{{xxx.c_dept}}</td>
    <td><a href="javascript:void(0);" ng-click="eliminarInmbls($index)"> Eliminar </a></td>
      </tr>
    </table>


    </div>

</div>
<div class="col-md-12">
  <div class="col-md-3"></div>
  <center>
  <div class="col-md-2">
    <!-- <a href="../reporte.php" download="AcuseDictamen">
      <input type="button" name="acuse" id="acuse" value="ACUSE" onclick="okAcuse();">
    </a>       -->

    <input type="button" name="ok" id="ok" class="btn btn-success" ng-click="btnpre()" value="Presentar Aviso" style="display: none;">
    <!--
    <a href="/dictamun/reporte.php" download="AcuseDictamen">
    <input type="button" name="ok" id="ok" class="btn btn-success" ng-click="btnpre()" value="Presentar Aviso" onclick="okAcuse();" style="display: none;"></a> -->
  </div>
  <div class="col-md-2"></div>
  <div class="col-md-2">
   <input type="button" name="cancelar" class="btn btn-danger" onclick="okAcuse();" value="Cancelar"><br><br>

  </div>
</center>
  <div class="col-md-3"></div>
</div>

  </div>
  <div class="col-md-1"></div>
  </div>

</div>

<div id="id01" class="modal modal-content animate"  style="height: 650px;">
  <form id="validationForm2" name="validationForm2" method="POST">
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">Agregar Inmueble</h3>
    <div class="c">
      <h4 style="margin-left: 30px;">Datos Generales</h4>
      <center>
        <div class="col-md-12">
      <label>*Clave Catastral</label>
      <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-question-circle fa-2x" title="Ingresa la clave Catastral de la siguiente manera:
      Municipio (Primeros 3 digitos)
      Zona (Siguientes 2 Digitos)
      Manzana (Siguientes 3 digitos)
      Lote (Siguientes 2 digitos)
      Edificio (Siguientes 2 digitos)
      Departamento (Ultimos 4 Digitos)"></i>
    </div>
      <div class="col-md-2">
        <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave" ng-model="inmbls.c_muni" id="c_muni" placeholder="Municipio" title="Escriba clave de municipio" maxlength="3" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave" ng-model="inmbls.c_zona" id="c_zona" placeholder="Zona" title="Escriba clave de Zona" maxlength="2" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave" ng-model="inmbls.c_manz" id="c_manz" placeholder="Manzana" title="Escriba clave de Manzana" maxlength="3" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" onkeypress="return validaNumericos(event)" class="form-control clave" ng-model="inmbls.c_lote" id="c_lote" placeholder="Lote" title="Escriba clave de Lote" maxlength="2" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" onkeypress="return validaNumLet(event)" class="form-control clave" ng-model="inmbls.c_edif" id="c_edif" placeholder="Edificio" title="Escriba clave de Edificio" maxlength="2" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" onkeypress="return validaNumLet(event)" class="form-control clave" ng-model="inmbls.c_dept" id="c_dept" placeholder="Depto" title="Escriba clave de Depto" maxlength="4" style="text-align: center;">
        <br>
        </div>

       <label>*Valor Catastral</label>
      <!--input  type="text" name="scrp" id="scrp"  ng-model="inmbls.scrp" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$"  data-type="currency" placeholder="$1,000,000.00" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 160px;"-->
      <input  type="text" onkeyup="validarValorC()" onblur="validarValorC()" name="scrp" id="scrp"  ng-model="inmbls.scrp" maxlength="12"  style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 160px;">
        <!--input type="hidden" id="scrp" name="scrp"  value="" /-->
      <br>
      </center>
      <div class="col-md-12 col-sm-3" id="messageValorc" name="messageValorc" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir solo n&uacute;meros.

                        </div>
      <h4 style="margin-left: 30px;">Ubicaci&oacute;n del Inmueble</h4><br>
      <center>
        <div class="col-md-12">
          <div class="col-md-6">
            <label style="">Calle principal:</label>
      <input type="text"  onkeyup="validarDomi()" onblur="validarDomi()" ng-model="inmbls.calleAv"
       placeholder="Ingresar calle o avenida" id="calleAv" name="calleAv" required style="">
      <br><br>
          </div>
          <div class="col-md-6">
            <label style="">Colonia:</label>
      <input type="text"   onkeyup="validarCol()" onblur="validarCol()" ng-model="inmbls.col"
       placeholder="Ingresar nombre de la colonia" id="col" name="col" required style="">
      <br><br>
          </div>
        </div>
        <div class="col-md-12 col-sm-3" id="messageCalle" name="messageCalle" style="color:  #c22708;" hidden="">
                        Nombre de la calle incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
        <div class="col-md-12 col-sm-3" id="messageCol" name="messageCol" style="color:  #c22708;" hidden="">
                        Nombre de colonia incorrecto. Introducir solo letras y no dejar el campo vacio.

                        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <label style="">N&uacute;mero Exterior:</label>
      <input type="text" onkeyup="validarNE()" onblur="validarNE()" ng-model="inmbls.numEx" placeholder="Ingresar N&uacute;mero Exterior" id="numEx" name="numEx" required style="width: 160px;">
      <br><br>
          </div>
          <div class="col-md-6">
             <label style="">N&uacute;mero Interior:</label>
      <input type="text" onkeyup="validarNI()" onblur="validarNI()" ng-model="inmbls.numIn" placeholder="Ingresar N&uacute;mero Interior" id="numIn" name="numIn" required style="width: 125px;">
      <br><br>
          </div>
        </div>
        <div class="col-md-12 col-sm-3" id="messageNE" name="messageNE" style="color:  #c22708;" hidden="">
                        Dato incorrecto. Si no cuenta con n&uacute;mero introducir "0".

                        </div>
       <div class="col-md-12">
        <div class="col-md-6">
        <label style="">Municipio:</label>
        <select ng-model="inmbls.munic" required id="munic" name="munic" >
        </select>
        <input type="hidden" id="wwe" name="wwe" value=""/>
      <!--input type="text" ng-model="inmbls.muni" placeholder="Ingresar Municipio" id="muni" name="muni" required style="width: 165px;"><br><br-->
      <br>
        </div>
        <div class="col-md-6">
              <label style="">C&oacute;digo Postal:</label>
              <select ng-model="inmbls.cpp" required id="cpp" name="cpp" >
        </select>
      <!--input type="text" ng-model="inmbls.cp" placeholder="Ingresar Codigo Postal" id="cp" name="cp" required style=""-->
        </div>
      </div>
      <div class="col-md-12">
        <label style="">Referencia de las calles y/o Vialidades principales del domicilio:</label><br>
      <textarea id="refvia" ng-model="inmbls.refvia" name="refvia"  style="width: 500px; height: 50px;"></textarea>
      <br>

      </div>

    </center>


     <div class="col-md-12">
      <center>
        <label style="font-size: small; text-align: center;"><br>Descripci&oacute;n de los servicios o Actividades que realiza:</label><br>
      </center>
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">PAG&Eacute; OPORTUNAMENTE EL IMPUESTO PREDIAL DEL INMUEBLE AL QUE CORRESPONDE LA CLAVE CATASTRAL.</p></div>
       <div class="col-md-3">
         <label>SI&nbsp;</label><input type="radio" name="impuesto" id="gender1" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="impuesto" id="gender2" value="FALSE">
       </div>
     </div>
     <div class="col-md-12">
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">NO SE REALIZAR&Oacute;N MEJORAS, AMPLIACIONES O CONSTRUCCIONES QUE AUMENTEN EL VALOR CATASTRAL DEL INMUEBLE.</p></div>
       <div class="col-md-3">
          <label>SI&nbsp;</label><input type="radio" name="gender2" id="gender2S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender2" id="gender2N" value="FALSE">
       </div>
     </div>
     <div class="col-md-12">
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">SE EST&Aacute;N REPORTANDO TODAS LAS CLAVES CATASTRALES PROPIEDAD DEL CONTRIBUYENTE QUE EST&Aacute;N SUJETAS A DICTAMEN PREDIAL.</p></div>
       <div class="col-md-3">
          <label>SI&nbsp;</label><input type="radio" name="gender3" id="gender3S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender3" id="gender3N" value="FALSE">
       </div>
     </div>

      <center>
      <button type="submit" class="btn btn-success" style="width: 100px;" ng-click="agregarInm()">Guardar</button>
      <button type="submit" class="btn btn-danger" style="width: 100px;" onclick="document.getElementById('id01').style.display='none'">Cancelar</button>
      <br><br>
    </center>
    </div>
  </form>
</div>

<div id="id01_mo" class="modal">

  <form class="modal-content animate" action="../reporte.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01_mo').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../_img/ok.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </div>
    <center>
    <div class="c">
       <div class="form-group">
        <label>Datos guardados Correctamente.<br>Se generar&aacute; el acuse correspondiente el cual tendr&aacute; que guardar e imprimir.<br><br><br></label>
      <label for="exampleInputFile"></label>
        <center>
          <a href="../reporte.php" download="AcuseDictamen">
      <input type="button" name="acuse" id="acuse" value="ACUSE" onclick="okAcuse();">
    </a>
        </center>
      <p class="help-block"></p>
      </div>
     <div class="upload-msg"></div>
    </div>
  </center>
   <!-- <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>  -->
  </form>

</div>


<div id="id02" class="modal modal-content animate" style="width: 300px; height: 300px;">
  <form id="validationForm26" name="validationForm26" method="POST">
    <center><img src="<?php echo SERVERURL; ?>_img/error.png" width="70" height="70">
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">Datos incorrectos. Verifique por favor.</h3>
    <div class="c">
       <center>
      <button type="submit" class="btn btn-success" style="width: 100px;" onclick="document.getElementById('id02').style.display='none'">Aceptar</button>
      <br><br>
    </center>
    </div>
  </form>
</div>

<div id="id03" class="modal modal-content animate" style="width: 300px; height: 300px;">
  <form id="validationForm2" name="validationForm2" method="POST">
    <center><img src="../../_img/ok2.gif" alt="Avatar" class="avatar" style="width: 120px;">
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">Datos Registrados Correctamente, Generando aviso de Dictamen</h3>
    <div class="c">
       <center>
        <!--  <a href="" download="AcuseDictamen.pdf">
  <input type="button" class="btn btn-success" value="Aceptar" onclick="acuseDescargar();"></a> -->

    <br><br>
      <br><br>
    </center>
    </div>
  </form>
</div>

<div id="id04" class="modal modal-content animate" style="width: 300px; height: 300px;">
  <form id="validationForm24" name="validationForm24" method="POST">
    <center><img src="<?php echo SERVERURL; ?>_img/email.png" width="70" height="70">
      <br>
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">Enviar Aviso de dictamen por correo electronico</h3>
    <div class="c">
       <center>

    <input type="button" class="btn btn-success" name="EnviarAcuse" id="EnviarAcuse" value="Enviar" onclick="okAcuse();">

    <br><br>
      <br><br>
    </center>
    </div>
  </form>
</div>
<div id="id05" class="modal modal-content animate" style="width: 300px; height: 300px;">
  <form id="validationForm25" name="validationForm25" method="POST">
    <center><img src="<?php echo SERVERURL; ?>_img/error.png" width="70" height="70">
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">Verificar los datos ingresados de edificio y departamento en la Clave catastral.</h3>
    <div class="c">
       <center>
      <button type="submit" class="btn btn-success" style="width: 100px;" onclick="document.getElementById('id05').style.display='none'">Aceptar</button>
      <br><br>
    </center>
    </div>
  </form>
</div>

</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
   <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app9.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app10.js"></script>
 <!-- <script type="text/javascript" src="<?php //echo SERVERURL; ?>_js/_app4.js"></script> -->
  <div id="id06" class="modal modal-content animate" style="width: 300px; height: 300px;">
  <form id="validationForm7" name="validationForm7" method="POST">
    <center><img src="<?php echo SERVERURL; ?>_img/error.png" width="70" height="70">
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">La clave catastral ingresada ya cuenta con un registro.</h3>
    <div class="c">
       <center>
      <button type="submit" class="btn btn-success" style="width: 100px;" onclick="document.getElementById('id06').style.display='none'">Aceptar</button>
      <br><br>
    </center>
    </div>
  </form>
</div>

  </body>

  <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div>
     <div class="col-md-12" style="height: 50px;">
       <div class="col-sm-2" style=""></div>
       <div class="col-sm-4" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n  <?php echo versionx;?></p>
       </div>
        <div class="col-sm-1" style="height: 50px;"></div>
       <div class="col-sm-3" style="margin-left: 23px;">
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-6 col-sm-6" align="right">
              <a href="https://twitter.com/IGECEM" target="_blank"><i class="fa fa-twitter" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="http://igecem.edomex.gob.mx/" target="_blank"><i class="fa fa-dribbble" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="https://www.facebook.com/IGECEM/" target="_blank"><i class="fa fa-facebook" style="font-size:30px; margin-left: 10px;"></i></a>
            </div>

       </div>
       <div class="col-sm-2" style=""></div>
     </div>
  </footer>
</html>
