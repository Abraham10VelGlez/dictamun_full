<?php include '../web/validate.php'; 
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;
$ruta = explode("/", $url);
 $to=count($ruta);
$codigo = $ruta[$to-1]; 

?> 
    <!doctype html>
<html>
  <head>
   
    <title>DictaMun 2020</title>
 


   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script> 
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <?php include '../const.php'; ?> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 768px)" href="<?php echo SERVERURL; ?>_js/estilos.css">  <!--surface  duo -->
  <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1023px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
  <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
  <!-- <link rel="stylesheet" media="only screen and (min-width: 1367px) and (max-width: 1919px)" href="<?php //echo SERVERURL; ?>_js/estilos.css"> --> 
  <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <style>
  div#tblseg{
    display: none;
}
  </style>
  </head>

  <body ng-app="app2"  ng-controller="ControllerTab2">
    <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" id="banner">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br> 
    </div></center>  
   
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
          <li><a href="../DatosContribuyente/" style="font-size: medium;">Aviso Dictamen</a></li>  
          <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: medium;">
          Seguimiento <span class="caret"></span></a>
          <ul class="dropdown-menu" >
             <li><a  href="../SeguimientoContribuyente/" style="font-size: medium;">Dictamenes Registrados</a></li>  
             <li><a  href="../SeguimientoContribuyente2/" style="font-size: medium;">Dictamenes en Proceso</a></li>  
          </ul>
      </li>                    
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
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div>  
</nav>
</div> 


<div class="col-md-1"></div>
</div>
  <br><br>
  <div class="col-md-12"> 
  <div class="row"> 
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="background-color: #D3D9D1"><br>
          <div class="col-md-12" style="text-align: center; font-size: xx-large; font-weight: bold;"></div>

          <div class="col-md-12"><br>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="w3-card-4" style="width:100%;">
    <header id="app2" class="w3-container" style="background-color: #2B3229;">
      <CENTER><h3 style="color: white;">INMUEBLES QUE LE PERTENECEN AL FOLIO 00<?php echo $codigo;?></h3> </CENTER>
      <input type="hidden" id="_token" name="_token" value="<?php echo $codigo;?>"  />
    </header>
    <div id="app"  class="w3-container"><br>
      <div id="tblseg"  class="col-md-12 table-responsive">
      <table id="myTabl1e" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions" style="max-width: 100%; height: auto;">
      <thead> 
      <tr>
      <!--th>Folio de Presentación</th>
      <th style="display: none;">_</th>
        <th>No.Registro</th>
        <th>RFC</th>
        <th>Especialista</th>
        <th>Complemento</th>
        <th>Correo</th-->
        <th>Clave Catastral</th>
        <th>Estatus</th>
      <th style="display: none;">_</th>
        <th>No.Registro</th>
        <th>A&ntilde;o a dictaminar</th>
        <th>Especialista</th>
        <th>Municipio</th>
        <!--th>Aviso Dictamen</th-->          
        
        
      </tr>
    </thead>
        <tbody>

          <tr ng-repeat=" x in lista_a">
          <td>            
            <a href="" onclick="selection2()" />
            <!--  AD/{{x.fol}}/{{x.aniodictaminar}}/{{x.fecha}}-->           
            {{x.cve_catastral}}</a>                        
            </td>
            <td>{{x.etapadictamen}}</td>
            <td style="display: none;">
            {{x.id_inmueble}}                                 
            </td>     
            <td>{{x.norg}}</td>
            <td>{{x.aniodictaminar}}</td>
            <td>{{x.nombre_especialista}}</td>
            <td>{{x.id_municipio}}</td>  
            <!-- td>            
            <a href="" target="_blank" onclick="avisoD()"/>Descargar</a>                        
            </td -->       
                            
          </tr>
          
        </tbody>
    </table>
    <br><br><br>

    </div>
      </div>


    <footer class="w3-container" style="background-color: #2B3229;">
    </footer>
  </div>

      </div>
      <div class="col-md-1"></div>
    </div>

    <div class="col-md-12"> &nbsp;&nbsp; </div>
    <div class="col-md-12"> &nbsp;&nbsp; </div>
    <div class="col-md-12"> &nbsp;&nbsp; </div>
    
    
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/3.3.4bootstrap.min.css">
<link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">

    
    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br>



        </div>
        <div class="col-sm-2"></div>
      </div>
    </div>
  </div>
  </div> 



<div id="id01" class="modal modal-content animate">
  <form id="validationForm2" name="validationForm2" method="POST">
    <center><img src="<?php echo SERVERURL; ?>_img/error.png" width="70" height="70">
    </center>
    <br><br>
      <h3 style="text-align: center; font-weight: bold; margin-top: -40px;">No se encuentran dictamenes registrados en ese rango de fechas.</h3>
    <div class="c">   
       <center>
      <button type="submit" class="btn btn-success" style="width: 100px;" onclick="document.getElementById('id01').style.display='none'">Aceptar</button>
      <br><br>
    </center> 
    </div> 
  </form>
</div>

<div id="id02" class="modal">
   <form class="modal-content animate" id="formulario" name="formulario" method="POST" style="height: 300px;"> 
    <div class="imgcontainer">
       <input type="text" name="editP" id="editP" style="display: none;">
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">
        <label>Editar Informaci&oacute;n personal del contribuyente<br><br></label>
      <input type="text" name="idSe" id="idSe" value="<?php echo $_SESSION["idkey1"]; ?>" style="display: none;">
       </center>  

      <div class="col-md-5">
         <label style="text-align: right;">Telefono: </label>
      </div>
       <div class="col-md-7">
         <input type="text" maxlength="10" onkeyup="validaNumericos2()" onblur="validaNumericos2()" ng-model="tel" name="tel" id="tel">
      </div>
      <div id="msjTel" name="msjTel" style="color:  #c22708;" hidden="">Telefono Incorrecto. Introducir solo números, no dejar el campo vacio.</div>

       <div class="col-md-5">
         <label style="text-align: right;">Usuario: </label>
      </div>
       <div class="col-md-7">
         <input type="text" name="user" id="user">
      </div>

       <div class="col-md-5">
         <label style="text-align: right;">Contraseña: </label>
      </div>
       <div class="col-md-7">
         <input type="text" name="con" id="con">
         <br><br><br>
      </div>


    <div>
      <center>
      <button type="button" onclick="guardarCambiosD();" class="btn btn-success">Guardar</button>
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="btn btn-danger">Cancelar</button>
      </center>
    </div>  
 
      </div> 

     <div id="id03" class="modal modal-content animate" style=" position: absolute; height: 155px;">
    
    <center>
    <div class="c">
     <label>Datos Incorrectos, vericar.<br><br></label>
        <br>
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-success">Ok</button>
    </div>
  </center> 

      </div> 

      <div id="id04" class="modal modal-content animate" style=" position: absolute; height: 155px;">
    <center>  
    <div class="c">    
       <div class="">
        <label>Datos Guardado Correctamente.<br><br></label>
       </center>  
    
    <div>
      <center>
      <button type="button" onclick="okValidado2();" class="btn btn-success">Ok</button>
      </center>
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


    
    <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app8_inmubles.js"></script> 
    
  </body>

  <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div> 
     <div class="col-md-12" style="height: 50px;">
       <div class="col-sm-2" style=""></div>
       <div class="col-sm-4" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n <?php echo versionx;?></p>
       </div> 
        <div class="col-sm-1" style="height: 50px;"></div>
       <div class="col-sm-3" style="margin-left: 23px;">
            <div class="col-md-6 col-sm-6"></div>
            <div class="col-md-6 col-sm-6" align="right">
              <a href="https://twitter.com/IGECEM" target="_blank"><i class="fa fa-twitter" style="font-size:30px; margin-left: 10px; color: #61A1AF"></i></a>
              <a href="http://igecem.edomex.gob.mx/" target="_blank"><i class="fa fa-dribbble" style="font-size:30px; margin-left: 10px; color: #61A1AF"></i></a>
              <a href="https://www.facebook.com/IGECEM/" target="_blank"><i class="fa fa-facebook" style="font-size:30px; margin-left: 10px; color: #61A1AF"></i></a>
            </div> 
       
       </div> 
       <div class="col-sm-2" style=""></div>
     </div>
  </footer> 
</html>