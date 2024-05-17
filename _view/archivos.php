<?php include '../web/validate.php'; ?>

    <!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

   <?php include '../const.php'; ?>
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  <script type="text/javascript" src="<?php echo SERVERURL; ?>lib/jquery-3.3.1.js"></script>

  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/main.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_app.js"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!-- <link rel="stylesheet" href="todo.css">--> 
  
    <style type="text/css">
     table#t01_fisica2 tr:nth-child(even) { /*t01_moral*/
  background-color: #eee;
}
table#t01_fisica2 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01_fisica2 th {
  background-color: black;
  color: white;
}  

 table#t01_moral2 tr:nth-child(even) { /*t01_moral*/
  background-color: #eee;
}
table#t01_moral2 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01_moral2 th { 
  background-color: black;
  color: white;
}  

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
   </style>

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
    
    <div class="col-sm-12" style="text-align: center; font-weight: bold;"><h3>Almacenamiento de Documentos requeridos para el Dictamen</h3></div>
    

     <div class="col-sm-12" style="">
      <br>
     <div class="col-md-12">
           <div class="col-md-3"><br></div> 
           <div class="col-md-3">
           <input type="radio" id="demo-priority-low" name="demo-priority" value="1" onclick="table_fi();">
              <label for="demo-priority-low" title="Persona Física">Persona Física</label>
           </div>
           <div class="col-md-3">
           <input type="radio" id="demo-priority-low" name="demo-priority" value="2" onclick="table_mo();">
              <label for="demo-priority-low" title="Persona Física">Persona Moral</label>
            </div>
            <div class="col-md-3"><br></div><br><br><br> 
     </div> 
 
     <div class="col-md-12 col-sm-12" id="t01_fisica" style="display: none;">
     <center>
     <table id="t01_fisica2" width="100%"> 
        <tr>   
            <th style="font-size: medium; text-align: center; width: 800px;">Documentos</th>
            <th style="font-size: medium; text-align: center; width: 200px;">Subir Archivo</th>  
            <th style="font-size: medium; text-align: center; width: 200px;">Estatus</th>
    <!--<th style="font-size: medium; text-align: center;">Comentario</th>-->   
        </tr>
        <tr> 
            <td>Escritura pública o Título de propiedad.</td> 
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
        </tr> 
        <tr>
            <td>Boleta Predial</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>
       <tr>
            <td>Boleta de Agua</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>
       <tr>
            <td>Planos</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
    <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>
       <tr>  
            <td>Croquis de Localización</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>   
    </table><br><br> 
    
    <div class="col-md-12">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <input type="button" name="acuse" class="btn btn-success" value="Generar Acuse"><br><br>
      </div>
    </div>
</center>
</div>
<div class="col-md-12 col-sm-12" id="t01_moral" style="display: none;"> 
  <center> 
    <table id="t01_moral2" width="100%"> 
        <tr>   
            <th style="font-size: medium; text-align: center; width: 800px;">Documentos</th>
            <th style="font-size: medium; text-align: center; width: 200px;">Subir Archivo</th>  
            <th style="font-size: medium; text-align: center; width: 200px;">Estatus</th>
    <!--<th style="font-size: medium; text-align: center;">Comentario</th>-->   
        </tr>
        <tr> 
            <td>Acta Constitutiva de la Empresa</td> 
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
        </tr> 
        <tr>
            <td>Nombramiento del Representante legal</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>
       <tr>
            <td>Boleta Predial</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>
       <tr>
            <td>Boleta de Agua</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
    <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr>
       <tr>  
            <td>Planos</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-check fa-2x" style="margin-top: 10px;"></i></td>
     <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr> 
       <tr> 
            <td>Croquis de Localización</td>
            <td align="center"><i class="fa fa-upload fa-2x" style="margin-top: 10px; cursor: pointer;" onclick="document.getElementById('id01_mo').style.display='block'"></i></td>
            <td align="center"><i class="fa fa-times fa-2x" style="margin-top: 10px;"></i></td>
    <!--<td align="center"><textarea placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;"></textarea></td> -->  
       </tr> 
    </table>
<br><br><br>
        <div class="col-md-12">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <input type="button" name="acuse" class="btn btn-success" value="Generar Acuse"><br><br>
      </div>
    </div>

</center> 
</div> 


    </div>


    <br><br> <br><br> <br><br> <br><br> <br><br>  
    </div> 
  <div class="col-sm-2"></div> 
 </div>
 </div>

   <div id="id01_mo" class="modal">
    
  <form class="modal-content animate" action="/contribuyente.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01_mo').style.display='none'" class="close" title="Close Modal">&times;</span>
      <center> 
      <img src="" alt="Avatar" class="avatar" style="width: 120px;">
    </center> 
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">
        <label>Seleccionar archivo correspondiente al documento referido.<br>Tipo de extención permitidas: PDF, JPG, PNG. <br><br><br><br></label>
      <label for="exampleInputFile"></label>
        <center><input type="file" id="fileToUpload" onchange="upload_image();"></center>
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