<?php include '../web/validatejr.php';
include '../const.php';
// include '../web/validateDGF.php';

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;

$ruta = explode("/", $url);
$to=count($ruta);

$folioCompleto=str_pad($ruta[$to-1], 5, "0", STR_PAD_LEFT);
$id_di=$ruta[$to-1];
$an = explode("?", $id_di);
 $an2 = $an[0];// año a dictaminar
 $cla = $an[1]; //clave catastral
$gvafff = $an[2];


?>

    <!doctype html>
<html ng-app="todoApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Datos Generales</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">


    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SERVERURL; ?>_img/favicon.ico">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo jsdict; ?>vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?php echo jsdict; ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo jsdict; ?>css/style.css" rel="stylesheet">

    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
    <script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appa3_exeelim.js"></script>
</head>

  <body>
 <input type="hidden" id="idG" name="idG" value="<?php echo $cla;  ?>" />
      <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $an2;  ?>" />
      <input type="hidden" id="gva" name="gva" value="<?php echo $gvafff;  ?>" />
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
              <div style="color: black;" class="col-xl-2">Folio del Dictamen:<br><div id="">DICX/0000<?php echo$cla;?>/<?php echo$an2;?></div><br></div>
               <div class="col-xl-5"><br><br><br><br>
                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaa">
                                            <button type="button" class="close" onclick="button_exe();" ><span><i class="mdi mdi-close" ></i></span>
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
                                            <button type="button" class="close" onclick="document.getElementById('alertaa2').style.display='none';" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatus2">No puede "Autorizar" el dictamen si el archivo en hojas verdes no es correcto.</h6>
                                                    <p class="mb-2" id="alertaStatusMotivo2">Por tal motivo debera activar la casilla "Si" en el apartado de "Archivos Recibidos"</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert-primary left-icon-big alert-dismissible fade show" style="display: none; border-top: -10px;" id="alertaaCom">
                                            <button type="button" class="close" onclick="document.getElementById('alertaaCom').style.display='none';" ><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-email-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-1 mb-1" id="alertaStatusCom">Comentarios guardados correctamente</h6>
                                                    <p class="mb-2" id="alertaStatusMotivoCom">Puede continuar con la revisión</p>

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
                           ADMINISTRADOR:   <?php echo $_SESSION['usuarioactual']; ?>

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
                                class="mdi mdi-magnify"></i><span class="nav-text">Dictamenes</span></a>
                        <ul aria-expanded="false">
                           <li><a href="../Busqueda/">Búsqueda</a></li>
                           <li><a href="../BusquedaAdmin/">Lista general</a></li>
                           <li><a href="../DicPendientesAdmonP/1">Pendientes para autorizar</a></li>
                           <li><a href="../DicRechazados/1">Rechazados Admon</a></li>
                        </ul>
                    </li>

                     <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Pagos</span></a>
                        <ul aria-expanded="false">
                            <li><a href="../PPago/">Ordenes de Pago</a></li>

                            <li><a href="../Admin2Gris/">Validar</a></li>
                        </ul>
                    </li>
                    <li><a  href="javascript:voidclose()" aria-expanded="false"><i class="ti-close"></i><span class="nav-text">Cerrar Sesión</span></a>

                    </li>
                </ul>
            </div>
        </div>

        <div class="content-body">

      <div class="col-md-12" style="text-align: center;">
      <input type="text" name="idInmu" id="idInmu" value="<?php echo $cla; ?>" hidden="">
       <input type="hidden" id="anioDic" name="anioDic" value="<?php echo $an2;  ?>" />
      <input type="text" name="idCompl" id="idCompl" value="<?php echo $folioCompleto; ?>" hidden="">

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
                          <div class="row">
                            <div class="col-md-12">
                              <br><br><br><br>
                              <center style="color: red;">
                            <h4>Eliminar Definitivamente</h4>
                              </center>

                              <br><br>
                              <center>
                              <button id="saver" type="button" class="btn btn-success btn-flat btn-addon m-b-10 m-l-5"><i class="ti-unlink"></i> Ahora </button>
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
                          <input type="hidden" name="tipologias" id="tipologias">
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





 <div id="id01" class="modal" style="display: none;">

  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <center>
        <br>
      <img src="<?php echo SERVERURL; ?>_img/edit.PNG" alt="Avatar" class="avatar" style="width: 130px;">
    </center>
    </div>
    <center>
    <div class="c">
       <div class="form-group">
        <label>Comentarios guardados<br>correctamente<br></label>
        <center>
     <input type="button" class="btn btn-success" name="preValidar2" id="preValidar2" value="Ok" onclick="document.getElementById('id01').style.display='none'" style="width: 150px;">
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
      <img src="<?php echo SERVERURL; ?>_img/document.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </center>
    </div>
    <center>
    <div class="c">
       <div class="form-group">
        <label>Dictamen Pre Validado.<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-success" name="preValidar" id="preValidar" value="Ok" onclick="prevalidado();" style="width: 150px;">
        </center>
      <p class="help-block"></p>
      </div>
     <div class="upload-msg"></div>
    </div>
  </center>
  </form>

</div>
<div id="id03" class="modal" style="display: none;">

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
     <input type="button" class="btn btn-success" name="preRechazo" id="preRechazo" value="Ok" onclick="preRechazo2();" style="width: 150px;">
        </center>
      <p class="help-block"></p>
      </div>
     <div class="upload-msg"></div>
    </div>
  </center>
  </form>

</div>
<div id="id04" class="modal" style="display: none;">

  <form class="modal-content animate" action="/seguimiento.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
      <center>
        <br>
      <img src="<?php echo SERVERURL; ?>_img/document.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </center>
    </div>
    <center>
    <div class="c">
       <div class="form-group">
        <label>Dictamen Autorizado.<br><br><br><br></label>
        <center>
     <input type="button" class="btn btn-success" name="autorizado2" id="autorizado2" value="Ok" onclick="o();" style="width: 150px;">
        </center>
      <p class="help-block"></p>
      </div>
     <div class="upload-msg"></div>
    </div>
  </center>
  </form>

</div>


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

    <script type="text/javascript">
    function voidindex(){
      location.href = "../BusquedaAdmin/";
    }



    </script>

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
