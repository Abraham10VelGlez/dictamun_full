<?php include '../web/validateR.php'; 

$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;

$ruta = explode("/", $url);
$to=count($ruta);
//echo "<br>total:".$to;
//echo "<br>".$ruta[$to-1]; 

?> 

<!doctype html>
<html ng-app="ContrApp">
  <head>
    <!--script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script-->
    
    
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <?php include '../const.php'; ?> 
 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery.dataTables.min.js"></script>


  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app.js"></script> 
   
   <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
   --> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

  <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
     
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
  width: 25%; /* Could be more or less, depending on screen size */
  height: 370px;
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
    <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png">
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
      <a class="navbar-brand" href="#" style="color: white;"><img src="<?php echo SERVERURL; ?>_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a> 
    </div>
    <ul class="nav navbar-nav"> 
      <li><p style="color: #E6EAE7; font-weight: bold; margin-top: 15px; font-size: large;">DICTAMUN</p></li> 
    </ul> 
     <ul class="nav navbar-nav navbar-right"> 
      <li><a style="margin-top: 4px;" href="../SeguimientoRevisor/<?php echo $ruta[$to-1]; ?>">Búsqueda</a></li>

      <li><a style="margin-top: 4px;" href="../ListaSegRevisor/<?php echo $ruta[$to-1]; ?>">Aviso de Dictamenes</a></li>
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp;  
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesión" id="killer"></i>   
        <input type="hidden" id="kernel" name="kernel" value="<?php echo $ruta[$to-1]; ?>" /> 

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
    <div class="col-md-1"></div> 
  <div class="col-md-10" style="background-color: #D3D9D1"><br>
     <div class="col-sm-12" style="text-align: right;">
       <h4 style="text-align: center; font-weight: bold;">Dictamenes Asignados</h4><br><br><br>
       <center>
          <table id="example" class="display" style="width:100%">  
        <thead>
            <tr>
              <th style="text-align: center; font-size: x-small;">Folio de Presentación</th>
              <th style="text-align: center; font-size: x-small;">Fecha y Hora</th>
              <th style="text-align: center; font-size: x-small;">Año a Dictaminar</th>
              <!--<th style="text-align: center; font-size: x-small;">RFC Contribuyente</th>-->  
              <th style="text-align: center; font-size: x-small;">Contribuyente</th> 
              <th style="text-align: center; font-size: x-small;">No.Registro</th>
              <th style="text-align: center; font-size: x-small;">Clave Catastral</th>
              <th style="text-align: center; font-size: x-small;">Valor Catastral</th>
              <th style="text-align: center; font-size: x-small;">Tipo</th> 
              <th style="text-align: center; font-size: x-small;">Estatus</th>
              <th style="text-align: center; font-size: x-small;">Municipio</th>   
            </tr>
        </thead>
        <tbody> 
            <tr> 
               <td style="text-align: center;"><a href="../SegDictamen/<?php echo $ruta[$to-1]; ?>">A/00001/2020</a></td>
               <td style="text-align: center;">18/02/2020</td>  
               <td style="text-align: center;">2018</td>
               <!--<td style="text-align: center;">AABE940213MMCLNL05</td>-->
               <td style="text-align: center;">Juan Perez Perez</td>
               <td style="text-align: center;">13</td>  
               <td style="text-align: center;">400023009309048</td>
               <td style="text-align: center;">$25,000,000</td>  
               <td style="text-align: center;">Normal</td>
               <td style="text-align: center;">En proceso</td>
               <td style="text-align: center;">Naucalpan de Juarez</td>  
               
            </tr>  
        </tbody>
        <tfoot>
            <tr>
              <th style="text-align: center; font-size: x-small;">Folio de Presentación</th>
              <th style="text-align: center; font-size: x-small;">Fecha y Hora</th>
              <th style="text-align: center; font-size: x-small;">Año a Dictaminar</th>
             <!-- <th style="text-align: center; font-size: x-small;">RFC Contribuyente</th> --> 
              <th style="text-align: center; font-size: x-small;">Contribuyente</th>
              <th style="text-align: center; font-size: x-small;">No.Registro</th>
              <th style="text-align: center; font-size: x-small;">Clave Catastral</th>
              <th style="text-align: center; font-size: x-small;">Valor Catastral</th>
              <th style="text-align: center; font-size: x-small;">Tipo</th> 
              <th style="text-align: center; font-size: x-small;">Estatus</th>
              <th style="text-align: center; font-size: x-small;">Municipio</th>
            </tr>
        </tfoot>
    </table>
    <br><br><br>
       </center>
     </div>
     <br><br><br>
    
    <br><br><br><br>
    </div>
    <div class="col-md-1"><br><br></div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

  </div> 
  <div class="col-sm-2"></div> 
 </div>
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