 <?php 

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;

$ruta = explode("/", $url);
 $to=count($ruta);
 
  $folio = $ruta[$to-1]; 
 //echo "<br>";
  $dictaminador = $ruta[$to-2]; 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dictamun 2020</title>
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 768px)" href="_js/estilos.css">  
  <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1023px)" href="_js/estilos.css">
  <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="_js/estilos.css">
  <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="_js/estilos.css">

  <?php include 'const.php'; ?>
  <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="_js/main.js"></script> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_actualizacion.js"></script> 
</head>
<body>

	<center>
    	<br><br>
     	<h1 style="font-weight: bold;">Dictamen Municipal</h1>
    	<br><br>
    </center>

    <div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">

	<nav class="navbar navbar-inverse" style="background: #606A5D; border-color: #606A5D;">
  	<div class="container-fluid">

    <nav class="navbar navbar-default" style="background-color: #606A5D; border-color: #606A5D;">
  	<div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" style="color: white;"><img src="<?php echo SERVERURL; ?>_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a>
      	<a class="navbar-brand" style="font-size: large; font-weight: bold;">DICTAMUN</a>
      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="width: 50px;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      	</button>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

        <li><a href="">Actualizaciones</a></li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</nav>
</div>
<div class="col-md-1"></div>
</div>


<br><br>
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="row">
    <div class="col-md-1"><br></div>

  <div class="col-md-10" style="background-color: #D3D9D1"><br><br>

      <center>
        <h3>Actualizar informacion referente al folio: <?php echo $folio ; ?></h3>
        <input type="text" name="folio" id="folio" value="<?php echo $folio ; ?>" style="display: none;">
        <input type="text" name="dic" id="dic" value="<?php echo $dictaminador ; ?>" style="display: none;">
        <br>
        <input type="button" class="btn btn-success" value="Validar" onclick="buscar();">
        <input type="text" name="tipoP" id="tipoP" style="display: none;">
      </center>

      <div class="col-md-12" id="info" style="display: none;">
        
        <div class="col-md-7 col-sm-4">
      <label style="font-size: small; text-align: left;">Nombre del Contribuyente:</label><input type="text" name="nombreDenRaz" id="nombreDenRaz" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       
      <label style="font-size: small; text-align: left; width: 170px;">Apellido Paterno:</label><input type="text" name="apPaterno" id="apPaterno" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
      
      <label style="font-size: small; text-align: left; width: 170px;">Apellido Materno:</label><input type="text" name="apMaterno" id="apMaterno" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>

    </div>
    <div class="col-md-5 col-sm-2">

        <label style="width: 70px; font-size: small; text-align: left;">RFC:</label><input type="text" name="rfc" id="rfc" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       <label style="width: 70px; font-size: small; text-align: left;">CURP:</label><input type="text" name="curp" id="curp"style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>

     
         <label style="width: 70px; font-size: small; text-align: left;">Telefono:</label><input type="text" name="telefono" id="telefono" ng-model="imblss.telefono" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>        
    </div><br><br>
    <div class="col-md-12">
       <label style="width: 170px; font-size: small; text-align: left;">Correo Electr&oacute;nico:</label><input type="text" name="correoE" id="correoE" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
    </div>
    
   </div>


    <div class="col-md-12" id="info2" style="display: none;">  
     <div class="col-md-7 col-sm-4">
      <label style="font-size: small; text-align: right;">Nombre, Denominaci&oacute;n o Raz&oacute;n social:</label><input type="text" name="nombreDenominacion" id="nombreDenominacion" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       <label style="width: 240px; font-size: small; text-align: right;">RFC:</label><input type="text" name="rfcD" id="rfcD" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       

    <label style="width: 240px; font-size: small; text-align: right;">Descripci&oacute;n de los servicios o Actividades que realiza:<br><br><br></label><textarea id="descripacrt" name="descripacrt" style="width: 260px; height: 100px;"></textarea><br><br>
  
    </div>

     <div class="col-md-5 col-sm-2">
     
         <label style="width: 70px; font-size: small; text-align: left;">Telefono:</label><input type="text" name="telefonoD" id="telefonoD" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
          <label style="width: 70px; font-size: small; text-align: left;">Correo Electr&oacute;nico:</label><input type="text" name="correoD" id="correoD" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
    </div><br><br>

   </div>
<div id="general" style="display: none;">
   <div class="col-md-12">
    <h4 style="font-weight: bold;">Representante Legal</h4><br>
  </div> 
     <div class="col-md-7 col-sm-4">
      <label style="width: 150px; font-size: small; text-align: left;">Nombre:</label><input type="text" name="nombreRep" id="nombreRep" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>

      <label style="width: 150px; font-size: small; text-align: left;">Apellido Paterno:</label><input type="text" name="apPaRep" id="apPaRep" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>

      <label style="width: 150px; font-size: small; text-align: left;">Apellido Materno:</label><input type="text" name="apMaRep" id="apMaRep" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>          

    </div>
    <div class="col-md-5">
      <label style="width: 70px; font-size: small; text-align: left;">RFC:</label><input type="text" name="rfcR" id="rfcR" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       <label style="width: 70px; font-size: small; text-align: left;">CURP:</label><input type="text" name="curpR" id="curpR" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
    </div>

    <div class="col-md-12">
    <h4 style="font-weight: bold;">Datos del Inmueble</h4><br>
  </div>
  <div class="col-md-7 col-sm-4">
      <label style="width: 150px; font-size: small; text-align: left;">Clave catastral:</label><input type="text" name="clave" id="clave" maxlength="21" style="border-bottom: 1px solid #888; background-color: #fb08328c; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>

      <label style="width: 150px; font-size: small; text-align: left;">Calle Principal:</label><input type="text" name="calle" id="calle" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
      <label style="width: 150px; font-size: small; text-align: left;">Número Exterior:</label><input type="text" name="noEx" id="noEx" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
      <label style="width: 150px; font-size: small; text-align: left;">Municipio:</label><input type="text" name="mun" id="mun" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
                

    </div>

    <div class="col-md-5">
      <form id="validationForm2" name="validationForm2" method="POST">
      <label style="width: 70px; font-size: small; text-align: left;">Valor catastral:</label><input type="text" onkeyup="validarValorC()" onblur="validarValorC()" name="valor" id="valor" maxlength="15" style="border-bottom: 1px solid #888; background-color: #fb08328c; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
      <div class="col-md-12 col-sm-3" id="messageValorc" name="messageValorc" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir solo n&uacute;meros.
   </form>
                        </div>

      <label style="width: 70px; font-size: small; text-align: left;">Colonia:</label><input type="text" name="col" id="col" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       <label style="width: 70px; font-size: small; text-align: left;">Número Interior:</label><input type="text" name="noI" id="noI" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
       <label style="width: 70px; font-size: small; text-align: left;">Código Postal:</label><input type="text" name="cp" id="cp" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
    </div>

    <div class="col-md-12">
      <label style="width: 400px; font-size: small; text-align: left;">Referencia de las calles y/o Vialidades principales del domicilio:</label><input type="text" name="ref" id="ref" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 810px; height: 30px;" readonly=""><br><br>  
    </div>
    <div class="col-md-12">
      <center>
        <label style="font-size: small; text-align: center;">Descripci&oacute;n de los servicios o Actividades que realiza:</label><br>
      </center>
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">PAG&Eacute; OPORTUNAMENTE EL IMPUESTO PREDIAL DEL INMUEBLE AL QUE CORRESPONDE LA CLAVE CATASTRAL.</p></div>
       <div class="col-md-2" style="background-color: #fb08328c;">
         <label>SI&nbsp;</label><input type="radio" name="impuesto" id="gender1" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="impuesto" id="gender2" value="FALSE">
       </div>
     </div>
     <div class="col-md-12">
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">NO SE REALIZAR&Oacute;N MEJORAS, AMPLIACIONES O CONSTRUCCIONES QUE AUMENTEN EL VALOR CATASTRAL DEL INMUEBLE.</p></div>
       <div class="col-md-2" style="background-color: #fb08328c;">
          <label>SI&nbsp;</label><input type="radio" name="gender2" id="gender2S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender2" id="gender2N" value="FALSE">
       </div>
     </div>
     <div class="col-md-12">
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">SE EST&Aacute;N REPORTANDO TODAS LAS CLAVES CATASTRALES PROPIEDAD DEL CONTRIBUYENTE QUE EST&Aacute;N SUJETAS A DICTAMEN PREDIAL.</p></div>
       <div class="col-md-2" style="background-color: #fb08328c;">
          <label>SI&nbsp;</label><input type="radio" name="gender3" id="gender3S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender3" id="gender3N" value="FALSE">
       </div>
     </div>
     <div class="col-md-12">
      <center>
         <form id="validationForm3" name="validationForm3" method="POST">
       <label style="width: 150px; font-size: small; text-align: left;">Año a Dictaminar:</label><input type="text" onkeyup="validarAnio()" onblur="validarAnio()" name="anio" id="anio" maxlength="4" style="border-bottom: 1px solid #888; background-color: #fb08328c; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;"><br><br>
        </form>
       <div class="col-md-12 col-sm-3" id="messageValorA" name="messageValorA" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir solo n&uacute;meros.
   
                        </div>

       <input type="button" class="btn btn-success" name="actualizarI" id="actualizarI" value="Actualizar información" onclick="actualizar();"><br><br><br>
      
       </center>
     </div>

   </div>

    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

  <div class="col-md-1"><br></div>
 
 </div>
 </div>
</div>
</div>
 
</body>
<footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div>
     <div class="col-md-12" style="height: 50px;">
       <div class="col-sm-2"><br></div>
       <div class="col-sm-4" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n <?php echo versionx;?></p>
       </div>
       <div class="col-sm-4" style="margin-left: 23px;">
            <div class="col-md-4"></div>
            <div class="col-md-6" align="right">
              <a href="https://twitter.com/IGECEM" target="_blank"><i class="fa fa-twitter" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="http://igecem.edomex.gob.mx/" target="_blank"><i class="fa fa-dribbble" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="https://www.facebook.com/IGECEM/" target="_blank"><i class="fa fa-facebook" style="font-size:30px; margin-left: 10px;"></i></a>
            </div>

       </div>
       <div class="col-sm-2" style=""></div>
     </div>
  </footer>

</html>