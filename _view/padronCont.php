<!doctype html>
<html >
  <head>
    
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php include '../const.php'; ?>
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <!--script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  

  </head>

  <body >
    <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png" style="max-width: 100%; height: auto;">
       <br><br>
      <h1 style="font-weight: bold;">Dictamen Municipal</h1>
      <br><br> 
    </div></center>  
  
  <div class="col-md-12">
    <div class="col-md-2"></div>
    <div class="col-md-8">
  
<nav class="navbar navbar-inverse" style="background-color: #606A5D; margin-left: -22px; margin-right: -22px; height: 55px; border-color: #606A5D">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: white;"><img src="<?php echo SERVERURL; ?>_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a> 
    </div>
    <ul class="nav navbar-nav"> 
      <li><p style="color: #E6EAE7; font-weight: bold; margin-top: 15px; font-size: large;">DICTAMUN</p></li> 
    </ul>  
    <ul class="nav navbar-nav navbar-right"> 
      <li><a style="margin-top: 4px;" href="Inicio">Regresar A Inicio</a></li>             
      <li>     
        <i style="color: #E6EAE7; cursor: pointer; margin-top: 10px; margin-right: 10px;" class="fa fa-home fa-2x"  title="Retorna a Inicio" ></i>
        </li>               

    </ul>  

  </div>
</nav>
</div> 


<div class="col-md-2"></div>
</div>
  <br><br>
  <div class="col-md-12"> 
  <div class="row">  
    <div class="col-sm-2"></div> 
  <div class="col-sm-8" style="background-color: #D3D9D1"><br><br> 
    
    <div class="col-sm-12" style="text-align: center; font-weight: bold;"><h3>Padrón de Dictaminadores</h3></div>
    <div class="col-sm-12"><br>
    
      
    
    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/3.3.4bootstrap.min.css">
<link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">
<script type="text/javascript">

$(document).ready(function () {	

/*
		$('#table_d').dataTable( {
	paging: false,
	searching: false
	} );
	*/
	
});
</script>
    
    <div ng-app="app1" ng-controller="ControllerTab1" class="table-responsive">

<table id="table_d" class="table table-striped table-bordered xa" datatable="ng" dt-options="vm.dtOptions">
<thead>
<tr>
<th style="display: none;">_</th>
        <th>No.Registro</th>
        <th>RFC</th>
        <th>Especialista</th>
        <th>Telefono</th>
        <th>Correo</th>
      
</tr>
</thead>
<tbody>
<tr ng-repeat="x in empList">
<td style="display: none;">
						{{x.id_tmp}}																	
						</td>	    
						<td>{{x.no_reg_autorizado}}</td>
						<td>{{x.rfc}}</td>
						<td>{{x.nombre_especialista}}						
						</td>
						<td>{{x.telefono}}</td>
						<td>{{x.correo}}</td>
</tr>
</tbody>
</table>
</div> 
      <br><br><br></div>
    <br><br> <br><br> <br><br> <br><br> <br><br>  
   

  </div> 
  <div class="col-sm-2"></div> 
 </div>
 </div>



  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app_info.js"></script>
  
   
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