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
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <?php include '../const.php'; ?>
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>lib/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

 input[type="text"]:focus {
    /*border-color: rgb(255, 144, 0);
    box-shadow: 1px 0 0 rgba(149, 0, 0, 1)inset, 0 0 8px rgba(255,144,0,0.6);
    outline: 0 none; 
    border-right: 0;
    border-left: 0;  
    border-top: 0;   */  
  /*  box-shadow: 0 1px 1px rgba(229, 103, 23, 0.075)inset, 0 0 8px rgba(255,144,0,0.6);  */   
    border-bottom-color: #53964a; 
    box-shadow: inset 0 -1px 0 0 #53964a;    
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

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}


span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
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

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
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
div#j {
display: none;
}
div#i {
display: none;
}
   </style>

  </head>

  <body ng-app="ContrApp3" ng-controller="CtrbyController3 as selctrl">
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
      <li><a style="margin-top: 4px;" href="../PadronDictaminadores">Padr&oacute;n de Dictaminadores</a></li>
     
      <li><p style="margin-top: 10px; margin-right: 15px; color: #E6EAE7;"><?php echo $_SESSION['usuarioactual']; ?> &nbsp; &nbsp;  
        <i style="color: #E6EAE7; cursor: pointer;" class="fa fa-user-times fa-2x" title="Cerrar Sesi&oacute;n" id="killer"></i>         

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
     <!-- <a href="../reporte.php" download="AcuseDictamen">
      <input type="button" name="acuse" id="acuse" value="ACUSE" onclick="okAcuse();">
    </a> --> 
     <div class="col-md-12 col-sm-12" style="text-align: right;">
      <input type="text" name="folio" id="folio" style="font-weight: bold; text-align: right; font-size: large; background-color: transparent; border: none;">
      
     </div><br><br>
     <div class="col-md-12 col-sm-12" style="text-align: center;">
       <h4 style="font-weight: bold;"> Datos generales del Contribuyente</h4>
     </div>
     <br><br><br>
     <form id="validationForm" name="validationForm" method="POST">
     
     <div class="col-md-12">&nbsp;</div>
     <div class="col-md-12">
           <div class="col-md-3"><br></div> 
           <div class="col-md-3">
           <input type="radio" id="demo-priority-low" name="demo-priority" value="1" onclick="name_fisk();">
              <label for="demo-priority-low" title="Persona FÃ­sica">Persona Fisica</label>
           </div>
           <div class="col-md-3">
           <input type="radio" id="demo-priority-low" name="demo-priority" value="2" onclick="name_morl();">
              <label for="demo-priority-low" title="Persona FÃ­sica">Persona Moral</label>
            </div>
            <div class="col-md-3"><br></div><br><br><br> 
     </div> 
   <div id="j">  
   <div class="col-md-12 col-sm-12" style="">
     <div class="col-md-3 col-sm-2" style="text-align: right;"> 
       <h4>Nombre(s):</h4>
     </div>
     <div class="col-md-4 col-sm-3" style="">
       <input type="text" name="nombref" id="nombref" placeholder="Ingresar nombre del Contribuyente" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px;" onkeyup="validarNombre()" onblur="validarNombre()"> 
     </div> 
     <div class="col-md-1 col-sm-2" style="text-align: right;">  
       <h4>Telefono:</h4>  
     </div>
      <div class="col-md-2 col-sm-3" style="">
       <input type="text" name="telefonof" id="telefonof" placeholder="Ingresar Telefono" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;" onkeyup="validarTel()" onblur="validarTel()">    
     </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-1"></div>
    <div class="col-md-6 col-sm-3" id="message" name="message" style="color:  #c22708;" hidden="">
                        Nombre incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div> 
    <div class="col-md-6 col-sm-3" id="messageTelAsc" name="messageTelAsc" style="color:  #c22708;" hidden="">
                        Telefono incorrecto. Introducir solo 10 nÃºmeros y no dejar el campo vacio.
   
                        </div>   
    </div>
    
  
    <br><br><br><br>
    <div class="col-md-12 col-sm-12">
    <div class="col-md-3 col-sm-2" style="text-align: right;"><h4>Apellido Paterno:</h4></div>
      <div class="col-md-3 col-sm-3" style=""> 
       <input type="text" name="apellidoP" id="apellidoP" placeholder="Ingresar Apellido Paterno" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px;" onkeyup="validarAPP()" onblur="validarAPP()"> 
     </div>
      
    <div class="col-md-2 col-sm-2" style="text-align: right;"> 
    <h4 style="">E-mail: </h4>   
    </div>    
      <div class="col-md-2 col-sm-3" style="">    
    <input type="text" name="email" id="email" placeholder="Ingresar E-mail" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;">  
    </div>
    
    </div>
   
    <div class="col-md-12">
      <div class="col-md-1"></div>
      <div class="col-md-6 col-sm-3" id="messageAP" name="messageAP" style="color:  #c22708;" hidden="">
                        Apellido incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div>
    </div>
    <br><br><br><br>
   <div class="col-md-12 col-sm-12">  
   <div class="col-md-3 col-sm-2" style="text-align: right;"> 
    <h4 style="">Apellido Materno:</h4>  
    </div> 
    <div class="col-md-3 col-sm-3">   
    <input type="text" name="apellidoM" id="apellidoM" placeholder="Ingresar Apellido Materno" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px;" onkeyup="validarAPM()" onblur="validarAPM()"> 
    </div>
    <div class="col-md-2 col-sm-2" style="text-align: right;"> 
    <h4 style="">RFC: </h4>   
    </div>    
      <div class="col-md-2 col-sm-3" style="">    
    <input type="text" name="rfc1" id="rfc1" placeholder="Ingresar RFC" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;" onkeyup="validarCurp()" onblur="validarCurp()">   
    </div>
    <br><br><br><br>
    </div>
    <div class="col-md-12 col-sm-12">  
   <div class="col-md-3 col-sm-2" style="text-align: right;"> 
    &nbsp;  
    </div> 
    <div class="col-md-3 col-sm-3">   
     &nbsp;
    </div>
    <div class="col-md-2 col-sm-2" style="text-align: right;"> 
    <h4 style="">CURP: </h4>   
    </div>    
      <div class="col-md-2 col-sm-3" style="">    
    <input type="text" name="curp" id="curp" placeholder="Ingresar CURP" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;" onkeyup="validarCurp()" onblur="validarCurp()">   
    </div>
    <br><br><br><br>
    </div>
   </div>
   
   
   <div id="i">  
   <div class="col-md-12 col-sm-12" style="">
     <div class="col-md-3 col-sm-2" style="text-align: right;"> 
       <h4>Nombre de la Asociación:</h4>
     </div>
     <div class="col-md-4 col-sm-3" style="">
       <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre del Contribuyente" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 260px;" onkeyup="validarNombre()" onblur="validarNombre()"> 
     </div> 
     <div class="col-md-1 col-sm-2" style="text-align: right;">  
       <h4>Telefono:</h4>  
     </div>
      <div class="col-md-2 col-sm-3" style="">
       <input type="text" name="telefono" id="telefono" placeholder="Ingresar Telefono" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;" onkeyup="validarTel()" onblur="validarTel()">    
     </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-1"></div>
    <div class="col-md-6 col-sm-3" id="message" name="message" style="color:  #c22708;" hidden="">
                        Nombre incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div> 
    <div class="col-md-6 col-sm-3" id="messageTelAsc" name="messageTelAsc" style="color:  #c22708;" hidden="">
                        Telefono incorrecto. Introducir solo 10 nÃºmeros y no dejar el campo vacio.
   
                        </div>   
    </div>
    
  
    <br><br><br><br>
    <div class="col-md-12 col-sm-12">
    <div class="col-md-3 col-sm-2" style="text-align: right;">
    <h4 style="">RFC: </h4>
    </div>
      <div class="col-md-3 col-sm-3" style=""> 
       <input type="text" name="rfc" id="rfc" placeholder="Ingresar RFC" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;" onkeyup="validarCurp()" onblur="validarCurp()"> 
     </div>
      
    <div class="col-md-2 col-sm-2" style="text-align: right;"> 
    <h4 style="">E-mail: </h4>   
    </div>    
      <div class="col-md-2 col-sm-3" style="">    
    <input type="text" name="email" id="email" placeholder="Ingresar E-mail" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 230px;">  
    </div>
    
    </div>
   
    <div class="col-md-12">
      <div class="col-md-1"></div>
      <div class="col-md-6 col-sm-3" id="messageAP" name="messageAP" style="color:  #c22708;" hidden="">
                        Apellido incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div>
    </div>
    <br><br><br><br>       
   </div>
   
   
   
     
    <div class="col-md-12">
      <div class="col-md-1"></div>
      <div class="col-md-6 col-sm-3" id="messageAM" name="messageAM" style="color:  #c22708;" hidden="">
                        Apellidos incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div>
    </div>
    <div class="col-md-12">
      
      <div class="col-md-5"></div>
       <div class="col-md-7 col-sm-3" id="msjCurp" name="msjCurp" style="color:  #c22708;" hidden="">
                        Ingresar Datos validos. Introducir solo letras y nÃºmeros y no dejar espacios.
   
                        </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-3">
     <input type="hidden" name="dictaminadortmp" id="dictaminadortmp" value="<?php echo $_GET['dic']; ?>" >
      <input type="text" name="dictaminadorN" id="dictaminadorN" style="width: 400px; border: none; background-color: transparent;">
      <input type="hidden" name="dictaminador" id="dictaminador" value="<?php echo $_GET['dic']; ?>" >
   </div>
    </div>
    <br><br><br><br> 

    <div class="col-md-12" style="text-align: center;">
      <h4>Datos del predio a Dictaminar</h4>
    </div>
    <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br><br>
       <div class="col-md-1"><h5 style="text-align: left;">Calle:</h5></div>  
       <div class="col-md-3">
        <input type="text" name="calle" id="calle" placeholder="Ingresar nombre de la calle" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; margin-top: -30px;" onkeyup="validarDomi()" onblur="validarDomi()"> 
       </div>
       <div class="col-md-2"><h5 style="text-align: right;">No.Exterior:</h5></div>
       <div class="col-md-2">  
        <input type="text" name="nExterior" id="nExterior" placeholder="NÃºmero Exterior" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 150px; margin-top: -30px;" onkeyup="validarNE()" onblur="validarNE()"> 
       </div>
       <div class="col-md-2"><h5 style="text-align: right;">No.Interior:</h5></div>
       <div class="col-md-2">
        <input type="text" name="nInterior" id="nInterior" placeholder="NÃºmero Interior" style="border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 138px; margin-top: -30px;" onkeyup="validarNi()" onblur="validarNi()"> 
       </div>  
     </div>
     <div class="col-md-12" style="background-color: #F0FAF3;">
       <div class="col-md-1"></div>
       <div class="col-md-7 col-sm-3" id="messageDomi" name="messageDomi" style="color:  #c22708;" hidden="">
                        Nombre de la calle incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div>
     </div>
     <div class="col-md-12" style="background-color: #F0FAF3;">
       <div class="col-md-6"></div>
       <div class="col-md-5 col-sm-3" id="messageNE" name="messageNE" style="color:  #c22708;" hidden="">
                        Dato incorrecto. Si no cuenta con nÃºmero introducir "0".
   
                        </div>
     </div>
     <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-1"><h5 style="text-align: left; width: 160px;">Estado:</h5></div>
       
        <div class="col-md-3" style="">        
         <select id="estado" name="estado"   style="height: 30px; width: 170px; margin-top: 5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;">
            <option disabled selected>Seleccionar EstadoX</option> 
            
        </select>    
        


<!--div >
  <p>
    <select ng-model="tipo" ng-options="tipo for tipo in  tipos">
    <option ng-repeat="x in tipo" value="{{x.id}}"  ng-click="regionElegida()">{{x.nombre}}</option>
    </select>
  </p>
  <p ng-if="tipo === 'Animales'">
    <select ng-model="seleccion" ng-options="animal for animal in animales">
    </select>
  </p>

  <p ng-if="tipo === 'Frutas'">
    <select ng-model="seleccion" ng-options="fruta for fruta in frutas">
    </select>
  </p>
</div-->


        
      </div>
      <div class="col-md-2"><h5 style="text-align: right;">Municipio:</h5></div>
      <div class="col-md-2">
                 
        <select name="municipio" id="municipio"  ng-model="selctrl.comunaElegida" style="height: 30px; width: 170px; margin-top: 5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;">
            <option disabled selected>Seleccionar Municipio</option> 
        </select>
          
      </div>
      <div class="col-md-2"><h5 style="text-align: right;">Colonia:</h5></div>
      <div class="col-md-2">
        <input type="text" name="colonia" id="colonia" placeholder="Ingresar Colonia" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 150px;" onkeyup="validarCol()" onblur="validarCol()">
      </div>
     </div>
     <div class="col-md-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-1"><h5 style="text-align: left;">C.P:</h5></div>
       <div class="col-md-3" style="">
        <select name="cp" id="cp"  style="height: 30px; width: 170px; margin-top: 5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;">
            <option disabled selected>Seleccionar C.P</option>             
        </select>
      </div>
     </div>
     <div class="col-md-12" style="background-color: #F0FAF3;">
       <div class="col-md-4"></div>
       <div class="col-md-7 col-sm-3" id="messageCol" name="messageCol" style="color:  #c22708;" hidden="">
                        Nombre de la Colonia incorrecto. Introducir solo letras y no dejar el campo vacio.
   
                        </div>
     </div>
      <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-3"><h5 style="text-align: left;">Referencias del Domicilio No.1:</h5></div>
      <div class="col-md-3">
        <input type="text" name="referencias" id="referencias" placeholder="Ingresar Referencias" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 400px;"> 
      </div>
     </div>
     <div class="col-md-12 col-sm-12" style="background-color: #F0FAF3;"><br>
      <div class="col-md-3"><h5 style="text-align: left;">Referencias del Domicilio No.2:</h5></div>
      <div class="col-md-3">
        <input type="text" name="referencias2" id="referencias2" placeholder="Ingresar Referencias" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 400px;"> 
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
      <div class="col-md-1"><h5 style="text-align: left;">Valor Catastral:</h5></div>
       <div class="col-md-3" style="">  <!-- ^\$\d{1,3}(,\d{3})*(\.\d+)?$ -->
        <input  type="text" name="currency-field" id="currency-field" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; width: 160px;">
        <input type="hidden" id="_scrp" name="_scrp" value="" /> 
       </div> 
       <div class="col-md-1" >
         <h5>AÃ±o a Dictaminar</h5>
       </div>
       <div class="col-md-2">
         <input type="text" name="anioDic" id="anioDic" placeholder="AÃ±o a Dictaminar" style="margin-top: -5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0; "> 
       </div>
       <div class="col-md-2"> 
         <h5>Tipo de Dictamen</h5>
       </div>
       <div class="col-md-3">
        <select  name="tipoD" id="tipoD" style="height: 30px; width: 170px; margin-top: 5px; border-bottom: 1px solid #888; background-color: transparent; border-top: 0; border-right: 0; border-left: 0;">
            <option disabled selected>Seleccionar</option> 
            <option ng-repeat="xl in lista_f" value="{{xl.id_tipo}}">{{xl.nombre}}</option>
        </select>
       </div>
       <br><br>
     </div>
  </form> 

    <div class="col-md-12">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <br><br>
        <input type="button" name="contribuyente" class="btn btn-success" value="Guardar" onclick="guardarContribuyente();"> 
      </div>
    </div>



    <div class="col-sm-1"><br><br></div>
    <br><br><br>

  </div> 
  <div class="col-md-1"></div> 
 </div>
 </div>
 <!-- Modal --> 
  <div id="id01_mo" class="modal">
    
  <form class="modal-content animate" action="../reporte.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01_mo').style.display='none'" class="close" title="Close Modal">&times;</span> 
      <img src="../_img/ok.jpg" alt="Avatar" class="avatar" style="width: 120px;">
    </div>
    <center>  
    <div class="c">    
       <div class="form-group">
        <label>Datos guardados Correctamente.<br>Se generarÃ¡ el acuse correspondiente el cual tendrÃ¡ que guardar e imprimir.<br><br><br></label>
      <label for="exampleInputFile"></label>
        <center>
          <a href="../reporte.php" download="AcuseDictamen">
      <input type="button" name="acuse" id="acuse" value="ACUSE" onclick="okAcuse();">
    </a>
        </center>
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

<script src="<?php echo SERVERURL; ?>lib_tab/2.1.3jquery.min.js"></script>
<script src="<?php echo SERVERURL; ?>lib_tab/1.3.15angular.min.js"></script>
<script src="<?php echo SERVERURL; ?>_js/_app2.js"></script>
<script src="<?php echo SERVERURL; ?>_js/_app.js"></script>

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
         <p style="font-size: small;">Basado en Â© Copyright IGECEM 2020. Todos los derechos reservados. VersiÃ³n <?php echo versionx;?></p>
       </div> 
        <div class="col-sm-1" style="height: 50px;"></div>
       <div class="col-md-3 col-sm-3" style="margin-left: 23px;">
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