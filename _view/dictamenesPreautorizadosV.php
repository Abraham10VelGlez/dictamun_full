<?php include '../web/validateE.php';$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$ruta = explode("/", $url);
 $to=count($ruta);
 $id_di=$ruta[$to-1];  
$an = explode("?", $id_di);
 $an2 = $an[0];
 $cla = $an[1];
 $gva = $an[2];

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dictamenes preautorizados(Archivo hojas verdes)</title>
    <?php include '../const.php'; ?> 
    <!-- Favicon icon -->
    
     <link rel="icon" type="image/png" sizes="16x16" href="https://dictamunigecem.edomex.gob.mx/_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>

    <link href="<?php echo jsdict; ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app11.js"></script>
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app12.js"></script>
</head>

  <body>

    <input type="hidden" id="idG" name="idG" value="<?php echo $cla; ?>" />
    <input type="hidden" id="cvec" name="cvec"  value="<?php echo $cla; ?>"/>
    <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $an2; ?>"/>
    <input type="hidden" id="etapa" name="etapa" />
    <input type="hidden" id="idGRec" name="idGRec"/>
    <input type="hidden" id="idP" name="idP"/>
    <input type="hidden" id="n_inm" name="n_inm"  />
    <input type="hidden" id="gva" name="gva" value="<?php echo $gva;  ?>" /> 
  

  <!--  <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" id="banner">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br>
    </div></center>  -->

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="#" class="brand-logo">
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
                          <div  style="color: black;" class="col-xl-3">Folio del Dictamen:<br><div id="foldicview"></div> <br></div>
               <div class="col-xl-5"><br><br><br><br>
               <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
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
                           <li><a href="../SeguimientoDictamen/1">En Seguimiento</a></li>
                           <li><a href="../dictamenesPreautorizados/">Pendientes (archivo en hojas verdes)</a></li> 
                           <li><a href="../SeguimientoDictamenNOGREEN/12">En hojas verdes no validos</a></li> 
                           <li><a href="../observadosPorMunicipio/1">Observados por el municipio</a></li>                         
                        </ul>
                    </li>
                    
                      <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>
                        
                    </li>
                </ul>
            </div>


        </div>

         <div class="content-body">
          <input type="hidden" id="etapa" name="etapa" /> 
           <div class="col-md-12" id="descripcionSer">
            <h5 style="text-align: center;">Descripci&oacute;n de los Servicios o<br> Actividades que Realiza:</h5>
          <center>
           <textarea id="descpAc" name="descpAc" style="width: 400px; height: 100px;"></textarea>
           </center>
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
                  <td style="color: black;" id="curpC2" name="curpC2">CURP:</td>
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
          <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-4"> 
            <center>
            <input type="radio" id="baldio" name="predio"  value="1" onclick="baldio();" style="">
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio bald&iacute;o.</label>
            </center>
          </div>
          <div class="col-sm-4"> 
            <center> 
            <input type="radio" id="construccion" name="predio"  value="1" onclick="construccion();" style="">
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            </center>
          </div>
          <div class="col-sm-2"></div>
          </div>
          </div>   
          </div> 
         <div id="documentacion" style="display: none;">
            <br><br>
            <h4 style="text-align: center; font-weight: bold;">Almacenamiento de documentos requeridos para el dictamen</h4>
            <br><br>
            <center>
            <div class="col-sm-12 table-responsive" style="">
              <table class="table table-striped">
                <tr>
                  <th style="text-align: center; background-color: #d0d8f3; color: black;">Documentos</th>
                  <th style="text-align: center; background-color: #d0d8f3; color: black;">Subir Archivo</th>
                  <th style="text-align: center; background-color: #d0d8f3; color: black;">Estatus</th>
                  <th style="text-align: center; background-color: #d0d8f3; color: black;">Comentario</th>
                </tr>
                <tr>
                  <td style="color: black;"><p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
                  <td style="text-align: center;"><i id="fmcdown" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin110').val(14); document.getElementById('id020_mo').style.display='block'"></i></td>
                  <td style="text-align: center;">
                  <input type="hidden" id="frmc" name="frmc" value="14">
                  <input type="hidden" id="okfmx" name="okfmx" value="_">
                  <div id="okfmr">
                  <i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>
                  </div>
                  </td>
                  <td align="center"><textarea id="commentfmc" name="commentfmc" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Archivo dictaval.</td>
                  <td style="text-align: center;"><i id="avdown" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin0').val(1); document.getElementById('id01_mo').style.display='block'"></i></td>
                  <td style="text-align: center;">
                  <input type="hidden" id="av" name="av" value="10">
                  <input type="hidden" id="okvaa" name="okvaa" value="_">
                  <div id="okava">
                  <i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i>
                  </div>
                  </td>
                  <td align="center"><textarea id="commentav" name="commentav" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Archivo de construcciones.</td>
                  <td style="text-align: center;"><i id="codown" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;"  onclick="$('#domin0').val(2); document.getElementById('id01_mo').style.display='block'"></i></td>
                  <td style="text-align: center;">
                  <input type="hidden" id="co" name="co" value="11">
                  <input type="hidden" id="okvcc" name="okvcc" value="_">
                  <div id="okvc"><i  class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div>
                  </td>
                  <td align="center"><textarea id="commentcx" name="commnetcx" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
                </tr>
              </table>
            </div>
            </center>
            <br><br>
            <center>
            <br>
            <div class="col-md-12 table-responsive" id="t01_fisica"  style="display: none;">
              <center>
              <table id="t01_fisica2" width="100%" class="table table-striped">
                <tr>
                  <th style="font-size: medium; text-align: center; width: 550px; background-color: #d0d8f3; color: black;">Documentos</th>
                  <th style="font-size: medium; text-align: center; width: 200px; background-color: #d0d8f3; color: black;">Subir Archivo</th>
                  <th style="font-size: medium; text-align: center; width: 200px; background-color: #d0d8f3; color: black;">Estatus</th>
                  <th style="font-size: medium; text-align: center; background-color: #d0d8f3; color: black;">Comentario</th>
                </tr>
                <input type="hidden" id="1f" name="1f" value="_">
                <input type="hidden" id="2f" name="2f" value="_">
                <input type="hidden" id="3f" name="3f" value="_">
                <input type="hidden" id="4f" name="4f" value="_">
                <input type="hidden" id="5f" name="5f" value="_">
                <input type="hidden" id="6f" name="6f" value="_">
                <input type="hidden" id="7f" name="7f" value="_">


                <input type="hidden" id="8f" name="8f" value="_">
                <input type="hidden" id="9f" name="9f" value="_">
                <input type="hidden" id="10f" name="10f" value="_">
                <input type="hidden" id="11f" name="11f" value="_">
                <input type="hidden" id="12f" name="12f" value="_">

                <input type="hidden" id="13f" name="13f" value="_">
                <input type="hidden" id="14f" name="14f" value="_">
                <input type="hidden" id="15f" name="15f" value="_">
                <input type="hidden" id="16f" name="16f" value="_">
                <input type="hidden" id="17f" name="17f" value="_">
                <input type="hidden" id="23f" name="23f" value="_">

                <input type="hidden" id="11f" name="11f" value="99">
                <input type="hidden" id="12f" name="12f" value="98">
                <input type="hidden" id="13f" name="13f" value="97">
                <input type="hidden" id="14f" name="14f" value="96">
                <input type="hidden" id="15f" name="15f" value="95">
                <input type="hidden" id="16f" name="16f" value="94">

                <input type="hidden" id="17f" name="17f" value="15">

                <input type="hidden" id="18f" name="18f" value="16">
                <input type="hidden" id="19f" name="19f" value="17">
                <input type="hidden" id="20f" name="20f" value="18">
                <input type="hidden" id="21f" name="21f" value="19">
                <input type="hidden" id="22f" name="22f" value="20">        

                <tr>
                  <td style="color: black;">Escritura p&uacute;blica o T&iacute;tulo de propiedad.</td>
                  <td align="center"><i id="fff1" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin1').val(1); document.getElementById('id02_mo').style.display='block'"></i></td>
                  <td align="center">
                  <div id="f1"> <i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div>
                  </td>
                  <td align="center"><textarea id="1commenta" name="1commenta" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Boleta Predial</td>
                  <td align="center"><i id="fff2" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin1').val(2); document.getElementById('id02_mo').style.display='block'"></i></td>
                  <td align="center">
                  <div id="f2"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div>
                  </td>
                  <td align="center"><textarea id="1commentb" name="1commentb" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>      
                <tr>
                  <td style="color: black;">Documento que acredite la propiedad</td>
                  <td align="center"><i id="fff8" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin4444').val(16); document.getElementById('id04444_fo').style.display='block'"></i></td>
                  <td align="center"><div id="f8"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commenth" name="1commenth" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Identificación Oficial del propietario o representante legal</td>
                  <td align="center"><i id="fff3" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin1').val(3); document.getElementById('id02_mo').style.display='block'"></i></td>
                  <td align="center">
                  <div id="f3"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div>
                  </td>
                  <td align="center"><textarea id="1commentc" name="1commentc" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Planos ó Croquis de terreno (medidas y colindancias)</td>
                  <td align="center"><i id="fff4" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin1').val(4); document.getElementById('id02_mo').style.display='block'"></i></td>
                  <td align="center">
                  <div id="f4"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div>
                  </td>
                  <td align="center"><textarea id="1commentd" name="1commentd" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Croquis de Localizaci&oacute;n</td>
                  <td align="center"><i id="fff5" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin1').val(5); document.getElementById('id02_mo').style.display='block'"></i></td>
                  <td align="center"><div id="f5"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commente" name="1commente" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Otros</td>
                  <td align="center"><i id="fff6" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin1').val(6); document.getElementById('id02_mo').style.display='block'"></i></td>
                  <td align="center"><div id="f6"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commentf" name="1commentf" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Relaci&oacute;n de indivisos de Condominio.</td>
                  <td align="center"><i id="fff7" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin110').val(15); document.getElementById('id020_mo').style.display='block'"></i></td>
                  <td align="center"><div id="f7"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commentg" name="1commentg" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Plano arquitectónico o croquis de construcción</td>
                  <td align="center"><i id="fff9" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin4444').val(17); document.getElementById('id04444_fo').style.display='block'"></i></td>
                  <td align="center"><div id="f9"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commenti" name="1commenti" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>        
                <tr>
                  <td style="color: black;">Plano arquitectónico contenido edificaciones de su uso privativo</td>
                  <td align="center"><i id="fff10" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin4444').val(18); document.getElementById('id04444_fo').style.display='block'"></i></td>
                  <td align="center"><div id="f10"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commentj" name="1commentj" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Plano del conjunto donde señalan las deferentes superficies constructivas</td>
                  <td align="center"><i id="fff11" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin4444').val(19); document.getElementById('id04444_fo').style.display='block'"></i></td>
                  <td align="center"><div id="f11"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commentk" name="1commentk" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Planos de Factores</td>
                  <td align="center"><i id="fff12" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin4444').val(20); document.getElementById('id04444_fo').style.display='block'"></i></td>
                  <td align="center"><div id="f12"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="1commentl" name="1commentl" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
              </table>
              <br><br>
              </center>
            </div>
            <div class="col-md-12 col-sm-12 table-responsive" id="t01_moral" style="display: none;">
              <center>
              <table id="t01_moral2" width="100%">
                <tr>
                  <th style="font-size: medium; text-align: center; width: 800px; background-color: #d0d8f3; color: black;">Documentos</th>
                  <th style="font-size: medium; text-align: center; width: 200px; background-color: #d0d8f3; color: black;">Subir Archivo</th>
                  <th style="font-size: medium; text-align: center; width: 200px; background-color: #d0d8f3; color: black;">Estatus</th>
                  <th style="font-size: medium; text-align: center; background-color: #d0d8f3; color: black;">Comentario</th>
                </tr>

                <input type="hidden" id="m1" name="m1" value="_">
                <input type="hidden" id="m2" name="m2" value="_">
                <input type="hidden" id="m3" name="m3" value="_">
                <input type="hidden" id="m4" name="m4" value="_">
                <input type="hidden" id="m5" name="m5" value="_">
                <input type="hidden" id="m6" name="m6" value="_">
                <input type="hidden" id="m7" name="m7" value="_">
                <input type="hidden" id="m8" name="m8" value="_">

                <input type="hidden" id="m9" name="m9" value="_">
                <input type="hidden" id="m10" name="m10" value="_">
                <input type="hidden" id="m11" name="m11" value="_">
                <input type="hidden" id="m12" name="m12" value="_">
                <input type="hidden" id="m13" name="m13" value="_">

                <input type="hidden" id="m11" name="m11" value="90">
                <input type="hidden" id="m21" name="m21" value="89">
                <input type="hidden" id="m31" name="m31" value="88">
                <input type="hidden" id="m41" name="m41" value="87">
                <input type="hidden" id="m51" name="m51" value="86">
                <input type="hidden" id="m61" name="m61" value="85">
                <input type="hidden" id="m71" name="m71" value="84">
                <input type="hidden" id="m81" name="m81" value="15">

                <input type="hidden" id="m82" name="m82" value="14">
                <input type="hidden" id="m83" name="m83" value="13">
                <input type="hidden" id="m84" name="m84" value="12">
                <input type="hidden" id="m85" name="m85" value="11">
                <input type="hidden" id="m86" name="m86" value="10">
                <tr>
                  <td style="color: black;">Acta Constitutiva de la Empresa</td>
                  <td align="center"><i id="mmm1" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(1); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="1m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commenta" name="commenta" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Nombramiento del Representante legal</td>
                  <td align="center"><i id="mmm2" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(2); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="2m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentb" name="commentb" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Boleta Predial</td>
                  <td align="center"><i id="mmm3" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(3); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="3m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentc" name="commentc" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Documento que acredite la propiedad</td>
                  <td align="center"><i id="mmm9" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin333').val(20); document.getElementById('id0333_mo').style.display='block'"></i></td>
                  <td align="center"><div id="9m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commenti" name="commenti" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Identificación Oficial del propietario o representante legal</td>
                  <td align="center"><i id="mmm4" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(4); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="4m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentd" name="commentd" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Planos ó Croquis de terreno (medidas y colindancias)</td>
                  <td align="center"><i id="mmm5" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(5); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="5m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commente" name="commente" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Croquis de Localizaci&oacute;n</td>
                  <td align="center"><i id="mmm6" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(6); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="6m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentf" name="commentf" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Otros</td>
                  <td align="center"><i id="mmm7" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin2').val(7); document.getElementById('id03_mo').style.display='block'"></i></td>
                  <td align="center"><div id="7m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentg" name="commentg" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Relaci&oacute;n de indivisos de Condominio.</td>
                  <td align="center"><i id="mmm8" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin110').val(15); document.getElementById('id020_mo').style.display='block'"></i></td>
                  <td align="center"><div id="8m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commenth" name="commenth" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Plano arquitectónico o croquis de construcción</td>
                  <td align="center"><i id="mmm10" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin333').val(21); document.getElementById('id0333_mo').style.display='block'"></i></td>
                  <td align="center"><div id="10m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentj" name="commentj" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Plano arquitectónico contenido edificaciones de su uso privativo</td>
                  <td align="center"><i id="mmm11" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin333').val(22); document.getElementById('id0333_mo').style.display='block'"></i></td>
                  <td align="center"><div id="11m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentk" name="commentk" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Plano del conjunto donde señalan las deferentes superficies constructivas</td>
                  <td align="center"><i id="mmm12" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin333').val(23); document.getElementById('id0333_mo').style.display='block'"></i></td>
                  <td align="center"><div id="12m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentl" name="commentl" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
                <tr>
                  <td style="color: black;">Planos de Factores</td>
                  <td align="center"><i id="mmm13" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="$('#domin333').val(24); document.getElementById('id0333_mo').style.display='block'"></i></td>
                  <td align="center"><div id="13m"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                  <td align="center"><textarea id="commentm" name="commentm" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                </tr>
              </table>
              </center>
            </div>
            <div id="fachada" style="display: none;">
              <h4 style="text-align: center; font-weight: bold;">Fachada del predio</h4>
              <br><br>
              <div  class="col-md-12 table-responsive" style="">
              <div class="col-md-12">
                <input type="hidden" id="karpetfach" name="karpetfach" value="_">
                <table id="bal"  width="100%">
                  <thead>
                    <tr>
                      <th style="font-size: medium; width: 530px;"></th>
                      <th style="font-size: medium; width: 200px;"></th>
                      <th style="font-size: medium; width: 220px;"></th>
                      <th style="font-size: medium;"></th>
                    </tr>
                  </thead>
                  <tbody id="" style="text-align: center;">
                    <tr>
                      <td style="text-align: left; color: black;">Imagen de Fachada</td>
                      <td><i id="rep2" class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer; display: none;" onclick="document.getElementById('id0f').style.display='block'"></i></td>
                      <td align="center"><div id="rep1"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></div></td>
                      <td align="center"><textarea id="comenfachada" name="comenfachada" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
            </div> 
            <div id="reporteFot">
              <h4 style="text-align: left; font-weight: bold;">Reporte Fotogr&aacute;fico Completo</h4>
              <br><br>
              <button id="btnat" class="btn" style="background-color: #1b2856; border-color: #1b2856; display: none;" onclick="$('#see').val('');$('#see').val('A');$('#domin3').val(1); document.getElementById('id0t').style.display='block'" >Agregar Tipolog&iacute;a</button>
              <center>
              <div class="col-md-12" >&nbsp;</div>
              <div class="col-md-12" >&nbsp;</div>
              <div  class="col-md-12 table-responsive" style="">
                <input type="hidden" id="karpet" name="karpet" value="_">
                <input type="hidden" id="karpeto" name="karpeto" value="12">
                <table id="G"  width="100%">
                  <thead>
                    <tr>
                      <th style="display:none;">No. Tipolog&iacute;a</th>
                      <th style="background-color: #d0d8f3; color: black;">No. Tipolog&iacute;a</th>
                      <th style="text-align: center; background-color: #d0d8f3; color: black;">Archivo de Construcci&oacute;n</th>
                      <th style="text-align: center; background-color: #d0d8f3; color: black;">Descargar </th>
                      <th style="text-align: center; background-color: #d0d8f3; color: black;">Editar Archivo</th>
                      <th style="text-align: center; background-color: #d0d8f3; color: black;">Estatus</th>
                      <th style="text-align: center; background-color: #d0d8f3; color: black;">Comentario</th>
                    </tr> 
                  </thead>
                  <tbody id="tipologs" style="text-align: center;">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-4"><br><br></div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
           


            <div id="hVerdes">
      <h5 style="font-weight: bold;"><br><br>Adjuntar archivo en hojas verdes<br>(Formato PDF)</h5>
      <br>
      <input type="file" name="archverdes" id="archverdes" onchange="upload_hverdes();">
    </div>

      <div id="hVerdesMal" style="display: none;">
     
      <p>Error al Adjuntar archivo en hojas verdes (Formato PDF),<br> intente de nuevo.<i class="fa fa-times fa-2x" style="margin-top: 10px; color: #911129;"></i></p>
      <br>
      <input type="file" name="archverdes2" id="archverdes2" onchange="upload_hverdes2();">
       </div>

    <div id="hVerdesBn" style="display: none;">
      <p>Archivo en hojas verdes <i class="fa fa-check fa-2x" style="margin-top: 10px; color: #497445;"></i></p>
      <br>
      <p>Ingresar el folio del avaluo (10 digitos)</p>
        <input type="text" name="folioDictaval" id="folioDictaval" maxlength="10">
        <br><br><br><br>
        <input type="button" name="guardarFolio" id="guardarFolio" class="btn btn-info" data-toggle="modal" data-target="#exampleModalpopover" value="Guardar Folio" onclick="guardarFolioDic();" style="background-color: #414558; border-color: #414558; color: white;">
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalpopover">Modal with tooltip</button>-->
    </div>


            </div>
            <div class="col-md-4">&nbsp;</div>
            </div>
            </div> 
            </div>
            </div>
            <center>
            <div id="btnoss" style="display: none;" class="col-md-12">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-4">
              <input type="button" id="acuseG" name="acuseG" class="btn" value="Guardar" style="display: none; background-color: #1b2856; border-color: #1b2856;" onclick="acuseG1();">
              <!--input type="button" id="acuseG22" name="acuseG22" class="btn btn-success" value="Guardar Cambios" style="display: none;"-->
              <input type="button" id="guardarBaldio" name="guardarBaldio" class="btn" value="Guardar" style="display: none; background-color: #1b2856; border-color: #1b2856;" onclick="guardarBaldio1();">
              <input type="button" id="guardarBaldioCambios" name="guardarBaldioCambios" class="btn" value="Guardar Cambios" style="display: none; background-color: #1b2856; border-color: #1b2856;" onclick="guardarBaldioCambios();">
              <input type="button" id="guardarCambiosTip" name="guardarCambiosTip" class="btn" value="Guardar Cambios" style="display: none; background-color: #1b2856; border-color: #1b2856;" onclick="guardarCambiosTip();">
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

    <div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">


</div>


<div class="col-md-1"></div>
</div>
  <br><br>
  <div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
       <div class="col-md-12">
    <div class="col-md-1"></div>
  <div class="col-md-10" style=""><br>
    
   <!--  <div class="col-md-12" style="text-align: right;">
      <input type="hidden" id="etapa" name="etapa" />
       <h3 style="text-align: center; font-weight: bold;">Dictamenes</h3><br><br>
       <div class="col-md-12">
         <div class="col-md-12" id="observacionGral" style="color: red; text-align: center;">
         </div>
       </div>
       <div class="col-md-12">
         <div class="col-md-12" id="descripcionSer"><h5 style="text-align: center;">Descripci&oacute;n de los Servicios o<br> Actividades que Realiza:</h5>
          <center>
           <textarea id="descpAc" name="descpAc" style="width: 400px; height: 100px;"></textarea>
           </center>
         </div>

       </div>
     

<div class="col-sm-12" style="">&nbsp;</div>
<div id="infoe" class="col-sm-12" style=""></div>
<div class="col-sm-12" style="">&nbsp;</div>

    </div>-->
<!--
<div id="btnoss" style="display: none;" class="col-md-12">
      <div class="col-md-4">&nbsp;</div>
      <div class="col-md-4">
      <input type="button" id="acuseG" name="acuseG" class="btn btn-success" value="Guardar" style="display: none;" onclick="acuseG1();">
     
      <input type="button" id="guardarBaldio" name="guardarBaldio" class="btn btn-success" value="Guardar" style="display: none;" onclick="guardarBaldio1();">
      <input type="button" id="guardarBaldioCambios" name="guardarBaldioCambios" class="btn btn-success" value="Guardar Cambios" style="display: none;" onclick="guardarBaldioCambios();">
      
      <input type="button" id="guardarCambiosTip" name="guardarCambiosTip" class="btn btn-success" value="Guardar Cambios" style="display: none;" onclick="guardarCambiosTip();">
      </div>
      <div class="col-md-4">&nbsp;</div>
    </div> -->
    <div class="col-md-12">&nbsp;</div>

</div>

</div>
  </div>
  <div class="col-md-1"></div>

 </div>
 </div> 

    <div class="modal fade" id="exampleModalpopover">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Registro de folio dictaval</h5>
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
 <script>
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
</body>

 <!-- <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div>
     <div class="col-md-12" style="height: 50px;">
       <div class="col-md-1" style=""></div>
       <div class="col-md-5" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en @ Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n <?php echo versionx;?></p>
       </div>
        <div class="col-md-1" style="height: 50px;"></div>
       <div class="col-md-4" style="margin-left: 23px;">
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-6 col-sm-6" align="right">
              <a href="https://twitter.com/IGECEM" target="_blank"><i class="fa fa-twitter" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="http://igecem.edomex.gob.mx/" target="_blank"><i class="fa fa-dribbble" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="https://www.facebook.com/IGECEM/" target="_blank"><i class="fa fa-facebook" style="font-size:30px; margin-left: 10px;"></i></a>
            </div>

       </div>
       <div class="col-md-1" style=""></div>
     </div>
  </footer>-->
</html>
