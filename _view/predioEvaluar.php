<?php include '../web/validate.php'; ?>

    <!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 

  <?php include '../const.php'; ?>
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app.js"></script>

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 
    <!--<link rel="stylesheet" href="todo.css">--> 
   

  </head>

  <body>
    <center><div class="col-sm-12" style=""><img src="<?php echo SERVERURL; ?>_img/banner2.png">
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
      <li><a style="margin-top: 4px;" href="../DatosContribuyente/<?php echo $_GET['link']; ?>">Contribuyente</a></li>
      <li><a style="margin-top: 4px;" href="../PadronDictaminadores/<?php echo $_GET['link']; ?>">Padrón de Dictaminadores</a></li>
      <li><a style="margin-top: 4px;" href="../Predios/<?php echo $_GET['link']; ?>">Predio</a></li>
      <li><a style="margin-top: 4px;" href="../Archivos/<?php echo $_GET['link']; ?>">Archivos</a></li>
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp; 
        
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesión" id="killer" ></i>
        <input type="hidden" id="kernel" name="kernel" value="<?php echo $adm = $_GET['link']; ?>" />
      </p></li>  

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
    
    <div class="col-sm-12" style="text-align: center; font-weight: bold;"><h3>Datos del predio a Dictaminar</h3></div>
    
    <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br><br>
       <div class="col-md-1"><h5 style="text-align: left;">Calle:</h5></div>  
       <div class="col-md-3" style="">
        <input type="text" name="calle" id="calle" placeholder="Ingresar nombre de la calle" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;"> 
       </div>
       <div class="col-md-2"><h5 style="text-align: right;">No.Exterior:</h5></div>
       <div class="col-md-2" style="">  
        <input type="text" name="nExterior" id="nExterior" placeholder="Número Exterior" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 150px;"> 
       </div>
       <div class="col-md-2"><h5 style="text-align: right;">No.Interior:</h5></div>
       <div class="col-md-2" style="">
        <input type="text" name="nInterior" id="nInterior" placeholder="Número Inerior" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 126px;"> 
       </div>  
     </div>

     <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-1"><h5 style="text-align: left;">C.P:</h5></div>
       
        <div class="col-md-3" style="">
        <select ng-model="selectedCar" style="height: 30px; width: 170px; margin-top: 5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;">
            <option disabled selected>Seleccionar C.P</option> 
            <option ng-repeat="x in cars" value="{{x.idCategoria}}">{{x.descripcion}}</option>
        </select>
      </div>
      <div class="col-md-2"><h5 style="text-align: right;">Colonia:</h5></div>
      <div class="col-md-2">
          
        <input type="text" name="colonia" id="colonia" placeholder="Ingresar Colonia" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 150px;">
      </div>

      <div class="col-md-2"><h5 style="text-align: right;">Municipio:</h5></div>
      <div class="col-md-2">
        <input type="text" name="municipio" id="municipio" placeholder="Ingresar Municipio" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;  width: 126px;"> 
      </div>
     </div>
     <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-3"><h5 style="text-align: left;">Referencias del Domicilio:</h5></div>
      <div class="col-md-9">
        <input type="text" name="referencias" id="referencias" placeholder="Ingresar Referencias" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 580px;"> 
      </div>
     </div>

     <div class="col-sm-12" style="background-color: #F0FAF3;">
       <div class="col-md-12" style="">
        <h5 style="text-align: left;">Clave catastral:</h5>  
        <div class="col-md-2">
        <input type="text" class="form-control clave" id="c_muni" placeholder="Municipio" title="Escriba clave de municipio" maxlength="3" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" class="form-control clave" id="c_zona" placeholder="Zona" title="Escriba clave de Zona" maxlength="2" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" class="form-control clave" id="c_manz" placeholder="Manzana" title="Escriba clave de Manzana" maxlength="3" style="text-align: center;">
        </div> 
        <div class="col-md-2">
        <input type="text" class="form-control clave" id="c_lote" placeholder="Lote" title="Escriba clave de Lote" maxlength="2" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" class="form-control clave" id="c_edif" placeholder="Edificio" title="Escriba clave de Edificio" maxlength="2" style="text-align: center;">
        </div>
        <div class="col-md-2">
        <input type="text" class="form-control clave" id="c_dept" placeholder="Depto" title="Escriba clave de Depto" maxlength="4" style="text-align: center;">  
        </div>
       </div>
       <br>
     </div>

     <div class="col-md-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-2"><h5 style="text-align: left;">Valor Catastral:</h5></div>
       <div class="col-md-3" style="">  
        <input type="text" name="valorCatastral" id="valorCatastral" placeholder="Ingresar Valor Catastral" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; "> 
       </div><br><br>
     </div>

     <div class="col-md-12"><br><br>
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <input type="button" name="predio" class="btn btn-success" value="Guardar"><br>
      </div>

    </div>
    <div class="col-md-12"><br><br></div>

    <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> 
   

  </div> 
  <div class="col-sm-2"></div> 
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