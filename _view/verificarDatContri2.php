<?php include '../web/validate.php';$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];  $ruta = explode("/", $url);$to=count($ruta);  $e = $ruta[4];


?> 
 <!doctype html>
<html >

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <title>DictaMun 2022</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

<?php include '../const.php'; ?> 

 <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery.dataTables.min.js"></script>
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

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 1% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
  height: 600px;
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
    <input type="hidden" id="nogx"  name="nogx" value="<?php echo $_SESSION['idkey2']; ?>" /> 
    <input type="hidden"  id="aniox" name="aniox"  value="<?php echo $e;?>" />     
    
  <input type="hidden" id="idG" name="idG" value="<?php echo $ruta[$to-1];  ?>" />
  <input type="hidden" id="idGRec" name="idGRec"  />
  <input type="hidden" id="idP" name="idP"  />
    <center><div class="col-md-12 col-sm-6" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" style="max-width: 100%; height: auto;">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br> 
    </div></center>  
  <br><br>
  <div class="col-md-12"> 
    <div class="col-md-1"></div>
   <div class="topnav col-md-10">

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
    
        <li><a  href="../DatosContribuyente/<?php echo $e; ?>" style="font-size: medium;">A&ntilde;o a Dictaminar</a></li>       
      </ul>
      <ul class="nav navbar-nav">
    
        <li><a  href="../SeguimientoContribuyente/<?php echo $e; ?>" style="font-size: medium;">Seguimiento</a></li>       
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a><?php //echo $_SESSION['usuarioactual']; ?></a></li>
        <li class="fa fa-user-times fa-2x" style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><a id="killer" style="cursor: pointer;" title="Cerrar Sesión"></a>
        </li> -->
         <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp;  
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesi&oacute;n" id="killer"></i>   

      </p></li>   
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
   </div>
<div class="col-md-1"></div>
</div>
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
       

    <label style="width: 240px; font-size: small; text-align: right;">Descripci&oacute;n de los servicios o Actividades que realiza:<br><br><br>

      <form id="manifestacion" name="" action="">
     <div class="col-md-12">
       <div class="col-md-8"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">PAG&Eacute; OPORTUNAMENTE EL IMPUESTO PREDIAL DEL INMUEBLE AL QUE CORRESPONDE LA CLAVE CATASTRAL.</p></div>
       <div class="col-md-4">
         <label>SI&nbsp;</label><input type="radio" name="gender" id="genderS" value="SI">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender" id="genderN" value="NO">
       </div>
     </div>
     <div class="col-md-12">
       <div class="col-md-8"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">NO SE REALIZAR&Oacute;N MEJORAS, AMPLIACIONES O CONSTRUCCIONES QUE AUMENTEN EL VALOR CATASTRAL DEL INMUEBLE.</p></div>
       <div class="col-md-4">
          <label>SI&nbsp;</label><input type="radio" name="gender2" id="gender2" value="SI">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender2" id="gender2" value="NO">
       </div>
     </div>
        </form>

    </center> 
      <center>
      <button type="submit" class="btn btn-success" style="width: 100px;" ng-click="agregarInm()">Guardar</button>
      <button type="submit" class="btn btn-danger" style="width: 100px;" onclick="document.getElementById('id01').style.display='none'">Cancelar</button>
      <br><br>
    </center> mg src="<?php echo SERVERURL; ?>_img/error.png" width="70" height="70">
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
    <center><img src="<?php echo SERVERURL; ?>_img/ok.jpg" width="70" height="70">
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">Se han registrado todos los datos correctamente</h3>
    <div class="c">   
       <center>
        <a href="/dictamun/rep.php" download="AcuseDictamen">
    <input type="button" class="btn btn-success" value="Aceptar" onclick="okAcuse();"></a>
    
    <br><br>
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

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app2.js"></script>

  </body>

  <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div> 
     <div class="col-md-12" style="height: 50px;">
       <div class="col-sm-2" style=""></div>
       <div class="col-sm-4" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en ©Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n <?php echo versionx;?></p>
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