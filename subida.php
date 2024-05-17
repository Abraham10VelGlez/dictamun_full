<?php
session_start();
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$ruta = explode("/", $url);
$to=count($ruta);
$anio = $ruta[6-1];
$clv = $ruta[5-1];
$foliosinceros = $ruta[4-1];
$tipopersona = $ruta[7-1];

$length = 5;
$foliodecarpeta = str_pad($foliosinceros,$length,"0", STR_PAD_LEFT);

?>
<!DOCTYPE html>
<html>
<head>
<input type="hidden" id="fconceros" name="fconceros" value="<?php echo  $foliodecarpeta;?>">
  <title>Dictamun 2022 beta</title>
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta charset="utf-8">
  <meta name="description" content="DICTAMUN IGECEM 2021 ">
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
  <script type="text/javascript" src="_js/main.js"></script> 
  <script type="text/javascript" src="_js/_login.js"></script> 
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
    
    <div class="col-sm-12 ">
          <div class="col-sm-2"></div>
          <div class="col-sm-4"> 
            <center>
            <input type="radio" id="baldio" name="predio" value="1" onclick="baldio();" style="border: 1px;width: 23%;height: 2em;" >
            <label for="demo-priority-low" title="predio baldio" style="font-size: x-large; color: black;">Predio baldío.</label>
            <input type="hidden" id="prebaldio" name="prebaldio" value="" >
            </center>
          </div>
          <div class="col-sm-4"> 
            <center> 
            <input type="radio" id="construccion" name="predio" value="2" onclick="construccion();" style="border: 1px;width: 23%;height: 2em;">
            <label for="demo-priority-low" title="Predio con contruccion" style="font-size: x-large; color: black;">Predio construido.</label>
            <input type="hidden" id="preconstruido" name="preconstruido" value="" >
            </center>
          </div>
          <div class="col-sm-2"></div>
          </div>
          

    	<div id="xcod" class="col-sm-12 " style="">
    	<CENTER>
    	<H2><B>DOCUMENTOS GENERALES</B></H2><BR><BR>
    	</CENTER>
           <table class="table table-striped">
            
        <tbody id="docxs_f" ><tr>
            <th style="text-align: center;">Lista de Documentos</th>
            <th style="text-align: center;">Cargar Documento</th>
            <th style="text-align: center;">Documento Guardado</th>
            <th style="text-align: center;">Comentario</th>
            <th style="text-align: center;">Corregir</th>
        </tr>
        
        
        
        
        <tr>


            <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message14']) && $_SESSION['message14'])
    {
      printf('<b>%s</b>', $_SESSION['message14']);
      unset($_SESSION['message14']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
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
  </center>
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file1">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment1" name="ficoment1" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file1delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        
        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message10']) && $_SESSION['message10'])
    {
      printf('<b>%s</b>', $_SESSION['message10']);
      unset($_SESSION['message10']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="10">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file2">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment2" name="ficoment2" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file2delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message11']) && $_SESSION['message11'])
    {
      printf('<b>%s</b>', $_SESSION['message11']);
      unset($_SESSION['message11']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="11">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file3">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment3" name="ficoment3" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file3delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
         
     
      
      <tr>
        <td>Escritura pública o Título de propiedad.</td>
       <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message99']) && $_SESSION['message99'])
    {
      printf('<b>%s</b>', $_SESSION['message99']);
      unset($_SESSION['message99']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="99">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file4">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment4" name="ficoment4" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file4delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg99']) && $_SESSION['filenameavg99'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg99']);
      unset($_SESSION['filenameavg99']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Boleta Predial.</td>
        
                <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message98']) && $_SESSION['message98'])
    {
      printf('<b>%s</b>', $_SESSION['message98']);
      unset($_SESSION['message98']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="98">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file5">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg98']) && $_SESSION['filenameavg98'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg98']);
      unset($_SESSION['filenameavg98']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment5" name="ficoment5" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file5delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg98']) && $_SESSION['filenameavg98'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg98']);
      unset($_SESSION['filenameavg98']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Documento que acredite la propiedad.</td>
        
              
              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message83']) && $_SESSION['message83'])
    {
      printf('<b>%s</b>', $_SESSION['message83']);
      unset($_SESSION['message83']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="83">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file6">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg83']) && $_SESSION['filenameavg83'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg83']);
      unset($_SESSION['filenameavg83']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment6" name="ficoment6" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file6delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg83']) && $_SESSION['filenameavg83'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg83']);
      unset($_SESSION['filenameavg83']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
       <tr>
        <td>Identificación Oficial del propietario o representante legal  </td>
              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message97']) && $_SESSION['message97'])
    {
      printf('<b>%s</b>', $_SESSION['message97']);
      unset($_SESSION['message97']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="97">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file7">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg97']) && $_SESSION['filenameavg97'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg97']);
      unset($_SESSION['filenameavg97']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment7" name="ficoment7" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file7delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg97']) && $_SESSION['filenameavg97'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg97']);
      unset($_SESSION['filenameavg97']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Plano o Croquis del terreno con medidas y colindancias.</td>
             <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message96']) && $_SESSION['message96'])
    {
      printf('<b>%s</b>', $_SESSION['message96']);
      unset($_SESSION['message96']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="96">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file8">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg96']) && $_SESSION['filenameavg96'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg96']);
      unset($_SESSION['filenameavg96']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment8" name="ficoment8" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file8delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg96']) && $_SESSION['filenameavg96'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg96']);
      unset($_SESSION['filenameavg96']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Croquis de Localización.</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message95']) && $_SESSION['message95'])
    {
      printf('<b>%s</b>', $_SESSION['message95']);
      unset($_SESSION['message95']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="95">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file9">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg95']) && $_SESSION['filenameavg95'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg95']);
      unset($_SESSION['filenameavg95']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment9" name="ficoment9" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file9delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg95']) && $_SESSION['filenameavg95'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg95']);
      unset($_SESSION['filenameavg95']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>





































      
      <tr>
        <td>Plano arquitectónico o croquis de construcción.</td>
              
              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message82']) && $_SESSION['message82'])
    {
      printf('<b>%s</b>', $_SESSION['message82']);
      unset($_SESSION['message82']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="82">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file10">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg82']) && $_SESSION['filenameavg82'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg82']);
      unset($_SESSION['filenameavg82']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment10" name="ficoment10" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file10delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg82']) && $_SESSION['filenameavg82'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg82']);
      unset($_SESSION['filenameavg82']);
    }
  ?>
  	
  </a>
            </div>
            </td>
              
      </tr> 
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo.</td>
        
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message81']) && $_SESSION['message81'])
    {
      printf('<b>%s</b>', $_SESSION['message81']);
      unset($_SESSION['message81']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="81">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file11">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg81']) && $_SESSION['filenameavg81'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg81']);
      unset($_SESSION['filenameavg81']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment11" name="ficoment11" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file11delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg81']) && $_SESSION['filenameavg81'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg81']);
      unset($_SESSION['filenameavg81']);
    }
  ?>
  	
  </a>
            </div>
            </td>
           
      </tr>
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas.</td>
        
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message80']) && $_SESSION['message80'])
    {
      printf('<b>%s</b>', $_SESSION['message80']);
      unset($_SESSION['message80']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="80">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file12">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg80']) && $_SESSION['filenameavg80'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg80']);
      unset($_SESSION['filenameavg80']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment12" name="ficoment12" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file12delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg80']) && $_SESSION['filenameavg80'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg80']);
      unset($_SESSION['filenameavg80']);
    }
  ?>
  	
  </a>
            </div>
            </td>
                
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <tr>
        <td>Planos de Factores.</td>
              <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message79']) && $_SESSION['message79'])
    {
      printf('<b>%s</b>', $_SESSION['message79']);
      unset($_SESSION['message79']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="79">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file13">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg79']) && $_SESSION['filenameavg79'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg79']);
      unset($_SESSION['filenameavg79']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment13" name="ficoment13" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file13delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg79']) && $_SESSION['filenameavg79'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg79']);
      unset($_SESSION['filenameavg79']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr> 
      <tr>
        <td>Relación de indivisos de Condominios.</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message15']) && $_SESSION['message15'])
    {
      printf('<b>%s</b>', $_SESSION['message15']);
      unset($_SESSION['message15']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="15">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file14">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment14" name="ficoment14" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file14delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>  
      </tr>       
      <tr>
        <td>Otros.</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message94']) && $_SESSION['message94'])
    {
      printf('<b>%s</b>', $_SESSION['message94']);
      unset($_SESSION['message94']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="94">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file15">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg94']) && $_SESSION['filenameavg94'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg94']);
      unset($_SESSION['filenameavg94']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment15" name="ficoment15" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file15delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg94']) && $_SESSION['filenameavg94'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg94']);
      unset($_SESSION['filenameavg94']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
      </tr> 
      
      
      
      
      

      
      
      
      
      
      
      
      <tr>
        <td id="titFachada" >Imagen de Fachada</td>
                    <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message120']) && $_SESSION['message120'])
    {
      printf('<b>%s</b>', $_SESSION['message120']);
      unset($_SESSION['message120']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="120">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file16">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg120']) && $_SESSION['filenameavg120'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg120']);
      unset($_SESSION['filenameavg120']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment16" name="ficoment16" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file16delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg120']) && $_SESSION['filenameavg120'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg120']);
      unset($_SESSION['filenameavg120']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>


    </tbody>
    
    
     <tbody id="docxs_m" >
    <tr>
            <th style="text-align: center;">Lista de Documentos</th>
            <th style="text-align: center;">Cargar Documento</th>
            <th style="text-align: center;">Documento Guardado</th>
            <th style="text-align: center;">Comentario</th>
            <th style="text-align: center;">Corregir</th>
        </tr>
        
        
        
        <tr>


            <td> <p>Formato del avaluo firmado</p> por el contribuyente y el valuador</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message14']) && $_SESSION['message14'])
    {
      printf('<b>%s</b>', $_SESSION['message14']);
      unset($_SESSION['message14']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
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
  </center>
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file18">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     
     <td align="center"><textarea id="ficoment18" name="ficoment18" placeholder="Escribir algun comentario" ></textarea></td>
     
     <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file18delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg14']) && $_SESSION['filenameavg14'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg14']);
      unset($_SESSION['filenameavg14']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        
        <tr>
            <td>Archivo de  Avaluos.val de dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message10']) && $_SESSION['message10'])
    {
      printf('<b>%s</b>', $_SESSION['message10']);
      unset($_SESSION['message10']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="10">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            <input type="hidden" id="okfmx" name="okfmx" value="_">
            <div id="file19">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment19" name="ficoment19" placeholder="Escribir algun comentario" ></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file19delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg10']) && $_SESSION['filenameavg10'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg10']);
      unset($_SESSION['filenameavg10']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        <tr>
            <td>Archivo de Construcciones.val dictaval</td>
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message11']) && $_SESSION['message11'])
    {
      printf('<b>%s</b>', $_SESSION['message11']);
      unset($_SESSION['message11']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="11">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file20">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment20" name="ficoment20" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file20delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg11']) && $_SESSION['filenameavg11'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg11']);
      unset($_SESSION['filenameavg11']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
        </tr>
        
        
        
       
       
       
       
       
       
       
       
       
       
       
         
     
      
      <tr>
        <td>Acta Constitutiva de la Empresa</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message90']) && $_SESSION['message90'])
    {
      printf('<b>%s</b>', $_SESSION['message90']);
      unset($_SESSION['message90']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="90">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file21">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg90']) && $_SESSION['filenameavg90'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg90']);
      unset($_SESSION['filenameavg90']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment21" name="ficoment21" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file21delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg90']) && $_SESSION['filenameavg90'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg90']);
      unset($_SESSION['filenameavg90']);
    }
  ?>
  	
  </a>
            </div>
            </td>
       
      </tr>
      <tr>
        <td>Nombramiento del Representante legal</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message89']) && $_SESSION['message89'])
    {
      printf('<b>%s</b>', $_SESSION['message89']);
      unset($_SESSION['message89']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="89">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file22">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg89']) && $_SESSION['filenameavg89'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg89']);
      unset($_SESSION['filenameavg89']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment22" name="ficoment22" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file22delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg89']) && $_SESSION['filenameavg89'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg89']);
      unset($_SESSION['filenameavg89']);
    }
  ?>
  	
  </a>
            </div>
            </td>
                
      </tr>
      <tr>
        <td>Boleta Predial</td>
        
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message88']) && $_SESSION['message88'])
    {
      printf('<b>%s</b>', $_SESSION['message88']);
      unset($_SESSION['message88']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="88">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file23">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg88']) && $_SESSION['filenameavg88'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg88']);
      unset($_SESSION['filenameavg88']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment23" name="ficoment23" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file23delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg88']) && $_SESSION['filenameavg88'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg88']);
      unset($_SESSION['filenameavg88']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
       
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
       <tr>
        <td>Documento que acredite la propiedad</td>
             <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message78']) && $_SESSION['message78'])
    {
      printf('<b>%s</b>', $_SESSION['message78']);
      unset($_SESSION['message78']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="78">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file24">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg78']) && $_SESSION['filenameavg78'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg78']);
      unset($_SESSION['filenameavg78']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment24" name="ficoment24" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file24delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg78']) && $_SESSION['filenameavg78'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg78']);
      unset($_SESSION['filenameavg78']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>
      <tr>
        <td>Identificación Oficial del propietario o representante legal</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message87']) && $_SESSION['message87'])
    {
      printf('<b>%s</b>', $_SESSION['message87']);
      unset($_SESSION['message87']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="87">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file25">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg87']) && $_SESSION['filenameavg87'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg87']);
      unset($_SESSION['filenameavg87']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment25" name="ficoment25" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file25delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg87']) && $_SESSION['filenameavg87'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg87']);
      unset($_SESSION['filenameavg87']);
    }
  ?>
  	
  </a>
            </div>
            </td>
            
      </tr>
      <tr>
        <td>Plano ó Croquis del terreno (medidas y colindancias)</td>
           <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message86']) && $_SESSION['message86'])
    {
      printf('<b>%s</b>', $_SESSION['message86']);
      unset($_SESSION['message86']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="86">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file26">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg86']) && $_SESSION['filenameavg86'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg86']);
      unset($_SESSION['filenameavg86']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment26" name="ficoment26" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file26delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg86']) && $_SESSION['filenameavg86'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg86']);
      unset($_SESSION['filenameavg86']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>





































      
      <tr>
        <td>Croquis de Localización</td>
            
            <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message85']) && $_SESSION['message85'])
    {
      printf('<b>%s</b>', $_SESSION['message85']);
      unset($_SESSION['message85']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="85">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file27">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg85']) && $_SESSION['filenameavg85'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg85']);
      unset($_SESSION['filenameavg85']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment27" name="ficoment27" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file27delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg85']) && $_SESSION['filenameavg85'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg85']);
      unset($_SESSION['filenameavg85']);
    }
  ?>
  	
  </a>
            </div>
            </td>
              
      </tr> 
      <tr>
        <td>Otros</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message84']) && $_SESSION['message84'])
    {
      printf('<b>%s</b>', $_SESSION['message84']);
      unset($_SESSION['message84']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="84">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file28">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg84']) && $_SESSION['filenameavg84'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg84']);
      unset($_SESSION['filenameavg84']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment28" name="ficoment28" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file28delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg84']) && $_SESSION['filenameavg84'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg84']);
      unset($_SESSION['filenameavg84']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
       
      </tr>
      <tr>
        <td>Relación de indivisos de Condominio</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message15']) && $_SESSION['message15'])
    {
      printf('<b>%s</b>', $_SESSION['message15']);
      unset($_SESSION['message15']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="15">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file29">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment29" name="ficoment29" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file29delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg15']) && $_SESSION['filenameavg15'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg15']);
      unset($_SESSION['filenameavg15']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
       
      </tr>
      <tr>
        <td>Plano arquitectónico o croquis de construcción</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message77']) && $_SESSION['message77'])
    {
      printf('<b>%s</b>', $_SESSION['message77']);
      unset($_SESSION['message77']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="77">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file30">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg77']) && $_SESSION['filenameavg77'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg77']);
      unset($_SESSION['filenameavg77']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment30" name="ficoment30" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file30delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg77']) && $_SESSION['filenameavg77'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg77']);
      unset($_SESSION['filenameavg77']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
        
                
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <tr>
        <td>Plano arquitectónico contenido edificaciones de su uso privativo</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message76']) && $_SESSION['message76'])
    {
      printf('<b>%s</b>', $_SESSION['message76']);
      unset($_SESSION['message76']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="76">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file31">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg76']) && $_SESSION['filenameavg76'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg76']);
      unset($_SESSION['filenameavg76']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment31" name="ficoment31" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file31delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg76']) && $_SESSION['filenameavg76'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg76']);
      unset($_SESSION['filenameavg76']);
    }
  ?>
  	
  </a>
            </div>
            </td>
             
      </tr> 
      <tr>
        <td>Plano del conjunto donde señalan las deferentes superficies constructivas</td>
           <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message75']) && $_SESSION['message75'])
    {
      printf('<b>%s</b>', $_SESSION['message75']);
      unset($_SESSION['message75']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="75">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file32">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg75']) && $_SESSION['filenameavg75'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg75']);
      unset($_SESSION['filenameavg75']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment32" name="ficoment32" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file32delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg75']) && $_SESSION['filenameavg75'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg75']);
      unset($_SESSION['filenameavg75']);
    }
  ?>
  	
  </a>
            </div>
            </td>
      </tr>       
      <tr>
        <td>Planos de Factores</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message74']) && $_SESSION['message74'])
    {
      printf('<b>%s</b>', $_SESSION['message74']);
      unset($_SESSION['message74']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="74">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file33">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg74']) && $_SESSION['filenameavg74'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg74']);
      unset($_SESSION['filenameavg74']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment33" name="ficoment33" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file33delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg74']) && $_SESSION['filenameavg74'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg74']);
      unset($_SESSION['filenameavg74']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
      </tr>
      <tr id="imgaenmoral">
        <td>Imagen de Fachada</td>
        <td >
            	<center>

            	 <?php
    if (isset($_SESSION['message121']) && $_SESSION['message121'])
    {
      printf('<b>%s</b>', $_SESSION['message121']);
      unset($_SESSION['message121']);
    }
  ?>
  <form method="POST" action="../../../../load" enctype="multipart/form-data">
    <div>
    <input type="hidden" id="documents" name="documents" value="120">
        <input type="hidden" id="annio" name="annio" value="<?php echo $anio;?>">
        <input type="hidden" id="cclv" name="cclv" value="<?php echo $clv;?>">
        <input type="hidden" id="folioo" name="folioo" value="<?php echo $foliosinceros;?>">
        <input type="hidden" id="tipopersona" name="tipopersona" value="<?php echo $tipopersona;?>">
        <input type="file" name="uploadedFile" />
    </div>

    <input class="btn btn-success" type="submit" name="uploadBtn" value="Subir" />
  </form>
  </center>
            	
            </td>
            <td style="text-align: center;">
            
            
            <div id="file34">
            
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg121']) && $_SESSION['filenameavg121'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg121']);
      unset($_SESSION['filenameavg121']);
    }
  ?>
  	
  </a>
            </div>
            </td>
     <td align="center"><textarea id="ficoment34" name="ficoment34" placeholder="Escribir algun comentario" style="margin-top: 10px;"></textarea></td>
     
     <td style="text-align: center;">
            
            
            <div id="file34delete">
            <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i>
            <br>
            <a> <?php
    if (isset($_SESSION['filenameavg121']) && $_SESSION['filenameavg121'])
    {
      printf('<b>%s</b>', $_SESSION['filenameavg121']);
      unset($_SESSION['filenameavg121']);
    }
  ?>
  	
  </a>
            </div>
            </td>
        
      </tr> 
         
    
    </tbody>
    
  
    
    
    
    
    </table>
    </div>
    
    	<div id="tipolgis" class="col-sm-12 table-responsive" style="">
    	<center>
    		<br><br>
  <form method="POST" action="load" enctype="multipart/form-data">
    <div>
      
      <H2><B>AGREGAR TIPOLOGIAS</B></H2><BR><BR>
      <H4>
      <input type="file" id="uploadedFile" name="uploadedFile" onchange="upload_files3();" />
      </H4>
      <BR><BR>
    </div>

    
  </form>
  </center>
           <table id="tipologstable" class="table table-striped">
        <thead ><tr>
            <th style="text-align: center;">Lista de Tipologias</th>
            <th style="text-align: center;">Cargar Tipologias</th>
            <th style="text-align: center;">Tipologias Subidas</th>
            <th style="text-align: center;">Comentario</th>
            <th style="text-align: center;">Corregir Tipologias</th>
        </tr>

      


    </thead>
    
     
    
                  <tbody id="tipologs" style="text-align: center;"></tbody>
    
    
    
    
    
    </table>
    </div>
    
    	<div  class="col-sm-12 table-responsive" style="">
    	<br><br>
    	<center>
    	<input class="btn btn-success" type="button" name="avg1" id="avg1" value="Guardar Todo" onclick="bad(<?php echo $tipopersona;?>,<?php echo $foliosinceros;?>,<?php echo $clv;?>,<?php echo $anio;?>);">
    	</center>
    	<br><br>
           
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
<script type="text/javascript">
$(document).ready(function () {
	 

	 /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/
	
	
	var b = $("#folioo").val(); // folio
	var c = $("#cclv").val(); // claves
	
	$("#xcod").css("display","none");
	$("#tipolgis").css("display","none");
	$("#avg1").css("display","none");
	
	
	
	validacion_para_recargar();
	//documentosX(a,b,c);
	//documentosXfiles(a,b,c);
});


function documentosXfiles(a,b,c){
    $("#file1").html('');
    $("#file2").html('');
    $("#file3").html('');
    
    $("#file4").html('');
    $("#file5").html('');
    $("#file6").html('');

    $("#file7").html('');
    $("#file8").html('');
    $("#file9").html('');


    $("#file10").html('');
    $("#file11").html('');
    $("#file12").html('');

    $("#file13").html('');
    $("#file14").html('');
    $("#file15").html('');

    $("#file16").html('');
    $("#file17").html('');
    $("#file18").html('');

    $("#file19").html('');
    $("#file20").html('');
    $("#file21").html('');

    $("#file22").html('');
    $("#file23").html('');
    $("#file24").html('');

    $("#file25").html('');
    $("#file26").html('');
    $("#file27").html('');


    $("#file28").html('');
    $("#file29").html('');
    $("#file30").html('');

    $("#file31").html('');
    $("#file32").html('');
    $("#file33").html(''); 
    $("#file34").html('');     
    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	
    $.post("../../../../acceso",{acceess:111, tipopre:a , dictams:b, dctx:c },function(m){
    	//console.log(m);
      $.each( m, function( key, value ) {
    var a = key + 1;
      var cher = "";
      var cher2 = "";
      var html="";
    if( value.comentario === null ){
      cher = "";
    }else{
      cher = value.comentario;
    }

    if( value.comentario2 === null ){
      cher2 = "";
    }else{
      cher2 = value.comentario2;
    }



    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	if( $("#prebaldio").val()  == "100" ){
				

    //if( a == "1" ){
        
    // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica

    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file1").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file1delete").html(html1_1);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file2").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file2delete").html(html1_1);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file3").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file3delete").html(html1_1);
    }
    if( value.orden == "99"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file4").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file4delete").html(html1_1);
    }
    if( value.orden == "98"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file5").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file5delete").html(html1_1);
    }
    if( value.orden == "83"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file6").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file6delete").html(html1_1);
    }
    if( value.orden == "97"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file7").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file7delete").html(html1_1);
    }
    if( value.orden == "96"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file8").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file8delete").html(html1_1);
    }
    if( value.orden == "95"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file9").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file9delete").html(html1_1);
    }

    if( value.orden == "82"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file10").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file10delete").html(html1_1);
    }
    if( value.orden == "81"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file11").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file11delete").html(html1_1);
    }
    if( value.orden == "80"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file12").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
    $("#file12delete").html(html1_1);
    }
    if( value.orden == "79"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file13").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file13delete").html(html1_1);
    }
    if( value.orden == "15"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file14").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
    $("#file14delete").html(html1_1);
    }
    if( value.orden == "94"){
    
	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
    $("#file15").html(html1);

    html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
    $("#file15delete").html(html1_1);
    }


    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file16").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file16delete").html(html1_1);
        }
 // persona fisica persona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisicapersona fisica


    /*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/
	
    }else if( $("#preconstruido").val() == "100" ){









        
        
 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral
    if( value.orden == "14"){
    	
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file18").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file18delete").html(html1_1);
        
    }
    if( value.orden == "10"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file19").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file19delete").html(html1_1);
    }  
    if( value.orden == "11"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file20").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file20delete").html(html1_1);
    }
    
    if( value.orden == "90"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file21").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file21delete").html(html1_1);
    }
    if( value.orden == "89"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file22").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file22delete").html(html1_1);
    }
    if( value.orden == "88"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file23").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file23delete").html(html1_1);
    }
    if( value.orden == "87"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file25").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file25delete").html(html1_1);
    }
    if( value.orden == "86"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file26").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file26delete").html(html1_1);
    }
    if( value.orden == "85"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file27").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file27delete").html(html1_1);
    }
    if( value.orden == "84"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file28").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file28delete").html(html1_1);
    }
    if( value.orden == "15"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file29").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file29delete").html(html1_1);
    }
    if( value.orden == "78"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file24").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        //,' + value.clavecastatral + ',' + value.folix
        $("#file24delete").html(html1_1);
    }
    if( value.orden == "77"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file30").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file30delete").html(html1_1);
    }
    if( value.orden == "76"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file31").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file31delete").html(html1_1);
    }
    if( value.orden == "75"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file32").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file32delete").html(html1_1);
    }
    if( value.orden == "74"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file33").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen + ');">';
        $("#file33delete").html(html1_1);
    }
    if( value.orden == "120"){
        
    	html1 = '<input type="hidden" id="'+value.iddox+'" name="'+value.iddox+'" value="'+value.nombredoc+'"/><i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a href="../../../../files/documentos/' + value.folix + '/' + value.clavecastatral + '/' + value.nombredoc + '">' + value.nombredoc + '</a>';
        $("#file34").html(html1);

        html1_1 = '<input type="button" id="dropp" name="dropp" class="btn btn-danger" value="Eliminar" onclick="deletedocs(' + value.iddox + ',' + value.aniodictamen  + ');">';
        $("#file34delete").html(html1_1);
        }








    

    }else{
        console.log("error de logica de tipo de predio baldio o construido");
    }

 // persona moral persona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moralpersona moral  


  });
   
    });  
	
}




function deletedocs(id_docx,aniodicta){
	//,cclave,idfolxavg
	

	
	  //var a1 = idfolxavg; //
	  
	  var a2 = $("#cclv").val(); //
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#fconceros").val(); //

	  var tipopweronsa = $("#tipopersona").val()

	  
	  //$('#G tbody tr').each(function() {
	      //var _order = $(this).find('td').eq(0).text();

	      //console.log( "https://dictamunigecem.edomex.gob.mx/fil/elim/" + a1 + "/" + a2 + "/" + _order + "/" + a3 );
	      location.href = "http://localhost/dictamun/files/motor_deletefile_especial.php/"+ anio +"/" + a1 + "/" + a2 + "/" + id_docx + "/" + id_docx2 + "/" + tipopweronsa;


	      
	   // });

	   
	  
	  
	  

	}



/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function documentosX(a,b,c){
    $("#tipologs").html('');
    $.post("../../../../acceso",{acceess:110,idpers:a,dictams:b,dctx:c},function(m){
    	//console.log(m);
      $.each( m, function( key, value ) {
    var a = key + 1;
      var cher = "";
      var cher2 = "";
      var html="";
    if( value.comentario === null ){
      cher = "";
    }else{
      cher = value.comentario;
    }

    if( value.comentario2 === null ){
      cher2 = "";
    }else{
      cher2 = value.comentario2;
    }		   
    html =
      '<tr><input type="hidden" id="'+value.id_docx+'" name="'+value.id_docx+'" value="'+value.nombredoc+'"/>' +
      '<td style="display:none;">' + value.id_docx + '</td><td>' + a + '</td>' +
      '<td>Tipologia' + a + '</td><td> <i class="fa fa-file fa-2x" style="margin-top: 10px;"></i><br><a id="'+ value.id_docx +'" href="http://localhost/dictamun/files/documentos/'+ b +'/'+ c +'/'+ value.nombredoc +'">' + value.nombredoc + '</a> </td>';

    $("#tipologs").append( html + '<td style="color: black;" align="center"><textarea id="commentrep" name="commentrep" placeholder="Escribir algun comentario" cols="50" style="margin-top: 10px;">'+ cher +'</textarea>' +
    		'<td><input type="button" id="dropp"  name="dropp" class="btn btn-danger" value="Eliminar"  onclick="deletex(' + value.id_docx +','+ value.aniodictamen + ');"></td></tr>');
   


  });
   
    });  
	
}
/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function upload_files3(){

		//alert("es insertar");

		var d = 1; 
	var car = $("#folioo").val(); // folio
	var clvcat = $("#cclv").val(); // claves

	
	//$(".upload-msg4").text('Cargando...');
	var inputFileImage = document.getElementById("uploadedFile");
	var file = inputFileImage.files[0];
	var data = new FormData();
	data.append('uploadedFile',file);
	data.append('Kap',car);
	data.append('opcs',d);
	data.append('cv',clvcat);
	$.ajax({
		url: "../../../../load2",
		type: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			console.log(data);
			
			//alert("tipologia subida");
			//ready tipologias
			documentosX(d,car,clvcat);

		}
	});

} 

/* TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIAS TIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIASTIPOLOGIAS */
function deletex(id_docx,aniodicta){

	
	  
	  
	  var a2 = $("#cclv").val(); //clave catastral
	  //name_file
	  var id_docx2 = $('#'+  id_docx).val(); // nombre de archivo a eliminar
	  //var a3 = nombredoc; //

	  var anio = aniodicta; // año a dictaminar

	  var a1 = $("#fconceros").val(); //folio
	 

	  var tipopweronsa = $("#tipopersona").val()

	  
	  //$('#G tbody tr').each(function() {
	      //var _order = $(this).find('td').eq(0).text();

	      //console.log( "https://dictamunigecem.edomex.gob.mx/fil/elim/" + a1 + "/" + a2 + "/" + _order + "/" + a3 );
	      location.href = "http://localhost/dictamun/files/motor_deletefile_especial.php/"+ anio +"/" + a1 + "/" + a2 + "/" + id_docx + "/" + id_docx2 + "/" + tipopweronsa;


	      
	   // });

	   
	  
	  
	  

	}

var pahtv_t = { vector_t : [] } ;
var vector_t = { id_inmu : '',id_doc : '',tipolg_n : '', comentario : '' };

function bad(pers,fl,clv,anio){
	/*
	funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
	ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
	y
	ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
	*/

	if( $("#prebaldio").val()  == "100" ){
	      //Predio baldío
	 var avaluofirmado = $('#ficoment1').val(); //formato avaluo firmado
     var dictaval = $('#ficoment2').val(); //archivo dictaval .val
     var construcciones = $('#ficoment3').val(); //archivo contrucciones .val 
     var escriturap = $('#ficoment4').val(); //escritura publica
     var boletapredial = $('#ficoment5').val(); // boleta predial
     var acreditapropied = $('#ficoment6').val(); //doc q acredite la propiedad
     var idenoficial = $('#ficoment1').val(); //identificacion oficial
     var medidascolindanc = $('#ficoment7').val(); //medidad y colindancias
     var croquislocaliz = $('#ficoment8').val(); // creoquis de localizacion
     var otros = $('#ficoment9').val(); //otros
     var indivisoscondominios = $('#ficoment10').val(); //indivisos y condominio
     var croquisconstruccion = $('#ficoment11').val(); //plano arq. o croquis de construccion
     var usoprivativo = $('#ficoment12').val(); //uso privativo
     var superficiesconstru = $('#ficoment13').val(); //superficies constructivas
     var planosfactores = $('#ficoment14').val(); // planos de factores
     var fachada = $('#ficoment15').val(); // fachada

     $.post("../../../../acceso",{acceess:113,
		    claveCat:clv,
		    folio2:fl},function(z){
	            
		    	console.log(z); 
           if( z == "50" ){
	              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
	              alert(" DEBES TENER AL MENOS 7 O MAS DOCUMENTOS");
	              
	              
           }else if( z == "100" ){
	              //TIENES LOS DOCUMENTOS NECESARIOS
         	  alert("TIENES LOS DOCUMENTOS NECESARIOS");

         	  $.post("../../../../acceso",{acceess:1118,
             	  claveCat:clv,
             	  folio2:fl,
                  avaluofirmado :avaluofirmado, 
                  dictaval :dictaval, 
                  construcciones :construcciones, 
                  escriturap :escriturap, 
                  boletapredial :boletapredial, 
                  acreditapropied :acreditapropied, 
                  idenoficial:idenoficial,
                  medidascolindanc:medidascolindanc,
                  croquislocaliz :croquislocaliz, 
                  otros:otros,
                  indivisoscondominios :indivisoscondominios, 
                  croquisconstruccion :croquisconstruccion, 
                  usoprivativo :usoprivativo, 
                  superficiesconstru:superficiesconstru,
                  planosfactores :planosfactores, 
                  fachada:fachada},function(prediobaldiosave){

                	  console.log(prediobaldiosave);
		            	if( prediobaldiosave == "50" ){
	  		            	
		            		console.log("guardados comentarios");



		            		
		            	    var abc = fl;
		            	    var a = {acceess:1152,abc:abc,ky:clv};
		            	    $.ajax({
		            	      url: "../../../../acceso",
		            	      type: "POST",
		            	      data: a,		  		            	      
		            	      success: function(e)
		            	      {
		            	        if( e == "10" ){
		            	          console.log( "correccion de .val lista al " + e);
		            	        }else{
		            	          console.log("error de ordenar avaluos val: " + e);
		            	        }

		            	      }
		            	    });

		            	    var b = {acceess:1153,abc:abc,ky:clv};
		            	    $.ajax({
		            	      url: "../../../../acceso",
		            	      type: "POST",
		            	      data: b,
		            	      success: function(ee)
		            	      {
		            	        if( ee == "10" ){
		            	          console.log("guardado del avaluos.val listo tiene" + ee);
		            	        }else{
		            	        	console.log("error al guardar avaluos val: " + ee);
		            	        }

		            	      }
		            	    });

		            	    var c = {acceess:1154,abc:abc,ky:clv};
		            	    $.ajax({
		            	      url: "../../../../acceso",
		            	      type: "POST",
		            	      data: c,
		            	      success: function(i)
		            	      {
		            	        if( i == "10" ){
		            	          console.log( "guardado del construcciones .val listo tiene" + i);
		            	        }else{
		            	          console.log(i);
		            	        console.log("error al guardar construcciones val: " + i);
		            	        }

		            	      }
		            	    });


		            	  alert("GUARDADO");
		            	location.href = "http://localhost/dictamun/filess";

		            		
		            	}else{
	  		            	
		            		console.log("error : " + prediobaldiosave );
		            	}
		            	
                      
                      });
              

           }
		    });

   
				

			}else if( $("#preconstruido").val() == "100" ){
				// Predio construido
			

			      var avaluofirmadoM = $("#ficoment18").val(); //formato avaluo firmado
			      var dictavalM =$("#ficoment19").val(); //archivo dictaval .val
			      var construccionesM = $("#ficoment20").val(); //archivo contrucciones .val  

			      var actaempresa = $("#ficoment21").val(); //Acta Constitutiva de la Empresa  
			      var nombramientolegal = $("#ficoment22").val(); // Nombramiento del Representante legal  
			      var boleta = $("#ficoment23").val(); //Boleta Predial  

			      var acreditapropiedadM = $("#ficoment24").val(); //Documento que acredite la propiedad
			      var idenoficialM = $("#ficoment25").val(); //Identificación Oficial del propietario o representante legal
			      var medidascolindancM = $("#ficoment26").val(); // Planos ó Croquis de terreno (medidas y colindancias)

			      var croquislocalizM = $("#ficoment27").val(); //Croquis de Localización  
			      var otrosM = $("#ficoment28").val(); //otros
			      var indivisoscondominiosM = $("#ficoment29").val(); //Relación de indivisos de Condominio
			      var croquisconstruccionM = $("#ficoment30").val(); //Plano arquitectónico o croquis de construcción

			      var usoprivativoM = $("#ficoment31").val(); //Plano arquitectónico contenido edificaciones de su uso privativo
			      var superficiesconstruM = $("#ficoment32").val(); //Plano del conjunto donde señalan las deferentes superficies constructivas
			      var planosfactoresM = $("#ficoment33").val();//Planos de Factores

			        
			      var fachadaM = $('#ficoment34').val(); // fachada
			      
			    
			    pahtv_t.vector_t = [];
			    
			    $('#tipologstable tbody tr').each(function() {
			      var codigodi = $(this).find('td').eq(0).text();			      
				  var iddoc = 12;
				  var comentario = $(this).find('textarea').val();						
				  
				//var a = key + 1;
			   pahtv_t.vector_t.push({				   
			            folio : fl,
			            clve : clv,						
						id_doc: iddoc,
						tipolg_n : codigodi,
						comentario : comentario
				});


			    });
			    console.log(pahtv_t.vector_t);



			    $.post("../../../../acceso",{acceess:113,
				    claveCat:clv,
				    folio2:fl},function(z){
			            
				    	console.log(z); 
		              if( z == "50" ){
			              // DEBES TENER AL MENOS 7 O MAS DOCUMENTOS
			              alert(" DEBES TENER AL MENOS 7 O MAS DOCUMENTOS");
			              
			              
		              }else if( z == "100" ){
			              //TIENES LOS DOCUMENTOS NECESARIOS
		            	  alert("TIENES LOS DOCUMENTOS NECESARIOS");

		            	  $.post("../../../../acceso",{acceess:112,
		  				    claveCat:clv,
		  				    folio2:fl,
		  		            avaluofirmadoM:avaluofirmadoM, 
		  		            dictavalM:dictavalM, 
		  		            construccionesM:construccionesM, 
		  		            actaempresa:actaempresa, 
		  		            nombramientolegal:nombramientolegal, 
		  		            boleta:boleta, 
		  		            acreditapropiedadM:acreditapropiedadM,
		  		            idenoficialM:idenoficialM,
		  		            medidascolindancM:medidascolindancM, 
		  		            croquislocalizM:croquislocalizM,
		  		            otrosM:otrosM, 
		  		            indivisoscondominiosM:indivisoscondominiosM, 
		  		            croquisconstruccionM:croquisconstruccionM, 
		  		            usoprivativoM:usoprivativoM,
		  		            superficiesconstruM:superficiesconstruM, 
		  		            planosfactoresM:planosfactoresM,
		  		            fachadaM:fachadaM,
		  		            
		  		            tipologg:pahtv_t.vector_t
		  		            
		  		            },function(saver){
		  		            	console.log(saver);
		  		            	if( saver == "50" ){
			  		            	
		  		            		console.log("guardados comentarios");



		  		            		
		  		            	  var abc = fl;
				            	    var a = {acceess:1152,abc:abc,ky:clv};
				            	    $.ajax({
				            	      url: "../../../../acceso",
				            	      type: "POST",
				            	      data: a,		  		            	      
				            	      success: function(e)
				            	      {
				            	        if( e == "10" ){
				            	          console.log( "correccion de .val lista al " + e);
				            	        }else{
				            	          console.log("error de ordenar avaluos val: " + e);
				            	        }

				            	      }
				            	    });

				            	    var b = {acceess:1153,abc:abc,ky:clv};
				            	    $.ajax({
				            	      url: "../../../../acceso",
				            	      type: "POST",
				            	      data: b,
				            	      success: function(ee)
				            	      {
				            	        if( ee == "10" ){
				            	          console.log("guardado del avaluos.val listo tiene" + ee);
				            	        }else{
				            	        	console.log("error al guardar avaluos val: " + ee);
				            	        }

				            	      }
				            	    });

				            	    var c = {acceess:1154,abc:abc,ky:clv};
				            	    $.ajax({
				            	      url: "../../../../acceso",
				            	      type: "POST",
				            	      data: c,
				            	      success: function(i)
				            	      {
				            	        if( i == "10" ){
				            	          console.log( "guardado del construcciones .val listo tiene" + i);
				            	        }else{
				            	          console.log(i);
				            	        console.log("error al guardar construcciones val: " + i);
				            	        }

				            	      }
				            	    });


		  		            	  alert("GUARDADO");
		  		            	location.href = "http://localhost/dictamun/filess";

		  		            		
		  		            	}else{
			  		            	
		  		            		console.log("error : " + saver );
		  		            	}
			  		            
		  		            });

		  		            
		            	  
			              
			              
		              }else{
			              console.log("error logico");
		              }
		              
		           
		            
		        
		      });


			}else{
				 console.log("error no se seeleciono tipo de predio");
			}
	
}


function baldio(){



	
	$("#prebaldio").val(100);
	$("#preconstruido").val("");
	$("#xcod").css("display","block");
	
	$("#avg1").css("display","block");

		$("#docxs_f").css("display","block");
		$("#docxs_m").css("display","none");
		$("#tipolgis").css("display","none");


		 /*
		funcion que actua en base al tipo de baldio para guardar y no en base al tipo de persona ezsta malllllllll
		ya que una persona fisica puede ser baldio  Predio baldío        o       Predio construido.
		y
		ya que una persona moral puede ser baldio  Predio baldío        o       Predio construido.
		*/
		
		
		var b = $("#folioo").val(); // folio
		var c = $("#cclv").val(); // claves
					
		documentosXfiles(1,b,c);


		$.post("../../../../acceso",{acceess:114,
			    claveCat:c,
			    folio2:b,          
	          },function(updatecamp){
		          //console.log(updatecamp);
		          
		          if( updatecamp == '50' ){
			          console.log("error al seleccionar tipo de predio baldio");
		          }else{
		        	  console.log( "es un predio baldio continua" + updatecamp );
		          }
		          
	              });
	    
	}
	function construccion(){
		$("#prebaldio").val("");
		$("#preconstruido").val(100);
		$("#xcod").css("display","block");
		
		$("#avg1").css("display","block");

		
		$("#docxs_m").css("display","block");
		$("#tipolgis").css("display","block");
		
		$("#docxs_f").css("display","none");

		$("#imgaenmoral").css("display","none");

		var sssuper = $("#folioo").val();
		var b = zfill(sssuper, 5); // folio
		var c = $("#cclv").val(); // claves
		
		documentosXfiles(2,b,c);
		
		documentosX(2,b,c);


		$.post("../../../../acceso",{acceess:115,
		    claveCat:c,
		    folio2:b,          
          },function(updatecamp){
	          //console.log(updatecamp);
	          
	          if( updatecamp == '50' ){
		          console.log("error al seleccionar tipo de predio baldio");
	          }else{
	        	  console.log( "es un predio construido continua" + updatecamp );
	          }
	          
              });


	}


	function validacion_para_recargar(){
		var b = $("#folioo").val(); // folio
		var c = $("#cclv").val(); // claves
		$.post("../../../../acceso",{acceess:116,
		    claveCat:c,
		    folio2:b,          
          },function(updatecampvalidad){
	          //console.log(updatecamp);
	          
	          if( updatecampvalidad == 't' ){
	        	  console.log( "es un predio baldio, continua " + updatecampvalidad );
	        	  $("input[name=predio]").val(['1']);
	        	  baldio();
	          }else if( updatecampvalidad == 'f' ){
	        	  console.log( "es un predio construido, continua "  + updatecampvalidad );
	        	  $("input[name=predio]").val(['2']);
	        	  construccion();
	          }else{
	        	  console.log( "error de ejecucion"  );
	          }
	          
              });
	}


	function zfill(number, width) {
	    var numberOutput = Math.abs(number); /* Valor absoluto del número */
	    var length = number.toString().length; /* Largo del número */ 
	    var zero = "0"; /* String de cero */  
	    
	    if (width <= length) {
	        if (number < 0) {
	             return ("-" + numberOutput.toString()); 
	        } else {
	             return numberOutput.toString(); 
	        }
	    } else {
	        if (number < 0) {
	            return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
	        } else {
	            return ((zero.repeat(width - length)) + numberOutput.toString()); 
	        }
	    }
	}

</script>

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