<?php include '../web/validatejr.php'; 

  $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//echo "url:".$url;

$ruta = explode("/", $url);
$to=count($ruta);
?>

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
      <li><a href="../BusquedaAdmin/<?php echo $ruta[$to-1]; ?>">Búsqueda</a></li>
      <li><a href="../SeguimientoAdmin/<?php echo $ruta[$to-1]; ?>">Dictamenes</a></li>
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp; 
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesión" id="killer" ></i>
        <input type="hidden" id="kernel" name="kernel" value="<?php echo $adm = $ruta[$to-1]; ?>" />  
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
    <div class="col-md-12" style="text-align: center;"><h4>Bienvenido (a): Carlos Mendoza Escobar</h4></div>

    <div class="col-md-12" style="text-align: left;"><br><h5>Revisión de Dictamen.</h5><br>
      <button type="button" class="btn btn-md btn-block" style="background-color: #202A23; color: white;" onclick="seguimientoMos();">Aviso</button><br><br><br> 
       <table id="seguimientoT" class="table table-striped" style="display: none;">
        
    <thead> 
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;">Doe</td>
      </tr>
      <tr>
        <td>Año a Dictaminar:</td>
        <td>Activeson</td>
      </tr>
      <tr>
        <td>Nombre del Contribuyente:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>RFC del Contribuyente:</td>
        <td>Activeson</td>
      </tr> 
      <tr>
        <td>Clave Catastral:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Valor Catastral:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Domicilio del Inmueble:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Calle:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>No. Exterior:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>No. Interior:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Colonia:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Municipio:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>C.P:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Referencias:</td>
        <td>Doe</td>
      </tr>
    </tbody>
  </table>

  <button type="button" class="btn btn-md btn-block" style="background-color: #202A23; color: white;" onclick="dictamenMos();">Dictamen</button><br><br><br> 

  <table id="dictamenT" class="table table-striped" style="display: none;">
          
    <thead> 
      <tr>
        <th colspan="2" style="text-align: center;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Número de Folio:</td>
        <td style="width: 900px;">Doe</td>
      </tr>
      <tr>
        <td>Nombre del Dictaminador:</td>
        <td>Activeson</td>
      </tr>
      <tr>
        <td>RFC del Dictaminador:</td>
        <td>Activeson</td>
      </tr> 
      <tr>
        <td>Número de Registro del Dictaminador:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Fecha y hora de envio del Dictamen:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Tipo de Dictamen:</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td>Estatus del Dictamen:</td>
        <td>Doe</td>
      </tr> 
    </tbody>
  </table>

  <button type="button" class="btn btn-md btn-block" style="background-color: #202A23; color: white;" onclick="archivosRecMos();">Archivos Recibidos</button><br><br><br> 
  <table id="archivosRecT" class="table table-striped" style="display: none;">
          
    <thead> 
      <tr>
        <th style="text-align: center; width: 400px;">Descripción</th>
        <th style="text-align: center; width: 150px;">Nombre del Archivo</th>
        <th style="text-align: center; width: 500px;">Comentario</th>
        <th style="text-align: center; width: 100px;">Descargar</th>
        <th style="text-align: center; width: 500px;">Observar</th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td>Archivo DICTAVAL.</td>
        <td>Doe</td>
         <td>Doe</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr>
      <tr>
        <td>Archivo de Construcción.</td>
        <td>Activeson</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr>
      <tr>
        <td>Formato del avalúo.</td>
        <td>Activeson</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr> 
      <tr>
        <td>Documento que acredite la propiedad.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
         <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
         <td><textarea style="width: 300px;"></textarea></td>
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
         <td><textarea style="width: 300px;"></textarea></td>
      </tr>
      <tr>
        <td>Certificación de clave catastral y/o recibo de pago del impuesto predial.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr>
      <tr>
        <td>Planos Arquitectónicos del levantamiento de las construcciones.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr> 
      <tr>
        <td>Relación de indivisos de Condominios.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr> 
      <tr>
        <td>Otros.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr> 
      <tr>
        <td>Comentario General.</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 300px;"></textarea></td>
      </tr> 
    </tbody>
  </table>
   <button type="button" class="btn btn-md btn-block" style="background-color: #202A23; color: white;" onclick="RepFotComplMos();">Reporte Fotográfico Completo</button><br><br><br> 
    <table id="RepFotComplT" class="table table-striped" style="display: none;">
          
    <thead> 
      <tr>
        <th style="text-align: left; width: 400px;">Comentario</th>
        <th colspan="4" style="text-align: center;"><textarea style="width: 650px; height: 100px;"></textarea></th>
      </tr> 
      <tr>
        <th colspan="2" style="text-align: left; width: 500px;"></th>
        <th style="text-align: right; width: 500px;">No. Archivos Fotográficos</th>
        <th style="text-align: left;">5</th>
      </tr>
       <tr>
        <th style="text-align: center; width: 100px;">Tipología</th>
        <th style="text-align: center; width: 400px;">Nombre del Archivo</th>
        <th style="text-align: center; width: 400px;">Comentarios</th>
        <th style="text-align: center; width: 150px;">Descargar</th>
        <th style="text-align: center; width: 500px;">Observar</th> 
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td>T-1</td>
        <td>Doe</td>
         <td>Doe</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 220px;"></textarea></td>
      </tr>
      <tr>
        <td>T-2</td>
        <td>Activeson</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 220px;"></textarea></td>
      </tr>
      <tr>
        <td>T-3</td>
        <td>Activeson</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 220px;"></textarea></td>
      </tr> 
      <tr>
        <td>T-4</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
        <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
        <td><textarea style="width: 220px;"></textarea></td>
      </tr>
      <tr>
        <td>T-5</td>
        <td>Doe</td>
         <td>Archivo DICTAVAL</td>
         <td style="text-align: center;"><i class="fa fa-download fa-2x"></i></td>
         <td><textarea style="width: 220px;"></textarea></td>
      </tr> 
     
    </tbody>
  </table>
  <button type="button" class="btn btn-md btn-block" style="background-color: #202A23; color: white;" onclick="PredioMos();">Predio</button><br><br><br> 
   <table id="predioT" class="table table-striped" style="display: none;">
          
    <thead>  
      <tr>
        <th colspan="7" style="text-align: left; width: 1500px;"></th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <td style="width: 350px;">Folio de presentación:</td>
        <td colspan="7">Doe</td> 
      </tr>
      <tr>
        <td>Tipo de Inmueble:</td>
        <td colspan="7">ac</td>
      </tr>
      <tr>
        <td>Ubicación:</td>
        <td colspan="7">ac</td> 
      </tr> 
      <tr>
        <td>Clave Catastral:</td>
        <td colspan="7">ac</td> 

      </tr>
      <tr>
        <td>Propietario:</td>
        <td colspan="7">ac</td> 

      </tr>
      <tr>
        <td>Superficie de terreno:</td>
        <td colspan="7">ac</td> 

      </tr> 
      <tr>
        <td>Valor del Terreno propio:</td>
       <td colspan="7">ac</td> 

      </tr>
      <tr>
        <td>Valor del Terreno Común:</td>
       <td colspan="7">ac</td> 

      </tr>
      <tr>
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor del terreno</td>
      </tr>
       <tr>
        <th colspan="4" style="text-align: center;">Datos del Predio</th>
        <th colspan="4" style="text-align: center;">Factor</th>
      </tr>
      <tr>
        <td>Frente:</td>
        <td>30</td> 
        <td colspan="3"></td>
        <td>Frente:</td>
        <td>10000</td> 
         <td></td>
      </tr>
       <tr>
        <td>Fondo:</td>
        <td>39.1</td>
         <td colspan="3"></td> 
         <td>Fondo:</td>
        <td>0.85575</td> 
        <td></td> 
      </tr>
       <tr>
        <td>Ýrea Inscrita:</td>
        <td>1172.4</td>
         <td colspan="3"></td>
        <td>Irregularidad:</td>
        <td>1.000</td> 
        <td></td>
      </tr>
      <tr>
        <td>Ýrea Total:</td>
        <td>1172.4</td>
        <td colspan="3"></td>
        <td>Ýrea:</td>
        <td>0.76397</td> 
        <td></td>
      </tr>
       <tr>
        <td>Altura:</td>
        <td>0</td>
         <td colspan="3"></td>
        <td>Topografia:</td>
        <td>1.000</td> 
        <td></td>
      </tr>
       <tr>
        <td>Posición del Predio:</td>
        <td>Intermedio</td>
         <td colspan="3"></td>
        <td>Posición:</td>
        <td>1.000</td> 
        <td></td>
      </tr>
      <tr>
        <td>Ýrea Aprovechable:</td>
        <td>1172.4</td>
         <td colspan="3"></td>
        <td>Restricción:</td>
        <td>1.000</td> 
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
         <td colspan="3"></td>
        <td>Factor Aplicado:</td>
        <td>0.65377</td>
        <td></td>  
      </tr>
       <tr> 
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Análisis del Valor de las Construcciones</td>
      </tr>
       <tr>
        <th style="text-align: center;">Tipología</th>
        <th style="text-align: center;">Tipo de Construcción</th>
        <th style="text-align: center;">Uso</th>
        <th style="text-align: center;">Clase</th>
        <th style="text-align: center;">Categoría</th>
        <th style="text-align: center;">Superficie</th>
        <th colspan="2" style="text-align: center;">Valor de las Construcciones</th>
      </tr>
      <tr>
        <td>T-1</td>
        <td>Privada</td> 
        <td>Q</td>
        <td>E</td> 
        <td>1</td>
        <td>2319.56 mts</td> 
        <td colspan="2">$ 4,439,498.67</td>
      </tr>
      <tr>
        <td>T-2</td>
        <td>Privada</td> 
        <td>C</td>
        <td>C</td> 
        <td>2</td>
        <td>2319.56 mts</td> 
        <td colspan="2">$ 4,439,498.67</td>
      </tr>
       <tr>
        <td>T-3</td>
        <td>Privada</td> 
        <td>Q</td>
        <td>D</td> 
        <td>2</td>
        <td>2319.56 mts</td> 
        <td colspan="2">$ 4,439,498.67</td>
      </tr>
      <tr>
        <td>T-4</td>
        <td>Especial</td> 
        <td>E</td>
        <td>K</td> 
        <td>2</td>
        <td>2319.56 mts</td> 
        <td colspan="2">$ 4,439,498.67</td>
      </tr>
       <tr>
        <td>T-5</td>
        <td>Especial</td> 
        <td>I</td>
        <td>I</td> 
        <td>2</td>
        <td>2319.56 mts</td> 
        <td colspan="2">$ 4,439,498.67</td>
      </tr>
       <tr> 
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;"></td>
      </tr>
       <tr>
        <th style="text-align: center;">Tipología</th>
        <th style="text-align: center;">Edad</th>
        <th style="text-align: center;">Factor de Edad</th>
        <th style="text-align: center;">Conservación</th>
        <th style="text-align: center;">Factor de Conservación</th>
        <th style="text-align: center;">Niveles</th>
        <th style="text-align: center;">Factor de Niveles</th>
        <th style="text-align: center;">Factor Aplicado</th>
      </tr>
      <tr>
        <td>T-1</td>
        <td>38</td> 
        <td>.62000</td>
        <td>Normal</td> 
        <td>.90000</td>
        <td>2</td> 
        <td>1,00000</td>
        <td>.5580</td> 
      </tr>
      <tr>
        <td>T-2</td>
        <td>38</td> 
        <td>.62000</td>
        <td>Normal</td> 
        <td>.90000</td>
        <td>2</td> 
        <td>1,00000</td>
        <td>.5580</td> 
      </tr>
      <tr>
        <td>T-3</td>
        <td>38</td> 
        <td>.62000</td>
        <td>Normal</td> 
        <td>.90000</td>
        <td>2</td> 
        <td>1,00000</td>
        <td>.5580</td> 
      </tr>
      <tr>
        <td>T-4</td>
        <td>38</td> 
        <td>.62000</td>
        <td>Normal</td> 
        <td>.90000</td>
        <td>2</td> 
        <td>1,00000</td>
        <td>.5580</td> 
      </tr>
      <tr>
        <td>T-5</td>
        <td>38</td> 
        <td>.62000</td>
        <td>Normal</td> 
        <td>.90000</td>
        <td>2</td> 
        <td>1,00000</td>
        <td>.5580</td> 
      </tr>
       <tr> 
        <td colspan="8"></td>
      </tr>
      <tr>
        <td colspan="8" style="text-align: center; font-size: large; font-weight: bold;">Totales</td>
      </tr>
      <tr>
        <td>Valor del Terreno</td>
        <td>$2,710,272.25</td>  
        <td colspan="6"></td>  
      </tr> 
      <tr>
        <td>Valor de las Construcciones Privadas</td>
        <td>$2,710,272.25</td>  
        <td colspan="6"></td> 
      </tr> 
      <tr>
        <td>Valor de las Construcciones Comunes</td>
        <td>$2,710,272.25</td> 
        <td colspan="6"></td>  
      </tr> 
      <tr>
        <td>Valor de las Instalaciones especiales</td>
        <td>$2,710,272.25</td>  
        <td colspan="6"></td> 
      </tr> 
      <tr>
        <td>Valor Total</td>
        <td>$2,710,272.25</td> 
        <td colspan="6"></td>  
      </tr>
      <tr>
        <td>Valor Total en números Redondos</td>
        <td>$2,710,272.25</td> 
        <td colspan="6"></td>  
      </tr>  
    </tbody>
  </table>


   <div class="col-md-12">
      <div class="col-md-4"><h5 style="font-weight: bold;">Observación de Pre-Autorización</h5></div>
      <div class="col-md-8"><textarea style="width: 500px;"></textarea>
        <br><br><br>
      </div>
    </div>


  <div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10"> 
      <center>
      <div class="col-md-3">
        <button type="button" class="btn" style="background-color: #5BA081; color: white;" onclick="observa();">Imprimir Dictamen</button>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn" style="background-color: #5BA081; color: white;" onclick="">Validar</button> 
      </div>
       <div class="col-md-3">
        <button type="button" class="btn" style="background-color: #5BA081; color: white;" onclick="">Rechazar</button>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn" style="background-color: #5BA081; color: white;" onclick="">Imprimir Acuse</button>
      </div>
      <br><br><br><br>
      </center>
    </div>
    <div class="col-md-1"></div>
  </div>
  <div class="col-md-12" name="observacion" id="observacion" style="display: none;">
    <div class="col-md-1"></div>
    <div class="col-md-10" id="ol">
      <h3 style="text-align: center;">Ingresar Observaciones</h3>
      <textarea placeholder="Ingresar Observaciones" rows="6" cols="85">
        
      </textarea><br><br>
      <center>
      <button type="button" class="btn btn-success">Guardar</button>
      <br><br>
    </center> 
    </div>
    <div class="col-md-1"></div>
  </div>
  
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br>

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