<?php include '../web/validateR.php'; 

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;

$ruta = explode("/", $url);
$to=count($ruta); 

$folioCompleto=str_pad($ruta[$to-4], 5, "0", STR_PAD_LEFT);

$id_di=$ruta[$to-1];
$an = explode("?", $id_di);
  $folioo = $ruta[$to - 4];
  $cla = $ruta[$to - 3]; //clave catastral
  $an2 = $ruta[$to - 2];// año a dictaminar  SegDictamen/2017?1100000000000000
  $tipoPersona = $ruta[$to - 1];

?> 
    <!doctype html>
<html ng-app="todoApp">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>DICTAMUN 2021</title>
    <?php include '../const.php'; ?> 
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>images/favicon.png">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>

    <link href="<?php echo jsdict; ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>assets/css/lib/themify-icons.css" rel="stylesheet">

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app3_muniRev.js"></script>

  <style type="text/css">
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
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
  height: 300px;
}
  </style> 
</head>

  <body>
<input type="hidden" name="cc" id="cc" value="<?php echo $folioCompleto; ?>">
    <input type="hidden" id="idG" name="idG" value="<?php echo $cla;  ?>" /> 
    <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $an2;  ?>" />
<input type="hidden" id="kernel" name="kernel" value="<?php echo $cla; ?>" />
<input type="hidden" name="idInmu" id="idInmu" value="<?php echo $cla; ?>"  value="">
   <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper"> 
      <div class="nav-header">
            <a href="index.html" class="brand-logo">
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

              <div style="color: black;" class="col-xl-3">Folio del Dictamen:<br><div id="foldicview"></div><br></div>
               <div class="col-xl-5"><br><br><br><br>
               <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa').style.display='none'"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus"></h6>
                                                    <p class="mb-2" id="alertaStatusMotivo"></p>
                                                   
                                                </div>
                                            </div>
                                        </div>


                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa2">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa2').style.display='none'" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus2"></h6>
                                                    <p class="mb-2" id="alertaStatusMotivo2"></p>
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa3">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa3').style.display='none'" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus3">Observaciones guardadas correctamente</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo3">Puede continuar con la revisión del dictamen</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                      </div>




               <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                    <div class="pulse-css"></div>
                                </a>
                               
                            </li>
                                 <li class="nav-item dropdown header-profile" style="color: black;">
                            REVISOR DE IGECEM:   <?php echo $_SESSION['usuarioactual']; ?>
                               
                            </li>
                           
                           
                        </ul>
            </div>
            </nav>
        </div>
        </div>
      <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first" > <h3 style="color:#ffffff;">DICTAMUN</h3> </li>
                    

                    <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>
                        
                    </li>                                                            
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                           <li><a href="../../../../SeguimientoRevisor/1">Pendientes</a></li>
                           <li><a href="../../../../SeguimientoRevisorPre/1">Con archivo en hojas verdes</a></li>
                           <li><a href="../../../../observadosPorMunicipioRevisores/1">Observados por el municipio</a></li> 
                             
                        </ul>
                    </li>
                     <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>
                        
                    </li>
                   <!-- <li><a class="has-arrow" href="../dictamenesPreautorizados/" aria-expanded="false"><i class="icon ti-search"></i><span class="nav-text">Dictamenes Pre autorizados</span></a>
                    </li> --> 
                </ul>
            </div>
        </div> 
           <div class="content-body">
            <!-- row -->
             <div class="col-md-12" style="text-align: center;">
      <input type="hidden" name="idInmu" id="idInmu" value="<?php echo $cla[$to-1]; ?>"  value="">
      <input type="hidden" name="idCompl" id="idCompl" value="<?php echo $folioCompleto; ?>"  value="">
       <input type="hidden" name="cfol" id="cfol" value="">
    </div>
            <div class="container-fluid">
                
                <div class="col-lg-12 col-sm-12">
                     <section id="main-content">
                  
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="">
                                        <div class="w3-container"><br>
      <div class="col-md-12"><br>
      <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Revisi&oacute;n de dictamen.</h4>
                                <input type="hidden" name="cc" id="cc" value=""> 
                                <center>
                                  <h4>Comentario del municipio</h4>
                                    <textarea id="comentarioMunicipioRevisor" style="width: 500px;" readonly=""></textarea>
                                </center>
                              
                            </div>
                            <div class="card-body">
                                <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                    <div class="accordion__item">
                                        <div class="accordion__header accordion__header--primary" style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseOne">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">AVISO</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseOne" class="collapse show" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                               
                                                 <table id="seguimientoT" class="table table-striped" style="display: block; color: black;">
        
    <thead> 
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;"><input type="text" name="folioI" id="folioI" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Año a Dictaminar:</td>
        <td><input type="text" name="anioD" id="anioD" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Nombre del Contribuyente:</td>
        <td><input type="text" name="contri" id="contri" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>RFC del Contribuyente:</td>
        <td><input type="text" name="rfcC" id="rfcC" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr> 
      <tr>
        <td>Clave Catastral:</td>
        <td><input type="text" name="clave" id="clave" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Valor Catastral:</td>
        <td>$<input type="text" name="valor" id="valor" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Domicilio del Inmueble</td>
        <td></td>
      </tr>
      <tr>
        <td>Calle:</td>
        <td><input type="text" name="calle" id="calle" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>No. Exterior:</td>
        <td><input type="text" name="noE" id="noE" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>No. Interior:</td>
        <td><input type="text" name="noI" id="noI" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Colonia:</td>
        <td><input type="text" name="colonia" id="colonia" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Municipio:</td>
        <td><input type="text" name="municipio" id="municipio" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>C.P:</td>
        <td><input type="text" name="cp" id="cp" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Referencias:</td>
        <td><input type="text" name="referencia" id="referencia" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
    </tbody>
  </table>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseTwo">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">DICTAMEN</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseTwo" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                              <table id="dictamenT" class="table table-striped" style="display: block; color: black;">
          
    <thead> 
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;"><input type="text" name="noFolio" id="noFolio" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Nombre del Dictaminador:</td>
        <td><input type="text" name="dictaminador" id="dictaminador" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>RFC del Dictaminador:</td>
        <td><input type="text" name="rfcD" id="rfcD" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr> 
      <tr>
        <td>Número de Registro del Dictaminador:</td>
        <td><input type="text" name="noReg" id="noReg" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
    
      <tr>
        <td>Tipo de Dictamen:</td>
        <td><input type="text" name="tipoD" id="tipoD" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr>
      <tr>
        <td>Estatus del Dictamen:</td>
        <td><input type="text" name="estatus" id="estatus" style="border: 0; background-color: transparent;" readonly=""></td>
      </tr> 
    </tbody>
  </table>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__item" id="archivosRecibidosT">
                                        <div class="accordion__header collapsed accordion__header--success"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseThree">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">ARCHIVOS RECIBIDOS</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseThree" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                               <table id="archivosRecT" class="table table-striped" style="display: block; width: 98%; color: black;">
          
    <thead> 
      <tr>
        <th style="text-align: center; width: 300px;">Descripción</th>
        <th style="text-align: center;width: 600px;">Nombre del Archivo</th>
        <th style="text-align: center;">Comentario</th>
        <th style="text-align: center;">Descargar</th>
        <th style="text-align: center;">Observar</th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 300px;">Archivo DICTAVAL.</td>
        <td><input type="text" name="dictaval" id="dictaval" style="border: 0; background-color: transparent; width: 200px;" readonly=""></td>
         <td><input type="text" name="comenDictaval" id="comenDictaval" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargaDictaval" style="text-align: center;">
          <!--<a href="<?php //echo cla; ?>">descarga</a>-->
        </td>
        <td id="comentarioDicta2"></td>
      </tr>
      <tr>
        <td>Archivo de Construcción.</td>
        <td><input type="text" name="construccion" id="construccion" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenConstru" id="comenConstru" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargaConstruc" style="text-align: center;"></td>
        <td id="comentarioConstruc2"></td>
      </tr>
      <tr>
        <td>Formato del avalúo.</td>
        <td><input type="text" name="avaluoFirmado" id="avaluoFirmado" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenAvaluoFirmado" id="comenAvaluoFirmado" style="border: 0; background-color: transparent;" readonly=""></td>
         <td id="descargAvaluoFirmado" style="text-align: center;"></td>
         <td id="comentarioAvaluoFirmado2"></td>
      </tr> 
      <tr id="documentotofisico">
        <td>Escritura pública o Título de propiedad.</td>
        <td><input type="text" name="escrituratituloPropiedad" id="escrituratituloPropiedad" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenescrituratituloPropiedad" id="comenescrituratituloPropiedad" style="border: 0; background-color: transparent;" readonly=""></td>
         <td id="descargaescrituratituloPropiedad" style="text-align: center;"></td>
         <td id="comentarioescrituratituloPropiedad"></td>
      </tr>
      
      
      <tr>
        <td>Boleta Predial.</td>
        <td><input type="text" name="boletaPredial" id="boletaPredial" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comentPredial" id="comentPredial" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarBoletaP" style="text-align: center;"></td>
        <td id="comentarioPredial2"></td>
      </tr>
       <tr id="nombramientoM" style="">
        <td>Nombramiento del representante Legal</td>
        <td><input type="text" name="nombra" id="nombra" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comentaNombra" id="comentaNombra" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarNombra" style="text-align: center;"></td>
        <td id="comentarioNombra"></td>

      </tr> 
      <tr>
        <td>Documento que acredite la propiedad.</td>
        <td><input type="text" name="tituloPropiedad" id="tituloPropiedad" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenPropiedad" id="comenPropiedad" style="border: 0; background-color: transparent;" readonly=""></td>
         <td id="descargaTitulo" style="text-align: center;"></td>
         <td id="comentarioTitulo2"></td>
      </tr>
       <tr>
        <td>Identificación Oficial del propietario o representante legal  </td>
        <td><input type="text" name="identificacionOf" id="identificacionOf" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenidentificacionOf" id="comenidentificacionOf" style="border: 0; background-color: transparent;" readonly=""></td>
         <td id="descargaidentificacionOf" style="text-align: center;"></td>
         <td id="comentarioidentificacionOf"></td>
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
       <td><input type="text" name="croquis" id="croquis" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenCroquis" id="comenCroquis" style="border: 0; background-color: transparent;" readonly=""></td>
         <td id="descargaCroquis" style="text-align: center;"></td>
         <td id="comentarioCroquis2"></td>
      </tr>
      <tr>
        <td>Croquis de Localización.</td>
       <td><input type="text" name="croquisLocalizacion" id="croquisLocalizacion" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comencroquisLocalizacion" id="comencroquisLocalizacion" style="border: 0; background-color: transparent;" readonly=""></td>
         <td id="descargacroquisLocalizacion" style="text-align: center;"></td>
         <td id="comentariocroquisLocalizacion"></td>
      </tr>
      
      <tr>
        <td>Plano arquitectónico o croquis de construcción.</td>
        <td><input type="text" name="planos" id="planos" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comentplanos" id="comentplanos" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarPlanos" style="text-align: center;"></td>
        <td id="comentarioPlanos2"></td>
      </tr> 
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>
        <td><input type="text" name="edificacionesUsoPriv" id="edificacionesUsoPriv" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenedificacionesUsoPriv" id="comenedificacionesUsoPriv" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargaredificacionesUsoPriv" style="text-align: center;"></td>
        <td id="comentarioedificacionesUsoPriv"></td>
      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas.</td>
        <td><input type="text" name="superficiesConstr" id="superficiesConstr" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comensuperficiesConstr" id="comensuperficiesConstr" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarsuperficiesConstr" style="text-align: center;"></td>
        <td id="comentariosuperficiesConstr"></td>
      </tr>
      <tr>
        <td>Planos de Factores.</td>
        <td><input type="text" name="factores" id="factores" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenfactores" id="comenfactores" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarfactores" style="text-align: center;"></td>
        <td id="comentariofactores"></td>
      </tr> 
      <tr>
        <td>Relación de indivisos de Condominios.</td>
        <td><input type="text" name="indivisosC" id="indivisosC" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comenIndivisosC" id="comenIndivisosC" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarIndivisosC" style="text-align: center;"></td>
        <td id="comentarioIndivisosC2"></td>
      </tr> 
      <tr id="acta" style="">
        <td>Acta Constitutiva</td>
        <td><input type="text" name="actaC" id="actaC" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comentactaC" id="comentactaC" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarActaC" style="text-align: center;"></td>
        <td id="comentarioActa2"></td>

      </tr> 
      
      <tr>
        <td>Otros.</td>
        <td><input type="text" name="otros" id="otros" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comentariOtros" id="comentariOtros" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargaOtros" style="text-align: center;"></td>
        <td id="observacionOtros2"></td>
      </tr> 
       <tr>
        <div id="fachada">
        <td id="titFachada">Imagen de Fachada</td>
        <td><input type="text" name="fachadaNom" id="fachadaNom" style="border: 0; background-color: transparent;" readonly=""></td>
         <td><input type="text" name="comentarioFachada" id="comentarioFachada" style="border: 0; background-color: transparent;" readonly=""></td>
        <td id="descargarFachada" style="text-align: center;"></td>
        <td id="observacionFachada"></td>
        </div>
      </tr>
      
     
      
     <!-- <tr>
        <td>Comentario General.</td>
        <td colspan="3"><textarea style="width: 300px;" id="comentarioGeneral"></textarea></td>
      </tr> -->
    </tbody>
  </table> 
<div id="descargarHojasVerdes">
  
</div>
  <!--
  <center>
   <div class="col-md-2" style=""><br></div>
      <div id="activararchivoHV" class="col-md-5" style="">
        <input type="checkbox" id="hojasVerdes" name="hojasVerdes" value="2">
        <label style="color: black;">Subir en hojas verdes (Archivo PDF)</label><br>
      </div>

      <div class="col-md-1" style=""><br></div>
      <div class="col-md-2" style="">
        <br>
        <button class="btn btn-info" name="save_rev" id="save_rev" style="background-color: #414558; border-color: #414558; color: white;" onclick="save_rev();">Guardar observaciones</button>
      <br><br>
      </div>

      <div class="col-md-2" style=""><br></div>
  </center>  -->



                                            </div>
                                        </div>
                                    </div>
                                      <div class="accordion__item" id="tipologiasTT">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseFour">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">REPORTE FOTOGRAFICO COMPLETO</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseFour" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                               <table style="color: black; color: black;">
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
      <table id="RepFotComplT" class="table table-striped" style="display: block; color: black; text-align: center;">
          
    <thead> 
       <tr>
        <th style="text-align: center; width: 100px; display: none;">Tipología</th>
        <th style="text-align: center; width: 100px;">Tipología</th>
        <th style="text-align: center; width: 400px;">Nombre del Archivo</th>
        <th style="text-align: center; width: 400px;">Comentarios</th>
        <th style="text-align: center; width: 150px;">Descargar</th>
        <th style="text-align: center; width: 500px;">Observar</th> 
      </tr>
    </thead>
    <tbody id="tipologiass">
       
    </tbody>
  </table>
   <!--
    <center>
      <input type="button" name="tipologias" id="tipologias" class="btn" style="background-color: #414558; border-color: #414558; color: white;"  value="Guardar" onclick="elitips();">
    </center>  -->

                                            </div>
                                        </div>
                                    </div>
                                      <div class="accordion__item" id="prediosT">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapseFive">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">PREDIO</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseFive" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                              <table id="predioT" class="table table-striped" style="display: block; color: black;">
          
    <thead>  
      <tr>
        <th style="text-align: left;"></th>
        <th style="text-align: left;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 250px;">Folio de presentación:</td>
        <td><input type="text" name="folioPresenta" id="folioPresenta" style="border: 0; background-color: transparent;" readonly=""></td> 
      </tr>
      <tr>
        <td>Tipo de Inmueble:</td>
        <td><input type="text" name="tipoInmueble" id="tipoInmueble" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td>
      </tr>
      <tr>
        <td>Ubicación:</td>
        <td><input type="text" name="ubicacion2" id="ubicacion2" style="width: 950px; border: 0; background-color: transparent;" readonly=""></td> 

      </tr>
       <tr>
         <td></td>
        <td><input type="text" name="ubicacion3" id="ubicacion3" style="width: 950px; border: 0; background-color: transparent;" readonly=""></td> 
        
      </tr>
      <tr>
        <td>Clave Catastral:</td>
        <td><input type="text" name="claveCa2" id="claveCa2" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td> 

      </tr>
      <tr>
        <td>Propietario:</td>
        <td><input type="text" name="propietario" id="propietario" style="border: 0; background-color: transparent; width: 800px;" readonly=""></td> 

      </tr>
      <tr>
        <td>Superficie de terreno:</td>
        <td><input type="text" name="supTerreno" id="supTerreno" style="border: 0; background-color: transparent;" readonly=""></td> 

      </tr> 
      <tr>
        <td>Valor del Terreno propio:</td>
       <td><input type="text" name="valorP" id="valorP" style="border: 0; background-color: transparent;" readonly=""></td> 

      </tr>
      <tr>
        <td>Valor del Terreno Común:</td>
       <td><input type="text" name="valorC" id="valorC" style="border: 0; background-color: transparent;" readonly=""></td> 

      </tr>
      <tr>
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped" style="display: block; color: black;">
    <thead>
      
    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor del terreno</td>
      </tr>
       <tr>
        <th colspan="4" style="text-align: center;">Datos del Predio</th>
        <th colspan="4" style="text-align: center;">Factor</th>
      </tr>
      <tr>
        <td>Frente:</td>
        <td><input type="text" name="frente" id="frente" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td><input type="text" name="p" id="p" style="background-color: transparent; border: 0" readonly=""></td>
        <td>Frente:</td>
        <td><input type="text" name="factorfrente" id="factorfrente" style="border: 0; background-color: transparent;" readonly=""></td>  
        <td></td>
      </tr>
       <tr>
        <td>Fondo:</td>
        <td><input type="text" name="fondo" id="fondo" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td> 
         <td>Fondo:</td>
        <td><input type="text" name="factorfondo" id="factorfondo" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td></td> 
      </tr>
       <tr>
        <td>&Aacute;rea Inscrita:</td>
        <td><input type="text" name="areaInscrita" id="areaInscrita" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Irregularidad:</td>
        <td><input type="text" name="factorirregularidad" id="factorirregularidad" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td></td>
      </tr>
      <tr>
        <td>&Aacute;rea Total:</td>
        <td><input type="text" name="areaTotal" id="areaTotal" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>
        <td>&Aacute;rea:</td>
        <td><input type="text" name="factorarea" id="factorarea" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td></td>
      </tr>
       <tr>
        <td>Altura:</td>
        <td><input type="text" name="altura" id="altura" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Topografia:</td>
        <td><input type="text" name="factortopografia" id="factortopografia" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td></td>
      </tr>
       <tr>
        <td>Posición del Predio:</td>
        <td><input type="text" name="posicion" id="posicion" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Posición:</td>
        <td><input type="text" name="factorposicion" id="factorposicion" style="border: 0; background-color: transparent;" value="-" readonly=""></td> 
        <td></td>
      </tr>
      <tr>
        <td>&Aacute;rea Aprovechable:</td>
        <td><input type="text" name="aprovechable" id="aprovechable" style="border: 0; background-color: transparent;" readonly=""></td>
         <td></td>
        <td>Restricción:</td>
        <td><input type="text" name="factorrestriccion" id="factorrestriccion" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
         <td></td>
        <td>Factor Aplicado:</td>
        <td><input type="text" name="factorAplicado" id="factorAplicado" style="border: 0; background-color: transparent;" readonly=""></td>
        <td></td>  
      </tr>
       <tr> 
        <td colspan="8"></td>
      </tr>
    </tbody>
  </table>
  <table id="tipologiastblavg" class="table table-striped" style="display: block; color: black;">
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
   <table id="tipologias2" class="table table-striped" style="display: block; color: black;">
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
  <table class="table table-striped" style="display: block; color: black;">
    <thead>
      
    </thead>
    <tbody>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Totales</td>
      </tr>
      <tr>
        <td  style="width: 400px;">Valor del Terreno</td> 
        <td>$<input type="text" name="valorTerreno" id="valorTerreno" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"><input type="text" name="pp" id="pp" style="background-color: transparent; border: 0" readonly=""></td>   
      </tr> 
      <tr>
        <td>Valor de las Construcciones Privadas</td>
        <td>$<input type="text" name="privada" id="privada" style="border: 0; background-color: transparent;" readonly=""></td>
        <td colspan="6"></td> 
      </tr> 
      <tr>
        <td>Valor de las Construcciones Comunes</td>
        <td>$0<input type="text" name="comun" id="comun" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td colspan="6"></td>  
      </tr> 
      <tr>
        <td>Valor de las Instalaciones especiales</td>
        <td>$<input type="text" name="especial" id="especial" style="border: 0; background-color: transparent;" readonly=""></td>  
        <td colspan="6"></td> 
      </tr> 
      <tr>
        <td>Valor Total</td>
        <td>$<input type="text" name="valorTT" id="valorTT" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td colspan="6"></td>  
      </tr>
      <tr>
        <td>Valor Total en números Redondos</td>
        <td>$<input type="text" name="redondeado" id="redondeado" style="border: 0; background-color: transparent;" readonly=""></td> 
        <td colspan="6"></td>  
      </tr>  
    </tbody>
  </table>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="accordion__item" id="">
                                        <div class="accordion__header collapsed accordion__header--info"  style="background-color: #6d7393;" data-toggle="collapse" data-target="#header-bg_collapsesix">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">OBSERVACION GENERAL</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapsesix" class="collapse accordion__body" data-parent="#accordion-seven">
                                            <div class="accordion__body--text">
                                                <center>
      <h3 style="text-align: center;">Ingresar Observacion</h3>
      <textarea placeholder="Ingresar Observaciones" id="ObservacionPre" name="ObservacionPre" style="width: 600px; height: 100px; color: black;">

      </textarea><br><br>

  <div class="container-fluid">
  <div class="row">
    <div class="col-md-5" ></div>
    <div class="col-md-1" >
  <center>
    <button type="button" class="btn" id="preAurorizadoRevisor2" name="preAurorizadoRevisor2" style="background-color: #414558; border-color: #414558; color: white;" title="Opción desabilitada" disabled>PreAutorizar</button>  
      <button type="button" class="btn" id="preAurorizadoRevisor" name="preAurorizadoRevisor" style="background-color: #414558; border-color: #414558; color: white; display: none;" onclick="preAurorizadoRevisor()">PreAutorizar</button>  
  </center>
</div>
<div class="col-md-1" >
  <center>
  <button type="button" class="btn" id="preRechazo" name="preRechazo" style="background-color: #8b4c55; border-color: #8b4c55; color: white;" onclick="preRechazo()">Observado</button> 
  </center>
</div>
 <div class="col-md-5" ></div>
  </div>
</div>  
      <br><br><br><br>
      <br><br>
    </center>
                                            </div>
                                        </div>
                                    </div>  -->
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
                        <div class="col-lg-12">
                            <div class="footer">
                             
                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
          </div>

    </div>

  <div class="col-md-12"> 
    <div class="col-md-12"> 
      <div class="col-md-12"> 
  <div class="row">  
   
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
<!--
 <div id="id01" class="modal" style="display: none;">
  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
      <img src="<?php // echo SERVERURL; ?>_img/edit.PNG" alt="Avatar" class="avatar" style="width: 130px;">
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">      
        <label>Comentarios guardados<br>correctamente<br></label>
        <center>
     <input type="button" class="btn btn-success" name="preValidar2" id="preValidar2" value="Ok" onclick="document.getElementById('id01').style.display='none'" style="width: 150px; background-color: #414558; border-color: #414558; color: white;">
        </center>
      <p class="help-block"></p>
      </div> 
     <div class="upload-msg"></div>   
    </div> 
  </center> 
  </form>
</div>  -->

  <div class="modal fade" id="exampleModalpopover">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Archivo en hojas verdes</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="descripcionModal">
                                                    
                                                </div>
                                                <div class="modal-footer" id="bFolio">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<!--<div id="id02" class="modal" style="display: none;">
    
  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
      <img src="<?php echo SERVERURL; ?>_img/document.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">      
        <label style="color: black; font-size: large;">Dictamen pre autorizado.<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-success" name="preValidar" id="preValidar" value="Ok" onclick="prevalidado();" style="width: 150px; background-color: #414558; border-color: #414558; color: white;"> 
        </center>
      <p class="help-block"></p>
      </div> 
     <div class="upload-msg"></div>   
    </div> 
  </center> 
  </form>

</div>  -->
<!--<div id="id03" class="modal" style="display: none;">
    
  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
      <img src="<?php echo SERVERURL; ?>_img/document.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">      
        <label>Dictamen Pre Rechazado.<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-success" name="preRechazo" id="preRechazo" value="Ok" onclick="preRechazo2();" style="width: 150px; background-color: #414558; border-color: #414558; color: white;">
        </center>
      <p class="help-block"></p>
      </div> 
     <div class="upload-msg"></div>   
    </div> 
  </center> 
  </form>

</div>   -->

<!--<div id="activarcheck" class="modal" style="display: none;">
    
  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('activarcheck').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
      <img src="<?php echo SERVERURL; ?>_img/error.png" alt="Avatar" class="avatar" style="width: 120px;">
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">      
        <label style="color: black; font-weight: bold; font-size: large;">Activar la casilla "Subir en hojas verdes (Archivo PDF)".<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-info" name="preRechazo" id="preRechazo" value="Ok" onclick="document.getElementById('activarcheck').style.display='none'" style="width: 150px; background-color: #414558; border-color: #414558; color: white;">
        </center>
      <p class="help-block"></p>
      </div> 
     <div class="upload-msg"></div>   
    </div> 
  </center> 
  </form>
</div>  -->

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


    <script src="<?php echo jsdict; ?>js/dashboard/dashboard-1.js"></script>



     <script src="<?php echo jsdict; ?>assets/js/lib/jquery.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo jsdict; ?>assets/js/lib/menubar/sidebar.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->
    <script src="<?php echo jsdict; ?>assets/js/lib/bootstrap.min.js"></script><script src="<?php echo jsdict; ?>assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo jsdict; ?>assets/js/lib/data-table/datatables-init.js"></script>


     <script type="text/javascript">
   

    function voidclose(){
        //alert("asdasd");
      //location.href = "PadronDictaminadores";
      $.post("../../acceso",{acceess:102},function(z){
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