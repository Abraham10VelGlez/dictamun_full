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
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery.dataTables.min.js"></script>

 <!-- +++++++++++++++++ --> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1366px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 
 <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="<?php echo SERVERURL; ?>_js/estilos.css"> 

  
  

  <style>
  input#bavg{
    display: none;
  }
  div#a1{
    display: none;
  }
    div#a2{
      display: none;
  }
    div#a3{
      display: none;
  }
    div#a4{
      display: none;
  }  div#a5{
    display: none;
  }  div#a6{
    display: none;
  }  div#a7{
    display: none;
  }
    div#a8{
      display: none;
  }
  div#a23{
      display: none;
  }
  
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

  <body ng-app="apptblsearchj" ng-controller="apptblsearchjControllerTab1" >
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
      <li><a style="margin-top: 4px;" href="../BusquedaAdmin/">Búsqueda</a></li>
      <li><a style="margin-top: 4px;" href="../PPago/">Proceso de Pago</a></li>
      <li><a style="margin-top: 4px;" href="../validaPag/">Validar Pagos</a></li>
      <li><a style="margin-top: 4px;" href="../Control/">Control de Pagos</a></li>
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp; 
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar SesiÃƒÂ³n" id="killer" ></i>
        <input type="hidden" id="kernel" name="kernel" value="<?php echo $adm = $_GET['link']; ?>" />  
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
       <h3 style="text-align: center; font-weight: bold;">Búsqueda - Dictamen</h3><br>
       <div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>       

       <div class="col-md-12 text-center">
         <div class="col-md-3">
          <a id="searchf" > <i class="fa fa-search" ></i> Búsqueda por Fechas</a>
         </div>
         <div class="col-md-3">
          <a id="searchcc"> <i class="fa fa-search" ></i> Búsqueda por Nombre del Contribuyente</a>
         </div>
         <div class="col-md-3">
          <a id="searchrvs" > <i class="fa fa-search" ></i> Búsqueda por Revisor</a>
         </div>
       
         <div class="col-md-3">
          <a id="searchstts"> <i class="fa fa-search" ></i> Búsqueda por Estatus del dictamen</a>
         </div>
       </div>
       
       <input type="hidden" id="opt" name="opt" >
       <div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>

       <div class="col-md-12 text-center">
       <div class="col-md-3">
       
          <a id="searchepx"> <i class="fa fa-search" ></i> Búsqueda por Especialista</a>
         </div>
         <div class="col-md-3">
          <a id="searchnodc"> <i class="fa fa-search" ></i> Búsqueda por  No. Dictamen</a>
         </div>
         <div class="col-md-3">
          <a id="searchmun"> <i class="fa fa-search" ></i> Búsqueda por  Municipio</a>
         </div>                
         <div class="col-md-3">
          <a id="searchrfc"> <i class="fa fa-search" ></i> Búsqueda por  RFC</a>
         </div>
       </div>

       <div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>
       <div class="col-md-12 text-center">
       <div class="col-md-3">
       
          <a id="searchclv"> <i class="fa fa-search" ></i> Búsqueda por Clave Catastral</a>
         </div>
        

       <div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>


       <div id="a1" class="col-md-12">      
         <div class="col-md-4">
          Fecha Inicial:   
          <input type="date" id="fechaI" name="fechaI" ng-model="fechaI" >
         </div>
         <div class="col-md-4">
          Fecha Final:
          <input type="date" id="fechaF" name="fechaF" ng-model="fechaF"  >
         </div>                
         <div class="col-md-4">
          Año de Presentación: <select id="an" name="an" ng-model="an" style="width: 100px;">          
      <option>2011</option>
      <option>2012</option>
      <option>2013</option>
      <option>2014</option>
      <option>2015</option>
      <option>2016</option>
      <option>2017</option>
      <option>2018</option>
      <option>2019</option>
      <option>2020</option>      
      </select>
          
      </div>
       </div>
       <div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>
    

       <div id="a2" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
           Municipio: <select ng-model="municcz" id="municcz" name="municcz" style="width: 152px; height: 25px; margin-top: 5px;">          </select>
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>

       <!--div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div-->

       
       <div id="a3" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
           No. Dictamen: <input type="text" ng-model="nod" id="nod" name="nod" style="width: 152px;">
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>

       <!--div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div-->

              <div id="a4" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
           Especialista: <select id="espx" name="espx" ng-model="espx" style="width: 152px; height: 25px; margin-top: 5px;">             
            </select>
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>

       <!--div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div-->

        <div id="a5" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
          Revisor: <select id="rvs" name="rvs" ng-model="rvs" style="width: 152px; height: 25px; margin-top: 5px;">              
            </select>
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>

       <!--div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div-->

        <div id="a6" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
          Estatus: <select id="stt" name="stt" ng-model="stt"  style="width: 152px; height: 25px; margin-top: 5px;">
          
              
               <option value="1">REGISTRO DE DICTAMEN</option> 
              <option value="3">PENDIENTE DE ASIGNAR</option>
              <option value="2">PENDIENTE DE CONTRIBUYENTE vobo</option>              
              <option value="4">ASIGNADO A REVISOR</option>
              <option value="5">OBSERVADO POR REVISOR</option>
              <option value="6">AUTORIZADO</option>
              <option value="7">PENDIENTE DE PAGO</option>
              <option value="11">RECHAZADO</option>
              <option value="15">VALIDADO</option>
              
            </select>
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>

       <!--div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div-->

         <div id="a7" class="col-md-12">
        <div class="col-md-4">
         Nombre: <input type="text" id="nomco" name="nomco" ng-model="nomco" style="width: 152px;">
         </div>
         <div class="col-md-4">
          Apellido Paterno: <input type="text" id="nomco2" name="nomco2" ng-model="nomco2" style="width: 152px;">                    
         </div>
          <div class="col-md-4">
          Apellido Materno: <input type="text" id="nomco3" name="nomco3" ng-model="nomco3" style="width: 152px;">
         </div>
       </div>

       <!--div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div-->


       <div id="a8" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
          RFC: <input type="text" id="rfsear" name="rfsear" ng-model="rfsear" style="width: 152px;">
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>
       <div id="a23" class="col-md-12">
        <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
         <div class="col-md-5">
          Clave Catastral: <input type="text" id="clv" name="clv" ng-model="clv" style="width: 152px;">
         </div>
          <div class="col-md-2">
          <a>&nbsp;&nbsp;</a>
         </div>
       </div>

       


       <div class="col-md-12">
         <div class="col-md-4"></div>
         <div class="col-md-4">
           <center>
            <br>
             <input id="bavg" type="button" name="buscar" class="btn btn-success" value="Buscar" ng-click="buscarDictaj()"> 
           </center>
         </div>
         <div class="col-md-4"></div>
       </div>
       <div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>
       <div class="col-md-12">
         <div class="col-md-4"></div>
         <div class="col-md-4">
           <center id="in">
              
           </center>
         </div>
         <div class="col-md-4"></div>
       </div>
<div class="col-md-12">&nbsp;&nbsp;</div><div class="col-md-12">&nbsp;&nbsp;</div>
<br>
<div id="alertb" style="display: none;">
       <h4 style="text-align: center; color:red;"> Esta búsqueda tiene 0 Resultados</h4><br>
</div>
       <br>
       <h4 style="text-align: left;">Resultados</h4><br>
       <center>
       
        <div id="result" style="display: none;">
          <div class="col-md-12"> 
            <div class="col-md-5"><h5 style="font-weight: bold; text-align: left;">Criterios de Búsqueda Seleccionados:</h5></div>
            <div class="col-md-7"><h5 id="infof" style="text-align: left;"></h5>

            </div>
          
          </div>
          <!--div class="col-md-12"> 
            <div class="col-md-2" style="font-weight: bold;">Total de Avisos:</div>
            <div class="col-md-1">1</div>
            <div class="col-md-3" style="font-weight: bold;">Total de Dictamenes:</div>
             <div class="col-md-1">14</div>
            <div class="col-md-4" style="font-weight: bold;">Total de Dictamenes en el Municipio:</div>
            <div class="col-md-1">0
              <br><br><br><br>
            </div>

          </div-->
          <div class="col-md-12">
            <h5 style="font-weight: bold;">DICTAMENES ENCONTRADOS</h5>
          </div>
          <form id="myForm">
       <div class="col-md-12 table-responsive">
          <table id="example" class="display" style="width:100% font-size: x-small;" datatable="ng" dt-options="vm.dtOptions">  
        <thead>
            <tr>
              <th style="text-align: center;display: none;">No.</th>
              <th style="text-align: center;">Clave catastral</th>
              <th style="text-align: center;">Folio de dictamen</th>
              <th style="text-align: center;">Fecha Presentación</th>
              <th style="text-align: center;">Tipo</th>  
              <th style="text-align: center;">Contribuyente</th>              
              <th style="text-align: center;">Especialista</th>
              <th style="text-align: center;">Revisor</th>
              <th style="text-align: center;">Valor del Inmueble en el Aviso</th>
              <th style="text-align: center;">Valor del Inmueble en el Dictamen</th>
              <th style="text-align: center;">Estatus</th>                 
            </tr>

        </thead>
<tbody> 
        <tr ng-repeat="x in tbldictsearx">
            <td style="display: none;">{{x.cclave}}</td>
            <td><a href="../AdminSeguimientoJ/{{x.claveanio}}">{{x.cclave}}</a></td>
            <td>{{x.etapa_folio_d}}{{x.acuse_recpecion2}}</td>
            <td>{{x.fecha_registro2}}</td>
            <td>{{x.tipoditc}}</td>                       
            <td>{{x.nombredenominacion}} {{x.apaterno}} {{x.amaterno}}</td>            
              <td>{{x.nomespecialista}}</td>                                   
            <td>{{x.nombredelrevisor}}</td>
            <td>${{x.valor_catastral}}</td>
            <td>{{x.avaluovalcat}}</td>
            <td>{{x.etapa_de_dict}}</td>
            </tr>  

</tbody>

    </table>
    <br><br>
   </div>
 </form>
     <!--div class="col-md-12">
      
      <div class="col-md-3"></div>
      <div class="col-md-2"><input type="button" name="salir" class="btn btn-danger" value="Salir"> </div>
      <div class="col-md-2"><input type="button" name="export" class="btn btn-primary" value="Exportar"> </div>
      <div class="col-md-2"><input type="button" name="export2" class="btn btn-success" value="Exportar"> </div>
      <div class="col-md-3"><br><br><br><br></div>
    </div-->
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
 </div></div>
 </div>

    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/angular-datatables.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/3.3.4bootstrap.min.css">
<link rel="stylesheet" href="<?php echo SERVERURL; ?>lib_tab/datatables.bootstrap.css">
<script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appa2.js"></script>


</body>

  <footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div> 
     <div class="col-md-12" style="height: 50px;">
       <div class="col-md-1" style=""></div>
       <div class="col-md-5" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n <?php echo versionx;?></p>
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