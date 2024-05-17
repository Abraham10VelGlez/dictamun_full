<?php include '../web/validateE.php';$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

 $ruta = explode("/", $url);
 $to=count($ruta);

 $foliosinceros = $ruta[$to-4];
 $clv = $ruta[$to-3];
 $anio = $ruta[$to-2];
 $tipopersona = $ruta[$to-1];
 
 $length = 5;
 $foliodecarpeta = str_pad($foliosinceros,$length,"0", STR_PAD_LEFT);
 
 //die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Datos Generales Observados</title>
    <?php include '../const.php'; ?> 
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../../../_js/_app11_especancelados.js"></script>
    <!--script type="text/javascript" src="../../../../../_js/_app12_especancelados.js"></script-->
     <link href="<?php echo jsdict; ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <style>
   
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

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

</style>
</head>

<body>
  <input type="hidden" id="idG" name="idG" value="<?php echo $clv; ?>" />
  <input type="hidden" id="cvec" name="cvec"  value="<?php echo $clv; ?>"/>
  <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $anio; ?>"/>
  <input type="hidden" id="gva" name="gva" value="<?php echo $foliosinceros; ?>"/>
  <input type="hidden" id="etapa" name="etapa" />
  <input type="hidden" id="idGRec" name="idGRec"/>
  <input type="hidden" id="idP" name="idP"/> 
  <input type="hidden" id="n_inm" name="n_inm"  />
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
              
              <div style="color: black;" class="col-xl-2">Folio del Dictamen:<br>DIP/<?php echo $foliodecarpeta; echo "/"; echo $anio; echo "/"; echo $clv;?> <br></div>
              
                <div class="col-xl-6 col-xxl-12">
                  <br><br><br>
                        <div class="card" style="background-color: transparent; border-color: transparent;">
                            <div class="card-body">
                              <div class="alert alert-success solid alert-right-icon alert-dismissible fade show" id="alertas1" style="display: none; background-color: #446421; border-color: #446421;">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <button type="button" class="close h-100" onclick="document.getElementById('alertas1').style.display='none'" ><span><i class="mdi mdi-close"></i></span>
                                    </button>Archivos guardados correctamente.
                                </div>

                                <div class="alert alert-success solid alert-right-icon alert-dismissible fade show" id="alertas2" style="display: none; background-color: #446421; border-color: #446421;">
                                    <span><i class="mdi mdi-check"></i></span>
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>Se han registrado todos los datos correctamente
                                </div>


                           
                            </div>
                        </div>
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
                                                    <p class="mb-2" id="alertaStatusMotivo2"></p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                          <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa2">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa2').style.display='none'"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus2">Debe tener almenos 7 o más documentos.</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo2">Por tal motivo el sistema no le permitira continuar hasta tener la documentacion minima.</p>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa3">
                                            <button type="button" class="close" onclick="document.getElementById('alertaa3').style.display='none'"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus3">Documentos guardados correctamente</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo3">En espera que sea asignado un revisor.</p>
                                                   
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
                    <li class="nav-label first" > <h3 style="color:#ffffff;">DICTAMUN MUNICIPAL</h3> </li>
                    
                      <li><a  href="javascript:voidindex()"  aria-expanded="false"><i
                                class="icon icon-home"></i><span class="nav-text">Inicio</span></a>
                        
                    </li>                    
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                           <li><a href="../../../../SeguimientoDictamen/1">En Seguimiento</a></li>
                           <li><a href="../../../../dictamenesPreautorizados/">Pendientes (archivo en hojas verdes)</a></li>
                           <li><a href="../../../../SeguimientoDictamenNOGREEN/12">En hojas verdes no validos</a></li>                           
                        </ul>
                    </li>
                    
                      <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>
                        
                    </li>
                </ul>
            </div>
        </div>
      <div class="content-body">
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
          <div class="row">
          <div class="col-lg-6" style="">
          <div class="card">
          <div class="card-title">
            <center><h4>Contribuyente</h4></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">Nombre: </td>
                  <td>
                  <input id="nomC" type="text" name="nomC" style="border-bottom: 1px solid #888; background-color: transparent; border: none; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">RFC: </td>
                  <td>
                  <input type="text" name="rfcC" id="rfcC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td id="curpC2" style="color: black;">CURP:</td>
                  <td>
                  <input type="text" name="curpC" id="curpC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">Telefono:</td>
                  <td>
                  <input type="text" name="telefonoC" id="telefonoC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">Correo electronico:</td>
                  <td>
                  <input type="text" name="correoC" id="correoC" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div> 
          <div class="col-lg-6">
          <div class="card">
          <div class="card-title">
            <center><h4>Representante legal</h4></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">Nombre: </td>
                  <td>
                  <input id="nom" type="text" name="nom" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 220px; height: 30px;" readonly="">
                  </td> 
                </tr>
                <tr>
                  <td style="color: black;">RFC: </td>
                  <td>
                  <input type="text" name="cfr" id="cfr" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">CURP:</td>
                  <td>
                  <input type="text" id="purc" name="purc" style="border-bottom: 1px solid #888; background-color: transparent; border:none; border-left: 0; width: 220px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td><br><br><br><br></td>
                  <td></td>
                </tr>   
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-6">
          <div class="card">
          <div class="card-title">
            <center>
            <br>  
            <h4>Dictaminador<br>(Especialista en valuaci&oacute;n inmoviliaria autorizado por el IGECEM)</h4></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">Dictaminador: </td>
                  <td>
                  <div id="nombs" style="color: black;"></div>
                  </td> 
                </tr>
                <tr>
                  <td style="color: black;">RFC: </td>
                  <td>
                  <div id="rfcss" style="color: black;"></div>
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">No.Registro:</td>
                  <td>
                  <div id="nog" style="color: black;"></div>
                  </td>
                </tr>                     
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-6">
          <div class="card">
          <div class="card-title">
            <center>
            <br>
            <h4>Informaci&oacute;n adicional</h4><br></center>
          </div>
          <div class="card-body" style="background-color: #ebeef9;">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                        <tr>
                          <th></th>
                          <th></th>
                        </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color: black;">A&ntilde;o a Dictaminar:</td>
                  <td>
                  <input type="text" name="aniod" id="aniod" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr>
                <tr>
                  <td style="color: black;">Tipo de Dictamen:</td>
                  <td>
                  <input type="text" name="tpd" id="tpd" style="border-bottom: 1px solid #888; background-color: transparent; border:none; width: 200px; height: 30px;" readonly="">
                  </td>
                </tr> 
                <tr>
                  <td></td>
                </tr>                 
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>
          <div class="col-lg-12">
          <div class="card">
          <div class="card-title">
          </div>
          <div class="card-body">
          <div class="table-responsive">
          <div class="col-md-12" id="prediosCla">
          <div class="container-fluid">
          
           <div class="col-lg-12 ">
           <div class="row ">
          <div class="col-md-3"> &nbsp; </div>
          <div class="col-md-3"> 
            <center>
            <input type="radio" id="baldio" name="predio" value="1" onclick="baldio();" disabled="true" style="border: 1px;width: 23%;height: 2em;" >
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio baldío.</label>
            <input type="hidden" id="prebaldio" name="prebaldio" value="" >
            </center>
          </div>
          
          <div class="col-md-3"> 
           <center> 
            <input type="radio" id="construccion" name="predio" value="2" onclick="construccion();" disabled="true" style="border: 1px;width: 23%;height: 2em;">
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            <input type="hidden" id="preconstruido" name="preconstruido" value="" >
            </center>
          </div>
          <div class="col-md-3"> &nbsp; </div>
          </div>
          </div>
          
          </div>   
          </div> 
          <div id="documentacion"   class="col-md-12" >
            
            <div class="col-md-12" style="text-align: center; "><br><br>
    <div class="col-md-12" style="">
    
    	<div id="xcod" class="col-sm-12 " style="">
    	<CENTER>
    	<H4><B>Almacenamiento de documentos requeridos para el dictamen</B></H4><BR><BR>
    	</CENTER>
           <table class="table table-striped" style="color: black;">
            
        <tbody id="docxs_f" ><tr>
            <th style="text-align: center;">Lista de Documentos</th>
            <th style="text-align: center;">Cargar Documento</th>
            <th style="text-align: center;">Documento Guardado</th>
            <th style="text-align: center;">Comentario del Revisor</th>
            <th style="text-align: center;">Corregir Documento</th>
        </tr>
        <tr >
            <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
            <td id="docxsfiles1" >
            	<center>
            	 <?php
    if (isset($_SESSION['message14']) && $_SESSION['message14'])
    {
      printf('<b>%s</b>', $_SESSION['message14']);
      unset($_SESSION['message14']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
      <input type="hidden" id="documents" name="documents" value="14">
      <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
      <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file1">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment1" name="ficoment1" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file1delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  </a>
            </div>
            </td>
        </tr>
        
        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td id="docxsfiles2" >
            	<center>

            	 <?php
    if (isset($_SESSION['message10']) && $_SESSION['message10'])
    {
      printf('<b>%s</b>', $_SESSION['message10']);
      unset($_SESSION['message10']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="10">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file2">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment2" name="ficoment2" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file2delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td id="docxsfiles3">
            	<center>

            	 <?php
    if (isset($_SESSION['message11']) && $_SESSION['message11'])
    {
      printf('<b>%s</b>', $_SESSION['message11']);
      unset($_SESSION['message11']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="11">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file3">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment3" name="ficoment3" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file3delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        
        
        
        
        
        
        
        <div id="camp23baldio">
        <!-- --------------**********
        id="camp21actaconsbaldio"
        id="camp22actaconsbaldio"
        *****************************************  ARCHIVOS EXTRA SOLO PARA MORAL CON PREDIO BALDIO * *****************************************************************- -->
            <tr id="camp21actaconsbaldio" >
        <td>Acta Constitutiva de la Empresa</td>
        <td id ="docxsfiles21prediobaldio">
            	<center>

            	 <?php
    if (isset($_SESSION['message90']) && $_SESSION['message90'])
    {
      printf('<b>%s</b>', $_SESSION['message90']);
      unset($_SESSION['message90']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="90">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file21prediobaldio">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg90']) && $_SESSION['filenameavg90'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg90']);
      unset($_SESSION['filenameavg90']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment21prediobaldio" name="ficoment21prediobaldio" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file21deleteprediobaldio">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg90']) && $_SESSION['filenameavg90'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg90']);
      unset($_SESSION['filenameavg90']);
    }
  ?>
  	
  </a>
            </div>
            </td>
       
      </tr>
      <tr id="camp22actaconsbaldio" >
        <td>Nombramiento del Representante legal</td>
        <td  id="docxsfiles22prediobaldio">
            	<center>

            	 <?php
    if (isset($_SESSION['message89']) && $_SESSION['message89'])
    {
      printf('<b>%s</b>', $_SESSION['message89']);
      unset($_SESSION['message89']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="89">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file22prediobaldio">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg89']) && $_SESSION['filenameavg89'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg89']);
      unset($_SESSION['filenameavg89']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment22prediobaldio" name="ficoment22prediobaldio" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file22deleteprediobaldio">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg89']) && $_SESSION['filenameavg89'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg89']);
      unset($_SESSION['filenameavg89']);
    }
  ?>
  	
  </a>
            </div>
            </td>
                
      </tr>
    </div>  
      <!-- --------------***************************************************  ARCHIVOS EXTRA SOLO PARA MORAL CON PREDIO BALDIO * *****************************************************************- -->
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
         
     
      
      <tr id="escrituraPublicaMoral">
        <td>Escritura pública o Título de propiedad.</td>
       <td id="docxsfiles4">
            	<center>

            	 <?php
    if (isset($_SESSION['message99']) && $_SESSION['message99'])
    {
      printf('<b>%s</b>', $_SESSION['message99']);
      unset($_SESSION['message99']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="99">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file4">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment4" name="ficoment4" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file4delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Boleta Predial.</td>
        
                <td id="docxsfiles5" >
            	<center>

            	 <?php
    if (isset($_SESSION['message98']) && $_SESSION['message98'])
    {
      printf('<b>%s</b>', $_SESSION['message98']);
      unset($_SESSION['message98']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="98">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file5">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg98']) && $_SESSION['filenameavg98'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg98']);
      unset($_SESSION['filenameavg98']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment5" name="ficoment5" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file5delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg98']) && $_SESSION['filenameavg98'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg98']);
      unset($_SESSION['filenameavg98']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Documento que acredite la propiedad.</td>
        
              
              <td id="docxsfiles6">
            	<center>

            	 <?php
    if (isset($_SESSION['message83']) && $_SESSION['message83'])
    {
      printf('<b>%s</b>', $_SESSION['message83']);
      unset($_SESSION['message83']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="83">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file6">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg83']) && $_SESSION['filenameavg83'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg83']);
      unset($_SESSION['filenameavg83']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment6" name="ficoment6" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file6delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg83']) && $_SESSION['filenameavg83'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg83']);
      unset($_SESSION['filenameavg83']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
       <tr>
        <td>Identificación Oficial del propietario o representante legal  </td>
              <td id="docxsfiles7" >
            	<center>

            	 <?php
    if (isset($_SESSION['message97']) && $_SESSION['message97'])
    {
      printf('<b>%s</b>', $_SESSION['message97']);
      unset($_SESSION['message97']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="97">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file7">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg97']) && $_SESSION['filenameavg97'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg97']);
      unset($_SESSION['filenameavg97']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment7" name="ficoment7" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file7delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg97']) && $_SESSION['filenameavg97'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg97']);
      unset($_SESSION['filenameavg97']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
             <td id="docxsfiles8" >
            	<center>

            	 <?php
    if (isset($_SESSION['message96']) && $_SESSION['message96'])
    {
      printf('<b>%s</b>', $_SESSION['message96']);
      unset($_SESSION['message96']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="96">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file8">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg96']) && $_SESSION['filenameavg96'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg96']);
      unset($_SESSION['filenameavg96']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment8" name="ficoment8" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file8delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg96']) && $_SESSION['filenameavg96'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg96']);
      unset($_SESSION['filenameavg96']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Croquis de Localización.</td>
            <td id="docxsfiles9" >
            	<center>

            	 <?php
    if (isset($_SESSION['message95']) && $_SESSION['message95'])
    {
      printf('<b>%s</b>', $_SESSION['message95']);
      unset($_SESSION['message95']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="95">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file9">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg95']) && $_SESSION['filenameavg95'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg95']);
      unset($_SESSION['filenameavg95']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment9" name="ficoment9" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file9delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg95']) && $_SESSION['filenameavg95'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg95']);
      unset($_SESSION['filenameavg95']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>





































      
      <tr>
        <td>Plano arquitectónico o croquis de construcción.</td>
              
              <td id="docxsfiles10" >
            	<center>

            	 <?php
    if (isset($_SESSION['message82']) && $_SESSION['message82'])
    {
      printf('<b>%s</b>', $_SESSION['message82']);
      unset($_SESSION['message82']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="82">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file10">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg82']) && $_SESSION['filenameavg82'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg82']);
      unset($_SESSION['filenameavg82']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment10" name="ficoment10" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file10delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg82']) && $_SESSION['filenameavg82'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg82']);
      unset($_SESSION['filenameavg82']);
    }
  ?>
  	
  </a>
            </div>
            </td>
              
      </tr> 
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>
        
        <td id="docxsfiles11" >
            	<center>

            	 <?php
    if (isset($_SESSION['message81']) && $_SESSION['message81'])
    {
      printf('<b>%s</b>', $_SESSION['message81']);
      unset($_SESSION['message81']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="81">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file11">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg81']) && $_SESSION['filenameavg81'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg81']);
      unset($_SESSION['filenameavg81']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment11" name="ficoment11" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file11delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg81']) && $_SESSION['filenameavg81'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg81']);
      unset($_SESSION['filenameavg81']);
    }
  ?>
  	
  </a>
            </div>
            </td>
           
      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas.</td>
        
        <td id="docxsfiles12" >
            	<center>

            	 <?php
    if (isset($_SESSION['message80']) && $_SESSION['message80'])
    {
      printf('<b>%s</b>', $_SESSION['message80']);
      unset($_SESSION['message80']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="80">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file12">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg80']) && $_SESSION['filenameavg80'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg80']);
      unset($_SESSION['filenameavg80']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment12" name="ficoment12" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file12delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg80']) && $_SESSION['filenameavg80'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg80']);
      unset($_SESSION['filenameavg80']);
    }
  ?>
  	
  </a>
            </div>
            </td>
                
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <tr>
        <td>Planos de Factores.</td>
              <td id="docxsfiles13">
            	<center>

            	 <?php
    if (isset($_SESSION['message79']) && $_SESSION['message79'])
    {
      printf('<b>%s</b>', $_SESSION['message79']);
      unset($_SESSION['message79']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="79">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file13">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg79']) && $_SESSION['filenameavg79'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg79']);
      unset($_SESSION['filenameavg79']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment13" name="ficoment13" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file13delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg79']) && $_SESSION['filenameavg79'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg79']);
      unset($_SESSION['filenameavg79']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr> 
      <tr>
        <td>Relación de indivisos de Condominios.</td>
            <td id="docxsfiles14" >
            	<center>

            	 <?php
    if (isset($_SESSION['message15']) && $_SESSION['message15'])
    {
      printf('<b>%s</b>', $_SESSION['message15']);
      unset($_SESSION['message15']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="15">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file14">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment14" name="ficoment14" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file14delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>  
      </tr>       
      <tr>
        <td>Otros.</td>
        <td id="docxsfiles15">
            	<center>

            	 <?php
    if (isset($_SESSION['message94']) && $_SESSION['message94'])
    {
      printf('<b>%s</b>', $_SESSION['message94']);
      unset($_SESSION['message94']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="94">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file15">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg94']) && $_SESSION['filenameavg94'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg94']);
      unset($_SESSION['filenameavg94']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment15" name="ficoment15" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file15delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg94']) && $_SESSION['filenameavg94'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg94']);
      unset($_SESSION['filenameavg94']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
      </tr> 
      
      
      
      
      

      
      
      
      
      
      
      
      <tr>
        <td id="titFachada" >Imagen de Fachada</td>
                    <td id="docxsfiles16">
            	<center>

            	 <?php
    if (isset($_SESSION['message120']) && $_SESSION['message120'])
    {
      printf('<b>%s</b>', $_SESSION['message120']);
      unset($_SESSION['message120']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="120">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file16">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg120']) && $_SESSION['filenameavg120'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg120']);
      unset($_SESSION['filenameavg120']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment16" name="ficoment16" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file16delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg120']) && $_SESSION['filenameavg120'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg120']);
      unset($_SESSION['filenameavg120']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>


    </tbody>
    
    
     <tbody id="docxs_m" >
    <tr>
          <th style="text-align: center;">Lista de Documentos</th>
            <th style="text-align: center;">Cargar Documento</th>
            <th style="text-align: center;">Documento Guardado</th>
            <th style="text-align: center;">Comentario del Revisor</th>
            <th style="text-align: center;">Corregir Documento</th>
        </tr>
        
        
        
        <tr>


            <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
            <td id ="docxsfiles18" >
            	<center>

            	 <?php
    if (isset($_SESSION['message14']) && $_SESSION['message14'])
    {
      printf('<b>%s</b>', $_SESSION['message14']);
      unset($_SESSION['message14']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
      <input type="hidden" id="documents" name="documents" value="14">
      <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        
      <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file18">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     
     <td align="center"><textarea id="ficoment18" name="ficoment18" placeholder="Escribir algun comentario" ></textarea></td>
     
     <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file18delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        
        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td id ="docxsfiles19" >
            	<center>

            	 <?php
    if (isset($_SESSION['message10']) && $_SESSION['message10'])
    {
      printf('<b>%s</b>', $_SESSION['message10']);
      unset($_SESSION['message10']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="10">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file19">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment19" name="ficoment19" placeholder="Escribir algun comentario" ></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file19delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td id ="docxsfiles20">
            	<center>

            	 <?php
    if (isset($_SESSION['message11']) && $_SESSION['message11'])
    {
      printf('<b>%s</b>', $_SESSION['message11']);
      unset($_SESSION['message11']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="11">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file20">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment20" name="ficoment20" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file20delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        
        
        
       
       
       
       
       
       
       
       
       
       
       
         
     <!-- id="camp21actacons"  -->
      <div id="camp23contruid">
      <tr  id="camp21actacons" >
        <td>Acta Constitutiva de la Empresa</td>
        <td id ="docxsfiles21predioconstruido">
            	<center>

            	 <?php
    if (isset($_SESSION['message90']) && $_SESSION['message90'])
    {
      printf('<b>%s</b>', $_SESSION['message90']);
      unset($_SESSION['message90']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="90">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file21predioconstruido">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg90']) && $_SESSION['filenameavg90'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg90']);
      unset($_SESSION['filenameavg90']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment21predioconstruido" name="ficoment21predioconstruido" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file21deletepredioconstruido">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg90']) && $_SESSION['filenameavg90'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg90']);
      unset($_SESSION['filenameavg90']);
    }
  ?>
  	
  </a>
            </div>
            </td>
       
      </tr>
      <tr id="camp22actacons">
        <td>Nombramiento del Representante legal</td>
        <td  id="docxsfiles22predioconstruido">
            	<center>

            	 <?php
    if (isset($_SESSION['message89']) && $_SESSION['message89'])
    {
      printf('<b>%s</b>', $_SESSION['message89']);
      unset($_SESSION['message89']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="89">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file22predioconstruido">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg89']) && $_SESSION['filenameavg89'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg89']);
      unset($_SESSION['filenameavg89']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment22predioconstruido" name="ficoment22predioconstruido" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file22deletepredioconstruido">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg89']) && $_SESSION['filenameavg89'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg89']);
      unset($_SESSION['filenameavg89']);
    }
  ?>
  	
  </a>
            </div>
            </td>
                
      </tr>
      
      </div>
      
      <tr>
        <td>Boleta Predial</td>
        
        <td id="docxsfiles23">
            	<center>

            	 <?php
    if (isset($_SESSION['message88']) && $_SESSION['message88'])
    {
      printf('<b>%s</b>', $_SESSION['message88']);
      unset($_SESSION['message88']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="88">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file23">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg88']) && $_SESSION['filenameavg88'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg88']);
      unset($_SESSION['filenameavg88']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment23" name="ficoment23" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file23delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg88']) && $_SESSION['filenameavg88'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg88']);
      unset($_SESSION['filenameavg88']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
       
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
       <tr>
        <td>Documento que acredite la propiedad</td>
             <td id="docxsfiles24">
            	<center>

            	 <?php
    if (isset($_SESSION['message78']) && $_SESSION['message78'])
    {
      printf('<b>%s</b>', $_SESSION['message78']);
      unset($_SESSION['message78']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="78">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file24">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg78']) && $_SESSION['filenameavg78'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg78']);
      unset($_SESSION['filenameavg78']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment24" name="ficoment24" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file24delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg78']) && $_SESSION['filenameavg78'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg78']);
      unset($_SESSION['filenameavg78']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Identificación Oficial del propietario o representante legal</td>
        <td id="docxsfiles25">
            	<center>

            	 <?php
    if (isset($_SESSION['message87']) && $_SESSION['message87'])
    {
      printf('<b>%s</b>', $_SESSION['message87']);
      unset($_SESSION['message87']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="87">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file25">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg87']) && $_SESSION['filenameavg87'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg87']);
      unset($_SESSION['filenameavg87']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment25" name="ficoment25" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file25delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg87']) && $_SESSION['filenameavg87'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg87']);
      unset($_SESSION['filenameavg87']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
      </tr>
      <tr>
        <td>Plano ó Croquis del terreno (medidas y colindancias)</td>
           <td id="docxsfiles26">
            	<center>

            	 <?php
    if (isset($_SESSION['message86']) && $_SESSION['message86'])
    {
      printf('<b>%s</b>', $_SESSION['message86']);
      unset($_SESSION['message86']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="86">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file26">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg86']) && $_SESSION['filenameavg86'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg86']);
      unset($_SESSION['filenameavg86']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment26" name="ficoment26" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file26delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg86']) && $_SESSION['filenameavg86'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg86']);
      unset($_SESSION['filenameavg86']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>





































      
      <tr>
        <td>Croquis de Localización</td>
            
            <td id="docxsfiles27">
            	<center>

            	 <?php
    if (isset($_SESSION['message85']) && $_SESSION['message85'])
    {
      printf('<b>%s</b>', $_SESSION['message85']);
      unset($_SESSION['message85']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="85">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file27">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg85']) && $_SESSION['filenameavg85'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg85']);
      unset($_SESSION['filenameavg85']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment27" name="ficoment27" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file27delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg85']) && $_SESSION['filenameavg85'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg85']);
      unset($_SESSION['filenameavg85']);
    }
  ?>
  	
  </a>
            </div>
            </td>
              
      </tr> 
      <tr>
        <td>Otros</td>
        <td id="docxsfiles28" >
            	<center>

            	 <?php
    if (isset($_SESSION['message84']) && $_SESSION['message84'])
    {
      printf('<b>%s</b>', $_SESSION['message84']);
      unset($_SESSION['message84']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="84">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file28">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg84']) && $_SESSION['filenameavg84'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg84']);
      unset($_SESSION['filenameavg84']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment28" name="ficoment28" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file28delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg84']) && $_SESSION['filenameavg84'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg84']);
      unset($_SESSION['filenameavg84']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
       
      </tr>
      <tr>
        <td>Relación de indivisos de Condominio</td>
        <td id="docxsfiles29">
            	<center>

            	 <?php
    if (isset($_SESSION['message15']) && $_SESSION['message15'])
    {
      printf('<b>%s</b>', $_SESSION['message15']);
      unset($_SESSION['message15']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="15">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file29">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment29" name="ficoment29" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file29delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
       
      </tr>
      <tr>
        <td>Plano arquitectónico o croquis de construcción</td>
        <td id="docxsfiles30">
            	<center>

            	 <?php
    if (isset($_SESSION['message77']) && $_SESSION['message77'])
    {
      printf('<b>%s</b>', $_SESSION['message77']);
      unset($_SESSION['message77']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="77">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file30">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg77']) && $_SESSION['filenameavg77'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg77']);
      unset($_SESSION['filenameavg77']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment30" name="ficoment30" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file30delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg77']) && $_SESSION['filenameavg77'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg77']);
      unset($_SESSION['filenameavg77']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
        
                
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo</td>
        <td id="docxsfiles31">
            	<center>

            	 <?php
    if (isset($_SESSION['message76']) && $_SESSION['message76'])
    {
      printf('<b>%s</b>', $_SESSION['message76']);
      unset($_SESSION['message76']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="76">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file31">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg76']) && $_SESSION['filenameavg76'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg76']);
      unset($_SESSION['filenameavg76']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment31" name="ficoment31" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file31delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg76']) && $_SESSION['filenameavg76'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg76']);
      unset($_SESSION['filenameavg76']);
    }
  ?>
  	
  </a>
            </div>
            </td>
             
      </tr> 
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas</td>
           <td id="docxsfiles32">
            	<center>

            	 <?php
    if (isset($_SESSION['message75']) && $_SESSION['message75'])
    {
      printf('<b>%s</b>', $_SESSION['message75']);
      unset($_SESSION['message75']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="75">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file32">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg75']) && $_SESSION['filenameavg75'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg75']);
      unset($_SESSION['filenameavg75']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment32" name="ficoment32" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file32delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg75']) && $_SESSION['filenameavg75'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg75']);
      unset($_SESSION['filenameavg75']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>       
      <tr>
        <td>Planos de Factores</td>
        <td id="docxsfiles33" >
            	<center>

            	 <?php
    if (isset($_SESSION['message74']) && $_SESSION['message74'])
    {
      printf('<b>%s</b>', $_SESSION['message74']);
      unset($_SESSION['message74']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="74">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file33">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg74']) && $_SESSION['filenameavg74'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg74']);
      unset($_SESSION['filenameavg74']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment33" name="ficoment33" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file33delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg74']) && $_SESSION['filenameavg74'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg74']);
      unset($_SESSION['filenameavg74']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
      </tr>
      <tr id="imgaenmoral">
        <td>Imagen de Fachada</td>
        <td id="docxsfiles34">
            	<center>

            	 <?php
    if (isset($_SESSION['message121']) && $_SESSION['message121'])
    {
      printf('<b>%s</b>', $_SESSION['message121']);
      unset($_SESSION['message121']);
    }
  ?>
  <form method="POST" action="../../../../../cancelad/loadfile" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="120">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>
<br>
    <input class="btn" type="submit" name="uploadBtn" value="Subir" style="background-color: #414558; border-color: #414558; color: white;"/>
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file34">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg121']) && $_SESSION['filenameavg121'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg121']);
      unset($_SESSION['filenameavg121']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment34" name="ficoment34" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file34delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg121']) && $_SESSION['filenameavg121'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg121']);
      unset($_SESSION['filenameavg121']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
      </tr> 
         
    
    </tbody>
    
  
    
    
    
    
    </table>
    </div>
    
    	<div id="tipolgis" class="col-sm-12 table-responsive" style="">
    	<center>
    		<br><br>
  <form method="POST" action="load" enctype="multipart/form-data">
    <div>
      <H2><B>AGREGAR TIPOLOGIAS</B></H2><BR><BR>
      <H4>
      <input type="file" id="uploadedFile" name="uploadedFile" onchange="upload_files3();" />
      </H4>
      <BR><BR>
    </div>
  </form>
  </center>
           <table id="tipologstable" class="table table-striped" style="color: black;">
        <thead ><tr>
            <th style="text-align: center;">Lista de Tipologias</th>
            <th style="text-align: center;">Cargar Tipologias</th>
            <th style="text-align: center;">Tipologias Subidas</th>
            <th style="text-align: center;">Comentario del Revisor</th>
            <th style="text-align: center;">Corregir Tipologias</th>
        </tr>

      


    </thead>
    
     
    
                  <tbody id="tipologs" style="text-align: center;"></tbody>
    
    
    
    
    
    </table>
    </div>
    
    	<div  class="col-sm-12 table-responsive" style="">
    	<br><br>
    	<center>
    	<!--  input class="btn btn-success" type="button" name="avg1" id="avg1" value="Guardar Todo"  onclick="guardarBaldioCambios();" -->
    	</center>
    	<br><br>
           
    </div>
            </div>
            </div>
            <center>
            <div  class="col-md-12">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
              
              <input type="button" id="guardarBaldioCambios" name="guardarBaldioCambios" style="background-color: #414558; border-color: #414558; color: white; width: 350px;" class="btn" value="Guardar Cambios" style=" background-color: #1b2856; border-color: #1b2856;"  onclick="bad(<?php echo $tipopersona;?>,<?php echo $foliosinceros;?>,'<?php echo $clv;?>',<?php echo $anio;?>);">
              
            </div>
            <div class="col-md-4">&nbsp;</div>
            </div>
            </center>
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
    
         

            <div class="footer">
            <div class="copyright">
                <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
            </div>
            </div>
          </div>

     <!-- Required vendors -->
    <script src="<?php echo jsdict; ?>vendor/global/global.min.js"></script>
    <script src="<?php echo jsdict; ?>js/quixnav-init.js"></script>
    <script src="<?php echo jsdict; ?>js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="<?php echo jsdict; ?>vendor/raphael/raphael.min.js"></script>
    <!--script src="<?php echo jsdict; ?>vendor/morris/morris.min.js"></script-->


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


    <!-- script src="<?php echo jsdict; ?>js/dashboard/dashboard-1.js"></script -->



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
    function voidindex(){
    	location.href = "../../../../SeguimientoDictamen/1";
    }
        
    function void1(){
        //
        location.href = "../SeguimientoDictamen/1";
    }

    function voidclose(){
        //alert("asdasd");
    	//location.href = "PadronDictaminadores";
    	//http://localhost/dictamun/acceso
    	$.post("../../../../../acceso",{acceess:999},function(z){
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
