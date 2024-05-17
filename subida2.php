<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dictamun 2022 beta</title>
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta charset="utf-8">
  <meta name="description" content="DICTAMUN IGECEM 2022 ">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" media="only screen and (min-width: 324px) and (max-width: 768px)" href="_js/estilos.css">  
  <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1023px)" href="_js/estilos.css">
  <link rel="stylesheet" media="only screen and (min-width: 1024px) and (max-width: 1919px)" href="_js/estilos.css">
  <link rel="stylesheet" media="only screen and (min-width: 1920px) and (max-width: 3066px)" href="_js/estilos.css">

  <?php include 'const.php'; ?>
  <script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="_js/_subida2.js"></script> 
</head>
<body>
  

    <div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">

  <nav class="navbar navbar-inverse" style="background: #606A5D; border-color: #606A5D;">
    <div class="container-fluid">

    <nav class="navbar navbar-default" style="background-color: #606A5D; border-color: #606A5D;">
    <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" style="color: white;"><img src="<?php echo SERVERURL; ?>_img/igecem.png" width="32px;" height="47px;" style="margin-top: -10px;"></a>
        <a class="navbar-brand" style="font-size: large; font-weight: bold;">DICTAMUN 2022 BETA</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="width: 50px;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
       
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</nav>
</div>
<div class="col-md-1"></div>
</div>


<br><br>
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="col-md-12">
  <div class="row">
    <div class="col-md-1"><br></div>

  <div class="col-md-10" style="background-color: #D3D9D1"><br><br>

    <div class="col-md-1"></div>
    <div class="col-md-10" style="">

        <div class="col-sm-12 table-responsive" style="">
         envio a DISCO E:
         <BR>
         <form method="POST" action="redirect" enctype="multipart/form-data">
    <div>
      <input type="hidden" id="documents" name="documents" value="14">
      <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        
      <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>



      </div>


    	<div class="col-sm-12 table-responsive" style="">
         <table class="table table-striped">
          <thead> 
      <tr>
        <th style="text-align: center; width: 120px;">No.</th>
        <th style="text-align: center;">Folio</th>
        <th style="text-align: center;">Clave catastral</th>
        <th style="text-align: center;">Año a dictaminar</th>
        <th style="text-align: center;">Contribuyente</th>
        <th style="text-align: center;">Estatus</th>
      </tr>
    </thead>
           <tbody id="sub">
              
           </tbody>
         </table>



      </div>
   


    </div>
    
    <div class="col-md-1"></div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
  <div class="col-md-1"><br></div>
 </div>
 </div>
</div>
</div>

 <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

</style>


</body>
<footer class="footer-2">
    <div class="col-md-12" style="height: 30px;"></div>
     <div class="col-md-12" style="height: 50px;">
       <div class="col-sm-2"><br></div>
       <div class="col-sm-4" style="margin-left: -11px;">
         <p style="font-size: small;">Basado en © Copyright IGECEM 2020. Todos los derechos reservados. Versi&oacute;n <?php echo versionx;?></p>
       </div>
       <div class="col-sm-4" style="margin-left: 23px;">
            <div class="col-md-4"></div>
            <div class="col-md-6" align="right">
              <a href="https://twitter.com/IGECEM" target="_blank"><i class="fa fa-twitter" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="http://igecem.edomex.gob.mx/" target="_blank"><i class="fa fa-dribbble" style="font-size:30px; margin-left: 10px;"></i></a>
              <a href="https://www.facebook.com/IGECEM/" target="_blank"><i class="fa fa-facebook" style="font-size:30px; margin-left: 10px;"></i></a>
            </div>

       </div>
       <div class="col-sm-2" style=""></div>
     </div>
  </footer>
</html>