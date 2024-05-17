<?php include 'web/validatesess.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio de Sesión </title>
    <meta name="description" content="DICTAMUN <?php echo anioo;?> ">
    <link rel="icon" type="image/png" sizes="16x16" href="_img/favicon.ico">


    <!-- Styles -->
    <link href="jsvendor/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="jsvendor/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="jsvendor/assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="jsvendor/assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="jsvendor/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="jsvendor/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="jsvendor/assets/css/lib/helper.css" rel="stylesheet">
    <link href="jsvendor/assets/css/style.css" rel="stylesheet">
</head>

<body>
<div id="main-wrapper">

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" style="background-color: #474648;">
            <div class="nano" style="background-color: #474648;">
                <div class="nano-content" style="background-color: #474648;">
                    <div class="logo" style="background-color: #474648;"><a href="#" style="background-color: #474648;"><!-- <img src="assets/images/logo.png" alt="" /> --><span>
                      <img class="logo-abbr" src="jsvendor/images/igecem.png" style="width: 70px; height: 100px;" alt="">
                      <BR>
                      <BR>
                      <h3 style="color: #ffff;">
                              DICTAMUN MUNICIPAL
                                  </h3>  
                                
                      
                    </span></a></div>
                     <ul class="metismenu" id="menu" style="background-color: #474648;">
                    
                    
                    <li style="background-color: #474648;"><a style="background-color: #474648;" href="javascript:voidindexa()" ><i class="ti-home"></i> Inicio </a>
                           
                        </li>
                    
                    <li style="background-color: #474648;"><a style="background-color: #474648;" href="javascript:void1()"><i class="ti-user"></i> Registro de Contribuyentes</a></li>
                   
                   <li style="background-color: #474648;"><a style="background-color: #474648;"  href="javascript:void2()"><i class="ti-file"></i> Padrón de Dictaminadores</a></li>
                   
                   
                   <li style="background-color: #474648;"><a style="background-color: #474648;"  href="javascript:void3()"><i class="ti-layout-grid2-alt"></i> Iniciar Sesión</a></li>
                   
				   <li style="background-color: #474648;"><a style="background-color: #474648;"  href="STUDIOAIGECEM/findupdatepass/">
				   <i class="ti-layout-grid3"></i>
				   Olvidaste tu contraseña
				   </a></li>
                                                             
                    
                </ul>
                  
                </div>
            </div>
        </div>
        <!-- /# sidebar -->


    <div class="header"  style="background-color: #474648;" >
        <div class="container-fluid">
            <div class="row" >
                <div class="col-md-12 img-responsive" style="/*background-image: url('../_img/banner2.png');
                width: 100%; height: 100%;
                 background-size: 100%; 
                 background-repeat: no-repeat;*/">
                    <div class="float-left">
                    
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="col-md-12" >
                    
                    </div>
                    <div class="float-right" >
                    
                    <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown" style="float: none; padding-left: 75px;">
                            <center>
                            <span class="user-avatar">
                                <h3 style="color: #ffff;">
                              DICTAMUN MUNICIPAL
                                  </h3> 
                                  </span>
                                  </center>
                               
                            </div>
                        </div>
                    
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown" style="float: none;">
                            <center>
                              <span class="user-avatar">
                              
                                  
                               <h3 style="color: #ffff;">
                               
                             &nbsp;<img src="_img/banner23.png"/>
                                  </h3>  
                                  </span>
                               </center>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                  
                    <!-- /# column -->
                    
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card bg-pink" style="background-color: #474648;" >
                                <div class="login-form">
                            <h4>Iniciar Sesión</h4>
                            <form method="post">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input id="usr" name="usr" type="text" class="form-control" placeholder="" >
                                    <div id="message" name="message" style="color:  #c22708;" hidden="">
                        Usuario incorrecto. Introducir solo letras y números, no dejar el campo vacio.
                                            </div>
                                    
                                </div>
                                <div class="form-group"> 
                                    <label>Contraseña</label>
                                    <input id="psw" name="psw" type="password" class="form-control" placeholder="">
                                    <div id="message22" name="message22" style="color:  #c22708;" hidden="">
                                    Contraseña incorrecta. Introducir solo letras y números, no dejar el campo vacio.
                                </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
										<a style="color: #0000;" href="#">Olvidaste tu Contraseña</a>
										&nbsp;
										<br><br>
									</label>
									<label class="pull-right">
									<br><br>
									</label>

                                </div>
                                <button id="btnaaa" name="btnaaa" type="button" onclick="login()" class="btn btn-primary btn-flat m-b-30 m-t-30">Entrar</button>
                                <!--div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div-->
                                <center id="baravg" style="display: none;">
                                                <div  class="col-sm-12">
                                                            <!-- div id="porc" class="progress-bar bg-danger wow animated progress-animated" style="width: 0%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div-->
                                                            <style>

progress::-webkit-progress-value {
    background: #3fea3fa1;
    border-radius : 20px;
}

</style>
<!--progress-bar bg-default progress-bar-striped progress-bar-animated-->
                                                   




<progress id="html5" max="100" value="0" style="
                                                            /* Elimino la apariencia por defecto */
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    /* Quito el borde que aparece en Firefox */
    border: none;

    /* Añado mis propios estilos */
    width: 100%;
    height: 30px;
    overflow:hidden;

/*  Estos estilos solo se aplicaran al fondo de la barra en mozilla */
        /*! border:1px inset #000; */
    
    border-radius : 20px ;
    progress-bar-green: background-color: rgb(8, 221, 17) !important;
    background-color: #aeaeae;
" class="progress-bar  wow animated progress-animated progress-bar
                                                            "></progress>



                                                        		<span style="color: black;"></span>
                                                        </div>
                                                        
                                                       
                                                </center>
                                                 
                                <div class="register-link m-t-15 text-center">
                                    <p> <a href="/Registro_C"> Registrate como Contribuyente</a></p>
                                </div>
								<div class="register-link m-t-15 text-center">
									<p>
										<a href="STUDIOAIGECEM/findupdatepass/"> Olvidaste tu contraseña</a></p>
								</div>
                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# row -->
                    
                        <div class="col-lg-12">
                            <div class="footer text-center"> 
                            <center>
                            <?php include 'const.php'; ?>
                              <p><a href="#" target="">IGECEM <?php echo anioo;?>. Versión <?php echo versionx;?></a> </p>
                              </center>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    
      </div>
      
      <div class="modal fade" id="examplef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document" style="margin: 0.5rem auto;">
    <div class="modal-content">
      <div class="modal-header">
      
      <center>
      
        <h3 class="modal-title" id="exampleModalLabel"> <span class="ti-alert" style="color: #ffa735;"></span> ADVERTENCIA</h3>
        </center>
        <!-- button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button-->
      </div>
      <div id="messgerF" class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="examplet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document" style="margin: 12.75rem auto;">
    <div class="modal-content">
      <div class="modal-header">
      <center>
        <h3 class="modal-title" id="exampleModalLabel">CONFIRMACIÓN</h3>
        </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <center><img src="jsvendor/assets/images/hand.jpg" style="width: 80px; height: 80px;width:80px; height:80px;" /></center>                 
      <div id="messgerT"  class="modal-body" style="color: black;">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


    
    <!-- jquery vendor -->
    <script src="jsvendor/assets/js/lib/jquery.min.js"></script>
    <script src="jsvendor/assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="jsvendor/assets/js/lib/menubar/sidebar.js"></script>
    <script src="jsvendor/assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->


    <script src="jsvendor/assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="jsvendor/assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="jsvendor/assets/js/lib/bootstrap.min.js"></script><script src="jsvendor/assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="_js/_login.js"></script>
    <script type="text/javascript">

    $(document).ready(function () {

    	$("#usr").keyup(function(){
    		 $('#usr').css("border", "1px solid black");
    		 voidvalidation1();    	     
                  
	});


    	$("#psw").keyup(function(){
    		$('#psw').css("border", "1px solid black");
    		voidvalidation2();
                 
	});
    	
        
        });



    function voidvalidation1(){
    	 let isValid = false;
      	const message = document.getElementById('message');
      	      var dato = document.getElementById("usr").value;
      	   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ@ .  ]+$/;
      	       if (dato.match(valoresAceptados)){
      	          isValid = true;
      	       } else {
      	         isValid = false;
      	      }

      	      if(!isValid) {
      	        message.hidden = false;

      	      } else {
      	        message.hidden = true;
      	      }
      	      return isValid;
    }

    function voidvalidation2(){
    	 let isValid = false;
       	const message = document.getElementById('message22');
       	      var dato = document.getElementById("psw").value;
       	   var valoresAceptados = /^[0-9a-zA-ZáéíóúñÁÉÍÓÚÑüÜ  ]+$/;
       	       if (dato.match(valoresAceptados)){
       	          isValid = true;
       	       } else {
       	         isValid = false;
       	      }

       	      if(!isValid) {
       	        message.hidden = false;

       	      } else {
       	        message.hidden = true;
       	      }
       	      return isValid;
    }

   
    function voidindexa(){
    	location.href = "../";
    }
        
    function void1(){
        //alert("asdasd");
        location.href = "Registro_C";
    }

    function void2(){
        //alert("asdasd");
        location.href = "PadronDictaminadores";
    }

    function void3(){
        //alert("asdasd");
        location.href = "Log";
    }

    </script>

</body>

</html>