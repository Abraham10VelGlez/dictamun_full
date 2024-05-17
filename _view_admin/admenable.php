<?php include '../web/validateadm.php';//$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];$ruta = explode("/", $url);$to=count($ruta); 
?> 
<!doctype html>
<html >
  <head>    
    
    <title>DictaMun 2020</title>
  <meta charset="utf-8">
  <meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="cache-control" content="no-store" />
<meta http-equiv="cache-control" content="must-revalidate" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />




  <?php include '../const.php'; ?> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css"> 
  

    <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
  <script type="text/javascript" src="<?php echo SERVERURL; ?>_js/_appa.js"></script> 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 991px)" href="<?php echo SERVERURL; ?>_js/estilos3.css">
 <link rel="stylesheet" media="only screen and (min-width: 992px) and (max-width: 1023px)" href="<?php echo SERVERURL; ?>_js/estilos3.css">        
 <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="<?php echo SERVERURL; ?>_js/estilos3.css">
 <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="<?php echo SERVERURL; ?>_js/estilos3.css"> 

  <style>
body {font-family: Arial, Helvetica, sans-serif;}

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
 
  </head>

  <body ng-app="Appadm" ng-controller="AppadmController">

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
       <li><a href="../AdminGris/" class="fa fa-home fa-2x" title="Inicio"></a></li>
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp;  
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesión" id="killer"></i>   
        

      </p></li>  

    </ul> 
  </div>
</nav>
</div>  

 
<div class="col-md-1"></div>
</div></div>
  <br><br>
<div id="xx" class="col-md-12"> 
  <div class="col-md-12"> 
  <div class="row">  
    <div class="col-md-1"></div> 
  <div class="col-md-10" style="background-color: #D3D9D1"><br>
     <div class="col-md-12" style="text-align: right;">
       <h3 style="text-align: center; font-weight: bold;">Para desbloquear, ingresar el n&uacute;mero de registro del usuario.</h3><br>
       <div class="col-md-12">
         <div class="col-md-12"><h5 style="text-align: left;">
          
         </h5></div>
         
       </div>
       
       <div class="col-md-12">                  
         <center>
         <form method="post">
         <input type="text" id="no" name="no" ng-model="no" value=""   placeholder="Número de Registro"  style="text-align: center; border-left: 0; border-right: 0; border-top: 0;" />
         </center>         
       </div>
  <div class="col-md-12">&nbsp;&nbsp;</div>     
       <div class="col-md-12">                  
         <center>
         <input type="button" class="btn btn-success"  ng-click="nobtnag();" value="Desbloquear";   />
          
         </form>
         </center>         
       </div>  
       
  <div class="col-md-12">&nbsp;&nbsp;</div>
  <div class="col-md-12">&nbsp;&nbsp;</div> 
 </div>
 </div>
 </div>
 </div>
    <div id="xxx" class="col-md-12"> 
  <div class="row">  
    <div class="col-sm-1"></div> 
  <div class="col-sm-10" style="background-color: #D3D9D1"><br>
     <div class="col-sm-12" style="text-align: right;">
       <h3 style="text-align: center; font-weight: bold;">Para desactivar, ingresar el n&uacute;mero de registro del usuario.</h3><br>
       <div class="col-md-12">
         <div class="col-md-12"><h5 style="text-align: left;">
          
         </h5></div>
         
       </div>
       
       <div class="col-md-12">                  
         <center>
         <form method="post">
         <input type="text" id="nod" name="nod" ng-model="nod"  value=""   placeholder="Número de Registro" style="text-align: center; border-left: 0; border-right: 0; border-top: 0;" />
         </center>         
       </div>
  <div class="col-md-12">&nbsp;&nbsp;</div>     
       <div class="col-md-12">                  
         <center>
         <input type="button" class="btn btn-danger"  ng-click="nodevag();" value="Desactivar";   />
          
         </form>
         </center>         
       </div>  
       
  <div class="col-md-12">&nbsp;&nbsp;</div>
  <div class="col-md-12">&nbsp;&nbsp;</div> 
 </div>
 </div>
 </div>
 </div>
  
 <!-- <button type="button" class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width: 300px;">Administrador</button> -->
  <div id="id01" class="modal modal-content animate">
    
  
    <div class="imgcontainer"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> 
    <center>  <img src="../../_img/ok2.gif" alt="Avatar" class="avatar" style="width: 120px;">
    </center>
    </div>
    <div class="col-md-12 text-center" >
    <h1>Usuario Desbloqueado</h1>
    </div>  
    </div>
    
    <div id="id02" class="modal modal-content animate">
    
  
    <div class="imgcontainer"> 
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span> 
    <center>  <img src="../../_img/ok2.gif" alt="Avatar" class="avatar" style="width: 120px;">
    </center>
    </div>
    <div class="col-md-12 text-center" >
    <h1>Usuario Desactivado</h1>
    </div>  
    </div>
  
 
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