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
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_actualizacionDomicilio.js"></script> 
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
     <form id="validationForm2" name="validationForm2" method="POST">
      <label style="width: 150px; font-size: small; text-align: left;">Clave catastral:</label><input type="text" name="clave" id="clave" maxlength="21" style="border-bottom: 1px solid #888; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>

      <label style="width: 150px; font-size: small; text-align: left;">Calle Principal:</label><input type="text" name="calle" id="calle" onkeyup="validarDomi()" onblur="validarDomi()" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px; background-color: #fb08328c;"><br><br>
       <div class="col-md-12 col-sm-3" id="messageCalle" name="messageCalle" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir solo letras y no dejar el campo vacio.
                      </div>
      <label style="width: 150px; font-size: small; text-align: left;">Número Exterior:</label><input type="text" name="noEx" id="noEx" onkeyup="validarNE()" onblur="validarNE()" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px; background-color: #fb08328c;"><br><br>
      <div class="col-md-12 col-sm-3" id="messageNE" name="messageNE" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir numeros y letras.
                      </div>
      <label style="width: 150px; font-size: small; text-align: left;">Municipio:</label>      
      <select  required="" id="munic" name="munic" class="ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched"><option value="0" selected="selected" disabled=""> Selecciona Municipio </option><option value="Acambay de Ruíz Castañeda" selected="">Acambay de Ruíz Castañeda</option><option value="Acolman" selected="">Acolman</option><option value="Aculco" selected="">Aculco</option><option value="Almoloya de Alquisiras" selected="">Almoloya de Alquisiras</option><option value="Almoloya de Juárez" selected="">Almoloya de Juárez</option><option value="Almoloya del Río" selected="">Almoloya del Río</option><option value="Amanalco" selected="">Amanalco</option><option value="Amatepec" selected="">Amatepec</option><option value="Amecameca" selected="">Amecameca</option><option value="Apaxco" selected="">Apaxco</option><option value="Atenco" selected="">Atenco</option><option value="Atizapán" selected="">Atizapán</option><option value="Atizapán de Zaragoza" selected="">Atizapán de Zaragoza</option><option value="Atlacomulco" selected="">Atlacomulco</option><option value="Atlautla" selected="">Atlautla</option><option value="Axapusco" selected="">Axapusco</option><option value="Ayapango" selected="">Ayapango</option><option value="Calimaya" selected="">Calimaya</option><option value="Capulhuac" selected="">Capulhuac</option><option value="Coacalco de Berriozábal" selected="">Coacalco de Berriozábal</option><option value="Coatepec Harinas" selected="">Coatepec Harinas</option><option value="Cocotitlán" selected="">Cocotitlán</option><option value="Coyotepec" selected="">Coyotepec</option><option value="Cuautitlán" selected="">Cuautitlán</option><option value="Cuautitlán Izcalli" selected="">Cuautitlán Izcalli</option><option value="Chalco" selected="">Chalco</option><option value="Chapa de Mota" selected="">Chapa de Mota</option><option value="Chapultepec" selected="">Chapultepec</option><option value="Chiautla" selected="">Chiautla</option><option value="Chicoloapan" selected="">Chicoloapan</option><option value="Chiconcuac" selected="">Chiconcuac</option><option value="Chimalhuacán" selected="">Chimalhuacán</option><option value="Donato Guerra" selected="">Donato Guerra</option><option value="Ecatepec de Morelos" selected="">Ecatepec de Morelos</option><option value="Ecatzingo" selected="">Ecatzingo</option><option value="El Oro" selected="">El Oro</option><option value="Huehuetoca" selected="">Huehuetoca</option><option value="Hueypoxtla" selected="">Hueypoxtla</option><option value="Huixquilucan" selected="">Huixquilucan</option><option value="Isidro Fabela" selected="">Isidro Fabela</option><option value="Ixtapaluca" selected="">Ixtapaluca</option><option value="Ixtapan de la Sal" selected="">Ixtapan de la Sal</option><option value="Ixtapan del Oro" selected="">Ixtapan del Oro</option><option value="Ixtlahuaca" selected="">Ixtlahuaca</option><option value="Jaltenco" selected="">Jaltenco</option><option value="Jilotepec" selected="">Jilotepec</option><option value="Jilotzingo" selected="">Jilotzingo</option><option value="Jiquipilco" selected="">Jiquipilco</option><option value="Jocotitlán" selected="">Jocotitlán</option><option value="Joquicingo" selected="">Joquicingo</option><option value="Juchitepec" selected="">Juchitepec</option><option value="La Paz" selected="">La Paz</option><option value="Lerma" selected="">Lerma</option><option value="Luvianos" selected="">Luvianos</option><option value="Malinalco" selected="">Malinalco</option><option value="Melchor Ocampo" selected="">Melchor Ocampo</option><option value="Metepec" selected="">Metepec</option><option value="Mexicaltzingo" selected="">Mexicaltzingo</option><option value="Morelos" selected="">Morelos</option><option value="Naucalpan de Juárez" selected="">Naucalpan de Juárez</option><option value="Nextlalpan" selected="">Nextlalpan</option><option value="Nezahualcóyotl" selected="">Nezahualcóyotl</option><option value="Nicolás Romero" selected="">Nicolás Romero</option><option value="Nopaltepec" selected="">Nopaltepec</option><option value="Ocoyoacac" selected="">Ocoyoacac</option><option value="Ocuilan" selected="">Ocuilan</option><option value="Otumba" selected="">Otumba</option><option value="Otzoloapan" selected="">Otzoloapan</option><option value="Otzolotepec" selected="">Otzolotepec</option><option value="Ozumba" selected="">Ozumba</option><option value="Papalotla" selected="">Papalotla</option><option value="Polotitlán" selected="">Polotitlán</option><option value="Rayón" selected="">Rayón</option><option value="San Antonio la Isla" selected="">San Antonio la Isla</option><option value="San Felipe del Progreso" selected="">San Felipe del Progreso</option><option value="San José del Rincón" selected="">San José del Rincón</option><option value="San Martín de las Pirámid" selected="">San Martín de las Pirámid</option><option value="San Mateo Atenco" selected="">San Mateo Atenco</option><option value="San Simón de Guerrero" selected="">San Simón de Guerrero</option><option value="Santo Tomás" selected="">Santo Tomás</option><option value="Soyaniquilpan de Juárez" selected="">Soyaniquilpan de Juárez</option><option value="Sultepec" selected="">Sultepec</option><option value="Tecámac" selected="">Tecámac</option><option value="Tejupilco" selected="">Tejupilco</option><option value="Temamatla" selected="">Temamatla</option><option value="Temascalapa" selected="">Temascalapa</option><option value="Temascalcingo" selected="">Temascalcingo</option><option value="Temascaltepec" selected="">Temascaltepec</option><option value="Temoaya" selected="">Temoaya</option><option value="Tenancingo" selected="">Tenancingo</option><option value="Tenango del Aire" selected="">Tenango del Aire</option><option value="Tenango del Valle" selected="">Tenango del Valle</option><option value="Teoloyucan" selected="">Teoloyucan</option><option value="Teotihuacán" selected="">Teotihuacán</option><option value="Tepetlaoxtoc" selected="">Tepetlaoxtoc</option><option value="Tepetlixpa" selected="">Tepetlixpa</option><option value="Tepotzotlán" selected="">Tepotzotlán</option><option value="Tequixquiac" selected="">Tequixquiac</option><option value="Texcaltitlán" selected="">Texcaltitlán</option><option value="Texcalyacac" selected="">Texcalyacac</option><option value="Texcoco" selected="">Texcoco</option><option value="Tezoyuca" selected="">Tezoyuca</option><option value="Tianguistenco" selected="">Tianguistenco</option><option value="Timilpan" selected="">Timilpan</option><option value="Tlalmanalco" selected="">Tlalmanalco</option><option value="Tlalnepantla de Baz" selected="">Tlalnepantla de Baz</option><option value="Tlatlaya" selected="">Tlatlaya</option><option value="Toluca" selected="">Toluca</option><option value="Tonanitla" selected="">Tonanitla</option><option value="Tonatico" selected="">Tonatico</option><option value="Tultepec" selected="">Tultepec</option><option value="Tultitlán" selected="">Tultitlán</option><option value="Valle de Bravo" selected="">Valle de Bravo</option><option value="Valle de Chalco Solidarid" selected="">Valle de Chalco Solidarid</option><option value="Villa de Allende" selected="">Villa de Allende</option><option value="Villa del Carbón" selected="">Villa del Carbón</option><option value="Villa Guerrero" selected="">Villa Guerrero</option><option value="Villa Victoria" selected="">Villa Victoria</option><option value="Xalatlaco" selected="">Xalatlaco</option><option value="Xonacatlán" selected="">Xonacatlán</option><option value="Zacazonapan" selected="">Zacazonapan</option><option value="Zacualpan" selected="">Zacualpan</option><option value="Zinacantepec" selected="">Zinacantepec</option><option value="Zumpahuacán" selected="">Zumpahuacán</option><option value="Zumpango" selected="">Zumpango</option></select>
         </form>       

    </div>

    <div class="col-md-5">
     <form id="validationForm3" name="validationForm3" method="POST">
      <label style="width: 70px; font-size: small; text-align: left;">Valor catastral:</label><input type="text" name="valor" id="valor" maxlength="15" style="border-bottom: 1px solid #888; 
      border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
     

      <label style="width: 70px; font-size: small; text-align: left;">Colonia:</label><input type="text" name="col" id="col" onkeyup="validarCol()" onblur="validarCol()" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px; background-color: #fb08328c;"><br><br>
       <div class="col-md-12 col-sm-3" id="messageCol" name="messageCol" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir solo letras y no dejar el campo vacio.
                      </div>
       <label style="width: 70px; font-size: small; text-align: left;">Número Interior:</label><input type="text" name="noI" id="noI" onkeyup="validarNI()" onblur="validarNI()" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px; background-color: #fb08328c;"><br><br>
       <div class="col-md-12 col-sm-3" id="messageNI" name="messageNI" style="color:  #c22708;" hidden="">
                        Valor incorrecto, introducir numeros y letras.
                      </div>
       <label style="width: 70px; font-size: small; text-align: left;">Código Postal:</label>       
       <select  required="" id="cpp" name="cpp" class="ng-pristine ng-empty ng-invalid ng-invalid-required ng-touched">        
        </select><br><br>
     </form>
    </div>

    <div class="col-md-12">
      <label style="width: 400px; font-size: small; text-align: left;">Referencia de las calles y/o Vialidades principales del domicilio:</label><input type="text" name="ref" id="ref" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 810px; height: 30px; background-color: #fb08328c;"><br><br>  
    </div>
    <div class="col-md-12" hidden="">
      <center>
        <label style="font-size: small; text-align: center;">Descripci&oacute;n de los servicios o Actividades que realiza:</label><br>
      </center>
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">PAG&Eacute; OPORTUNAMENTE EL IMPUESTO PREDIAL DEL INMUEBLE AL QUE CORRESPONDE LA CLAVE CATASTRAL.</p></div>
       <div class="col-md-2" style="background-color: #fb08328c;">
         <label>SI&nbsp;</label><input type="radio" name="impuesto" id="gender1" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="impuesto" id="gender2" value="FALSE">
       </div>
     </div>
     <div class="col-md-12" hidden="">
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">NO SE REALIZAR&Oacute;N MEJORAS, AMPLIACIONES O CONSTRUCCIONES QUE AUMENTEN EL VALOR CATASTRAL DEL INMUEBLE.</p></div>
       <div class="col-md-2" style="background-color: #fb08328c;">
          <label>SI&nbsp;</label><input type="radio" name="gender2" id="gender2S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender2" id="gender2N" value="FALSE">
       </div>
     </div>
     <div class="col-md-12" hidden="">
       <div class="col-md-9"><p style="font-size: xx-small; text-align: justify; font-weight: bold;">SE EST&Aacute;N REPORTANDO TODAS LAS CLAVES CATASTRALES PROPIEDAD DEL CONTRIBUYENTE QUE EST&Aacute;N SUJETAS A DICTAMEN PREDIAL.</p></div>
       <div class="col-md-2" style="background-color: #fb08328c;">
          <label>SI&nbsp;</label><input type="radio" name="gender3" id="gender3S" value="TRUE">
         <label>&nbsp;&nbsp;&nbsp;&nbsp;NO</label><input type="radio" name="gender3" id="gender3N" value="FALSE">
       </div>
     </div>
     <div class="col-md-12">
      <center>
        
       <label style="width: 150px; font-size: small; text-align: left;">Año a Dictaminar:</label><input type="text" onkeyup="validarAnio()" onblur="validarAnio()" name="anio" id="anio" maxlength="4" style="border-bottom: 1px solid #888; border-top: 0; border-right: 0; border-left: 0; width: 260px; height: 30px;" readonly=""><br><br>
    

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