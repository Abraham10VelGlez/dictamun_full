<?php include '../web/validateM.php'; 

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;

$ruta = explode("/", $url);
$to=count($ruta); 
 
$folioCompleto=str_pad($ruta[$to-1], 5, "0", STR_PAD_LEFT);
$id_di=$ruta[$to-1]; 
$an = explode("?", $id_di);
  $an2 = $an[0];// año a dictaminar
// echo "<br>";
 $cla = $an[1]; //clave catastral
?> 

    <!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php include '../const.php'; ?> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app6.js"></script> 

 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 768px)" href="<?php echo SERVERURL; ?>_js/estilos.css">  <!--surface  duo -->
  <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1023px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
  <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
  <!-- <link rel="stylesheet" media="only screen and (min-width: 1367px) and (max-width: 1919px)" href="<?php //echo SERVERURL; ?>_js/estilos.css"> --> 
  <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style type="text/css">
@import url("https://fonts.googleapis.com/css?family=Karla|Space+Mono");

:root {
  --contentHeight: 30vh;
  --sectionWidth: 700px;
}

* {
  outline: 0;
  box-sizing: border-box;
}


section {
  /*max-width: var(--sectionWidth);*/
  margin: 40px auto;
  width: 97%;
  color: #000;
}

summary {
  display: block;
  cursor: pointer;
  padding: 10px;
  font-family: "Space Mono", monospace;
  font-size: 22px;
  transition: .3s;
  border-bottom: 2px solid;
  user-select: none;
}

details > div {
  display: flex;
  flex-wrap: wrap;
  overflow: auto;
  height: 100%;
  user-select: none;
  padding: 0 20px;
  font-family: "Karla", sans-serif;
  line-height: 1.5;
}

details > div > img {
  align-self: flex-start;
  max-width: 100%;
  margin-top: 20px;
}

details > div > p {
  flex: 1;
}

details[open] > summary {
   color: #396d4e;
}

@media (min-width: 768px) {
  details[open] > div > p {
    opacity: 0;
    animation-name: showContent;
    animation-duration: 0.6s;
    animation-delay: 0.2s;
    animation-fill-mode: forwards;
    margin: 0;
    padding-left: 20px;
  }

  details[open] > div {
    animation-name: slideDown;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }

  details[open] > div > img {
    opacity: 0;
    height: 100%;
    margin: 0;
    animation-name: showImage;
    animation-duration: 0.3s;
    animation-delay: 0.15s;
    animation-fill-mode: forwards;
  }
}

@keyframes slideDown {
  from {
    opacity: 0;
    height: 0;
    padding: 0;
  }

  to {
    opacity: 1;
    height: var(--contentHeight);
    padding: 20px;
  }
}

@keyframes showImage {
  from {
    opacity: 0;
    clip-path: inset(50% 0 50% 0);
    transform: scale(0.4);
  }

  to {
    opacity: 1;
    clip-path: inset(0 0 0 0);
  }
}

@keyframes showContent {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

  </style>

<style>
.accordion {
  background-color: #eee;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #CEF6CE; 
}

.panel {
  padding: 0 100px;
  display: none;
  background-color: white;
  
}
</style>


  </head>

  <body>
    <input type="hidden" id="idG" name="idG" value="<?php echo $cla;  ?>" />
    <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $an2;  ?>" />  
    <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" id="banner">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br> 
    </div></center>  
  
  <div class="col-md-12">
    <div class="col-md-12">
      <div class="col-md-12">
    <div class="col-md-1"></div>   
    <div class="col-md-10">
  
<nav class="navbar navbar-inverse" style="background-color: #606A5D; margin-left: -22px; margin-right: -22px; height: 55px; border-color: #606A5D">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: white;"><img src="<?php echo SERVERURL; ?>_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a> 
    </div>
    <ul class="nav navbar-nav"> 
      <li><p style="color: #E6EAE7; font-weight: bold; margin-top: 15px; font-size: large;">DICTAMUN</p></li> 
    </ul> 
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../InicioM/" style="font-size: medium;">Inicio</a></li>    
      <li><p style="margin-top: 6px; margin-right: 15px; color: #E6EAE7;"><?php echo utf8_decode($_SESSION['usuarioactual']); ?> &nbsp; &nbsp;  
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesi&oacute;n" id="killer"></i>   
        <input type="hidden" id="kernel" name="kernel" value="<?php echo $cla; ?>" /> 

      </p></li>  
    </ul>
  </div>
</nav>
</div> 

<div class="col-md-1"></div>
</div>
</div>
</div>
<br><br>
  <div class="col-md-12"> 
     <div class="col-md-12"> 
       <div class="col-md-12">  

  <div class="row">  
     <div class="col-md-12"> 
    <div class="col-md-1"></div> 
  <div class="col-md-10" style="background-color: #D3D9D1; height: auto;"><br><br> 
    <div class="col-md-12" style="text-align: center;">
      <input type="text" name="idInmu" id="idInmu" value="<?php echo $cla; ?>" hidden="">
      <input type="text" name="idCompl" id="idCompl" value="<?php echo $folioCompleto; ?>" hidden="">
    </div>
<div class="col-md-12" style="text-align: left; font-weight: bold;"><br><h4>Revisi&oacute;n de Dictamen.</h4>
     <div id="cct">
       <input type="text" name="cc" id="cc" value="" style="display: none;"> 
     </div>
     <button class="accordion">AVISO</button>
<div class="panel">
  <div>
      <table id="seguimientoT" class="table table-striped" style="display: block;">
        
    <thead> 
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;"><input type="text" name="folioI" id="folioI" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Año a Dictaminar:</td>
        <td><input type="text" name="anioD" id="anioD" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Nombre del Contribuyente:</td>
        <td><input type="text" name="contri" id="contri" style="border: 0; background-color: transparent; width: 250px;"></td>
      </tr>
      <tr>
        <td>RFC del Contribuyente:</td>
        <td><input type="text" name="rfcC" id="rfcC" style="border: 0; background-color: transparent;"></td>
      </tr> 
      <tr>
        <td>Clave Catastral:</td>
        <td><input type="text" name="clave" id="clave" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Valor Catastral:</td>
        <td>$<input type="text" name="valor" id="valor" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center;">Domicilio del Inmueble</td>
      </tr>
      <tr>
        <td>Calle:</td>
        <td><input type="text" name="calle" id="calle" style="border: 0; background-color: transparent; width: 500px;"></td>
      </tr>
      <tr>
        <td>No. Exterior:</td>
        <td><input type="text" name="noE" id="noE" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>No. Interior:</td>
        <td><input type="text" name="noI" id="noI" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Colonia:</td>
        <td><input type="text" name="colonia" id="colonia" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Municipio:</td>
        <td><input type="text" name="municipio" id="municipio" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>C.P:</td>
        <td><input type="text" name="cp" id="cp" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Referencias:</td>
        <td><input type="text" name="referencia" id="referencia" style="border: 0; background-color: transparent; width: 500px;"></td>
      </tr>
    </tbody>
  </table>

    </div>
</div>

<button class="accordion">DICTAMEN</button>
<div class="panel">
   <div>
      <table id="dictamenT" class="table table-striped" style="display: block;">
          
    <thead> 
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;"><input type="text" name="noFolio" id="noFolio" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Nombre del Dictaminador:</td>
        <td><input type="text" name="dictaminador" id="dictaminador" style="border: 0; background-color: transparent; width: 350px;"></td>
      </tr>
      <tr>
        <td>RFC del Dictaminador:</td>
        <td><input type="text" name="rfcD" id="rfcD" style="border: 0; background-color: transparent;"></td>
      </tr> 
      <tr>
        <td>Número de Registro del Dictaminador:</td>
        <td><input type="text" name="noReg" id="noReg" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Fecha y hora de envio del Dictamen:</td>
        <td><input type="text" name="fechaEnvio" id="fechaEnvio" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Tipo de Dictamen:</td>
        <td><input type="text" name="tipoD" id="tipoD" style="border: 0; background-color: transparent;"></td>
      </tr>
      <tr>
        <td>Estatus del Dictamen:</td>
        <td><input type="text" name="estatus" id="estatus" style="border: 0; background-color: transparent;"></td>
      </tr> 
    </tbody>
  </table>

    </div>
</div>

<button class="accordion">ARCHIVOS RECIBIDOS</button>
<div class="panel">
<div>
    <table id="archivosRecT" class="table table-striped" style="display: block;">
          
    <thead> 
      <tr>
        <th style="text-align: center;">Descripción</th>
        <th style="text-align: center;">Nombre del Archivo</th>
        <th style="text-align: center;">Comentario</th>
        <th style="text-align: center;">Descargar</th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 300px;">Archivo DICTAVAL.</td>
        <td><input type="text" name="dictaval" id="dictaval" style="border: 0; background-color: transparent; width: 200px;"></td>
         <td><input type="text" name="comenDictaval" id="comenDictaval" style="border: 0; background-color: transparent;"></td>
        <td id="descargaDictaval" style="text-align: center;"></td>
     
      </tr>
      <tr>
        <td>Archivo de Construcción.</td>
        <td><input type="text" name="construccion" id="construccion" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenConstru" id="comenConstru" style="border: 0; background-color: transparent;"></td>
        <td id="descargaConstruc" style="text-align: center;"></td>
  
      </tr>
      <tr>
        <td>Formato del avalúo.</td>
        <td><input type="text" name="avaluoFirmado" id="avaluoFirmado" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenAvaluoFirmado" id="comenAvaluoFirmado" style="border: 0; background-color: transparent;"></td>
         <td id="descargAvaluoFirmado" style="text-align: center;"></td>
      
      </tr> 
      <tr>
        <td>Escritura pública o Título de propiedad.</td>
        <td><input type="text" name="escrituratituloPropiedad" id="escrituratituloPropiedad" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenescrituratituloPropiedad" id="comenescrituratituloPropiedad" style="border: 0; background-color: transparent;"></td>
         <td id="descargaescrituratituloPropiedad" style="text-align: center;"></td>
       
      </tr>
      <tr>
        <td>Boleta Predial.</td>
        <td><input type="text" name="boletaPredial" id="boletaPredial" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comentPredial" id="comentPredial" style="border: 0; background-color: transparent;"></td>
        <td id="descargarBoletaP" style="text-align: center;"></td>

      </tr>
      <tr>
        <td>Documento que acredite la propiedad.</td>
        <td><input type="text" name="tituloPropiedad" id="tituloPropiedad" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenPropiedad" id="comenPropiedad" style="border: 0; background-color: transparent;"></td>
         <td id="descargaTitulo" style="text-align: center;"></td>
    
      </tr>
       <tr>
        <td>Identificación Oficial del propietario o representante legal  </td>
        <td><input type="text" name="identificacionOf" id="identificacionOf" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenidentificacionOf" id="comenidentificacionOf" style="border: 0; background-color: transparent;"></td>
         <td id="descargaidentificacionOf" style="text-align: center;"></td>
    
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
       <td><input type="text" name="croquis" id="croquis" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenCroquis" id="comenCroquis" style="border: 0; background-color: transparent;"></td>
         <td id="descargaCroquis" style="text-align: center;"></td>
 
      </tr>
      <tr>
        <td>Croquis de Localización.</td>
       <td><input type="text" name="croquisLocalizacion" id="croquisLocalizacion" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comencroquisLocalizacion" id="comencroquisLocalizacion" style="border: 0; background-color: transparent;"></td>
         <td id="descargacroquisLocalizacion" style="text-align: center;"></td>
  
      </tr>
      
      <tr>
        <td>Plano arquitectónico o croquis de construcción.</td>
        <td><input type="text" name="planos" id="planos" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comentplanos" id="comentplanos" style="border: 0; background-color: transparent;"></td>
        <td id="descargarPlanos" style="text-align: center;"></td>

      </tr> 
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>
        <td><input type="text" name="edificacionesUsoPriv" id="edificacionesUsoPriv" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenedificacionesUsoPriv" id="comenedificacionesUsoPriv" style="border: 0; background-color: transparent;"></td>
        <td id="descargaredificacionesUsoPriv" style="text-align: center;"></td>
     
      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas.</td>
        <td><input type="text" name="superficiesConstr" id="superficiesConstr" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comensuperficiesConstr" id="comensuperficiesConstr" style="border: 0; background-color: transparent;"></td>
        <td id="descargarsuperficiesConstr" style="text-align: center;"></td>
    
      </tr>
      <tr>
        <td>Planos de Factores.</td>
        <td><input type="text" name="factores" id="factores" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenfactores" id="comenfactores" style="border: 0; background-color: transparent;"></td>
        <td id="descargarfactores" style="text-align: center;"></td>
   
      </tr> 
      <tr>
        <td>Relación de indivisos de Condominios.</td>
        <td><input type="text" name="indivisosC" id="indivisosC" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comenIndivisosC" id="comenIndivisosC" style="border: 0; background-color: transparent;"></td>
        <td id="descargarIndivisosC" style="text-align: center;"></td>
       
      </tr> 
      <tr id="acta" style="">
        <td>Acta Constitutiva</td>
        <td><input type="text" name="actaC" id="actaC" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comentactaC" id="comentactaC" style="border: 0; background-color: transparent;"></td>
        <td id="descargarActaC" style="text-align: center;"></td>
  
      </tr> 
      <tr>
        <td>Otros.</td>
        <td><input type="text" name="otros" id="otros" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comentariOtros" id="comentariOtros" style="border: 0; background-color: transparent;"></td>
        <td id="descargaOtros" style="text-align: center;"></td>
      </tr>  
      <tr>
        <div id="fachada">
        <td id="titFachada">Imagen de Fachada</td>
        <td><input type="text" name="fachadaNom" id="fachadaNom" style="border: 0; background-color: transparent;"></td>
         <td><input type="text" name="comentarioFachada" id="comentarioFachada" style="border: 0; background-color: transparent;"></td>
        <td id="descargarFachada" style="text-align: center;"></td>
        <td id="observacionFachada"></td>
        </div>
      </tr>
    </tbody>
  </table>    
    </div>
    <center>
     <!-- <button class="btn btn-success" onclick="save_rev();">Guardar</button> -->
      <br><br>
    </center>
</div>
<div id="tipologiasTT">
<button class="accordion">REPORTE FOTOGRAFICO COMPLETO</button>
<div class="panel">
  <div>
    <br>
    <table>
      <thead></thead>
      <tbody>
       <!-- <tr>
        <th style="text-align: left; width: 400px;">Comentario</th>
        <th style="text-align: center;"><textarea style="width: 650px; height: 100px;" id="comentarioGReporte"></textarea></th>
      </tr> -->
      <tr>
        <th style="text-align: center; width: 500px;">No. Archivos Fotográficos</th>
        <th><input type="text" name="totalTipologias" id="totalTipologias" style="border: 0; background-color: transparent;"></th>
      </tr>
      </tbody>
    </table>
    <br><br>
      <table id="RepFotComplT" class="table table-striped" style="display: block;">
          
    <thead> 
       <tr>
        <th style="text-align: center; display: none;">Tipología</th>
        <th style="text-align: center; width: 100px;">Tipología</th>
        <th style="text-align: center; width: 400px;">Nombre del Archivo</th>
        <th style="text-align: center; width: 400px;">Comentarios</th>
        <th style="text-align: center; width: 150px;">Descargar</th>
      </tr>
    </thead>
    <tbody id="tipologiass">
       
    </tbody>
  </table>
    </div>
    <center>
     <!-- <input type="button" name="tipologias" class="btn btn-success" value="Guardar" onclick="elitips();"> -->
    </center>
</div>
</div>
<button class="accordion">PREDIO</button>
<div class="panel">
  
 <div>
      <table id="predioT" class="table table-striped" style="display: block;">
          
    <thead>  
      <tr>
        <th style="text-align: left;"></th>
        <th style="text-align: left;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style=" width: 250px;">Folio de presentación:</td>
        <td><input type="text" name="folioPresenta" id="folioPresenta" style="border: 0; background-color: transparent;"></td> 
      </tr>
      <tr>
        <td>Tipo de Inmueble:</td>
        <td><input type="text" name="tipoInmueble" id="tipoInmueble" style="border: 0; background-color: transparent; width: 600px;"></td>
      </tr>
      <tr>
        <td>Ubicación:</td>
        <td><input type="text" name="ubicacion2" id="ubicacion2" style="border: 0; background-color: transparent;"></td> 
      </tr> 
      <tr>
        <td>Clave Catastral:</td>
        <td><input type="text" name="claveCa2" id="claveCa2" style="border: 0; background-color: transparent; width: 600px;"></td> 

      </tr>
      <tr>
        <td>Propietario:</td>
        <td><input type="text" name="propietario" id="propietario" style="border: 0; background-color: transparent; width: 600px;"></td> 

      </tr>
      <tr>
        <td>Superficie de terreno:</td>
        <td><input type="text" name="supTerreno" id="supTerreno" style="border: 0; background-color: transparent;"></td> 

      </tr> 
      <tr>
        <td>Valor del Terreno propio:</td>
       <td>$<input type="text" name="valorP" id="valorP" style="border: 0; background-color: transparent;"></td> 

      </tr>
      <tr>
        <td>Valor del Terreno Común:</td>
       <td>$<input type="text" name="valorC" id="valorC" style="border: 0; background-color: transparent;"></td> 

      </tr>
      <tr>
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped" style="display: block;">
    <thead>
      
    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor del terreno</td>
      </tr>
       <tr>
        <th colspan="4" style="text-align: left;">Datos del Predio</th>
        <th colspan="4" style="text-align: left;">Factor</th>
       
      </tr>
      <tr>
        <td>Frente:</td>
        <td><input type="text" name="frente" id="frente" style="border: 0; background-color: transparent;"></td> 
        <td><input type="text" name="p" id="p" style="background-color: transparent; border: 0"></td>
        <td>Frente:</td>
        <td><input type="text" name="factorfrente" id="factorfrente" style="border: 0; background-color: transparent;"></td>  
        <td></td>
      </tr>
       <tr>
        <td>Fondo:</td>
        <td><input type="text" name="fondo" id="fondo" style="border: 0; background-color: transparent;"></td>
         <td colspan="1"></td> 
         <td>Fondo:</td>
        <td><input type="text" name="factorfondo" id="factorfondo" style="border: 0; background-color: transparent;"></td> 
        <td></td> 
      </tr>
       <tr>
        <td>&Aacute;rea Inscrita:</td>
        <td><input type="text" name="areaInscrita" id="areaInscrita" style="border: 0; background-color: transparent;"></td>
         <td colspan="1"></td>
        <td>Irregularidad:</td>
        <td><input type="text" name="factorirregularidad" id="factorirregularidad" style="border: 0; background-color: transparent;"></td> 
        <td></td>
      </tr>
      <tr>
        <td>&Aacute;rea Total:</td>
        <td><input type="text" name="areaTotal" id="areaTotal" style="border: 0; background-color: transparent;"></td>
        <td colspan="1"></td>
        <td>&Aacute;rea:</td>
        <td><input type="text" name="factorarea" id="factorarea" style="border: 0; background-color: transparent;"></td> 
        <td></td>
      </tr>
       <tr>
        <td>Altura:</td>
        <td><input type="text" name="altura" id="altura" style="border: 0; background-color: transparent;"></td>
         <td colspan="1"></td>
        <td>Topografia:</td>
        <td><input type="text" name="factortopografia" id="factortopografia" style="border: 0; background-color: transparent;"></td> 
        <td></td>
      </tr>
       <tr>
        <td>Posición del Predio:</td>
        <td><input type="text" name="posicion" id="posicion" style="border: 0; background-color: transparent;"></td>
         <td colspan="1"></td>
        <td>Posición:</td>
        <td><input type="text" name="factorposicion" id="factorposicion" style="border: 0; background-color: transparent;" value="-"></td> 
        <td></td>
      </tr>
      <tr>
        <td>&Aacute;rea Aprovechable:</td>
        <td><input type="text" name="aprovechable" id="aprovechable" style="border: 0; background-color: transparent;"></td>
         <td colspan="1"></td>
        <td>Restricción:</td>
        <td><input type="text" name="factorrestriccion" id="factorrestriccion" style="border: 0; background-color: transparent;"></td> 
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
         <td colspan="1"></td>
        <td>Factor Aplicado:</td>
        <td><input type="text" name="factorAplicado" id="factorAplicado" style="border: 0; background-color: transparent;"></td>
        <td></td>  
      </tr>
       <tr> 
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table id="tipologias" class="table table-striped" style="display: block;">
    <thead>
      
    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor de las Construcciones</td>
      </tr>
       <tr>
        <th style="text-align: center;">Tipología</th>
        <th style="text-align: center;">Tipo de Construcción</th>
        <th style="text-align: center;">Uso</th>
        <th style="text-align: center;">Clase</th>
        <th style="text-align: center;">Categoría</th>
        <th style="text-align: center;">Superficie</th>
        <th colspan="2" style="text-align: center;">Valor de las Construcciones</th>
      </tr>
     </tbody>
   </table>
   <table id="tipologias2" class="table table-striped" style="display: block;">
    <thead>
      
    </thead>
    <tbody>
       <tr> 
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;"></td>
      </tr>
       <tr>
        <th style="text-align: center;">Tipología</th>
        <th style="text-align: center;">Edad</th>
        <th style="text-align: center;">Factor de Edad</th>
        <th style="text-align: center;">Conservación</th>
        <th style="text-align: center;">Factor de Conservación</th>
        <th style="text-align: center;">Niveles</th>
        <th style="text-align: center;">Factor de Niveles</th>
        <th style="text-align: center;">Factor Aplicado</th>
      </tr>
     
       <tr> 
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped" style="display: block;">
    <thead>
      
    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Totales</td>
      </tr>
      <tr>
        <td style="width: 400px;">Valor del Terreno</td> 
        <td>$<input type="text" name="valorTerreno" id="valorTerreno" style="border: 0; background-color: transparent;"></td>
        <td colspan="6"><input type="text" name="pp" id="pp" style="background-color: transparent; border: 0"></td>  
      </tr> 
      <tr>
        <td>Valor de las Construcciones Privadas</td>
        <td>$<input type="text" name="privada" id="privada" style="border: 0; background-color: transparent;"></td>
        <td colspan="6"></td> 
      </tr> 
      <tr>
        <td>Valor de las Construcciones Comunes</td>
        <td>$0<input type="text" name="comun" id="comun" style="border: 0; background-color: transparent;"></td> 
        <td colspan="6"></td>  
      </tr> 
      <tr>
        <td>Valor de las Instalaciones especiales</td>
        <td>$<input type="text" name="especial" id="especial" style="border: 0; background-color: transparent;"></td>  
        <td colspan="6"></td> 
      </tr> 
      <tr>
        <td>Valor Total</td>
        <td>$<input type="text" name="valorTT" id="valorTT" style="border: 0; background-color: transparent;"></td> 
        <td colspan="6"></td>  
      </tr>
      <tr>
        <td>Valor Total en números Redondos</td>
        <td>$<input type="text" name="redondeado" id="redondeado" style="border: 0; background-color: transparent;"></td> 
        <td colspan="6"></td>  
      </tr>  
    </tbody>
  </table>
    </div>
</div>
<button class="accordion">OBSERVACIONES MUNICIPIO</button>
<div class="panel">
  <div class="col-md-12" name="observacion" id="observacion">
    <div class="col-md-1"></div>
    <div class="col-md-10" id="ol">
       <center>
      <h3 style="text-align: center;">Ingresar Observaciones</h3>
      <textarea placeholder="Ingresar Observaciones" id="ObservacionMun" name="ObservacionMun" style="width: 600px; height: 100px;">
        
      </textarea><br><br>
        <button type="button" class="btn" id="" name=""  style="background-color: #5BA081; color: white;" onclick="obsMunicipio();">Registrar</button>
      <br><br><br><br>
      <br><br>
    </center> 
    </div>
    <div class="col-md-1"></div>
  </div>
  </div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
  <div id="id01" class="modal" style="display: none;">
    
  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
      <img src="<?php echo SERVERURL; ?>_img/document.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">      
        <label>Observaciones registradas correctamente.<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-success" name="" id="" value="Ok" onclick="document.getElementById('id01').style.display='none'" style="width: 150px;">
        </center>
      <p class="help-block"></p>
      </div> 
     <div class="upload-msg"></div>   
    </div> 
  </center> 
  </form>

</div>
<div id="id02" class="modal" style="display: none;">
    
  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
     
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">      
        <label>Intente de nuevo, ha ocurrido un error.<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-success" name="" id="" value="Ok" onclick="document.getElementById('id02').style.display='none'" style="width: 150px;">
        </center>
      <p class="help-block"></p>
      </div> 
     <div class="upload-msg"></div>   
    </div> 
  </center> 
  </form>

</div>

    <table id="inmueblesR" name="inmueblesR" class="table table-striped table-bordered xa" style="display: none;">
        <tr>
          <th style="text-align: center;">Inmuebles</th>
          <th style="text-align: center;">Clave catastral</th>
          <th style="text-align: center;">Valor catastral</th>
          <th style="text-align: center;">Año a dictaminar</th>
        </tr>
    </table>
  
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

  </div>  
  <div class="col-md-1"></div> 
  </div> 
 </div>
 </div>
</div>
</div>

  </body>

  <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div> 
     <div class="col-md-12" style="height: 50px;">
       <div class="col-sm-2" style=""></div>
       <div class="col-sm-4" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versión <?php echo versionx;?></p>
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