<!doctype html>
<html ng-app="ContrApp">
  <head>
    <!--script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script-->
    
    
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 

 <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script> 
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <?php include '../const.php'; ?> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app.js"></script> 

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">


          $(document).ready(function() {
          $('#example').DataTable({ 
               "language": {
               "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
             }
            }
            );
          } );
        </script> 

  <style>
body {font-family: Arial, Helvetica, sans-serif;}

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
.cancelbtn {
     width: 100%;
  }
}
</style>     
   <style type="text/css">
     table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}  
   </style>

  </head>

  <body ng-controller="CtrbyController">
    <center><div class="col-sm-12" style=""><img src="../_img/banner2.png">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br> 
    </div></center>  
  
  <div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">
  
<nav class="navbar navbar-inverse" style="background-color: #606A5D; margin-left: -22px; margin-right: -22px; height: 55px; border-color: #606A5D">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: white;"><img src="../_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a> 
    </div>
    <ul class="nav navbar-nav"> 
      <li><p style="color: #E6EAE7; font-weight: bold; margin-top: 15px; font-size: large;">DICTAMUN</p></li> 
    </ul> 
     <ul class="nav navbar-nav navbar-right"> 
      <li><a style="margin-top: 4px;" href="/DictaMun/_view/dictamenesDi.php">Dictamenes</a></li>
      <li><a style="margin-top: 4px;" href="/DictaMun/_view/dictaminar.php">Dictaminar</a></li>
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;">Usuario &nbsp; &nbsp; 
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesión" onclick="cerrarSesion();"></i>
      </p></li>  

    </ul> 
  </div>
</nav>
</div>  

 
<div class="col-md-1"></div>
</div>
  <br><br>
  <div class="col-md-12"> 
  <div class="row">  
    <div class="col-sm-1"></div> 
  <div class="col-sm-10" style="background-color: #D3D9D1"><br>
     <div class="col-sm-12" style="text-align: right;">
       <h3 style="text-align: center; font-weight: bold;">Los Formatos Permitidos son: PDF, JPG o DWG</h3>
       <h6 style="text-align: center; margin-top: -10px;">(excepto archivos Dictaval y Construcciones)</h6>
       <br>
       <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: center; font-weight: bold;">Tipo de Archivo:</h4></div>
         <div class="col-md-9"><h4 style="text-align: center; font-weight: bold;">Comentario</h4></div>
        
       </div>
        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Archivo Dictaval:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 3500 KB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

       <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Archivo de Construcción:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 3500 KB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

       <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Formato del Avalúo:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 3500 KB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Documento que Acredite la Propiedad:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 5000 KB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Plano o Croquis del Terreno con medidas y colindancias:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 40 MB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Certificado de Clave Catastral y/o Recibo de pago del impuesto Predial:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 500 KB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Planos Arquitectonicos del levantamiento de las Construcciones:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 40 MB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Relación de Indivisos de Condominios:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 500 KB</h6>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Otros:</h4><br>
          <h6 style="text-align: left; margin-top: -20px; color: red;">Tamaño Máximo 3500 KB</h6>
         </div>
         <div class="col-md-9"><h4 style="text-align: left;">Especificar:</h4> <textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br><br><br>
       </div>

       <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Comentario General:</h4><br>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 100px;"></textarea></div>
         <br><br><br><br><br><br><br>
       </div>
       <br><br>
       <h4 style="text-align: left; font-weight: bold;">Reporte fotográfico completo</h4>
       <h6 style="text-align: left; font-weight: bold;">Estos Archivos deben ser en formato ZIP o PPT</h6>
       <h6 style="text-align: left; color: red;">(Tamaño Máximo: 10 MB)</h6>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: center; font-weight: bold;">Archivo Construcción</h4><br>
         </div>
         <div class="col-md-9"><h4 style="text-align: center; font-weight: bold;">Comentario</h4> </div>
         <br><br><br><br>
       </div>

        <div class="col-md-12">
         <div class="col-md-3"><h4 style="text-align: left;">Archivo</h4><br>
         </div>
         <div class="col-md-9"><textarea style="width: 600px; height: 60px;"></textarea></div>
         <br><br><br><br>
       </div>

       </div>
       <center>
        <div id="result">
     <div class="col-md-12">
      <br><br>
      <div class="col-md-4"></div>
      <div class="col-md-2"><input type="button" name="export" class="btn btn-primary" value="Enviar"> </div>
      <div class="col-md-2"><input type="button" name="salir" class="btn btn-danger" value="Cancelar"> </div>
      
      <div class="col-md-4"><br><br><br><br></div>
    </div>
    </div>
       </center>

   
     </div>
     <br><br><br>
    
    <br><br><br><br>
    </div>
    <div class="col-md-1"><br><br></div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

  </div> 
  <div class="col-md-1"></div> 
 </div>
 </div>

 <div id="id01_mo" class="modal" style="display: none;">
    
  <form class="modal-content animate" action="/contribuyente.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01_mo').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <center>
        <br>
      <img src="../_img/document.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </center>  
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">
        <label>Seleccionar archivo correspondiente al documento referido.<br>Tipo de extención permitidas: .val <br><br><br><br></label>
      <label for="exampleInputFile"></label>
        <center><input type="file" id="fileToUpload" onchange="upload_val();"></center>
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
 
<script>
// Get the modal
var modal = document.getElementById('id01_mo');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script> 
</body>

  <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div> 
     <div class="col-md-12" style="height: 50px;">
       <div class="col-md-1" style=""></div>
       <div class="col-md-5" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versión <?php echo versionx;?></p>
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
  </footer> 
</html>