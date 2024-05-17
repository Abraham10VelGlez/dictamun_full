<?php include '../web/validatejr.php'; ?>
<!doctype html>
<html >
  <head>
    
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script> 
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
  <?php include '../const.php'; ?>
  <!--Descargarlas --> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 768px)" href="<?php echo SERVERURL; ?>_js/estilos.css">  <!--surface  duo -->
  <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1023px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
  <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
  <!-- <link rel="stylesheet" media="only screen and (min-width: 1367px) and (max-width: 1919px)" href="<?php //echo SERVERURL; ?>_js/estilos.css"> --> 
  <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 



 <!-- +++++++++++++++++ --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  
 


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

  <body ng-app="Appcahsview" ng-controller="AppcahsviewControllerTab" >
    <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" id="banner">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br> 
    </div></center>  
  
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
      <li><a style="margin-top: 4px;" href="../BusquedaAdmin/">Regresar</a></li>      
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp; 
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesión" id="killer" ></i>
      
        </p></li>
      
        

    </ul> 
  </div>
</nav>
</div>  

 
<div class="col-md-1"></div>
</div></div>
  <br><br>
  <div class="col-md-12"> 
    <div class="col-md-12"> 
  <div class="row">  
    <div class="col-sm-1"></div> 
  <div class="col-sm-10" style="background-color: #D3D9D1"><br>
     <div class="col-sm-12" style="text-align: right;">
       <h3 style="text-align: center; font-weight: bold;">Busqueda - Dictamen</h3><br><br>
       <div class="col-md-12">  
         
<script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>       
         <table id="table_cashs" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions">
<thead>
<tr>
 <td style="display: none;">_</td>	    
						<td>FOLIO DICTAMEN</td>            
						<td>ESPECIALISTA</td>
						<td>No REGISTRO</td>
						<td>FECHA DE VALIDACION</td>						
            <td>MUNICIPIO</td>
            <td>CLAVE CAT</td>
            <td>VALOR TOTAL DEL AVALUO</td>
            <td>TARIFA</td>
            <td>MONTO POR CONCEPTO</td>
            <td>No FACTURA</td>
            <td>FECHA DE PAGO</td>	
      
</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList_P">
            <td style="display: none;">{{x.idok}}</td>	    
						<td>{{x.folio_de_dictamen}}</td>            
						<td>{{x.especialista}}</td>
						<td>{{x.node_registro}}</td>
						<td>{{x.fecha_validacion1}}</td>						
            <td>{{x.municipio}}</td>
            <td>{{x.folio_avaluos_catastral_para_efectos_de_dictamen}}</td>
            <td>{{x.valor_total_del_avaluo}}</td>
            <td>{{x.tarifa}}</td>
            <td>{{x.monto_por_concepto_de_validacion_y_revision}}</td>
            <td>{{x.nofactura}}</td>
            <td>{{x.fecha_de_pago}}</td>						
</tr>
</tbody>
</table>
       </div>

       <div class="col-md-12">
         <div class="col-md-4"></div>
         <div class="col-md-4">
           <center>
            <br>
              
           </center>
         </div>
         <div class="col-md-4"></div>
       </div>

       <br>
       
       <center>
      
       </center>

   
     </div>
     <br><br><br>
    
    <br><br><br><br>
    </div>
    <div class="col-md-1"><br><br></div>
   

  </div> 
  <div class="col-md-1"></div> 
 </div> </div>
 </div>

 
 
   
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appa2.js"></script>


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